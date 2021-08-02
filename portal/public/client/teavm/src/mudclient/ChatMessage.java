package mudclient;

// $FF: renamed from: a.h
public class ChatMessage {

   // $FF: renamed from: a byte[]
   public static byte[] pmMessage;
   // $FF: renamed from: b char[]
   public static char[] stringBuilder;
   // $FF: renamed from: c char[]
   private static char[] characterDictionary;


   // $FF: renamed from: a (byte[], int, int) java.lang.String
   public static String readChatString(byte[] data, int dataIndex, int strLength) {
      int var9 = Packet.field_597;
      int formattedLength = 0;
      int var4 = -1;
      int stringIndex = 0;
      int var7;
      if(var9 != 0 || stringIndex < strLength) {
         do {
            int character;
            label65: {
               character = data[dataIndex++] & 255;
               var7 = character >> 4 & 15;
               if(var4 == -1) {
                  if(var7 < 13) {
                     stringBuilder[formattedLength++] = characterDictionary[var7];
                     if(var9 == 0) {
                        break label65;
                     }
                  }

                  var4 = var7;
                  if(var9 == 0) {
                     break label65;
                  }
               }

               stringBuilder[formattedLength++] = characterDictionary[(var4 << 4) + var7 - 195];
               var4 = -1;
            }

            label56: {
               var7 = character & 15;
               if(var4 == -1) {
                  if(var7 < 13) {
                     stringBuilder[formattedLength++] = characterDictionary[var7];
                     if(var9 == 0) {
                        break label56;
                     }
                  }

                  var4 = var7;
                  if(var9 == 0) {
                     break label56;
                  }
               }

               stringBuilder[formattedLength++] = characterDictionary[(var4 << 4) + var7 - 195];
               var4 = -1;
            }

            ++stringIndex;
         } while(stringIndex < strLength);
      }

      boolean var10 = true;
      var7 = 0;
      if(var9 == 0 && var7 >= formattedLength) {
         return new String(stringBuilder, 0, formattedLength);
      } else {
         do {
            char var8 = stringBuilder[var7];
            if(var7 > 4 && var8 == 64) {
               stringBuilder[var7] = 32;
            }

            if(var8 == 37) {
               stringBuilder[var7] = 32;
            }

            if(var10 && var8 >= 97 && var8 <= 122) {
               stringBuilder[var7] = (char)(stringBuilder[var7] + -32);
               var10 = false;
            }

            if(var8 == 46 || var8 == 33) {
               var10 = true;
            }

            ++var7;
         } while(var7 < formattedLength);

         return new String(stringBuilder, 0, formattedLength);
      }
   }

   // $FF: renamed from: a (java.lang.String) int
   public static int prepareToSendChat(String messageToSend) {
      int var7 = Packet.field_597;
      if(messageToSend.length() > 80) {
         messageToSend = messageToSend.substring(0, 80);
      }

      messageToSend = messageToSend.toLowerCase();
      int messageLength = 0;
      int var2 = -1;
      int var3 = 0;
      if(var7 == 0 && var3 >= messageToSend.length()) {
         if(var2 != -1) {
            pmMessage[messageLength++] = (byte)(var2 << 4);
         }

         return messageLength;
      } else {
         do {
            char var4 = messageToSend.charAt(var3);
            int var5 = 0;
            int var6 = 0;
            if(var7 != 0 || var6 < characterDictionary.length) {
               do {
                  if(var4 == characterDictionary[var6]) {
                     var5 = var6;
                     if(var7 == 0) {
                        break;
                     }
                  }

                  ++var6;
               } while(var6 < characterDictionary.length);
            }

            if(var5 > 12) {
               var5 += 195;
            }

            label79: {
               if(var2 == -1) {
                  if(var5 < 13) {
                     var2 = var5;
                     if(var7 == 0) {
                        break label79;
                     }
                  }

                  pmMessage[messageLength++] = (byte)var5;
                  if(var7 == 0) {
                     break label79;
                  }
               }

               if(var5 < 13) {
                  pmMessage[messageLength++] = (byte)((var2 << 4) + var5);
                  var2 = -1;
                  if(var7 == 0) {
                     break label79;
                  }
               }

               pmMessage[messageLength++] = (byte)((var2 << 4) + (var5 >> 4));
               var2 = var5 & 15;
            }

            ++var3;
         } while(var3 < messageToSend.length());

         if(var2 != -1) {
            pmMessage[messageLength++] = (byte)(var2 << 4);
         }

         return messageLength;
      }
   }

   // $FF: renamed from: <clinit> () void
   static {
      pmMessage = new byte[100];
      stringBuilder = new char[100];
      characterDictionary = new char[]{' ', 'e', 't', 'a', 'o', 'i', 'h', 'n', 's', 'r', 'd', 'l', 'u', 'm', 'w', 'c', 'y', 'f', 'g', 'p', 'b', 'v', 'k', 'x', 'j', 'q', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', ' ', '!', '?', '.', ',', ':', ';', '(', ')', '-', '&', '*', '\\', '\'', '@', '#', '+', '=', '\u00a3', '$', '%', '\"', '[', ']'};
   }
}
