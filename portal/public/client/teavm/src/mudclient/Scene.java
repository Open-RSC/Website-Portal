package mudclient;

// $FF: renamed from: a.a.j
public class Scene {

   // $FF: renamed from: a int
   int field_641;
   // $FF: renamed from: b int[]
   int[] field_642;
   // $FF: renamed from: c int[][]
   int[][] field_643;
   // $FF: renamed from: d int[]
   int[] field_644;
   // $FF: renamed from: e int
   public int field_645;
   // $FF: renamed from: f int
   public int clipNear;
   // $FF: renamed from: g int
   public int clipFar3d;
   // $FF: renamed from: h int
   public int clipFar2d;
   // $FF: renamed from: i int
   public int fogZFalloff;
   // $FF: renamed from: j int
   public int fogZDistance;
   // $FF: renamed from: k int[]
   public static int[] field_651;
   // $FF: renamed from: l int[]
   private static int[] field_652;
   // $FF: renamed from: m boolean
   public boolean field_653;
   // $FF: renamed from: n double
   public double field_654;
   // $FF: renamed from: o int
   public int field_655;
   // $FF: renamed from: p boolean
   private boolean field_656;
   // $FF: renamed from: q int
   private int field_657;
   // $FF: renamed from: r int
   private int field_658;
   // $FF: renamed from: s int
   private int field_659;
   // $FF: renamed from: t int
   private int field_660;
   // $FF: renamed from: u a.a.f[]
   private GameModel[] field_661;
   // $FF: renamed from: v int[]
   private int[] field_662;
   // $FF: renamed from: w int
   private int width;
   // $FF: renamed from: x int
   private int clipX;
   // $FF: renamed from: y int
   private int clipY;
   // $FF: renamed from: z int
   private int baseX;
   // $FF: renamed from: A int
   private int baseY;
   // $FF: renamed from: B int
   private int viewDistance;
   // $FF: renamed from: C int
   private int field_669;
   // $FF: renamed from: D int
   private int field_670;
   // $FF: renamed from: E int
   private int field_671;
   // $FF: renamed from: F int
   private int field_672;
   // $FF: renamed from: G int
   private int field_673;
   // $FF: renamed from: H int
   private int field_674;
   // $FF: renamed from: I int
   private int field_675;
   // $FF: renamed from: J int
   public int modelCount;
   // $FF: renamed from: K int
   public int maxModelCount;
   // $FF: renamed from: L a.a.f[]
   public GameModel[] models;
   // $FF: renamed from: M int[]
   private int[] modelState;
   // $FF: renamed from: N int
   private int visiblePolygonsCount;
   // $FF: renamed from: O a.a.h[]
   private Polygon[] visiblePolygons;
   // $FF: renamed from: P int
   private int field_682;
   // $FF: renamed from: Q int[]
   private int[] field_683;
   // $FF: renamed from: R int[]
   private int[] field_684;
   // $FF: renamed from: S int[]
   private int[] field_685;
   // $FF: renamed from: T int[]
   private int[] field_686;
   // $FF: renamed from: U int[]
   private int[] field_687;
   // $FF: renamed from: V int[]
   private int[] field_688;
   // $FF: renamed from: W int[]
   private int[] field_689;
   // $FF: renamed from: X a.a.f
   public GameModel view;
   // $FF: renamed from: Y int
   int field_691;
   // $FF: renamed from: Z byte[][]
   byte[][] field_692;
   // $FF: renamed from: ba int[][]
   int[][] field_693;
   // $FF: renamed from: bb int[]
   int[] field_694;
   // $FF: renamed from: bc long[]
   long[] field_695;
   // $FF: renamed from: bd int[][]
   int[][] field_696;
   // $FF: renamed from: be boolean[]
   boolean[] field_697;
   // $FF: renamed from: bf long
   private static long field_698;
   // $FF: renamed from: bg int[][]
   int[][] field_699;
   // $FF: renamed from: bh int[][]
   int[][] field_700;
   // $FF: renamed from: bi byte[]
   private static byte[] field_701;
   // $FF: renamed from: bk a.a.g
   Surface surface;
   // $FF: renamed from: bl int[]
   public int[] field_704;
   // $FF: renamed from: bm a.a.i[]
   Scanline[] scanlines;
   // $FF: renamed from: bn int
   int field_706;
   // $FF: renamed from: bo int
   int field_707;
   // $FF: renamed from: bp int[]
   int[] field_708;
   // $FF: renamed from: bq int[]
   int[] field_709;
   // $FF: renamed from: br int[]
   int[] field_710;
   // $FF: renamed from: bs int[]
   int[] field_711;
   // $FF: renamed from: bt int[]
   int[] field_712;
   // $FF: renamed from: bu int[]
   int[] field_713;
   // $FF: renamed from: bv boolean
   boolean interlace;
   // $FF: renamed from: bw int
   static int frustumMaxX;
   // $FF: renamed from: bx int
   static int frustumMinX;
   // $FF: renamed from: by int
   static int frustumMaxY;
   // $FF: renamed from: bz int
   static int frustumMinY;
   // $FF: renamed from: bA int
   static int frustumFarZ;
   // $FF: renamed from: bB int
   static int frustumNearZ;
   // $FF: renamed from: bC int
   int field_721;
   // $FF: renamed from: bD int
   int field_722;


   // $FF: renamed from: <init> (a.a.g, int, int, int) void
   public Scene(Surface var1, int var2, int var3, int var4) {
      super();
      boolean var8 = Surface.field_759;
      this.field_641 = 50;
      this.field_642 = new int[this.field_641];
      this.field_643 = new int[this.field_641][256];
      this.clipNear = 5;
      this.clipFar3d = 1000;
      this.clipFar2d = 1000;
      this.fogZFalloff = 20;
      this.fogZDistance = 10;
      this.field_653 = false;
      this.field_654 = 1.1D;
      this.field_655 = 1;
      this.field_656 = false;
      this.field_660 = 100;
      this.field_661 = new GameModel[this.field_660];
      this.field_662 = new int[this.field_660];
      this.width = 512;
      this.clipX = 256;
      this.clipY = 192;
      this.baseX = 256;
      this.baseY = 256;
      this.viewDistance = 8;
      this.field_669 = 4;
      this.field_708 = new int[40];
      this.field_709 = new int[40];
      this.field_710 = new int[40];
      this.field_711 = new int[40];
      this.field_712 = new int[40];
      this.field_713 = new int[40];
      this.interlace = false;
      this.surface = var1;
      this.clipX = var1.field_723 / 2;
      this.clipY = var1.field_724 / 2;
      this.field_704 = var1.pixels;
      this.modelCount = 0;
      this.maxModelCount = var2;
      this.models = new GameModel[this.maxModelCount];
      this.modelState = new int[this.maxModelCount];
      this.visiblePolygonsCount = 0;
      this.visiblePolygons = new Polygon[var3];
      int var5 = 0;
      Polygon[] var10000;
      if(var8) {
         var10000 = this.visiblePolygons;
         var10000[var5] = new Polygon();
         ++var5;
      }

      while(var5 < var3) {
         var10000 = this.visiblePolygons;
         var10000[var5] = new Polygon();
         ++var5;
      }

      this.field_682 = 0;
      this.view = new GameModel(var4 * 2, var4);
      this.field_683 = new int[var4];
      this.field_687 = new int[var4];
      this.field_688 = new int[var4];
      this.field_684 = new int[var4];
      this.field_685 = new int[var4];
      this.field_686 = new int[var4];
      this.field_689 = new int[var4];
      if(field_701 == null) {
         field_701 = new byte[17691];
      }

      this.field_670 = 0;
      this.field_671 = 0;
      this.field_672 = 0;
      this.field_673 = 0;
      this.field_674 = 0;
      this.field_675 = 0;
      int var6 = 0;
      if(var8 || var6 < 256) {
         do {
            field_652[var6] = (int)(Math.sin((double)var6 * 0.02454369D) * 32768.0D);
            field_652[var6 + 256] = (int)(Math.cos((double)var6 * 0.02454369D) * 32768.0D);
            ++var6;
         } while(var6 < 256);
      }

      int var7 = 0;
      if(!var8 && var7 >= 1024) {
         if(Utility.field_1009 != 0) {
            Surface.field_759 = !var8;
         }

      } else {
         do {
            field_651[var7] = (int)(Math.sin((double)var7 * 0.00613592315D) * 32768.0D);
            field_651[var7 + 1024] = (int)(Math.cos((double)var7 * 0.00613592315D) * 32768.0D);
            ++var7;
         } while(var7 < 1024);

         if(Utility.field_1009 != 0) {
            Surface.field_759 = !var8;
         }

      }
   }

   // $FF: renamed from: a (a.a.f) void
   public void addModel(GameModel model) {
      if(model == null) {
         System.out.println("Warning tried to add null object!"); // authentic System.out.println
      }

      if(this.modelCount < this.maxModelCount) {
         this.modelState[this.modelCount] = 0;
         this.models[this.modelCount++] = model;
      }

   }

   // $FF: renamed from: b (a.a.f) void
   public void freeModel(GameModel var1) {
      boolean var4 = Surface.field_759;
      int var2 = 0;
      if(var4 || var2 < this.modelCount) {
         do {
            if(this.models[var2] == var1) {
               --this.modelCount;
               int var3 = var2;
               if(var4 || var2 < this.modelCount) {
                  do {
                     this.models[var3] = this.models[var3 + 1];
                     this.modelState[var3] = this.modelState[var3 + 1];
                     ++var3;
                  } while(var3 < this.modelCount);
               }
            }

            ++var2;
         } while(var2 < this.modelCount);

      }
   }

   // $FF: renamed from: a () void
   public void dispose() {
      this.method_173();
      int var1 = 0;
      if(Surface.field_759) {
         this.models[var1] = null;
         ++var1;
      }

      while(var1 < this.modelCount) {
         this.models[var1] = null;
         ++var1;
      }

      this.modelCount = 0;
   }

   // $FF: renamed from: b () void
   public void method_173() {
      this.field_682 = 0;
      this.view.clear();
   }

   // $FF: renamed from: a (int) void
   public void reduceSprites(int var1) {
      this.field_682 -= var1;
      this.view.method_360(var1, var1 * 2);
      if(this.field_682 < 0) {
         this.field_682 = 0;
      }

   }

   // $FF: renamed from: a (int, int, int, int, int, int, int) int
   public int drawSprite(int var1, int var2, int var3, int var4, int var5, int var6, int var7) {
      this.field_683[this.field_682] = var1;
      this.field_684[this.field_682] = var2;
      this.field_685[this.field_682] = var3;
      this.field_686[this.field_682] = var4;
      this.field_687[this.field_682] = var5;
      this.field_688[this.field_682] = var6;
      this.field_689[this.field_682] = 0;
      int var8 = this.view.method_367(var2, var3, var4);
      int var9 = this.view.method_367(var2, var3 - var6, var4);
      int[] var10 = new int[]{var8, var9};
      this.view.createFace(2, var10, 0, 0);
      this.view.faceTag[this.field_682] = var7;
      this.view.field_885[this.field_682++] = 0;
      return this.field_682 - 1;
   }

   // $FF: renamed from: b (int) void
   public void setFaceSpriteLocalPlayer(int var1) {
      this.view.field_885[var1] = 1;
   }

   // $FF: renamed from: a (int, int) void
   public void setCombatXOffset(int var1, int var2) {
      this.field_689[var1] = var2;
   }

   // $FF: renamed from: b (int, int) void
   public void method_178(int var1, int var2) {
      this.field_657 = var1 - this.baseX;
      this.field_658 = var2;
      this.field_659 = 0;
      this.field_656 = true;
   }

   // $FF: renamed from: c () int
   public int method_179() {
      return this.field_659;
   }

   // $FF: renamed from: d () int[]
   public int[] method_180() {
      return this.field_662;
   }

   // $FF: renamed from: e () a.a.f[]
   public GameModel[] method_181() {
      return this.field_661;
   }

   // $FF: renamed from: a (int, int, int, int, int, int) void
   public void setBounds(int var1, int var2, int var3, int var4, int var5, int var6) {
      this.clipX = var3;
      this.clipY = var4;
      this.baseX = var1;
      this.baseY = var2;
      this.width = var5;
      this.viewDistance = var6;
      this.scanlines = new Scanline[var4 + var2];
      int var7 = 0;
      if(Surface.field_759 || var7 < var4 + var2) {
         do {
            Scanline[] var10000 = this.scanlines;
            var10000[var7] = new Scanline();
            ++var7;
         } while(var7 < var4 + var2);

      }
   }

   // $FF: renamed from: a (a.a.h[], int, int) void
   private void polygonQSort(Polygon[] polygons, int low, int high) {
      if(low < high) {
         int min = low - 1;
         int max = high + 1;
         int mid = (low + high) / 2;
         Polygon var7 = polygons[mid];
         polygons[mid] = polygons[low];
         polygons[low] = var7;
         int var8 = var7.field_463;
         if(Surface.field_759 || min < max) {
            do {
               do {
                  --max;
               } while(polygons[max].field_463 < var8);

               do {
                  ++min;
               } while(polygons[min].field_463 > var8);

               if(min < max) {
                  Polygon var9 = polygons[min];
                  polygons[min] = polygons[max];
                  polygons[max] = var9;
               }
            } while(min < max);
         }

         this.polygonQSort(polygons, low, max);
         this.polygonQSort(polygons, max + 1, high);
      }

   }

   // $FF: renamed from: a (int, a.a.h[], int) void
   public void polygonsIntersectSort(int var1, Polygon[] var2, int var3) {
      boolean var11 = Surface.field_759;
      int var4 = 0;
      if(var11 || var4 <= var3) {
         do {
            var2[var4].field_469 = false;
            var2[var4].field_470 = var4;
            var2[var4].field_471 = -1;
            ++var4;
         } while(var4 <= var3);
      }

      int var5 = 0;
      if(var11) {
         ++var5;
      }

      while(true) {
         while(!var2[var5].field_469) {
            if(var5 == var3) {
               return;
            }

            Polygon var6 = var2[var5];
            var6.field_469 = true;
            int var7 = var5;
            int var8 = var5 + var1;
            if(var8 >= var3) {
               var8 = var3 - 1;
            }

            int var9 = var8;
            if(var11 || var8 >= var5 + 1) {
               while(true) {
                  Polygon var10 = var2[var9];
                  if(var6.field_455 < var10.field_457 && var10.field_455 < var6.field_457 && var6.field_456 < var10.field_458 && var10.field_456 < var6.field_458 && var6.field_470 != var10.field_471 && !this.method_202(var6, var10) && this.method_203(var10, var6)) {
                     this.method_185(var2, var7, var9);
                     if(var2[var9] != var10) {
                        ++var9;
                     }

                     var7 = this.field_721;
                     var10.field_471 = var6.field_470;
                  }

                  --var9;
                  if(var9 < var7 + 1) {
                     break;
                  }
               }
            }
         }

         ++var5;
      }
   }

   // $FF: renamed from: b (a.a.h[], int, int) boolean
   public boolean method_185(Polygon[] var1, int var2, int var3) {
      boolean var9 = Surface.field_759;

      while(true) {
         Polygon var4 = var1[var2];
         int var5 = var2 + 1;
         Polygon var6;
         if(var9 || var5 <= var3) {
            do {
               var6 = var1[var5];
               if(!this.method_202(var6, var4)) {
                  break;
               }

               var1[var2] = var6;
               var1[var5] = var4;
               var2 = var5;
               if(var5 == var3) {
                  this.field_721 = var5;
                  this.field_722 = var5 - 1;
                  return true;
               }

               ++var5;
            } while(var5 <= var3);
         }

         var6 = var1[var3];
         int var7 = var3 - 1;
         if(var9 || var7 >= var2) {
            do {
               Polygon var8 = var1[var7];
               if(!this.method_202(var6, var8)) {
                  break;
               }

               var1[var3] = var8;
               var1[var7] = var6;
               var3 = var7;
               if(var2 == var7) {
                  this.field_721 = var7 + 1;
                  this.field_722 = var7;
                  return true;
               }

               --var7;
            } while(var7 >= var2);
         }

         if(var2 + 1 >= var3) {
            this.field_721 = var2;
            this.field_722 = var3;
            return false;
         }

         if(!this.method_185(var1, var2 + 1, var3)) {
            this.field_721 = var2;
            return false;
         }

         var3 = this.field_722;
      }
   }

   // $FF: renamed from: a (int, int, int) void
   public void setFrustum(int var1, int var2, int var3) {
      int var4 = -this.field_673 + 1024 & 1023;
      int var5 = -this.field_674 + 1024 & 1023;
      int var6 = -this.field_675 + 1024 & 1023;
      int var7;
      int var8;
      int var9;
      if(var6 != 0) {
         var7 = field_651[var6];
         var8 = field_651[var6 + 1024];
         var9 = var2 * var7 + var1 * var8 >> 15;
         var2 = var2 * var8 - var1 * var7 >> 15;
         var1 = var9;
      }

      if(var4 != 0) {
         var7 = field_651[var4];
         var8 = field_651[var4 + 1024];
         var9 = var2 * var8 - var3 * var7 >> 15;
         var3 = var2 * var7 + var3 * var8 >> 15;
         var2 = var9;
      }

      if(var5 != 0) {
         var7 = field_651[var5];
         var8 = field_651[var5 + 1024];
         var9 = var3 * var7 + var1 * var8 >> 15;
         var3 = var3 * var8 - var1 * var7 >> 15;
         var1 = var9;
      }

      if(var1 < frustumMaxX) {
         frustumMaxX = var1;
      }

      if(var1 > frustumMinX) {
         frustumMinX = var1;
      }

      if(var2 < frustumMaxY) {
         frustumMaxY = var2;
      }

      if(var2 > frustumMinY) {
         frustumMinY = var2;
      }

      if(var3 < frustumFarZ) {
         frustumFarZ = var3;
      }

      if(var3 > frustumNearZ) {
         frustumNearZ = var3;
      }

   }

   // $FF: renamed from: f () void
   public void render() {
      boolean var23 = Surface.field_759;
      this.interlace = this.surface.interlace;
      int var7 = this.clipX * this.clipFar3d >> this.viewDistance;
      int var8 = this.clipY * this.clipFar3d >> this.viewDistance;
      frustumMaxX = 0;
      frustumMinX = 0;
      frustumMaxY = 0;
      frustumMinY = 0;
      frustumFarZ = 0;
      frustumNearZ = 0;
      this.setFrustum(-var7, -var8, this.clipFar3d);
      this.setFrustum(-var7, var8, this.clipFar3d);
      this.setFrustum(var7, -var8, this.clipFar3d);
      this.setFrustum(var7, var8, this.clipFar3d);
      this.setFrustum(-this.clipX, -this.clipY, 0);
      this.setFrustum(-this.clipX, this.clipY, 0);
      this.setFrustum(this.clipX, -this.clipY, 0);
      this.setFrustum(this.clipX, this.clipY, 0);
      frustumMaxX += this.field_670;
      frustumMinX += this.field_670;
      frustumMaxY += this.field_671;
      frustumMinY += this.field_671;
      frustumFarZ += this.field_672;
      frustumNearZ += this.field_672;
      this.models[this.modelCount] = this.view;
      this.view.transformState = 2;
      int var2 = 0;
      if(var23 || var2 < this.modelCount) {
         do {
            this.models[var2].project(this.field_670, this.field_671, this.field_672, this.field_673, this.field_674, this.field_675, this.viewDistance, this.clipNear);
            ++var2;
         } while(var2 < this.modelCount);
      }

      this.models[this.modelCount].project(this.field_670, this.field_671, this.field_672, this.field_673, this.field_674, this.field_675, this.viewDistance, this.clipNear);
      this.visiblePolygonsCount = 0;
      int var9 = 0;
      GameModel gameModel;
      int var3;
      boolean var4;
      int var5;
      int var10;
      int[] var11;
      int var12;
      int var13;
      int var14;
      Polygon var15;
      int var16;
      int var17;
      int var24;
      if(var23) {
         gameModel = this.models[var9];
         if(gameModel.visible) {
            var2 = 0;
            if(var23 || var2 < gameModel.field_860) {
               do {
                  var10 = gameModel.faceNumVertices[var2];
                  var11 = gameModel.faceVertices[var2];
                  var4 = false;
                  var12 = 0;
                  if(var23 || var12 < var10) {
                     do {
                        var3 = gameModel.projectVertexZ[var11[var12]];
                        if(var3 > this.clipNear && var3 < this.clipFar3d) {
                           var4 = true;
                           if(!var23) {
                              break;
                           }
                        }

                        ++var12;
                     } while(var12 < var10);
                  }

                  if(var4) {
                     var24 = 0;
                     var13 = 0;
                     if(var23 || var13 < var10) {
                        do {
                           var3 = gameModel.vertexViewX[var11[var13]];
                           if(var3 > -this.clipX) {
                              var24 |= 1;
                           }

                           if(var3 < this.clipX) {
                              var24 |= 2;
                           }

                           if(var24 == 3) {
                              break;
                           }

                           ++var13;
                        } while(var13 < var10);
                     }

                     if(var24 == 3) {
                        var24 = 0;
                        var14 = 0;
                        if(var23 || var14 < var10) {
                           do {
                              var3 = gameModel.vertexViewY[var11[var14]];
                              if(var3 > -this.clipY) {
                                 var24 |= 1;
                              }

                              if(var3 < this.clipY) {
                                 var24 |= 2;
                              }

                              if(var24 == 3) {
                                 break;
                              }

                              ++var14;
                           } while(var14 < var10);
                        }

                        if(var24 == 3) {
                           label449: {
                              var15 = this.visiblePolygons[this.visiblePolygonsCount];
                              var15.model = gameModel;
                              var15.face = var2;
                              this.initializePolygon3d(this.visiblePolygonsCount);
                              if(var15.visibility < 0) {
                                 var16 = gameModel.faceFillFront[var2];
                                 if(!var23) {
                                    break label449;
                                 }
                              }

                              var16 = gameModel.faceFillBack[var2];
                           }

                           if(var16 != 12345678) {
                              var5 = 0;
                              var17 = 0;
                              if(var23 || var17 < var10) {
                                 do {
                                    var5 += gameModel.projectVertexZ[var11[var17]];
                                    ++var17;
                                 } while(var17 < var10);
                              }

                              var15.field_463 = var5 / var10 + gameModel.field_871;
                              var15.field_468 = var16;
                              ++this.visiblePolygonsCount;
                           }
                        }
                     }
                  }

                  ++var2;
               } while(var2 < gameModel.field_860);
            }
         }

         ++var9;
      }

      for(; var9 < this.modelCount; ++var9) {
         gameModel = this.models[var9];
         if(gameModel.visible) {
            var2 = 0;
            if(var23 || var2 < gameModel.field_860) {
               do {
                  var10 = gameModel.faceNumVertices[var2];
                  var11 = gameModel.faceVertices[var2];
                  var4 = false;
                  var12 = 0;
                  if(var23 || var12 < var10) {
                     do {
                        var3 = gameModel.projectVertexZ[var11[var12]];
                        if(var3 > this.clipNear && var3 < this.clipFar3d) {
                           var4 = true;
                           if(!var23) {
                              break;
                           }
                        }

                        ++var12;
                     } while(var12 < var10);
                  }

                  if(var4) {
                     var24 = 0;
                     var13 = 0;
                     if(var23 || var13 < var10) {
                        do {
                           var3 = gameModel.vertexViewX[var11[var13]];
                           if(var3 > -this.clipX) {
                              var24 |= 1;
                           }

                           if(var3 < this.clipX) {
                              var24 |= 2;
                           }

                           if(var24 == 3) {
                              break;
                           }

                           ++var13;
                        } while(var13 < var10);
                     }

                     if(var24 == 3) {
                        var24 = 0;
                        var14 = 0;
                        if(var23 || var14 < var10) {
                           do {
                              var3 = gameModel.vertexViewY[var11[var14]];
                              if(var3 > -this.clipY) {
                                 var24 |= 1;
                              }

                              if(var3 < this.clipY) {
                                 var24 |= 2;
                              }

                              if(var24 == 3) {
                                 break;
                              }

                              ++var14;
                           } while(var14 < var10);
                        }

                        if(var24 == 3) {
                           label252: {
                              var15 = this.visiblePolygons[this.visiblePolygonsCount];
                              var15.model = gameModel;
                              var15.face = var2;
                              this.initializePolygon3d(this.visiblePolygonsCount);
                              if(var15.visibility < 0) {
                                 var16 = gameModel.faceFillFront[var2];
                                 if(!var23) {
                                    break label252;
                                 }
                              }

                              var16 = gameModel.faceFillBack[var2];
                           }

                           if(var16 != 12345678) {
                              var5 = 0;
                              var17 = 0;
                              if(var23 || var17 < var10) {
                                 do {
                                    var5 += gameModel.projectVertexZ[var11[var17]];
                                    ++var17;
                                 } while(var17 < var10);
                              }

                              var15.field_463 = var5 / var10 + gameModel.field_871;
                              var15.field_468 = var16;
                              ++this.visiblePolygonsCount;
                           }
                        }
                     }
                  }

                  ++var2;
               } while(var2 < gameModel.field_860);
            }
         }
      }

      gameModel = this.view;
      int var29;
      if(gameModel.visible) {
         var2 = 0;
         if(var23 || var2 < gameModel.field_860) {
            do {
               int[] var25 = gameModel.faceVertices[var2];
               int var26 = var25[0];
               var12 = gameModel.vertexViewX[var26];
               var13 = gameModel.vertexViewY[var26];
               var14 = gameModel.projectVertexZ[var26];
               if(var14 > this.clipNear && var14 < this.clipFar2d) {
                  var29 = (this.field_687[var2] << this.viewDistance) / var14;
                  var16 = (this.field_688[var2] << this.viewDistance) / var14;
                  if(var12 - var29 / 2 <= this.clipX && var12 + var29 / 2 >= -this.clipX && var13 - var16 <= this.clipY && var13 >= -this.clipY) {
                     Polygon var30 = this.visiblePolygons[this.visiblePolygonsCount];
                     var30.model = gameModel;
                     var30.face = var2;
                     this.method_201(this.visiblePolygonsCount);
                     var30.field_463 = (var14 + gameModel.projectVertexZ[var25[1]]) / 2;
                     ++this.visiblePolygonsCount;
                  }
               }

               ++var2;
            } while(var2 < gameModel.field_860);
         }
      }

      if(this.visiblePolygonsCount != 0) {
         this.field_645 = this.visiblePolygonsCount;
         this.polygonQSort(this.visiblePolygons, 0, this.visiblePolygonsCount - 1);
         this.polygonsIntersectSort(100, this.visiblePolygons, this.visiblePolygonsCount);
         var10 = 0;
         if(!var23 && var10 >= this.visiblePolygonsCount) {
            this.field_656 = false;
         } else {
            do {
               label512: {
                  Polygon var27 = this.visiblePolygons[var10];
                  gameModel = var27.model;
                  var2 = var27.face;
                  int var18;
                  int var20;
                  int var21;
                  if(gameModel == this.view) {
                     int[] var28 = gameModel.faceVertices[var2];
                     var13 = var28[0];
                     var14 = gameModel.vertexViewX[var13];
                     var29 = gameModel.vertexViewY[var13];
                     var16 = gameModel.projectVertexZ[var13];
                     var17 = (this.field_687[var2] << this.viewDistance) / var16;
                     var18 = (this.field_688[var2] << this.viewDistance) / var16;
                     int var19 = var29 - gameModel.vertexViewY[var28[1]];
                     var20 = (gameModel.vertexViewX[var28[1]] - var14) * var19 / var18;
                     var20 = gameModel.vertexViewX[var28[1]] - var14;
                     var21 = var14 - var17 / 2;
                     int var22 = this.baseY + var29 - var18;
                     this.surface.spriteClipping(var21 + this.baseX, var22, var17, var18, this.field_683[var2], var20, (256 << this.viewDistance) / var16);
                     if(!this.field_656 || this.field_659 >= this.field_660) {
                        break label512;
                     }

                     var21 += (this.field_689[var2] << this.viewDistance) / var16;
                     if(this.field_658 < var22 || this.field_658 > var22 + var18 || this.field_657 < var21 || this.field_657 > var21 + var17 || gameModel.field_889 || gameModel.field_885[var2] != 0) {
                        break label512;
                     }

                     this.field_661[this.field_659] = gameModel;
                     this.field_662[this.field_659] = var2;
                     ++this.field_659;
                     if(!var23) {
                        break label512;
                     }
                  }

                  var29 = 0;
                  var17 = 0;
                  var18 = gameModel.faceNumVertices[var2];
                  int[] var31 = gameModel.faceVertices[var2];
                  if(gameModel.field_867[var2] != 12345678) {
                     label193: {
                        if(var27.visibility < 0) {
                           var17 = gameModel.field_934 - gameModel.field_867[var2];
                           if(!var23) {
                              break label193;
                           }
                        }

                        var17 = gameModel.field_934 + gameModel.field_867[var2];
                     }
                  }

                  var20 = 0;
                  if(var23 || var20 < var18) {
                     do {
                        var5 = var31[var20];
                        this.field_711[var20] = gameModel.field_853[var5];
                        this.field_712[var20] = gameModel.field_854[var5];
                        this.field_713[var20] = gameModel.projectVertexZ[var5];
                        if(gameModel.field_867[var2] == 12345678) {
                           label177: {
                              if(var27.visibility < 0) {
                                 var17 = gameModel.field_934 - gameModel.field_858[var5] + gameModel.field_859[var5];
                                 if(!var23) {
                                    break label177;
                                 }
                              }

                              var17 = gameModel.field_934 + gameModel.field_858[var5] + gameModel.field_859[var5];
                           }
                        }

                        label497: {
                           if(gameModel.projectVertexZ[var5] >= this.clipNear) {
                              this.field_708[var29] = gameModel.vertexViewX[var5];
                              this.field_709[var29] = gameModel.vertexViewY[var5];
                              this.field_710[var29] = var17;
                              if(gameModel.projectVertexZ[var5] > this.fogZDistance) {
                                 this.field_710[var29] += (gameModel.projectVertexZ[var5] - this.fogZDistance) / this.fogZFalloff;
                              }

                              ++var29;
                              if(!var23) {
                                 break label497;
                              }
                           }

                           label165: {
                              if(var20 == 0) {
                                 var16 = var31[var18 - 1];
                                 if(!var23) {
                                    break label165;
                                 }
                              }

                              var16 = var31[var20 - 1];
                           }

                           if(gameModel.projectVertexZ[var16] >= this.clipNear) {
                              var14 = gameModel.projectVertexZ[var5] - gameModel.projectVertexZ[var16];
                              var12 = gameModel.field_853[var5] - (gameModel.field_853[var5] - gameModel.field_853[var16]) * (gameModel.projectVertexZ[var5] - this.clipNear) / var14;
                              var13 = gameModel.field_854[var5] - (gameModel.field_854[var5] - gameModel.field_854[var16]) * (gameModel.projectVertexZ[var5] - this.clipNear) / var14;
                              this.field_708[var29] = (var12 << this.viewDistance) / this.clipNear;
                              this.field_709[var29] = (var13 << this.viewDistance) / this.clipNear;
                              this.field_710[var29] = var17;
                              ++var29;
                           }

                           label159: {
                              if(var20 == var18 - 1) {
                                 var16 = var31[0];
                                 if(!var23) {
                                    break label159;
                                 }
                              }

                              var16 = var31[var20 + 1];
                           }

                           if(gameModel.projectVertexZ[var16] >= this.clipNear) {
                              var14 = gameModel.projectVertexZ[var5] - gameModel.projectVertexZ[var16];
                              var12 = gameModel.field_853[var5] - (gameModel.field_853[var5] - gameModel.field_853[var16]) * (gameModel.projectVertexZ[var5] - this.clipNear) / var14;
                              var13 = gameModel.field_854[var5] - (gameModel.field_854[var5] - gameModel.field_854[var16]) * (gameModel.projectVertexZ[var5] - this.clipNear) / var14;
                              this.field_708[var29] = (var12 << this.viewDistance) / this.clipNear;
                              this.field_709[var29] = (var13 << this.viewDistance) / this.clipNear;
                              this.field_710[var29] = var17;
                              ++var29;
                           }
                        }

                        ++var20;
                     } while(var20 < var18);
                  }

                  var21 = 0;
                  if(var23 || var21 < var18) {
                     do {
                        label144: {
                           if(this.field_710[var21] < 0) {
                              this.field_710[var21] = 0;
                              if(!var23) {
                                 break label144;
                              }
                           }

                           if(this.field_710[var21] > 255) {
                              this.field_710[var21] = 255;
                           }
                        }

                        if(var27.field_468 >= 0) {
                           label137: {
                              if(this.field_694[var27.field_468] == 1) {
                                 this.field_710[var21] <<= 9;
                                 if(!var23) {
                                    break label137;
                                 }
                              }

                              this.field_710[var21] <<= 6;
                           }
                        }

                        ++var21;
                     } while(var21 < var18);
                  }

                  this.method_188(0, 0, 0, 0, var29, this.field_708, this.field_709, this.field_710, gameModel, var2);
                  if(this.field_707 > this.field_706) {
                     this.method_189(0, 0, var18, this.field_711, this.field_712, this.field_713, var27.field_468, gameModel);
                  }
               }

               ++var10;
            } while(var10 < this.visiblePolygonsCount);

            this.field_656 = false;
         }
      }
   }

   // $FF: renamed from: a (int, int, int, int, int, int[], int[], int[], a.a.f, int) void
   private void method_188(int var1, int var2, int var3, int var4, int var5, int[] var6, int[] var7, int[] var8, GameModel var9, int var10) {
      Scanline var51;
      label575: {
         boolean var50 = Surface.field_759;
         int var11;
         int var12;
         int var13;
         int var14;
         int var15;
         int var16;
         int var17;
         int var18;
         int var19;
         int var20;
         int var21;
         int var22;
         int var23;
         int var24;
         int var25;
         int var26;
         int var27;
         int var28;
         int var29;
         int var30;
         int var31;
         int var32;
         int var33;
         int var34;
         int var35;
         int var36;
         int var37;
         int var38;
         int var39;
         if(var5 == 3) {
            var11 = var7[0] + this.baseY;
            var12 = var7[1] + this.baseY;
            var13 = var7[2] + this.baseY;
            var14 = var6[0];
            var15 = var6[1];
            var16 = var6[2];
            var17 = var8[0];
            var18 = var8[1];
            var19 = var8[2];
            var20 = this.baseY + this.clipY - 1;
            var21 = 0;
            var22 = 0;
            var23 = 0;
            var24 = 0;
            var25 = 12345678;
            var26 = -12345678;
            if(var13 != var11) {
               label524: {
                  var22 = (var16 - var14 << 8) / (var13 - var11);
                  var24 = (var19 - var17 << 8) / (var13 - var11);
                  if(var11 < var13) {
                     var21 = var14 << 8;
                     var23 = var17 << 8;
                     var25 = var11;
                     var26 = var13;
                     if(!var50) {
                        break label524;
                     }
                  }

                  var21 = var16 << 8;
                  var23 = var19 << 8;
                  var25 = var13;
                  var26 = var11;
               }

               if(var25 < 0) {
                  var21 -= var22 * var25;
                  var23 -= var24 * var25;
                  var25 = 0;
               }

               if(var26 > var20) {
                  var26 = var20;
               }
            }

            var27 = 0;
            var28 = 0;
            var29 = 0;
            var30 = 0;
            var31 = 12345678;
            var32 = -12345678;
            if(var12 != var11) {
               label515: {
                  var28 = (var15 - var14 << 8) / (var12 - var11);
                  var30 = (var18 - var17 << 8) / (var12 - var11);
                  if(var11 < var12) {
                     var27 = var14 << 8;
                     var29 = var17 << 8;
                     var31 = var11;
                     var32 = var12;
                     if(!var50) {
                        break label515;
                     }
                  }

                  var27 = var15 << 8;
                  var29 = var18 << 8;
                  var31 = var12;
                  var32 = var11;
               }

               if(var31 < 0) {
                  var27 -= var28 * var31;
                  var29 -= var30 * var31;
                  var31 = 0;
               }

               if(var32 > var20) {
                  var32 = var20;
               }
            }

            var33 = 0;
            var34 = 0;
            var35 = 0;
            var36 = 0;
            var37 = 12345678;
            var38 = -12345678;
            if(var13 != var12) {
               label506: {
                  var34 = (var16 - var15 << 8) / (var13 - var12);
                  var36 = (var19 - var18 << 8) / (var13 - var12);
                  if(var12 < var13) {
                     var33 = var15 << 8;
                     var35 = var18 << 8;
                     var37 = var12;
                     var38 = var13;
                     if(!var50) {
                        break label506;
                     }
                  }

                  var33 = var16 << 8;
                  var35 = var19 << 8;
                  var37 = var13;
                  var38 = var12;
               }

               if(var37 < 0) {
                  var33 -= var34 * var37;
                  var35 -= var36 * var37;
                  var37 = 0;
               }

               if(var38 > var20) {
                  var38 = var20;
               }
            }

            this.field_706 = var25;
            if(var31 < this.field_706) {
               this.field_706 = var31;
            }

            if(var37 < this.field_706) {
               this.field_706 = var37;
            }

            this.field_707 = var26;
            if(var32 > this.field_707) {
               this.field_707 = var32;
            }

            if(var38 > this.field_707) {
               this.field_707 = var38;
            }

            var39 = 0;
            var3 = this.field_706;
            if(var50 || var3 < this.field_707) {
               do {
                  label482: {
                     if(var3 >= var25 && var3 < var26) {
                        var2 = var21;
                        var1 = var21;
                        var39 = var23;
                        var4 = var23;
                        var21 += var22;
                        var23 += var24;
                        if(!var50) {
                           break label482;
                        }
                     }

                     var1 = 655360;
                     var2 = -655360;
                  }

                  if(var3 >= var31 && var3 < var32) {
                     if(var27 < var1) {
                        var1 = var27;
                        var4 = var29;
                     }

                     if(var27 > var2) {
                        var2 = var27;
                        var39 = var29;
                     }

                     var27 += var28;
                     var29 += var30;
                  }

                  if(var3 >= var37 && var3 < var38) {
                     if(var33 < var1) {
                        var1 = var33;
                        var4 = var35;
                     }

                     if(var33 > var2) {
                        var2 = var33;
                        var39 = var35;
                     }

                     var33 += var34;
                     var35 += var36;
                  }

                  Scanline var40 = this.scanlines[var3];
                  var40.startX = var1;
                  var40.endX = var2;
                  var40.startS = var4;
                  var40.endS = var39;
                  ++var3;
               } while(var3 < this.field_707);
            }

            if(this.field_706 >= this.baseY - this.clipY) {
               break label575;
            }

            this.field_706 = this.baseY - this.clipY;
            if(!var50) {
               break label575;
            }
         }

         if(var5 == 4) {
            var11 = var7[0] + this.baseY;
            var12 = var7[1] + this.baseY;
            var13 = var7[2] + this.baseY;
            var14 = var7[3] + this.baseY;
            var15 = var6[0];
            var16 = var6[1];
            var17 = var6[2];
            var18 = var6[3];
            var19 = var8[0];
            var20 = var8[1];
            var21 = var8[2];
            var22 = var8[3];
            var23 = this.baseY + this.clipY - 1;
            var24 = 0;
            var25 = 0;
            var26 = 0;
            var27 = 0;
            var28 = 12345678;
            var29 = -12345678;
            if(var14 != var11) {
               label464: {
                  var25 = (var18 - var15 << 8) / (var14 - var11);
                  var27 = (var22 - var19 << 8) / (var14 - var11);
                  if(var11 < var14) {
                     var24 = var15 << 8;
                     var26 = var19 << 8;
                     var28 = var11;
                     var29 = var14;
                     if(!var50) {
                        break label464;
                     }
                  }

                  var24 = var18 << 8;
                  var26 = var22 << 8;
                  var28 = var14;
                  var29 = var11;
               }

               if(var28 < 0) {
                  var24 -= var25 * var28;
                  var26 -= var27 * var28;
                  var28 = 0;
               }

               if(var29 > var23) {
                  var29 = var23;
               }
            }

            var30 = 0;
            var31 = 0;
            var32 = 0;
            var33 = 0;
            var34 = 12345678;
            var35 = -12345678;
            if(var12 != var11) {
               label455: {
                  var31 = (var16 - var15 << 8) / (var12 - var11);
                  var33 = (var20 - var19 << 8) / (var12 - var11);
                  if(var11 < var12) {
                     var30 = var15 << 8;
                     var32 = var19 << 8;
                     var34 = var11;
                     var35 = var12;
                     if(!var50) {
                        break label455;
                     }
                  }

                  var30 = var16 << 8;
                  var32 = var20 << 8;
                  var34 = var12;
                  var35 = var11;
               }

               if(var34 < 0) {
                  var30 -= var31 * var34;
                  var32 -= var33 * var34;
                  var34 = 0;
               }

               if(var35 > var23) {
                  var35 = var23;
               }
            }

            var36 = 0;
            var37 = 0;
            var38 = 0;
            var39 = 0;
            int var54 = 12345678;
            int var41 = -12345678;
            if(var13 != var12) {
               label446: {
                  var37 = (var17 - var16 << 8) / (var13 - var12);
                  var39 = (var21 - var20 << 8) / (var13 - var12);
                  if(var12 < var13) {
                     var36 = var16 << 8;
                     var38 = var20 << 8;
                     var54 = var12;
                     var41 = var13;
                     if(!var50) {
                        break label446;
                     }
                  }

                  var36 = var17 << 8;
                  var38 = var21 << 8;
                  var54 = var13;
                  var41 = var12;
               }

               if(var54 < 0) {
                  var36 -= var37 * var54;
                  var38 -= var39 * var54;
                  var54 = 0;
               }

               if(var41 > var23) {
                  var41 = var23;
               }
            }

            int var42 = 0;
            int var43 = 0;
            int var44 = 0;
            int var45 = 0;
            int var46 = 12345678;
            int var47 = -12345678;
            if(var14 != var13) {
               label437: {
                  var43 = (var18 - var17 << 8) / (var14 - var13);
                  var45 = (var22 - var21 << 8) / (var14 - var13);
                  if(var13 < var14) {
                     var42 = var17 << 8;
                     var44 = var21 << 8;
                     var46 = var13;
                     var47 = var14;
                     if(!var50) {
                        break label437;
                     }
                  }

                  var42 = var18 << 8;
                  var44 = var22 << 8;
                  var46 = var14;
                  var47 = var13;
               }

               if(var46 < 0) {
                  var42 -= var43 * var46;
                  var44 -= var45 * var46;
                  var46 = 0;
               }

               if(var47 > var23) {
                  var47 = var23;
               }
            }

            this.field_706 = var28;
            if(var34 < this.field_706) {
               this.field_706 = var34;
            }

            if(var54 < this.field_706) {
               this.field_706 = var54;
            }

            if(var46 < this.field_706) {
               this.field_706 = var46;
            }

            this.field_707 = var29;
            if(var35 > this.field_707) {
               this.field_707 = var35;
            }

            if(var41 > this.field_707) {
               this.field_707 = var41;
            }

            if(var47 > this.field_707) {
               this.field_707 = var47;
            }

            int var48 = 0;
            var3 = this.field_706;
            if(var50 || var3 < this.field_707) {
               do {
                  label408: {
                     if(var3 >= var28 && var3 < var29) {
                        var2 = var24;
                        var1 = var24;
                        var48 = var26;
                        var4 = var26;
                        var24 += var25;
                        var26 += var27;
                        if(!var50) {
                           break label408;
                        }
                     }

                     var1 = 655360;
                     var2 = -655360;
                  }

                  if(var3 >= var34 && var3 < var35) {
                     if(var30 < var1) {
                        var1 = var30;
                        var4 = var32;
                     }

                     if(var30 > var2) {
                        var2 = var30;
                        var48 = var32;
                     }

                     var30 += var31;
                     var32 += var33;
                  }

                  if(var3 >= var54 && var3 < var41) {
                     if(var36 < var1) {
                        var1 = var36;
                        var4 = var38;
                     }

                     if(var36 > var2) {
                        var2 = var36;
                        var48 = var38;
                     }

                     var36 += var37;
                     var38 += var39;
                  }

                  if(var3 >= var46 && var3 < var47) {
                     if(var42 < var1) {
                        var1 = var42;
                        var4 = var44;
                     }

                     if(var42 > var2) {
                        var2 = var42;
                        var48 = var44;
                     }

                     var42 += var43;
                     var44 += var45;
                  }

                  Scanline var49 = this.scanlines[var3];
                  var49.startX = var1;
                  var49.endX = var2;
                  var49.startS = var4;
                  var49.endS = var48;
                  ++var3;
               } while(var3 < this.field_707);
            }

            if(this.field_706 >= this.baseY - this.clipY) {
               break label575;
            }

            this.field_706 = this.baseY - this.clipY;
            if(!var50) {
               break label575;
            }
         }

         this.field_707 = this.field_706 = var7[0] += this.baseY;
         var3 = 1;
         if(var50 || var3 < var5) {
            do {
               label391: {
                  if((var11 = var7[var3] += this.baseY) < this.field_706) {
                     this.field_706 = var11;
                     if(!var50) {
                        break label391;
                     }
                  }

                  if(var11 > this.field_707) {
                     this.field_707 = var11;
                  }
               }

               ++var3;
            } while(var3 < var5);
         }

         if(this.field_706 < this.baseY - this.clipY) {
            this.field_706 = this.baseY - this.clipY;
         }

         if(this.field_707 >= this.baseY + this.clipY) {
            this.field_707 = this.baseY + this.clipY - 1;
         }

         if(this.field_706 >= this.field_707) {
            return;
         }

         var3 = this.field_706;
         if(var50 || var3 < this.field_707) {
            do {
               var51 = this.scanlines[var3];
               var51.startX = 655360;
               var51.endX = -655360;
               ++var3;
            } while(var3 < this.field_707);
         }

         label371: {
            var11 = var5 - 1;
            var12 = var7[0];
            var13 = var7[var11];
            Scanline var52;
            if(var12 < var13) {
               var14 = var6[0] << 8;
               var15 = (var6[var11] - var6[0] << 8) / (var13 - var12);
               var16 = var8[0] << 8;
               var17 = (var8[var11] - var8[0] << 8) / (var13 - var12);
               if(var12 < 0) {
                  var14 -= var15 * var12;
                  var16 -= var17 * var12;
                  var12 = 0;
               }

               if(var13 > this.field_707) {
                  var13 = this.field_707;
               }

               var3 = var12;
               if(var50 || var12 <= var13) {
                  do {
                     var52 = this.scanlines[var3];
                     var52.startX = var52.endX = var14;
                     var52.startS = var52.endS = var16;
                     var14 += var15;
                     var16 += var17;
                     ++var3;
                  } while(var3 <= var13);
               }

               if(!var50) {
                  break label371;
               }
            }

            if(var12 > var13) {
               var14 = var6[var11] << 8;
               var15 = (var6[0] - var6[var11] << 8) / (var12 - var13);
               var16 = var8[var11] << 8;
               var17 = (var8[0] - var8[var11] << 8) / (var12 - var13);
               if(var13 < 0) {
                  var14 -= var15 * var13;
                  var16 -= var17 * var13;
                  var13 = 0;
               }

               if(var12 > this.field_707) {
                  var12 = this.field_707;
               }

               var3 = var13;
               if(var50 || var13 <= var12) {
                  do {
                     var52 = this.scanlines[var3];
                     var52.startX = var52.endX = var14;
                     var52.startS = var52.endS = var16;
                     var14 += var15;
                     var16 += var17;
                     ++var3;
                  } while(var3 <= var12);
               }
            }
         }

         var3 = 0;
         if(var50 || var3 < var11) {
            do {
               label328: {
                  var14 = var3 + 1;
                  var12 = var7[var3];
                  var13 = var7[var14];
                  Scanline var53;
                  if(var12 < var13) {
                     var15 = var6[var3] << 8;
                     var16 = (var6[var14] - var6[var3] << 8) / (var13 - var12);
                     var17 = var8[var3] << 8;
                     var18 = (var8[var14] - var8[var3] << 8) / (var13 - var12);
                     if(var12 < 0) {
                        var15 -= var16 * var12;
                        var17 -= var18 * var12;
                        var12 = 0;
                     }

                     if(var13 > this.field_707) {
                        var13 = this.field_707;
                     }

                     var19 = var12;
                     if(var50 || var12 <= var13) {
                        do {
                           var53 = this.scanlines[var19];
                           if(var15 < var53.startX) {
                              var53.startX = var15;
                              var53.startS = var17;
                           }

                           if(var15 > var53.endX) {
                              var53.endX = var15;
                              var53.endS = var17;
                           }

                           var15 += var16;
                           var17 += var18;
                           ++var19;
                        } while(var19 <= var13);
                     }

                     if(!var50) {
                        break label328;
                     }
                  }

                  if(var12 > var13) {
                     var15 = var6[var14] << 8;
                     var16 = (var6[var3] - var6[var14] << 8) / (var12 - var13);
                     var17 = var8[var14] << 8;
                     var18 = (var8[var3] - var8[var14] << 8) / (var12 - var13);
                     if(var13 < 0) {
                        var15 -= var16 * var13;
                        var17 -= var18 * var13;
                        var13 = 0;
                     }

                     if(var12 > this.field_707) {
                        var12 = this.field_707;
                     }

                     var19 = var13;
                     if(var50 || var13 <= var12) {
                        do {
                           var53 = this.scanlines[var19];
                           if(var15 < var53.startX) {
                              var53.startX = var15;
                              var53.startS = var17;
                           }

                           if(var15 > var53.endX) {
                              var53.endX = var15;
                              var53.endS = var17;
                           }

                           var15 += var16;
                           var17 += var18;
                           ++var19;
                        } while(var19 <= var12);
                     }
                  }
               }

               ++var3;
            } while(var3 < var11);
         }

         if(this.field_706 < this.baseY - this.clipY) {
            this.field_706 = this.baseY - this.clipY;
         }
      }

      if(this.field_656 && this.field_659 < this.field_660 && this.field_658 >= this.field_706 && this.field_658 < this.field_707) {
         var51 = this.scanlines[this.field_658];
         if(this.field_657 >= var51.startX >> 8 && this.field_657 <= var51.endX >> 8 && var51.startX <= var51.endX && !var9.field_889 && var9.field_885[var10] == 0) {
            this.field_661[this.field_659] = var9;
            this.field_662[this.field_659] = var10;
            ++this.field_659;
         }
      }

   }

   // $FF: renamed from: a (int, int, int, int[], int[], int[], int, a.a.f) void
   private void method_189(int var1, int var2, int var3, int[] var4, int[] var5, int[] var6, int var7, GameModel var8) {
      boolean var39 = Surface.field_759;
      if(var7 != -2) {
         int var9;
         int var10;
         int var11;
         int var12;
         int var13;
         int var14;
         int var15;
         int var16;
         int var17;
         int var18;
         if(var7 >= 0) {
            if(var7 >= this.field_691) {
               var7 = 0;
            }

            this.method_206(var7);
            var9 = var4[0];
            var10 = var5[0];
            var11 = var6[0];
            var12 = var9 - var4[1];
            var13 = var10 - var5[1];
            var14 = var11 - var6[1];
            --var3;
            var15 = var4[var3] - var9;
            var16 = var5[var3] - var10;
            var17 = var6[var3] - var11;
            int var19;
            int var20;
            int var21;
            int var22;
            int var23;
            int var24;
            int var25;
            int var26;
            int var27;
            int var28;
            int var29;
            int var30;
            int var31;
            int var32;
            byte var33;
            Scanline var34;
            int var35;
            int var36;
            int var37;
            int var38;
            if(this.field_694[var7] == 1) {
               var18 = var15 * var10 - var16 * var9 << 12;
               var19 = var16 * var11 - var17 * var10 << 5 - this.viewDistance + 7 + 4;
               var20 = var17 * var9 - var15 * var11 << 5 - this.viewDistance + 7;
               var21 = var12 * var10 - var13 * var9 << 12;
               var22 = var13 * var11 - var14 * var10 << 5 - this.viewDistance + 7 + 4;
               var23 = var14 * var9 - var12 * var11 << 5 - this.viewDistance + 7;
               var24 = var13 * var15 - var12 * var16 << 5;
               var25 = var14 * var16 - var13 * var17 << 5 - this.viewDistance + 4;
               var26 = var12 * var17 - var14 * var15 >> this.viewDistance - 5;
               var27 = var19 >> 4;
               var28 = var22 >> 4;
               var29 = var25 >> 4;
               var30 = this.field_706 - this.baseY;
               var31 = this.width;
               var32 = this.baseX + this.field_706 * var31;
               var33 = 1;
               var18 += var20 * var30;
               var21 += var23 * var30;
               var24 += var26 * var30;
               if(this.interlace) {
                  if((this.field_706 & 1) == 1) {
                     ++this.field_706;
                     var18 += var20;
                     var21 += var23;
                     var24 += var26;
                     var32 += var31;
                  }

                  var20 <<= 1;
                  var23 <<= 1;
                  var26 <<= 1;
                  var31 <<= 1;
                  var33 = 2;
               }

               if(!var8.field_881) {
                  if(!this.field_697[var7]) {
                     var1 = this.field_706;
                     if(var39 || var1 < this.field_707) {
                        do {
                           label401: {
                              var34 = this.scanlines[var1];
                              var2 = var34.startX >> 8;
                              var35 = var34.endX >> 8;
                              var36 = var35 - var2;
                              if(var36 <= 0) {
                                 var18 += var20;
                                 var21 += var23;
                                 var24 += var26;
                                 var32 += var31;
                                 if(!var39) {
                                    break label401;
                                 }
                              }

                              var37 = var34.startS;
                              var38 = (var34.endS - var37) / var36;
                              if(var2 < -this.clipX) {
                                 var37 += (-this.clipX - var2) * var38;
                                 var2 = -this.clipX;
                                 var36 = var35 - var2;
                              }

                              if(var35 > this.clipX) {
                                 var35 = this.clipX;
                                 var36 = var35 - var2;
                              }

                              method_190(this.field_704, this.field_696[var7], 0, 0, var18 + var27 * var2, var21 + var28 * var2, var24 + var29 * var2, var19, var22, var25, var36, var32 + var2, var37, var38 << 2);
                              var18 += var20;
                              var21 += var23;
                              var24 += var26;
                              var32 += var31;
                           }

                           var1 += var33;
                        } while(var1 < this.field_707);

                     }
                  } else {
                     var1 = this.field_706;
                     if(var39 || var1 < this.field_707) {
                        do {
                           label403: {
                              var34 = this.scanlines[var1];
                              var2 = var34.startX >> 8;
                              var35 = var34.endX >> 8;
                              var36 = var35 - var2;
                              if(var36 <= 0) {
                                 var18 += var20;
                                 var21 += var23;
                                 var24 += var26;
                                 var32 += var31;
                                 if(!var39) {
                                    break label403;
                                 }
                              }

                              var37 = var34.startS;
                              var38 = (var34.endS - var37) / var36;
                              if(var2 < -this.clipX) {
                                 var37 += (-this.clipX - var2) * var38;
                                 var2 = -this.clipX;
                                 var36 = var35 - var2;
                              }

                              if(var35 > this.clipX) {
                                 var35 = this.clipX;
                                 var36 = var35 - var2;
                              }

                              method_192(this.field_704, 0, 0, 0, this.field_696[var7], var18 + var27 * var2, var21 + var28 * var2, var24 + var29 * var2, var19, var22, var25, var36, var32 + var2, var37, var38);
                              var18 += var20;
                              var21 += var23;
                              var24 += var26;
                              var32 += var31;
                           }

                           var1 += var33;
                        } while(var1 < this.field_707);

                     }
                  }
               } else {
                  var1 = this.field_706;
                  if(var39 || var1 < this.field_707) {
                     do {
                        label405: {
                           var34 = this.scanlines[var1];
                           var2 = var34.startX >> 8;
                           var35 = var34.endX >> 8;
                           var36 = var35 - var2;
                           if(var36 <= 0) {
                              var18 += var20;
                              var21 += var23;
                              var24 += var26;
                              var32 += var31;
                              if(!var39) {
                                 break label405;
                              }
                           }

                           var37 = var34.startS;
                           var38 = (var34.endS - var37) / var36;
                           if(var2 < -this.clipX) {
                              var37 += (-this.clipX - var2) * var38;
                              var2 = -this.clipX;
                              var36 = var35 - var2;
                           }

                           if(var35 > this.clipX) {
                              var35 = this.clipX;
                              var36 = var35 - var2;
                           }

                           method_191(this.field_704, this.field_696[var7], 0, 0, var18 + var27 * var2, var21 + var28 * var2, var24 + var29 * var2, var19, var22, var25, var36, var32 + var2, var37, var38 << 2);
                           var18 += var20;
                           var21 += var23;
                           var24 += var26;
                           var32 += var31;
                        }

                        var1 += var33;
                     } while(var1 < this.field_707);

                  }
               }
            } else {
               var18 = var15 * var10 - var16 * var9 << 11;
               var19 = var16 * var11 - var17 * var10 << 5 - this.viewDistance + 6 + 4;
               var20 = var17 * var9 - var15 * var11 << 5 - this.viewDistance + 6;
               var21 = var12 * var10 - var13 * var9 << 11;
               var22 = var13 * var11 - var14 * var10 << 5 - this.viewDistance + 6 + 4;
               var23 = var14 * var9 - var12 * var11 << 5 - this.viewDistance + 6;
               var24 = var13 * var15 - var12 * var16 << 5;
               var25 = var14 * var16 - var13 * var17 << 5 - this.viewDistance + 4;
               var26 = var12 * var17 - var14 * var15 >> this.viewDistance - 5;
               var27 = var19 >> 4;
               var28 = var22 >> 4;
               var29 = var25 >> 4;
               var30 = this.field_706 - this.baseY;
               var31 = this.width;
               var32 = this.baseX + this.field_706 * var31;
               var33 = 1;
               var18 += var20 * var30;
               var21 += var23 * var30;
               var24 += var26 * var30;
               if(this.interlace) {
                  if((this.field_706 & 1) == 1) {
                     ++this.field_706;
                     var18 += var20;
                     var21 += var23;
                     var24 += var26;
                     var32 += var31;
                  }

                  var20 <<= 1;
                  var23 <<= 1;
                  var26 <<= 1;
                  var31 <<= 1;
                  var33 = 2;
               }

               if(!var8.field_881) {
                  if(!this.field_697[var7]) {
                     var1 = this.field_706;
                     if(var39 || var1 < this.field_707) {
                        do {
                           label409: {
                              var34 = this.scanlines[var1];
                              var2 = var34.startX >> 8;
                              var35 = var34.endX >> 8;
                              var36 = var35 - var2;
                              if(var36 <= 0) {
                                 var18 += var20;
                                 var21 += var23;
                                 var24 += var26;
                                 var32 += var31;
                                 if(!var39) {
                                    break label409;
                                 }
                              }

                              var37 = var34.startS;
                              var38 = (var34.endS - var37) / var36;
                              if(var2 < -this.clipX) {
                                 var37 += (-this.clipX - var2) * var38;
                                 var2 = -this.clipX;
                                 var36 = var35 - var2;
                              }

                              if(var35 > this.clipX) {
                                 var35 = this.clipX;
                                 var36 = var35 - var2;
                              }

                              method_193(this.field_704, this.field_696[var7], 0, 0, var18 + var27 * var2, var21 + var28 * var2, var24 + var29 * var2, var19, var22, var25, var36, var32 + var2, var37, var38);
                              var18 += var20;
                              var21 += var23;
                              var24 += var26;
                              var32 += var31;
                           }

                           var1 += var33;
                        } while(var1 < this.field_707);

                     }
                  } else {
                     var1 = this.field_706;
                     if(var39 || var1 < this.field_707) {
                        do {
                           label411: {
                              var34 = this.scanlines[var1];
                              var2 = var34.startX >> 8;
                              var35 = var34.endX >> 8;
                              var36 = var35 - var2;
                              if(var36 <= 0) {
                                 var18 += var20;
                                 var21 += var23;
                                 var24 += var26;
                                 var32 += var31;
                                 if(!var39) {
                                    break label411;
                                 }
                              }

                              var37 = var34.startS;
                              var38 = (var34.endS - var37) / var36;
                              if(var2 < -this.clipX) {
                                 var37 += (-this.clipX - var2) * var38;
                                 var2 = -this.clipX;
                                 var36 = var35 - var2;
                              }

                              if(var35 > this.clipX) {
                                 var35 = this.clipX;
                                 var36 = var35 - var2;
                              }

                              method_195(this.field_704, 0, 0, 0, this.field_696[var7], var18 + var27 * var2, var21 + var28 * var2, var24 + var29 * var2, var19, var22, var25, var36, var32 + var2, var37, var38);
                              var18 += var20;
                              var21 += var23;
                              var24 += var26;
                              var32 += var31;
                           }

                           var1 += var33;
                        } while(var1 < this.field_707);

                     }
                  }
               } else {
                  var1 = this.field_706;
                  if(var39 || var1 < this.field_707) {
                     do {
                        label413: {
                           var34 = this.scanlines[var1];
                           var2 = var34.startX >> 8;
                           var35 = var34.endX >> 8;
                           var36 = var35 - var2;
                           if(var36 <= 0) {
                              var18 += var20;
                              var21 += var23;
                              var24 += var26;
                              var32 += var31;
                              if(!var39) {
                                 break label413;
                              }
                           }

                           var37 = var34.startS;
                           var38 = (var34.endS - var37) / var36;
                           if(var2 < -this.clipX) {
                              var37 += (-this.clipX - var2) * var38;
                              var2 = -this.clipX;
                              var36 = var35 - var2;
                           }

                           if(var35 > this.clipX) {
                              var35 = this.clipX;
                              var36 = var35 - var2;
                           }

                           method_194(this.field_704, this.field_696[var7], 0, 0, var18 + var27 * var2, var21 + var28 * var2, var24 + var29 * var2, var19, var22, var25, var36, var32 + var2, var37, var38);
                           var18 += var20;
                           var21 += var23;
                           var24 += var26;
                           var32 += var31;
                        }

                        var1 += var33;
                     } while(var1 < this.field_707);

                  }
               }
            }
         } else {
            var9 = 0;
            if(var39 || var9 < this.field_641) {
               do {
                  if(this.field_642[var9] == var7) {
                     this.field_644 = this.field_643[var9];
                     if(!var39) {
                        break;
                     }
                  }

                  if(var9 == this.field_641 - 1) {
                     var10 = (int)(Math.random() * (double)this.field_641);
                     this.field_642[var10] = var7;
                     var7 = -1 - var7;
                     var11 = (var7 >> 10 & 31) * 8;
                     var12 = (var7 >> 5 & 31) * 8;
                     var13 = (var7 & 31) * 8;
                     var14 = 0;
                     if(var39 || var14 < 256) {
                        do {
                           var15 = var14 * var14;
                           var16 = var11 * var15 / 65536;
                           var17 = var12 * var15 / 65536;
                           var18 = var13 * var15 / 65536;
                           this.field_643[var10][255 - var14] = (var16 << 16) + (var17 << 8) + var18;
                           ++var14;
                        } while(var14 < 256);
                     }

                     this.field_644 = this.field_643[var10];
                  }

                  ++var9;
               } while(var9 < this.field_641);
            }

            var10 = this.width;
            var11 = this.baseX + this.field_706 * var10;
            byte var40 = 1;
            if(this.interlace) {
               if((this.field_706 & 1) == 1) {
                  ++this.field_706;
                  var11 += var10;
               }

               var10 <<= 1;
               var40 = 2;
            }

            Scanline var41;
            if(!var8.transparent) {
               if(!this.field_653) {
                  var1 = this.field_706;
                  if(var39 || var1 < this.field_707) {
                     do {
                        label418: {
                           var41 = this.scanlines[var1];
                           var2 = var41.startX >> 8;
                           var14 = var41.endX >> 8;
                           var15 = var14 - var2;
                           if(var15 <= 0) {
                              var11 += var10;
                              if(!var39) {
                                 break label418;
                              }
                           }

                           var16 = var41.startS;
                           var17 = (var41.endS - var16) / var15;
                           if(var2 < -this.clipX) {
                              var16 += (-this.clipX - var2) * var17;
                              var2 = -this.clipX;
                              var15 = var14 - var2;
                           }

                           if(var14 > this.clipX) {
                              var14 = this.clipX;
                              var15 = var14 - var2;
                           }

                           method_198(this.field_704, -var15, var11 + var2, 0, this.field_644, var16, var17);
                           var11 += var10;
                        }

                        var1 += var40;
                     } while(var1 < this.field_707);

                  }
               } else {
                  var1 = this.field_706;
                  if(var39 || var1 < this.field_707) {
                     do {
                        label420: {
                           var41 = this.scanlines[var1];
                           var2 = var41.startX >> 8;
                           var14 = var41.endX >> 8;
                           var15 = var14 - var2;
                           if(var15 <= 0) {
                              var11 += var10;
                              if(!var39) {
                                 break label420;
                              }
                           }

                           var16 = var41.startS;
                           var17 = (var41.endS - var16) / var15;
                           if(var2 < -this.clipX) {
                              var16 += (-this.clipX - var2) * var17;
                              var2 = -this.clipX;
                              var15 = var14 - var2;
                           }

                           if(var14 > this.clipX) {
                              var14 = this.clipX;
                              var15 = var14 - var2;
                           }

                           method_196(this.field_704, -var15, var11 + var2, 0, this.field_644, var16, var17);
                           var11 += var10;
                        }

                        var1 += var40;
                     } while(var1 < this.field_707);

                  }
               }
            } else {
               var1 = this.field_706;
               if(var39 || var1 < this.field_707) {
                  do {
                     label422: {
                        var41 = this.scanlines[var1];
                        var2 = var41.startX >> 8;
                        var14 = var41.endX >> 8;
                        var15 = var14 - var2;
                        if(var15 <= 0) {
                           var11 += var10;
                           if(!var39) {
                              break label422;
                           }
                        }

                        var16 = var41.startS;
                        var17 = (var41.endS - var16) / var15;
                        if(var2 < -this.clipX) {
                           var16 += (-this.clipX - var2) * var17;
                           var2 = -this.clipX;
                           var15 = var14 - var2;
                        }

                        if(var14 > this.clipX) {
                           var14 = this.clipX;
                           var15 = var14 - var2;
                        }

                        method_197(this.field_704, -var15, var11 + var2, 0, this.field_644, var16, var17);
                        var11 += var10;
                     }

                     var1 += var40;
                  } while(var1 < this.field_707);

               }
            }
         }
      }
   }

   // $FF: renamed from: a (int[], int[], int, int, int, int, int, int, int, int, int, int, int, int) void
   private static void method_190(int[] var0, int[] var1, int var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13) {
      boolean var21 = Surface.field_759;
      if(var10 > 0) {
         int var14 = 0;
         int var15 = 0;
         int var18 = 0;
         if(var6 != 0) {
            var2 = var4 / var6 << 7;
            var3 = var5 / var6 << 7;
         }

         label79: {
            if(var2 < 0) {
               var2 = 0;
               if(!var21) {
                  break label79;
               }
            }

            if(var2 > 16256) {
               var2 = 16256;
            }
         }

         var4 += var7;
         var5 += var8;
         var6 += var9;
         if(var6 != 0) {
            var14 = var4 / var6 << 7;
            var15 = var5 / var6 << 7;
         }

         label73: {
            if(var14 < 0) {
               var14 = 0;
               if(!var21) {
                  break label73;
               }
            }

            if(var14 > 16256) {
               var14 = 16256;
            }
         }

         int var16 = var14 - var2 >> 4;
         int var17 = var15 - var3 >> 4;
         int var19 = var10 >> 4;
         if(var21 || var19 > 0) {
            do {
               var2 += var12 & 6291456;
               var18 = var12 >> 23;
               var12 += var13;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var2 = (var2 & 16383) + (var12 & 6291456);
               var18 = var12 >> 23;
               var12 += var13;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var2 = (var2 & 16383) + (var12 & 6291456);
               var18 = var12 >> 23;
               var12 += var13;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var2 = (var2 & 16383) + (var12 & 6291456);
               var18 = var12 >> 23;
               var12 += var13;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 = var14;
               var3 = var15;
               var4 += var7;
               var5 += var8;
               var6 += var9;
               if(var6 != 0) {
                  var14 = var4 / var6 << 7;
                  var15 = var5 / var6 << 7;
               }

               label46: {
                  if(var14 < 0) {
                     var14 = 0;
                     if(!var21) {
                        break label46;
                     }
                  }

                  if(var14 > 16256) {
                     var14 = 16256;
                  }
               }

               var16 = var14 - var2 >> 4;
               var17 = var15 - var3 >> 4;
               --var19;
            } while(var19 > 0);
         }

         int var20 = 0;
         if(var21 || var20 < (var10 & 15)) {
            do {
               if((var20 & 3) == 0) {
                  var2 = (var2 & 16383) + (var12 & 6291456);
                  var18 = var12 >> 23;
                  var12 += var13;
               }

               var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
               var2 += var16;
               var3 += var17;
               ++var20;
            } while(var20 < (var10 & 15));

         }
      }
   }

   // $FF: renamed from: b (int[], int[], int, int, int, int, int, int, int, int, int, int, int, int) void
   private static void method_191(int[] var0, int[] var1, int var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13) {
      boolean var21 = Surface.field_759;
      if(var10 > 0) {
         int var14 = 0;
         int var15 = 0;
         int var18 = 0;
         if(var6 != 0) {
            var2 = var4 / var6 << 7;
            var3 = var5 / var6 << 7;
         }

         label79: {
            if(var2 < 0) {
               var2 = 0;
               if(!var21) {
                  break label79;
               }
            }

            if(var2 > 16256) {
               var2 = 16256;
            }
         }

         var4 += var7;
         var5 += var8;
         var6 += var9;
         if(var6 != 0) {
            var14 = var4 / var6 << 7;
            var15 = var5 / var6 << 7;
         }

         label73: {
            if(var14 < 0) {
               var14 = 0;
               if(!var21) {
                  break label73;
               }
            }

            if(var14 > 16256) {
               var14 = 16256;
            }
         }

         int var16 = var14 - var2 >> 4;
         int var17 = var15 - var3 >> 4;
         int var19 = var10 >> 4;
         if(var21 || var19 > 0) {
            do {
               var2 += var12 & 6291456;
               var18 = var12 >> 23;
               var12 += var13;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var2 = (var2 & 16383) + (var12 & 6291456);
               var18 = var12 >> 23;
               var12 += var13;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var2 = (var2 & 16383) + (var12 & 6291456);
               var18 = var12 >> 23;
               var12 += var13;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var2 = (var2 & 16383) + (var12 & 6291456);
               var18 = var12 >> 23;
               var12 += var13;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 = var14;
               var3 = var15;
               var4 += var7;
               var5 += var8;
               var6 += var9;
               if(var6 != 0) {
                  var14 = var4 / var6 << 7;
                  var15 = var5 / var6 << 7;
               }

               label46: {
                  if(var14 < 0) {
                     var14 = 0;
                     if(!var21) {
                        break label46;
                     }
                  }

                  if(var14 > 16256) {
                     var14 = 16256;
                  }
               }

               var16 = var14 - var2 >> 4;
               var17 = var15 - var3 >> 4;
               --var19;
            } while(var19 > 0);
         }

         int var20 = 0;
         if(var21 || var20 < (var10 & 15)) {
            do {
               if((var20 & 3) == 0) {
                  var2 = (var2 & 16383) + (var12 & 6291456);
                  var18 = var12 >> 23;
                  var12 += var13;
               }

               var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
               var2 += var16;
               var3 += var17;
               ++var20;
            } while(var20 < (var10 & 15));

         }
      }
   }

   // $FF: renamed from: a (int[], int, int, int, int[], int, int, int, int, int, int, int, int, int, int) void
   private static void method_192(int[] var0, int var1, int var2, int var3, int[] var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13, int var14) {
      boolean var22 = Surface.field_759;
      if(var11 > 0) {
         int var15 = 0;
         int var16 = 0;
         var14 <<= 2;
         if(var7 != 0) {
            var15 = var5 / var7 << 7;
            var16 = var6 / var7 << 7;
         }

         label130: {
            if(var15 < 0) {
               var15 = 0;
               if(!var22) {
                  break label130;
               }
            }

            if(var15 > 16256) {
               var15 = 16256;
            }
         }

         int var19 = var11;
         if(var22 || var11 > 0) {
            do {
               var5 += var8;
               var6 += var9;
               var7 += var10;
               var2 = var15;
               var3 = var16;
               if(var7 != 0) {
                  var15 = var5 / var7 << 7;
                  var16 = var6 / var7 << 7;
               }

               label124: {
                  if(var15 < 0) {
                     var15 = 0;
                     if(!var22) {
                        break label124;
                     }
                  }

                  if(var15 > 16256) {
                     var15 = 16256;
                  }
               }

               label148: {
                  int var17 = var15 - var2 >> 4;
                  int var18 = var16 - var3 >> 4;
                  int var20 = var13 >> 23;
                  var2 += var13 & 6291456;
                  var13 += var14;
                  if(var19 < 16) {
                     int var21 = 0;
                     if(var22 || var21 < var19) {
                        do {
                           if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                              var0[var12] = var1;
                           }

                           ++var12;
                           var2 += var17;
                           var3 += var18;
                           if((var21 & 3) == 3) {
                              var2 = (var2 & 16383) + (var13 & 6291456);
                              var20 = var13 >> 23;
                              var13 += var14;
                           }

                           ++var21;
                        } while(var21 < var19);
                     }

                     if(!var22) {
                        break label148;
                     }
                  }

                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  var2 = (var2 & 16383) + (var13 & 6291456);
                  var20 = var13 >> 23;
                  var13 += var14;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  var2 = (var2 & 16383) + (var13 & 6291456);
                  var20 = var13 >> 23;
                  var13 += var14;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  var2 = (var2 & 16383) + (var13 & 6291456);
                  var20 = var13 >> 23;
                  var13 += var14;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 16256) + (var2 >> 7)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
               }

               var19 -= 16;
            } while(var19 > 0);

         }
      }
   }

   // $FF: renamed from: c (int[], int[], int, int, int, int, int, int, int, int, int, int, int, int) void
   private static void method_193(int[] var0, int[] var1, int var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13) {
      boolean var21 = Surface.field_759;
      if(var10 > 0) {
         int var14 = 0;
         int var15 = 0;
         var13 <<= 2;
         if(var6 != 0) {
            var14 = var4 / var6 << 6;
            var15 = var5 / var6 << 6;
         }

         label62: {
            if(var14 < 0) {
               var14 = 0;
               if(!var21) {
                  break label62;
               }
            }

            if(var14 > 4032) {
               var14 = 4032;
            }
         }

         int var18 = var10;
         if(var21 || var10 > 0) {
            do {
               var4 += var7;
               var5 += var8;
               var6 += var9;
               var2 = var14;
               var3 = var15;
               if(var6 != 0) {
                  var14 = var4 / var6 << 6;
                  var15 = var5 / var6 << 6;
               }

               label56: {
                  if(var14 < 0) {
                     var14 = 0;
                     if(!var21) {
                        break label56;
                     }
                  }

                  if(var14 > 4032) {
                     var14 = 4032;
                  }
               }

               label51: {
                  int var16 = var14 - var2 >> 4;
                  int var17 = var15 - var3 >> 4;
                  int var19 = var12 >> 20;
                  var2 += var12 & 786432;
                  var12 += var13;
                  if(var18 < 16) {
                     int var20 = 0;
                     if(var21 || var20 < var18) {
                        do {
                           var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                           var2 += var16;
                           var3 += var17;
                           if((var20 & 3) == 3) {
                              var2 = (var2 & 4095) + (var12 & 786432);
                              var19 = var12 >> 20;
                              var12 += var13;
                           }

                           ++var20;
                        } while(var20 < var18);
                     }

                     if(!var21) {
                        break label51;
                     }
                  }

                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var2 = (var2 & 4095) + (var12 & 786432);
                  var19 = var12 >> 20;
                  var12 += var13;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var2 = (var2 & 4095) + (var12 & 786432);
                  var19 = var12 >> 20;
                  var12 += var13;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var2 = (var2 & 4095) + (var12 & 786432);
                  var19 = var12 >> 20;
                  var12 += var13;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
               }

               var18 -= 16;
            } while(var18 > 0);

         }
      }
   }

   // $FF: renamed from: d (int[], int[], int, int, int, int, int, int, int, int, int, int, int, int) void
   private static void method_194(int[] var0, int[] var1, int var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13) {
      boolean var21 = Surface.field_759;
      if(var10 > 0) {
         int var14 = 0;
         int var15 = 0;
         var13 <<= 2;
         if(var6 != 0) {
            var14 = var4 / var6 << 6;
            var15 = var5 / var6 << 6;
         }

         label62: {
            if(var14 < 0) {
               var14 = 0;
               if(!var21) {
                  break label62;
               }
            }

            if(var14 > 4032) {
               var14 = 4032;
            }
         }

         int var18 = var10;
         if(var21 || var10 > 0) {
            do {
               var4 += var7;
               var5 += var8;
               var6 += var9;
               var2 = var14;
               var3 = var15;
               if(var6 != 0) {
                  var14 = var4 / var6 << 6;
                  var15 = var5 / var6 << 6;
               }

               label56: {
                  if(var14 < 0) {
                     var14 = 0;
                     if(!var21) {
                        break label56;
                     }
                  }

                  if(var14 > 4032) {
                     var14 = 4032;
                  }
               }

               label51: {
                  int var16 = var14 - var2 >> 4;
                  int var17 = var15 - var3 >> 4;
                  int var19 = var12 >> 20;
                  var2 += var12 & 786432;
                  var12 += var13;
                  if(var18 < 16) {
                     int var20 = 0;
                     if(var21 || var20 < var18) {
                        do {
                           var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                           var2 += var16;
                           var3 += var17;
                           if((var20 & 3) == 3) {
                              var2 = (var2 & 4095) + (var12 & 786432);
                              var19 = var12 >> 20;
                              var12 += var13;
                           }

                           ++var20;
                        } while(var20 < var18);
                     }

                     if(!var21) {
                        break label51;
                     }
                  }

                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var2 = (var2 & 4095) + (var12 & 786432);
                  var19 = var12 >> 20;
                  var12 += var13;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var2 = (var2 & 4095) + (var12 & 786432);
                  var19 = var12 >> 20;
                  var12 += var13;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var2 = (var2 & 4095) + (var12 & 786432);
                  var19 = var12 >> 20;
                  var12 += var13;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
               }

               var18 -= 16;
            } while(var18 > 0);

         }
      }
   }

   // $FF: renamed from: b (int[], int, int, int, int[], int, int, int, int, int, int, int, int, int, int) void
   private static void method_195(int[] var0, int var1, int var2, int var3, int[] var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13, int var14) {
      boolean var22 = Surface.field_759;
      if(var11 > 0) {
         int var15 = 0;
         int var16 = 0;
         var14 <<= 2;
         if(var7 != 0) {
            var15 = var5 / var7 << 6;
            var16 = var6 / var7 << 6;
         }

         label130: {
            if(var15 < 0) {
               var15 = 0;
               if(!var22) {
                  break label130;
               }
            }

            if(var15 > 4032) {
               var15 = 4032;
            }
         }

         int var19 = var11;
         if(var22 || var11 > 0) {
            do {
               var5 += var8;
               var6 += var9;
               var7 += var10;
               var2 = var15;
               var3 = var16;
               if(var7 != 0) {
                  var15 = var5 / var7 << 6;
                  var16 = var6 / var7 << 6;
               }

               label124: {
                  if(var15 < 0) {
                     var15 = 0;
                     if(!var22) {
                        break label124;
                     }
                  }

                  if(var15 > 4032) {
                     var15 = 4032;
                  }
               }

               label148: {
                  int var17 = var15 - var2 >> 4;
                  int var18 = var16 - var3 >> 4;
                  int var20 = var13 >> 20;
                  var2 += var13 & 786432;
                  var13 += var14;
                  if(var19 < 16) {
                     int var21 = 0;
                     if(var22 || var21 < var19) {
                        do {
                           if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                              var0[var12] = var1;
                           }

                           ++var12;
                           var2 += var17;
                           var3 += var18;
                           if((var21 & 3) == 3) {
                              var2 = (var2 & 4095) + (var13 & 786432);
                              var20 = var13 >> 20;
                              var13 += var14;
                           }

                           ++var21;
                        } while(var21 < var19);
                     }

                     if(!var22) {
                        break label148;
                     }
                  }

                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  var2 = (var2 & 4095) + (var13 & 786432);
                  var20 = var13 >> 20;
                  var13 += var14;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  var2 = (var2 & 4095) + (var13 & 786432);
                  var20 = var13 >> 20;
                  var13 += var14;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  var2 = (var2 & 4095) + (var13 & 786432);
                  var20 = var13 >> 20;
                  var13 += var14;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
                  var2 += var17;
                  var3 += var18;
                  if((var1 = var4[(var3 & 4032) + (var2 >> 6)] >>> var20) != 0) {
                     var0[var12] = var1;
                  }

                  ++var12;
               }

               var19 -= 16;
            } while(var19 > 0);

         }
      }
   }

   // $FF: renamed from: a (int[], int, int, int, int[], int, int) void
   private static void method_196(int[] var0, int var1, int var2, int var3, int[] var4, int var5, int var6) {
      boolean var10 = Surface.field_759;
      if(var1 < 0) {
         var6 <<= 1;
         var3 = var4[var5 >> 8 & 255];
         var5 += var6;
         int var7 = var1 / 8;
         int var8 = var7;
         if(var10 || var7 < 0) {
            do {
               var0[var2++] = var3;
               var0[var2++] = var3;
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
               var0[var2++] = var3;
               var0[var2++] = var3;
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
               var0[var2++] = var3;
               var0[var2++] = var3;
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
               var0[var2++] = var3;
               var0[var2++] = var3;
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
               ++var8;
            } while(var8 < 0);
         }

         var7 = -(var1 % 8);
         int var9 = 0;
         if(var10 || var9 < var7) {
            do {
               var0[var2++] = var3;
               if((var9 & 1) == 1) {
                  var3 = var4[var5 >> 8 & 255];
                  var5 += var6;
               }

               ++var9;
            } while(var9 < var7);

         }
      }
   }

   // $FF: renamed from: b (int[], int, int, int, int[], int, int) void
   private static void method_197(int[] var0, int var1, int var2, int var3, int[] var4, int var5, int var6) {
      boolean var10 = Surface.field_759;
      if(var1 < 0) {
         var6 <<= 2;
         var3 = var4[var5 >> 8 & 255];
         var5 += var6;
         int var7 = var1 / 16;
         int var8 = var7;
         if(var10 || var7 < 0) {
            do {
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
               ++var8;
            } while(var8 < 0);
         }

         var7 = -(var1 % 16);
         int var9 = 0;
         if(var10 || var9 < var7) {
            do {
               var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
               if((var9 & 3) == 3) {
                  var3 = var4[var5 >> 8 & 255];
                  var5 += var6;
                  var5 += var6;
               }

               ++var9;
            } while(var9 < var7);

         }
      }
   }

   // $FF: renamed from: c (int[], int, int, int, int[], int, int) void
   private static void method_198(int[] var0, int var1, int var2, int var3, int[] var4, int var5, int var6) {
      boolean var10 = Surface.field_759;
      if(var1 < 0) {
         var6 <<= 2;
         var3 = var4[var5 >> 8 & 255];
         var5 += var6;
         int var7 = var1 / 16;
         int var8 = var7;
         if(var10 || var7 < 0) {
            do {
               var0[var2++] = var3;
               var0[var2++] = var3;
               var0[var2++] = var3;
               var0[var2++] = var3;
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
               var0[var2++] = var3;
               var0[var2++] = var3;
               var0[var2++] = var3;
               var0[var2++] = var3;
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
               var0[var2++] = var3;
               var0[var2++] = var3;
               var0[var2++] = var3;
               var0[var2++] = var3;
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
               var0[var2++] = var3;
               var0[var2++] = var3;
               var0[var2++] = var3;
               var0[var2++] = var3;
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
               ++var8;
            } while(var8 < 0);
         }

         var7 = -(var1 % 16);
         int var9 = 0;
         if(var10 || var9 < var7) {
            do {
               var0[var2++] = var3;
               if((var9 & 3) == 3) {
                  var3 = var4[var5 >> 8 & 255];
                  var5 += var6;
               }

               ++var9;
            } while(var9 < var7);

         }
      }
   }

   // $FF: renamed from: b (int, int, int, int, int, int, int) void
   public void setCamera(int var1, int var2, int var3, int var4, int var5, int var6, int var7) {
      var4 &= 1023;
      var5 &= 1023;
      var6 &= 1023;
      this.field_673 = 1024 - var4 & 1023;
      this.field_674 = 1024 - var5 & 1023;
      this.field_675 = 1024 - var6 & 1023;
      int var8 = 0;
      int var9 = 0;
      int var10 = var7;
      int var11;
      int var12;
      int var13;
      if(var4 != 0) {
         var11 = field_651[var4];
         var12 = field_651[var4 + 1024];
         var13 = var9 * var12 - var7 * var11 >> 15;
         var10 = var9 * var11 + var7 * var12 >> 15;
         var9 = var13;
      }

      if(var5 != 0) {
         var11 = field_651[var5];
         var12 = field_651[var5 + 1024];
         var13 = var10 * var11 + var8 * var12 >> 15;
         var10 = var10 * var12 - var8 * var11 >> 15;
         var8 = var13;
      }

      if(var6 != 0) {
         var11 = field_651[var6];
         var12 = field_651[var6 + 1024];
         var13 = var9 * var11 + var8 * var12 >> 15;
         var9 = var9 * var12 - var8 * var11 >> 15;
         var8 = var13;
      }

      this.field_670 = var1 - var8;
      this.field_671 = var2 - var9;
      this.field_672 = var3 - var10;
   }

   // $FF: renamed from: c (int) void
   private void initializePolygon3d(int var1) {
      Polygon var2;
      GameModel var3;
      int[] var5;
      int var6;
      int var9;
      int var10;
      int var11;
      int var18;
      int var19;
      int var20;
      boolean var28;
      label68: {
         var28 = Surface.field_759;
         var2 = this.visiblePolygons[var1];
         var3 = var2.model;
         int var4 = var2.face;
         var5 = var3.faceVertices[var4];
         var6 = var3.faceNumVertices[var4];
         int var7 = var3.field_866[var4];
         var9 = var3.field_853[var5[0]];
         var10 = var3.field_854[var5[0]];
         var11 = var3.projectVertexZ[var5[0]];
         int var12 = var3.field_853[var5[1]] - var9;
         int var13 = var3.field_854[var5[1]] - var10;
         int var14 = var3.projectVertexZ[var5[1]] - var11;
         int var15 = var3.field_853[var5[2]] - var9;
         int var16 = var3.field_854[var5[2]] - var10;
         int var17 = var3.projectVertexZ[var5[2]] - var11;
         var18 = var13 * var17 - var16 * var14;
         var19 = var14 * var15 - var17 * var12;
         var20 = var12 * var16 - var15 * var13;
         if(var7 == -1) {
            var7 = 0;
            if(var28) {
               ++var7;
               var18 >>= 1;
               var19 >>= 1;
               var20 >>= 1;
            }

            while(var18 > 25000 || var19 > 25000 || var20 > 25000 || var18 < -25000 || var19 < -25000 || var20 < -25000) {
               ++var7;
               var18 >>= 1;
               var19 >>= 1;
               var20 >>= 1;
            }

            var3.field_866[var4] = var7;
            var3.field_865[var4] = (int)((double)this.field_669 * Math.sqrt((double)(var18 * var18 + var19 * var19 + var20 * var20)));
            if(!var28) {
               break label68;
            }
         }

         var18 >>= var7;
         var19 >>= var7;
         var20 >>= var7;
      }

      var2.visibility = var9 * var18 + var10 * var19 + var11 * var20;
      var2.field_464 = var18;
      var2.field_465 = var19;
      var2.field_466 = var20;
      int var21 = var3.projectVertexZ[var5[0]];
      int var22 = var21;
      int var23 = var3.vertexViewX[var5[0]];
      int var24 = var23;
      int var25 = var3.vertexViewY[var5[0]];
      int var26 = var25;
      int var27 = 1;
      if(!var28 && var27 >= var6) {
         var2.field_459 = var21;
         var2.field_460 = var21;
         var2.field_455 = var23;
         var2.field_457 = var23;
         var2.field_456 = var25;
         var2.field_458 = var25;
      } else {
         do {
            int var8;
            label49: {
               var8 = var3.projectVertexZ[var5[var27]];
               if(var8 > var22) {
                  var22 = var8;
                  if(!var28) {
                     break label49;
                  }
               }

               if(var8 < var21) {
                  var21 = var8;
               }
            }

            label44: {
               var8 = var3.vertexViewX[var5[var27]];
               if(var8 > var24) {
                  var24 = var8;
                  if(!var28) {
                     break label44;
                  }
               }

               if(var8 < var23) {
                  var23 = var8;
               }
            }

            label39: {
               var8 = var3.vertexViewY[var5[var27]];
               if(var8 > var26) {
                  var26 = var8;
                  if(!var28) {
                     break label39;
                  }
               }

               if(var8 < var25) {
                  var25 = var8;
               }
            }

            ++var27;
         } while(var27 < var6);

         var2.field_459 = var21;
         var2.field_460 = var22;
         var2.field_455 = var23;
         var2.field_457 = var24;
         var2.field_456 = var25;
         var2.field_458 = var26;
      }
   }

   // $FF: renamed from: d (int) void
   private void method_201(int var1) {
      Polygon var2;
      GameModel var3;
      int[] var5;
      int var13;
      int var14;
      int var15;
      int var16;
      boolean var19;
      label41: {
         var19 = Surface.field_759;
         var2 = this.visiblePolygons[var1];
         var3 = var2.model;
         int var4 = var2.face;
         var5 = var3.faceVertices[var4];
         byte var7 = 0;
         byte var8 = 0;
         byte var9 = 1;
         int var10 = var3.field_853[var5[0]];
         int var11 = var3.field_854[var5[0]];
         int var12 = var3.projectVertexZ[var5[0]];
         var3.field_865[var4] = 1;
         var3.field_866[var4] = 0;
         var2.visibility = var10 * var7 + var11 * var8 + var12 * var9;
         var2.field_464 = var7;
         var2.field_465 = var8;
         var2.field_466 = var9;
         var13 = var3.projectVertexZ[var5[0]];
         var14 = var13;
         var15 = var3.vertexViewX[var5[0]];
         var16 = var15;
         if(var3.vertexViewX[var5[1]] < var15) {
            var15 = var3.vertexViewX[var5[1]];
            if(!var19) {
               break label41;
            }
         }

         var16 = var3.vertexViewX[var5[1]];
      }

      int var6;
      int var17;
      int var18;
      label36: {
         var17 = var3.vertexViewY[var5[1]];
         var18 = var3.vertexViewY[var5[0]];
         var6 = var3.projectVertexZ[var5[1]];
         if(var6 > var13) {
            var14 = var6;
            if(!var19) {
               break label36;
            }
         }

         if(var6 < var13) {
            var13 = var6;
         }
      }

      label31: {
         var6 = var3.vertexViewX[var5[1]];
         if(var6 > var16) {
            var16 = var6;
            if(!var19) {
               break label31;
            }
         }

         if(var6 < var15) {
            var15 = var6;
         }
      }

      label26: {
         var6 = var3.vertexViewY[var5[1]];
         if(var6 > var18) {
            var18 = var6;
            if(!var19) {
               break label26;
            }
         }

         if(var6 < var17) {
            var17 = var6;
         }
      }

      var2.field_459 = var13;
      var2.field_460 = var14;
      var2.field_455 = var15 - 20;
      var2.field_457 = var16 + 20;
      var2.field_456 = var17;
      var2.field_458 = var18;
   }

   // $FF: renamed from: a (a.a.h, a.a.h) boolean
   private boolean method_202(Polygon var1, Polygon var2) {
      boolean var30 = Surface.field_759;
      if(var1.field_455 >= var2.field_457) {
         return true;
      } else if(var2.field_455 >= var1.field_457) {
         return true;
      } else if(var1.field_456 >= var2.field_458) {
         return true;
      } else if(var2.field_456 >= var1.field_458) {
         return true;
      } else if(var1.field_459 >= var2.field_460) {
         return true;
      } else if(var2.field_459 > var1.field_460) {
         return false;
      } else {
         GameModel var3 = var1.model;
         GameModel var4 = var2.model;
         int var5 = var1.face;
         int var6 = var2.face;
         int[] var7 = var3.faceVertices[var5];
         int[] var8 = var4.faceVertices[var6];
         int var9 = var3.faceNumVertices[var5];
         int var10 = var4.faceNumVertices[var6];
         int var14 = var4.field_853[var8[0]];
         int var15 = var4.field_854[var8[0]];
         int var16 = var4.projectVertexZ[var8[0]];
         int var17 = var2.field_464;
         int var18 = var2.field_465;
         int var19 = var2.field_466;
         int var20 = var4.field_865[var6];
         int var21 = var2.visibility;
         boolean var13 = false;
         int var22 = 0;
         int var11;
         int var12;
         if(var30 || var22 < var9) {
            do {
               var11 = var7[var22];
               var12 = (var14 - var3.field_853[var11]) * var17 + (var15 - var3.field_854[var11]) * var18 + (var16 - var3.projectVertexZ[var11]) * var19;
               if(var12 < -var20 && var21 < 0 || var12 > var20 && var21 > 0) {
                  var13 = true;
                  if(!var30) {
                     break;
                  }
               }

               ++var22;
            } while(var22 < var9);
         }

         if(!var13) {
            return true;
         } else {
            var14 = var3.field_853[var7[0]];
            var15 = var3.field_854[var7[0]];
            var16 = var3.projectVertexZ[var7[0]];
            var17 = var1.field_464;
            var18 = var1.field_465;
            var19 = var1.field_466;
            var20 = var3.field_865[var5];
            var21 = var1.visibility;
            var13 = false;
            int var23 = 0;
            if(var30 || var23 < var10) {
               do {
                  var11 = var8[var23];
                  var12 = (var14 - var4.field_853[var11]) * var17 + (var15 - var4.field_854[var11]) * var18 + (var16 - var4.projectVertexZ[var11]) * var19;
                  if(var12 < -var20 && var21 > 0 || var12 > var20 && var21 < 0) {
                     var13 = true;
                     if(!var30) {
                        break;
                     }
                  }

                  ++var23;
               } while(var23 < var10);
            }

            if(!var13) {
               return true;
            } else {
               int[] var24;
               int[] var25;
               int var28;
               int var29;
               label144: {
                  if(var9 == 2) {
                     var24 = new int[4];
                     var25 = new int[4];
                     var28 = var7[0];
                     var11 = var7[1];
                     var24[0] = var3.vertexViewX[var28] - 20;
                     var24[1] = var3.vertexViewX[var11] - 20;
                     var24[2] = var3.vertexViewX[var11] + 20;
                     var24[3] = var3.vertexViewX[var28] + 20;
                     var25[0] = var25[3] = var3.vertexViewY[var28];
                     var25[1] = var25[2] = var3.vertexViewY[var11];
                     if(!var30) {
                        break label144;
                     }
                  }

                  var24 = new int[var9];
                  var25 = new int[var9];
                  var28 = 0;
                  if(var30 || var28 < var9) {
                     do {
                        var29 = var7[var28];
                        var24[var28] = var3.vertexViewX[var29];
                        var25[var28] = var3.vertexViewY[var29];
                        ++var28;
                     } while(var28 < var9);
                  }
               }

               int[] var26;
               int[] var27;
               if(var10 == 2) {
                  var26 = new int[4];
                  var27 = new int[4];
                  var28 = var8[0];
                  var11 = var8[1];
                  var26[0] = var4.vertexViewX[var28] - 20;
                  var26[1] = var4.vertexViewX[var11] - 20;
                  var26[2] = var4.vertexViewX[var11] + 20;
                  var26[3] = var4.vertexViewX[var28] + 20;
                  var27[0] = var27[3] = var4.vertexViewY[var28];
                  var27[1] = var27[2] = var4.vertexViewY[var11];
                  if(!var30) {
                     return !this.method_216(var24, var25, var26, var27);
                  }
               }

               var26 = new int[var10];
               var27 = new int[var10];
               var28 = 0;
               if(var30 || var28 < var10) {
                  do {
                     var29 = var8[var28];
                     var26[var28] = var4.vertexViewX[var29];
                     var27[var28] = var4.vertexViewY[var29];
                     ++var28;
                  } while(var28 < var10);
               }

               return !this.method_216(var24, var25, var26, var27);
            }
         }
      }
   }

   // $FF: renamed from: b (a.a.h, a.a.h) boolean
   private boolean method_203(Polygon var1, Polygon var2) {
      boolean var24 = Surface.field_759;
      GameModel var3 = var1.model;
      GameModel var4 = var2.model;
      int var5 = var1.face;
      int var6 = var2.face;
      int[] var7 = var3.faceVertices[var5];
      int[] var8 = var4.faceVertices[var6];
      int var9 = var3.faceNumVertices[var5];
      int var10 = var4.faceNumVertices[var6];
      int var14 = var4.field_853[var8[0]];
      int var15 = var4.field_854[var8[0]];
      int var16 = var4.projectVertexZ[var8[0]];
      int var17 = var2.field_464;
      int var18 = var2.field_465;
      int var19 = var2.field_466;
      int var20 = var4.field_865[var6];
      int var21 = var2.visibility;
      boolean var13 = false;
      int var22 = 0;
      int var11;
      int var12;
      if(var24 || var22 < var9) {
         do {
            label85: {
               var11 = var7[var22];
               var12 = (var14 - var3.field_853[var11]) * var17 + (var15 - var3.field_854[var11]) * var18 + (var16 - var3.projectVertexZ[var11]) * var19;
               if(var12 >= -var20 || var21 >= 0) {
                  if(var12 <= var20) {
                     ++var22;
                     continue;
                  }

                  if(var21 <= 0) {
                     break label85;
                  }
               }

               var13 = true;
               if(!var24) {
                  break;
               }
            }

            ++var22;
         } while(var22 < var9);
      }

      if(!var13) {
         return true;
      } else {
         var14 = var3.field_853[var7[0]];
         var15 = var3.field_854[var7[0]];
         var16 = var3.projectVertexZ[var7[0]];
         var17 = var1.field_464;
         var18 = var1.field_465;
         var19 = var1.field_466;
         var20 = var3.field_865[var5];
         var21 = var1.visibility;
         var13 = false;
         int var23 = 0;
         if(var24 || var23 < var10) {
            do {
               var11 = var8[var23];
               var12 = (var14 - var4.field_853[var11]) * var17 + (var15 - var4.field_854[var11]) * var18 + (var16 - var4.projectVertexZ[var11]) * var19;
               if(var12 < -var20 && var21 > 0 || var12 > var20 && var21 < 0) {
                  var13 = true;
                  if(!var24) {
                     break;
                  }
               }

               ++var23;
            } while(var23 < var10);
         }

         return !var13;
      }
   }

   // $FF: renamed from: b (int, int, int) void
   public void allocateTextures(int var1, int var2, int var3) {
      this.field_691 = var1;
      this.field_692 = new byte[var1][];
      this.field_693 = new int[var1][];
      this.field_694 = new int[var1];
      this.field_695 = new long[var1];
      this.field_697 = new boolean[var1];
      this.field_696 = new int[var1][];
      field_698 = 0L;
      this.field_699 = new int[var2][];
      this.field_700 = new int[var3][];
   }

   // $FF: renamed from: a (int, byte[], int[], int) void
   public void defineTexture(int var1, byte[] var2, int[] var3, int var4) {
      this.field_692[var1] = var2;
      this.field_693[var1] = var3;
      this.field_694[var1] = var4;
      this.field_695[var1] = 0L;
      this.field_697[var1] = false;
      this.field_696[var1] = null;
      this.method_206(var1);
   }

   // $FF: renamed from: e (int) void
   public void method_206(int var1) {
      boolean var7 = Surface.field_759;
      if(var1 >= 0) {
         this.field_695[var1] = (long)(field_698++);
         if(this.field_696[var1] == null) {
            int var2;
            long var3;
            int var5;
            int var6;
            if(this.field_694[var1] == 0) {
               var2 = 0;
               if(var7 || var2 < this.field_699.length) {
                  do {
                     if(this.field_699[var2] == null) {
                        this.field_699[var2] = new int[16384];
                        this.field_696[var1] = this.field_699[var2];
                        this.method_207(var1);
                        return;
                     }

                     ++var2;
                  } while(var2 < this.field_699.length);
               }

               var3 = 1L << 30;
               var5 = 0;
               var6 = 0;
               if(!var7 && var6 >= this.field_691) {
                  this.field_696[var1] = this.field_696[var5];
                  this.field_696[var5] = null;
                  this.method_207(var1);
               } else {
                  do {
                     if(var6 != var1 && this.field_694[var6] == 0 && this.field_696[var6] != null && this.field_695[var6] < var3) {
                        var3 = this.field_695[var6];
                        var5 = var6;
                     }

                     ++var6;
                  } while(var6 < this.field_691);

                  this.field_696[var1] = this.field_696[var5];
                  this.field_696[var5] = null;
                  this.method_207(var1);
               }
            } else {
               var2 = 0;
               if(var7 || var2 < this.field_700.length) {
                  do {
                     if(this.field_700[var2] == null) {
                        this.field_700[var2] = new int[65536];
                        this.field_696[var1] = this.field_700[var2];
                        this.method_207(var1);
                        return;
                     }

                     ++var2;
                  } while(var2 < this.field_700.length);
               }

               var3 = 1L << 30;
               var5 = 0;
               var6 = 0;
               if(!var7 && var6 >= this.field_691) {
                  this.field_696[var1] = this.field_696[var5];
                  this.field_696[var5] = null;
                  this.method_207(var1);
               } else {
                  do {
                     if(var6 != var1 && this.field_694[var6] == 1 && this.field_696[var6] != null && this.field_695[var6] < var3) {
                        var3 = this.field_695[var6];
                        var5 = var6;
                     }

                     ++var6;
                  } while(var6 < this.field_691);

                  this.field_696[var1] = this.field_696[var5];
                  this.field_696[var5] = null;
                  this.method_207(var1);
               }
            }
         }
      }
   }

   // $FF: renamed from: f (int) void
   private void method_207(int var1) {
      short var2;
      boolean var8;
      label64: {
         var8 = Surface.field_759;
         if(this.field_694[var1] == 0) {
            var2 = 64;
            if(!var8) {
               break label64;
            }
         }

         var2 = 128;
      }

      int[] var3 = this.field_696[var1];
      int var4 = 0;
      int var5 = 0;
      int var6;
      int var7;
      if(var8 || var5 < var2) {
         do {
            var6 = 0;
            if(!var8 && var6 >= var2) {
               ++var5;
            } else {
               do {
                  label27: {
                     var7 = this.field_693[var1][this.field_692[var1][var6 + var5 * var2] & 255];
                     var7 &= 16316671;
                     if(var7 == 0) {
                        var7 = 1;
                        if(!var8) {
                           break label27;
                        }
                     }

                     if(var7 == 16253183) {
                        var7 = 0;
                        this.field_697[var1] = true;
                     }
                  }

                  var3[var4++] = var7;
                  ++var6;
               } while(var6 < var2);

               ++var5;
            }
         } while(var5 < var2);
      }

      var6 = 0;
      if(var8 || var6 < var4) {
         do {
            var7 = var3[var6];
            var3[var4 + var6] = var7 - (var7 >>> 3) & 16316671;
            var3[var4 * 2 + var6] = var7 - (var7 >>> 2) & 16316671;
            var3[var4 * 3 + var6] = var7 - (var7 >>> 2) - (var7 >>> 3) & 16316671;
            ++var6;
         } while(var6 < var4);

      }
   }

   // $FF: renamed from: g (int) void
   public void method_208(int var1) {
      boolean var7 = Surface.field_759;
      if(this.field_696[var1] != null) {
         int[] var2 = this.field_696[var1];
         int var3 = 0;
         int var5;
         int var6;
         if(var7 || var3 < 64) {
            do {
               int var4 = var3 + 4032;
               var5 = var2[var4];
               var6 = 0;
               if(var7) {
                  var2[var4] = var2[var4 - 64];
                  var4 -= 64;
                  ++var6;
               }

               while(var6 < 63) {
                  var2[var4] = var2[var4 - 64];
                  var4 -= 64;
                  ++var6;
               }

               this.field_696[var1][var4] = var5;
               ++var3;
            } while(var3 < 64);
         }

         short var8 = 4096;
         var5 = 0;
         if(var7 || var5 < var8) {
            do {
               var6 = var2[var5];
               var2[var8 + var5] = var6 - (var6 >>> 3) & 16316671;
               var2[var8 * 2 + var5] = var6 - (var6 >>> 2) & 16316671;
               var2[var8 * 3 + var5] = var6 - (var6 >>> 2) - (var6 >>> 3) & 16316671;
               ++var5;
            } while(var5 < var8);

         }
      }
   }

   // $FF: renamed from: h (int) int
   public int method_209(int var1) {
      if(var1 == 12345678) {
         return 0;
      } else {
         this.method_206(var1);
         if(var1 >= 0) {
            return this.field_696[var1][0];
         } else if(var1 < 0) {
            var1 = -(var1 + 1);
            int var2 = var1 >> 10 & 31;
            int var3 = var1 >> 5 & 31;
            int var4 = var1 & 31;
            return (var2 << 19) + (var3 << 11) + (var4 << 3);
         } else {
            return 0;
         }
      }
   }

   // $FF: renamed from: c (int, int, int) void
   public void setLight(int var1, int var2, int var3) {
      if(var1 == 0 && var2 == 0 && var3 == 0) {
         var1 = 32;
      }

      int var4 = 0;
      if(Surface.field_759 || var4 < this.modelCount) {
         do {
            this.models[var4].method_373(var1, var2, var3);
            ++var4;
         } while(var4 < this.modelCount);

      }
   }

   // $FF: renamed from: a (int, int, int, int, int) void
   public void method_211(int var1, int var2, int var3, int var4, int var5) {
      if(var3 == 0 && var4 == 0 && var5 == 0) {
         var3 = 32;
      }

      int var6 = 0;
      if(Surface.field_759 || var6 < this.modelCount) {
         do {
            this.models[var6].method_372(var1, var2, var3, var4, var5);
            ++var6;
         } while(var6 < this.modelCount);

      }
   }

   // $FF: renamed from: d (int, int, int) int
   public static int method_212(int var0, int var1, int var2) {
      return -1 - var0 / 8 * 1024 - var1 / 8 * 32 - var2 / 8;
   }

   // $FF: renamed from: b (int, int, int, int, int) int
   public int method_213(int var1, int var2, int var3, int var4, int var5) {
      return var4 == var2?var1:var1 + (var3 - var1) * (var5 - var2) / (var4 - var2);
   }

   // $FF: renamed from: a (int, int, int, int, boolean) boolean
   public boolean method_214(int var1, int var2, int var3, int var4, boolean var5) {
      return (!var5 || var1 > var3) && var1 >= var3?(var1 < var4?true:(var2 < var3?true:(var2 < var4?true:var5))):(var1 > var4?true:(var2 > var3?true:(var2 > var4?true:!var5)));
   }

   // $FF: renamed from: a (int, int, int, boolean) boolean
   public boolean method_215(int var1, int var2, int var3, boolean var4) {
      return (!var4 || var1 > var3) && var1 >= var3?(var2 < var3?true:var4):(var2 > var3?true:!var4);
   }

   // $FF: renamed from: a (int[], int[], int[], int[]) boolean
   public boolean method_216(int[] var1, int[] var2, int[] var3, int[] var4) {
      boolean var23 = Surface.field_759;
      int var5 = var1.length;
      int var6 = var3.length;
      byte var15 = 0;
      int var17;
      int var19 = var17 = var2[0];
      int var7 = 0;
      int var18;
      int var20 = var18 = var4[0];
      int var9 = 0;
      int var21 = 1;
      if(var23 || var21 < var5) {
         do {
            label625: {
               if(var2[var21] < var17) {
                  var17 = var2[var21];
                  var7 = var21;
                  if(!var23) {
                     break label625;
                  }
               }

               if(var2[var21] > var19) {
                  var19 = var2[var21];
               }
            }

            ++var21;
         } while(var21 < var5);
      }

      int var22 = 1;
      if(var23) {
         label638: {
            if(var4[var22] < var18) {
               var18 = var4[var22];
               var9 = var22;
               if(!var23) {
                  break label638;
               }
            }

            if(var4[var22] > var20) {
               var20 = var4[var22];
            }
         }

         ++var22;
      }

      for(; var22 < var6; ++var22) {
         if(var4[var22] < var18) {
            var18 = var4[var22];
            var9 = var22;
            if(!var23) {
               continue;
            }
         }

         if(var4[var22] > var20) {
            var20 = var4[var22];
         }
      }

      if(var18 >= var19) {
         return false;
      } else if(var17 >= var20) {
         return false;
      } else {
         int var8;
         int var10;
         int var11;
         int var12;
         int var13;
         int var14;
         boolean var16;
         label609: {
            if(var2[var7] < var4[var9]) {
               var8 = var7;
               if(var23) {
                  var8 = (var7 + 1) % var5;
               }

               while(var2[var8] < var4[var9]) {
                  var8 = (var8 + 1) % var5;
               }

               if(var23 || var2[var7] < var4[var9]) {
                  do {
                     var7 = (var7 - 1 + var5) % var5;
                  } while(var2[var7] < var4[var9]);
               }

               var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
               var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
               var13 = var3[var9];
               var16 = var11 < var13 | var12 < var13;
               if(this.method_215(var11, var12, var13, var16)) {
                  return true;
               }

               var10 = (var9 + 1) % var6;
               var9 = (var9 - 1 + var6) % var6;
               if(var7 != var8) {
                  break label609;
               }

               var15 = 1;
               if(!var23) {
                  break label609;
               }

               var10 = var9;
               if(var23) {
                  var10 = (var9 + 1) % var6;
               }

               while(var4[var10] < var2[var7]) {
                  var10 = (var10 + 1) % var6;
               }

               if(var23 || var4[var9] < var2[var7]) {
                  do {
                     var9 = (var9 - 1 + var6) % var6;
                  } while(var4[var9] < var2[var7]);
               }

               var11 = var1[var7];
               var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var7]);
               var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var7]);
               var16 = var11 < var13 | var11 < var14;
               if(this.method_215(var13, var14, var11, !var16)) {
                  return true;
               }
            } else {
               var10 = var9;
               if(var23) {
                  var10 = (var9 + 1) % var6;
               }

               while(var4[var10] < var2[var7]) {
                  var10 = (var10 + 1) % var6;
               }

               if(var23 || var4[var9] < var2[var7]) {
                  do {
                     var9 = (var9 - 1 + var6) % var6;
                  } while(var4[var9] < var2[var7]);
               }

               var11 = var1[var7];
               var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var7]);
               var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var7]);
               var16 = var11 < var13 | var11 < var14;
               if(this.method_215(var13, var14, var11, !var16)) {
                  return true;
               }
            }

            var8 = (var7 + 1) % var5;
            var7 = (var7 - 1 + var5) % var5;
            if(var9 == var10) {
               var15 = 2;
               if(var23) {
                  label663: {
                     if(var2[var7] < var2[var8]) {
                        if(var2[var7] < var4[var9]) {
                           if(var2[var7] < var4[var10]) {
                              var11 = var1[var7];
                              var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var2[var7]);
                              var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var7]);
                              var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var7]);
                              if(this.method_214(var11, var12, var13, var14, var16)) {
                                 return true;
                              }

                              var7 = (var7 - 1 + var5) % var5;
                              if(var7 != var8) {
                                 break label663;
                              }

                              var15 = 1;
                              if(!var23) {
                                 break label663;
                              }
                           }

                           var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
                           var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
                           var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
                           var14 = var3[var10];
                           if(this.method_214(var11, var12, var13, var14, var16)) {
                              return true;
                           }

                           var10 = (var10 + 1) % var6;
                           if(var9 != var10) {
                              break label663;
                           }

                           var15 = 2;
                           if(!var23) {
                              break label663;
                           }
                        }

                        if(var4[var9] < var4[var10]) {
                           var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
                           var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
                           var13 = var3[var9];
                           var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var4[var9]);
                           if(this.method_214(var11, var12, var13, var14, var16)) {
                              return true;
                           }

                           var9 = (var9 - 1 + var6) % var6;
                           if(var9 != var10) {
                              break label663;
                           }

                           var15 = 2;
                           if(!var23) {
                              break label663;
                           }
                        }

                        var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
                        var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
                        var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
                        var14 = var3[var10];
                        if(this.method_214(var11, var12, var13, var14, var16)) {
                           return true;
                        }

                        var10 = (var10 + 1) % var6;
                        if(var9 != var10) {
                           break label663;
                        }

                        var15 = 2;
                        if(!var23) {
                           break label663;
                        }
                     }

                     if(var2[var8] < var4[var9]) {
                        if(var2[var8] < var4[var10]) {
                           var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var2[var8]);
                           var12 = var1[var8];
                           var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var8]);
                           var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var8]);
                           if(this.method_214(var11, var12, var13, var14, var16)) {
                              return true;
                           }

                           var8 = (var8 + 1) % var5;
                           if(var7 != var8) {
                              break label663;
                           }

                           var15 = 1;
                           if(!var23) {
                              break label663;
                           }
                        }

                        var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
                        var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
                        var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
                        var14 = var3[var10];
                        if(this.method_214(var11, var12, var13, var14, var16)) {
                           return true;
                        }

                        var10 = (var10 + 1) % var6;
                        if(var9 != var10) {
                           break label663;
                        }

                        var15 = 2;
                        if(!var23) {
                           break label663;
                        }
                     }

                     if(var4[var9] < var4[var10]) {
                        var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
                        var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
                        var13 = var3[var9];
                        var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var4[var9]);
                        if(this.method_214(var11, var12, var13, var14, var16)) {
                           return true;
                        }

                        var9 = (var9 - 1 + var6) % var6;
                        if(var9 != var10) {
                           break label663;
                        }

                        var15 = 2;
                        if(!var23) {
                           break label663;
                        }
                     }

                     var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
                     var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
                     var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
                     var14 = var3[var10];
                     if(this.method_214(var11, var12, var13, var14, var16)) {
                        return true;
                     }

                     var10 = (var10 + 1) % var6;
                     if(var9 == var10) {
                        var15 = 2;
                     }
                  }
               }
            }
         }

         while(var15 == 0) {
            if(var2[var7] < var2[var8]) {
               if(var2[var7] < var4[var9]) {
                  if(var2[var7] < var4[var10]) {
                     var11 = var1[var7];
                     var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var2[var7]);
                     var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var7]);
                     var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var7]);
                     if(this.method_214(var11, var12, var13, var14, var16)) {
                        return true;
                     }

                     var7 = (var7 - 1 + var5) % var5;
                     if(var7 != var8) {
                        continue;
                     }

                     var15 = 1;
                     if(!var23) {
                        continue;
                     }
                  }

                  var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
                  var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
                  var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
                  var14 = var3[var10];
                  if(this.method_214(var11, var12, var13, var14, var16)) {
                     return true;
                  }

                  var10 = (var10 + 1) % var6;
                  if(var9 != var10) {
                     continue;
                  }

                  var15 = 2;
                  if(!var23) {
                     continue;
                  }
               }

               if(var4[var9] < var4[var10]) {
                  var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
                  var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
                  var13 = var3[var9];
                  var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var4[var9]);
                  if(this.method_214(var11, var12, var13, var14, var16)) {
                     return true;
                  }

                  var9 = (var9 - 1 + var6) % var6;
                  if(var9 != var10) {
                     continue;
                  }

                  var15 = 2;
                  if(!var23) {
                     continue;
                  }
               }

               var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
               var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
               var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
               var14 = var3[var10];
               if(this.method_214(var11, var12, var13, var14, var16)) {
                  return true;
               }

               var10 = (var10 + 1) % var6;
               if(var9 != var10) {
                  continue;
               }

               var15 = 2;
               if(!var23) {
                  continue;
               }
            }

            if(var2[var8] < var4[var9]) {
               if(var2[var8] < var4[var10]) {
                  var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var2[var8]);
                  var12 = var1[var8];
                  var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var8]);
                  var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var8]);
                  if(this.method_214(var11, var12, var13, var14, var16)) {
                     return true;
                  }

                  var8 = (var8 + 1) % var5;
                  if(var7 != var8) {
                     continue;
                  }

                  var15 = 1;
                  if(!var23) {
                     continue;
                  }
               }

               var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
               var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
               var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
               var14 = var3[var10];
               if(this.method_214(var11, var12, var13, var14, var16)) {
                  return true;
               }

               var10 = (var10 + 1) % var6;
               if(var9 != var10) {
                  continue;
               }

               var15 = 2;
               if(!var23) {
                  continue;
               }
            }

            if(var4[var9] < var4[var10]) {
               var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
               var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
               var13 = var3[var9];
               var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var4[var9]);
               if(this.method_214(var11, var12, var13, var14, var16)) {
                  return true;
               }

               var9 = (var9 - 1 + var6) % var6;
               if(var9 != var10) {
                  continue;
               }

               var15 = 2;
               if(!var23) {
                  continue;
               }
            }

            var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
            var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
            var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
            var14 = var3[var10];
            if(this.method_214(var11, var12, var13, var14, var16)) {
               return true;
            }

            var10 = (var10 + 1) % var6;
            if(var9 == var10) {
               var15 = 2;
            }
         }

         label324: {
            if(var23) {
               label673: {
                  if(var2[var7] < var4[var9]) {
                     if(var2[var7] < var4[var10]) {
                        break label324;
                     }

                     var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
                     var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
                     var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
                     var14 = var3[var10];
                     if(this.method_214(var11, var12, var13, var14, var16)) {
                        return true;
                     }

                     var10 = (var10 + 1) % var6;
                     if(var9 != var10) {
                        break label673;
                     }

                     var15 = 0;
                     if(!var23) {
                        break label673;
                     }
                  }

                  if(var4[var9] < var4[var10]) {
                     var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
                     var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
                     var13 = var3[var9];
                     var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var4[var9]);
                     if(this.method_214(var11, var12, var13, var14, var16)) {
                        return true;
                     }

                     var9 = (var9 - 1 + var6) % var6;
                     if(var9 != var10) {
                        break label673;
                     }

                     var15 = 0;
                     if(!var23) {
                        break label673;
                     }
                  }

                  var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
                  var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
                  var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
                  var14 = var3[var10];
                  if(this.method_214(var11, var12, var13, var14, var16)) {
                     return true;
                  }

                  var10 = (var10 + 1) % var6;
                  if(var9 == var10) {
                     var15 = 0;
                  }
               }
            }

            while(true) {
               if(var15 != 1) {
                  if(!var23 && var15 != 2) {
                     if(var2[var7] < var4[var9]) {
                        var11 = var1[var7];
                        var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var7]);
                        var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var7]);
                        if(this.method_215(var13, var14, var11, !var16)) {
                           return true;
                        }

                        return false;
                     }

                     var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
                     var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
                     var13 = var3[var9];
                     if(this.method_215(var11, var12, var13, var16)) {
                        return true;
                     }

                     return false;
                  }

                  do {
                     if(var4[var9] < var2[var7]) {
                        if(var4[var9] < var2[var8]) {
                           var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
                           var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
                           var13 = var3[var9];
                           if(this.method_215(var11, var12, var13, var16)) {
                              return true;
                           }

                           return false;
                        }

                        var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var2[var8]);
                        var12 = var1[var8];
                        var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var8]);
                        var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var8]);
                        if(this.method_214(var11, var12, var13, var14, var16)) {
                           return true;
                        }

                        var8 = (var8 + 1) % var5;
                        if(var7 != var8) {
                           continue;
                        }

                        var15 = 0;
                        if(!var23) {
                           continue;
                        }
                     }

                     if(var2[var7] < var2[var8]) {
                        var11 = var1[var7];
                        var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var2[var7]);
                        var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var7]);
                        var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var7]);
                        if(this.method_214(var11, var12, var13, var14, var16)) {
                           return true;
                        }

                        var7 = (var7 - 1 + var5) % var5;
                        if(var7 != var8) {
                           continue;
                        }

                        var15 = 0;
                        if(!var23) {
                           continue;
                        }
                     }

                     var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var2[var8]);
                     var12 = var1[var8];
                     var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var8]);
                     var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var8]);
                     if(this.method_214(var11, var12, var13, var14, var16)) {
                        return true;
                     }

                     var8 = (var8 + 1) % var5;
                     if(var7 == var8) {
                        var15 = 0;
                     }
                  } while(var15 == 2);

                  if(var2[var7] < var4[var9]) {
                     var11 = var1[var7];
                     var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var7]);
                     var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var7]);
                     if(this.method_215(var13, var14, var11, !var16)) {
                        return true;
                     }

                     return false;
                  }

                  var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
                  var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
                  var13 = var3[var9];
                  if(this.method_215(var11, var12, var13, var16)) {
                     return true;
                  }

                  return false;
               }

               if(var2[var7] < var4[var9]) {
                  if(var2[var7] < var4[var10]) {
                     break;
                  }

                  var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
                  var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
                  var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
                  var14 = var3[var10];
                  if(this.method_214(var11, var12, var13, var14, var16)) {
                     return true;
                  }

                  var10 = (var10 + 1) % var6;
                  if(var9 != var10) {
                     continue;
                  }

                  var15 = 0;
                  if(!var23) {
                     continue;
                  }
               }

               if(var4[var9] < var4[var10]) {
                  var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
                  var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
                  var13 = var3[var9];
                  var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var4[var9]);
                  if(this.method_214(var11, var12, var13, var14, var16)) {
                     return true;
                  }

                  var9 = (var9 - 1 + var6) % var6;
                  if(var9 != var10) {
                     continue;
                  }

                  var15 = 0;
                  if(!var23) {
                     continue;
                  }
               }

               var11 = this.method_213(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
               var12 = this.method_213(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
               var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
               var14 = var3[var10];
               if(this.method_214(var11, var12, var13, var14, var16)) {
                  return true;
               }

               var10 = (var10 + 1) % var6;
               if(var9 == var10) {
                  var15 = 0;
               }
            }
         }

         var11 = var1[var7];
         var13 = this.method_213(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var7]);
         var14 = this.method_213(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var7]);
         if(this.method_215(var13, var14, var11, !var16)) {
            return true;
         } else {
            return false;
         }
      }
   }

   // $FF: renamed from: <clinit> () void
   static {
      field_651 = new int[2048];
      field_652 = new int[512];
   }
}
