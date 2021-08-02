package mudclient;

import org.teavm.jso.canvas.ImageData;
import org.teavm.jso.typedarrays.Uint8ClampedArray;

// $FF: renamed from: a.a.g
public class Surface {

   // $FF: renamed from: a int
   public int field_723;
   // $FF: renamed from: b int
   public int field_724;
   // $FF: renamed from: c int
   public int area;
   // $FF: renamed from: d int
   public int field_726;
   // $FF: renamed from: e int
   public int field_727;
   // $FF: renamed from: g int[]
   public int[] pixels;
   // $FF: renamed from: i java.awt.Component
   private mudclient mudclient;
   // $FF: renamed from: j java.awt.Image
   public ImageData imageData;
   // $FF: renamed from: k int[][]
   public int[][] spritePixels;
   // $FF: renamed from: l byte[][]
   public byte[][] spriteColoursUsed;
   // $FF: renamed from: m int[][]
   public int[][] spriteColourList;
   // $FF: renamed from: n int[]
   public int[] field_736;
   // $FF: renamed from: o int[]
   public int[] field_737;
   // $FF: renamed from: p int[]
   public int[] field_738;
   // $FF: renamed from: q int[]
   public int[] field_739;
   // $FF: renamed from: r int[]
   public int[] spriteWidthFull;
   // $FF: renamed from: s int[]
   public int[] field_741;
   // $FF: renamed from: t boolean[]
   public boolean[] field_742;
   // $FF: renamed from: u int
   private int field_743;
   // $FF: renamed from: v int
   private int field_744;
   // $FF: renamed from: w int
   private int field_745;
   // $FF: renamed from: x int
   private int field_746;
   // $FF: renamed from: y boolean
   public boolean interlace;
   // $FF: renamed from: z byte[][]
   static byte[][] field_748;
   // $FF: renamed from: A int[]
   static int[] field_749;
   // $FF: renamed from: B int
   static int field_750;
   // $FF: renamed from: C boolean
   public boolean loggedIn;
   // $FF: renamed from: D int[]
   int[] field_752;
   // $FF: renamed from: E int[]
   int[] field_753;
   // $FF: renamed from: F int[]
   int[] field_754;
   // $FF: renamed from: G int[]
   int[] field_755;
   // $FF: renamed from: H int[]
   int[] field_756;
   // $FF: renamed from: I int[]
   int[] field_757;
   // $FF: renamed from: J int[]
   int[] field_758;
   // $FF: renamed from: K boolean
   public static boolean field_759;

   private Uint8ClampedArray rgbPixels;

   // $FF: renamed from: <init> (int, int, int, java.awt.Component) void
   public Surface(int width, int height, int spriteLimit, mudclient var4) {
      super();

      this.interlace = false;
      this.loggedIn = false;
      this.mudclient = var4;
      this.field_744 = height;
      this.field_746 = width;
      this.field_726 = width;
      this.field_723 = width;
      this.field_727 = height;
      this.field_724 = height;
      this.area = width * height;
      this.pixels = new int[width * height];
      this.spritePixels = new int[spriteLimit][];
      this.field_742 = new boolean[spriteLimit];
      this.spriteColoursUsed = new byte[spriteLimit][];
      this.spriteColourList = new int[spriteLimit][];
      this.field_736 = new int[spriteLimit];
      this.field_737 = new int[spriteLimit];
      this.spriteWidthFull = new int[spriteLimit];
      this.field_741 = new int[spriteLimit];
      this.field_738 = new int[spriteLimit];
      this.field_739 = new int[spriteLimit];
      this.rgbPixels = Uint8ClampedArray.create(width * height * 4);
      this.imageData = mudclient.getGraphics().getContext().createImageData(width, height);
   }

   // $FF: renamed from: a (int, int, int, int) void
   public void setBounds(int var1, int var2, int var3, int var4) {
      if(var1 < 0) {
         var1 = 0;
      }

      if(var2 < 0) {
         var2 = 0;
      }

      if(var3 > this.field_723) {
         var3 = this.field_723;
      }

      if(var4 > this.field_724) {
         var4 = this.field_724;
      }

      this.field_745 = var1;
      this.field_743 = var2;
      this.field_746 = var3;
      this.field_744 = var4;
   }

   // $FF: renamed from: b () void
   public void method_221() {
      this.field_745 = 0;
      this.field_743 = 0;
      this.field_746 = this.field_723;
      this.field_744 = this.field_724;
   }

   // $FF: renamed from: a (java.awt.Graphics, int, int) void
   public void draw(Graphics graphics, int x, int y) {
      for (int i = 0; i < this.area * 4; i += 4) {                             
         int pixel = this.pixels[i / 4];

         this.rgbPixels.set(i, (pixel >> 16) & 255);                     
         this.rgbPixels.set(i + 1, (pixel >> 8) & 255);                  
         this.rgbPixels.set(i + 2, pixel & 255);                         
         this.rgbPixels.set(i + 3, 255);
      }
      
      this.imageData.setData(this.rgbPixels);
      graphics.drawImage(this.imageData, x, y);
   }

   // $FF: renamed from: c () void
   public void blackScreen() {
      boolean var5 = field_759;
      int var1 = this.field_723 * this.field_724;
      int var2;
      if(this.interlace) {
         var2 = 0;
         int var3 = -this.field_724;
         if(var5 || var3 < 0) {
            do {
               int var4 = -this.field_723;
               if(var5) {
                  this.pixels[var2++] = 0;
                  ++var4;
               }

               while(var4 < 0) {
                  this.pixels[var2++] = 0;
                  ++var4;
               }

               var2 += this.field_723;
               var3 += 2;
            } while(var3 < 0);

         }
      } else {
         var2 = 0;
         if(var5 || var2 < var1) {
            do {
               this.pixels[var2] = 0;
               ++var2;
            } while(var2 < var1);

         }
      }
   }

   // $FF: renamed from: a (int, int, int, int, int) void
   public void method_224(int var1, int var2, int var3, int var4, int var5) {
      boolean var24 = field_759;
      int var6 = 256 - var5;
      int var7 = (var4 >> 16 & 255) * var5;
      int var8 = (var4 >> 8 & 255) * var5;
      int var9 = (var4 & 255) * var5;
      int var13 = var2 - var3;
      if(var13 < 0) {
         var13 = 0;
      }

      int var14 = var2 + var3;
      if(var14 >= this.field_724) {
         var14 = this.field_724 - 1;
      }

      byte var15 = 1;
      if(this.interlace) {
         var15 = 2;
         if((var13 & 1) != 0) {
            ++var13;
         }
      }

      int var16 = var13;
      if(var24 || var13 <= var14) {
         do {
            int var17 = var16 - var2;
            int var18 = (int)Math.sqrt((double)(var3 * var3 - var17 * var17));
            int var19 = var1 - var18;
            if(var19 < 0) {
               var19 = 0;
            }

            int var20 = var1 + var18;
            if(var20 >= this.field_723) {
               var20 = this.field_723 - 1;
            }

            int var21 = var19 + var16 * this.field_723;
            int var22 = var19;
            if(!var24 && var19 > var20) {
               var16 += var15;
            } else {
               do {
                  int var10 = (this.pixels[var21] >> 16 & 255) * var6;
                  int var11 = (this.pixels[var21] >> 8 & 255) * var6;
                  int var12 = (this.pixels[var21] & 255) * var6;
                  int var23 = (var7 + var10 >> 8 << 16) + (var8 + var11 >> 8 << 8) + (var9 + var12 >> 8);
                  this.pixels[var21++] = var23;
                  ++var22;
               } while(var22 <= var20);

               var16 += var15;
            }
         } while(var16 <= var14);

      }
   }

   // $FF: renamed from: a (int, int, int, int, int, int) void
   public void drawBoxAlpha(int var1, int var2, int var3, int var4, int var5, int var6) {
      boolean var20 = field_759;
      if(var1 < this.field_745) {
         var3 -= this.field_745 - var1;
         var1 = this.field_745;
      }

      if(var2 < this.field_743) {
         var4 -= this.field_743 - var2;
         var2 = this.field_743;
      }

      if(var1 + var3 > this.field_746) {
         var3 = this.field_746 - var1;
      }

      if(var2 + var4 > this.field_744) {
         var4 = this.field_744 - var2;
      }

      int var7 = 256 - var6;
      int var8 = (var5 >> 16 & 255) * var6;
      int var9 = (var5 >> 8 & 255) * var6;
      int var10 = (var5 & 255) * var6;
      int var14 = this.field_723 - var3;
      byte var15 = 1;
      if(this.interlace) {
         var15 = 2;
         var14 += this.field_723;
         if((var2 & 1) != 0) {
            ++var2;
            --var4;
         }
      }

      int var16 = var1 + var2 * this.field_723;
      int var17 = 0;
      if(var20 || var17 < var4) {
         do {
            int var18 = -var3;
            if(!var20 && var18 >= 0) {
               var16 += var14;
               var17 += var15;
            } else {
               do {
                  int var11 = (this.pixels[var16] >> 16 & 255) * var7;
                  int var12 = (this.pixels[var16] >> 8 & 255) * var7;
                  int var13 = (this.pixels[var16] & 255) * var7;
                  int var19 = (var8 + var11 >> 8 << 16) + (var9 + var12 >> 8 << 8) + (var10 + var13 >> 8);
                  this.pixels[var16++] = var19;
                  ++var18;
               } while(var18 < 0);

               var16 += var14;
               var17 += var15;
            }
         } while(var17 < var4);

      }
   }

   // $FF: renamed from: b (int, int, int, int, int, int) void
   public void method_226(int var1, int var2, int var3, int var4, int var5, int var6) {
      boolean var19 = field_759;
      if(var1 < this.field_745) {
         var3 -= this.field_745 - var1;
         var1 = this.field_745;
      }

      if(var1 + var3 > this.field_746) {
         var3 = this.field_746 - var1;
      }

      int var7 = var6 >> 16 & 255;
      int var8 = var6 >> 8 & 255;
      int var9 = var6 & 255;
      int var10 = var5 >> 16 & 255;
      int var11 = var5 >> 8 & 255;
      int var12 = var5 & 255;
      int var13 = this.field_723 - var3;
      byte var14 = 1;
      if(this.interlace) {
         var14 = 2;
         var13 += this.field_723;
         if((var2 & 1) != 0) {
            ++var2;
            --var4;
         }
      }

      int var15 = var1 + var2 * this.field_723;
      int var16 = 0;
      if(var19 || var16 < var4) {
         do {
            label41: {
               if(var16 + var2 >= this.field_743 && var16 + var2 < this.field_744) {
                  int var17 = ((var7 * var16 + var10 * (var4 - var16)) / var4 << 16) + ((var8 * var16 + var11 * (var4 - var16)) / var4 << 8) + (var9 * var16 + var12 * (var4 - var16)) / var4;
                  int var18 = -var3;
                  if(var19 || var18 < 0) {
                     do {
                        this.pixels[var15++] = var17;
                        ++var18;
                     } while(var18 < 0);
                  }

                  var15 += var13;
                  if(!var19) {
                     break label41;
                  }
               }

               var15 += this.field_723;
            }

            var16 += var14;
         } while(var16 < var4);

      }
   }

   // $FF: renamed from: b (int, int, int, int, int) void
   public void drawBox(int var1, int var2, int var3, int var4, int var5) {
      boolean var11 = field_759;
      if(var1 < this.field_745) {
         var3 -= this.field_745 - var1;
         var1 = this.field_745;
      }

      if(var2 < this.field_743) {
         var4 -= this.field_743 - var2;
         var2 = this.field_743;
      }

      if(var1 + var3 > this.field_746) {
         var3 = this.field_746 - var1;
      }

      if(var2 + var4 > this.field_744) {
         var4 = this.field_744 - var2;
      }

      int var6 = this.field_723 - var3;
      byte var7 = 1;
      if(this.interlace) {
         var7 = 2;
         var6 += this.field_723;
         if((var2 & 1) != 0) {
            ++var2;
            --var4;
         }
      }

      int var8 = var1 + var2 * this.field_723;
      int var9 = -var4;
      if(var11 || var9 < 0) {
         do {
            int var10 = -var3;
            if(var11) {
               this.pixels[var8++] = var5;
               ++var10;
            }

            while(var10 < 0) {
               this.pixels[var8++] = var5;
               ++var10;
            }

            var8 += var6;
            var9 += var7;
         } while(var9 < 0);

      }
   }

   // $FF: renamed from: c (int, int, int, int, int) void
   public void drawBoxEdge(int var1, int var2, int var3, int var4, int var5) {
      this.drawLineHoriz(var1, var2, var3, var5);
      this.drawLineHoriz(var1, var2 + var4 - 1, var3, var5);
      this.drawLineVert(var1, var2, var4, var5);
      this.drawLineVert(var1 + var3 - 1, var2, var4, var5);
   }

   // $FF: renamed from: b (int, int, int, int) void
   public void drawLineHoriz(int var1, int var2, int var3, int var4) {
      if(var2 >= this.field_743 && var2 < this.field_744) {
         if(var1 < this.field_745) {
            var3 -= this.field_745 - var1;
            var1 = this.field_745;
         }

         if(var1 + var3 > this.field_746) {
            var3 = this.field_746 - var1;
         }

         int var5 = var1 + var2 * this.field_723;
         int var6 = 0;
         if(field_759 || var6 < var3) {
            do {
               this.pixels[var5 + var6] = var4;
               ++var6;
            } while(var6 < var3);

         }
      }
   }

   // $FF: renamed from: c (int, int, int, int) void
   public void drawLineVert(int var1, int var2, int var3, int var4) {
      if(var1 >= this.field_745 && var1 < this.field_746) {
         if(var2 < this.field_743) {
            var3 -= this.field_743 - var2;
            var2 = this.field_743;
         }

         if(var2 + var3 > this.field_746) {
            var3 = this.field_744 - var2;
         }

         int var5 = var1 + var2 * this.field_723;
         int var6 = 0;
         if(field_759 || var6 < var3) {
            do {
               this.pixels[var5 + var6 * this.field_723] = var4;
               ++var6;
            } while(var6 < var3);

         }
      }
   }

   // $FF: renamed from: a (int, int, int) void
   public void setPixel(int var1, int var2, int var3) {
      if(var1 >= this.field_745 && var2 >= this.field_743 && var1 < this.field_746 && var2 < this.field_744) {
         this.pixels[var1 + var2 * this.field_723] = var3;
      }
   }

   // $FF: renamed from: d () void
   public void fade2black() {
      int var3 = this.field_723 * this.field_724;
      int var2 = 0;
      if(field_759 || var2 < var3) {
         do {
            int var1 = this.pixels[var2] & 16777215;
            this.pixels[var2] = (var1 >>> 1 & 8355711) + (var1 >>> 2 & 4144959) + (var1 >>> 3 & 2039583) + (var1 >>> 4 & 986895);
            ++var2;
         } while(var2 < var3);

      }
   }

   // $FF: renamed from: c (int, int, int, int, int, int) void
   public void drawLineAlpha(int var1, int var2, int var3, int var4, int var5, int var6) {
      boolean var16 = field_759;
      int var7 = var3;
      if(var16 || var3 < var3 + var5) {
         do {
            int var8 = var4;
            if(!var16 && var4 >= var4 + var6) {
               ++var7;
            } else {
               do {
                  int var9 = 0;
                  int var10 = 0;
                  int var11 = 0;
                  int var12 = 0;
                  int var13 = var7 - var1;
                  if(!var16 && var13 > var7 + var1) {
                     this.pixels[var7 + this.field_723 * var8] = (var9 / var12 << 16) + (var10 / var12 << 8) + var11 / var12;
                     ++var8;
                  } else {
                     do {
                        if(var13 >= 0 && var13 < this.field_723) {
                           int var14 = var8 - var2;
                           if(var16 || var14 <= var8 + var2) {
                              do {
                                 if(var14 >= 0 && var14 < this.field_724) {
                                    int var15 = this.pixels[var13 + this.field_723 * var14];
                                    var9 += var15 >> 16 & 255;
                                    var10 += var15 >> 8 & 255;
                                    var11 += var15 & 255;
                                    ++var12;
                                 }

                                 ++var14;
                              } while(var14 <= var8 + var2);
                           }
                        }

                        ++var13;
                     } while(var13 <= var7 + var1);

                     this.pixels[var7 + this.field_723 * var8] = (var9 / var12 << 16) + (var10 / var12 << 8) + var11 / var12;
                     ++var8;
                  }
               } while(var8 < var4 + var6);

               ++var7;
            }
         } while(var7 < var3 + var5);

      }
   }

   // $FF: renamed from: b (int, int, int) int
   public static int method_234(int var0, int var1, int var2) {
      return (var0 << 16) + (var1 << 8) + var2;
   }

   // $FF: renamed from: e () void
   public void clear() {
      int var1 = 0;
      if(field_759 || var1 < this.spritePixels.length) {
         do {
            this.spritePixels[var1] = null;
            this.field_736[var1] = 0;
            this.field_737[var1] = 0;
            this.spriteColoursUsed[var1] = null;
            this.spriteColourList[var1] = null;
            ++var1;
         } while(var1 < this.spritePixels.length);

      }
   }

   // $FF: renamed from: a (int, byte[], byte[], int) void
   public void parseSprite(int var1, byte[] var2, byte[] var3, int var4) {
      boolean var17 = field_759;
      int var5 = Utility.readUnsignedShort(var2, 0);
      int var6 = Utility.readUnsignedShort(var3, var5);
      var5 += 2;
      int var7 = Utility.readUnsignedShort(var3, var5);
      var5 += 2;
      int var8 = var3[var5++] & 255;
      int[] var9 = new int[var8];
      var9[0] = 16711935;
      int var10 = 0;
      if(var17 || var10 < var8 - 1) {
         do {
            var9[var10 + 1] = ((var3[var5] & 255) << 16) + ((var3[var5 + 1] & 255) << 8) + (var3[var5 + 2] & 255);
            var5 += 3;
            ++var10;
         } while(var10 < var8 - 1);
      }

      int var11 = 2;
      int var12 = var1;
      if(var17 || var1 < var1 + var4) {
         do {
            this.field_738[var12] = var3[var5++] & 255;
            this.field_739[var12] = var3[var5++] & 255;
            this.field_736[var12] = Utility.readUnsignedShort(var3, var5);
            var5 += 2;
            this.field_737[var12] = Utility.readUnsignedShort(var3, var5);
            var5 += 2;
            int var13 = var3[var5++] & 255;
            int var14 = this.field_736[var12] * this.field_737[var12];
            this.spriteColoursUsed[var12] = new byte[var14];
            this.spriteColourList[var12] = var9;
            this.spriteWidthFull[var12] = var6;
            this.field_741[var12] = var7;
            this.spritePixels[var12] = null;
            this.field_742[var12] = false;
            if(this.field_738[var12] != 0 || this.field_739[var12] != 0) {
               this.field_742[var12] = true;
            }

            label70: {
               int var15;
               if(var13 == 0) {
                  var15 = 0;
                  if(var17 || var15 < var14) {
                     do {
                        this.spriteColoursUsed[var12][var15] = var2[var11++];
                        if(this.spriteColoursUsed[var12][var15] == 0) {
                           this.field_742[var12] = true;
                        }

                        ++var15;
                     } while(var15 < var14);
                  }

                  if(!var17) {
                     break label70;
                  }
               }

               if(var13 == 1) {
                  var15 = 0;
                  if(var17 || var15 < this.field_736[var12]) {
                     do {
                        int var16 = 0;
                        if(!var17 && var16 >= this.field_737[var12]) {
                           ++var15;
                        } else {
                           do {
                              this.spriteColoursUsed[var12][var15 + var16 * this.field_736[var12]] = var2[var11++];
                              if(this.spriteColoursUsed[var12][var15 + var16 * this.field_736[var12]] == 0) {
                                 this.field_742[var12] = true;
                              }

                              ++var16;
                           } while(var16 < this.field_737[var12]);

                           ++var15;
                        }
                     } while(var15 < this.field_736[var12]);
                  }
               }
            }

            ++var12;
         } while(var12 < var1 + var4);

      }
   }

   // $FF: renamed from: a (int, byte[]) void
   public void method_237(int var1, byte[] var2) {
      boolean var11 = field_759;
      int[] var3 = this.spritePixels[var1] = new int[10200];
      this.field_736[var1] = 255;
      this.field_737[var1] = 40;
      this.field_738[var1] = 0;
      this.field_739[var1] = 0;
      this.spriteWidthFull[var1] = 255;
      this.field_741[var1] = 40;
      this.field_742[var1] = false;
      int var4 = 0;
      int var5 = 1;
      int var6 = 0;
      int var7;
      int var8;
      if(var11 || var6 < 255) {
         do {
            var7 = var2[var5++] & 255;
            var8 = 0;
            if(var11) {
               var3[var6++] = var4;
               ++var8;
            }

            while(var8 < var7) {
               var3[var6++] = var4;
               ++var8;
            }

            var4 = 16777215 - var4;
         } while(var6 < 255);
      }

      var7 = 1;
      if(var11 || var7 < 40) {
         do {
            var8 = 0;
            if(!var11 && var8 >= 255) {
               ++var7;
            } else {
               do {
                  int var9 = var2[var5++] & 255;
                  int var10 = 0;
                  if(var11) {
                     var3[var6] = var3[var6 - 255];
                     ++var6;
                     ++var8;
                     ++var10;
                  }

                  while(var10 < var9) {
                     var3[var6] = var3[var6 - 255];
                     ++var6;
                     ++var8;
                     ++var10;
                  }

                  if(var8 < 255) {
                     var3[var6] = 16777215 - var3[var6 - 255];
                     ++var6;
                     ++var8;
                  }
               } while(var8 < 255);

               ++var7;
            }
         } while(var7 < 40);

      }
   }

   // $FF: renamed from: a (int) void
   public void drawWorld(int var1) {
      boolean var24 = field_759;
      int var2 = this.field_736[var1] * this.field_737[var1];
      int[] var3 = this.spritePixels[var1];
      int[] var4 = new int['\u8000'];
      int var5 = 0;
      int var6;
      if(var24) {
         var6 = var3[var5];
         ++var4[((var6 & 16252928) >> 9) + ((var6 & '\uf800') >> 6) + ((var6 & 248) >> 3)];
         ++var5;
      }

      while(var5 < var2) {
         var6 = var3[var5];
         ++var4[((var6 & 16252928) >> 9) + ((var6 & '\uf800') >> 6) + ((var6 & 248) >> 3)];
         ++var5;
      }

      int[] var25 = new int[256];
      var25[0] = 16711935;
      int[] var7 = new int[256];
      int var8 = 0;
      int var10;
      int var11;
      if(var24 || var8 < '\u8000') {
         do {
            int var9 = var4[var8];
            if(var9 > var7[255]) {
               var10 = 1;
               if(var24 || var10 < 256) {
                  do {
                     if(var9 > var7[var10]) {
                        var11 = 255;
                        if(var24 || var11 > var10) {
                           do {
                              var25[var11] = var25[var11 - 1];
                              var7[var11] = var7[var11 - 1];
                              --var11;
                           } while(var11 > var10);
                        }

                        var25[var10] = ((var8 & 31744) << 9) + ((var8 & 992) << 6) + ((var8 & 31) << 3) + 263172;
                        var7[var10] = var9;
                        if(!var24) {
                           break;
                        }
                     }

                     ++var10;
                  } while(var10 < 256);
               }
            }

            var4[var8] = -1;
            ++var8;
         } while(var8 < '\u8000');
      }

      byte[] var26 = new byte[var2];
      var10 = 0;
      if(!var24 && var10 >= var2) {
         this.spriteColoursUsed[var1] = var26;
         this.spriteColourList[var1] = var25;
         this.spritePixels[var1] = null;
      } else {
         do {
            var11 = var3[var10];
            int var12 = ((var11 & 16252928) >> 9) + ((var11 & '\uf800') >> 6) + ((var11 & 248) >> 3);
            int var13 = var4[var12];
            if(var13 == -1) {
               int var14 = 999999999;
               int var15 = var11 >> 16 & 255;
               int var16 = var11 >> 8 & 255;
               int var17 = var11 & 255;
               int var18 = 0;
               if(var24 || var18 < 256) {
                  do {
                     int var19 = var25[var18];
                     int var20 = var19 >> 16 & 255;
                     int var21 = var19 >> 8 & 255;
                     int var22 = var19 & 255;
                     int var23 = (var15 - var20) * (var15 - var20) + (var16 - var21) * (var16 - var21) + (var17 - var22) * (var17 - var22);
                     if(var23 < var14) {
                        var14 = var23;
                        var13 = var18;
                     }

                     ++var18;
                  } while(var18 < 256);
               }

               var4[var12] = var13;
            }

            var26[var10] = (byte)var13;
            ++var10;
         } while(var10 < var2);

         this.spriteColoursUsed[var1] = var26;
         this.spriteColourList[var1] = var25;
         this.spritePixels[var1] = null;
      }
   }

   // $FF: renamed from: b (int) void
   public void method_239(int var1) {
      boolean var8 = field_759;
      if(this.spriteColoursUsed[var1] != null) {
         int var2 = this.field_736[var1] * this.field_737[var1];
         byte[] var3 = this.spriteColoursUsed[var1];
         int[] var4 = this.spriteColourList[var1];
         int[] var5 = new int[var2];
         int var6 = 0;
         if(!var8 && var6 >= var2) {
            this.spritePixels[var1] = var5;
            this.spriteColoursUsed[var1] = null;
            this.spriteColourList[var1] = null;
         } else {
            do {
               int var7;
               label21: {
                  var7 = var4[var3[var6] & 255];
                  if(var7 == 0) {
                     var7 = 1;
                     if(!var8) {
                        break label21;
                     }
                  }

                  if(var7 == 16711935) {
                     var7 = 0;
                  }
               }

               var5[var6] = var7;
               ++var6;
            } while(var6 < var2);

            this.spritePixels[var1] = var5;
            this.spriteColoursUsed[var1] = null;
            this.spriteColourList[var1] = null;
         }
      }
   }

   // $FF: renamed from: d (int, int, int, int, int) void
   public void drawSpriteMinimap(int var1, int var2, int var3, int var4, int var5) {
      boolean var10 = field_759;
      this.field_736[var1] = var4;
      this.field_737[var1] = var5;
      this.field_742[var1] = false;
      this.field_738[var1] = 0;
      this.field_739[var1] = 0;
      this.spriteWidthFull[var1] = var4;
      this.field_741[var1] = var5;
      int var6 = var4 * var5;
      int var7 = 0;
      this.spritePixels[var1] = new int[var6];
      int var8 = var2;
      if(var10 || var2 < var2 + var4) {
         do {
            int var9 = var3;
            if(!var10 && var3 >= var3 + var5) {
               ++var8;
            } else {
               do {
                  this.spritePixels[var1][var7++] = this.pixels[var8 + var9 * this.field_723];
                  ++var9;
               } while(var9 < var3 + var5);

               ++var8;
            }
         } while(var8 < var2 + var4);

      }
   }

   // $FF: renamed from: e (int, int, int, int, int) void
   public void drawSprite(int var1, int var2, int var3, int var4, int var5) {
      boolean var10 = field_759;
      this.field_736[var1] = var4;
      this.field_737[var1] = var5;
      this.field_742[var1] = false;
      this.field_738[var1] = 0;
      this.field_739[var1] = 0;
      this.spriteWidthFull[var1] = var4;
      this.field_741[var1] = var5;
      int var6 = var4 * var5;
      int var7 = 0;
      this.spritePixels[var1] = new int[var6];
      int var8 = var3;
      if(var10 || var3 < var3 + var5) {
         do {
            int var9 = var2;
            if(!var10 && var2 >= var2 + var4) {
               ++var8;
            } else {
               do {
                  this.spritePixels[var1][var7++] = this.pixels[var9 + var8 * this.field_723];
                  ++var9;
               } while(var9 < var2 + var4);

               ++var8;
            }
         } while(var8 < var3 + var5);

      }
   }

   // $FF: renamed from: c (int, int, int) void
   public void drawSprite(int var1, int var2, int var3) {
      if(this.field_742[var3]) {
         var1 += this.field_738[var3];
         var2 += this.field_739[var3];
      }

      int var4 = var1 + var2 * this.field_723;
      int var5 = 0;
      int var6 = this.field_737[var3];
      int var7 = this.field_736[var3];
      int var8 = this.field_723 - var7;
      int var9 = 0;
      int var10;
      if(var2 < this.field_743) {
         var10 = this.field_743 - var2;
         var6 -= var10;
         var2 = this.field_743;
         var5 += var10 * var7;
         var4 += var10 * this.field_723;
      }

      if(var2 + var6 >= this.field_744) {
         var6 -= var2 + var6 - this.field_744 + 1;
      }

      if(var1 < this.field_745) {
         var10 = this.field_745 - var1;
         var7 -= var10;
         var1 = this.field_745;
         var5 += var10;
         var4 += var10;
         var9 += var10;
         var8 += var10;
      }

      if(var1 + var7 >= this.field_746) {
         var10 = var1 + var7 - this.field_746 + 1;
         var7 -= var10;
         var9 += var10;
         var8 += var10;
      }

      if(var7 > 0 && var6 > 0) {
         byte var11 = 1;
         if(this.interlace) {
            var11 = 2;
            var8 += this.field_723;
            var9 += this.field_736[var3];
            if((var2 & 1) != 0) {
               var4 += this.field_723;
               --var6;
            }
         }

         if(this.spritePixels[var3] == null) {
            this.method_248(this.pixels, this.spriteColoursUsed[var3], this.spriteColourList[var3], var5, var4, var7, var6, var8, var9, var11);
         } else {
            this.method_247(this.pixels, this.spritePixels[var3], 0, var5, var4, var7, var6, var8, var9, var11);
         }
      }
   }

   // $FF: renamed from: f (int, int, int, int, int) void
   public void spriteClipping(int var1, int var2, int var3, int var4, int var5) {
      try {
         int var6 = this.field_736[var5];
         int var7 = this.field_737[var5];
         int var8 = 0;
         int var9 = 0;
         int var10 = (var6 << 16) / var3;
         int var11 = (var7 << 16) / var4;
         int var12;
         int var13;
         if(this.field_742[var5]) {
            var12 = this.spriteWidthFull[var5];
            var13 = this.field_741[var5];
            var10 = (var12 << 16) / var3;
            var11 = (var13 << 16) / var4;
            var1 += (this.field_738[var5] * var3 + var12 - 1) / var12;
            var2 += (this.field_739[var5] * var4 + var13 - 1) / var13;
            if(this.field_738[var5] * var3 % var12 != 0) {
               var8 = (var12 - this.field_738[var5] * var3 % var12 << 16) / var3;
            }

            if(this.field_739[var5] * var4 % var13 != 0) {
               var9 = (var13 - this.field_739[var5] * var4 % var13 << 16) / var4;
            }

            var3 = var3 * (this.field_736[var5] - (var8 >> 16)) / var12;
            var4 = var4 * (this.field_737[var5] - (var9 >> 16)) / var13;
         }

         var12 = var1 + var2 * this.field_723;
         var13 = this.field_723 - var3;
         int var14;
         if(var2 < this.field_743) {
            var14 = this.field_743 - var2;
            var4 -= var14;
            var2 = 0;
            var12 += var14 * this.field_723;
            var9 += var11 * var14;
         }

         if(var2 + var4 >= this.field_744) {
            var4 -= var2 + var4 - this.field_744 + 1;
         }

         if(var1 < this.field_745) {
            var14 = this.field_745 - var1;
            var3 -= var14;
            var1 = 0;
            var12 += var14;
            var8 += var10 * var14;
            var13 += var14;
         }

         if(var1 + var3 >= this.field_746) {
            var14 = var1 + var3 - this.field_746 + 1;
            var3 -= var14;
            var13 += var14;
         }

         byte var16 = 1;
         if(this.interlace) {
            var16 = 2;
            var13 += this.field_723;
            var11 += var11;
            if((var2 & 1) != 0) {
               var12 += this.field_723;
               --var4;
            }
         }

         this.method_249(this.pixels, this.spritePixels[var5], 0, var8, var9, var12, var13, var3, var4, var10, var11, var6, var16);
      } catch (Exception var15) {
         System.out.println("error in sprite clipping routine"); // authentic System.out.println
      }
   }

   // $FF: renamed from: d (int, int, int, int) void
   public void drawSpriteAlpha(int var1, int var2, int var3, int var4) {
      if(this.field_742[var3]) {
         var1 += this.field_738[var3];
         var2 += this.field_739[var3];
      }

      int var5 = var1 + var2 * this.field_723;
      int var6 = 0;
      int var7 = this.field_737[var3];
      int var8 = this.field_736[var3];
      int var9 = this.field_723 - var8;
      int var10 = 0;
      int var11;
      if(var2 < this.field_743) {
         var11 = this.field_743 - var2;
         var7 -= var11;
         var2 = this.field_743;
         var6 += var11 * var8;
         var5 += var11 * this.field_723;
      }

      if(var2 + var7 >= this.field_744) {
         var7 -= var2 + var7 - this.field_744 + 1;
      }

      if(var1 < this.field_745) {
         var11 = this.field_745 - var1;
         var8 -= var11;
         var1 = this.field_745;
         var6 += var11;
         var5 += var11;
         var10 += var11;
         var9 += var11;
      }

      if(var1 + var8 >= this.field_746) {
         var11 = var1 + var8 - this.field_746 + 1;
         var8 -= var11;
         var10 += var11;
         var9 += var11;
      }

      if(var8 > 0 && var7 > 0) {
         byte var12 = 1;
         if(this.interlace) {
            var12 = 2;
            var9 += this.field_723;
            var10 += this.field_736[var3];
            if((var2 & 1) != 0) {
               var5 += this.field_723;
               --var7;
            }
         }

         if(this.spritePixels[var3] == null) {
            this.method_251(this.pixels, this.spriteColoursUsed[var3], this.spriteColourList[var3], var6, var5, var8, var7, var9, var10, var12, var4);
         } else {
            this.method_250(this.pixels, this.spritePixels[var3], 0, var6, var5, var8, var7, var9, var10, var12, var4);
         }
      }
   }

   // $FF: renamed from: d (int, int, int, int, int, int) void
   public void method_245(int var1, int var2, int var3, int var4, int var5, int var6) {
      try {
         int var7 = this.field_736[var5];
         int var8 = this.field_737[var5];
         int var9 = 0;
         int var10 = 0;
         int var11 = (var7 << 16) / var3;
         int var12 = (var8 << 16) / var4;
         int var13;
         int var14;
         if(this.field_742[var5]) {
            var13 = this.spriteWidthFull[var5];
            var14 = this.field_741[var5];
            var11 = (var13 << 16) / var3;
            var12 = (var14 << 16) / var4;
            var1 += (this.field_738[var5] * var3 + var13 - 1) / var13;
            var2 += (this.field_739[var5] * var4 + var14 - 1) / var14;
            if(this.field_738[var5] * var3 % var13 != 0) {
               var9 = (var13 - this.field_738[var5] * var3 % var13 << 16) / var3;
            }

            if(this.field_739[var5] * var4 % var14 != 0) {
               var10 = (var14 - this.field_739[var5] * var4 % var14 << 16) / var4;
            }

            var3 = var3 * (this.field_736[var5] - (var9 >> 16)) / var13;
            var4 = var4 * (this.field_737[var5] - (var10 >> 16)) / var14;
         }

         var13 = var1 + var2 * this.field_723;
         var14 = this.field_723 - var3;
         int var15;
         if(var2 < this.field_743) {
            var15 = this.field_743 - var2;
            var4 -= var15;
            var2 = 0;
            var13 += var15 * this.field_723;
            var10 += var12 * var15;
         }

         if(var2 + var4 >= this.field_744) {
            var4 -= var2 + var4 - this.field_744 + 1;
         }

         if(var1 < this.field_745) {
            var15 = this.field_745 - var1;
            var3 -= var15;
            var1 = 0;
            var13 += var15;
            var9 += var11 * var15;
            var14 += var15;
         }

         if(var1 + var3 >= this.field_746) {
            var15 = var1 + var3 - this.field_746 + 1;
            var3 -= var15;
            var14 += var15;
         }

         byte var17 = 1;
         if(this.interlace) {
            var17 = 2;
            var14 += this.field_723;
            var12 += var12;
            if((var2 & 1) != 0) {
               var13 += this.field_723;
               --var4;
            }
         }

         this.method_252(this.pixels, this.spritePixels[var5], 0, var9, var10, var13, var14, var3, var4, var11, var12, var7, var17, var6);
      } catch (Exception var16) {
         System.out.println("error in sprite clipping routine"); // authentic System.out.println
      }
   }

   // $FF: renamed from: e (int, int, int, int, int, int) void
   public void method_246(int var1, int var2, int var3, int var4, int var5, int var6) {
      try {
         int var7 = this.field_736[var5];
         int var8 = this.field_737[var5];
         int var9 = 0;
         int var10 = 0;
         int var11 = (var7 << 16) / var3;
         int var12 = (var8 << 16) / var4;
         int var13;
         int var14;
         if(this.field_742[var5]) {
            var13 = this.spriteWidthFull[var5];
            var14 = this.field_741[var5];
            var11 = (var13 << 16) / var3;
            var12 = (var14 << 16) / var4;
            var1 += (this.field_738[var5] * var3 + var13 - 1) / var13;
            var2 += (this.field_739[var5] * var4 + var14 - 1) / var14;
            if(this.field_738[var5] * var3 % var13 != 0) {
               var9 = (var13 - this.field_738[var5] * var3 % var13 << 16) / var3;
            }

            if(this.field_739[var5] * var4 % var14 != 0) {
               var10 = (var14 - this.field_739[var5] * var4 % var14 << 16) / var4;
            }

            var3 = var3 * (this.field_736[var5] - (var9 >> 16)) / var13;
            var4 = var4 * (this.field_737[var5] - (var10 >> 16)) / var14;
         }

         var13 = var1 + var2 * this.field_723;
         var14 = this.field_723 - var3;
         int var15;
         if(var2 < this.field_743) {
            var15 = this.field_743 - var2;
            var4 -= var15;
            var2 = 0;
            var13 += var15 * this.field_723;
            var10 += var12 * var15;
         }

         if(var2 + var4 >= this.field_744) {
            var4 -= var2 + var4 - this.field_744 + 1;
         }

         if(var1 < this.field_745) {
            var15 = this.field_745 - var1;
            var3 -= var15;
            var1 = 0;
            var13 += var15;
            var9 += var11 * var15;
            var14 += var15;
         }

         if(var1 + var3 >= this.field_746) {
            var15 = var1 + var3 - this.field_746 + 1;
            var3 -= var15;
            var14 += var15;
         }

         byte var17 = 1;
         if(this.interlace) {
            var17 = 2;
            var14 += this.field_723;
            var12 += var12;
            if((var2 & 1) != 0) {
               var13 += this.field_723;
               --var4;
            }
         }

         this.method_253(this.pixels, this.spritePixels[var5], 0, var9, var10, var13, var14, var3, var4, var11, var12, var7, var17, var6);
      } catch (Exception var16) {
         System.out.println("error in sprite clipping routine"); // authentic System.out.println
      }
   }

   // $FF: renamed from: a (int[], int[], int, int, int, int, int, int, int, int) void
   private void method_247(int[] var1, int[] var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10) {
      boolean var15 = field_759;
      int var11 = -(var6 >> 2);
      var6 = -(var6 & 3);
      int var12 = -var7;
      if(var15 || var12 < 0) {
         do {
            int var13 = var11;
            int var14;
            if(!var15 && var11 >= 0) {
               var14 = var6;
               if(var15 || var6 < 0) {
                  do {
                     label89: {
                        var3 = var2[var4++];
                        if(var3 != 0) {
                           var1[var5++] = var3;
                           if(!var15) {
                              break label89;
                           }
                        }

                        ++var5;
                     }

                     ++var14;
                  } while(var14 < 0);

                  var5 += var8;
                  var4 += var9;
                  var12 += var10;
               } else {
                  var5 += var8;
                  var4 += var9;
                  var12 += var10;
               }
            } else {
               do {
                  label69: {
                     var3 = var2[var4++];
                     if(var3 != 0) {
                        var1[var5++] = var3;
                        if(!var15) {
                           break label69;
                        }
                     }

                     ++var5;
                  }

                  label63: {
                     var3 = var2[var4++];
                     if(var3 != 0) {
                        var1[var5++] = var3;
                        if(!var15) {
                           break label63;
                        }
                     }

                     ++var5;
                  }

                  label57: {
                     var3 = var2[var4++];
                     if(var3 != 0) {
                        var1[var5++] = var3;
                        if(!var15) {
                           break label57;
                        }
                     }

                     ++var5;
                  }

                  label51: {
                     var3 = var2[var4++];
                     if(var3 != 0) {
                        var1[var5++] = var3;
                        if(!var15) {
                           break label51;
                        }
                     }

                     ++var5;
                  }

                  ++var13;
               } while(var13 < 0);

               var14 = var6;
               if(var15 || var6 < 0) {
                  do {
                     label34: {
                        var3 = var2[var4++];
                        if(var3 != 0) {
                           var1[var5++] = var3;
                           if(!var15) {
                              break label34;
                           }
                        }

                        ++var5;
                     }

                     ++var14;
                  } while(var14 < 0);

                  var5 += var8;
                  var4 += var9;
                  var12 += var10;
               } else {
                  var5 += var8;
                  var4 += var9;
                  var12 += var10;
               }
            }
         } while(var12 < 0);

      }
   }

   // $FF: renamed from: a (int[], byte[], int[], int, int, int, int, int, int, int) void
   private void method_248(int[] var1, byte[] var2, int[] var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10) {
      boolean var16 = field_759;
      int var11 = -(var6 >> 2);
      var6 = -(var6 & 3);
      int var12 = -var7;
      if(var16 || var12 < 0) {
         do {
            int var13 = var11;
            byte var15;
            int var17;
            if(!var16 && var11 >= 0) {
               var17 = var6;
               if(var16 || var6 < 0) {
                  do {
                     label89: {
                        var15 = var2[var4++];
                        if(var15 != 0) {
                           var1[var5++] = var3[var15 & 255];
                           if(!var16) {
                              break label89;
                           }
                        }

                        ++var5;
                     }

                     ++var17;
                  } while(var17 < 0);

                  var5 += var8;
                  var4 += var9;
                  var12 += var10;
               } else {
                  var5 += var8;
                  var4 += var9;
                  var12 += var10;
               }
            } else {
               do {
                  byte var14;
                  label69: {
                     var14 = var2[var4++];
                     if(var14 != 0) {
                        var1[var5++] = var3[var14 & 255];
                        if(!var16) {
                           break label69;
                        }
                     }

                     ++var5;
                  }

                  label63: {
                     var14 = var2[var4++];
                     if(var14 != 0) {
                        var1[var5++] = var3[var14 & 255];
                        if(!var16) {
                           break label63;
                        }
                     }

                     ++var5;
                  }

                  label57: {
                     var14 = var2[var4++];
                     if(var14 != 0) {
                        var1[var5++] = var3[var14 & 255];
                        if(!var16) {
                           break label57;
                        }
                     }

                     ++var5;
                  }

                  label51: {
                     var14 = var2[var4++];
                     if(var14 != 0) {
                        var1[var5++] = var3[var14 & 255];
                        if(!var16) {
                           break label51;
                        }
                     }

                     ++var5;
                  }

                  ++var13;
               } while(var13 < 0);

               var17 = var6;
               if(var16 || var6 < 0) {
                  do {
                     label34: {
                        var15 = var2[var4++];
                        if(var15 != 0) {
                           var1[var5++] = var3[var15 & 255];
                           if(!var16) {
                              break label34;
                           }
                        }

                        ++var5;
                     }

                     ++var17;
                  } while(var17 < 0);

                  var5 += var8;
                  var4 += var9;
                  var12 += var10;
               } else {
                  var5 += var8;
                  var4 += var9;
                  var12 += var10;
               }
            }
         } while(var12 < 0);

      }
   }

   // $FF: renamed from: a (int[], int[], int, int, int, int, int, int, int, int, int, int, int) void
   private void method_249(int[] var1, int[] var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13) {
      boolean var18 = field_759;

      try {
         int var14 = var4;
         int var15 = -var9;
         if(var18 || var15 < 0) {
            do {
               int var16 = (var5 >> 16) * var12;
               int var17 = -var8;
               if(!var18 && var17 >= 0) {
                  var5 += var11;
                  var4 = var14;
                  var6 += var7;
                  var15 += var13;
               } else {
                  do {
                     label23: {
                        var3 = var2[(var4 >> 16) + var16];
                        if(var3 != 0) {
                           var1[var6++] = var3;
                           if(!var18) {
                              break label23;
                           }
                        }

                        ++var6;
                     }

                     var4 += var10;
                     ++var17;
                  } while(var17 < 0);

                  var5 += var11;
                  var4 = var14;
                  var6 += var7;
                  var15 += var13;
               }
            } while(var15 < 0);

         }
      } catch (Exception var19) {
         System.out.println("error in plot_scale"); // authentic System.out.println
      }
   }

   // $FF: renamed from: a (int[], int[], int, int, int, int, int, int, int, int, int) void
   private void method_250(int[] var1, int[] var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11) {
      boolean var16 = field_759;
      int var12 = 256 - var11;
      int var13 = -var7;
      if(var16 || var13 < 0) {
         do {
            int var14 = -var6;
            if(!var16 && var14 >= 0) {
               var5 += var8;
               var4 += var9;
               var13 += var10;
            } else {
               do {
                  label19: {
                     var3 = var2[var4++];
                     if(var3 != 0) {
                        int var15 = var1[var5];
                        var1[var5++] = ((var3 & 16711935) * var11 + (var15 & 16711935) * var12 & -16711936) + ((var3 & '\uff00') * var11 + (var15 & '\uff00') * var12 & 16711680) >> 8;
                        if(!var16) {
                           break label19;
                        }
                     }

                     ++var5;
                  }

                  ++var14;
               } while(var14 < 0);

               var5 += var8;
               var4 += var9;
               var13 += var10;
            }
         } while(var13 < 0);

      }
   }

   // $FF: renamed from: a (int[], byte[], int[], int, int, int, int, int, int, int, int) void
   private void method_251(int[] var1, byte[] var2, int[] var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11) {
      boolean var17 = field_759;
      int var12 = 256 - var11;
      int var13 = -var7;
      if(var17 || var13 < 0) {
         do {
            int var14 = -var6;
            if(!var17 && var14 >= 0) {
               var5 += var8;
               var4 += var9;
               var13 += var10;
            } else {
               do {
                  label19: {
                     byte var15 = var2[var4++];
                     if(var15 != 0) {
                        int var18 = var3[var15 & 255];
                        int var16 = var1[var5];
                        var1[var5++] = ((var18 & 16711935) * var11 + (var16 & 16711935) * var12 & -16711936) + ((var18 & '\uff00') * var11 + (var16 & '\uff00') * var12 & 16711680) >> 8;
                        if(!var17) {
                           break label19;
                        }
                     }

                     ++var5;
                  }

                  ++var14;
               } while(var14 < 0);

               var5 += var8;
               var4 += var9;
               var13 += var10;
            }
         } while(var13 < 0);

      }
   }

   // $FF: renamed from: a (int[], int[], int, int, int, int, int, int, int, int, int, int, int, int) void
   private void method_252(int[] var1, int[] var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13, int var14) {
      boolean var21 = field_759;
      int var15 = 256 - var14;

      try {
         int var16 = var4;
         int var17 = -var9;
         if(var21 || var17 < 0) {
            do {
               int var18 = (var5 >> 16) * var12;
               int var19 = -var8;
               if(!var21 && var19 >= 0) {
                  var5 += var11;
                  var4 = var16;
                  var6 += var7;
                  var17 += var13;
               } else {
                  do {
                     label23: {
                        var3 = var2[(var4 >> 16) + var18];
                        if(var3 != 0) {
                           int var20 = var1[var6];
                           var1[var6++] = ((var3 & 16711935) * var14 + (var20 & 16711935) * var15 & -16711936) + ((var3 & '\uff00') * var14 + (var20 & '\uff00') * var15 & 16711680) >> 8;
                           if(!var21) {
                              break label23;
                           }
                        }

                        ++var6;
                     }

                     var4 += var10;
                     ++var19;
                  } while(var19 < 0);

                  var5 += var11;
                  var4 = var16;
                  var6 += var7;
                  var17 += var13;
               }
            } while(var17 < 0);

         }
      } catch (Exception var22) {
         System.out.println("error in tran_scale"); // authentic System.out.println
      }
   }

   // $FF: renamed from: b (int[], int[], int, int, int, int, int, int, int, int, int, int, int, int) void
   private void method_253(int[] var1, int[] var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13, int var14) {
      boolean var25 = field_759;
      int var15 = var14 >> 16 & 255;
      int var16 = var14 >> 8 & 255;
      int var17 = var14 & 255;

      try {
         int var18 = var4;
         int var19 = -var9;
         if(var25 || var19 < 0) {
            do {
               int var20 = (var5 >> 16) * var12;
               int var21 = -var8;
               if(!var25 && var21 >= 0) {
                  var5 += var11;
                  var4 = var18;
                  var6 += var7;
                  var19 += var13;
               } else {
                  do {
                     label30: {
                        var3 = var2[(var4 >> 16) + var20];
                        if(var3 != 0) {
                           int var22 = var3 >> 16 & 255;
                           int var23 = var3 >> 8 & 255;
                           int var24 = var3 & 255;
                           if(var22 == var23 && var23 == var24) {
                              var1[var6++] = (var22 * var15 >> 8 << 16) + (var23 * var16 >> 8 << 8) + (var24 * var17 >> 8);
                              if(!var25) {
                                 break label30;
                              }
                           }

                           var1[var6++] = var3;
                           if(!var25) {
                              break label30;
                           }
                        }

                        ++var6;
                     }

                     var4 += var10;
                     ++var21;
                  } while(var21 < 0);

                  var5 += var11;
                  var4 = var18;
                  var6 += var7;
                  var19 += var13;
               }
            } while(var19 < 0);

         }
      } catch (Exception var26) {
         System.out.println("error in plot_scale"); // authentic System.out.println
      }
   }

   // $FF: renamed from: g (int, int, int, int, int) void
   public void method_254(int var1, int var2, int var3, int var4, int var5) {
      boolean var52 = field_759;
      int var6 = this.field_723;
      int var7 = this.field_724;
      int var8;
      if(this.field_752 == null) {
         label303: {
            this.field_752 = new int[512];
            var8 = 0;
            if(var52) {
               int var53 = Utility.field_1009;
               ++var53;
               Utility.field_1009 = var53;
            } else if(var8 >= 256) {
               break label303;
            }

            do {
               this.field_752[var8] = (int)(Math.sin((double)var8 * 0.02454369D) * 32768.0D);
               this.field_752[var8 + 256] = (int)(Math.cos((double)var8 * 0.02454369D) * 32768.0D);
               ++var8;
            } while(var8 < 256);
         }
      }

      var8 = -this.spriteWidthFull[var3] / 2;
      int var9 = -this.field_741[var3] / 2;
      if(this.field_742[var3]) {
         var8 += this.field_738[var3];
         var9 += this.field_739[var3];
      }

      int var10;
      int var11;
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
      label292: {
         var10 = var8 + this.field_736[var3];
         var11 = var9 + this.field_737[var3];
         var4 &= 255;
         int var16 = this.field_752[var4] * var5;
         int var17 = this.field_752[var4 + 256] * var5;
         var18 = var1 + (var9 * var16 + var8 * var17 >> 22);
         var19 = var2 + (var9 * var17 - var8 * var16 >> 22);
         var20 = var1 + (var9 * var16 + var10 * var17 >> 22);
         var21 = var2 + (var9 * var17 - var10 * var16 >> 22);
         var22 = var1 + (var11 * var16 + var10 * var17 >> 22);
         var23 = var2 + (var11 * var17 - var10 * var16 >> 22);
         var24 = var1 + (var11 * var16 + var8 * var17 >> 22);
         var25 = var2 + (var11 * var17 - var8 * var16 >> 22);
         var26 = var19;
         var27 = var19;
         if(var21 < var19) {
            var26 = var21;
            if(!var52) {
               break label292;
            }
         }

         if(var21 > var19) {
            var27 = var21;
         }
      }

      label287: {
         if(var23 < var26) {
            var26 = var23;
            if(!var52) {
               break label287;
            }
         }

         if(var23 > var27) {
            var27 = var23;
         }
      }

      label282: {
         if(var25 < var26) {
            var26 = var25;
            if(!var52) {
               break label282;
            }
         }

         if(var25 > var27) {
            var27 = var25;
         }
      }

      if(var26 < this.field_743) {
         var26 = this.field_743;
      }

      if(var27 > this.field_744) {
         var27 = this.field_744;
      }

      if(this.field_753 == null || this.field_753.length != var7 + 1) {
         this.field_753 = new int[var7 + 1];
         this.field_754 = new int[var7 + 1];
         this.field_755 = new int[var7 + 1];
         this.field_756 = new int[var7 + 1];
         this.field_757 = new int[var7 + 1];
         this.field_758 = new int[var7 + 1];
      }

      int var28 = var26;
      if(var52) {
         this.field_753[var26] = 99999999;
         this.field_754[var26] = -99999999;
         var28 = var26 + 1;
      }

      while(var28 <= var27) {
         this.field_753[var28] = 99999999;
         this.field_754[var28] = -99999999;
         ++var28;
      }

      int var32 = 0;
      int var34 = 0;
      int var36 = 0;
      int var37 = this.field_736[var3];
      int var38 = this.field_737[var3];
      byte var54 = 0;
      byte var55 = 0;
      int var12 = var37 - 1;
      byte var13 = 0;
      var10 = var37 - 1;
      var11 = var38 - 1;
      byte var14 = 0;
      int var15 = var38 - 1;
      if(var25 != var19) {
         var32 = (var24 - var18 << 8) / (var25 - var19);
         var36 = (var15 - var55 << 8) / (var25 - var19);
      }

      int var29;
      int var30;
      int var31;
      int var35;
      label259: {
         if(var19 > var25) {
            var31 = var24 << 8;
            var35 = var15 << 8;
            var29 = var25;
            var30 = var19;
            if(!var52) {
               break label259;
            }
         }

         var31 = var18 << 8;
         var35 = var55 << 8;
         var29 = var19;
         var30 = var25;
      }

      if(var29 < 0) {
         var31 -= var32 * var29;
         var35 -= var36 * var29;
         var29 = 0;
      }

      if(var30 > var7 - 1) {
         var30 = var7 - 1;
      }

      int var39 = var29;
      if(var52) {
         this.field_753[var29] = this.field_754[var29] = var31;
         var31 += var32;
         this.field_755[var29] = this.field_756[var29] = 0;
         this.field_757[var29] = this.field_758[var29] = var35;
         var35 += var36;
         var39 = var29 + 1;
      }

      while(var39 <= var30) {
         this.field_753[var39] = this.field_754[var39] = var31;
         var31 += var32;
         this.field_755[var39] = this.field_756[var39] = 0;
         this.field_757[var39] = this.field_758[var39] = var35;
         var35 += var36;
         ++var39;
      }

      if(var21 != var19) {
         var32 = (var20 - var18 << 8) / (var21 - var19);
         var34 = (var12 - var54 << 8) / (var21 - var19);
      }

      int var33;
      label241: {
         if(var19 > var21) {
            var31 = var20 << 8;
            var33 = var12 << 8;
            var29 = var21;
            var30 = var19;
            if(!var52) {
               break label241;
            }
         }

         var31 = var18 << 8;
         var33 = var54 << 8;
         var29 = var19;
         var30 = var21;
      }

      if(var29 < 0) {
         var31 -= var32 * var29;
         var33 -= var34 * var29;
         var29 = 0;
      }

      if(var30 > var7 - 1) {
         var30 = var7 - 1;
      }

      int var40 = var29;
      if(var52) {
         if(var31 < this.field_753[var29]) {
            this.field_753[var29] = var31;
            this.field_755[var29] = var33;
            this.field_757[var29] = 0;
         }

         if(var31 > this.field_754[var29]) {
            this.field_754[var29] = var31;
            this.field_756[var29] = var33;
            this.field_758[var29] = 0;
         }

         var31 += var32;
         var33 += var34;
         var40 = var29 + 1;
      }

      while(var40 <= var30) {
         if(var31 < this.field_753[var40]) {
            this.field_753[var40] = var31;
            this.field_755[var40] = var33;
            this.field_757[var40] = 0;
         }

         if(var31 > this.field_754[var40]) {
            this.field_754[var40] = var31;
            this.field_756[var40] = var33;
            this.field_758[var40] = 0;
         }

         var31 += var32;
         var33 += var34;
         ++var40;
      }

      if(var23 != var21) {
         var32 = (var22 - var20 << 8) / (var23 - var21);
         var36 = (var11 - var13 << 8) / (var23 - var21);
      }

      label211: {
         if(var21 > var23) {
            var31 = var22 << 8;
            var33 = var10 << 8;
            var35 = var11 << 8;
            var29 = var23;
            var30 = var21;
            if(!var52) {
               break label211;
            }
         }

         var31 = var20 << 8;
         var33 = var12 << 8;
         var35 = var13 << 8;
         var29 = var21;
         var30 = var23;
      }

      if(var29 < 0) {
         var31 -= var32 * var29;
         var35 -= var36 * var29;
         var29 = 0;
      }

      if(var30 > var7 - 1) {
         var30 = var7 - 1;
      }

      int var41 = var29;
      if(var52) {
         if(var31 < this.field_753[var29]) {
            this.field_753[var29] = var31;
            this.field_755[var29] = var33;
            this.field_757[var29] = var35;
         }

         if(var31 > this.field_754[var29]) {
            this.field_754[var29] = var31;
            this.field_756[var29] = var33;
            this.field_758[var29] = var35;
         }

         var31 += var32;
         var35 += var36;
         var41 = var29 + 1;
      }

      while(var41 <= var30) {
         if(var31 < this.field_753[var41]) {
            this.field_753[var41] = var31;
            this.field_755[var41] = var33;
            this.field_757[var41] = var35;
         }

         if(var31 > this.field_754[var41]) {
            this.field_754[var41] = var31;
            this.field_756[var41] = var33;
            this.field_758[var41] = var35;
         }

         var31 += var32;
         var35 += var36;
         ++var41;
      }

      if(var25 != var23) {
         var32 = (var24 - var22 << 8) / (var25 - var23);
         var34 = (var14 - var10 << 8) / (var25 - var23);
      }

      label181: {
         if(var23 > var25) {
            var31 = var24 << 8;
            var33 = var14 << 8;
            var35 = var15 << 8;
            var29 = var25;
            var30 = var23;
            if(!var52) {
               break label181;
            }
         }

         var31 = var22 << 8;
         var33 = var10 << 8;
         var35 = var11 << 8;
         var29 = var23;
         var30 = var25;
      }

      if(var29 < 0) {
         var31 -= var32 * var29;
         var33 -= var34 * var29;
         var29 = 0;
      }

      if(var30 > var7 - 1) {
         var30 = var7 - 1;
      }

      int var42 = var29;
      if(var52 || var29 <= var30) {
         do {
            if(var31 < this.field_753[var42]) {
               this.field_753[var42] = var31;
               this.field_755[var42] = var33;
               this.field_757[var42] = var35;
            }

            if(var31 > this.field_754[var42]) {
               this.field_754[var42] = var31;
               this.field_756[var42] = var33;
               this.field_758[var42] = var35;
            }

            var31 += var32;
            var33 += var34;
            ++var42;
         } while(var42 <= var30);
      }

      int var43 = var26 * var6;
      int[] var44 = this.spritePixels[var3];
      int var45 = var26;
      if(var52 || var26 < var27) {
         do {
            label321: {
               int var46 = this.field_753[var45] >> 8;
               int var47 = this.field_754[var45] >> 8;
               if(var47 - var46 <= 0) {
                  var43 += var6;
                  if(!var52) {
                     break label321;
                  }
               }

               int var48 = this.field_755[var45] << 9;
               int var49 = ((this.field_756[var45] << 9) - var48) / (var47 - var46);
               int var50 = this.field_757[var45] << 9;
               int var51 = ((this.field_758[var45] << 9) - var50) / (var47 - var46);
               if(var46 < this.field_745) {
                  var48 += (this.field_745 - var46) * var49;
                  var50 += (this.field_745 - var46) * var51;
                  var46 = this.field_745;
               }

               if(var47 > this.field_746) {
                  var47 = this.field_746;
               }

               if(!this.interlace || (var45 & 1) == 0) {
                  label319: {
                     if(!this.field_742[var3]) {
                        this.method_255(this.pixels, var44, 0, var43 + var46, var48, var50, var49, var51, var46 - var47, var37);
                        if(!var52) {
                           break label319;
                        }
                     }

                     this.method_256(this.pixels, var44, 0, var43 + var46, var48, var50, var49, var51, var46 - var47, var37);
                  }
               }

               var43 += var6;
            }

            ++var45;
         } while(var45 < var27);

      }
   }

   // $FF: renamed from: b (int[], int[], int, int, int, int, int, int, int, int) void
   private void method_255(int[] var1, int[] var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10) {
      var3 = var9;
      if(field_759 || var9 < 0) {
         do {
            this.pixels[var4++] = var2[(var5 >> 17) + (var6 >> 17) * var10];
            var5 += var7;
            var6 += var8;
            ++var3;
         } while(var3 < 0);

      }
   }

   // $FF: renamed from: c (int[], int[], int, int, int, int, int, int, int, int) void
   private void method_256(int[] var1, int[] var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10) {
      boolean var12 = field_759;
      int var11 = var9;
      if(var12 || var9 < 0) {
         do {
            label16: {
               var3 = var2[(var5 >> 17) + (var6 >> 17) * var10];
               if(var3 != 0) {
                  this.pixels[var4++] = var3;
                  if(!var12) {
                     break label16;
                  }
               }

               ++var4;
            }

            var5 += var7;
            var6 += var8;
            ++var11;
         } while(var11 < 0);

      }
   }

   // $FF: renamed from: a (int, int, int, int, int, int, int) void
   public void spriteClipping(int var1, int var2, int var3, int var4, int var5, int var6, int var7) {
      this.spriteClipping(var1, var2, var3, var4, var5);
   }

   // $FF: renamed from: a (int, int, int, int, int, int, int, int, boolean) void
   public void method_258(int var1, int var2, int var3, int var4, int var5, int var6, int var7, int var8, boolean var9) {
      try {
         if(var6 == 0) {
            var6 = 16777215;
         }

         if(var7 == 0) {
            var7 = 16777215;
         }

         int var10 = this.field_736[var5];
         int var11 = this.field_737[var5];
         int var12 = 0;
         int var13 = 0;
         int var14 = var8 << 16;
         int var15 = (var10 << 16) / var3;
         int var16 = (var11 << 16) / var4;
         int var17 = -(var8 << 16) / var4;
         int var18;
         int var19;
         if(this.field_742[var5]) {
            var18 = this.spriteWidthFull[var5];
            var19 = this.field_741[var5];
            var15 = (var18 << 16) / var3;
            var16 = (var19 << 16) / var4;
            int var20 = this.field_738[var5];
            int var21 = this.field_739[var5];
            if(var9) {
               var20 = var18 - this.field_736[var5] - var20;
            }

            var1 += (var20 * var3 + var18 - 1) / var18;
            int var22 = (var21 * var4 + var19 - 1) / var19;
            var2 += var22;
            var14 += var22 * var17;
            if(var20 * var3 % var18 != 0) {
               var12 = (var18 - var20 * var3 % var18 << 16) / var3;
            }

            if(var21 * var4 % var19 != 0) {
               var13 = (var19 - var21 * var4 % var19 << 16) / var4;
            }

            var3 = ((this.field_736[var5] << 16) - var12 + var15 - 1) / var15;
            var4 = ((this.field_737[var5] << 16) - var13 + var16 - 1) / var16;
         }

         var18 = var2 * this.field_723;
         var14 += var1 << 16;
         if(var2 < this.field_743) {
            var19 = this.field_743 - var2;
            var4 -= var19;
            var2 = this.field_743;
            var18 += var19 * this.field_723;
            var13 += var16 * var19;
            var14 += var17 * var19;
         }

         if(var2 + var4 >= this.field_744) {
            var4 -= var2 + var4 - this.field_744 + 1;
         }

         var19 = var18 / this.field_723 & 1;
         if(!this.interlace) {
            var19 = 2;
         }

         if(var7 == 16777215) {
            if(this.spritePixels[var5] != null) {
               if(!var9) {
                  this.method_259(this.pixels, this.spritePixels[var5], 0, var12, var13, var18, var3, var4, var15, var16, var10, var6, var14, var17, var19);
               } else {
                  this.method_259(this.pixels, this.spritePixels[var5], 0, (this.field_736[var5] << 16) - var12 - 1, var13, var18, var3, var4, -var15, var16, var10, var6, var14, var17, var19);
               }
            } else if(!var9) {
               this.method_261(this.pixels, this.spriteColoursUsed[var5], this.spriteColourList[var5], 0, var12, var13, var18, var3, var4, var15, var16, var10, var6, var14, var17, var19);
            } else {
               this.method_261(this.pixels, this.spriteColoursUsed[var5], this.spriteColourList[var5], 0, (this.field_736[var5] << 16) - var12 - 1, var13, var18, var3, var4, -var15, var16, var10, var6, var14, var17, var19);
            }
         } else if(this.spritePixels[var5] != null) {
            if(!var9) {
               this.method_260(this.pixels, this.spritePixels[var5], 0, var12, var13, var18, var3, var4, var15, var16, var10, var6, var7, var14, var17, var19);
            } else {
               this.method_260(this.pixels, this.spritePixels[var5], 0, (this.field_736[var5] << 16) - var12 - 1, var13, var18, var3, var4, -var15, var16, var10, var6, var7, var14, var17, var19);
            }
         } else if(!var9) {
            this.method_262(this.pixels, this.spriteColoursUsed[var5], this.spriteColourList[var5], 0, var12, var13, var18, var3, var4, var15, var16, var10, var6, var7, var14, var17, var19);
         } else {
            this.method_262(this.pixels, this.spriteColoursUsed[var5], this.spriteColourList[var5], 0, (this.field_736[var5] << 16) - var12 - 1, var13, var18, var3, var4, -var15, var16, var10, var6, var7, var14, var17, var19);
         }
      } catch (Exception var23) {
         System.out.println("error in sprite clipping routine"); // authentic System.out.println
      }
   }

   // $FF: renamed from: a (int[], int[], int, int, int, int, int, int, int, int, int, int, int, int, int) void
   private void method_259(int[] var1, int[] var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13, int var14, int var15) {
      boolean var28 = field_759;
      int var19 = var12 >> 16 & 255;
      int var20 = var12 >> 8 & 255;
      int var21 = var12 & 255;

      try {
         int var22 = var4;
         int var23 = -var8;
         if(var28 || var23 < 0) {
            do {
               int var24 = (var5 >> 16) * var11;
               int var25 = var13 >> 16;
               int var26 = var7;
               int var27;
               if(var25 < this.field_745) {
                  var27 = this.field_745 - var25;
                  var26 = var7 - var27;
                  var25 = this.field_745;
                  var4 += var9 * var27;
               }

               if(var25 + var26 >= this.field_746) {
                  var27 = var25 + var26 - this.field_746;
                  var26 -= var27;
               }

               var15 = 1 - var15;
               if(var15 != 0) {
                  var27 = var25;
                  if(var28 || var25 < var25 + var26) {
                     do {
                        var3 = var2[(var4 >> 16) + var24];
                        if(var3 != 0) {
                           label33: {
                              int var16 = var3 >> 16 & 255;
                              int var17 = var3 >> 8 & 255;
                              int var18 = var3 & 255;
                              if(var16 == var17 && var17 == var18) {
                                 var1[var27 + var6] = (var16 * var19 >> 8 << 16) + (var17 * var20 >> 8 << 8) + (var18 * var21 >> 8);
                                 if(!var28) {
                                    break label33;
                                 }
                              }

                              var1[var27 + var6] = var3;
                           }
                        }

                        var4 += var9;
                        ++var27;
                     } while(var27 < var25 + var26);
                  }
               }

               var5 += var10;
               var4 = var22;
               var6 += this.field_723;
               var13 += var14;
               ++var23;
            } while(var23 < 0);

         }
      } catch (Exception var29) {
         System.out.println("error in transparent sprite plot routine"); // authentic System.out.println
      }
   }

   // $FF: renamed from: a (int[], int[], int, int, int, int, int, int, int, int, int, int, int, int, int, int) void
   private void method_260(int[] var1, int[] var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13, int var14, int var15, int var16) {
      boolean var32 = field_759;
      int var20 = var12 >> 16 & 255;
      int var21 = var12 >> 8 & 255;
      int var22 = var12 & 255;
      int var23 = var13 >> 16 & 255;
      int var24 = var13 >> 8 & 255;
      int var25 = var13 & 255;

      try {
         int var26 = var4;
         int var27 = -var8;
         if(var32 || var27 < 0) {
            do {
               int var28 = (var5 >> 16) * var11;
               int var29 = var14 >> 16;
               int var30 = var7;
               int var31;
               if(var29 < this.field_745) {
                  var31 = this.field_745 - var29;
                  var30 = var7 - var31;
                  var29 = this.field_745;
                  var4 += var9 * var31;
               }

               if(var29 + var30 >= this.field_746) {
                  var31 = var29 + var30 - this.field_746;
                  var30 -= var31;
               }

               var16 = 1 - var16;
               if(var16 != 0) {
                  var31 = var29;
                  if(var32 || var29 < var29 + var30) {
                     do {
                        var3 = var2[(var4 >> 16) + var28];
                        if(var3 != 0) {
                           label69: {
                              int var17 = var3 >> 16 & 255;
                              int var18 = var3 >> 8 & 255;
                              int var19 = var3 & 255;
                              if(var17 == var18 && var18 == var19) {
                                 var1[var31 + var6] = (var17 * var20 >> 8 << 16) + (var18 * var21 >> 8 << 8) + (var19 * var22 >> 8);
                                 if(!var32) {
                                    break label69;
                                 }
                              }

                              if(var17 == 255 && var18 == var19) {
                                 var1[var31 + var6] = (var17 * var23 >> 8 << 16) + (var18 * var24 >> 8 << 8) + (var19 * var25 >> 8);
                                 if(!var32) {
                                    break label69;
                                 }
                              }

                              var1[var31 + var6] = var3;
                           }
                        }

                        var4 += var9;
                        ++var31;
                     } while(var31 < var29 + var30);
                  }
               }

               var5 += var10;
               var4 = var26;
               var6 += this.field_723;
               var14 += var15;
               ++var27;
            } while(var27 < 0);

         }
      } catch (Exception var33) {
         System.out.println("error in transparent sprite plot routine"); // authentic System.out.println
      }
   }

   // $FF: renamed from: a (int[], byte[], int[], int, int, int, int, int, int, int, int, int, int, int, int, int) void
   private void method_261(int[] var1, byte[] var2, int[] var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13, int var14, int var15, int var16) {
      boolean var29 = field_759;
      int var20 = var13 >> 16 & 255;
      int var21 = var13 >> 8 & 255;
      int var22 = var13 & 255;

      try {
         int var23 = var5;
         int var24 = -var9;
         if(var29 || var24 < 0) {
            do {
               int var25 = (var6 >> 16) * var12;
               int var26 = var14 >> 16;
               int var27 = var8;
               int var28;
               if(var26 < this.field_745) {
                  var28 = this.field_745 - var26;
                  var27 = var8 - var28;
                  var26 = this.field_745;
                  var5 += var10 * var28;
               }

               if(var26 + var27 >= this.field_746) {
                  var28 = var26 + var27 - this.field_746;
                  var27 -= var28;
               }

               var16 = 1 - var16;
               if(var16 != 0) {
                  var28 = var26;
                  if(var29 || var26 < var26 + var27) {
                     do {
                        var4 = var2[(var5 >> 16) + var25] & 255;
                        if(var4 != 0) {
                           label33: {
                              var4 = var3[var4];
                              int var17 = var4 >> 16 & 255;
                              int var18 = var4 >> 8 & 255;
                              int var19 = var4 & 255;
                              if(var17 == var18 && var18 == var19) {
                                 var1[var28 + var7] = (var17 * var20 >> 8 << 16) + (var18 * var21 >> 8 << 8) + (var19 * var22 >> 8);
                                 if(!var29) {
                                    break label33;
                                 }
                              }

                              var1[var28 + var7] = var4;
                           }
                        }

                        var5 += var10;
                        ++var28;
                     } while(var28 < var26 + var27);
                  }
               }

               var6 += var11;
               var5 = var23;
               var7 += this.field_723;
               var14 += var15;
               ++var24;
            } while(var24 < 0);

         }
      } catch (Exception var30) {
         System.out.println("error in transparent sprite plot routine"); // authentic System.out.println
      }
   }

   // $FF: renamed from: a (int[], byte[], int[], int, int, int, int, int, int, int, int, int, int, int, int, int, int) void
   private void method_262(int[] var1, byte[] var2, int[] var3, int var4, int var5, int var6, int var7, int var8, int var9, int var10, int var11, int var12, int var13, int var14, int var15, int var16, int var17) {
      boolean var33 = field_759;
      int var21 = var13 >> 16 & 255;
      int var22 = var13 >> 8 & 255;
      int var23 = var13 & 255;
      int var24 = var14 >> 16 & 255;
      int var25 = var14 >> 8 & 255;
      int var26 = var14 & 255;

      try {
         int var27 = var5;
         int var28 = -var9;
         if(var33 || var28 < 0) {
            do {
               int var29 = (var6 >> 16) * var12;
               int var30 = var15 >> 16;
               int var31 = var8;
               int var32;
               if(var30 < this.field_745) {
                  var32 = this.field_745 - var30;
                  var31 = var8 - var32;
                  var30 = this.field_745;
                  var5 += var10 * var32;
               }

               if(var30 + var31 >= this.field_746) {
                  var32 = var30 + var31 - this.field_746;
                  var31 -= var32;
               }

               var17 = 1 - var17;
               if(var17 != 0) {
                  var32 = var30;
                  if(var33 || var30 < var30 + var31) {
                     do {
                        var4 = var2[(var5 >> 16) + var29] & 255;
                        if(var4 != 0) {
                           label69: {
                              var4 = var3[var4];
                              int var18 = var4 >> 16 & 255;
                              int var19 = var4 >> 8 & 255;
                              int var20 = var4 & 255;
                              if(var18 == var19 && var19 == var20) {
                                 var1[var32 + var7] = (var18 * var21 >> 8 << 16) + (var19 * var22 >> 8 << 8) + (var20 * var23 >> 8);
                                 if(!var33) {
                                    break label69;
                                 }
                              }

                              if(var18 == 255 && var19 == var20) {
                                 var1[var32 + var7] = (var18 * var24 >> 8 << 16) + (var19 * var25 >> 8 << 8) + (var20 * var26 >> 8);
                                 if(!var33) {
                                    break label69;
                                 }
                              }

                              var1[var32 + var7] = var4;
                           }
                        }

                        var5 += var10;
                        ++var32;
                     } while(var32 < var30 + var31);
                  }
               }

               var6 += var11;
               var5 = var27;
               var7 += this.field_723;
               var15 += var16;
               ++var28;
            } while(var28 < 0);

         }
      } catch (Exception var34) {
         System.out.println("error in transparent sprite plot routine"); // authentic System.out.println
      }
   }

   // $FF: renamed from: a (byte[]) int
   public static int loadFont(byte[] var0) {
      field_748[field_750] = var0;
      return field_750++;
   }

   // $FF: renamed from: a (java.lang.String, int, int, int, int) void
   public void method_264(String var1, int var2, int var3, int var4, int var5) {
      this.drawString(var1, var2 - this.method_271(var1, var4), var3, var4, var5);
   }

   // $FF: renamed from: b (java.lang.String, int, int, int, int) void
   public void drawstringCenter(String var1, int var2, int var3, int var4, int var5) {
      this.drawString(var1, var2 - this.method_271(var1, var4) / 2, var3, var4, var5);
   }

   // $FF: renamed from: a (java.lang.String, int, int, int, int, int) void
   public void method_266(String var1, int var2, int var3, int var4, int var5, int var6) {
      boolean var12 = field_759;

      try {
         int var7 = 0;
         byte[] var8 = field_748[var4];
         int var9 = 0;
         int var10 = 0;
         int var11 = 0;
         if(var12 || var11 < var1.length()) {
            do {
               label70: {
                  if(var1.charAt(var11) == 64 && var11 + 4 < var1.length() && var1.charAt(var11 + 4) == 64) {
                     var11 += 4;
                     if(!var12) {
                        break label70;
                     }
                  }

                  if(var1.charAt(var11) == 126 && var11 + 4 < var1.length() && var1.charAt(var11 + 4) == 126) {
                     var11 += 4;
                     if(!var12) {
                        break label70;
                     }
                  }

                  var7 += var8[field_749[var1.charAt(var11)] + 7];
               }

               if(var1.charAt(var11) == 32) {
                  var10 = var11;
               }

               if(var1.charAt(var11) == 37) {
                  var10 = var11;
                  var7 = 1000;
               }

               if(var7 > var6) {
                  if(var10 <= var9) {
                     var10 = var11;
                  }

                  this.drawstringCenter(var1.substring(var9, var10), var2, var3, var4, var5);
                  var7 = 0;
                  var9 = var11 = var10 + 1;
                  var3 += this.method_270(var4);
               }

               ++var11;
            } while(var11 < var1.length());
         }

         if(var7 > 0) {
            this.drawstringCenter(var1.substring(var9), var2, var3, var4, var5);
            return;
         }
      } catch (Exception var13) {
         System.out.println("centrepara: " + var13); // authentic System.out.println
         var13.printStackTrace();
      }

   }

   // $FF: renamed from: c (java.lang.String, int, int, int, int) void
   public void drawString(String var1, int var2, int var3, int var4, int var5) {
      boolean var11 = field_759;

      try {
         byte[] var6 = field_748[var4];
         int var7 = 0;
         if(var11 || var7 < var1.length()) {
            do {
               label165: {
                  if(var1.charAt(var7) == 64 && var7 + 4 < var1.length() && var1.charAt(var7 + 4) == 64) {
                     label166: {
                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("red")) {
                           var5 = 16711680;
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("lre")) {
                           var5 = 16748608;
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("yel")) {
                           var5 = 16776960;
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("gre")) {
                           var5 = '\uff00';
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("blu")) {
                           var5 = 255;
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("cya")) {
                           var5 = '\uffff';
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("mag")) {
                           var5 = 16711935;
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("whi")) {
                           var5 = 16777215;
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("bla")) {
                           var5 = 0;
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("dre")) {
                           var5 = 12582912;
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("ora")) {
                           var5 = 16748608;
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("ran")) {
                           var5 = (int)(Math.random() * 1.6777215E7D);
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("or1")) {
                           var5 = 16756736;
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("or2")) {
                           var5 = 16740352;
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("or3")) {
                           var5 = 16723968;
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("gr1")) {
                           var5 = 12648192;
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("gr2")) {
                           var5 = 8453888;
                           if(!var11) {
                              break label166;
                           }
                        }

                        if(var1.substring(var7 + 1, var7 + 4).equalsIgnoreCase("gr3")) {
                           var5 = 4259584;
                        }
                     }

                     var7 += 4;
                     if(!var11) {
                        break label165;
                     }
                  }

                  if(var1.charAt(var7) == 126 && var7 + 4 < var1.length() && var1.charAt(var7 + 4) == 126) {
                     char var8 = var1.charAt(var7 + 1);
                     char var9 = var1.charAt(var7 + 2);
                     char var10 = var1.charAt(var7 + 3);
                     if(var8 >= 48 && var8 <= 57 && var9 >= 48 && var9 <= 57 && var10 >= 48 && var10 <= 57) {
                        var2 = Integer.parseInt(var1.substring(var7 + 1, var7 + 4));
                     }

                     var7 += 4;
                     if(!var11) {
                        break label165;
                     }
                  }

                  int var13 = field_749[var1.charAt(var7)];
                  if(this.loggedIn && var5 != 0) {
                     this.method_268(var13, var2 + 1, var3, 0, var6);
                  }

                  if(this.loggedIn && var5 != 0) {
                     this.method_268(var13, var2, var3 + 1, 0, var6);
                  }

                  this.method_268(var13, var2, var3, var5, var6);
                  var2 += var6[var13 + 7];
               }

               ++var7;
            } while(var7 < var1.length());

         }
      } catch (Exception var12) {
         System.out.println("drawstring: " + var12); // authentic System.out.println
         var12.printStackTrace();
      }
   }

   // $FF: renamed from: a (int, int, int, int, byte[]) void
   private void method_268(int var1, int var2, int var3, int var4, byte[] var5) {
      int var6 = var2 + var5[var1 + 5];
      int var7 = var3 - var5[var1 + 6];
      int var8 = var5[var1 + 3];
      int var9 = var5[var1 + 4];
      int var10 = var5[var1] * 16384 + var5[var1 + 1] * 128 + var5[var1 + 2];
      int var11 = var6 + var7 * this.field_723;
      int var12 = this.field_723 - var8;
      int var13 = 0;
      int var14;
      if(var7 < this.field_743) {
         var14 = this.field_743 - var7;
         var9 -= var14;
         var7 = this.field_743;
         var10 += var14 * var8;
         var11 += var14 * this.field_723;
      }

      if(var7 + var9 >= this.field_744) {
         var9 -= var7 + var9 - this.field_744 + 1;
      }

      if(var6 < this.field_745) {
         var14 = this.field_745 - var6;
         var8 -= var14;
         var6 = this.field_745;
         var10 += var14;
         var11 += var14;
         var13 += var14;
         var12 += var14;
      }

      if(var6 + var8 >= this.field_746) {
         var14 = var6 + var8 - this.field_746 + 1;
         var8 -= var14;
         var13 += var14;
         var12 += var14;
      }

      if(var8 > 0 && var9 > 0) {
         this.method_269(this.pixels, var5, var4, var10, var11, var8, var9, var12, var13);
      }

   }

   // $FF: renamed from: a (int[], byte[], int, int, int, int, int, int, int) void
   private void method_269(int[] var1, byte[] var2, int var3, int var4, int var5, int var6, int var7, int var8, int var9) {
      boolean var14 = field_759;

      try {
         int var10 = -(var6 >> 2);
         var6 = -(var6 & 3);
         int var11 = -var7;
         if(var14 || var11 < 0) {
            do {
               int var12 = var10;
               int var13;
               if(!var14 && var10 >= 0) {
                  var13 = var6;
                  if(var14 || var6 < 0) {
                     do {
                        label93: {
                           if(var2[var4++] != 0) {
                              var1[var5++] = var3;
                              if(!var14) {
                                 break label93;
                              }
                           }

                           ++var5;
                        }

                        ++var13;
                     } while(var13 < 0);

                     var5 += var8;
                     var4 += var9;
                     ++var11;
                  } else {
                     var5 += var8;
                     var4 += var9;
                     ++var11;
                  }
               } else {
                  do {
                     label73: {
                        if(var2[var4++] != 0) {
                           var1[var5++] = var3;
                           if(!var14) {
                              break label73;
                           }
                        }

                        ++var5;
                     }

                     label67: {
                        if(var2[var4++] != 0) {
                           var1[var5++] = var3;
                           if(!var14) {
                              break label67;
                           }
                        }

                        ++var5;
                     }

                     label61: {
                        if(var2[var4++] != 0) {
                           var1[var5++] = var3;
                           if(!var14) {
                              break label61;
                           }
                        }

                        ++var5;
                     }

                     label55: {
                        if(var2[var4++] != 0) {
                           var1[var5++] = var3;
                           if(!var14) {
                              break label55;
                           }
                        }

                        ++var5;
                     }

                     ++var12;
                  } while(var12 < 0);

                  var13 = var6;
                  if(var14 || var6 < 0) {
                     do {
                        label38: {
                           if(var2[var4++] != 0) {
                              var1[var5++] = var3;
                              if(!var14) {
                                 break label38;
                              }
                           }

                           ++var5;
                        }

                        ++var13;
                     } while(var13 < 0);

                     var5 += var8;
                     var4 += var9;
                     ++var11;
                  } else {
                     var5 += var8;
                     var4 += var9;
                     ++var11;
                  }
               }
            } while(var11 < 0);

         }
      } catch (Exception var15) {
         System.out.println("plotletter: " + var15); // authentic System.out.println
         var15.printStackTrace();
      }
   }

   // $FF: renamed from: c (int) int
   public int method_270(int var1) {
      return var1 == 0?field_748[var1][8] - 2:field_748[var1][8] - 1;
   }

   // $FF: renamed from: a (java.lang.String, int) int
   public int method_271(String var1, int var2) {
      boolean var6 = field_759;
      int var3 = 0;
      byte[] var4 = field_748[var2];
      int var5 = 0;
      if(!var6 && var5 >= var1.length()) {
         return var3;
      } else {
         do {
            label42: {
               if(var1.charAt(var5) == 64 && var5 + 4 < var1.length() && var1.charAt(var5 + 4) == 64) {
                  var5 += 4;
                  if(!var6) {
                     break label42;
                  }
               }

               if(var1.charAt(var5) == 126 && var5 + 4 < var1.length() && var1.charAt(var5 + 4) == 126) {
                  var5 += 4;
                  if(!var6) {
                     break label42;
                  }
               }

               var3 += var4[field_749[var1.charAt(var5)] + 7];
            }

            ++var5;
         } while(var5 < var1.length());

         return var3;
      }
   }

   // $FF: renamed from: <clinit> () void
   static {
      field_748 = new byte[50][];
      String var0 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!\"£$%^&*()-_=+[{]};:\'@#~,<.>/?\\| ";
      field_749 = new int[256];

      for(int var1 = 0; var1 < 256; ++var1) {
         int var2 = var0.indexOf(var1);
         if(var2 == -1) {
            var2 = 74;
         }

         field_749[var1] = var2 * 9;
      }

   }
}
