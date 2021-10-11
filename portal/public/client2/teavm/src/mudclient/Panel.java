package mudclient;

public class Panel {
   protected Surface me;
   int ne;
   int oe;
   boolean[] pe;
   boolean[] qe;
   boolean[] re;
   boolean[] se;
   boolean[] te;
   public int[] controlFlashText;
   public int[] ve;
   public int[] we;
   public int[] xe;
   boolean[] ye;
   int[] ze;
   int[] af;
   int[] bf;
   int[] cf;
   int[] df;
   int[] ef;
   int[] ff;
   String[] gf;
   String[][] hf;
   int _if;
   int jf;
   int kf;
   int lf;
   int mf = -1;
   int nf;
   int of;
   int pf;
   int qf;
   int rf;
   int sf;
   int tf;
   int uf;
   int vf;
   int wf;
   int xf;
   int yf;
   int zf;
   int ag;
   public boolean bg = true;
   public static boolean cg;
   public static boolean dg = true;
   public static int baseSpriteStart;
   public static int fg = 114;
   public static int gg = 114;
   public static int hg = 176;
   public static int textListEntryHeightMod;

   public Panel(Surface var1, int var2) {
      this.me = var1;
      this.oe = var2;
      this.pe = new boolean[var2];
      this.qe = new boolean[var2];
      this.re = new boolean[var2];
      this.se = new boolean[var2];
      this.ye = new boolean[var2];
      this.te = new boolean[var2];
      this.controlFlashText = new int[var2];
      this.ve = new int[var2];
      this.we = new int[var2];
      this.xe = new int[var2];
      this.ze = new int[var2];
      this.af = new int[var2];
      this.bf = new int[var2];
      this.cf = new int[var2];
      this.df = new int[var2];
      this.ef = new int[var2];
      this.ff = new int[var2];
      this.gf = new String[var2];
      this.hf = new String[var2][];
      this.pf = this.uc(114, 114, 176);
      this.qf = this.uc(14, 14, 62);
      this.rf = this.uc(200, 208, 232);
      this.sf = this.uc(96, 129, 184);
      this.tf = this.uc(53, 95, 115);
      this.uf = this.uc(117, 142, 171);
      this.vf = this.uc(98, 122, 158);
      this.wf = this.uc(86, 100, 136);
      this.xf = this.uc(135, 146, 179);
      this.yf = this.uc(97, 112, 151);
      this.zf = this.uc(88, 102, 136);
      this.ag = this.uc(84, 93, 120);
   }

   public int uc(int var1, int var2, int var3) {
      return Surface.rgb2long(fg * var1 / 114, gg * var2 / 114, hg * var3 / 176);
   }

   public void bd(int var1) {
      this.pe[var1] = true;
   }

   public void nd(int var1) {
      this.pe[var1] = false;
   }

   public void kd() {
      this.kf = 0;
   }

   public void handleMouse(int var1, int var2, int var3, int var4) {
      this._if = var1 - this.nf;
      this.jf = var2 - this.of;
      this.lf = var4;
      if(var3 != 0) {
         this.kf = var3;
      }

      if(var3 == 1) {
         for(int var5 = 0; var5 < this.ne; ++var5) {
            if(this.pe[var5] && this.bf[var5] == 10 && this._if >= this.ze[var5] && this.jf >= this.af[var5] && this._if <= this.ze[var5] + this.cf[var5] && this.jf <= this.af[var5] + this.df[var5]) {
               this.se[var5] = true;
            }
         }
      }

   }

   public boolean isClicked(int var1) {
      if(this.pe[var1] && this.se[var1]) {
         this.se[var1] = false;
         return true;
      } else {
         return false;
      }
   }

   public void keyPress(int var1) {
	   if (var1 == 0) {
		      return;
		    }
		    if ((this.mf != -1) && (this.gf[this.mf] != null) && (this.pe[this.mf]))
		    {
		      int i = this.gf[this.mf].length();
		      if ((var1 == 8) && (i > 0)) {
		        this.gf[this.mf] = this.gf[this.mf].substring(0, i - 1);
		      }
		      if (((var1 == 10) || (var1 == 13)) && (i > 0)) {
		        this.se[this.mf] = true;
		      }
		      String str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!\"£$%^&*()-_=+[{]};:'@#~,<.>/?\\| ";
		      if (i < this.ef[this.mf]) {
		        for (int j = 0; j < str.length(); j++) {
		          if (var1 == str.charAt(j))
		          {
		            int tmp155_152 = this.mf;
		            String[] tmp155_148 = this.gf;
		            tmp155_148[tmp155_152] = (tmp155_148[tmp155_152] + (char)var1);
		          }
		        }
		      }
		      this.te[this.mf] = true;
		      if (var1 == 9)
		      {
		        for (;;)
		        {
		          this.mf = ((this.mf + 1) % this.ne);
		          if (this.bf[this.mf] != 5) {
		            if (this.bf[this.mf] == 6) {
		              break;
		            }
		          }
		        }
		        this.te[this.mf] = true;
		      }
		    }
   }

   public void setFocus(int var1) {
      this.mf = var1;
   }

   public void tc(int var1, int var2, int var3, int var4) {
      if(cg) {
         this.me.setBounds(var1, var2, var3, var4);

         for(int var5 = 0; var5 < this.ne; ++var5) {
            if(this.pe[var5]) {
               if(this.bf[var5] == 0) {
                  this.dd(var5, this.ze[var5], this.af[var5], this.gf[var5], this.ff[var5]);
               } else if(this.bf[var5] == 1) {
                  this.dd(var5, this.ze[var5] - this.me.textWidth(this.gf[var5], this.ff[var5]) / 2, this.af[var5], this.gf[var5], this.ff[var5]);
               } else if(this.bf[var5] == 2) {
                  this.ed(this.ze[var5], this.af[var5], this.cf[var5], this.df[var5]);
               } else if(this.bf[var5] == 3) {
                  this.sc(this.ze[var5], this.af[var5], this.cf[var5]);
               } else if(this.bf[var5] == 11) {
                  this.cd(this.ze[var5], this.af[var5], this.cf[var5], this.df[var5]);
               } else if(this.bf[var5] == 12) {
                  this.wc(this.ze[var5], this.af[var5], this.ff[var5]);
               }
            }
         }

         this.me.mf();
      }

   }

   public void drawPanel() {
      for(int var1 = 0; var1 < this.ne; ++var1) {
         if(this.pe[var1]) {
            if(!cg) {
               if(this.bf[var1] == 0) {
                  this.dd(var1, this.ze[var1], this.af[var1], this.gf[var1], this.ff[var1]);
               } else if(this.bf[var1] == 1) {
                  this.dd(var1, this.ze[var1] - this.me.textWidth(this.gf[var1], this.ff[var1]) / 2, this.af[var1], this.gf[var1], this.ff[var1]);
               } else if(this.bf[var1] == 2) {
                  this.ed(this.ze[var1], this.af[var1], this.cf[var1], this.df[var1]);
               } else if(this.bf[var1] == 3) {
                  this.sc(this.ze[var1], this.af[var1], this.cf[var1]);
               } else if(this.bf[var1] == 11) {
                  this.cd(this.ze[var1], this.af[var1], this.cf[var1], this.df[var1]);
               } else if(this.bf[var1] == 12) {
                  this.wc(this.ze[var1], this.af[var1], this.ff[var1]);
               }
            }

            if(this.bf[var1] == 4) {
               this.zc(var1, this.ze[var1], this.af[var1], this.cf[var1], this.df[var1], this.ff[var1], this.hf[var1], this.ve[var1], this.controlFlashText[var1]);
            } else if(this.bf[var1] != 5 && this.bf[var1] != 6) {
               if(this.bf[var1] == 7) {
                  this.mc(var1, this.ze[var1], this.af[var1], this.ff[var1], this.hf[var1]);
               } else if(this.bf[var1] == 8) {
                  this.zb(var1, this.ze[var1], this.af[var1], this.ff[var1], this.hf[var1]);
               } else if(this.bf[var1] == 9) {
                  this.dc(var1, this.ze[var1], this.af[var1], this.cf[var1], this.df[var1], this.ff[var1], this.hf[var1], this.ve[var1], this.controlFlashText[var1]);
               }
            } else {
               this.pc(var1, this.ze[var1], this.af[var1], this.cf[var1], this.df[var1], this.gf[var1], this.ff[var1]);
            }
         }
      }

      this.kf = 0;
   }

   public int rc(int var1) {
      return this.we[var1];
   }

   public int getListEntryIndex(int var1) {
      int var2 = this.xe[var1];
      return var2;
   }

   protected void dd(int var1, int var2, int var3, String var4, int var5) {
      int var6 = var3 + this.me.textHeight(var5) / 3;
      this.fd(var1, var2, var6, var4, var5);
   }

   protected void fd(int var1, int var2, int var3, String var4, int var5) {
      int var6;
      if(this.ye[var1]) {
         var6 = 16777215;
      } else {
         var6 = 0;
      }

      this.me.drawString(var4, var2, var3, var5, var6);
   }

   protected void pc(int var1, int var2, int var3, int var4, int var5, String var6, int var7) {
      int var8;
      if(this.re[var1]) {
         var8 = var6.length();
         var6 = "";

         for(int var9 = 0; var9 < var8; ++var9) {
            var6 = var6 + "X";
         }
      }

      if(this.bf[var1] == 5) {
         if(this.kf == 1 && this._if >= var2 && this.jf >= var3 - var5 / 2 && this._if <= var2 + var4 && this.jf <= var3 + var5 / 2) {
            this.te[this.mf] = true;
            this.te[var1] = true;
            this.mf = var1;
         }

         if(this.te[var1]) {
            this.tc(var2, var3 - var5 / 2, var2 + var4, var3 + var5 / 2);
            this.te[var1] = false;
         }
      } else if(this.bf[var1] == 6) {
         if(this.kf == 1 && this._if >= var2 - var4 / 2 && this.jf >= var3 - var5 / 2 && this._if <= var2 + var4 / 2 && this.jf <= var3 + var5 / 2) {
            this.te[this.mf] = true;
            this.te[var1] = true;
            this.mf = var1;
         }

         if(this.te[var1]) {
            this.tc(var2 - var4 / 2, var3 - var5 / 2, var2 + var4 / 2, var3 + var5 / 2);
            this.te[var1] = false;
         }

         var2 -= this.me.textWidth(var6, var7) / 2;
      }

      if(this.mf == var1) {
         var6 = var6 + "*";
      }

      var8 = var3 + this.me.textHeight(var7) / 3;
      this.fd(var1, var2, var8, var6, var7);
   }

   public void ed(int var1, int var2, int var3, int var4) {
      this.me.setBounds(var1, var2, var1 + var3, var2 + var4);
      this.me.ag(var1, var2, var3, var4, this.ag, this.xf);
      if(dg) {
         for(int var5 = var1 - (var2 & 63); var5 < var1 + var3; var5 += 128) {
            for(int var6 = var2 - (var2 & 31); var6 < var2 + var4; var6 += 128) {
               this.me.vf(var5, var6, 6 + baseSpriteStart);
            }
         }
      }

      this.me.drawLineHoriz(var1, var2, var3, this.xf);
      this.me.drawLineHoriz(var1 + 1, var2 + 1, var3 - 2, this.xf);
      this.me.drawLineHoriz(var1 + 2, var2 + 2, var3 - 4, this.yf);
      this.me.drawLineVert(var1, var2, var4, this.xf);
      this.me.drawLineVert(var1 + 1, var2 + 1, var4 - 2, this.xf);
      this.me.drawLineVert(var1 + 2, var2 + 2, var4 - 4, this.yf);
      this.me.drawLineHoriz(var1, var2 + var4 - 1, var3, this.ag);
      this.me.drawLineHoriz(var1 + 1, var2 + var4 - 2, var3 - 2, this.ag);
      this.me.drawLineHoriz(var1 + 2, var2 + var4 - 3, var3 - 4, this.zf);
      this.me.drawLineVert(var1 + var3 - 1, var2, var4, this.ag);
      this.me.drawLineVert(var1 + var3 - 2, var2 + 1, var4 - 2, this.ag);
      this.me.drawLineVert(var1 + var3 - 3, var2 + 2, var4 - 4, this.zf);
      this.me.mf();
   }

   public void cd(int var1, int var2, int var3, int var4) {
      this.me.drawBox(var1, var2, var3, var4, 0);
      this.me.drawBoxEdge(var1, var2, var3, var4, this.uf);
      this.me.drawBoxEdge(var1 + 1, var2 + 1, var3 - 2, var4 - 2, this.vf);
      this.me.drawBoxEdge(var1 + 2, var2 + 2, var3 - 4, var4 - 4, this.wf);
      this.me.drawSprite(var1, var2, 2 + baseSpriteStart);
      this.me.drawSprite(var1 + var3 - 7, var2, 3 + baseSpriteStart);
      this.me.drawSprite(var1, var2 + var4 - 7, 4 + baseSpriteStart);
      this.me.drawSprite(var1 + var3 - 7, var2 + var4 - 7, 5 + baseSpriteStart);
   }

   protected void wc(int var1, int var2, int var3) {
      this.me.drawSprite(var1, var2, var3);
   }

   protected void sc(int var1, int var2, int var3) {
      this.me.drawLineHoriz(var1, var2, var3, 0);
   }

   protected void zc(int var1, int var2, int var3, int var4, int var5, int var6, String[] var7, int var8, int var9) {
      int var10 = var5 / this.me.textHeight(var6);
      if(var9 > var8 - var10) {
         var9 = var8 - var10;
      }

      if(var9 < 0) {
         var9 = 0;
      }

      this.controlFlashText[var1] = var9;
      int var11;
      int var12;
      int var13;
      if(var10 < var8) {
         var11 = var2 + var4 - 12;
         var12 = (var5 - 27) * var10 / var8;
         if(var12 < 6) {
            var12 = 6;
         }

         var13 = (var5 - 27 - var12) * var9 / (var8 - var10);
         if(this.lf == 1 && this._if >= var11 && this._if <= var11 + 12) {
            if(this.jf > var3 && this.jf < var3 + 12 && var9 > 0) {
               --var9;
            }

            if(this.jf > var3 + var5 - 12 && this.jf < var3 + var5 && var9 < var8 - var10) {
               ++var9;
            }

            this.controlFlashText[var1] = var9;
            this.te[var1] = true;
         }

         if(this.lf == 1 && (this._if >= var11 && this._if <= var11 + 12 || this._if >= var11 - 12 && this._if <= var11 + 24 && this.qe[var1])) {
            if(this.jf > var3 + 12 && this.jf < var3 + var5 - 12) {
               this.qe[var1] = true;
               int var14 = this.jf - var3 - 12 - var12 / 2;
               var9 = var14 * var8 / (var5 - 24);
               if(var9 > var8 - var10) {
                  var9 = var8 - var10;
               }

               if(var9 < 0) {
                  var9 = 0;
               }

               this.controlFlashText[var1] = var9;
               this.te[var1] = true;
            }
         } else {
            this.qe[var1] = false;
         }

         if(this.te[var1]) {
            this.tc(var2, var3, var2 + var4, var3 + var5);
            this.te[var1] = false;
         }

         var13 = (var5 - 27 - var12) * var9 / (var8 - var10);
         this.jd(var2, var3, var4, var5, var13, var12);
      }

      if(this.te[var1]) {
         this.tc(var2, var3, var2 + var4, var3 + var5);
         this.te[var1] = false;
      }

      var11 = var5 - var10 * this.me.textHeight(var6);
      var12 = var3 + this.me.textHeight(var6) * 5 / 6 + var11 / 2;

      for(var13 = var9; var13 < var8; ++var13) {
         this.fd(var1, var2 + 2, var12, var7[var13], var6);
         var12 += this.me.textHeight(var6) - textListEntryHeightMod;
         if(var12 >= var3 + var5) {
            return;
         }
      }

   }

   protected void jd(int var1, int var2, int var3, int var4, int var5, int var6) {
      int var7 = var1 + var3 - 12;
      this.me.drawBoxEdge(var7, var2, 12, var4, 0);
      this.me.drawSprite(var7 + 1, var2 + 1, baseSpriteStart);
      this.me.drawSprite(var7 + 1, var2 + var4 - 12, 1 + baseSpriteStart);
      this.me.drawLineHoriz(var7, var2 + 13, 12, 0);
      this.me.drawLineHoriz(var7, var2 + var4 - 13, 12, 0);
      this.me.ag(var7 + 1, var2 + 14, 11, var4 - 27, this.pf, this.qf);
      this.me.drawBox(var7 + 3, var5 + var2 + 14, 7, var6, this.sf);
      this.me.drawLineVert(var7 + 2, var5 + var2 + 14, var6, this.rf);
      this.me.drawLineVert(var7 + 2 + 8, var5 + var2 + 14, var6, this.tf);
   }

   protected void mc(int var1, int var2, int var3, int var4, String[] var5) {
      int var6 = 0;
      int var7 = var5.length;

      for(int var8 = 0; var8 < var7; ++var8) {
         var6 += this.me.textWidth(var5[var8], var4);
         if(var8 < var7 - 1) {
            var6 += this.me.textWidth("  ", var4);
         }
      }

      int var9 = var2 - var6 / 2;
      int var10 = var3 + this.me.textHeight(var4) / 3;

      for(int var11 = 0; var11 < var7; ++var11) {
         int var12;
         if(this.ye[var1]) {
            var12 = 16777215;
         } else {
            var12 = 0;
         }

         if(this._if >= var9 && this._if <= var9 + this.me.textWidth(var5[var11], var4) && this.jf <= var10 && this.jf > var10 - this.me.textHeight(var4)) {
            if(this.ye[var1]) {
               var12 = 8421504;
            } else {
               var12 = 16777215;
            }

            if(this.kf == 1) {
               this.we[var1] = var11;
               this.se[var1] = true;
            }
         }

         if(this.we[var1] == var11) {
            if(this.ye[var1]) {
               var12 = 16711680;
            } else {
               var12 = 12582912;
            }
         }

         this.me.drawString(var5[var11], var9, var10, var4, var12);
         var9 += this.me.textWidth(var5[var11] + "  ", var4);
      }

   }

   protected void zb(int var1, int var2, int var3, int var4, String[] var5) {
      int var6 = var5.length;
      int var7 = var3 - this.me.textHeight(var4) * (var6 - 1) / 2;

      for(int var8 = 0; var8 < var6; ++var8) {
         int var9;
         if(this.ye[var1]) {
            var9 = 16777215;
         } else {
            var9 = 0;
         }

         int var10 = this.me.textWidth(var5[var8], var4);
         if(this._if >= var2 - var10 / 2 && this._if <= var2 + var10 / 2 && this.jf - 2 <= var7 && this.jf - 2 > var7 - this.me.textHeight(var4)) {
            if(this.ye[var1]) {
               var9 = 8421504;
            } else {
               var9 = 16777215;
            }

            if(this.kf == 1) {
               this.we[var1] = var8;
               this.se[var1] = true;
            }
         }

         if(this.we[var1] == var8) {
            if(this.ye[var1]) {
               var9 = 16711680;
            } else {
               var9 = 12582912;
            }
         }

         this.me.drawString(var5[var8], var2 - var10 / 2, var7, var4, var9);
         var7 += this.me.textHeight(var4);
      }

   }

   protected void dc(int var1, int var2, int var3, int var4, int var5, int var6, String[] var7, int var8, int var9) {
      int var10 = var5 / this.me.textHeight(var6);
      int var11;
      int var12;
      int var13;
      int var14;
      if(var10 < var8) {
         var11 = var2 + var4 - 12;
         var12 = (var5 - 27) * var10 / var8;
         if(var12 < 6) {
            var12 = 6;
         }

         var13 = (var5 - 27 - var12) * var9 / (var8 - var10);
         if(this.lf == 1 && this._if >= var11 && this._if <= var11 + 12) {
            if(this.jf > var3 && this.jf < var3 + 12 && var9 > 0) {
               --var9;
            }

            if(this.jf > var3 + var5 - 12 && this.jf < var3 + var5 && var9 < var8 - var10) {
               ++var9;
            }

            this.controlFlashText[var1] = var9;
            this.te[var1] = true;
         }

         if(this.lf != 1 || (this._if < var11 || this._if > var11 + 12) && (this._if < var11 - 12 || this._if > var11 + 24 || !this.qe[var1])) {
            this.qe[var1] = false;
         } else if(this.jf > var3 + 12 && this.jf < var3 + var5 - 12) {
            this.qe[var1] = true;
            var14 = this.jf - var3 - 12 - var12 / 2;
            var9 = var14 * var8 / (var5 - 24);
            if(var9 < 0) {
               var9 = 0;
            }

            if(var9 > var8 - var10) {
               var9 = var8 - var10;
            }

            this.controlFlashText[var1] = var9;
            this.te[var1] = true;
         }

         if(this.te[var1]) {
            this.tc(var2, var3, var2 + var4, var3 + var5);
            this.te[var1] = false;
         }

         var13 = (var5 - 27 - var12) * var9 / (var8 - var10);
         this.jd(var2, var3, var4, var5, var13, var12);
      } else {
         var9 = 0;
         this.controlFlashText[var1] = 0;
      }

      if(this.te[var1]) {
         this.tc(var2, var3, var2 + var4, var3 + var5);
         this.te[var1] = false;
      }

      this.xe[var1] = -1;
      var11 = var5 - var10 * this.me.textHeight(var6);
      var12 = var3 + this.me.textHeight(var6) * 5 / 6 + var11 / 2;

      for(var13 = var9; var13 < var8; ++var13) {
         if(this.ye[var1]) {
            var14 = 16777215;
         } else {
            var14 = 0;
         }

         if(this._if >= var2 + 2 && this._if <= var2 + 2 + this.me.textWidth(var7[var13], var6) && this.jf - 2 <= var12 && this.jf - 2 > var12 - this.me.textHeight(var6)) {
            if(this.ye[var1]) {
               var14 = 8421504;
            } else {
               var14 = 16777215;
            }

            this.xe[var1] = var13;
            if(this.kf == 1) {
               this.we[var1] = var13;
               this.se[var1] = true;
            }
         }

         if(this.we[var1] == var13 && this.bg) {
            var14 = 16711680;
         }

         this.me.drawString(var7[var13], var2 + 2, var12, var6, var14);
         var12 += this.me.textHeight(var6);
         if(var12 >= var3 + var5) {
            return;
         }
      }

   }

   public int addText(int var1, int var2, String var3, int var4, boolean var5) {
      this.bf[this.ne] = 1;
      this.pe[this.ne] = true;
      this.se[this.ne] = false;
      this.ff[this.ne] = var4;
      this.ye[this.ne] = var5;
      this.ze[this.ne] = var1;
      this.af[this.ne] = var2;
      this.gf[this.ne] = var3;
      return this.ne++;
   }

   public void updateText(int var1, String var2) {
      this.gf[var1] = var2;
      this.te[var1] = true;
   }

   public String oc(int var1) {
      return this.gf[var1] == null?"null":this.gf[var1];
   }

   public int addButtonBackground(int var1, int var2, int var3, int var4) {
      this.bf[this.ne] = 2;
      this.pe[this.ne] = true;
      this.se[this.ne] = false;
      this.ze[this.ne] = var1 - var3 / 2;
      this.af[this.ne] = var2 - var4 / 2;
      this.cf[this.ne] = var3;
      this.df[this.ne] = var4;
      return this.ne++;
   }

   public int gc(int var1, int var2, int var3, int var4) {
      this.bf[this.ne] = 11;
      this.pe[this.ne] = true;
      this.se[this.ne] = false;
      this.ze[this.ne] = var1;
      this.af[this.ne] = var2;
      this.cf[this.ne] = var3;
      this.df[this.ne] = var4;
      return this.ne++;
   }

   public int addBoxRounded(int var1, int var2, int var3, int var4) {
      this.bf[this.ne] = 11;
      this.pe[this.ne] = true;
      this.se[this.ne] = false;
      this.ze[this.ne] = var1 - var3 / 2;
      this.af[this.ne] = var2 - var4 / 2;
      this.cf[this.ne] = var3;
      this.df[this.ne] = var4;
      return this.ne++;
   }

   public int addSprite(int var1, int var2, int var3) {
      int var4 = this.me.fk[var3];
      int var5 = this.me.gk[var3];
      this.bf[this.ne] = 12;
      this.pe[this.ne] = true;
      this.se[this.ne] = false;
      this.ze[this.ne] = var1 - var4 / 2;
      this.af[this.ne] = var2 - var5 / 2;
      this.cf[this.ne] = var4;
      this.df[this.ne] = var5;
      this.ff[this.ne] = var3;
      return this.ne++;
   }

   public int addTextList(int var1, int var2, int var3, int var4, int var5, int var6, boolean var7) {
      this.bf[this.ne] = 4;
      this.pe[this.ne] = true;
      this.se[this.ne] = false;
      this.ze[this.ne] = var1;
      this.af[this.ne] = var2;
      this.cf[this.ne] = var3;
      this.df[this.ne] = var4;
      this.ye[this.ne] = var7;
      this.ff[this.ne] = var5;
      this.ef[this.ne] = var6;
      this.ve[this.ne] = 0;
      this.controlFlashText[this.ne] = 0;
      this.hf[this.ne] = new String[var6];
      return this.ne++;
   }

   public void removeListEntry(int var1, String var2, boolean var3) {
      int var4 = this.ve[var1]++;
      if(var4 >= this.ef[var1]) {
         --var4;
         --this.ve[var1];

         for(int var5 = 0; var5 < var4; ++var5) {
            this.hf[var1][var5] = this.hf[var1][var5 + 1];
         }
      }

      this.hf[var1][var4] = var2;
      if(var3) {
         this.controlFlashText[var1] = 999999;
      }

      this.te[var1] = true;
   }

   public int addTextListInput(int var1, int var2, int var3, int var4, int var5, int var6, boolean var7, boolean var8) {
      this.bf[this.ne] = 5;
      this.pe[this.ne] = true;
      this.re[this.ne] = var7;
      this.se[this.ne] = false;
      this.ff[this.ne] = var5;
      this.ye[this.ne] = var8;
      this.ze[this.ne] = var1;
      this.af[this.ne] = var2;
      this.cf[this.ne] = var3;
      this.df[this.ne] = var4;
      this.ef[this.ne] = var6;
      this.gf[this.ne] = "";
      return this.ne++;
   }

   public int vc(int var1, int var2, int var3, int var4, int var5, int var6, boolean var7, boolean var8) {
      this.bf[this.ne] = 6;
      this.pe[this.ne] = true;
      this.re[this.ne] = var7;
      this.se[this.ne] = false;
      this.ff[this.ne] = var5;
      this.ye[this.ne] = var8;
      this.ze[this.ne] = var1;
      this.af[this.ne] = var2;
      this.cf[this.ne] = var3;
      this.df[this.ne] = var4;
      this.ef[this.ne] = var6;
      this.gf[this.ne] = "";
      return this.ne++;
   }

   public int qc(int var1, int var2, String[] var3, int var4, boolean var5) {
      this.bf[this.ne] = 7;
      this.pe[this.ne] = true;
      this.se[this.ne] = false;
      this.ff[this.ne] = var4;
      this.ye[this.ne] = var5;
      this.ze[this.ne] = var1;
      this.af[this.ne] = var2;
      this.hf[this.ne] = var3;
      this.we[this.ne] = 0;
      return this.ne++;
   }

   public int ac(int var1, int var2, String[] var3, int var4, boolean var5) {
      this.bf[this.ne] = 8;
      this.pe[this.ne] = true;
      this.se[this.ne] = false;
      this.ff[this.ne] = var4;
      this.ye[this.ne] = var5;
      this.ze[this.ne] = var1;
      this.af[this.ne] = var2;
      this.hf[this.ne] = var3;
      this.we[this.ne] = 0;
      return this.ne++;
   }

   public int addTextListenerInteractive(int var1, int var2, int var3, int var4, int var5, int var6, boolean var7) {
      this.bf[this.ne] = 9;
      this.pe[this.ne] = true;
      this.se[this.ne] = false;
      this.ff[this.ne] = var5;
      this.ye[this.ne] = var7;
      this.ze[this.ne] = var1;
      this.af[this.ne] = var2;
      this.cf[this.ne] = var3;
      this.df[this.ne] = var4;
      this.ef[this.ne] = var6;
      this.hf[this.ne] = new String[var6];
      this.ve[this.ne] = 0;
      this.controlFlashText[this.ne] = 0;
      this.we[this.ne] = -1;
      this.xe[this.ne] = -1;
      return this.ne++;
   }

   public void clearList(int var1) {
      this.ve[var1] = 0;
      this.te[var1] = true;
   }

   public void resetListProps(int var1) {
      this.controlFlashText[var1] = 0;
      this.xe[var1] = -1;
   }

   public void addListEntry(int var1, int var2, String var3) {
      this.hf[var1][var2] = var3;
      if(var2 + 1 > this.ve[var1]) {
         this.ve[var1] = var2 + 1;
      }

      this.te[var1] = true;
   }

   public int addButton(int var1, int var2, int var3, int var4) {
      this.bf[this.ne] = 10;
      this.pe[this.ne] = true;
      this.se[this.ne] = false;
      this.ze[this.ne] = var1 - var3 / 2;
      this.af[this.ne] = var2 - var4 / 2;
      this.cf[this.ne] = var3;
      this.df[this.ne] = var4;
      return this.ne++;
   }
}
