package mudclient;


// $FF: renamed from: a.b
public class BZLib {

   // $FF: renamed from: a (byte[], int, byte[], int, int) int
   public static int method_397(byte[] var0, int var1, byte[] var2, int var3, int var4) {
      BZState var5 = new BZState();
      var5.field_952 = var2;
      var5.field_953 = var4;
      var5.field_957 = var0;
      var5.field_958 = 0;
      var5.field_954 = var3;
      var5.field_959 = var1;
      var5.field_966 = 0;
      var5.field_965 = 0;
      var5.field_955 = 0;
      var5.field_956 = 0;
      var5.field_960 = 0;
      var5.field_961 = 0;
      var5.field_968 = 0;
      method_399(var5);
      var1 -= var5.field_959;
      return var1;
   }

   // $FF: renamed from: a (a.c) void
   private static void method_398(BZState var0) {
      int var15 = Packet.field_597;
      byte var2 = var0.field_962;
      int var3 = var0.field_963;
      int var4 = var0.field_973;
      int var5 = var0.field_971;
      int[] var6 = BZState.field_976;
      int var7 = var0.field_970;
      byte[] var8 = var0.field_957;
      int var9 = var0.field_958;
      int var10 = var0.field_959;
      int var12 = var0.field_990 + 1;

      label114:
      while(true) {
         if(var3 > 0) {
            do {
               if(var10 == 0) {
                  break label114;
               }

               if(var3 == 1) {
                  break;
               }

               var8[var9] = var2;
               --var3;
               ++var9;
               --var10;
            } while(var15 == 0);

            if(var10 == 0) {
               var3 = 1;
               if(var15 == 0) {
                  break;
               }
            }

            var8[var9] = var2;
            ++var9;
            --var10;
         }

         boolean var14 = true;
         byte var1;
         if(var15 != 0) {
            label121: {
               var14 = false;
               if(var4 == var12) {
                  var3 = 0;
                  if(var15 == 0) {
                     break;
                  }
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
                     if(var15 == 0) {
                        break;
                     }
                  }

                  var8[var9] = var2;
                  ++var9;
                  --var10;
                  var14 = true;
                  if(var15 == 0) {
                     break label121;
                  }
               }

               if(var4 == var12) {
                  if(var10 == 0) {
                     var3 = 1;
                     if(var15 == 0) {
                        break;
                     }
                  }

                  var8[var9] = var2;
                  ++var9;
                  --var10;
                  var14 = true;
               }
            }
         }

         while(var14) {
            var14 = false;
            if(var4 == var12) {
               var3 = 0;
               if(var15 == 0) {
                  break label114;
               }
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
                  if(var15 == 0) {
                     break label114;
                  }
               }

               var8[var9] = var2;
               ++var9;
               --var10;
               var14 = true;
               if(var15 == 0) {
                  continue;
               }
            }

            if(var4 == var12) {
               if(var10 == 0) {
                  var3 = 1;
                  if(var15 == 0) {
                     break label114;
                  }
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
               if(var15 == 0) {
                  continue;
               }
            }

            var3 = 3;
            var7 = var6[var7];
            var1 = (byte)(var7 & 255);
            var7 >>= 8;
            ++var4;
            if(var4 != var12) {
               if(var1 != var5) {
                  var5 = var1;
                  if(var15 == 0) {
                     continue;
                  }
               }

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

         if(var15 != 0) {
            break;
         }
      }

      int var13 = var0.field_960;
      var0.field_960 += var10 - var10;
      if(var0.field_960 < var13) {
         ++var0.field_961;
      }

      var0.field_962 = var2;
      var0.field_963 = var3;
      var0.field_973 = var4;
      var0.field_971 = var5;
      BZState.field_976 = var6;
      var0.field_970 = var7;
      var0.field_957 = var8;
      var0.field_958 = var9;
      var0.field_959 = var10;
   }

   // $FF: renamed from: b (a.c) void
   private static void method_399(BZState var0) {
      int var42 = Packet.field_597;
      int var23 = 0;
      int[] var24 = null;
      int[] var25 = null;
      int[] var26 = null;
      var0.field_967 = 1;
      if(BZState.field_976 == null) {
         BZState.field_976 = new int[var0.field_967 * 100000];
      }

      boolean var27 = true;

      while(var27) {
         byte var1 = method_400(var0);
         if(var1 == 23) {
            return;
         }

         label564: {
            var1 = method_400(var0);
            var1 = method_400(var0);
            var1 = method_400(var0);
            var1 = method_400(var0);
            var1 = method_400(var0);
            ++var0.field_968;
            var1 = method_400(var0);
            var1 = method_400(var0);
            var1 = method_400(var0);
            var1 = method_400(var0);
            var1 = method_401(var0);
            if(var1 != 0) {
               var0.field_964 = true;
               if(var42 == 0) {
                  break label564;
               }
            }

            var0.field_964 = false;
         }

         if(var0.field_964) {
            System.out.println("PANIC! RANDOMISED BLOCK!"); // authentic System.out.println
         }

         var0.field_969 = 0;
         var1 = method_400(var0);
         var0.field_969 = var0.field_969 << 8 | var1 & 255;
         var1 = method_400(var0);
         var0.field_969 = var0.field_969 << 8 | var1 & 255;
         var1 = method_400(var0);
         var0.field_969 = var0.field_969 << 8 | var1 & 255;
         int var43 = 0;
         if(var42 != 0 || var43 < 16) {
            do {
               label540: {
                  var1 = method_401(var0);
                  if(var1 == 1) {
                     var0.field_979[var43] = true;
                     if(var42 == 0) {
                        break label540;
                     }
                  }

                  var0.field_979[var43] = false;
               }

               ++var43;
            } while(var43 < 16);
         }

         var43 = 0;
         if(var42 != 0) {
            var0.field_978[var43] = false;
            ++var43;
         }

         while(var43 < 256) {
            var0.field_978[var43] = false;
            ++var43;
         }

         var43 = 0;
         int var44;
         if(var42 != 0 || var43 < 16) {
            do {
               if(var0.field_979[var43]) {
                  var44 = 0;
                  if(var42 != 0 || var44 < 16) {
                     do {
                        var1 = method_401(var0);
                        if(var1 == 1) {
                           var0.field_978[var43 * 16 + var44] = true;
                        }

                        ++var44;
                     } while(var44 < 16);
                  }
               }

               ++var43;
            } while(var43 < 16);
         }

         method_403(var0);
         int var46 = var0.field_977 + 2;
         int var47 = method_402(3, var0);
         int var48 = method_402(15, var0);
         var43 = 0;
         if(var42 != 0) {
            var44 = 0;

            while(true) {
               var1 = method_401(var0);
               if(var1 != 0) {
                  ++var44;
                  if(var42 == 0) {
                     continue;
                  }
               }

               var0.field_984[var43] = (byte)var44;
               ++var43;
               break;
            }
         }

         while(var43 < var48) {
            var44 = 0;

            while(true) {
               var1 = method_401(var0);
               if(var1 != 0) {
                  ++var44;
                  if(var42 == 0) {
                     continue;
                  }
               }

               var0.field_984[var43] = (byte)var44;
               ++var43;
               break;
            }
         }

         byte[] var28 = new byte[6];
         byte var30 = 0;
         if(var42 != 0 || var30 < var47) {
            do {
               var28[var30] = var30++;
            } while(var30 < var47);
         }

         var43 = 0;
         byte var29;
         if(var42 != 0) {
            var30 = var0.field_984[var43];
            var29 = var28[var30];
            if(var42 == 0 && var30 <= 0) {
               var28[0] = var29;
               var0.field_983[var43] = var29;
               ++var43;
            } else {
               while(true) {
                  var28[var30] = var28[var30 - 1];
                  --var30;
                  if(var30 <= 0) {
                     var28[0] = var29;
                     var0.field_983[var43] = var29;
                     ++var43;
                     break;
                  }
               }
            }
         }

         while(var43 < var48) {
            var30 = var0.field_984[var43];
            var29 = var28[var30];
            if(var42 == 0 && var30 <= 0) {
               var28[0] = var29;
               var0.field_983[var43] = var29;
               ++var43;
            } else {
               do {
                  var28[var30] = var28[var30 - 1];
                  --var30;
               } while(var30 > 0);

               var28[0] = var29;
               var0.field_983[var43] = var29;
               ++var43;
            }
         }

         int var45 = 0;
         if(var42 != 0 || var45 < var47) {
            do {
               int var58 = method_402(5, var0);
               var43 = 0;
               if(var42 == 0 && var43 >= var46) {
                  ++var45;
               } else {
                  do {
                     while(true) {
                        var1 = method_401(var0);
                        if(var1 != 0) {
                           var1 = method_401(var0);
                           if(var1 == 0) {
                              ++var58;
                              if(var42 == 0) {
                                 continue;
                              }
                           }

                           --var58;
                           if(var42 == 0) {
                              continue;
                           }
                        }

                        var0.field_985[var45][var43] = (byte)var58;
                        ++var43;
                        break;
                     }
                  } while(var43 < var46);

                  ++var45;
               }
            } while(var45 < var47);
         }

         var45 = 0;
         byte var2;
         byte var3;
         if(var42 != 0) {
            var2 = 32;
            var3 = 0;
            var43 = 0;
            if(var42 == 0 && var43 >= var46) {
               method_404(var0.field_986[var45], var0.field_987[var45], var0.field_988[var45], var0.field_985[var45], var2, var3, var46);
               var0.field_989[var45] = var2;
               ++var45;
            } else {
               while(true) {
                  if(var0.field_985[var45][var43] > var3) {
                     var3 = var0.field_985[var45][var43];
                  }

                  if(var0.field_985[var45][var43] < var2) {
                     var2 = var0.field_985[var45][var43];
                  }

                  ++var43;
                  if(var43 >= var46) {
                     method_404(var0.field_986[var45], var0.field_987[var45], var0.field_988[var45], var0.field_985[var45], var2, var3, var46);
                     var0.field_989[var45] = var2;
                     ++var45;
                     break;
                  }
               }
            }
         }

         while(var45 < var47) {
            var2 = 32;
            var3 = 0;
            var43 = 0;
            if(var42 == 0 && var43 >= var46) {
               method_404(var0.field_986[var45], var0.field_987[var45], var0.field_988[var45], var0.field_985[var45], var2, var3, var46);
               var0.field_989[var45] = var2;
               ++var45;
            } else {
               do {
                  if(var0.field_985[var45][var43] > var3) {
                     var3 = var0.field_985[var45][var43];
                  }

                  if(var0.field_985[var45][var43] < var2) {
                     var2 = var0.field_985[var45][var43];
                  }

                  ++var43;
               } while(var43 < var46);

               method_404(var0.field_986[var45], var0.field_987[var45], var0.field_988[var45], var0.field_985[var45], var2, var3, var46);
               var0.field_989[var45] = var2;
               ++var45;
            }
         }

         int var49 = var0.field_977 + 1;
         int var50 = -1;
         byte var51 = 0;
         var43 = 0;
         if(var42 != 0 || var43 <= 255) {
            do {
               var0.field_972[var43] = 0;
               ++var43;
            } while(var43 <= 255);
         }

         int var33 = 4095;
         int var31 = 15;
         int var32;
         if(var42 != 0) {
            var32 = 15;
            if(var42 == 0 && var32 < 0) {
               var0.field_982[var31] = var33 + 1;
               --var31;
            } else {
               while(true) {
                  var0.field_981[var33] = (byte)(var31 * 16 + var32);
                  --var33;
                  --var32;
                  if(var32 < 0) {
                     var0.field_982[var31] = var33 + 1;
                     --var31;
                     break;
                  }
               }
            }
         }

         while(var31 >= 0) {
            var32 = 15;
            if(var42 == 0 && var32 < 0) {
               var0.field_982[var31] = var33 + 1;
               --var31;
            } else {
               do {
                  var0.field_981[var33] = (byte)(var31 * 16 + var32);
                  --var33;
                  --var32;
               } while(var32 >= 0);

               var0.field_982[var31] = var33 + 1;
               --var31;
            }
         }

         int var55 = 0;
         byte var62;
         if(var51 == 0) {
            ++var50;
            var51 = 50;
            var62 = var0.field_983[var50];
            var23 = var0.field_989[var62];
            var24 = var0.field_986[var62];
            var26 = var0.field_988[var62];
            var25 = var0.field_987[var62];
         }

         int var52 = var51 - 1;
         int var59 = var23;
         int var60 = method_402(var23, var0);

         byte var61;
         while(var60 > var24[var59]) {
            ++var59;
            var61 = method_401(var0);
            var60 = var60 << 1 | var61;
            if(var42 != 0) {
               break;
            }
         }

         int var53 = var26[var60 - var25[var59]];

         while(var53 != var49) {
            if(var53 == 0 || var53 == 1) {
               int var56 = -1;
               int var57 = 1;

               do {
                  do {
                     label283: {
                        if(var53 == 0) {
                           var56 += var57;
                           if(var42 == 0) {
                              break label283;
                           }
                        }

                        if(var53 == 1) {
                           var56 += 2 * var57;
                        }
                     }

                     var57 *= 2;
                     if(var52 == 0) {
                        ++var50;
                        var52 = 50;
                        var62 = var0.field_983[var50];
                        var23 = var0.field_989[var62];
                        var24 = var0.field_986[var62];
                        var26 = var0.field_988[var62];
                        var25 = var0.field_987[var62];
                     }

                     --var52;
                     var59 = var23;
                     var60 = method_402(var23, var0);

                     while(var60 > var24[var59]) {
                        ++var59;
                        var61 = method_401(var0);
                        var60 = var60 << 1 | var61;
                        if(var42 != 0) {
                           break;
                        }
                     }

                     var53 = var26[var60 - var25[var59]];
                  } while(var53 == 0);
               } while(var53 == 1);

               ++var56;
               var1 = var0.field_980[var0.field_981[var0.field_982[0]] & 255];
               var0.field_972[var1 & 255] += var56;
               if(var42 != 0 || var56 > 0) {
                  do {
                     BZState.field_976[var55] = var1 & 255;
                     ++var55;
                     --var56;
                  } while(var56 > 0);
               }

               if(var42 == 0) {
                  continue;
               }
            }

            label605: {
               int var40 = var53 - 1;
               int var37;
               if(var40 < 16) {
                  var37 = var0.field_982[0];
                  var1 = var0.field_981[var37 + var40];
                  if(var42 != 0 || var40 > 3) {
                     do {
                        int var41 = var37 + var40;
                        var0.field_981[var41] = var0.field_981[var41 - 1];
                        var0.field_981[var41 - 1] = var0.field_981[var41 - 2];
                        var0.field_981[var41 - 2] = var0.field_981[var41 - 3];
                        var0.field_981[var41 - 3] = var0.field_981[var41 - 4];
                        var40 -= 4;
                     } while(var40 > 3);
                  }

                  if(var42 != 0 || var40 > 0) {
                     do {
                        var0.field_981[var37 + var40] = var0.field_981[var37 + var40 - 1];
                        --var40;
                     } while(var40 > 0);
                  }

                  var0.field_981[var37] = var1;
                  if(var42 == 0) {
                     break label605;
                  }
               }

               int var38 = var40 / 16;
               int var39 = var40 % 16;
               var37 = var0.field_982[var38] + var39;
               var1 = var0.field_981[var37];
               if(var42 != 0 || var37 > var0.field_982[var38]) {
                  do {
                     var0.field_981[var37] = var0.field_981[var37 - 1];
                     --var37;
                  } while(var37 > var0.field_982[var38]);
               }

               ++var0.field_982[var38];
               if(var42 != 0 || var38 > 0) {
                  do {
                     --var0.field_982[var38];
                     var0.field_981[var0.field_982[var38]] = var0.field_981[var0.field_982[var38 - 1] + 16 - 1];
                     --var38;
                  } while(var38 > 0);
               }

               --var0.field_982[0];
               var0.field_981[var0.field_982[0]] = var1;
               if(var0.field_982[0] == 0) {
                  int var36 = 4095;
                  int var34 = 15;
                  if(var42 != 0 || var34 >= 0) {
                     do {
                        int var35 = 15;
                        if(var42 == 0 && var35 < 0) {
                           var0.field_982[var34] = var36 + 1;
                           --var34;
                        } else {
                           do {
                              var0.field_981[var36] = var0.field_981[var0.field_982[var34] + var35];
                              --var36;
                              --var35;
                           } while(var35 >= 0);

                           var0.field_982[var34] = var36 + 1;
                           --var34;
                        }
                     } while(var34 >= 0);
                  }
               }
            }

            ++var0.field_972[var0.field_980[var1 & 255] & 255];
            BZState.field_976[var55] = var0.field_980[var1 & 255] & 255;
            ++var55;
            if(var52 == 0) {
               ++var50;
               var52 = 50;
               var62 = var0.field_983[var50];
               var23 = var0.field_989[var62];
               var24 = var0.field_986[var62];
               var26 = var0.field_988[var62];
               var25 = var0.field_987[var62];
            }

            --var52;
            var59 = var23;
            var60 = method_402(var23, var0);

            while(var60 > var24[var59]) {
               ++var59;
               var61 = method_401(var0);
               var60 = var60 << 1 | var61;
               if(var42 != 0) {
                  break;
               }
            }

            var53 = var26[var60 - var25[var59]];
            if(var42 != 0) {
               break;
            }
         }

         var0.field_963 = 0;
         var0.field_962 = 0;
         var0.field_974[0] = 0;
         var43 = 1;
         if(var42 != 0) {
            var0.field_974[var43] = var0.field_972[var43 - 1];
            ++var43;
         }

         while(var43 <= 256) {
            var0.field_974[var43] = var0.field_972[var43 - 1];
            ++var43;
         }

         var43 = 1;
         if(var42 != 0 || var43 <= 256) {
            do {
               var0.field_974[var43] += var0.field_974[var43 - 1];
               ++var43;
            } while(var43 <= 256);
         }

         var43 = 0;
         if(var42 != 0) {
            var1 = (byte)(BZState.field_976[var43] & 255);
            BZState.field_976[var0.field_974[var1 & 255]] |= var43 << 8;
            ++var0.field_974[var1 & 255];
            ++var43;
         }

         while(var43 < var55) {
            var1 = (byte)(BZState.field_976[var43] & 255);
            BZState.field_976[var0.field_974[var1 & 255]] |= var43 << 8;
            ++var0.field_974[var1 & 255];
            ++var43;
         }

         var0.field_970 = BZState.field_976[var0.field_969] >> 8;
         var0.field_973 = 0;
         var0.field_970 = BZState.field_976[var0.field_970];
         var0.field_971 = (byte)(var0.field_970 & 255);
         var0.field_970 >>= 8;
         ++var0.field_973;
         var0.field_990 = var55;
         method_398(var0);
         if(var0.field_973 == var0.field_990 + 1 && var0.field_963 == 0) {
            var27 = true;
            if(var42 == 0) {
               continue;
            }
         }

         var27 = false;
      }

   }

   // $FF: renamed from: c (a.c) byte
   private static byte method_400(BZState var0) {
      return (byte)method_402(8, var0);
   }

   // $FF: renamed from: d (a.c) byte
   private static byte method_401(BZState var0) {
      return (byte)method_402(1, var0);
   }

   // $FF: renamed from: a (int, a.c) int
   private static int method_402(int var0, BZState var1) {
      while(true) {
         if(var1.field_966 >= var0) {
            int var3 = var1.field_965 >> var1.field_966 - var0 & (1 << var0) - 1;
            var1.field_966 -= var0;
            if(Packet.field_597 == 0) {
               return var3;
            }
         }

         var1.field_965 = var1.field_965 << 8 | var1.field_952[var1.field_953] & 255;
         var1.field_966 += 8;
         ++var1.field_953;
         --var1.field_954;
         ++var1.field_955;
         if(var1.field_955 == 0) {
            ++var1.field_956;
         }
      }
   }

   // $FF: renamed from: e (a.c) void
   private static void method_403(BZState var0) {
      var0.field_977 = 0;
      int var1 = 0;
      if(Packet.field_597 != 0 || var1 < 256) {
         do {
            if(var0.field_978[var1]) {
               var0.field_980[var0.field_977] = (byte)var1;
               ++var0.field_977;
            }

            ++var1;
         } while(var1 < 256);

      }
   }

   // $FF: renamed from: a (int[], int[], int[], byte[], int, int, int) void
   private static void method_404(int[] var0, int[] var1, int[] var2, byte[] var3, int var4, int var5, int var6) {
      int var11 = Packet.field_597;
      int var7 = 0;
      int var8 = var4;
      int var9;
      if(var11 != 0) {
         var9 = 0;
         if(var11 == 0 && var9 >= var6) {
            var8 = var4 + 1;
         } else {
            while(true) {
               if(var3[var9] == var8) {
                  var2[var7] = var9;
                  ++var7;
               }

               ++var9;
               if(var9 >= var6) {
                  ++var8;
                  break;
               }
            }
         }
      }

      while(var8 <= var5) {
         var9 = 0;
         if(var11 == 0 && var9 >= var6) {
            ++var8;
         } else {
            do {
               if(var3[var9] == var8) {
                  var2[var7] = var9;
                  ++var7;
               }

               ++var9;
            } while(var9 < var6);

            ++var8;
         }
      }

      var8 = 0;
      if(var11 != 0 || var8 < 23) {
         do {
            var1[var8] = 0;
            ++var8;
         } while(var8 < 23);
      }

      var8 = 0;
      if(var11 != 0) {
         ++var1[var3[var8] + 1];
         ++var8;
      }

      while(var8 < var6) {
         ++var1[var3[var8] + 1];
         ++var8;
      }

      var8 = 1;
      if(var11 != 0 || var8 < 23) {
         do {
            var1[var8] += var1[var8 - 1];
            ++var8;
         } while(var8 < 23);
      }

      var8 = 0;
      if(var11 != 0) {
         var0[var8] = 0;
         ++var8;
      }

      while(var8 < 23) {
         var0[var8] = 0;
         ++var8;
      }

      int var10 = 0;
      var8 = var4;
      if(var11 != 0 || var4 <= var5) {
         do {
            var10 += var1[var8 + 1] - var1[var8];
            var0[var8] = var10 - 1;
            var10 <<= 1;
            ++var8;
         } while(var8 <= var5);
      }

      var8 = var4 + 1;
      if(var11 != 0 || var8 <= var5) {
         do {
            var1[var8] = (var0[var8 - 1] + 1 << 1) - var1[var8];
            ++var8;
         } while(var8 <= var5);

      }
   }
}
