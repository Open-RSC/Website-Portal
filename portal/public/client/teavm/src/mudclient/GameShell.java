package mudclient;

import java.io.IOException;

import org.teavm.jso.canvas.ImageData;
import org.teavm.jso.dom.html.HTMLCanvasElement;
import org.teavm.jso.dom.html.HTMLDocument;
import org.teavm.jso.dom.html.TextRectangle;
import org.teavm.jso.typedarrays.Uint8ClampedArray;
import org.teavm.jso.dom.events.EventListener;
import org.teavm.jso.dom.events.KeyboardEvent;
import org.teavm.jso.dom.events.MouseEvent;


// $FF: renamed from: a.a.a
public class GameShell {
   // inauthentic boolean to disable cache url loading in applet mode
   public static boolean disableCacheURLLoader = true;

   // $FF: renamed from: a int
   private int width;
   // $FF: renamed from: b int
   private int height;
   // $FF: renamed from: d int
   private int field_4;
   // $FF: renamed from: e int
   private int field_5;
   // $FF: renamed from: f long[]
   private long[] field_6;
   // $FF: renamed from: h boolean
   private boolean applicationMode;
   // $FF: renamed from: i int
   private int field_9;
   // $FF: renamed from: j int
   private int field_10;
   // $FF: renamed from: k int
   public int offsetY;
   // $FF: renamed from: l int
   public int lastMouseAction;
   // $FF: renamed from: m int
   public int loadingStep;
   // $FF: renamed from: n java.lang.String
   public String field_14;
   // $FF: renamed from: o boolean
   private boolean field_15;
   // $FF: renamed from: p int
   private int field_16;
   // $FF: renamed from: q java.lang.String
   private String field_17;
   // $FF: renamed from: r java.awt.Font
   private Font timesRoman;
   // $FF: renamed from: s java.awt.Font
   private Font helveticaBold;
   // $FF: renamed from: t java.awt.Font
   private Font helvetica;
   // $FF: renamed from: u java.awt.Image
   private ImageData jagexLogo;
   // $FF: renamed from: v java.awt.Graphics
   private Graphics graphics;
   // $FF: renamed from: w java.lang.String
   private static String characterMap;
   // $FF: renamed from: z boolean
   public boolean keyLeftDown;
   // $FF: renamed from: A boolean
   public boolean keyRightDown;
   // $FF: renamed from: D boolean
   public boolean keySpaceDown;
   // $FF: renamed from: F int
   public int field_32;
   // $FF: renamed from: G int
   public int mouseX;
   // $FF: renamed from: H int
   public int mouseY;
   // $FF: renamed from: I int
   public int mouseButtonDown;
   // $FF: renamed from: J int
   public int lastMouseButtonDown;
   // $FF: renamed from: K int
   public int field_37;
   // $FF: renamed from: L int
   public int field_38;
   // $FF: renamed from: M boolean
   public boolean interlace;
   // $FF: renamed from: N java.lang.String
   public String inputTextCurrent;
   // $FF: renamed from: O java.lang.String
   public String inputTextFinal;
   // $FF: renamed from: P java.lang.String
   public String field_42;
   // $FF: renamed from: Q java.lang.String
   public String pmToSend;

   private HTMLCanvasElement canvas;

   // $FF: renamed from: a () void
   public void startGame() {}

   // $FF: renamed from: b () void
   public void method_3() {}

   // $FF: renamed from: c () void
   public void method_4() {}

   // $FF: renamed from: d () void
   public void method_5() {}

   // $FF: renamed from: e () void
   public void method_6() {}

   // $FF: renamed from: a (int, int, java.lang.String, boolean) void
   public final void startApplication(int width, int height, String title, boolean var4) {
      this.applicationMode = true;
      System.out.println("Started application"); // authentic System.out.println
      this.width = width;
      this.height = height;
      this.loadingStep = 1;

      HTMLDocument.current().setTitle(title);
      
      this.canvas = (HTMLCanvasElement) HTMLDocument.current().createElement("canvas");
      this.canvas.setAttribute("tabindex", "-1");
      this.canvas.setWidth(width);
      this.canvas.setHeight(height);

      this.canvas.addEventListener("mousedown", new EventListener<MouseEvent>(){
         public void handleEvent(MouseEvent event) {                         
             setMousePosition(event);                                        
             mouseDown(event.getButton() == 2 ? 2 : 1);                   
         }                                                                   
     });                                                                     
                                                                             
     this.canvas.addEventListener("mouseup", new EventListener<MouseEvent>(){
         public void handleEvent(MouseEvent event) {                         
             setMousePosition(event);                                        
             mouseUp();                                                
         }                                                                   
     });                                                                     
                                                                             
     this.canvas.addEventListener("mousemove", new EventListener<MouseEvent>(){
         public void handleEvent(MouseEvent event) {                         
             setMousePosition(event);                                        
             mouseMove();                                                   
         }                                                                   
     });                                                                     
                                                                             
     this.canvas.addEventListener("contextmenu", new EventListener<MouseEvent>(){
         public void handleEvent(MouseEvent event) {                         
             event.preventDefault();                                         
         }                                                                   
     });

      this.canvas.addEventListener("keydown", new EventListener<KeyboardEvent>(){
         public void handleEvent(KeyboardEvent event) {                      
            int code = event.getKeyCode();                                  
                                                                           
            char charCode =                                                 
               event.getKey().length() == 1 ? event.getKey().charAt(0) : (char) code;
                                                                           
            if (code == 8 || code == 13 || code == 10 || code == 9) {       
               charCode = (char) code;                                     
            }
                                                                           
            keyDown(charCode);
         }                                                                   
      });                                                                     
                                                                           
      this.canvas.addEventListener("keyup", new EventListener<KeyboardEvent>(){
         public void handleEvent(KeyboardEvent event) {                      
            int code = event.getKeyCode();
            keyUp(code);
         }
      });                                                                     
  

      this.graphics = new Graphics(this.canvas);

      HTMLDocument.current().getBody().appendChild(this.canvas);

      this.start();
      this.run();
   }

   // $FF: renamed from: f () boolean
   public final boolean isApplication() {
      return this.applicationMode;
   }

   // $FF: renamed from: a (int) void
   public final void method_9(int var1) {
      this.field_4 = 1000 / var1;
   }

   // $FF: renamed from: g () void
   public final void method_10() {
      int var1 = 0;
      if(Surface.field_759 || var1 < 10) {
         do {
            this.field_6[var1] = 0L;
            ++var1;
         } while(var1 < 10);

      }
   }

   public boolean keyDown(int code) {
      boolean var5 = Surface.field_759;
      this.field_37 = code;
      this.field_38 = code;
      this.lastMouseAction = 0;

      if(code == KeyEvent.VK_LEFT) {
         this.keyLeftDown = true;
      } else if (code == KeyEvent.VK_RIGHT) {
         this.keyRightDown = true;
      } else if ((char)code == KeyEvent.VK_SPACE) {
         this.keySpaceDown = true;
      } else if ((char)code == KeyEvent.VK_F1) {
         this.interlace = !this.interlace;
      } else {
         // quick hack for now to prevent those keys from inputting into the chat box
         this.handleKeyPress(code);
      }

      boolean isText = false;
      int var4 = 0;
      if(var5 || var4 < characterMap.length()) {
         do {
            if(code == characterMap.charAt(var4)) {
               isText = true;
               if(!var5) {
                  break;
               }
            }

            ++var4;
         } while(var4 < characterMap.length());
      }

      if(isText && this.inputTextCurrent.length() < 20) {
         this.inputTextCurrent = this.inputTextCurrent + (char)code;
      }

      if(isText && this.field_42.length() < 80) {
         this.field_42 = this.field_42 + (char)code;
      }

      if(code == 8 && this.inputTextCurrent.length() > 0) {
         this.inputTextCurrent = this.inputTextCurrent.substring(0, this.inputTextCurrent.length() - 1);
      }

      if(code == 8 && this.field_42.length() > 0) {
         this.field_42 = this.field_42.substring(0, this.field_42.length() - 1);
      }

      if(code == 10 || code == 13) {
         this.inputTextFinal = this.inputTextCurrent;
         this.pmToSend = this.field_42;
      }

      return true;
   }

   // $FF: renamed from: b (int) void
   public void handleKeyPress(int var1) {}

   public boolean keyUp(int var2) {
      this.field_37 = 0;
      if(var2 == KeyEvent.VK_LEFT) {
         this.keyLeftDown = false;
      }

      if(var2 == KeyEvent.VK_RIGHT) {
         this.keyRightDown = false;
      }

      if((char)var2 == KeyEvent.VK_SPACE) {
         this.keySpaceDown = false;
      }

      return true;
   }

   private void setMousePosition(MouseEvent event) {                                      
      TextRectangle boundingRect = canvas.getBoundingClientRect();            
      double scaleX = canvas.getWidth() / boundingRect.getWidth();            
      double scaleY = canvas.getHeight() / boundingRect.getHeight();          
                                                                              
      this.mouseX = (int) ((event.getClientX() - boundingRect.getLeft()) * scaleX);
      this.mouseY = (int) ((event.getClientY() - boundingRect.getTop()) * scaleY);
      this.mouseY += this.offsetY;
   }

   public boolean mouseMove() {
      //this.mouseButtonDown = 0; javascript doesn't have a separate drag event
      this.lastMouseAction = 0;
      return true;
   }

   public boolean mouseUp() {
      this.mouseButtonDown = 0;
      return true;
   }

   public boolean mouseDown(int button) {
      this.mouseButtonDown = button;
      this.lastMouseButtonDown = this.mouseButtonDown;
      this.lastMouseAction = 0;
      this.method_12(this.mouseButtonDown, this.mouseX, this.mouseY - this.offsetY);
      return true;
   }

   // $FF: renamed from: a (int, int, int) void
   public void method_12(int var1, int var2, int var3) {}

   public boolean mouseDrag() {
      this.mouseButtonDown = 1;
      return true;
   }

   public final void start() {
      if(this.field_9 >= 0) {
         this.field_9 = 0;
      }

   }

   public final void destroy() {
      this.field_9 = -1;

      try {
         Thread.sleep(5000L);
      } catch (Exception var1) {
         ;
      }

      if(this.field_9 == -1) {
         System.out.println("5 seconds expired, forcing kill"); // authentic System.out.println
         this.method_13();
      }

   }

   // $FF: renamed from: h () void
   public final void method_13() {
      this.field_9 = -2;
      System.out.println("Closing program"); // authentic System.out.println
      this.method_4();

      try {
         Thread.sleep(1000L);
      } catch (Exception var1) {
         ;
      }

      if(!this.applicationMode) {
         //System.exit(0);
      }

   }

   public final void run() {
      boolean var11 = Surface.field_759;
      if(this.loadingStep == 1) {
         this.loadingStep = 2;
         this.graphics = this.getGraphics();
         this.method_14();
         this.method_15(0, "Loading...");
         this.startGame();
         this.loadingStep = 0;
      }

      int var3 = 0;
      int var4 = 256;
      int var5 = 1;
      int var6 = 0;
      int var7 = 0;
      if(var11 || var7 < 10) {
         do {
            this.field_6[var7] = System.currentTimeMillis();
            ++var7;
         } while(var7 < 10);
      }

      long var1 = System.currentTimeMillis();
      if(!var11 && this.field_9 < 0) {
         if(this.field_9 == -1) {
            this.method_13();
         }
      } else {
         do {
            if(this.field_9 > 0) {
               --this.field_9;
               if(this.field_9 == 0) {
                  this.method_13();
                  return;
               }
            }

            label88: {
               int var8 = var4;
               int var9 = var5;
               var4 = 300;
               var5 = 1;
               var1 = System.currentTimeMillis();
               if(this.field_6[var3] == 0L) {
                  var4 = var8;
                  var5 = var9;
                  if(!var11) {
                     break label88;
                  }
               }

               if(var1 > this.field_6[var3]) {
                  var4 = (int)((long)(2560 * this.field_4) / (var1 - this.field_6[var3]));
               }
            }

            if(var4 < 25) {
               var4 = 25;
            }

            if(var4 > 256) {
               var4 = 256;
               var5 = (int)((long)this.field_4 - (var1 - this.field_6[var3]) / 10L);
               if(var5 < this.field_32) {
                  var5 = this.field_32;
               }
            }

            try {
               Thread.sleep((long)var5);
            } catch (InterruptedException var12) {
               ;
            }

            this.field_6[var3] = var1;
            var3 = (var3 + 1) % 10;
            int var10;
            if(var5 > 1) {
               var10 = 0;
               if(var11 || var10 < 10) {
                  do {
                     if(this.field_6[var10] != 0L) {
                        this.field_6[var10] += (long)var5;
                     }

                     ++var10;
                  } while(var10 < 10);
               }
            }

            var10 = 0;
            if(var11 || var6 < 256) {
               do {
                  this.method_3();
                  var6 += var4;
                  ++var10;
                  if(var10 > this.field_5) {
                     var6 = 0;
                     this.field_10 += 6;
                     if(this.field_10 <= 25) {
                        break;
                     }

                     this.field_10 = 0;
                     this.interlace = true;
                     if(!var11) {
                        break;
                     }
                  }
               } while(var6 < 256);
            }

            --this.field_10;
            var6 &= 255;
            this.method_5();
         } while(this.field_9 >= 0);

         if(this.field_9 == -1) {
            this.method_13();
         }
      }
   }

   public final void update(Graphics var1) {
      this.paint(var1);
   }

   public final void paint(Graphics var1) {
      if(this.loadingStep == 2 && this.jagexLogo != null) {
         this.method_15(this.field_16, this.field_17);
      } else {
         if(this.loadingStep == 0) {
            this.method_6();
         }

      }
   }

   // $FF: renamed from: i () void
   public void method_14() {
      this.graphics.setColor(Color.black);
      this.graphics.fillRect(0, 0, this.width, this.height);
      byte[] jagexJag = this.readDataFile("jagex.jag", "Jagex library", 0);
      if(jagexJag != null) {
         byte[] tgaBuffer = Utility.loadData("logo.tga", 0, jagexJag);
         this.jagexLogo = this.parseTGA(tgaBuffer);
         Surface.loadFont(Utility.loadData("h11p.jf", 0, jagexJag));
         Surface.loadFont(Utility.loadData("h12b.jf", 0, jagexJag));
         Surface.loadFont(Utility.loadData("h12p.jf", 0, jagexJag));
         Surface.loadFont(Utility.loadData("h13b.jf", 0, jagexJag));
         Surface.loadFont(Utility.loadData("h14b.jf", 0, jagexJag));
         Surface.loadFont(Utility.loadData("h16b.jf", 0, jagexJag));
         Surface.loadFont(Utility.loadData("h20b.jf", 0, jagexJag));
         Surface.loadFont(Utility.loadData("h24b.jf", 0, jagexJag));
      }
   }

   // $FF: renamed from: a (int, java.lang.String) void
   public void method_15(int var1, String var2) {
      try {
         int var3 = (this.width - 281) / 2;
         int var4 = (this.height - 148) / 2;
         this.graphics.setColor(Color.black);
         this.graphics.fillRect(0, 0, this.width, this.height);
         if(!this.field_15) {
            this.graphics.drawImage(this.jagexLogo, var3, var4);
         }

         var3 += 2;
         var4 += 90;
         this.field_16 = var1;
         this.field_17 = var2;
         this.graphics.setColor(new Color(132, 132, 132));
         if(this.field_15) {
            this.graphics.setColor(new Color(220, 0, 0));
         }

         this.graphics.drawRect(var3 - 2, var4 - 2, 280, 23);
         this.graphics.fillRect(var3, var4, 277 * var1 / 100, 20);
         this.graphics.setColor(new Color(198, 198, 198));
         if(this.field_15) {
            this.graphics.setColor(new Color(255, 255, 255));
         }

         label26: {
            this.drawStringCentre(this.graphics, var2, this.timesRoman, var3 + 138, var4 + 10);
            if(!this.field_15) {
               this.drawStringCentre(this.graphics, "Created by JAGeX - visit www.jagex.com", this.helveticaBold, var3 + 138, var4 + 30);
               this.drawStringCentre(this.graphics, "©2001-2002 Andrew Gower and Jagex Ltd", this.helveticaBold, var3 + 138, var4 + 44);
               if(!Surface.field_759) {
                  break label26;
               }
            }

            this.graphics.setColor(new Color(132, 132, 152));
            this.drawStringCentre(this.graphics, "©2001-2002 Andrew Gower and Jagex Ltd", this.helvetica, var3 + 138, this.height - 20);
         }

         if(this.field_14 != null) {
            this.graphics.setColor(Color.white);
            this.drawStringCentre(this.graphics, this.field_14, this.helveticaBold, var3 + 138, var4 - 120);
            return;
         }
      } catch (Exception var5) {
         ;
      }

   }

   // $FF: renamed from: b (int, java.lang.String) void
   public void showLoadingProgress(int var1, String var2) {
      try {
         int var3 = (this.width - 281) / 2;
         int var4 = (this.height - 148) / 2;
         var3 += 2;
         var4 += 90;
         this.field_16 = var1;
         this.field_17 = var2;
         int var5 = 277 * var1 / 100;
         this.graphics.setColor(new Color(132, 132, 132));
         if(this.field_15) {
            this.graphics.setColor(new Color(220, 0, 0));
         }

         this.graphics.fillRect(var3, var4, var5, 20);
         this.graphics.setColor(Color.black);
         this.graphics.fillRect(var3 + var5, var4, 277 - var5, 20);
         this.graphics.setColor(new Color(198, 198, 198));
         if(this.field_15) {
            this.graphics.setColor(new Color(255, 255, 255));
         }

         this.drawStringCentre(this.graphics, var2, this.timesRoman, var3 + 138, var4 + 10);
      } catch (Exception var6) {
         ;
      }
   }

   // $FF: renamed from: a (java.awt.Graphics, java.lang.String, java.awt.Font, int, int) void
   public void drawStringCentre(Graphics graphics, String string, Font font, int x, int y) {
      graphics.setFont(font);
      int stringWidth = this.graphics.measureTextWidth(string);
      graphics.drawString(string, x - stringWidth / 2, y + font.getSize() / 4);
   }

   // $FF: renamed from: a (byte[]) java.awt.Image
   public ImageData parseTGA(byte[] tgaBuffer) {
      boolean var14 = Surface.field_759;

      int width = tgaBuffer[13] * 256 + tgaBuffer[12];
      int height = tgaBuffer[15] * 256 + tgaBuffer[14];
      byte[] redIndex = new byte[256];
      byte[] greenIndex = new byte[256];
      byte[] blueIndex = new byte[256];
      int rgbIdx = 0;
      if(var14 || rgbIdx < 256) {
         do {
            redIndex[rgbIdx] = tgaBuffer[20 + rgbIdx * 3];
            greenIndex[rgbIdx] = tgaBuffer[19 + rgbIdx * 3];
            blueIndex[rgbIdx] = tgaBuffer[18 + rgbIdx * 3];
            ++rgbIdx;
         } while(rgbIdx < 256);
      }

      Uint8ClampedArray imageBytes = Uint8ClampedArray.create(width * height * 4);
      int byteIdx = 0;
      int y = height - 1;

      if(!var14 && y < 0) {
         return this.graphics.getContext().createImageData(1, 1);
      } else {
         do {
            int x = 0;

            if(!var14 && x >= width) {
               --y;
            } else {
               do {
                  int pixel = tgaBuffer[786 + x + y * width] & 0xff;
                  imageBytes.set(byteIdx++, redIndex[pixel] & 0xff);
                  imageBytes.set(byteIdx++, greenIndex[pixel] & 0xff);
                  imageBytes.set(byteIdx++, blueIndex[pixel] & 0xff);
                  imageBytes.set(byteIdx++, 255);
                  ++x;
               } while(x < width);

               --y;
            }
         } while(y >= 0);
      }

      ImageData imageData = this.graphics.getContext().createImageData(width, height);
      imageData.setData(imageBytes);

      return imageData;
   }

   // $FF: renamed from: a (java.lang.String, java.lang.String, int) byte[]
   public byte[] readDataFile(String fileName, String friendlyName, int progress) {
      System.out.println("Using default load"); // authentic System.out.println
      int var4 = 0;
      int var5 = 0;
      byte[] var6 = null;

      try {
         this.showLoadingProgress(progress, "Loading " + friendlyName + " - 0%");
         FileDownloadStream var8 = Utility.getDownloadStream(fileName);
         byte[] var9 = new byte[6];
         var8.readFully(var9, 0, 6);
         var4 = ((var9[0] & 255) << 16) + ((var9[1] & 255) << 8) + (var9[2] & 255);
         var5 = ((var9[3] & 255) << 16) + ((var9[4] & 255) << 8) + (var9[5] & 255);
         this.showLoadingProgress(progress, "Loading " + friendlyName + " - 5%");
         int var10 = 0;
         var6 = new byte[var5];
         if(Surface.field_759 || var10 < var5) {
            do {
               int var11 = var5 - var10;
               if(var11 > 1000) {
                  var11 = 1000;
               }

               var8.readFully(var6, var10, var11);
               var10 += var11;
               this.showLoadingProgress(progress, "Loading " + friendlyName + " - " + (5 + var10 * 95 / var5) + "%");
            } while(var10 < var5);
         }

         var8.close();
      } catch (IOException var12) {
         ;
      }

      this.showLoadingProgress(progress, "Unpacking " + friendlyName);
      if(var5 != var4) {
         byte[] var13 = new byte[var4];
         BZLib.method_397(var13, var4, var6, var5, 0);
         return var13;
      } else {
         return var6;
      }
   }

   public Graphics getGraphics() {
      return this.graphics;
   }

   // $FF: renamed from: a (java.lang.String, int) java.net.Socket
   public Socket connect(String address, int port) throws IOException {
      Socket socket = new Socket(address, port);
      socket.connect();
      //socket.setSoTimeout(30000);
      //socket.setTcpNoDelay(true);
      return socket;
   }

   // $FF: renamed from: <init> () void
   public GameShell() {
      super();
      this.width = 512;
      this.height = 384;
      this.field_4 = 20;
      this.field_5 = 1000;
      this.field_6 = new long[10];
      this.loadingStep = 1;
      this.field_15 = false;
      this.field_17 = "Loading";
      this.timesRoman = new Font("Times New Roman", 0, 15);
      this.helveticaBold = new Font("Helvetica", 1, 13);
      this.helvetica = new Font("Helvetica", 0, 12);
      this.keyLeftDown = false;
      this.keyRightDown = false;
      this.keySpaceDown = false;
      this.field_32 = 1;
      this.interlace = false;
      this.inputTextCurrent = "";
      this.inputTextFinal = "";
      this.field_42 = "";
      this.pmToSend = "";
   }

   // $FF: renamed from: <clinit> () void
   static {
      characterMap = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!\"£$%^&*()-_=+[{]};:\'@#~,<.>/?\\| ";
   }
}
