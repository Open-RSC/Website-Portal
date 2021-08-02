package mudclient;

public class Font {
    final public static int BOLD = 1;

    private String name;
    private int type;
    private int size;

    Font(String name, int type, int size) {                                         
        this.name = name;                                                   
        this.type = type;                                                   
        this.size = size;                                                   
    }                                                                       
                                                                            
    public String toCanvasFont() {                                                        
        return this.getType() + " " + this.size + "px " + this.name; 
    }                                                                       
                                                                            
    public String getType() {                                                             
        if (this.type == 1) {                                              
            return "bold";                                                  
        } else if (this.type == 2) {
            return "italic";                                                
        }                                                                   
                                                                            
        return "normal";                                                    
    }

    public int getSize() {
        return this.size;
    }
}