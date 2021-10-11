package mudclient;

public class GameModel {
   public int jg;
   public int[] kg;
   public int[] lg;
   public int[] mg;
   public int[] ng;
   public int[] og;
   public int[] pg;
   public byte[] qg;
   public int rg;
   public int[] sg;
   public int[][] tg;
   public int[] ug;
   public int[] vg;
   public int[] wg;
   public int[] xg;
   public int[] yg;
   public int[] zg;
   public int[] ah;
   public int[] bh;
   public int ch;
   public int dh;
   public int eh = 1;
   public boolean fh = true;
   public int gh;
   public int hh;
   public int ih;
   public int jh;
   public int kh;
   public int lh;
   public boolean mh = true;
   public boolean nh = false;
   public boolean oh = false;
   public int key = -1;
   public int[] faceTag;
   public byte[] rh;
   private boolean sh = false;
   public boolean th = false;
   public boolean uh = false;
   public boolean vh = false;
   public boolean wh = false;
   private static int[] xh = new int[512];
   private static int[] yh = new int[2048];
   private static byte[] zh = new byte[64];
   private static int[] ai = new int[256];
   private int bi = 4;
   private int ci = 12345678;
   public int di;
   public int[] ei;
   public int[] fi;
   public int[] gi;
   public int[] hi;
   public int[] ii;
   public int[] ji;
   private int ki;
   private int[][] li;
   private int[] mi;
   private int[] ni;
   private int[] oi;
   private int[] pi;
   private int[] qi;
   private int[] ri;
   private int si;
   private int ti;
   private int ui;
   private int vi;
   private int wi;
   private int xi;
   private int yi;
   private int zi;
   private int aj;
   private int bj;
   private int cj;
   private int dj;
   private int ej;
   private int fj;
   private int gj;
   private int hj;
   private int ij = 12345678;
   private int jj = 180;
   private int kj = 155;
   private int lj = 95;
   private int mj = 256;
   protected int nj = 512;
   protected int oj = 32;
   private byte[] pj;
   private int qj;
   private int rj;

   public GameModel(int var1, int var2) {
      this.td(var1, var2);
      this.li = new int[var2][1];

      for(int var3 = 0; var3 < var2; this.li[var3][0] = var3++) {
         ;
      }

   }

   public GameModel(int var1, int var2, boolean var3, boolean var4, boolean var5, boolean var6, boolean var7) {
      this.sh = var3;
      this.th = var4;
      this.uh = var5;
      this.vh = var6;
      this.wh = var7;
      this.td(var1, var2);
   }

   private void td(int var1, int var2) {
      this.ei = new int[var1];
      this.fi = new int[var1];
      this.gi = new int[var1];
      this.pg = new int[var1];
      this.qg = new byte[var1];
      this.sg = new int[var2];
      this.tg = new int[var2][];
      this.ug = new int[var2];
      this.vg = new int[var2];
      this.yg = new int[var2];
      this.xg = new int[var2];
      this.wg = new int[var2];
      if(!this.wh) {
         this.kg = new int[var1];
         this.lg = new int[var1];
         this.mg = new int[var1];
         this.ng = new int[var1];
         this.og = new int[var1];
      }

      if(!this.vh) {
         this.rh = new byte[var2];
         this.faceTag = new int[var2];
      }

      if(this.sh) {
         this.hi = this.ei;
         this.ii = this.fi;
         this.ji = this.gi;
      } else {
         this.hi = new int[var1];
         this.ii = new int[var1];
         this.ji = new int[var1];
      }

      if(!this.uh || !this.th) {
         this.zg = new int[var2];
         this.ah = new int[var2];
         this.bh = new int[var2];
      }

      if(!this.th) {
         this.mi = new int[var2];
         this.ni = new int[var2];
         this.oi = new int[var2];
         this.pi = new int[var2];
         this.qi = new int[var2];
         this.ri = new int[var2];
      }

      this.rg = 0;
      this.jg = 0;
      this.di = var1;
      this.ki = var2;
      this.si = this.ti = this.ui = 0;
      this.vi = this.wi = this.xi = 0;
      this.yi = this.zi = this.aj = 256;
      this.bj = this.cj = this.dj = this.ej = this.fj = this.gj = 256;
      this.hj = 0;
   }

   public void oe() {
      this.kg = new int[this.jg];
      this.lg = new int[this.jg];
      this.mg = new int[this.jg];
      this.ng = new int[this.jg];
      this.og = new int[this.jg];
   }

   public void re() {
      this.rg = 0;
      this.jg = 0;
   }

   public void ge(int var1, int var2) {
      this.rg -= var1;
      if(this.rg < 0) {
         this.rg = 0;
      }

      this.jg -= var2;
      if(this.jg < 0) {
         this.jg = 0;
      }

   }

   public GameModel(byte[] var1, int var2) {
      this.pj = var1;
      this.qj = var2;
      this.rj = 0;
      this.me(this.pj);
      int var3 = this.me(this.pj);
      int var4 = this.me(this.pj);
      boolean var12 = false;
      this.td(var3, var4);
      this.li = new int[var4][];

      for(int var13 = 0; var13 < var3; ++var13) {
         int var5 = this.me(this.pj);
         int var6 = this.me(this.pj);
         int var7 = this.me(this.pj);
         this.je(var5, var6, var7);
      }

      for(int var14 = 0; var14 < var4; ++var14) {
         int var8 = this.me(this.pj);
         int var9 = this.me(this.pj);
         int var10 = this.me(this.pj);
         int var11 = this.me(this.pj);
         this.nj = this.me(this.pj);
         this.oj = this.me(this.pj);
         int var20 = this.me(this.pj);
         int[] var15 = new int[var8];

         for(int var16 = 0; var16 < var8; ++var16) {
            var15[var16] = this.me(this.pj);
         }

         int[] var17 = new int[var11];

         for(int var18 = 0; var18 < var11; ++var18) {
            var17[var18] = this.me(this.pj);
         }

         int var19 = this.createFace(var8, var15, var9, var10);
         this.li[var14] = var17;
         if(var20 == 0) {
            this.yg[var19] = 0;
         } else {
            this.yg[var19] = this.ci;
         }
      }

      this.eh = 1;
   }

   public GameModel(GameModel[] var1, int var2) {
      this.be(var1, var2, true);
   }

   public void be(GameModel[] var1, int var2, boolean var3) {
      int var4 = 0;
      int var5 = 0;

      for(int var6 = 0; var6 < var2; ++var6) {
         var4 += var1[var6].rg;
         var5 += var1[var6].jg;
      }

      this.td(var5, var4);
      if(var3) {
         this.li = new int[var4][];
      }

      for(int var7 = 0; var7 < var2; ++var7) {
         GameModel var8 = var1[var7];
         var8.ee();
         this.oj = var8.oj;
         this.nj = var8.nj;
         this.jj = var8.jj;
         this.kj = var8.kj;
         this.lj = var8.lj;
         this.mj = var8.mj;

         for(int var9 = 0; var9 < var8.rg; ++var9) {
            int[] var10 = new int[var8.sg[var9]];
            int[] var11 = var8.tg[var9];

            for(int var12 = 0; var12 < var8.sg[var9]; ++var12) {
               var10[var12] = this.je(var8.ei[var11[var12]], var8.fi[var11[var12]], var8.gi[var11[var12]]);
            }

            int var13 = this.createFace(var8.sg[var9], var10, var8.ug[var9], var8.vg[var9]);
            this.yg[var13] = var8.yg[var9];
            this.xg[var13] = var8.xg[var9];
            this.wg[var13] = var8.wg[var9];
            if(var3) {
               int var14;
               if(var2 > 1) {
                  this.li[var13] = new int[var8.li[var9].length + 1];
                  this.li[var13][0] = var7;

                  for(var14 = 0; var14 < var8.li[var9].length; ++var14) {
                     this.li[var13][var14 + 1] = var8.li[var9][var14];
                  }
               } else {
                  this.li[var13] = new int[var8.li[var9].length];

                  for(var14 = 0; var14 < var8.li[var9].length; ++var14) {
                     this.li[var13][var14] = var8.li[var9][var14];
                  }
               }
            }
         }
      }

      this.eh = 1;
   }

   public int je(int var1, int var2, int var3) {
      for(int var4 = 0; var4 < this.jg; ++var4) {
         if(this.ei[var4] == var1 && this.fi[var4] == var2 && this.gi[var4] == var3) {
            return var4;
         }
      }

      if(this.jg >= this.di) {
         return -1;
      } else {
         this.ei[this.jg] = var1;
         this.fi[this.jg] = var2;
         this.gi[this.jg] = var3;
         return this.jg++;
      }
   }

   public int zd(int var1, int var2, int var3) {
      if(this.jg >= this.di) {
         return -1;
      } else {
         this.ei[this.jg] = var1;
         this.fi[this.jg] = var2;
         this.gi[this.jg] = var3;
         return this.jg++;
      }
   }

   public int createFace(int var1, int[] var2, int var3, int var4) {
      if(this.rg >= this.ki) {
         return -1;
      } else {
         this.sg[this.rg] = var1;
         this.tg[this.rg] = var2;
         this.ug[this.rg] = var3;
         this.vg[this.rg] = var4;
         this.eh = 1;
         return this.rg++;
      }
   }

   public GameModel[] rd(int var1, int var2, int var3, int var4, int var5, int var6, int var7, boolean var8) {
      this.ee();
      int[] var9 = new int[var6];
      int[] var10 = new int[var6];

      for(int var11 = 0; var11 < var6; ++var11) {
         var9[var11] = 0;
         var10[var11] = 0;
      }

      int var14;
      int var15;
      int var17;
      int var18;
      for(int var12 = 0; var12 < this.rg; ++var12) {
         int var13 = 0;
         var14 = 0;
         var15 = this.sg[var12];
         int[] var16 = this.tg[var12];

         for(var17 = 0; var17 < var15; ++var17) {
            var13 += this.ei[var16[var17]];
            var14 += this.gi[var16[var17]];
         }

         var18 = var13 / (var15 * var3) + var14 / (var15 * var4) * var5;
         var9[var18] += var15;
         ++var10[var18];
      }

      GameModel[] var22 = new GameModel[var6];

      for(var14 = 0; var14 < var6; ++var14) {
         if(var9[var14] > var7) {
            var9[var14] = var7;
         }

         var22[var14] = new GameModel(var9[var14], var10[var14], true, true, true, var8, true);
         var22[var14].nj = this.nj;
         var22[var14].oj = this.oj;
      }

      int var23;
      for(var15 = 0; var15 < this.rg; ++var15) {
         var23 = 0;
         var17 = 0;
         var18 = this.sg[var15];
         int[] var19 = this.tg[var15];

         for(int var20 = 0; var20 < var18; ++var20) {
            var23 += this.ei[var19[var20]];
            var17 += this.gi[var19[var20]];
         }

         int var21 = var23 / (var18 * var3) + var17 / (var18 * var4) * var5;
         this.te(var22[var21], var19, var18, var15);
      }

      for(var23 = 0; var23 < var6; ++var23) {
         var22[var23].oe();
      }

      return var22;
   }

   public void te(GameModel var1, int[] var2, int var3, int var4) {
      int[] var5 = new int[var3];

      int var7;
      for(int var6 = 0; var6 < var3; ++var6) {
         var7 = var5[var6] = var1.je(this.ei[var2[var6]], this.fi[var2[var6]], this.gi[var2[var6]]);
         var1.pg[var7] = this.pg[var2[var6]];
         var1.qg[var7] = this.qg[var2[var6]];
      }

      var7 = var1.createFace(var3, var5, this.ug[var4], this.vg[var4]);
      if(!var1.vh && !this.vh) {
         var1.faceTag[var7] = this.faceTag[var4];
      }

      var1.yg[var7] = this.yg[var4];
      var1.xg[var7] = this.xg[var4];
      var1.wg[var7] = this.wg[var4];
   }

   public void setLight(boolean var1, int var2, int var3, int var4, int var5, int var6) {
      this.oj = 256 - var2 * 4;
      this.nj = (64 - var3) * 16 + 128;
      if(!this.uh) {
         for(int var7 = 0; var7 < this.rg; ++var7) {
            if(var1) {
               this.yg[var7] = this.ci;
            } else {
               this.yg[var7] = 0;
            }
         }

         this.jj = var4;
         this.kj = var5;
         this.lj = var6;
         this.mj = (int)Math.sqrt((double)(var4 * var4 + var5 * var5 + var6 * var6));
         this.he();
      }
   }

   public void se(int var1, int var2, int var3) {
      if(!this.uh) {
         this.jj = var1;
         this.kj = var2;
         this.lj = var3;
         this.mj = (int)Math.sqrt((double)(var1 * var1 + var2 * var2 + var3 * var3));
         this.he();
      }
   }

   public void ud(int var1, int var2) {
      this.qg[var1] = (byte)var2;
   }

   public void pe(int var1, int var2, int var3) {
      this.vi = this.vi + var1 & 255;
      this.wi = this.wi + var2 & 255;
      this.xi = this.xi + var3 & 255;
      this.qe();
      this.eh = 1;
   }

   public void translate(int var1, int var2, int var3) {
      this.si += var1;
      this.ti += var2;
      this.ui += var3;
      this.qe();
      this.eh = 1;
   }

   public void ce(int var1, int var2, int var3) {
      this.si = var1;
      this.ti = var2;
      this.ui = var3;
      this.qe();
      this.eh = 1;
   }

   public int ue() {
      return this.si;
   }

   public void sd(int var1, int var2, int var3) {
      this.yi = var1;
      this.zi = var2;
      this.aj = var3;
      this.qe();
      this.eh = 1;
   }

   public void xd(int var1, int var2, int var3, int var4, int var5, int var6) {
      this.bj = var1;
      this.cj = var2;
      this.dj = var3;
      this.ej = var4;
      this.fj = var5;
      this.gj = var6;
      this.qe();
      this.eh = 1;
   }

   private void qe() {
      if(this.bj == 256 && this.cj == 256 && this.dj == 256 && this.ej == 256 && this.fj == 256 && this.gj == 256) {
         if(this.yi == 256 && this.zi == 256 && this.aj == 256) {
            if(this.vi == 0 && this.wi == 0 && this.xi == 0) {
               if(this.si == 0 && this.ti == 0 && this.ui == 0) {
                  this.hj = 0;
               } else {
                  this.hj = 1;
               }
            } else {
               this.hj = 2;
            }
         } else {
            this.hj = 3;
         }
      } else {
         this.hj = 4;
      }
   }

   private void ve(int var1, int var2, int var3) {
      for(int var4 = 0; var4 < this.jg; ++var4) {
         this.hi[var4] += var1;
         this.ii[var4] += var2;
         this.ji[var4] += var3;
      }

   }

   private void ae(int var1, int var2, int var3) {
      for(int var7 = 0; var7 < this.jg; ++var7) {
         int var4;
         int var5;
         int var6;
         if(var3 != 0) {
            var4 = xh[var3];
            var5 = xh[var3 + 256];
            var6 = this.ii[var7] * var4 + this.hi[var7] * var5 >> 15;
            this.ii[var7] = this.ii[var7] * var5 - this.hi[var7] * var4 >> 15;
            this.hi[var7] = var6;
         }

         if(var1 != 0) {
            var4 = xh[var1];
            var5 = xh[var1 + 256];
            var6 = this.ii[var7] * var5 - this.ji[var7] * var4 >> 15;
            this.ji[var7] = this.ii[var7] * var4 + this.ji[var7] * var5 >> 15;
            this.ii[var7] = var6;
         }

         if(var2 != 0) {
            var4 = xh[var2];
            var5 = xh[var2 + 256];
            var6 = this.ji[var7] * var4 + this.hi[var7] * var5 >> 15;
            this.ji[var7] = this.ji[var7] * var5 - this.hi[var7] * var4 >> 15;
            this.hi[var7] = var6;
         }
      }

   }

   private void yd(int var1, int var2, int var3, int var4, int var5, int var6) {
      for(int var7 = 0; var7 < this.jg; ++var7) {
         if(var1 != 0) {
            this.hi[var7] += this.ii[var7] * var1 >> 8;
         }

         if(var2 != 0) {
            this.ji[var7] += this.ii[var7] * var2 >> 8;
         }

         if(var3 != 0) {
            this.hi[var7] += this.ji[var7] * var3 >> 8;
         }

         if(var4 != 0) {
            this.ii[var7] += this.ji[var7] * var4 >> 8;
         }

         if(var5 != 0) {
            this.ji[var7] += this.hi[var7] * var5 >> 8;
         }

         if(var6 != 0) {
            this.ii[var7] += this.hi[var7] * var6 >> 8;
         }
      }

   }

   private void fe(int var1, int var2, int var3) {
      for(int var4 = 0; var4 < this.jg; ++var4) {
         this.hi[var4] = this.hi[var4] * var1 >> 8;
         this.ii[var4] = this.ii[var4] * var2 >> 8;
         this.ji[var4] = this.ji[var4] * var3 >> 8;
      }

   }

   private void qd() {
      this.gh = this.ih = this.kh = 999999;
      this.ij = this.hh = this.jh = this.lh = -999999;

      for(int var2 = 0; var2 < this.rg; ++var2) {
         int[] var1 = this.tg[var2];
         int var4 = var1[0];
         int var5 = this.sg[var2];
         int var6;
         int var7 = var6 = this.hi[var4];
         int var8;
         int var9 = var8 = this.ii[var4];
         int var10;
         int var11 = var10 = this.ji[var4];

         for(int var3 = 0; var3 < var5; ++var3) {
            var4 = var1[var3];
            if(this.hi[var4] < var6) {
               var6 = this.hi[var4];
            } else if(this.hi[var4] > var7) {
               var7 = this.hi[var4];
            }

            if(this.ii[var4] < var8) {
               var8 = this.ii[var4];
            } else if(this.ii[var4] > var9) {
               var9 = this.ii[var4];
            }

            if(this.ji[var4] < var10) {
               var10 = this.ji[var4];
            } else if(this.ji[var4] > var11) {
               var11 = this.ji[var4];
            }
         }

         if(!this.th) {
            this.mi[var2] = var6;
            this.ni[var2] = var7;
            this.oi[var2] = var8;
            this.pi[var2] = var9;
            this.qi[var2] = var10;
            this.ri[var2] = var11;
         }

         if(var7 - var6 > this.ij) {
            this.ij = var7 - var6;
         }

         if(var9 - var8 > this.ij) {
            this.ij = var9 - var8;
         }

         if(var11 - var10 > this.ij) {
            this.ij = var11 - var10;
         }

         if(var6 < this.gh) {
            this.gh = var6;
         }

         if(var7 > this.hh) {
            this.hh = var7;
         }

         if(var8 < this.ih) {
            this.ih = var8;
         }

         if(var9 > this.jh) {
            this.jh = var9;
         }

         if(var10 < this.kh) {
            this.kh = var10;
         }

         if(var11 > this.lh) {
            this.lh = var11;
         }
      }

   }

   public void he() {
      if(!this.uh) {
         int var1 = this.nj * this.mj >> 8;

         for(int var2 = 0; var2 < this.rg; ++var2) {
            if(this.yg[var2] != this.ci) {
               this.yg[var2] = (this.zg[var2] * this.jj + this.ah[var2] * this.kj + this.bh[var2] * this.lj) / var1;
            }
         }

         int[] var3 = new int[this.jg];
         int[] var4 = new int[this.jg];
         int[] var5 = new int[this.jg];
         int[] var6 = new int[this.jg];

         for(int var7 = 0; var7 < this.jg; ++var7) {
            var3[var7] = 0;
            var4[var7] = 0;
            var5[var7] = 0;
            var6[var7] = 0;
         }

         int var9;
         for(int var8 = 0; var8 < this.rg; ++var8) {
            if(this.yg[var8] == this.ci) {
               for(var9 = 0; var9 < this.sg[var8]; ++var9) {
                  int var10 = this.tg[var8][var9];
                  var3[var10] += this.zg[var8];
                  var4[var10] += this.ah[var8];
                  var5[var10] += this.bh[var8];
                  ++var6[var10];
               }
            }
         }

         for(var9 = 0; var9 < this.jg; ++var9) {
            if(var6[var9] > 0) {
               this.pg[var9] = (var3[var9] * this.jj + var4[var9] * this.kj + var5[var9] * this.lj) / (var1 * var6[var9]);
            }
         }

      }
   }

   public void ke() {
      if(!this.uh || !this.th) {
         for(int var1 = 0; var1 < this.rg; ++var1) {
            int[] var2 = this.tg[var1];
            int var3 = this.hi[var2[0]];
            int var4 = this.ii[var2[0]];
            int var5 = this.ji[var2[0]];
            int var6 = this.hi[var2[1]] - var3;
            int var7 = this.ii[var2[1]] - var4;
            int var8 = this.ji[var2[1]] - var5;
            int var9 = this.hi[var2[2]] - var3;
            int var10 = this.ii[var2[2]] - var4;
            int var11 = this.ji[var2[2]] - var5;
            int var12 = var7 * var11 - var10 * var8;
            int var13 = var8 * var9 - var11 * var6;

            int var14;
            for(var14 = var6 * var10 - var9 * var7; var12 > 8192 || var13 > 8192 || var14 > 8192 || var12 < -8192 || var13 < -8192 || var14 < -8192; var14 >>= 1) {
               var12 >>= 1;
               var13 >>= 1;
            }

            int var15 = (int)(256.0D * Math.sqrt((double)(var12 * var12 + var13 * var13 + var14 * var14)));
            if(var15 <= 0) {
               var15 = 1;
            }

            this.zg[var1] = var12 * 65536 / var15;
            this.ah[var1] = var13 * 65536 / var15;
            this.bh[var1] = var14 * '\uffff' / var15;
            this.xg[var1] = -1;
         }

         this.he();
      }
   }

   public void pd() {
      int var1;
      if(this.eh == 2) {
         this.eh = 0;

         for(var1 = 0; var1 < this.jg; ++var1) {
            this.hi[var1] = this.ei[var1];
            this.ii[var1] = this.fi[var1];
            this.ji[var1] = this.gi[var1];
         }

         this.gh = this.ih = this.kh = -9999999;
         this.ij = this.hh = this.jh = this.lh = 9999999;
      } else {
         if(this.eh == 1) {
            this.eh = 0;

            for(var1 = 0; var1 < this.jg; ++var1) {
               this.hi[var1] = this.ei[var1];
               this.ii[var1] = this.fi[var1];
               this.ji[var1] = this.gi[var1];
            }

            if(this.hj >= 2) {
               this.ae(this.vi, this.wi, this.xi);
            }

            if(this.hj >= 3) {
               this.fe(this.yi, this.zi, this.aj);
            }

            if(this.hj >= 4) {
               this.yd(this.bj, this.cj, this.dj, this.ej, this.fj, this.gj);
            }

            if(this.hj >= 1) {
               this.ve(this.si, this.ti, this.ui);
            }

            this.qd();
            this.ke();
         }

      }
   }

   public void de(int var1, int var2, int var3, int var4, int var5, int var6, int var7, int var8) {
      this.pd();
      if(this.kh <= Scene.ep && this.lh >= Scene.dp && this.gh <= Scene.ap && this.hh >= Scene.zo && this.ih <= Scene.cp && this.jh >= Scene.bp) {
         this.fh = true;
         int var10 = 0;
         int var11 = 0;
         int var12 = 0;
         int var13 = 0;
         int var14 = 0;
         int var15 = 0;
         if(var6 != 0) {
            var10 = yh[var6];
            var11 = yh[var6 + 1024];
         }

         if(var5 != 0) {
            var14 = yh[var5];
            var15 = yh[var5 + 1024];
         }

         if(var4 != 0) {
            var12 = yh[var4];
            var13 = yh[var4 + 1024];
         }

         for(int var16 = 0; var16 < this.jg; ++var16) {
            int var17 = this.hi[var16] - var1;
            int var18 = this.ii[var16] - var2;
            int var19 = this.ji[var16] - var3;
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

            if(var19 >= var8) {
               this.ng[var16] = (var17 << var7) / var19;
            } else {
               this.ng[var16] = var17 << var7;
            }

            if(var19 >= var8) {
               this.og[var16] = (var18 << var7) / var19;
            } else {
               this.og[var16] = var18 << var7;
            }

            this.kg[var16] = var17;
            this.lg[var16] = var18;
            this.mg[var16] = var19;
         }

      } else {
         this.fh = false;
      }
   }

   public void ee() {
      this.pd();

      for(int var1 = 0; var1 < this.jg; ++var1) {
         this.ei[var1] = this.hi[var1];
         this.fi[var1] = this.ii[var1];
         this.gi[var1] = this.ji[var1];
      }

      this.si = this.ti = this.ui = 0;
      this.vi = this.wi = this.xi = 0;
      this.yi = this.zi = this.aj = 256;
      this.bj = this.cj = this.dj = this.ej = this.fj = this.gj = 256;
      this.hj = 0;
   }

   public GameModel copy() {
      GameModel[] var1 = new GameModel[]{this};
      GameModel var2 = new GameModel(var1, 1);
      var2.dh = this.dh;
      return var2;
   }

   public void copyPosition(GameModel var1) {
      this.vi = var1.vi;
      this.wi = var1.wi;
      this.xi = var1.xi;
      this.si = var1.si;
      this.ti = var1.ti;
      this.ui = var1.ui;
      this.qe();
      this.eh = 1;
   }

   public int me(byte[] var1) {
      while(var1[this.qj] == 10 || var1[this.qj] == 13) {
         ++this.qj;
      }

      int var2 = ai[var1[this.qj++] & 255];
      int var3 = ai[var1[this.qj++] & 255];
      int var4 = ai[var1[this.qj++] & 255];
      int var5 = var2 * 4096 + var3 * 64 + var4 - 131072;
      if(var5 == 123456) {
         var5 = this.ci;
      }

      return var5;
   }

   static {
      for(int var0 = 0; var0 < 256; ++var0) {
         xh[var0] = (int)(Math.sin((double)var0 * 0.02454369D) * 32768.0D);
         xh[var0 + 256] = (int)(Math.cos((double)var0 * 0.02454369D) * 32768.0D);
      }

      for(int var1 = 0; var1 < 1024; ++var1) {
         yh[var1] = (int)(Math.sin((double)var1 * 0.00613592315D) * 32768.0D);
         yh[var1 + 1024] = (int)(Math.cos((double)var1 * 0.00613592315D) * 32768.0D);
      }

      for(int var2 = 0; var2 < 10; ++var2) {
         zh[var2] = (byte)(48 + var2);
      }

      for(int var3 = 0; var3 < 26; ++var3) {
         zh[var3 + 10] = (byte)(65 + var3);
      }

      for(int var4 = 0; var4 < 26; ++var4) {
         zh[var4 + 36] = (byte)(97 + var4);
      }

      zh[62] = -93;
      zh[63] = 36;

      for(int var5 = 0; var5 < 10; ai[48 + var5] = var5++) {
         ;
      }

      for(int var6 = 0; var6 < 26; ++var6) {
         ai[65 + var6] = var6 + 10;
      }

      for(int var7 = 0; var7 < 26; ++var7) {
         ai[97 + var7] = var7 + 36;
      }

      ai[163] = 62;
      ai[36] = 63;
   }
}
