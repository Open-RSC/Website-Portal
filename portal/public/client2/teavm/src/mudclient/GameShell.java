package mudclient;

import java.io.IOException;
import java.util.Date;

import org.teavm.jso.JSBody;
import org.teavm.jso.JSObject;
import org.teavm.jso.browser.TimerHandler;
import org.teavm.jso.canvas.ImageData;
import org.teavm.jso.core.JSArray;
import org.teavm.jso.core.JSNumber;
import org.teavm.jso.core.JSString;
import org.teavm.jso.dom.html.HTMLCanvasElement;
import org.teavm.jso.dom.html.HTMLDocument;
import org.teavm.jso.dom.html.HTMLInputElement;
import org.teavm.jso.dom.html.TextRectangle;
import org.teavm.jso.dom.events.Event;
import org.teavm.jso.dom.events.EventListener;
import org.teavm.jso.dom.events.KeyboardEvent;
import org.teavm.jso.dom.events.MouseEvent;
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
   private HTMLInputElement mobileInput;
   private HTMLInputElement switchInput;
   private boolean ignoreInterlace = false;
   private boolean notRotate = false;
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
   
   @JSBody(params = { "event", "clientX", "clientY" }, script = "return new MouseEvent('mousedown', { 'clientX': clientX, 'clientY': clientY });")
   public static native MouseEvent mouseEvent(Event event, int clientX, int clientY);
   
   @JSBody(params = { "event", "keyChar" }, script = "return new KeyboardEvent('keydown', { 'key': keyChar ? keyChar : event.data });")
   public static native KeyboardEvent keyEvent(Event event, String keyChar);
   
   public static KeyboardEvent keyEvent(Event event) {
	   return keyEvent(event, "");
   }
   
   @JSBody(params = { "event", "type" }, script = "return new event.constructor(type ? type : event.type, event);")
   public static native Event clone(Event event, String type);
   
   @JSBody(params = { "message" }, script = "console.log(message)")
   public static native void log(JSObject message);
   
   @JSBody(params = { "object", "property", "value" }, script = "object[property] = value")
   public static native void setProperty(JSObject object, String property, JSObject value);
   
   @JSBody(params = { "object", "property", "elem" }, script = "return object[property]")
   public static native <S extends JSObject> S getProperty(JSObject object, String property, S elem);
   
   @JSBody(params = { "handler", "delay" }, script = "return setTimeout(handler, delay);")
   static native JSNumber setTimeout(TimerHandler handler, int delay);
   
   @JSBody(params = { "timeoutID" }, script = "clearTimeout(timeoutID);")
   static native void clearTimeout(int timeoutID);
   
   @JSBody(params = { }, script = "return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)")
   public static native boolean isMobile();
   
   @JSBody(params = { }, script = "return /NintendoBrowser/i.test(navigator.userAgent)")
   public static native boolean isSwitch();

   int mx, my, nx, ny;
   int mousePress;
   double time = -1;
   EventListener swipeMove, touchMove;
   long lastSwipeRotate = 0L;
   boolean backspaceWait = false;
   int timerId = -1;
   
   public void rotate(boolean toRight) {
	   if (lastSwipeRotate == 0 || new Date().getTime() > lastSwipeRotate + 5000L) {
		   if (toRight) {
			   keyRightDown = true;
		   } else {
			   keyLeftDown = true;
		   }
		   GameShell.setTimeout(() -> {
			   keyLeftDown = false;
			   keyRightDown = false;
			   lastSwipeRotate = 0L;
		   }, 50);
	   }
	   lastSwipeRotate = new Date().getTime();
   }
   
   public boolean isOutsideCanvas(JSObject obj) {
	   int clientX = getProperty(obj, "clientX", JSNumber.valueOf(0)).intValue();
	   int clientY = getProperty(obj, "clientY", JSNumber.valueOf(0)).intValue();
	   return clientX < 0 || clientX > width || clientY < 0 || clientY > height;
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
             
             nx = mx = event.getScreenX();
             ny = my = event.getScreenY();
             ++mousePress;
             time = ((JSNumber)event.getTimeStamp()).doubleValue();
             
             timerId = GameShell.setTimeout(() -> {
                 mouseDown(2);
  		   	 }, 1000).intValue();
             
             swipeMove = new EventListener<MouseEvent>(){
                 public void handleEvent(MouseEvent event1) {
                	 if (mousePress > 0 && ((JSNumber)event1.getTimeStamp()).doubleValue() > time + 100) {
                		 if (event1.getScreenY() != ny || event1.getScreenX() != nx)
                			 GameShell.clearTimeout(timerId);
                		 if (Math.abs(event1.getScreenY() - ny) + 70 > Math.abs(event1.getScreenX() - nx) || Math.abs(event1.getScreenY() - ny) > 20) {
                        	 
                         } else if (event1.getScreenX() > mx){ //right w.r.t mouse down position
                             rotate(true);
                         } else {
                        	 rotate(false);
                         }
                         ny = event1.getScreenY();
                         nx = event1.getScreenX();
                       }
                 }
             };
             canvas.addEventListener("mousemove", swipeMove);
             
             canvas.addEventListener("mouseup", new EventListener<MouseEvent>(){
                 public void handleEvent(MouseEvent event) {
                	 GameShell.clearTimeout(timerId);
                	 canvas.removeEventListener("mouseMove", swipeMove);
                 }                                                                   
             });
             
             canvas.addEventListener("mouseleave", new EventListener<MouseEvent>(){
                 public void handleEvent(MouseEvent event) {
                	 GameShell.clearTimeout(timerId);
                     canvas.removeEventListener("mouseMove", swipeMove);
                 }                                                                   
             });
         }
     });
                                                                             
     this.canvas.addEventListener("mouseup", new EventListener<MouseEvent>(){
         public void handleEvent(MouseEvent event) {
        	 mousePress = Math.max(0, --mousePress);
             setMousePosition(event);                                        
             mouseUp();
         }                                                                   
     });
     
     this.canvas.addEventListener("mouseleave", new EventListener<MouseEvent>(){
         public void handleEvent(MouseEvent event) {
        	 mousePress = Math.max(0, --mousePress);
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
     
     this.canvas.addEventListener("touchstart", new EventListener<Event>(){
         public void handleEvent(Event event) {
        	 int clientX = getProperty(getProperty(event, "changedTouches", JSArray.create(1)).get(0), "clientX", JSNumber.valueOf(0)).intValue();
             int clientY = getProperty(getProperty(event, "changedTouches", JSArray.create(1)).get(0), "clientY", JSNumber.valueOf(0)).intValue();
             MouseEvent mouseEvt = mouseEvent(event, clientX, clientY);
             setMousePosition(mouseEvt);
             
             mx = getProperty(getProperty(event, "changedTouches", JSArray.create(1)).get(0), "screenX", JSNumber.valueOf(0)).intValue();
             my = getProperty(getProperty(event, "changedTouches", JSArray.create(1)).get(0), "screenY", JSNumber.valueOf(0)).intValue();
             time = ((JSNumber)event.getTimeStamp()).doubleValue();
             
             timerId = GameShell.setTimeout(() -> {
                 mouseDown(2);
  		   	 }, 1000).intValue();             
             
             touchMove = new EventListener<Event>(){
                 public void handleEvent(Event event1) {
                	 if(isOutsideCanvas(getProperty(event1, "changedTouches", JSArray.create(1)).get(0))) {
                		 canvas.removeEventListener("touchmove", touchMove);
                	 }
                	 
                	 int posX = getProperty(getProperty(event1, "changedTouches", JSArray.create(1)).get(0), "screenX", JSNumber.valueOf(0)).intValue();
                	 int posY = getProperty(getProperty(event1, "changedTouches", JSArray.create(1)).get(0), "screenY", JSNumber.valueOf(0)).intValue();
                	 if (((JSNumber)event1.getTimeStamp()).doubleValue() > time + 100) {
                		 if (posY != my || posX != mx)
                			 GameShell.clearTimeout(timerId);
                		 if (Math.abs(posY - my) + 70 > Math.abs(posX - mx) || Math.abs(posY - my) > 20) {
                			 if (Math.abs(posX - mx) <= 20) {
                				 int clientX = getProperty(getProperty(event1, "changedTouches", JSArray.create(1)).get(0), "clientX", JSNumber.valueOf(0)).intValue();
                                 int clientY = getProperty(getProperty(event1, "changedTouches", JSArray.create(1)).get(0), "clientY", JSNumber.valueOf(0)).intValue();
                                 MouseEvent mouseEvt = mouseEvent(event1, clientX, clientY);
                    			 setMousePosition(mouseEvt);
                    			 mouseDown(1);
                                 mouseMove(); 
                			 }
                         } else if (posX > mx){ //right w.r.t mouse down position
                             rotate(true);
                         } else {
                        	 rotate(false);
                         }
                       }
                 }
             };
             canvas.addEventListener("touchmove", touchMove);
             
             canvas.addEventListener("touchend", new EventListener<Event>(){
                 public void handleEvent(Event event) {
                	 GameShell.clearTimeout(timerId);
                     canvas.removeEventListener("touchmove", touchMove);
                 }                                                                   
             });
             
             canvas.addEventListener("touchcancel", new EventListener<Event>(){
                 public void handleEvent(Event event) {
                	 GameShell.clearTimeout(timerId);
                     canvas.removeEventListener("touchmove", touchMove);
                 }                                                                   
             });
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

            if (charCode == 112 && (code == 80 || isMobile() || isSwitch())) {
            	ignoreInterlace = true;
            }
            
            if ((charCode == 37 || charCode == 39) && (charCode != (char) code)) {
            	notRotate = true;
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
      
      
      this.mobileInput = (HTMLInputElement) HTMLDocument.current().createElement("input");
      this.mobileInput.setAttribute("type", "password");
      this.mobileInput.setAttribute("placeholder", "CLICK TO OPEN KEYBOARD");
      this.mobileInput.setAttribute("style", "width:512px; height:15px;");
      this.mobileInput.setAttribute("autocorrect", "off");
      this.mobileInput.setAttribute("autocapitalize", "none");
      this.mobileInput.setAttribute("autocomplete", "off");
      this.mobileInput.setAttribute("maxlength", "1");
      
      this.switchInput = (HTMLInputElement) HTMLDocument.current().createElement("input");
      this.switchInput.setAttribute("type", "password");
      this.switchInput.setAttribute("placeholder", "CLICK TO OPEN KEYBOARD");
      this.switchInput.setAttribute("style", "width:512px; height:15px;");
      this.switchInput.setAttribute("autocorrect", "off");
      this.switchInput.setAttribute("autocapitalize", "none");
      this.switchInput.setAttribute("autocomplete", "off");
      this.switchInput.setAttribute("maxlength", "1");
      
      this.mobileInput.addEventListener("keydown", new EventListener<KeyboardEvent>(){
          public void handleEvent(KeyboardEvent evt)  {
        	  int code = evt.getKeyCode();
        	  if (evt.getKey().equals("Backspace") || evt.getKey().equals("Enter")) {
        		  Event event = GameShell.clone((Event)evt, "keydown");
            	  canvas.dispatchEvent(event);
        	  } else if (code == KeyEvent.VK_F1) {
        		  ignoreInterlace = false;
        		  keyDown(KeyEvent.VK_F1);
        	  } else if (code == KeyEvent.VK_RIGHT) {
        		  rotate(true);
        	  } else if (code == KeyEvent.VK_LEFT) {
        		  rotate(false);
        	  } else if (code == 229) {
        		  backspaceWait = true;
        		  GameShell.setTimeout(() -> {
        			  if (backspaceWait) {
        				  keyDown(8);
        				  backspaceWait = false;
        			  }
        		  }, 25);
        	  }
          }  
      });
      
      this.mobileInput.addEventListener("input", new EventListener<Event>(){
          public void handleEvent(Event evt) {
        	  backspaceWait = false;
        	  String val = mobileInput.getValue();
        	  KeyboardEvent event = keyEvent(evt, val.substring(val.length() - 1));
        	  canvas.dispatchEvent(event);
        	  mobileInput.setValue("");
        	  String valData = getProperty(evt, "data", JSString.valueOf("")).stringValue();
        	  // mobile code for interlace
        	  if (valData.equalsIgnoreCase("¹")) {
        		  ignoreInterlace = false;
        		  keyDown(KeyEvent.VK_F1);
        	  } else if (valData.equalsIgnoreCase("→")) {
        		  rotate(true);
        	  } else if (valData.equalsIgnoreCase("←")) {
        		  rotate(false);
        	  }
          }                                                                   
       });
      
      this.switchInput.addEventListener("textInput", new EventListener<Event>(){
          public void handleEvent(Event evt)  {
        	  String val = getProperty(evt, "data", JSString.valueOf("")).stringValue();
        	  for (char c : val.toCharArray()) {
        		  keyDown(c);  
        	  }
          }  
      });
      
      this.switchInput.addEventListener("input", new EventListener<KeyboardEvent>(){
          public void handleEvent(KeyboardEvent evt)  {
        	  if (getProperty(evt, "inputType", JSString.valueOf("")).stringValue().equals("deleteContentBackward")) {
        		  keyDown(8);
            	  switchInput.setValue("1");
        	  }
          }  
      });
  

      this.graphics = new Graphics(this.canvas);

      HTMLDocument.current().getBody().appendChild(this.canvas);
      if (isMobile()) {
    	  HTMLDocument.current().getBody().appendChild(HTMLDocument.current().createElement("br"));
          HTMLDocument.current().getBody().appendChild(this.mobileInput);  
      } else if (isSwitch()) {
    	  HTMLDocument.current().getBody().appendChild(HTMLDocument.current().createElement("br"));
          HTMLDocument.current().getBody().appendChild(this.switchInput);
      }
      
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

      if(key == KeyEvent.VK_LEFT && !(notRotate || isMobile() || isSwitch())) {
         this.keyLeftDown = true;
      } else if(key == KeyEvent.VK_RIGHT && !(notRotate || isMobile() || isSwitch())) {
         this.keyRightDown = true;
      } else if (key == KeyEvent.VK_F1 && !ignoreInterlace) {
    	  // avoid inputing "p" if interlace wanted
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
