package mudclient;

import java.util.zip.CRC32;

// $FF: renamed from: a.d
public class Buffer {

   // $FF: renamed from: a byte[]
   byte[] field_991;
   // $FF: renamed from: b int
   int field_992;
   // $FF: renamed from: c java.util.zip.CRC32
   static CRC32 field_993;

   // $FF: renamed from: <init> (byte[]) void
   public Buffer(byte[] var1) {
      super();
      this.field_991 = var1;
      this.field_992 = 0;
   }

   // $FF: renamed from: a () int
   public int method_407() {
      return this.field_991[this.field_992++] & 255;
   }

   // $FF: renamed from: b () int
   public int method_408() {
      this.field_992 += 2;
      return ((this.field_991[this.field_992 - 2] & 255) << 8) + (this.field_991[this.field_992 - 1] & 255);
   }

   // $FF: renamed from: c () int
   public int method_409() {
      this.field_992 += 4;
      return ((this.field_991[this.field_992 - 4] & 255) << 24) + ((this.field_991[this.field_992 - 3] & 255) << 16) + ((this.field_991[this.field_992 - 2] & 255) << 8) + (this.field_991[this.field_992 - 1] & 255);
   }

   // $FF: renamed from: <clinit> () void
   static {
      field_993 = new CRC32();
   }
}
