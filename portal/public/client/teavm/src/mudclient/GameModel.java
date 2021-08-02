package mudclient;

// $FF: renamed from: a.a.f
public class GameModel {

   // $FF: renamed from: a int
   public int field_852;
   // $FF: renamed from: b int[]
   public int[] field_853;
   // $FF: renamed from: c int[]
   public int[] field_854;
   // $FF: renamed from: d int[]
   public int[] projectVertexZ;
   // $FF: renamed from: e int[]
   public int[] vertexViewX;
   // $FF: renamed from: f int[]
   public int[] vertexViewY;
   // $FF: renamed from: g int[]
   public int[] field_858;
   // $FF: renamed from: h byte[]
   public byte[] field_859;
   // $FF: renamed from: i int
   public int field_860;
   // $FF: renamed from: j int[]
   public int[] faceNumVertices;
   // $FF: renamed from: k int[][]
   public int[][] faceVertices;
   // $FF: renamed from: l int[]
   public int[] faceFillFront;
   // $FF: renamed from: m int[]
   public int[] faceFillBack;
   // $FF: renamed from: n int[]
   public int[] field_865;
   // $FF: renamed from: o int[]
   public int[] field_866;
   // $FF: renamed from: p int[]
   public int[] field_867;
   // $FF: renamed from: q int[]
   public int[] field_868;
   // $FF: renamed from: r int[]
   public int[] field_869;
   // $FF: renamed from: s int[]
   public int[] field_870;
   // $FF: renamed from: t int
   public int field_871;
   // $FF: renamed from: u int
   public int transformState;
   // $FF: renamed from: v boolean
   public boolean visible;
   // $FF: renamed from: w int
   public int field_874;
   // $FF: renamed from: x int
   public int field_875;
   // $FF: renamed from: y int
   public int field_876;
   // $FF: renamed from: z int
   public int field_877;
   // $FF: renamed from: A int
   public int field_878;
   // $FF: renamed from: B int
   public int field_879;
   // $FF: renamed from: C boolean
   public boolean field_880;
   // $FF: renamed from: D boolean
   public boolean field_881;
   // $FF: renamed from: E boolean
   public boolean transparent;
   // $FF: renamed from: F int
   public int field_883;
   // $FF: renamed from: G int[]
   public int[] faceTag;
   // $FF: renamed from: H byte[]
   public byte[] field_885;
   // $FF: renamed from: I boolean
   private boolean field_886;
   // $FF: renamed from: J boolean
   public boolean field_887;
   // $FF: renamed from: K boolean
   public boolean field_888;
   // $FF: renamed from: L boolean
   public boolean field_889;
   // $FF: renamed from: M boolean
   public boolean field_890;
   // $FF: renamed from: N int[]
   private static int[] field_891;
   // $FF: renamed from: O int[]
   private static int[] field_892;
   // $FF: renamed from: P byte[]
   private static byte[] field_893;
   // $FF: renamed from: Q int[]
   private static int[] field_894;
   // $FF: renamed from: S int
   private int field_896;
   // $FF: renamed from: T int
   public int field_897;
   // $FF: renamed from: U int[]
   public int[] field_898;
   // $FF: renamed from: V int[]
   public int[] field_899;
   // $FF: renamed from: W int[]
   public int[] field_900;
   // $FF: renamed from: X int[]
   public int[] field_901;
   // $FF: renamed from: Y int[]
   public int[] field_902;
   // $FF: renamed from: Z int[]
   public int[] field_903;
   // $FF: renamed from: ba int
   private int field_904;
   // $FF: renamed from: bb int[][]
   private int[][] field_905;
   // $FF: renamed from: bc int[]
   private int[] field_906;
   // $FF: renamed from: bd int[]
   private int[] field_907;
   // $FF: renamed from: be int[]
   private int[] field_908;
   // $FF: renamed from: bf int[]
   private int[] field_909;
   // $FF: renamed from: bg int[]
   private int[] field_910;
   // $FF: renamed from: bh int[]
   private int[] field_911;
   // $FF: renamed from: bi int
   private int field_912;
   // $FF: renamed from: bj int
   private int field_913;
   // $FF: renamed from: bk int
   private int field_914;
   // $FF: renamed from: bl int
   private int field_915;
   // $FF: renamed from: bm int
   private int field_916;
   // $FF: renamed from: bn int
   private int field_917;
   // $FF: renamed from: bo int
   private int field_918;
   // $FF: renamed from: bp int
   private int field_919;
   // $FF: renamed from: bq int
   private int field_920;
   // $FF: renamed from: br int
   private int field_921;
   // $FF: renamed from: bs int
   private int field_922;
   // $FF: renamed from: bt int
   private int field_923;
   // $FF: renamed from: bu int
   private int field_924;
   // $FF: renamed from: bv int
   private int field_925;
   // $FF: renamed from: bw int
   private int field_926;
   // $FF: renamed from: bx int
   private int field_927;
   // $FF: renamed from: by int
   private int field_928;
   // $FF: renamed from: bz int
   private int field_929;
   // $FF: renamed from: bA int
   private int field_930;
   // $FF: renamed from: bB int
   private int field_931;
   // $FF: renamed from: bC int
   private int field_932;
   // $FF: renamed from: bD int
   protected int field_933;
   // $FF: renamed from: bE int
   protected int field_934;
   // $FF: renamed from: bF int
   private int field_935;


   // $FF: renamed from: <init> (int, int) void
   public GameModel(int var1, int var2) {
      super();
      this.transformState = 1;
      this.visible = true;
      this.field_880 = true;
      this.field_881 = false;
      this.transparent = false;
      this.field_883 = -1;
      this.field_886 = false;
      this.field_887 = false;
      this.field_888 = false;
      this.field_889 = false;
      this.field_890 = false;
      this.field_896 = 12345678;
      this.field_928 = 12345678;
      this.field_929 = 180;
      this.field_930 = 155;
      this.field_931 = 95;
      this.field_932 = 256;
      this.field_933 = 512;
      this.field_934 = 32;
      this.method_357(var1, var2);
      this.field_905 = new int[var2][1];
      int var3 = 0;
      if(Surface.field_759 || var3 < var2) {
         do {
            this.field_905[var3][0] = var3++;
         } while(var3 < var2);

      }
   }

   // $FF: renamed from: <init> (int, int, boolean, boolean, boolean, boolean, boolean) void
   public GameModel(int var1, int var2, boolean var3, boolean var4, boolean var5, boolean var6, boolean var7) {
      super();
      this.transformState = 1;
      this.visible = true;
      this.field_880 = true;
      this.field_881 = false;
      this.transparent = false;
      this.field_883 = -1;
      this.field_886 = false;
      this.field_887 = false;
      this.field_888 = false;
      this.field_889 = false;
      this.field_890 = false;
      this.field_896 = 12345678;
      this.field_928 = 12345678;
      this.field_929 = 180;
      this.field_930 = 155;
      this.field_931 = 95;
      this.field_932 = 256;
      this.field_933 = 512;
      this.field_934 = 32;
      this.field_886 = var3;
      this.field_887 = var4;
      this.field_888 = var5;
      this.field_889 = var6;
      this.field_890 = var7;
      this.method_357(var1, var2);
   }

   // $FF: renamed from: a (int, int) void
   private void method_357(int var1, int var2) {
      this.field_898 = new int[var1];
      this.field_899 = new int[var1];
      this.field_900 = new int[var1];
      this.field_858 = new int[var1];
      this.field_859 = new byte[var1];
      this.faceNumVertices = new int[var2];
      this.faceVertices = new int[var2][];
      this.faceFillFront = new int[var2];
      this.faceFillBack = new int[var2];
      this.field_867 = new int[var2];
      this.field_866 = new int[var2];
      this.field_865 = new int[var2];
      if(!this.field_890) {
         this.field_853 = new int[var1];
         this.field_854 = new int[var1];
         this.projectVertexZ = new int[var1];
         this.vertexViewX = new int[var1];
         this.vertexViewY = new int[var1];
      }

      if(!this.field_889) {
         this.field_885 = new byte[var2];
         this.faceTag = new int[var2];
      }

      label28: {
         if(this.field_886) {
            this.field_901 = this.field_898;
            this.field_902 = this.field_899;
            this.field_903 = this.field_900;
            if(!Surface.field_759) {
               break label28;
            }
         }

         this.field_901 = new int[var1];
         this.field_902 = new int[var1];
         this.field_903 = new int[var1];
      }

      if(!this.field_888 || !this.field_887) {
         this.field_868 = new int[var2];
         this.field_869 = new int[var2];
         this.field_870 = new int[var2];
      }

      if(!this.field_887) {
         this.field_906 = new int[var2];
         this.field_907 = new int[var2];
         this.field_908 = new int[var2];
         this.field_909 = new int[var2];
         this.field_910 = new int[var2];
         this.field_911 = new int[var2];
      }

      this.field_860 = 0;
      this.field_852 = 0;
      this.field_897 = var1;
      this.field_904 = var2;
      this.field_912 = this.field_913 = this.field_914 = 0;
      this.field_915 = this.field_916 = this.field_917 = 0;
      this.field_918 = this.field_919 = this.field_920 = 256;
      this.field_921 = this.field_922 = this.field_923 = this.field_924 = this.field_925 = this.field_926 = 256;
      this.field_927 = 0;
   }

   // $FF: renamed from: a () void
   public void method_358() {
      this.field_853 = new int[this.field_852];
      this.field_854 = new int[this.field_852];
      this.projectVertexZ = new int[this.field_852];
      this.vertexViewX = new int[this.field_852];
      this.vertexViewY = new int[this.field_852];
   }

   // $FF: renamed from: b () void
   public void clear() {
      this.field_860 = 0;
      this.field_852 = 0;
   }

   // $FF: renamed from: b (int, int) void
   public void method_360(int var1, int var2) {
      this.field_860 -= var1;
      if(this.field_860 < 0) {
         this.field_860 = 0;
      }

      this.field_852 -= var2;
      if(this.field_852 < 0) {
         this.field_852 = 0;
      }

   }

   // $FF: renamed from: <init> (byte[], int, boolean) void
   public GameModel(byte[] var1, int var2, boolean var3) {
      super();
      boolean var15 = Surface.field_759;
      this.transformState = 1;
      this.visible = true;
      this.field_880 = true;
      this.field_881 = false;
      this.transparent = false;
      this.field_883 = -1;
      this.field_886 = false;
      this.field_887 = false;
      this.field_888 = false;
      this.field_889 = false;
      this.field_890 = false;
      this.field_896 = 12345678;
      this.field_928 = 12345678;
      this.field_929 = 180;
      this.field_930 = 155;
      this.field_931 = 95;
      this.field_932 = 256;
      this.field_933 = 512;
      this.field_934 = 32;
      int var4 = Utility.readUnsignedShort(var1, var2);
      var2 += 2;
      int var5 = Utility.readUnsignedShort(var1, var2);
      var2 += 2;
      this.method_357(var4, var5);
      this.field_905 = new int[var5][1];
      int var6 = 0;
      if(var15 || var6 < var4) {
         do {
            this.field_898[var6] = Utility.method_450(var1, var2);
            var2 += 2;
            ++var6;
         } while(var6 < var4);
      }

      int var7 = 0;
      if(var15) {
         this.field_899[var7] = Utility.method_450(var1, var2);
         var2 += 2;
         ++var7;
      }

      while(var7 < var4) {
         this.field_899[var7] = Utility.method_450(var1, var2);
         var2 += 2;
         ++var7;
      }

      int var8 = 0;
      if(var15 || var8 < var4) {
         do {
            this.field_900[var8] = Utility.method_450(var1, var2);
            var2 += 2;
            ++var8;
         } while(var8 < var4);
      }

      this.field_852 = var4;
      int var9 = 0;
      if(var15) {
         this.faceNumVertices[var9] = var1[var2++] & 255;
         ++var9;
      }

      while(var9 < var5) {
         this.faceNumVertices[var9] = var1[var2++] & 255;
         ++var9;
      }

      int var10 = 0;
      if(var15 || var10 < var5) {
         do {
            this.faceFillFront[var10] = Utility.method_450(var1, var2);
            var2 += 2;
            if(this.faceFillFront[var10] == 32767) {
               this.faceFillFront[var10] = this.field_896;
            }

            ++var10;
         } while(var10 < var5);
      }

      int var11 = 0;
      if(var15) {
         this.faceFillBack[var11] = Utility.method_450(var1, var2);
         var2 += 2;
         if(this.faceFillBack[var11] == 32767) {
            this.faceFillBack[var11] = this.field_896;
         }

         ++var11;
      }

      for(; var11 < var5; ++var11) {
         this.faceFillBack[var11] = Utility.method_450(var1, var2);
         var2 += 2;
         if(this.faceFillBack[var11] == 32767) {
            this.faceFillBack[var11] = this.field_896;
         }
      }

      int var12 = 0;
      int var13;
      if(var15 || var12 < var5) {
         do {
            label68: {
               var13 = var1[var2++] & 255;
               if(var13 == 0) {
                  this.field_867[var12] = 0;
                  if(!var15) {
                     break label68;
                  }
               }

               this.field_867[var12] = this.field_896;
            }

            ++var12;
         } while(var12 < var5);
      }

      var13 = 0;
      if(!var15 && var13 >= var5) {
         this.field_860 = var5;
         this.transformState = 1;
      } else {
         do {
            this.faceVertices[var13] = new int[this.faceNumVertices[var13]];
            int var14 = 0;
            if(!var15 && var14 >= this.faceNumVertices[var13]) {
               ++var13;
            } else {
               do {
                  label51: {
                     if(var4 < 256) {
                        this.faceVertices[var13][var14] = var1[var2++] & 255;
                        if(!var15) {
                           break label51;
                        }
                     }

                     this.faceVertices[var13][var14] = Utility.readUnsignedShort(var1, var2);
                     var2 += 2;
                  }

                  ++var14;
               } while(var14 < this.faceNumVertices[var13]);

               ++var13;
            }
         } while(var13 < var5);

         this.field_860 = var5;
         this.transformState = 1;
      }
   }

   // $FF: renamed from: <init> (a.a.f[], int, boolean, boolean, boolean, boolean) void
   public GameModel(GameModel[] var1, int var2, boolean var3, boolean var4, boolean var5, boolean var6) {
      super();
      this.transformState = 1;
      this.visible = true;
      this.field_880 = true;
      this.field_881 = false;
      this.transparent = false;
      this.field_883 = -1;
      this.field_886 = false;
      this.field_887 = false;
      this.field_888 = false;
      this.field_889 = false;
      this.field_890 = false;
      this.field_896 = 12345678;
      this.field_928 = 12345678;
      this.field_929 = 180;
      this.field_930 = 155;
      this.field_931 = 95;
      this.field_932 = 256;
      this.field_933 = 512;
      this.field_934 = 32;
      this.field_886 = var3;
      this.field_887 = var4;
      this.field_888 = var5;
      this.field_889 = var6;
      this.method_365(var1, var2, false);
   }

   // $FF: renamed from: <init> (a.a.f[], int) void
   public GameModel(GameModel[] var1, int var2) {
      super();
      this.transformState = 1;
      this.visible = true;
      this.field_880 = true;
      this.field_881 = false;
      this.transparent = false;
      this.field_883 = -1;
      this.field_886 = false;
      this.field_887 = false;
      this.field_888 = false;
      this.field_889 = false;
      this.field_890 = false;
      this.field_896 = 12345678;
      this.field_928 = 12345678;
      this.field_929 = 180;
      this.field_930 = 155;
      this.field_931 = 95;
      this.field_932 = 256;
      this.field_933 = 512;
      this.field_934 = 32;
      this.method_365(var1, var2, true);
   }

   // $FF: renamed from: a (a.a.f[], int, boolean) void
   public void method_365(GameModel[] var1, int var2, boolean var3) {
      boolean var15 = Surface.field_759;
      int var4 = 0;
      int var5 = 0;
      int var6 = 0;
      if(var15) {
         var4 += var1[var6].field_860;
         var5 += var1[var6].field_852;
         ++var6;
      }

      while(var6 < var2) {
         var4 += var1[var6].field_860;
         var5 += var1[var6].field_852;
         ++var6;
      }

      this.method_357(var5, var4);
      if(var3) {
         this.field_905 = new int[var4][];
      }

      int var7 = 0;
      if(!var15 && var7 >= var2) {
         this.transformState = 1;
      } else {
         do {
            GameModel var8 = var1[var7];
            var8.method_389();
            this.field_934 = var8.field_934;
            this.field_933 = var8.field_933;
            this.field_929 = var8.field_929;
            this.field_930 = var8.field_930;
            this.field_931 = var8.field_931;
            this.field_932 = var8.field_932;
            int var9 = 0;
            if(!var15 && var9 >= var8.field_860) {
               ++var7;
            } else {
               do {
                  int[] var10 = new int[var8.faceNumVertices[var9]];
                  int[] var11 = var8.faceVertices[var9];
                  int var12 = 0;
                  if(var15) {
                     var10[var12] = this.vertexAt(var8.field_898[var11[var12]], var8.field_899[var11[var12]], var8.field_900[var11[var12]]);
                     ++var12;
                  }

                  while(var12 < var8.faceNumVertices[var9]) {
                     var10[var12] = this.vertexAt(var8.field_898[var11[var12]], var8.field_899[var11[var12]], var8.field_900[var11[var12]]);
                     ++var12;
                  }

                  int var13 = this.createFace(var8.faceNumVertices[var9], var10, var8.faceFillFront[var9], var8.faceFillBack[var9]);
                  this.field_867[var13] = var8.field_867[var9];
                  this.field_866[var13] = var8.field_866[var9];
                  this.field_865[var13] = var8.field_865[var9];
                  if(var3) {
                     label95: {
                        int var14;
                        if(var2 > 1) {
                           this.field_905[var13] = new int[var8.field_905[var9].length + 1];
                           this.field_905[var13][0] = var7;
                           var14 = 0;
                           if(var15 || var14 < var8.field_905[var9].length) {
                              do {
                                 this.field_905[var13][var14 + 1] = var8.field_905[var9][var14];
                                 ++var14;
                              } while(var14 < var8.field_905[var9].length);
                           }

                           if(!var15) {
                              break label95;
                           }
                        }

                        this.field_905[var13] = new int[var8.field_905[var9].length];
                        var14 = 0;
                        if(var15 || var14 < var8.field_905[var9].length) {
                           do {
                              this.field_905[var13][var14] = var8.field_905[var9][var14];
                              ++var14;
                           } while(var14 < var8.field_905[var9].length);
                        }
                     }
                  }

                  ++var9;
               } while(var9 < var8.field_860);

               ++var7;
            }
         } while(var7 < var2);

         this.transformState = 1;
      }
   }

   // $FF: renamed from: a (int, int, int) int
   public int vertexAt(int var1, int var2, int var3) {
      int var4 = 0;
      if(Surface.field_759) {
         if(this.field_898[var4] == var1 && this.field_899[var4] == var2 && this.field_900[var4] == var3) {
            return var4;
         }

         ++var4;
      }

      while(var4 < this.field_852) {
         if(this.field_898[var4] == var1 && this.field_899[var4] == var2 && this.field_900[var4] == var3) {
            return var4;
         }

         ++var4;
      }

      if(this.field_852 >= this.field_897) {
         return -1;
      } else {
         this.field_898[this.field_852] = var1;
         this.field_899[this.field_852] = var2;
         this.field_900[this.field_852] = var3;
         return this.field_852++;
      }
   }

   // $FF: renamed from: b (int, int, int) int
   public int method_367(int var1, int var2, int var3) {
      if(this.field_852 >= this.field_897) {
         return -1;
      } else {
         this.field_898[this.field_852] = var1;
         this.field_899[this.field_852] = var2;
         this.field_900[this.field_852] = var3;
         return this.field_852++;
      }
   }

   // $FF: renamed from: a (int, int[], int, int) int
   public int createFace(int var1, int[] var2, int var3, int var4) {
      if(this.field_860 >= this.field_904) {
         return -1;
      } else {
         this.faceNumVertices[this.field_860] = var1;
         this.faceVertices[this.field_860] = var2;
         this.faceFillFront[this.field_860] = var3;
         this.faceFillBack[this.field_860] = var4;
         this.transformState = 1;
         return this.field_860++;
      }
   }

   // $FF: renamed from: a (int, int, int, int, int, int, int, boolean) a.a.f[]
   public GameModel[] split(int var1, int var2, int var3, int var4, int var5, int var6, int var7, boolean var8) {
      boolean var22 = Surface.field_759;
      this.method_389();
      int[] var9 = new int[var6];
      int[] var10 = new int[var6];
      int var11 = 0;
      if(var22) {
         var9[var11] = 0;
         var10[var11] = 0;
         ++var11;
      }

      while(var11 < var6) {
         var9[var11] = 0;
         var10[var11] = 0;
         ++var11;
      }

      int var12 = 0;
      int var14;
      int var15;
      int var17;
      int var18;
      if(var22 || var12 < this.field_860) {
         do {
            int var13 = 0;
            var14 = 0;
            var15 = this.faceNumVertices[var12];
            int[] var16 = this.faceVertices[var12];
            var17 = 0;
            if(var22) {
               var13 += this.field_898[var16[var17]];
               var14 += this.field_900[var16[var17]];
               ++var17;
            }

            while(var17 < var15) {
               var13 += this.field_898[var16[var17]];
               var14 += this.field_900[var16[var17]];
               ++var17;
            }

            var18 = var13 / (var15 * var3) + var14 / (var15 * var4) * var5;
            var9[var18] += var15;
            ++var10[var18];
            ++var12;
         } while(var12 < this.field_860);
      }

      GameModel[] var23 = new GameModel[var6];
      var14 = 0;

      if(var22) {
         if(var9[var14] > var7) {
            var9[var14] = var7;
         }

         var23[var14] = new GameModel(var9[var14], var10[var14], true, true, true, var8, true);
         var23[var14].field_933 = this.field_933;
         var23[var14].field_934 = this.field_934;
         ++var14;
      }

      while(var14 < var6) {
         if(var9[var14] > var7) {
            var9[var14] = var7;
         }

         var23[var14] = new GameModel(var9[var14], var10[var14], true, true, true, var8, true);
         var23[var14].field_933 = this.field_933;
         var23[var14].field_934 = this.field_934;
         ++var14;
      }

      var15 = 0;
      int var24;
      if(var22 || var15 < this.field_860) {
         do {
            var24 = 0;
            var17 = 0;
            var18 = this.faceNumVertices[var15];
            int[] var19 = this.faceVertices[var15];
            int var20 = 0;
            if(var22) {
               var24 += this.field_898[var19[var20]];
               var17 += this.field_900[var19[var20]];
               ++var20;
            }

            while(var20 < var18) {
               var24 += this.field_898[var19[var20]];
               var17 += this.field_900[var19[var20]];
               ++var20;
            }

            int var21 = var24 / (var18 * var3) + var17 / (var18 * var4) * var5;
            this.method_370(var23[var21], var19, var18, var15);
            ++var15;
         } while(var15 < this.field_860);
      }

      var24 = 0;
      if(var22) {
         var23[var24].method_358();
         ++var24;
      }

      while(var24 < var6) {
         var23[var24].method_358();
         ++var24;
      }

      return var23;
   }

   // $FF: renamed from: a (a.a.f, int[], int, int) void
   public void method_370(GameModel var1, int[] var2, int var3, int var4) {
      int[] var5 = new int[var3];
      int var6 = 0;
      int var7;
      if(Surface.field_759) {
         var7 = var5[var6] = var1.vertexAt(this.field_898[var2[var6]], this.field_899[var2[var6]], this.field_900[var2[var6]]);
         var1.field_858[var7] = this.field_858[var2[var6]];
         var1.field_859[var7] = this.field_859[var2[var6]];
         ++var6;
      }

      while(var6 < var3) {
         var7 = var5[var6] = var1.vertexAt(this.field_898[var2[var6]], this.field_899[var2[var6]], this.field_900[var2[var6]]);
         var1.field_858[var7] = this.field_858[var2[var6]];
         var1.field_859[var7] = this.field_859[var2[var6]];
         ++var6;
      }

      var7 = var1.createFace(var3, var5, this.faceFillFront[var4], this.faceFillBack[var4]);
      if(!var1.field_889 && !this.field_889) {
         var1.faceTag[var7] = this.faceTag[var4];
      }

      var1.field_867[var7] = this.field_867[var4];
      var1.field_866[var7] = this.field_866[var4];
      var1.field_865[var7] = this.field_865[var4];
   }

   // $FF: renamed from: a (boolean, int, int, int, int, int) void
   public void setLight(boolean var1, int var2, int var3, int var4, int var5, int var6) {
      boolean var8 = Surface.field_759;
      this.field_934 = 256 - var2 * 4;
      this.field_933 = (64 - var3) * 16 + 128;
      if(!this.field_888) {
         int var7 = 0;
         if(var8) {
            label23: {
               if(var1) {
                  this.field_867[var7] = this.field_896;
                  if(!var8) {
                     break label23;
                  }
               }

               this.field_867[var7] = 0;
            }

            ++var7;
         }

         for(; var7 < this.field_860; ++var7) {
            if(var1) {
               this.field_867[var7] = this.field_896;
               if(!var8) {
                  continue;
               }
            }

            this.field_867[var7] = 0;
         }

         this.field_929 = var4;
         this.field_930 = var5;
         this.field_931 = var6;
         this.field_932 = (int)Math.sqrt((double)(var4 * var4 + var5 * var5 + var6 * var6));
         this.method_385();
      }
   }

   // $FF: renamed from: a (int, int, int, int, int) void
   public void method_372(int var1, int var2, int var3, int var4, int var5) {
      this.field_934 = 256 - var1 * 4;
      this.field_933 = (64 - var2) * 16 + 128;
      if(!this.field_888) {
         this.field_929 = var3;
         this.field_930 = var4;
         this.field_931 = var5;
         this.field_932 = (int)Math.sqrt((double)(var3 * var3 + var4 * var4 + var5 * var5));
         this.method_385();
      }
   }

   // $FF: renamed from: c (int, int, int) void
   public void method_373(int var1, int var2, int var3) {
      if(!this.field_888) {
         this.field_929 = var1;
         this.field_930 = var2;
         this.field_931 = var3;
         this.field_932 = (int)Math.sqrt((double)(var1 * var1 + var2 * var2 + var3 * var3));
         this.method_385();
      }
   }

   // $FF: renamed from: c (int, int) void
   public void setVertexAmbience(int var1, int var2) {
      this.field_859[var1] = (byte)var2;
   }

   // $FF: renamed from: d (int, int, int) void
   public void method_375(int var1, int var2, int var3) {
      this.field_915 = this.field_915 + var1 & 255;
      this.field_916 = this.field_916 + var2 & 255;
      this.field_917 = this.field_917 + var3 & 255;
      this.method_379();
      this.transformState = 1;
   }

   // $FF: renamed from: e (int, int, int) void
   public void method_376(int var1, int var2, int var3) {
      this.field_915 = var1 & 255;
      this.field_916 = var2 & 255;
      this.field_917 = var3 & 255;
      this.method_379();
      this.transformState = 1;
   }

   // $FF: renamed from: f (int, int, int) void
   public void method_377(int var1, int var2, int var3) {
      this.field_912 += var1;
      this.field_913 += var2;
      this.field_914 += var3;
      this.method_379();
      this.transformState = 1;
   }

   // $FF: renamed from: g (int, int, int) void
   public void method_378(int var1, int var2, int var3) {
      this.field_912 = var1;
      this.field_913 = var2;
      this.field_914 = var3;
      this.method_379();
      this.transformState = 1;
   }

   // $FF: renamed from: c () void
   private void method_379() {
      if(this.field_921 == 256 && this.field_922 == 256 && this.field_923 == 256 && this.field_924 == 256 && this.field_925 == 256 && this.field_926 == 256) {
         if(this.field_918 == 256 && this.field_919 == 256 && this.field_920 == 256) {
            if(this.field_915 == 0 && this.field_916 == 0 && this.field_917 == 0) {
               if(this.field_912 == 0 && this.field_913 == 0 && this.field_914 == 0) {
                  this.field_927 = 0;
               } else {
                  this.field_927 = 1;
               }
            } else {
               this.field_927 = 2;
            }
         } else {
            this.field_927 = 3;
         }
      } else {
         this.field_927 = 4;
      }
   }

   // $FF: renamed from: h (int, int, int) void
   private void method_380(int var1, int var2, int var3) {
      int var4 = 0;
      if(Surface.field_759 || var4 < this.field_852) {
         do {
            this.field_901[var4] += var1;
            this.field_902[var4] += var2;
            this.field_903[var4] += var3;
            ++var4;
         } while(var4 < this.field_852);

      }
   }

   // $FF: renamed from: i (int, int, int) void
   private void method_381(int var1, int var2, int var3) {
      int var7 = 0;
      if(Surface.field_759 || var7 < this.field_852) {
         do {
            int var4;
            int var5;
            int var6;
            if(var3 != 0) {
               var4 = field_891[var3];
               var5 = field_891[var3 + 256];
               var6 = this.field_902[var7] * var4 + this.field_901[var7] * var5 >> 15;
               this.field_902[var7] = this.field_902[var7] * var5 - this.field_901[var7] * var4 >> 15;
               this.field_901[var7] = var6;
            }

            if(var1 != 0) {
               var4 = field_891[var1];
               var5 = field_891[var1 + 256];
               var6 = this.field_902[var7] * var5 - this.field_903[var7] * var4 >> 15;
               this.field_903[var7] = this.field_902[var7] * var4 + this.field_903[var7] * var5 >> 15;
               this.field_902[var7] = var6;
            }

            if(var2 != 0) {
               var4 = field_891[var2];
               var5 = field_891[var2 + 256];
               var6 = this.field_903[var7] * var4 + this.field_901[var7] * var5 >> 15;
               this.field_903[var7] = this.field_903[var7] * var5 - this.field_901[var7] * var4 >> 15;
               this.field_901[var7] = var6;
            }

            ++var7;
         } while(var7 < this.field_852);

      }
   }

   // $FF: renamed from: a (int, int, int, int, int, int) void
   private void method_382(int var1, int var2, int var3, int var4, int var5, int var6) {
      int var7 = 0;
      if(Surface.field_759 || var7 < this.field_852) {
         do {
            if(var1 != 0) {
               this.field_901[var7] += this.field_902[var7] * var1 >> 8;
            }

            if(var2 != 0) {
               this.field_903[var7] += this.field_902[var7] * var2 >> 8;
            }

            if(var3 != 0) {
               this.field_901[var7] += this.field_903[var7] * var3 >> 8;
            }

            if(var4 != 0) {
               this.field_902[var7] += this.field_903[var7] * var4 >> 8;
            }

            if(var5 != 0) {
               this.field_903[var7] += this.field_901[var7] * var5 >> 8;
            }

            if(var6 != 0) {
               this.field_902[var7] += this.field_901[var7] * var6 >> 8;
            }

            ++var7;
         } while(var7 < this.field_852);

      }
   }

   // $FF: renamed from: j (int, int, int) void
   private void method_383(int var1, int var2, int var3) {
      int var4 = 0;
      if(Surface.field_759 || var4 < this.field_852) {
         do {
            this.field_901[var4] = this.field_901[var4] * var1 >> 8;
            this.field_902[var4] = this.field_902[var4] * var2 >> 8;
            this.field_903[var4] = this.field_903[var4] * var3 >> 8;
            ++var4;
         } while(var4 < this.field_852);

      }
   }

   // $FF: renamed from: d () void
   private void method_384() {
      boolean var12 = Surface.field_759;
      this.field_874 = this.field_876 = this.field_878 = 999999;
      this.field_928 = this.field_875 = this.field_877 = this.field_879 = -999999;
      int var2 = 0;
      if(var12 || var2 < this.field_860) {
         do {
            int[] var1 = this.faceVertices[var2];
            int var4 = var1[0];
            int var5 = this.faceNumVertices[var2];
            int var6;
            int var7 = var6 = this.field_901[var4];
            int var8;
            int var9 = var8 = this.field_902[var4];
            int var10;
            int var11 = var10 = this.field_903[var4];
            int var3 = 0;
            if(var12) {
               label88: {
                  var4 = var1[var3];
                  if(this.field_901[var4] < var6) {
                     var6 = this.field_901[var4];
                     if(!var12) {
                        break label88;
                     }
                  }

                  if(this.field_901[var4] > var7) {
                     var7 = this.field_901[var4];
                  }
               }

               label101: {
                  if(this.field_902[var4] < var8) {
                     var8 = this.field_902[var4];
                     if(!var12) {
                        break label101;
                     }
                  }

                  if(this.field_902[var4] > var9) {
                     var9 = this.field_902[var4];
                  }
               }

               label114: {
                  if(this.field_903[var4] < var10) {
                     var10 = this.field_903[var4];
                     if(!var12) {
                        break label114;
                     }
                  }

                  if(this.field_903[var4] > var11) {
                     var11 = this.field_903[var4];
                  }
               }

               ++var3;
            }

            for(; var3 < var5; ++var3) {
               label83: {
                  var4 = var1[var3];
                  if(this.field_901[var4] < var6) {
                     var6 = this.field_901[var4];
                     if(!var12) {
                        break label83;
                     }
                  }

                  if(this.field_901[var4] > var7) {
                     var7 = this.field_901[var4];
                  }
               }

               label77: {
                  if(this.field_902[var4] < var8) {
                     var8 = this.field_902[var4];
                     if(!var12) {
                        break label77;
                     }
                  }

                  if(this.field_902[var4] > var9) {
                     var9 = this.field_902[var4];
                  }
               }

               if(this.field_903[var4] < var10) {
                  var10 = this.field_903[var4];
                  if(!var12) {
                     continue;
                  }
               }

               if(this.field_903[var4] > var11) {
                  var11 = this.field_903[var4];
               }
            }

            if(!this.field_887) {
               this.field_906[var2] = var6;
               this.field_907[var2] = var7;
               this.field_908[var2] = var8;
               this.field_909[var2] = var9;
               this.field_910[var2] = var10;
               this.field_911[var2] = var11;
            }

            if(var7 - var6 > this.field_928) {
               this.field_928 = var7 - var6;
            }

            if(var9 - var8 > this.field_928) {
               this.field_928 = var9 - var8;
            }

            if(var11 - var10 > this.field_928) {
               this.field_928 = var11 - var10;
            }

            if(var6 < this.field_874) {
               this.field_874 = var6;
            }

            if(var7 > this.field_875) {
               this.field_875 = var7;
            }

            if(var8 < this.field_876) {
               this.field_876 = var8;
            }

            if(var9 > this.field_877) {
               this.field_877 = var9;
            }

            if(var10 < this.field_878) {
               this.field_878 = var10;
            }

            if(var11 > this.field_879) {
               this.field_879 = var11;
            }

            ++var2;
         } while(var2 < this.field_860);

      }
   }

   // $FF: renamed from: e () void
   public void method_385() {
      boolean var11 = Surface.field_759;
      if(!this.field_888) {
         int var1 = this.field_933 * this.field_932 >> 8;
         int var2 = 0;
         if(var11 || var2 < this.field_860) {
            do {
               if(this.field_867[var2] != this.field_896) {
                  this.field_867[var2] = (this.field_868[var2] * this.field_929 + this.field_869[var2] * this.field_930 + this.field_870[var2] * this.field_931) / var1;
               }

               ++var2;
            } while(var2 < this.field_860);
         }

         int[] var3 = new int[this.field_852];
         int[] var4 = new int[this.field_852];
         int[] var5 = new int[this.field_852];
         int[] var6 = new int[this.field_852];
         int var7 = 0;
         if(var11) {
            var3[var7] = 0;
            var4[var7] = 0;
            var5[var7] = 0;
            var6[var7] = 0;
            ++var7;
         }

         while(var7 < this.field_852) {
            var3[var7] = 0;
            var4[var7] = 0;
            var5[var7] = 0;
            var6[var7] = 0;
            ++var7;
         }

         int var8 = 0;
         int var9;
         if(var11 || var8 < this.field_860) {
            do {
               if(this.field_867[var8] == this.field_896) {
                  var9 = 0;
                  if(var11 || var9 < this.faceNumVertices[var8]) {
                     do {
                        int var10 = this.faceVertices[var8][var9];
                        var3[var10] += this.field_868[var8];
                        var4[var10] += this.field_869[var8];
                        var5[var10] += this.field_870[var8];
                        ++var6[var10];
                        ++var9;
                     } while(var9 < this.faceNumVertices[var8]);
                  }
               }

               ++var8;
            } while(var8 < this.field_860);
         }

         var9 = 0;
         if(var11 || var9 < this.field_852) {
            do {
               if(var6[var9] > 0) {
                  this.field_858[var9] = (var3[var9] * this.field_929 + var4[var9] * this.field_930 + var5[var9] * this.field_931) / (var1 * var6[var9]);
               }

               ++var9;
            } while(var9 < this.field_852);

         }
      }
   }

   // $FF: renamed from: f () void
   public void method_386() {
      boolean var16 = Surface.field_759;
      if(!this.field_888 || !this.field_887) {
         int var1 = 0;
         if(!var16 && var1 >= this.field_860) {
            this.method_385();
         } else {
            do {
               int[] var2 = this.faceVertices[var1];
               int var3 = this.field_901[var2[0]];
               int var4 = this.field_902[var2[0]];
               int var5 = this.field_903[var2[0]];
               int var6 = this.field_901[var2[1]] - var3;
               int var7 = this.field_902[var2[1]] - var4;
               int var8 = this.field_903[var2[1]] - var5;
               int var9 = this.field_901[var2[2]] - var3;
               int var10 = this.field_902[var2[2]] - var4;
               int var11 = this.field_903[var2[2]] - var5;
               int var12 = var7 * var11 - var10 * var8;
               int var13 = var8 * var9 - var11 * var6;
               int var14 = var6 * var10 - var9 * var7;
               if(var16) {
                  var12 >>= 1;
                  var13 >>= 1;
                  var14 >>= 1;
               }

               while(var12 > 8192 || var13 > 8192 || var14 > 8192 || var12 < -8192 || var13 < -8192 || var14 < -8192) {
                  var12 >>= 1;
                  var13 >>= 1;
                  var14 >>= 1;
               }

               int var15 = (int)(256.0D * Math.sqrt((double)(var12 * var12 + var13 * var13 + var14 * var14)));
               if(var15 <= 0) {
                  var15 = 1;
               }

               this.field_868[var1] = var12 * 65536 / var15;
               this.field_869[var1] = var13 * 65536 / var15;
               this.field_870[var1] = var14 * '\uffff' / var15;
               this.field_866[var1] = -1;
               ++var1;
            } while(var1 < this.field_860);

            this.method_385();
         }
      }
   }

   // $FF: renamed from: g () void
   public void method_387() {
      boolean var2 = Surface.field_759;
      int var1;
      if(this.transformState != 2) {
         if(this.transformState == 1) {
            this.transformState = 0;
            var1 = 0;
            if(var2 || var1 < this.field_852) {
               do {
                  this.field_901[var1] = this.field_898[var1];
                  this.field_902[var1] = this.field_899[var1];
                  this.field_903[var1] = this.field_900[var1];
                  ++var1;
               } while(var1 < this.field_852);
            }

            if(this.field_927 >= 2) {
               this.method_381(this.field_915, this.field_916, this.field_917);
            }

            if(this.field_927 >= 3) {
               this.method_383(this.field_918, this.field_919, this.field_920);
            }

            if(this.field_927 >= 4) {
               this.method_382(this.field_921, this.field_922, this.field_923, this.field_924, this.field_925, this.field_926);
            }

            if(this.field_927 >= 1) {
               this.method_380(this.field_912, this.field_913, this.field_914);
            }

            this.method_384();
            this.method_386();
         }

      } else {
         this.transformState = 0;
         var1 = 0;
         if(var2) {
            this.field_901[var1] = this.field_898[var1];
            this.field_902[var1] = this.field_899[var1];
            this.field_903[var1] = this.field_900[var1];
            ++var1;
         }

         while(var1 < this.field_852) {
            this.field_901[var1] = this.field_898[var1];
            this.field_902[var1] = this.field_899[var1];
            this.field_903[var1] = this.field_900[var1];
            ++var1;
         }

         this.field_874 = this.field_876 = this.field_878 = -9999999;
         this.field_928 = this.field_875 = this.field_877 = this.field_879 = 9999999;
      }
   }

   // $FF: renamed from: a (int, int, int, int, int, int, int, int) void
   public void project(int var1, int var2, int var3, int var4, int var5, int var6, int var7, int var8) {
      boolean var20 = Surface.field_759;
      this.method_387();
      if(this.field_878 <= Scene.frustumNearZ && this.field_879 >= Scene.frustumFarZ && this.field_874 <= Scene.frustumMinX && this.field_875 >= Scene.frustumMaxX && this.field_876 <= Scene.frustumMinY && this.field_877 >= Scene.frustumMaxY) {
         this.visible = true;
         int var10 = 0;
         int var11 = 0;
         int var12 = 0;
         int var13 = 0;
         int var14 = 0;
         int var15 = 0;
         if(var6 != 0) {
            var10 = field_892[var6];
            var11 = field_892[var6 + 1024];
         }

         if(var5 != 0) {
            var14 = field_892[var5];
            var15 = field_892[var5 + 1024];
         }

         if(var4 != 0) {
            var12 = field_892[var4];
            var13 = field_892[var4 + 1024];
         }

         int var16 = 0;
         if(var20 || var16 < this.field_852) {
            do {
               int var17 = this.field_901[var16] - var1;
               int var18 = this.field_902[var16] - var2;
               int var19 = this.field_903[var16] - var3;
               int var9;
               if(var6 != 0) {
                  var9 = var18 * var10 + var17 * var11 >> 15;
                  var18 = var18 * var11 - var17 * var10 >> 15;
                  var17 = var9;
               }

               if(var5 != 0) {
                  var9 = var19 * var14 + var17 * var15 >> 15;
                  var19 = var19 * var15 - var17 * var14 >> 15;
                  var17 = var9;
               }

               if(var4 != 0) {
                  var9 = var18 * var13 - var19 * var12 >> 15;
                  var19 = var18 * var12 + var19 * var13 >> 15;
                  var18 = var9;
               }

               label50: {
                  if(var19 >= var8) {
                     this.vertexViewX[var16] = (var17 << var7) / var19;
                     if(!var20) {
                        break label50;
                     }
                  }

                  this.vertexViewX[var16] = var17 << var7;
               }

               label45: {
                  if(var19 >= var8) {
                     this.vertexViewY[var16] = (var18 << var7) / var19;
                     if(!var20) {
                        break label45;
                     }
                  }

                  this.vertexViewY[var16] = var18 << var7;
               }

               this.field_853[var16] = var17;
               this.field_854[var16] = var18;
               this.projectVertexZ[var16] = var19;
               ++var16;
            } while(var16 < this.field_852);

         }
      } else {
         this.visible = false;
      }
   }

   // $FF: renamed from: h () void
   public void method_389() {
      this.method_387();
      int var1 = 0;
      if(Surface.field_759) {
         this.field_898[var1] = this.field_901[var1];
         this.field_899[var1] = this.field_902[var1];
         this.field_900[var1] = this.field_903[var1];
         ++var1;
      }

      while(var1 < this.field_852) {
         this.field_898[var1] = this.field_901[var1];
         this.field_899[var1] = this.field_902[var1];
         this.field_900[var1] = this.field_903[var1];
         ++var1;
      }

      this.field_912 = this.field_913 = this.field_914 = 0;
      this.field_915 = this.field_916 = this.field_917 = 0;
      this.field_918 = this.field_919 = this.field_920 = 256;
      this.field_921 = this.field_922 = this.field_923 = this.field_924 = this.field_925 = this.field_926 = 256;
      this.field_927 = 0;
   }

   // $FF: renamed from: i () a.a.f
   public GameModel method_390() {
      GameModel[] var1 = new GameModel[]{this};
      GameModel var2 = new GameModel(var1, 1);
      var2.field_871 = this.field_871;
      var2.transparent = this.transparent;
      return var2;
   }

   // $FF: renamed from: a (boolean, boolean, boolean, boolean) a.a.f
   public GameModel method_391(boolean var1, boolean var2, boolean var3, boolean var4) {
      GameModel[] var5 = new GameModel[]{this};
      GameModel var6 = new GameModel(var5, 1, var1, var2, var3, var4);
      var6.field_871 = this.field_871;
      return var6;
   }

   // $FF: renamed from: a (a.a.f) void
   public void method_392(GameModel var1) {
      this.field_915 = var1.field_915;
      this.field_916 = var1.field_916;
      this.field_917 = var1.field_917;
      this.field_912 = var1.field_912;
      this.field_913 = var1.field_913;
      this.field_914 = var1.field_914;
      this.method_379();
      this.transformState = 1;
   }

   // $FF: renamed from: a (byte[]) int
   public int method_393(byte[] var1) {
      if(Surface.field_759) {
         ++this.field_935;
      }

      while(var1[this.field_935] == 10 || var1[this.field_935] == 13) {
         ++this.field_935;
      }

      int var2 = field_894[var1[this.field_935++] & 255];
      int var3 = field_894[var1[this.field_935++] & 255];
      int var4 = field_894[var1[this.field_935++] & 255];
      int var5 = var2 * 4096 + var3 * 64 + var4 - 131072;
      if(var5 == 123456) {
         var5 = this.field_896;
      }

      return var5;
   }

   // $FF: renamed from: <clinit> () void
   static {
      field_891 = new int[512];
      field_892 = new int[2048];
      field_893 = new byte[64];
      field_894 = new int[256];

      for(int var0 = 0; var0 < 256; ++var0) {
         field_891[var0] = (int)(Math.sin((double)var0 * 0.02454369D) * 32768.0D);
         field_891[var0 + 256] = (int)(Math.cos((double)var0 * 0.02454369D) * 32768.0D);
      }

      for(int var1 = 0; var1 < 1024; ++var1) {
         field_892[var1] = (int)(Math.sin((double)var1 * 0.00613592315D) * 32768.0D);
         field_892[var1 + 1024] = (int)(Math.cos((double)var1 * 0.00613592315D) * 32768.0D);
      }

      for(int var2 = 0; var2 < 10; ++var2) {
         field_893[var2] = (byte)(48 + var2);
      }

      for(int var3 = 0; var3 < 26; ++var3) {
         field_893[var3 + 10] = (byte)(65 + var3);
      }

      for(int var4 = 0; var4 < 26; ++var4) {
         field_893[var4 + 36] = (byte)(97 + var4);
      }

      field_893[62] = -93;
      field_893[63] = 36;

      for(int var5 = 0; var5 < 10; field_894[48 + var5] = var5++) {
         ;
      }

      for(int var6 = 0; var6 < 26; ++var6) {
         field_894[65 + var6] = var6 + 10;
      }

      for(int var7 = 0; var7 < 26; ++var7) {
         field_894[97 + var7] = var7 + 36;
      }

      field_894[163] = 62;
      field_894[36] = 63;
   }
}
