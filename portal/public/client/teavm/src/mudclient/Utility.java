package mudclient;

import java.io.EOFException;
import java.io.IOException;
import java.net.URL;

// $FF: renamed from: a.f
public class Utility {

   // $FF: renamed from: a java.net.URL
   public static URL field_1007;
   // $FF: renamed from: b int[]
   private static int[] field_1008;
   // $FF: renamed from: c int
   public static int field_1009;


   // $FF: renamed from: a (java.lang.String) java.io.InputStream
   public static FileDownloadStream getDownloadStream(String fileName) throws IOException {
      return new FileDownloadStream(fileName);
   }

   // $FF: renamed from: a (java.lang.String, byte[], int) void
   public static void readFully(String var0, byte[] var1, int var2) throws IOException {
      FileDownloadStream var4 = getDownloadStream(var0);

      try {
         var4.readFully(var1, 0, var2);
      } catch (EOFException var5) {
         ;
      }

      var4.close();
   }

   // $FF: renamed from: a (byte[], int, int) void
   public static void method_445(byte[] var0, int var1, int var2) {
      var0[var1] = (byte)(var2 >> 24);
      var0[var1 + 1] = (byte)(var2 >> 16);
      var0[var1 + 2] = (byte)(var2 >> 8);
      var0[var1 + 3] = (byte)var2;
   }

   // $FF: renamed from: a (byte) int
   public static int getUnsignedByte(byte var0) {
      return var0 & 255;
   }

   // $FF: renamed from: a (byte[], int) int
   public static int readUnsignedShort(byte[] var0, int var1) {
      return ((var0[var1] & 255) << 8) + (var0[var1 + 1] & 255);
   }

   // $FF: renamed from: b (byte[], int) int
   public static int getUnsignedInt(byte[] var0, int var1) {
      return ((var0[var1] & 255) << 24) + ((var0[var1 + 1] & 255) << 16) + ((var0[var1 + 2] & 255) << 8) + (var0[var1 + 3] & 255);
   }

   // $FF: renamed from: c (byte[], int) long
   public static long getUnsignedLong(byte[] var0, int var1) {
      return (((long) getUnsignedInt(var0, var1) & 4294967295L) << 32) + ((long) getUnsignedInt(var0, var1 + 4) & 4294967295L);
   }

   // $FF: renamed from: d (byte[], int) int
   public static int method_450(byte[] var0, int var1) {
      int var2 = getUnsignedByte(var0[var1]) * 256 + getUnsignedByte(var0[var1 + 1]);
      if(var2 > 32767) {
         var2 -= 65536;
      }

      return var2;
   }

   // $FF: renamed from: e (byte[], int) int
   public static int readUnsignedByteInt(byte[] var0, int var1) {
      return (var0[var1] & 255) < 128?var0[var1]:((var0[var1] & 255) - 128 << 24) + ((var0[var1 + 1] & 255) << 16) + ((var0[var1 + 2] & 255) << 8) + (var0[var1 + 3] & 255);
   }

   // $FF: renamed from: b (byte[], int, int) int
   public static int readBits(byte[] var0, int var1, int var2) {
      int var6 = Packet.field_597;
      int var3 = var1 >> 3;
      int var4 = 8 - (var1 & 7);
      int var5 = 0;
      if(var6 != 0) {
         var5 += (var0[var3++] & field_1008[var4]) << var2 - var4;
         var2 -= var4;
         var4 = 8;
      }

      while(var2 > var4) {
         var5 += (var0[var3++] & field_1008[var4]) << var2 - var4;
         var2 -= var4;
         var4 = 8;
      }

      if(var2 == var4) {
         var5 += var0[var3] & field_1008[var4];
         if(var6 == 0) {
            return var5;
         }
      }

      var5 += var0[var3] >> var4 - var2 & field_1008[var2];
      return var5;
   }

   // $FF: renamed from: a (java.lang.String, int) java.lang.String
   public static String method_453(String var0, int var1) {
      int var5 = Packet.field_597;
      String var2 = "";
      int var3 = 0;
      if(var5 == 0 && var3 >= var1) {
         return var2;
      } else {
         do {
            label52: {
               if(var3 >= var0.length()) {
                  var2 = var2 + " ";
                  if(var5 == 0) {
                     break label52;
                  }
               }

               char var4 = var0.charAt(var3);
               if(var4 >= 97 && var4 <= 122) {
                  var2 = var2 + var4;
                  if(var5 == 0) {
                     break label52;
                  }
               }

               if(var4 >= 65 && var4 <= 90) {
                  var2 = var2 + var4;
                  if(var5 == 0) {
                     break label52;
                  }
               }

               if(var4 >= 48 && var4 <= 57) {
                  var2 = var2 + var4;
                  if(var5 == 0) {
                     break label52;
                  }
               }

               var2 = var2 + '_';
            }

            ++var3;
         } while(var3 < var1);

         return var2;
      }
   }

   // $FF: renamed from: b (java.lang.String, int) java.lang.String
   public static String method_454(String var0, int var1) {
      var0 = var0.toLowerCase();
      String var2 = "";
      int var3 = 0;
      if(Packet.field_597 != 0 || var3 < var0.length() && var3 < var1) {
         do {
            char var4 = var0.charAt(var3);
            if(var4 >= 97 && var4 <= 122) {
               var2 = var2 + var4;
            }

            if(var4 >= 48 && var4 <= 57) {
               var2 = var2 + var4;
            }

            ++var3;
         } while(var3 < var0.length() && var3 < var1);
      }

      return var2;
   }

   // $FF: renamed from: a (int) java.lang.String
   public static String translateIpAddress(int ipInt) {
      return (ipInt >> 24 & 255) + "." + (ipInt >> 16 & 255) + "." + (ipInt >> 8 & 255) + "." + (ipInt & 255);
   }

   // $FF: renamed from: b (java.lang.String) long
   public static long encodeUsername(String var0) {
      int var7 = Packet.field_597;
      String var1 = "";
      int var2 = 0;
      char var3;
      if(var7 != 0) {
         label109: {
            var3 = var0.charAt(var2);
            if(var3 >= 97 && var3 <= 122) {
               var1 = var1 + var3;
               if(var7 == 0) {
                  break label109;
               }
            }

            if(var3 >= 65 && var3 <= 90) {
               var1 = var1 + (char)(var3 + 97 - 65);
               if(var7 == 0) {
                  break label109;
               }
            }

            if(var3 >= 48 && var3 <= 57) {
               var1 = var1 + var3;
               if(var7 == 0) {
                  break label109;
               }
            }

            var1 = var1 + ' ';
         }

         ++var2;
      }

      for(; var2 < var0.length(); ++var2) {
         var3 = var0.charAt(var2);
         if(var3 >= 97 && var3 <= 122) {
            var1 = var1 + var3;
            if(var7 == 0) {
               continue;
            }
         }

         if(var3 >= 65 && var3 <= 90) {
            var1 = var1 + (char)(var3 + 97 - 65);
            if(var7 == 0) {
               continue;
            }
         }

         if(var3 >= 48 && var3 <= 57) {
            var1 = var1 + var3;
            if(var7 == 0) {
               continue;
            }
         }

         var1 = var1 + ' ';
      }

      var1 = var1.trim();
      if(var1.length() > 12) {
         var1 = var1.substring(0, 12);
      }

      long var8 = 0L;
      int var5 = 0;
      if(var7 == 0 && var5 >= var1.length()) {
         return var8;
      } else {
         do {
            label38: {
               char var6 = var1.charAt(var5);
               var8 *= 37L;
               if(var6 >= 97 && var6 <= 122) {
                  var8 += (long)(1 + var6 - 97);
                  if(var7 == 0) {
                     break label38;
                  }
               }

               if(var6 >= 48 && var6 <= 57) {
                  var8 += (long)(27 + var6 - 48);
               }
            }

            ++var5;
         } while(var5 < var1.length());

         return var8;
      }
   }

   // $FF: renamed from: a (long) java.lang.String
   public static String decodeUsername(long var0) {
      int var4 = Packet.field_597;
      if(var0 < 0L) {
         return "invalid_name";
      } else {
         String var2 = "";
         if(var4 == 0 && var0 == 0L) {
            return var2;
         } else {
            do {
               int var3 = (int)(var0 % 37L);
               var0 /= 37L;
               if(var3 == 0) {
                  var2 = " " + var2;
                  if(var4 == 0) {
                     continue;
                  }
               }

               if(var3 < 27) {
                  if(var0 % 37L == 0L) {
                     var2 = (char)(var3 + 65 - 1) + var2;
                     if(var4 == 0) {
                        continue;
                     }
                  }

                  var2 = (char)(var3 + 97 - 1) + var2;
                  if(var4 == 0) {
                     continue;
                  }
               }

               var2 = (char)(var3 + 48 - 27) + var2;
            } while(var0 != 0L);

            return var2;
         }
      }
   }

   // $FF: renamed from: a (java.lang.String, byte[]) int
   public static int getDataFileOffset(String var0, byte[] var1) {
      int var9 = Packet.field_597;
      int var2 = readUnsignedShort(var1, 0);
      int var3 = 0;
      var0 = var0.toUpperCase();
      int var4 = 0;
      if(var9 != 0 || var4 < var0.length()) {
         do {
            var3 = var3 * 61 + var0.charAt(var4) - 32;
            ++var4;
         } while(var4 < var0.length());
      }

      int var5 = 2 + var2 * 10;
      int var6 = 0;
      if(var9 == 0 && var6 >= var2) {
         return 0;
      } else {
         do {
            int var7 = (var1[var6 * 10 + 2] & 255) * 16777216 + (var1[var6 * 10 + 3] & 255) * 65536 + (var1[var6 * 10 + 4] & 255) * 256 + (var1[var6 * 10 + 5] & 255);
            int var8 = (var1[var6 * 10 + 9] & 255) * 65536 + (var1[var6 * 10 + 10] & 255) * 256 + (var1[var6 * 10 + 11] & 255);
            if(var7 == var3) {
               return var5;
            }

            var5 += var8;
            ++var6;
         } while(var6 < var2);

         return 0;
      }
   }

   // $FF: renamed from: b (java.lang.String, byte[]) int
   public static int getDataFileLength(String var0, byte[] var1) {
      int var10 = Packet.field_597;
      int var2 = readUnsignedShort(var1, 0);
      int var3 = 0;
      var0 = var0.toUpperCase();
      int var4 = 0;
      if(var10 != 0 || var4 < var0.length()) {
         do {
            var3 = var3 * 61 + var0.charAt(var4) - 32;
            ++var4;
         } while(var4 < var0.length());
      }

      int var6 = 0;
      if(var10 == 0 && var6 >= var2) {
         return 0;
      } else {
         do {
            int var7 = (var1[var6 * 10 + 2] & 255) * 16777216 + (var1[var6 * 10 + 3] & 255) * 65536 + (var1[var6 * 10 + 4] & 255) * 256 + (var1[var6 * 10 + 5] & 255);
            int var8 = (var1[var6 * 10 + 6] & 255) * 65536 + (var1[var6 * 10 + 7] & 255) * 256 + (var1[var6 * 10 + 8] & 255);
            if(var7 == var3) {
               return var8;
            }

            ++var6;
         } while(var6 < var2);

         return 0;
      }
   }

   // $FF: renamed from: a (java.lang.String, int, byte[]) byte[]
   public static byte[] loadData(String var0, int var1, byte[] var2) {
      return method_461(var0, var1, var2, (byte[])null);
   }

   // $FF: renamed from: a (java.lang.String, int, byte[], byte[]) byte[]
   public static byte[] method_461(String var0, int var1, byte[] var2, byte[] var3) {
      int var13 = Packet.field_597;
      int var4 = (var2[0] & 255) * 256 + (var2[1] & 255);
      int var5 = 0;
      var0 = var0.toUpperCase();
      int var6 = 0;
      if(var13 != 0 || var6 < var0.length()) {
         do {
            var5 = var5 * 61 + var0.charAt(var6) - 32;
            ++var6;
         } while(var6 < var0.length());
      }

      int var7 = 2 + var4 * 10;
      int var8 = 0;
      if(var13 == 0 && var8 >= var4) {
         return null;
      } else {
         do {
            int var9 = (var2[var8 * 10 + 2] & 255) * 16777216 + (var2[var8 * 10 + 3] & 255) * 65536 + (var2[var8 * 10 + 4] & 255) * 256 + (var2[var8 * 10 + 5] & 255);
            int var10 = (var2[var8 * 10 + 6] & 255) * 65536 + (var2[var8 * 10 + 7] & 255) * 256 + (var2[var8 * 10 + 8] & 255);
            int var11 = (var2[var8 * 10 + 9] & 255) * 65536 + (var2[var8 * 10 + 10] & 255) * 256 + (var2[var8 * 10 + 11] & 255);
            if(var9 == var5) {
               if(var3 == null) {
                  var3 = new byte[var10 + var1];
               }

               if(var10 != var11) {
                  BZLib.method_397(var3, var10, var2, var11, var7);
                  if(var13 == 0) {
                     return var3;
                  }
               }

               int var12 = 0;
               if(var13 != 0 || var12 < var10) {
                  do {
                     var3[var12] = var2[var7 + var12];
                     ++var12;
                  } while(var12 < var10);
               }

               return var3;
            }

            var7 += var11;
            ++var8;
         } while(var8 < var4);

         return null;
      }
   }

   // $FF: renamed from: <clinit> () void
   static {
      field_1007 = null;
      field_1008 = new int[]{0, 1, 3, 7, 15, 31, 63, 127, 255, 511, 1023, 2047, 4095, 8191, 16383, 32767, '\uffff', 131071, 262143, 524287, 1048575, 2097151, 4194303, 8388607, 16777215, 33554431, 67108863, 134217727, 268435455, 536870911, 1073741823, Integer.MAX_VALUE, -1};
   }
}
