package mudclient;

import java.io.IOException;

// $FF: renamed from: a.a.k
public class ClientStream extends Packet {
   // $FF: renamed from: K java.net.Socket
   private Socket socket;
   // $FF: renamed from: L boolean
   private boolean closed;

   // $FF: renamed from: <init> (java.net.Socket, a.a.a) void
   public ClientStream(Socket socket, GameShell var2) {
      super();
      this.closed = false;
      this.socket = socket;
   }

   // $FF: renamed from: a () void
   public void closeStream() {
      super.closeStream();
      this.closed = true;
   }

   // $FF: renamed from: b () int
   public int read() throws IOException {
      return this.closed?0:this.socket.read();
   }

   // $FF: renamed from: c () int
   public int available() throws IOException {
      return this.closed ? 0 : this.socket.available();
   }

   // $FF: renamed from: a (int, int, byte[]) void
   public void readStreamBytes(int length, int offset, byte[] buffer) throws IOException {
      if (!this.closed) {
         this.socket.readBytes(buffer, offset, length);
      }
   }

   // $FF: renamed from: a (byte[], int, int) void
   public void writeStreamBytes(byte[] buffer, int offset, int length) throws IOException {
      if (!this.closed) {
         this.socket.write(buffer, offset, length);
      }
   }
}
