package mudclient;

import java.io.IOException;

public class World {
   boolean udb = true;
   boolean vdb = false;
   Surface wdb;
   Scene xdb;
   int baseMediaSprite = 750;
   final int zdb = 12345678;
   final int aeb = 128;
   int[] beb = new int[256];
   int ceb;
   int[] deb;
   int[] eeb;
   int[] feb;
   byte[] geb;
   byte[][] heb = new byte[4][2304];
   byte[][] ieb = new byte[4][2304];
   byte[][] jeb = new byte[4][2304];
   byte[][] keb = new byte[4][2304];
   byte[][] leb = new byte[4][2304];
   byte[][] meb = new byte[4][2304];
   byte[][] neb = new byte[4][2304];
   int[][] oeb = new int[4][2304];
   int peb = 96;
   int qeb = 96;
   int[] mouseX;
   int[] mouseY;
   int[][] teb;
   int[][] objectAdjacency;
   int[][] veb;
   boolean playerAlive;
   GameModel[] xeb;
   GameModel[][] yeb;
   GameModel[][] zeb;
   GameModel parentModel;

   public World(Scene var1, Surface var2) {
      this.mouseX = new int[this.peb * this.qeb * 2];
      this.mouseY = new int[this.peb * this.qeb * 2];
      this.teb = new int[this.peb][this.qeb];
      this.objectAdjacency = new int[this.peb][this.qeb];
      this.veb = new int[this.peb][this.qeb];
      this.playerAlive = false;
      this.xeb = new GameModel[64];
      this.yeb = new GameModel[4][64];
      this.zeb = new GameModel[4][64];
      this.xdb = var1;
      this.wdb = var2;

      for(int var3 = 0; var3 < 64; ++var3) {
         this.beb[var3] = Scene.zh(255 - var3 * 4, 255 - (int)((double)var3 * 1.75D), 255 - var3 * 4);
      }

      for(int var4 = 0; var4 < 64; ++var4) {
         this.beb[var4 + 64] = Scene.zh(var4 * 3, 144, 0);
      }

      for(int var5 = 0; var5 < 64; ++var5) {
         this.beb[var5 + 128] = Scene.zh(192 - (int)((double)var5 * 1.5D), 144 - (int)((double)var5 * 1.5D), 0);
      }

      for(int var6 = 0; var6 < 64; ++var6) {
         this.beb[var6 + 192] = Scene.zh(96 - (int)((double)var6 * 1.5D), 48 + (int)((double)var6 * 1.5D), 0);
      }

   }

   public int route(int var1, int var2, int var3, int var4, int var5, int var6, int[] var7, int[] var8, boolean var9) {
      int var11;
      for(int var10 = 0; var10 < this.peb; ++var10) {
         for(var11 = 0; var11 < this.qeb; ++var11) {
            this.teb[var10][var11] = 0;
         }
      }

      byte var19 = 0;
      int var12 = 0;
      int var13 = var1;
      int var14 = var2;
      this.teb[var1][var2] = 99;
      var7[var19] = var1;
      var11 = var19 + 1;
      var8[var19] = var2;
      int var15 = var7.length;
      boolean var16 = false;

      while(var12 != var11) {
         var13 = var7[var12];
         var14 = var8[var12];
         var12 = (var12 + 1) % var15;
         if(var13 >= var3 && var13 <= var5 && var14 >= var4 && var14 <= var6) {
            var16 = true;
            break;
         }

         if(var9) {
            if(var13 > 0 && var13 - 1 >= var3 && var13 - 1 <= var5 && var14 >= var4 && var14 <= var6 && (this.objectAdjacency[var13 - 1][var14] & 8) == 0) {
               var16 = true;
               break;
            }

            if(var13 < this.peb - 1 && var13 + 1 >= var3 && var13 + 1 <= var5 && var14 >= var4 && var14 <= var6 && (this.objectAdjacency[var13 + 1][var14] & 2) == 0) {
               var16 = true;
               break;
            }

            if(var14 > 0 && var13 >= var3 && var13 <= var5 && var14 - 1 >= var4 && var14 - 1 <= var6 && (this.objectAdjacency[var13][var14 - 1] & 4) == 0) {
               var16 = true;
               break;
            }

            if(var14 < this.qeb - 1 && var13 >= var3 && var13 <= var5 && var14 + 1 >= var4 && var14 + 1 <= var6 && (this.objectAdjacency[var13][var14 + 1] & 1) == 0) {
               var16 = true;
               break;
            }
         }

         if(var13 > 0 && this.teb[var13 - 1][var14] == 0 && (this.objectAdjacency[var13 - 1][var14] & 120) == 0) {
            var7[var11] = var13 - 1;
            var8[var11] = var14;
            var11 = (var11 + 1) % var15;
            this.teb[var13 - 1][var14] = 2;
         }

         if(var13 < this.peb - 1 && this.teb[var13 + 1][var14] == 0 && (this.objectAdjacency[var13 + 1][var14] & 114) == 0) {
            var7[var11] = var13 + 1;
            var8[var11] = var14;
            var11 = (var11 + 1) % var15;
            this.teb[var13 + 1][var14] = 8;
         }

         if(var14 > 0 && this.teb[var13][var14 - 1] == 0 && (this.objectAdjacency[var13][var14 - 1] & 116) == 0) {
            var7[var11] = var13;
            var8[var11] = var14 - 1;
            var11 = (var11 + 1) % var15;
            this.teb[var13][var14 - 1] = 1;
         }

         if(var14 < this.qeb - 1 && this.teb[var13][var14 + 1] == 0 && (this.objectAdjacency[var13][var14 + 1] & 113) == 0) {
            var7[var11] = var13;
            var8[var11] = var14 + 1;
            var11 = (var11 + 1) % var15;
            this.teb[var13][var14 + 1] = 4;
         }

         if(var13 > 0 && var14 > 0 && (this.objectAdjacency[var13][var14 - 1] & 116) == 0 && (this.objectAdjacency[var13 - 1][var14] & 120) == 0 && (this.objectAdjacency[var13 - 1][var14 - 1] & 124) == 0 && this.teb[var13 - 1][var14 - 1] == 0) {
            var7[var11] = var13 - 1;
            var8[var11] = var14 - 1;
            var11 = (var11 + 1) % var15;
            this.teb[var13 - 1][var14 - 1] = 3;
         }

         if(var13 < this.peb - 1 && var14 > 0 && (this.objectAdjacency[var13][var14 - 1] & 116) == 0 && (this.objectAdjacency[var13 + 1][var14] & 114) == 0 && (this.objectAdjacency[var13 + 1][var14 - 1] & 118) == 0 && this.teb[var13 + 1][var14 - 1] == 0) {
            var7[var11] = var13 + 1;
            var8[var11] = var14 - 1;
            var11 = (var11 + 1) % var15;
            this.teb[var13 + 1][var14 - 1] = 9;
         }

         if(var13 > 0 && var14 < this.qeb - 1 && (this.objectAdjacency[var13][var14 + 1] & 113) == 0 && (this.objectAdjacency[var13 - 1][var14] & 120) == 0 && (this.objectAdjacency[var13 - 1][var14 + 1] & 121) == 0 && this.teb[var13 - 1][var14 + 1] == 0) {
            var7[var11] = var13 - 1;
            var8[var11] = var14 + 1;
            var11 = (var11 + 1) % var15;
            this.teb[var13 - 1][var14 + 1] = 6;
         }

         if(var13 < this.peb - 1 && var14 < this.qeb - 1 && (this.objectAdjacency[var13][var14 + 1] & 113) == 0 && (this.objectAdjacency[var13 + 1][var14] & 114) == 0 && (this.objectAdjacency[var13 + 1][var14 + 1] & 115) == 0 && this.teb[var13 + 1][var14 + 1] == 0) {
            var7[var11] = var13 + 1;
            var8[var11] = var14 + 1;
            var11 = (var11 + 1) % var15;
            this.teb[var13 + 1][var14 + 1] = 12;
         }
      }

      if(!var16) {
         return -1;
      } else {
         byte var20 = 0;
         var7[var20] = var13;
         var12 = var20 + 1;
         var8[var20] = var14;

         int var18;
         for(int var17 = var18 = this.teb[var13][var14]; var13 != var1 || var14 != var2; var17 = this.teb[var13][var14]) {
            if(var17 != var18) {
               var18 = var17;
               var7[var12] = var13;
               var8[var12++] = var14;
            }

            if((var17 & 2) != 0) {
               ++var13;
            } else if((var17 & 8) != 0) {
               --var13;
            }

            if((var17 & 1) != 0) {
               ++var14;
            } else if((var17 & 4) != 0) {
               --var14;
            }
         }

         return var12;
      }
   }

   public void ao(int var1, int var2, int var3) {
      this.objectAdjacency[var1][var2] |= var3;
   }

   public void tn(int var1, int var2, int var3) {
      this.objectAdjacency[var1][var2] &= '\uffff' - var3;
   }

   public void bo(int var1, int var2, int var3, int var4) {
      if(var1 >= 0 && var2 >= 0 && var1 < this.peb - 1 && var2 < this.qeb - 1) {
         if(GameData.tib[var4] == 1) {
            if(var3 == 0) {
               this.objectAdjacency[var1][var2] |= 1;
               if(var2 > 0) {
                  this.ao(var1, var2 - 1, 4);
               }
            } else if(var3 == 1) {
               this.objectAdjacency[var1][var2] |= 2;
               if(var1 > 0) {
                  this.ao(var1 - 1, var2, 8);
               }
            } else if(var3 == 2) {
               this.objectAdjacency[var1][var2] |= 16;
            } else if(var3 == 3) {
               this.objectAdjacency[var1][var2] |= 32;
            }

            this.in(var1, var2, 1, 1);
         }

      }
   }

   public void removeWallObject(int var1, int var2, int var3, int var4) {
      if(var1 >= 0 && var2 >= 0 && var1 < this.peb - 1 && var2 < this.qeb - 1) {
         if(GameData.tib[var4] == 1) {
            if(var3 == 0) {
               this.objectAdjacency[var1][var2] &= '\ufffe';
               if(var2 > 0) {
                  this.tn(var1, var2 - 1, 4);
               }
            } else if(var3 == 1) {
               this.objectAdjacency[var1][var2] &= '\ufffd';
               if(var1 > 0) {
                  this.tn(var1 - 1, var2, 8);
               }
            } else if(var3 == 2) {
               this.objectAdjacency[var1][var2] &= '\uffef';
            } else if(var3 == 3) {
               this.objectAdjacency[var1][var2] &= '\uffdf';
            }

            this.in(var1, var2, 1, 1);
         }

      }
   }

   public void pn(int var1, int var2, int var3) {
      if(var1 >= 0 && var2 >= 0 && var1 < this.peb - 1 && var2 < this.qeb - 1) {
         if(GameData.iib[var3] == 1 || GameData.iib[var3] == 2) {
            int var4 = this.dn(var1, var2);
            int var5;
            int var6;
            if(var4 != 0 && var4 != 4) {
               var6 = GameData.gib[var3];
               var5 = GameData.hib[var3];
            } else {
               var5 = GameData.gib[var3];
               var6 = GameData.hib[var3];
            }

            for(int var7 = var1; var7 < var1 + var5; ++var7) {
               for(int var8 = var2; var8 < var2 + var6; ++var8) {
                  if(GameData.iib[var3] == 1) {
                     this.objectAdjacency[var7][var8] |= 64;
                  } else if(var4 == 0) {
                     this.objectAdjacency[var7][var8] |= 2;
                     if(var7 > 0) {
                        this.ao(var7 - 1, var8, 8);
                     }
                  } else if(var4 == 2) {
                     this.objectAdjacency[var7][var8] |= 4;
                     if(var8 < this.qeb - 1) {
                        this.ao(var7, var8 + 1, 1);
                     }
                  } else if(var4 == 4) {
                     this.objectAdjacency[var7][var8] |= 8;
                     if(var7 < this.peb - 1) {
                        this.ao(var7 + 1, var8, 2);
                     }
                  } else if(var4 == 6) {
                     this.objectAdjacency[var7][var8] |= 1;
                     if(var8 > 0) {
                        this.ao(var7, var8 - 1, 4);
                     }
                  }
               }
            }

            this.in(var1, var2, var5, var6);
         }

      }
   }

   public void removeObject(int var1, int var2, int var3) {
      if(var1 >= 0 && var2 >= 0 && var1 < this.peb - 1 && var2 < this.qeb - 1) {
         if(GameData.iib[var3] == 1 || GameData.iib[var3] == 2) {
            int var4 = this.dn(var1, var2);
            int var5;
            int var6;
            if(var4 != 0 && var4 != 4) {
               var6 = GameData.gib[var3];
               var5 = GameData.hib[var3];
            } else {
               var5 = GameData.gib[var3];
               var6 = GameData.hib[var3];
            }

            for(int var7 = var1; var7 < var1 + var5; ++var7) {
               for(int var8 = var2; var8 < var2 + var6; ++var8) {
                  if(GameData.iib[var3] == 1) {
                     this.objectAdjacency[var7][var8] &= '\uffbf';
                  } else if(var4 == 0) {
                     this.objectAdjacency[var7][var8] &= '\ufffd';
                     if(var7 > 0) {
                        this.tn(var7 - 1, var8, 8);
                     }
                  } else if(var4 == 2) {
                     this.objectAdjacency[var7][var8] &= '\ufffb';
                     if(var8 < this.qeb - 1) {
                        this.tn(var7, var8 + 1, 1);
                     }
                  } else if(var4 == 4) {
                     this.objectAdjacency[var7][var8] &= '\ufff7';
                     if(var7 < this.peb - 1) {
                        this.tn(var7 + 1, var8, 2);
                     }
                  } else if(var4 == 6) {
                     this.objectAdjacency[var7][var8] &= '\ufffe';
                     if(var8 > 0) {
                        this.tn(var7, var8 - 1, 4);
                     }
                  }
               }
            }

            this.in(var1, var2, var5, var6);
         }

      }
   }

   public void in(int var1, int var2, int var3, int var4) {
      if(var1 >= 1 && var2 >= 1 && var1 + var3 < this.peb && var2 + var4 < this.qeb) {
         for(int var5 = var1; var5 <= var1 + var3; ++var5) {
            for(int var6 = var2; var6 <= var2 + var4; ++var6) {
               if((this.fo(var5, var6) & 99) == 0 && (this.fo(var5 - 1, var6) & 89) == 0 && (this.fo(var5, var6 - 1) & 86) == 0 && (this.fo(var5 - 1, var6 - 1) & 108) == 0) {
                  this.nn(var5, var6, 0);
               } else {
                  this.nn(var5, var6, 35);
               }
            }
         }

      }
   }

   public void nn(int var1, int var2, int var3) {
      int var4 = var1 / 12;
      int var5 = var2 / 12;
      int var6 = (var1 - 1) / 12;
      int var7 = (var2 - 1) / 12;
      this.co(var4, var5, var1, var2, var3);
      if(var4 != var6) {
         this.co(var6, var5, var1, var2, var3);
      }

      if(var5 != var7) {
         this.co(var4, var7, var1, var2, var3);
      }

      if(var4 != var6 && var5 != var7) {
         this.co(var6, var7, var1, var2, var3);
      }

   }

   public void co(int var1, int var2, int var3, int var4, int var5) {
      GameModel var6 = this.xeb[var1 + var2 * 8];

      for(int var7 = 0; var7 < var6.jg; ++var7) {
         if(var6.ei[var7] == var3 * 128 && var6.gi[var7] == var4 * 128) {
            var6.ud(var7, var5);
            return;
         }
      }

   }

   public int fo(int var1, int var2) {
      return var1 >= 0 && var2 >= 0 && var1 < this.peb && var2 < this.qeb?this.objectAdjacency[var1][var2]:0;
   }

   public int getElevation(int var1, int var2) {
      int var3 = var1 >> 7;
      int var4 = var2 >> 7;
      int var5 = var1 & 127;
      int var6 = var2 & 127;
      if(var3 >= 0 && var4 >= 0 && var3 < this.peb - 1 && var4 < this.qeb - 1) {
         int var7;
         int var8;
         int var9;
         if(var5 <= 128 - var6) {
            var7 = this.on(var3, var4);
            var8 = this.on(var3 + 1, var4) - var7;
            var9 = this.on(var3, var4 + 1) - var7;
         } else {
            var7 = this.on(var3 + 1, var4 + 1);
            var8 = this.on(var3, var4 + 1) - var7;
            var9 = this.on(var3 + 1, var4) - var7;
            var5 = 128 - var5;
            var6 = 128 - var6;
         }

         int var10 = var7 + var8 * var5 / 128 + var9 * var6 / 128;
         return var10;
      } else {
         return 0;
      }
   }

   public int on(int var1, int var2) {
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var3 = 0;
         if(var1 >= 48 && var2 < 48) {
            var3 = 1;
            var1 -= 48;
         } else if(var1 < 48 && var2 >= 48) {
            var3 = 2;
            var2 -= 48;
         } else if(var1 >= 48 && var2 >= 48) {
            var3 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return (this.heb[var3][var1 * 48 + var2] & 255) * 3;
      } else {
         return 0;
      }
   }

   public int bn(int var1, int var2) {
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var3 = 0;
         if(var1 >= 48 && var2 < 48) {
            var3 = 1;
            var1 -= 48;
         } else if(var1 < 48 && var2 >= 48) {
            var3 = 2;
            var2 -= 48;
         } else if(var1 >= 48 && var2 >= 48) {
            var3 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return this.ieb[var3][var1 * 48 + var2] & 255;
      } else {
         return 0;
      }
   }

   public int qn(int var1, int var2, int var3) {
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var4 = 0;
         if(var1 >= 48 && var2 < 48) {
            var4 = 1;
            var1 -= 48;
         } else if(var1 < 48 && var2 >= 48) {
            var4 = 2;
            var2 -= 48;
         } else if(var1 >= 48 && var2 >= 48) {
            var4 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return this.meb[var4][var1 * 48 + var2] & 255;
      } else {
         return 0;
      }
   }

   public void mn(int var1, int var2, int var3) {
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var4 = 0;
         if(var1 >= 48 && var2 < 48) {
            var4 = 1;
            var1 -= 48;
         } else if(var1 < 48 && var2 >= 48) {
            var4 = 2;
            var2 -= 48;
         } else if(var1 >= 48 && var2 >= 48) {
            var4 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         this.meb[var4][var1 * 48 + var2] = (byte)var3;
      }
   }

   public int wn(int var1, int var2, int var3) {
      int var4 = this.qn(var1, var2, var3);
      if(var4 == 0) {
         return -1;
      } else {
         int var5 = GameData.ejb[var4 - 1];
         return var5 == 2?1:0;
      }
   }

   public int hn(int var1, int var2, int var3, int var4) {
      int var5 = this.qn(var1, var2, var3);
      return var5 == 0?var4: GameData.djb[var5 - 1];
   }

   public int gn(int var1, int var2) {
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var3 = 0;
         if(var1 >= 48 && var2 < 48) {
            var3 = 1;
            var1 -= 48;
         } else if(var1 < 48 && var2 >= 48) {
            var3 = 2;
            var2 -= 48;
         } else if(var1 >= 48 && var2 >= 48) {
            var3 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return this.oeb[var3][var1 * 48 + var2];
      } else {
         return 0;
      }
   }

   public int vn(int var1, int var2) {
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var3 = 0;
         if(var1 >= 48 && var2 < 48) {
            var3 = 1;
            var1 -= 48;
         } else if(var1 < 48 && var2 >= 48) {
            var3 = 2;
            var2 -= 48;
         } else if(var1 >= 48 && var2 >= 48) {
            var3 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return this.leb[var3][var1 * 48 + var2];
      } else {
         return 0;
      }
   }

   public int dn(int var1, int var2) {
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var3 = 0;
         if(var1 >= 48 && var2 < 48) {
            var3 = 1;
            var1 -= 48;
         } else if(var1 < 48 && var2 >= 48) {
            var3 = 2;
            var2 -= 48;
         } else if(var1 >= 48 && var2 >= 48) {
            var3 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return this.neb[var3][var1 * 48 + var2];
      } else {
         return 0;
      }
   }

   public boolean yn(int var1, int var2) {
      return this.vn(var1, var2) > 0 || this.vn(var1 - 1, var2) > 0 || this.vn(var1 - 1, var2 - 1) > 0 || this.vn(var1, var2 - 1) > 0;
   }

   public boolean xn(int var1, int var2) {
      return this.vn(var1, var2) > 0 && this.vn(var1 - 1, var2) > 0 && this.vn(var1 - 1, var2 - 1) > 0 && this.vn(var1, var2 - 1) > 0;
   }

   public int kn(int var1, int var2) {
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var3 = 0;
         if(var1 >= 48 && var2 < 48) {
            var3 = 1;
            var1 -= 48;
         } else if(var1 < 48 && var2 >= 48) {
            var3 = 2;
            var2 -= 48;
         } else if(var1 >= 48 && var2 >= 48) {
            var3 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return this.keb[var3][var1 * 48 + var2] & 255;
      } else {
         return 0;
      }
   }

   public int sn(int var1, int var2) {
      if(var1 >= 0 && var1 < 96 && var2 >= 0 && var2 < 96) {
         byte var3 = 0;
         if(var1 >= 48 && var2 < 48) {
            var3 = 1;
            var1 -= 48;
         } else if(var1 < 48 && var2 >= 48) {
            var3 = 2;
            var2 -= 48;
         } else if(var1 >= 48 && var2 >= 48) {
            var3 = 3;
            var1 -= 48;
            var2 -= 48;
         }

         return this.jeb[var3][var1 * 48 + var2] & 255;
      } else {
         return 0;
      }
   }

   public void loadSection(int x, int y, int plane, int chunk) {
      String var5 = "m" + plane + x / 10 + x % 10 + y / 10 + y % 10;

      try {
         byte[] var18;
         if(this.udb) {
            var18 = Utility.unpackData(var5 + ".jm", 0, this.geb);
            if(var18 == null || var18.length == 0) {
               throw new IOException("Map not defined");
            }
         } else {
            var18 = new byte[20736];
            Utility.loadData("../gamedata/maps/" + var5 + ".jm", var18, 20736);
         }

         int var7 = 0;
         int var8 = 0;

         for(int var9 = 0; var9 < 2304; ++var9) {
            var7 = var7 + var18[var8++] & 255;
            this.heb[chunk][var9] = (byte)var7;
         }

         var7 = 0;

         for(int var10 = 0; var10 < 2304; ++var10) {
            var7 = var7 + var18[var8++] & 255;
            this.ieb[chunk][var10] = (byte)var7;
         }

         for(int var11 = 0; var11 < 2304; ++var11) {
            this.jeb[chunk][var11] = var18[var8++];
         }

         for(int var12 = 0; var12 < 2304; ++var12) {
            this.keb[chunk][var12] = var18[var8++];
         }

         for(int var13 = 0; var13 < 2304; ++var13) {
            this.oeb[chunk][var13] = (var18[var8] & 255) * 256 + (var18[var8 + 1] & 255);
            var8 += 2;
         }

         for(int var14 = 0; var14 < 2304; ++var14) {
            this.leb[chunk][var14] = var18[var8++];
         }

         for(int var15 = 0; var15 < 2304; ++var15) {
            this.meb[chunk][var15] = var18[var8++];
         }

         for(int var16 = 0; var16 < 2304; ++var16) {
            this.neb[chunk][var16] = var18[var8++];
         }

      } catch (IOException var17) {
         for(int var6 = 0; var6 < 2304; ++var6) {
            this.heb[chunk][var6] = 0;
            this.ieb[chunk][var6] = 0;
            this.jeb[chunk][var6] = 0;
            this.keb[chunk][var6] = 0;
            this.oeb[chunk][var6] = 0;
            this.leb[chunk][var6] = 0;
            this.meb[chunk][var6] = 0;
            if(plane == 0) {
               this.meb[chunk][var6] = -6;
            }

            if(plane == 3) {
               this.meb[chunk][var6] = 8;
            }

            this.neb[chunk][var6] = 0;
         }

      }
   }

   public void eo() {
      this.xdb.clear();

      for(int var1 = 0; var1 < 64; ++var1) {
         this.xeb[var1] = null;

         for(int var2 = 0; var2 < 4; ++var2) {
            this.yeb[var2][var1] = null;
         }

         for(int var3 = 0; var3 < 4; ++var3) {
            this.zeb[var3][var1] = null;
         }
      }

      System.gc();
   }

   public void loadSection(int var1, int var2, int var3) {
      this.eo();
      int var4 = (var1 + 24) / 48;
      int var5 = (var2 + 24) / 48;
      this.fn(var1, var2, var3, true);
      if(var3 == 0) {
         this.fn(var1, var2, 1, false);
         this.fn(var1, var2, 2, false);
         this.loadSection(var4 - 1, var5 - 1, var3, 0);
         this.loadSection(var4, var5 - 1, var3, 1);
         this.loadSection(var4 - 1, var5, var3, 2);
         this.loadSection(var4, var5, var3, 3);
         this.ln();
      }

   }

   public void ln() {
      for(int var1 = 0; var1 < 96; ++var1) {
         for(int var2 = 0; var2 < 96; ++var2) {
            if(this.qn(var1, var2, 0) == 250) {
               if(var1 == 47 && this.qn(var1 + 1, var2, 0) != 250 && this.qn(var1 + 1, var2, 0) != 2) {
                  this.mn(var1, var2, 9);
               } else if(var2 == 47 && this.qn(var1, var2 + 1, 0) != 250 && this.qn(var1, var2 + 1, 0) != 2) {
                  this.mn(var1, var2, 9);
               } else {
                  this.mn(var1, var2, 2);
               }
            }
         }
      }

   }

   public void en(int var1, int var2, int var3, int var4, int var5) {
      int var6 = var1 * 3;
      int var7 = var2 * 3;
      int var8 = this.xdb.oi(var4);
      int var9 = this.xdb.oi(var5);
      var8 = var8 >> 1 & 8355711;
      var9 = var9 >> 1 & 8355711;
      if(var3 == 0) {
         this.wdb.drawLineHoriz(var6, var7, 3, var8);
         this.wdb.drawLineHoriz(var6, var7 + 1, 2, var8);
         this.wdb.drawLineHoriz(var6, var7 + 2, 1, var8);
         this.wdb.drawLineHoriz(var6 + 2, var7 + 1, 1, var9);
         this.wdb.drawLineHoriz(var6 + 1, var7 + 2, 2, var9);
      } else {
         if(var3 == 1) {
            this.wdb.drawLineHoriz(var6, var7, 3, var9);
            this.wdb.drawLineHoriz(var6 + 1, var7 + 1, 2, var9);
            this.wdb.drawLineHoriz(var6 + 2, var7 + 2, 1, var9);
            this.wdb.drawLineHoriz(var6, var7 + 1, 1, var8);
            this.wdb.drawLineHoriz(var6, var7 + 2, 2, var8);
         }

      }
   }

   public void fn(int var1, int var2, int var3, boolean var4) {
      int var5 = (var1 + 24) / 48;
      int var6 = (var2 + 24) / 48;
      this.loadSection(var5 - 1, var6 - 1, var3, 0);
      this.loadSection(var5, var6 - 1, var3, 1);
      this.loadSection(var5 - 1, var6, var3, 2);
      this.loadSection(var5, var6, var3, 3);
      this.ln();
      if(this.parentModel == null) {
         this.parentModel = new GameModel(this.peb * this.qeb * 2 + 256, this.peb * this.qeb * 2 + 256, true, true, false, false, true);
      }

      int var7;
      int var8;
      int var9;
      int var10;
      int var11;
      int var12;
      int var13;
      int var14;
      int var15;
      int var17;
      int var18;
      int var20;
      int var42;
      int var43;
      if(var4) {
         this.wdb.blackScreen();

         for(var7 = 0; var7 < 96; ++var7) {
            for(var8 = 0; var8 < 96; ++var8) {
               this.objectAdjacency[var7][var8] = 0;
            }
         }

         GameModel var40 = this.parentModel;
         var40.re();

         for(var9 = 0; var9 < 96; ++var9) {
            for(var10 = 0; var10 < 96; ++var10) {
               var11 = -this.on(var9, var10);
               if(this.qn(var9, var10, var3) > 0 && GameData.ejb[this.qn(var9, var10, var3) - 1] == 4) {
                  var11 = 0;
               }

               if(this.qn(var9 - 1, var10, var3) > 0 && GameData.ejb[this.qn(var9 - 1, var10, var3) - 1] == 4) {
                  var11 = 0;
               }

               if(this.qn(var9, var10 - 1, var3) > 0 && GameData.ejb[this.qn(var9, var10 - 1, var3) - 1] == 4) {
                  var11 = 0;
               }

               if(this.qn(var9 - 1, var10 - 1, var3) > 0 && GameData.ejb[this.qn(var9 - 1, var10 - 1, var3) - 1] == 4) {
                  var11 = 0;
               }

               var12 = var40.je(var9 * 128, var11, var10 * 128);
               var13 = (int)(Math.random() * 10.0D) - 5;
               var40.ud(var12, var13);
            }
         }

         int[] var41;
         for(var10 = 0; var10 < 95; ++var10) {
            for(var11 = 0; var11 < 95; ++var11) {
               var12 = this.bn(var10, var11);
               var13 = this.beb[var12];
               var14 = var13;
               var15 = var13;
               byte var16 = 0;
               if(var3 == 1 || var3 == 2) {
                  var13 = 12345678;
                  var14 = 12345678;
                  var15 = 12345678;
               }

               if(this.qn(var10, var11, var3) > 0) {
                  var17 = this.qn(var10, var11, var3);
                  var12 = GameData.ejb[var17 - 1];
                  var18 = this.wn(var10, var11, var3);
                  var13 = var14 = GameData.djb[var17 - 1];
                  if(var12 == 4) {
                     var13 = 1;
                     var14 = 1;
                  }

                  if(var12 == 5) {
                     if(this.gn(var10, var11) > 0 && this.gn(var10, var11) < 24000) {
                        if(this.hn(var10 - 1, var11, var3, var15) != 12345678 && this.hn(var10, var11 - 1, var3, var15) != 12345678) {
                           var13 = this.hn(var10 - 1, var11, var3, var15);
                           var16 = 0;
                        } else if(this.hn(var10 + 1, var11, var3, var15) != 12345678 && this.hn(var10, var11 + 1, var3, var15) != 12345678) {
                           var14 = this.hn(var10 + 1, var11, var3, var15);
                           var16 = 0;
                        } else if(this.hn(var10 + 1, var11, var3, var15) != 12345678 && this.hn(var10, var11 - 1, var3, var15) != 12345678) {
                           var14 = this.hn(var10 + 1, var11, var3, var15);
                           var16 = 1;
                        } else if(this.hn(var10 - 1, var11, var3, var15) != 12345678 && this.hn(var10, var11 + 1, var3, var15) != 12345678) {
                           var13 = this.hn(var10 - 1, var11, var3, var15);
                           var16 = 1;
                        }
                     }
                  } else if(var12 != 2 || this.gn(var10, var11) > 0 && this.gn(var10, var11) < 24000) {
                     if(this.wn(var10 - 1, var11, var3) != var18 && this.wn(var10, var11 - 1, var3) != var18) {
                        var13 = var15;
                        var16 = 0;
                     } else if(this.wn(var10 + 1, var11, var3) != var18 && this.wn(var10, var11 + 1, var3) != var18) {
                        var14 = var15;
                        var16 = 0;
                     } else if(this.wn(var10 + 1, var11, var3) != var18 && this.wn(var10, var11 - 1, var3) != var18) {
                        var14 = var15;
                        var16 = 1;
                     } else if(this.wn(var10 - 1, var11, var3) != var18 && this.wn(var10, var11 + 1, var3) != var18) {
                        var13 = var15;
                        var16 = 1;
                     }
                  }

                  if(GameData.fjb[var17 - 1] != 0) {
                     this.objectAdjacency[var10][var11] |= 64;
                  }

                  if(GameData.ejb[var17 - 1] == 2) {
                     this.objectAdjacency[var10][var11] |= 128;
                  }
               }

               this.en(var10, var11, var16, var13, var14);
               var17 = this.on(var10 + 1, var11 + 1) - this.on(var10 + 1, var11) + this.on(var10, var11 + 1) - this.on(var10, var11);
               if(var13 == var14 && var17 == 0) {
                  if(var13 != 12345678) {
                     var41 = new int[]{var11 + var10 * this.peb + this.peb, var11 + var10 * this.peb, var11 + var10 * this.peb + 1, var11 + var10 * this.peb + this.peb + 1};
                     var42 = var40.createFace(4, var41, 12345678, var13);
                     this.mouseX[var42] = var10;
                     this.mouseY[var42] = var11;
                     var40.faceTag[var42] = 200000 + var42;
                  }
               } else {
                  var41 = new int[3];
                  int[] var19 = new int[3];
                  if(var16 == 0) {
                     if(var13 != 12345678) {
                        var41[0] = var11 + var10 * this.peb + this.peb;
                        var41[1] = var11 + var10 * this.peb;
                        var41[2] = var11 + var10 * this.peb + 1;
                        var20 = var40.createFace(3, var41, 12345678, var13);
                        this.mouseX[var20] = var10;
                        this.mouseY[var20] = var11;
                        var40.faceTag[var20] = 200000 + var20;
                     }

                     if(var14 != 12345678) {
                        var19[0] = var11 + var10 * this.peb + 1;
                        var19[1] = var11 + var10 * this.peb + this.peb + 1;
                        var19[2] = var11 + var10 * this.peb + this.peb;
                        var20 = var40.createFace(3, var19, 12345678, var14);
                        this.mouseX[var20] = var10;
                        this.mouseY[var20] = var11;
                        var40.faceTag[var20] = 200000 + var20;
                     }
                  } else {
                     if(var13 != 12345678) {
                        var41[0] = var11 + var10 * this.peb + 1;
                        var41[1] = var11 + var10 * this.peb + this.peb + 1;
                        var41[2] = var11 + var10 * this.peb;
                        var20 = var40.createFace(3, var41, 12345678, var13);
                        this.mouseX[var20] = var10;
                        this.mouseY[var20] = var11;
                        var40.faceTag[var20] = 200000 + var20;
                     }

                     if(var14 != 12345678) {
                        var19[0] = var11 + var10 * this.peb + this.peb;
                        var19[1] = var11 + var10 * this.peb;
                        var19[2] = var11 + var10 * this.peb + this.peb + 1;
                        var20 = var40.createFace(3, var19, 12345678, var14);
                        this.mouseX[var20] = var10;
                        this.mouseY[var20] = var11;
                        var40.faceTag[var20] = 200000 + var20;
                     }
                  }
               }
            }
         }

         for(var11 = 1; var11 < 95; ++var11) {
            for(var12 = 1; var12 < 95; ++var12) {
               if(this.qn(var11, var12, var3) > 0 && GameData.ejb[this.qn(var11, var12, var3) - 1] == 4) {
                  var13 = GameData.djb[this.qn(var11, var12, var3) - 1];
                  var14 = var40.je(var11 * 128, -this.on(var11, var12), var12 * 128);
                  var15 = var40.je((var11 + 1) * 128, -this.on(var11 + 1, var12), var12 * 128);
                  var43 = var40.je((var11 + 1) * 128, -this.on(var11 + 1, var12 + 1), (var12 + 1) * 128);
                  var17 = var40.je(var11 * 128, -this.on(var11, var12 + 1), (var12 + 1) * 128);
                  var41 = new int[]{var14, var15, var43, var17};
                  var42 = var40.createFace(4, var41, var13, 12345678);
                  this.mouseX[var42] = var11;
                  this.mouseY[var42] = var12;
                  var40.faceTag[var42] = 200000 + var42;
                  this.en(var11, var12, 0, var13, var13);
               } else if(this.qn(var11, var12, var3) == 0 || GameData.ejb[this.qn(var11, var12, var3) - 1] != 3) {
                  if(this.qn(var11, var12 + 1, var3) > 0 && GameData.ejb[this.qn(var11, var12 + 1, var3) - 1] == 4) {
                     var13 = GameData.djb[this.qn(var11, var12 + 1, var3) - 1];
                     var14 = var40.je(var11 * 128, -this.on(var11, var12), var12 * 128);
                     var15 = var40.je((var11 + 1) * 128, -this.on(var11 + 1, var12), var12 * 128);
                     var43 = var40.je((var11 + 1) * 128, -this.on(var11 + 1, var12 + 1), (var12 + 1) * 128);
                     var17 = var40.je(var11 * 128, -this.on(var11, var12 + 1), (var12 + 1) * 128);
                     var41 = new int[]{var14, var15, var43, var17};
                     var42 = var40.createFace(4, var41, var13, 12345678);
                     this.mouseX[var42] = var11;
                     this.mouseY[var42] = var12;
                     var40.faceTag[var42] = 200000 + var42;
                     this.en(var11, var12, 0, var13, var13);
                  }

                  if(this.qn(var11, var12 - 1, var3) > 0 && GameData.ejb[this.qn(var11, var12 - 1, var3) - 1] == 4) {
                     var13 = GameData.djb[this.qn(var11, var12 - 1, var3) - 1];
                     var14 = var40.je(var11 * 128, -this.on(var11, var12), var12 * 128);
                     var15 = var40.je((var11 + 1) * 128, -this.on(var11 + 1, var12), var12 * 128);
                     var43 = var40.je((var11 + 1) * 128, -this.on(var11 + 1, var12 + 1), (var12 + 1) * 128);
                     var17 = var40.je(var11 * 128, -this.on(var11, var12 + 1), (var12 + 1) * 128);
                     var41 = new int[]{var14, var15, var43, var17};
                     var42 = var40.createFace(4, var41, var13, 12345678);
                     this.mouseX[var42] = var11;
                     this.mouseY[var42] = var12;
                     var40.faceTag[var42] = 200000 + var42;
                     this.en(var11, var12, 0, var13, var13);
                  }

                  if(this.qn(var11 + 1, var12, var3) > 0 && GameData.ejb[this.qn(var11 + 1, var12, var3) - 1] == 4) {
                     var13 = GameData.djb[this.qn(var11 + 1, var12, var3) - 1];
                     var14 = var40.je(var11 * 128, -this.on(var11, var12), var12 * 128);
                     var15 = var40.je((var11 + 1) * 128, -this.on(var11 + 1, var12), var12 * 128);
                     var43 = var40.je((var11 + 1) * 128, -this.on(var11 + 1, var12 + 1), (var12 + 1) * 128);
                     var17 = var40.je(var11 * 128, -this.on(var11, var12 + 1), (var12 + 1) * 128);
                     var41 = new int[]{var14, var15, var43, var17};
                     var42 = var40.createFace(4, var41, var13, 12345678);
                     this.mouseX[var42] = var11;
                     this.mouseY[var42] = var12;
                     var40.faceTag[var42] = 200000 + var42;
                     this.en(var11, var12, 0, var13, var13);
                  }

                  if(this.qn(var11 - 1, var12, var3) > 0 && GameData.ejb[this.qn(var11 - 1, var12, var3) - 1] == 4) {
                     var13 = GameData.djb[this.qn(var11 - 1, var12, var3) - 1];
                     var14 = var40.je(var11 * 128, -this.on(var11, var12), var12 * 128);
                     var15 = var40.je((var11 + 1) * 128, -this.on(var11 + 1, var12), var12 * 128);
                     var43 = var40.je((var11 + 1) * 128, -this.on(var11 + 1, var12 + 1), (var12 + 1) * 128);
                     var17 = var40.je(var11 * 128, -this.on(var11, var12 + 1), (var12 + 1) * 128);
                     var41 = new int[]{var14, var15, var43, var17};
                     var42 = var40.createFace(4, var41, var13, 12345678);
                     this.mouseX[var42] = var11;
                     this.mouseY[var42] = var12;
                     var40.faceTag[var42] = 200000 + var42;
                     this.en(var11, var12, 0, var13, var13);
                  }
               }
            }
         }

         var40.setLight(true, 40, 48, -50, -10, -50);
         this.xeb = this.parentModel.rd(0, 0, 1536, 1536, 8, 64, 233, false);

         for(var12 = 0; var12 < 64; ++var12) {
            this.xdb.addModel(this.xeb[var12]);
         }

         for(var13 = 0; var13 < 96; ++var13) {
            for(var14 = 0; var14 < 96; ++var14) {
               this.veb[var13][var14] = this.on(var13, var14);
            }
         }
      }

      this.parentModel.re();
      var7 = 6316128;

      for(var8 = 0; var8 < 95; ++var8) {
         for(var9 = 0; var9 < 95; ++var9) {
            var10 = this.kn(var8, var9);
            if(var10 > 0 && (GameData.vib[var10 - 1] == 0 || this.vdb)) {
               this._do(this.parentModel, var10 - 1, var8, var9, var8 + 1, var9);
               if(var4 && GameData.tib[var10 - 1] != 0) {
                  this.objectAdjacency[var8][var9] |= 1;
                  if(var9 > 0) {
                     this.ao(var8, var9 - 1, 4);
                  }
               }

               if(var4) {
                  this.wdb.drawLineHoriz(var8 * 3, var9 * 3, 3, var7);
               }
            }

            var10 = this.sn(var8, var9);
            if(var10 > 0 && (GameData.vib[var10 - 1] == 0 || this.vdb)) {
               this._do(this.parentModel, var10 - 1, var8, var9, var8, var9 + 1);
               if(var4 && GameData.tib[var10 - 1] != 0) {
                  this.objectAdjacency[var8][var9] |= 2;
                  if(var8 > 0) {
                     this.ao(var8 - 1, var9, 8);
                  }
               }

               if(var4) {
                  this.wdb.drawLineVert(var8 * 3, var9 * 3, 3, var7);
               }
            }

            var10 = this.gn(var8, var9);
            if(var10 > 0 && var10 < 12000 && (GameData.vib[var10 - 1] == 0 || this.vdb)) {
               this._do(this.parentModel, var10 - 1, var8, var9, var8 + 1, var9 + 1);
               if(var4 && GameData.tib[var10 - 1] != 0) {
                  this.objectAdjacency[var8][var9] |= 32;
               }

               if(var4) {
                  this.wdb.gg(var8 * 3, var9 * 3, var7);
                  this.wdb.gg(var8 * 3 + 1, var9 * 3 + 1, var7);
                  this.wdb.gg(var8 * 3 + 2, var9 * 3 + 2, var7);
               }
            }

            if(var10 > 12000 && var10 < 24000 && (GameData.vib[var10 - 12001] == 0 || this.vdb)) {
               this._do(this.parentModel, var10 - 12001, var8 + 1, var9, var8, var9 + 1);
               if(var4 && GameData.tib[var10 - 12001] != 0) {
                  this.objectAdjacency[var8][var9] |= 16;
               }

               if(var4) {
                  this.wdb.gg(var8 * 3 + 2, var9 * 3, var7);
                  this.wdb.gg(var8 * 3 + 1, var9 * 3 + 1, var7);
                  this.wdb.gg(var8 * 3, var9 * 3 + 2, var7);
               }
            }
         }
      }

      if(var4) {
         this.wdb.jf(this.baseMediaSprite - 1, 0, 0, 285, 285);
      }

      this.parentModel.setLight(false, 60, 24, -50, -10, -50);
      this.yeb[var3] = this.parentModel.rd(0, 0, 1536, 1536, 8, 64, 338, true);

      for(var9 = 0; var9 < 64; ++var9) {
         this.xdb.addModel(this.yeb[var3][var9]);
      }

      for(var10 = 0; var10 < 95; ++var10) {
         for(var11 = 0; var11 < 95; ++var11) {
            var12 = this.kn(var10, var11);
            if(var12 > 0) {
               this.un(var12 - 1, var10, var11, var10 + 1, var11);
            }

            var12 = this.sn(var10, var11);
            if(var12 > 0) {
               this.un(var12 - 1, var10, var11, var10, var11 + 1);
            }

            var12 = this.gn(var10, var11);
            if(var12 > 0 && var12 < 12000) {
               this.un(var12 - 1, var10, var11, var10 + 1, var11 + 1);
            }

            if(var12 > 12000 && var12 < 24000) {
               this.un(var12 - 12001, var10 + 1, var11, var10, var11 + 1);
            }
         }
      }

      int var22;
      int var23;
      int var24;
      int var25;
      int var26;
      for(var11 = 1; var11 < 95; ++var11) {
         for(var12 = 1; var12 < 95; ++var12) {
            var13 = this.vn(var11, var12);
            if(var13 > 0) {
               var43 = var11 + 1;
               var18 = var11 + 1;
               var42 = var12 + 1;
               int var21 = var12 + 1;
               var22 = 0;
               var23 = this.veb[var11][var12];
               var24 = this.veb[var43][var12];
               var25 = this.veb[var18][var42];
               var26 = this.veb[var11][var21];
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

               if(var23 < 80000) {
                  this.veb[var11][var12] = var22;
               } else {
                  this.veb[var11][var12] -= 80000;
               }

               if(var24 < 80000) {
                  this.veb[var43][var12] = var22;
               } else {
                  this.veb[var43][var12] -= 80000;
               }

               if(var25 < 80000) {
                  this.veb[var18][var42] = var22;
               } else {
                  this.veb[var18][var42] -= 80000;
               }

               if(var26 < 80000) {
                  this.veb[var11][var21] = var22;
               } else {
                  this.veb[var11][var21] -= 80000;
               }
            }
         }
      }

      this.parentModel.re();

      for(var12 = 1; var12 < 95; ++var12) {
         for(var13 = 1; var13 < 95; ++var13) {
            var14 = this.vn(var12, var13);
            if(var14 > 0) {
               var17 = var12 + 1;
               var42 = var12 + 1;
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
               int var31 = this.veb[var12][var13];
               int var32 = this.veb[var17][var13];
               int var33 = this.veb[var42][var20];
               int var34 = this.veb[var12][var22];
               int var35 = GameData.yib[var14 - 1];
               if(this.xn(var12, var13) && var31 < 80000) {
                  var31 += var35 + 80000;
                  this.veb[var12][var13] = var31;
               }

               if(this.xn(var17, var13) && var32 < 80000) {
                  var32 += var35 + 80000;
                  this.veb[var17][var13] = var32;
               }

               if(this.xn(var42, var20) && var33 < 80000) {
                  var33 += var35 + 80000;
                  this.veb[var42][var20] = var33;
               }

               if(this.xn(var12, var22) && var34 < 80000) {
                  var34 += var35 + 80000;
                  this.veb[var12][var22] = var34;
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
               if(!this.yn(var12 - 1, var13)) {
                  var23 -= var36;
               }

               if(!this.yn(var12 + 1, var13)) {
                  var23 += var36;
               }

               if(!this.yn(var12, var13 - 1)) {
                  var24 -= var36;
               }

               if(!this.yn(var12, var13 + 1)) {
                  var24 += var36;
               }

               if(!this.yn(var17 - 1, var13)) {
                  var25 -= var36;
               }

               if(!this.yn(var17 + 1, var13)) {
                  var25 += var36;
               }

               if(!this.yn(var17, var13 - 1)) {
                  var28 -= var36;
               }

               if(!this.yn(var17, var13 + 1)) {
                  var28 += var36;
               }

               if(!this.yn(var42 - 1, var20)) {
                  var29 -= var36;
               }

               if(!this.yn(var42 + 1, var20)) {
                  var29 += var36;
               }

               if(!this.yn(var42, var20 - 1)) {
                  var26 -= var36;
               }

               if(!this.yn(var42, var20 + 1)) {
                  var26 += var36;
               }

               if(!this.yn(var12 - 1, var22)) {
                  var27 -= var36;
               }

               if(!this.yn(var12 + 1, var22)) {
                  var27 += var36;
               }

               if(!this.yn(var12, var22 - 1)) {
                  var30 -= var36;
               }

               if(!this.yn(var12, var22 + 1)) {
                  var30 += var36;
               }

               var14 = GameData.ajb[var14 - 1];
               var31 = -var31;
               var32 = -var32;
               var33 = -var33;
               var34 = -var34;
               int[] var44;
               if(this.gn(var12, var13) > 12000 && this.gn(var12, var13) < 24000 && this.vn(var12 - 1, var13 - 1) == 0) {
                  var44 = new int[]{this.parentModel.je(var29, var33, var26), this.parentModel.je(var27, var34, var30), this.parentModel.je(var25, var32, var28)};
                  this.parentModel.createFace(3, var44, var14, 12345678);
               } else if(this.gn(var12, var13) > 12000 && this.gn(var12, var13) < 24000 && this.vn(var12 + 1, var13 + 1) == 0) {
                  var44 = new int[]{this.parentModel.je(var23, var31, var24), this.parentModel.je(var25, var32, var28), this.parentModel.je(var27, var34, var30)};
                  this.parentModel.createFace(3, var44, var14, 12345678);
               } else if(this.gn(var12, var13) > 0 && this.gn(var12, var13) < 12000 && this.vn(var12 + 1, var13 - 1) == 0) {
                  var44 = new int[]{this.parentModel.je(var27, var34, var30), this.parentModel.je(var23, var31, var24), this.parentModel.je(var29, var33, var26)};
                  this.parentModel.createFace(3, var44, var14, 12345678);
               } else if(this.gn(var12, var13) > 0 && this.gn(var12, var13) < 12000 && this.vn(var12 - 1, var13 + 1) == 0) {
                  var44 = new int[]{this.parentModel.je(var25, var32, var28), this.parentModel.je(var29, var33, var26), this.parentModel.je(var23, var31, var24)};
                  this.parentModel.createFace(3, var44, var14, 12345678);
               } else if(var31 == var32 && var33 == var34) {
                  var44 = new int[]{this.parentModel.je(var23, var31, var24), this.parentModel.je(var25, var32, var28), this.parentModel.je(var29, var33, var26), this.parentModel.je(var27, var34, var30)};
                  this.parentModel.createFace(4, var44, var14, 12345678);
               } else if(var31 == var34 && var32 == var33) {
                  var44 = new int[]{this.parentModel.je(var27, var34, var30), this.parentModel.je(var23, var31, var24), this.parentModel.je(var25, var32, var28), this.parentModel.je(var29, var33, var26)};
                  this.parentModel.createFace(4, var44, var14, 12345678);
               } else {
                  boolean var37 = true;
                  if(this.vn(var12 - 1, var13 - 1) > 0) {
                     var37 = false;
                  }

                  if(this.vn(var12 + 1, var13 + 1) > 0) {
                     var37 = false;
                  }

                  int[] var38;
                  int[] var39;
                  if(!var37) {
                     var38 = new int[]{this.parentModel.je(var25, var32, var28), this.parentModel.je(var29, var33, var26), this.parentModel.je(var23, var31, var24)};
                     this.parentModel.createFace(3, var38, var14, 12345678);
                     var39 = new int[]{this.parentModel.je(var27, var34, var30), this.parentModel.je(var23, var31, var24), this.parentModel.je(var29, var33, var26)};
                     this.parentModel.createFace(3, var39, var14, 12345678);
                  } else {
                     var38 = new int[]{this.parentModel.je(var23, var31, var24), this.parentModel.je(var25, var32, var28), this.parentModel.je(var27, var34, var30)};
                     this.parentModel.createFace(3, var38, var14, 12345678);
                     var39 = new int[]{this.parentModel.je(var29, var33, var26), this.parentModel.je(var27, var34, var30), this.parentModel.je(var25, var32, var28)};
                     this.parentModel.createFace(3, var39, var14, 12345678);
                  }
               }
            }
         }
      }

      this.parentModel.setLight(true, 50, 50, -50, -10, -50);
      this.zeb[var3] = this.parentModel.rd(0, 0, 1536, 1536, 8, 64, 169, true);

      for(var13 = 0; var13 < 64; ++var13) {
         this.xdb.addModel(this.zeb[var3][var13]);
      }

      for(var14 = 0; var14 < 96; ++var14) {
         for(var15 = 0; var15 < 96; ++var15) {
            if(this.veb[var14][var15] >= 80000) {
               this.veb[var14][var15] -= 80000;
            }
         }
      }

   }

   public void _do(GameModel var1, int var2, int var3, int var4, int var5, int var6) {
      this.nn(var3, var4, 40);
      this.nn(var5, var6, 40);
      int var7 = GameData.qib[var2];
      int var8 = GameData.rib[var2];
      int var9 = GameData.sib[var2];
      int var10 = var3 * 128;
      int var11 = var4 * 128;
      int var12 = var5 * 128;
      int var13 = var6 * 128;
      int var14 = var1.je(var10, -this.veb[var3][var4], var11);
      int var15 = var1.je(var10, -this.veb[var3][var4] - var7, var11);
      int var16 = var1.je(var12, -this.veb[var5][var6] - var7, var13);
      int var17 = var1.je(var12, -this.veb[var5][var6], var13);
      int[] var18 = new int[]{var14, var15, var16, var17};
      int var19 = var1.createFace(4, var18, var8, var9);
      if(GameData.vib[var2] == 5) {
         var1.faceTag[var19] = 30000 + var2;
      } else {
         var1.faceTag[var19] = 0;
      }
   }

   public void un(int var1, int var2, int var3, int var4, int var5) {
      int var6 = GameData.qib[var1];
      if(this.veb[var2][var3] < 80000) {
         this.veb[var2][var3] += 80000 + var6;
      }

      if(this.veb[var4][var5] < 80000) {
         this.veb[var4][var5] += 80000 + var6;
      }

   }
}
