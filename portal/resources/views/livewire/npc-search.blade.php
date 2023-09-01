<div class="col">
    <div class="d-flex justify-content-start pb-1">
        <input class="e pl-1 text-white click" placeholder="Type a name" onfocus="this.value=''" wire:model="searchTerm" type="text"
               style="max-width:150px; background:black; width: 100%;">
    </div>

    <div class="e bg-black p-2" style="outline:black; max-width: 100%;">
        <div class="d-flex flex-wrap">
            <div class="text-center flex-fill"><b>Image</b></div>
            <div class="text-left flex-fill"><b>Name</b></div>
            <div class="text-left flex-fill"><b>Level</b></div>
            <div class="text-left flex-fill"><b>Description</b></div>
        </div>

        @foreach($npcResults as $key=>$npcdef)
            <div class="d-flex flex-wrap pt-3">
                <!--Image-->
                <div class="img-fluid pt-1 pb-1 mx-auto flex-fill" style="max-width: 80px;">
                    <img src="{{ asset('img/npc') }}/{{ $npcdef->id }}.png" alt="{{ $npcdef->name }}"
                         style="max-height: 62px; max-width: 75px;"/>
                </div>
                <!--Name-->
                <div class="text-left pt-1 pb-1 flex-fill" style="padding-left:10px;">
                    <a class="c" href="/npcdef/{{ $npcdef->id }}">{{ ucfirst($npcdef->name) }}</a>
                </div>
                <!--Level-->
                <div class="text-left pt-1 pb-1 flex-fill">
                    {{ number_format($npcdef->combatlvl) }}
                </div>
                <!--Description-->
                <div class="text-left pt-1 pb-1 text-gray-400 flex-fill" style="padding-left:10px;">
                    {{ ucfirst($npcdef->description) }}
                </div>
            </div>
        @endforeach

        {{ $npcResults->onEachSide(1)->links('livewire::tailwind') }}
    </div>

    <div class="e bg-black p-2 mt-4" style="max-width: 100%; height: 300px; overflow: auto">
        0: Unicorn<br>
        1: Bob<br>
        2: Sheep<br>
        3: Chicken<br>
        4: Goblin<br>
        5: Hans<br>
        6: cow<br>
        7: cook<br>
        8: Bear<br>
        9: Priest<br>
        10: Urhney<br>
        11: Man<br>
        12: Bartender<br>
        13: Camel<br>
        14: Gypsy<br>
        15: Ghost<br>
        16: Sir Prysin<br>
        17: Traiborn the wizard<br>
        18: Captain Rovin<br>
        19: Rat<br>
        20: Reldo<br>
        21: mugger<br>
        22: Lesser Demon<br>
        23: Giant Spider<br>
        24: Man<br>
        25: Jonny the beard<br>
        26: Baraek<br>
        27: Katrine<br>
        28: Tramp<br>
        29: Rat<br>
        30: Romeo<br>
        31: Juliet<br>
        32: Father Lawrence<br>
        33: Apothecary<br>
        34: spider<br>
        35: Delrith<br>
        36: Veronica<br>
        37: Weaponsmaster<br>
        38: Professor Oddenstein<br>
        39: Curator<br>
        40: skeleton<br>
        41: zombie<br>
        42: king<br>
        43: Giant bat<br>
        44: Bartender<br>
        45: skeleton<br>
        46: skeleton<br>
        47: Rat<br>
        48: Horvik the Armourer<br>
        49: Bear<br>
        50: skeleton<br>
        51: Shopkeeper<br>
        52: zombie<br>
        53: Ghost<br>
        54: Aubury<br>
        55: Shopkeeper<br>
        56: shopkeeper<br>
        57: Darkwizard<br>
        58: lowe<br>
        59: Thessalia<br>
        60: Darkwizard<br>
        61: Giant<br>
        62: Goblin<br>
        63: farmer<br>
        64: Thief<br>
        65: Guard<br>
        66: Black Knight<br>
        67: Hobgoblin<br>
        68: zombie<br>
        69: Zaff<br>
        70: Scorpion<br>
        71: silk trader<br>
        72: Man<br>
        73: Guide<br>
        74: Giant Spider<br>
        75: Peksa<br>
        76: Barbarian<br>
        77: Fred the farmer<br>
        78: Gunthor the Brave<br>
        79: Witch<br>
        80: Ghost<br>
        81: Wizard<br>
        82: Shop Assistant<br>
        83: Shop Assistant<br>
        84: Zeke<br>
        85: Louie Legs<br>
        86: Warrior<br>
        87: Shopkeeper<br>
        88: Shop Assistant<br>
        89: Highwayman<br>
        90: Kebab Seller<br>
        91: Chicken<br>
        92: Ernest<br>
        93: Monk<br>
        94: Dwarf<br>
        95: Banker<br>
        96: Count Draynor<br>
        97: Morgan<br>
        98: Dr Harlow<br>
        99: Deadly Red spider<br>
        100: Guard<br>
        101: Cassie<br>
        102: White Knight<br>
        103: Ranael<br>
        104: Moss Giant<br>
        105: Shopkeeper<br>
        106: Shop Assistant<br>
        107: Witch<br>
        108: Black Knight<br>
        109: Greldo<br>
        110: Sir Amik Varze<br>
        111: Guildmaster<br>
        112: Valaine<br>
        113: Drogo<br>
        114: Imp<br>
        115: Flynn<br>
        116: Wyson the gardener<br>
        117: Wizard Mizgog<br>
        118: Prince Ali<br>
        119: Hassan<br>
        120: Osman<br>
        121: Joe<br>
        122: Leela<br>
        123: Lady Keli<br>
        124: Ned<br>
        125: Aggie<br>
        126: Prince Ali<br>
        127: Jailguard<br>
        128: Redbeard Frank<br>
        129: Wydin<br>
        130: shop assistant<br>
        131: Brian<br>
        132: squire<br>
        133: Head chef<br>
        134: Thurgo<br>
        135: Ice Giant<br>
        136: King Scorpion<br>
        137: Pirate<br>
        138: Sir Vyvin<br>
        139: Monk of Zamorak<br>
        140: Monk of Zamorak<br>
        141: Wayne<br>
        142: Barmaid<br>
        143: Dwarven shopkeeper<br>
        144: Doric<br>
        145: Shopkeeper<br>
        146: Shop Assistant<br>
        147: Guide<br>
        148: Hetty<br>
        149: Betty<br>
        150: Bartender<br>
        151: General wartface<br>
        152: General Bentnoze<br>
        153: Goblin<br>
        154: Goblin<br>
        155: Herquin<br>
        156: Rommik<br>
        157: Grum<br>
        158: Ice warrior<br>
        159: Warrior<br>
        160: Thrander<br>
        161: Border Guard<br>
        162: Border Guard<br>
        163: Customs Officer<br>
        164: Luthas<br>
        165: Zambo<br>
        166: Captain Tobias<br>
        167: Gerrant<br>
        168: Shopkeeper<br>
        169: Shop Assistant<br>
        170: Seaman Lorris<br>
        171: Seaman Thresnor<br>
        172: Tanner<br>
        173: Dommik<br>
        174: Abbot Langley<br>
        175: Thordur<br>
        176: Brother Jered<br>
        177: Rat<br>
        178: Ghost<br>
        179: skeleton<br>
        180: zombie<br>
        181: Lesser Demon<br>
        182: Melzar the mad<br>
        183: Scavvo<br>
        184: Greater Demon<br>
        185: Shopkeeper<br>
        186: Shop Assistant<br>
        187: Oziach<br>
        188: Bear<br>
        189: Black Knight<br>
        190: chaos Dwarf<br>
        191: dwarf<br>
        192: Wormbrain<br>
        193: Klarense<br>
        194: Ned<br>
        195: skeleton<br>
        196: Dragon<br>
        197: Oracle<br>
        198: Duke of Lumbridge<br>
        199: Dark Warrior<br>
        200: Druid<br>
        201: Red Dragon<br>
        202: Blue Dragon<br>
        203: Baby Blue Dragon<br>
        204: Kaqemeex<br>
        205: Sanfew<br>
        206: Suit of armour<br>
        207: Adventurer<br>
        208: Adventurer<br>
        209: Adventurer<br>
        210: Adventurer<br>
        211: Leprechaun<br>
        212: Monk of entrana<br>
        213: Monk of entrana<br>
        214: zombie<br>
        215: Monk of entrana<br>
        216: tree spirit<br>
        217: cow<br>
        218: Irksol<br>
        219: Fairy Lunderwin<br>
        220: Jakut<br>
        221: Doorman<br>
        222: Fairy Shopkeeper<br>
        223: Fairy Shop Assistant<br>
        224: Fairy banker<br>
        225: Giles<br>
        226: Miles<br>
        227: Niles<br>
        228: Gaius<br>
        229: Fairy Ladder attendant<br>
        230: Jatix<br>
        231: Master Crafter<br>
        232: Bandit<br>
        233: Noterazzo<br>
        234: Bandit<br>
        235: Fat Tony<br>
        236: Donny the lad<br>
        237: Black Heather<br>
        238: Speedy Keith<br>
        239: White wolf sentry<br>
        240: Boy<br>
        241: Rat<br>
        242: Nora T Hag<br>
        243: Grey wolf<br>
        244: shapeshifter<br>
        245: shapeshifter<br>
        246: shapeshifter<br>
        247: shapeshifter<br>
        248: White wolf<br>
        249: Pack leader<br>
        250: Harry<br>
        251: Thug<br>
        252: Firebird<br>
        253: Achetties<br>
        254: Ice queen<br>
        255: Grubor<br>
        256: Trobert<br>
        257: Garv<br>
        258: guard<br>
        259: Grip<br>
        260: Alfonse the waiter<br>
        261: Charlie the cook<br>
        262: Guard Dog<br>
        263: Ice spider<br>
        264: Pirate<br>
        265: Jailer<br>
        266: Lord Darquarius<br>
        267: Seth<br>
        268: Banker<br>
        269: Helemos<br>
        270: Chaos Druid<br>
        271: Poison Scorpion<br>
        272: Velrak the explorer<br>
        273: Sir Lancelot<br>
        274: Sir Gawain<br>
        275: King Arthur<br>
        276: Sir Mordred<br>
        277: Renegade knight<br>
        278: Davon<br>
        279: Bartender<br>
        280: Arhein<br>
        281: Morgan le faye<br>
        282: Candlemaker<br>
        283: lady<br>
        284: lady<br>
        285: lady<br>
        286: Beggar<br>
        287: Merlin<br>
        288: Thrantax<br>
        289: Hickton<br>
        290: Black Demon<br>
        291: Black Dragon<br>
        292: Poison Spider<br>
        293: Monk of Zamorak<br>
        294: Hellhound<br>
        295: Animated axe<br>
        296: Black Unicorn<br>
        297: Frincos<br>
        298: Otherworldly being<br>
        299: Owen<br>
        300: Thormac the sorceror<br>
        301: Seer<br>
        302: Kharid Scorpion<br>
        303: Kharid Scorpion<br>
        304: Kharid Scorpion<br>
        305: Barbarian guard<br>
        306: Bartender<br>
        307: man<br>
        308: gem trader<br>
        309: Dimintheis<br>
        310: chef<br>
        311: Hobgoblin<br>
        312: Ogre<br>
        313: Boot the Dwarf<br>
        314: Wizard<br>
        315: Chronozon<br>
        316: Captain Barnaby<br>
        317: Customs Official<br>
        318: Man<br>
        319: farmer<br>
        320: Warrior<br>
        321: Guard<br>
        322: Knight<br>
        323: Paladin<br>
        324: Hero<br>
        325: Baker<br>
        326: silk merchant<br>
        327: Fur trader<br>
        328: silver merchant<br>
        329: spice merchant<br>
        330: gem merchant<br>
        331: Zenesha<br>
        332: Kangai Mau<br>
        333: Wizard Cromperty<br>
        334: RPDT employee<br>
        335: Horacio<br>
        336: Aemad<br>
        337: Kortan<br>
        338: zoo keeper<br>
        339: Make over mage<br>
        340: Bartender<br>
        341: chuck<br>
        342: Rogue<br>
        343: Shadow spider<br>
        344: Fire Giant<br>
        345: Grandpa Jack<br>
        346: Sinister stranger<br>
        347: Bonzo<br>
        348: Forester<br>
        349: Morris<br>
        350: Brother Omad<br>
        351: Thief<br>
        352: Head Thief<br>
        353: Big Dave<br>
        354: Joshua<br>
        355: Mountain Dwarf<br>
        356: Mountain Dwarf<br>
        357: Brother Cedric<br>
        358: Necromancer<br>
        359: zombie<br>
        360: Lucien<br>
        361: The Fire warrior of lesarkus<br>
        362: guardian of Armadyl<br>
        363: guardian of Armadyl<br>
        364: Lucien<br>
        365: winelda<br>
        366: Brother Kojo<br>
        367: Dungeon Rat<br>
        368: Master fisher<br>
        369: Orven<br>
        370: Padik<br>
        371: Shopkeeper<br>
        372: Lady servil<br>
        373: Guard<br>
        374: Guard<br>
        375: Guard<br>
        376: Guard<br>
        377: Jeremy Servil<br>
        378: Justin Servil<br>
        379: fightslave joe<br>
        380: fightslave kelvin<br>
        381: local<br>
        382: Khazard Bartender<br>
        383: General Khazard<br>
        384: Khazard Ogre<br>
        385: Guard<br>
        386: Khazard Scorpion<br>
        387: hengrad<br>
        388: Bouncer<br>
        389: Stankers<br>
        390: Docky<br>
        391: Shopkeeper<br>
        392: Fairy queen<br>
        393: Merlin<br>
        394: Crone<br>
        395: High priest of entrana<br>
        396: elkoy<br>
        397: remsai<br>
        398: bolkoy<br>
        399: local gnome<br>
        400: bolren<br>
        401: Black Knight titan<br>
        402: kalron<br>
        403: brother Galahad<br>
        404: tracker 1<br>
        405: tracker 2<br>
        406: tracker 3<br>
        407: Khazard troop<br>
        408: commander montai<br>
        409: gnome troop<br>
        410: khazard warlord<br>
        411: Sir Percival<br>
        412: Fisher king<br>
        413: maiden<br>
        414: Fisherman<br>
        415: King Percival<br>
        416: unhappy peasant<br>
        417: happy peasant<br>
        418: ceril<br>
        419: butler<br>
        420: carnillean guard<br>
        421: Tribesman<br>
        422: henryeta<br>
        423: philipe<br>
        424: clivet<br>
        425: cult member<br>
        426: Lord hazeel<br>
        427: alomone<br>
        428: Khazard commander<br>
        429: claus<br>
        430: 1st plague sheep<br>
        431: 2nd plague sheep<br>
        432: 3rd plague sheep<br>
        433: 4th plague sheep<br>
        434: Farmer brumty<br>
        435: Doctor orbon<br>
        436: Councillor Halgrive<br>
        437: Edmond<br>
        438: Citizen<br>
        439: Citizen<br>
        440: Citizen<br>
        441: Citizen<br>
        442: Citizen<br>
        443: Jethick<br>
        444: Mourner<br>
        445: Mourner<br>
        446: Ted Rehnison<br>
        447: Martha Rehnison<br>
        448: Billy Rehnison<br>
        449: Milli Rehnison<br>
        450: Alrena<br>
        451: Mourner<br>
        452: Clerk<br>
        453: Carla<br>
        454: Bravek<br>
        455: Caroline<br>
        456: Holgart<br>
        457: Holgart<br>
        458: Holgart<br>
        459: kent<br>
        460: bailey<br>
        461: kennith<br>
        462: Platform Fisherman<br>
        463: Platform Fisherman<br>
        464: Platform Fisherman<br>
        465: Elena<br>
        466: jinno<br>
        467: Watto<br>
        468: Recruiter<br>
        469: Head mourner<br>
        470: Almera<br>
        471: hudon<br>
        472: hadley<br>
        473: Rat<br>
        474: Combat instructor<br>
        475: golrie<br>
        476: Guide<br>
        477: King Black Dragon<br>
        478: cooking instructor<br>
        479: fishing instructor<br>
        480: financial advisor<br>
        481: gerald<br>
        482: mining instructor<br>
        483: Elena<br>
        484: Omart<br>
        485: Bank assistant<br>
        486: Jerico<br>
        487: Kilron<br>
        488: Guidor's wife<br>
        489: Quest advisor<br>
        490: chemist<br>
        491: Mourner<br>
        492: Mourner<br>
        493: Wilderness guide<br>
        494: Magic Instructor<br>
        495: Mourner<br>
        496: Community instructor<br>
        497: boatman<br>
        498: skeleton mage<br>
        499: controls guide<br>
        500: nurse sarah<br>
        501: Tailor<br>
        502: Mourner<br>
        503: Guard<br>
        504: Chemist<br>
        505: Chancy<br>
        506: Hops<br>
        507: DeVinci<br>
        508: Guidor<br>
        509: Chancy<br>
        510: Hops<br>
        511: DeVinci<br>
        512: king Lathas<br>
        513: Head wizard<br>
        514: Magic store owner<br>
        515: Wizard Frumscone<br>
        516: target practice zombie<br>
        517: Trufitus<br>
        518: Colonel Radick<br>
        519: Soldier<br>
        520: Bartender<br>
        521: Jungle Spider<br>
        522: Jiminua<br>
        523: Jogre<br>
        524: Guard<br>
        525: Ogre<br>
        526: Guard<br>
        527: Guard<br>
        528: shop keeper<br>
        529: Bartender<br>
        530: Frenita<br>
        531: Ogre chieftan<br>
        532: rometti<br>
        533: Rashiliyia<br>
        534: Blurberry<br>
        535: Heckel funch<br>
        536: Aluft Gianne<br>
        537: Hudo glenfad<br>
        538: Irena<br>
        539: Mosol<br>
        540: Gnome banker<br>
        541: King Narnode Shareen<br>
        542: UndeadOne<br>
        543: Drucas<br>
        544: tourist<br>
        545: King Narnode Shareen<br>
        546: Hazelmere<br>
        547: Glough<br>
        548: Shar<br>
        549: Shantay<br>
        550: charlie<br>
        551: Gnome guard<br>
        552: Gnome pilot<br>
        553: Mehman<br>
        554: Ana<br>
        555: Chaos Druid warrior<br>
        556: Gnome pilot<br>
        557: Shipyard worker<br>
        558: Shipyard worker<br>
        559: Shipyard worker<br>
        560: Shipyard foreman<br>
        561: Shipyard foreman<br>
        562: Gnome guard<br>
        563: Femi<br>
        564: Femi<br>
        565: Anita<br>
        566: Glough<br>
        567: Salarin the twisted<br>
        568: Black Demon<br>
        569: Gnome pilot<br>
        570: Gnome pilot<br>
        571: Gnome pilot<br>
        572: Gnome pilot<br>
        573: Sigbert the Adventurer<br>
        574: Yanille Watchman<br>
        575: Tower guard<br>
        576: Gnome Trainer<br>
        577: Gnome Trainer<br>
        578: Gnome Trainer<br>
        579: Gnome Trainer<br>
        580: Blurberry barman<br>
        581: Gnome waiter<br>
        582: Gnome guard<br>
        583: Gnome child<br>
        584: Earth warrior<br>
        585: Gnome child<br>
        586: Gnome child<br>
        587: Gulluck<br>
        588: Gunnjorn<br>
        589: Zadimus<br>
        590: Brimstail<br>
        591: Gnome child<br>
        592: Gnome local<br>
        593: Gnome local<br>
        594: Moss Giant<br>
        595: Gnome Baller<br>
        596: Goalie<br>
        597: Gnome Baller<br>
        598: Gnome Baller<br>
        599: Gnome Baller<br>
        600: Gnome Baller<br>
        601: Referee<br>
        602: Gnome Baller<br>
        603: Gnome Baller<br>
        604: Gnome Baller<br>
        605: Gnome Baller<br>
        606: Gnome Baller<br>
        607: Gnome Baller<br>
        608: Gnome Baller<br>
        609: Gnome Baller<br>
        610: Gnome Baller<br>
        611: Cheerleader<br>
        612: Cheerleader<br>
        613: Nazastarool Zombie<br>
        614: Nazastarool Skeleton<br>
        615: Nazastarool Ghost<br>
        616: Fernahei<br>
        617: Jungle Banker<br>
        618: Cart Driver<br>
        619: Cart Driver<br>
        620: Obli<br>
        621: Kaleb<br>
        622: Yohnus<br>
        623: Serevel<br>
        624: Yanni<br>
        625: Official<br>
        626: Koftik<br>
        627: Koftik<br>
        628: Koftik<br>
        629: Koftik<br>
        630: Blessed Vermen<br>
        631: Blessed Spider<br>
        632: Paladin<br>
        633: Paladin<br>
        634: slave<br>
        635: slave<br>
        636: slave<br>
        637: slave<br>
        638: slave<br>
        639: slave<br>
        640: slave<br>
        641: Kalrag<br>
        642: Niloof<br>
        643: Kardia the Witch<br>
        644: Souless<br>
        645: Othainian<br>
        646: Doomion<br>
        647: Holthion<br>
        648: Klank<br>
        649: Iban<br>
        650: Koftik<br>
        651: Goblin guard<br>
        652: Observatory Professor<br>
        653: Ugthanki<br>
        654: Observatory assistant<br>
        655: Souless<br>
        656: Dungeon spider<br>
        657: Kamen<br>
        658: Iban disciple<br>
        659: Koftik<br>
        660: Goblin<br>
        661: Chadwell<br>
        662: Professor<br>
        663: San Tojalon<br>
        664: Ghost<br>
        665: Spirit of Scorpius<br>
        666: Scorpion<br>
        667: Dark Mage<br>
        668: Mercenary<br>
        669: Mercenary Captain<br>
        670: Mercenary<br>
        671: Mining Slave<br>
        672: Watchtower wizard<br>
        673: Ogre Shaman<br>
        674: Skavid<br>
        675: Ogre guard<br>
        676: Ogre guard<br>
        677: Ogre guard<br>
        678: Skavid<br>
        679: Skavid<br>
        680: Og<br>
        681: Grew<br>
        682: Toban<br>
        683: Gorad<br>
        684: Ogre guard<br>
        685: Yanille Watchman<br>
        686: Ogre merchant<br>
        687: Ogre trader<br>
        688: Ogre trader<br>
        689: Ogre trader<br>
        690: Mercenary<br>
        691: City Guard<br>
        692: Mercenary<br>
        693: Lawgof<br>
        694: Dwarf<br>
        695: lollk<br>
        696: Skavid<br>
        697: Ogre guard<br>
        698: Nulodion<br>
        699: Dwarf<br>
        700: Al Shabim<br>
        701: Bedabin Nomad<br>
        702: Captain Siad<br>
        703: Bedabin Nomad Guard<br>
        704: Ogre citizen<br>
        705: Rock of ages<br>
        706: Ogre<br>
        707: Skavid<br>
        708: Skavid<br>
        709: Skavid<br>
        710: Draft Mercenary Guard<br>
        711: Mining Cart Driver<br>
        712: kolodion<br>
        713: kolodion<br>
        714: Gertrude<br>
        715: Shilop<br>
        716: Rowdy Guard<br>
        717: Shantay Pass Guard<br>
        718: Rowdy Slave<br>
        719: Shantay Pass Guard<br>
        720: Assistant<br>
        721: Desert Wolf<br>
        722: Workman<br>
        723: Examiner<br>
        724: Student<br>
        725: Student<br>
        726: Guide<br>
        727: Student<br>
        728: Archaeological expert<br>
        729: civillian<br>
        730: civillian<br>
        731: civillian<br>
        732: civillian<br>
        733: Murphy<br>
        734: Murphy<br>
        735: Sir Radimus Erkle<br>
        736: Legends Guild Guard<br>
        737: Escaping Mining Slave<br>
        738: Workman<br>
        739: Murphy<br>
        740: Echned Zekin<br>
        741: Donovan the Handyman<br>
        742: Pierre the Dog Handler<br>
        743: Hobbes the Butler<br>
        744: Louisa The Cook<br>
        745: Mary The Maid<br>
        746: Stanford The Gardener<br>
        747: Guard<br>
        748: Guard Dog<br>
        749: Guard<br>
        750: Man<br>
        751: Anna Sinclair<br>
        752: Bob Sinclair<br>
        753: Carol Sinclair<br>
        754: David Sinclair<br>
        755: Elizabeth Sinclair<br>
        756: Frank Sinclair<br>
        757: kolodion<br>
        758: kolodion<br>
        759: kolodion<br>
        760: kolodion<br>
        761: Irvig Senay<br>
        762: Ranalph Devere<br>
        763: Poison Salesman<br>
        764: Gujuo<br>
        765: Jungle Forester<br>
        766: Ungadulu<br>
        767: Ungadulu<br>
        768: Death Wing<br>
        769: Nezikchened<br>
        770: Dwarf Cannon engineer<br>
        771: Dwarf commander<br>
        772: Viyeldi<br>
        773: Nurmof<br>
        774: Fatigue expert<br>
        775: Karamja Wolf<br>
        776: Jungle Savage<br>
        777: Oomlie Bird<br>
        778: Sidney Smith<br>
        779: Siegfried Erkle<br>
        780: Tea seller<br>
        781: Wilough<br>
        782: Philop<br>
        783: Kanel<br>
        784: chamber guardian<br>
        785: Sir Radimus Erkle<br>
        786: Pit Scorpion<br>
        787: Shadow Warrior<br>
        788: Fionella<br>
        789: Battle mage<br>
        790: Battle mage<br>
        791: Battle mage<br>
        792: Gundai<br>
        793: Lundail
    </div>
</div>