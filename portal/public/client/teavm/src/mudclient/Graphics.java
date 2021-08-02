package mudclient;

import org.teavm.jso.canvas.CanvasRenderingContext2D;
import org.teavm.jso.canvas.ImageData;
import org.teavm.jso.dom.html.HTMLCanvasElement;

public class Graphics {
    private HTMLCanvasElement canvas;
    private CanvasRenderingContext2D context;

    Graphics(HTMLCanvasElement canvas) {
        this.canvas = canvas;
        this.context = (CanvasRenderingContext2D) this.canvas.getContext("2d");
    }
    
    public void setColor(Color color) {
        this.context.setFillStyle(color.toCanvasStyle());
        this.context.setStrokeStyle(color.toCanvasStyle());
    }

    public void fillRect(int x, int y, int width, int height) {                                
        this.context.fillRect(x, y, width, height);                    
    }                                                              
                                                                   
    public void drawRect(int x, int y, int width, int height) {                                
        this.context.strokeRect(x, y, width, height);                  
    }                                                              
                                                                   
    public void setFont(Font font) {                                                
        this.context.setFont(font.toCanvasFont());
    }                                                              
                                                                   
    public void drawString(String s, int x, int y) {                                          
        this.context.fillText(s, x, y);                                
    }                                                              
                                                                   
    public int measureTextWidth(String s) {                                          
        return this.context.measureText(s).getWidth();                      
    }
                                                                   
    public void drawImage(ImageData image, int x, int y) {                                       
        this.context.putImageData(image, x, y);                        
    }                                                              
                                                                   
    public ImageData getImage(int width, int height) {                                      
        return this.context.getImageData(0, 0, width, height);         
    }    

    public CanvasRenderingContext2D getContext() {
        return this.context;
    }
}
