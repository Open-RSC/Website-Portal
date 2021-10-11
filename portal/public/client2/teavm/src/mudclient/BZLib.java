package mudclient;

public class BZLib {
   static final int js = 1;
   static final int ks = 2;
   static final int ls = 10;
   static final int ms = 14;
   static final int ns = 0;
   static final int os = 4;
   static final int ps = 4096;
   static final int qs = 16;
   static final int rs = 258;
   static final int ss = 23;
   static final int ts = 0;
   static final int us = 1;
   static final int vs = 6;
   static final int ws = 50;
   static final int xs = 4;
   static final int ys = 18002;

   public static int decompress(byte[] var0, int var1, byte[] var2, int var3, int var4) {
      BZState var5 = new BZState();
      var5.t = var2;
      var5.u = var4;
      var5.y = var0;
      var5.z = 0;
      var5.v = var3;
      var5.ab = var1;
      var5.hb = 0;
      var5.gb = 0;
      var5.w = 0;
      var5.x = 0;
      var5.bb = 0;
      var5.cb = 0;
      var5.jb = 0;
      vj(var5);
      var1 -= var5.ab;
      return var1;
   }

   private static void wj(BZState var0) {
      byte var2 = var0.db;
      int var3 = var0.eb;
      int var4 = var0.ob;
      int var5 = var0.mb;
      int[] var6 = BZState.rb;
      int var7 = var0.lb;
      byte[] var8 = var0.y;
      int var9 = var0.z;
      int var10 = var0.ab;
      int var12 = var0.fc + 1;

      label67:
      while(true) {
         if(var3 > 0) {
            while(true) {
               if(var10 == 0) {
                  break label67;
               }

               if(var3 == 1) {
                  if(var10 == 0) {
                     var3 = 1;
                     break label67;
                  }

                  var8[var9] = var2;
                  ++var9;
                  --var10;
                  break;
               }

               var8[var9] = var2;
               --var3;
               ++var9;
               --var10;
            }
         }

         boolean var14 = true;

         byte var1;
         while(var14) {
            var14 = false;
            if(var4 == var12) {
               var3 = 0;
               break label67;
            }

            var2 = (byte)var5;
            var7 = var6[var7];
            var1 = (byte)(var7 & 255);
            var7 >>= 8;
            ++var4;
            if(var1 != var5) {
               var5 = var1;
               if(var10 == 0) {
                  var3 = 1;
                  break label67;
               }

               var8[var9] = var2;
               ++var9;
               --var10;
               var14 = true;
            } else if(var4 == var12) {
               if(var10 == 0) {
                  var3 = 1;
                  break label67;
               }

               var8[var9] = var2;
               ++var9;
               --var10;
               var14 = true;
            }
         }

         var3 = 2;
         var7 = var6[var7];
         var1 = (byte)(var7 & 255);
         var7 >>= 8;
         ++var4;
         if(var4 != var12) {
            if(var1 != var5) {
               var5 = var1;
            } else {
               var3 = 3;
               var7 = var6[var7];
               var1 = (byte)(var7 & 255);
               var7 >>= 8;
               ++var4;
               if(var4 != var12) {
                  if(var1 != var5) {
                     var5 = var1;
                  } else {
                     var7 = var6[var7];
                     var1 = (byte)(var7 & 255);
                     var7 >>= 8;
                     ++var4;
                     var3 = (var1 & 255) + 4;
                     var7 = var6[var7];
                     var5 = (byte)(var7 & 255);
                     var7 >>= 8;
                     ++var4;
                  }
               }
            }
         }
      }

      int var13 = var0.bb;
      var0.bb += var10 - var10;
      if(var0.bb < var13) {
         ++var0.cb;
      }

      var0.db = var2;
      var0.eb = var3;
      var0.ob = var4;
      var0.mb = var5;
      BZState.rb = var6;
      var0.lb = var7;
      var0.y = var8;
      var0.z = var9;
      var0.ab = var10;
   }

   private static void vj(BZState var0) {
      boolean var4 = false;
      boolean var5 = false;
      boolean var6 = false;
      boolean var7 = false;
      boolean var8 = false;
      boolean var9 = false;
      boolean var10 = false;
      boolean var11 = false;
      boolean var12 = false;
      boolean var13 = false;
      boolean var14 = false;
      boolean var15 = false;
      boolean var16 = false;
      boolean var17 = false;
      boolean var18 = false;
      boolean var19 = false;
      boolean var20 = false;
      boolean var21 = false;
      boolean var22 = false;
      int var23 = 0;
      int[] var24 = null;
      int[] var25 = null;
      int[] var26 = null;
      var0.ib = 1;
      if(BZState.rb == null) {
         BZState.rb = new int[var0.ib * 100000];
      }

      boolean var27 = true;

      while(true) {
         while(var27) {
            byte var1 = tj(var0);
            if(var1 == 23) {
               return;
            }

            var1 = tj(var0);
            var1 = tj(var0);
            var1 = tj(var0);
            var1 = tj(var0);
            var1 = tj(var0);
            ++var0.jb;
            var1 = tj(var0);
            var1 = tj(var0);
            var1 = tj(var0);
            var1 = tj(var0);
            var1 = yj(var0);
            if(var1 != 0) {
               var0.fb = true;
            } else {
               var0.fb = false;
            }

            if(var0.fb) {
               System.out.println("PANIC! RANDOMISED BLOCK!");
            }

            var0.kb = 0;
            var1 = tj(var0);
            var0.kb = var0.kb << 8 | var1 & 255;
            var1 = tj(var0);
            var0.kb = var0.kb << 8 | var1 & 255;
            var1 = tj(var0);
            var0.kb = var0.kb << 8 | var1 & 255;

            int var42;
            for(var42 = 0; var42 < 16; ++var42) {
               var1 = yj(var0);
               if(var1 == 1) {
                  var0.ub[var42] = true;
               } else {
                  var0.ub[var42] = false;
               }
            }

            for(var42 = 0; var42 < 256; ++var42) {
               var0.tb[var42] = false;
            }

            int var43;
            for(var42 = 0; var42 < 16; ++var42) {
               if(var0.ub[var42]) {
                  for(var43 = 0; var43 < 16; ++var43) {
                     var1 = yj(var0);
                     if(var1 == 1) {
                        var0.tb[var42 * 16 + var43] = true;
                     }
                  }
               }
            }

            xj(var0);
            int var45 = var0.sb + 2;
            int var46 = zj(3, var0);
            int var47 = zj(15, var0);

            for(var42 = 0; var42 < var47; ++var42) {
               var43 = 0;

               while(true) {
                  var1 = yj(var0);
                  if(var1 == 0) {
                     var0.zb[var42] = (byte)var43;
                     break;
                  }

                  ++var43;
               }
            }

            byte[] var28 = new byte[6];

            byte var30;
            for(var30 = 0; var30 < var46; var28[var30] = var30++) {
               ;
            }

            for(var42 = 0; var42 < var47; ++var42) {
               var30 = var0.zb[var42];

               byte var29;
               for(var29 = var28[var30]; var30 > 0; --var30) {
                  var28[var30] = var28[var30 - 1];
               }

               var28[0] = var29;
               var0.yb[var42] = var29;
            }

            int var44;
            for(var44 = 0; var44 < var46; ++var44) {
               int var57 = zj(5, var0);

               for(var42 = 0; var42 < var45; ++var42) {
                  while(true) {
                     var1 = yj(var0);
                     if(var1 == 0) {
                        var0.ac[var44][var42] = (byte)var57;
                        break;
                     }

                     var1 = yj(var0);
                     if(var1 == 0) {
                        ++var57;
                     } else {
                        --var57;
                     }
                  }
               }
            }

            for(var44 = 0; var44 < var46; ++var44) {
               byte var2 = 32;
               byte var3 = 0;

               for(var42 = 0; var42 < var45; ++var42) {
                  if(var0.ac[var44][var42] > var3) {
                     var3 = var0.ac[var44][var42];
                  }

                  if(var0.ac[var44][var42] < var2) {
                     var2 = var0.ac[var44][var42];
                  }
               }

               ak(var0.bc[var44], var0.cc[var44], var0.dc[var44], var0.ac[var44], var2, var3, var45);
               var0.ec[var44] = var2;
            }

            int var48 = var0.sb + 1;
            int var53 = 100000 * var0.ib;
            int var49 = -1;
            byte var50 = 0;

            for(var42 = 0; var42 <= 255; ++var42) {
               var0.nb[var42] = 0;
            }

            int var33 = 4095;

            for(int var31 = 15; var31 >= 0; --var31) {
               for(int var32 = 15; var32 >= 0; --var32) {
                  var0.wb[var33] = (byte)(var31 * 16 + var32);
                  --var33;
               }

               var0.xb[var31] = var33 + 1;
            }

            int var54 = 0;
            byte var61;
            if(var50 == 0) {
               ++var49;
               var50 = 50;
               var61 = var0.yb[var49];
               var23 = var0.ec[var61];
               var24 = var0.bc[var61];
               var26 = var0.dc[var61];
               var25 = var0.cc[var61];
            }

            int var51 = var50 - 1;
            int var58 = var23;

            int var59;
            byte var60;
            for(var59 = zj(var23, var0); var59 > var24[var58]; var59 = var59 << 1 | var60) {
               ++var58;
               var60 = yj(var0);
            }

            int var52 = var26[var59 - var25[var58]];

            while(true) {
               while(var52 != var48) {
                  if(var52 != 0 && var52 != 1) {
                     int var40 = var52 - 1;
                     int var37;
                     if(var40 < 16) {
                        var37 = var0.xb[0];

                        for(var1 = var0.wb[var37 + var40]; var40 > 3; var40 -= 4) {
                           int var41 = var37 + var40;
                           var0.wb[var41] = var0.wb[var41 - 1];
                           var0.wb[var41 - 1] = var0.wb[var41 - 2];
                           var0.wb[var41 - 2] = var0.wb[var41 - 3];
                           var0.wb[var41 - 3] = var0.wb[var41 - 4];
                        }

                        while(var40 > 0) {
                           var0.wb[var37 + var40] = var0.wb[var37 + var40 - 1];
                           --var40;
                        }

                        var0.wb[var37] = var1;
                     } else {
                        int var38 = var40 / 16;
                        int var39 = var40 % 16;
                        var37 = var0.xb[var38] + var39;

                        for(var1 = var0.wb[var37]; var37 > var0.xb[var38]; --var37) {
                           var0.wb[var37] = var0.wb[var37 - 1];
                        }

                        ++var0.xb[var38];

                        while(var38 > 0) {
                           --var0.xb[var38];
                           var0.wb[var0.xb[var38]] = var0.wb[var0.xb[var38 - 1] + 16 - 1];
                           --var38;
                        }

                        --var0.xb[0];
                        var0.wb[var0.xb[0]] = var1;
                        if(var0.xb[0] == 0) {
                           int var36 = 4095;

                           for(int var34 = 15; var34 >= 0; --var34) {
                              for(int var35 = 15; var35 >= 0; --var35) {
                                 var0.wb[var36] = var0.wb[var0.xb[var34] + var35];
                                 --var36;
                              }

                              var0.xb[var34] = var36 + 1;
                           }
                        }
                     }

                     ++var0.nb[var0.vb[var1 & 255] & 255];
                     BZState.rb[var54] = var0.vb[var1 & 255] & 255;
                     ++var54;
                     if(var51 == 0) {
                        ++var49;
                        var51 = 50;
                        var61 = var0.yb[var49];
                        var23 = var0.ec[var61];
                        var24 = var0.bc[var61];
                        var26 = var0.dc[var61];
                        var25 = var0.cc[var61];
                     }

                     --var51;
                     var58 = var23;

                     for(var59 = zj(var23, var0); var59 > var24[var58]; var59 = var59 << 1 | var60) {
                        ++var58;
                        var60 = yj(var0);
                     }

                     var52 = var26[var59 - var25[var58]];
                  } else {
                     int var55 = -1;
                     int var56 = 1;

                     do {
                        if(var52 == 0) {
                           var55 += var56;
                        } else if(var52 == 1) {
                           var55 += 2 * var56;
                        }

                        var56 *= 2;
                        if(var51 == 0) {
                           ++var49;
                           var51 = 50;
                           var61 = var0.yb[var49];
                           var23 = var0.ec[var61];
                           var24 = var0.bc[var61];
                           var26 = var0.dc[var61];
                           var25 = var0.cc[var61];
                        }

                        --var51;
                        var58 = var23;

                        for(var59 = zj(var23, var0); var59 > var24[var58]; var59 = var59 << 1 | var60) {
                           ++var58;
                           var60 = yj(var0);
                        }

                        var52 = var26[var59 - var25[var58]];
                     } while(var52 == 0 || var52 == 1);

                     ++var55;
                     var1 = var0.vb[var0.wb[var0.xb[0]] & 255];

                     for(var0.nb[var1 & 255] += var55; var55 > 0; --var55) {
                        BZState.rb[var54] = var1 & 255;
                        ++var54;
                     }
                  }
               }

               var0.eb = 0;
               var0.db = 0;
               var0.pb[0] = 0;

               for(var42 = 1; var42 <= 256; ++var42) {
                  var0.pb[var42] = var0.nb[var42 - 1];
               }

               for(var42 = 1; var42 <= 256; ++var42) {
                  var0.pb[var42] += var0.pb[var42 - 1];
               }

               for(var42 = 0; var42 < var54; ++var42) {
                  var1 = (byte)(BZState.rb[var42] & 255);
                  BZState.rb[var0.pb[var1 & 255]] |= var42 << 8;
                  ++var0.pb[var1 & 255];
               }

               var0.lb = BZState.rb[var0.kb] >> 8;
               var0.ob = 0;
               var0.lb = BZState.rb[var0.lb];
               var0.mb = (byte)(var0.lb & 255);
               var0.lb >>= 8;
               ++var0.ob;
               var0.fc = var54;
               wj(var0);
               if(var0.ob == var0.fc + 1 && var0.eb == 0) {
                  var27 = true;
                  break;
               }

               var27 = false;
               break;
            }
         }

         return;
      }
   }

   private static byte tj(BZState var0) {
      return (byte)zj(8, var0);
   }

   private static byte yj(BZState var0) {
      return (byte)zj(1, var0);
   }

   private static int zj(int var0, BZState var1) {
      while(var1.hb < var0) {
         var1.gb = var1.gb << 8 | var1.t[var1.u] & 255;
         var1.hb += 8;
         ++var1.u;
         --var1.v;
         ++var1.w;
         if(var1.w == 0) {
            ++var1.x;
         }
      }

      int var3 = var1.gb >> var1.hb - var0 & (1 << var0) - 1;
      var1.hb -= var0;
      return var3;
   }

   private static int bk(int var0, int[] var1) {
      int var2 = 0;
      int var3 = 256;

      do {
         int var4 = var2 + var3 >> 1;
         if(var0 >= var1[var4]) {
            var2 = var4;
         } else {
            var3 = var4;
         }
      } while(var3 - var2 != 1);

      return var2;
   }

   private static void xj(BZState var0) {
      var0.sb = 0;

      for(int var1 = 0; var1 < 256; ++var1) {
         if(var0.tb[var1]) {
            var0.vb[var0.sb] = (byte)var1;
            ++var0.sb;
         }
      }

   }

   private static void ak(int[] var0, int[] var1, int[] var2, byte[] var3, int var4, int var5, int var6) {
      int var7 = 0;

      int var8;
      for(var8 = var4; var8 <= var5; ++var8) {
         for(int var9 = 0; var9 < var6; ++var9) {
            if(var3[var9] == var8) {
               var2[var7] = var9;
               ++var7;
            }
         }
      }

      for(var8 = 0; var8 < 23; ++var8) {
         var1[var8] = 0;
      }

      for(var8 = 0; var8 < var6; ++var8) {
         ++var1[var3[var8] + 1];
      }

      for(var8 = 1; var8 < 23; ++var8) {
         var1[var8] += var1[var8 - 1];
      }

      for(var8 = 0; var8 < 23; ++var8) {
         var0[var8] = 0;
      }

      int var10 = 0;

      for(var8 = var4; var8 <= var5; ++var8) {
         var10 += var1[var8 + 1] - var1[var8];
         var0[var8] = var10 - 1;
         var10 <<= 1;
      }

      for(var8 = var4 + 1; var8 <= var5; ++var8) {
         var1[var8] = (var0[var8 - 1] + 1 << 1) - var1[var8];
      }

   }
}
