package mudclient;

import java.io.IOException;

public class ClientStream extends Buffer {
   private boolean socketException = false;
   private String socketExceptionMessage = "error in twriter";
   private byte[] buffer;
   private int endOffset;
   private int writeOffset;
   public int offset = 3;
   public byte[] buf;

   public ClientStream(Socket socket) throws IOException {
	  super(socket);
      this.socket = socket;
   }

   public ClientStream(String var1) throws IOException {
      super(var1);
   }

   public ClientStream(byte[] var1) {
      super(var1);
   }

   public static ClientStream create(String address, int port) throws IOException {
      Socket socket = new Socket(address, port);
      socket.connect();

      //socket.setSoTimeout(30000);
      return new ClientStream(socket);
   }

   //public void close() { }

   public void writeBytes(byte[] var1, int var2, int var3) throws IOException {
      if(!super.closing) {
         super.socket.write(var1, var2, var3);
      }
   }

   public void writeBytes(byte[] var1, int var2, int var3, boolean var4) throws IOException {
	   if(!super.closing) {
	      super.socket.write(var1, var2, var3);
	   }
   }

   public void flush() {
      synchronized(this){
    	  if(this.writeOffset != this.endOffset && this.buffer != null) {
              this.notify();
              return;
           }
      }

   }

   public void newPacket(int var1) {
      if(this.buf == null) {
         this.buf = new byte[4000];
      }

      this.buf[2] = (byte)var1;
      this.offset = 3;
   }

   public void writeByte(int var1) {
      this.buf[this.offset++] = (byte)var1;
   }

   public void writeShort(int var1) {
      this.buf[this.offset++] = (byte)(var1 >> 8);
      this.buf[this.offset++] = (byte)var1;
   }

   public void writeInt(int var1) {
      this.buf[this.offset++] = (byte)(var1 >> 24);
      this.buf[this.offset++] = (byte)(var1 >> 16);
      this.buf[this.offset++] = (byte)(var1 >> 8);
      this.buf[this.offset++] = (byte)var1;
   }

   public void writeLong(long var1) {
      this.writeInt((int)(var1 >> 32));
      this.writeInt((int)(var1 & -1L));
   }

   public void writeString(String var1) {
      //var1.getBytes(0, var1.length(), this.buf, this.offset);
      System.arraycopy(var1.getBytes(), 0, this.buf, this.offset, var1.length());
      this.offset += var1.length();
   }

   public void putShort(int var1, int var2) {
      this.buf[var2++] = (byte)(var1 >> 8);
      this.buf[var2++] = (byte)var1;
   }

   public void flushPacket2() throws IOException {
      this.buf[0] = (byte)((this.offset - 2) / 256);
      this.buf[1] = (byte)(this.offset - 2 & 255);
      this.writeBytes(this.buf, 0, this.offset, true);
   }

   public void flushPacket() {
      this.buf[0] = (byte)((this.offset - 2) / 256);
      this.buf[1] = (byte)(this.offset - 2 & 255);

      try {
         this.writeBytes(this.buf, 0, this.offset, true);
      } catch (IOException var1) {
         ;
      }
   }

   public void sendPacket() {
      this.buf[0] = (byte)((this.offset - 2) / 256);
      this.buf[1] = (byte)(this.offset - 2 & 255);

      try {
         this.writeBytes(this.buf, 0, this.offset, false);
      } catch (IOException var1) {
         ;
      }
   }
}
