package mudclient;

import java.io.IOException;

// $FF: renamed from: f / class_14
public class World {

   // $FF: renamed from: a boolean
   boolean field_820;
   // $FF: renamed from: b boolean
   boolean field_821;
   // $FF: renamed from: c a.a.g
   Surface surface;
   // $FF: renamed from: d a.a.j
   Scene field_823;
   // $FF: renamed from: e int
   int baseMediaSprite;
   // $FF: renamed from: f int
   final int field_825;
   // $FF: renamed from: g int
   final int field_826;
   // $FF: renamed from: h int[]
   int[] terrainColours;
   // $FF: renamed from: i byte[]
   byte[] landscapePack;
   // $FF: renamed from: j byte[]
   byte[] mapPack;
   // $FF: renamed from: k byte[]
   byte[] memberLandscapePack;
   // $FF: renamed from: l byte[]
   byte[] memberMapPack;
   // $FF: renamed from: m byte[][]
   byte[][] terrainHeight;
   // $FF: renamed from: n byte[][]
   byte[][] terrainColour;
   // $FF: renamed from: o byte[][]
   byte[][] wallsEastwest;
   // $FF: renamed from: p byte[][]
   byte[][] wallsNorthSouth;
   // $FF: renamed from: q byte[][]
   byte[][] wallsRoof;
   // $FF: renamed from: r byte[][]
   byte[][] tileDecoration;
   // $FF: renamed from: s byte[][]
   byte[][] tileDirection;
   // $FF: renamed from: t int[][]
   int[][] wallsDiagonal;
   // $FF: renamed from: u int
   int field_840;
   // $FF: renamed from: v int
   int field_841;
   // $FF: renamed from: w int[]
   int[] localX;
   // $FF: renamed from: x int[]
   int[] localY;
   // $FF: renamed from: y int[][]
   int[][] field_844;
   // $FF: renamed from: z int[][]
   int[][] objectTileDirections;
   // $FF: renamed from: A int[][]
   int[][] terrainHeightLocal;
   // $FF: renamed from: B boolean
   boolean playerAlive;
   // $FF: renamed from: C a.a.f[]
   GameModel[] terrainModels;
   // $FF: renamed from: D a.a.f[][]
   GameModel[][] wallModels;
   // $FF: renamed from: E a.a.f[][]
   GameModel[][] roofModels;
   // $FF: renamed from: F a.a.f
   GameModel parentModel;


   // $FF: renamed from: <init> (a.a.j, a.a.g) void
   public World(Scene var1, Surface var2) {
      super();
      int var7 = GameData.field_563;
      this.field_820 = false;
      this.field_821 = true;
      this.baseMediaSprite = 750;
      this.field_825 = 12345678;
      this.field_826 = 128;
      this.terrainColours = new int[256];
      this.terrainHeight = new byte[4][2304];
      this.terrainColour = new byte[4][2304];
      this.wallsEastwest = new byte[4][2304];
      this.wallsNorthSouth = new byte[4][2304];
      this.wallsRoof = new byte[4][2304];
      this.tileDecoration = new byte[4][2304];
      this.tileDirection = new byte[4][2304];
      this.wallsDiagonal = new int[4][2304];
      this.field_840 = 96;
      this.field_841 = 96;
      this.localX = new int[this.field_840 * this.field_841 * 2];
      this.localY = new int[this.field_840 * this.field_841 * 2];
      this.field_844 = new int[this.field_840][this.field_841];
      this.objectTileDirections = new int[this.field_840][this.field_841];
      this.terrainHeightLocal = new int[this.field_840][this.field_841];
      this.playerAlive = false;
      this.terrainModels = new GameModel[64];
      this.wallModels = new GameModel[4][64];
      this.roofModels = new GameModel[4][64];
      this.field_823 = var1;
      this.surface = var2;
      int var3 = 0;
      if(var7 != 0 || var3 < 64) {
         do {
            this.terrainColours[var3] = Scene.method_212(255 - var3 * 4, 255 - (int)((double)var3 * 1.75D), 255 - var3 * 4);
            ++var3;
         } while(var3 < 64);
      }

      int var4 = 0;
      if(var7 != 0) {
         this.terrainColours[var4 + 64] = Scene.method_212(var4 * 3, 144, 0);
         ++var4;
      }

      while(var4 < 64) {
         this.terrainColours[var4 + 64] = Scene.method_212(var4 * 3, 144, 0);
         ++var4;
      }

      int var5 = 0;
      if(var7 != 0 || var5 < 64) {
         do {
            this.terrainColours[var5 + 128] = Scene.method_212(192 - (int)((double)var5 * 1.5D), 144 - (int)((double)var5 * 1.5D), 0);
            ++var5;
         } while(var5 < 64);
      }

      int var6 = 0;
      if(var7 != 0 || var6 < 64) {
         do {
            this.terrainColours[var6 + 192] = Scene.method_212(96 - (int)((double)var6 * 1.5D), 48 + (int)((double)var6 * 1.5D), 0);
            ++var6;
         } while(var6 < 64);

      }
   }

   // $FF: renamed from: a (int, int, int, int, int, int, int[], int[], boolean) int
   public int method_321(int var1, int var2, int var3, int var4, int var5, int var6, int[] var7, int[] var8, boolean var9) {
      int var19 = GameData.field_563;
      int var10 = 0;
      int var11;
      if(var19 != 0) {
         var11 = 0;
         if(var19 == 0 && var11 >= this.field_841) {
            ++var10;
         } else {
            while(true) {
               this.field_844[var10][var11] = 0;
               ++var11;
               if(var11 >= this.field_841) {
                  ++var10;
                  break;
               }
            }
         }
      }

      while(var10 < this.field_840) {
         var11 = 0;
         if(var19 == 0 && var11 >= this.field_841) {
            ++var10;
         } else {
            do {
               this.field_844[var10][var11] = 0;
               ++var11;
            } while(var11 < this.field_841);

            ++var10;
         }
      }

      byte var20 = 0;
      int var12 = 0;
      int var13 = var1;
      int var14 = var2;
      this.field_844[var1][var2] = 99;
      var7[var20] = var1;
      var11 = var20 + 1;
      var8[var20] = var2;
      int var15 = var7.length;
      boolean var16 = false;
      if(var19 != 0 || var12 != var11) {
         do {
            var13 = var7[var12];
            var14 = var8[var12];
            var12 = (var12 + 1) % var15;
            if(var13 >= var3 && var13 <= var5 && var14 >= var4 && var14 <= var6) {
               var16 = true;
               if(var19 == 0) {
                  break;
               }
            }

            if(var9) {
               if(var13 > 0 && var13 - 1 >= var3 && var13 - 1 <= var5 && var14 >= var4 && var14 <= var6 && (this.objectTileDirections[var13 - 1][var14] & 8) == 0) {
                  var16 = true;
                  if(var19 == 0) {
                     break;
                  }
               }

               if(var13 < this.field_840 - 1 && var13 + 1 >= var3 && var13 + 1 <= var5 && var14 >= var4 && var14 <= var6 && (this.objectTileDirections[var13 + 1][var14] & 2) == 0) {
                  var16 = true;
                  if(var19 == 0) {
                     break;
                  }
               }

               if(var14 > 0 && var13 >= var3 && var13 <= var5 && var14 - 1 >= var4 && var14 - 1 <= var6 && (this.objectTileDirections[var13][var14 - 1] & 4) == 0) {
                  var16 = true;
                  if(var19 == 0) {
                     break;
                  }
               }

               if(var14 < this.field_841 - 1 && var13 >= var3 && var13 <= var5 && var14 + 1 >= var4 && var14 + 1 <= var6 && (this.objectTileDirections[var13][var14 + 1] & 1) == 0) {
                  var16 = true;
                  if(var19 == 0) {
                     break;
                  }
               }
            }

            if(var13 > 0 && this.field_844[var13 - 1][var14] == 0 && (this.objectTileDirections[var13 - 1][var14] & 120) == 0) {
               var7[var11] = var13 - 1;
               var8[var11] = var14;
               var11 = (var11 + 1) % var15;
               this.field_844[var13 - 1][var14] = 2;
            }

            if(var13 < this.field_840 - 1 && this.field_844[var13 + 1][var14] == 0 && (this.objectTileDirections[var13 + 1][var14] & 114) == 0) {
               var7[var11] = var13 + 1;
               var8[var11] = var14;
               var11 = (var11 + 1) % var15;
               this.field_844[var13 + 1][var14] = 8;
            }

            if(var14 > 0 && this.field_844[var13][var14 - 1] == 0 && (this.objectTileDirections[var13][var14 - 1] & 116) == 0) {
               var7[var11] = var13;
               var8[var11] = var14 - 1;
               var11 = (var11 + 1) % var15;
               this.field_844[var13][var14 - 1] = 1;
            }

            if(var14 < this.field_841 - 1 && this.field_844[var13][var14 + 1] == 0 && (this.objectTileDirections[var13][var14 + 1] & 113) == 0) {
               var7[var11] = var13;
               var8[var11] = var14 + 1;
               var11 = (var11 + 1) % var15;
               this.field_844[var13][var14 + 1] = 4;
            }

            if(var13 > 0 && var14 > 0 && (this.objectTileDirections[var13][var14 - 1] & 116) == 0 && (this.objectTileDirections[var13 - 1][var14] & 120) == 0 && (this.objectTileDirections[var13 - 1][var14 - 1] & 124) == 0 && this.field_844[var13 - 1][var14 - 1] == 0) {
               var7[var11] = var13 - 1;
               var8[var11] = var14 - 1;
               var11 = (var11 + 1) % var15;
               this.field_844[var13 - 1][var14 - 1] = 3;
            }

            if(var13 < this.field_840 - 1 && var14 > 0 && (this.objectTileDirections[var13][var14 - 1] & 116) == 0 && (this.objectTileDirections[var13 + 1][var14] & 114) == 0 && (this.objectTileDirections[var13 + 1][var14 - 1] & 118) == 0 && this.field_844[var13 + 1][var14 - 1] == 0) {
               var7[var11] = var13 + 1;
               var8[var11] = var14 - 1;
               var11 = (var11 + 1) % var15;
               this.field_844[var13 + 1][var14 - 1] = 9;
            }

            if(var13 > 0 && var14 < this.field_841 - 1 && (this.objectTileDirections[var13][var14 + 1] & 113) == 0 && (this.objectTileDirections[var13 - 1][var14] & 120) == 0 && (this.objectTileDirections[var13 - 1][var14 + 1] & 121) == 0 && this.field_844[var13 - 1][var14 + 1] == 0) {
               var7[var11] = var13 - 1;
               var8[var11] = var14 + 1;
               var11 = (var11 + 1) % var15;
               this.field_844[var13 - 1][var14 + 1] = 6;
            }

            if(var13 < this.field_840 - 1 && var14 < this.field_841 - 1 && (this.objectTileDirections[var13][var14 + 1] & 113) == 0 && (this.objectTileDirections[var13 + 1][var14] & 114) == 0 && (this.objectTileDirections[var13 + 1][var14 + 1] & 115) == 0 && this.field_844[var13 + 1][var14 + 1] == 0) {
               var7[var11] = var13 + 1;
               var8[var11] = var14 + 1;
               var11 = (var11 + 1) % var15;
               this.field_844[var13 + 1][var14 + 1] = 12;
            }
         } while(var12 != var11);
      }

      if(!var16) {
         return -1;
      } else {
         byte var21 = 0;
         var7[var21] = var13;
         var12 = var21 + 1;
         var8[var21] = var14;
         int var18;
         int var17 = var18 = this.field_844[var13][var14];
         if(var19 == 0 && var13 == var1 && var14 == var2) {
            return var12;
         } else {
            do {
               if(var17 != var18) {
                  var18 = var17;
                  var7[var12] = var13;
                  var8[var12++] = var14;
               }

               label165: {
                  if((var17 & 2) != 0) {
                     ++var13;
                     if(var19 == 0) {
                        break label165;
                     }
                  }

                  if((var17 & 8) != 0) {
                     --var13;
                  }
               }

               label160: {
                  if((var17 & 1) != 0) {
                     ++var14;
                     if(var19 == 0) {
                        break label160;
                     }
                  }

                  if((var17 & 4) != 0) {
                     --var14;
                  }
               }

               var17 = this.field_844[var13][var14];
            } while(var13 != var1 || var14 != var2);

            return var12;
         }
      }
   }

   // $FF: renamed from: a (int, int, int) void
   public void setObjectTileDirection(int var1, int var2, int var3) {
      this.objectTileDirections[var1][var2] |= var3;
   }

   // $FF: renamed from: b (int, int, int) void
   public void method_323(int var1, int var2, int var3) {
      this.objectTileDirections[var1][var2] &= '\uffff' - var3;
   }

   // $FF: renamed from: a (int, int, int, int) void
   public void method_324(int var1, int var2, int var3, int var4) {
      int var5 = GameData.field_563;
      if(var1 >= 0 && var2 >= 0 && var1 < this.field_840 - 1 && var2 < this.field_841 - 1) {
         if(GameData.objectTileDirection[var4] == 1) {
            label47: {
               if(var3 == 0) {
                  this.objectTileDirections[var1][var2] |= 1;
                  if(var2 <= 0) {
                     break label47;
                  }

                  this.setObjectTileDirection(var1, var2 - 1, 4);
                  if(var5 == 0) {
                     break label47;
                  }
               }

               if(var3 == 1) {
                  this.objectTileDirections[var1][var2] |= 2;
                  if(var1 <= 0) {
                     break label47;
                  }

                  this.setObjectTileDirection(var1 - 1, var2, 8);
                  if(var5 == 0) {
                     break label47;
                  }
               }

               if(var3 == 2) {
                  this.objectTileDirections[var1][var2] |= 16;
                  if(var5 == 0) {
                     break label47;
                  }
               }

               if(var3 == 3) {
                  this.objectTileDirections[var1][var2] |= 32;
               }
            }

            this.method_328(var1, var2, 1, 1);
         }

      }
   }

   // $FF: renamed from: b (int, int, int, int) void
   public void method_325(int var1, int var2, int var3, int var4) {
      int var5 = GameData.field_563;
      if(var1 >= 0 && var2 >= 0 && var1 < this.field_840 - 1 && var2 < this.field_841 - 1) {
         if(GameData.objectTileDirection[var4] == 1) {
            label47: {
               if(var3 == 0) {
                  this.objectTileDirections[var1][var2] &= '\ufffe';
                  if(var2 <= 0) {
                     break label47;
                  }

                  this.method_323(var1, var2 - 1, 4);
                  if(var5 == 0) {
                     break label47;
                  }
               }

               if(var3 == 1) {
                  this.objectTileDirections[var1][var2] &= '\ufffd';
                  if(var1 <= 0) {
                     break label47;
                  }

                  this.method_323(var1 - 1, var2, 8);
                  if(var5 == 0) {
                     break label47;
                  }
               }

               if(var3 == 2) {
                  this.objectTileDirections[var1][var2] &= '\uffef';
                  if(var5 == 0) {
                     break label47;
                  }
               }

               if(var3 == 3) {
                  this.objectTileDirections[var1][var2] &= '\uffdf';
               }
            }

            this.method_328(var1, var2, 1, 1);
         }

      }
   }

   // $FF: renamed from: c (int, int, int) void
   public void method_326(int var1, int var2, int var3) {
      int var9 = GameData.field_563;
      if(var1 >= 0 && var2 >= 0 && var1 < this.field_840 - 1 && var2 < this.field_841 - 1) {
         if(GameData.field_522[var3] == 1 || GameData.field_522[var3] == 2) {
            int var4;
            int var5;
            int var6;
            label105: {
               var4 = this.method_341(var1, var2);
               if(var4 == 0 || var4 == 4) {
                  var5 = GameData.field_520[var3];
                  var6 = GameData.field_521[var3];
                  if(var9 == 0) {
                     break label105;
                  }
               }

               var6 = GameData.field_520[var3];
               var5 = GameData.field_521[var3];
            }

            int var7 = var1;
            if(var9 != 0 || var1 < var1 + var5) {
               do {
                  int var8 = var2;
                  if(var9 == 0 && var2 >= var2 + var6) {
                     ++var7;
                  } else {
                     do {
                        label104: {
                           if(GameData.field_522[var3] == 1) {
                              this.objectTileDirections[var7][var8] |= 64;
                              if(var9 == 0) {
                                 break label104;
                              }
                           }

                           if(var4 == 0) {
                              this.objectTileDirections[var7][var8] |= 2;
                              if(var7 <= 0) {
                                 break label104;
                              }

                              this.setObjectTileDirection(var7 - 1, var8, 8);
                              if(var9 == 0) {
                                 break label104;
                              }
                           }

                           if(var4 == 2) {
                              this.objectTileDirections[var7][var8] |= 4;
                              if(var8 >= this.field_841 - 1) {
                                 break label104;
                              }

                              this.setObjectTileDirection(var7, var8 + 1, 1);
                              if(var9 == 0) {
                                 break label104;
                              }
                           }

                           if(var4 == 4) {
                              this.objectTileDirections[var7][var8] |= 8;
                              if(var7 >= this.field_840 - 1) {
                                 break label104;
                              }

                              this.setObjectTileDirection(var7 + 1, var8, 2);
                              if(var9 == 0) {
                                 break label104;
                              }
                           }

                           if(var4 == 6) {
                              this.objectTileDirections[var7][var8] |= 1;
                              if(var8 > 0) {
                                 this.setObjectTileDirection(var7, var8 - 1, 4);
                              }
                           }
                        }

                        ++var8;
                     } while(var8 < var2 + var6);

                     ++var7;
                  }
               } while(var7 < var1 + var5);
            }

            this.method_328(var1, var2, var5, var6);
         }

      }
   }

   // $FF: renamed from: d (int, int, int) void
   public void method_327(int var1, int var2, int var3) {
      int var9 = GameData.field_563;
      if(var1 >= 0 && var2 >= 0 && var1 < this.field_840 - 1 && var2 < this.field_841 - 1) {
         if(GameData.field_522[var3] == 1 || GameData.field_522[var3] == 2) {
            int var4;
            int var5;
            int var6;
            label105: {
               var4 = this.method_341(var1, var2);
               if(var4 == 0 || var4 == 4) {
                  var5 = GameData.field_520[var3];
                  var6 = GameData.field_521[var3];
                  if(var9 == 0) {
                     break label105;
                  }
               }

               var6 = GameData.field_520[var3];
               var5 = GameData.field_521[var3];
            }

            int var7 = var1;
            if(var9 != 0 || var1 < var1 + var5) {
               do {
                  int var8 = var2;
                  if(var9 == 0 && var2 >= var2 + var6) {
                     ++var7;
                  } else {
                     do {
                        label104: {
                           if(GameData.field_522[var3] == 1) {
                              this.objectTileDirections[var7][var8] &= '\uffbf';
                              if(var9 == 0) {
                                 break label104;
                              }
                           }

                           if(var4 == 0) {
                              this.objectTileDirections[var7][var8] &= '\ufffd';
                              if(var7 <= 0) {
                                 break label104;
                              }

                              this.method_323(var7 - 1, var8, 8);
                              if(var9 == 0) {
                                 break label104;
                              }
                           }

                           if(var4 == 2) {
                              this.objectTileDirections[var7][var8] &= '\ufffb';
                              if(var8 >= this.field_841 - 1) {
                                 break label104;
                              }

                              this.method_323(var7, var8 + 1, 1);
                              if(var9 == 0) {
                                 break label104;
                              }
                           }

                           if(var4 == 4) {
                              this.objectTileDirections[var7][var8] &= '\ufff7';
                              if(var7 >= this.field_840 - 1) {
                                 break label104;
                              }

                              this.method_323(var7 + 1, var8, 2);
                              if(var9 == 0) {
                                 break label104;
                              }
                           }

                           if(var4 == 6) {
                              this.objectTileDirections[var7][var8] &= '\ufffe';
                              if(var8 > 0) {
                                 this.method_323(var7, var8 - 1, 4);
                              }
                           }
                        }

                        ++var8;
                     } while(var8 < var2 + var6);

                     ++var7;
                  }
               } while(var7 < var1 + var5);
            }

            this.method_328(var1, var2, var5, var6);
         }

      }
   }

   // $FF: renamed from: c (int, int, int, int) void
   public void method_328(int var1, int var2, int var3, int var4) {
      int var7 = GameData.field_563;
      if(var1 >= 1 && var2 >= 1 && var1 + var3 < this.field_840 && var2 + var4 < this.field_841) {
         int var5 = var1;
         if(var7 != 0 || var1 <= var1 + var3) {
            do {
               int var6 = var2;
               if(var7 == 0 && var2 > var2 + var4) {
                  ++var5;
               } else {
                  do {
                     label66: {
                        if((this.method_331(var5, var6) & 99) != 0 || (this.method_331(var5 - 1, var6) & 89) != 0 || (this.method_331(var5, var6 - 1) & 86) != 0 || (this.method_331(var5 - 1, var6 - 1) & 108) != 0) {
                           this.method_329(var5, var6, 35);
                           if(var7 == 0) {
                              break label66;
                           }
                        }

                        this.method_329(var5, var6, 0);
                     }

                     ++var6;
                  } while(var6 <= var2 + var4);

                  ++var5;
               }
            } while(var5 <= var1 + var3);

         }
      }
   }

   // $FF: renamed from: e (int, int, int) void
   public void method_329(int var1, int var2, int var3) {
      int var4 = var1 / 12;
      int var5 = var2 / 12;
      int var6 = (var1 - 1) / 12;
      int var7 = (var2 - 1) / 12;
      this.method_330(var4, var5, var1, var2, var3);
      if(var4 != var6) {
         this.method_330(var6, var5, var1, var2, var3);
      }

      if(var5 != var7) {
         this.method_330(var4, var7, var1, var2, var3);
      }

      if(var4 != var6 && var5 != var7) {
         this.method_330(var6, var7, var1, var2, var3);
      }

   }

   // $FF: renamed from: a (int, int, int, int, int) void
   public void method_330(int var1, int var2, int var3, int var4, int var5) {
      GameModel var6 = this.terrainModels[var1 + var2 * 8];
      int var7 = 0;
      if(GameData.field_563 != 0 || var7 < var6.field_852) {
         do {
            if(var6.field_898[var7] == var3 * 128 && var6.field_900[var7] == var4 * 128) {
               var6.setVertexAmbience(var7, var5);
               return;
            }

            ++var7;
         } while(var7 < var6.field_852);

      }
   }

   // $FF: renamed from: a (int, int) int
   public int method_331(int var1, int var2) {
      return var1 >= 0 && var2 >= 0 && var1 < this.field_840 && var2 < this.field_841?this.objectTileDirections[var1][var2]:0;
   }

   // $FF: renamed from: b (int, int) int
   public int getElevation(int var1, int var2) {
      int var3 = var1 >> 7;
      int var4 = var2 >> 7;
      int var5 = var1 & 127;
      int var6 = var2 & 127;
      if(var3 >= 0 && var4 >= 0 && var3 < this.field_840 - 1 && var4 < this.field_841 - 1) {
         int var7;
         int var8;
         int var9;
         label16: {
            if(var5 <= 128 - var6) {
               var7 = this.getTerrainHeight(var3, var4);
               var8 = this.getTerrainHeight(var3 + 1, var4) - var7;
               var9 = this.getTerrainHeight(var3, var4 + 1) - var7;
               if(GameData.field_563 == 0) {
                  break label16;
               }
            }

            var7 = this.getTerrainHeight(var3 + 1, var4 + 1);
            var8 = this.getTerrainHeight(var3, var4 + 1) - var7;
            var9 = this.getTerrainHeight(var3 + 1, var4) - var7;
            var5 = 128 - var5;
            var6 = 128 - var6;
         }

         int var10 = var7 + var8 * var5 / 128 + var9 * var6 / 128;
         return var10;
      } else {
         return 0;
      }
   }

   // $FF: renamed from: c (int, int) int
   public int getTerrainHeight(int var1, int var2) {
      int var4 = GameData.field_563;
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var3 = 0;
         if(var1 >= 48 && var2 < 48) {
            var3 = 1;
            var1 -= 48;
            if(var4 == 0) {
               return (this.terrainHeight[var3][var1 * 48 + var2] & 255) * 3;
            }
         }

         if(var1 < 48 && var2 >= 48) {
            var3 = 2;
            var2 -= 48;
            if(var4 == 0) {
               return (this.terrainHeight[var3][var1 * 48 + var2] & 255) * 3;
            }
         }

         if(var1 >= 48 && var2 >= 48) {
            var3 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return (this.terrainHeight[var3][var1 * 48 + var2] & 255) * 3;
      } else {
         return 0;
      }
   }

   // $FF: renamed from: d (int, int) int
   public int getTerrainColour(int var1, int var2) {
      int var4 = GameData.field_563;
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var3 = 0;
         if(var1 >= 48 && var2 < 48) {
            var3 = 1;
            var1 -= 48;
            if(var4 == 0) {
               return this.terrainColour[var3][var1 * 48 + var2] & 255;
            }
         }

         if(var1 < 48 && var2 >= 48) {
            var3 = 2;
            var2 -= 48;
            if(var4 == 0) {
               return this.terrainColour[var3][var1 * 48 + var2] & 255;
            }
         }

         if(var1 >= 48 && var2 >= 48) {
            var3 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return this.terrainColour[var3][var1 * 48 + var2] & 255;
      } else {
         return 0;
      }
   }

   // $FF: renamed from: f (int, int, int) int
   public int getTileDecoration(int var1, int var2, int var3) {
      int var5 = GameData.field_563;
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var4 = 0;
         if(var1 >= 48 && var2 < 48) {
            var4 = 1;
            var1 -= 48;
            if(var5 == 0) {
               return this.tileDecoration[var4][var1 * 48 + var2] & 255;
            }
         }

         if(var1 < 48 && var2 >= 48) {
            var4 = 2;
            var2 -= 48;
            if(var5 == 0) {
               return this.tileDecoration[var4][var1 * 48 + var2] & 255;
            }
         }

         if(var1 >= 48 && var2 >= 48) {
            var4 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return this.tileDecoration[var4][var1 * 48 + var2] & 255;
      } else {
         return 0;
      }
   }

   // $FF: renamed from: g (int, int, int) void
   public void method_336(int var1, int var2, int var3) {
      int var5 = GameData.field_563;
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var4;
         label37: {
            var4 = 0;
            if(var1 >= 48 && var2 < 48) {
               var4 = 1;
               var1 -= 48;
               if(var5 == 0) {
                  break label37;
               }
            }

            if(var1 < 48 && var2 >= 48) {
               var4 = 2;
               var2 -= 48;
               if(var5 == 0) {
                  break label37;
               }
            }

            if(var1 >= 48 && var2 >= 48) {
               var4 = 3;
               var1 -= 48;
               var2 -= 48;
            }
         }

         this.tileDecoration[var4][var1 * 48 + var2] = (byte)var3;
      }
   }

   // $FF: renamed from: h (int, int, int) int
   public int getTileType(int var1, int var2, int var3) {
      int var4 = this.getTileDecoration(var1, var2, var3);
      if(var4 == 0) {
         return -1;
      } else {
         int var5 = GameData.tileType[var4 - 1];
         return var5 == 2?1:0;
      }
   }

   // $FF: renamed from: d (int, int, int, int) int
   public int getTileDecoration(int var1, int var2, int var3, int var4) {
      int var5 = this.getTileDecoration(var1, var2, var3);
      return var5 == 0?var4: GameData.tileDecoration[var5 - 1];
   }

   // $FF: renamed from: e (int, int) int
   public int getWallDiagonal(int var1, int var2) {
      int var4 = GameData.field_563;
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var3 = 0;
         if(var1 >= 48 && var2 < 48) {
            var3 = 1;
            var1 -= 48;
            if(var4 == 0) {
               return this.wallsDiagonal[var3][var1 * 48 + var2];
            }
         }

         if(var1 < 48 && var2 >= 48) {
            var3 = 2;
            var2 -= 48;
            if(var4 == 0) {
               return this.wallsDiagonal[var3][var1 * 48 + var2];
            }
         }

         if(var1 >= 48 && var2 >= 48) {
            var3 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return this.wallsDiagonal[var3][var1 * 48 + var2];
      } else {
         return 0;
      }
   }

   // $FF: renamed from: f (int, int) int
   public int getWallRoof(int x, int y) {
      int var4 = GameData.field_563;
      if(x >= 0 && x < 96 && y >= 0 && y < 96) {
         byte var3 = 0;
         if(x >= 48 && y < 48) {
            var3 = 1;
            x -= 48;
            if(var4 == 0) {
               return this.wallsRoof[var3][x * 48 + y];
            }
         }

         if(x < 48 && y >= 48) {
            var3 = 2;
            y -= 48;
            if(var4 == 0) {
               return this.wallsRoof[var3][x * 48 + y];
            }
         }

         if(x >= 48 && y >= 48) {
            var3 = 3;
            x -= 48;
            y -= 48;
         }

         return this.wallsRoof[var3][x * 48 + y];
      } else {
         return 0;
      }
   }

   // $FF: renamed from: g (int, int) int
   public int method_341(int var1, int var2) {
      int var4 = GameData.field_563;
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var3 = 0;
         if(var1 >= 48 && var2 < 48) {
            var3 = 1;
            var1 -= 48;
            if(var4 == 0) {
               return this.tileDirection[var3][var1 * 48 + var2];
            }
         }

         if(var1 < 48 && var2 >= 48) {
            var3 = 2;
            var2 -= 48;
            if(var4 == 0) {
               return this.tileDirection[var3][var1 * 48 + var2];
            }
         }

         if(var1 >= 48 && var2 >= 48) {
            var3 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return this.tileDirection[var3][var1 * 48 + var2];
      } else {
         return 0;
      }
   }

   // $FF: renamed from: h (int, int) boolean
   public boolean method427(int var1, int var2) {
      return this.getWallRoof(var1, var2) > 0 || this.getWallRoof(var1 - 1, var2) > 0 || this.getWallRoof(var1 - 1, var2 - 1) > 0 || this.getWallRoof(var1, var2 - 1) > 0;
   }

   // $FF: renamed from: i (int, int) boolean
   public boolean hasRoof(int var1, int var2) {
      return this.getWallRoof(var1, var2) > 0 && this.getWallRoof(var1 - 1, var2) > 0 && this.getWallRoof(var1 - 1, var2 - 1) > 0 && this.getWallRoof(var1, var2 - 1) > 0;
   }

   // $FF: renamed from: j (int, int) int
   public int getWallNorthsouth(int var1, int var2) {
      int var4 = GameData.field_563;
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var3 = 0;
         if(var1 >= 48 && var2 < 48) {
            var3 = 1;
            var1 -= 48;
            if(var4 == 0) {
               return this.wallsNorthSouth[var3][var1 * 48 + var2] & 255;
            }
         }

         if(var1 < 48 && var2 >= 48) {
            var3 = 2;
            var2 -= 48;
            if(var4 == 0) {
               return this.wallsNorthSouth[var3][var1 * 48 + var2] & 255;
            }
         }

         if(var1 >= 48 && var2 >= 48) {
            var3 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return this.wallsNorthSouth[var3][var1 * 48 + var2] & 255;
      } else {
         return 0;
      }
   }

   // $FF: renamed from: k (int, int) int
   public int getWallEastwest(int var1, int var2) {
      int var4 = GameData.field_563;
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var3 = 0;
         if(var1 >= 48 && var2 < 48) {
            var3 = 1;
            var1 -= 48;
            if(var4 == 0) {
               return this.wallsEastwest[var3][var1 * 48 + var2] & 255;
            }
         }

         if(var1 < 48 && var2 >= 48) {
            var3 = 2;
            var2 -= 48;
            if(var4 == 0) {
               return this.wallsEastwest[var3][var1 * 48 + var2] & 255;
            }
         }

         if(var1 >= 48 && var2 >= 48) {
            var3 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return this.wallsEastwest[var3][var1 * 48 + var2] & 255;
      } else {
         return 0;
      }
   }

   // $FF: renamed from: e (int, int, int, int) void
   public void loadSection(int regionX, int regionY, int mapPlane, int plane) {
      String mapname = "m" + mapPlane + regionX / 10 + regionX % 10 + regionY / 10 + regionY % 10;
      try {
         if (this.landscapePack != null) {
            byte[] mapData = Utility.loadData(mapname + ".hei", 0, this.landscapePack);
            if ((mapData == null) && (this.memberLandscapePack != null))
               mapData = Utility.loadData(mapname + ".hei", 0, this.memberLandscapePack);
            if ((mapData != null) && (mapData.length > 0)) {
               int off = 0;
               int prev_val = 0;
               for (int tile = 0; tile < 2304;) {
                  int height = mapData[(off++)] & 0xFF;
                  if (height < 128) {
                     this.terrainHeight[plane][(tile++)] = (byte) height;
                     prev_val = height;
                  }
                  if (height >= 128) {
                     for (int l5 = 0; l5 < height - 128; l5++) {
                        this.terrainHeight[plane][(tile++)] = (byte) prev_val;
                     }
                  }
               }

               prev_val = 64;
               for (int tileY = 0; tileY < 48; tileY++) {
                  for (int tileX = 0; tileX < 48; tileX++) {
                     prev_val = this.terrainHeight[plane][(tileX * 48 + tileY)]
                             + prev_val & 0x7F;
                     this.terrainHeight[plane][(tileX * 48 + tileY)] = (byte) (prev_val * 2);
                  }

               }

               prev_val = 0;
               for (int tile = 0; tile < 2304;) {
                  int val = mapData[(off++)] & 0xFF;
                  if (val < 128) {
                     this.terrainColour[plane][(tile++)] = (byte) val;
                     prev_val = val;
                  }
                  if (val >= 128) {
                     for (int i = 0; i < val - 128; i++) {
                        this.terrainColour[plane][(tile++)] = (byte) prev_val;
                     }
                  }
               }

               prev_val = 35;
               for (int tileY = 0; tileY < 48; tileY++) {
                  for (int tileX = 0; tileX < 48; tileX++) {
                     prev_val = this.terrainColour[plane][(tileX * 48 + tileY)]
                             + prev_val & 0x7F;
                     this.terrainColour[plane][(tileX * 48 + tileY)] = (byte) (prev_val * 2);
                  }
               }
            } else {
               for (int tile = 0; tile < 2304; tile++) {
                  this.terrainHeight[plane][tile] = 0;
                  this.terrainColour[plane][tile] = 0;
               }
            }

            mapData = Utility.loadData(mapname + ".dat", 0, this.mapPack);
            if ((mapData == null) && (this.memberMapPack != null))
               mapData = Utility.loadData(mapname + ".dat", 0, this.memberMapPack);
            if ((mapData == null) || (mapData.length == 0))
               throw new IOException();

            int off = 0;
            for (int tile = 0; tile < 2304; tile++)
               wallsEastwest[plane][tile] = mapData[off++];

            for (int tile = 0; tile < 2304; tile++)
               wallsNorthSouth[plane][tile] = mapData[off++];

            for (int tile = 0; tile < 2304; tile++)
               wallsDiagonal[plane][tile] = mapData[off++] & 0xff;

            for (int tile = 0; tile < 2304; tile++) {
               int val = mapData[off++] & 0xff;
               if (val > 0)
                  wallsDiagonal[plane][tile] = val + 12000;
            }

            for (int tile = 0; tile < 2304;) {
               int val = mapData[(off++)] & 0xFF;
               if (val < 128)
                  this.wallsRoof[plane][(tile++)] = (byte) val;
               else {
                  for (int j10 = 0; j10 < val - 128; j10++) {
                     this.wallsRoof[plane][(tile++)] = 0;
                  }
               }
            }

            int lastVal = 0;
            for (int tile = 0; tile < 2304;) {
               int val = mapData[(off++)] & 0xFF;
               if (val < 128) {
                  this.tileDecoration[plane][(tile++)] = (byte) val;
                  lastVal = val;
               } else {
                  for (int l11 = 0; l11 < val - 128; l11++) {
                     this.tileDecoration[plane][(tile++)] = (byte) lastVal;
                  }
               }
            }

            for (int tile = 0; tile < 2304;) {
               int val = mapData[(off++)] & 0xFF;
               if (val < 128)
                  this.tileDirection[plane][(tile++)] = (byte) val;
               else {
                  for (int i = 0; i < val - 128; i++) {
                     this.tileDirection[plane][(tile++)] = 0;
                  }
               }
            }

            mapData = Utility.loadData(mapname + ".loc", 0, this.mapPack);
            if ((mapData != null) && (mapData.length > 0)) {
               int off_ = 0;
               for (int tile = 0; tile < 2304;) {
                  int val = mapData[(off_++)] & 0xFF;
                  if (val < 128) {
                     this.wallsDiagonal[plane][(tile++)] = (val + 48000);
                  } else {
                     tile += val - 128;
                  }
               }
            }
         } else {
            byte[] mapData = new byte[20736];
            Utility.readFully("../gamedata/maps/" + mapname + ".jm", mapData, 20736);
            int val = 0;
            int off = 0;
            for (int tile = 0; tile < 2304; tile++) {
               val = val + mapData[(off++)] & 0xFF;
               this.terrainHeight[plane][tile] = (byte) val;
            }

            val = 0;
            for (int tile = 0; tile < 2304; tile++) {
               val = val + mapData[(off++)] & 0xFF;
               this.terrainColour[plane][tile] = (byte) val;
            }

            for (int tile = 0; tile < 2304; tile++) {
               this.wallsEastwest[plane][tile] = mapData[(off++)];
            }
            for (int tile = 0; tile < 2304; tile++) {
               this.wallsNorthSouth[plane][tile] = mapData[(off++)];
            }
            for (int tile = 0; tile < 2304; tile++) {
               this.wallsDiagonal[plane][tile] = ((mapData[off] & 0xFF) * 256 + (mapData[(off + 1)] & 0xFF));
               off += 2;
            }

            for (int tile = 0; tile < 2304; tile++) {
               this.wallsRoof[plane][tile] = mapData[(off++)];
            }
            for (int tile = 0; tile < 2304; tile++) {
               this.tileDecoration[plane][tile] = mapData[(off++)];
            }
            for (int tile = 0; tile < 2304; tile++) {
               this.tileDirection[plane][tile] = mapData[(off++)];
            }
         }
         return;
      } catch (IOException _ex) {
         int tile = 0;

         for (; tile < 2304; tile++) {
            this.terrainHeight[plane][tile] = 0;
            this.terrainColour[plane][tile] = 0;
            this.wallsEastwest[plane][tile] = 0;
            this.wallsNorthSouth[plane][tile] = 0;
            this.wallsDiagonal[plane][tile] = 0;
            this.wallsRoof[plane][tile] = 0;
            this.tileDecoration[plane][tile] = 0;
            if (mapPlane == 0)
               this.tileDecoration[plane][tile] = -6;
            if (mapPlane == 3)
               this.tileDecoration[plane][tile] = 8;
            this.tileDirection[plane][tile] = 0;
         }
      }
   }

   // $FF: renamed from: a () void
   public void reset() {
      int var4 = GameData.field_563;
      if(this.field_821) {
         this.field_823.dispose();
      }

      int var1 = 0;
      if(var4 == 0 && var1 >= 64) {
         System.gc();
      } else {
         do {
            this.terrainModels[var1] = null;
            int var2 = 0;
            if(var4 != 0) {
               this.wallModels[var2][var1] = null;
               ++var2;
            }

            while(var2 < 4) {
               this.wallModels[var2][var1] = null;
               ++var2;
            }

            int var3 = 0;
            if(var4 != 0 || var3 < 4) {
               do {
                  this.roofModels[var3][var1] = null;
                  ++var3;
               } while(var3 < 4);

               ++var1;
            } else {
               ++var1;
            }
         } while(var1 < 64);

         System.gc();
      }
   }

   // $FF: renamed from: i (int, int, int) void
   public void loadSections(int x, int y, int plane) {
      this.reset();
      int regionX = (x + 24) / 48;
      int regionY = (y + 24) / 48;
      this.loadSection(x, y, plane, true);
      if(plane == 0) {
         this.loadSection(x, y, 1, false);
         this.loadSection(x, y, 2, false);
         this.loadSection(regionX - 1, regionY - 1, plane, 0);
         this.loadSection(regionX, regionY - 1, plane, 1);
         this.loadSection(regionX - 1, regionY, plane, 2);
         this.loadSection(regionX, regionY, plane, 3);
         this.setTiles();
      }

   }

   // $FF: renamed from: b () void
   public void setTiles() {
      int var3 = GameData.field_563;
      int var1 = 0;
      if(var3 != 0 || var1 < 96) {
         do {
            int var2 = 0;
            if(var3 == 0 && var2 >= 96) {
               ++var1;
            } else {
               do {
                  if(this.getTileDecoration(var1, var2, 0) == 250) {
                     label57: {
                        if(var1 == 47 && this.getTileDecoration(var1 + 1, var2, 0) != 250 && this.getTileDecoration(var1 + 1, var2, 0) != 2) {
                           this.method_336(var1, var2, 9);
                           if(var3 == 0) {
                              break label57;
                           }
                        }

                        if(var2 == 47 && this.getTileDecoration(var1, var2 + 1, 0) != 250 && this.getTileDecoration(var1, var2 + 1, 0) != 2) {
                           this.method_336(var1, var2, 9);
                           if(var3 == 0) {
                              break label57;
                           }
                        }

                        this.method_336(var1, var2, 2);
                     }
                  }

                  ++var2;
               } while(var2 < 96);

               ++var1;
            }
         } while(var1 < 96);

      }
   }

   // $FF: renamed from: b (int, int, int, int, int) void
   public void method402(int var1, int var2, int var3, int var4, int var5) {
      int var6 = var1 * 3;
      int var7 = var2 * 3;
      int var8 = this.field_823.method_209(var4);
      int var9 = this.field_823.method_209(var5);
      var8 = var8 >> 1 & 8355711;
      var9 = var9 >> 1 & 8355711;
      if(var3 == 0) {
         this.surface.drawLineHoriz(var6, var7, 3, var8);
         this.surface.drawLineHoriz(var6, var7 + 1, 2, var8);
         this.surface.drawLineHoriz(var6, var7 + 2, 1, var8);
         this.surface.drawLineHoriz(var6 + 2, var7 + 1, 1, var9);
         this.surface.drawLineHoriz(var6 + 1, var7 + 2, 2, var9);
      } else {
         if(var3 == 1) {
            this.surface.drawLineHoriz(var6, var7, 3, var9);
            this.surface.drawLineHoriz(var6 + 1, var7 + 1, 2, var9);
            this.surface.drawLineHoriz(var6 + 2, var7 + 2, 1, var9);
            this.surface.drawLineHoriz(var6, var7 + 1, 1, var8);
            this.surface.drawLineHoriz(var6, var7 + 2, 2, var8);
         }

      }
   }

   // $FF: renamed from: a (int, int, int, boolean) void
   public void loadSection(int localRegionX, int localRegionY, int plane, boolean isLocalPlane) {
      int var40 = GameData.field_563;
      int regionX = (localRegionX + 24) / 48;
      int regionY = (localRegionY + 24) / 48;
      this.loadSection(regionX - 1, regionY - 1, plane, 0);
      this.loadSection(regionX, regionY - 1, plane, 1);
      this.loadSection(regionX - 1, regionY, plane, 2);
      this.loadSection(regionX, regionY, plane, 3);
      this.setTiles();
      if(this.parentModel == null) {
         this.parentModel = new GameModel(this.field_840 * this.field_841 * 2 + 256, this.field_840 * this.field_841 * 2 + 256, true, true, false, false, true);
      }

      int var7;
      int var8;
      int var9;
      int var10;
      int var11;
      int var12;
      int var13;
      int roof_nvs;
      int var15;
      int var17;
      int var18;
      int var20;
      int var43;
      int var44;
      if(isLocalPlane) {
         this.surface.blackScreen();
         var7 = 0;
         if(var40 != 0 || var7 < 96) {
            do {
               var8 = 0;
               if(var40 == 0 && var8 >= 96) {
                  ++var7;
               } else {
                  do {
                     this.objectTileDirections[var7][var8] = 0;
                     ++var8;
                  } while(var8 < 96);

                  ++var7;
               }
            } while(var7 < 96);
         }

         GameModel var41 = this.parentModel;
         var41.clear();
         var9 = 0;
         if(var40 != 0 || var9 < 96) {
            do {
               var10 = 0;
               if(var40 == 0 && var10 >= 96) {
                  ++var9;
               } else {
                  do {
                     var11 = -this.getTerrainHeight(var9, var10);
                     if(this.getTileDecoration(var9, var10, plane) > 0 && GameData.tileType[this.getTileDecoration(var9, var10, plane) - 1] == 4) {
                        var11 = 0;
                     }

                     if(this.getTileDecoration(var9 - 1, var10, plane) > 0 && GameData.tileType[this.getTileDecoration(var9 - 1, var10, plane) - 1] == 4) {
                        var11 = 0;
                     }

                     if(this.getTileDecoration(var9, var10 - 1, plane) > 0 && GameData.tileType[this.getTileDecoration(var9, var10 - 1, plane) - 1] == 4) {
                        var11 = 0;
                     }

                     if(this.getTileDecoration(var9 - 1, var10 - 1, plane) > 0 && GameData.tileType[this.getTileDecoration(var9 - 1, var10 - 1, plane) - 1] == 4) {
                        var11 = 0;
                     }

                     var12 = var41.vertexAt(var9 * 128, var11, var10 * 128);
                     var13 = (int)(Math.random() * 10.0D) - 5;
                     var41.setVertexAmbience(var12, var13);
                     ++var10;
                  } while(var10 < 96);

                  ++var9;
               }
            } while(var9 < 96);
         }

         var10 = 0;
         int[] var42;
         if(var40 != 0 || var10 < 95) {
            do {
               var11 = 0;
               if(var40 == 0 && var11 >= 95) {
                  ++var10;
               } else {
                  do {
                     var12 = this.getTerrainColour(var10, var11);
                     var13 = this.terrainColours[var12];
                     roof_nvs = var13;
                     var15 = var13;
                     byte var16 = 0;
                     if(plane == 1 || plane == 2) {
                        var13 = 12345678;
                        roof_nvs = 12345678;
                        var15 = 12345678;
                     }

                     if(this.getTileDecoration(var10, var11, plane) > 0) {
                        var17 = this.getTileDecoration(var10, var11, plane);
                        var12 = GameData.tileType[var17 - 1];
                        var18 = this.getTileType(var10, var11, plane);
                        var13 = roof_nvs = GameData.tileDecoration[var17 - 1];
                        if(var12 == 4) {
                           var13 = 1;
                           roof_nvs = 1;
                           if(var17 == 12) {
                              var13 = 31;
                              roof_nvs = 31;
                           }
                        }

                        label1123: {
                           if(var12 == 5) {
                              if(this.getWallDiagonal(var10, var11) <= 0 || this.getWallDiagonal(var10, var11) >= 24000) {
                                 break label1123;
                              }

                              if(this.getTileDecoration(var10 - 1, var11, plane, var15) != 12345678 && this.getTileDecoration(var10, var11 - 1, plane, var15) != 12345678) {
                                 var13 = this.getTileDecoration(var10 - 1, var11, plane, var15);
                                 var16 = 0;
                                 if(var40 == 0) {
                                    break label1123;
                                 }
                              }

                              if(this.getTileDecoration(var10 + 1, var11, plane, var15) != 12345678 && this.getTileDecoration(var10, var11 + 1, plane, var15) != 12345678) {
                                 roof_nvs = this.getTileDecoration(var10 + 1, var11, plane, var15);
                                 var16 = 0;
                                 if(var40 == 0) {
                                    break label1123;
                                 }
                              }

                              if(this.getTileDecoration(var10 + 1, var11, plane, var15) != 12345678 && this.getTileDecoration(var10, var11 - 1, plane, var15) != 12345678) {
                                 roof_nvs = this.getTileDecoration(var10 + 1, var11, plane, var15);
                                 var16 = 1;
                                 if(var40 == 0) {
                                    break label1123;
                                 }
                              }

                              if(this.getTileDecoration(var10 - 1, var11, plane, var15) == 12345678 || this.getTileDecoration(var10, var11 + 1, plane, var15) == 12345678) {
                                 break label1123;
                              }

                              var13 = this.getTileDecoration(var10 - 1, var11, plane, var15);
                              var16 = 1;
                              if(var40 == 0) {
                                 break label1123;
                              }
                           }

                           if(var12 != 2 || this.getWallDiagonal(var10, var11) > 0 && this.getWallDiagonal(var10, var11) < 24000) {
                              label1175: {
                                 if(this.getTileType(var10 - 1, var11, plane) != var18 && this.getTileType(var10, var11 - 1, plane) != var18) {
                                    var13 = var15;
                                    var16 = 0;
                                    if(var40 == 0) {
                                       break label1175;
                                    }
                                 }

                                 if(this.getTileType(var10 + 1, var11, plane) != var18 && this.getTileType(var10, var11 + 1, plane) != var18) {
                                    roof_nvs = var15;
                                    var16 = 0;
                                    if(var40 == 0) {
                                       break label1175;
                                    }
                                 }

                                 if(this.getTileType(var10 + 1, var11, plane) != var18 && this.getTileType(var10, var11 - 1, plane) != var18) {
                                    roof_nvs = var15;
                                    var16 = 1;
                                    if(var40 == 0) {
                                       break label1175;
                                    }
                                 }

                                 if(this.getTileType(var10 - 1, var11, plane) != var18 && this.getTileType(var10, var11 + 1, plane) != var18) {
                                    var13 = var15;
                                    var16 = 1;
                                 }
                              }
                           }
                        }

                        if(GameData.tileAdjacent[var17 - 1] != 0) {
                           this.objectTileDirections[var10][var11] |= 64;
                        }

                        if(GameData.tileType[var17 - 1] == 2) {
                           this.objectTileDirections[var10][var11] |= 128;
                        }
                     }

                     label1167: {
                        this.method402(var10, var11, var16, var13, roof_nvs);
                        var17 = this.getTerrainHeight(var10 + 1, var11 + 1) - this.getTerrainHeight(var10 + 1, var11) + this.getTerrainHeight(var10, var11 + 1) - this.getTerrainHeight(var10, var11);
                        if(var13 != roof_nvs || var17 != 0) {
                           var42 = new int[3];
                           int[] var19 = new int[3];
                           if(var16 == 0) {
                              if(var13 != 12345678) {
                                 var42[0] = var11 + var10 * this.field_840 + this.field_840;
                                 var42[1] = var11 + var10 * this.field_840;
                                 var42[2] = var11 + var10 * this.field_840 + 1;
                                 var20 = var41.createFace(3, var42, 12345678, var13);
                                 this.localX[var20] = var10;
                                 this.localY[var20] = var11;
                                 var41.faceTag[var20] = 200000 + var20;
                              }

                              if(roof_nvs == 12345678) {
                                 break label1167;
                              }

                              var19[0] = var11 + var10 * this.field_840 + 1;
                              var19[1] = var11 + var10 * this.field_840 + this.field_840 + 1;
                              var19[2] = var11 + var10 * this.field_840 + this.field_840;
                              var20 = var41.createFace(3, var19, 12345678, roof_nvs);
                              this.localX[var20] = var10;
                              this.localY[var20] = var11;
                              var41.faceTag[var20] = 200000 + var20;
                              if(var40 == 0) {
                                 break label1167;
                              }
                           }

                           if(var13 != 12345678) {
                              var42[0] = var11 + var10 * this.field_840 + 1;
                              var42[1] = var11 + var10 * this.field_840 + this.field_840 + 1;
                              var42[2] = var11 + var10 * this.field_840;
                              var20 = var41.createFace(3, var42, 12345678, var13);
                              this.localX[var20] = var10;
                              this.localY[var20] = var11;
                              var41.faceTag[var20] = 200000 + var20;
                           }

                           if(roof_nvs == 12345678) {
                              break label1167;
                           }

                           var19[0] = var11 + var10 * this.field_840 + this.field_840;
                           var19[1] = var11 + var10 * this.field_840;
                           var19[2] = var11 + var10 * this.field_840 + this.field_840 + 1;
                           var20 = var41.createFace(3, var19, 12345678, roof_nvs);
                           this.localX[var20] = var10;
                           this.localY[var20] = var11;
                           var41.faceTag[var20] = 200000 + var20;
                           if(var40 == 0) {
                              break label1167;
                           }
                        }

                        if(var13 != 12345678) {
                           var42 = new int[]{var11 + var10 * this.field_840 + this.field_840, var11 + var10 * this.field_840, var11 + var10 * this.field_840 + 1, var11 + var10 * this.field_840 + this.field_840 + 1};
                           var44 = var41.createFace(4, var42, 12345678, var13);
                           this.localX[var44] = var10;
                           this.localY[var44] = var11;
                           var41.faceTag[var44] = 200000 + var44;
                        }
                     }

                     ++var11;
                  } while(var11 < 95);

                  ++var10;
               }
            } while(var10 < 95);
         }

         var11 = 1;
         if(var40 != 0 || var11 < 95) {
            do {
               var12 = 1;
               if(var40 == 0 && var12 >= 95) {
                  ++var11;
               } else {
                  do {
                     label1128: {
                        if(this.getTileDecoration(var11, var12, plane) > 0 && GameData.tileType[this.getTileDecoration(var11, var12, plane) - 1] == 4) {
                           var13 = GameData.tileDecoration[this.getTileDecoration(var11, var12, plane) - 1];
                           roof_nvs = var41.vertexAt(var11 * 128, -this.getTerrainHeight(var11, var12), var12 * 128);
                           var15 = var41.vertexAt((var11 + 1) * 128, -this.getTerrainHeight(var11 + 1, var12), var12 * 128);
                           var43 = var41.vertexAt((var11 + 1) * 128, -this.getTerrainHeight(var11 + 1, var12 + 1), (var12 + 1) * 128);
                           var17 = var41.vertexAt(var11 * 128, -this.getTerrainHeight(var11, var12 + 1), (var12 + 1) * 128);
                           var42 = new int[]{roof_nvs, var15, var43, var17};
                           var44 = var41.createFace(4, var42, var13, 12345678);
                           this.localX[var44] = var11;
                           this.localY[var44] = var12;
                           var41.faceTag[var44] = 200000 + var44;
                           this.method402(var11, var12, 0, var13, var13);
                           if(var40 == 0) {
                              break label1128;
                           }
                        }

                        if(this.getTileDecoration(var11, var12, plane) == 0 || GameData.tileType[this.getTileDecoration(var11, var12, plane) - 1] != 3) {
                           if(this.getTileDecoration(var11, var12 + 1, plane) > 0 && GameData.tileType[this.getTileDecoration(var11, var12 + 1, plane) - 1] == 4) {
                              var13 = GameData.tileDecoration[this.getTileDecoration(var11, var12 + 1, plane) - 1];
                              roof_nvs = var41.vertexAt(var11 * 128, -this.getTerrainHeight(var11, var12), var12 * 128);
                              var15 = var41.vertexAt((var11 + 1) * 128, -this.getTerrainHeight(var11 + 1, var12), var12 * 128);
                              var43 = var41.vertexAt((var11 + 1) * 128, -this.getTerrainHeight(var11 + 1, var12 + 1), (var12 + 1) * 128);
                              var17 = var41.vertexAt(var11 * 128, -this.getTerrainHeight(var11, var12 + 1), (var12 + 1) * 128);
                              var42 = new int[]{roof_nvs, var15, var43, var17};
                              var44 = var41.createFace(4, var42, var13, 12345678);
                              this.localX[var44] = var11;
                              this.localY[var44] = var12;
                              var41.faceTag[var44] = 200000 + var44;
                              this.method402(var11, var12, 0, var13, var13);
                           }

                           if(this.getTileDecoration(var11, var12 - 1, plane) > 0 && GameData.tileType[this.getTileDecoration(var11, var12 - 1, plane) - 1] == 4) {
                              var13 = GameData.tileDecoration[this.getTileDecoration(var11, var12 - 1, plane) - 1];
                              roof_nvs = var41.vertexAt(var11 * 128, -this.getTerrainHeight(var11, var12), var12 * 128);
                              var15 = var41.vertexAt((var11 + 1) * 128, -this.getTerrainHeight(var11 + 1, var12), var12 * 128);
                              var43 = var41.vertexAt((var11 + 1) * 128, -this.getTerrainHeight(var11 + 1, var12 + 1), (var12 + 1) * 128);
                              var17 = var41.vertexAt(var11 * 128, -this.getTerrainHeight(var11, var12 + 1), (var12 + 1) * 128);
                              var42 = new int[]{roof_nvs, var15, var43, var17};
                              var44 = var41.createFace(4, var42, var13, 12345678);
                              this.localX[var44] = var11;
                              this.localY[var44] = var12;
                              var41.faceTag[var44] = 200000 + var44;
                              this.method402(var11, var12, 0, var13, var13);
                           }

                           if(this.getTileDecoration(var11 + 1, var12, plane) > 0 && GameData.tileType[this.getTileDecoration(var11 + 1, var12, plane) - 1] == 4) {
                              var13 = GameData.tileDecoration[this.getTileDecoration(var11 + 1, var12, plane) - 1];
                              roof_nvs = var41.vertexAt(var11 * 128, -this.getTerrainHeight(var11, var12), var12 * 128);
                              var15 = var41.vertexAt((var11 + 1) * 128, -this.getTerrainHeight(var11 + 1, var12), var12 * 128);
                              var43 = var41.vertexAt((var11 + 1) * 128, -this.getTerrainHeight(var11 + 1, var12 + 1), (var12 + 1) * 128);
                              var17 = var41.vertexAt(var11 * 128, -this.getTerrainHeight(var11, var12 + 1), (var12 + 1) * 128);
                              var42 = new int[]{roof_nvs, var15, var43, var17};
                              var44 = var41.createFace(4, var42, var13, 12345678);
                              this.localX[var44] = var11;
                              this.localY[var44] = var12;
                              var41.faceTag[var44] = 200000 + var44;
                              this.method402(var11, var12, 0, var13, var13);
                           }

                           if(this.getTileDecoration(var11 - 1, var12, plane) > 0 && GameData.tileType[this.getTileDecoration(var11 - 1, var12, plane) - 1] == 4) {
                              var13 = GameData.tileDecoration[this.getTileDecoration(var11 - 1, var12, plane) - 1];
                              roof_nvs = var41.vertexAt(var11 * 128, -this.getTerrainHeight(var11, var12), var12 * 128);
                              var15 = var41.vertexAt((var11 + 1) * 128, -this.getTerrainHeight(var11 + 1, var12), var12 * 128);
                              var43 = var41.vertexAt((var11 + 1) * 128, -this.getTerrainHeight(var11 + 1, var12 + 1), (var12 + 1) * 128);
                              var17 = var41.vertexAt(var11 * 128, -this.getTerrainHeight(var11, var12 + 1), (var12 + 1) * 128);
                              var42 = new int[]{roof_nvs, var15, var43, var17};
                              var44 = var41.createFace(4, var42, var13, 12345678);
                              this.localX[var44] = var11;
                              this.localY[var44] = var12;
                              var41.faceTag[var44] = 200000 + var44;
                              this.method402(var11, var12, 0, var13, var13);
                           }
                        }
                     }

                     ++var12;
                  } while(var12 < 95);

                  ++var11;
               }
            } while(var11 < 95);
         }

         var41.setLight(true, 40, 48, -50, -10, -50);
         this.terrainModels = this.parentModel.split(0, 0, 1536, 1536, 8, 64, 233, false);
         var12 = 0;
         if(var40 != 0 || var12 < 64) {
            do {
               this.field_823.addModel(this.terrainModels[var12]);
               ++var12;
            } while(var12 < 64);
         }

         var13 = 0;
         if(var40 != 0 || var13 < 96) {
            do {
               roof_nvs = 0;
               if(var40 == 0 && roof_nvs >= 96) {
                  ++var13;
               } else {
                  do {
                     this.terrainHeightLocal[var13][roof_nvs] = this.getTerrainHeight(var13, roof_nvs);
                     ++roof_nvs;
                  } while(roof_nvs < 96);

                  ++var13;
               }
            } while(var13 < 96);
         }
      }

      this.parentModel.clear();
      var7 = 6316128;
      var8 = 0;
      if(var40 != 0) {
         var9 = 0;
         if(var40 == 0 && var9 >= 95) {
            ++var8;
         } else {
            while(true) {
               var10 = this.getWallNorthsouth(var8, var9);
               if(var10 > 0 && (GameData.wallObjectInvisible[var10 - 1] == 0 || this.field_820)) {
                  this.method422(this.parentModel, var10 - 1, var8, var9, var8 + 1, var9);
                  if(isLocalPlane && GameData.objectTileDirection[var10 - 1] != 0) {
                     this.objectTileDirections[var8][var9] |= 1;
                     if(var9 > 0) {
                        this.setObjectTileDirection(var8, var9 - 1, 4);
                     }
                  }

                  if(isLocalPlane) {
                     this.surface.drawLineHoriz(var8 * 3, var9 * 3, 3, var7);
                  }
               }

               var10 = this.getWallEastwest(var8, var9);
               if(var10 > 0 && (GameData.wallObjectInvisible[var10 - 1] == 0 || this.field_820)) {
                  this.method422(this.parentModel, var10 - 1, var8, var9, var8, var9 + 1);
                  if(isLocalPlane && GameData.objectTileDirection[var10 - 1] != 0) {
                     this.objectTileDirections[var8][var9] |= 2;
                     if(var8 > 0) {
                        this.setObjectTileDirection(var8 - 1, var9, 8);
                     }
                  }

                  if(isLocalPlane) {
                     this.surface.drawLineVert(var8 * 3, var9 * 3, 3, var7);
                  }
               }

               var10 = this.getWallDiagonal(var8, var9);
               if(var10 > 0 && var10 < 12000 && (GameData.wallObjectInvisible[var10 - 1] == 0 || this.field_820)) {
                  this.method422(this.parentModel, var10 - 1, var8, var9, var8 + 1, var9 + 1);
                  if(isLocalPlane && GameData.objectTileDirection[var10 - 1] != 0) {
                     this.objectTileDirections[var8][var9] |= 32;
                  }

                  if(isLocalPlane) {
                     this.surface.setPixel(var8 * 3, var9 * 3, var7);
                     this.surface.setPixel(var8 * 3 + 1, var9 * 3 + 1, var7);
                     this.surface.setPixel(var8 * 3 + 2, var9 * 3 + 2, var7);
                  }
               }

               if(var10 > 12000 && var10 < 24000 && (GameData.wallObjectInvisible[var10 - 12001] == 0 || this.field_820)) {
                  this.method422(this.parentModel, var10 - 12001, var8 + 1, var9, var8, var9 + 1);
                  if(isLocalPlane && GameData.objectTileDirection[var10 - 12001] != 0) {
                     this.objectTileDirections[var8][var9] |= 16;
                  }

                  if(isLocalPlane) {
                     this.surface.setPixel(var8 * 3 + 2, var9 * 3, var7);
                     this.surface.setPixel(var8 * 3 + 1, var9 * 3 + 1, var7);
                     this.surface.setPixel(var8 * 3, var9 * 3 + 2, var7);
                  }
               }

               ++var9;
               if(var9 >= 95) {
                  ++var8;
                  break;
               }
            }
         }
      }

      while(var8 < 95) {
         var9 = 0;
         if(var40 == 0 && var9 >= 95) {
            ++var8;
         } else {
            do {
               var10 = this.getWallNorthsouth(var8, var9);
               if(var10 > 0 && (GameData.wallObjectInvisible[var10 - 1] == 0 || this.field_820)) {
                  this.method422(this.parentModel, var10 - 1, var8, var9, var8 + 1, var9);
                  if(isLocalPlane && GameData.objectTileDirection[var10 - 1] != 0) {
                     this.objectTileDirections[var8][var9] |= 1;
                     if(var9 > 0) {
                        this.setObjectTileDirection(var8, var9 - 1, 4);
                     }
                  }

                  if(isLocalPlane) {
                     this.surface.drawLineHoriz(var8 * 3, var9 * 3, 3, var7);
                  }
               }

               var10 = this.getWallEastwest(var8, var9);
               if(var10 > 0 && (GameData.wallObjectInvisible[var10 - 1] == 0 || this.field_820)) {
                  this.method422(this.parentModel, var10 - 1, var8, var9, var8, var9 + 1);
                  if(isLocalPlane && GameData.objectTileDirection[var10 - 1] != 0) {
                     this.objectTileDirections[var8][var9] |= 2;
                     if(var8 > 0) {
                        this.setObjectTileDirection(var8 - 1, var9, 8);
                     }
                  }

                  if(isLocalPlane) {
                     this.surface.drawLineVert(var8 * 3, var9 * 3, 3, var7);
                  }
               }

               var10 = this.getWallDiagonal(var8, var9);
               if(var10 > 0 && var10 < 12000 && (GameData.wallObjectInvisible[var10 - 1] == 0 || this.field_820)) {
                  this.method422(this.parentModel, var10 - 1, var8, var9, var8 + 1, var9 + 1);
                  if(isLocalPlane && GameData.objectTileDirection[var10 - 1] != 0) {
                     this.objectTileDirections[var8][var9] |= 32;
                  }

                  if(isLocalPlane) {
                     this.surface.setPixel(var8 * 3, var9 * 3, var7);
                     this.surface.setPixel(var8 * 3 + 1, var9 * 3 + 1, var7);
                     this.surface.setPixel(var8 * 3 + 2, var9 * 3 + 2, var7);
                  }
               }

               if(var10 > 12000 && var10 < 24000 && (GameData.wallObjectInvisible[var10 - 12001] == 0 || this.field_820)) {
                  this.method422(this.parentModel, var10 - 12001, var8 + 1, var9, var8, var9 + 1);
                  if(isLocalPlane && GameData.objectTileDirection[var10 - 12001] != 0) {
                     this.objectTileDirections[var8][var9] |= 16;
                  }

                  if(isLocalPlane) {
                     this.surface.setPixel(var8 * 3 + 2, var9 * 3, var7);
                     this.surface.setPixel(var8 * 3 + 1, var9 * 3 + 1, var7);
                     this.surface.setPixel(var8 * 3, var9 * 3 + 2, var7);
                  }
               }

               ++var9;
            } while(var9 < 95);

            ++var8;
         }
      }

      if(isLocalPlane) {
         this.surface.drawSpriteMinimap(this.baseMediaSprite - 1, 0, 0, 285, 285);
      }

      this.parentModel.setLight(false, 60, 24, -50, -10, -50);
      this.wallModels[plane] = this.parentModel.split(0, 0, 1536, 1536, 8, 64, 338, true);
      var9 = 0;
      if(var40 != 0) {
         this.field_823.addModel(this.wallModels[plane][var9]);
         ++var9;
      }

      while(var9 < 64) {
         this.field_823.addModel(this.wallModels[plane][var9]);
         ++var9;
      }

      var10 = 0;
      if(var40 != 0 || var10 < 95) {
         do {
            var11 = 0;
            if(var40 == 0 && var11 >= 95) {
               ++var10;
            } else {
               do {
                  var12 = this.getWallNorthsouth(var10, var11);
                  if(var12 > 0) {
                     this.method428(var12 - 1, var10, var11, var10 + 1, var11);
                  }

                  var12 = this.getWallEastwest(var10, var11);
                  if(var12 > 0) {
                     this.method428(var12 - 1, var10, var11, var10, var11 + 1);
                  }

                  var12 = this.getWallDiagonal(var10, var11);
                  if(var12 > 0 && var12 < 12000) {
                     this.method428(var12 - 1, var10, var11, var10 + 1, var11 + 1);
                  }

                  if(var12 > 12000 && var12 < 24000) {
                     this.method428(var12 - 12001, var10 + 1, var11, var10, var11 + 1);
                  }

                  ++var11;
               } while(var11 < 95);

               ++var10;
            }
         } while(var10 < 95);
      }

      var11 = 1;
      int var21;
      int var22;
      int var23;
      int var24;
      int var25;
      int var26;
      if(var40 != 0) {
         var12 = 1;
         if(var40 == 0 && var12 >= 95) {
            ++var11;
         } else {
            while(true) {
               var13 = this.getWallRoof(var11, var12);
               if(var13 > 0) {
                  label1139: {
                     var43 = var11 + 1;
                     var18 = var11 + 1;
                     var44 = var12 + 1;
                     var21 = var12 + 1;
                     var22 = 0;
                     var23 = this.terrainHeightLocal[var11][var12];
                     var24 = this.terrainHeightLocal[var43][var12];
                     var25 = this.terrainHeightLocal[var18][var44];
                     var26 = this.terrainHeightLocal[var11][var21];
                     if(var23 > 80000) {
                        var23 -= 80000;
                     }

                     if(var24 > 80000) {
                        var24 -= 80000;
                     }

                     if(var25 > 80000) {
                        var25 -= 80000;
                     }

                     if(var26 > 80000) {
                        var26 -= 80000;
                     }

                     if(var23 > var22) {
                        var22 = var23;
                     }

                     if(var24 > var22) {
                        var22 = var24;
                     }

                     if(var25 > var22) {
                        var22 = var25;
                     }

                     if(var26 > var22) {
                        var22 = var26;
                     }

                     if(var22 >= 80000) {
                        var22 -= 80000;
                     }

                     label687: {
                        if(var23 < 80000) {
                           this.terrainHeightLocal[var11][var12] = var22;
                           if(var40 == 0) {
                              break label687;
                           }
                        }

                        this.terrainHeightLocal[var11][var12] -= 80000;
                     }

                     label697: {
                        if(var24 < 80000) {
                           this.terrainHeightLocal[var43][var12] = var22;
                           if(var40 == 0) {
                              break label697;
                           }
                        }

                        this.terrainHeightLocal[var43][var12] -= 80000;
                     }

                     label707: {
                        if(var25 < 80000) {
                           this.terrainHeightLocal[var18][var44] = var22;
                           if(var40 == 0) {
                              break label707;
                           }
                        }

                        this.terrainHeightLocal[var18][var44] -= 80000;
                     }

                     if(var26 < 80000) {
                        this.terrainHeightLocal[var11][var21] = var22;
                        if(var40 == 0) {
                           break label1139;
                        }
                     }

                     this.terrainHeightLocal[var11][var21] -= 80000;
                  }
               }

               ++var12;
               if(var12 >= 95) {
                  ++var11;
                  break;
               }
            }
         }
      }

      parentModel.clear();
      while(var11 < 95) {
         var12 = 1;
         if(var40 == 0 && var12 >= 95) {
            ++var11;
         } else {
            do {
               var13 = this.getWallRoof(var11, var12);
               if(var13 > 0) {
                  label1147: {
                     var43 = var11 + 1;
                     var18 = var11 + 1;
                     var44 = var12 + 1;
                     var21 = var12 + 1;
                     var22 = 0;
                     var23 = this.terrainHeightLocal[var11][var12];
                     var24 = this.terrainHeightLocal[var43][var12];
                     var25 = this.terrainHeightLocal[var18][var44];
                     var26 = this.terrainHeightLocal[var11][var21];
                     if(var23 > 80000) {
                        var23 -= 80000;
                     }

                     if(var24 > 80000) {
                        var24 -= 80000;
                     }

                     if(var25 > 80000) {
                        var25 -= 80000;
                     }

                     if(var26 > 80000) {
                        var26 -= 80000;
                     }

                     if(var23 > var22) {
                        var22 = var23;
                     }

                     if(var24 > var22) {
                        var22 = var24;
                     }

                     if(var25 > var22) {
                        var22 = var25;
                     }

                     if(var26 > var22) {
                        var22 = var26;
                     }

                     if(var22 >= 80000) {
                        var22 -= 80000;
                     }

                     label564: {
                        if(var23 < 80000) {
                           this.terrainHeightLocal[var11][var12] = var22;
                           if(var40 == 0) {
                              break label564;
                           }
                        }

                        this.terrainHeightLocal[var11][var12] -= 80000;
                     }

                     label559: {
                        if(var24 < 80000) {
                           this.terrainHeightLocal[var43][var12] = var22;
                           if(var40 == 0) {
                              break label559;
                           }
                        }

                        this.terrainHeightLocal[var43][var12] -= 80000;
                     }

                     label554: {
                        if(var25 < 80000) {
                           this.terrainHeightLocal[var18][var44] = var22;
                           if(var40 == 0) {
                              break label554;
                           }
                        }

                        this.terrainHeightLocal[var18][var44] -= 80000;
                     }

                     if(var26 < 80000) {
                        this.terrainHeightLocal[var11][var21] = var22;
                        if(var40 == 0) {
                           break label1147;
                        }
                     }

                     this.terrainHeightLocal[var11][var21] -= 80000;
                  }
               }

               ++var12;
            } while(var12 < 95);

            ++var11;
         }
      }

      this.parentModel.clear();
      var12 = 1;
      if(var40 != 0 || var12 < 95) {
         do {
            var13 = 1;
            if(var40 == 0 && var13 >= 95) {
               ++var12;
            } else {
               do {
                  roof_nvs = this.getWallRoof(var12, var13);
                  if(roof_nvs > 0) {
                     label1143: {
                        var17 = var12 + 1;
                        var44 = var12 + 1;
                        var20 = var13 + 1;
                        var22 = var13 + 1;
                        var23 = var12 * 128;
                        var24 = var13 * 128;
                        var25 = var23 + 128;
                        var26 = var24 + 128;
                        int var27 = var23;
                        int var28 = var24;
                        int var29 = var25;
                        int var30 = var26;
                        int var31 = this.terrainHeightLocal[var12][var13];
                        int var32 = this.terrainHeightLocal[var17][var13];
                        int var33 = this.terrainHeightLocal[var44][var20];
                        int var34 = this.terrainHeightLocal[var12][var22];
                        int var35 = GameData.field_535[roof_nvs - 1];
                        if(this.hasRoof(var12, var13) && var31 < 80000) {
                           var31 += var35 + 80000;
                           this.terrainHeightLocal[var12][var13] = var31;
                        }

                        if(this.hasRoof(var17, var13) && var32 < 80000) {
                           var32 += var35 + 80000;
                           this.terrainHeightLocal[var17][var13] = var32;
                        }

                        if(this.hasRoof(var44, var20) && var33 < 80000) {
                           var33 += var35 + 80000;
                           this.terrainHeightLocal[var44][var20] = var33;
                        }

                        if(this.hasRoof(var12, var22) && var34 < 80000) {
                           var34 += var35 + 80000;
                           this.terrainHeightLocal[var12][var22] = var34;
                        }

                        if(var31 >= 80000) {
                           var31 -= 80000;
                        }

                        if(var32 >= 80000) {
                           var32 -= 80000;
                        }

                        if(var33 >= 80000) {
                           var33 -= 80000;
                        }

                        if(var34 >= 80000) {
                           var34 -= 80000;
                        }

                        byte var36 = 16;
                        if(!this.method427(var12 - 1, var13)) {
                           var23 -= var36;
                        }

                        if(!this.method427(var12 + 1, var13)) {
                           var23 += var36;
                        }

                        if(!this.method427(var12, var13 - 1)) {
                           var24 -= var36;
                        }

                        if(!this.method427(var12, var13 + 1)) {
                           var24 += var36;
                        }

                        if(!this.method427(var17 - 1, var13)) {
                           var25 -= var36;
                        }

                        if(!this.method427(var17 + 1, var13)) {
                           var25 += var36;
                        }

                        if(!this.method427(var17, var13 - 1)) {
                           var28 -= var36;
                        }

                        if(!this.method427(var17, var13 + 1)) {
                           var28 += var36;
                        }

                        if(!this.method427(var44 - 1, var20)) {
                           var29 -= var36;
                        }

                        if(!this.method427(var44 + 1, var20)) {
                           var29 += var36;
                        }

                        if(!this.method427(var44, var20 - 1)) {
                           var26 -= var36;
                        }

                        if(!this.method427(var44, var20 + 1)) {
                           var26 += var36;
                        }

                        if(!this.method427(var12 - 1, var22)) {
                           var27 -= var36;
                        }

                        if(!this.method427(var12 + 1, var22)) {
                           var27 += var36;
                        }

                        if(!this.method427(var12, var22 - 1)) {
                           var30 -= var36;
                        }

                        if(!this.method427(var12, var22 + 1)) {
                           var30 += var36;
                        }

                        roof_nvs = GameData.roofNumVertices[roof_nvs - 1];
                        var31 = -var31;
                        var32 = -var32;
                        var33 = -var33;
                        var34 = -var34;
                        int[] var37;
                        if(this.getWallDiagonal(var12, var13) > 12000 && this.getWallDiagonal(var12, var13) < 24000 && this.getWallRoof(var12 - 1, var13 - 1) == 0) {
                           var37 = new int[] {
                                   this.parentModel.vertexAt(var29, var33, var26),
                                   this.parentModel.vertexAt(var27, var34, var30),
                                   this.parentModel.vertexAt(var25, var32, var28)
                           };
                           this.parentModel.createFace(3, var37, roof_nvs, 12345678);
                           if(var40 == 0) {
                              break label1143;
                           }
                        }

                        if(this.getWallDiagonal(var12, var13) > 12000 && this.getWallDiagonal(var12, var13) < 24000 && this.getWallRoof(var12 + 1, var13 + 1) == 0) {
                           var37 = new int[]{this.parentModel.vertexAt(var23, var31, var24), this.parentModel.vertexAt(var25, var32, var28), this.parentModel.vertexAt(var27, var34, var30)};
                           this.parentModel.createFace(3, var37, roof_nvs, 12345678);
                           if(var40 == 0) {
                              break label1143;
                           }
                        }

                        if(this.getWallDiagonal(var12, var13) > 0 && this.getWallDiagonal(var12, var13) < 12000 && this.getWallRoof(var12 + 1, var13 - 1) == 0) {
                           var37 = new int[]{this.parentModel.vertexAt(var27, var34, var30), this.parentModel.vertexAt(var23, var31, var24), this.parentModel.vertexAt(var29, var33, var26)};
                           this.parentModel.createFace(3, var37, roof_nvs, 12345678);
                           if(var40 == 0) {
                              break label1143;
                           }
                        }

                        if(this.getWallDiagonal(var12, var13) > 0 && this.getWallDiagonal(var12, var13) < 12000 && this.getWallRoof(var12 - 1, var13 + 1) == 0) {
                           var37 = new int[]{this.parentModel.vertexAt(var25, var32, var28), this.parentModel.vertexAt(var29, var33, var26), this.parentModel.vertexAt(var23, var31, var24)};
                           this.parentModel.createFace(3, var37, roof_nvs, 12345678);
                           if(var40 == 0) {
                              break label1143;
                           }
                        }

                        if(var31 == var32 && var33 == var34) {
                           var37 = new int[] {
                                   this.parentModel.vertexAt(var23, var31, var24),
                                   this.parentModel.vertexAt(var25, var32, var28),
                                   this.parentModel.vertexAt(var29, var33, var26),
                                   this.parentModel.vertexAt(var27, var34, var30)
                           };
                           this.parentModel.createFace(4, var37, roof_nvs, 12345678);
                           if(var40 == 0) {
                              break label1143;
                           }
                        }

                        if(var31 == var34 && var32 == var33) {
                           var37 = new int[] {
                                   this.parentModel.vertexAt(var27, var34, var30),
                                   this.parentModel.vertexAt(var23, var31, var24),
                                   this.parentModel.vertexAt(var25, var32, var28),
                                   this.parentModel.vertexAt(var29, var33, var26)
                           };
                           this.parentModel.createFace(4, var37, roof_nvs, 12345678);
                           if(var40 == 0) {
                              break label1143;
                           }
                        }

                        boolean var45 = true;
                        if(this.getWallRoof(var12 - 1, var13 - 1) > 0) {
                           var45 = false;
                        }

                        if(this.getWallRoof(var12 + 1, var13 + 1) > 0) {
                           var45 = false;
                        }

                        int[] var38;
                        int[] var39;
                        if(!var45) {
                           var38 = new int[]{this.parentModel.vertexAt(var25, var32, var28), this.parentModel.vertexAt(var29, var33, var26), this.parentModel.vertexAt(var23, var31, var24)};
                           this.parentModel.createFace(3, var38, roof_nvs, 12345678);
                           var39 = new int[]{this.parentModel.vertexAt(var27, var34, var30), this.parentModel.vertexAt(var23, var31, var24), this.parentModel.vertexAt(var29, var33, var26)};
                           this.parentModel.createFace(3, var39, roof_nvs, 12345678);
                           if(var40 == 0) {
                              break label1143;
                           }
                        }

                        var38 = new int[]{this.parentModel.vertexAt(var23, var31, var24), this.parentModel.vertexAt(var25, var32, var28), this.parentModel.vertexAt(var27, var34, var30)};
                        this.parentModel.createFace(3, var38, roof_nvs, 12345678);
                        var39 = new int[]{this.parentModel.vertexAt(var29, var33, var26), this.parentModel.vertexAt(var27, var34, var30), this.parentModel.vertexAt(var25, var32, var28)};
                        this.parentModel.createFace(3, var39, roof_nvs, 12345678);
                     }
                  }

                  ++var13;
               } while(var13 < 95);

               ++var12;
            }
         } while(var12 < 95);
      }

      this.parentModel.setLight(true, 50, 50, -50, -10, -50);
      this.roofModels[plane] = this.parentModel.split(0, 0, 1536, 1536, 8, 64, 169, true);
      var13 = 0;
      if(var40 != 0) {
         this.field_823.addModel(this.roofModels[plane][var13]);
         ++var13;
      }

      while(var13 < 64) {
         this.field_823.addModel(this.roofModels[plane][var13]);
         ++var13;
      }

      if(this.roofModels[plane][0] == null) {
         throw new RuntimeException("null roof!");
      } else {
         roof_nvs = 0;
         if(var40 != 0 || roof_nvs < 96) {
            do {
               var15 = 0;
               if(var40 == 0 && var15 >= 96) {
                  ++roof_nvs;
               } else {
                  do {
                     if(this.terrainHeightLocal[roof_nvs][var15] >= 80000) {
                        this.terrainHeightLocal[roof_nvs][var15] -= 80000;
                     }

                     ++var15;
                  } while(var15 < 96);

                  ++roof_nvs;
               }
            } while(roof_nvs < 96);

         }
      }
   }

   // $FF: renamed from: a (a.a.f[]) void
   public void addModels(GameModel[] var1) {
      int var14 = GameData.field_563;
      int var2 = 0;
      if(var14 != 0 || var2 < this.field_840 - 2) {
         do {
            int var3 = 0;
            if(var14 == 0 && var3 >= this.field_841 - 2) {
               ++var2;
            } else {
               do {
                  if(this.getWallDiagonal(var2, var3) > '\ubb80' && this.getWallDiagonal(var2, var3) < '\uea60') {
                     int var4;
                     int var6;
                     int var7;
                     label120: {
                        var4 = this.getWallDiagonal(var2, var3) - '\ubb81';
                        int var5 = this.method_341(var2, var3);
                        if(var5 == 0 || var5 == 4) {
                           var6 = GameData.field_520[var4];
                           var7 = GameData.field_521[var4];
                           if(var14 == 0) {
                              break label120;
                           }
                        }

                        var7 = GameData.field_520[var4];
                        var6 = GameData.field_521[var4];
                     }

                     this.method_326(var2, var3, var4);
                     GameModel var8 = var1[GameData.field_519[var4]].method_391(false, true, false, false);
                     int var9 = (var2 + var2 + var6) * 128 / 2;
                     int var10 = (var3 + var3 + var7) * 128 / 2;
                     var8.method_377(var9, -this.getElevation(var9, var10), var10);
                     var8.method_376(0, this.method_341(var2, var3) * 32, 0);
                     this.field_823.addModel(var8);
                     var8.method_372(48, 48, -50, -10, -50);
                     if(var6 > 1 || var7 > 1) {
                        int var11 = var2;
                        if(var14 != 0 || var2 < var2 + var6) {
                           do {
                              int var12 = var3;
                              if(var14 == 0 && var3 >= var3 + var7) {
                                 ++var11;
                              } else {
                                 do {
                                    if((var11 > var2 || var12 > var3) && this.getWallDiagonal(var11, var12) - '\ubb81' == var4) {
                                       byte var13;
                                       label117: {
                                          var9 = var11;
                                          var10 = var12;
                                          var13 = 0;
                                          if(var11 >= 48 && var12 < 48) {
                                             var13 = 1;
                                             var9 = var11 - 48;
                                             if(var14 == 0) {
                                                break label117;
                                             }
                                          }

                                          if(var9 < 48 && var12 >= 48) {
                                             var13 = 2;
                                             var10 = var12 - 48;
                                             if(var14 == 0) {
                                                break label117;
                                             }
                                          }

                                          if(var9 >= 48 && var10 >= 48) {
                                             var13 = 3;
                                             var9 -= 48;
                                             var10 -= 48;
                                          }
                                       }

                                       this.wallsDiagonal[var13][var9 * 48 + var10] = 0;
                                    }

                                    ++var12;
                                 } while(var12 < var3 + var7);

                                 ++var11;
                              }
                           } while(var11 < var2 + var6);
                        }
                     }
                  }

                  ++var3;
               } while(var3 < this.field_841 - 2);

               ++var2;
            }
         } while(var2 < this.field_840 - 2);

      }
   }

   // $FF: renamed from: a (a.a.f, int, int, int, int, int) void
   public void method422(GameModel var1, int var2, int var3, int var4, int var5, int var6) {
      this.method_329(var3, var4, 40);
      this.method_329(var5, var6, 40);
      int var7 = GameData.field_529[var2];
      int var8 = GameData.field_530[var2];
      int var9 = GameData.field_531[var2];
      int var10 = var3 * 128;
      int var11 = var4 * 128;
      int var12 = var5 * 128;
      int var13 = var6 * 128;
      int var14 = var1.vertexAt(var10, -this.terrainHeightLocal[var3][var4], var11);
      int var15 = var1.vertexAt(var10, -this.terrainHeightLocal[var3][var4] - var7, var11);
      int var16 = var1.vertexAt(var12, -this.terrainHeightLocal[var5][var6] - var7, var13);
      int var17 = var1.vertexAt(var12, -this.terrainHeightLocal[var5][var6], var13);
      int[] var18 = new int[]{var14, var15, var16, var17};
      int var19 = var1.createFace(4, var18, var8, var9);
      if(GameData.wallObjectInvisible[var2] == 5) {
         var1.faceTag[var19] = 30000 + var2;
      } else {
         var1.faceTag[var19] = 0;
      }
   }

   // $FF: renamed from: c (int, int, int, int, int) void
   public void method428(int var1, int var2, int var3, int var4, int var5) {
      int var6 = GameData.field_529[var1];
      if(this.terrainHeightLocal[var2][var3] < 80000) {
         this.terrainHeightLocal[var2][var3] += 80000 + var6;
      }

      if(this.terrainHeightLocal[var4][var5] < 80000) {
         this.terrainHeightLocal[var4][var5] += 80000 + var6;
      }

   }
}
