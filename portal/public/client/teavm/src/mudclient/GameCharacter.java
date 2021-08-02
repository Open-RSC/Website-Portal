package mudclient;

// $FF: renamed from: c
public class GameCharacter {

   // $FF: renamed from: a long
   public long usernameHash;
   // $FF: renamed from: b java.lang.String
   public String username;
   // $FF: renamed from: c int
   public int pid;
   // $FF: renamed from: d int
   public int appearanceId;
   // $FF: renamed from: e int
   public int currentX;
   // $FF: renamed from: f int
   public int currentY;
   // $FF: renamed from: g int
   public int field_612;
   // $FF: renamed from: h int
   public int field_613;
   // $FF: renamed from: i int
   public int animationCurrent;
   // $FF: renamed from: j int
   public int animationNext;
   // $FF: renamed from: k int
   public int movingStep;
   // $FF: renamed from: l int
   public int waypointCurrent;
   // $FF: renamed from: m int[]
   public int[] waypointsX;
   // $FF: renamed from: n int[]
   public int[] waypointsY;
   // $FF: renamed from: o int[]
   public int[] wornItems;
   // $FF: renamed from: p java.lang.String
   public String messageSent;
   // $FF: renamed from: q int
   public int messageTimer;
   // $FF: renamed from: r int
   public int bubbleItemId;
   // $FF: renamed from: s int
   public int bubbleTimer;
   // $FF: renamed from: t int
   public int damageTaken;
   // $FF: renamed from: u int
   public int healthCurrent;
   // $FF: renamed from: v int
   public int healthMax;
   // $FF: renamed from: w int
   public int combatTimeout;
   // $FF: renamed from: x int
   public int combatLevel;
   // $FF: renamed from: y int
   public int hairColour;
   // $FF: renamed from: z int
   public int topColour;
   // $FF: renamed from: A int
   public int trouserColour;
   // $FF: renamed from: B int
   public int skinColour;
   // $FF: renamed from: C int
   public int field_634;
   // $FF: renamed from: D int
   public int field_635;
   // $FF: renamed from: E int
   public int field_636;
   // $FF: renamed from: F int
   public int field_637;
   // $FF: renamed from: G boolean
   public boolean field_638;
   // $FF: renamed from: H int
   public int field_639;
   // $FF: renamed from: I int
   public int skullType;


   // $FF: renamed from: <init> () void
   public GameCharacter() {
      super();
      this.waypointsX = new int[10];
      this.waypointsY = new int[10];
      this.wornItems = new int[12];
      this.combatLevel = -1;
      this.field_638 = false;
      this.field_639 = -1;
   }
}
