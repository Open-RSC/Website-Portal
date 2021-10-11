package mudclient;

import java.io.IOException;

public class GameData {
  public final int sfb = 12345678;
  public static int tfb;
  public static int ufb;
  public static String[][] vfb;
  public static String[] wfb;
  public static String[] xfb;
  public static String[] yfb;
  public static int[] zfb;
  public static int[] agb;
  public static int[] bgb;
  public static int[] cgb;
  public static int[] dgb;
  public static int[] egb;
  public static int[] fgb;
  public static int[] ggb;
  public static int[] hgb;
  public static int[] igb;
  public static int[] jgb;
  public static int[] kgb;
  public static int[] lgb;
  public static int[] mgb;
  public static int[] ngb;
  public static int ogb;
  public static String[][] pgb;
  public static String[] qgb;
  public static int[] rgb;
  public static int[] sgb;
  public static int[] tgb;
  public static int[] ugb;
  public static int[] vgb;
  public static int[] wgb;
  public static int[] xgb;
  public static int[] ygb;
  public static int[] zgb;
  public static int[] ahb;
  public static int[] bhb;
  public static int[] chb;
  public static int[] dhb;
  public static int[] ehb;
  public static int[] fhb;
  public static int[][] ghb;
  public static int[] hhb;
  public static int[] ihb;
  public static int[] jhb;
  public static int[] khb;
  public static int[] lhb;
  public static int[] mhb;
  public static int[] nhb;
  public static int[] ohb;
  public static int[] phb;
  public static int[][] qhb;
  public static int[][] rhb;
  public static int shb;
  public static String[] entityVar1;
  public static String[] uhb;
  public static int[] vhb;
  public static int[] whb;
  public static int[] xhb;
  public static int[] yhb;
  public static int[] zhb;
  public static int aib;
  public static String[][] bib;
  public static String[] cib;
  public static String[] dib;
  public static String[] eib;
  public static int[] fib;
  public static int[] gib;
  public static int[] hib;
  public static int[] iib;
  public static int[] jib;
  public static int[] kib;
  public static int lib;
  public static String[][] mib;
  public static String[] nib;
  public static String[] oib;
  public static String[] pib;
  public static int[] qib;
  public static int[] rib;
  public static int[] sib;
  public static int[] tib;
  public static int[] uib;
  public static int[] vib;
  public static int wib;
  public static String[] xib;
  public static int[] yib;
  public static int[] zib;
  public static int[] ajb;
  public static int bjb;
  public static String[] cjb;
  public static int[] djb;
  public static int[] ejb;
  public static int[] fjb;
  public static int projectileCount;
  public static int hjb;
  public static String[] projectileVar1;
  public static String[] projectileVar6;
  public static int[] projectileVar2;
  public static int[] projectileVar3;
  public static int[] projectileVar4;
  public static int[] projectileVar5;
  public static int[] projectileVarBonus;
  public static int[] projectileVar7;
  public static int qjb;
  public static String[] rjb;
  public static String[] sjb;
  public static int[] tjb;
  public static int[] ujb;
  public static int[] vjb;
  public static int[] wjb;
  public static int[][] xjb;
  public static int[][] yjb;
  public static int qkb;
  public static String[] rkb;
  public static String[] skb;
  public static int[] tkb;
  public static int[] ukb;
  public static int[] vkb;
  public static int[] wkb;
  public static int[][] xkb;
  public static int[][] ykb;
  public static int zjb;
  public static String[] akb;
  public static int[] bkb;
  public static int[] ckb;
  public static int[] dkb;
  public static int[] ekb;
  public static int[] fkb;
  public static int[][] gkb;
  public static int[][] hkb;
  public static int[][] ikb;
  static String[] jkb = new String[]{
        "attack", "defense", "strength", "hits", "ranged", "thieving", "influence", "praygood", "prayevil", "goodmagic", "evilmagic",
        "cooking", "tailoring", "woodcutting", "firemaking", "crafting", "smithing", "mining", "herblaw"
  };
  public static String[] kkb = new String[]{"attack", "defense", "damage", "hits", "agression", "bravery", "regenerate", "perception"};
  public static int lkb;
  public static String[] mkb = new String[200];

  public static void loadData() {
    try {
      loadProjectile(new Buffer("../gamedata/config/projectile.txt"));
      loadEntity(new Buffer("../gamedata/config/entity.txt"));
      loadObjects(new Buffer("../gamedata/config/objects.txt"));
      loadNPC(new Buffer("../gamedata/config/npc.txt"));
      loadLocation(new Buffer("../gamedata/config/location.txt"));
      loadBoundary(new Buffer("../gamedata/config/boundary.txt"));
      loadRoof(new Buffer("../gamedata/config/roof.txt"));
      loadFloor(new Buffer("../gamedata/config/floor.txt"));
      loadGoodSpells(new Buffer("../gamedata/config/goodspells.txt"));
      loadEvilSpells(new Buffer("../gamedata/config/evilspells.txt"));
      loadShop(new Buffer("../gamedata/config/shop.txt"));
      loadProjectileVarBonus();
    } catch (IOException e) {
      System.out.println("Error loading config files");
      e.printStackTrace();
    }
  }

  public static void loadData(byte[] var0) {
    try {
      loadProjectile(new Buffer(var0, Utility.getDataFileOffset("projectile.txt", var0)));
      loadEntity(new Buffer(var0, Utility.getDataFileOffset("entity.txt", var0)));
      loadObjects(new Buffer(var0, Utility.getDataFileOffset("objects.txt", var0)));
      loadNPC(new Buffer(var0, Utility.getDataFileOffset("npc.txt", var0)));
      loadLocation(new Buffer(var0, Utility.getDataFileOffset("location.txt", var0)));
      loadBoundary(new Buffer(var0, Utility.getDataFileOffset("boundary.txt", var0)));
      loadRoof(new Buffer(var0, Utility.getDataFileOffset("roof.txt", var0)));
      loadFloor(new Buffer(var0, Utility.getDataFileOffset("floor.txt", var0)));
      loadGoodSpells(new Buffer(var0, Utility.getDataFileOffset("goodspells.txt", var0)));
      loadEvilSpells(new Buffer(var0, Utility.getDataFileOffset("evilspells.txt", var0)));
      loadShop(new Buffer(var0, Utility.getDataFileOffset("shop.txt", var0)));
      loadProjectileVarBonus();
    } catch (IOException var2) {
      System.out.println("Error loading config files");
      var2.printStackTrace();
    }
  }

  public static void loadShop(Buffer var0) throws IOException {
    var0.skipToNextDataValue();
    int amount = var0.readDataInt();
    zjb = amount;
    System.out.println("Found " + amount + " shops");
    akb = new String[amount];
    bkb = new int[amount];
    fkb = new int[amount];
    ckb = new int[amount];
    dkb = new int[amount];
    ekb = new int[amount];
    gkb = new int[amount][40];
    hkb = new int[amount][40];
    ikb = new int[amount][40];

    for (int var2 = 0; var2 < amount; ++var2) {
      var0.skipToNextDataValue();
      akb[var2] = var0.readDataString();
      int var3 = bkb[var2] = var0.readDataInt();
      ckb[var2] = var0.readDataInt();
      dkb[var2] = var0.readDataInt();
      ekb[var2] = var0.readDataInt();
      fkb[var2] = var0.readDataInt();

      for (int var4 = 0; var4 < var3; ++var4) {
        var0.skipToNextDataValue();
        gkb[var2][var4] = getItemId(var0.readDataString());
        hkb[var2][var4] = var0.readDataInt();
        ikb[var2][var4] = var0.readDataInt();
      }
    }
  }

  public static void loadGoodSpells(Buffer var0) throws IOException {
    var0.skipToNextDataValue();
    int var1 = var0.readDataInt();
    qjb = var1;
    System.out.println("Found " + var1 + " good skills");
    rjb = new String[var1];
    sjb = new String[var1];
    tjb = new int[var1];
    vjb = new int[var1];
    wjb = new int[var1];
    ujb = new int[var1];
    xjb = new int[var1][];
    yjb = new int[var1][];

    for (int var2 = 0; var2 < var1; ++var2) {
      var0.skipToNextDataValue();
      rjb[var2] = var0.readDataString();
      tjb[var2] = var0.readDataInt();
      sjb[var2] = var0.readDataString();
      vjb[var2] = var0.readDataInt();
      wjb[var2] = var0.readDataInt();
      var0.skipToNextDataValue();
      int var3 = ujb[var2] = var0.readDataInt();
      xjb[var2] = new int[var3];
      yjb[var2] = new int[var3];

      for (int var4 = 0; var4 < var3; ++var4) {
        xjb[var2][var4] = getItemId(var0.readDataString());
        yjb[var2][var4] = var0.readDataInt();
      }
    }

    var0.close();
  }
  
  public static void loadEvilSpells(Buffer var0) throws IOException {
	    var0.skipToNextDataValue();
	    int var1 = var0.readDataInt();
	    qkb = var1;
	    System.out.println("Found " + var1 + " evil skills");
	    rkb = new String[var1];
	    skb = new String[var1];
	    tkb = new int[var1];
	    vkb = new int[var1];
	    wkb = new int[var1];
	    ukb = new int[var1];
	    xkb = new int[var1][];
	    ykb = new int[var1][];

	    for (int var2 = 0; var2 < var1; ++var2) {
	      var0.skipToNextDataValue();
	      rkb[var2] = var0.readDataString();
	      tkb[var2] = var0.readDataInt();
	      skb[var2] = var0.readDataString();
	      vkb[var2] = var0.readDataInt();
	      wkb[var2] = var0.readDataInt();
	      var0.skipToNextDataValue();
	      int var3 = ukb[var2] = var0.readDataInt();
	      xkb[var2] = new int[var3];
	      ykb[var2] = new int[var3];

	      for (int var4 = 0; var4 < var3; ++var4) {
	        xkb[var2][var4] = getItemId(var0.readDataString());
	        ykb[var2][var4] = var0.readDataInt();
	      }
	    }

	    var0.close();
	  }

  public static void loadProjectile(Buffer buffer) throws IOException {
    buffer.skipToNextDataValue();
    int index = buffer.readDataInt();
    projectileCount = index;
    System.out.println("Found " + index + " projectiles");
    projectileVar1 = new String[index];
    projectileVar6 = new String[index];
    projectileVar2 = new int[index];
    projectileVar3 = new int[index];
    projectileVar4 = new int[index];
    projectileVar5 = new int[index];
    projectileVarBonus = new int[index];
    projectileVar7 = new int[index];

    for (int j = 0; j < index; ++j) {
      buffer.skipToNextDataValue();
      projectileVar1[j] = buffer.readDataString();
      projectileVar2[j] = buffer.readDataInt();
      projectileVar3[j] = buffer.readDataInt();
      projectileVar4[j] = buffer.readDataInt();
      projectileVar5[j] = buffer.readDataInt();
      projectileVar6[j] = buffer.readDataString();
      projectileVar7[j] = buffer.readDataInt();
      if (projectileVar2[j] + 1 > hjb) {
        hjb = projectileVar2[j] + 1;
      }
    }

    buffer.close();
  }

  public static void loadProjectileVarBonus() {
    for (int i = 0; i < projectileCount; ++i) {
      projectileVarBonus[i] = getItemId(projectileVar6[i]);
    }
  }

  public static void loadEntity(Buffer var0) throws IOException {
    var0.skipToNextDataValue();
    int var1 = var0.readDataInt();
    shb = var1;
    System.out.println("Found " + var1 + " entities");
    entityVar1 = new String[var1];
    uhb = new String[var1];
    whb = new int[var1];
    vhb = new int[var1];
    xhb = new int[var1];
    yhb = new int[var1];
    zhb = new int[var1];

    for (int var2 = 0; var2 < var1; ++var2) {
      var0.skipToNextDataValue();
      entityVar1[var2] = var0.readDataString();
      uhb[var2] = var0.readDataString();
      vhb[var2] = var0.readDataHex();
      whb[var2] = var0.readDataInt();
      xhb[var2] = var0.readDataInt();
      yhb[var2] = var0.readDataInt();
    }

    var0.close();
  }

  public static void loadNPC(Buffer var0) throws IOException {
    var0.skipToNextDataValue();
    int var1 = var0.readDataInt();
    ogb = var1;
    System.out.println("Found " + var1 + " npcs");
    pgb = new String[var1][];
    qgb = new String[var1];
    rgb = new int[var1];
    sgb = new int[var1];
    tgb = new int[var1];
    ugb = new int[var1];
    vgb = new int[var1];
    wgb = new int[var1];
    xgb = new int[var1];
    ygb = new int[var1];
    zgb = new int[var1];
    ahb = new int[var1];
    bhb = new int[var1];
    chb = new int[var1];
    dhb = new int[var1];
    ehb = new int[var1];
    fhb = new int[var1];
    ghb = new int[var1][12];
    hhb = new int[var1];
    ihb = new int[var1];
    jhb = new int[var1];
    khb = new int[var1];
    lhb = new int[var1];
    mhb = new int[var1];
    nhb = new int[var1];
    ohb = new int[var1];
    phb = new int[var1];
    qhb = new int[var1][];
    rhb = new int[var1][];

    for (int var2 = 0; var2 < var1; ++var2) {
      var0.skipToNextDataValue();
      int var3 = var0.readDataInt();
      pgb[var2] = new String[var3];

      for (int var4 = 0; var4 < var3; ++var4) {
        pgb[var2][var4] = var0.readDataString();
      }

      qgb[var2] = var0.readDataString();
      var0.skipToNextDataValue();
      rgb[var2] = var0.readDataInt();
      sgb[var2] = var0.readDataInt();
      tgb[var2] = var0.readDataInt();
      ugb[var2] = var0.readDataInt();
      vgb[var2] = var0.readDataInt();
      wgb[var2] = var0.readDataInt();
      xgb[var2] = var0.readDataInt();
      ygb[var2] = var0.readDataInt();
      zgb[var2] = var0.readDataInt();
      ahb[var2] = var0.readDataInt();
      bhb[var2] = var0.readDataInt();
      chb[var2] = var0.readDataInt();
      dhb[var2] = var0.readDataInt();
      ehb[var2] = var0.readDataInt();
      fhb[var2] = var0.readDataInt();
      var0.skipToNextDataValue();

      for (int var5 = 0; var5 < 12; ++var5) {
        ghb[var2][var5] = getAnimationId(var0.readDataString());
      }

      hhb[var2] = var0.readDataHex();
      ihb[var2] = var0.readDataHex();
      jhb[var2] = var0.readDataHex();
      khb[var2] = var0.readDataHex();
      var0.skipToNextDataValue();
      lhb[var2] = var0.readDataInt();
      mhb[var2] = var0.readDataInt();
      nhb[var2] = var0.readDataInt();
      ohb[var2] = var0.readDataInt();
      phb[var2] = var0.readDataInt();
      var0.skipToNextDataValue();
      int var6 = var0.readDataInt();
      qhb[var2] = new int[var6];
      rhb[var2] = new int[var6];

      for (int var7 = 0; var7 < var6; ++var7) {
        qhb[var2][var7] = getItemId(var0.readDataString());
        rhb[var2][var7] = var0.readDataInt();
      }
    }

    var0.close();
  }

  public static void loadObjects(Buffer var0) throws IOException {
    var0.skipToNextDataValue();
    int var1 = var0.readDataInt();
    tfb = var1;
    System.out.println("Found " + var1 + " objects");
    vfb = new String[var1][];
    wfb = new String[var1];
    yfb = new String[var1];
    zfb = new int[var1];
    agb = new int[var1];
    bgb = new int[var1];
    cgb = new int[var1];
    dgb = new int[var1];
    egb = new int[var1];
    fgb = new int[var1];
    ggb = new int[var1];
    hgb = new int[var1];
    igb = new int[var1];
    jgb = new int[var1];
    kgb = new int[var1];
    lgb = new int[var1];
    mgb = new int[var1];
    ngb = new int[var1];

    for (int var2 = 0; var2 < var1; ++var2) {
      var0.skipToNextDataValue();
      int var3 = var0.readDataInt();
      vfb[var2] = new String[var3];

      for (int var4 = 0; var4 < var3; ++var4) {
        vfb[var2][var4] = var0.readDataString();
      }

      wfb[var2] = var0.readDataString();
      var0.skipToNextDataValue();
      zfb[var2] = var0.readDataInt();
      if (zfb[var2] >= ufb) {
        ufb = zfb[var2] + 1;
      }

      agb[var2] = var0.readDataInt();
      bgb[var2] = var0.readDataInt();
      yfb[var2] = var0.readDataString();
      var0.skipToNextDataValue();
      cgb[var2] = var0.readDataInt();
      dgb[var2] = var0.readDataInt();
      egb[var2] = var0.readDataInt();
      fgb[var2] = var0.readDataInt();
      ggb[var2] = var0.readDataInt();
      hgb[var2] = var0.readDataInt();
      igb[var2] = getProjectileId(var0.readDataString()) + 1;
      var0.skipToNextDataValue();
      jgb[var2] = var0.readDataInt();
      kgb[var2] = getAnimationId(var0.readDataString());
      lgb[var2] = var0.readDataHex();
      mgb[var2] = var0.readDataInt();
      ngb[var2] = var0.readDataInt();
    }

    var0.close();
  }

  public static void loadLocation(Buffer var0) throws IOException {
    var0.skipToNextDataValue();
    int var1 = var0.readDataInt();
    aib = var1;
    System.out.println("Found " + var1 + " locations");
    bib = new String[var1][];
    cib = new String[var1];
    dib = new String[var1];
    eib = new String[var1];
    fib = new int[var1];
    gib = new int[var1];
    hib = new int[var1];
    iib = new int[var1];
    jib = new int[var1];
    kib = new int[var1];

    for (int var2 = 0; var2 < var1; ++var2) {
      var0.skipToNextDataValue();
      int var3 = var0.readDataInt();
      bib[var2] = new String[var3];

      for (int var4 = 0; var4 < var3; ++var4) {
        bib[var2][var4] = var0.readDataString();
      }

      cib[var2] = var0.readDataString();
      var0.skipToNextDataValue();
      fib[var2] = getModelID(var0.readDataString());
      gib[var2] = var0.readDataInt();
      hib[var2] = var0.readDataInt();
      iib[var2] = var0.readDataInt();
      jib[var2] = var0.readDataInt();
      dib[var2] = var0.readDataString();
      if (dib[var2].equals("_")) {
        dib[var2] = "WalkTo";
      }

      eib[var2] = var0.readDataString();
      if (eib[var2].equals("_")) {
        eib[var2] = "Examine";
      }

      kib[var2] = var0.readDataInt();
    }

    var0.close();
  }

  public static void loadBoundary(Buffer var0) throws IOException {
    var0.skipToNextDataValue();
    int var1 = var0.readDataInt();
    lib = var1;
    System.out.println("Found " + var1 + " boundaries");
    mib = new String[var1][];
    nib = new String[var1];
    oib = new String[var1];
    pib = new String[var1];
    qib = new int[var1];
    rib = new int[var1];
    sib = new int[var1];
    tib = new int[var1];
    uib = new int[var1];
    vib = new int[var1];

    for (int var2 = 0; var2 < var1; ++var2) {
      var0.skipToNextDataValue();
      int var3 = var0.readDataInt();
      mib[var2] = new String[var3];

      for (int var4 = 0; var4 < var3; ++var4) {
        mib[var2][var4] = var0.readDataString();
      }

      nib[var2] = var0.readDataString();
      var0.skipToNextDataValue();
      qib[var2] = var0.readDataInt();
      rib[var2] = var0.readDataInt();
      sib[var2] = var0.readDataInt();
      tib[var2] = var0.readDataInt();
      uib[var2] = var0.readDataInt();
      vib[var2] = var0.readDataInt();
      oib[var2] = var0.readDataString();
      if (oib[var2].equals("_")) {
        oib[var2] = "WalkTo";
      }

      pib[var2] = var0.readDataString();
      if (pib[var2].equals("_")) {
        pib[var2] = "Examine";
      }
    }

    var0.close();
  }

  public static void loadRoof(Buffer var0) throws IOException {
    var0.skipToNextDataValue();
    int var1 = var0.readDataInt();
    wib = var1;
    System.out.println("Found " + var1 + " roofs");
    xib = new String[var1];
    yib = new int[var1];
    zib = new int[var1];
    ajb = new int[var1];

    for (int var2 = 0; var2 < var1; ++var2) {
      var0.skipToNextDataValue();
      xib[var2] = var0.readDataString();
      yib[var2] = var0.readDataInt();
      zib[var2] = var0.readDataInt();
      ajb[var2] = var0.readDataInt();
    }

    var0.close();
  }

  public static void loadFloor(Buffer var0) throws IOException {
    var0.skipToNextDataValue();
    int var1 = var0.readDataInt();
    bjb = var1;
    System.out.println("Found " + var1 + " floors");
    cjb = new String[var1];
    djb = new int[var1];
    ejb = new int[var1];
    fjb = new int[var1];

    for (int var2 = 0; var2 < var1; ++var2) {
      var0.skipToNextDataValue();
      cjb[var2] = var0.readDataString();
      djb[var2] = var0.readDataInt();
      ejb[var2] = var0.readDataInt();
      fjb[var2] = var0.readDataInt();
    }

    var0.close();
  }

  public static int getAnimationId(String var0) {
    if (var0.equalsIgnoreCase("na")) {
      return -1;
    } else {
      for (int var1 = 0; var1 < shb; ++var1) {
        if (var0.equalsIgnoreCase(entityVar1[var1])) {
          return var1;
        }
      }

      System.out.println("WARNING: unable to match entity " + var0);
      return 0;
    }
  }

  public static int getModelID(String var0) {
    if (var0.equalsIgnoreCase("na")) {
      return 0;
    } else {
      for (int var1 = 0; var1 < lkb; ++var1) {
        if (mkb[var1].equalsIgnoreCase(var0)) {
          return var1;
        }
      }

      mkb[lkb++] = var0;
      return lkb - 1;
    }
  }

  public static int getItemId(String var0) {
    if (var0.equalsIgnoreCase("na")) {
      return 0;
    } else {
      for (int var1 = 0; var1 < tfb; ++var1) {
        for (int var2 = 0; var2 < vfb[var1].length; ++var2) {
          if (vfb[var1][var2].equalsIgnoreCase(var0)) {
            return var1;
          }
        }
      }

      System.out.println("WARNING: unable to match object: " + var0);
      return 0;
    }
  }

  public static int getProjectileId(String var0) {
    if (var0.equals("_")) {
      return -1;
    } else {
      for (int var1 = 0; var1 < projectileCount; ++var1) {
        if (projectileVar1[var1].equalsIgnoreCase(var0)) {
          return var1;
        }
      }

      System.out.println("WARNING: unable to match projectile: " + var0);
      return -1;
    }
  }
}
