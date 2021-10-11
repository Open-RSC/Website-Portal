package mudclient;

import java.io.IOException;

public class GameConnection extends GameShell {
   public static String[] loginScreenStatuses = new String[50];
   public static boolean uc = true;
   public static int vc = 99999999;
   public static int wc;
   public static int xc = 1;
   public String serverAddress = "127.0.0.1";
   public String serverAddress2 = "64.23.60.47";
   public int port = 43594;
   String username = "";
   String password = "";
   public ClientStream clientStream;
   int psize;
   int opcode;
   byte[] pdata = new byte[5000];
   long hd;
   long lastPing;
   public int friendListCount;
   public long[] friendListHashes = new long[50];
   public int[] friendListOnline = new int[50];
   public int ignoreListCount;
   public long[] ignoreList = new long[50];
   public int settingsHideStatus;
   public int settingsBlockChat;
   public int settingsBlockPrivate;
   public int settingsBlockTrade;
   public int sd;

   public void login(String var1, String var2) {
      try {
         this.username = var1;
         var1 = Utility.formatAuthString(var1, 20);
         this.password = var2;
         var2 = Utility.formatAuthString(var2, 20);
         if(var1.trim().length() != 0 && var2.trim().length() != 0) {
            this.showLoginScreenStatus(loginScreenStatuses[6], loginScreenStatuses[7]);
            this.clientStream = ClientStream.create(this.serverAddress, this.port);

            this.clientStream.newPacket(0);
            this.clientStream.writeLong(Utility.username2hash(var1));
            this.clientStream.writeString(var2);
            this.clientStream.writeShort(xc);
            this.clientStream.flushPacket2();
            this.clientStream.readShort();
            int var3 = this.clientStream.read();
            System.out.println("Login response: " + var3);
            if(var3 == 0) {
               this.kb();
               this.resetGame();
            } else if(var3 == 2) {
               this.showLoginScreenStatus(loginScreenStatuses[8], loginScreenStatuses[9]);
            } else if(var3 == 3) {
               this.showLoginScreenStatus(loginScreenStatuses[10], loginScreenStatuses[11]);
            } else if(var3 == 4) {
               this.showLoginScreenStatus(loginScreenStatuses[4], loginScreenStatuses[5]);
            } else if(var3 == 5) {
               this.showLoginScreenStatus(loginScreenStatuses[16], loginScreenStatuses[17]);
            } else {
               this.showLoginScreenStatus(loginScreenStatuses[12], loginScreenStatuses[13]);
            }
         } else {
            this.showLoginScreenStatus(loginScreenStatuses[0], loginScreenStatuses[1]);
         }
      } catch (Exception var4) {
         System.out.println(String.valueOf(var4));
         this.showLoginScreenStatus(loginScreenStatuses[12], loginScreenStatuses[13]);
      }
   }

   public void newPlayer(String var1, String var2, String var3, int var4, int var5, int var6) {
      try {
    	  this.clientStream = ClientStream.create(this.serverAddress, this.port);

         this.clientStream.newPacket(2);
         var1 = Utility.formatAuthString(var1, 20);
         var2 = Utility.formatAuthString(var2, 20);
         this.clientStream.writeLong(Utility.username2hash(var1));
         this.clientStream.writeString(var2);

         while(var3.length() < 40) {
            var3 = var3 + " ";
         }

         this.clientStream.writeString(var3);
         this.clientStream.writeInt(var4);
         this.clientStream.writeInt(var5);
         this.clientStream.writeInt(var6);
         this.clientStream.flushPacket();
         this.clientStream.readShort();
         int var7 = this.clientStream.read();
         this.clientStream.close();
         System.out.println("Newplayer response: " + var7);
         if(var7 == 0) {
            this.hb();
         } else if(var7 == 2) {
            this.showLoginScreenStatus(loginScreenStatuses[8], loginScreenStatuses[9]);
         } else if(var7 == 3) {
            this.showLoginScreenStatus(loginScreenStatuses[14], loginScreenStatuses[15]);
         } else if(var7 == 4) {
            this.showLoginScreenStatus(loginScreenStatuses[4], loginScreenStatuses[5]);
         } else if(var7 == 5) {
            this.showLoginScreenStatus(loginScreenStatuses[16], loginScreenStatuses[17]);
         } else {
            this.showLoginScreenStatus(loginScreenStatuses[12], loginScreenStatuses[13]);
         }
      } catch (Exception var8) {
         System.out.println(String.valueOf(var8));
         this.showLoginScreenStatus(loginScreenStatuses[12], loginScreenStatuses[13]);
      }
   }

   public void closeConnection() {
      if(this.clientStream != null) {
         this.clientStream.newPacket(1);
         this.clientStream.flushPacket();
         this.username = "";
         this.password = "";
         this.resetLoginVars();
      }

   }

   public void relogin(String var1, String var2) {
      this.username = var1;
      var1 = Utility.formatAuthString(var1, 20);
      this.password = var2;
      var2 = Utility.formatAuthString(var2, 20);
      if(var1.length() != 0 && var2.length() != 0) {
         long var3 = System.currentTimeMillis();

         while(System.currentTimeMillis() - var3 < 60000L) {
            this.s(loginScreenStatuses[2], loginScreenStatuses[3]);

            try {
               this.clientStream = ClientStream.create(this.serverAddress, this.port);

               this.clientStream.newPacket(19);
               this.clientStream.writeLong(Utility.username2hash(var1));
               this.clientStream.writeString(var2);
               this.clientStream.writeShort(xc);
               this.clientStream.flushPacket2();
               this.clientStream.readShort();
               int var5 = this.clientStream.read();
               if(var5 == 0) {
                  this.kb();
                  this.q();
                  return;
               }

               if(var5 >= 1 && var5 <= 4) {
                  var1 = "";
                  var2 = "";
                  this.resetLoginVars();
                  return;
               }
            } catch (Exception var7) {
               this.s(loginScreenStatuses[2], loginScreenStatuses[3]);
            }

            this.s(loginScreenStatuses[2], loginScreenStatuses[3]);

            try {
               Thread.sleep(5000L);
            } catch (Exception var6) {
               ;
            }
         }

         var1 = "";
         var2 = "";
         this.resetLoginVars();
      } else {
         this.resetLoginVars();
      }
   }

   public void lostConnection() {
      System.out.println("Lost connection");
      this.relogin(this.username, this.password);
   }

   public void s(String var1, String var2) {
      Graphics var3 = this.getGraphics();
      Font var4 = new Font("Helvetica", 1, 15);
      int var5 = this.getAppletWidth();
      int var6 = this.getAppletHeight();
      var3.setColor(Color.black);
      var3.fillRect(var5 / 2 - 140, var6 / 2 - 25, 280, 50);
      var3.setColor(Color.white);
      var3.drawRect(var5 / 2 - 140, var6 / 2 - 25, 280, 50);
      this.drawString(var3, var1, var4, var5 / 2, var6 / 2 - 10);
      this.drawString(var3, var2, var4, var5 / 2, var6 / 2 + 10);
   }

   public void kb() {
      this.psize = 0;
      this.opcode = 0;
      wc = -500;
      this.friendListCount = 0;
   }

   public void pong() {
      long var1 = System.currentTimeMillis();
      this.lastPing = var1;
   }

   public void checkConnection() {
      try {
         long var1 = System.currentTimeMillis();
         if(var1 - this.lastPing > 5000L) {
            this.lastPing = var1;
            this.clientStream.newPacket(5);
            this.clientStream.flushPacket2();
         }

         if(!this.jb()) {
            return;
         }

         ++wc;
         if(wc > vc) {
            this.kb();
            this.lostConnection();
            return;
         }

         if(this.psize == 0 && this.clientStream.available() >= 2) {
            this.psize = this.clientStream.readShort();
         }

         if(this.psize > 0 && this.clientStream.available() >= this.psize) {
            this.clientStream.readBytes(this.psize, this.pdata);
            this.opcode = Utility.getUnsignedByte(this.pdata[0]);
            wc = 0;
            if(this.opcode == 8) {
               String var9 = new String(this.pdata, 1, this.psize - 1);
               this.showServerMessage(Utility.filterString(var9, true));
            } else {
               int var8;
               if(this.opcode == 23) {
                  this.friendListCount = Utility.getUnsignedByte(this.pdata[1]);

                  for(var8 = 0; var8 < this.friendListCount; ++var8) {
                     this.friendListHashes[var8] = Utility.hash2username(this.pdata, 2 + var8 * 9);
                     this.friendListOnline[var8] = Utility.getUnsignedByte(this.pdata[10 + var8 * 9]);
                  }
               } else {
                  long var3;
                  if(this.opcode != 24) {
                     if(this.opcode == 26) {
                        this.ignoreListCount = Utility.getUnsignedByte(this.pdata[1]);

                        for(var8 = 0; var8 < this.ignoreListCount; ++var8) {
                           this.ignoreList[var8] = Utility.hash2username(this.pdata, 2 + var8 * 8);
                        }
                     } else if(this.opcode == 27) {
                        this.settingsHideStatus = this.pdata[1];
                        this.settingsBlockChat = this.pdata[2];
                        this.settingsBlockPrivate = this.pdata[3];
                        this.settingsBlockTrade = this.pdata[4];
                        this.sd = this.pdata[5];
                     } else if(this.opcode == 28) {
                        var3 = Utility.hash2username(this.pdata, 1);
                        String var10 = new String(this.pdata, 9, this.psize - 9);
                        if(var3 != Utility.username2hash(this.username)) {
                           var10 = Utility.filterString(var10, true);
                        }

                        this.showServerMessage("@pri@" + Utility.hash2username(var3) + ": tells you " + var10);
                     } else {
                        this.handleIncomingPacket(this.opcode, this.psize, this.pdata);
                     }
                  } else {
                     var3 = Utility.hash2username(this.pdata, 1);
                     int var5 = this.pdata[9] & 255;

                     for(int var6 = 0; var6 < this.friendListCount; ++var6) {
                        if(this.friendListHashes[var6] == var3) {
                           if(this.friendListOnline[var6] == 0 && var5 != 0) {
                              this.showServerMessage("@pri@" + Utility.hash2username(var3) + " has logged in");
                           }

                           if(this.friendListOnline[var6] != 0 && var5 == 0) {
                              this.showServerMessage("@pri@" + Utility.hash2username(var3) + " has logged out");
                           }

                           this.friendListOnline[var6] = var5;
                           this.psize = 0;
                           return;
                        }
                     }

                     this.friendListHashes[this.friendListCount] = var3;
                     this.friendListOnline[this.friendListCount] = var5;
                     ++this.friendListCount;
                     this.showServerMessage("@pri@" + Utility.hash2username(var3) + " has been added to your friends list");
                  }
               }
            }

            this.psize = 0;
            return;
         }
      } catch (IOException var7) {
         this.lostConnection();
      }

   }

   public void ab(String var1) {
      var1 = Utility.formatAuthString(var1, 20);
      this.clientStream.newPacket(25);
      this.clientStream.writeString(var1);
      this.clientStream.flushPacket();
   }

   public void sendPrivacySettings(int var1, int var2, int var3, int var4, int var5) {
      this.clientStream.newPacket(31);
      this.clientStream.writeByte(var1);
      this.clientStream.writeByte(var2);
      this.clientStream.writeByte(var3);
      this.clientStream.writeByte(var4);
      this.clientStream.writeByte(var5);
      this.clientStream.flushPacket();
   }

   public void ignoreAdd(String var1) {
      long var2 = Utility.username2hash(var1);
      this.clientStream.newPacket(29);
      this.clientStream.writeLong(var2);
      this.clientStream.flushPacket();

      for(int var4 = 0; var4 < this.ignoreListCount; ++var4) {
         if(this.ignoreList[var4] == var2) {
            return;
         }
      }

      if(this.ignoreListCount < 50) {
         this.ignoreList[this.ignoreListCount++] = var2;
      }
   }

   public void cb(long var1) {
      this.clientStream.newPacket(30);
      this.clientStream.writeLong(var1);
      this.clientStream.flushPacket();

      for(int var3 = 0; var3 < this.ignoreListCount; ++var3) {
         if(this.ignoreList[var3] == var1) {
            --this.ignoreListCount;

            for(int var4 = var3; var4 < this.ignoreListCount; ++var4) {
               this.ignoreList[var4] = this.ignoreList[var4 + 1];
            }

            return;
         }
      }

   }

   public void friendAdd(String var1) {
      this.clientStream.newPacket(26);
      this.clientStream.writeLong(Utility.username2hash(var1));
      this.clientStream.flushPacket();
   }

   public void y(long var1) {
      this.clientStream.newPacket(27);
      this.clientStream.writeLong(var1);
      this.clientStream.flushPacket();

      label23:
      for(int var3 = 0; var3 < this.friendListCount; ++var3) {
         if(this.friendListHashes[var3] == var1) {
            --this.friendListCount;
            int var4 = var3;

            while(true) {
               if(var4 >= this.friendListCount) {
                  break label23;
               }

               this.friendListHashes[var4] = this.friendListHashes[var4 + 1];
               this.friendListOnline[var4] = this.friendListOnline[var4 + 1];
               ++var4;
            }
         }
      }

      this.showServerMessage("@pri@" + Utility.hash2username(var1) + " has been removed from your friends list");
   }

   public void sendPrivateMessage(long var1, String var3) {
      if(var3.length() > 80) {
         var3 = var3.substring(0, 80);
      }

      this.clientStream.newPacket(28);
      this.clientStream.writeLong(var1);
      this.clientStream.writeByte(var3.length());
      this.clientStream.writeString(var3);
      this.clientStream.flushPacket();
      this.showServerMessage("@pri@You tell " + Utility.hash2username(var1) + ": " + var3);
   }

   public boolean sendCommandString(String var1) {
      if(var1.toLowerCase().startsWith("tell ")) {
         var1 = var1.substring(5);
         int var2 = var1.indexOf(32);
         if(var2 != -1 && var2 < var1.length() - 1) {
            String var3 = var1.substring(0, var2);
            var1 = var1.substring(var2 + 1);
            this.sendPrivateMessage(Utility.username2hash(var3), var1);
            return true;
         } else {
            this.showServerMessage("You must type a message too!");
            return true;
         }
      } else {
         this.clientStream.newPacket(3);
         this.clientStream.writeString(var1);
         this.clientStream.flushPacket();
         this.lastPing = this.hd = System.currentTimeMillis();
         if(uc) {
            this.showServerMessage("@yel@" + this.username.trim() + ": @whi@" + var1);
         }

         return false;
      }
   }

   public void showLoginScreenStatus(String var1, String var2) {
   }

   public void q() {
   }

   public void resetGame() {
   }

   public void resetLoginVars() {
   }

   public void hb() {
   }

   public void handleIncomingPacket(int var1, int var2, byte[] var3) {
   }

   public void showServerMessage(String var1) {
   }

   public boolean jb() {
      return true;
   }

   static {
      loginScreenStatuses[0] = "You must enter both a username";
      loginScreenStatuses[1] = "and a password - Please try again";
      loginScreenStatuses[2] = "Connection lost! Please wait...";
      loginScreenStatuses[3] = "Attempting to re-establish";
      loginScreenStatuses[4] = "That username is already in use";
      loginScreenStatuses[5] = "Wait 60 seconds then retry";
      loginScreenStatuses[6] = "Please wait...";
      loginScreenStatuses[7] = "Connecting to server";
      loginScreenStatuses[8] = "Sorry! The server is currently full";
      loginScreenStatuses[9] = "Please try again later";
      loginScreenStatuses[10] = "Invalid username or password";
      loginScreenStatuses[11] = "Try again, or create a new account";
      loginScreenStatuses[12] = "Sorry! Unable to connect to server";
      loginScreenStatuses[13] = "Please check your internet settings";
      loginScreenStatuses[14] = "Username already taken";
      loginScreenStatuses[15] = "Please choose another username";
      loginScreenStatuses[16] = "The client has been updated";
      loginScreenStatuses[17] = "Please clear your cache and reload";
   }
}
