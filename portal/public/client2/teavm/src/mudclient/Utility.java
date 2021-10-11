package mudclient;

import java.io.EOFException;
import java.io.IOException;
import java.net.URL;

public class Utility {
   public static URL appletCodeBase = null;
   static String[] censoredWords1 = new String[]{"fuck", "bastard", "lesbian", "prostitut", "spastic", "vagina", "retard", "arsehole", "asshole", "tosser", "homosex", "hetrosex", "hitler", "urinate"};
   static String[] censoredWords2 = new String[]{"shit", "lesbo", "phuck", "bitch", "penis", "whore", "bisex", "sperm", "rapist", "shag", "slag", "slut", "clit", "cunt", "piss", "nazi", "urine"};
   static String[] censoredWords3 = new String[]{"wank", "naked", "fag", "niga", "nige", "gay", "rape", "cock", "homo", "twat", "arse", "crap", "poo"};
   static int odb;
   static int[] pdb = new int[1000];
   static int[] qdb = new int[1000];
   static String[] rdb = new String[1000];
   static int[] sdb = new int[1000];
   static int[] tdb = new int[1000];

   public static FileDownloadStream getDownloadStream(String fileName) throws IOException {
	  return new FileDownloadStream(fileName);
	}

   public static void loadData(String var0, byte[] var1, int var2) throws IOException {
	  FileDownloadStream var4 = getDownloadStream(var0);

      try {
         var4.readFully(var1, 0, var2);
      } catch (EOFException var5) {
         ;
      }

      var4.close();
   }

   public static int getUnsignedByte(byte var0) {
      return var0 & 255;
   }

   public static int getUnsignedShort(byte[] var0, int var1) {
      return ((var0[var1] & 255) << 8) + (var0[var1 + 1] & 255);
   }

   public static int getUnsignedInt(byte[] var0, int var1) {
      return ((var0[var1] & 255) << 24) + ((var0[var1 + 1] & 255) << 16) + ((var0[var1 + 2] & 255) << 8) + (var0[var1 + 3] & 255);
   }

   public static long hash2username(byte[] var0, int var1) {
      return (((long) getUnsignedInt(var0, var1) & 4294967295L) << 32) + ((long) getUnsignedInt(var0, var1 + 4) & 4294967295L);
   }

   public static int getSignedShort(byte[] var0, int var1) {
      int var2 = getUnsignedByte(var0[var1]) * 256 + getUnsignedByte(var0[var1 + 1]);
      if(var2 > 32767) {
         var2 -= 65536;
      }

      return var2;
   }

   public static String formatAuthString(String var0, int var1) {
      String var2 = "";

      for(int var3 = 0; var3 < var1; ++var3) {
         if(var3 >= var0.length()) {
            var2 = var2 + " ";
         } else {
            char var4 = var0.charAt(var3);
            if(var4 >= 97 && var4 <= 122) {
               var2 = var2 + var4;
            } else if(var4 >= 65 && var4 <= 90) {
               var2 = var2 + var4;
            } else if(var4 >= 48 && var4 <= 57) {
               var2 = var2 + var4;
            } else {
               var2 = var2 + '_';
            }
         }
      }

      return var2;
   }

   public static long username2hash(String var0) {
      String var1 = "";

      for(int var2 = 0; var2 < var0.length(); ++var2) {
         char var3 = var0.charAt(var2);
         if(var3 >= 97 && var3 <= 122) {
            var1 = var1 + var3;
         } else if(var3 >= 65 && var3 <= 90) {
            var1 = var1 + (char)(var3 + 97 - 65);
         } else if(var3 >= 48 && var3 <= 57) {
            var1 = var1 + var3;
         } else {
            var1 = var1 + ' ';
         }
      }

      var1 = var1.trim();
      if(var1.length() > 12) {
         var1 = var1.substring(0, 12);
      }

      long var7 = 0L;

      for(int var5 = 0; var5 < var1.length(); ++var5) {
         char var6 = var1.charAt(var5);
         var7 *= 37L;
         if(var6 >= 97 && var6 <= 122) {
            var7 += (long)(1 + var6 - 97);
         } else if(var6 >= 48 && var6 <= 57) {
            var7 += (long)(27 + var6 - 48);
         }
      }

      return var7;
   }

   public static String hash2username(long var0) {
      String var2 = "";

      while(var0 != 0L) {
         int var3 = (int)(var0 % 37L);
         var0 /= 37L;
         if(var3 == 0) {
            var2 = " " + var2;
         } else if(var3 < 27) {
            if(var0 % 37L == 0L) {
               var2 = (char)(var3 + 65 - 1) + var2;
            } else {
               var2 = (char)(var3 + 97 - 1) + var2;
            }
         } else {
            var2 = (char)(var3 + 48 - 27) + var2;
         }
      }

      return var2;
   }

   public static byte[] readDataFile(String var0) throws IOException {
	   if(true) {
		   var0 = "cache/" + var0;
	   }
	   
	   int var1 = 0;
      int var2 = 0;
      int var3 = 0;
      byte[] var4 = null;

      while(var1 < 2) {
         try {
            if(var1 == 1) {
               var0 = var0.toUpperCase();
            }

            FileDownloadStream var5 = getDownloadStream(var0);
            byte[] var7 = new byte[6];
            var5.readFully(var7, 0, 6);
            var2 = ((var7[0] & 255) << 16) + ((var7[1] & 255) << 8) + (var7[2] & 255);
            var3 = ((var7[3] & 255) << 16) + ((var7[4] & 255) << 8) + (var7[5] & 255);
            int var8 = 0;

            int var9;
            for(var4 = new byte[var3]; var8 < var3; var8 += var9) {
               var9 = var3 - var8;
               if(var9 > 1000) {
                  var9 = 1000;
               }

               var5.readFully(var4, var8, var9);
            }

            var1 = 2;
            var5.close();
         } catch (IOException var10) {
            ++var1;
         }
      }

      if(var3 != var2) {
         byte[] var11 = new byte[var2];
         BZLib.decompress(var11, var2, var4, var3, 0);
         return var11;
      } else {
         return var4;
      }
   }

   public static int getDataFileOffset(String var0, byte[] var1) {
      int var2 = var1[0] * 256 + var1[1];
      int var3 = 0;
      var0 = var0.toUpperCase();

      for(int var4 = 0; var4 < var0.length(); ++var4) {
         var3 = var3 * 61 + var0.charAt(var4) - 32;
      }

      int var5 = 2 + var2 * 10;

      for(int var6 = 0; var6 < var2; ++var6) {
         int var7 = (var1[var6 * 10 + 2] & 255) * 16777216 + (var1[var6 * 10 + 3] & 255) * 65536 + (var1[var6 * 10 + 4] & 255) * 256 + (var1[var6 * 10 + 5] & 255);
         int var8 = (var1[var6 * 10 + 9] & 255) * 65536 + (var1[var6 * 10 + 10] & 255) * 256 + (var1[var6 * 10 + 11] & 255);
         if(var7 == var3) {
            return var5;
         }

         var5 += var8;
      }

      return 0;
   }

   public static byte[] unpackData(String var0, int var1, byte[] archiveData, byte[] var3) {
      int var4 = archiveData[0] * 256 + archiveData[1];
      int var5 = 0;
      var0 = var0.toUpperCase();

      for(int var6 = 0; var6 < var0.length(); ++var6) {
         var5 = var5 * 61 + var0.charAt(var6) - 32;
      }

      int var7 = 2 + var4 * 10;

      for(int var8 = 0; var8 < var4; ++var8) {
         int var9 = (archiveData[var8 * 10 + 2] & 255) * 16777216 + (archiveData[var8 * 10 + 3] & 255) * 65536 + (archiveData[var8 * 10 + 4] & 255) * 256 + (archiveData[var8 * 10 + 5] & 255);
         int var10 = (archiveData[var8 * 10 + 6] & 255) * 65536 + (archiveData[var8 * 10 + 7] & 255) * 256 + (archiveData[var8 * 10 + 8] & 255);
         int var11 = (archiveData[var8 * 10 + 9] & 255) * 65536 + (archiveData[var8 * 10 + 10] & 255) * 256 + (archiveData[var8 * 10 + 11] & 255);
         if(var9 == var5) {
            if(var10 != var11) {
               BZLib.decompress(var3, var10, archiveData, var11, var7);
            } else {
               for(int var12 = 0; var12 < var10; ++var12) {
                  var3[var12] = archiveData[var7 + var12];
               }
            }

            return var3;
         }

         var7 += var11;
      }

      return null;
   }

   public static byte[] unpackData(String var0, int var1, byte[] var2) {
      int var3 = var2[0] * 256 + var2[1];
      int var4 = 0;
      var0 = var0.toUpperCase();

      for(int var5 = 0; var5 < var0.length(); ++var5) {
         var4 = var4 * 61 + var0.charAt(var5) - 32;
      }

      int var6 = 2 + var3 * 10;

      for(int var7 = 0; var7 < var3; ++var7) {
         int var8 = (var2[var7 * 10 + 2] & 255) * 16777216 + (var2[var7 * 10 + 3] & 255) * 65536 + (var2[var7 * 10 + 4] & 255) * 256 + (var2[var7 * 10 + 5] & 255);
         int var9 = (var2[var7 * 10 + 6] & 255) * 65536 + (var2[var7 * 10 + 7] & 255) * 256 + (var2[var7 * 10 + 8] & 255);
         int var10 = (var2[var7 * 10 + 9] & 255) * 65536 + (var2[var7 * 10 + 10] & 255) * 256 + (var2[var7 * 10 + 11] & 255);
         if(var8 == var4) {
            byte[] var11 = new byte[var9 + var1];
            if(var9 != var10) {
               BZLib.decompress(var11, var9, var2, var10, var6);
            } else {
               for(int var12 = 0; var12 < var9; ++var12) {
                  var11[var12] = var2[var6 + var12];
               }
            }

            return var11;
         }

         var6 += var10;
      }

      return null;
   }

   public static String filterString(String var0, boolean var1) {
      for(int var2 = 0; var2 < 2; ++var2) {
         String var3 = var0;
         odb = 0;
         byte var4 = 0;

         for(int var5 = 0; var5 < var0.length(); ++var5) {
            char var6 = var0.charAt(var5);
            if(var6 >= 65 && var6 <= 90) {
               var6 = (char)(var6 + 97 - 65);
            }

            if(var1 && var6 == 64 && var5 + 4 < var0.length() && var0.charAt(var5 + 4) == 64) {
               var5 += 4;
            } else {
               byte var7;
               if(var6 >= 97 && var6 <= 122 || var6 >= 48 && var6 <= 57) {
                  var7 = 0;
               } else if(var6 == 39) {
                  var7 = 1;
               } else if(var6 != 13 && var6 != 32 && var6 != 46 && var6 != 44 && var6 != 45 && var6 != 40 && var6 != 41 && var6 != 63 && var6 != 33) {
                  var7 = 3;
               } else {
                  var7 = 2;
               }

               int var8 = odb;

               for(int var9 = 0; var9 < var8; ++var9) {
                  if(var7 == 3) {
                     if(tdb[var9] > 0 && tdb[var9] < pdb[var9] + rdb[var9].length() / 2) {
                        tdb[odb] = tdb[var9] + 1;
                        sdb[odb] = sdb[var9];
                        qdb[odb] = qdb[var9] + 1;
                        pdb[odb] = pdb[var9];
                        rdb[odb++] = rdb[var9];
                        tdb[var9] = -tdb[var9];
                     }
                  } else {
                     char var10 = rdb[var9].charAt(qdb[var9]);
                     if(areSimiliar(var6, var10)) {
                        ++qdb[var9];
                        if(tdb[var9] < 0) {
                           tdb[var9] = -tdb[var9];
                        }
                     } else if((var6 == 32 || var6 == 13) && pdb[var9] == 0) {
                        qdb[var9] = 99999;
                     } else {
                        char var11 = rdb[var9].charAt(qdb[var9] - 1);
                        if(var7 == 0 && !areSimiliar(var6, var11)) {
                           qdb[var9] = 99999;
                        }
                     }
                  }
               }

               if(var7 >= 2) {
                  var4 = 1;
               }

               int var12;
               int var13;
               int var14;
               if(var7 <= 2) {
                  for(var13 = 0; var13 < censoredWords1.length; ++var13) {
                     if(areSimiliar(var6, censoredWords1[var13].charAt(0))) {
                        tdb[odb] = 1;
                        sdb[odb] = var5;
                        qdb[odb] = 1;
                        pdb[odb] = 1;
                        rdb[odb++] = censoredWords1[var13];
                     }
                  }

                  for(var14 = 0; var14 < censoredWords2.length; ++var14) {
                     if(areSimiliar(var6, censoredWords2[var14].charAt(0))) {
                        tdb[odb] = 1;
                        sdb[odb] = var5;
                        qdb[odb] = 1;
                        pdb[odb] = var4;
                        rdb[odb++] = censoredWords2[var14];
                     }
                  }

                  if(var4 == 1) {
                     for(var12 = 0; var12 < censoredWords3.length; ++var12) {
                        if(areSimiliar(var6, censoredWords3[var12].charAt(0))) {
                           tdb[odb] = 1;
                           sdb[odb] = var5;
                           qdb[odb] = 1;
                           pdb[odb] = 1;
                           rdb[odb++] = censoredWords3[var12];
                        }
                     }
                  }

                  if(var7 == 0) {
                     var4 = 0;
                  }
               }

               for(var13 = 0; var13 < odb; ++var13) {
                  if(qdb[var13] >= rdb[var13].length()) {
                     if(qdb[var13] < 99999) {
                        String var15 = "";

                        for(var12 = 0; var12 < var0.length(); ++var12) {
                           if(var12 >= sdb[var13] && var12 <= var5) {
                              var15 = var15 + "*";
                           } else {
                              var15 = var15 + var0.charAt(var12);
                           }
                        }

                        var0 = var15;
                     }

                     --odb;

                     for(var14 = var13; var14 < odb; ++var14) {
                        pdb[var14] = pdb[var14 + 1];
                        qdb[var14] = qdb[var14 + 1];
                        rdb[var14] = rdb[var14 + 1];
                        sdb[var14] = sdb[var14 + 1];
                        tdb[var14] = tdb[var14 + 1];
                     }

                     --var13;
                  }
               }
            }
         }

         if(var0.equalsIgnoreCase(var3)) {
            break;
         }
      }

      return var0;
   }

   static boolean areSimiliar(char var0, char var1) {
      return var0 == var1?true:(var1 == 105 && (var0 == 108 || var0 == 49 || var0 == 33 || var0 == 124 || var0 == 58 || var0 == 166 || var0 == 59)?true:(var1 == 115 && (var0 == 53 || var0 == 36)?true:(var1 == 97 && (var0 == 52 || var0 == 64)?true:(var1 == 99 && (var0 == 40 || var0 == 60 || var0 == 91)?true:(var1 == 111 && var0 == 48?true:var1 == 117 && var0 == 118)))));
   }
}
