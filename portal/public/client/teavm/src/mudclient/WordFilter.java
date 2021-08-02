package mudclient;

// $FF: renamed from: a.g
public class WordFilter {

   // $FF: renamed from: a boolean
   static boolean field_995;
   // $FF: renamed from: b boolean
   static boolean field_996;
   // $FF: renamed from: c boolean
   static boolean field_997;
   // $FF: renamed from: d int
   static int field_998;
   // $FF: renamed from: e int[]
   static int[] field_999;
   // $FF: renamed from: f char[][]
   static char[][] field_1000;
   // $FF: renamed from: g byte[][][]
   static byte[][][] field_1001;
   // $FF: renamed from: h char[][]
   static char[][] field_1002;
   // $FF: renamed from: i byte[][][]
   static byte[][][] field_1003;
   // $FF: renamed from: j char[][]
   static char[][] field_1004;
   // $FF: renamed from: k int[]
   static int[] field_1005;
   // $FF: renamed from: l java.lang.String[]
   static String[] goodWords;


   // $FF: renamed from: a (a.d, a.d, a.d, a.d) void
   public static void loadFilters(Buffer var0, Buffer var1, Buffer var2, Buffer var3) {
      method_413(var1);
      method_414(var2);
      method_415(var0);
      method_412(var3);
   }

   // $FF: renamed from: a (a.d) void
   public static void method_412(Buffer var0) {
      int var5 = Packet.field_597;
      int var1 = var0.method_409();
      field_1004 = new char[var1][];
      field_1005 = new int[var1];
      int var2 = 0;
      if(var5 != 0 || var2 < var1) {
         do {
            field_1005[var2] = var0.method_407();
            char[] var3 = new char[var0.method_407()];
            int var4 = 0;
            if(var5 != 0) {
               var3[var4] = (char)var0.method_407();
               ++var4;
            }

            while(var4 < var3.length) {
               var3[var4] = (char)var0.method_407();
               ++var4;
            }

            field_1004[var2] = var3;
            ++var2;
         } while(var2 < var1);

      }
   }

   // $FF: renamed from: b (a.d) void
   public static void method_413(Buffer var0) {
      int var1 = var0.method_409();
      field_1000 = new char[var1][];
      field_1001 = new byte[var1][][];
      method_416(var0, field_1000, field_1001);
   }

   // $FF: renamed from: c (a.d) void
   public static void method_414(Buffer var0) {
      int var1 = var0.method_409();
      field_1002 = new char[var1][];
      field_1003 = new byte[var1][][];
      method_416(var0, field_1002, field_1003);
   }

   // $FF: renamed from: d (a.d) void
   public static void method_415(Buffer var0) {
      field_999 = new int[var0.method_409()];
      int var1 = 0;
      if(Packet.field_597 != 0 || var1 < field_999.length) {
         do {
            field_999[var1] = var0.method_408();
            ++var1;
         } while(var1 < field_999.length);

      }
   }

   // $FF: renamed from: a (a.d, char[][], byte[][][]) void
   public static void method_416(Buffer var0, char[][] var1, byte[][][] var2) {
      int var8 = Packet.field_597;
      int var3 = 0;
      if(var8 != 0 || var3 < var1.length) {
         do {
            char[] var4 = new char[var0.method_407()];
            int var5 = 0;
            if(var8 != 0) {
               var4[var5] = (char)var0.method_407();
               ++var5;
            }

            while(var5 < var4.length) {
               var4[var5] = (char)var0.method_407();
               ++var5;
            }

            var1[var3] = var4;
            byte[][] var6 = new byte[var0.method_409()][2];
            int var7 = 0;
            if(var8 != 0 || var7 < var6.length) {
               do {
                  var6[var7][0] = (byte)var0.method_407();
                  var6[var7][1] = (byte)var0.method_407();
                  ++var7;
               } while(var7 < var6.length);

               if(var6.length > 0) {
                  var2[var3] = var6;
               }

               ++var3;
            } else {
               if(var6.length > 0) {
                  var2[var3] = var6;
               }

               ++var3;
            }
         } while(var3 < var1.length);

      }
   }

   // $FF: renamed from: a (java.lang.String) java.lang.String
   public static String formatChat(String var0) {
      int var6 = Packet.field_597;
      char[] var1 = var0.toLowerCase().toCharArray();
      method_422(var1);
      method_420(var1);
      method_421(var1);
      method_431(var1);
      int var2 = 0;
      if(var6 == 0 && var2 >= goodWords.length) {
         if(field_997) {
            method_418(var0.toCharArray(), var1);
            method_419(var1);
         }

         return new String(var1);
      } else {
         do {
            int var3 = -1;
            if(var6 == 0 && (var3 = var0.indexOf(goodWords[var2], var3 + 1)) == -1) {
               ++var2;
            } else {
               do {
                  char[] var4 = goodWords[var2].toCharArray();
                  int var5 = 0;
                  if(var6 != 0 || var5 < var4.length) {
                     do {
                        var1[var5 + var3] = var4[var5];
                        ++var5;
                     } while(var5 < var4.length);
                  }
               } while((var3 = var0.indexOf(goodWords[var2], var3 + 1)) != -1);

               ++var2;
            }
         } while(var2 < goodWords.length);

         if(field_997) {
            method_418(var0.toCharArray(), var1);
            method_419(var1);
         }

         return new String(var1);
      }
   }

   // $FF: renamed from: a (char[], char[]) void
   public static void method_418(char[] var0, char[] var1) {
      int var2 = 0;
      if(Packet.field_597 != 0 || var2 < var0.length) {
         do {
            if(var1[var2] != 42 && method_439(var0[var2])) {
               var1[var2] = var0[var2];
            }

            ++var2;
         } while(var2 < var0.length);

      }
   }

   // $FF: renamed from: a (char[]) void
   public static void method_419(char[] var0) {
      int var4 = Packet.field_597;
      boolean var1 = true;
      int var2 = 0;
      if(var4 != 0 || var2 < var0.length) {
         do {
            label27: {
               char var3 = var0[var2];
               if(method_436(var3)) {
                  if(var1) {
                     if(!method_438(var3)) {
                        break label27;
                     }

                     var1 = false;
                     if(var4 == 0) {
                        break label27;
                     }
                  }

                  if(!method_439(var3)) {
                     break label27;
                  }

                  var0[var2] = (char)(var3 + 97 - 65);
                  if(var4 == 0) {
                     break label27;
                  }
               }

               var1 = true;
            }

            ++var2;
         } while(var2 < var0.length);

      }
   }

   // $FF: renamed from: b (char[]) void
   public static void method_420(char[] var0) {
      int var3 = Packet.field_597;
      int var1 = 0;
      if(var3 != 0 || var1 < 2) {
         do {
            int var2 = field_1000.length - 1;
            if(var3 == 0 && var2 < 0) {
               ++var1;
            } else {
               do {
                  method_426(var0, field_1000[var2], field_1001[var2]);
                  --var2;
               } while(var2 >= 0);

               ++var1;
            }
         } while(var1 < 2);

      }
   }

   // $FF: renamed from: c (char[]) void
   public static void method_421(char[] var0) {
      int var1 = field_1002.length - 1;
      if(Packet.field_597 != 0 || var1 >= 0) {
         do {
            method_426(var0, field_1002[var1], field_1003[var1]);
            --var1;
         } while(var1 >= 0);

      }
   }

   // $FF: renamed from: d (char[]) void
   public static void method_422(char[] var0) {
      char[] var1 = (char[])var0.clone();
      char[] var2 = new char[]{'d', 'o', 't'};
      method_426(var1, var2, (byte[][])null);
      char[] var3 = (char[])var0.clone();
      char[] var4 = new char[]{'s', 'l', 'a', 's', 'h'};
      method_426(var3, var4, (byte[][])null);
      int var5 = 0;
      if(Packet.field_597 != 0 || var5 < field_1004.length) {
         do {
            method_423(var0, var1, var3, field_1004[var5], field_1005[var5]);
            ++var5;
         } while(var5 < field_1004.length);

      }
   }

   // $FF: renamed from: a (char[], char[], char[], char[], int) void
   public static void method_423(char[] var0, char[] var1, char[] var2, char[] var3, int var4) {
      int var15 = Packet.field_597;
      if(var3.length <= var0.length) {
         int var5 = 0;
         if(var15 != 0 || var5 <= var0.length - var3.length) {
            do {
               int var6 = var5;
               int var7 = 0;
               boolean var8;
               if(var15 != 0 || var5 < var0.length) {
                  do {
                     var8 = false;
                     char var9 = var0[var6];
                     char var10 = 0;
                     if(var6 + 1 < var0.length) {
                        var10 = var0[var6 + 1];
                     }

                     int var16;
                     if(var7 < var3.length) {
                        if((var16 = method_428(var3[var7], var9, var10)) > 0) {
                           var6 += var16;
                           ++var7;
                           if(var15 == 0) {
                              continue;
                           }
                        }

                        if(var7 == 0) {
                           break;
                        }
                     } else if(var7 == 0) {
                        break;
                     }

                     if((var16 = method_428(var3[var7 - 1], var9, var10)) > 0) {
                        var6 += var16;
                        if(var15 == 0) {
                           continue;
                        }
                     }

                     if(var7 >= var3.length || !method_434(var9)) {
                        break;
                     }

                     ++var6;
                  } while(var6 < var0.length);
               }

               if(var7 >= var3.length) {
                  var8 = false;
                  int var17 = method_424(var0, var1, var5);
                  int var18 = method_425(var0, var2, var6 - 1);
                  if(field_995) {
                     System.out.println("Potential tld: " + new String(var3) + " at char " + var5 + " (type=" + var4 + ", startmatch=" + var17 + ", endmatch=" + var18 + ")");  // authentic System.out.println
                  }

                  if(var4 == 1 && var17 > 0 && var18 > 0) {
                     var8 = true;
                  }

                  if(var4 == 2 && (var17 > 2 && var18 > 0 || var17 > 0 && var18 > 2)) {
                     var8 = true;
                  }

                  if(var4 == 3 && var17 > 0 && var18 > 2) {
                     var8 = true;
                  }

                  if(var8) {
                     if(field_995) {
                        System.out.println("Filtered tld: " + new String(var3) + " at char " + var5); // authentic System.out.println
                     }

                     int var11 = var5;
                     int var12 = var6 - 1;
                     boolean var13;
                     int var14;
                     if(var17 > 2) {
                        if(var17 == 4) {
                           var13 = false;
                           var14 = var5 - 1;
                           if(var15 != 0 || var14 >= 0) {
                              do {
                                 label174: {
                                    if(var13) {
                                       if(var1[var14] != 42) {
                                          break;
                                       }

                                       var11 = var14;
                                       if(var15 == 0) {
                                          break label174;
                                       }
                                    }

                                    if(var1[var14] == 42) {
                                       var11 = var14;
                                       var13 = true;
                                    }
                                 }

                                 --var14;
                              } while(var14 >= 0);
                           }
                        }

                        var13 = false;
                        var14 = var11 - 1;
                        if(var15 != 0 || var14 >= 0) {
                           do {
                              label157: {
                                 if(var13) {
                                    if(method_434(var0[var14])) {
                                       break;
                                    }

                                    var11 = var14;
                                    if(var15 == 0) {
                                       break label157;
                                    }
                                 }

                                 if(!method_434(var0[var14])) {
                                    var13 = true;
                                    var11 = var14;
                                 }
                              }

                              --var14;
                           } while(var14 >= 0);
                        }
                     }

                     if(var18 > 2) {
                        if(var18 == 4) {
                           var13 = false;
                           var14 = var12 + 1;
                           if(var15 != 0 || var14 < var0.length) {
                              do {
                                 label136: {
                                    if(var13) {
                                       if(var2[var14] != 42) {
                                          break;
                                       }

                                       var12 = var14;
                                       if(var15 == 0) {
                                          break label136;
                                       }
                                    }

                                    if(var2[var14] == 42) {
                                       var12 = var14;
                                       var13 = true;
                                    }
                                 }

                                 ++var14;
                              } while(var14 < var0.length);
                           }
                        }

                        var13 = false;
                        var14 = var12 + 1;
                        if(var15 != 0 || var14 < var0.length) {
                           do {
                              label119: {
                                 if(var13) {
                                    if(method_434(var0[var14])) {
                                       break;
                                    }

                                    var12 = var14;
                                    if(var15 == 0) {
                                       break label119;
                                    }
                                 }

                                 if(!method_434(var0[var14])) {
                                    var13 = true;
                                    var12 = var14;
                                 }
                              }

                              ++var14;
                           } while(var14 < var0.length);
                        }
                     }

                     int var19 = var11;
                     if(var15 != 0 || var11 <= var12) {
                        do {
                           var0[var19] = 42;
                           ++var19;
                        } while(var19 <= var12);
                     }
                  }
               }

               ++var5;
            } while(var5 <= var0.length - var3.length);

         }
      }
   }

   // $FF: renamed from: a (char[], char[], int) int
   public static int method_424(char[] var0, char[] var1, int var2) {
      int var6 = Packet.field_597;
      if(var2 == 0) {
         return 2;
      } else {
         int var3 = var2 - 1;
         if(var6 != 0 || var3 >= 0) {
            while(method_434(var0[var3])) {
               if(var0[var3] == 44 || var0[var3] == 46) {
                  return 3;
               }

               --var3;
               if(var3 < 0) {
                  break;
               }
            }
         }

         int var4 = 0;
         int var5 = var2 - 1;
         if(var6 != 0 || var5 >= 0) {
            while(method_434(var1[var5])) {
               if(var1[var5] == 42) {
                  ++var4;
               }

               --var5;
               if(var5 < 0) {
                  break;
               }
            }
         }

         return var4 >= 3?4:(method_434(var0[var2 - 1])?1:0);
      }
   }

   // $FF: renamed from: b (char[], char[], int) int
   public static int method_425(char[] var0, char[] var1, int var2) {
      int var6 = Packet.field_597;
      if(var2 + 1 == var0.length) {
         return 2;
      } else {
         int var3 = var2 + 1;
         if(var6 != 0 || var3 < var0.length) {
            while(method_434(var0[var3])) {
               if(var0[var3] == 92 || var0[var3] == 47) {
                  return 3;
               }

               ++var3;
               if(var3 >= var0.length) {
                  break;
               }
            }
         }

         int var4 = 0;
         int var5 = var2 + 1;
         if(var6 != 0 || var5 < var0.length) {
            while(method_434(var1[var5])) {
               if(var1[var5] == 42) {
                  ++var4;
               }

               ++var5;
               if(var5 >= var0.length) {
                  break;
               }
            }
         }

         return var4 >= 5?4:(method_434(var0[var2 + 1])?1:0);
      }
   }

   // $FF: renamed from: a (char[], char[], byte[][]) void
   public static void method_426(char[] var0, char[] var1, byte[][] var2) {
      int var15 = Packet.field_597;
      if(var1.length <= var0.length) {
         int var3 = 0;
         if(var15 != 0 || var3 <= var0.length - var1.length) {
            do {
               int var4 = var3;
               int var5 = 0;
               boolean var6 = false;
               boolean var7;
               char var8;
               char var9;
               if(var15 != 0 || var3 < var0.length) {
                  do {
                     var7 = false;
                     var8 = var0[var4];
                     var9 = 0;
                     if(var4 + 1 < var0.length) {
                        var9 = var0[var4 + 1];
                     }

                     int var16;
                     if(var5 < var1.length) {
                        if((var16 = method_429(var1[var5], var8, var9)) > 0) {
                           var4 += var16;
                           ++var5;
                           if(var15 == 0) {
                              continue;
                           }
                        }

                        if(var5 == 0) {
                           break;
                        }
                     } else if(var5 == 0) {
                        break;
                     }

                     if((var16 = method_429(var1[var5 - 1], var8, var9)) > 0) {
                        var4 += var16;
                        if(var15 == 0) {
                           continue;
                        }
                     }

                     if(var5 >= var1.length || !method_435(var8)) {
                        break;
                     }

                     if(method_434(var8) && var8 != 39) {
                        var6 = true;
                     }

                     ++var4;
                  } while(var4 < var0.length);
               }

               if(var5 >= var1.length) {
                  var7 = true;
                  if(field_995) {
                     System.out.println("Potential word: " + new String(var1) + " at char " + var3); // authentic System.out.println
                  }

                  label249: {
                     if(!var6) {
                        var8 = 32;
                        if(var3 - 1 >= 0) {
                           var8 = var0[var3 - 1];
                        }

                        var9 = 32;
                        if(var4 < var0.length) {
                           var9 = var0[var4];
                        }

                        byte var10 = method_430(var8);
                        byte var11 = method_430(var9);
                        if(var2 == null || !method_427(var2, var10, var11)) {
                           break label249;
                        }

                        var7 = false;
                        if(var15 == 0) {
                           break label249;
                        }
                     }

                     boolean var17 = false;
                     boolean var20 = false;
                     if(var3 - 1 < 0 || method_434(var0[var3 - 1]) && var0[var3 - 1] != 39) {
                        var17 = true;
                     }

                     if(var4 >= var0.length || method_434(var0[var4]) && var0[var4] != 39) {
                        var20 = true;
                     }

                     if(!var17 || !var20) {
                        boolean var18;
                        label156: {
                           var18 = false;
                           int var21 = var3 - 2;
                           if(var17) {
                              var21 = var3;
                              if(var15 == 0 && (var18 || var3 >= var4)) {
                                 break label156;
                              }
                           } else if(var18 || var21 >= var4) {
                              break label156;
                           }

                           do {
                              if(var21 >= 0 && (!method_434(var0[var21]) || var0[var21] == 39)) {
                                 char[] var12 = new char[3];
                                 int var13 = 0;
                                 if(var15 != 0 || var13 < 3) {
                                    while(var21 + var13 < var0.length && (!method_434(var0[var21 + var13]) || var0[var21 + var13] == 39)) {
                                       var12[var13] = var0[var21 + var13];
                                       ++var13;
                                       if(var13 >= 3) {
                                          break;
                                       }
                                    }
                                 }

                                 boolean var14 = true;
                                 if(var13 == 0) {
                                    var14 = false;
                                 }

                                 if(var13 < 3 && var21 - 1 >= 0 && (!method_434(var0[var21 - 1]) || var0[var21 - 1] == 39)) {
                                    var14 = false;
                                 }

                                 if(var14 && !method_440(var12)) {
                                    var18 = true;
                                 }
                              }

                              ++var21;
                           } while(!var18 && var21 < var4);
                        }

                        if(!var18) {
                           var7 = false;
                        }
                     }
                  }

                  if(var7) {
                     if(field_996) {
                        System.out.println("Filtered word: " + new String(var1) + " at char " + var3); // authentic System.out.println
                     }

                     int var19 = var3;
                     if(var15 != 0 || var3 < var4) {
                        do {
                           var0[var19] = 42;
                           ++var19;
                        } while(var19 < var4);
                     }
                  }
               }

               ++var3;
            } while(var3 <= var0.length - var1.length);

         }
      }
   }

   // $FF: renamed from: a (byte[][], byte, byte) boolean
   public static boolean method_427(byte[][] var0, byte var1, byte var2) {
      int var3 = 0;
      if(var0[var3][0] == var1 && var0[var3][1] == var2) {
         return true;
      } else {
         int var4 = var0.length - 1;
         if(var0[var4][0] == var1 && var0[var4][1] == var2) {
            return true;
         } else {
            do {
               int var5 = (var3 + var4) / 2;
               if(var0[var5][0] == var1 && var0[var5][1] == var2) {
                  return true;
               }

               if(var1 < var0[var5][0] || var1 == var0[var5][0] && var2 < var0[var5][1]) {
                  var4 = var5;
                  if(Packet.field_597 == 0) {
                     continue;
                  }
               }

               var3 = var5;
            } while(var3 != var4 && var3 + 1 != var4);

            return false;
         }
      }
   }

   // $FF: renamed from: a (char, char, char) int
   public static int method_428(char var0, char var1, char var2) {
      return var0 == var1?1:(var0 == 101 && var1 == 51?1:(var0 == 116 && (var1 == 55 || var1 == 43)?1:(var0 == 97 && (var1 == 52 || var1 == 64)?1:(var0 == 111 && var1 == 48?1:(var0 == 105 && var1 == 49?1:(var0 == 115 && var1 == 53?1:(var0 == 102 && var1 == 112 && var2 == 104?2:(var0 == 103 && var1 == 57?1:0))))))));
   }

   // $FF: renamed from: b (char, char, char) int
   public static int method_429(char var0, char var1, char var2) {
      if(var0 == 42) {
         return 0;
      } else if(var0 == var1) {
         return 1;
      } else {
         if(var0 >= 97 && var0 <= 122) {
            if(var0 == 101) {
               if(var1 == 51) {
                  return 1;
               }

               return 0;
            }

            if(var0 == 116) {
               if(var1 == 55) {
                  return 1;
               }

               return 0;
            }

            if(var0 == 97) {
               if(var1 != 52 && var1 != 64) {
                  return 0;
               }

               return 1;
            }

            if(var0 == 111) {
               if(var1 != 48 && var1 != 42) {
                  if(var1 == 40 && var2 == 41) {
                     return 2;
                  }

                  return 0;
               }

               return 1;
            }

            if(var0 == 105) {
               if(var1 != 121 && var1 != 108 && var1 != 106 && var1 != 49 && var1 != 33 && var1 != 58 && var1 != 59) {
                  return 0;
               }

               return 1;
            }

            if(var0 == 110) {
               return 0;
            }

            if(var0 == 115) {
               if(var1 != 53 && var1 != 122 && var1 != 36) {
                  return 0;
               }

               return 1;
            }

            if(var0 == 114) {
               return 0;
            }

            if(var0 == 104) {
               return 0;
            }

            if(var0 == 108) {
               if(var1 == 49) {
                  return 1;
               }

               return 0;
            }

            if(var0 == 100) {
               return 0;
            }

            if(var0 == 99) {
               if(var1 == 40) {
                  return 1;
               }

               return 0;
            }

            if(var0 == 117) {
               if(var1 == 118) {
                  return 1;
               }

               return 0;
            }

            if(var0 == 109) {
               return 0;
            }

            if(var0 == 102) {
               if(var1 == 112 && var2 == 104) {
                  return 2;
               }

               return 0;
            }

            if(var0 == 112) {
               return 0;
            }

            if(var0 == 103) {
               if(var1 != 57 && var1 != 54) {
                  return 0;
               }

               return 1;
            }

            if(var0 == 119) {
               if(var1 == 118 && var2 == 118) {
                  return 2;
               }

               return 0;
            }

            if(var0 == 121) {
               return 0;
            }

            if(var0 == 98) {
               if(var1 == 49 && var2 == 51) {
                  return 2;
               }

               return 0;
            }

            if(var0 == 118) {
               return 0;
            }

            if(var0 == 107) {
               return 0;
            }

            if(var0 == 120) {
               if(var1 == 41 && var2 == 40) {
                  return 2;
               }

               return 0;
            }

            if(var0 == 106) {
               return 0;
            }

            if(var0 == 113) {
               return 0;
            }

            if(var0 == 122) {
               return 0;
            }
         }

         if(var0 >= 48 && var0 <= 57) {
            if(var0 == 48) {
               if(var1 != 111 && var1 != 79) {
                  if(var1 == 40 && var2 == 41) {
                     return 2;
                  }

                  return 0;
               }

               return 1;
            }

            if(var0 == 49) {
               if(var1 == 108) {
                  return 1;
               }

               return 0;
            }

            if(var0 == 50) {
               return 0;
            }

            if(var0 == 51) {
               return 0;
            }

            if(var0 == 52) {
               return 0;
            }

            if(var0 == 53) {
               return 0;
            }

            if(var0 == 54) {
               return 0;
            }

            if(var0 == 55) {
               return 0;
            }

            if(var0 == 56) {
               return 0;
            }

            if(var0 == 57) {
               return 0;
            }
         }

         if(var0 == 45) {
            return 0;
         } else if(var0 == 44) {
            return var1 == 46?1:0;
         } else if(var0 == 46) {
            return var1 == 44?1:0;
         } else if(var0 == 40) {
            return 0;
         } else if(var0 == 41) {
            return 0;
         } else if(var0 == 33) {
            return var1 == 105?1:0;
         } else if(var0 == 39) {
            return 0;
         } else {
            if(field_996) {
               System.out.println("Letter=" + var0 + " not matched"); // authentic System.out.println
            }

            return 0;
         }
      }
   }

   // $FF: renamed from: a (char) byte
   public static byte method_430(char var0) {
      return var0 >= 97 && var0 <= 122?(byte)(var0 - 97 + 1):(var0 == 39?28:(var0 >= 48 && var0 <= 57?(byte)(var0 - 48 + 29):27));
   }

   // $FF: renamed from: e (char[]) void
   public static void method_431(char[] var0) {
      int var10 = Packet.field_597;
      int var1 = 0;
      int var2 = 0;
      int var3 = 0;
      int var4 = 0;
      if(var10 != 0 || (var1 = method_432(var0, var2)) != -1) {
         do {
            boolean var5 = false;
            int var6 = var2;
            if(var10 != 0 || var2 >= 0 && var2 < var1 && !var5) {
               do {
                  if(!method_434(var0[var6]) && !method_435(var0[var6])) {
                     var5 = true;
                  }

                  ++var6;
               } while(var6 >= 0 && var6 < var1 && !var5);
            }

            if(var5) {
               var3 = 0;
            }

            if(var3 == 0) {
               var4 = var1;
            }

            var2 = method_433(var0, var1);
            int var7 = 0;
            int var8 = var1;
            if(var10 != 0) {
               var7 = var7 * 10 + var0[var1] - 48;
               var8 = var1 + 1;
            }

            while(var8 < var2) {
               var7 = var7 * 10 + var0[var8] - 48;
               ++var8;
            }

            label104: {
               if(var7 > 255 || var2 - var1 > 8) {
                  var3 = 0;
                  if(var10 == 0) {
                     break label104;
                  }
               }

               ++var3;
            }

            if(var3 == 4) {
               int var9 = var4;
               if(var10 != 0) {
                  var0[var4] = 42;
                  var9 = var4 + 1;
               }

               while(var9 < var2) {
                  var0[var9] = 42;
                  ++var9;
               }

               var3 = 0;
            }
         } while((var1 = method_432(var0, var2)) != -1);

      }
   }

   // $FF: renamed from: a (char[], int) int
   public static int method_432(char[] var0, int var1) {
      int var2 = var1;
      if(Packet.field_597 != 0 || var1 < var0.length && var1 >= 0) {
         do {
            if(var0[var2] >= 48 && var0[var2] <= 57) {
               return var2;
            }

            ++var2;
         } while(var2 < var0.length && var2 >= 0);
      }

      return -1;
   }

   // $FF: renamed from: b (char[], int) int
   public static int method_433(char[] var0, int var1) {
      int var2 = var1;
      if(Packet.field_597 == 0 && (var1 >= var0.length || var1 < 0)) {
         return var0.length;
      } else {
         do {
            if(var0[var2] < 48 || var0[var2] > 57) {
               return var2;
            }

            ++var2;
         } while(var2 < var0.length && var2 >= 0);

         return var0.length;
      }
   }

   // $FF: renamed from: b (char) boolean
   public static boolean method_434(char var0) {
      return !method_436(var0) && !method_437(var0);
   }

   // $FF: renamed from: c (char) boolean
   public static boolean method_435(char var0) {
      return var0 >= 97 && var0 <= 122?var0 == 118 || var0 == 120 || var0 == 106 || var0 == 113 || var0 == 122:true;
   }

   // $FF: renamed from: d (char) boolean
   public static boolean method_436(char var0) {
      return var0 >= 97 && var0 <= 122 || var0 >= 65 && var0 <= 90;
   }

   // $FF: renamed from: e (char) boolean
   public static boolean method_437(char var0) {
      return var0 >= 48 && var0 <= 57;
   }

   // $FF: renamed from: f (char) boolean
   public static boolean method_438(char var0) {
      return var0 >= 97 && var0 <= 122;
   }

   // $FF: renamed from: g (char) boolean
   public static boolean method_439(char var0) {
      return var0 >= 65 && var0 <= 90;
   }

   // $FF: renamed from: f (char[]) boolean
   public static boolean method_440(char[] var0) {
      int var7 = Packet.field_597;
      boolean var1 = true;
      int var2 = 0;
      if(var7 != 0) {
         if(!method_437(var0[var2]) && var0[var2] != 0) {
            var1 = false;
         }

         ++var2;
      }

      for(; var2 < var0.length; ++var2) {
         if(!method_437(var0[var2]) && var0[var2] != 0) {
            var1 = false;
         }
      }

      if(var1) {
         return true;
      } else {
         int var3 = word2hash(var0);
         int var4 = 0;
         int var5 = field_999.length - 1;
         if(var3 != field_999[var4] && var3 != field_999[var5]) {
            do {
               int var6 = (var4 + var5) / 2;
               if(var3 == field_999[var6]) {
                  return true;
               }

               if(var3 < field_999[var6]) {
                  var5 = var6;
                  if(var7 == 0) {
                     continue;
                  }
               }

               var4 = var6;
            } while(var4 != var5 && var4 + 1 != var5);

            return false;
         } else {
            return true;
         }
      }
   }

   // $FF: renamed from: g (char[]) int
   public static int word2hash(char[] var0) {
      int var4 = Packet.field_597;
      if(var0.length > 6) {
         return 0;
      } else {
         int var1 = 0;
         int var2 = 0;
         if(var4 == 0 && var2 >= var0.length) {
            return var1;
         } else {
            do {
               label56: {
                  char var3 = var0[var0.length - var2 - 1];
                  if(var3 >= 97 && var3 <= 122) {
                     var1 = var1 * 38 + var3 - 97 + 1;
                     if(var4 == 0) {
                        break label56;
                     }
                  }

                  if(var3 == 39) {
                     var1 = var1 * 38 + 27;
                     if(var4 == 0) {
                        break label56;
                     }
                  }

                  if(var3 >= 48 && var3 <= 57) {
                     var1 = var1 * 38 + var3 - 48 + 28;
                     if(var4 == 0) {
                        break label56;
                     }
                  }

                  if(var3 != 0) {
                     if(field_996) {
                        System.out.println("word2hash failed on " + new String(var0)); // authentic System.out.println
                     }

                     return 0;
                  }
               }

               ++var2;
            } while(var2 < var0.length);

            return var1;
         }
      }
   }

   // $FF: renamed from: <clinit> () void
   static {
      field_997 = true;
      field_998 = 3;
      goodWords = new String[]{"cook", "cook\'s", "cooks", "seeks", "sheet"};
   }
}
