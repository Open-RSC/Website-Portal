package mudclient;

// $FF: renamed from: d
public class SurfaceSprite extends Surface {

   // $FF: renamed from: L mudclient
   public mudclient client;


   // $FF: renamed from: <init> (int, int, int, java.awt.Component) void
   public SurfaceSprite(int width, int height, int var3, mudclient component) {
      super(width, height, var3, component);
   }

   // $FF: renamed from: a (int, int, int, int, int, int, int) void
   public void spriteClipping(int var1, int var2, int var3, int var4, int var5, int var6, int var7) {
      if(var5 >= 50000) {
         this.client.drawTeleportBubble(var1, var2, var3, var4, var5 - 50000, var6, var7);
      } else if(var5 >= 40000) {
         this.client.drawItem(var1, var2, var3, var4, var5 - 40000, var6, var7);
      } else if(var5 >= 20000) {
         this.client.drawNpc(var1, var2, var3, var4, var5 - 20000, var6, var7);
      } else if(var5 >= 5000) {
         this.client.drawPlayer(var1, var2, var3, var4, var5 - 5000, var6, var7);
      } else {
         super.spriteClipping(var1, var2, var3, var4, var5);
      }
   }
}
