package mudclient;

import java.io.IOException;

public class Scene {
   int xl = 50;
   int[] yl;
   int[][] zl;
   int[] am;
   public int bm;
   public int cm;
   public int clipFar3D;
   public int clipFar2D;
   public int fogZFalloff;
   public int fogZDistance;
   public static int[] hm = new int[2048];
   private static int[] im = new int[512];
   public boolean jm;
   public double km;
   public int lm;
   private boolean mm;
   private int nm;
   private int om;
   private int pm;
   private int qm;
   private GameModel[] rm;
   private int[] sm;
   private int tm;
   private int um;
   private int vm;
   private int wm;
   private int xm;
   private int ym;
   private int zm;
   private int an;
   private int bn;
   private int cn;
   private int dn;
   private int en;
   private int fn;
   private int gn;
   private int hn;
   private GameModel[] in;
   private int[] jn;
   private int kn;
   private Polygon[] ln;
   private int mn;
   private int nn;
   private int[] on;
   private int[] pn;
   private int[] qn;
   private int[] rn;
   private int[] sn;
   private int[] tn;
   private int[] un;
   public GameModel currentModel;
   private static final int wn = 16;
   private static final int xn = 4;
   private static final int yn = 5;
   private static final int zn = 12345678;
   int ao;
   String[] bo;
   int[] co;
   int[] _do;
   long[] eo;
   boolean[] fo;
   int[][] go;
   private static long ho;
   byte[] io;
   int[][] jo;
   int[][] ko;
   private static byte[] lo;
   private static int[] mo = new int[256];
   Surface no;
   public int[] oo;
   Scanline[] po;
   int qo;
   int ro;
   int[] so;
   int[] to;
   int[] uo;
   int[] vo;
   int[] wo;
   int[] xo;
   boolean yo;
   static int zo;
   static int ap;
   static int bp;
   static int cp;
   static int dp;
   static int ep;
   int fp;
   int gp;

   public Scene(Surface var1, int var2, int var3, int var4) {
      this.yl = new int[this.xl];
      this.zl = new int[this.xl][256];
      this.cm = 5;
      this.clipFar3D = 1000;
      this.clipFar2D = 1000;
      this.fogZFalloff = 20;
      this.fogZDistance = 10;
      this.jm = false;
      this.km = 1.1D;
      this.lm = 1;
      this.mm = false;
      this.qm = 100;
      this.rm = new GameModel[this.qm];
      this.sm = new int[this.qm];
      this.tm = 512;
      this.um = 256;
      this.vm = 192;
      this.wm = 256;
      this.xm = 256;
      this.ym = 8;
      this.zm = 4;
      this.so = new int[40];
      this.to = new int[40];
      this.uo = new int[40];
      this.vo = new int[40];
      this.wo = new int[40];
      this.xo = new int[40];
      this.yo = false;
      this.no = var1;
      this.um = var1.width2 / 2;
      this.vm = var1.tj / 2;
      this.oo = var1.pixels;
      this.gn = 0;
      this.hn = var2;
      this.in = new GameModel[this.hn];
      this.jn = new int[this.hn];
      this.kn = 0;
      this.ln = new Polygon[var3];

      for(int var5 = 0; var5 < var3; ++var5) {
         this.ln[var5] = new Polygon();
      }

      this.nn = 0;
      this.currentModel = new GameModel(var4 * 2, var4);
      this.on = new int[var4];
      this.sn = new int[var4];
      this.tn = new int[var4];
      this.pn = new int[var4];
      this.qn = new int[var4];
      this.rn = new int[var4];
      this.un = new int[var4];
      if(lo == null) {
         lo = new byte[17691];
      }

      this.an = 0;
      this.bn = 0;
      this.cn = 0;
      this.dn = 0;
      this.en = 0;
      this.fn = 0;

      for(int var6 = 0; var6 < 256; ++var6) {
         im[var6] = (int)(Math.sin((double)var6 * 0.02454369D) * 32768.0D);
         im[var6 + 256] = (int)(Math.cos((double)var6 * 0.02454369D) * 32768.0D);
      }

      for(int var7 = 0; var7 < 1024; ++var7) {
         hm[var7] = (int)(Math.sin((double)var7 * 0.00613592315D) * 32768.0D);
         hm[var7 + 1024] = (int)(Math.cos((double)var7 * 0.00613592315D) * 32768.0D);
      }

   }

   public void addModel(GameModel var1) {
      if(this.gn < this.hn) {
         this.jn[this.gn] = 0;
         this.in[this.gn++] = var1;
      }

   }

   public void freeModel(GameModel var1) {
      for(int var2 = 0; var2 < this.gn; ++var2) {
         if(this.in[var2] == var1) {
            --this.gn;

            for(int var3 = var2; var3 < this.gn; ++var3) {
               this.in[var3] = this.in[var3 + 1];
               this.jn[var3] = this.jn[var3 + 1];
            }
         }
      }

   }

   public void clear() {
      this.vh();

      for(int var1 = 0; var1 < this.gn; ++var1) {
         this.in[var1] = null;
      }

      this.gn = 0;
   }

   public void vh() {
      this.nn = 0;
      this.currentModel.re();
   }

   public void reduceSprites(int var1) {
      this.nn -= var1;
      this.currentModel.ge(var1, var1 * 2);
      if(this.nn < 0) {
         this.nn = 0;
      }

   }

   public int si(int var1, int var2, int var3, int var4, int var5, int var6) {
      this.on[this.nn] = var1;
      this.pn[this.nn] = var2;
      this.qn[this.nn] = var3;
      this.rn[this.nn] = var4;
      this.sn[this.nn] = var5;
      this.tn[this.nn] = var6;
      this.un[this.nn] = 0;
      int var7 = this.currentModel.zd(var2, var3, var4);
      int var8 = this.currentModel.zd(var2, var3 - var6, var4);
      int[] var9 = new int[]{var7, var8};
      this.currentModel.createFace(2, var9, 0, 0);
      this.currentModel.rh[this.nn++] = 0;
      return this.nn - 1;
   }

   public int drawSprite(int var1, int var2, int var3, int var4, int var5, int var6, int var7) {
      this.on[this.nn] = var1;
      this.pn[this.nn] = var2;
      this.qn[this.nn] = var3;
      this.rn[this.nn] = var4;
      this.sn[this.nn] = var5;
      this.tn[this.nn] = var6;
      this.un[this.nn] = 0;
      int var8 = this.currentModel.zd(var2, var3, var4);
      int var9 = this.currentModel.zd(var2, var3 - var6, var4);
      int[] var10 = new int[]{var8, var9};
      this.currentModel.createFace(2, var10, 0, 0);
      this.currentModel.faceTag[this.nn] = var7;
      this.currentModel.rh[this.nn++] = 0;
      return this.nn - 1;
   }

   public void setFaceSpriteLocalPlayer(int var1) {
      this.currentModel.rh[var1] = 1;
   }

   public void setCombatXOffset(int var1, int var2) {
      this.un[var1] = var2;
   }

   public void ph(int var1, int var2) {
      this.nm = var1 - this.wm;
      this.om = var2;
      this.pm = 0;
      this.mm = true;
   }

   public int getModelsUnderMouseCount() {
      return this.pm;
   }

   public int[] getPlayersUnderMouse() {
      return this.sm;
   }

   public GameModel[] getModelsUnderMouse() {
      return this.rm;
   }

   public void setMidpoints(int var1, int var2, int var3, int var4, int var5, int var6) {
      this.um = var3;
      this.vm = var4;
      this.wm = var1;
      this.xm = var2;
      this.tm = var5;
      this.ym = var6;
      this.po = new Scanline[var4 + var2];

      for(int var7 = 0; var7 < var4 + var2; ++var7) {
         this.po[var7] = new Scanline();
      }

   }

   private void kh(Polygon[] var1, int var2, int var3) {
      if(var2 < var3) {
         int var4 = var2 - 1;
         int var5 = var3 + 1;
         int var6 = (var2 + var3) / 2;
         Polygon var7 = var1[var6];
         var1[var6] = var1[var2];
         var1[var2] = var7;
         int var8 = var7.jfb;

         while(var4 < var5) {
            do {
               --var5;
            } while(var1[var5].jfb < var8);

            do {
               ++var4;
            } while(var1[var4].jfb > var8);

            if(var4 < var5) {
               Polygon var9 = var1[var4];
               var1[var4] = var1[var5];
               var1[var5] = var9;
            }
         }

         this.kh(var1, var2, var5);
         this.kh(var1, var5 + 1, var3);
      }

   }

   public void bh(int var1, Polygon[] var2, int var3) {
      for(int var4 = 0; var4 <= var3; ++var4) {
         var2[var4].pfb = false;
         var2[var4].qfb = var4;
         var2[var4].rfb = -1;
      }

      int var5 = 0;

      while(true) {
         while(var2[var5].pfb) {
            ++var5;
         }

         if(var5 == var3) {
            return;
         }

         Polygon var6 = var2[var5];
         var6.pfb = true;
         int var7 = var5;
         int var8 = var5 + var1;
         if(var8 >= var3) {
            var8 = var3 - 1;
         }

         for(int var9 = var8; var9 >= var7 + 1; --var9) {
            Polygon var10 = var2[var9];
            if(var6.bfb < var10.dfb && var10.bfb < var6.dfb && var6.cfb < var10.efb && var10.cfb < var6.efb && var6.qfb != var10.rfb && !this.ch(var6, var10) && this.ah(var10, var6)) {
               this.pi(var2, var7, var9);
               if(var2[var9] != var10) {
                  ++var9;
               }

               var7 = this.fp;
               var10.rfb = var6.qfb;
            }
         }
      }
   }

   public boolean pi(Polygon[] var1, int var2, int var3) {
      while(true) {
         Polygon var4 = var1[var2];

         Polygon var6;
         for(int var5 = var2 + 1; var5 <= var3; ++var5) {
            var6 = var1[var5];
            if(!this.ch(var6, var4)) {
               break;
            }

            var1[var2] = var6;
            var1[var5] = var4;
            var2 = var5;
            if(var5 == var3) {
               this.fp = var5;
               this.gp = var5 - 1;
               return true;
            }
         }

         var6 = var1[var3];

         for(int var7 = var3 - 1; var7 >= var2; --var7) {
            Polygon var8 = var1[var7];
            if(!this.ch(var6, var8)) {
               break;
            }

            var1[var3] = var8;
            var1[var7] = var6;
            var3 = var7;
            if(var2 == var7) {
               this.fp = var7 + 1;
               this.gp = var7;
               return true;
            }
         }

         if(var2 + 1 >= var3) {
            this.fp = var2;
            this.gp = var3;
            return false;
         }

         if(!this.pi(var1, var2 + 1, var3)) {
            this.fp = var2;
            return false;
         }

         var3 = this.gp;
      }
   }

   public void li(int var1, int var2, int var3) {
      int var4 = -this.dn + 1024 & 1023;
      int var5 = -this.en + 1024 & 1023;
      int var6 = -this.fn + 1024 & 1023;
      int var7;
      int var8;
      int var9;
      if(var6 != 0) {
         var7 = hm[var6];
         var8 = hm[var6 + 1024];
         var9 = var2 * var7 + var1 * var8 >> 15;
         var2 = var2 * var8 - var1 * var7 >> 15;
         var1 = var9;
      }

      if(var4 != 0) {
         var7 = hm[var4];
         var8 = hm[var4 + 1024];
         var9 = var2 * var8 - var3 * var7 >> 15;
         var3 = var2 * var7 + var3 * var8 >> 15;
         var2 = var9;
      }

      if(var5 != 0) {
         var7 = hm[var5];
         var8 = hm[var5 + 1024];
         var9 = var3 * var7 + var1 * var8 >> 15;
         var3 = var3 * var8 - var1 * var7 >> 15;
         var1 = var9;
      }

      if(var1 < zo) {
         zo = var1;
      }

      if(var1 > ap) {
         ap = var1;
      }

      if(var2 < bp) {
         bp = var2;
      }

      if(var2 > cp) {
         cp = var2;
      }

      if(var3 < dp) {
         dp = var3;
      }

      if(var3 > ep) {
         ep = var3;
      }

   }

   public void endScene() {
      this.yo = this.no.interlace;
      int var7 = this.um * this.clipFar3D >> this.ym;
      int var8 = this.vm * this.clipFar3D >> this.ym;
      zo = 0;
      ap = 0;
      bp = 0;
      cp = 0;
      dp = 0;
      ep = 0;
      this.li(-var7, -var8, this.clipFar3D);
      this.li(-var7, var8, this.clipFar3D);
      this.li(var7, -var8, this.clipFar3D);
      this.li(var7, var8, this.clipFar3D);
      this.li(-this.um, -this.vm, 0);
      this.li(-this.um, this.vm, 0);
      this.li(this.um, -this.vm, 0);
      this.li(this.um, this.vm, 0);
      zo += this.an;
      ap += this.an;
      bp += this.bn;
      cp += this.bn;
      dp += this.cn;
      ep += this.cn;
      this.in[this.gn] = this.currentModel;
      this.currentModel.eh = 2;

      int var2;
      for(var2 = 0; var2 < this.gn; ++var2) {
         this.in[var2].de(this.an, this.bn, this.cn, this.dn, this.en, this.fn, this.ym, this.cm);
      }

      this.in[this.gn].de(this.an, this.bn, this.cn, this.dn, this.en, this.fn, this.ym, this.cm);
      this.kn = 0;

      GameModel var1;
      int var5;
      int var10;
      int var12;
      int var13;
      int var14;
      int var16;
      int var17;
      for(int var9 = 0; var9 < this.gn; ++var9) {
         var1 = this.in[var9];
         if(var1.fh) {
            for(var2 = 0; var2 < var1.rg; ++var2) {
               var10 = var1.sg[var2];
               int[] var11 = var1.tg[var2];
               boolean var4 = false;

               int var3;
               for(var12 = 0; var12 < var10; ++var12) {
                  var3 = var1.mg[var11[var12]];
                  if(var3 > this.cm && var3 < this.clipFar3D) {
                     var4 = true;
                     break;
                  }
               }

               if(var4) {
                  int var23 = 0;

                  for(var13 = 0; var13 < var10; ++var13) {
                     var3 = var1.ng[var11[var13]];
                     if(var3 > -this.um) {
                        var23 |= 1;
                     }

                     if(var3 < this.um) {
                        var23 |= 2;
                     }

                     if(var23 == 3) {
                        break;
                     }
                  }

                  if(var23 == 3) {
                     var23 = 0;

                     for(var14 = 0; var14 < var10; ++var14) {
                        var3 = var1.og[var11[var14]];
                        if(var3 > -this.vm) {
                           var23 |= 1;
                        }

                        if(var3 < this.vm) {
                           var23 |= 2;
                        }

                        if(var23 == 3) {
                           break;
                        }
                     }

                     if(var23 == 3) {
                        Polygon var15 = this.ln[this.kn];
                        var15.hfb = var1;
                        var15.ifb = var2;
                        this.ri(this.kn);
                        if(var15.nfb < 0) {
                           var16 = var1.ug[var2];
                        } else {
                           var16 = var1.vg[var2];
                        }

                        if(var16 != 12345678) {
                           var5 = 0;

                           for(var17 = 0; var17 < var10; ++var17) {
                              var5 += var1.mg[var11[var17]];
                           }

                           var15.jfb = var5 / var10 + var1.dh;
                           var15.ofb = var16;
                           ++this.kn;
                        }
                     }
                  }
               }
            }
         }
      }

      var1 = this.currentModel;
      int var28;
      if(var1.fh) {
         for(var2 = 0; var2 < var1.rg; ++var2) {
            int[] var24 = var1.tg[var2];
            int var25 = var24[0];
            var12 = var1.ng[var25];
            var13 = var1.og[var25];
            var14 = var1.mg[var25];
            if(var14 > this.cm && var14 < this.clipFar2D) {
               var28 = (this.sn[var2] << this.ym) / var14;
               var16 = (this.tn[var2] << this.ym) / var14;
               if(var12 - var28 / 2 <= this.um && var12 + var28 / 2 >= -this.um && var13 - var16 <= this.vm && var13 >= -this.vm) {
                  Polygon var29 = this.ln[this.kn];
                  var29.hfb = var1;
                  var29.ifb = var2;
                  this.ti(this.kn);
                  var29.jfb = (var14 + var1.mg[var24[1]]) / 2;
                  ++this.kn;
               }
            }
         }
      }

      if(this.kn != 0) {
         this.bm = this.kn;
         this.kh(this.ln, 0, this.kn - 1);
         this.bh(100, this.ln, this.kn);

         for(var10 = 0; var10 < this.kn; ++var10) {
            Polygon var26 = this.ln[var10];
            var1 = var26.hfb;
            var2 = var26.ifb;
            int var18;
            int var20;
            int var21;
            if(var1 == this.currentModel) {
               int[] var27 = var1.tg[var2];
               var13 = var27[0];
               var14 = var1.ng[var13];
               var28 = var1.og[var13];
               var16 = var1.mg[var13];
               var17 = (this.sn[var2] << this.ym) / var16;
               var18 = (this.tn[var2] << this.ym) / var16;
               int var30 = var28 - var1.og[var27[1]];
               var20 = (var1.ng[var27[1]] - var14) * var30 / var18;
               var20 = var1.ng[var27[1]] - var14;
               var21 = var14 - var17 / 2;
               int var22 = this.xm + var28 - var18;
               this.no.spriteClipping(var21 + this.wm, var22, var17, var18, this.on[var2], var20, (256 << this.ym) / var16);
               if(this.mm && this.pm < this.qm) {
                  var21 += (this.un[var2] << this.ym) / var16;
                  if(this.om >= var22 && this.om <= var22 + var18 && this.nm >= var21 && this.nm <= var21 + var17 && !var1.vh && var1.rh[var2] == 0) {
                     this.rm[this.pm] = var1;
                     this.sm[this.pm] = var2;
                     ++this.pm;
                  }
               }
            } else {
               var28 = 0;
               var17 = 0;
               var18 = var1.sg[var2];
               int[] var19 = var1.tg[var2];
               if(var1.yg[var2] != 12345678) {
                  if(var26.nfb < 0) {
                     var17 = var1.oj - var1.yg[var2];
                  } else {
                     var17 = var1.oj + var1.yg[var2];
                  }
               }

               for(var20 = 0; var20 < var18; ++var20) {
                  var5 = var19[var20];
                  this.vo[var20] = var1.kg[var5];
                  this.wo[var20] = var1.lg[var5];
                  this.xo[var20] = var1.mg[var5];
                  if(var1.yg[var2] == 12345678) {
                     if(var26.nfb < 0) {
                        var17 = var1.oj - var1.pg[var5] + var1.qg[var5];
                     } else {
                        var17 = var1.oj + var1.pg[var5] + var1.qg[var5];
                     }
                  }

                  if(var1.mg[var5] >= this.cm) {
                     this.so[var28] = var1.ng[var5];
                     this.to[var28] = var1.og[var5];
                     this.uo[var28] = var17;
                     if(var1.mg[var5] > this.fogZDistance) {
                        this.uo[var28] += (var1.mg[var5] - this.fogZDistance) / this.fogZFalloff;
                     }

                     ++var28;
                  } else {
                     if(var20 == 0) {
                        var16 = var19[var18 - 1];
                     } else {
                        var16 = var19[var20 - 1];
                     }

                     if(var1.mg[var16] >= this.cm) {
                        var14 = var1.mg[var5] - var1.mg[var16];
                        var12 = var1.kg[var5] - (var1.kg[var5] - var1.kg[var16]) * (var1.mg[var5] - this.cm) / var14;
                        var13 = var1.lg[var5] - (var1.lg[var5] - var1.lg[var16]) * (var1.mg[var5] - this.cm) / var14;
                        this.so[var28] = (var12 << this.ym) / this.cm;
                        this.to[var28] = (var13 << this.ym) / this.cm;
                        this.uo[var28] = var17;
                        ++var28;
                     }

                     if(var20 == var18 - 1) {
                        var16 = var19[0];
                     } else {
                        var16 = var19[var20 + 1];
                     }

                     if(var1.mg[var16] >= this.cm) {
                        var14 = var1.mg[var5] - var1.mg[var16];
                        var12 = var1.kg[var5] - (var1.kg[var5] - var1.kg[var16]) * (var1.mg[var5] - this.cm) / var14;
                        var13 = var1.lg[var5] - (var1.lg[var5] - var1.lg[var16]) * (var1.mg[var5] - this.cm) / var14;
                        this.so[var28] = (var12 << this.ym) / this.cm;
                        this.to[var28] = (var13 << this.ym) / this.cm;
                        this.uo[var28] = var17;
                        ++var28;
                     }
                  }
               }

               for(var21 = 0; var21 < var18; ++var21) {
                  if(this.uo[var21] < 0) {
                     this.uo[var21] = 0;
                  } else if(this.uo[var21] > 255) {
                     this.uo[var21] = 255;
                  }

                  if(var26.ofb >= 0) {
                     if(this._do[var26.ofb] == 1) {
                        this.uo[var21] <<= 9;
                     } else {
                        this.uo[var21] <<= 6;
                     }
                  }
               }

               this.zg(0, 0, 0, 0, var28, this.so, this.to, this.uo, var1, var2);
               if(this.ro > this.qo) {
                  this.jh(0, 0, var18, this.vo, this.wo, this.xo, var26.ofb, var1);
               }
            }
         }

         this.mm = false;
      }
   }

   private void zg(int var1, int var2, int var3, int var4, int var5, int[] var6, int[] var7, int[] var8, GameModel var9, int var10) {
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
      Scanline var50;
      if(var5 == 3) {
         var11 = var7[0] + this.xm;
         var12 = var7[1] + this.xm;
         var13 = var7[2] + this.xm;
         var14 = var6[0];
         var15 = var6[1];
         var16 = var6[2];
         var17 = var8[0];
         var18 = var8[1];
         var19 = var8[2];
         var20 = this.xm + this.vm - 1;
         var21 = 0;
         var22 = 0;
         var23 = 0;
         var24 = 0;
         var25 = 12345678;
         var26 = -12345678;
         if(var13 != var11) {
            var22 = (var16 - var14 << 8) / (var13 - var11);
            var24 = (var19 - var17 << 8) / (var13 - var11);
            if(var11 < var13) {
               var21 = var14 << 8;
               var23 = var17 << 8;
               var25 = var11;
               var26 = var13;
            } else {
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
            var28 = (var15 - var14 << 8) / (var12 - var11);
            var30 = (var18 - var17 << 8) / (var12 - var11);
            if(var11 < var12) {
               var27 = var14 << 8;
               var29 = var17 << 8;
               var31 = var11;
               var32 = var12;
            } else {
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
            var34 = (var16 - var15 << 8) / (var13 - var12);
            var36 = (var19 - var18 << 8) / (var13 - var12);
            if(var12 < var13) {
               var33 = var15 << 8;
               var35 = var18 << 8;
               var37 = var12;
               var38 = var13;
            } else {
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

         this.qo = var25;
         if(var31 < this.qo) {
            this.qo = var31;
         }

         if(var37 < this.qo) {
            this.qo = var37;
         }

         this.ro = var26;
         if(var32 > this.ro) {
            this.ro = var32;
         }

         if(var38 > this.ro) {
            this.ro = var38;
         }

         var39 = 0;

         for(var3 = this.qo; var3 < this.ro; ++var3) {
            if(var3 >= var25 && var3 < var26) {
               var2 = var21;
               var1 = var21;
               var39 = var23;
               var4 = var23;
               var21 += var22;
               var23 += var24;
            } else {
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

            Scanline var40 = this.po[var3];
            var40.nkb = var1;
            var40.okb = var2;
            var40.pkb = var4;
            var40.qkb = var39;
         }

         if(this.qo < this.xm - this.vm) {
            this.qo = this.xm - this.vm;
         }
      } else if(var5 == 4) {
         var11 = var7[0] + this.xm;
         var12 = var7[1] + this.xm;
         var13 = var7[2] + this.xm;
         var14 = var7[3] + this.xm;
         var15 = var6[0];
         var16 = var6[1];
         var17 = var6[2];
         var18 = var6[3];
         var19 = var8[0];
         var20 = var8[1];
         var21 = var8[2];
         var22 = var8[3];
         var23 = this.xm + this.vm - 1;
         var24 = 0;
         var25 = 0;
         var26 = 0;
         var27 = 0;
         var28 = 12345678;
         var29 = -12345678;
         if(var14 != var11) {
            var25 = (var18 - var15 << 8) / (var14 - var11);
            var27 = (var22 - var19 << 8) / (var14 - var11);
            if(var11 < var14) {
               var24 = var15 << 8;
               var26 = var19 << 8;
               var28 = var11;
               var29 = var14;
            } else {
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
            var31 = (var16 - var15 << 8) / (var12 - var11);
            var33 = (var20 - var19 << 8) / (var12 - var11);
            if(var11 < var12) {
               var30 = var15 << 8;
               var32 = var19 << 8;
               var34 = var11;
               var35 = var12;
            } else {
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
         int var53 = 12345678;
         int var41 = -12345678;
         if(var13 != var12) {
            var37 = (var17 - var16 << 8) / (var13 - var12);
            var39 = (var21 - var20 << 8) / (var13 - var12);
            if(var12 < var13) {
               var36 = var16 << 8;
               var38 = var20 << 8;
               var53 = var12;
               var41 = var13;
            } else {
               var36 = var17 << 8;
               var38 = var21 << 8;
               var53 = var13;
               var41 = var12;
            }

            if(var53 < 0) {
               var36 -= var37 * var53;
               var38 -= var39 * var53;
               var53 = 0;
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
            var43 = (var18 - var17 << 8) / (var14 - var13);
            var45 = (var22 - var21 << 8) / (var14 - var13);
            if(var13 < var14) {
               var42 = var17 << 8;
               var44 = var21 << 8;
               var46 = var13;
               var47 = var14;
            } else {
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

         this.qo = var28;
         if(var34 < this.qo) {
            this.qo = var34;
         }

         if(var53 < this.qo) {
            this.qo = var53;
         }

         if(var46 < this.qo) {
            this.qo = var46;
         }

         this.ro = var29;
         if(var35 > this.ro) {
            this.ro = var35;
         }

         if(var41 > this.ro) {
            this.ro = var41;
         }

         if(var47 > this.ro) {
            this.ro = var47;
         }

         int var48 = 0;

         for(var3 = this.qo; var3 < this.ro; ++var3) {
            if(var3 >= var28 && var3 < var29) {
               var2 = var24;
               var1 = var24;
               var48 = var26;
               var4 = var26;
               var24 += var25;
               var26 += var27;
            } else {
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

            if(var3 >= var53 && var3 < var41) {
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

            Scanline var49 = this.po[var3];
            var49.nkb = var1;
            var49.okb = var2;
            var49.pkb = var4;
            var49.qkb = var48;
         }

         if(this.qo < this.xm - this.vm) {
            this.qo = this.xm - this.vm;
         }
      } else {
         this.ro = this.qo = var7[0] += this.xm;

         for(var3 = 1; var3 < var5; ++var3) {
            if((var11 = var7[var3] += this.xm) < this.qo) {
               this.qo = var11;
            } else if(var11 > this.ro) {
               this.ro = var11;
            }
         }

         if(this.qo < this.xm - this.vm) {
            this.qo = this.xm - this.vm;
         }

         if(this.ro >= this.xm + this.vm) {
            this.ro = this.xm + this.vm - 1;
         }

         if(this.qo >= this.ro) {
            return;
         }

         for(var3 = this.qo; var3 < this.ro; ++var3) {
            var50 = this.po[var3];
            var50.nkb = 655360;
            var50.okb = -655360;
         }

         var11 = var5 - 1;
         var12 = var7[0];
         var13 = var7[var11];
         Scanline var51;
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

            if(var13 > this.ro) {
               var13 = this.ro;
            }

            for(var3 = var12; var3 <= var13; ++var3) {
               var51 = this.po[var3];
               var51.nkb = var51.okb = var14;
               var51.pkb = var51.qkb = var16;
               var14 += var15;
               var16 += var17;
            }
         } else if(var12 > var13) {
            var14 = var6[var11] << 8;
            var15 = (var6[0] - var6[var11] << 8) / (var12 - var13);
            var16 = var8[var11] << 8;
            var17 = (var8[0] - var8[var11] << 8) / (var12 - var13);
            if(var13 < 0) {
               var14 -= var15 * var13;
               var16 -= var17 * var13;
               var13 = 0;
            }

            if(var12 > this.ro) {
               var12 = this.ro;
            }

            for(var3 = var13; var3 <= var12; ++var3) {
               var51 = this.po[var3];
               var51.nkb = var51.okb = var14;
               var51.pkb = var51.qkb = var16;
               var14 += var15;
               var16 += var17;
            }
         }

         for(var3 = 0; var3 < var11; ++var3) {
            var14 = var3 + 1;
            var12 = var7[var3];
            var13 = var7[var14];
            Scanline var52;
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

               if(var13 > this.ro) {
                  var13 = this.ro;
               }

               for(var19 = var12; var19 <= var13; ++var19) {
                  var52 = this.po[var19];
                  if(var15 < var52.nkb) {
                     var52.nkb = var15;
                     var52.pkb = var17;
                  }

                  if(var15 > var52.okb) {
                     var52.okb = var15;
                     var52.qkb = var17;
                  }

                  var15 += var16;
                  var17 += var18;
               }
            } else if(var12 > var13) {
               var15 = var6[var14] << 8;
               var16 = (var6[var3] - var6[var14] << 8) / (var12 - var13);
               var17 = var8[var14] << 8;
               var18 = (var8[var3] - var8[var14] << 8) / (var12 - var13);
               if(var13 < 0) {
                  var15 -= var16 * var13;
                  var17 -= var18 * var13;
                  var13 = 0;
               }

               if(var12 > this.ro) {
                  var12 = this.ro;
               }

               for(var19 = var13; var19 <= var12; ++var19) {
                  var52 = this.po[var19];
                  if(var15 < var52.nkb) {
                     var52.nkb = var15;
                     var52.pkb = var17;
                  }

                  if(var15 > var52.okb) {
                     var52.okb = var15;
                     var52.qkb = var17;
                  }

                  var15 += var16;
                  var17 += var18;
               }
            }
         }

         if(this.qo < this.xm - this.vm) {
            this.qo = this.xm - this.vm;
         }
      }

      if(this.mm && this.pm < this.qm && this.om >= this.qo && this.om < this.ro) {
         var50 = this.po[this.om];
         if(this.nm >= var50.nkb >> 8 && this.nm <= var50.okb >> 8 && var50.nkb <= var50.okb && !var9.vh && var9.rh[var10] == 0) {
            this.rm[this.pm] = var9;
            this.sm[this.pm] = var10;
            ++this.pm;
         }
      }

   }

   private void jh(int var1, int var2, int var3, int[] var4, int[] var5, int[] var6, int var7, GameModel var8) {
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
         if(var7 >= this.ao) {
            var7 = 0;
         }

         this.fi(var7);
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
         if(this._do[var7] == 1) {
            var18 = var15 * var10 - var16 * var9 << 12;
            var19 = var16 * var11 - var17 * var10 << 5 - this.ym + 7 + 4;
            var20 = var17 * var9 - var15 * var11 << 5 - this.ym + 7;
            var21 = var12 * var10 - var13 * var9 << 12;
            var22 = var13 * var11 - var14 * var10 << 5 - this.ym + 7 + 4;
            var23 = var14 * var9 - var12 * var11 << 5 - this.ym + 7;
            var24 = var13 * var15 - var12 * var16 << 5;
            var25 = var14 * var16 - var13 * var17 << 5 - this.ym + 4;
            var26 = var12 * var17 - var14 * var15 >> this.ym - 5;
            var27 = var19 >> 4;
            var28 = var22 >> 4;
            var29 = var25 >> 4;
            var30 = this.qo - this.xm;
            var31 = this.tm;
            var32 = this.wm + this.qo * var31;
            var33 = 1;
            var18 += var20 * var30;
            var21 += var23 * var30;
            var24 += var26 * var30;
            if(this.yo) {
               if((this.qo & 1) == 1) {
                  ++this.qo;
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

            if(var8.nh) {
               for(var1 = this.qo; var1 < this.ro; var1 += var33) {
                  var34 = this.po[var1];
                  var2 = var34.nkb >> 8;
                  var35 = var34.okb >> 8;
                  var36 = var35 - var2;
                  if(var36 <= 0) {
                     var18 += var20;
                     var21 += var23;
                     var24 += var26;
                     var32 += var31;
                  } else {
                     var37 = var34.pkb;
                     var38 = (var34.qkb - var37) / var36;
                     if(var2 < -this.um) {
                        var37 += (-this.um - var2) * var38;
                        var2 = -this.um;
                        var36 = var35 - var2;
                     }

                     if(var35 > this.um) {
                        var35 = this.um;
                        var36 = var35 - var2;
                     }

                     ji(this.oo, this.go[var7], 0, 0, var18 + var27 * var2, var21 + var28 * var2, var24 + var29 * var2, var19, var22, var25, var36, var32 + var2, var37, var38 << 2);
                     var18 += var20;
                     var21 += var23;
                     var24 += var26;
                     var32 += var31;
                  }
               }

            } else if(!this.fo[var7]) {
               for(var1 = this.qo; var1 < this.ro; var1 += var33) {
                  var34 = this.po[var1];
                  var2 = var34.nkb >> 8;
                  var35 = var34.okb >> 8;
                  var36 = var35 - var2;
                  if(var36 <= 0) {
                     var18 += var20;
                     var21 += var23;
                     var24 += var26;
                     var32 += var31;
                  } else {
                     var37 = var34.pkb;
                     var38 = (var34.qkb - var37) / var36;
                     if(var2 < -this.um) {
                        var37 += (-this.um - var2) * var38;
                        var2 = -this.um;
                        var36 = var35 - var2;
                     }

                     if(var35 > this.um) {
                        var35 = this.um;
                        var36 = var35 - var2;
                     }

                     nh(this.oo, this.go[var7], 0, 0, var18 + var27 * var2, var21 + var28 * var2, var24 + var29 * var2, var19, var22, var25, var36, var32 + var2, var37, var38 << 2);
                     var18 += var20;
                     var21 += var23;
                     var24 += var26;
                     var32 += var31;
                  }
               }

            } else {
               for(var1 = this.qo; var1 < this.ro; var1 += var33) {
                  var34 = this.po[var1];
                  var2 = var34.nkb >> 8;
                  var35 = var34.okb >> 8;
                  var36 = var35 - var2;
                  if(var36 <= 0) {
                     var18 += var20;
                     var21 += var23;
                     var24 += var26;
                     var32 += var31;
                  } else {
                     var37 = var34.pkb;
                     var38 = (var34.qkb - var37) / var36;
                     if(var2 < -this.um) {
                        var37 += (-this.um - var2) * var38;
                        var2 = -this.um;
                        var36 = var35 - var2;
                     }

                     if(var35 > this.um) {
                        var35 = this.um;
                        var36 = var35 - var2;
                     }

                     ci(this.oo, 0, 0, 0, this.go[var7], var18 + var27 * var2, var21 + var28 * var2, var24 + var29 * var2, var19, var22, var25, var36, var32 + var2, var37, var38);
                     var18 += var20;
                     var21 += var23;
                     var24 += var26;
                     var32 += var31;
                  }
               }

            }
         } else {
            var18 = var15 * var10 - var16 * var9 << 11;
            var19 = var16 * var11 - var17 * var10 << 5 - this.ym + 6 + 4;
            var20 = var17 * var9 - var15 * var11 << 5 - this.ym + 6;
            var21 = var12 * var10 - var13 * var9 << 11;
            var22 = var13 * var11 - var14 * var10 << 5 - this.ym + 6 + 4;
            var23 = var14 * var9 - var12 * var11 << 5 - this.ym + 6;
            var24 = var13 * var15 - var12 * var16 << 5;
            var25 = var14 * var16 - var13 * var17 << 5 - this.ym + 4;
            var26 = var12 * var17 - var14 * var15 >> this.ym - 5;
            var27 = var19 >> 4;
            var28 = var22 >> 4;
            var29 = var25 >> 4;
            var30 = this.qo - this.xm;
            var31 = this.tm;
            var32 = this.wm + this.qo * var31;
            var33 = 1;
            var18 += var20 * var30;
            var21 += var23 * var30;
            var24 += var26 * var30;
            if(this.yo) {
               if((this.qo & 1) == 1) {
                  ++this.qo;
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

            if(var8.nh) {
               for(var1 = this.qo; var1 < this.ro; var1 += var33) {
                  var34 = this.po[var1];
                  var2 = var34.nkb >> 8;
                  var35 = var34.okb >> 8;
                  var36 = var35 - var2;
                  if(var36 <= 0) {
                     var18 += var20;
                     var21 += var23;
                     var24 += var26;
                     var32 += var31;
                  } else {
                     var37 = var34.pkb;
                     var38 = (var34.qkb - var37) / var36;
                     if(var2 < -this.um) {
                        var37 += (-this.um - var2) * var38;
                        var2 = -this.um;
                        var36 = var35 - var2;
                     }

                     if(var35 > this.um) {
                        var35 = this.um;
                        var36 = var35 - var2;
                     }

                     qh(this.oo, this.go[var7], 0, 0, var18 + var27 * var2, var21 + var28 * var2, var24 + var29 * var2, var19, var22, var25, var36, var32 + var2, var37, var38);
                     var18 += var20;
                     var21 += var23;
                     var24 += var26;
                     var32 += var31;
                  }
               }

            } else if(!this.fo[var7]) {
               for(var1 = this.qo; var1 < this.ro; var1 += var33) {
                  var34 = this.po[var1];
                  var2 = var34.nkb >> 8;
                  var35 = var34.okb >> 8;
                  var36 = var35 - var2;
                  if(var36 <= 0) {
                     var18 += var20;
                     var21 += var23;
                     var24 += var26;
                     var32 += var31;
                  } else {
                     var37 = var34.pkb;
                     var38 = (var34.qkb - var37) / var36;
                     if(var2 < -this.um) {
                        var37 += (-this.um - var2) * var38;
                        var2 = -this.um;
                        var36 = var35 - var2;
                     }

                     if(var35 > this.um) {
                        var35 = this.um;
                        var36 = var35 - var2;
                     }

                     ki(this.oo, this.go[var7], 0, 0, var18 + var27 * var2, var21 + var28 * var2, var24 + var29 * var2, var19, var22, var25, var36, var32 + var2, var37, var38);
                     var18 += var20;
                     var21 += var23;
                     var24 += var26;
                     var32 += var31;
                  }
               }

            } else {
               for(var1 = this.qo; var1 < this.ro; var1 += var33) {
                  var34 = this.po[var1];
                  var2 = var34.nkb >> 8;
                  var35 = var34.okb >> 8;
                  var36 = var35 - var2;
                  if(var36 <= 0) {
                     var18 += var20;
                     var21 += var23;
                     var24 += var26;
                     var32 += var31;
                  } else {
                     var37 = var34.pkb;
                     var38 = (var34.qkb - var37) / var36;
                     if(var2 < -this.um) {
                        var37 += (-this.um - var2) * var38;
                        var2 = -this.um;
                        var36 = var35 - var2;
                     }

                     if(var35 > this.um) {
                        var35 = this.um;
                        var36 = var35 - var2;
                     }

                     mh(this.oo, 0, 0, 0, this.go[var7], var18 + var27 * var2, var21 + var28 * var2, var24 + var29 * var2, var19, var22, var25, var36, var32 + var2, var37, var38);
                     var18 += var20;
                     var21 += var23;
                     var24 += var26;
                     var32 += var31;
                  }
               }

            }
         }
      } else {
         for(var9 = 0; var9 < this.xl; ++var9) {
            if(this.yl[var9] == var7) {
               this.am = this.zl[var9];
               break;
            }

            if(var9 == this.xl - 1) {
               var10 = (int)(Math.random() * (double)this.xl);
               this.yl[var10] = var7;
               var7 = -1 - var7;
               var11 = (var7 >> 10 & 31) * 8;
               var12 = (var7 >> 5 & 31) * 8;
               var13 = (var7 & 31) * 8;

               for(var14 = 0; var14 < 256; ++var14) {
                  var15 = var14 * var14;
                  var16 = var11 * var15 / 65536;
                  var17 = var12 * var15 / 65536;
                  var18 = var13 * var15 / 65536;
                  this.zl[var10][255 - var14] = (var16 << 16) + (var17 << 8) + var18;
               }

               this.am = this.zl[var10];
            }
         }

         var10 = this.tm;
         var11 = this.wm + this.qo * var10;
         byte var39 = 1;
         if(this.yo) {
            if((this.qo & 1) == 1) {
               ++this.qo;
               var11 += var10;
            }

            var10 <<= 1;
            var39 = 2;
         }

         Scanline var40;
         if(var8.oh) {
            for(var1 = this.qo; var1 < this.ro; var1 += var39) {
               var40 = this.po[var1];
               var2 = var40.nkb >> 8;
               var14 = var40.okb >> 8;
               var15 = var14 - var2;
               if(var15 <= 0) {
                  var11 += var10;
               } else {
                  var16 = var40.pkb;
                  var17 = (var40.qkb - var16) / var15;
                  if(var2 < -this.um) {
                     var16 += (-this.um - var2) * var17;
                     var2 = -this.um;
                     var15 = var14 - var2;
                  }

                  if(var14 > this.um) {
                     var14 = this.um;
                     var15 = var14 - var2;
                  }

                  bi(this.oo, -var15, var11 + var2, 0, this.am, var16, var17);
                  var11 += var10;
               }
            }

         } else if(this.jm) {
            for(var1 = this.qo; var1 < this.ro; var1 += var39) {
               var40 = this.po[var1];
               var2 = var40.nkb >> 8;
               var14 = var40.okb >> 8;
               var15 = var14 - var2;
               if(var15 <= 0) {
                  var11 += var10;
               } else {
                  var16 = var40.pkb;
                  var17 = (var40.qkb - var16) / var15;
                  if(var2 < -this.um) {
                     var16 += (-this.um - var2) * var17;
                     var2 = -this.um;
                     var15 = var14 - var2;
                  }

                  if(var14 > this.um) {
                     var14 = this.um;
                     var15 = var14 - var2;
                  }

                  dh(this.oo, -var15, var11 + var2, 0, this.am, var16, var17);
                  var11 += var10;
               }
            }

         } else {
            for(var1 = this.qo; var1 < this.ro; var1 += var39) {
               var40 = this.po[var1];
               var2 = var40.nkb >> 8;
               var14 = var40.okb >> 8;
               var15 = var14 - var2;
               if(var15 <= 0) {
                  var11 += var10;
               } else {
                  var16 = var40.pkb;
                  var17 = (var40.qkb - var16) / var15;
                  if(var2 < -this.um) {
                     var16 += (-this.um - var2) * var17;
                     var2 = -this.um;
                     var15 = var14 - var2;
                  }

                  if(var14 > this.um) {
                     var14 = this.um;
                     var15 = var14 - var2;
                  }

                  rh(this.oo, -var15, var11 + var2, 0, this.am, var16, var17);
                  var11 += var10;
               }
            }

         }
      }
   }

   private static void nh(int[] var0, int[] var1, int var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13) {
      if(var10 > 0) {
         int var14 = 0;
         int var15 = 0;
         int var18 = 0;
         if(var6 != 0) {
            var2 = var4 / var6 << 7;
            var3 = var5 / var6 << 7;
         }

         if(var2 < 0) {
            var2 = 0;
         } else if(var2 > 16256) {
            var2 = 16256;
         }

         var4 += var7;
         var5 += var8;
         var6 += var9;
         if(var6 != 0) {
            var14 = var4 / var6 << 7;
            var15 = var5 / var6 << 7;
         }

         if(var14 < 0) {
            var14 = 0;
         } else if(var14 > 16256) {
            var14 = 16256;
         }

         int var16 = var14 - var2 >> 4;
         int var17 = var15 - var3 >> 4;

         for(int var19 = var10 >> 4; var19 > 0; --var19) {
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

            if(var14 < 0) {
               var14 = 0;
            } else if(var14 > 16256) {
               var14 = 16256;
            }

            var16 = var14 - var2 >> 4;
            var17 = var15 - var3 >> 4;
         }

         for(int var20 = 0; var20 < (var10 & 15); ++var20) {
            if((var20 & 3) == 0) {
               var2 = (var2 & 16383) + (var12 & 6291456);
               var18 = var12 >> 23;
               var12 += var13;
            }

            var0[var11++] = var1[(var3 & 16256) + (var2 >> 7)] >>> var18;
            var2 += var16;
            var3 += var17;
         }

      }
   }

   private static void ji(int[] var0, int[] var1, int var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13) {
      if(var10 > 0) {
         int var14 = 0;
         int var15 = 0;
         int var18 = 0;
         if(var6 != 0) {
            var2 = var4 / var6 << 7;
            var3 = var5 / var6 << 7;
         }

         if(var2 < 0) {
            var2 = 0;
         } else if(var2 > 16256) {
            var2 = 16256;
         }

         var4 += var7;
         var5 += var8;
         var6 += var9;
         if(var6 != 0) {
            var14 = var4 / var6 << 7;
            var15 = var5 / var6 << 7;
         }

         if(var14 < 0) {
            var14 = 0;
         } else if(var14 > 16256) {
            var14 = 16256;
         }

         int var16 = var14 - var2 >> 4;
         int var17 = var15 - var3 >> 4;

         for(int var19 = var10 >> 4; var19 > 0; --var19) {
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

            if(var14 < 0) {
               var14 = 0;
            } else if(var14 > 16256) {
               var14 = 16256;
            }

            var16 = var14 - var2 >> 4;
            var17 = var15 - var3 >> 4;
         }

         for(int var20 = 0; var20 < (var10 & 15); ++var20) {
            if((var20 & 3) == 0) {
               var2 = (var2 & 16383) + (var12 & 6291456);
               var18 = var12 >> 23;
               var12 += var13;
            }

            var0[var11++] = (var1[(var3 & 16256) + (var2 >> 7)] >>> var18) + (var0[var11] >> 1 & 8355711);
            var2 += var16;
            var3 += var17;
         }

      }
   }

   private static void ci(int[] var0, int var1, int var2, int var3, int[] var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13, int var14) {
      if(var11 > 0) {
         int var15 = 0;
         int var16 = 0;
         var14 <<= 2;
         if(var7 != 0) {
            var15 = var5 / var7 << 7;
            var16 = var6 / var7 << 7;
         }

         if(var15 < 0) {
            var15 = 0;
         } else if(var15 > 16256) {
            var15 = 16256;
         }

         for(int var19 = var11; var19 > 0; var19 -= 16) {
            var5 += var8;
            var6 += var9;
            var7 += var10;
            var2 = var15;
            var3 = var16;
            if(var7 != 0) {
               var15 = var5 / var7 << 7;
               var16 = var6 / var7 << 7;
            }

            if(var15 < 0) {
               var15 = 0;
            } else if(var15 > 16256) {
               var15 = 16256;
            }

            int var17 = var15 - var2 >> 4;
            int var18 = var16 - var3 >> 4;
            int var20 = var13 >> 23;
            var2 += var13 & 6291456;
            var13 += var14;
            if(var19 < 16) {
               for(int var21 = 0; var21 < var19; ++var21) {
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
               }
            } else {
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
         }

      }
   }

   private static void ki(int[] var0, int[] var1, int var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13) {
      if(var10 > 0) {
         int var14 = 0;
         int var15 = 0;
         var13 <<= 2;
         if(var6 != 0) {
            var14 = var4 / var6 << 6;
            var15 = var5 / var6 << 6;
         }

         if(var14 < 0) {
            var14 = 0;
         } else if(var14 > 4032) {
            var14 = 4032;
         }

         for(int var18 = var10; var18 > 0; var18 -= 16) {
            var4 += var7;
            var5 += var8;
            var6 += var9;
            var2 = var14;
            var3 = var15;
            if(var6 != 0) {
               var14 = var4 / var6 << 6;
               var15 = var5 / var6 << 6;
            }

            if(var14 < 0) {
               var14 = 0;
            } else if(var14 > 4032) {
               var14 = 4032;
            }

            int var16 = var14 - var2 >> 4;
            int var17 = var15 - var3 >> 4;
            int var19 = var12 >> 20;
            var2 += var12 & 786432;
            var12 += var13;
            if(var18 < 16) {
               for(int var20 = 0; var20 < var18; ++var20) {
                  var0[var11++] = var1[(var3 & 4032) + (var2 >> 6)] >>> var19;
                  var2 += var16;
                  var3 += var17;
                  if((var20 & 3) == 3) {
                     var2 = (var2 & 4095) + (var12 & 786432);
                     var19 = var12 >> 20;
                     var12 += var13;
                  }
               }
            } else {
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
         }

      }
   }

   private static void qh(int[] var0, int[] var1, int var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13) {
      if(var10 > 0) {
         int var14 = 0;
         int var15 = 0;
         var13 <<= 2;
         if(var6 != 0) {
            var14 = var4 / var6 << 6;
            var15 = var5 / var6 << 6;
         }

         if(var14 < 0) {
            var14 = 0;
         } else if(var14 > 4032) {
            var14 = 4032;
         }

         for(int var18 = var10; var18 > 0; var18 -= 16) {
            var4 += var7;
            var5 += var8;
            var6 += var9;
            var2 = var14;
            var3 = var15;
            if(var6 != 0) {
               var14 = var4 / var6 << 6;
               var15 = var5 / var6 << 6;
            }

            if(var14 < 0) {
               var14 = 0;
            } else if(var14 > 4032) {
               var14 = 4032;
            }

            int var16 = var14 - var2 >> 4;
            int var17 = var15 - var3 >> 4;
            int var19 = var12 >> 20;
            var2 += var12 & 786432;
            var12 += var13;
            if(var18 < 16) {
               for(int var20 = 0; var20 < var18; ++var20) {
                  var0[var11++] = (var1[(var3 & 4032) + (var2 >> 6)] >>> var19) + (var0[var11] >> 1 & 8355711);
                  var2 += var16;
                  var3 += var17;
                  if((var20 & 3) == 3) {
                     var2 = (var2 & 4095) + (var12 & 786432);
                     var19 = var12 >> 20;
                     var12 += var13;
                  }
               }
            } else {
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
         }

      }
   }

   private static void mh(int[] var0, int var1, int var2, int var3, int[] var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13, int var14) {
      if(var11 > 0) {
         int var15 = 0;
         int var16 = 0;
         var14 <<= 2;
         if(var7 != 0) {
            var15 = var5 / var7 << 6;
            var16 = var6 / var7 << 6;
         }

         if(var15 < 0) {
            var15 = 0;
         } else if(var15 > 4032) {
            var15 = 4032;
         }

         for(int var19 = var11; var19 > 0; var19 -= 16) {
            var5 += var8;
            var6 += var9;
            var7 += var10;
            var2 = var15;
            var3 = var16;
            if(var7 != 0) {
               var15 = var5 / var7 << 6;
               var16 = var6 / var7 << 6;
            }

            if(var15 < 0) {
               var15 = 0;
            } else if(var15 > 4032) {
               var15 = 4032;
            }

            int var17 = var15 - var2 >> 4;
            int var18 = var16 - var3 >> 4;
            int var20 = var13 >> 20;
            var2 += var13 & 786432;
            var13 += var14;
            if(var19 < 16) {
               for(int var21 = 0; var21 < var19; ++var21) {
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
               }
            } else {
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
         }

      }
   }

   private static void dh(int[] var0, int var1, int var2, int var3, int[] var4, int var5, int var6) {
      if(var1 < 0) {
         var6 <<= 1;
         var3 = var4[var5 >> 8 & 255];
         var5 += var6;
         int var7 = var1 / 8;

         for(int var8 = var7; var8 < 0; ++var8) {
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
         }

         var7 = -(var1 % 8);

         for(int var9 = 0; var9 < var7; ++var9) {
            var0[var2++] = var3;
            if((var9 & 1) == 1) {
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
            }
         }

      }
   }

   private static void bi(int[] var0, int var1, int var2, int var3, int[] var4, int var5, int var6) {
      if(var1 < 0) {
         var6 <<= 2;
         var3 = var4[var5 >> 8 & 255];
         var5 += var6;
         int var7 = var1 / 16;

         for(int var8 = var7; var8 < 0; ++var8) {
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
         }

         var7 = -(var1 % 16);

         for(int var9 = 0; var9 < var7; ++var9) {
            var0[var2++] = var3 + (var0[var2] >> 1 & 8355711);
            if((var9 & 3) == 3) {
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
               var5 += var6;
            }
         }

      }
   }

   private static void rh(int[] var0, int var1, int var2, int var3, int[] var4, int var5, int var6) {
      if(var1 < 0) {
         var6 <<= 2;
         var3 = var4[var5 >> 8 & 255];
         var5 += var6;
         int var7 = var1 / 16;

         for(int var8 = var7; var8 < 0; ++var8) {
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
         }

         var7 = -(var1 % 16);

         for(int var9 = 0; var9 < var7; ++var9) {
            var0[var2++] = var3;
            if((var9 & 3) == 3) {
               var3 = var4[var5 >> 8 & 255];
               var5 += var6;
            }
         }

      }
   }

   public void setCamera(int var1, int var2, int var3, int var4, int var5, int var6, int var7) {
      this.dn = 1024 - var4 & 1023;
      this.en = 1024 - var5 & 1023;
      this.fn = 1024 - var6 & 1023;
      int var8 = 0;
      int var9 = 0;
      int var10 = var7;
      int var11;
      int var12;
      int var13;
      if(var4 != 0) {
         var11 = hm[var4];
         var12 = hm[var4 + 1024];
         var13 = var9 * var12 - var7 * var11 >> 15;
         var10 = var9 * var11 + var7 * var12 >> 15;
         var9 = var13;
      }

      if(var5 != 0) {
         var11 = hm[var5];
         var12 = hm[var5 + 1024];
         var13 = var10 * var11 + var8 * var12 >> 15;
         var10 = var10 * var12 - var8 * var11 >> 15;
         var8 = var13;
      }

      if(var6 != 0) {
         var11 = hm[var6];
         var12 = hm[var6 + 1024];
         var13 = var9 * var11 + var8 * var12 >> 15;
         var9 = var9 * var12 - var8 * var11 >> 15;
         var8 = var13;
      }

      this.an = var1 - var8;
      this.bn = var2 - var9;
      this.cn = var3 - var10;
   }

   private void ri(int var1) {
      Polygon var2 = this.ln[var1];
      GameModel var3 = var2.hfb;
      int var4 = var2.ifb;
      int[] var5 = var3.tg[var4];
      int var6 = var3.sg[var4];
      int var7 = var3.xg[var4];
      int var9 = var3.kg[var5[0]];
      int var10 = var3.lg[var5[0]];
      int var11 = var3.mg[var5[0]];
      int var12 = var3.kg[var5[1]] - var9;
      int var13 = var3.lg[var5[1]] - var10;
      int var14 = var3.mg[var5[1]] - var11;
      int var15 = var3.kg[var5[2]] - var9;
      int var16 = var3.lg[var5[2]] - var10;
      int var17 = var3.mg[var5[2]] - var11;
      int var18 = var13 * var17 - var16 * var14;
      int var19 = var14 * var15 - var17 * var12;
      int var20 = var12 * var16 - var15 * var13;
      if(var7 == -1) {
         for(var7 = 0; var18 > 25000 || var19 > 25000 || var20 > 25000 || var18 < -25000 || var19 < -25000 || var20 < -25000; var20 >>= 1) {
            ++var7;
            var18 >>= 1;
            var19 >>= 1;
         }

         var3.xg[var4] = var7;
         var3.wg[var4] = (int)((double)this.zm * Math.sqrt((double)(var18 * var18 + var19 * var19 + var20 * var20)));
      } else {
         var18 >>= var7;
         var19 >>= var7;
         var20 >>= var7;
      }

      var2.nfb = var9 * var18 + var10 * var19 + var11 * var20;
      var2.kfb = var18;
      var2.lfb = var19;
      var2.mfb = var20;
      int var21 = var3.mg[var5[0]];
      int var22 = var21;
      int var23 = var3.ng[var5[0]];
      int var24 = var23;
      int var25 = var3.og[var5[0]];
      int var26 = var25;

      for(int var27 = 1; var27 < var6; ++var27) {
         int var8 = var3.mg[var5[var27]];
         if(var8 > var22) {
            var22 = var8;
         } else if(var8 < var21) {
            var21 = var8;
         }

         var8 = var3.ng[var5[var27]];
         if(var8 > var24) {
            var24 = var8;
         } else if(var8 < var23) {
            var23 = var8;
         }

         var8 = var3.og[var5[var27]];
         if(var8 > var26) {
            var26 = var8;
         } else if(var8 < var25) {
            var25 = var8;
         }
      }

      var2.ffb = var21;
      var2.gfb = var22;
      var2.bfb = var23;
      var2.dfb = var24;
      var2.cfb = var25;
      var2.efb = var26;
   }

   private void ti(int var1) {
      Polygon var2 = this.ln[var1];
      GameModel var3 = var2.hfb;
      int var4 = var2.ifb;
      int[] var5 = var3.tg[var4];
      byte var7 = 0;
      byte var8 = 0;
      byte var9 = 1;
      int var10 = var3.kg[var5[0]];
      int var11 = var3.lg[var5[0]];
      int var12 = var3.mg[var5[0]];
      var3.wg[var4] = 1;
      var3.xg[var4] = 0;
      var2.nfb = var10 * var7 + var11 * var8 + var12 * var9;
      var2.kfb = var7;
      var2.lfb = var8;
      var2.mfb = var9;
      int var13 = var3.mg[var5[0]];
      int var14 = var13;
      int var15 = var3.ng[var5[0]];
      int var16 = var15;
      if(var3.ng[var5[1]] < var15) {
         var15 = var3.ng[var5[1]];
      } else {
         var16 = var3.ng[var5[1]];
      }

      int var17 = var3.og[var5[1]];
      int var18 = var3.og[var5[0]];
      int var6 = var3.mg[var5[1]];
      if(var6 > var13) {
         var14 = var6;
      } else if(var6 < var13) {
         var13 = var6;
      }

      var6 = var3.ng[var5[1]];
      if(var6 > var16) {
         var16 = var6;
      } else if(var6 < var15) {
         var15 = var6;
      }

      var6 = var3.og[var5[1]];
      if(var6 > var18) {
         var18 = var6;
      } else if(var6 < var17) {
         var17 = var6;
      }

      var2.ffb = var13;
      var2.gfb = var14;
      var2.bfb = var15 - 20;
      var2.dfb = var16 + 20;
      var2.cfb = var17;
      var2.efb = var18;
   }

   private boolean ch(Polygon var1, Polygon var2) {
      if(var1.bfb >= var2.dfb) {
         return true;
      } else if(var2.bfb >= var1.dfb) {
         return true;
      } else if(var1.cfb >= var2.efb) {
         return true;
      } else if(var2.cfb >= var1.efb) {
         return true;
      } else if(var1.ffb >= var2.gfb) {
         return true;
      } else if(var2.ffb > var1.gfb) {
         return false;
      } else {
         GameModel var3 = var1.hfb;
         GameModel var4 = var2.hfb;
         int var5 = var1.ifb;
         int var6 = var2.ifb;
         int[] var7 = var3.tg[var5];
         int[] var8 = var4.tg[var6];
         int var9 = var3.sg[var5];
         int var10 = var4.sg[var6];
         int var14 = var4.kg[var8[0]];
         int var15 = var4.lg[var8[0]];
         int var16 = var4.mg[var8[0]];
         int var17 = var2.kfb;
         int var18 = var2.lfb;
         int var19 = var2.mfb;
         int var20 = var4.wg[var6];
         int var21 = var2.nfb;
         boolean var13 = false;

         int var11;
         int var12;
         for(int var22 = 0; var22 < var9; ++var22) {
            var11 = var7[var22];
            var12 = (var14 - var3.kg[var11]) * var17 + (var15 - var3.lg[var11]) * var18 + (var16 - var3.mg[var11]) * var19;
            if(var12 < -var20 && var21 < 0 || var12 > var20 && var21 > 0) {
               var13 = true;
               break;
            }
         }

         if(!var13) {
            return true;
         } else {
            var14 = var3.kg[var7[0]];
            var15 = var3.lg[var7[0]];
            var16 = var3.mg[var7[0]];
            var17 = var1.kfb;
            var18 = var1.lfb;
            var19 = var1.mfb;
            var20 = var3.wg[var5];
            var21 = var1.nfb;
            var13 = false;

            for(int var23 = 0; var23 < var10; ++var23) {
               var11 = var8[var23];
               var12 = (var14 - var4.kg[var11]) * var17 + (var15 - var4.lg[var11]) * var18 + (var16 - var4.mg[var11]) * var19;
               if(var12 < -var20 && var21 > 0 || var12 > var20 && var21 < 0) {
                  var13 = true;
                  break;
               }
            }

            if(!var13) {
               return true;
            } else {
               int[] var24;
               int[] var25;
               int var28;
               int var29;
               if(var9 == 2) {
                  var24 = new int[4];
                  var25 = new int[4];
                  var28 = var7[0];
                  var11 = var7[1];
                  var24[0] = var3.ng[var28] - 20;
                  var24[1] = var3.ng[var11] - 20;
                  var24[2] = var3.ng[var11] + 20;
                  var24[3] = var3.ng[var28] + 20;
                  var25[0] = var25[3] = var3.og[var28];
                  var25[1] = var25[2] = var3.og[var11];
               } else {
                  var24 = new int[var9];
                  var25 = new int[var9];

                  for(var28 = 0; var28 < var9; ++var28) {
                     var29 = var7[var28];
                     var24[var28] = var3.ng[var29];
                     var25[var28] = var3.og[var29];
                  }
               }

               int[] var26;
               int[] var27;
               if(var10 == 2) {
                  var26 = new int[4];
                  var27 = new int[4];
                  var28 = var8[0];
                  var11 = var8[1];
                  var26[0] = var4.ng[var28] - 20;
                  var26[1] = var4.ng[var11] - 20;
                  var26[2] = var4.ng[var11] + 20;
                  var26[3] = var4.ng[var28] + 20;
                  var27[0] = var27[3] = var4.og[var28];
                  var27[1] = var27[2] = var4.og[var11];
               } else {
                  var26 = new int[var10];
                  var27 = new int[var10];

                  for(var28 = 0; var28 < var10; ++var28) {
                     var29 = var8[var28];
                     var26[var28] = var4.ng[var29];
                     var27[var28] = var4.og[var29];
                  }
               }

               return !this.eh(var24, var25, var26, var27);
            }
         }
      }
   }

   private boolean ah(Polygon var1, Polygon var2) {
      GameModel var3 = var1.hfb;
      GameModel var4 = var2.hfb;
      int var5 = var1.ifb;
      int var6 = var2.ifb;
      int[] var7 = var3.tg[var5];
      int[] var8 = var4.tg[var6];
      int var9 = var3.sg[var5];
      int var10 = var4.sg[var6];
      int var14 = var4.kg[var8[0]];
      int var15 = var4.lg[var8[0]];
      int var16 = var4.mg[var8[0]];
      int var17 = var2.kfb;
      int var18 = var2.lfb;
      int var19 = var2.mfb;
      int var20 = var4.wg[var6];
      int var21 = var2.nfb;
      boolean var13 = false;

      int var11;
      int var12;
      for(int var22 = 0; var22 < var9; ++var22) {
         var11 = var7[var22];
         var12 = (var14 - var3.kg[var11]) * var17 + (var15 - var3.lg[var11]) * var18 + (var16 - var3.mg[var11]) * var19;
         if(var12 < -var20 && var21 < 0 || var12 > var20 && var21 > 0) {
            var13 = true;
            break;
         }
      }

      if(!var13) {
         return true;
      } else {
         var14 = var3.kg[var7[0]];
         var15 = var3.lg[var7[0]];
         var16 = var3.mg[var7[0]];
         var17 = var1.kfb;
         var18 = var1.lfb;
         var19 = var1.mfb;
         var20 = var3.wg[var5];
         var21 = var1.nfb;
         var13 = false;

         for(int var23 = 0; var23 < var10; ++var23) {
            var11 = var8[var23];
            var12 = (var14 - var4.kg[var11]) * var17 + (var15 - var4.lg[var11]) * var18 + (var16 - var4.mg[var11]) * var19;
            if(var12 < -var20 && var21 > 0 || var12 > var20 && var21 < 0) {
               var13 = true;
               break;
            }
         }

         return !var13;
      }
   }

   public void loadTextures(String var1, int var2, int var3, int var4, GameShell var5) {
      try {
         this.io = var5.readDataFile(var1, "textures", var4);
         byte[] var6 = Utility.unpackData("textures.txt", 0, this.io);
         ClientStream var7 = new ClientStream(var6);
         var7.skipToNextDataValue();
         this.ao = var7.readDataInt();
         this.bo = new String[this.ao];
         this.fo = new boolean[this.ao];
         this.eo = new long[this.ao];
         this.co = new int[this.ao];
         this._do = new int[this.ao];
         this.go = new int[this.ao][];

         for(int var8 = 0; var8 < this.ao; ++var8) {
            var7.skipToNextDataValue();
            this.bo[var8] = var7.readDataString();
            this.co[var8] = var7.readDataHex();
            this._do[var8] = var7.readDataInt();
            this.fo[var8] = false;
            this.go[var8] = null;
            this.eo[var8] = 0L;
         }

         ho = 0L;
         this.jo = new int[var2][];
         this.ko = new int[var3][];

         for(int var9 = 0; var9 < this.ao; ++var9) {
            this.fi(var9);
         }

      } catch (IOException var10) {
         System.out.println("Error loading texture set");
      }
   }

   public void ai(int var1) {
      if(this.go[var1] != null) {
         int[] var2 = this.go[var1];

         int var5;
         int var6;
         for(int var3 = 0; var3 < 64; ++var3) {
            int var4 = var3 + 4032;
            var5 = var2[var4];

            for(var6 = 0; var6 < 63; ++var6) {
               var2[var4] = var2[var4 - 64];
               var4 -= 64;
            }

            this.go[var1][var4] = var5;
         }

         short var7 = 4096;

         for(var5 = 0; var5 < var7; ++var5) {
            var6 = var2[var5];
            var2[var7 + var5] = var6 - (var6 >>> 3) & 16316671;
            var2[var7 * 2 + var5] = var6 - (var6 >>> 2) & 16316671;
            var2[var7 * 3 + var5] = var6 - (var6 >>> 2) - (var6 >>> 3) & 16316671;
         }

      }
   }

   public void fi(int var1) {
      if(var1 >= 0) {
         this.eo[var1] = (long)(ho++);
         if(this.go[var1] == null) {
            int var2;
            long var3;
            int var5;
            int var6;
            if(this._do[var1] == 0) {
               for(var2 = 0; var2 < this.jo.length; ++var2) {
                  if(this.jo[var2] == null) {
                     this.jo[var2] = new int[16384];
                     this.go[var1] = this.jo[var2];
                     Utility.unpackData(this.bo[var1] + ".tga", 0, this.io, lo);
                     this.di(var1);
                     return;
                  }
               }

               var3 = 1L << 30;
               var5 = 0;

               for(var6 = 0; var6 < this.ao; ++var6) {
                  if(var6 != var1 && this._do[var6] == 0 && this.go[var6] != null && this.eo[var6] < var3) {
                     var3 = this.eo[var6];
                     var5 = var6;
                  }
               }

               this.go[var1] = this.go[var5];
               this.go[var5] = null;
               Utility.unpackData(this.bo[var1] + ".tga", 0, this.io, lo);
               this.di(var1);
            } else {
               for(var2 = 0; var2 < this.ko.length; ++var2) {
                  if(this.ko[var2] == null) {
                     this.ko[var2] = new int[65536];
                     this.go[var1] = this.ko[var2];
                     Utility.unpackData(this.bo[var1] + ".tga", 0, this.io, lo);
                     this.di(var1);
                     return;
                  }
               }

               var3 = 1L << 30;
               var5 = 0;

               for(var6 = 0; var6 < this.ao; ++var6) {
                  if(var6 != var1 && this._do[var6] == 1 && this.go[var6] != null && this.eo[var6] < var3) {
                     var3 = this.eo[var6];
                     var5 = var6;
                  }
               }

               this.go[var1] = this.go[var5];
               this.go[var5] = null;
               Utility.unpackData(this.bo[var1] + ".tga", 0, this.io, lo);
               this.di(var1);
            }
         }
      }
   }

   public void loadTextures(String var1) {
      try {
         ClientStream var2 = new ClientStream(var1 + "/textures.txt");
         var2.skipToNextDataValue();
         this.ao = var2.readDataInt();
         this.bo = new String[this.ao];
         this.fo = new boolean[this.ao];
         this.eo = new long[this.ao];
         this.co = new int[this.ao];
         this._do = new int[this.ao];
         this.go = new int[this.ao][];

         for(int var3 = 0; var3 < this.ao; ++var3) {
            var2.skipToNextDataValue();
            this.bo[var3] = var2.readDataString();
            this.co[var3] = var2.readDataHex();
            this._do[var3] = var2.readDataInt();
            this.fo[var3] = false;
         }

         var2.close();

         for(int var4 = 0; var4 < this.ao; ++var4) {
            short var5;
            if(this._do[var4] == 0) {
               var5 = 5403;
            } else {
               var5 = 17691;
            }

            short var6;
            if(this._do[var4] == 0) {
               var6 = 64;
            } else {
               var6 = 128;
            }

            this.go[var4] = new int[var6 * var6 * 4];
            Utility.loadData(var1 + "/" + this.bo[var4] + ".tga", lo, var5);
            this.di(var4);
         }

      } catch (IOException var7) {
         System.out.println("Error loading texture set");
      }
   }

   private void di(int var1) {
      short var2;
      if(this._do[var1] == 0) {
         var2 = 64;
      } else {
         var2 = 128;
      }

      int[] var3 = this.go[var1];
      int var4 = 0;

      for(int var5 = 0; var5 < 256; ++var5) {
         mo[var5] = ((lo[20 + var5 * 3] & 255) << 16) + ((lo[19 + var5 * 3] & 255) << 8) + (lo[18 + var5 * 3] & 255);
      }

      int var7;
      int var8;
      for(int var6 = var2 - 1; var6 >= 0; --var6) {
         for(var7 = 0; var7 < var2; ++var7) {
            var8 = mo[lo[786 + var7 + var6 * var2] & 255];
            if(var8 != 16711935 && this.co[var1] != 0) {
               int var9 = var8 >> 16 & 255;
               int var10 = var8 >> 8 & 255;
               int var11 = var8 & 255;
               if(var9 == var10 && var10 == var11) {
                  int var12 = this.co[var1] >> 16 & 255;
                  int var13 = this.co[var1] >> 8 & 255;
                  int var14 = this.co[var1] & 255;
                  var8 = (var9 * var12 >> 8 << 16) + (var10 * var13 >> 8 << 8) + (var11 * var14 >> 8);
               }
            }

            var8 &= 16316671;
            if(var8 == 0) {
               var8 = 1;
            } else if(var8 == 16253183) {
               var8 = 0;
               this.fo[var1] = true;
            }

            var3[var4++] = var8;
         }
      }

      for(var7 = 0; var7 < var4; ++var7) {
         var8 = var3[var7];
         var3[var4 + var7] = var8 - (var8 >>> 3) & 16316671;
         var3[var4 * 2 + var7] = var8 - (var8 >>> 2) & 16316671;
         var3[var4 * 3 + var7] = var8 - (var8 >>> 2) - (var8 >>> 3) & 16316671;
      }

   }

   public int oi(int var1) {
      if(var1 == 12345678) {
         return 0;
      } else {
         this.fi(var1);
         if(var1 >= 0) {
            return this.go[var1][0];
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

   public void xh(int var1, int var2, int var3) {
      if(var1 == 0 && var2 == 0 && var3 == 0) {
         var1 = 32;
      }

      for(int var4 = 0; var4 < this.gn; ++var4) {
         this.in[var4].se(var1, var2, var3);
      }

   }

   public void th(boolean var1, int var2, int var3, int var4, int var5, int var6) {
      if(var4 == 0 && var5 == 0 && var6 == 0) {
         var4 = 32;
      }

      for(int var7 = 0; var7 < this.gn; ++var7) {
         this.in[var7].setLight(var1, var2, var3, var4, var5, var6);
      }

   }

   public static int zh(int var0, int var1, int var2) {
      return -1 - var0 / 8 * 1024 - var1 / 8 * 32 - var2 / 8;
   }

   public int hh(int var1, int var2, int var3, int var4, int var5) {
      return var4 == var2?var1:var1 + (var3 - var1) * (var5 - var2) / (var4 - var2);
   }

   public boolean wh(int var1, int var2, int var3, int var4, boolean var5) {
      return (!var5 || var1 > var3) && var1 >= var3?(var1 < var4?true:(var2 < var3?true:(var2 < var4?true:var5))):(var1 > var4?true:(var2 > var3?true:(var2 > var4?true:!var5)));
   }

   public boolean lh(int var1, int var2, int var3, boolean var4) {
      return (!var4 || var1 > var3) && var1 >= var3?(var2 < var3?true:var4):(var2 > var3?true:!var4);
   }

   public boolean eh(int[] var1, int[] var2, int[] var3, int[] var4) {
      int var5 = var1.length;
      int var6 = var3.length;
      byte var15 = 0;
      int var17;
      int var19 = var17 = var2[0];
      int var7 = 0;
      int var18;
      int var20 = var18 = var4[0];
      int var9 = 0;

      for(int var21 = 1; var21 < var5; ++var21) {
         if(var2[var21] < var17) {
            var17 = var2[var21];
            var7 = var21;
         } else if(var2[var21] > var19) {
            var19 = var2[var21];
         }
      }

      for(int var22 = 1; var22 < var6; ++var22) {
         if(var4[var22] < var18) {
            var18 = var4[var22];
            var9 = var22;
         } else if(var4[var22] > var20) {
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
         if(var2[var7] < var4[var9]) {
            for(var8 = var7; var2[var8] < var4[var9]; var8 = (var8 + 1) % var5) {
               ;
            }

            while(var2[var7] < var4[var9]) {
               var7 = (var7 - 1 + var5) % var5;
            }

            var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
            var12 = this.hh(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
            var13 = var3[var9];
            var16 = var11 < var13 | var12 < var13;
            if(this.lh(var11, var12, var13, var16)) {
               return true;
            }

            var10 = (var9 + 1) % var6;
            var9 = (var9 - 1 + var6) % var6;
            if(var7 == var8) {
               var15 = 1;
            }
         } else {
            for(var10 = var9; var4[var10] < var2[var7]; var10 = (var10 + 1) % var6) {
               ;
            }

            while(var4[var9] < var2[var7]) {
               var9 = (var9 - 1 + var6) % var6;
            }

            var11 = var1[var7];
            var13 = this.hh(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var7]);
            var14 = this.hh(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var7]);
            var16 = var11 < var13 | var11 < var14;
            if(this.lh(var13, var14, var11, !var16)) {
               return true;
            }

            var8 = (var7 + 1) % var5;
            var7 = (var7 - 1 + var5) % var5;
            if(var9 == var10) {
               var15 = 2;
            }
         }

         while(var15 == 0) {
            if(var2[var7] < var2[var8]) {
               if(var2[var7] < var4[var9]) {
                  if(var2[var7] < var4[var10]) {
                     var11 = var1[var7];
                     var12 = this.hh(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var2[var7]);
                     var13 = this.hh(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var7]);
                     var14 = this.hh(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var7]);
                     if(this.wh(var11, var12, var13, var14, var16)) {
                        return true;
                     }

                     var7 = (var7 - 1 + var5) % var5;
                     if(var7 == var8) {
                        var15 = 1;
                     }
                  } else {
                     var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
                     var12 = this.hh(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
                     var13 = this.hh(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
                     var14 = var3[var10];
                     if(this.wh(var11, var12, var13, var14, var16)) {
                        return true;
                     }

                     var10 = (var10 + 1) % var6;
                     if(var9 == var10) {
                        var15 = 2;
                     }
                  }
               } else if(var4[var9] < var4[var10]) {
                  var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
                  var12 = this.hh(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
                  var13 = var3[var9];
                  var14 = this.hh(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var4[var9]);
                  if(this.wh(var11, var12, var13, var14, var16)) {
                     return true;
                  }

                  var9 = (var9 - 1 + var6) % var6;
                  if(var9 == var10) {
                     var15 = 2;
                  }
               } else {
                  var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
                  var12 = this.hh(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
                  var13 = this.hh(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
                  var14 = var3[var10];
                  if(this.wh(var11, var12, var13, var14, var16)) {
                     return true;
                  }

                  var10 = (var10 + 1) % var6;
                  if(var9 == var10) {
                     var15 = 2;
                  }
               }
            } else if(var2[var8] < var4[var9]) {
               if(var2[var8] < var4[var10]) {
                  var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var2[var8]);
                  var12 = var1[var8];
                  var13 = this.hh(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var8]);
                  var14 = this.hh(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var8]);
                  if(this.wh(var11, var12, var13, var14, var16)) {
                     return true;
                  }

                  var8 = (var8 + 1) % var5;
                  if(var7 == var8) {
                     var15 = 1;
                  }
               } else {
                  var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
                  var12 = this.hh(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
                  var13 = this.hh(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
                  var14 = var3[var10];
                  if(this.wh(var11, var12, var13, var14, var16)) {
                     return true;
                  }

                  var10 = (var10 + 1) % var6;
                  if(var9 == var10) {
                     var15 = 2;
                  }
               }
            } else if(var4[var9] < var4[var10]) {
               var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
               var12 = this.hh(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
               var13 = var3[var9];
               var14 = this.hh(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var4[var9]);
               if(this.wh(var11, var12, var13, var14, var16)) {
                  return true;
               }

               var9 = (var9 - 1 + var6) % var6;
               if(var9 == var10) {
                  var15 = 2;
               }
            } else {
               var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
               var12 = this.hh(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
               var13 = this.hh(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
               var14 = var3[var10];
               if(this.wh(var11, var12, var13, var14, var16)) {
                  return true;
               }

               var10 = (var10 + 1) % var6;
               if(var9 == var10) {
                  var15 = 2;
               }
            }
         }

         while(var15 == 1) {
            if(var2[var7] < var4[var9]) {
               if(var2[var7] < var4[var10]) {
                  var11 = var1[var7];
                  var13 = this.hh(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var7]);
                  var14 = this.hh(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var7]);
                  if(this.lh(var13, var14, var11, !var16)) {
                     return true;
                  }

                  return false;
               }

               var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
               var12 = this.hh(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
               var13 = this.hh(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
               var14 = var3[var10];
               if(this.wh(var11, var12, var13, var14, var16)) {
                  return true;
               }

               var10 = (var10 + 1) % var6;
               if(var9 == var10) {
                  var15 = 0;
               }
            } else if(var4[var9] < var4[var10]) {
               var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
               var12 = this.hh(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
               var13 = var3[var9];
               var14 = this.hh(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var4[var9]);
               if(this.wh(var11, var12, var13, var14, var16)) {
                  return true;
               }

               var9 = (var9 - 1 + var6) % var6;
               if(var9 == var10) {
                  var15 = 0;
               }
            } else {
               var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var10]);
               var12 = this.hh(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var10]);
               var13 = this.hh(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var4[var10]);
               var14 = var3[var10];
               if(this.wh(var11, var12, var13, var14, var16)) {
                  return true;
               }

               var10 = (var10 + 1) % var6;
               if(var9 == var10) {
                  var15 = 0;
               }
            }
         }

         while(var15 == 2) {
            if(var4[var9] < var2[var7]) {
               if(var4[var9] < var2[var8]) {
                  var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
                  var12 = this.hh(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
                  var13 = var3[var9];
                  if(this.lh(var11, var12, var13, var16)) {
                     return true;
                  }

                  return false;
               }

               var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var2[var8]);
               var12 = var1[var8];
               var13 = this.hh(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var8]);
               var14 = this.hh(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var8]);
               if(this.wh(var11, var12, var13, var14, var16)) {
                  return true;
               }

               var8 = (var8 + 1) % var5;
               if(var7 == var8) {
                  var15 = 0;
               }
            } else if(var2[var7] < var2[var8]) {
               var11 = var1[var7];
               var12 = this.hh(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var2[var7]);
               var13 = this.hh(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var7]);
               var14 = this.hh(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var7]);
               if(this.wh(var11, var12, var13, var14, var16)) {
                  return true;
               }

               var7 = (var7 - 1 + var5) % var5;
               if(var7 == var8) {
                  var15 = 0;
               }
            } else {
               var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var2[var8]);
               var12 = var1[var8];
               var13 = this.hh(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var8]);
               var14 = this.hh(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var8]);
               if(this.wh(var11, var12, var13, var14, var16)) {
                  return true;
               }

               var8 = (var8 + 1) % var5;
               if(var7 == var8) {
                  var15 = 0;
               }
            }
         }

         if(var2[var7] < var4[var9]) {
            var11 = var1[var7];
            var13 = this.hh(var3[(var9 + 1) % var6], var4[(var9 + 1) % var6], var3[var9], var4[var9], var2[var7]);
            var14 = this.hh(var3[(var10 - 1 + var6) % var6], var4[(var10 - 1 + var6) % var6], var3[var10], var4[var10], var2[var7]);
            if(this.lh(var13, var14, var11, !var16)) {
               return true;
            } else {
               return false;
            }
         } else {
            var11 = this.hh(var1[(var7 + 1) % var5], var2[(var7 + 1) % var5], var1[var7], var2[var7], var4[var9]);
            var12 = this.hh(var1[(var8 - 1 + var5) % var5], var2[(var8 - 1 + var5) % var5], var1[var8], var2[var8], var4[var9]);
            var13 = var3[var9];
            if(this.lh(var11, var12, var13, var16)) {
               return true;
            } else {
               return false;
            }
         }
      }
   }
}
