package mudclient;

import java.io.IOException;

import org.teavm.jso.browser.Location;
import org.teavm.jso.canvas.ImageData;

public class mudclient extends GameConnection {
  boolean zs = false;
  int at;
  boolean cameraAutoAngleDebug = false;
  boolean optionCameraModeAuto = true;
  boolean optionPlayerKiller = false;
  int et;
  int ft;
  int gt;
  int showDialogSocialInput;
  String it = "";
  int jt;
  boolean showAdvertDialog = false;
  int combatTimeout;
  int mt;
  boolean errorLoadingCodebase = false;
  Graphics graphics;
  Scene scene;
  SurfaceSprite surface;
  ImageData imageHbar;
  int st;
  int magicLoc = 128;
  int loggedIn;
  int[] npcWalkModel = new int[] {0, 1, 2, 1};
  int[] npcCombatModelArray1 = new int[] {0, 1, 2, 1, 0, 0, 0, 0};
  int[] npcCombatModelArray2 = new int[] {0, 0, 0, 0, 0, 1, 2, 1};
  public boolean appletMode = true;
  public int cameraRotation = 128;
  public int au;
  int gameWidth = 512;
  int gameHeight = 334;
  int du = 9;
  int loginTimer;
  int deathScreenTimeout;
  int gu = 12345678;
  boolean hu = false;
  int iu;
  int ju;
  int ku;
  int cameraZoom = 550;
  boolean fogOfWar = false;
  int cameraAutoRotatePlayerX;
  int cameraAutoRotatePlayerY;
  int cameraAngle = 1;
  int qu;
  int planeWidth;
  int planeHeight;
  int tu;
  int lastPlaneIndex = -1;
  int areaX;
  int areaY;
  int planeIndex = -1;
  int localLowerX;
  int localLowerY;
  int localUpperX;
  int localUpperY;
  World world;
  boolean showRightClickMenu = false;
  int menuX;
  int menuY;
  int menuWidth;
  int hv;
  int menuItemsCount;
  int jv = 200;
  boolean optionMouseButtonOne = false;
  String[] menuItemText2;
  String[] menuItemText1;
  int[] menuItemID;
  int[] menuItemX;
  int[] menuItemY;
  int[] menuSourceType;
  int[] menuSourceIndex;
  int[] menuTargetIndex;
  int[] menuIndices;
  int maxPlayersServerCount;
  int maxPlayersCount;
  int playerCount;
  int spriteCount;
  Character[] playersServer;
  Character[] players;
  Character localPlayer;
  int regionX;
  int regionY;
  int maxNpcsServerCount;
  int maxNpcsCount;
  int npcCount;
  Character[] npcsServer;
  Character[] npcs;
  int iw;
  int jw;
  int[][] npcAnimationArray;
  int maxGroundItems;
  int groundItemCount;
  int nw;
  int[] groundItemX;
  int[] groundItemY;
  int[] groundItemID;
  int[] groundItemZ;
  int maxObjects;
  int objectCount;
  GameModel[] objectModel;
  int[] objectX;
  int[] objectY;
  int[] objectID;
  int[] objectDirection;
  GameModel[] gameModels;
  boolean[] objectAlreadyInMenu;
  int maxWallObjects;
  int wallObjectCount;
  GameModel[] wallObjectModel;
  int[] wallObjectX;
  int[] wallObjectY;
  int[] wallObjectDirection;
  int[] wallObjectID;
  boolean[] wallObjectAlreadyInMenu;
  int maxWalkPath;
  int[] walkPathX;
  int[] walkPathY;
  int mouseButtonClick;
  int showUiTab;
  int inventoryItemsCount;
  int[] inventoryItemID;
  int[] inventoryItemStackCount;
  int[] inventoryEquipped;
  int selectedItemInventoryIndex;
  String selectedItemName;
  boolean showDialogTrade;
  String tradeRecipientName;
  int tradeItemsCount;
  int[] tradeItem;
  int[] tradeItemStackCount;
  int tradeItemCount;
  int[] tradeRecipientItems;
  int[] tradeRecipientCount;
  boolean tradeRecipientAccepted;
  boolean tradeAccepted;
  int mouseButtonDownTime;
  int mouseButtonItemCountIncrement;
  boolean gy;
  int shopSellPriceMod;
  int shopBuyPriceMod;
  int[] shopItem;
  int[] shopCount;
  int[] shopItemPrice;
  int shopSelectedItemIndex;
  int shopSelectedIemType;
  int[] playerStatCurrent;
  int[] playerStatBase;
  int[] playerStatEquipment;
  String[] statNames;
  String[] equipmentStatNames;
  int uy;
  int[] vy;
  boolean showOptionsMenu;
  int optionMenuCount;
  String[] optionMenuEntry;
  int zy;
  int spriteMedia;
  int loginScreen;
  String loginUser;
  String loginPass;
  String loginUserDesc;
  String loginUserDisp;
  int messageTabFlashAll;
  int messageTabFlashHistory;
  int messageTabFlashQuest;
  int messageTabFlashPrivate;
  Panel panelMessageTabs;
  int controlTextListChat;
  int controlTextListAll;
  int nz;
  int oz;
  int messageTabsSelected;
  int qz;
  String[] messageHistory;
  int[] messageHistoryTimeout;
  int combatStyle;
  int uz;
  int vz;
  Panel panelLoginWelcome;
  Panel panelLoginNewUser;
  Panel panelLoginExistingUser;
  Panel panelAppearance;
  Panel aab;
  int controlWelcomeNewUser;
  int controlWelcomeExistingUser;
  int dab;
  int eab;
  int fab;
  int gab;
  int hab;
  int iab;
  int jab;
  int kab;
  int lab;
  int mab;
  int nab;
  int oab;
  int pab;
  int qab;
  int rab;
  int sab;
  int tab;
  int uab;
  int vab;
  int wab;
  int xab;
  int controlButtonAppearanceHead1;
  int controlButtonAppearanceHead2;
  int controlButtonAppearanceHair1;
  int controlButtonAppearanceHair2;
  int controlButtonAppearanceGender1;
  int controlButtonAppearanceGender2;
  int controlButtonAppearanceTop1;
  int controlButtonAppearanceTop2;
  int controlButtonAppearanceSkin1;
  int controlButtonAppearanceSkin2;
  int controlButtonAppearanceBottom1;
  int controlButtonAppearanceBottom2;
  int controlButtonAppearanceAccept;
  int lbb;
  int mbb;
  int nbb;
  int obb;
  int pbb;
  int qbb;
  int rbb;
  boolean showAppearanceChange;
  int appearanceHeadType;
  int appearanceBodyGender;
  int vbb;
  int appearanceHairColour;
  int appearanceTopColour;
  int appearanceBottomColour;
  int appearanceSkinColour;
  int appearanceHeadGender;
  public int[] characterTopBottomColours;
  public int[] characterHairColors;
  public int[] characterSkinColours;
  Panel panelMagic;
  int controlMagicPanel;
  int tabMagicGoodEvil;
  Panel panelSocial;
  int icb;
  int tabSocial;
  long privateMessageTarget;
  int selectedSpell;
  String textCast;
  int objectAnimationCount;
  int objectAnimationNumberTorch;
  int objectAnimationNumberFire;
  int lastObjectAnimationNumberTorch;
  int lastObjectAnimationNumberFire;
  int mouseClickXStep;
  int mouseClickXX;
  int mouseClickXY;
  int receivedMessagesCount;
  String[] receivedMessages;
  int[] receivedMessageX;
  int[] receivedMessageY;
  int[] receivedMessageMidPoint;
  int[] receivedMessageHeight;
  int itemsAboveHeadCount;
  int[] actionBubbleX;
  int[] actionBubbleY;
  int[] actionBubbleScale;
  int[] actionBubbleItem;
  int healthBarCount;
  int[] healthBarX;
  int[] healthBarY;
  int[] healthBarMissing;

  public static void main(String[] args) {
    mudclient mud = new mudclient();
    mud.appletMode = false;

    String[] webArgs = new String[0];
    
    String hash = Location.current().getHash();

    if (hash != null && hash.length() > 0) {
       webArgs = hash.substring(1).split(",");
    }

    boolean members = false;
    /*if(webArgs.length > 0 && webArgs[0].equals("members")) {
       members = true;
    }*/

    if(webArgs.length > 1) {
       mud.serverAddress = webArgs[1];
    }

    if(webArgs.length > 2) {
       mud.port = Integer.parseInt(webArgs[2]);
    }
    
    mud.startApplication(mud.gameWidth, mud.gameHeight + 22, "Runescape by Andrew Gower", false);
    mud.threadSleep = 10;
  }

  public void startGame() {

    //super.ad = 43594;
    super.offsetY = -11;
    GameConnection.vc = 500;
    GameConnection.uc = false;
    GameConnection.xc = 5;
    this.loadGameConfig();
    this.spriteMedia = 2000;
    this.zy = this.spriteMedia + 100;
    this.nw = this.zy + 50;
    this.vz = this.nw + 300;
    this.graphics = this.getGraphics();
    this.setTargetFPS(50);
    this.surface = new SurfaceSprite(this.gameWidth, this.gameHeight + 12, 2600, this);
    this.surface.client = this;
    this.surface.setBounds(0, 0, this.gameWidth, this.gameHeight + 12);
    Panel.dg = false;
    Panel.baseSpriteStart = this.zy;
    this.panelMagic = new Panel(this.surface, 5);
    int var3 = this.surface.width2 - 199;
    byte var2 = 36;
    this.controlMagicPanel = this.panelMagic.addTextListenerInteractive(var3, var2 + 24, 196, 90, 1, 500, true);
    this.panelSocial = new Panel(this.surface, 5);
    this.icb = this.panelSocial.addTextListenerInteractive(var3, var2 + 40, 196, 126, 1, 500, true);
    this.loadMedia();
    this.loadEntities(true);
    this.scene = new Scene(this.surface, 15000, 15000, 1000);
    this.scene.setMidpoints(this.gameWidth / 2, this.gameHeight / 2, this.gameWidth / 2, this.gameHeight / 2, this.gameWidth, this.du);
    this.scene.clipFar3D = 2400;
    this.scene.clipFar2D = 2400;
    this.scene.fogZFalloff = 1;
    this.scene.fogZDistance = 2300;
    this.scene.xh(-50, -10, -50);
    this.world = new World(this.scene, this.surface);
    this.world.baseMediaSprite = this.spriteMedia;
    this.loadTextures();
    this.loadModels();
    this.loadMaps();
    this.showLoadingProgress(100, "Starting game...");
    this.hl();
    this.createLoginPanels();
    this.createAppearancePanel();
    this.resetLoginScreenVariables();
    this.drawHbar();
  }

  public void loadGameConfig() {
    if (this.isApplication()) {
      byte[] var1 = null;

      try {
        var1 = this.readDataFile("config" + Version.CONFIG + ".jag", "Configuration", 10);
      } catch (IOException var3) {
        System.out.println("Load error:" + var3);
      }

      GameData.loadData(var1);
    } else {
      this.drawLoadingScreen(10, "Loading configuration");
      //GameData.loadData();
    }
  }

  public void loadMedia() {
    byte[] var1;
    int var2;
    int var3;
    int var4;
    if (this.isApplication()) {
      var1 = null;

      try {
        var1 = this.readDataFile("media" + Version.MEDIA + ".jag", "2d graphics", 20);
      } catch (IOException var5) {
        System.out.println("Load error:" + var5);
      }

      this.surface.loadSprite(var1, Utility.getDataFileOffset("inv1.tga", var1), this.spriteMedia, true, false);
      this.surface.loadSprite(var1, Utility.getDataFileOffset("inv2.tga", var1), this.spriteMedia + 1, true, 1, 6, false);
      this.surface.loadSprite(var1, Utility.getDataFileOffset("bubble.tga", var1), this.spriteMedia + 9, true, false);
      this.surface.loadSprite(var1, Utility.getDataFileOffset("runescape.tga", var1), this.spriteMedia + 10, true, false);
      this.surface.loadSprite(var1, Utility.getDataFileOffset("splat.tga", var1), this.spriteMedia + 11, true, 3, false);
      this.surface.loadSprite(var1, Utility.getDataFileOffset("icon.tga", var1), this.spriteMedia + 14, true, 4, 2, false);
      this.surface.loadSprite(var1, Utility.getDataFileOffset("hbar.tga", var1), this.spriteMedia + 22, false, false);
      this.surface.loadSprite(var1, Utility.getDataFileOffset("hbar2.tga", var1), this.spriteMedia + 23, true, false);
      this.surface.loadSprite(var1, Utility.getDataFileOffset("compass.tga", var1), this.spriteMedia + 24, true, false);
      this.surface.loadSprite(var1, Utility.getDataFileOffset("scrollbar.tga", var1), this.zy, true, 2, false);
      this.surface.loadSprite(var1, Utility.getDataFileOffset("corners.tga", var1), this.zy + 2, true, 4, false);
      this.surface.loadSprite(var1, Utility.getDataFileOffset("arrows.tga", var1), this.zy + 6, true, 2, false);
      this.imageHbar = this.createImage(Utility.unpackData("hbar.tga", 0, var1));
      var2 = GameData.ufb;

      for (var3 = 1; var2 > 0; ++var3) {
        var4 = var2;
        var2 -= 30;
        if (var4 > 30) {
          var4 = 30;
        }

        this.surface.loadSprite(var1, Utility.getDataFileOffset("objects" + var3 + ".tga", var1), this.nw + (var3 - 1) * 30, true, 10, (var4 + 9) / 10, false);
      }

      this.surface.loadSprite(var1, Utility.getDataFileOffset("projectile.tga", var1), this.vz, true, GameData.hjb, false);
    } else {
      var1 = new byte[100000];
      this.showLoadingProgress(20, "Loading 2d graphics");

      try {
        Utility.loadData("../gamedata/media/inv1.tga", var1, 100000);
        this.surface.loadSprite(var1, 0, this.spriteMedia, true, false);
        Utility.loadData("../gamedata/media/inv2.tga", var1, 100000);
        this.surface.loadSprite(var1, 0, this.spriteMedia + 1, true, 1, 6, false);
        Utility.loadData("../gamedata/media/bubble.tga", var1, 100000);
        this.surface.loadSprite(var1, 0, this.spriteMedia + 9, true, false);
        Utility.loadData("../gamedata/media/runescape.tga", var1, 100000);
        this.surface.loadSprite(var1, 0, this.spriteMedia + 10, true, false);
        Utility.loadData("../gamedata/media/splat.tga", var1, 100000);
        this.surface.loadSprite(var1, 0, this.spriteMedia + 11, true, 3, false);
        Utility.loadData("../gamedata/media/icon.tga", var1, 100000);
        this.surface.loadSprite(var1, 0, this.spriteMedia + 14, true, 4, 2, false);
        Utility.loadData("../gamedata/media/hbar.tga", var1, 100000);
        this.surface.loadSprite(var1, 0, this.spriteMedia + 22, false, false);
        this.imageHbar = this.createImage(var1);
        Utility.loadData("../gamedata/media/hbar2.tga", var1, 100000);
        this.surface.loadSprite(var1, 0, this.spriteMedia + 23, true, false);
        Utility.loadData("../gamedata/media/compass.tga", var1, 100000);
        this.surface.loadSprite(var1, 0, this.spriteMedia + 24, true, false);
        Utility.loadData("../gamedata/media/scrollbar.tga", var1, 100000);
        this.surface.loadSprite(var1, 0, this.zy, true, 2, false);
        Utility.loadData("../gamedata/media/corners.tga", var1, 100000);
        this.surface.loadSprite(var1, 0, this.zy + 2, true, 4, false);
        Utility.loadData("../gamedata/media/arrows.tga", var1, 100000);
        this.surface.loadSprite(var1, 0, this.zy + 6, true, 2, false);
        var2 = GameData.ufb;

        for (var3 = 1; var2 > 0; ++var3) {
          var4 = var2;
          var2 -= 30;
          if (var4 > 30) {
            var4 = 30;
          }

          Utility.loadData("../gamedata/media/objects" + var3 + ".tga", var1, 100000);
          this.surface.loadSprite(var1, 0, this.nw + (var3 - 1) * 30, true, 10, (var4 + 9) / 10, false);
        }

        Utility.loadData("../gamedata/media/projectile.tga", var1, 100000);
        this.surface.loadSprite(var1, 0, this.vz, true, GameData.hjb, false);
      } catch (IOException var6) {
        System.out.println("ERROR: in raw media loader");
      }
    }
  }

  public void loadEntities(boolean var1) {
    this.iw = 0;
    this.jw = this.iw;
    byte[] var2 = null;
    if (this.isApplication() && var1) {
      String var3 = "entity" + Version.ENTITY + ".jag";

      try {
        var2 = this.readDataFile(var3, "people and monsters", 30);
      } catch (IOException var10) {
        System.out.println("Load error:" + var10);
      }
    } else {
      this.showLoadingProgress(30, "Loading people and monsters");
    }

    int var11 = 0;

    label68:
    for (int var4 = 0; var4 < GameData.shb; ++var4) {
      String var5 = GameData.uhb[var4];

      for (int var6 = 0; var6 < var4; ++var6) {
        if (GameData.uhb[var6].equalsIgnoreCase(var5)) {
          GameData.zhb[var4] = GameData.zhb[var6];
          continue label68;
        }
      }

      if (var1) {
        if (this.isApplication()) {
          boolean var7 = true;
          if (GameData.whb[var4] != 0) {
            var7 = false;
          }

          this.surface.loadSprite(Utility.unpackData(var5 + ".tga", 0, var2), 0, this.jw, true, 15, var7);
          var11 += 15;
          if (GameData.xhb[var4] == 1) {
            this.surface.loadSprite(Utility.unpackData(var5 + "a.tga", 0, var2), 0, this.jw + 15, true, 3, true);
            var11 += 3;
          }

          if (GameData.yhb[var4] == 1) {
            this.surface.loadSprite(Utility.unpackData(var5 + "f.tga", 0, var2), 0, this.jw + 18, true, 9, true);
            var11 += 9;
          }
        } else {
          try {
            byte[] var12 = new byte[300000];
            Utility.loadData("../gamedata/entity/" + var5 + ".tga", var12, 300000);
            var11 += 15;
            boolean var8 = true;
            if (GameData.whb[var4] != 0) {
              var8 = false;
            }

            this.surface.loadSprite(var12, 0, this.jw, true, 15, var8);
            if (GameData.xhb[var4] == 1) {
              Utility.loadData("../gamedata/entity/" + var5 + "a.tga", var12, 300000);
              var11 += 3;
              this.surface.loadSprite(var12, 0, this.jw + 15, true, 3, true);
            }

            if (GameData.yhb[var4] == 1) {
              Utility.loadData("../gamedata/entity/" + var5 + "f.tga", var12, 300000);
              var11 += 9;
              this.surface.loadSprite(var12, 0, this.jw + 18, true, 9, true);
            }
          } catch (IOException var9) {
            System.out.println("ERROR: in raw entity loader - no:" + var4 + " " + var5);
          }
        }
      }

      GameData.zhb[var4] = this.jw;
      this.jw += 27;
    }

    System.out.println("Loaded: " + var11 + " frames of animation");
  }

  public void loadTextures() {
    if (this.isApplication()) {
      this.scene.loadTextures("textures" + Version.TEXTURES + ".jag", 7, 11, 50, this);
    } else {
      this.showLoadingProgress(50, "Loading textures");
      this.scene.loadTextures("../gamedata/textures");
    }
  }

  public void loadModels() {
    GameData.getModelID("torcha2");
    GameData.getModelID("torcha3");
    GameData.getModelID("torcha4");
    GameData.getModelID("skulltorcha2");
    GameData.getModelID("skulltorcha3");
    GameData.getModelID("skulltorcha4");
    GameData.getModelID("firea2");
    GameData.getModelID("firea3");
    if (this.isApplication()) {
      byte[] var5 = null;

      try {
        var5 = this.readDataFile("models" + Version.MODELS + ".jag", "3d models", 70);
      } catch (IOException var4) {
        System.out.println("Load error:" + var4);
      }

      for (int var2 = 0; var2 < GameData.lkb; ++var2) {
        int var3 = Utility.getDataFileOffset(GameData.mkb[var2] + ".ob2", var5);
        if (var3 != 0) {
          this.gameModels[var2] = new GameModel(var5, var3);
        } else {
          this.gameModels[var2] = new GameModel(1, 1);
        }
      }

    }
  }

  public void loadMaps() {
    if (this.isApplication()) {
      this.world.geb = null;

      try {
        this.world.geb = this.readDataFile("maps" + Version.MAPS + ".jag", "map", 90);
      } catch (IOException var2) {
        System.out.println("Load error:" + var2);
      }
    } else {
      this.world.udb = false;
    }
  }

  public void hl() {
    this.panelMessageTabs = new Panel(this.surface, 10);
    this.controlTextListChat = this.panelMessageTabs.addTextList(5, 269, 502, 56, 1, 20, true);
    this.controlTextListAll = this.panelMessageTabs.addTextListInput(7, 324, 498, 14, 1, 80, false, true);
    this.nz = this.panelMessageTabs.addTextList(5, 269, 502, 56, 1, 20, true);
    this.oz = this.panelMessageTabs.addTextList(5, 269, 502, 56, 1, 20, true);
    this.panelMessageTabs.setFocus(this.controlTextListAll);
  }

  public void handleInputs() {
    if (!this.errorLoadingCodebase) {
      ++this.loginTimer;
      if (this.loggedIn == 0) {
        super.lastMouseAction = 0;
        this.handleLoginScreenInput();
      }

      if (this.loggedIn == 1) {
        ++this.jt;
        ++super.lastMouseAction;
        this.handleGameInput();
      }

      if (this.at > 0) {
        --this.at;
      }

      if (this.zs && this.at == 0) {
        this.zs = false;
        super.clientStream.flush();
        this.at = 24;
      }

      super.lastMouseButtonDown = 0;
      super.lastKeyCode2 = 0;
      if (this.messageTabFlashAll > 0) {
        --this.messageTabFlashAll;
      }

      if (this.messageTabFlashHistory > 0) {
        --this.messageTabFlashHistory;
      }

      if (this.messageTabFlashQuest > 0) {
        --this.messageTabFlashQuest;
      }

      if (this.messageTabFlashPrivate > 0) {
        --this.messageTabFlashPrivate;
      }

    }
  }

  public void draw() {
    if (this.errorLoadingCodebase) {
      Graphics var1 = this.getGraphics();
      var1.setColor(Color.black);
      var1.fillRect(0, 0, 512, 356);
      var1.setFont(new Font("Helvetica", 1, 20));
      var1.setColor(Color.white);
      var1.drawString("Error - unable to load game!", 50, 50);
      var1.drawString("To play RuneScape make sure you play from", 50, 100);
      var1.drawString("http://www.runescape.com", 50, 150);
      this.setTargetFPS(1);
    } else {
      if (this.loggedIn == 0) {
        this.surface.loggedIn = false;
        this.drawLoginScreens();
      }

      if (this.loggedIn == 1) {
        this.surface.loggedIn = true;
        this.drawGame();
      }

    }
  }

  public void onClosing() {
    this.closeConnection();
    if (this.surface != null) {
      this.surface.clear();
      this.surface.pixels = null;
      this.surface = null;
    }

    if (this.scene != null) {
      this.scene.clear();
      this.scene = null;
    }

    this.gameModels = null;
    this.objectModel = null;
    this.wallObjectModel = null;
    this.playersServer = null;
    this.players = null;
    this.npcsServer = null;
    this.npcs = null;
    this.localPlayer = null;
    if (this.world != null) {
      this.world.xeb = null;
      this.world.yeb = null;
      this.world.zeb = null;
      this.world.parentModel = null;
      this.world = null;
    }

    System.gc();
  }

  public void drawHbar() {
    this.graphics.drawImage(this.imageHbar, 0, 0);
  }

  public void handleKeyPress(int var1) {
    if (this.loggedIn == 0) {
      if (this.loginScreen == 0) {
        this.panelLoginWelcome.keyPress(var1);
      }

      if (this.loginScreen == 1) {
        this.panelLoginNewUser.keyPress(var1);
      }

      if (this.loginScreen == 2) {
        this.panelLoginExistingUser.keyPress(var1);
      }
    }

    if (this.showAppearanceChange) {
      this.panelAppearance.keyPress(var1);
    }

    if (this.loggedIn == 1) {
      if (this.gt == 0 && this.showDialogSocialInput == 0) {
        this.panelMessageTabs.keyPress(var1);
      }

      if (this.gt == 3 || this.gt == 4) {
        this.gt = 0;
      }
    }

  }

  public void finalizePacket() {
    super.clientStream.sendPacket();
    this.zs = true;
    this.pong();
  }

  public void resetLoginScreenVariables() {
    this.loggedIn = 0;
    this.loginScreen = 0;
    this.loginUser = "";
    this.loginPass = "";
    this.loginUserDesc = "Please enter a username:";
    this.loginUserDisp = "*" + this.loginUser + "*";
    this.playerCount = 0;
    this.npcCount = 0;
  }

  public void resetPMText() {
    super.inputPMCurrent = "";
    super.inputPMFinal = "";
  }

  public void createAppearancePanel() {
    this.panelAppearance = new Panel(this.surface, 100);
    this.panelAppearance.addText(256, 10, "Design Your Character", 4, true);
    short var1 = 140;
    byte var2 = 34;
    this.panelAppearance.addButtonBackground(var1, var2, 200, 25);
    this.panelAppearance.addText(var1, var2, "Appearance", 4, false);
    int var6 = var2 + 15;
    this.panelAppearance.addText(var1 - 55, var6 + 110, "Front", 3, true);
    this.panelAppearance.addText(var1, var6 + 110, "Side", 3, true);
    this.panelAppearance.addText(var1 + 55, var6 + 110, "Back", 3, true);
    byte var3 = 54;
    var6 += 145;
    this.panelAppearance.addBoxRounded(var1 - var3, var6, 53, 41);
    this.panelAppearance.addText(var1 - var3, var6 - 8, "Head", 1, true);
    this.panelAppearance.addText(var1 - var3, var6 + 8, "Type", 1, true);
    this.panelAppearance.addSprite(var1 - var3 - 40, var6, Panel.baseSpriteStart + 7);
    this.controlButtonAppearanceHead1 = this.panelAppearance.addButton(var1 - var3 - 40, var6, 20, 20);
    this.panelAppearance.addSprite(var1 - var3 + 40, var6, Panel.baseSpriteStart + 6);
    this.controlButtonAppearanceHead2 = this.panelAppearance.addButton(var1 - var3 + 40, var6, 20, 20);
    this.panelAppearance.addBoxRounded(var1 + var3, var6, 53, 41);
    this.panelAppearance.addText(var1 + var3, var6 - 8, "Hair", 1, true);
    this.panelAppearance.addText(var1 + var3, var6 + 8, "Color", 1, true);
    this.panelAppearance.addSprite(var1 + var3 - 40, var6, Panel.baseSpriteStart + 7);
    this.controlButtonAppearanceHair1 = this.panelAppearance.addButton(var1 + var3 - 40, var6, 20, 20);
    this.panelAppearance.addSprite(var1 + var3 + 40, var6, Panel.baseSpriteStart + 6);
    this.controlButtonAppearanceHair2 = this.panelAppearance.addButton(var1 + var3 + 40, var6, 20, 20);
    var6 += 50;
    this.panelAppearance.addBoxRounded(var1 - var3, var6, 53, 41);
    this.panelAppearance.addText(var1 - var3, var6, "Gender", 1, true);
    this.panelAppearance.addSprite(var1 - var3 - 40, var6, Panel.baseSpriteStart + 7);
    this.controlButtonAppearanceGender1 = this.panelAppearance.addButton(var1 - var3 - 40, var6, 20, 20);
    this.panelAppearance.addSprite(var1 - var3 + 40, var6, Panel.baseSpriteStart + 6);
    this.controlButtonAppearanceGender2 = this.panelAppearance.addButton(var1 - var3 + 40, var6, 20, 20);
    this.panelAppearance.addBoxRounded(var1 + var3, var6, 53, 41);
    this.panelAppearance.addText(var1 + var3, var6 - 8, "Top", 1, true);
    this.panelAppearance.addText(var1 + var3, var6 + 8, "Color", 1, true);
    this.panelAppearance.addSprite(var1 + var3 - 40, var6, Panel.baseSpriteStart + 7);
    this.controlButtonAppearanceTop1 = this.panelAppearance.addButton(var1 + var3 - 40, var6, 20, 20);
    this.panelAppearance.addSprite(var1 + var3 + 40, var6, Panel.baseSpriteStart + 6);
    this.controlButtonAppearanceTop2 = this.panelAppearance.addButton(var1 + var3 + 40, var6, 20, 20);
    var6 += 50;
    this.panelAppearance.addBoxRounded(var1 - var3, var6, 53, 41);
    this.panelAppearance.addText(var1 - var3, var6 - 8, "Skin", 1, true);
    this.panelAppearance.addText(var1 - var3, var6 + 8, "Color", 1, true);
    this.panelAppearance.addSprite(var1 - var3 - 40, var6, Panel.baseSpriteStart + 7);
    this.controlButtonAppearanceSkin1 = this.panelAppearance.addButton(var1 - var3 - 40, var6, 20, 20);
    this.panelAppearance.addSprite(var1 - var3 + 40, var6, Panel.baseSpriteStart + 6);
    this.controlButtonAppearanceSkin2 = this.panelAppearance.addButton(var1 - var3 + 40, var6, 20, 20);
    this.panelAppearance.addBoxRounded(var1 + var3, var6, 53, 41);
    this.panelAppearance.addText(var1 + var3, var6 - 8, "Bottom", 1, true);
    this.panelAppearance.addText(var1 + var3, var6 + 8, "Color", 1, true);
    this.panelAppearance.addSprite(var1 + var3 - 40, var6, Panel.baseSpriteStart + 7);
    this.controlButtonAppearanceBottom1 = this.panelAppearance.addButton(var1 + var3 - 40, var6, 20, 20);
    this.panelAppearance.addSprite(var1 + var3 + 40, var6, Panel.baseSpriteStart + 6);
    this.controlButtonAppearanceBottom2 = this.panelAppearance.addButton(var1 + var3 + 40, var6, 20, 20);
    var1 = 372;
    var2 = 35;
    this.panelAppearance.addButtonBackground(var1, var2, 200, 25);
    this.panelAppearance.addText(var1, var2, "Character Type", 4, false);
    var6 = var2 + 22;
    this.panelAppearance.addText(var1, var6, "Each character type has different starting", 0, true);
    var6 += 13;
    this.panelAppearance.addText(var1, var6, "bonuses. But the choice you make here", 0, true);
    var6 += 13;
    this.panelAppearance.addText(var1, var6, "isn't permanent, and will change depending", 0, true);
    var6 += 13;
    this.panelAppearance.addText(var1, var6, "on how you play the game.", 0, true);
    var6 += 73;
    this.panelAppearance.addBoxRounded(var1, var6, 215, 125);
    String[] var4 = new String[]{"Adventurer", "Warrior", "Wizard", "Necromancer", "Ranger"};
    this.lbb = this.panelAppearance.ac(var1, var6 + 2, var4, 3, true);
    var6 += 75;
    this.panelAppearance.addBoxRounded(var1, var6 + 21, 215, 60);
    this.panelAppearance.addText(var1, var6, "Do you wish to be able to fight with other", 0, true);
    var6 += 13;
    this.panelAppearance.addText(var1, var6, "players? Warning! If you choose 'yes' then", 0, true);
    var6 += 13;
    this.panelAppearance.addText(var1, var6, "other players will be able to attack you too!", 0, true);
    var6 += 13;
    String[] var5 = new String[]{"No thanks", "Yes I'll fight"};
    this.mbb = this.panelAppearance.qc(var1, var6, var5, 1, true);
    var6 += 32;
    this.panelAppearance.addButtonBackground(var1, var6, 200, 30);
    this.panelAppearance.addText(var1, var6, "Start Game", 4, false);
    this.controlButtonAppearanceAccept = this.panelAppearance.addButton(var1, var6, 200, 30);
  }

  public void drawAppearancePanelCharacterSprites() {
    this.surface.interlace = false;
    this.surface.blackScreen();
    this.panelAppearance.tc(0, 0, this.gameWidth, this.gameHeight);
    this.panelAppearance.drawPanel();
    short var1 = 140;
    byte var2 = 50;
    this.surface.xf(var1 - 32 - 55, var2, 64, 102, GameData.zhb[this.vbb], this.characterTopBottomColours[this.appearanceBottomColour]);
    this.surface.spriteClipping(var1 - 32 - 55, var2, 64, 102, GameData.zhb[this.appearanceBodyGender], this.characterTopBottomColours[this.appearanceTopColour], this.characterSkinColours[this.appearanceSkinColour], 0, false);
    this.surface.spriteClipping(var1 - 32 - 55, var2, 64, 102, GameData.zhb[this.appearanceHeadType], this.characterHairColors[this.appearanceHairColour], this.characterSkinColours[this.appearanceSkinColour], 0, false);
    this.surface.xf(var1 - 32, var2, 64, 102, GameData.zhb[this.vbb] + 6, this.characterTopBottomColours[this.appearanceBottomColour]);
    this.surface.spriteClipping(var1 - 32, var2, 64, 102, GameData.zhb[this.appearanceBodyGender] + 6, this.characterTopBottomColours[this.appearanceTopColour], this.characterSkinColours[this.appearanceSkinColour], 0, false);
    this.surface.spriteClipping(var1 - 32, var2, 64, 102, GameData.zhb[this.appearanceHeadType] + 6, this.characterHairColors[this.appearanceHairColour], this.characterSkinColours[this.appearanceSkinColour], 0, false);
    this.surface.xf(var1 - 32 + 55, var2, 64, 102, GameData.zhb[this.vbb] + 12, this.characterTopBottomColours[this.appearanceBottomColour]);
    this.surface.spriteClipping(var1 - 32 + 55, var2, 64, 102, GameData.zhb[this.appearanceBodyGender] + 12, this.characterTopBottomColours[this.appearanceTopColour], this.characterSkinColours[this.appearanceSkinColour], 0, false);
    this.surface.spriteClipping(var1 - 32 + 55, var2, 64, 102, GameData.zhb[this.appearanceHeadType] + 12, this.characterHairColors[this.appearanceHairColour], this.characterSkinColours[this.appearanceSkinColour], 0, false);
    this.surface.drawSprite(0, this.gameHeight, this.spriteMedia + 22);
    this.surface.draw(this.graphics, 0, 11);
  }

  public void handleAppearancePanelControls() {
    this.panelAppearance.handleMouse(super.mouseX, super.mouseY, super.lastMouseButtonDown, super.mouseButtonDown);
    if (this.panelAppearance.isClicked(this.controlButtonAppearanceHead1)) {
      do {
        do {
          this.appearanceHeadType = (this.appearanceHeadType - 1 + GameData.shb) % GameData.shb;
        } while ((GameData.whb[this.appearanceHeadType] & 3) != 1);
      } while ((GameData.whb[this.appearanceHeadType] & 4 * this.appearanceHeadGender) == 0);
    }

    if (this.panelAppearance.isClicked(this.controlButtonAppearanceHead2)) {
      do {
        do {
          this.appearanceHeadType = (this.appearanceHeadType + 1) % GameData.shb;
        } while ((GameData.whb[this.appearanceHeadType] & 3) != 1);
      } while ((GameData.whb[this.appearanceHeadType] & 4 * this.appearanceHeadGender) == 0);
    }

    if (this.panelAppearance.isClicked(this.controlButtonAppearanceHair1)) {
      this.appearanceHairColour = (this.appearanceHairColour - 1 + this.characterHairColors.length) % this.characterHairColors.length;
    }

    if (this.panelAppearance.isClicked(this.controlButtonAppearanceHair2)) {
      this.appearanceHairColour = (this.appearanceHairColour + 1) % this.characterHairColors.length;
    }

    if (this.panelAppearance.isClicked(this.controlButtonAppearanceGender1) || this.panelAppearance.isClicked(this.controlButtonAppearanceGender2)) {
      for (this.appearanceHeadGender = 3 - this.appearanceHeadGender; (GameData.whb[this.appearanceHeadType] & 3) != 1 || (GameData.whb[this.appearanceHeadType] & 4 * this.appearanceHeadGender) == 0; this.appearanceHeadType = (this.appearanceHeadType + 1) % GameData.shb) {
        ;
      }

      while ((GameData.whb[this.appearanceBodyGender] & 3) != 2 || (GameData.whb[this.appearanceBodyGender] & 4 * this.appearanceHeadGender) == 0) {
        this.appearanceBodyGender = (this.appearanceBodyGender + 1) % GameData.shb;
      }
    }

    if (this.panelAppearance.isClicked(this.controlButtonAppearanceTop1)) {
      this.appearanceTopColour = (this.appearanceTopColour - 1 + this.characterTopBottomColours.length) % this.characterTopBottomColours.length;
    }

    if (this.panelAppearance.isClicked(this.controlButtonAppearanceTop2)) {
      this.appearanceTopColour = (this.appearanceTopColour + 1) % this.characterTopBottomColours.length;
    }

    if (this.panelAppearance.isClicked(this.controlButtonAppearanceSkin1)) {
      this.appearanceSkinColour = (this.appearanceSkinColour - 1 + this.characterSkinColours.length) % this.characterSkinColours.length;
    }

    if (this.panelAppearance.isClicked(this.controlButtonAppearanceSkin2)) {
      this.appearanceSkinColour = (this.appearanceSkinColour + 1) % this.characterSkinColours.length;
    }

    if (this.panelAppearance.isClicked(this.controlButtonAppearanceBottom1)) {
      this.appearanceBottomColour = (this.appearanceBottomColour - 1 + this.characterTopBottomColours.length) % this.characterTopBottomColours.length;
    }

    if (this.panelAppearance.isClicked(this.controlButtonAppearanceBottom2)) {
      this.appearanceBottomColour = (this.appearanceBottomColour + 1) % this.characterTopBottomColours.length;
    }

    if (this.panelAppearance.isClicked(this.controlButtonAppearanceAccept)) {
      super.clientStream.newPacket(236);
      super.clientStream.writeByte(this.appearanceHeadGender);
      super.clientStream.writeByte(this.appearanceHeadType);
      super.clientStream.writeByte(this.appearanceBodyGender);
      super.clientStream.writeByte(this.vbb);
      super.clientStream.writeByte(this.appearanceHairColour);
      super.clientStream.writeByte(this.appearanceTopColour);
      super.clientStream.writeByte(this.appearanceBottomColour);
      super.clientStream.writeByte(this.appearanceSkinColour);
      super.clientStream.writeByte(this.panelAppearance.rc(this.lbb));
      super.clientStream.writeByte(this.panelAppearance.rc(this.mbb));
      super.clientStream.flushPacket();
      this.showAppearanceChange = false;
    }

  }

  public void createLoginPanels() {
    this.panelLoginWelcome = new Panel(this.surface, 50);
    byte var1 = 35;
    this.panelLoginWelcome.addText(250, 200 + var1, "Click on an option", 5, true);
    this.panelLoginWelcome.addButtonBackground(150, 240 + var1, 120, 35);
    this.panelLoginWelcome.addButtonBackground(350, 240 + var1, 120, 35);
    this.panelLoginWelcome.addText(150, 240 + var1, "New User", 5, false);
    this.panelLoginWelcome.addText(350, 240 + var1, "Existing User", 5, false);
    this.controlWelcomeNewUser = this.panelLoginWelcome.addButton(150, 240 + var1, 120, 35);
    this.controlWelcomeExistingUser = this.panelLoginWelcome.addButton(350, 240 + var1, 120, 35);
    var1 = 60;
    byte var2 = 110;
    boolean flag = false;
    this.panelLoginNewUser = new Panel(this.surface, 50);
    this.panelLoginNewUser.addButtonBackground(250, var1 + 17, 420, 34);
    this.panelLoginNewUser.addText(250, var1 + 8, "Choose a Username (This is the name other users will see)", 4, flag);
    this.mab = this.panelLoginNewUser.vc(250, var1 + 25, 200, 40, 4, 12, false, flag);
    int var5 = var1 + 40;
    this.panelLoginNewUser.addButtonBackground(250, var5 + 17, 420, 34);
    this.panelLoginNewUser.addText(250, var5 + 8, "Choose a Password (You will require this to login)", 4, flag);
    this.oab = this.panelLoginNewUser.vc(250, var5 + 25, 200, 40, 4, 12, false, flag);
    var5 += 40;
    this.panelLoginNewUser.addButtonBackground(250, var5 + 17, 420, 34);
    this.panelLoginNewUser.addText(250, var5 + 8, "E-mail address", 4, flag);
    this.nab = this.panelLoginNewUser.vc(250, var5 + 25, 200, 40, 4, 40, false, flag);
    var5 += 40;
    this.panelLoginNewUser.addButtonBackground(250, var5 + 22, 420, 44);
    this.panelLoginNewUser.addText(250, var5 + 7, "Do you want to receive our free weekly newsletter? Get news of the latest", 1, flag);
    this.panelLoginNewUser.addText(250, var5 + 21, "improvements, new-quests!, hints+tips, hiscores, special-events! etc...", 1, flag);
    String[] var4 = new String[]{"Yes sounds great!", "No-thanks"};
    this.iab = this.panelLoginNewUser.qc(250, var5 + 35, var4, 1, flag);
    var5 += 50;
    this.panelLoginNewUser.addButtonBackground(250 - var2 + 50 - 15, var5 + 17, 270, 34);
    this.dab = this.panelLoginNewUser.addText(250 - var2 + 50 - 15, var5 + 8, "To create an account please enter", 4, true);
    this.eab = this.panelLoginNewUser.addText(250 - var2 + 50 - 15, var5 + 25, "all the requested details", 4, true);
    this.panelLoginNewUser.addButtonBackground(350, var5 + 17, 70, 34);
    this.panelLoginNewUser.addText(350, var5 + 17, "Submit", 5, flag);
    this.lab = this.panelLoginNewUser.addButton(335, var5 + 17, 100, 34);
    this.panelLoginNewUser.addButtonBackground(425, var5 + 17, 70, 34);
    this.panelLoginNewUser.addText(425, var5 + 17, "Cancel", 5, flag);
    this.kab = this.panelLoginNewUser.addButton(425, var5 + 17, 100, 34);
    this.panelLoginNewUser.setFocus(this.mab);
    this.panelLoginExistingUser = new Panel(this.surface, 50);
    var1 = 83;
    this.panelLoginExistingUser.addButtonBackground(250, var1, 300, 40);
    this.pab = this.panelLoginExistingUser.addText(250, var1 - 10, "Please enter your", 5, true);
    this.qab = this.panelLoginExistingUser.addText(250, var1 + 10, "username and password", 5, true);
    var5 = var1 + 60;
    this.panelLoginExistingUser.addButtonBackground(250, var5, 200, 40);
    this.panelLoginExistingUser.addText(250, var5 - 10, "Username:", 4, flag);
    this.rab = this.panelLoginExistingUser.vc(250, var5 + 10, 200, 40, 4, 12, false, flag);
    var5 += 60;
    this.panelLoginExistingUser.addButtonBackground(250, var5, 200, 40);
    this.panelLoginExistingUser.addText(250, var5 - 10, "Password:", 4, flag);
    this.sab = this.panelLoginExistingUser.vc(250, var5 + 10, 200, 40, 4, 20, true, flag);
    var5 += 60;
    var2 = 70;
    this.panelLoginExistingUser.addButtonBackground(250 - var2, var5, 110, 40);
    this.panelLoginExistingUser.addText(250 - var2, var5, "Ok", 4, flag);
    this.tab = this.panelLoginExistingUser.addButton(250 - var2, var5, 110, 40);
    this.panelLoginExistingUser.addButtonBackground(250 + var2, var5, 110, 40);
    this.panelLoginExistingUser.addText(250 + var2, var5, "Cancel", 4, flag);
    this.uab = this.panelLoginExistingUser.addButton(250 + var2, var5, 110, 40);
    this.panelLoginExistingUser.setFocus(this.rab);
    this.aab = new Panel(this.surface, 50);
    var1 = 20;
    this.aab.addText(250, var1, "Runescape-Rules / Terms+Conditions", 5, true);
    var5 = var1 + 30;
    this.aab.gc(40, var5 - 10, 420, 220);
    this.pbb = this.aab.addTextList(50, var5, 400, 200, 1, 1000, true);
    this.em(this.aab, this.pbb);
    var5 += 240;
    this.aab.addButtonBackground(120, var5, 170, 50);
    this.aab.addText(120, var5 - 10, "I have read the terms", 1, false);
    this.aab.addText(120, var5, "and conditions above", 1, false);
    this.aab.addText(120, var5 + 10, "And I Agree", 1, false);
    this.nbb = this.aab.addButton(120, var5, 170, 50);
    this.aab.addButtonBackground(380, var5, 170, 50);
    this.aab.addText(380, var5, "I do not agree", 1, false);
    this.obb = this.aab.addButton(380, var5, 170, 50);
  }

  public void drawLoginScreens() {
    this.surface.interlace = false;
    this.surface.blackScreen();
    if (this.loginScreen == 0) {
      this.surface._if(256, 95, this.spriteMedia + 10);
    }

    if (this.loginScreen == 0) {
      this.panelLoginWelcome.tc(0, 0, this.gameWidth, this.gameHeight);
      this.panelLoginWelcome.drawPanel();
    }

    if (this.loginScreen == 1) {
      this.panelLoginNewUser.tc(0, 0, this.gameWidth, this.gameHeight);
      this.panelLoginNewUser.drawPanel();
    }

    if (this.loginScreen == 2) {
      this.panelLoginExistingUser.tc(0, 0, this.gameWidth, this.gameHeight);
      this.panelLoginExistingUser.drawPanel();
    }

    if (this.loginScreen == 3) {
      this.aab.tc(0, 0, this.gameWidth, this.gameHeight);
      this.aab.drawPanel();
    }

    this.surface.drawSprite(0, this.gameHeight, this.spriteMedia + 22);
    this.surface.draw(this.graphics, 0, 11);
  }

  public void handleLoginScreenInput() {
    if (this.loginScreen == 0) {
      this.panelLoginWelcome.handleMouse(super.mouseX, super.mouseY, super.lastMouseButtonDown, super.mouseButtonDown);
      if (this.panelLoginWelcome.isClicked(this.controlWelcomeNewUser)) {
        this.loginScreen = 3;
      }

      if (this.panelLoginWelcome.isClicked(this.controlWelcomeExistingUser)) {
        this.loginScreen = 2;
        this.panelLoginExistingUser.updateText(this.pab, "Please enter your");
        this.panelLoginExistingUser.updateText(this.qab, "username and password");
        this.panelLoginExistingUser.updateText(this.rab, "");
        this.panelLoginExistingUser.updateText(this.sab, "");
        this.panelLoginExistingUser.setFocus(this.rab);
        return;
      }
    } else if (this.loginScreen == 1) {
      this.panelLoginNewUser.handleMouse(super.mouseX, super.mouseY, super.lastMouseButtonDown, super.mouseButtonDown);
      if (this.panelLoginNewUser.isClicked(this.mab)) {
        this.panelLoginNewUser.setFocus(this.oab);
      }

      if (this.panelLoginNewUser.isClicked(this.oab)) {
        this.panelLoginNewUser.setFocus(this.nab);
      }

      if (this.panelLoginNewUser.isClicked(this.nab)) {
        this.panelLoginNewUser.setFocus(this.mab);
      }

      if (this.panelLoginNewUser.isClicked(this.kab)) {
        this.loginScreen = 0;
      }

      if (this.panelLoginNewUser.isClicked(this.lab)) {
        if (this.panelLoginNewUser.oc(this.mab) != null && this.panelLoginNewUser.oc(this.mab).length() == 0 || this.panelLoginNewUser.oc(this.nab) != null && this.panelLoginNewUser.oc(this.nab).length() == 0 || this.panelLoginNewUser.oc(this.oab) != null && this.panelLoginNewUser.oc(this.oab).length() == 0) {
          this.panelLoginNewUser.updateText(this.dab, "Please fill in ALL requested");
          this.panelLoginNewUser.updateText(this.eab, "information to continue!");
          return;
        }

        this.panelLoginNewUser.updateText(this.dab, "Please wait...");
        this.panelLoginNewUser.updateText(this.eab, "Creating new account");
        this.drawLoginScreens();
        this.resetTimings();
        this.panelLoginNewUser.oc(this.fab);
        this.panelLoginNewUser.oc(this.gab);
        String var1 = this.panelLoginNewUser.oc(this.mab);
        String var2 = this.panelLoginNewUser.oc(this.oab);
        String var3 = this.panelLoginNewUser.oc(this.nab);
        int var4 = this.panelLoginNewUser.rc(this.jab);
        int var5 = this.panelLoginNewUser.rc(this.iab);
        int var6 = 0;
        String var7 = this.panelLoginNewUser.oc(this.hab);

        try {
          var6 = Integer.parseInt(var7);
        } catch (Exception var8) {
          ;
        }

        this.newPlayer(var1, var2, var3, var4, var6, var5);
        return;
      }
    } else {
      if (this.loginScreen == 2) {
        this.panelLoginExistingUser.handleMouse(super.mouseX, super.mouseY, super.lastMouseButtonDown, super.mouseButtonDown);
        if (this.panelLoginExistingUser.isClicked(this.uab)) {
          this.loginScreen = 0;
        }

        if (this.panelLoginExistingUser.isClicked(this.rab)) {
          this.panelLoginExistingUser.setFocus(this.sab);
        }

        if (this.panelLoginExistingUser.isClicked(this.sab) || this.panelLoginExistingUser.isClicked(this.tab)) {
          this.loginUser = this.panelLoginExistingUser.oc(this.rab);
          this.loginPass = this.panelLoginExistingUser.oc(this.sab);
          this.login(this.loginUser, this.loginPass);
        }

        return;
      }

      if (this.loginScreen == 3) {
        this.aab.handleMouse(super.mouseX, super.mouseY, super.lastMouseButtonDown, super.mouseButtonDown);
        if (this.aab.isClicked(this.nbb)) {
          this.loginScreen = 1;
          this.panelLoginNewUser.updateText(this.dab, "To create an account please enter");
          this.panelLoginNewUser.updateText(this.eab, "all the requested details");
          this.panelLoginNewUser.updateText(this.mab, "");
          this.panelLoginNewUser.updateText(this.nab, "");
          this.panelLoginNewUser.updateText(this.oab, "");
          this.panelLoginNewUser.setFocus(this.mab);
        }

        if (this.aab.isClicked(this.obb)) {
          this.loginScreen = 0;
        }
      }
    }

  }

  public void showLoginScreenStatus(String var1, String var2) {
    if (this.loginScreen == 1) {
      this.panelLoginNewUser.updateText(this.dab, var1);
      this.panelLoginNewUser.updateText(this.eab, var2);
    }

    if (this.loginScreen == 2) {
      this.panelLoginExistingUser.updateText(this.pab, var1);
      this.panelLoginExistingUser.updateText(this.qab, var2);
    }

    this.loginUserDisp = var2;
    this.drawLoginScreens();
    this.resetTimings();
  }

  public void resetLoginVars() {
    this.loginScreen = 0;
    this.loggedIn = 0;
  }

  public void q() {
    this.resetGame();
  }

  public void resetGame() {
    this.combatStyle = 0;
    this.loginScreen = 0;
    this.loggedIn = 1;
    this.resetPMText();
    this.surface.blackScreen();
    this.surface.draw(this.graphics, 0, 11);

    for (int var1 = 0; var1 < this.objectCount; ++var1) {
      this.scene.freeModel(this.objectModel[var1]);
      this.world.removeObject(this.objectX[var1], this.objectY[var1], this.objectID[var1]);
    }

    for (int var2 = 0; var2 < this.wallObjectCount; ++var2) {
      this.scene.freeModel(this.wallObjectModel[var2]);
      this.world.removeWallObject(this.wallObjectX[var2], this.wallObjectY[var2], this.wallObjectDirection[var2], this.wallObjectID[var2]);
    }

    this.objectCount = 0;
    this.wallObjectCount = 0;
    this.groundItemCount = 0;
    this.playerCount = 0;

    for (int var3 = 0; var3 < this.maxPlayersServerCount; ++var3) {
      this.playersServer[var3] = null;
    }

    for (int var4 = 0; var4 < this.maxPlayersCount; ++var4) {
      this.players[var4] = null;
    }

    this.npcCount = 0;

    for (int var5 = 0; var5 < this.maxNpcsServerCount; ++var5) {
      this.npcsServer[var5] = null;
    }

    for (int var6 = 0; var6 < this.maxNpcsCount; ++var6) {
      this.npcs[var6] = null;
    }

    this.mouseButtonClick = 0;
    super.lastMouseButtonDown = 0;
    super.mouseButtonDown = 0;
  }

  public void hb() {
    String var1 = this.panelLoginNewUser.oc(this.mab);
    String var2 = this.panelLoginNewUser.oc(this.oab);
    this.loginScreen = 2;
    this.panelLoginExistingUser.updateText(this.pab, "Please enter your");
    this.panelLoginExistingUser.updateText(this.qab, "username and password");
    this.panelLoginExistingUser.updateText(this.rab, var1);
    this.panelLoginExistingUser.updateText(this.sab, var2);
    this.drawLoginScreens();
    this.resetTimings();
    this.login(var1, var2);
  }

  public void em(Panel var1, int var2) {
    var1.removeListEntry(var2, "Runescape rules of use", false);
    var1.removeListEntry(var2, "", false);
    var1.removeListEntry(var2, "In order to keep runescape enjoyable for everyone there are a few", false);
    var1.removeListEntry(var2, "rules you must observe. You must agree to these rules to play", false);
    var1.removeListEntry(var2, "", false);
    var1.removeListEntry(var2, "When using the built in chat facility you must not use any language", false);
    var1.removeListEntry(var2, "which may be considered by others to be offensive, racist or", false);
    var1.removeListEntry(var2, "obscene. You must not use the chat facility to harass, threaten or", false);
    var1.removeListEntry(var2, "deceive other players.", false);
    var1.removeListEntry(var2, "", false);
    var1.removeListEntry(var2, "You must not exploit any cheats or errors which you find in the", false);
    var1.removeListEntry(var2, "game, to give yourself an unfair advantage. Any exploits which you", false);
    var1.removeListEntry(var2, "find must be immediately reported to Jagex Software.", false);
    var1.removeListEntry(var2, "", false);
    var1.removeListEntry(var2, "You must not attempt to use other programs in conjunction with", false);
    var1.removeListEntry(var2, "RuneScape to give yourself an unfair advantage at the game. You", false);
    var1.removeListEntry(var2, "may not use any bots or macros to control your character for you.", false);
    var1.removeListEntry(var2, "When you are not playing the game you must log-out. You may not", false);
    var1.removeListEntry(var2, "circumvent any of our mechanisms designed to log out inactive", false);
    var1.removeListEntry(var2, "players automatically.", false);
    var1.removeListEntry(var2, "", false);
    var1.removeListEntry(var2, "You must not create multiple characters and use them to help each", false);
    var1.removeListEntry(var2, "other. You may create more than one character, but if you do, you", false);
    var1.removeListEntry(var2, "may not log in more than one at any time, and they must not interact", false);
    var1.removeListEntry(var2, "with each other in any way. If you wish to form an adventuring", false);
    var1.removeListEntry(var2, "party you should do so by cooperating with other players in the game", false);
    var1.removeListEntry(var2, "", false);
    var1.removeListEntry(var2, "Terms and conditions", false);
    var1.removeListEntry(var2, "", false);
    var1.removeListEntry(var2, "You agree that your character and account in runescape, is the", false);
    var1.removeListEntry(var2, "property of, and remains the property of Jagex Software. You may", false);
    var1.removeListEntry(var2, "not sell, transfer, or lend your character to anyone else. We may", false);
    var1.removeListEntry(var2, "delete or modify your character at any time for any reason.", false);
    var1.removeListEntry(var2, "For instance failing to follow the rules above may be cause for", false);
    var1.removeListEntry(var2, "IMMEDIATE DELETION of all your characters.", false);
    var1.removeListEntry(var2, "", false);
    var1.removeListEntry(var2, "You agree that for purposes such as preventing offensive language", false);
    var1.removeListEntry(var2, "we may automatically or manually censor the chat as we see fit,", false);
    var1.removeListEntry(var2, "and that we may record the chat to help us identify offenders.", false);
    var1.removeListEntry(var2, "", false);
    var1.removeListEntry(var2, "No Warranty is supplied with this Software. All implied warranties", false);
    var1.removeListEntry(var2, "conditions or terms are excluded to the fullest extent permitted by", false);
    var1.removeListEntry(var2, "law. We do not warrant that the operation of the Software will be", false);
    var1.removeListEntry(var2, "uninterrupted or error free. We accept no responsibility for any", false);
    var1.removeListEntry(var2, "consequential or indirect loss or damages. You use this software at", false);
    var1.removeListEntry(var2, "your own risk, and assume full responsibility for any and all real,", false);
    var1.removeListEntry(var2, "claimed, or supposed damages that may occur as a result of running", false);
    var1.removeListEntry(var2, "this software.", false);
    var1.removeListEntry(var2, "", false);
    var1.removeListEntry(var2, "We reserve all rights related to the runescape name, logo, web site,", false);
    var1.removeListEntry(var2, "and game. All materials associated with runescape are protected", false);
    var1.removeListEntry(var2, "by UK copyright laws and all other applicable national laws, and", false);
    var1.removeListEntry(var2, "may not be copied, reproduced, republished, uploaded, posted,", false);
    var1.removeListEntry(var2, "transmitted, or distributed in any way without our prior written", false);
    var1.removeListEntry(var2, "consent. We reserve the right to modify or remove this game at any", false);
    var1.removeListEntry(var2, "time. You agree that we may change this service, and these terms", false);
    var1.removeListEntry(var2, "and conditions, as and when we deem necessary.", false);
    var1.removeListEntry(var2, "", false);
    var1.removeListEntry(var2, "We accept no responsibility for the actions of other users of our", false);
    var1.removeListEntry(var2, "website. You acknowledge that it is inpractical for us to control", false);
    var1.removeListEntry(var2, "and monitor everything that users do in our game or post on our", false);
    var1.removeListEntry(var2, "message boards, and that we therefore cannot be held responsible", false);
    var1.removeListEntry(var2, "for any abusive or inappropriate content which appears on our site", false);
    var1.removeListEntry(var2, "as a result.", false);
    var1.removeListEntry(var2, "", false);
    var1.removeListEntry(var2, "Occasionally we may accept ideas and game additions from the", false);
    var1.removeListEntry(var2, "players. You agree that by submitting material for inclusion in", false);
    var1.removeListEntry(var2, "runescape you are giving us a non-exclusive, perpetual, worldwide,", false);
    var1.removeListEntry(var2, "royalty-free license to use or modify the submission as we see", false);
    var1.removeListEntry(var2, "fit. You agree that you will not withdraw the submission or attempt", false);
    var1.removeListEntry(var2, "to make a charge for its use. Furthermore you warrant that you", false);
    var1.removeListEntry(var2, "are the exclusive copyright holder of the submission, and that the", false);
    var1.removeListEntry(var2, "submission in no way violates any other person or entity's rights", false);
    var1.removeListEntry(var2, "", false);
    var1.removeListEntry(var2, "These Terms shall be governed by the laws of England, and the", false);
    var1.removeListEntry(var2, "courts of England shall have exclusive jurisdiction in all matters", false);
    var1.removeListEntry(var2, "arising.", false);
  }

  public void handleGameInput() {
    this.checkConnection();
    if (super.lastMouseAction > 4500 && this.combatTimeout == 0) {
      this.closeConnection();
    } else {
      if (this.localPlayer.animationCurrent == 8 || this.localPlayer.animationCurrent == 9) {
        this.combatTimeout = 500;
      }

      if (this.combatTimeout > 0) {
        --this.combatTimeout;
      }

      int var3;
      int var5;
      int var6;
      int var7;
      for (int var1 = 0; var1 < this.playerCount; ++var1) {
        Character var2 = this.players[var1];
        var3 = (var2.waypointCurrent + 1) % 10;
        if (var2.movingStep != var3) {
          byte var4 = -1;
          var5 = var2.movingStep;
          if (var5 < var3) {
            var6 = var3 - var5;
          } else {
            var6 = 10 + var3 - var5;
          }

          var7 = 4;
          if (var6 > 2) {
            var7 = (var6 - 1) * 4;
          }

          if (var2.waypointsX[var5] - var2.currentX <= this.magicLoc * 3 && var2.waypointsY[var5] - var2.currentY <= this.magicLoc * 3 && var2.waypointsX[var5] - var2.currentX >= -this.magicLoc * 3 && var2.waypointsY[var5] - var2.currentY >= -this.magicLoc * 3 && var6 <= 8) {
            if (var2.currentX < var2.waypointsX[var5]) {
              var2.currentX += var7;
              ++var2.stepCount;
              var4 = 2;
            } else if (var2.currentX > var2.waypointsX[var5]) {
              var2.currentX -= var7;
              ++var2.stepCount;
              var4 = 6;
            }

            if (var2.currentX - var2.waypointsX[var5] < var7 && var2.currentX - var2.waypointsX[var5] > -var7) {
              var2.currentX = var2.waypointsX[var5];
            }

            if (var2.currentY < var2.waypointsY[var5]) {
              var2.currentY += var7;
              ++var2.stepCount;
              if (var4 == -1) {
                var4 = 4;
              } else if (var4 == 2) {
                var4 = 3;
              } else {
                var4 = 5;
              }
            } else if (var2.currentY > var2.waypointsY[var5]) {
              var2.currentY -= var7;
              ++var2.stepCount;
              if (var4 == -1) {
                var4 = 0;
              } else if (var4 == 2) {
                var4 = 1;
              } else {
                var4 = 7;
              }
            }

            if (var2.currentY - var2.waypointsY[var5] < var7 && var2.currentY - var2.waypointsY[var5] > -var7) {
              var2.currentY = var2.waypointsY[var5];
            }
          } else {
            var2.currentX = var2.waypointsX[var5];
            var2.currentY = var2.waypointsY[var5];
          }

          if (var4 != -1) {
            var2.animationCurrent = var4;
          }

          if (var2.currentX == var2.waypointsX[var5] && var2.currentY == var2.waypointsY[var5]) {
            var2.movingStep = (var5 + 1) % 10;
          }
        } else {
          var2.animationCurrent = var2.animationNext;
        }

        if (var2.messageTimeout > 0) {
          --var2.messageTimeout;
        }

        if (var2.bubbleTimeout > 0) {
          --var2.bubbleTimeout;
        }

        if (var2.combatTimer > 0) {
          --var2.combatTimer;
        }

        if (this.deathScreenTimeout > 0) {
          --this.deathScreenTimeout;
          if (this.deathScreenTimeout == 0) {
            this.showMessage("You have been granted another life. Be more careful this time!", 3);
          }

          if (this.deathScreenTimeout == 0) {
            this.showMessage("You retain your skills. Unless you attacked another player recently,", 3);
          }

          if (this.deathScreenTimeout == 0) {
            this.showMessage("you also keep your best 3 items. Everything else lands where you died.", 3);
          }
        }
      }

      int var13;
      for (int var9 = 0; var9 < this.npcCount; ++var9) {
        Character npc = this.npcs[var9];
        var13 = (npc.waypointCurrent + 1) % 10;
        if (npc.movingStep != var13) {
          byte var11 = -1;
          var6 = npc.movingStep;
          if (var6 < var13) {
            var7 = var13 - var6;
          } else {
            var7 = 10 + var13 - var6;
          }

          int var8 = 4;
          if (var7 > 2) {
            var8 = (var7 - 1) * 4;
          }

          if (npc.waypointsX[var6] - npc.currentX <= this.magicLoc * 3 && npc.waypointsY[var6] - npc.currentY <= this.magicLoc * 3 && npc.waypointsX[var6] - npc.currentX >= -this.magicLoc * 3 && npc.waypointsY[var6] - npc.currentY >= -this.magicLoc * 3 && var7 <= 8) {
            if (npc.currentX < npc.waypointsX[var6]) {
              npc.currentX += var8;
              ++npc.stepCount;
              var11 = 2;
            } else if (npc.currentX > npc.waypointsX[var6]) {
              npc.currentX -= var8;
              ++npc.stepCount;
              var11 = 6;
            }

            if (npc.currentX - npc.waypointsX[var6] < var8 && npc.currentX - npc.waypointsX[var6] > -var8) {
              npc.currentX = npc.waypointsX[var6];
            }

            if (npc.currentY < npc.waypointsY[var6]) {
              npc.currentY += var8;
              ++npc.stepCount;
              if (var11 == -1) {
                var11 = 4;
              } else if (var11 == 2) {
                var11 = 3;
              } else {
                var11 = 5;
              }
            } else if (npc.currentY > npc.waypointsY[var6]) {
              npc.currentY -= var8;
              ++npc.stepCount;
              if (var11 == -1) {
                var11 = 0;
              } else if (var11 == 2) {
                var11 = 1;
              } else {
                var11 = 7;
              }
            }

            if (npc.currentY - npc.waypointsY[var6] < var8 && npc.currentY - npc.waypointsY[var6] > -var8) {
              npc.currentY = npc.waypointsY[var6];
            }
          } else {
            npc.currentX = npc.waypointsX[var6];
            npc.currentY = npc.waypointsY[var6];
          }

          if (var11 != -1) {
            npc.animationCurrent = var11;
          }

          if (npc.currentX == npc.waypointsX[var6] && npc.currentY == npc.waypointsY[var6]) {
            npc.movingStep = (var6 + 1) % 10;
          }
        } else {
          npc.animationCurrent = npc.animationNext;
        }

        if (npc.messageTimeout > 0) {
          --npc.messageTimeout;
        }

        if (npc.bubbleTimeout > 0) {
          --npc.bubbleTimeout;
        }

        if (npc.combatTimer > 0) {
          --npc.combatTimer;
        }
      }

      for (var3 = 0; var3 < this.playerCount; ++var3) {
        Character var14 = this.players[var3];
        if (var14.projectileRange > 0) {
          --var14.projectileRange;
        }
      }

      if (this.cameraAutoAngleDebug) {
        if (this.cameraAutoRotatePlayerX - this.localPlayer.currentX < -500 || this.cameraAutoRotatePlayerX - this.localPlayer.currentX > 500 || this.cameraAutoRotatePlayerY - this.localPlayer.currentY < -500 || this.cameraAutoRotatePlayerY - this.localPlayer.currentY > 500) {
          this.cameraAutoRotatePlayerX = this.localPlayer.currentX;
          this.cameraAutoRotatePlayerY = this.localPlayer.currentY;
        }
      } else {
        if (this.cameraAutoRotatePlayerX - this.localPlayer.currentX < -500 || this.cameraAutoRotatePlayerX - this.localPlayer.currentX > 500 || this.cameraAutoRotatePlayerY - this.localPlayer.currentY < -500 || this.cameraAutoRotatePlayerY - this.localPlayer.currentY > 500) {
          this.cameraAutoRotatePlayerX = this.localPlayer.currentX;
          this.cameraAutoRotatePlayerY = this.localPlayer.currentY;
        }

        if (this.cameraAutoRotatePlayerX != this.localPlayer.currentX) {
          this.cameraAutoRotatePlayerX += (this.localPlayer.currentX - this.cameraAutoRotatePlayerX) / (16 + (this.cameraZoom - 500) / 15);
        }

        if (this.cameraAutoRotatePlayerY != this.localPlayer.currentY) {
          this.cameraAutoRotatePlayerY += (this.localPlayer.currentY - this.cameraAutoRotatePlayerY) / (16 + (this.cameraZoom - 500) / 15);
        }

        if (this.optionCameraModeAuto) {
          var13 = this.cameraAngle * 32;
          var5 = var13 - this.cameraRotation;
          byte var12 = 1;
          if (var5 != 0) {
            ++this.qu;
            if (var5 > 128) {
              var12 = -1;
              var5 = 256 - var5;
            } else if (var5 > 0) {
              var12 = 1;
            } else if (var5 < -128) {
              var12 = 1;
              var5 += 256;
            } else if (var5 < 0) {
              var12 = -1;
              var5 = -var5;
            }

            this.cameraRotation += (this.qu * var5 + 255) / 256 * var12;
            this.cameraRotation &= 255;
          } else {
            this.qu = 0;
          }
        }
      }

      if (this.showAppearanceChange) {
        this.handleAppearancePanelControls();
      } else {
        if (super.mouseY > this.gameHeight - 4) {
          if (super.mouseX > 15 && super.mouseX < 96 && super.lastMouseButtonDown == 1) {
            this.messageTabsSelected = 0;
          }

          if (super.mouseX > 110 && super.mouseX < 194 && super.lastMouseButtonDown == 1) {
            this.messageTabsSelected = 1;
            this.panelMessageTabs.controlFlashText[this.controlTextListChat] = 999999;
          }

          if (super.mouseX > 215 && super.mouseX < 295 && super.lastMouseButtonDown == 1) {
            this.messageTabsSelected = 2;
            this.panelMessageTabs.controlFlashText[this.nz] = 999999;
          }

          if (super.mouseX > 315 && super.mouseX < 395 && super.lastMouseButtonDown == 1) {
            this.messageTabsSelected = 3;
            this.panelMessageTabs.controlFlashText[this.oz] = 999999;
          }

          super.lastMouseButtonDown = 0;
          super.mouseButtonDown = 0;
        }

        this.panelMessageTabs.handleMouse(super.mouseX, super.mouseY, super.lastMouseButtonDown, super.mouseButtonDown);
        if (this.messageTabsSelected > 0 && super.mouseX >= 494 && super.mouseY >= this.gameHeight - 66) {
          super.lastMouseButtonDown = 0;
        }

        if (this.panelMessageTabs.isClicked(this.controlTextListAll)) {
          String var15 = this.panelMessageTabs.oc(this.controlTextListAll);
          this.panelMessageTabs.updateText(this.controlTextListAll, "");
          if (var15.equalsIgnoreCase("simlostcon99")) {
            super.clientStream.close();
          } else if (!this.sendCommandString(var15)) {
            this.localPlayer.messageTimeout = 150;
            this.localPlayer.message = var15;
            this.showMessage(this.localPlayer.name + ": " + var15, 2);
          }
        }

        if (this.messageTabsSelected == 0) {
          for (var13 = 0; var13 < this.qz; ++var13) {
            if (this.messageHistoryTimeout[var13] > 0) {
              --this.messageHistoryTimeout[var13];
            }
          }
        }

        if (this.deathScreenTimeout != 0) {
          super.lastMouseButtonDown = 0;
        }

        if (this.showDialogTrade) {
          if (super.mouseButtonDown != 0) {
            ++this.mouseButtonDownTime;
          } else {
            this.mouseButtonDownTime = 0;
          }

          if (this.mouseButtonDownTime > 300) {
            this.mouseButtonItemCountIncrement += 50;
          } else if (this.mouseButtonDownTime > 150) {
            this.mouseButtonItemCountIncrement += 5;
          } else if (this.mouseButtonDownTime > 50) {
            ++this.mouseButtonItemCountIncrement;
          } else if (this.mouseButtonDownTime > 20 && (this.mouseButtonDownTime & 5) == 0) {
            ++this.mouseButtonItemCountIncrement;
          }
        } else {
          this.mouseButtonDownTime = 0;
          this.mouseButtonItemCountIncrement = 0;
        }

        if (super.lastMouseButtonDown == 1) {
          this.mouseButtonClick = 1;
        } else if (super.lastMouseButtonDown == 2) {
          this.mouseButtonClick = 2;
        }

        this.scene.ph(super.mouseX, super.mouseY);
        super.lastMouseButtonDown = 0;
        if (this.optionCameraModeAuto) {
          if (this.qu == 0 || this.cameraAutoAngleDebug) {
            if (super.keyLeftDown) {
              this.cameraAngle = this.cameraAngle + 1 & 7;
              super.keyLeftDown = false;
              if (!this.fogOfWar) {
                if ((this.cameraAngle & 1) == 0) {
                  this.cameraAngle = this.cameraAngle + 1 & 7;
                }

                for (var13 = 0; var13 < 8 && !this.isValidCameraAngle(this.cameraAngle); ++var13) {
                  this.cameraAngle = this.cameraAngle + 1 & 7;
                }
              }
            }

            if (super.keyRightDown) {
              this.cameraAngle = this.cameraAngle + 7 & 7;
              super.keyRightDown = false;
              if (!this.fogOfWar) {
                if ((this.cameraAngle & 1) == 0) {
                  this.cameraAngle = this.cameraAngle + 7 & 7;
                }

                for (var13 = 0; var13 < 8 && !this.isValidCameraAngle(this.cameraAngle); ++var13) {
                  this.cameraAngle = this.cameraAngle + 7 & 7;
                }
              }
            }
          }
        } else if (super.keyLeftDown) {
          this.cameraRotation = this.cameraRotation + 2 & 255;
        } else if (super.keyRightDown) {
          this.cameraRotation = this.cameraRotation - 2 & 255;
        }

        if (this.fogOfWar && this.cameraZoom > 550) {
          this.cameraZoom -= 4;
        } else if (!this.fogOfWar && this.cameraZoom < 750) {
          this.cameraZoom += 4;
        }

        if (this.mouseClickXStep > 0) {
          --this.mouseClickXStep;
        } else if (this.mouseClickXStep < 0) {
          ++this.mouseClickXStep;
        }

        this.scene.ai(17);
        ++this.objectAnimationCount;
        if (this.objectAnimationCount > 5) {
          this.objectAnimationCount = 0;
          this.objectAnimationNumberTorch = this.objectAnimationNumberTorch + 1 & 3;
          this.objectAnimationNumberFire = (this.objectAnimationNumberFire + 1) % 3;
        }

        for (var13 = 0; var13 < this.objectCount; ++var13) {
          var5 = this.objectX[var13];
          var6 = this.objectY[var13];
          if (var5 >= 0 && var6 >= 0 && var5 < 96 && var6 < 96 && this.objectID[var13] == 74) {
            this.objectModel[var13].pe(1, 0, 0);
          }
        }

      }
    }
  }

  public void showMessage(String var1, int var2) {
    int var3;
    if (var2 == 2 || var2 == 4 || var2 == 6) {
      while (true) {
        if (var1.length() <= 5 || var1.charAt(0) != 64 || var1.charAt(4) != 64) {
          var3 = var1.indexOf(":");
          if (var3 != -1) {
            String var4 = var1.substring(0, var3);
            long var5 = Utility.username2hash(var4);

            for (int var7 = 0; var7 < super.ignoreListCount; ++var7) {
              if (super.ignoreList[var7] == var5) {
                return;
              }
            }
          }
          break;
        }

        var1 = var1.substring(5);
      }
    }

    if (var2 == 2) {
      var1 = "@yel@" + var1;
    }

    if (var2 == 3 || var2 == 4) {
      var1 = "@whi@" + var1;
    }

    if (var2 == 6) {
      var1 = "@cya@" + var1;
    }

    if (this.messageTabsSelected != 0) {
      if (var2 == 4 || var2 == 3) {
        this.messageTabFlashAll = 200;
      }

      if (var2 == 2 && this.messageTabsSelected != 1) {
        this.messageTabFlashHistory = 200;
      }

      if (var2 == 5 && this.messageTabsSelected != 2) {
        this.messageTabFlashQuest = 200;
      }

      if (var2 == 6 && this.messageTabsSelected != 3) {
        this.messageTabFlashPrivate = 200;
      }

      if (var2 == 3 && this.messageTabsSelected != 0) {
        this.messageTabsSelected = 0;
      }

      if (var2 == 6 && this.messageTabsSelected != 3 && this.messageTabsSelected != 0) {
        this.messageTabsSelected = 3;
      }
    }

    for (var3 = this.qz - 1; var3 > 0; --var3) {
      this.messageHistory[var3] = this.messageHistory[var3 - 1];
      this.messageHistoryTimeout[var3] = this.messageHistoryTimeout[var3 - 1];
    }

    this.messageHistory[0] = var1;
    this.messageHistoryTimeout[0] = 300;
    if (var2 == 2) {
      if (this.panelMessageTabs.controlFlashText[this.controlTextListChat] == this.panelMessageTabs.ve[this.controlTextListChat] - 4) {
        this.panelMessageTabs.removeListEntry(this.controlTextListChat, var1, true);
      } else {
        this.panelMessageTabs.removeListEntry(this.controlTextListChat, var1, false);
      }
    }

    if (var2 == 5) {
      if (this.panelMessageTabs.controlFlashText[this.nz] == this.panelMessageTabs.ve[this.nz] - 4) {
        this.panelMessageTabs.removeListEntry(this.nz, var1, true);
      } else {
        this.panelMessageTabs.removeListEntry(this.nz, var1, false);
      }
    }

    if (var2 == 6) {
      if (this.panelMessageTabs.controlFlashText[this.oz] == this.panelMessageTabs.ve[this.oz] - 4) {
        this.panelMessageTabs.removeListEntry(this.oz, var1, true);
        return;
      }

      this.panelMessageTabs.removeListEntry(this.oz, var1, false);
    }

  }

  public void showServerMessage(String var1) {
    if (var1.equals("@sys@k")) {
      this.closeConnection();
    } else if (var1.startsWith("@cha@")) {
      this.showMessage(var1, 2);
    } else if (var1.startsWith("@bor@")) {
      this.showMessage(var1, 4);
    } else if (var1.startsWith("@que@")) {
      this.showMessage("@whi@" + var1, 5);
    } else if (var1.startsWith("@pri@")) {
      this.showMessage(var1, 6);
    } else {
      this.showMessage(var1, 3);
    }
  }

  public void handleIncomingPacket(int opcode, int psize, byte[] pdata) {
    int reg3;
    try {
      int reg1;
      int reg4;
      int reg5;
      int reg6;
      int reg2;
      if (opcode == 230) {
        reg1 = pdata[1] & 255;
        reg2 = pdata[2] & 255;
        reg3 = pdata[3] & 255;
        reg4 = pdata[4] & 255;
        reg5 = pdata[5] & 255;
        reg6 = pdata[6] & 255;
        if (reg1 > Version.CONFIG || reg2 > Version.MAPS || reg3 > Version.MEDIA || reg4 > Version.MODELS || reg5 > Version.TEXTURES || reg6 > Version.ENTITY) {
          this.closeConnection();
          super.up = "Runescape has been updated. Getting latest files";
          super.loadingStep = 2;
          this.showLoadingProgress(0, "Loading");
          if (reg1 > Version.CONFIG) {
            Version.CONFIG = reg1;
            this.loadGameConfig();
          }

          if (reg3 > Version.MEDIA) {
            Version.MEDIA = reg3;
            this.loadMedia();
          }

          if (reg6 > Version.ENTITY) {
            Version.ENTITY = reg6;
            this.loadEntities(true);
          } else {
            this.loadEntities(false);
          }

          if (reg5 > Version.TEXTURES) {
            Version.TEXTURES = reg5;
            this.loadTextures();
          }

          if (reg4 > Version.MODELS) {
            Version.MODELS = reg4;
            this.loadModels();
          }

          if (reg2 > Version.MAPS) {
            Version.MAPS = reg2;
            this.loadMaps();
          }

          this.world.playerAlive = false;
          this.lastPlaneIndex = -1;
          super.loadingStep = 0;
          this.login(this.loginUser, this.loginPass);
          return;
        }
      }

      Character var23;
      if (opcode == 232) {
        reg1 = (psize - 1) / 2;

        for (reg2 = 0; reg2 < reg1; ++reg2) {
          reg3 = Utility.getUnsignedShort(pdata, 1 + reg2 * 2);

          for (reg4 = 0; reg4 < this.playerCount; ++reg4) {
            var23 = this.players[reg4];
            if (var23 == null || var23.serverIndex == reg3) {
              --this.playerCount;

              for (reg6 = reg4; reg6 < this.playerCount; ++reg6) {
                this.players[reg6] = this.players[reg6 + 1];
              }

              --reg4;
            }
          }
        }
      }

      if (opcode == 231) {
        reg1 = (psize - 1) / 2;

        for (reg2 = 0; reg2 < reg1; ++reg2) {
          reg3 = Utility.getUnsignedShort(pdata, 1 + reg2 * 2);

          for (reg4 = 0; reg4 < this.npcCount; ++reg4) {
            var23 = this.npcs[reg4];
            if (var23 == null || var23.serverIndex == reg3) {
              --this.npcCount;

              for (reg6 = reg4; reg6 < this.npcCount; ++reg6) {
                this.npcs[reg6] = this.npcs[reg6 + 1];
              }

              --reg4;
            }
          }
        }
      }

      int var11;
      int var12;
      int var13;
      int var14;
      int var15;
      if (opcode == 255) {
        reg1 = 1;
        reg2 = 0;
        var11 = 0;

        for (this.hu = true; reg1 < psize; ++reg2) {
          boolean var10;
          if (reg2 == 0) {
            reg3 = Utility.getUnsignedShort(pdata, 1);
            this.regionX = Utility.getUnsignedShort(pdata, 3);
            this.regionY = Utility.getUnsignedShort(pdata, 5);
            reg6 = Utility.getUnsignedByte(pdata[7]);
            reg1 += 7;
            this.loadNextRegion(this.regionX, this.regionY);
            this.regionX -= this.areaX;
            this.regionY -= this.areaY;
            reg4 = this.regionX * this.magicLoc + 64;
            reg5 = this.regionY * this.magicLoc + 64;
            if (reg6 >= 128) {
              reg6 -= 128;
              var10 = true;
            } else {
              var10 = false;
            }
          } else {
            var14 = Utility.getUnsignedShort(pdata, reg1);
            if ((var14 & '\ufc00') == '\ufc00') {
              var15 = Utility.getUnsignedShort(pdata, reg1 + 2);
              reg1 += 4;
              var12 = var14 >> 5 & 31;
              if (var12 > 15) {
                var12 -= 32;
              }

              var13 = var14 & 31;
              if (var13 > 15) {
                var13 -= 32;
              }

              reg3 = var15 >> 4 & 4095;
              reg6 = var15 & 15;
              if (reg6 == 15) {
                reg6 = 0;
                var10 = true;
              } else {
                var10 = false;
              }
            } else {
              var15 = Utility.getUnsignedByte(pdata[reg1 + 2]);
              reg1 += 3;
              reg3 = var14 >> 6 & 1023;
              var12 = var14 >> 1 & 31;
              if (var12 > 15) {
                var12 -= 32;
              }

              var13 = (var14 << 4 & 16) + (var15 >> 4 & 15);
              if (var13 > 15) {
                var13 -= 32;
              }

              reg6 = var15 & 15;
              if (reg6 == 15) {
                reg6 = 0;
                var10 = true;
              } else {
                var10 = false;
              }
            }

            reg4 = (this.regionX + var12) * this.magicLoc + 64;
            reg5 = (this.regionY + var13) * this.magicLoc + 64;
          }

          if (this.playersServer[reg3] == null) {
            this.playersServer[reg3] = new Character();
            this.playersServer[reg3].serverIndex = reg3;
            this.playersServer[reg3].br = 0;
          }

          Character var28 = this.playersServer[reg3];
          if (reg2 == 0) {
            this.localPlayer = var28;
          }

          boolean var31 = false;

          for (var14 = 0; var14 < this.playerCount; ++var14) {
            if (this.players[var14] == var28) {
              var31 = true;
              break;
            }
          }

          if (!var31) {
            this.players[this.playerCount++] = this.playersServer[reg3];
          }

          if (var31 && this.hu) {
            var28.animationNext = reg6;
            var15 = var28.waypointCurrent;
            if (reg4 != var28.waypointsX[var15] || reg5 != var28.waypointsY[var15]) {
              var28.waypointCurrent = var15 = (var15 + 1) % 10;
              var28.waypointsX[var15] = reg4;
              var28.waypointsY[var15] = reg5;
            }
          } else {
            var28.serverIndex = reg3;
            var28.movingStep = 0;
            var28.waypointCurrent = 0;
            var28.waypointsX[0] = var28.currentX = reg4;
            var28.waypointsY[0] = var28.currentY = reg5;
            var28.animationNext = var28.animationCurrent = reg6;
            var28.stepCount = 0;
            if (!var10 && !var31) {
              this.vy[var11++] = reg3;
            }
          }
        }

        if (var11 > 0) {
          super.clientStream.newPacket(254);
          super.clientStream.writeShort(var11);

          for (var12 = 0; var12 < var11; ++var12) {
            Character var32 = this.playersServer[this.vy[var12]];
            super.clientStream.writeShort(var32.serverIndex);
            super.clientStream.writeShort(var32.br);
          }

          super.clientStream.flushPacket();
          return;
        }
      } else {
        int var27;
        if (opcode == 254) {
          reg1 = 1;

          while (true) {
            while (reg1 < psize) {
              if (Utility.getUnsignedByte(pdata[reg1]) == 255) {
                reg2 = 0;
                reg3 = this.regionX + pdata[reg1 + 1] >> 3;
                reg4 = this.regionY + pdata[reg1 + 2] >> 3;
                reg1 += 3;

                for (reg5 = 0; reg5 < this.groundItemCount; ++reg5) {
                  reg6 = (this.groundItemX[reg5] >> 3) - reg3;
                  var27 = (this.groundItemY[reg5] >> 3) - reg4;
                  if (reg6 != 0 || var27 != 0) {
                    if (reg5 != reg2) {
                      this.groundItemX[reg2] = this.groundItemX[reg5];
                      this.groundItemY[reg2] = this.groundItemY[reg5];
                      this.groundItemID[reg2] = this.groundItemID[reg5];
                      this.groundItemZ[reg2] = this.groundItemZ[reg5];
                    }

                    ++reg2;
                  }
                }

                this.groundItemCount = reg2;
              } else {
                reg2 = Utility.getUnsignedShort(pdata, reg1);
                reg1 += 2;
                reg3 = this.regionX + pdata[reg1++];
                reg4 = this.regionY + pdata[reg1++];
                if ((reg2 & '\u8000') == 0) {
                  this.groundItemX[this.groundItemCount] = reg3;
                  this.groundItemY[this.groundItemCount] = reg4;
                  this.groundItemID[this.groundItemCount] = reg2;
                  this.groundItemZ[this.groundItemCount] = 0;

                  for (reg5 = 0; reg5 < this.objectCount; ++reg5) {
                    if (this.objectX[reg5] == reg3 && this.objectY[reg5] == reg4) {
                      this.groundItemZ[this.groundItemCount] = GameData.kib[this.objectID[reg5]];
                      break;
                    }
                  }

                  ++this.groundItemCount;
                } else {
                  reg2 &= 32767;
                  reg5 = 0;

                  for (reg6 = 0; reg6 < this.groundItemCount; ++reg6) {
                    if (this.groundItemX[reg6] == reg3 && this.groundItemY[reg6] == reg4 && this.groundItemID[reg6] == reg2) {
                      reg2 = -123;
                    } else {
                      if (reg6 != reg5) {
                        this.groundItemX[reg5] = this.groundItemX[reg6];
                        this.groundItemY[reg5] = this.groundItemY[reg6];
                        this.groundItemID[reg5] = this.groundItemID[reg6];
                        this.groundItemZ[reg5] = this.groundItemZ[reg6];
                      }

                      ++reg5;
                    }
                  }

                  this.groundItemCount = reg5;
                }
              }
            }

            return;
          }
        }

        if (opcode == 253) {
          reg1 = 1;

          while (true) {
            while (reg1 < psize) {
              if (Utility.getUnsignedByte(pdata[reg1]) == 255) {
                reg2 = 0;
                reg3 = this.regionX + pdata[reg1 + 1] >> 3;
                reg4 = this.regionY + pdata[reg1 + 2] >> 3;
                reg1 += 3;

                for (reg5 = 0; reg5 < this.objectCount; ++reg5) {
                  reg6 = (this.objectX[reg5] >> 3) - reg3;
                  var27 = (this.objectY[reg5] >> 3) - reg4;
                  if (reg6 == 0 && var27 == 0) {
                    this.scene.freeModel(this.objectModel[reg5]);
                    this.world.removeObject(this.objectX[reg5], this.objectY[reg5], this.objectID[reg5]);
                  } else {
                    if (reg5 != reg2) {
                      this.objectModel[reg2] = this.objectModel[reg5];
                      this.objectModel[reg2].key = reg2;
                      this.objectX[reg2] = this.objectX[reg5];
                      this.objectY[reg2] = this.objectY[reg5];
                      this.objectID[reg2] = this.objectID[reg5];
                      this.objectDirection[reg2] = this.objectDirection[reg5];
                    }

                    ++reg2;
                  }
                }

                this.objectCount = reg2;
              } else {
                reg2 = Utility.getUnsignedShort(pdata, reg1);
                reg1 += 2;
                reg3 = this.regionX + pdata[reg1++];
                reg4 = this.regionY + pdata[reg1++];
                reg5 = 0;

                for (reg6 = 0; reg6 < this.objectCount; ++reg6) {
                  if (this.objectX[reg6] == reg3 && this.objectY[reg6] == reg4) {
                    this.scene.freeModel(this.objectModel[reg6]);
                    this.world.removeObject(this.objectX[reg6], this.objectY[reg6], this.objectID[reg6]);
                  } else {
                    if (reg6 != reg5) {
                      this.objectModel[reg5] = this.objectModel[reg6];
                      this.objectModel[reg5].key = reg5;
                      this.objectX[reg5] = this.objectX[reg6];
                      this.objectY[reg5] = this.objectY[reg6];
                      this.objectID[reg5] = this.objectID[reg6];
                      this.objectDirection[reg5] = this.objectDirection[reg6];
                    }

                    ++reg5;
                  }
                }

                this.objectCount = reg5;
                if (reg2 != 60000) {
                  var27 = this.world.dn(reg3, reg4);
                  if (var27 != 0 && var27 != 4) {
                    var12 = GameData.gib[reg2];
                    var11 = GameData.hib[reg2];
                  } else {
                    var11 = GameData.gib[reg2];
                    var12 = GameData.hib[reg2];
                  }

                  var13 = (reg3 + reg3 + var11) * this.magicLoc / 2;
                  var14 = (reg4 + reg4 + var12) * this.magicLoc / 2;
                  var15 = GameData.fib[reg2];
                  GameModel var36 = this.gameModels[var15].copy();
                  this.scene.addModel(var36);
                  var36.key = this.objectCount;
                  var36.pe(0, var27 * 32, 0);
                  var36.translate(var13, -this.world.getElevation(var13, var14), var14);
                  var36.setLight(true, 48, 48, -50, -10, -50);
                  this.world.pn(reg3, reg4, reg2);
                  if (reg2 == 74) {
                    var36.translate(0, -480, 0);
                  }

                  this.objectX[this.objectCount] = reg3;
                  this.objectY[this.objectCount] = reg4;
                  this.objectID[this.objectCount] = reg2;
                  this.objectDirection[this.objectCount] = var27;
                  this.objectModel[this.objectCount++] = var36;
                }
              }
            }

            return;
          }
        }

        if (opcode == 252) {
          this.inventoryItemsCount = (psize - 1) / 4;

          for (reg1 = 0; reg1 < this.inventoryItemsCount; ++reg1) {
            this.inventoryItemID[reg1] = Utility.getUnsignedShort(pdata, reg1 * 4 + 1);
            if (this.inventoryItemID[reg1] >= 32768) {
              this.inventoryItemID[reg1] -= 32768;
              this.inventoryEquipped[reg1] = 1;
            } else {
              this.inventoryEquipped[reg1] = 0;
            }

            this.inventoryItemStackCount[reg1] = Utility.getUnsignedShort(pdata, reg1 * 4 + 3);
          }

          return;
        }

        if (opcode == 251) {
          reg1 = Utility.getUnsignedShort(pdata, 1);
          reg2 = 3;

          for (reg3 = 0; reg3 < reg1; ++reg3) {
            reg4 = Utility.getUnsignedShort(pdata, reg2);
            reg2 += 2;
            var23 = this.playersServer[reg4];
            if (var23 == null) {
              reg2 += 14;
              reg6 = Utility.getUnsignedByte(pdata[reg2]);
              reg2 += reg6 + 1;
            } else {
              var23.br = Utility.getUnsignedShort(pdata, reg2);
              reg2 += 2;
              var23.hash = Utility.hash2username(pdata, reg2);
              reg2 += 8;
              var23.name = Utility.hash2username(var23.hash);
              reg6 = Utility.getUnsignedByte(pdata[reg2]);
              ++reg2;

              for (var27 = 0; var27 < reg6; ++var27) {
                var23.mr[var27] = Utility.getUnsignedByte(pdata[reg2]);
                ++reg2;
              }

              for (var11 = reg6; var11 < 12; ++var11) {
                var23.mr[var11] = 0;
              }

              var23.xr = pdata[reg2++] & 255;
              var23.yr = pdata[reg2++] & 255;
              var23.colourBottom = pdata[reg2++] & 255;
              var23.as = pdata[reg2++] & 255;
              var23.attackable = pdata[reg2++] & 255;
              var23.level = pdata[reg2++] & 255;
              var23.hs = pdata[reg2++] & 255;
            }
          }

          return;
        }

        if (opcode == 250) {
          reg1 = Utility.getUnsignedShort(pdata, 1);
          reg2 = 3;

          for (reg3 = 0; reg3 < reg1; ++reg3) {
            reg4 = Utility.getUnsignedShort(pdata, reg2);
            reg2 += 2;
            var23 = this.playersServer[reg4];
            byte var35 = pdata[reg2];
            ++reg2;
            if (var35 == 0) {
              var27 = Utility.getUnsignedShort(pdata, reg2);
              reg2 += 2;
              if (var23 != null) {
                var23.bubbleTimeout = 150;
                var23.pr = var27;
              }
            } else if (var35 != 1) {
              if (var35 == 2) {
                var27 = Utility.getUnsignedByte(pdata[reg2]);
                ++reg2;
                var11 = Utility.getUnsignedByte(pdata[reg2]);
                ++reg2;
                var12 = Utility.getUnsignedByte(pdata[reg2]);
                ++reg2;
                if (var23 != null) {
                  var23.rr = var27;
                  var23.healthCurrent = var11;
                  var23.healthMax = var12;
                  var23.combatTimer = 200;
                  if (var23 == this.localPlayer) {
                    this.playerStatCurrent[3] = var11;
                    this.playerStatBase[3] = var12;
                  }
                }
              } else if (var35 == 3) {
                var27 = Utility.getUnsignedShort(pdata, reg2);
                reg2 += 2;
                var11 = Utility.getUnsignedShort(pdata, reg2);
                reg2 += 2;
                if (var23 != null) {
                  var23.incomingProjectileSprite = var27;
                  var23.attackingNpcServerIndex = var11;
                  var23.attackingPlayerServerIndex = -1;
                  var23.projectileRange = this.uz;
                }
              } else if (var35 == 4) {
                var27 = Utility.getUnsignedShort(pdata, reg2);
                reg2 += 2;
                var11 = Utility.getUnsignedShort(pdata, reg2);
                reg2 += 2;
                if (var23 != null) {
                  var23.incomingProjectileSprite = var27;
                  var23.attackingPlayerServerIndex = var11;
                  var23.attackingNpcServerIndex = -1;
                  var23.projectileRange = this.uz;
                }
              }
            } else {
              byte var38 = pdata[reg2];
              ++reg2;
              if (var23 != null) {
                String var37 = new String(pdata, reg2, var38);
                if (var37.startsWith("@que@")) {
                  var23.messageTimeout = 150;
                  var23.message = var37;
                  if (var23 == this.localPlayer) {
                    this.showMessage("@yel@" + var23.name + ": " + var23.message, 5);
                  }
                } else if (var23 != this.localPlayer) {
                  boolean var39 = false;

                  for (var13 = 0; var13 < super.ignoreListCount; ++var13) {
                    if (super.ignoreList[var13] == var23.hash) {
                      var39 = true;
                    }
                  }

                  if (!var39) {
                    var37 = Utility.filterString(var37, true);
                    var23.messageTimeout = 150;
                    var23.message = var37;
                    this.showMessage(var23.name + ": " + var23.message, 2);
                  }
                }
              }

              reg2 += var38;
            }
          }

          return;
        }

        if (opcode == 249) {
          reg1 = 1;

          while (true) {
            while (reg1 < psize) {
              if (Utility.getUnsignedByte(pdata[reg1]) == 255) {
                reg2 = 0;
                reg3 = this.regionX + pdata[reg1 + 1] >> 3;
                reg4 = this.regionY + pdata[reg1 + 2] >> 3;
                reg1 += 3;

                for (reg5 = 0; reg5 < this.wallObjectCount; ++reg5) {
                  reg6 = (this.wallObjectX[reg5] >> 3) - reg3;
                  var27 = (this.wallObjectY[reg5] >> 3) - reg4;
                  if (reg6 == 0 && var27 == 0) {
                    this.scene.freeModel(this.wallObjectModel[reg5]);
                    this.world.removeWallObject(this.wallObjectX[reg5], this.wallObjectY[reg5], this.wallObjectDirection[reg5], this.wallObjectID[reg5]);
                  } else {
                    if (reg5 != reg2) {
                      this.wallObjectModel[reg2] = this.wallObjectModel[reg5];
                      this.wallObjectModel[reg2].key = reg2 + 10000;
                      this.wallObjectX[reg2] = this.wallObjectX[reg5];
                      this.wallObjectY[reg2] = this.wallObjectY[reg5];
                      this.wallObjectDirection[reg2] = this.wallObjectDirection[reg5];
                      this.wallObjectID[reg2] = this.wallObjectID[reg5];
                    }

                    ++reg2;
                  }
                }

                this.wallObjectCount = reg2;
              } else {
                reg2 = Utility.getUnsignedShort(pdata, reg1);
                reg1 += 2;
                reg3 = this.regionX + pdata[reg1++];
                reg4 = this.regionY + pdata[reg1++];
                byte var29 = pdata[reg1++];
                reg6 = 0;

                for (var27 = 0; var27 < this.wallObjectCount; ++var27) {
                  if (this.wallObjectX[var27] == reg3 && this.wallObjectY[var27] == reg4 && this.wallObjectDirection[var27] == var29) {
                    this.scene.freeModel(this.wallObjectModel[var27]);
                    this.world.removeWallObject(this.wallObjectX[var27], this.wallObjectY[var27], this.wallObjectDirection[var27], this.wallObjectID[var27]);
                  } else {
                    if (var27 != reg6) {
                      this.wallObjectModel[reg6] = this.wallObjectModel[var27];
                      this.wallObjectModel[reg6].key = reg6 + 10000;
                      this.wallObjectX[reg6] = this.wallObjectX[var27];
                      this.wallObjectY[reg6] = this.wallObjectY[var27];
                      this.wallObjectDirection[reg6] = this.wallObjectDirection[var27];
                      this.wallObjectID[reg6] = this.wallObjectID[var27];
                    }

                    ++reg6;
                  }
                }

                this.wallObjectCount = reg6;
                if (reg2 != 65535) {
                  this.world.bo(reg3, reg4, var29, reg2);
                  GameModel var34 = this.createModel(reg3, reg4, var29, reg2, this.wallObjectCount);
                  this.wallObjectModel[this.wallObjectCount] = var34;
                  this.wallObjectX[this.wallObjectCount] = reg3;
                  this.wallObjectY[this.wallObjectCount] = reg4;
                  this.wallObjectID[this.wallObjectCount] = reg2;
                  this.wallObjectDirection[this.wallObjectCount++] = var29;
                }
              }
            }

            return;
          }
        }

        if (opcode == 248) {
          reg1 = (psize - 1) / 4;
          reg2 = 1;

          for (reg3 = 0; reg3 < reg1; ++reg3) {
            reg4 = Utility.getUnsignedShort(pdata, reg2);
            reg5 = Utility.getUnsignedByte(pdata[reg2 + 2]);
            reg6 = reg4 >> 6 & 1023;
            var27 = reg4 >> 1 & 31;
            if (var27 > 15) {
              var27 -= 32;
            }

            var11 = (reg4 << 4 & 16) + (reg5 >> 4 & 15);
            if (var11 > 15) {
              var11 -= 32;
            }

            var12 = reg5 & 15;
            var13 = (this.regionX + var27) * this.magicLoc + 64;
            var14 = (this.regionY + var11) * this.magicLoc + 64;
            var15 = Utility.getUnsignedByte(pdata[reg2 + 3]);
            reg2 += 4;
            if (var15 >= GameData.ogb) {
              var15 = 24;
            }

            if (this.npcsServer[reg6] == null) {
              this.npcsServer[reg6] = new Character();
              this.npcsServer[reg6].serverIndex = reg6;
            }

            Character var16 = this.npcsServer[reg6];
            boolean var17 = false;

            for (int var18 = 0; var18 < this.npcCount; ++var18) {
              if (this.npcs[var18] == var16) {
                var17 = true;
                break;
              }
            }

            if (!var17) {
              this.npcs[this.npcCount++] = this.npcsServer[reg6];
            }

            if (var17) {
              var16.npcID = var15;
              var16.animationNext = var12;
              int var19 = var16.waypointCurrent;
              if (var13 != var16.waypointsX[var19] || var14 != var16.waypointsY[var19]) {
                var16.waypointCurrent = var19 = (var19 + 1) % 10;
                var16.waypointsX[var19] = var13;
                var16.waypointsY[var19] = var14;
              }
            } else {
              var16.serverIndex = reg6;
              var16.movingStep = 0;
              var16.waypointCurrent = 0;
              var16.waypointsX[0] = var16.currentX = var13;
              var16.waypointsY[0] = var16.currentY = var14;
              var16.npcID = var15;
              var16.animationNext = var16.animationCurrent = var12;
              var16.stepCount = 0;
            }
          }

          return;
        }

        if (opcode == 247) {
          reg1 = Utility.getUnsignedShort(pdata, 1);
          reg2 = 3;

          for (reg3 = 0; reg3 < reg1; ++reg3) {
            reg4 = Utility.getUnsignedShort(pdata, reg2);
            reg2 += 2;
            var23 = this.npcsServer[reg4];
            reg6 = Utility.getUnsignedByte(pdata[reg2]);
            ++reg2;
            if (reg6 == 1) {
              var27 = Utility.getUnsignedShort(pdata, reg2);
              reg2 += 2;
              byte var30 = pdata[reg2];
              ++reg2;
              if (var23 != null) {
                String var33 = new String(pdata, reg2, var30);
                var23.messageTimeout = 150;
                var23.message = var33;
                if (var27 == this.localPlayer.serverIndex) {
                  this.showMessage("@yel@" + GameData.pgb[var23.npcID][0] + ": " + var23.message, 5);
                }
              }

              reg2 += var30;
            } else if (reg6 == 2) {
              var27 = Utility.getUnsignedByte(pdata[reg2]);
              ++reg2;
              var11 = Utility.getUnsignedByte(pdata[reg2]);
              ++reg2;
              var12 = Utility.getUnsignedByte(pdata[reg2]);
              ++reg2;
              if (var23 != null) {
                var23.rr = var27;
                var23.healthCurrent = var11;
                var23.healthMax = var12;
                var23.combatTimer = 200;
              }
            }
          }

          return;
        }

        if (opcode == 246) {
          this.showOptionsMenu = true;
          reg1 = Utility.getUnsignedByte(pdata[1]);
          this.optionMenuCount = reg1;
          reg2 = 2;

          for (reg3 = 0; reg3 < reg1; ++reg3) {
            reg4 = Utility.getUnsignedByte(pdata[reg2]);
            ++reg2;
            this.optionMenuEntry[reg3] = new String(pdata, reg2, reg4);
            reg2 += reg4;
          }

          return;
        }

        if (opcode == 245) {
          this.showOptionsMenu = false;
          return;
        }

        if (opcode == 244) {
          this.planeWidth = Utility.getUnsignedShort(pdata, 1);
          this.planeHeight = Utility.getUnsignedShort(pdata, 3);
          this.planeIndex = Utility.getUnsignedShort(pdata, 5);
          this.tu = Utility.getUnsignedShort(pdata, 7);
          this.planeHeight -= this.planeIndex * this.tu;
          return;
        }

        if (opcode == 243) {
          reg1 = 1;

          for (reg2 = 0; reg2 < 19; ++reg2) {
            this.playerStatCurrent[reg2] = Utility.getUnsignedByte(pdata[reg1++]);
          }

          for (reg3 = 0; reg3 < 19; ++reg3) {
            this.playerStatBase[reg3] = Utility.getUnsignedByte(pdata[reg1++]);
          }

          return;
        }

        if (opcode == 242) {
          for (reg1 = 0; reg1 < 6; ++reg1) {
            this.playerStatEquipment[reg1] = Utility.getUnsignedByte(pdata[1 + reg1]);
          }

          return;
        }

        if (opcode == 241) {
          this.deathScreenTimeout = 250;
          this.uy += 10;
          return;
        }

        if (opcode == 240) {
          reg1 = (psize - 1) / 4;

          for (reg2 = 0; reg2 < reg1; ++reg2) {
            reg3 = this.regionX + Utility.getSignedShort(pdata, 1 + reg2 * 4) >> 3;
            reg4 = this.regionY + Utility.getSignedShort(pdata, 3 + reg2 * 4) >> 3;
            reg5 = 0;

            for (reg6 = 0; reg6 < this.groundItemCount; ++reg6) {
              var27 = (this.groundItemX[reg6] >> 3) - reg3;
              var11 = (this.groundItemY[reg6] >> 3) - reg4;
              if (var27 != 0 || var11 != 0) {
                if (reg6 != reg5) {
                  this.groundItemX[reg5] = this.groundItemX[reg6];
                  this.groundItemY[reg5] = this.groundItemY[reg6];
                  this.groundItemID[reg5] = this.groundItemID[reg6];
                  this.groundItemZ[reg5] = this.groundItemZ[reg6];
                }

                ++reg5;
              }
            }

            this.groundItemCount = reg5;
            reg5 = 0;

            for (var27 = 0; var27 < this.objectCount; ++var27) {
              var11 = (this.objectX[var27] >> 3) - reg3;
              var12 = (this.objectY[var27] >> 3) - reg4;
              if (var11 == 0 && var12 == 0) {
                this.scene.freeModel(this.objectModel[var27]);
                this.world.removeObject(this.objectX[var27], this.objectY[var27], this.objectID[var27]);
              } else {
                if (var27 != reg5) {
                  this.objectModel[reg5] = this.objectModel[var27];
                  this.objectModel[reg5].key = reg5;
                  this.objectX[reg5] = this.objectX[var27];
                  this.objectY[reg5] = this.objectY[var27];
                  this.objectID[reg5] = this.objectID[var27];
                  this.objectDirection[reg5] = this.objectDirection[var27];
                }

                ++reg5;
              }
            }

            this.objectCount = reg5;
            reg5 = 0;

            for (var11 = 0; var11 < this.wallObjectCount; ++var11) {
              var12 = (this.wallObjectX[var11] >> 3) - reg3;
              var13 = (this.wallObjectY[var11] >> 3) - reg4;
              if (var12 == 0 && var13 == 0) {
                this.scene.freeModel(this.wallObjectModel[var11]);
                this.world.removeWallObject(this.wallObjectX[var11], this.wallObjectY[var11], this.wallObjectDirection[var11], this.wallObjectID[var11]);
              } else {
                if (var11 != reg5) {
                  this.wallObjectModel[reg5] = this.wallObjectModel[var11];
                  this.wallObjectModel[reg5].key = reg5 + 10000;
                  this.wallObjectX[reg5] = this.wallObjectX[var11];
                  this.wallObjectY[reg5] = this.wallObjectY[var11];
                  this.wallObjectDirection[reg5] = this.wallObjectDirection[var11];
                  this.wallObjectID[reg5] = this.wallObjectID[var11];
                }

                ++reg5;
              }
            }

            this.wallObjectCount = reg5;
          }

          return;
        }

        if (opcode == 239) {
          this.showAppearanceChange = true;
          return;
        }

        if (opcode == 238) {
          reg1 = Utility.getUnsignedShort(pdata, 1);
          if (this.playersServer[reg1] != null) {
            this.tradeRecipientName = this.playersServer[reg1].name;
          }

          this.showDialogTrade = true;
          this.tradeRecipientAccepted = false;
          this.tradeAccepted = false;
          this.tradeItemsCount = 0;
          this.tradeItemCount = 0;
          return;
        }

        if (opcode == 237) {
          this.showDialogTrade = false;
          return;
        }

        if (opcode == 236) {
          this.tradeItemCount = pdata[1] & 255;
          reg1 = 2;

          for (reg2 = 0; reg2 < this.tradeItemCount; ++reg2) {
            this.tradeRecipientItems[reg2] = Utility.getUnsignedShort(pdata, reg1);
            reg1 += 2;
            this.tradeRecipientCount[reg2] = Utility.getUnsignedShort(pdata, reg1);
            reg1 += 2;
          }

          this.tradeRecipientAccepted = false;
          this.tradeAccepted = false;
          return;
        }

        byte var25;
        if (opcode == 235) {
          var25 = pdata[1];
          if (var25 == 1) {
            this.tradeRecipientAccepted = true;
            return;
          }

          this.tradeRecipientAccepted = false;
          return;
        }

        if (opcode == 234) {
          this.gy = true;
          byte var22 = 1;
          reg1 = var22 + 1;
          reg2 = pdata[var22] & 255;
          byte var24 = pdata[reg1++];
          this.shopSellPriceMod = pdata[reg1++] & 255;
          this.shopBuyPriceMod = pdata[reg1++] & 255;

          for (reg4 = 0; reg4 < 40; ++reg4) {
            this.shopItem[reg4] = -1;
          }

          for (reg5 = 0; reg5 < reg2; ++reg5) {
            this.shopItem[reg5] = Utility.getUnsignedShort(pdata, reg1);
            reg1 += 2;
            this.shopCount[reg5] = Utility.getUnsignedShort(pdata, reg1);
            reg1 += 2;
            this.shopItemPrice[reg5] = pdata[reg1++];
          }

          if (var24 == 1) {
            reg6 = 39;

            for (var27 = 0; var27 < this.inventoryItemsCount && reg6 >= reg2; ++var27) {
              boolean var26 = false;

              for (var12 = 0; var12 < 40; ++var12) {
                if (this.shopItem[var12] == this.inventoryItemID[var27]) {
                  var26 = true;
                  break;
                }
              }

              if (this.inventoryItemID[var27] == 10) {
                var26 = true;
              }

              if (!var26) {
                this.shopItem[reg6] = this.inventoryItemID[var27] & 32767;
                this.shopCount[reg6] = 0;
                this.shopItemPrice[reg6] = 0;
                --reg6;
              }
            }
          }

          if (this.shopSelectedItemIndex >= 0 && this.shopSelectedItemIndex < 40 && this.shopItem[this.shopSelectedItemIndex] != this.shopSelectedIemType) {
            this.shopSelectedItemIndex = -1;
            this.shopSelectedIemType = -2;
            return;
          }
        } else {
          if (opcode == 233) {
            this.gy = false;
            return;
          }

          if (opcode == 229) {
            var25 = pdata[1];
            if (var25 == 1) {
              this.tradeAccepted = true;
              return;
            }

            this.tradeAccepted = false;
            return;
          }

          if (opcode != 228) {
            return;
          }

          System.out.println("Got config");
          this.optionPlayerKiller = Utility.getUnsignedByte(pdata[1]) == 1;
          this.optionCameraModeAuto = Utility.getUnsignedByte(pdata[2]) == 1;
          this.et = Utility.getUnsignedByte(pdata[3]);
          this.optionMouseButtonOne = Utility.getUnsignedByte(pdata[4]) == 1;
        }
      }

      return;
    } catch (RuntimeException var20) {
      if (this.mt < 3) {
        super.clientStream.newPacket(17);
        super.clientStream.writeString(var20.toString());
        this.finalizePacket();
        super.clientStream.newPacket(17);
        super.clientStream.writeString("ptype:" + opcode + " psize:" + psize);
        this.finalizePacket();
        super.clientStream.newPacket(17);
        super.clientStream.writeString("rx:" + this.regionX + " ry:" + this.regionY + " num3l:" + this.objectCount);
        this.finalizePacket();
        String var5 = "";

        for (reg3 = 0; reg3 < 80 && reg3 < psize; ++reg3) {
          var5 = var5 + pdata[reg3] + " ";
        }

        super.clientStream.newPacket(17);
        super.clientStream.writeString(var5);
        this.finalizePacket();
        ++this.mt;
      }
    }

  }

  public boolean isValidCameraAngle(int var1) {
    int var2 = this.localPlayer.currentX / 128;
    int var3 = this.localPlayer.currentY / 128;

    for (int var4 = 2; var4 >= 1; --var4) {
      if (var1 == 1 && ((this.world.objectAdjacency[var2][var3 - var4] & 128) == 128 || (this.world.objectAdjacency[var2 - var4][var3] & 128) == 128 || (this.world.objectAdjacency[var2 - var4][var3 - var4] & 128) == 128)) {
        return false;
      }

      if (var1 == 3 && ((this.world.objectAdjacency[var2][var3 + var4] & 128) == 128 || (this.world.objectAdjacency[var2 - var4][var3] & 128) == 128 || (this.world.objectAdjacency[var2 - var4][var3 + var4] & 128) == 128)) {
        return false;
      }

      if (var1 == 5 && ((this.world.objectAdjacency[var2][var3 + var4] & 128) == 128 || (this.world.objectAdjacency[var2 + var4][var3] & 128) == 128 || (this.world.objectAdjacency[var2 + var4][var3 + var4] & 128) == 128)) {
        return false;
      }

      if (var1 == 7 && ((this.world.objectAdjacency[var2][var3 - var4] & 128) == 128 || (this.world.objectAdjacency[var2 + var4][var3] & 128) == 128 || (this.world.objectAdjacency[var2 + var4][var3 - var4] & 128) == 128)) {
        return false;
      }

      if (var1 == 0 && (this.world.objectAdjacency[var2][var3 - var4] & 128) == 128) {
        return false;
      }

      if (var1 == 2 && (this.world.objectAdjacency[var2 - var4][var3] & 128) == 128) {
        return false;
      }

      if (var1 == 4 && (this.world.objectAdjacency[var2][var3 + var4] & 128) == 128) {
        return false;
      }

      if (var1 == 6 && (this.world.objectAdjacency[var2 + var4][var3] & 128) == 128) {
        return false;
      }
    }

    return true;
  }

  public void autorotateCamera() {
    if ((this.cameraAngle & 1) != 1 || !this.isValidCameraAngle(this.cameraAngle)) {
      if ((this.cameraAngle & 1) == 0 && this.isValidCameraAngle(this.cameraAngle)) {
        if (this.isValidCameraAngle(this.cameraAngle + 1 & 7)) {
          this.cameraAngle = this.cameraAngle + 1 & 7;
        } else {
          if (this.isValidCameraAngle(this.cameraAngle + 7 & 7)) {
            this.cameraAngle = this.cameraAngle + 7 & 7;
          }

        }
      } else {
        int[] var1 = new int[] {1, -1, 2, -2, 3, -3, 4};

        for (int var2 = 0; var2 < 7; ++var2) {
          if (this.isValidCameraAngle(this.cameraAngle + var1[var2] + 8 & 7)) {
            this.cameraAngle = this.cameraAngle + var1[var2] + 8 & 7;
            break;
          }
        }

        if ((this.cameraAngle & 1) == 0 && this.isValidCameraAngle(this.cameraAngle)) {
          if (this.isValidCameraAngle(this.cameraAngle + 1 & 7)) {
            this.cameraAngle = this.cameraAngle + 1 & 7;
          } else {
            if (this.isValidCameraAngle(this.cameraAngle + 7 & 7)) {
              this.cameraAngle = this.cameraAngle + 7 & 7;
            }

          }
        }
      }
    }
  }

  public void drawGame() {
    if (this.deathScreenTimeout != 0) {
      this.surface.fade2black();
      this.surface.drawStringCenter("Oh dear! You are dead...", this.gameWidth / 2, this.gameHeight / 2, 7, 16711680);
      this.drawChatMessageTabs();
      this.surface.draw(this.graphics, 0, 11);
    } else if (this.world.playerAlive) {
      if (this.showAppearanceChange) {
        this.drawAppearancePanelCharacterSprites();
      } else {
        for (int var1 = 0; var1 < 64; ++var1) {
          this.scene.freeModel(this.world.zeb[this.lastPlaneIndex][var1]);
          if (this.lastPlaneIndex == 0) {
            this.scene.freeModel(this.world.yeb[1][var1]);
            this.scene.freeModel(this.world.zeb[1][var1]);
            this.scene.freeModel(this.world.yeb[2][var1]);
            this.scene.freeModel(this.world.zeb[2][var1]);
          }

          this.fogOfWar = true;
          if (this.lastPlaneIndex == 0 && (this.world.objectAdjacency[this.localPlayer.currentX / 128][this.localPlayer.currentY / 128] & 128) == 0) {
            this.scene.addModel(this.world.zeb[this.lastPlaneIndex][var1]);
            if (this.lastPlaneIndex == 0) {
              this.scene.addModel(this.world.yeb[1][var1]);
              this.scene.addModel(this.world.zeb[1][var1]);
              this.scene.addModel(this.world.yeb[2][var1]);
              this.scene.addModel(this.world.zeb[2][var1]);
            }

            this.fogOfWar = false;
          }
        }

        int var2;
        int var3;
        int var4;
        int var5;
        int var6;
        byte var7;
        String var8;
        int var9;
        GameModel var10;
        if (this.objectAnimationNumberTorch != this.lastObjectAnimationNumberTorch) {
          this.lastObjectAnimationNumberTorch = this.objectAnimationNumberTorch;

          for (var2 = 0; var2 < this.objectCount; ++var2) {
            if (this.objectID[var2] == 51) {
              var3 = this.objectX[var2];
              var4 = this.objectY[var2];
              var5 = var3 - this.localPlayer.currentX / 128;
              var6 = var4 - this.localPlayer.currentY / 128;
              var7 = 7;
              if (var3 >= 0 && var4 >= 0 && var3 < 96 && var4 < 96 && var5 > -var7 && var5 < var7 && var6 > -var7 && var6 < var7) {
                this.scene.freeModel(this.objectModel[var2]);
                var8 = "torcha" + (this.objectAnimationNumberTorch + 1);
                var9 = GameData.getModelID(var8);
                var10 = this.gameModels[var9].copy();
                this.scene.addModel(var10);
                var10.setLight(true, 48, 48, -50, -10, -50);
                var10.copyPosition(this.objectModel[var2]);
                var10.key = var2;
                this.objectModel[var2] = var10;
              }
            }

            if (this.objectID[var2] == 143) {
              var3 = this.objectX[var2];
              var4 = this.objectY[var2];
              var5 = var3 - this.localPlayer.currentX / 128;
              var6 = var4 - this.localPlayer.currentY / 128;
              var7 = 7;
              if (var3 >= 0 && var4 >= 0 && var3 < 96 && var4 < 96 && var5 > -var7 && var5 < var7 && var6 > -var7 && var6 < var7) {
                this.scene.freeModel(this.objectModel[var2]);
                var8 = "skulltorcha" + (this.objectAnimationNumberTorch + 1);
                var9 = GameData.getModelID(var8);
                var10 = this.gameModels[var9].copy();
                this.scene.addModel(var10);
                var10.setLight(true, 48, 48, -50, -10, -50);
                var10.copyPosition(this.objectModel[var2]);
                var10.key = var2;
                this.objectModel[var2] = var10;
              }
            }
          }
        }

        if (this.objectAnimationNumberFire != this.lastObjectAnimationNumberFire) {
          this.lastObjectAnimationNumberFire = this.objectAnimationNumberFire;

          for (var2 = 0; var2 < this.objectCount; ++var2) {
            if (this.objectID[var2] == 97) {
              var3 = this.objectX[var2];
              var4 = this.objectY[var2];
              var5 = var3 - this.localPlayer.currentX / 128;
              var6 = var4 - this.localPlayer.currentY / 128;
              var7 = 9;
              if (var3 >= 0 && var4 >= 0 && var3 < 96 && var4 < 96 && var5 > -var7 && var5 < var7 && var6 > -var7 && var6 < var7) {
                this.scene.freeModel(this.objectModel[var2]);
                var8 = "firea" + (this.objectAnimationNumberFire + 1);
                var9 = GameData.getModelID(var8);
                var10 = this.gameModels[var9].copy();
                this.scene.addModel(var10);
                var10.setLight(true, 48, 48, -50, -10, -50);
                var10.copyPosition(this.objectModel[var2]);
                var10.key = var2;
                this.objectModel[var2] = var10;
              }
            }
          }
        }

        this.scene.reduceSprites(this.spriteCount);
        this.spriteCount = 0;

        int var18;
        for (var2 = 0; var2 < this.playerCount; ++var2) {
          Character var15 = this.players[var2];
          if (var15.colourBottom != 255) {
            var4 = var15.currentX;
            var5 = var15.currentY;
            var6 = -this.world.getElevation(var4, var5);
            var18 = this.scene.drawSprite(5000 + var2, var4, var6, var5, 145, 220, var2 + 10000);
            ++this.spriteCount;
            if (var15 == this.localPlayer) {
              this.scene.setFaceSpriteLocalPlayer(var18);
            }

            if (var15.animationCurrent == 8) {
              this.scene.setCombatXOffset(var18, -30);
            }

            if (var15.animationCurrent == 9) {
              this.scene.setCombatXOffset(var18, 30);
            }
          }
        }

        Character var17;
        int var19;
        for (var3 = 0; var3 < this.playerCount; ++var3) {
          Character var16 = this.players[var3];
          if (var16.projectileRange > 0) {
            var17 = null;
            if (var16.attackingNpcServerIndex != -1) {
              var17 = this.npcsServer[var16.attackingNpcServerIndex];
            } else if (var16.attackingPlayerServerIndex != -1) {
              var17 = this.playersServer[var16.attackingPlayerServerIndex];
            }

            if (var17 != null) {
              var6 = var16.currentX;
              var18 = var16.currentY;
              var19 = -this.world.getElevation(var6, var18) - 110;
              var9 = var17.currentX;
              int var21 = var17.currentY;
              int var11 = -this.world.getElevation(var9, var21) - GameData.mhb[var17.npcID] / 2;
              int var12 = (var6 * var16.projectileRange + var9 * (this.uz - var16.projectileRange)) / this.uz;
              int var13 = (var19 * var16.projectileRange + var11 * (this.uz - var16.projectileRange)) / this.uz;
              int var14 = (var18 * var16.projectileRange + var21 * (this.uz - var16.projectileRange)) / this.uz;
              this.scene.drawSprite(this.vz + var16.incomingProjectileSprite, var12, var13, var14, 32, 32, 0);
              ++this.spriteCount;
            }
          }
        }

        for (var4 = 0; var4 < this.npcCount; ++var4) {
          var17 = this.npcs[var4];
          var6 = var17.currentX;
          var18 = var17.currentY;
          var19 = -this.world.getElevation(var6, var18);
          var9 = this.scene.drawSprite(20000 + var4, var6, var19, var18, GameData.lhb[var17.npcID], GameData.mhb[var17.npcID], var4 + 30000);
          ++this.spriteCount;
          if (var17.animationCurrent == 8) {
            this.scene.setCombatXOffset(var9, -30);
          }

          if (var17.animationCurrent == 9) {
            this.scene.setCombatXOffset(var9, 30);
          }
        }

        for (var5 = 0; var5 < this.groundItemCount; ++var5) {
          var6 = this.groundItemX[var5] * this.magicLoc + 64;
          var18 = this.groundItemY[var5] * this.magicLoc + 64;
          this.scene.drawSprite('\u9c40' + this.groundItemID[var5], var6, -this.world.getElevation(var6, var18) - this.groundItemZ[var5], var18, 96, 64, var5 + 20000);
          ++this.spriteCount;
        }

        this.surface.interlace = false;
        this.surface.blackScreen();
        this.surface.interlace = super.interlace;
        if (this.lastPlaneIndex == 3) {
          var6 = 40 + (int)(Math.random() * 3.0D);
          var18 = 40 + (int)(Math.random() * 7.0D);
          this.scene.th(true, var6, var18, -50, -10, -50);
        }

        this.itemsAboveHeadCount = 0;
        this.receivedMessagesCount = 0;
        this.healthBarCount = 0;
        if (this.cameraAutoAngleDebug) {
          if (this.optionCameraModeAuto && !this.fogOfWar) {
            var6 = this.cameraAngle;
            this.autorotateCamera();
            if (this.cameraAngle != var6) {
              this.cameraAutoRotatePlayerX = this.localPlayer.currentX;
              this.cameraAutoRotatePlayerY = this.localPlayer.currentY;
            }
          }

          this.scene.clipFar3D = 3000;
          this.scene.clipFar2D = 3000;
          this.scene.fogZFalloff = 1;
          this.scene.fogZDistance = 2800;
          this.cameraRotation = this.cameraAngle * 32;
          this.scene.setCamera(this.cameraAutoRotatePlayerX, -this.world.getElevation(this.cameraAutoRotatePlayerX, this.cameraAutoRotatePlayerY), this.cameraAutoRotatePlayerY, 912, this.cameraRotation * 4, 0, 2000);
        } else {
          if (this.optionCameraModeAuto && !this.fogOfWar) {
            this.autorotateCamera();
          }

          if (!super.interlace) {
            this.scene.clipFar3D = 2400;
            this.scene.clipFar2D = 2400;
            this.scene.fogZFalloff = 1;
            this.scene.fogZDistance = 2300;
          } else {
            this.scene.clipFar3D = 2200;
            this.scene.clipFar2D = 2200;
            this.scene.fogZFalloff = 1;
            this.scene.fogZDistance = 2100;
          }

          this.scene.setCamera(this.cameraAutoRotatePlayerX, -this.world.getElevation(this.cameraAutoRotatePlayerX, this.cameraAutoRotatePlayerY), this.cameraAutoRotatePlayerY, 912, this.cameraRotation * 4, 0, this.cameraZoom * 2);
        }

        this.scene.endScene();
        this.drawAboveHeadStuff();
        if (this.mouseClickXStep > 0) {
          this.surface.drawSprite(this.mouseClickXX - 8, this.mouseClickXY - 8, this.spriteMedia + 14 + (24 - this.mouseClickXStep) / 6);
        }

        if (this.mouseClickXStep < 0) {
          this.surface.drawSprite(this.mouseClickXX - 8, this.mouseClickXY - 8, this.spriteMedia + 18 + (24 + this.mouseClickXStep) / 6);
        }

        this.surface.drawString("Fps: " + super.xq, 450, this.gameHeight - 10, 1, 16776960);
        if (this.messageTabsSelected == 0) {
          for (var6 = 0; var6 < this.qz; ++var6) {
            if (this.messageHistoryTimeout[var6] > 0) {
              String var20 = this.messageHistory[var6];
              this.surface.drawString(var20, 7, this.gameHeight - 18 - var6 * 12, 1, 16776960);
            }
          }
        }

        this.panelMessageTabs.nd(this.controlTextListChat);
        this.panelMessageTabs.nd(this.nz);
        this.panelMessageTabs.nd(this.oz);
        if (this.messageTabsSelected == 1) {
          this.panelMessageTabs.bd(this.controlTextListChat);
        } else if (this.messageTabsSelected == 2) {
          this.panelMessageTabs.bd(this.nz);
        } else if (this.messageTabsSelected == 3) {
          this.panelMessageTabs.bd(this.oz);
        }

        Panel.textListEntryHeightMod = 2;
        this.panelMessageTabs.drawPanel();
        Panel.textListEntryHeightMod = 0;
        this.surface.vf(this.surface.width2 - 3 - 197, 3, this.spriteMedia);
        this.drawUi();
        this.surface.loggedIn = false;
        this.drawChatMessageTabs();
        this.surface.draw(this.graphics, 0, 11);
      }
    }
  }

  public void drawChatMessageTabs() {
    this.surface.drawSprite(0, this.gameHeight - 4, this.spriteMedia + 23);
    int var1 = Surface.rgb2long(200, 200, 255);
    if (this.messageTabsSelected == 0) {
      var1 = Surface.rgb2long(255, 200, 50);
    }

    if (this.messageTabFlashAll % 30 > 15) {
      var1 = Surface.rgb2long(255, 50, 50);
    }

    this.surface.drawStringCenter("All messages", 54, this.gameHeight + 6, 0, var1);
    var1 = Surface.rgb2long(200, 200, 255);
    if (this.messageTabsSelected == 1) {
      var1 = Surface.rgb2long(255, 200, 50);
    }

    if (this.messageTabFlashHistory % 30 > 15) {
      var1 = Surface.rgb2long(255, 50, 50);
    }

    this.surface.drawStringCenter("Chat history", 155, this.gameHeight + 6, 0, var1);
    var1 = Surface.rgb2long(200, 200, 255);
    if (this.messageTabsSelected == 2) {
      var1 = Surface.rgb2long(255, 200, 50);
    }

    if (this.messageTabFlashQuest % 30 > 15) {
      var1 = Surface.rgb2long(255, 50, 50);
    }

    this.surface.drawStringCenter("Quest history", 255, this.gameHeight + 6, 0, var1);
    var1 = Surface.rgb2long(200, 200, 255);
    if (this.messageTabsSelected == 3) {
      var1 = Surface.rgb2long(255, 200, 50);
    }

    if (this.messageTabFlashPrivate % 30 > 15) {
      var1 = Surface.rgb2long(255, 50, 50);
    }

    this.surface.drawStringCenter("Private history", 355, this.gameHeight + 6, 0, var1);
  }

  public void drawItem(int var1, int var2, int var3, int var4, int var5, int var6, int var7) {
    int var8 = GameData.zfb[var5] + this.nw;
    int var9 = GameData.lgb[var5];
    this.surface.spriteClipping(var1, var2, var3, var4, var8, var9, 0, 0, false);
  }

  public void drawNPC(int var1, int var2, int var3, int var4, int var5, int var6, int var7) {
    Character var8 = this.npcs[var5];
    int var9 = var8.animationCurrent + (this.cameraRotation + 16) / 32 & 7;
    boolean var10 = false;
    int var11 = var9;
    if (var9 == 5) {
      var11 = 3;
      var10 = true;
    } else if (var9 == 6) {
      var11 = 2;
      var10 = true;
    } else if (var9 == 7) {
      var11 = 1;
      var10 = true;
    }

    int var12 = var11 * 3 + this.npcWalkModel[var8.stepCount / GameData.nhb[var8.npcID] % 4];
    boolean var23;
    if (var8.animationCurrent == 8) {
      var11 = 5;
      var23 = true;
      var10 = false;
      var1 -= GameData.phb[var8.npcID] * var7 / 100;
      var12 = var11 * 3 + this.npcCombatModelArray1[this.loginTimer / (GameData.ohb[var8.npcID] - 1) % 8];
    } else if (var8.animationCurrent == 9) {
      var11 = 5;
      var23 = true;
      var10 = true;
      var1 += GameData.phb[var8.npcID] * var7 / 100;
      var12 = var11 * 3 + this.npcCombatModelArray2[this.loginTimer / GameData.ohb[var8.npcID] % 8];
    }

    int var14;
    int var15;
    for (int var13 = 0; var13 < 12; ++var13) {
      var14 = this.npcAnimationArray[var11][var13];
      var15 = GameData.ghb[var8.npcID][var14];
      if (var15 >= 0) {
        byte var16 = 0;
        byte var17 = 0;
        int var18 = var12;
        if (var10 && var11 >= 1 && var11 <= 3 && GameData.yhb[var15] == 1) {
          var18 = var12 + 15;
        }

        if (var11 != 5 || GameData.xhb[var15] == 1) {
          int var19 = var18 + GameData.zhb[var15];
          int var24 = var16 * var3 / this.surface.spriteWidthFull[var19];
          int var25 = var17 * var4 / this.surface.spriteHeightFull[var19];
          int var20 = var3 * this.surface.spriteWidthFull[var19] / this.surface.spriteWidthFull[GameData.zhb[var15]];
          var24 -= (var20 - var3) / 2;
          int var21 = GameData.vhb[var15];
          int var22 = 0;
          if (var21 == 1) {
            var21 = GameData.hhb[var8.npcID];
            var22 = GameData.khb[var8.npcID];
          } else if (var21 == 2) {
            var21 = GameData.ihb[var8.npcID];
            var22 = GameData.khb[var8.npcID];
          } else if (var21 == 3) {
            var21 = GameData.jhb[var8.npcID];
            var22 = GameData.khb[var8.npcID];
          }

          this.surface.spriteClipping(var1 + var24, var2 + var25, var20, var4, var19, var21, var22, var6, var10);
        }
      }
    }

    if (var8.messageTimeout > 0) {
      this.receivedMessageMidPoint[this.receivedMessagesCount] = this.surface.textWidth(var8.message, 1) / 2;
      this.receivedMessageHeight[this.receivedMessagesCount] = this.surface.textHeight(1);
      if (this.receivedMessageMidPoint[this.receivedMessagesCount] > 300) {
        this.receivedMessageMidPoint[this.receivedMessagesCount] = 300;
        this.receivedMessageHeight[this.receivedMessagesCount] *= 2;
      }

      this.receivedMessageX[this.receivedMessagesCount] = var1 + var3 / 2;
      this.receivedMessageY[this.receivedMessagesCount] = var2;
      this.receivedMessages[this.receivedMessagesCount++] = var8.message;
    }

    if (var8.animationCurrent == 8 || var8.animationCurrent == 9 || var8.combatTimer != 0) {
      if (var8.combatTimer > 0) {
        var14 = var1;
        if (var8.animationCurrent == 8) {
          var14 = var1 - 20 * var7 / 100;
        } else if (var8.animationCurrent == 9) {
          var14 = var1 + 20 * var7 / 100;
        }

        var15 = var8.healthCurrent * 30 / var8.healthMax;
        this.healthBarX[this.healthBarCount] = var14 + var3 / 2;
        this.healthBarY[this.healthBarCount] = var2;
        this.healthBarMissing[this.healthBarCount++] = var15;
      }

      if (var8.combatTimer > 150) {
        var14 = var1;
        if (var8.animationCurrent == 8) {
          var14 = var1 - 10 * var7 / 100;
        } else if (var8.animationCurrent == 9) {
          var14 = var1 + 10 * var7 / 100;
        }

        this.surface._if(var14 + var3 / 2, var2 + var4 / 2, this.spriteMedia + 12);
        this.surface.drawStringCenter(String.valueOf(var8.rr), var14 + var3 / 2 - 1, var2 + var4 / 2 + 5, 3, 16777215);
      }
    }

  }

  public void drawPlayer(int var1, int var2, int var3, int var4, int var5, int var6, int var7) {
    Character var8 = this.players[var5];
    if (var8.colourBottom != 255) {
      int var9 = var8.animationCurrent + (this.cameraRotation + 16) / 32 & 7;
      boolean var10 = false;
      int var11 = var9;
      if (var9 == 5) {
        var11 = 3;
        var10 = true;
      } else if (var9 == 6) {
        var11 = 2;
        var10 = true;
      } else if (var9 == 7) {
        var11 = 1;
        var10 = true;
      }

      int var12 = var11 * 3 + this.npcWalkModel[var8.stepCount / 6 % 4];
      if (var8.animationCurrent == 8) {
        var11 = 5;
        var9 = 2;
        var10 = false;
        var1 -= 5 * var7 / 100;
        var12 = var11 * 3 + this.npcCombatModelArray1[this.loginTimer / 5 % 8];
      } else if (var8.animationCurrent == 9) {
        var11 = 5;
        var9 = 2;
        var10 = true;
        var1 += 5 * var7 / 100;
        var12 = var11 * 3 + this.npcCombatModelArray2[this.loginTimer / 6 % 8];
      }

      int var14;
      int var15;
      int var23;
      for (int var13 = 0; var13 < 12; ++var13) {
        var14 = this.npcAnimationArray[var9][var13];
        var15 = var8.mr[var14] - 1;
        if (var15 >= 0) {
          byte var16 = 0;
          byte var17 = 0;
          int var18 = var12;
          if (var10 && var11 >= 1 && var11 <= 3) {
            if (GameData.yhb[var15] == 1) {
              var18 = var12 + 15;
            } else if (var14 == 4 && var11 == 1) {
              var16 = -22;
              var17 = -3;
              var18 = var11 * 3 + this.npcWalkModel[(2 + var8.stepCount / 6) % 4];
            } else if (var14 == 4 && var11 == 2) {
              var16 = 0;
              var17 = -8;
              var18 = var11 * 3 + this.npcWalkModel[(2 + var8.stepCount / 6) % 4];
            } else if (var14 == 4 && var11 == 3) {
              var16 = 26;
              var17 = -5;
              var18 = var11 * 3 + this.npcWalkModel[(2 + var8.stepCount / 6) % 4];
            } else if (var14 == 3 && var11 == 1) {
              var16 = 22;
              var17 = 3;
              var18 = var11 * 3 + this.npcWalkModel[(2 + var8.stepCount / 6) % 4];
            } else if (var14 == 3 && var11 == 2) {
              var16 = 0;
              var17 = 8;
              var18 = var11 * 3 + this.npcWalkModel[(2 + var8.stepCount / 6) % 4];
            } else if (var14 == 3 && var11 == 3) {
              var16 = -26;
              var17 = 5;
              var18 = var11 * 3 + this.npcWalkModel[(2 + var8.stepCount / 6) % 4];
            }
          }

          if (var11 != 5 || GameData.xhb[var15] == 1) {
            int var19 = var18 + GameData.zhb[var15];
            var23 = var16 * var3 / this.surface.spriteWidthFull[var19];
            int var24 = var17 * var4 / this.surface.spriteHeightFull[var19];
            int var20 = var3 * this.surface.spriteWidthFull[var19] / this.surface.spriteWidthFull[GameData.zhb[var15]];
            var23 -= (var20 - var3) / 2;
            int var21 = GameData.vhb[var15];
            int var22 = 0;
            if (var21 == 1) {
              var21 = this.characterHairColors[var8.xr];
              var22 = this.characterSkinColours[var8.as];
            } else if (var21 == 2) {
              var21 = this.characterTopBottomColours[var8.yr];
              var22 = this.characterSkinColours[var8.as];
            } else if (var21 == 3) {
              var21 = this.characterTopBottomColours[var8.colourBottom];
              var22 = this.characterSkinColours[var8.as];
            }

            this.surface.spriteClipping(var1 + var23, var2 + var24, var20, var4, var19, var21, var22, var6, var10);
          }
        }
      }

      if (var8.messageTimeout > 0) {
        this.receivedMessageMidPoint[this.receivedMessagesCount] = this.surface.textWidth(var8.message, 1) / 2;
        this.receivedMessageHeight[this.receivedMessagesCount] = this.surface.textHeight(1);
        if (this.receivedMessageMidPoint[this.receivedMessagesCount] > 300) {
          this.receivedMessageMidPoint[this.receivedMessagesCount] = 300;
          this.receivedMessageHeight[this.receivedMessagesCount] *= 2;
        }

        this.receivedMessageX[this.receivedMessagesCount] = var1 + var3 / 2;
        this.receivedMessageY[this.receivedMessagesCount] = var2;
        this.receivedMessages[this.receivedMessagesCount++] = var8.message;
      }

      if (var8.bubbleTimeout > 0) {
        this.actionBubbleX[this.itemsAboveHeadCount] = var1 + var3 / 2;
        this.actionBubbleY[this.itemsAboveHeadCount] = var2;
        this.actionBubbleScale[this.itemsAboveHeadCount] = var7;
        this.actionBubbleItem[this.itemsAboveHeadCount++] = var8.pr;
      }

      if (var8.animationCurrent == 8 || var8.animationCurrent == 9 || var8.combatTimer != 0) {
        if (var8.combatTimer > 0) {
          var14 = var1;
          if (var8.animationCurrent == 8) {
            var14 = var1 - 20 * var7 / 100;
          } else if (var8.animationCurrent == 9) {
            var14 = var1 + 20 * var7 / 100;
          }

          var15 = var8.healthCurrent * 30 / var8.healthMax;
          this.healthBarX[this.healthBarCount] = var14 + var3 / 2;
          this.healthBarY[this.healthBarCount] = var2;
          this.healthBarMissing[this.healthBarCount++] = var15;
        }

        if (var8.combatTimer > 150) {
          var14 = var1;
          if (var8.animationCurrent == 8) {
            var14 = var1 - 10 * var7 / 100;
          } else if (var8.animationCurrent == 9) {
            var14 = var1 + 10 * var7 / 100;
          }

          this.surface._if(var14 + var3 / 2, var2 + var4 / 2, this.spriteMedia + 11);
          this.surface.drawStringCenter(String.valueOf(var8.rr), var14 + var3 / 2 - 1, var2 + var4 / 2 + 5, 3, 16777215);
        }
      }

      if (var8.hs == 1 && var8.bubbleTimeout == 0) {
        var14 = var6 + var1 + var3 / 2;
        if (var8.animationCurrent == 8) {
          var14 -= 20 * var7 / 100;
        } else if (var8.animationCurrent == 9) {
          var14 += 20 * var7 / 100;
        }

        var15 = 16 * var7 / 100;
        var23 = 16 * var7 / 100;
        this.surface.spriteClipping(var14 - var15 / 2, var2 - var23 / 2 - 10 * var7 / 100, var15, var23, this.spriteMedia + 13);
      }

    }
  }

  public void drawAboveHeadStuff() {
    int var2;
    int var3;
    int var4;
    int var5;
    int var7;
    for (int var1 = 0; var1 < this.receivedMessagesCount; ++var1) {
      var2 = this.receivedMessageX[var1];
      var3 = this.receivedMessageY[var1];
      var4 = this.receivedMessageMidPoint[var1];
      var5 = this.receivedMessageHeight[var1];
      boolean var6 = true;

      while (var6) {
        var6 = false;

        for (var7 = 0; var7 < var1; ++var7) {
          if (var3 > this.receivedMessageY[var7] - this.receivedMessageHeight[var7] && var3 - var5 < this.receivedMessageY[var7] && var2 - var4 < this.receivedMessageX[var7] + this.receivedMessageMidPoint[var7] && var2 + var4 > this.receivedMessageX[var7] - this.receivedMessageMidPoint[var7]) {
            var3 = this.receivedMessageY[var7] - var5;
            var6 = true;
          }
        }
      }

      this.receivedMessageY[var1] = var3;
      this.surface.centrepara(this.receivedMessages[var1], var2, var3, 1, 16776960, 300);
    }

    int var12;
    for (var2 = 0; var2 < this.itemsAboveHeadCount; ++var2) {
      var3 = this.actionBubbleX[var2];
      var4 = this.actionBubbleY[var2];
      var5 = this.actionBubbleScale[var2];
      var12 = this.actionBubbleItem[var2];
      var7 = 39 * var5 / 100;
      int var8 = 27 * var5 / 100;
      int var9 = var4 - var8;
      this.surface.drawActionBubble(var3 - var7 / 2, var9, var7, var8, this.spriteMedia + 9, 85);
      int var10 = 36 * var5 / 100;
      int var11 = 24 * var5 / 100;
      this.surface.spriteClipping(var3 - var10 / 2, var9 + var8 / 2 - var11 / 2, var10, var11, GameData.zfb[var12] + this.nw, GameData.lgb[var12], 0, 0, false);
    }

    for (var3 = 0; var3 < this.healthBarCount; ++var3) {
      var4 = this.healthBarX[var3];
      var5 = this.healthBarY[var3];
      var12 = this.healthBarMissing[var3];
      this.surface.drawBoxAlpha(var4 - 15, var5 - 3, var12, 5, '\uff00', 192);
      this.surface.drawBoxAlpha(var4 - 15 + var12, var5 - 3, 30 - var12, 5, 16711680, 192);
    }

  }

  public int getInventoryCount(int var1) {
    int var2 = 0;

    for (int var3 = 0; var3 < this.inventoryItemsCount; ++var3) {
      if (this.inventoryItemID[var3] == var1) {
        if (GameData.bgb[var1] == 1) {
          ++var2;
        } else {
          var2 += this.inventoryItemStackCount[var3];
        }
      }
    }

    return var2;
  }

  public boolean hasStaffOrRunes(int var1, int var2) {
    if (var1 == 31 && this.isItemEquipped(197)) {
      return true;
    } else if (var1 == 32 && this.isItemEquipped(102)) {
      return true;
    } else if (var1 == 33 && this.isItemEquipped(101)) {
      return true;
    } else if (var1 == 34 && this.isItemEquipped(103)) {
      return true;
    } else {
      return this.getInventoryCount(var1) >= var2;
    }
  }

  public boolean isItemEquipped(int var1) {
    for (int var2 = 0; var2 < this.inventoryItemsCount; ++var2) {
      if (this.inventoryItemID[var2] == var1 && this.inventoryEquipped[var2] == 1) {
        return true;
      }
    }

    return false;
  }

  public void drawMinimapEntity(int var1, int var2, int var3) {
    this.surface.gg(var1, var2, var3);
    this.surface.gg(var1 - 1, var2, var3);
    this.surface.gg(var1 + 1, var2, var3);
    this.surface.gg(var1, var2 - 1, var3);
    this.surface.gg(var1, var2 + 1, var3);
  }

  public void walkToActionSource(int var1, int var2, int var3, int var4, boolean var5) {
    this.walkToActionSource(var1, var2, var3, var4, var3, var4, false, var5);
  }

  public void walkToGroundItem(int var1, int var2, int var3, int var4, boolean var5) {
    if (!this.walkToActionSource(var1, var2, var3, var4, var3, var4, false, var5)) {
      this.walkToActionSource(var1, var2, var3, var4, var3, var4, true, var5);
    }
  }

  public void walkToObject(int var1, int var2, int var3, int var4) {
    int var5;
    int var6;
    if (var3 != 0 && var3 != 4) {
      var6 = GameData.gib[var4];
      var5 = GameData.hib[var4];
    } else {
      var5 = GameData.gib[var4];
      var6 = GameData.hib[var4];
    }

    if (GameData.iib[var4] != 2 && GameData.iib[var4] != 3) {
      this.walkToActionSource(this.regionX, this.regionY, var1, var2, var1 + var5 - 1, var2 + var6 - 1, true, true);
    } else {
      if (var3 == 0) {
        --var1;
        ++var5;
      }

      if (var3 == 2) {
        ++var6;
      }

      if (var3 == 4) {
        ++var5;
      }

      if (var3 == 6) {
        --var2;
        ++var6;
      }

      this.walkToActionSource(this.regionX, this.regionY, var1, var2, var1 + var5 - 1, var2 + var6 - 1, false, true);
    }
  }

  public void walkToWallObject(int var1, int var2, int var3) {
    if (var3 == 0) {
      this.walkToActionSource(this.regionX, this.regionY, var1, var2 - 1, var1, var2, false, true);
    } else if (var3 == 1) {
      this.walkToActionSource(this.regionX, this.regionY, var1 - 1, var2, var1, var2, false, true);
    } else {
      this.walkToActionSource(this.regionX, this.regionY, var1, var2, var1, var2, true, true);
    }
  }

  public boolean walkToActionSource(int var1, int var2, int var3, int var4, int var5, int var6, boolean var7, boolean var8) {
    int var9 = this.world.route(var1, var2, var3, var4, var5, var6, this.walkPathX, this.walkPathY, var7);
    if (var9 == -1) {
      return false;
    } else {
      --var9;
      var1 = this.walkPathX[var9];
      var2 = this.walkPathY[var9];
      --var9;
      if (var8) {
        super.clientStream.newPacket(215);
      } else {
        super.clientStream.newPacket(255);
      }

      super.clientStream.writeShort(var1 + this.areaX);
      super.clientStream.writeShort(var2 + this.areaY);

      for (int var10 = var9; var10 >= 0 && var10 > var9 - 25; --var10) {
        super.clientStream.writeByte(this.walkPathX[var10] - var1);
        super.clientStream.writeByte(this.walkPathY[var10] - var2);
      }

      this.finalizePacket();
      this.mouseClickXStep = -24;
      this.mouseClickXX = super.mouseX;
      this.mouseClickXY = super.mouseY;
      return true;
    }
  }

  public void loadNextRegion(int var1, int var2) {
    if (this.deathScreenTimeout != 0) {
      this.world.playerAlive = false;
    } else {
      var1 += this.planeWidth;
      var2 += this.planeHeight;
      if (this.lastPlaneIndex == this.planeIndex && var1 > this.localLowerX && var1 < this.localUpperX && var2 > this.localLowerY && var2 < this.localUpperY) {
        this.world.playerAlive = true;
      } else {
        this.surface.drawStringCenter("Loading... Please wait", 256, 192, 1, 16777215);
        this.drawChatMessageTabs();
        this.surface.draw(this.graphics, 0, 11);
        int var3 = this.areaX;
        int var4 = this.areaY;
        int var5 = (var1 + 24) / 48;
        int var6 = (var2 + 24) / 48;
        this.lastPlaneIndex = this.planeIndex;
        this.areaX = var5 * 48 - 48;
        this.areaY = var6 * 48 - 48;
        this.localLowerX = var5 * 48 - 32;
        this.localLowerY = var6 * 48 - 32;
        this.localUpperX = var5 * 48 + 32;
        this.localUpperY = var6 * 48 + 32;
        this.world.loadSection(var1, var2, this.lastPlaneIndex);
        this.areaX -= this.planeWidth;
        this.areaY -= this.planeHeight;
        int var7 = this.areaX - var3;
        int var8 = this.areaY - var4;

        int var10;
        int var11;
        int var12;
        int var14;
        int var15;
        for (int var9 = 0; var9 < this.objectCount; ++var9) {
          this.objectX[var9] -= var7;
          this.objectY[var9] -= var8;
          var10 = this.objectX[var9];
          var11 = this.objectY[var9];
          var12 = this.objectID[var9];
          GameModel var13 = this.objectModel[var9];

          try {
            var14 = this.objectDirection[var9];
            int var16;
            if (var14 != 0 && var14 != 4) {
              var16 = GameData.gib[var12];
              var15 = GameData.hib[var12];
            } else {
              var15 = GameData.gib[var12];
              var16 = GameData.hib[var12];
            }

            int var17 = (var10 + var10 + var15) * this.magicLoc / 2;
            int var18 = (var11 + var11 + var16) * this.magicLoc / 2;
            if (var10 >= 0 && var11 >= 0 && var10 < 96 && var11 < 96) {
              this.scene.addModel(var13);
              var13.ce(var17, -this.world.getElevation(var17, var18), var18);
              this.world.pn(var10, var11, var12);
              if (var12 == 74) {
                var13.translate(0, -480, 0);
              }
            }
          } catch (RuntimeException var20) {
            System.out.println("Loc Error: " + var20.getMessage());
            System.out.println("i:" + var9 + " obj:" + var13);
            var20.printStackTrace();
          }
        }

        int var21;
        for (var10 = 0; var10 < this.wallObjectCount; ++var10) {
          this.wallObjectX[var10] -= var7;
          this.wallObjectY[var10] -= var8;
          var11 = this.wallObjectX[var10];
          var12 = this.wallObjectY[var10];
          var21 = this.wallObjectID[var10];
          var14 = this.wallObjectDirection[var10];

          try {
            this.world.bo(var11, var12, var14, var21);
            GameModel var24 = this.createModel(var11, var12, var14, var21, var10);
            this.wallObjectModel[var10] = var24;
          } catch (RuntimeException var19) {
            System.out.println("Bound Error: " + var19.getMessage());
            var19.printStackTrace();
          }
        }

        for (var11 = 0; var11 < this.groundItemCount; ++var11) {
          this.groundItemX[var11] -= var7;
          this.groundItemY[var11] -= var8;
        }

        for (var12 = 0; var12 < this.playerCount; ++var12) {
          Character var22 = this.players[var12];
          var22.currentX -= var7 * this.magicLoc;
          var22.currentY -= var8 * this.magicLoc;

          for (var14 = 0; var14 < var22.waypointCurrent; ++var14) {
            var22.waypointsX[var14] -= var7 * this.magicLoc;
            var22.waypointsY[var14] -= var8 * this.magicLoc;
          }
        }

        for (var21 = 0; var21 < this.npcCount; ++var21) {
          Character var23 = this.npcs[var21];
          var23.currentX -= var7 * this.magicLoc;
          var23.currentY -= var8 * this.magicLoc;

          for (var15 = 0; var15 < var23.waypointCurrent; ++var15) {
            var23.waypointsX[var15] -= var7 * this.magicLoc;
            var23.waypointsY[var15] -= var8 * this.magicLoc;
          }
        }

        this.world.playerAlive = true;
        this.hu = false;
      }
    }
  }

  public GameModel createModel(int var1, int var2, int var3, int var4, int var5) {
    int var6 = var1;
    int var8 = var1;
    int var9 = var2;
    int var10 = GameData.rib[var4];
    int var11 = GameData.sib[var4];
    int var12 = GameData.qib[var4];
    GameModel var13 = new GameModel(4, 1);
    if (var3 == 0) {
      var8 = var1 + 1;
    }

    if (var3 == 1) {
      var9 = var2 + 1;
    }

    if (var3 == 2) {
      var6 = var1 + 1;
      var9 = var2 + 1;
    }

    if (var3 == 3) {
      var8 = var1 + 1;
      var9 = var2 + 1;
    }

    var6 *= this.magicLoc;
    int var7 = var2 * this.magicLoc;
    var8 *= this.magicLoc;
    var9 *= this.magicLoc;
    int var14 = var13.je(var6, -this.world.getElevation(var6, var7), var7);
    int var15 = var13.je(var6, -this.world.getElevation(var6, var7) - var12, var7);
    int var16 = var13.je(var8, -this.world.getElevation(var8, var9) - var12, var9);
    int var17 = var13.je(var8, -this.world.getElevation(var8, var9), var9);
    int[] var18 = new int[] {var14, var15, var16, var17};
    var13.createFace(4, var18, var10, var11);
    var13.setLight(false, 60, 24, -50, -10, -50);
    if (var1 >= 0 && var2 >= 0 && var1 < 96 && var2 < 96) {
      this.scene.addModel(var13);
    }

    var13.key = var5 + 10000;
    return var13;
  }

  public void drawUi() {
    if (this.gy && this.combatTimeout == 0) {
      this.drawDialogShop();
    } else if (this.showDialogTrade) {
      this.drawDialogTrade();
    } else if (this.gt != 0) {
      this.kk();
    } else if (this.showDialogSocialInput != 0) {
      this.drawDialogSocialInput();
    } else if (this.ft == 1) {
      this.gm();
    } else if (!this.showAdvertDialog && this.jt > 180000 && this.combatTimeout == 0) {
      this.drawAdvertDialog();
    } else {
      if (this.showOptionsMenu) {
        this.drawOptionsMenu();
      }

      if (this.localPlayer.combatTimer > 0) {
        this.drawDialogCombatStyle();
      }

      this.setActiveUiTab();
      boolean nomenus = !this.showOptionsMenu && !this.showRightClickMenu;
      if (nomenus) {
        this.menuItemsCount = 0;
      }

      if (this.showUiTab == 0 && nomenus) {
        this.createRightClickMenu();
      }

      if (this.showUiTab == 1) {
        this.drawUITabInventory(nomenus);
      }

      if (this.showUiTab == 2) {
        this.drawUITabMinimap(nomenus);
      }

      if (this.showUiTab == 3) {
        this.drawUITabPlayerInfo(nomenus);
      }

      if (this.showUiTab == 4) {
        this.drawUITabMagic(nomenus);
      }

      if (this.showUiTab == 5) {
        this.drawUITabSocial(nomenus);
      }

      if (this.showUiTab == 6) {
        this.drawUITabOptions(nomenus);
      }

      if (!this.showRightClickMenu && !this.showOptionsMenu) {
        this.createTopMouseMenu();
      }

      if (this.showRightClickMenu && !this.showOptionsMenu) {
        this.drawRightClickMenu();
      }
    }

    this.mouseButtonClick = 0;
  }

  public void drawOptionsMenu() {
    int var1;
    if (this.mouseButtonClick == 0) {
      for (var1 = 0; var1 < this.optionMenuCount; ++var1) {
        int var2 = 65535;
        if (super.mouseX < this.surface.textWidth(this.optionMenuEntry[var1], 1) && super.mouseY > var1 * 12 && super.mouseY < 12 + var1 * 12) {
          var2 = 16711680;
        }

        this.surface.drawString(this.optionMenuEntry[var1], 6, 12 + var1 * 12, 1, var2);
      }

    } else {
      for (var1 = 0; var1 < this.optionMenuCount; ++var1) {
        if (super.mouseX < this.surface.textWidth(this.optionMenuEntry[var1], 1) && super.mouseY > var1 * 12 && super.mouseY < 12 + var1 * 12) {
          super.clientStream.newPacket(237);
          super.clientStream.writeByte(var1);
          this.finalizePacket();
          break;
        }
      }

      this.mouseButtonClick = 0;
      this.showOptionsMenu = false;
    }
  }

  public void drawDialogCombatStyle() {
    byte var1 = 7;
    byte var2 = 15;
    short var3 = 175;
    int var4;
    if (this.mouseButtonClick != 0) {
      for (var4 = 0; var4 < 5; ++var4) {
        if (var4 > 0 && super.mouseX > var1 && super.mouseX < var1 + var3 && super.mouseY > var2 + var4 * 20 && super.mouseY < var2 + var4 * 20 + 20) {
          this.combatStyle = var4 - 1;
          this.mouseButtonClick = 0;
          super.clientStream.newPacket(231);
          super.clientStream.writeByte(this.combatStyle);
          this.finalizePacket();
          break;
        }
      }
    }

    for (var4 = 0; var4 < 5; ++var4) {
      if (var4 == this.combatStyle + 1) {
        this.surface.drawBoxAlpha(var1, var2 + var4 * 20, var3, 20, Surface.rgb2long(255, 0, 0), 128);
      } else {
        this.surface.drawBoxAlpha(var1, var2 + var4 * 20, var3, 20, Surface.rgb2long(190, 190, 190), 128);
      }

      this.surface.drawLineHoriz(var1, var2 + var4 * 20, var3, 0);
      this.surface.drawLineHoriz(var1, var2 + var4 * 20 + 20, var3, 0);
    }

    this.surface.drawStringCenter("Select combat style", var1 + var3 / 2, var2 + 16, 3, 16777215);
    this.surface.drawStringCenter("Controlled (+1 of each)", var1 + var3 / 2, var2 + 36, 3, 0);
    this.surface.drawStringCenter("Aggressive (+3 strength)", var1 + var3 / 2, var2 + 56, 3, 0);
    this.surface.drawStringCenter("Accurate   (+3 attack)", var1 + var3 / 2, var2 + 76, 3, 0);
    this.surface.drawStringCenter("Defensive  (+3 defense)", var1 + var3 / 2, var2 + 96, 3, 0);
  }

  public void drawAdvertDialog() {
    if (this.mouseButtonClick != 0) {
      this.mouseButtonClick = 0;
      if (super.mouseX > 200 && super.mouseX < 300 && super.mouseY > 230 && super.mouseY < 253) {
        this.showAdvertDialog = true;
        return;
      }
    }

    byte var1 = 90;
    this.surface.drawBox(106, 70, 300, 190, 0);
    this.surface.drawBoxEdge(106, 70, 300, 190, 16777215);
    this.surface.drawStringCenter("You have been playing for", 256, var1, 4, 16777215);
    int var3 = var1 + 20;
    this.surface.drawStringCenter("over 1 hour. Please consider", 256, var3, 4, 16777215);
    var3 += 20;
    this.surface.drawStringCenter("visiting our advertiser if you", 256, var3, 4, 16777215);
    var3 += 20;
    this.surface.drawStringCenter("see an advert which interests you.", 256, var3, 4, 16777215);
    var3 += 40;
    this.surface.drawStringCenter("Doing so will help ensure", 256, var3, 4, 16777215);
    var3 += 20;
    this.surface.drawStringCenter("Runescape remains free.", 256, var3, 4, 16777215);
    var3 += 40;
    int var2 = 16777215;
    if (super.mouseX > 200 && super.mouseX < 300 && super.mouseY > var3 - 20 && super.mouseY < var3 + 3) {
      var2 = 16776960;
    }

    this.surface.drawStringCenter("Close", 256, var3, 4, var2);
  }

  public void gm() {
    short var1;
    if (this.mouseButtonClick != 0) {
      this.mouseButtonClick = 0;
      var1 = 250;
      if (super.mouseX < 56 || super.mouseY < 70 || super.mouseX > 456 || super.mouseY > 260) {
        this.ft = 0;
        return;
      }

      if (super.mouseX > 250 && super.mouseX < 350 && super.mouseY > var1 - 20 && super.mouseY < var1 + 3) {
        this.ft = 0;
        return;
      }

      if (super.mouseX > 150 && super.mouseX < 250 && super.mouseY > var1 - 20 && super.mouseY < var1 + 3) {
        this.optionPlayerKiller = !this.optionPlayerKiller;
        super.clientStream.newPacket(213);
        super.clientStream.writeByte(1);
        super.clientStream.writeByte(this.optionPlayerKiller ? 1 : 0);
        super.clientStream.flushPacket();
        this.ft = 0;
        return;
      }
    }

    this.surface.drawBox(56, 70, 400, 190, 0);
    this.surface.drawBoxEdge(56, 70, 400, 190, 16777215);
    int var3 = 90;
    if (!this.optionPlayerKiller) {
      this.surface.drawStringCenter("Are you sure you want to change", 256, var3, 4, 16777215);
      var3 += 20;
      this.surface.drawStringCenter("to being able to fight other players?", 256, var3, 4, 16777215);
      var3 += 40;
      this.surface.drawStringCenter("If you do other players will be able to", 256, var3, 4, 16777215);
      var3 += 20;
      this.surface.drawStringCenter("attack you, and you will probably die", 256, var3, 4, 16777215);
      var3 += 20;
      this.surface.drawStringCenter("much more often.", 256, var3, 4, 16777215);
      var3 += 40;
    }

    if (this.optionPlayerKiller) {
      this.surface.drawStringCenter("Are you sure you want to change", 256, var3, 4, 16777215);
      var3 += 20;
      this.surface.drawStringCenter("to not fighting other players?", 256, var3, 4, 16777215);
      var3 += 40;
      this.surface.drawStringCenter("This will make you safe from attack,", 256, var3, 4, 16777215);
      var3 += 20;
      this.surface.drawStringCenter("but will also preventing you from attacking", 256, var3, 4, 16777215);
      var3 += 20;
      this.surface.drawStringCenter("others (except in the arena - coming soon)", 256, var3, 4, 16777215);
      var3 += 40;
    }

    if (this.et == 2) {
      this.surface.drawStringCenter("You can only change a total of 2 times", 256, var3, 4, 16777215);
      var3 += 20;
    }

    if (this.et == 1) {
      this.surface.drawStringCenter("You will not be allowed to change back again", 256, var3, 4, 16777215);
      var3 += 20;
    }

    var1 = 250;
    int var2 = 16777215;
    if (super.mouseX > 150 && super.mouseX < 250 && super.mouseY > var1 - 20 && super.mouseY < var1 + 3) {
      var2 = 16776960;
    }

    this.surface.drawStringCenter("Yes I'm sure", 200, var1, 4, var2);
    var2 = 16777215;
    if (super.mouseX > 250 && super.mouseX < 350 && super.mouseY > var1 - 20 && super.mouseY < var1 + 3) {
      var2 = 16776960;
    }

    this.surface.drawStringCenter("No thanks", 300, var1, 4, var2);
  }

  public void kk() {
    if (this.mouseButtonClick != 0) {
      this.mouseButtonClick = 0;
      if (super.mouseX < 106 || super.mouseY < 150 || super.mouseX > 406 || super.mouseY > 210) {
        this.gt = 0;
        return;
      }
    }

    short var1 = 150;
    this.surface.drawBox(106, var1, 300, 60, 0);
    this.surface.drawBoxEdge(106, var1, 300, 60, 16777215);
    int var4 = var1 + 22;
    String var2;
    int var3;
    if (this.gt == 1) {
      this.surface.drawStringCenter("Please enter your new password", 256, var4, 4, 16777215);
      var4 += 25;
      var2 = "*";

      for (var3 = 0; var3 < super.inputTextCurrent.length(); ++var3) {
        var2 = "X" + var2;
      }

      this.surface.drawStringCenter(var2, 256, var4, 4, 16777215);
      if (super.inputTextFinal.length() > 0) {
        this.it = super.inputTextFinal;
        super.inputTextCurrent = "";
        super.inputTextFinal = "";
        this.gt = 2;
        return;
      }
    } else if (this.gt == 2) {
      this.surface.drawStringCenter("Enter password again to confirm", 256, var4, 4, 16777215);
      var4 += 25;
      var2 = "*";

      for (var3 = 0; var3 < super.inputTextCurrent.length(); ++var3) {
        var2 = "X" + var2;
      }

      this.surface.drawStringCenter(var2, 256, var4, 4, 16777215);
      if (super.inputTextFinal.length() > 0) {
        if (super.inputTextFinal.equalsIgnoreCase(this.it)) {
          this.gt = 4;
          this.ab(this.it);
          return;
        }

        this.gt = 3;
        return;
      }
    } else {
      if (this.gt == 3) {
        this.surface.drawStringCenter("Passwords do not match!", 256, var4, 4, 16777215);
        var4 += 25;
        this.surface.drawStringCenter("Press any key to close", 256, var4, 4, 16777215);
        return;
      }

      if (this.gt == 4) {
        this.surface.drawStringCenter("Ok, your request has been sent", 256, var4, 4, 16777215);
        var4 += 25;
        this.surface.drawStringCenter("Press any key to close", 256, var4, 4, 16777215);
      }
    }

  }

  public void drawDialogSocialInput() {
    if (this.mouseButtonClick != 0) {
      label118: {
        this.mouseButtonClick = 0;
        if (this.showDialogSocialInput != 1 || super.mouseX >= 106 && super.mouseY >= 145 && super.mouseX <= 406 && super.mouseY <= 215) {
          if (this.showDialogSocialInput == 2 && (super.mouseX < 6 || super.mouseY < 145 || super.mouseX > 506 || super.mouseY > 215)) {
            this.showDialogSocialInput = 0;
            return;
          }

          if (this.showDialogSocialInput != 3 || super.mouseX >= 106 && super.mouseY >= 145 && super.mouseX <= 406 && super.mouseY <= 215) {
            if (super.mouseX > 236 && super.mouseX < 276 && super.mouseY > 193 && super.mouseY < 213) {
              this.showDialogSocialInput = 0;
              return;
            }
            break label118;
          }

          this.showDialogSocialInput = 0;
          return;
        }

        this.showDialogSocialInput = 0;
        return;
      }
    }

    int var1 = 145;
    String var2;
    if (this.showDialogSocialInput == 1) {
      this.surface.drawBox(106, var1, 300, 70, 0);
      this.surface.drawBoxEdge(106, var1, 300, 70, 16777215);
      var1 += 20;
      this.surface.drawStringCenter("Enter name to add to friends list", 256, var1, 4, 16777215);
      var1 += 20;
      this.surface.drawStringCenter(super.inputTextCurrent + "*", 256, var1, 4, 16777215);
      if (super.inputTextFinal.length() > 0) {
        var2 = super.inputTextFinal.trim();
        super.inputTextCurrent = "";
        super.inputTextFinal = "";
        this.showDialogSocialInput = 0;
        if (var2.length() > 0 && Utility.username2hash(var2) != this.localPlayer.hash) {
          this.friendAdd(var2);
        }
      }
    }

    if (this.showDialogSocialInput == 2) {
      this.surface.drawBox(6, var1, 500, 70, 0);
      this.surface.drawBoxEdge(6, var1, 500, 70, 16777215);
      var1 += 20;
      this.surface.drawStringCenter("Enter message to send to " + Utility.hash2username(this.privateMessageTarget), 256, var1, 4, 16777215);
      var1 += 20;
      this.surface.drawStringCenter(super.inputPMCurrent + "*", 256, var1, 4, 16777215);
      if (super.inputPMFinal.length() > 0) {
        var2 = super.inputPMFinal;
        super.inputPMCurrent = "";
        super.inputPMFinal = "";
        this.showDialogSocialInput = 0;
        this.sendPrivateMessage(this.privateMessageTarget, var2);
      }
    }

    if (this.showDialogSocialInput == 3) {
      this.surface.drawBox(106, var1, 300, 70, 0);
      this.surface.drawBoxEdge(106, var1, 300, 70, 16777215);
      var1 += 20;
      this.surface.drawStringCenter("Enter name to add to ignore list", 256, var1, 4, 16777215);
      var1 += 20;
      this.surface.drawStringCenter(super.inputTextCurrent + "*", 256, var1, 4, 16777215);
      if (super.inputTextFinal.length() > 0) {
        var2 = super.inputTextFinal.trim();
        super.inputTextCurrent = "";
        super.inputTextFinal = "";
        this.showDialogSocialInput = 0;
        if (var2.length() > 0 && Utility.username2hash(var2) != this.localPlayer.hash) {
          this.ignoreAdd(var2);
        }
      }
    }

    int var3 = 16777215;
    if (super.mouseX > 236 && super.mouseX < 276 && super.mouseY > 193 && super.mouseY < 213) {
      var3 = 16776960;
    }

    this.surface.drawStringCenter("Cancel", 256, 208, 1, var3);
  }

  public void drawDialogShop() {
    int var3;
    int var4;
    int var5;
    int var6;
    int var7;
    if (this.mouseButtonClick != 0) {
      this.mouseButtonClick = 0;
      int var1 = super.mouseX - 52;
      int var2 = super.mouseY - 44;
      if (var1 < 0 || var2 < 12 || var1 >= 408 || var2 >= 246) {
        super.clientStream.newPacket(218);
        this.finalizePacket();
        this.gy = false;
        return;
      }

      var3 = 0;

      for (var4 = 0; var4 < 5; ++var4) {
        for (var5 = 0; var5 < 8; ++var5) {
          var6 = 7 + var5 * 49;
          var7 = 28 + var4 * 34;
          if (var1 > var6 && var1 < var6 + 49 && var2 > var7 && var2 < var7 + 34 && this.shopItem[var3] != -1) {
            this.shopSelectedItemIndex = var3;
            this.shopSelectedIemType = this.shopItem[var3];
          }

          ++var3;
        }
      }

      if (this.shopSelectedItemIndex >= 0) {
        var5 = this.shopItem[this.shopSelectedItemIndex];
        if (var5 != -1) {
          if (this.shopCount[this.shopSelectedItemIndex] > 0 && var1 > 298 && var2 >= 204 && var1 < 408 && var2 <= 215) {
            var6 = this.shopBuyPriceMod + this.shopItemPrice[this.shopSelectedItemIndex];
            if (var6 < 10) {
              var6 = 10;
            }

            var7 = var6 * GameData.agb[var5] / 100;
            super.clientStream.newPacket(217);
            super.clientStream.writeShort(this.shopItem[this.shopSelectedItemIndex]);
            super.clientStream.writeShort(var7);
            this.finalizePacket();
          }

          if (this.getInventoryCount(var5) > 0 && var1 > 2 && var2 >= 229 && var1 < 112 && var2 <= 240) {
            var6 = this.shopSellPriceMod + this.shopItemPrice[this.shopSelectedItemIndex];
            if (var6 < 10) {
              var6 = 10;
            }

            var7 = var6 * GameData.agb[var5] / 100;
            super.clientStream.newPacket(216);
            super.clientStream.writeShort(this.shopItem[this.shopSelectedItemIndex]);
            super.clientStream.writeShort(var7);
            this.finalizePacket();
          }
        }
      }
    }

    byte var11 = 52;
    byte var12 = 44;
    this.surface.drawBox(var11, var12, 408, 12, 192);
    var3 = 10000536;
    this.surface.drawBoxAlpha(var11, var12 + 12, 408, 17, var3, 160);
    this.surface.drawBoxAlpha(var11, var12 + 29, 8, 170, var3, 160);
    this.surface.drawBoxAlpha(var11 + 399, var12 + 29, 9, 170, var3, 160);
    this.surface.drawBoxAlpha(var11, var12 + 199, 408, 47, var3, 160);
    this.surface.drawString("Buying and selling items", var11 + 1, var12 + 10, 1, 16777215);
    var4 = 16777215;
    if (super.mouseX > var11 + 320 && super.mouseY >= var12 && super.mouseX < var11 + 408 && super.mouseY < var12 + 12) {
      var4 = 16711680;
    }

    this.surface.drawStringRight("Close window", var11 + 406, var12 + 10, 1, var4);
    this.surface.drawString("Shops stock in green", var11 + 2, var12 + 24, 1, '\uff00');
    this.surface.drawString("Number you own in blue", var11 + 135, var12 + 24, 1, '\uffff');
    this.surface.drawString("Your money: " + this.getInventoryCount(10) + "gp", var11 + 280, var12 + 24, 1, 16776960);
    var5 = 13684944;
    var6 = 0;

    int var8;
    int var9;
    int var10;
    for (var7 = 0; var7 < 5; ++var7) {
      for (var8 = 0; var8 < 8; ++var8) {
        var9 = var11 + 7 + var8 * 49;
        var10 = var12 + 28 + var7 * 34;
        if (this.shopSelectedItemIndex == var6) {
          this.surface.drawBoxAlpha(var9, var10, 49, 34, 16711680, 160);
        } else {
          this.surface.drawBoxAlpha(var9, var10, 49, 34, var5, 160);
        }

        this.surface.drawBoxEdge(var9, var10, 50, 35, 0);
        if (this.shopItem[var6] != -1) {
          this.surface.spriteClipping(var9, var10, 48, 32, this.nw + GameData.zfb[this.shopItem[var6]], GameData.lgb[this.shopItem[var6]], 0, 0, false);
          this.surface.drawString(String.valueOf(this.shopCount[var6]), var9 + 1, var10 + 10, 1, '\uff00');
          this.surface.drawStringRight(String.valueOf(this.getInventoryCount(this.shopItem[var6])), var9 + 47, var10 + 10, 1, '\uffff');
        }

        ++var6;
      }
    }

    this.surface.drawLineHoriz(var11 + 5, var12 + 222, 398, 0);
    if (this.shopSelectedItemIndex == -1) {
      this.surface.drawStringCenter("Select an object to buy or sell", var11 + 204, var12 + 214, 3, 16776960);
    } else {
      var8 = this.shopItem[this.shopSelectedItemIndex];
      if (var8 != -1) {
        if (this.shopCount[this.shopSelectedItemIndex] > 0) {
          var9 = this.shopBuyPriceMod + this.shopItemPrice[this.shopSelectedItemIndex];
          if (var9 < 10) {
            var9 = 10;
          }

          var10 = var9 * GameData.agb[var8] / 100;
          this.surface.drawString("Buy a new " + GameData.vfb[var8][0] + " for " + var10 + "gp", var11 + 2, var12 + 214, 1, 16776960);
          var4 = 16777215;
          if (super.mouseX > var11 + 298 && super.mouseY >= var12 + 204 && super.mouseX < var11 + 408 && super.mouseY <= var12 + 215) {
            var4 = 16711680;
          }

          this.surface.drawStringRight("Click here to buy", var11 + 405, var12 + 214, 3, var4);
        } else {
          this.surface.drawStringCenter("This item is not currently available to buy", var11 + 204, var12 + 214, 3, 16776960);
        }

        if (this.getInventoryCount(var8) > 0) {
          var9 = this.shopSellPriceMod + this.shopItemPrice[this.shopSelectedItemIndex];
          if (var9 < 10) {
            var9 = 10;
          }

          var10 = var9 * GameData.agb[var8] / 100;
          this.surface.drawStringRight("Sell your " + GameData.vfb[var8][0] + " for " + var10 + "gp", var11 + 405, var12 + 239, 1, 16776960);
          var4 = 16777215;
          if (super.mouseX > var11 + 2 && super.mouseY >= var12 + 229 && super.mouseX < var11 + 112 && super.mouseY <= var12 + 240) {
            var4 = 16711680;
          }

          this.surface.drawString("Click here to sell", var11 + 2, var12 + 239, 3, var4);
          return;
        }

        this.surface.drawStringCenter("You do not have any of this item to sell", var11 + 204, var12 + 239, 3, 16776960);
      }

    }
  }

  public void drawDialogTrade() {
    if (this.mouseButtonClick != 0 && this.mouseButtonItemCountIncrement == 0) {
      this.mouseButtonItemCountIncrement = 1;
    }

    int var3;
    int var5;
    int var6;
    int var7;
    int var8;
    int var16;
    if (this.mouseButtonItemCountIncrement > 0) {
      int var1 = super.mouseX - 22;
      int var2 = super.mouseY - 36;
      if (var1 >= 0 && var2 >= 0 && var1 < 468 && var2 < 262) {
        if (var1 > 216 && var2 > 30 && var1 < 462 && var2 < 235) {
          var3 = (var1 - 217) / 49 + (var2 - 31) / 34 * 5;
          if (var3 >= 0 && var3 < this.inventoryItemsCount) {
            boolean var4 = false;
            var5 = 0;
            var6 = this.inventoryItemID[var3];

            for (var7 = 0; var7 < this.tradeItemsCount; ++var7) {
              if (this.tradeItem[var7] == var6) {
                if (GameData.bgb[var6] == 0) {
                  for (var8 = 0; var8 < this.mouseButtonItemCountIncrement; ++var8) {
                    if (this.tradeItemStackCount[var7] < this.inventoryItemStackCount[var3]) {
                      ++this.tradeItemStackCount[var7];
                    }

                    var4 = true;
                  }
                } else {
                  ++var5;
                }
              }
            }

            if (this.getInventoryCount(var6) <= var5) {
              var4 = true;
            }

            if (!var4 && this.tradeItemsCount < 12) {
              this.tradeItem[this.tradeItemsCount] = var6;
              this.tradeItemStackCount[this.tradeItemsCount] = 1;
              ++this.tradeItemsCount;
              var4 = true;
            }

            if (var4) {
              super.clientStream.newPacket(234);
              super.clientStream.writeByte(this.tradeItemsCount);

              for (var8 = 0; var8 < this.tradeItemsCount; ++var8) {
                super.clientStream.writeShort(this.tradeItem[var8]);
                super.clientStream.writeShort(this.tradeItemStackCount[var8]);
              }

              this.finalizePacket();
              this.tradeRecipientAccepted = false;
              this.tradeAccepted = false;
            }
          }
        }

        if (var1 > 8 && var2 > 30 && var1 < 205 && var2 < 133) {
          var3 = (var1 - 9) / 49 + (var2 - 31) / 34 * 4;
          if (var3 >= 0 && var3 < this.tradeItemsCount) {
            var16 = this.tradeItem[var3];

            for (var5 = 0; var5 < this.mouseButtonItemCountIncrement; ++var5) {
              if (GameData.bgb[var16] != 0 || this.tradeItemStackCount[var3] <= 1) {
                --this.tradeItemsCount;
                this.mouseButtonDownTime = 0;

                for (var6 = var3; var6 < this.tradeItemsCount; ++var6) {
                  this.tradeItem[var6] = this.tradeItem[var6 + 1];
                  this.tradeItemStackCount[var6] = this.tradeItemStackCount[var6 + 1];
                }
                break;
              }

              --this.tradeItemStackCount[var3];
            }

            super.clientStream.newPacket(234);
            super.clientStream.writeByte(this.tradeItemsCount);

            for (var6 = 0; var6 < this.tradeItemsCount; ++var6) {
              super.clientStream.writeShort(this.tradeItem[var6]);
              super.clientStream.writeShort(this.tradeItemStackCount[var6]);
            }

            this.finalizePacket();
            this.tradeRecipientAccepted = false;
            this.tradeAccepted = false;
          }
        }

        if (var1 > 143 && var2 > 141 && var1 < 154 && var2 < 152) {
          this.tradeAccepted = !this.tradeAccepted;
          super.clientStream.newPacket(232);
          super.clientStream.writeByte(this.tradeAccepted ? 1 : 0);
          this.finalizePacket();
        }

        if (var1 > 413 && var2 > 237 && var1 < 462 && var2 < 258) {
          this.showDialogTrade = false;
          super.clientStream.newPacket(233);
          this.finalizePacket();
        }
      } else if (this.mouseButtonClick != 0) {
        this.showDialogTrade = false;
        super.clientStream.newPacket(233);
        this.finalizePacket();
      }

      this.mouseButtonClick = 0;
      this.mouseButtonItemCountIncrement = 0;
    }

    if (this.showDialogTrade) {
      byte var14 = 22;
      byte var15 = 36;
      this.surface.drawBox(var14, var15, 468, 12, 192);
      var3 = 10000536;
      this.surface.drawBoxAlpha(var14, var15 + 12, 468, 18, var3, 160);
      this.surface.drawBoxAlpha(var14, var15 + 30, 8, 248, var3, 160);
      this.surface.drawBoxAlpha(var14 + 205, var15 + 30, 11, 248, var3, 160);
      this.surface.drawBoxAlpha(var14 + 462, var15 + 30, 6, 248, var3, 160);
      this.surface.drawBoxAlpha(var14 + 8, var15 + 133, 197, 22, var3, 160);
      this.surface.drawBoxAlpha(var14 + 8, var15 + 258, 197, 20, var3, 160);
      this.surface.drawBoxAlpha(var14 + 216, var15 + 235, 246, 43, var3, 160);
      var16 = 13684944;
      this.surface.drawBoxAlpha(var14 + 8, var15 + 30, 197, 103, var16, 160);
      this.surface.drawBoxAlpha(var14 + 8, var15 + 155, 197, 103, var16, 160);
      this.surface.drawBoxAlpha(var14 + 216, var15 + 30, 246, 205, var16, 160);

      for (var5 = 0; var5 < 4; ++var5) {
        this.surface.drawLineHoriz(var14 + 8, var15 + 30 + var5 * 34, 197, 0);
      }

      for (var6 = 0; var6 < 4; ++var6) {
        this.surface.drawLineHoriz(var14 + 8, var15 + 155 + var6 * 34, 197, 0);
      }

      for (var7 = 0; var7 < 7; ++var7) {
        this.surface.drawLineHoriz(var14 + 216, var15 + 30 + var7 * 34, 246, 0);
      }

      for (var8 = 0; var8 < 6; ++var8) {
        if (var8 < 5) {
          this.surface.drawLineVert(var14 + 8 + var8 * 49, var15 + 30, 103, 0);
        }

        if (var8 < 5) {
          this.surface.drawLineVert(var14 + 8 + var8 * 49, var15 + 155, 103, 0);
        }

        this.surface.drawLineVert(var14 + 216 + var8 * 49, var15 + 30, 205, 0);
      }

      this.surface.drawString("Trading with: " + this.tradeRecipientName, var14 + 1, var15 + 10, 1, 16777215);
      this.surface.drawString("Your Offer", var14 + 9, var15 + 27, 4, 16777215);
      this.surface.drawString("Opponent's Offer", var14 + 9, var15 + 152, 4, 16777215);
      this.surface.drawString("Your Inventory", var14 + 216, var15 + 27, 4, 16777215);
      this.surface.drawStringRight("Accepted", var14 + 204, var15 + 27, 4, '\uff00');
      this.surface.drawBoxEdge(var14 + 125, var15 + 16, 11, 11, '\uff00');
      if (this.tradeRecipientAccepted) {
        this.surface.drawBox(var14 + 127, var15 + 18, 7, 7, '\uff00');
      }

      this.surface.drawStringRight("Accept", var14 + 204, var15 + 152, 4, '\uff00');
      this.surface.drawBoxEdge(var14 + 143, var15 + 141, 11, 11, '\uff00');
      if (this.tradeAccepted) {
        this.surface.drawBox(var14 + 145, var15 + 143, 7, 7, '\uff00');
      }

      this.surface.drawStringRight("Close", var14 + 408 + 49, var15 + 251, 4, 12582912);
      this.surface.drawBoxEdge(var14 + 364 + 49, var15 + 237, 49, 21, 12582912);

      int var10;
      int var11;
      for (int var9 = 0; var9 < this.inventoryItemsCount; ++var9) {
        var10 = 217 + var14 + var9 % 5 * 49;
        var11 = 31 + var15 + var9 / 5 * 34;
        this.surface.spriteClipping(var10, var11, 48, 32, this.nw + GameData.zfb[this.inventoryItemID[var9]], GameData.lgb[this.inventoryItemID[var9]], 0, 0, false);
        if (GameData.bgb[this.inventoryItemID[var9]] == 0) {
          this.surface.drawString(String.valueOf(this.inventoryItemStackCount[var9]), var10 + 1, var11 + 10, 1, 16776960);
        }
      }

      int var12;
      for (var10 = 0; var10 < this.tradeItemsCount; ++var10) {
        var11 = 9 + var14 + var10 % 4 * 49;
        var12 = 31 + var15 + var10 / 4 * 34;
        this.surface.spriteClipping(var11, var12, 48, 32, this.nw + GameData.zfb[this.tradeItem[var10]], GameData.lgb[this.tradeItem[var10]], 0, 0, false);
        if (GameData.bgb[this.tradeItem[var10]] == 0) {
          this.surface.drawString(String.valueOf(this.tradeItemStackCount[var10]), var11 + 1, var12 + 10, 1, 16776960);
        }

        if (super.mouseX > var11 && super.mouseX < var11 + 48 && super.mouseY > var12 && super.mouseY < var12 + 32) {
          this.surface.drawString(GameData.vfb[this.tradeItem[var10]][0] + ": @whi@" + GameData.wfb[this.tradeItem[var10]], var14 + 8, var15 + 273, 1, 16776960);
        }
      }

      for (var11 = 0; var11 < this.tradeItemCount; ++var11) {
        var12 = 9 + var14 + var11 % 4 * 49;
        int var13 = 156 + var15 + var11 / 4 * 34;
        this.surface.spriteClipping(var12, var13, 48, 32, this.nw + GameData.zfb[this.tradeRecipientItems[var11]], GameData.lgb[this.tradeRecipientItems[var11]], 0, 0, false);
        if (GameData.bgb[this.tradeRecipientItems[var11]] == 0) {
          this.surface.drawString(String.valueOf(this.tradeRecipientCount[var11]), var12 + 1, var13 + 10, 1, 16776960);
        }

        if (super.mouseX > var12 && super.mouseX < var12 + 48 && super.mouseY > var13 && super.mouseY < var13 + 32) {
          this.surface.drawString(GameData.vfb[this.tradeRecipientItems[var11]][0] + ": @whi@" + GameData.wfb[this.tradeRecipientItems[var11]], var14 + 8, var15 + 273, 1, 16776960);
        }
      }

    }
  }

  public void setActiveUiTab() {
    if (this.showUiTab == 0 && super.mouseX >= this.surface.width2 - 35 && super.mouseY >= 3 && super.mouseX < this.surface.width2 - 3 && super.mouseY < 35) {
      this.showUiTab = 1;
    }

    if (this.showUiTab == 0 && super.mouseX >= this.surface.width2 - 35 - 33 && super.mouseY >= 3 && super.mouseX < this.surface.width2 - 3 - 33 && super.mouseY < 35) {
      this.showUiTab = 2;
    }

    if (this.showUiTab == 0 && super.mouseX >= this.surface.width2 - 35 - 66 && super.mouseY >= 3 && super.mouseX < this.surface.width2 - 3 - 66 && super.mouseY < 35) {
      this.showUiTab = 3;
    }

    if (this.showUiTab == 0 && super.mouseX >= this.surface.width2 - 35 - 99 && super.mouseY >= 3 && super.mouseX < this.surface.width2 - 3 - 99 && super.mouseY < 35) {
      this.showUiTab = 4;
    }

    if (this.showUiTab == 0 && super.mouseX >= this.surface.width2 - 35 - 132 && super.mouseY >= 3 && super.mouseX < this.surface.width2 - 3 - 132 && super.mouseY < 35) {
      this.showUiTab = 5;
    }

    if (this.showUiTab == 0 && super.mouseX >= this.surface.width2 - 35 - 165 && super.mouseY >= 3 && super.mouseX < this.surface.width2 - 3 - 165 && super.mouseY < 35) {
      this.showUiTab = 6;
    }

    if (this.showUiTab != 0 && super.mouseX >= this.surface.width2 - 35 && super.mouseY >= 3 && super.mouseX < this.surface.width2 - 3 && super.mouseY < 26) {
      this.showUiTab = 1;
    }

    if (this.showUiTab != 0 && super.mouseX >= this.surface.width2 - 35 - 33 && super.mouseY >= 3 && super.mouseX < this.surface.width2 - 3 - 33 && super.mouseY < 26) {
      this.showUiTab = 2;
    }

    if (this.showUiTab != 0 && super.mouseX >= this.surface.width2 - 35 - 66 && super.mouseY >= 3 && super.mouseX < this.surface.width2 - 3 - 66 && super.mouseY < 26) {
      this.showUiTab = 3;
    }

    if (this.showUiTab != 0 && super.mouseX >= this.surface.width2 - 35 - 99 && super.mouseY >= 3 && super.mouseX < this.surface.width2 - 3 - 99 && super.mouseY < 26) {
      this.showUiTab = 4;
    }

    if (this.showUiTab != 0 && super.mouseX >= this.surface.width2 - 35 - 132 && super.mouseY >= 3 && super.mouseX < this.surface.width2 - 3 - 132 && super.mouseY < 26) {
      this.showUiTab = 5;
    }

    if (this.showUiTab != 0 && super.mouseX >= this.surface.width2 - 35 - 165 && super.mouseY >= 3 && super.mouseX < this.surface.width2 - 3 - 165 && super.mouseY < 26) {
      this.showUiTab = 6;
    }

    if (this.showUiTab == 1 && (super.mouseX < this.surface.width2 - 248 || super.mouseY > 240)) {
      this.showUiTab = 0;
    }

    if (this.showUiTab >= 2 && this.showUiTab <= 5 && (super.mouseX < this.surface.width2 - 199 || super.mouseY > 240)) {
      this.showUiTab = 0;
    }

    if (this.showUiTab == 6 && (super.mouseX < this.surface.width2 - 199 || super.mouseY > 267)) {
      this.showUiTab = 0;
    }

  }

  public void drawUITabInventory(boolean var1) {
    int var2 = this.surface.width2 - 248;
    this.surface.drawSprite(var2, 3, this.spriteMedia + 1);

    int var4;
    int var5;
    for (int var3 = 0; var3 < 30; ++var3) {
      var4 = var2 + var3 % 5 * 49;
      var5 = 36 + var3 / 5 * 34;
      if (var3 < this.inventoryItemsCount && this.inventoryEquipped[var3] == 1) {
        this.surface.drawBoxAlpha(var4, var5, 49, 34, 16711680, 128);
      } else {
        this.surface.drawBoxAlpha(var4, var5, 49, 34, Surface.rgb2long(181, 181, 181), 128);
      }

      if (var3 < this.inventoryItemsCount) {
        this.surface.spriteClipping(var4, var5, 48, 32, this.nw + GameData.zfb[this.inventoryItemID[var3]], GameData.lgb[this.inventoryItemID[var3]], 0, 0, false);
        if (GameData.bgb[this.inventoryItemID[var3]] == 0) {
          this.surface.drawString(String.valueOf(this.inventoryItemStackCount[var3]), var4 + 1, var5 + 10, 1, 16776960);
        }
      }
    }

    for (var4 = 1; var4 <= 4; ++var4) {
      this.surface.drawLineVert(var2 + var4 * 49, 36, 204, 0);
    }

    for (var5 = 1; var5 <= 5; ++var5) {
      this.surface.drawLineHoriz(var2, 36 + var5 * 34, 245, 0);
    }

    if (var1) {
      var2 = super.mouseX - (this.surface.width2 - 248);
      int var6 = super.mouseY - 36;
      if (var2 >= 0 && var6 >= 0 && var2 < 248 && var6 < 204) {
        int var7 = var2 / 49 + var6 / 34 * 5;
        if (var7 < this.inventoryItemsCount) {
          int var8 = this.inventoryItemID[var7];
          if (this.selectedSpell >= 0) {
            int scb = this.selectedSpell & 0xFF;
            boolean pcb = (this.selectedSpell & 0x100) == 0;
            if ((pcb && GameData.vjb[scb] == 3) || (!pcb && GameData.vkb[scb] == 3)) {
              this.menuItemText1[this.menuItemsCount] = this.textCast + (pcb ? GameData.rjb[scb] : GameData.rkb[scb]) + " on";
              this.menuItemText2[this.menuItemsCount] = "@lre@" + GameData.vfb[var8][0];
              this.menuItemID[this.menuItemsCount] = 600;
              this.menuSourceType[this.menuItemsCount] = var7;
              this.menuSourceIndex[this.menuItemsCount] = this.selectedSpell;
              ++this.menuItemsCount;
              return;
            }
          } else {
            if (this.selectedItemInventoryIndex >= 0) {
              this.menuItemText1[this.menuItemsCount] = "Use " + this.selectedItemName + " with";
              this.menuItemText2[this.menuItemsCount] = "@lre@" + GameData.vfb[var8][0];
              this.menuItemID[this.menuItemsCount] = 610;
              this.menuSourceType[this.menuItemsCount] = var7;
              this.menuSourceIndex[this.menuItemsCount] = this.selectedItemInventoryIndex;
              ++this.menuItemsCount;
              return;
            }

            if (this.inventoryEquipped[var7] == 1) {
              this.menuItemText1[this.menuItemsCount] = "Remove";
              this.menuItemText2[this.menuItemsCount] = "@lre@" + GameData.vfb[var8][0];
              this.menuItemID[this.menuItemsCount] = 620;
              this.menuSourceType[this.menuItemsCount] = var7;
              ++this.menuItemsCount;
            } else if (GameData.jgb[var8] != 0) {
              if ((GameData.jgb[var8] & 24) != 0) {
                this.menuItemText1[this.menuItemsCount] = "Wield";
              } else {
                this.menuItemText1[this.menuItemsCount] = "Wear";
              }

              this.menuItemText2[this.menuItemsCount] = "@lre@" + GameData.vfb[var8][0];
              this.menuItemID[this.menuItemsCount] = 630;
              this.menuSourceType[this.menuItemsCount] = var7;
              ++this.menuItemsCount;
            }

            if (!GameData.yfb[var8].equals("_")) {
              this.menuItemText1[this.menuItemsCount] = GameData.yfb[var8];
              this.menuItemText2[this.menuItemsCount] = "@lre@" + GameData.vfb[var8][0];
              this.menuItemID[this.menuItemsCount] = 640;
              this.menuSourceType[this.menuItemsCount] = var7;
              ++this.menuItemsCount;
            }

            this.menuItemText1[this.menuItemsCount] = "Use";
            this.menuItemText2[this.menuItemsCount] = "@lre@" + GameData.vfb[var8][0];
            this.menuItemID[this.menuItemsCount] = 650;
            this.menuSourceType[this.menuItemsCount] = var7;
            ++this.menuItemsCount;
            this.menuItemText1[this.menuItemsCount] = "Drop";
            this.menuItemText2[this.menuItemsCount] = "@lre@" + GameData.vfb[var8][0];
            this.menuItemID[this.menuItemsCount] = 660;
            this.menuSourceType[this.menuItemsCount] = var7;
            ++this.menuItemsCount;
            this.menuItemText1[this.menuItemsCount] = "Examine";
            this.menuItemText2[this.menuItemsCount] = "@lre@" + GameData.vfb[var8][0];
            this.menuItemID[this.menuItemsCount] = 3600;
            this.menuSourceType[this.menuItemsCount] = var8;
            ++this.menuItemsCount;
          }
        }
      }

    }
  }

  public void drawUITabMinimap(boolean var1) {
    int var2 = this.surface.width2 - 199;
    short var3 = 156;
    short var4 = 152;
    this.surface.drawSprite(var2 - 49, 3, this.spriteMedia + 2);
    var2 += 40;
    this.surface.drawBox(var2, 36, var3, var4, 0);
    this.surface.setBounds(var2, 36, var2 + var3, 36 + var4);
    short var5 = 192;
    int var6 = (this.localPlayer.currentX - 6040) * 3 * var5 / 2048;
    int var7 = (this.localPlayer.currentY - 6040) * 3 * var5 / 2048;
    int var8 = Scene.hm[1024 - this.cameraRotation * 4 & 1023];
    int var9 = Scene.hm[(1024 - this.cameraRotation * 4 & 1023) + 1024];
    int var10 = var7 * var8 + var6 * var9 >> 18;
    var7 = var7 * var9 - var6 * var8 >> 18;
    this.surface.drawMinimapSprite(var2 + var3 / 2 - var10, 36 + var4 / 2 + var7, this.spriteMedia - 1, this.cameraRotation + 64 & 255, var5);

    for (int var11 = 0; var11 < this.objectCount; ++var11) {
      var6 = (this.objectX[var11] * this.magicLoc + 64 - this.localPlayer.currentX) * 3 * var5 / 2048;
      var7 = (this.objectY[var11] * this.magicLoc + 64 - this.localPlayer.currentY) * 3 * var5 / 2048;
      var10 = var7 * var8 + var6 * var9 >> 18;
      var7 = var7 * var9 - var6 * var8 >> 18;
      this.drawMinimapEntity(var2 + var3 / 2 + var10, 36 + var4 / 2 - var7, '\uffff');
    }

    for (int var12 = 0; var12 < this.groundItemCount; ++var12) {
      var6 = (this.groundItemX[var12] * this.magicLoc + 64 - this.localPlayer.currentX) * 3 * var5 / 2048;
      var7 = (this.groundItemY[var12] * this.magicLoc + 64 - this.localPlayer.currentY) * 3 * var5 / 2048;
      var10 = var7 * var8 + var6 * var9 >> 18;
      var7 = var7 * var9 - var6 * var8 >> 18;
      this.drawMinimapEntity(var2 + var3 / 2 + var10, 36 + var4 / 2 - var7, 16711680);
    }

    for (int var13 = 0; var13 < this.npcCount; ++var13) {
      Character var14 = this.npcs[var13];
      var6 = (var14.currentX - this.localPlayer.currentX) * 3 * var5 / 2048;
      var7 = (var14.currentY - this.localPlayer.currentY) * 3 * var5 / 2048;
      var10 = var7 * var8 + var6 * var9 >> 18;
      var7 = var7 * var9 - var6 * var8 >> 18;
      this.drawMinimapEntity(var2 + var3 / 2 + var10, 36 + var4 / 2 - var7, 16776960);
    }

    for (int var16 = 0; var16 < this.playerCount; ++var16) {
      Character var15 = this.players[var16];
      var6 = (var15.currentX - this.localPlayer.currentX) * 3 * var5 / 2048;
      var7 = (var15.currentY - this.localPlayer.currentY) * 3 * var5 / 2048;
      var10 = var7 * var8 + var6 * var9 >> 18;
      var7 = var7 * var9 - var6 * var8 >> 18;
      this.drawMinimapEntity(var2 + var3 / 2 + var10, 36 + var4 / 2 - var7, 16777215);
    }

    this.surface.drawCircle(var2 + var3 / 2, 36 + var4 / 2, 2, 16777215, 255);
    this.surface.drawMinimapSprite(var2 + 19, 55, this.spriteMedia + 24, this.cameraRotation + 128 & 255, 128);
    this.surface.setBounds(0, 0, this.gameWidth, this.gameHeight + 12);
    if (var1) {
      var2 = super.mouseX - (this.surface.width2 - 199);
      int var17 = super.mouseY - 36;
      if (var2 >= 40 && var17 >= 0 && var2 < 196 && var17 < 152) {
        var3 = 156;
        var4 = 152;
        var5 = 192;
        var2 = this.surface.width2 - 199;
        var2 += 40;
        var6 = (super.mouseX - (var2 + var3 / 2)) * 16384 / (3 * var5);
        var7 = (super.mouseY - (36 + var4 / 2)) * 16384 / (3 * var5);
        var8 = Scene.hm[1024 - this.cameraRotation * 4 & 1023];
        var9 = Scene.hm[(1024 - this.cameraRotation * 4 & 1023) + 1024];
        var10 = var7 * var8 + var6 * var9 >> 15;
        var7 = var7 * var9 - var6 * var8 >> 15;
        var6 = var10 + this.localPlayer.currentX;
        var7 = this.localPlayer.currentY - var7;
        if (this.mouseButtonClick == 1) {
          this.walkToActionSource(this.regionX, this.regionY, var6 / 128, var7 / 128, false);
        }

        this.mouseButtonClick = 0;
      }

    }
  }

  public void drawUITabPlayerInfo(boolean var1) {
    int var2 = this.surface.width2 - 199;
    this.surface.drawSprite(var2 - 49, 3, this.spriteMedia + 3);
    short var3 = 196;
    short var4 = 182;
    this.surface.drawBoxAlpha(var2, 36, var3, var4, Surface.rgb2long(181, 181, 181), 160);
    byte var5 = 48;
    this.surface.drawString("Skills", var2 + 5, var5, 3, 16776960);
    int var8 = var5 + 12;

    for (int var6 = 0; var6 < 10; ++var6) {
      if (var6 < 9) {
        this.surface.drawString(this.statNames[var6] + ":@yel@" + this.playerStatCurrent[var6] + "/" + this.playerStatBase[var6], var2 + 5, var8, 2, 16777215);
      }
      this.surface.drawString(this.statNames[var6 + 9] + ":@yel@" + this.playerStatCurrent[var6 + 9] + "/" + this.playerStatBase[var6 + 9], var2 + var3 / 2 - 8, var8 - 12, 2, 16777215);
      var8 += 12;
    }
    var8 -= 4;

    this.surface.drawString("Equipment Status", var2 + 5, var8, 3, 16776960);
    var8 += 12;

    for (int var7 = 0; var7 < 3; ++var7) {
      this.surface.drawString(this.equipmentStatNames[var7] + ":@yel@" + this.playerStatEquipment[var7], var2 + 5, var8, 2, 16777215);
      this.surface.drawString(this.equipmentStatNames[var7 + 3] + ":@yel@" + this.playerStatEquipment[var7 + 3], var2 + var3 / 2 + 25, var8, 2, 16777215);
      var8 += 12;
    }

  }

  public void drawUITabMagic(boolean var1) {
    int var2 = this.surface.width2 - 199;
    byte var3 = 36;
    this.surface.drawSprite(var2 - 49, 3, this.spriteMedia + 4);
    short var4 = 196;
    short var5 = 182;
    int var7;
    int var6 = var7 = Surface.rgb2long(160, 160, 160);
    if (this.tabMagicGoodEvil == 0) {
      var6 = Surface.rgb2long(220, 220, 220);
    } else {
      var7 = Surface.rgb2long(220, 220, 220);
    }

    this.surface.drawBoxAlpha(var2, var3, var4 / 2, 24, var6, 128);
    this.surface.drawBoxAlpha(var2 + var4 / 2, var3, var4 / 2, 24, var7, 128);
    this.surface.drawBoxAlpha(var2, var3 + 24, var4, 90, Surface.rgb2long(220, 220, 220), 128);
    this.surface.drawBoxAlpha(var2, var3 + 24 + 90, var4, var5 - 90 - 24, Surface.rgb2long(160, 160, 160), 128);
    this.surface.drawLineHoriz(var2, var3 + 24, var4, 0);
    this.surface.drawLineVert(var2 + var4 / 2, var3, 24, 0);
    this.surface.drawLineHoriz(var2, var3 + 113, var4, 0);
    this.surface.drawStringCenter("Good magic", var2 + var4 / 4, var3 + 16, 4, 0);
    this.surface.drawStringCenter("Evil magic", var2 + var4 / 4 + var4 / 2, var3 + 16, 4, 0);
    int var8;
    int var9;
    int var11;
    int var17;
    if (this.tabMagicGoodEvil == 0) {
      this.panelMagic.clearList(this.controlMagicPanel);
      var8 = 0;

      int var12;
      for (var9 = 0; var9 < GameData.qjb; ++var9) {
        String var10 = "@yel@";

        for (var11 = 0; var11 < GameData.ujb[var9]; ++var11) {
          var12 = GameData.xjb[var9][var11];
          if (!this.hasStaffOrRunes(var12, GameData.yjb[var9][var11])) {
            var10 = "@whi@";
            break;
          }
        }

        var12 = this.playerStatCurrent[9];
        if (GameData.tjb[var9] > var12) {
          var10 = "@bla@";
        }

        this.panelMagic.addListEntry(this.controlMagicPanel, var8++, var10 + "Level " + GameData.tjb[var9] + ": " + GameData.rjb[var9]);
      }

      this.panelMagic.drawPanel();
      var17 = this.panelMagic.getListEntryIndex(this.controlMagicPanel);
      if (var17 != -1) {
        this.surface.drawString("Level " + GameData.tjb[var17] + ": " + GameData.rjb[var17], var2 + 2, var3 + 124, 1, 0);
        this.surface.drawString(GameData.sjb[var17], var2 + 2, var3 + 136, 0, 0);

        for (var11 = 0; var11 < GameData.ujb[var17]; ++var11) {
          var12 = GameData.xjb[var17][var11];
          this.surface.drawSprite(var2 + 2 + var11 * 44, var3 + 150, this.nw + GameData.zfb[var12]);
          int var13 = this.getInventoryCount(var12);
          int var14 = GameData.yjb[var17][var11];
          String var15 = "@red@";
          if (this.hasStaffOrRunes(var12, var14)) {
            var15 = "@gre@";
          }

          this.surface.drawString(var15 + var13 + "/" + var14, var2 + 2 + var11 * 44, var3 + 150, 1, 16777215);
        }
      } else {
        this.surface.drawString("Point at a spell for a description", var2 + 2, var3 + 124, 1, 0);
      }
    }

    if (this.tabMagicGoodEvil == 1) {
      this.panelMagic.clearList(this.controlMagicPanel);
      var8 = 0;

      int var12;
      for (var9 = 0; var9 < GameData.qkb; ++var9) {
        String var10 = "@yel@";

        for (var11 = 0; var11 < GameData.ukb[var9]; ++var11) {
          var12 = GameData.xkb[var9][var11];
          if (!this.hasStaffOrRunes(var12, GameData.ykb[var9][var11])) {
            var10 = "@whi@";
            break;
          }
        }

        var12 = this.playerStatCurrent[10];
        if (GameData.tkb[var9] > var12) {
          var10 = "@bla@";
        }

        this.panelMagic.addListEntry(this.controlMagicPanel, var8++, var10 + "Level " + GameData.tkb[var9] + ": " + GameData.rkb[var9]);
      }

      this.panelMagic.drawPanel();
      var17 = this.panelMagic.getListEntryIndex(this.controlMagicPanel);
      if (var17 != -1) {
        this.surface.drawString("Level " + GameData.tkb[var17] + ": " + GameData.rkb[var17], var2 + 2, var3 + 124, 1, 0);
        this.surface.drawString(GameData.skb[var17], var2 + 2, var3 + 136, 0, 0);

        for (var11 = 0; var11 < GameData.ukb[var17]; ++var11) {
          var12 = GameData.xkb[var17][var11];
          this.surface.drawSprite(var2 + 2 + var11 * 44, var3 + 150, this.nw + GameData.zfb[var12]);
          int var13 = this.getInventoryCount(var12);
          int var14 = GameData.ykb[var17][var11];
          String var15 = "@red@";
          if (this.hasStaffOrRunes(var12, var14)) {
            var15 = "@gre@";
          }

          this.surface.drawString(var15 + var13 + "/" + var14, var2 + 2 + var11 * 44, var3 + 150, 1, 16777215);
        }
      } else {
        this.surface.drawString("Point at a spell for a description", var2 + 2, var3 + 124, 1, 0);
      }
    }

    if (var1) {
      var2 = super.mouseX - (this.surface.width2 - 199);
      int var16 = super.mouseY - 36;
      if (var2 >= 0 && var16 >= 0 && var2 < 196 && var16 < 182) {
        this.panelMagic.handleMouse(var2 + (this.surface.width2 - 199), var16 + 36, super.lastMouseButtonDown, super.mouseButtonDown);
        if (var16 <= 24 && this.mouseButtonClick == 1) {
          if (var2 < 98 && this.tabMagicGoodEvil == 1) {
            this.tabMagicGoodEvil = 0;
            this.panelMagic.resetListProps(this.controlMagicPanel);
          } else if (var2 > 98 && this.tabMagicGoodEvil == 0) {
            this.tabMagicGoodEvil = 1;
            this.panelMagic.resetListProps(this.controlMagicPanel);
          }
        }

        if (this.mouseButtonClick == 1 && this.tabMagicGoodEvil == 0) {
          var8 = this.panelMagic.getListEntryIndex(this.controlMagicPanel);
          if (var8 != -1) {
            var9 = this.playerStatCurrent[9];
            if (GameData.tjb[var8] > var9) {
              this.showMessage("Your good magic ability is not high enough for this spell", 3);
            } else {
              for (var17 = 0; var17 < GameData.ujb[var8]; ++var17) {
                var11 = GameData.xjb[var8][var17];
                if (!this.hasStaffOrRunes(var11, GameData.yjb[var8][var17])) {
                  this.showMessage("You don't have all the reagents you need for this spell", 3);
                  var17 = -1;
                  break;
                }
              }

              if (var17 == GameData.ujb[var8]) {
                this.selectedSpell = var8 + (0 << 8);
                this.selectedItemInventoryIndex = -1;
                this.textCast = "Cast ";
              }
            }
          }
        }

        if (this.mouseButtonClick == 1 && this.tabMagicGoodEvil == 1) {
          var8 = this.panelMagic.getListEntryIndex(this.controlMagicPanel);
          if (var8 != -1) {
            var9 = this.playerStatCurrent[10];
            if (GameData.tkb[var8] > var9) {
              this.showMessage("Your evil magic ability is not high enough for this spell", 3);
            } else {
              for (var17 = 0; var17 < GameData.ukb[var8]; ++var17) {
                var11 = GameData.xkb[var8][var17];
                if (!this.hasStaffOrRunes(var11, GameData.ykb[var8][var17])) {
                  this.showMessage("You don't have all the reagents you need for this spell", 3);
                  var17 = -1;
                  break;
                }
              }

              if (var17 == GameData.ukb[var8]) {
                this.selectedSpell = var8 + (1 << 8);
                this.selectedItemInventoryIndex = -1;
                this.textCast = "Cast ";
              }
            }
          }
        }

        this.mouseButtonClick = 0;
      }

    }
  }

  public void drawUITabSocial(boolean var1) {
    int var2 = this.surface.width2 - 199;
    byte var3 = 36;
    this.surface.drawSprite(var2 - 49, 3, this.spriteMedia + 5);
    short var4 = 196;
    short var5 = 182;
    int var7;
    int var6 = var7 = Surface.rgb2long(160, 160, 160);
    if (this.tabSocial == 0) {
      var6 = Surface.rgb2long(220, 220, 220);
    } else {
      var7 = Surface.rgb2long(220, 220, 220);
    }

    this.surface.drawBoxAlpha(var2, var3, var4 / 2, 24, var6, 128);
    this.surface.drawBoxAlpha(var2 + var4 / 2, var3, var4 / 2, 24, var7, 128);
    this.surface.drawBoxAlpha(var2, var3 + 24, var4, var5 - 24, Surface.rgb2long(220, 220, 220), 128);
    this.surface.drawLineHoriz(var2, var3 + 24, var4, 0);
    this.surface.drawLineVert(var2 + var4 / 2, var3, 24, 0);
    this.surface.drawLineHoriz(var2, var3 + var5 - 16, var4, 0);
    this.surface.drawStringCenter("Friends", var2 + var4 / 4, var3 + 16, 4, 0);
    this.surface.drawStringCenter("Ignore", var2 + var4 / 4 + var4 / 2, var3 + 16, 4, 0);
    this.panelSocial.clearList(this.icb);
    int var8;
    if (this.tabSocial == 0) {
      for (var8 = 0; var8 < super.friendListCount; ++var8) {
        String var9;
        if (super.friendListOnline[var8] == 2) {
          var9 = "@gre@";
        } else if (super.friendListOnline[var8] == 1) {
          var9 = "@yel@";
        } else {
          var9 = "@red@";
        }

        this.panelSocial.addListEntry(this.icb, var8, var9 + Utility.hash2username(super.friendListHashes[var8]) + "~439~@whi@Remove         WWWWWWWWWW");
      }
    }

    if (this.tabSocial == 1) {
      for (var8 = 0; var8 < super.ignoreListCount; ++var8) {
        this.panelSocial.addListEntry(this.icb, var8, "@yel@" + Utility.hash2username(super.ignoreList[var8]) + "~439~@whi@Remove         WWWWWWWWWW");
      }
    }

    this.panelSocial.drawPanel();
    int var11;
    if (this.tabSocial == 0) {
      var8 = this.panelSocial.getListEntryIndex(this.icb);
      if (var8 >= 0 && super.mouseX < 489) {
        if (super.mouseX > 429) {
          this.surface.drawStringCenter("Click to remove " + Utility.hash2username(super.friendListHashes[var8]), var2 + var4 / 2, var3 + 35, 1, 16777215);
        } else if (super.friendListOnline[var8] == 2) {
          this.surface.drawStringCenter("Click to message " + Utility.hash2username(super.friendListHashes[var8]), var2 + var4 / 2, var3 + 35, 1, 16777215);
        } else if (super.friendListOnline[var8] == 1) {
          this.surface.drawStringCenter(Utility.hash2username(super.friendListHashes[var8]) + " is on a different server", var2 + var4 / 2, var3 + 35, 1, 16777215);
        } else {
          this.surface.drawStringCenter(Utility.hash2username(super.friendListHashes[var8]) + " is offline", var2 + var4 / 2, var3 + 35, 1, 16777215);
        }
      } else {
        this.surface.drawStringCenter("Click a name to send a message", var2 + var4 / 2, var3 + 35, 1, 16777215);
      }

      if (super.mouseX > var2 && super.mouseX < var2 + var4 && super.mouseY > var3 + var5 - 16 && super.mouseY < var3 + var5) {
        var11 = 16776960;
      } else {
        var11 = 16777215;
      }

      this.surface.drawStringCenter("Click here to add a friend", var2 + var4 / 2, var3 + var5 - 3, 1, var11);
    }

    if (this.tabSocial == 1) {
      var8 = this.panelSocial.getListEntryIndex(this.icb);
      if (var8 >= 0 && super.mouseX < 489 && super.mouseX > 429) {
        if (super.mouseX > 429) {
          this.surface.drawStringCenter("Click to remove " + Utility.hash2username(super.ignoreList[var8]), var2 + var4 / 2, var3 + 35, 1, 16777215);
        }
      } else {
        this.surface.drawStringCenter("Blocking messages from:", var2 + var4 / 2, var3 + 35, 1, 16777215);
      }

      if (super.mouseX > var2 && super.mouseX < var2 + var4 && super.mouseY > var3 + var5 - 16 && super.mouseY < var3 + var5) {
        var11 = 16776960;
      } else {
        var11 = 16777215;
      }

      this.surface.drawStringCenter("Click here to add a name", var2 + var4 / 2, var3 + var5 - 3, 1, var11);
    }

    if (var1) {
      var2 = super.mouseX - (this.surface.width2 - 199);
      int var10 = super.mouseY - 36;
      if (var2 >= 0 && var10 >= 0 && var2 < 196 && var10 < 182) {
        this.panelSocial.handleMouse(var2 + (this.surface.width2 - 199), var10 + 36, super.lastMouseButtonDown, super.mouseButtonDown);
        if (var10 <= 24 && this.mouseButtonClick == 1) {
          if (var2 < 98 && this.tabSocial == 1) {
            this.tabSocial = 0;
            this.panelSocial.resetListProps(this.icb);
          } else if (var2 > 98 && this.tabSocial == 0) {
            this.tabSocial = 1;
            this.panelSocial.resetListProps(this.icb);
          }
        }

        if (this.mouseButtonClick == 1 && this.tabSocial == 0) {
          var8 = this.panelSocial.getListEntryIndex(this.icb);
          if (var8 >= 0 && super.mouseX < 489) {
            if (super.mouseX > 429) {
              this.y(super.friendListHashes[var8]);
            } else if (super.friendListOnline[var8] != 0) {
              this.showDialogSocialInput = 2;
              this.privateMessageTarget = super.friendListHashes[var8];
              super.inputPMCurrent = "";
              super.inputPMFinal = "";
            }
          }
        }

        if (this.mouseButtonClick == 1 && this.tabSocial == 1) {
          var8 = this.panelSocial.getListEntryIndex(this.icb);
          if (var8 >= 0 && super.mouseX < 489 && super.mouseX > 429) {
            this.cb(super.ignoreList[var8]);
          }
        }

        if (var10 > 166 && this.mouseButtonClick == 1 && this.tabSocial == 0) {
          this.showDialogSocialInput = 1;
          super.inputTextCurrent = "";
          super.inputTextFinal = "";
        }

        if (var10 > 166 && this.mouseButtonClick == 1 && this.tabSocial == 1) {
          this.showDialogSocialInput = 3;
          super.inputTextCurrent = "";
          super.inputTextFinal = "";
        }

        this.mouseButtonClick = 0;
      }

    }
  }

  public void drawUITabOptions(boolean var1) {
    int var2 = this.surface.width2 - 199;
    byte var3 = 36;
    this.surface.drawSprite(var2 - 49, 3, this.spriteMedia + 6);
    short var4 = 196;
    this.surface.drawBoxAlpha(var2, 36, var4, 90, Surface.rgb2long(181, 181, 181), 160);
    this.surface.drawBoxAlpha(var2, 126, var4, 105, Surface.rgb2long(201, 2011, 201), 160);
    this.surface.drawBoxAlpha(var2, 231, var4, 30, Surface.rgb2long(181, 181, 181), 160);
    int var5 = var2 + 3;
    int var6 = var3 + 15;
    this.surface.drawString("Game options - click to toggle", var5, var6, 1, 0);
    var6 += 15;
    if (this.optionCameraModeAuto) {
      this.surface.drawString("Camera angle mode - @gre@Auto", var5, var6, 1, 16777215);
    } else {
      this.surface.drawString("Camera angle mode - @red@Manual", var5, var6, 1, 16777215);
    }

    var6 += 15;
    if (this.optionMouseButtonOne) {
      this.surface.drawString("Mouse buttons - @red@One", var5, var6, 1, 16777215);
    } else {
      this.surface.drawString("Mouse buttons - @gre@Two", var5, var6, 1, 16777215);
    }

    var6 += 15;
    if (this.optionPlayerKiller) {
      this.surface.drawString("Player type: @red@Player-Killer", var5, var6, 1, 16777215);
    } else {
      this.surface.drawString("Player type: @gre@Non Player-Killer", var5, var6, 1, 16777215);
    }

    var6 += 15;
    int var7 = 16777215;
    if (super.mouseX > var5 && super.mouseX < var5 + var4 && super.mouseY > var6 - 12 && super.mouseY < var6 + 4) {
      var7 = 16776960;
    }

    this.surface.drawString("Change password", var5, var6, 1, var7);
    var6 += 15;
    var6 += 15;
    this.surface.drawString("Privacy settings. Will be applied to", var2 + 3, var6, 1, 0);
    var6 += 15;
    this.surface.drawString("all people not on your friends list", var2 + 3, var6, 1, 0);
    var6 += 15;
    if (super.settingsHideStatus == 0) {
      this.surface.drawString("Hide online-status: @red@<off>", var2 + 3, var6, 1, 16777215);
    } else {
      this.surface.drawString("Hide online-status: @gre@<on>", var2 + 3, var6, 1, 16777215);
    }

    var6 += 15;
    if (super.settingsBlockChat == 0) {
      this.surface.drawString("Block chat messages: @red@<off>", var2 + 3, var6, 1, 16777215);
    } else {
      this.surface.drawString("Block chat messages: @gre@<on>", var2 + 3, var6, 1, 16777215);
    }

    var6 += 15;
    if (super.settingsBlockPrivate == 0) {
      this.surface.drawString("Block private messages: @red@<off>", var2 + 3, var6, 1, 16777215);
    } else {
      this.surface.drawString("Block private messages: @gre@<on>", var2 + 3, var6, 1, 16777215);
    }

    var6 += 15;
    if (super.settingsBlockTrade == 0) {
      this.surface.drawString("Block trade requests: @red@<off>", var2 + 3, var6, 1, 16777215);
    } else {
      this.surface.drawString("Block trade requests: @gre@<on>", var2 + 3, var6, 1, 16777215);
    }

    var6 += 15;
    var6 += 15;
    var7 = 16777215;
    if (super.mouseX > var5 && super.mouseX < var5 + var4 && super.mouseY > var6 - 12 && super.mouseY < var6 + 4) {
      var7 = 16776960;
    }

    this.surface.drawString("Click here to logout", var2 + 3, var6, 1, var7);
    if (var1) {
      var2 = super.mouseX - (this.surface.width2 - 199);
      int var11 = super.mouseY - 36;
      if (var2 >= 0 && var11 >= 0 && var2 < 196 && var11 < 231) {
        int var8 = this.surface.width2 - 199;
        byte var9 = 36;
        var4 = 196;
        var5 = var8 + 3;
        var6 = var9 + 30;
        if (super.mouseX > var5 && super.mouseX < var5 + var4 && super.mouseY > var6 - 12 && super.mouseY < var6 + 4 && this.mouseButtonClick == 1) {
          this.optionCameraModeAuto = !this.optionCameraModeAuto;
          super.clientStream.newPacket(213);
          super.clientStream.writeByte(0);
          super.clientStream.writeByte(this.optionCameraModeAuto ? 1 : 0);
          super.clientStream.flushPacket();
        }

        var6 += 15;
        if (super.mouseX > var5 && super.mouseX < var5 + var4 && super.mouseY > var6 - 12 && super.mouseY < var6 + 4 && this.mouseButtonClick == 1) {
          this.optionMouseButtonOne = !this.optionMouseButtonOne;
          super.clientStream.newPacket(213);
          super.clientStream.writeByte(2);
          super.clientStream.writeByte(this.optionMouseButtonOne ? 1 : 0);
          super.clientStream.flushPacket();
        }

        var6 += 15;
        if (super.mouseX > var5 && super.mouseX < var5 + var4 && super.mouseY > var6 - 12 && super.mouseY < var6 + 4 && this.mouseButtonClick == 1 && this.et > 0) {
          this.ft = 1;
        }

        var6 += 15;
        if (super.mouseX > var5 && super.mouseX < var5 + var4 && super.mouseY > var6 - 12 && super.mouseY < var6 + 4 && this.mouseButtonClick == 1) {
          this.gt = 1;
          super.inputTextCurrent = "";
          super.inputTextFinal = "";
        }

        boolean var10 = false;
        var6 += 60;
        if (super.mouseX > var5 && super.mouseX < var5 + var4 && super.mouseY > var6 - 12 && super.mouseY < var6 + 4 && this.mouseButtonClick == 1) {
          super.settingsHideStatus = 1 - super.settingsHideStatus;
          var10 = true;
        }

        var6 += 15;
        if (super.mouseX > var5 && super.mouseX < var5 + var4 && super.mouseY > var6 - 12 && super.mouseY < var6 + 4 && this.mouseButtonClick == 1) {
          super.settingsBlockChat = 1 - super.settingsBlockChat;
          var10 = true;
        }

        var6 += 15;
        if (super.mouseX > var5 && super.mouseX < var5 + var4 && super.mouseY > var6 - 12 && super.mouseY < var6 + 4 && this.mouseButtonClick == 1) {
          super.settingsBlockPrivate = 1 - super.settingsBlockPrivate;
          var10 = true;
        }

        var6 += 15;
        if (super.mouseX > var5 && super.mouseX < var5 + var4 && super.mouseY > var6 - 12 && super.mouseY < var6 + 4 && this.mouseButtonClick == 1) {
          super.settingsBlockTrade = 1 - super.settingsBlockTrade;
          var10 = true;
        }

        if (var10) {
          this.sendPrivacySettings(super.settingsHideStatus, super.settingsBlockChat, super.settingsBlockPrivate, super.settingsBlockTrade, 0);
        }

        var6 += 30;
        if (super.mouseX > var5 && super.mouseX < var5 + var4 && super.mouseY > var6 - 12 && super.mouseY < var6 + 4 && this.mouseButtonClick == 1) {
          if (this.combatTimeout > 450) {
            this.showMessage("@cya@You can't logout during combat!", 3);
          } else {
            if (this.combatTimeout <= 0) {
              this.closeConnection();
              return;
            }

            this.showMessage("@cya@You can't logout for 10 seconds after combat", 3);
          }
        }

        this.mouseButtonClick = 0;
      }

    }
  }

  public void createRightClickMenu() {
    int var1 = -1;

    for (int var2 = 0; var2 < this.objectCount; ++var2) {
      this.objectAlreadyInMenu[var2] = false;
    }

    for (int var3 = 0; var3 < this.wallObjectCount; ++var3) {
      this.wallObjectAlreadyInMenu[var3] = false;
    }

    int var4 = this.scene.getModelsUnderMouseCount();
    GameModel[] var5 = this.scene.getModelsUnderMouse();
    int[] var6 = this.scene.getPlayersUnderMouse();

    for (int var7 = 0; var7 < var4; ++var7) {
      int var8 = var6[var7];
      GameModel var9 = var5[var7];
      if (var9.faceTag[var8] <= 65535 || var9.faceTag[var8] >= 200000 && var9.faceTag[var8] <= 300000) {
        int var10;
        int var11;
        if (var9 != this.scene.currentModel) {
          if (var9 != null && var9.key >= 10000) {
            var10 = var9.key - 10000;
            var11 = this.wallObjectID[var10];
            if (!this.wallObjectAlreadyInMenu[var10]) {
              if (this.selectedSpell >= 0) {
                int scb = this.selectedSpell & 0xFF;
                boolean pcb = (this.selectedSpell & 0x100) == 0;
                if ((pcb && GameData.vjb[scb] == 4) || (!pcb && GameData.vkb[scb] == 4)) {
                  this.menuItemText1[this.menuItemsCount] = this.textCast + (pcb ? GameData.rjb[scb] : GameData.rkb[scb]) + " on";
                  this.menuItemText2[this.menuItemsCount] = "@cya@" + GameData.mib[var11][0];
                  this.menuItemID[this.menuItemsCount] = 300;
                  this.menuItemX[this.menuItemsCount] = this.wallObjectX[var10];
                  this.menuItemY[this.menuItemsCount] = this.wallObjectY[var10];
                  this.menuSourceType[this.menuItemsCount] = this.wallObjectDirection[var10];
                  this.menuSourceIndex[this.menuItemsCount] = this.selectedSpell;
                  ++this.menuItemsCount;
                }
              } else if (this.selectedItemInventoryIndex >= 0) {
                this.menuItemText1[this.menuItemsCount] = "Use " + this.selectedItemName + " with";
                this.menuItemText2[this.menuItemsCount] = "@cya@" + GameData.mib[var11][0];
                this.menuItemID[this.menuItemsCount] = 310;
                this.menuItemX[this.menuItemsCount] = this.wallObjectX[var10];
                this.menuItemY[this.menuItemsCount] = this.wallObjectY[var10];
                this.menuSourceType[this.menuItemsCount] = this.wallObjectDirection[var10];
                this.menuSourceIndex[this.menuItemsCount] = this.selectedItemInventoryIndex;
                ++this.menuItemsCount;
              } else {
                if (!GameData.oib[var11].equalsIgnoreCase("WalkTo")) {
                  this.menuItemText1[this.menuItemsCount] = GameData.oib[var11];
                  this.menuItemText2[this.menuItemsCount] = "@cya@" + GameData.mib[var11][0];
                  this.menuItemID[this.menuItemsCount] = 320;
                  this.menuItemX[this.menuItemsCount] = this.wallObjectX[var10];
                  this.menuItemY[this.menuItemsCount] = this.wallObjectY[var10];
                  this.menuSourceType[this.menuItemsCount] = this.wallObjectDirection[var10];
                  ++this.menuItemsCount;
                }

                if (!GameData.pib[var11].equalsIgnoreCase("Examine")) {
                  this.menuItemText1[this.menuItemsCount] = GameData.pib[var11];
                  this.menuItemText2[this.menuItemsCount] = "@cya@" + GameData.mib[var11][0];
                  this.menuItemID[this.menuItemsCount] = 2300;
                  this.menuItemX[this.menuItemsCount] = this.wallObjectX[var10];
                  this.menuItemY[this.menuItemsCount] = this.wallObjectY[var10];
                  this.menuSourceType[this.menuItemsCount] = this.wallObjectDirection[var10];
                  ++this.menuItemsCount;
                }

                this.menuItemText1[this.menuItemsCount] = "Examine";
                this.menuItemText2[this.menuItemsCount] = "@cya@" + GameData.mib[var11][0];
                this.menuItemID[this.menuItemsCount] = 3300;
                this.menuSourceType[this.menuItemsCount] = var11;
                ++this.menuItemsCount;
              }

              this.wallObjectAlreadyInMenu[var10] = true;
            }
          } else if (var9 != null && var9.key >= 0) {
            var10 = var9.key;
            var11 = this.objectID[var10];
            if (!this.objectAlreadyInMenu[var10]) {
              if (this.selectedSpell >= 0) {
                int scb = this.selectedSpell & 0xFF;
                boolean pcb = (this.selectedSpell & 0x100) == 0;
                if ((pcb && GameData.vjb[scb] == 5) || (!pcb && GameData.vkb[scb] == 5)) {
                  this.menuItemText1[this.menuItemsCount] = this.textCast + (pcb ? GameData.rjb[scb] : GameData.rkb[scb]) + " on";
                  this.menuItemText2[this.menuItemsCount] = "@cya@" + GameData.bib[var11][0];
                  this.menuItemID[this.menuItemsCount] = 400;
                  this.menuItemX[this.menuItemsCount] = this.objectX[var10];
                  this.menuItemY[this.menuItemsCount] = this.objectY[var10];
                  this.menuSourceType[this.menuItemsCount] = this.objectDirection[var10];
                  this.menuSourceIndex[this.menuItemsCount] = this.objectID[var10];
                  this.menuTargetIndex[this.menuItemsCount] = this.selectedSpell;
                  ++this.menuItemsCount;
                }
              } else if (this.selectedItemInventoryIndex >= 0) {
                this.menuItemText1[this.menuItemsCount] = "Use " + this.selectedItemName + " with";
                this.menuItemText2[this.menuItemsCount] = "@cya@" + GameData.bib[var11][0];
                this.menuItemID[this.menuItemsCount] = 410;
                this.menuItemX[this.menuItemsCount] = this.objectX[var10];
                this.menuItemY[this.menuItemsCount] = this.objectY[var10];
                this.menuSourceType[this.menuItemsCount] = this.objectDirection[var10];
                this.menuSourceIndex[this.menuItemsCount] = this.objectID[var10];
                this.menuTargetIndex[this.menuItemsCount] = this.selectedItemInventoryIndex;
                ++this.menuItemsCount;
              } else {
                if (!GameData.dib[var11].equalsIgnoreCase("WalkTo")) {
                  this.menuItemText1[this.menuItemsCount] = GameData.dib[var11];
                  this.menuItemText2[this.menuItemsCount] = "@cya@" + GameData.bib[var11][0];
                  this.menuItemID[this.menuItemsCount] = 420;
                  this.menuItemX[this.menuItemsCount] = this.objectX[var10];
                  this.menuItemY[this.menuItemsCount] = this.objectY[var10];
                  this.menuSourceType[this.menuItemsCount] = this.objectDirection[var10];
                  this.menuSourceIndex[this.menuItemsCount] = this.objectID[var10];
                  ++this.menuItemsCount;
                }

                if (!GameData.eib[var11].equalsIgnoreCase("Examine")) {
                  this.menuItemText1[this.menuItemsCount] = GameData.eib[var11];
                  this.menuItemText2[this.menuItemsCount] = "@cya@" + GameData.bib[var11][0];
                  this.menuItemID[this.menuItemsCount] = 2400;
                  this.menuItemX[this.menuItemsCount] = this.objectX[var10];
                  this.menuItemY[this.menuItemsCount] = this.objectY[var10];
                  this.menuSourceType[this.menuItemsCount] = this.objectDirection[var10];
                  this.menuSourceIndex[this.menuItemsCount] = this.objectID[var10];
                  ++this.menuItemsCount;
                }

                this.menuItemText1[this.menuItemsCount] = "Examine";
                this.menuItemText2[this.menuItemsCount] = "@cya@" + GameData.bib[var11][0];
                this.menuItemID[this.menuItemsCount] = 3400;
                this.menuSourceType[this.menuItemsCount] = var11;
                ++this.menuItemsCount;
              }

              this.objectAlreadyInMenu[var10] = true;
            }
          } else {
            if (var8 >= 0) {
              var8 = var9.faceTag[var8] - 200000;
            }

            if (var8 >= 0) {
              var1 = var8;
            }
          }
        } else {
          var10 = var9.faceTag[var8] % 10000;
          var11 = var9.faceTag[var8] / 10000;
          String var12;
          int var13;
          int var14;
          if (var11 == 1) {
            var12 = "";
            var13 = -1;
            var14 = this.players[var10].attackable;
            if (var14 == 1) {
              var13 = 0;
              if (this.localPlayer.level > 0 && this.players[var10].level > 0) {
                var13 = this.localPlayer.level - this.players[var10].level;
              }

              if (var13 < 0) {
                var12 = "@or1@";
              }

              if (var13 < -3) {
                var12 = "@or2@";
              }

              if (var13 < -6) {
                var12 = "@or3@";
              }

              if (var13 < -9) {
                var12 = "@red@";
              }

              if (var13 > 0) {
                var12 = "@gr1@";
              }

              if (var13 > 3) {
                var12 = "@gr2@";
              }

              if (var13 > 6) {
                var12 = "@gr3@";
              }

              if (var13 > 9) {
                var12 = "@gre@";
              }

              var12 = " " + var12 + "(level-" + this.players[var10].level + ")";
            }

            if (this.selectedSpell >= 0) {
              int scb = this.selectedSpell & 0xFF;
              boolean pcb = (this.selectedSpell & 0x100) == 0;
              if ((pcb && (GameData.vjb[scb] == 1 || GameData.vjb[scb] == 2 && var14 == 1 && this.localPlayer.attackable == 1))
                || (!pcb && (GameData.vkb[scb] == 1 || GameData.vkb[scb] == 2 && var14 == 1 && this.localPlayer.attackable == 1))) {
                this.menuItemText1[this.menuItemsCount] = this.textCast + (pcb ? GameData.rjb[scb] : GameData.rkb[scb]) + " on";
                this.menuItemText2[this.menuItemsCount] = "@whi@" + this.players[var10].name;
                this.menuItemID[this.menuItemsCount] = 800;
                this.menuItemX[this.menuItemsCount] = this.players[var10].currentX;
                this.menuItemY[this.menuItemsCount] = this.players[var10].currentY;
                this.menuSourceType[this.menuItemsCount] = this.players[var10].serverIndex;
                this.menuSourceIndex[this.menuItemsCount] = this.selectedSpell;
                ++this.menuItemsCount;
              }
            } else if (this.selectedItemInventoryIndex >= 0) {
              this.menuItemText1[this.menuItemsCount] = "Use " + this.selectedItemName + " with";
              this.menuItemText2[this.menuItemsCount] = "@whi@" + this.players[var10].name;
              this.menuItemID[this.menuItemsCount] = 810;
              this.menuItemX[this.menuItemsCount] = this.players[var10].currentX;
              this.menuItemY[this.menuItemsCount] = this.players[var10].currentY;
              this.menuSourceType[this.menuItemsCount] = this.players[var10].serverIndex;
              this.menuSourceIndex[this.menuItemsCount] = this.selectedItemInventoryIndex;
              ++this.menuItemsCount;
            } else {
              if (var14 == 1 && this.localPlayer.attackable == 1) {
                this.menuItemText1[this.menuItemsCount] = "Attack";
                this.menuItemText2[this.menuItemsCount] = "@whi@" + this.players[var10].name + var12;
                if (var13 >= 0 && var13 < 5) {
                  this.menuItemID[this.menuItemsCount] = 805;
                } else {
                  this.menuItemID[this.menuItemsCount] = 2805;
                }

                this.menuItemX[this.menuItemsCount] = this.players[var10].currentX;
                this.menuItemY[this.menuItemsCount] = this.players[var10].currentY;
                this.menuSourceType[this.menuItemsCount] = this.players[var10].serverIndex;
                ++this.menuItemsCount;
              }

              this.menuItemText1[this.menuItemsCount] = "Trade with";
              this.menuItemText2[this.menuItemsCount] = "@whi@" + this.players[var10].name;
              this.menuItemID[this.menuItemsCount] = 2810;
              this.menuSourceType[this.menuItemsCount] = this.players[var10].serverIndex;
              ++this.menuItemsCount;
              this.menuItemText1[this.menuItemsCount] = "Follow";
              this.menuItemText2[this.menuItemsCount] = "@whi@" + this.players[var10].name;
              this.menuItemID[this.menuItemsCount] = 2820;
              this.menuSourceType[this.menuItemsCount] = this.players[var10].serverIndex;
              ++this.menuItemsCount;
            }
          } else if (var11 == 2) {
            if (this.selectedSpell >= 0) {
              int scb = this.selectedSpell & 0xFF;
              boolean pcb = (this.selectedSpell & 0x100) == 0;
              if ((pcb && GameData.vjb[scb] == 3) || (!pcb && GameData.vkb[scb] == 3)) {
                this.menuItemText1[this.menuItemsCount] = this.textCast + (pcb ? GameData.rjb[scb] : GameData.rkb[scb]) + " on";
                this.menuItemText2[this.menuItemsCount] = "@lre@" + GameData.vfb[this.groundItemID[var10]][0];
                this.menuItemID[this.menuItemsCount] = 200;
                this.menuItemX[this.menuItemsCount] = this.groundItemX[var10];
                this.menuItemY[this.menuItemsCount] = this.groundItemY[var10];
                this.menuSourceType[this.menuItemsCount] = this.groundItemID[var10];
                this.menuSourceIndex[this.menuItemsCount] = this.selectedSpell;
                ++this.menuItemsCount;
              }
            } else if (this.selectedItemInventoryIndex >= 0) {
              this.menuItemText1[this.menuItemsCount] = "Use " + this.selectedItemName + " with";
              this.menuItemText2[this.menuItemsCount] = "@lre@" + GameData.vfb[this.groundItemID[var10]][0];
              this.menuItemID[this.menuItemsCount] = 210;
              this.menuItemX[this.menuItemsCount] = this.groundItemX[var10];
              this.menuItemY[this.menuItemsCount] = this.groundItemY[var10];
              this.menuSourceType[this.menuItemsCount] = this.groundItemID[var10];
              this.menuSourceIndex[this.menuItemsCount] = this.selectedItemInventoryIndex;
              ++this.menuItemsCount;
            } else {
              this.menuItemText1[this.menuItemsCount] = "Take";
              this.menuItemText2[this.menuItemsCount] = "@lre@" + GameData.vfb[this.groundItemID[var10]][0];
              this.menuItemID[this.menuItemsCount] = 220;
              this.menuItemX[this.menuItemsCount] = this.groundItemX[var10];
              this.menuItemY[this.menuItemsCount] = this.groundItemY[var10];
              this.menuSourceType[this.menuItemsCount] = this.groundItemID[var10];
              ++this.menuItemsCount;
              this.menuItemText1[this.menuItemsCount] = "Examine";
              this.menuItemText2[this.menuItemsCount] = "@lre@" + GameData.vfb[this.groundItemID[var10]][0];
              this.menuItemID[this.menuItemsCount] = 3200;
              this.menuSourceType[this.menuItemsCount] = this.groundItemID[var10];
              ++this.menuItemsCount;
            }
          } else if (var11 == 3) {
            var12 = "";
            var13 = -1;
            var14 = this.npcs[var10].npcID;
            if (GameData.vgb[var14] > 0) {
              int var15 = (GameData.rgb[var14] + GameData.ugb[var14] + GameData.sgb[var14] + GameData.tgb[var14]) / 4;
              int var16 = (this.playerStatBase[0] + this.playerStatBase[1] + this.playerStatBase[2] + this.playerStatBase[3] + 27) / 4;
              var13 = var16 - var15;
              var12 = "@yel@";
              if (var13 < 0) {
                var12 = "@or1@";
              }

              if (var13 < -3) {
                var12 = "@or2@";
              }

              if (var13 < -6) {
                var12 = "@or3@";
              }

              if (var13 < -9) {
                var12 = "@red@";
              }

              if (var13 > 0) {
                var12 = "@gr1@";
              }

              if (var13 > 3) {
                var12 = "@gr2@";
              }

              if (var13 > 6) {
                var12 = "@gr3@";
              }

              if (var13 > 9) {
                var12 = "@gre@";
              }

              var12 = " " + var12 + "(level-" + var15 + ")";
            }

            if (this.selectedSpell >= 0) {
              int scb = this.selectedSpell & 0xFF;
              boolean pcb = (this.selectedSpell & 0x100) == 0;
              if ((pcb && GameData.vjb[scb] == 2) || (!pcb && GameData.vkb[scb] == 2)) {
                this.menuItemText1[this.menuItemsCount] = this.textCast + (pcb ? GameData.rjb[scb] : GameData.rkb[scb]) + " on";
                this.menuItemText2[this.menuItemsCount] = "@yel@" + GameData.pgb[this.npcs[var10].npcID][0];
                this.menuItemID[this.menuItemsCount] = 700;
                this.menuItemX[this.menuItemsCount] = this.npcs[var10].currentX;
                this.menuItemY[this.menuItemsCount] = this.npcs[var10].currentY;
                this.menuSourceType[this.menuItemsCount] = this.npcs[var10].serverIndex;
                this.menuSourceIndex[this.menuItemsCount] = this.selectedSpell;
                ++this.menuItemsCount;
              }
            } else if (this.selectedItemInventoryIndex >= 0) {
              this.menuItemText1[this.menuItemsCount] = "Use " + this.selectedItemName + " with";
              this.menuItemText2[this.menuItemsCount] = "@yel@" + GameData.pgb[this.npcs[var10].npcID][0];
              this.menuItemID[this.menuItemsCount] = 710;
              this.menuItemX[this.menuItemsCount] = this.npcs[var10].currentX;
              this.menuItemY[this.menuItemsCount] = this.npcs[var10].currentY;
              this.menuSourceType[this.menuItemsCount] = this.npcs[var10].serverIndex;
              this.menuSourceIndex[this.menuItemsCount] = this.selectedItemInventoryIndex;
              ++this.menuItemsCount;
            } else {
              if (GameData.vgb[var14] > 0) {
                this.menuItemText1[this.menuItemsCount] = "Attack";
                this.menuItemText2[this.menuItemsCount] = "@yel@" + GameData.pgb[this.npcs[var10].npcID][0] + var12;
                if (var13 >= 0) {
                  this.menuItemID[this.menuItemsCount] = 715;
                } else {
                  this.menuItemID[this.menuItemsCount] = 2715;
                }

                this.menuItemX[this.menuItemsCount] = this.npcs[var10].currentX;
                this.menuItemY[this.menuItemsCount] = this.npcs[var10].currentY;
                this.menuSourceType[this.menuItemsCount] = this.npcs[var10].serverIndex;
                ++this.menuItemsCount;
              }

              this.menuItemText1[this.menuItemsCount] = "Talk-to";
              this.menuItemText2[this.menuItemsCount] = "@yel@" + GameData.pgb[this.npcs[var10].npcID][0];
              this.menuItemID[this.menuItemsCount] = 720;
              this.menuItemX[this.menuItemsCount] = this.npcs[var10].currentX;
              this.menuItemY[this.menuItemsCount] = this.npcs[var10].currentY;
              this.menuSourceType[this.menuItemsCount] = this.npcs[var10].serverIndex;
              ++this.menuItemsCount;
              this.menuItemText1[this.menuItemsCount] = "Examine";
              this.menuItemText2[this.menuItemsCount] = "@yel@" + GameData.pgb[this.npcs[var10].npcID][0];
              this.menuItemID[this.menuItemsCount] = 3700;
              this.menuSourceType[this.menuItemsCount] = this.npcs[var10].npcID;
              ++this.menuItemsCount;
            }
          }
        }
      }
    }

    int scb = this.selectedSpell & 0xFF;
    boolean pcb = (this.selectedSpell & 0x100) == 0;
    if (this.selectedSpell >= 0 && ((pcb && GameData.vjb[scb] <= 1) || (!pcb && GameData.vkb[scb] <= 1))) {
      this.menuItemText1[this.menuItemsCount] = this.textCast + "on self";
      this.menuItemText2[this.menuItemsCount] = "";
      this.menuItemID[this.menuItemsCount] = 1000;
      this.menuSourceType[this.menuItemsCount] = this.selectedSpell;
      ++this.menuItemsCount;
    }

    if (var1 != -1) {
      if (this.selectedSpell >= 0) {
        if ((pcb && GameData.vjb[scb] == 6) || (!pcb && GameData.vkb[scb] == 6)) {
          this.menuItemText1[this.menuItemsCount] = this.textCast + "on ground";
          this.menuItemText2[this.menuItemsCount] = "";
          this.menuItemID[this.menuItemsCount] = 900;
          this.menuItemX[this.menuItemsCount] = this.world.mouseX[var1];
          this.menuItemY[this.menuItemsCount] = this.world.mouseY[var1];
          this.menuSourceType[this.menuItemsCount] = this.selectedSpell;
          ++this.menuItemsCount;
          return;
        }
      } else if (this.selectedItemInventoryIndex < 0) {
        this.menuItemText1[this.menuItemsCount] = "Walk here";
        this.menuItemText2[this.menuItemsCount] = "";
        this.menuItemID[this.menuItemsCount] = 920;
        this.menuItemX[this.menuItemsCount] = this.world.mouseX[var1];
        this.menuItemY[this.menuItemsCount] = this.world.mouseY[var1];
        ++this.menuItemsCount;
      }
    }

  }

  public void drawRightClickMenu() {
    int var1;
    int var2;
    int var3;
    if (this.mouseButtonClick == 0) {
      if (super.mouseX >= this.menuX - 10 && super.mouseY >= this.menuY - 10 && super.mouseX <= this.menuX + this.menuWidth + 10 && super.mouseY <= this.menuY + this.hv + 10) {
        this.surface.drawBoxAlpha(this.menuX, this.menuY, this.menuWidth, this.hv, 13684944, 160);
        this.surface.drawString("Choose option", this.menuX + 2, this.menuY + 12, 1, '\uffff');

        for (var1 = 0; var1 < this.menuItemsCount; ++var1) {
          var2 = this.menuX + 2;
          var3 = this.menuY + 27 + var1 * 15;
          int var4 = 16777215;
          if (super.mouseX > var2 - 2 && super.mouseY > var3 - 12 && super.mouseY < var3 + 4 && super.mouseX < var2 - 3 + this.menuWidth) {
            var4 = 16776960;
          }

          this.surface.drawString(this.menuItemText1[this.menuIndices[var1]] + " " + this.menuItemText2[this.menuIndices[var1]], var2, var3, 1, var4);
        }

      } else {
        this.showRightClickMenu = false;
      }
    } else {
      for (var1 = 0; var1 < this.menuItemsCount; ++var1) {
        var2 = this.menuX + 2;
        var3 = this.menuY + 27 + var1 * 15;
        if (super.mouseX > var2 - 2 && super.mouseY > var3 - 12 && super.mouseY < var3 + 4 && super.mouseX < var2 - 3 + this.menuWidth) {
          this.menuItemClick(this.menuIndices[var1]);
          break;
        }
      }

      this.mouseButtonClick = 0;
      this.showRightClickMenu = false;
    }
  }

  public void createTopMouseMenu() {
    if (this.selectedSpell >= 0 || this.selectedItemInventoryIndex >= 0) {
      this.menuItemText1[this.menuItemsCount] = "Cancel";
      this.menuItemText2[this.menuItemsCount] = "";
      this.menuItemID[this.menuItemsCount] = 4000;
      ++this.menuItemsCount;
    }

    for (int var1 = 0; var1 < this.menuItemsCount; this.menuIndices[var1] = var1++) {
      ;
    }

    boolean var2 = false;

    int var3;
    int var4;
    while (!var2) {
      var2 = true;

      for (var3 = 0; var3 < this.menuItemsCount - 1; ++var3) {
        var4 = this.menuIndices[var3];
        int var5 = this.menuIndices[var3 + 1];
        if (this.menuItemID[var4] > this.menuItemID[var5]) {
          this.menuIndices[var3] = var5;
          this.menuIndices[var3 + 1] = var4;
          var2 = false;
        }
      }
    }

    if (this.menuItemsCount > 20) {
      this.menuItemsCount = 20;
    }

    if (this.menuItemsCount > 0) {
      var3 = -1;

      for (var4 = 0; var4 < this.menuItemsCount; ++var4) {
        if (this.menuItemText2[this.menuIndices[var4]] != null && this.menuItemText2[this.menuIndices[var4]].length() > 0) {
          var3 = var4;
          break;
        }
      }

      String var8 = null;
      if ((this.selectedItemInventoryIndex >= 0 || this.selectedSpell >= 0) && this.menuItemsCount == 1) {
        var8 = "Choose a target";
      } else if ((this.selectedItemInventoryIndex >= 0 || this.selectedSpell >= 0) && this.menuItemsCount > 1) {
        var8 = "@whi@" + this.menuItemText1[this.menuIndices[0]] + " " + this.menuItemText2[this.menuIndices[0]];
      } else if (var3 != -1) {
        var8 = this.menuItemText2[this.menuIndices[var3]] + ": @whi@" + this.menuItemText1[this.menuIndices[0]];
      }

      if (this.menuItemsCount == 2 && var8 != null) {
        var8 = var8 + "@whi@ / 1 more option";
      }

      if (this.menuItemsCount > 2 && var8 != null) {
        var8 = var8 + "@whi@ / " + (this.menuItemsCount - 1) + " more options";
      }

      if (var8 != null) {
        this.surface.drawString(var8, 6, 14, 1, 16776960);
      }

      if (!this.optionMouseButtonOne && this.mouseButtonClick == 1 || this.optionMouseButtonOne && this.mouseButtonClick == 1 && this.menuItemsCount == 1) {
        this.menuItemClick(this.menuIndices[0]);
        this.mouseButtonClick = 0;
        return;
      }

      if (!this.optionMouseButtonOne && this.mouseButtonClick == 2 || this.optionMouseButtonOne && this.mouseButtonClick == 1) {
        this.hv = (this.menuItemsCount + 1) * 15;
        this.menuWidth = this.surface.textWidth("Choose option", 1) + 5;

        for (int var6 = 0; var6 < this.menuItemsCount; ++var6) {
          int var7 = this.surface.textWidth(this.menuItemText1[var6] + " " + this.menuItemText2[var6], 1) + 5;
          if (var7 > this.menuWidth) {
            this.menuWidth = var7;
          }
        }

        this.menuX = super.mouseX - this.menuWidth / 2;
        this.menuY = super.mouseY - 7;
        this.showRightClickMenu = true;
        if (this.menuX < 0) {
          this.menuX = 0;
        }

        if (this.menuY < 0) {
          this.menuY = 0;
        }

        if (this.menuX + this.menuWidth > 510) {
          this.menuX = 510 - this.menuWidth;
        }

        if (this.menuY + this.hv > 315) {
          this.menuY = 315 - this.hv;
        }

        this.mouseButtonClick = 0;
      }
    }

  }

  public void menuItemClick(int var1) {
    int var2 = this.menuItemX[var1];
    int var3 = this.menuItemY[var1];
    int var4 = this.menuSourceType[var1];
    int var5 = this.menuSourceIndex[var1];
    int var6 = this.menuTargetIndex[var1];
    int var7 = this.menuItemID[var1];
    if (var7 == 200) {
      this.walkToGroundItem(this.regionX, this.regionY, var2, var3, true);
      super.clientStream.newPacket(224);
      super.clientStream.writeShort(var2 + this.areaX);
      super.clientStream.writeShort(var3 + this.areaY);
      super.clientStream.writeShort(var4);
      super.clientStream.writeShort(var5);
      this.finalizePacket();
      this.selectedSpell = -1;
    }

    if (var7 == 210) {
      this.walkToGroundItem(this.regionX, this.regionY, var2, var3, true);
      super.clientStream.newPacket(250);
      super.clientStream.writeShort(var2 + this.areaX);
      super.clientStream.writeShort(var3 + this.areaY);
      super.clientStream.writeShort(var4);
      super.clientStream.writeShort(var5);
      this.finalizePacket();
      this.selectedItemInventoryIndex = -1;
    }

    if (var7 == 220) {
      this.walkToGroundItem(this.regionX, this.regionY, var2, var3, true);
      super.clientStream.newPacket(252);
      super.clientStream.writeShort(var2 + this.areaX);
      super.clientStream.writeShort(var3 + this.areaY);
      super.clientStream.writeShort(var4);
      this.finalizePacket();
    }

    if (var7 == 3200) {
      this.showMessage(GameData.wfb[var4], 3);
    }

    if (var7 == 300) {
      this.walkToWallObject(var2, var3, var4);
      super.clientStream.newPacket(223);
      super.clientStream.writeShort(var2 + this.areaX);
      super.clientStream.writeShort(var3 + this.areaY);
      super.clientStream.writeByte(var4);
      super.clientStream.writeShort(var5);
      this.finalizePacket();
      this.selectedSpell = -1;
    }

    if (var7 == 310) {
      this.walkToWallObject(var2, var3, var4);
      super.clientStream.newPacket(239);
      super.clientStream.writeShort(var2 + this.areaX);
      super.clientStream.writeShort(var3 + this.areaY);
      super.clientStream.writeByte(var4);
      super.clientStream.writeShort(var5);
      this.finalizePacket();
      this.selectedItemInventoryIndex = -1;
    }

    if (var7 == 320) {
      this.walkToWallObject(var2, var3, var4);
      super.clientStream.newPacket(238);
      super.clientStream.writeShort(var2 + this.areaX);
      super.clientStream.writeShort(var3 + this.areaY);
      super.clientStream.writeByte(var4);
      this.finalizePacket();
    }

    if (var7 == 2300) {
      this.walkToWallObject(var2, var3, var4);
      super.clientStream.newPacket(229);
      super.clientStream.writeShort(var2 + this.areaX);
      super.clientStream.writeShort(var3 + this.areaY);
      super.clientStream.writeByte(var4);
      this.finalizePacket();
    }

    if (var7 == 3300) {
      this.showMessage(GameData.nib[var4], 3);
    }

    if (var7 == 400) {
      this.walkToObject(var2, var3, var4, var5);
      super.clientStream.newPacket(222);
      super.clientStream.writeShort(var2 + this.areaX);
      super.clientStream.writeShort(var3 + this.areaY);
      super.clientStream.writeShort(var6);
      this.finalizePacket();
      this.selectedSpell = -1;
    }

    if (var7 == 410) {
      this.walkToObject(var2, var3, var4, var5);
      super.clientStream.newPacket(241);
      super.clientStream.writeShort(var2 + this.areaX);
      super.clientStream.writeShort(var3 + this.areaY);
      super.clientStream.writeShort(var6);
      this.finalizePacket();
      this.selectedItemInventoryIndex = -1;
    }

    if (var7 == 420) {
      this.walkToObject(var2, var3, var4, var5);
      super.clientStream.newPacket(242);
      super.clientStream.writeShort(var2 + this.areaX);
      super.clientStream.writeShort(var3 + this.areaY);
      this.finalizePacket();
    }

    if (var7 == 2400) {
      this.walkToObject(var2, var3, var4, var5);
      super.clientStream.newPacket(230);
      super.clientStream.writeShort(var2 + this.areaX);
      super.clientStream.writeShort(var3 + this.areaY);
      this.finalizePacket();
    }

    if (var7 == 3400) {
      this.showMessage(GameData.cib[var4], 3);
    }

    if (var7 == 600) {
      super.clientStream.newPacket(220);
      super.clientStream.writeShort(var4);
      super.clientStream.writeShort(var5);
      this.finalizePacket();
      this.selectedSpell = -1;
    }

    if (var7 == 610) {
      super.clientStream.newPacket(240);
      super.clientStream.writeShort(var4);
      super.clientStream.writeShort(var5);
      this.finalizePacket();
      this.selectedItemInventoryIndex = -1;
    }

    if (var7 == 620) {
      super.clientStream.newPacket(248);
      super.clientStream.writeShort(var4);
      this.finalizePacket();
    }

    if (var7 == 630) {
      super.clientStream.newPacket(249);
      super.clientStream.writeShort(var4);
      this.finalizePacket();
    }

    if (var7 == 640) {
      super.clientStream.newPacket(246);
      super.clientStream.writeShort(var4);
      this.finalizePacket();
    }

    if (var7 == 650) {
      this.selectedItemInventoryIndex = var4;
      this.showUiTab = 0;
      this.selectedItemName = GameData.vfb[this.inventoryItemID[this.selectedItemInventoryIndex]][0];
    }

    if (var7 == 660) {
      super.clientStream.newPacket(251);
      super.clientStream.writeShort(var4);
      this.finalizePacket();
      this.selectedItemInventoryIndex = -1;
      this.showUiTab = 0;
      this.showMessage("Dropping " + GameData.vfb[this.inventoryItemID[var4]][0], 4);
    }

    if (var7 == 3600) {
      this.showMessage(GameData.wfb[var4], 3);
    }

    int var8;
    int var9;
    if (var7 == 700) {
      var8 = (var2 - 64) / this.magicLoc;
      var9 = (var3 - 64) / this.magicLoc;
      this.walkToActionSource(this.regionX, this.regionY, var8, var9, true);
      super.clientStream.newPacket(225);
      super.clientStream.writeShort(var4);
      super.clientStream.writeShort(var5);
      this.finalizePacket();
      this.selectedSpell = -1;
    }

    if (var7 == 710) {
      var8 = (var2 - 64) / this.magicLoc;
      var9 = (var3 - 64) / this.magicLoc;
      this.walkToActionSource(this.regionX, this.regionY, var8, var9, true);
      super.clientStream.newPacket(243);
      super.clientStream.writeShort(var4);
      super.clientStream.writeShort(var5);
      this.finalizePacket();
      this.selectedItemInventoryIndex = -1;
    }

    if (var7 == 720) {
      var8 = (var2 - 64) / this.magicLoc;
      var9 = (var3 - 64) / this.magicLoc;
      this.walkToActionSource(this.regionX, this.regionY, var8, var9, true);
      super.clientStream.newPacket(245);
      super.clientStream.writeShort(var4);
      this.finalizePacket();
    }

    if (var7 == 715 || var7 == 2715) {
      var8 = (var2 - 64) / this.magicLoc;
      var9 = (var3 - 64) / this.magicLoc;
      this.walkToActionSource(this.regionX, this.regionY, var8, var9, true);
      super.clientStream.newPacket(244);
      super.clientStream.writeShort(var4);
      this.finalizePacket();
    }

    if (var7 == 3700) {
      this.showMessage(GameData.qgb[var4], 3);
    }

    if (var7 == 800) {
      var8 = (var2 - 64) / this.magicLoc;
      var9 = (var3 - 64) / this.magicLoc;
      this.walkToActionSource(this.regionX, this.regionY, var8, var9, true);
      super.clientStream.newPacket(226);
      super.clientStream.writeShort(var4);
      super.clientStream.writeShort(var5);
      this.finalizePacket();
      this.selectedSpell = -1;
    }

    if (var7 == 810) {
      var8 = (var2 - 64) / this.magicLoc;
      var9 = (var3 - 64) / this.magicLoc;
      this.walkToActionSource(this.regionX, this.regionY, var8, var9, true);
      super.clientStream.newPacket(219);
      super.clientStream.writeShort(var4);
      super.clientStream.writeShort(var5);
      this.finalizePacket();
      this.selectedItemInventoryIndex = -1;
    }

    if (var7 == 805 || var7 == 2805) {
      var8 = (var2 - 64) / this.magicLoc;
      var9 = (var3 - 64) / this.magicLoc;
      this.walkToActionSource(this.regionX, this.regionY, var8, var9, true);
      super.clientStream.newPacket(228);
      super.clientStream.writeShort(var4);
      this.finalizePacket();
    }

    if (var7 == 2810) {
      super.clientStream.newPacket(235);
      super.clientStream.writeShort(var4);
      this.finalizePacket();
    }

    if (var7 == 2820) {
      super.clientStream.newPacket(214);
      super.clientStream.writeShort(var4);
      this.finalizePacket();
    }

    if (var7 == 900) {
      this.walkToActionSource(this.regionX, this.regionY, var2, var3, true);
      super.clientStream.newPacket(221);
      super.clientStream.writeShort(var2 + this.areaX);
      super.clientStream.writeShort(var3 + this.areaY);
      super.clientStream.writeShort(var4);
      this.finalizePacket();
      this.selectedSpell = -1;
    }

    if (var7 == 920) {
      this.walkToActionSource(this.regionX, this.regionY, var2, var3, false);
      if (this.mouseClickXStep == -24) {
        this.mouseClickXStep = 24;
      }
    }

    if (var7 == 1000) {
      super.clientStream.newPacket(227);
      super.clientStream.writeShort(var4);
      this.finalizePacket();
      this.selectedSpell = -1;
    }

    if (var7 == 4000) {
      this.selectedItemInventoryIndex = -1;
      this.selectedSpell = -1;
    }

  }

  public mudclient() {
    this.menuItemText2 = new String[this.jv];
    this.menuItemText1 = new String[this.jv];
    this.menuItemID = new int[this.jv];
    this.menuItemX = new int[this.jv];
    this.menuItemY = new int[this.jv];
    this.menuSourceType = new int[this.jv];
    this.menuSourceIndex = new int[this.jv];
    this.menuTargetIndex = new int[this.jv];
    this.menuIndices = new int[this.jv];
    this.maxPlayersServerCount = 4000;
    this.maxPlayersCount = 500;
    this.playersServer = new Character[this.maxPlayersServerCount];
    this.players = new Character[this.maxPlayersCount];
    this.localPlayer = new Character();
    this.maxNpcsServerCount = 1000;
    this.maxNpcsCount = 500;
    this.npcsServer = new Character[this.maxNpcsServerCount];
    this.npcs = new Character[this.maxNpcsCount];
    this.npcAnimationArray = new int[][]{{11, 2, 9, 7, 1, 6, 10, 0, 5, 8, 3, 4}, {11, 2, 9, 7, 1, 6, 10, 0, 5, 8, 3, 4}, {11, 3, 2, 9, 7, 1, 6, 10, 0, 5, 8, 4}, {3, 4, 2, 9, 7, 1, 6, 10, 8, 11, 0, 5}, {3, 4, 2, 9, 7, 1, 6, 10, 8, 11, 0, 5}, {4, 3, 2, 9, 7, 1, 6, 10, 8, 11, 0, 5}, {11, 4, 2, 9, 7, 1, 6, 10, 0, 5, 8, 3}, {11, 2, 9, 7, 1, 6, 10, 0, 5, 8, 4, 3}};
    this.maxGroundItems = 500;
    this.groundItemX = new int[this.maxGroundItems];
    this.groundItemY = new int[this.maxGroundItems];
    this.groundItemID = new int[this.maxGroundItems];
    this.groundItemZ = new int[this.maxGroundItems];
    this.maxObjects = 1500;
    this.objectModel = new GameModel[this.maxObjects];
    this.objectX = new int[this.maxObjects];
    this.objectY = new int[this.maxObjects];
    this.objectID = new int[this.maxObjects];
    this.objectDirection = new int[this.maxObjects];
    this.gameModels = new GameModel[200];
    this.objectAlreadyInMenu = new boolean[this.maxObjects];
    this.maxWallObjects = 500;
    this.wallObjectModel = new GameModel[this.maxWallObjects];
    this.wallObjectX = new int[this.maxWallObjects];
    this.wallObjectY = new int[this.maxWallObjects];
    this.wallObjectDirection = new int[this.maxWallObjects];
    this.wallObjectID = new int[this.maxWallObjects];
    this.wallObjectAlreadyInMenu = new boolean[this.maxWallObjects];
    this.maxWalkPath = 8000;
    this.walkPathX = new int[this.maxWalkPath];
    this.walkPathY = new int[this.maxWalkPath];
    this.inventoryItemID = new int[30];
    this.inventoryItemStackCount = new int[30];
    this.inventoryEquipped = new int[30];
    this.selectedItemInventoryIndex = -1;
    this.selectedItemName = "";
    this.showDialogTrade = false;
    this.tradeRecipientName = "";
    this.tradeItem = new int[14];
    this.tradeItemStackCount = new int[14];
    this.tradeRecipientItems = new int[14];
    this.tradeRecipientCount = new int[14];
    this.tradeRecipientAccepted = false;
    this.tradeAccepted = false;
    this.gy = false;
    this.shopItem = new int[256];
    this.shopCount = new int[256];
    this.shopItemPrice = new int[256];
    this.shopSelectedItemIndex = -1;
    this.shopSelectedIemType = -2;
    this.playerStatCurrent = new int[19];
    this.playerStatBase = new int[19];
    this.playerStatEquipment = new int[6];
    this.statNames = new String[]{"Attack", "Defense", "Strength", "Hits", "Ranged", "Thieving", "Influence", "PrayGood", "PrayEvil", "GoodMagic", "EvilMagic", "Cooking", "Tailoring", "Woodcutting", "Firemaking", "Crafting", "Smithing", "Mining", "Herblaw"};
    this.equipmentStatNames = new String[]{"Armour", "WeaponAim", "WeaponPower", "Magic", "Prayer", "Hiding"};
    this.vy = new int[500];
    this.showOptionsMenu = false;
    this.optionMenuEntry = new String[5];
    this.loginUser = "";
    this.loginPass = "";
    this.loginUserDesc = "";
    this.loginUserDisp = "";
    this.qz = 5;
    this.messageHistory = new String[this.qz];
    this.messageHistoryTimeout = new int[this.qz];
    this.uz = 40;
    this.showAppearanceChange = false;
    this.appearanceBodyGender = 1;
    this.vbb = 2;
    this.appearanceHairColour = 2;
    this.appearanceTopColour = 8;
    this.appearanceBottomColour = 14;
    this.appearanceHeadGender = 1;
    this.characterTopBottomColours = new int[] {16711680, 16744448, 16769024, 10543104, 57344, 32768, 41088, 45311, 33023, 12528, 14680288, 3158064, 6307840, 8409088, 16777215};
    this.characterHairColors = new int[] {16760880, 16752704, 8409136, 6307872, 3158064, 16736288, 16728064, 16777215, 65280, 65535};
    this.characterSkinColours = new int[] {15523536, 13415270, 11766848, 10056486, 9461792};
    this.selectedSpell = -1;
    this.lastObjectAnimationNumberTorch = -1;
    this.lastObjectAnimationNumberFire = -1;
    this.receivedMessages = new String[50];
    this.receivedMessageX = new int[50];
    this.receivedMessageY = new int[50];
    this.receivedMessageMidPoint = new int[50];
    this.receivedMessageHeight = new int[50];
    this.actionBubbleX = new int[50];
    this.actionBubbleY = new int[50];
    this.actionBubbleScale = new int[50];
    this.actionBubbleItem = new int[50];
    this.healthBarX = new int[50];
    this.healthBarY = new int[50];
    this.healthBarMissing = new int[50];
  }
}
