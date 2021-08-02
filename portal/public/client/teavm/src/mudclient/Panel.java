package mudclient;

// $FF: renamed from: a.a.e
public class Panel {

   // $FF: renamed from: a a.a.g
   protected Surface field_761;
   // $FF: renamed from: b int
   int field_762;
   // $FF: renamed from: c int
   int field_763;
   // $FF: renamed from: d boolean[]
   public boolean[] field_764;
   // $FF: renamed from: e boolean[]
   public boolean[] field_765;
   // $FF: renamed from: f boolean[]
   public boolean[] field_766;
   // $FF: renamed from: g boolean[]
   public boolean[] field_767;
   // $FF: renamed from: h int[]
   public int[] controlFlashText;
   // $FF: renamed from: i int[]
   public int[] field_769;
   // $FF: renamed from: j int[]
   public int[] field_770;
   // $FF: renamed from: k int[]
   public int[] field_771;
   // $FF: renamed from: l boolean[]
   boolean[] field_772;
   // $FF: renamed from: m int[]
   int[] field_773;
   // $FF: renamed from: n int[]
   int[] field_774;
   // $FF: renamed from: o int[]
   int[] field_775;
   // $FF: renamed from: p int[]
   int[] field_776;
   // $FF: renamed from: q int[]
   int[] field_777;
   // $FF: renamed from: r int[]
   int[] field_778;
   // $FF: renamed from: s int[]
   int[] field_779;
   // $FF: renamed from: t java.lang.String[]
   String[] field_780;
   // $FF: renamed from: u java.lang.String[][]
   String[][] field_781;
   // $FF: renamed from: v int
   int field_782;
   // $FF: renamed from: w int
   int field_783;
   // $FF: renamed from: x int
   int field_784;
   // $FF: renamed from: y int
   int field_785;
   // $FF: renamed from: z int
   int field_786;
   // $FF: renamed from: A int
   int field_787;
   // $FF: renamed from: B int
   int field_788;
   // $FF: renamed from: C int
   int field_789;
   // $FF: renamed from: D int
   int field_790;
   // $FF: renamed from: E int
   int field_791;
   // $FF: renamed from: F int
   int field_792;
   // $FF: renamed from: G int
   int field_793;
   // $FF: renamed from: H int
   int field_794;
   // $FF: renamed from: I int
   int field_795;
   // $FF: renamed from: J int
   int field_796;
   // $FF: renamed from: K int
   int field_797;
   // $FF: renamed from: L int
   int field_798;
   // $FF: renamed from: M int
   int field_799;
   // $FF: renamed from: N boolean
   public boolean field_800;
   // $FF: renamed from: O boolean
   public static boolean drawBackgroundArrow;
   // $FF: renamed from: P int
   public static int baseSpriteStart;
   // $FF: renamed from: Q int
   public static int field_803;
   // $FF: renamed from: R int
   public static int field_804;
   // $FF: renamed from: S int
   public static int field_805;
   // $FF: renamed from: T int
   public static int field_806;


   // $FF: renamed from: <init> (a.a.g, int) void
   public Panel(Surface var1, int var2) {
      super();
      this.field_786 = -1;
      this.field_800 = true;
      this.field_761 = var1;
      this.field_763 = var2;
      this.field_764 = new boolean[var2];
      this.field_765 = new boolean[var2];
      this.field_766 = new boolean[var2];
      this.field_767 = new boolean[var2];
      this.field_772 = new boolean[var2];
      this.controlFlashText = new int[var2];
      this.field_769 = new int[var2];
      this.field_770 = new int[var2];
      this.field_771 = new int[var2];
      this.field_773 = new int[var2];
      this.field_774 = new int[var2];
      this.field_775 = new int[var2];
      this.field_776 = new int[var2];
      this.field_777 = new int[var2];
      this.field_778 = new int[var2];
      this.field_779 = new int[var2];
      this.field_780 = new String[var2];
      this.field_781 = new String[var2][];
      this.field_788 = this.method_274(114, 114, 176);
      this.field_789 = this.method_274(14, 14, 62);
      this.field_790 = this.method_274(200, 208, 232);
      this.field_791 = this.method_274(96, 129, 184);
      this.field_792 = this.method_274(53, 95, 115);
      this.field_793 = this.method_274(117, 142, 171);
      this.field_794 = this.method_274(98, 122, 158);
      this.field_795 = this.method_274(86, 100, 136);
      this.field_796 = this.method_274(135, 146, 179);
      this.field_797 = this.method_274(97, 112, 151);
      this.field_798 = this.method_274(88, 102, 136);
      this.field_799 = this.method_274(84, 93, 120);
   }

   // $FF: renamed from: a (int, int, int) int
   public int method_274(int var1, int var2, int var3) {
      return Surface.method_234(field_803 * var1 / 114, field_804 * var2 / 114, field_805 * var3 / 176);
   }

   // $FF: renamed from: a (int, int, int, int) void
   public void method_275(int var1, int var2, int var3, int var4) {
      boolean var6 = Surface.field_759;
      this.field_782 = var1;
      this.field_783 = var2;
      this.field_785 = var4;
      if(var3 != 0) {
         this.field_784 = var3;
      }

      int var5;
      if(var3 == 1) {
         var5 = 0;
         if(var6 || var5 < this.field_762) {
            do {
               if(this.field_764[var5] && this.field_775[var5] == 10 && this.field_782 >= this.field_773[var5] && this.field_783 >= this.field_774[var5] && this.field_782 <= this.field_773[var5] + this.field_776[var5] && this.field_783 <= this.field_774[var5] + this.field_777[var5]) {
                  this.field_767[var5] = true;
               }

               if(this.field_764[var5] && this.field_775[var5] == 14 && this.field_782 >= this.field_773[var5] && this.field_783 >= this.field_774[var5] && this.field_782 <= this.field_773[var5] + this.field_776[var5] && this.field_783 <= this.field_774[var5] + this.field_777[var5]) {
                  this.field_770[var5] = 1 - this.field_770[var5];
               }

               ++var5;
            } while(var5 < this.field_762);
         }
      }

      label81: {
         if(var4 == 1) {
            ++this.field_787;
            if(!var6) {
               break label81;
            }
         }

         this.field_787 = 0;
      }

      if(var3 == 1 || this.field_787 > 20) {
         var5 = 0;
         if(var6 || var5 < this.field_762) {
            do {
               if(this.field_764[var5] && this.field_775[var5] == 15 && this.field_782 >= this.field_773[var5] && this.field_783 >= this.field_774[var5] && this.field_782 <= this.field_773[var5] + this.field_776[var5] && this.field_783 <= this.field_774[var5] + this.field_777[var5]) {
                  this.field_767[var5] = true;
               }

               ++var5;
            } while(var5 < this.field_762);
         }

         this.field_787 -= 5;
      }

   }

   // $FF: renamed from: a (int) boolean
   public boolean method_276(int var1) {
      if(this.field_764[var1] && this.field_767[var1]) {
         this.field_767[var1] = false;
         return true;
      } else {
         return false;
      }
   }

   // $FF: renamed from: b (int) void
   public void method_277(int var1) {
      if(var1 != 0) {
         if(this.field_786 != -1 && this.field_780[this.field_786] != null && this.field_764[this.field_786]) {
            int var2 = this.field_780[this.field_786].length();
            if(var1 == 8 && var2 > 0) {
               this.field_780[this.field_786] = this.field_780[this.field_786].substring(0, var2 - 1);
            }

            if((var1 == 10 || var1 == 13) && var2 > 0) {
               this.field_767[this.field_786] = true;
            }

            String var3 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!\"£$%^&*()-_=+[{]};:\'@#~,<.>/?\\| ";
            if(var2 < this.field_778[this.field_786]) {
               int var4 = 0;
               if(Surface.field_759 || var4 < var3.length()) {
                  do {
                     if(var1 == var3.charAt(var4)) {
                        StringBuffer var10000 = new StringBuffer(String.valueOf(this.field_780[this.field_786]));
                        String[] var5 = this.field_780;
                        int var6 = this.field_786;
                        var5[var6] = var10000.append((char)var1).toString();
                     }

                     ++var4;
                  } while(var4 < var3.length());
               }
            }

            if(var1 == 9) {
               while(true) {
                  this.field_786 = (this.field_786 + 1) % this.field_762;
                  if(this.field_775[this.field_786] == 5) {
                     break;
                  }

                  if(this.field_775[this.field_786] == 6) {
                     return;
                  }
               }
            }
         }

      }
   }

   // $FF: renamed from: a () void
   public void drawPanel() {
      boolean var2 = Surface.field_759;
      int var1 = 0;
      if(!var2 && var1 >= this.field_762) {
         this.field_784 = 0;
      } else {
         do {
            if(this.field_764[var1]) {
               label86: {
                  if(this.field_775[var1] == 0) {
                     this.method_280(var1, this.field_773[var1], this.field_774[var1], this.field_780[var1], this.field_779[var1]);
                     if(!var2) {
                        break label86;
                     }
                  }

                  if(this.field_775[var1] == 1) {
                     this.method_280(var1, this.field_773[var1] - this.field_761.method_271(this.field_780[var1], this.field_779[var1]) / 2, this.field_774[var1], this.field_780[var1], this.field_779[var1]);
                     if(!var2) {
                        break label86;
                     }
                  }

                  if(this.field_775[var1] == 2) {
                     this.method_283(this.field_773[var1], this.field_774[var1], this.field_776[var1], this.field_777[var1]);
                     if(!var2) {
                        break label86;
                     }
                  }

                  if(this.field_775[var1] == 3) {
                     this.method_286(this.field_773[var1], this.field_774[var1], this.field_776[var1]);
                     if(!var2) {
                        break label86;
                     }
                  }

                  if(this.field_775[var1] == 4) {
                     this.method_287(var1, this.field_773[var1], this.field_774[var1], this.field_776[var1], this.field_777[var1], this.field_779[var1], this.field_781[var1], this.field_769[var1], this.controlFlashText[var1]);
                     if(!var2) {
                        break label86;
                     }
                  }

                  if(this.field_775[var1] == 5 || this.field_775[var1] == 6) {
                     this.method_282(var1, this.field_773[var1], this.field_774[var1], this.field_776[var1], this.field_777[var1], this.field_780[var1], this.field_779[var1]);
                     if(!var2) {
                        break label86;
                     }
                  }

                  if(this.field_775[var1] == 7) {
                     this.method_289(var1, this.field_773[var1], this.field_774[var1], this.field_779[var1], this.field_781[var1]);
                     if(!var2) {
                        break label86;
                     }
                  }

                  if(this.field_775[var1] == 8) {
                     this.method_290(var1, this.field_773[var1], this.field_774[var1], this.field_779[var1], this.field_781[var1]);
                     if(!var2) {
                        break label86;
                     }
                  }

                  if(this.field_775[var1] == 9) {
                     this.method_291(var1, this.field_773[var1], this.field_774[var1], this.field_776[var1], this.field_777[var1], this.field_779[var1], this.field_781[var1], this.field_769[var1], this.controlFlashText[var1]);
                     if(!var2) {
                        break label86;
                     }
                  }

                  if(this.field_775[var1] == 11) {
                     this.method_284(this.field_773[var1], this.field_774[var1], this.field_776[var1], this.field_777[var1]);
                     if(!var2) {
                        break label86;
                     }
                  }

                  if(this.field_775[var1] == 12) {
                     this.method_285(this.field_773[var1], this.field_774[var1], this.field_779[var1]);
                     if(!var2) {
                        break label86;
                     }
                  }

                  if(this.field_775[var1] == 14) {
                     this.method_279(var1, this.field_773[var1], this.field_774[var1], this.field_776[var1], this.field_777[var1]);
                  }
               }
            }

            ++var1;
         } while(var1 < this.field_762);

         this.field_784 = 0;
      }
   }

   // $FF: renamed from: a (int, int, int, int, int) void
   protected void method_279(int var1, int var2, int var3, int var4, int var5) {
      this.field_761.drawBox(var2, var3, var4, var5, 16777215);
      this.field_761.drawLineHoriz(var2, var3, var4, this.field_796);
      this.field_761.drawLineVert(var2, var3, var5, this.field_796);
      this.field_761.drawLineHoriz(var2, var3 + var5 - 1, var4, this.field_799);
      this.field_761.drawLineVert(var2 + var4 - 1, var3, var5, this.field_799);
      if(this.field_770[var1] == 1) {
         int var6 = 0;
         if(Surface.field_759 || var6 < var5) {
            do {
               this.field_761.drawLineHoriz(var2 + var6, var3 + var6, 1, 0);
               this.field_761.drawLineHoriz(var2 + var4 - 1 - var6, var3 + var6, 1, 0);
               ++var6;
            } while(var6 < var5);
         }
      }

   }

   // $FF: renamed from: a (int, int, int, java.lang.String, int) void
   protected void method_280(int var1, int var2, int var3, String var4, int var5) {
      int var6 = var3 + this.field_761.method_270(var5) / 3;
      this.method_281(var1, var2, var6, var4, var5);
   }

   // $FF: renamed from: b (int, int, int, java.lang.String, int) void
   protected void method_281(int var1, int var2, int var3, String var4, int var5) {
      int var6;
      label11: {
         if(this.field_772[var1]) {
            var6 = 16777215;
            if(!Surface.field_759) {
               break label11;
            }
         }

         var6 = 0;
      }

      this.field_761.drawString(var4, var2, var3, var5, var6);
   }

   // $FF: renamed from: a (int, int, int, int, int, java.lang.String, int) void
   protected void method_282(int var1, int var2, int var3, int var4, int var5, String var6, int var7) {
      boolean var10 = Surface.field_759;
      int var8;
      if(this.field_766[var1]) {
         var8 = var6.length();
         var6 = "";
         int var9 = 0;
         if(var10 || var9 < var8) {
            do {
               var6 = var6 + "X";
               ++var9;
            } while(var9 < var8);
         }
      }

      label48: {
         if(this.field_775[var1] == 5) {
            if(this.field_784 != 1 || this.field_782 < var2 || this.field_783 < var3 - var5 / 2 || this.field_782 > var2 + var4 || this.field_783 > var3 + var5 / 2) {
               break label48;
            }

            this.field_786 = var1;
            if(!var10) {
               break label48;
            }
         }

         if(this.field_775[var1] == 6) {
            if(this.field_784 == 1 && this.field_782 >= var2 - var4 / 2 && this.field_783 >= var3 - var5 / 2 && this.field_782 <= var2 + var4 / 2 && this.field_783 <= var3 + var5 / 2) {
               this.field_786 = var1;
            }

            var2 -= this.field_761.method_271(var6, var7) / 2;
         }
      }

      if(this.field_786 == var1) {
         var6 = var6 + "*";
      }

      var8 = var3 + this.field_761.method_270(var7) / 3;
      this.method_281(var1, var2, var8, var6, var7);
   }

   // $FF: renamed from: b (int, int, int, int) void
   public void method_283(int var1, int var2, int var3, int var4) {
      boolean var7 = Surface.field_759;
      this.field_761.setBounds(var1, var2, var1 + var3, var2 + var4);
      this.field_761.method_226(var1, var2, var3, var4, this.field_799, this.field_796);
      if(drawBackgroundArrow) {
         int var5 = var1 - (var2 & 63);
         if(var7 || var5 < var1 + var3) {
            do {
               int var6 = var2 - (var2 & 31);
               if(!var7 && var6 >= var2 + var4) {
                  var5 += 128;
               } else {
                  do {
                     this.field_761.drawSpriteAlpha(var5, var6, 6 + baseSpriteStart, 128);
                     var6 += 128;
                  } while(var6 < var2 + var4);

                  var5 += 128;
               }
            } while(var5 < var1 + var3);
         }
      }

      this.field_761.drawLineHoriz(var1, var2, var3, this.field_796);
      this.field_761.drawLineHoriz(var1 + 1, var2 + 1, var3 - 2, this.field_796);
      this.field_761.drawLineHoriz(var1 + 2, var2 + 2, var3 - 4, this.field_797);
      this.field_761.drawLineVert(var1, var2, var4, this.field_796);
      this.field_761.drawLineVert(var1 + 1, var2 + 1, var4 - 2, this.field_796);
      this.field_761.drawLineVert(var1 + 2, var2 + 2, var4 - 4, this.field_797);
      this.field_761.drawLineHoriz(var1, var2 + var4 - 1, var3, this.field_799);
      this.field_761.drawLineHoriz(var1 + 1, var2 + var4 - 2, var3 - 2, this.field_799);
      this.field_761.drawLineHoriz(var1 + 2, var2 + var4 - 3, var3 - 4, this.field_798);
      this.field_761.drawLineVert(var1 + var3 - 1, var2, var4, this.field_799);
      this.field_761.drawLineVert(var1 + var3 - 2, var2 + 1, var4 - 2, this.field_799);
      this.field_761.drawLineVert(var1 + var3 - 3, var2 + 2, var4 - 4, this.field_798);
      this.field_761.method_221();
   }

   // $FF: renamed from: c (int, int, int, int) void
   public void method_284(int var1, int var2, int var3, int var4) {
      this.field_761.drawBox(var1, var2, var3, var4, 0);
      this.field_761.drawBoxEdge(var1, var2, var3, var4, this.field_793);
      this.field_761.drawBoxEdge(var1 + 1, var2 + 1, var3 - 2, var4 - 2, this.field_794);
      this.field_761.drawBoxEdge(var1 + 2, var2 + 2, var3 - 4, var4 - 4, this.field_795);
      this.field_761.drawSprite(var1, var2, 2 + baseSpriteStart);
      this.field_761.drawSprite(var1 + var3 - 7, var2, 3 + baseSpriteStart);
      this.field_761.drawSprite(var1, var2 + var4 - 7, 4 + baseSpriteStart);
      this.field_761.drawSprite(var1 + var3 - 7, var2 + var4 - 7, 5 + baseSpriteStart);
   }

   // $FF: renamed from: b (int, int, int) void
   protected void method_285(int var1, int var2, int var3) {
      this.field_761.drawSprite(var1, var2, var3);
   }

   // $FF: renamed from: c (int, int, int) void
   protected void method_286(int var1, int var2, int var3) {
      this.field_761.drawLineHoriz(var1, var2, var3, 0);
   }

   // $FF: renamed from: a (int, int, int, int, int, int, java.lang.String[], int, int) void
   protected void method_287(int var1, int var2, int var3, int var4, int var5, int var6, String[] var7, int var8, int var9) {
      boolean var15 = Surface.field_759;
      int var10 = var5 / this.field_761.method_270(var6);
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
         if(this.field_785 == 1 && this.field_782 >= var11 && this.field_782 <= var11 + 12) {
            if(this.field_783 > var3 && this.field_783 < var3 + 12 && var9 > 0) {
               --var9;
            }

            if(this.field_783 > var3 + var5 - 12 && this.field_783 < var3 + var5 && var9 < var8 - var10) {
               ++var9;
            }

            this.controlFlashText[var1] = var9;
         }

         label83: {
            if(this.field_785 == 1 && (this.field_782 >= var11 && this.field_782 <= var11 + 12 || this.field_782 >= var11 - 12 && this.field_782 <= var11 + 24 && this.field_765[var1])) {
               if(this.field_783 <= var3 + 12 || this.field_783 >= var3 + var5 - 12) {
                  break label83;
               }

               this.field_765[var1] = true;
               int var14 = this.field_783 - var3 - 12 - var12 / 2;
               var9 = var14 * var8 / (var5 - 24);
               if(var9 > var8 - var10) {
                  var9 = var8 - var10;
               }

               if(var9 < 0) {
                  var9 = 0;
               }

               this.controlFlashText[var1] = var9;
               if(!var15) {
                  break label83;
               }
            }

            this.field_765[var1] = false;
         }

         var13 = (var5 - 27 - var12) * var9 / (var8 - var10);
         this.method_288(var2, var3, var4, var5, var13, var12);
      }

      var11 = var5 - var10 * this.field_761.method_270(var6);
      var12 = var3 + this.field_761.method_270(var6) * 5 / 6 + var11 / 2;
      var13 = var9;
      if(var15 || var9 < var8) {
         do {
            this.method_281(var1, var2 + 2, var12, var7[var13], var6);
            var12 += this.field_761.method_270(var6) - field_806;
            if(var12 >= var3 + var5) {
               return;
            }

            ++var13;
         } while(var13 < var8);

      }
   }

   // $FF: renamed from: a (int, int, int, int, int, int) void
   protected void method_288(int var1, int var2, int var3, int var4, int var5, int var6) {
      int var7 = var1 + var3 - 12;
      this.field_761.drawBoxEdge(var7, var2, 12, var4, 0);
      this.field_761.drawSprite(var7 + 1, var2 + 1, baseSpriteStart);
      this.field_761.drawSprite(var7 + 1, var2 + var4 - 12, 1 + baseSpriteStart);
      this.field_761.drawLineHoriz(var7, var2 + 13, 12, 0);
      this.field_761.drawLineHoriz(var7, var2 + var4 - 13, 12, 0);
      this.field_761.method_226(var7 + 1, var2 + 14, 11, var4 - 27, this.field_788, this.field_789);
      this.field_761.drawBox(var7 + 3, var5 + var2 + 14, 7, var6, this.field_791);
      this.field_761.drawLineVert(var7 + 2, var5 + var2 + 14, var6, this.field_790);
      this.field_761.drawLineVert(var7 + 2 + 8, var5 + var2 + 14, var6, this.field_792);
   }

   // $FF: renamed from: a (int, int, int, int, java.lang.String[]) void
   protected void method_289(int var1, int var2, int var3, int var4, String[] var5) {
      boolean var13 = Surface.field_759;
      int var6 = 0;
      int var7 = var5.length;
      int var8 = 0;
      if(var13 || var8 < var7) {
         do {
            var6 += this.field_761.method_271(var5[var8], var4);
            if(var8 < var7 - 1) {
               var6 += this.field_761.method_271("  ", var4);
            }

            ++var8;
         } while(var8 < var7);
      }

      int var9 = var2 - var6 / 2;
      int var10 = var3 + this.field_761.method_270(var4) / 3;
      int var11 = 0;
      if(var13 || var11 < var7) {
         do {
            int var12;
            label53: {
               if(this.field_772[var1]) {
                  var12 = 16777215;
                  if(!var13) {
                     break label53;
                  }
               }

               var12 = 0;
            }

            if(this.field_782 >= var9 && this.field_782 <= var9 + this.field_761.method_271(var5[var11], var4) && this.field_783 <= var10 && this.field_783 > var10 - this.field_761.method_270(var4)) {
               label43: {
                  if(this.field_772[var1]) {
                     var12 = 8421504;
                     if(!var13) {
                        break label43;
                     }
                  }

                  var12 = 16777215;
               }

               if(this.field_784 == 1) {
                  this.field_770[var1] = var11;
                  this.field_767[var1] = true;
               }
            }

            if(this.field_770[var1] == var11) {
               label37: {
                  if(this.field_772[var1]) {
                     var12 = 16711680;
                     if(!var13) {
                        break label37;
                     }
                  }

                  var12 = 12582912;
               }
            }

            this.field_761.drawString(var5[var11], var9, var10, var4, var12);
            var9 += this.field_761.method_271(var5[var11] + "  ", var4);
            ++var11;
         } while(var11 < var7);

      }
   }

   // $FF: renamed from: b (int, int, int, int, java.lang.String[]) void
   protected void method_290(int var1, int var2, int var3, int var4, String[] var5) {
      boolean var11 = Surface.field_759;
      int var6 = var5.length;
      int var7 = var3 - this.field_761.method_270(var4) * (var6 - 1) / 2;
      int var8 = 0;
      if(var11 || var8 < var6) {
         do {
            int var9;
            label46: {
               if(this.field_772[var1]) {
                  var9 = 16777215;
                  if(!var11) {
                     break label46;
                  }
               }

               var9 = 0;
            }

            int var10 = this.field_761.method_271(var5[var8], var4);
            if(this.field_782 >= var2 - var10 / 2 && this.field_782 <= var2 + var10 / 2 && this.field_783 - 2 <= var7 && this.field_783 - 2 > var7 - this.field_761.method_270(var4)) {
               label36: {
                  if(this.field_772[var1]) {
                     var9 = 8421504;
                     if(!var11) {
                        break label36;
                     }
                  }

                  var9 = 16777215;
               }

               if(this.field_784 == 1) {
                  this.field_770[var1] = var8;
                  this.field_767[var1] = true;
               }
            }

            if(this.field_770[var1] == var8) {
               label30: {
                  if(this.field_772[var1]) {
                     var9 = 16711680;
                     if(!var11) {
                        break label30;
                     }
                  }

                  var9 = 12582912;
               }
            }

            this.field_761.drawString(var5[var8], var2 - var10 / 2, var7, var4, var9);
            var7 += this.field_761.method_270(var4);
            ++var8;
         } while(var8 < var6);

      }
   }

   // $FF: renamed from: b (int, int, int, int, int, int, java.lang.String[], int, int) void
   protected void method_291(int var1, int var2, int var3, int var4, int var5, int var6, String[] var7, int var8, int var9) {
      int var10;
      int var11;
      int var12;
      int var13;
      int var14;
      boolean var15;
      label124: {
         var15 = Surface.field_759;
         var10 = var5 / this.field_761.method_270(var6);
         if(var10 < var8) {
            var11 = var2 + var4 - 12;
            var12 = (var5 - 27) * var10 / var8;
            if(var12 < 6) {
               var12 = 6;
            }

            var13 = (var5 - 27 - var12) * var9 / (var8 - var10);
            if(this.field_785 == 1 && this.field_782 >= var11 && this.field_782 <= var11 + 12) {
               if(this.field_783 > var3 && this.field_783 < var3 + 12 && var9 > 0) {
                  --var9;
               }

               if(this.field_783 > var3 + var5 - 12 && this.field_783 < var3 + var5 && var9 < var8 - var10) {
                  ++var9;
               }

               this.controlFlashText[var1] = var9;
            }

            label114: {
               if(this.field_785 == 1 && (this.field_782 >= var11 && this.field_782 <= var11 + 12 || this.field_782 >= var11 - 12 && this.field_782 <= var11 + 24 && this.field_765[var1])) {
                  if(this.field_783 <= var3 + 12 || this.field_783 >= var3 + var5 - 12) {
                     break label114;
                  }

                  this.field_765[var1] = true;
                  var14 = this.field_783 - var3 - 12 - var12 / 2;
                  var9 = var14 * var8 / (var5 - 24);
                  if(var9 < 0) {
                     var9 = 0;
                  }

                  if(var9 > var8 - var10) {
                     var9 = var8 - var10;
                  }

                  this.controlFlashText[var1] = var9;
                  if(!var15) {
                     break label114;
                  }
               }

               this.field_765[var1] = false;
            }

            var13 = (var5 - 27 - var12) * var9 / (var8 - var10);
            this.method_288(var2, var3, var4, var5, var13, var12);
            if(!var15) {
               break label124;
            }
         }

         var9 = 0;
         this.controlFlashText[var1] = 0;
      }

      this.field_771[var1] = -1;
      var11 = var5 - var10 * this.field_761.method_270(var6);
      var12 = var3 + this.field_761.method_270(var6) * 5 / 6 + var11 / 2;
      var13 = var9;
      if(var15 || var9 < var8) {
         do {
            label89: {
               if(this.field_772[var1]) {
                  var14 = 16777215;
                  if(!var15) {
                     break label89;
                  }
               }

               var14 = 0;
            }

            if(this.field_782 >= var2 + 2 && this.field_782 <= var2 + 2 + this.field_761.method_271(var7[var13], var6) && this.field_783 - 2 <= var12 && this.field_783 - 2 > var12 - this.field_761.method_270(var6)) {
               label79: {
                  if(this.field_772[var1]) {
                     var14 = 8421504;
                     if(!var15) {
                        break label79;
                     }
                  }

                  var14 = 16777215;
               }

               this.field_771[var1] = var13;
               if(this.field_784 == 1) {
                  this.field_770[var1] = var13;
                  this.field_767[var1] = true;
               }
            }

            if(this.field_770[var1] == var13 && this.field_800) {
               var14 = 16711680;
            }

            this.field_761.drawString(var7[var13], var2 + 2, var12, var6, var14);
            var12 += this.field_761.method_270(var6);
            if(var12 >= var3 + var5) {
               return;
            }

            ++var13;
         } while(var13 < var8);

      }
   }

   // $FF: renamed from: a (int, int, java.lang.String, int, boolean) int
   public int method_292(int var1, int var2, String var3, int var4, boolean var5) {
      this.field_775[this.field_762] = 0;
      this.field_764[this.field_762] = true;
      this.field_767[this.field_762] = false;
      this.field_779[this.field_762] = var4;
      this.field_772[this.field_762] = var5;
      this.field_773[this.field_762] = var1;
      this.field_774[this.field_762] = var2;
      this.field_780[this.field_762] = var3;
      return this.field_762++;
   }

   // $FF: renamed from: b (int, int, java.lang.String, int, boolean) int
   public int addText(int var1, int var2, String var3, int var4, boolean var5) {
      this.field_775[this.field_762] = 1;
      this.field_764[this.field_762] = true;
      this.field_767[this.field_762] = false;
      this.field_779[this.field_762] = var4;
      this.field_772[this.field_762] = var5;
      this.field_773[this.field_762] = var1;
      this.field_774[this.field_762] = var2;
      this.field_780[this.field_762] = var3;
      return this.field_762++;
   }

   // $FF: renamed from: d (int, int, int, int) int
   public int addButtonBackground(int var1, int var2, int var3, int var4) {
      this.field_775[this.field_762] = 2;
      this.field_764[this.field_762] = true;
      this.field_767[this.field_762] = false;
      this.field_773[this.field_762] = var1 - var3 / 2;
      this.field_774[this.field_762] = var2 - var4 / 2;
      this.field_776[this.field_762] = var3;
      this.field_777[this.field_762] = var4;
      return this.field_762++;
   }

   // $FF: renamed from: e (int, int, int, int) int
   public int addBoxRounded(int var1, int var2, int var3, int var4) {
      this.field_775[this.field_762] = 11;
      this.field_764[this.field_762] = true;
      this.field_767[this.field_762] = false;
      this.field_773[this.field_762] = var1 - var3 / 2;
      this.field_774[this.field_762] = var2 - var4 / 2;
      this.field_776[this.field_762] = var3;
      this.field_777[this.field_762] = var4;
      return this.field_762++;
   }

   // $FF: renamed from: d (int, int, int) int
   public int addSprite(int var1, int var2, int var3) {
      int var4 = this.field_761.field_736[var3];
      int var5 = this.field_761.field_737[var3];
      this.field_775[this.field_762] = 12;
      this.field_764[this.field_762] = true;
      this.field_767[this.field_762] = false;
      this.field_773[this.field_762] = var1 - var4 / 2;
      this.field_774[this.field_762] = var2 - var5 / 2;
      this.field_776[this.field_762] = var4;
      this.field_777[this.field_762] = var5;
      this.field_779[this.field_762] = var3;
      return this.field_762++;
   }

   // $FF: renamed from: a (int, int, int, int, int, int, boolean) int
   public int addTextList(int var1, int var2, int var3, int var4, int var5, int var6, boolean var7) {
      this.field_775[this.field_762] = 4;
      this.field_764[this.field_762] = true;
      this.field_767[this.field_762] = false;
      this.field_773[this.field_762] = var1;
      this.field_774[this.field_762] = var2;
      this.field_776[this.field_762] = var3;
      this.field_777[this.field_762] = var4;
      this.field_772[this.field_762] = var7;
      this.field_779[this.field_762] = var5;
      this.field_778[this.field_762] = var6;
      this.field_769[this.field_762] = 0;
      this.controlFlashText[this.field_762] = 0;
      this.field_781[this.field_762] = new String[var6];
      return this.field_762++;
   }

   // $FF: renamed from: a (int, int, int, int, int, int, boolean, boolean) int
   public int addTextListInput(int var1, int var2, int var3, int var4, int var5, int var6, boolean var7, boolean var8) {
      this.field_775[this.field_762] = 5;
      this.field_764[this.field_762] = true;
      this.field_766[this.field_762] = var7;
      this.field_767[this.field_762] = false;
      this.field_779[this.field_762] = var5;
      this.field_772[this.field_762] = var8;
      this.field_773[this.field_762] = var1;
      this.field_774[this.field_762] = var2;
      this.field_776[this.field_762] = var3;
      this.field_777[this.field_762] = var4;
      this.field_778[this.field_762] = var6;
      this.field_780[this.field_762] = "";
      return this.field_762++;
   }

   // $FF: renamed from: b (int, int, int, int, int, int, boolean, boolean) int
   public int method_299(int var1, int var2, int var3, int var4, int var5, int var6, boolean var7, boolean var8) {
      this.field_775[this.field_762] = 6;
      this.field_764[this.field_762] = true;
      this.field_766[this.field_762] = var7;
      this.field_767[this.field_762] = false;
      this.field_779[this.field_762] = var5;
      this.field_772[this.field_762] = var8;
      this.field_773[this.field_762] = var1;
      this.field_774[this.field_762] = var2;
      this.field_776[this.field_762] = var3;
      this.field_777[this.field_762] = var4;
      this.field_778[this.field_762] = var6;
      this.field_780[this.field_762] = "";
      return this.field_762++;
   }

   // $FF: renamed from: b (int, int, int, int, int, int, boolean) int
   public int addTextListInteractive(int var1, int var2, int var3, int var4, int var5, int var6, boolean var7) {
      this.field_775[this.field_762] = 9;
      this.field_764[this.field_762] = true;
      this.field_767[this.field_762] = false;
      this.field_779[this.field_762] = var5;
      this.field_772[this.field_762] = var7;
      this.field_773[this.field_762] = var1;
      this.field_774[this.field_762] = var2;
      this.field_776[this.field_762] = var3;
      this.field_777[this.field_762] = var4;
      this.field_778[this.field_762] = var6;
      this.field_781[this.field_762] = new String[var6];
      this.field_769[this.field_762] = 0;
      this.controlFlashText[this.field_762] = 0;
      this.field_770[this.field_762] = -1;
      this.field_771[this.field_762] = -1;
      return this.field_762++;
   }

   // $FF: renamed from: f (int, int, int, int) int
   public int addButton(int var1, int var2, int var3, int var4) {
      this.field_775[this.field_762] = 10;
      this.field_764[this.field_762] = true;
      this.field_767[this.field_762] = false;
      this.field_773[this.field_762] = var1 - var3 / 2;
      this.field_774[this.field_762] = var2 - var4 / 2;
      this.field_776[this.field_762] = var3;
      this.field_777[this.field_762] = var4;
      return this.field_762++;
   }

   // $FF: renamed from: e (int, int, int) int
   public int method_302(int var1, int var2, int var3) {
      this.field_775[this.field_762] = 14;
      this.field_764[this.field_762] = true;
      this.field_767[this.field_762] = false;
      this.field_773[this.field_762] = var1 - var3 / 2;
      this.field_774[this.field_762] = var2 - var3 / 2;
      this.field_776[this.field_762] = var3;
      this.field_777[this.field_762] = var3;
      return this.field_762++;
   }

   // $FF: renamed from: c (int) void
   public void method_303(int var1) {
      this.field_769[var1] = 0;
   }

   // $FF: renamed from: d (int) void
   public void method_304(int var1) {
      this.controlFlashText[var1] = 0;
      this.field_771[var1] = -1;
   }

   // $FF: renamed from: a (int, int, java.lang.String) void
   public void method_305(int var1, int var2, String var3) {
      this.field_781[var1][var2] = var3;
      if(var2 + 1 > this.field_769[var1]) {
         this.field_769[var1] = var2 + 1;
      }

   }

   // $FF: renamed from: a (int, java.lang.String, boolean) void
   public void method_306(int var1, String var2, boolean var3) {
      int var4 = this.field_769[var1]++;
      if(var4 >= this.field_778[var1]) {
         --var4;
         --this.field_769[var1];
         int var5 = 0;
         if(Surface.field_759 || var5 < var4) {
            do {
               this.field_781[var1][var5] = this.field_781[var1][var5 + 1];
               ++var5;
            } while(var5 < var4);
         }
      }

      this.field_781[var1][var4] = var2;
      if(var3) {
         this.controlFlashText[var1] = 999999;
      }

   }

   // $FF: renamed from: a (int, java.lang.String) void
   public void updateText(int var1, String var2) {
      this.field_780[var1] = var2;
   }

   // $FF: renamed from: e (int) java.lang.String
   public String method_308(int var1) {
      return this.field_780[var1] == null?"null":this.field_780[var1];
   }

   // $FF: renamed from: f (int) void
   public void method_309(int var1) {
      this.field_764[var1] = true;
   }

   // $FF: renamed from: g (int) void
   public void method_310(int var1) {
      this.field_764[var1] = false;
   }

   // $FF: renamed from: h (int) void
   public void setFocus(int var1) {
      this.field_786 = var1;
   }

   // $FF: renamed from: i (int) int
   public int method_312(int var1) {
      return this.field_770[var1];
   }

   // $FF: renamed from: j (int) int
   public int method_313(int var1) {
      int var2 = this.field_771[var1];
      return var2;
   }

   // $FF: renamed from: a (int, int) void
   public void method_314(int var1, int var2) {
      this.field_770[var1] = var2;
   }

   // $FF: renamed from: <clinit> () void
   static {
      drawBackgroundArrow = true;
      field_803 = 114;
      field_804 = 114;
      field_805 = 176;
   }
}
