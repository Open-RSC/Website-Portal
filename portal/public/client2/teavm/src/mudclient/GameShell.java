package mudclient;

import java.io.IOException;

import org.teavm.jso.canvas.ImageData;
import org.teavm.jso.dom.events.EventListener;
import org.teavm.jso.dom.events.KeyboardEvent;
import org.teavm.jso.dom.events.MouseEvent;
import org.teavm.jso.dom.html.HTMLCanvasElement;
import org.teavm.jso.dom.html.HTMLDocument;
import org.teavm.jso.dom.html.TextRectangle;
import org.teavm.jso.typedarrays.Uint8ClampedArray;

public class GameShell {
   private int width = 512;
   private int height = 384;
   private int targetFPS = 20;
   private int maxDrawTime = 1000;
   private long[] timings = new long[10];
   private boolean applicationMode;
   private int stopTimeout;
   private int interlaceTimer;
   public int offsetY;
   public int lastMouseAction;
   public int loadingStep = 1;
   public String up;
   private boolean vp = false;
   private int loadingProgressPercent;
   private String loadingProgressText = "Loading";
   private Font yp = new Font("Times New Roman", 0, 15);
   private Font zp = new Font("Helvetica", 1, 13);
   private Font aq = new Font("Helvetica", 0, 12);
   private ImageData bq;
   private Graphics graphics;
   public boolean keyLeftDown = false;
   public boolean keyRightDown = false;
   public int threadSleep = 1;
   public int mouseX;
   public int mouseY;
   public int mouseButtonDown;
   public int lastMouseButtonDown;
   public int lastKeyCode1;
   public int lastKeyCode2;
   private HTMLCanvasElement canvas;
   private boolean ignoreInterlace = false;
   public boolean interlace = false;
   public String inputTextCurrent = "";
   public String inputTextFinal = "";
   public String inputPMCurrent = "";
   public String inputPMFinal = "";
   public int xq;

   public void startGame() {
   }

   public void handleInputs() {
   }

   public void onClosing() {
   }

   public void draw() {
   }

   public void drawHbar() {
   }

   public final void startApplication(int width, int height, String title, boolean var4) {
      this.applicationMode = true;
      System.out.println("Started application");
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

            if (charCode == 112 && code == 80) {
            	ignoreInterlace = true;
            }

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

   public final boolean isApplication() {
      return this.applicationMode;
   }

   public final void createFrame(int var1, int var2, String var3, boolean var4) {
	   this.width = var1;
       this.height = var2;
   }

   public final void resizeFrame(int var1, int var2) {
	   this.width = var1;
       this.height = var2;
   }

   public void resize(int var1, int var2) {
      this.resizeFrame(var1, var2);
   }

   public final Graphics getGraphics() {
      return this.graphics;
   }

   public final int getAppletWidth() {
      return this.width;
   }

   public final int getAppletHeight() {
      return this.height;
   }

   public final void setTargetFPS(int var1) {
      this.targetFPS = 1000 / var1;
   }

   public final void setMaxDrawTime(int var1) {
      this.maxDrawTime = var1;
   }

   public final void resetTimings() {
      for(int var1 = 0; var1 < 10; ++var1) {
         this.timings[var1] = 0L;
      }

   }

   public boolean keyDown(int key) {
      this.lastKeyCode1 = key;
      this.lastKeyCode2 = key;
      this.lastMouseAction = 0;

      if(key == KeyEvent.VK_LEFT) {
         this.keyLeftDown = true;
      } else if(key == KeyEvent.VK_RIGHT) {
         this.keyRightDown = true;
      } else {
    	// quick hack for now to prevent those keys from inputting into the chat box
    	  this.handleKeyPress(key);
      }

      if (!ignoreInterlace) {
          if (key == KeyEvent.VK_F1) {
             this.interlace = !this.interlace;
          }
       } else {
          this.ignoreInterlace = false;
       }

      if((key >= 97 && key <= 122 || key >= 65 && key <= 90 || key >= 48 && key <= 57 || key == 32) && this.inputTextCurrent.length() < 16) {
         this.inputTextCurrent = this.inputTextCurrent + (char)key;
      }

      if(key >= 32 && key <= 122 && this.inputPMCurrent.length() < 80) {
         this.inputPMCurrent = this.inputPMCurrent + (char)key;
      }

      if(key == 8 && this.inputTextCurrent.length() > 0) {
         this.inputTextCurrent = this.inputTextCurrent.substring(0, this.inputTextCurrent.length() - 1);
      }

      if(key == 8 && this.inputPMCurrent.length() > 0) {
         this.inputPMCurrent = this.inputPMCurrent.substring(0, this.inputPMCurrent.length() - 1);
      }

      if(key == 10 || key == 13) {
         this.inputTextFinal = this.inputTextCurrent;
         this.inputPMFinal = this.inputPMCurrent;
      }

      return true;
   }

   public void handleKeyPress(int var1) {
   }

   public boolean keyUp(int key) {
	  this.lastKeyCode1 = 0;
      if(key == KeyEvent.VK_LEFT) {
    	  this.keyLeftDown = false;
      }

      if(key == KeyEvent.VK_RIGHT) {
    	  this.keyRightDown = false;
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
      return true;
   }

   public boolean mouseDrag(int var2, int var3) {
      this.mouseButtonDown = 1;

      return true;
   }

   public final void start() {
      if(this.stopTimeout >= 0) {
         this.stopTimeout = 0;
      }

   }

   public final void stop() {
      if(this.stopTimeout >= 0) {
         this.stopTimeout = 4000 / this.targetFPS;
      }

   }

   public final void destroy() {
      this.stopTimeout = -1;

      try {
         Thread.sleep(5000L);
      } catch (Exception var1) {
         ;
      }

      if(this.stopTimeout == -1) {
         System.out.println("5 seconds expired, forcing kill");
         this.closeProgram();
      }

   }

   public final void closeProgram() {
      this.stopTimeout = -2;
      System.out.println("Closing program");
      this.onClosing();

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
      if(this.loadingStep == 1) {
         this.loadingStep = 2;
         this.graphics = this.getGraphics();
         this.loadJagex();
         this.drawLoadingScreen(0, "Loading...");
         this.startGame();
         this.loadingStep = 0;
      }

      int var3 = 0;
      int var4 = 256;
      int var5 = 1;
      int var6 = 0;

      for(int var7 = 0; var7 < 10; ++var7) {
         this.timings[var7] = System.currentTimeMillis();
      }

      long var1 = System.currentTimeMillis();

      while(true) {
            do {
               if(this.stopTimeout < 0) {
                  if(this.stopTimeout == -1) {
                     this.closeProgram();
                  }

                  return;
               }

               if(this.stopTimeout > 0) {
                  --this.stopTimeout;
                  if(this.stopTimeout == 0) {
                     this.closeProgram();
                     return;
                  }
               }

               int var8 = var4;
               int var9 = var5;
               var4 = 300;
               var5 = 1;
               var1 = System.currentTimeMillis();
               if(this.timings[var3] == 0L) {
                  var4 = var8;
                  var5 = var9;
               } else if(var1 > this.timings[var3]) {
                  var4 = (int)((long)(2560 * this.targetFPS) / (var1 - this.timings[var3]));
               }

               if(var4 < 25) {
                  var4 = 25;
               }

               if(var4 > 256) {
                  var4 = 256;
                  var5 = (int)((long)this.targetFPS - (var1 - this.timings[var3]) / 10L);
                  if(var5 < this.threadSleep) {
                     var5 = this.threadSleep;
                  }
               }

               try {
                  Thread.sleep((long)var5);
               } catch (InterruptedException var11) {
                  ;
               }

               this.timings[var3] = var1;
               var3 = (var3 + 1) % 10;
               int var10;
               if(var5 > 1) {
                  for(var10 = 0; var10 < 10; ++var10) {
                     if(this.timings[var10] != 0L) {
                        this.timings[var10] += (long)var5;
                     }
                  }
               }

               var10 = 0;

               while(var6 < 256) {
                  this.handleInputs();
                  var6 += var4;
                  ++var10;
                  if(var10 > this.maxDrawTime) {
                     var6 = 0;
                     this.interlaceTimer += 6;
                     if(this.interlaceTimer > 25) {
                        this.interlaceTimer = 0;
                        this.interlace = true;
                     }
                     break;
                  }
               }

               --this.interlaceTimer;
               var6 &= 255;
               this.draw();
               this.xq = 1000 * var4 / (this.targetFPS * 256);
               /*if(this.op && var3 == 0) {
                  this.showStatus("Fps:" + this.xq + "Del:" + var5);
               }*/
            } while(this.stopTimeout >= 0);
            
            if(this.stopTimeout == -1) {
                this.closeProgram();
             }

         //this.resize(gameFrame.getFrameWidth(), gameFrame.getFrameHeight());
      }
   }

   public final void update(Graphics var1) {
      this.paint(var1);
   }

   public final void paint(Graphics var1) {
      if(this.loadingStep == 2 && this.bq != null) {
         this.drawLoadingScreen(this.loadingProgressPercent, this.loadingProgressText);
      } else {
         if(this.loadingStep == 0) {
            this.drawHbar();
         }

      }
   }

   public void loadJagex() {
      try {
         byte[] var1 = Utility.readDataFile("jagex.jag");
         byte[] var2 = Utility.unpackData("logo.tga", 0, var1);
         this.bq = this.createImage(var2);
         Surface.addFont(Utility.unpackData("h11p.jf", 0, var1));
         Surface.addFont(Utility.unpackData("h12b.jf", 0, var1));
         Surface.addFont(Utility.unpackData("h12p.jf", 0, var1));
         Surface.addFont(Utility.unpackData("h13b.jf", 0, var1));
         Surface.addFont(Utility.unpackData("h14b.jf", 0, var1));
         Surface.addFont(Utility.unpackData("h16b.jf", 0, var1));
         Surface.addFont(Utility.unpackData("h20b.jf", 0, var1));
         Surface.addFont(Utility.unpackData("h24b.jf", 0, var1));
      } catch (IOException var3) {
         System.out.println("Error loading jagex.dat");
      }
   }

   public void drawLoadingScreen(int var1, String var2) {
      int var3 = (this.width - 281) / 2;
      int var4 = (this.height - 148) / 2;
      this.graphics.setColor(Color.black);
      this.graphics.fillRect(0, 0, this.width, this.height);
      if(!this.vp) {
         this.graphics.drawImage(this.bq, var3, var4);
      }

      var3 += 2;
      var4 += 90;
      this.loadingProgressPercent = var1;
      this.loadingProgressText = var2;
      this.graphics.setColor(new Color(132, 132, 132));
      if(this.vp) {
         this.graphics.setColor(new Color(220, 0, 0));
      }

      this.graphics.drawRect(var3 - 2, var4 - 2, 280, 23);
      this.graphics.fillRect(var3, var4, 277 * var1 / 100, 20);
      this.graphics.setColor(new Color(198, 198, 198));
      if(this.vp) {
         this.graphics.setColor(new Color(255, 255, 255));
      }

      this.drawString(this.graphics, var2, this.yp, var3 + 138, var4 + 10);
      if(!this.vp) {
         this.drawString(this.graphics, "Created by JAGeX - visit www.jagex.com", this.zp, var3 + 138, var4 + 30);
         this.drawString(this.graphics, "Copyright ©2000 Andrew Gower", this.zp, var3 + 138, var4 + 44);
      } else {
         this.graphics.setColor(new Color(132, 132, 152));
         this.drawString(this.graphics, "Copyright ©2000 Andrew Gower", this.aq, var3 + 138, this.height - 20);
      }

      if(this.up != null) {
         this.graphics.setColor(Color.white);
         this.drawString(this.graphics, this.up, this.zp, var3 + 138, var4 - 120);
      }

   }

   public void showLoadingProgress(int var1, String var2) {
      int var3 = (this.width - 281) / 2;
      int var4 = (this.height - 148) / 2;
      var3 += 2;
      var4 += 90;
      this.loadingProgressPercent = var1;
      this.loadingProgressText = var2;
      int var5 = 277 * var1 / 100;
      this.graphics.setColor(new Color(132, 132, 132));
      if(this.vp) {
         this.graphics.setColor(new Color(220, 0, 0));
      }

      this.graphics.fillRect(var3, var4, var5, 20);
      this.graphics.setColor(Color.black);
      this.graphics.fillRect(var3 + var5, var4, 277 - var5, 20);
      this.graphics.setColor(new Color(198, 198, 198));
      if(this.vp) {
         this.graphics.setColor(new Color(255, 255, 255));
      }

      this.drawString(this.graphics, var2, this.yp, var3 + 138, var4 + 10);
   }

   public void drawString(Graphics g, String string, Font font, int x, int y) {
	  int stringWidth = this.graphics.measureTextWidth(string);
	  graphics.setFont(font);
	  graphics.drawString(string, x - stringWidth / 2, y + font.getSize() / 4);
   }

   public ImageData createImage(byte[] buffer) {
      int width = buffer[13] * 256 + buffer[12];
      int height = buffer[15] * 256 + buffer[14];
      byte[] redIndex = new byte[256];
      byte[] greenIndex = new byte[256];
      byte[] blueIndex = new byte[256];

      for(int rgbIdx = 0; rgbIdx < 256; ++rgbIdx) {
         redIndex[rgbIdx] = buffer[20 + rgbIdx * 3];
         greenIndex[rgbIdx] = buffer[19 + rgbIdx * 3];
         blueIndex[rgbIdx] = buffer[18 + rgbIdx * 3];
      }

      Uint8ClampedArray imageBytes = Uint8ClampedArray.create(width * height * 4);
      int byteIdx = 0;

      for(int y = height - 1; y >= 0; --y) {
         for(int x = 0; x < width; ++x) {
            int pixel = buffer[786 + x + y * width];
            imageBytes.set(byteIdx++, redIndex[pixel] & 0xff);
            imageBytes.set(byteIdx++, greenIndex[pixel] & 0xff);
            imageBytes.set(byteIdx++, blueIndex[pixel] & 0xff);
            imageBytes.set(byteIdx++, 255);
         }
      }

      ImageData imageData = this.graphics.getContext().createImageData(width, height);
      imageData.setData(imageBytes);

      return imageData;
   }

   public byte[] readDataFile(String var1, String var2, int var3) throws IOException {
	   if(true) {
	         var1 = "cache/" + var1;
	      }
	   
	   int var4 = 0;
      int var5 = 0;
      int var6 = 0;
      byte[] var7 = null;

      while(var4 < 2) {
         try {
            this.showLoadingProgress(var3, "Loading " + var2 + " - 0%");
            if(var4 == 1) {
               var1 = var1.toUpperCase();
            }

            FileDownloadStream var9 = Utility.getDownloadStream(var1);
            byte[] var10 = new byte[6];
            var9.readFully(var10, 0, 6);
            var5 = ((var10[0] & 255) << 16) + ((var10[1] & 255) << 8) + (var10[2] & 255);
            var6 = ((var10[3] & 255) << 16) + ((var10[4] & 255) << 8) + (var10[5] & 255);
            this.showLoadingProgress(var3, "Loading " + var2 + " - 5%");
            int var11 = 0;
            var7 = new byte[var6];

            while(var11 < var6) {
               int var12 = var6 - var11;
               if(var12 > 1000) {
                  var12 = 1000;
               }

               var9.readFully(var7, var11, var12);
               var11 += var12;
               this.showLoadingProgress(var3, "Loading " + var2 + " - " + (5 + var11 * 95 / var6) + "%");
            }

            var4 = 2;
            var9.close();
         } catch (IOException var13) {
            ++var4;
         }
      }

      this.showLoadingProgress(var3, "Unpacking " + var2);
      if(var6 != var5) {
         byte[] var14 = new byte[var5];
         BZLib.decompress(var14, var5, var7, var6, 0);
         return var14;
      } else {
         return var7;
      }
   }
}
