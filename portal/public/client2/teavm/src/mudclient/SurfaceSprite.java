package mudclient;

public class SurfaceSprite extends Surface {
   public mudclient client;

   public SurfaceSprite(int var1, int var2, int var3, mudclient var4) {
      super(var1, var2, var3, var4);
   }

   public void spriteClipping(int var1, int var2, int var3, int var4, int var5, int var6, int var7) {
      if(var5 >= '\u9c40') {
         this.client.drawItem(var1, var2, var3, var4, var5 - '\u9c40', var6, var7);
      } else if(var5 >= 20000) {
         this.client.drawNPC(var1, var2, var3, var4, var5 - 20000, var6, var7);
      } else if(var5 >= 5000) {
         this.client.drawPlayer(var1, var2, var3, var4, var5 - 5000, var6, var7);
      } else {
         super.spriteClipping(var1, var2, var3, var4, var5);
      }
   }
}
