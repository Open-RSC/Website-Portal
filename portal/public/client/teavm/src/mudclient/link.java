package mudclient;

public class link {

   public static int uid;
   static int socketport;
   static Runnable runme;
   static String iplookup;
   static String host;
   static int numfile;
   private static String[] name;
   private static byte[][] buf;


   public static final void putjag(String var0, byte[] var1) {
      name[numfile] = var0;
      buf[numfile] = var1;
      ++numfile;
   }

   public static final byte[] getjag(String var0) {
      int var1 = 0;
      if(GameData.field_563 == 0 && var1 >= numfile) {
         return null;
      } else {
         do {
            if(name[var1].equals(var0)) {
               return buf[var1];
            }

            ++var1;
         } while(var1 < numfile);

         return null;
      }
   }

   public static final void startthread(Runnable var0) {
      runme = var0;
      if(GameData.field_563 != 0 || runme != null) {
         do {
            try {
               Thread.sleep(100L);
            } catch (Exception var1) {
               ;
            }
         } while(runme != null);

      }
   }

   public static final String gethostname(String var0) {
      iplookup = var0;
      if(GameData.field_563 != 0) {
         try {
            Thread.sleep(100L);
         } catch (Exception var2) {
            ;
         }
      }

      while(iplookup != null) {
         try {
            Thread.sleep(100L);
         } catch (Exception var1) {
            ;
         }
      }

      return host;
   }

   // $FF: renamed from: <init> () void
   public link() {
      super();
   }

   // $FF: renamed from: <clinit> () void
   static {
      runme = null;
      iplookup = null;
      name = new String[50];
      buf = new byte[50][];
   }
}
