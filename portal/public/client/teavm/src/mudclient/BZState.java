package mudclient;

// $FF: renamed from: a.c
class BZState {

   // $FF: renamed from: a int
   final int field_943;
   // $FF: renamed from: b int
   final int field_944;
   // $FF: renamed from: c int
   final int field_945;
   // $FF: renamed from: d int
   final int field_946;
   // $FF: renamed from: e int
   final int field_947;
   // $FF: renamed from: f int
   final int field_948;
   // $FF: renamed from: g int
   final int field_949;
   // $FF: renamed from: h int
   final int field_950;
   // $FF: renamed from: i int
   final int field_951;
   // $FF: renamed from: j byte[]
   byte[] field_952;
   // $FF: renamed from: k int
   int field_953;
   // $FF: renamed from: l int
   int field_954;
   // $FF: renamed from: m int
   int field_955;
   // $FF: renamed from: n int
   int field_956;
   // $FF: renamed from: o byte[]
   byte[] field_957;
   // $FF: renamed from: p int
   int field_958;
   // $FF: renamed from: q int
   int field_959;
   // $FF: renamed from: r int
   int field_960;
   // $FF: renamed from: s int
   int field_961;
   // $FF: renamed from: t byte
   byte field_962;
   // $FF: renamed from: u int
   int field_963;
   // $FF: renamed from: v boolean
   boolean field_964;
   // $FF: renamed from: w int
   int field_965;
   // $FF: renamed from: x int
   int field_966;
   // $FF: renamed from: y int
   int field_967;
   // $FF: renamed from: z int
   int field_968;
   // $FF: renamed from: A int
   int field_969;
   // $FF: renamed from: B int
   int field_970;
   // $FF: renamed from: C int
   int field_971;
   // $FF: renamed from: D int[]
   int[] field_972;
   // $FF: renamed from: E int
   int field_973;
   // $FF: renamed from: F int[]
   int[] field_974;
   // $FF: renamed from: G int[]
   int[] field_975;
   // $FF: renamed from: H int[]
   public static int[] field_976;
   // $FF: renamed from: I int
   int field_977;
   // $FF: renamed from: J boolean[]
   boolean[] field_978;
   // $FF: renamed from: K boolean[]
   boolean[] field_979;
   // $FF: renamed from: L byte[]
   byte[] field_980;
   // $FF: renamed from: M byte[]
   byte[] field_981;
   // $FF: renamed from: N int[]
   int[] field_982;
   // $FF: renamed from: O byte[]
   byte[] field_983;
   // $FF: renamed from: P byte[]
   byte[] field_984;
   // $FF: renamed from: Q byte[][]
   byte[][] field_985;
   // $FF: renamed from: R int[][]
   int[][] field_986;
   // $FF: renamed from: S int[][]
   int[][] field_987;
   // $FF: renamed from: T int[][]
   int[][] field_988;
   // $FF: renamed from: U int[]
   int[] field_989;
   // $FF: renamed from: V int
   int field_990;


   // $FF: renamed from: <init> () void
   BZState() {
      super();
      int var1 = Packet.field_597;
      this.field_943 = 4096;
      this.field_944 = 16;
      this.field_945 = 258;
      this.field_946 = 23;
      this.field_947 = 1;
      this.field_948 = 6;
      this.field_949 = 50;
      this.field_950 = 4;
      this.field_951 = 18002;
      this.field_972 = new int[256];
      this.field_974 = new int[257];
      this.field_975 = new int[257];
      this.field_978 = new boolean[256];
      this.field_979 = new boolean[16];
      this.field_980 = new byte[256];
      this.field_981 = new byte[4096];
      this.field_982 = new int[16];
      this.field_983 = new byte[18002];
      this.field_984 = new byte[18002];
      this.field_985 = new byte[6][258];
      this.field_986 = new int[6][258];
      this.field_987 = new int[6][258];
      this.field_988 = new int[6][258];
      this.field_989 = new int[6];
      if(var1 != 0) {
         int var2 = Utility.field_1009;
         ++var2;
         Utility.field_1009 = var2;
      }

   }
}
