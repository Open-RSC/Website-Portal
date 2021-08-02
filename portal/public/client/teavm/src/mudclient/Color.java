package mudclient;

public class Color {
    private int r;
    private int g;
    private int b;
    private int a = 255;

    final public static Color WHITE = new Color(255, 255, 255);
    final public static Color white = new Color(255, 255, 255);
    final public static Color BLACK = new Color(0, 0, 0);
    final public static Color black = new Color(0, 0, 0);
    final public static Color YELLOW = new Color(255, 255, 0);
    final public static Color yellow = new Color(255, 255, 0);

    Color(int r, int g, int b) {
        this.r = r;        
        this.g = g;
        this.b = b;
    }
    
    public String toCanvasStyle() {
        return "rgba(" + this.r + "," + this.g+ "," + this.b + "," + this.a + ")";
    }
}