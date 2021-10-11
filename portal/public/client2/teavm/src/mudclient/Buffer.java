package mudclient;

import java.io.IOException;

public class Buffer {
   protected Socket socket;
   protected boolean closing = false;
   protected byte[] inputBuffer;
   int yd;
   final int zd = 61;
   final int ae = 59;
   final int be = 42;
   final int ce = 43;
   final int de = 44;
   final int ee = 45;
   final int fe = 46;
   final int ge = 47;
   final int he = 92;
   final int ie = 32;
   final int je = 124;
   final int ke = 34;
   static char[] le = new char[256];

   public Buffer(Socket socket) throws IOException {
      this.socket = socket;
   }

   public Buffer(String var1) throws IOException {
	   //TODO:
      //this.input = Utility.openStream(var1);
   }

   public Buffer(byte[] var1) {
      this.inputBuffer = var1;
      this.yd = 0;
      this.closing = true;
   }

   public Buffer(byte[] var1, int var2) {
      this.inputBuffer = var1;
      this.yd = var2;
      this.closing = true;
   }

   public void close() {
      this.closing = true;
   }

   public int read() throws IOException {
      return this.inputBuffer != null?this.inputBuffer[this.yd++]:(this.closing ?0:this.socket.read());
   }

   public int readByte() throws IOException {
      return this.read();
   }

   public int readShort() throws IOException {
      int var1 = this.readByte();
      int var2 = this.readByte();
      return var1 * 256 + var2;
   }

   public int available() throws IOException {
      return this.closing ?0:this.socket.available();
   }

   public void readBytes(int length, byte[] buffer) throws IOException {
      if(!this.closing) {
    	  this.socket.readBytes(buffer, 0, length);
      }
   }

   public void skipToNextDataValue() throws IOException {
      for(int var1 = this.read(); var1 != 61 && var1 != -1; var1 = this.read()) {
         ;
      }

   }

   public int readDataInt() throws IOException {
      int var1 = 0;
      boolean var3 = false;
      int var2 = this.read();

      do {
         if(var2 >= 48 && var2 <= 57) {
            while(var2 >= 48 && var2 <= 57) {
               var1 = var1 * 10 + var2 - 48;
               var2 = this.read();
            }

            if(var3) {
               var1 = -var1;
            }

            return var1;
         }

         if(var2 == 45) {
            var3 = true;
         }

         var2 = this.read();
      } while(var2 != -1);

      throw new IOException("Eof!");
   }

   public String readDataString() throws IOException {
      String var1 = "";
      boolean var3 = false;
      int var2 = this.read();

      do {
         if(var2 >= 32 && var2 != 44 && var2 != 59 && var2 != 61) {
            if(var2 == 34) {
               var3 = true;
               var2 = this.read();
            }

            while(var2 != -1 && (var3 || var2 != 44 && var2 != 61 && var2 != 59) && (!var3 || var2 != 34)) {
               var1 = var1 + le[var2];
               var2 = this.read();
            }

            return var1;
         }

         var2 = this.read();
      } while(var2 != -1);

      throw new IOException("Eof!");
   }

   public int readDataHex() throws IOException {
      int var1 = 0;
      int var2 = this.read();

      while((var2 < 48 || var2 > 57) && (var2 < 97 || var2 > 102) && (var2 < 65 || var2 > 70)) {
         var2 = this.read();
         if(var2 == -1) {
            throw new IOException("Eof!");
         }
      }

      while(true) {
         if(var2 >= 48 && var2 <= 57) {
            var1 = var1 * 16 + var2 - 48;
         } else if(var2 >= 97 && var2 <= 102) {
            var1 = var1 * 16 + var2 + 10 - 97;
         } else {
            if(var2 < 65 || var2 > 70) {
               return var1;
            }

            var1 = var1 * 16 + var2 + 10 - 65;
         }

         var2 = this.read();
      }
   }

   static {
      for(int var0 = 0; var0 < 256; ++var0) {
         le[var0] = (char)var0;
      }

      le[61] = 61;
      le[59] = 59;
      le[42] = 42;
      le[43] = 43;
      le[44] = 44;
      le[45] = 45;
      le[46] = 46;
      le[47] = 47;
      le[92] = 92;
      le[124] = 124;
      le[33] = 33;
      le[34] = 34;
   }
}
