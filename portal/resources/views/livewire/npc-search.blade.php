<div class="col">
    <div class="d-flex justify-content-start pb-1">
        <input class="e pl-1 text-white click responsive-input" placeholder="Type a name" onfocus="this.value=''" wire:model="searchTerm" type="text"
               style="background:black;">
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
        <span class="npc-name" data-name="Unicorn" data-id="0">0: Unicorn</span><br>
        <span class="npc-name" data-name="Bob" data-id="1">1: Bob</span><br>
        <span class="npc-name" data-name="Sheep" data-id="2">2: Sheep</span><br>
        <span class="npc-name" data-name="Chicken" data-id="3">3: Chicken</span><br>
        <span class="npc-name" data-name="Goblin" data-id="4">4: Goblin</span><br>
        <span class="npc-name" data-name="Hans" data-id="5">5: Hans</span><br>
        <span class="npc-name" data-name="cow" data-id="6">6: cow</span><br>
        <span class="npc-name" data-name="cook" data-id="7">7: cook</span><br>
        <span class="npc-name" data-name="Bear" data-id="8">8: Bear</span><br>
        <span class="npc-name" data-name="Priest" data-id="9">9: Priest</span><br>
        <span class="npc-name" data-name="Urhney" data-id="10">10: Urhney</span><br>
        <span class="npc-name" data-name="Man" data-id="11">11: Man</span><br>
        <span class="npc-name" data-name="Bartender" data-id="12">12: Bartender</span><br>
        <span class="npc-name" data-name="Camel" data-id="13">13: Camel</span><br>
        <span class="npc-name" data-name="Gypsy" data-id="14">14: Gypsy</span><br>
        <span class="npc-name" data-name="Ghost" data-id="15">15: Ghost</span><br>
        <span class="npc-name" data-name="Sir Prysin" data-id="16">16: Sir Prysin</span><br>
        <span class="npc-name" data-name="Traiborn the wizard" data-id="17">17: Traiborn the wizard</span><br>
        <span class="npc-name" data-name="Captain Rovin" data-id="18">18: Captain Rovin</span><br>
        <span class="npc-name" data-name="Rat" data-id="19">19: Rat</span><br>
        <span class="npc-name" data-name="Reldo" data-id="20">20: Reldo</span><br>
        <span class="npc-name" data-name="mugger" data-id="21">21: mugger</span><br>
        <span class="npc-name" data-name="Lesser Demon" data-id="22">22: Lesser Demon</span><br>
        <span class="npc-name" data-name="Giant Spider" data-id="23">23: Giant Spider</span><br>
        <span class="npc-name" data-name="Man" data-id="24">24: Man</span><br>
        <span class="npc-name" data-name="Jonny the beard" data-id="25">25: Jonny the beard</span><br>
        <span class="npc-name" data-name="Baraek" data-id="26">26: Baraek</span><br>
        <span class="npc-name" data-name="Katrine" data-id="27">27: Katrine</span><br>
        <span class="npc-name" data-name="Tramp" data-id="28">28: Tramp</span><br>
        <span class="npc-name" data-name="Rat" data-id="29">29: Rat</span><br>
        <span class="npc-name" data-name="Romeo" data-id="30">30: Romeo</span><br>
        <span class="npc-name" data-name="Juliet" data-id="31">31: Juliet</span><br>
        <span class="npc-name" data-name="Father Lawrence" data-id="32">32: Father Lawrence</span><br>
        <span class="npc-name" data-name="Apothecary" data-id="33">33: Apothecary</span><br>
        <span class="npc-name" data-name="spider" data-id="34">34: spider</span><br>
        <span class="npc-name" data-name="Delrith" data-id="35">35: Delrith</span><br>
        <span class="npc-name" data-name="Veronica" data-id="36">36: Veronica</span><br>
        <span class="npc-name" data-name="Weaponsmaster" data-id="37">37: Weaponsmaster</span><br>
        <span class="npc-name" data-name="Professor Oddenstein" data-id="38">38: Professor Oddenstein</span><br>
        <span class="npc-name" data-name="Curator" data-id="39">39: Curator</span><br>
        <span class="npc-name" data-name="skeleton" data-id="40">40: skeleton</span><br>
        <span class="npc-name" data-name="zombie" data-id="41">41: zombie</span><br>
        <span class="npc-name" data-name="king" data-id="42">42: king</span><br>
        <span class="npc-name" data-name="Giant bat" data-id="43">43: Giant bat</span><br>
        <span class="npc-name" data-name="Bartender" data-id="44">44: Bartender</span><br>
        <span class="npc-name" data-name="skeleton" data-id="45">45: skeleton</span><br>
        <span class="npc-name" data-name="skeleton" data-id="46">46: skeleton</span><br>
        <span class="npc-name" data-name="Rat" data-id="47">47: Rat</span><br>
        <span class="npc-name" data-name="Horvik the Armourer" data-id="48">48: Horvik the Armourer</span><br>
        <span class="npc-name" data-name="Bear" data-id="49">49: Bear</span><br>
        <span class="npc-name" data-name="skeleton" data-id="50">50: skeleton</span><br>
        <span class="npc-name" data-name="Shopkeeper" data-id="51">51: Shopkeeper</span><br>
        <span class="npc-name" data-name="zombie" data-id="52">52: zombie</span><br>
        <span class="npc-name" data-name="Ghost" data-id="53">53: Ghost</span><br>
        <span class="npc-name" data-name="Aubury" data-id="54">54: Aubury</span><br>
        <span class="npc-name" data-name="Shopkeeper" data-id="55">55: Shopkeeper</span><br>
        <span class="npc-name" data-name="shopkeeper" data-id="56">56: shopkeeper</span><br>
        <span class="npc-name" data-name="Darkwizard" data-id="57">57: Darkwizard</span><br>
        <span class="npc-name" data-name="lowe" data-id="58">58: lowe</span><br>
        <span class="npc-name" data-name="Thessalia" data-id="59">59: Thessalia</span><br>
        <span class="npc-name" data-name="Darkwizard" data-id="60">60: Darkwizard</span><br>
        <span class="npc-name" data-name="Giant" data-id="61">61: Giant</span><br>
        <span class="npc-name" data-name="Goblin" data-id="62">62: Goblin</span><br>
        <span class="npc-name" data-name="farmer" data-id="63">63: farmer</span><br>
        <span class="npc-name" data-name="Thief" data-id="64">64: Thief</span><br>
        <span class="npc-name" data-name="Guard" data-id="65">65: Guard</span><br>
        <span class="npc-name" data-name="Black Knight" data-id="66">66: Black Knight</span><br>
        <span class="npc-name" data-name="Hobgoblin" data-id="67">67: Hobgoblin</span><br>
        <span class="npc-name" data-name="zombie" data-id="68">68: zombie</span><br>
        <span class="npc-name" data-name="Zaff" data-id="69">69: Zaff</span><br>
        <span class="npc-name" data-name="Scorpion" data-id="70">70: Scorpion</span><br>
        <span class="npc-name" data-name="silk trader" data-id="71">71: silk trader</span><br>
        <span class="npc-name" data-name="Man" data-id="72">72: Man</span><br>
        <span class="npc-name" data-name="Guide" data-id="73">73: Guide</span><br>
        <span class="npc-name" data-name="Giant Spider" data-id="74">74: Giant Spider</span><br>
        <span class="npc-name" data-name="Peksa" data-id="75">75: Peksa</span><br>
        <span class="npc-name" data-name="Barbarian" data-id="76">76: Barbarian</span><br>
        <span class="npc-name" data-name="Fred the farmer" data-id="77">77: Fred the farmer</span><br>
        <span class="npc-name" data-name="Gunthor the Brave" data-id="78">78: Gunthor the Brave</span><br>
        <span class="npc-name" data-name="Witch" data-id="79">79: Witch</span><br>
        <span class="npc-name" data-name="Ghost" data-id="80">80: Ghost</span><br>
        <span class="npc-name" data-name="Wizard" data-id="81">81: Wizard</span><br>
        <span class="npc-name" data-name="Shop Assistant" data-id="82">82: Shop Assistant</span><br>
        <span class="npc-name" data-name="Shop Assistant" data-id="83">83: Shop Assistant</span><br>
        <span class="npc-name" data-name="Zeke" data-id="84">84: Zeke</span><br>
        <span class="npc-name" data-name="Louie Legs" data-id="85">85: Louie Legs</span><br>
        <span class="npc-name" data-name="Warrior" data-id="86">86: Warrior</span><br>
        <span class="npc-name" data-name="Shopkeeper" data-id="87">87: Shopkeeper</span><br>
        <span class="npc-name" data-name="Shop Assistant" data-id="88">88: Shop Assistant</span><br>
        <span class="npc-name" data-name="Highwayman" data-id="89">89: Highwayman</span><br>
        <span class="npc-name" data-name="Kebab Seller" data-id="90">90: Kebab Seller</span><br>
        <span class="npc-name" data-name="Chicken" data-id="91">91: Chicken</span><br>
        <span class="npc-name" data-name="Ernest" data-id="92">92: Ernest</span><br>
        <span class="npc-name" data-name="Monk" data-id="93">93: Monk</span><br>
        <span class="npc-name" data-name="Dwarf" data-id="94">94: Dwarf</span><br>
        <span class="npc-name" data-name="Banker" data-id="95">95: Banker</span><br>
        <span class="npc-name" data-name="Count Draynor" data-id="96">96: Count Draynor</span><br>
        <span class="npc-name" data-name="Morgan" data-id="97">97: Morgan</span><br>
        <span class="npc-name" data-name="Dr Harlow" data-id="98">98: Dr Harlow</span><br>
        <span class="npc-name" data-name="Deadly Red spider" data-id="99">99: Deadly Red spider</span><br>
        <span class="npc-name" data-name="Guard" data-id="100">100: Guard</span><br>
        <span class="npc-name" data-name="Cassie" data-id="101">101: Cassie</span><br>
        <span class="npc-name" data-name="White Knight" data-id="102">102: White Knight</span><br>
        <span class="npc-name" data-name="Ranael" data-id="103">103: Ranael</span><br>
        <span class="npc-name" data-name="Moss Giant" data-id="104">104: Moss Giant</span><br>
        <span class="npc-name" data-name="Shopkeeper" data-id="105">105: Shopkeeper</span><br>
        <span class="npc-name" data-name="Shop Assistant" data-id="106">106: Shop Assistant</span><br>
        <span class="npc-name" data-name="Witch" data-id="107">107: Witch</span><br>
        <span class="npc-name" data-name="Black Knight" data-id="108">108: Black Knight</span><br>
        <span class="npc-name" data-name="Goreldo" data-id="109">109: Goreldo</span><br>
        <span class="npc-name" data-name="Sir Amik Varze" data-id="110">110: Sir Amik Varze</span><br>
        <span class="npc-name" data-name="Guildmaster" data-id="111">111: Guildmaster</span><br>
        <span class="npc-name" data-name="Valaine" data-id="112">112: Valaine</span><br>
        <span class="npc-name" data-name="Drogo" data-id="113">113: Drogo</span><br>
        <span class="npc-name" data-name="Imp" data-id="114">114: Imp</span><br>
        <span class="npc-name" data-name="Flynn" data-id="115">115: Flynn</span><br>
        <span class="npc-name" data-name="Wyson the gardener" data-id="116">116: Wyson the gardener</span><br>
        <span class="npc-name" data-name="Wizard Mizgog" data-id="117">117: Wizard Mizgog</span><br>
        <span class="npc-name" data-name="Prince Ali" data-id="118">118: Prince Ali</span><br>
        <span class="npc-name" data-name="Hassan" data-id="119">119: Hassan</span><br>
        <span class="npc-name" data-name="Osman" data-id="120">120: Osman</span><br>
        <span class="npc-name" data-name="Joe" data-id="121">121: Joe</span><br>
        <span class="npc-name" data-name="Leela" data-id="122">122: Leela</span><br>
        <span class="npc-name" data-name="Lady Keli" data-id="123">123: Lady Keli</span><br>
        <span class="npc-name" data-name="Ned" data-id="124">124: Ned</span><br>
        <span class="npc-name" data-name="Aggie" data-id="125">125: Aggie</span><br>
        <span class="npc-name" data-name="Prince Ali" data-id="126">126: Prince Ali</span><br>
        <span class="npc-name" data-name="Jailguard" data-id="127">127: Jailguard</span><br>
        <span class="npc-name" data-name="Redbeard Frank" data-id="128">128: Redbeard Frank</span><br>
        <span class="npc-name" data-name="Wydin" data-id="129">129: Wydin</span><br>
        <span class="npc-name" data-name="shop assistant" data-id="130">130: shop assistant</span><br>
        <span class="npc-name" data-name="Brian" data-id="131">131: Brian</span><br>
        <span class="npc-name" data-name="squire" data-id="132">132: squire</span><br>
        <span class="npc-name" data-name="Head chef" data-id="133">133: Head chef</span><br>
        <span class="npc-name" data-name="Thurgo" data-id="134">134: Thurgo</span><br>
        <span class="npc-name" data-name="Ice Giant" data-id="135">135: Ice Giant</span><br>
        <span class="npc-name" data-name="King Scorpion" data-id="136">136: King Scorpion</span><br>
        <span class="npc-name" data-name="Pirate" data-id="137">137: Pirate</span><br>
        <span class="npc-name" data-name="Sir Vyvin" data-id="138">138: Sir Vyvin</span><br>
        <span class="npc-name" data-name="Monk of Zamorak" data-id="139">139: Monk of Zamorak</span><br>
        <span class="npc-name" data-name="Monk of Zamorak" data-id="140">140: Monk of Zamorak</span><br>
        <span class="npc-name" data-name="Wayne" data-id="141">141: Wayne</span><br>
        <span class="npc-name" data-name="Barmaid" data-id="142">142: Barmaid</span><br>
        <span class="npc-name" data-name="Dwarven shopkeeper" data-id="143">143: Dwarven shopkeeper</span><br>
        <span class="npc-name" data-name="Doric" data-id="144">144: Doric</span><br>
        <span class="npc-name" data-name="Shopkeeper" data-id="145">145: Shopkeeper</span><br>
        <span class="npc-name" data-name="Shop Assistant" data-id="146">146: Shop Assistant</span><br>
        <span class="npc-name" data-name="Guide" data-id="147">147: Guide</span><br>
        <span class="npc-name" data-name="Hetty" data-id="148">148: Hetty</span><br>
        <span class="npc-name" data-name="Betty" data-id="149">149: Betty</span><br>
        <span class="npc-name" data-name="Bartender" data-id="150">150: Bartender</span><br>
        <span class="npc-name" data-name="General wartface" data-id="151">151: General wartface</span><br>
        <span class="npc-name" data-name="General Bentnoze" data-id="152">152: General Bentnoze</span><br>
        <span class="npc-name" data-name="Goblin" data-id="153">153: Goblin</span><br>
        <span class="npc-name" data-name="Goblin" data-id="154">154: Goblin</span><br>
        <span class="npc-name" data-name="Herquin" data-id="155">155: Herquin</span><br>
        <span class="npc-name" data-name="Rommik" data-id="156">156: Rommik</span><br>
        <span class="npc-name" data-name="Grum" data-id="157">157: Grum</span><br>
        <span class="npc-name" data-name="Ice warrior" data-id="158">158: Ice warrior</span><br>
        <span class="npc-name" data-name="Warrior" data-id="159">159: Warrior</span><br>
        <span class="npc-name" data-name="Thrander" data-id="160">160: Thrander</span><br>
        <span class="npc-name" data-name="Border Guard" data-id="161">161: Border Guard</span><br>
        <span class="npc-name" data-name="Border Guard" data-id="162">162: Border Guard</span><br>
        <span class="npc-name" data-name="Customs Officer" data-id="163">163: Customs Officer</span><br>
        <span class="npc-name" data-name="Luthas" data-id="164">164: Luthas</span><br>
        <span class="npc-name" data-name="Zambo" data-id="165">165: Zambo</span><br>
        <span class="npc-name" data-name="Captain Tobias" data-id="166">166: Captain Tobias</span><br>
        <span class="npc-name" data-name="Gerrant" data-id="167">167: Gerrant</span><br>
        <span class="npc-name" data-name="Shopkeeper" data-id="168">168: Shopkeeper</span><br>
        <span class="npc-name" data-name="Shop Assistant" data-id="169">169: Shop Assistant</span><br>
        <span class="npc-name" data-name="Seaman Lorris" data-id="170">170: Seaman Lorris</span><br>
        <span class="npc-name" data-name="Seaman Thresnor" data-id="171">171: Seaman Thresnor</span><br>
        <span class="npc-name" data-name="Tanner" data-id="172">172: Tanner</span><br>
        <span class="npc-name" data-name="Dommik" data-id="173">173: Dommik</span><br>
        <span class="npc-name" data-name="Abbot Langley" data-id="174">174: Abbot Langley</span><br>
        <span class="npc-name" data-name="Thordur" data-id="175">175: Thordur</span><br>
        <span class="npc-name" data-name="Brother Jered" data-id="176">176: Brother Jered</span><br>
        <span class="npc-name" data-name="Rat" data-id="177">177: Rat</span><br>
        <span class="npc-name" data-name="Ghost" data-id="178">178: Ghost</span><br>
        <span class="npc-name" data-name="skeleton" data-id="179">179: skeleton</span><br>
        <span class="npc-name" data-name="zombie" data-id="180">180: zombie</span><br>
        <span class="npc-name" data-name="Lesser Demon" data-id="181">181: Lesser Demon</span><br>
        <span class="npc-name" data-name="Melzar the mad" data-id="182">182: Melzar the mad</span><br>
        <span class="npc-name" data-name="Scavvo" data-id="183">183: Scavvo</span><br>
        <span class="npc-name" data-name="Greater Demon" data-id="184">184: Greater Demon</span><br>
        <span class="npc-name" data-name="Shopkeeper" data-id="185">185: Shopkeeper</span><br>
        <span class="npc-name" data-name="Shop Assistant" data-id="186">186: Shop Assistant</span><br>
        <span class="npc-name" data-name="Oziach" data-id="187">187: Oziach</span><br>
        <span class="npc-name" data-name="Bear" data-id="188">188: Bear</span><br>
        <span class="npc-name" data-name="Black Knight" data-id="189">189: Black Knight</span><br>
        <span class="npc-name" data-name="chaos Dwarf" data-id="190">190: chaos Dwarf</span><br>
        <span class="npc-name" data-name="dwarf" data-id="191">191: dwarf</span><br>
        <span class="npc-name" data-name="Wormbrain" data-id="192">192: Wormbrain</span><br>
        <span class="npc-name" data-name="Klarense" data-id="193">193: Klarense</span><br>
        <span class="npc-name" data-name="Ned" data-id="194">194: Ned</span><br>
        <span class="npc-name" data-name="skeleton" data-id="195">195: skeleton</span><br>
        <span class="npc-name" data-name="Dragon" data-id="196">196: Dragon</span><br>
        <span class="npc-name" data-name="Oracle" data-id="197">197: Oracle</span><br>
        <span class="npc-name" data-name="Duke of Lumbridge" data-id="198">198: Duke of Lumbridge</span><br>
        <span class="npc-name" data-name="Dark Warrior" data-id="199">199: Dark Warrior</span><br>
        <span class="npc-name" data-name="Druid" data-id="200">200: Druid</span><br>
        <span class="npc-name" data-name="Red Dragon" data-id="201">201: Red Dragon</span><br>
        <span class="npc-name" data-name="Blue Dragon" data-id="202">202: Blue Dragon</span><br>
        <span class="npc-name" data-name="Baby Blue Dragon" data-id="203">203: Baby Blue Dragon</span><br>
        <span class="npc-name" data-name="Kaqemeex" data-id="204">204: Kaqemeex</span><br>
        <span class="npc-name" data-name="Sanfew" data-id="205">205: Sanfew</span><br>
        <span class="npc-name" data-name="Suit of armour" data-id="206">206: Suit of armour</span><br>
        <span class="npc-name" data-name="Adventurer" data-id="207">207: Adventurer</span><br>
        <span class="npc-name" data-name="Adventurer" data-id="208">208: Adventurer</span><br>
        <span class="npc-name" data-name="Adventurer" data-id="209">209: Adventurer</span><br>
        <span class="npc-name" data-name="Adventurer" data-id="210">210: Adventurer</span><br>
        <span class="npc-name" data-name="Leprechaun" data-id="211">211: Leprechaun</span><br>
        <span class="npc-name" data-name="Monk of entrana" data-id="212">212: Monk of entrana</span><br>
        <span class="npc-name" data-name="Monk of entrana" data-id="213">213: Monk of entrana</span><br>
        <span class="npc-name" data-name="zombie" data-id="214">214: zombie</span><br>
        <span class="npc-name" data-name="Monk of entrana" data-id="215">215: Monk of entrana</span><br>
        <span class="npc-name" data-name="tree spirit" data-id="216">216: tree spirit</span><br>
        <span class="npc-name" data-name="cow" data-id="217">217: cow</span><br>
        <span class="npc-name" data-name="Irksol" data-id="218">218: Irksol</span><br>
        <span class="npc-name" data-name="Fairy Lunderwin" data-id="219">219: Fairy Lunderwin</span><br>
        <span class="npc-name" data-name="Jakut" data-id="220">220: Jakut</span><br>
        <span class="npc-name" data-name="Doorman" data-id="221">221: Doorman</span><br>
        <span class="npc-name" data-name="Fairy Shopkeeper" data-id="222">222: Fairy Shopkeeper</span><br>
        <span class="npc-name" data-name="Fairy Shop Assistant" data-id="223">223: Fairy Shop Assistant</span><br>
        <span class="npc-name" data-name="Fairy banker" data-id="224">224: Fairy banker</span><br>
        <span class="npc-name" data-name="Giles" data-id="225">225: Giles</span><br>
        <span class="npc-name" data-name="Miles" data-id="226">226: Miles</span><br>
        <span class="npc-name" data-name="Niles" data-id="227">227: Niles</span><br>
        <span class="npc-name" data-name="Gaius" data-id="228">228: Gaius</span><br>
        <span class="npc-name" data-name="Fairy Ladder attendant" data-id="229">229: Fairy Ladder attendant</span><br>
        <span class="npc-name" data-name="Jatix" data-id="230">230: Jatix</span><br>
        <span class="npc-name" data-name="Master Crafter" data-id="231">231: Master Crafter</span><br>
        <span class="npc-name" data-name="Bandit" data-id="232">232: Bandit</span><br>
        <span class="npc-name" data-name="Noterazzo" data-id="233">233: Noterazzo</span><br>
        <span class="npc-name" data-name="Bandit" data-id="234">234: Bandit</span><br>
        <span class="npc-name" data-name="Fat Tony" data-id="235">235: Fat Tony</span><br>
        <span class="npc-name" data-name="Donny the lad" data-id="236">236: Donny the lad</span><br>
        <span class="npc-name" data-name="Black Heather" data-id="237">237: Black Heather</span><br>
        <span class="npc-name" data-name="Speedy Keith" data-id="238">238: Speedy Keith</span><br>
        <span class="npc-name" data-name="White wolf sentry" data-id="239">239: White wolf sentry</span><br>
        <span class="npc-name" data-name="Boy" data-id="240">240: Boy</span><br>
        <span class="npc-name" data-name="Rat" data-id="241">241: Rat</span><br>
        <span class="npc-name" data-name="Nora T Hag" data-id="242">242: Nora T Hag</span><br>
        <span class="npc-name" data-name="Grey wolf" data-id="243">243: Grey wolf</span><br>
        <span class="npc-name" data-name="shapeshifter" data-id="244">244: shapeshifter</span><br>
        <span class="npc-name" data-name="shapeshifter" data-id="245">245: shapeshifter</span><br>
        <span class="npc-name" data-name="shapeshifter" data-id="246">246: shapeshifter</span><br>
        <span class="npc-name" data-name="shapeshifter" data-id="247">247: shapeshifter</span><br>
        <span class="npc-name" data-name="White wolf" data-id="248">248: White wolf</span><br>
        <span class="npc-name" data-name="Pack leader" data-id="249">249: Pack leader</span><br>
        <span class="npc-name" data-name="Harry" data-id="250">250: Harry</span><br>
        <span class="npc-name" data-name="Thug" data-id="251">251: Thug</span><br>
        <span class="npc-name" data-name="Firebird" data-id="252">252: Firebird</span><br>
        <span class="npc-name" data-name="Achetties" data-id="253">253: Achetties</span><br>
        <span class="npc-name" data-name="Ice queen" data-id="254">254: Ice queen</span><br>
        <span class="npc-name" data-name="Grubor" data-id="255">255: Grubor</span><br>
        <span class="npc-name" data-name="Trobert" data-id="256">256: Trobert</span><br>
        <span class="npc-name" data-name="Garv" data-id="257">257: Garv</span><br>
        <span class="npc-name" data-name="guard" data-id="258">258: guard</span><br>
        <span class="npc-name" data-name="Grip" data-id="259">259: Grip</span><br>
        <span class="npc-name" data-name="Alfonse the waiter" data-id="260">260: Alfonse the waiter</span><br>
        <span class="npc-name" data-name="Charlie the cook" data-id="261">261: Charlie the cook</span><br>
        <span class="npc-name" data-name="Guard Dog" data-id="262">262: Guard Dog</span><br>
        <span class="npc-name" data-name="Ice spider" data-id="263">263: Ice spider</span><br>
        <span class="npc-name" data-name="Pirate" data-id="264">264: Pirate</span><br>
        <span class="npc-name" data-name="Jailer" data-id="265">265: Jailer</span><br>
        <span class="npc-name" data-name="Lord Darquarius" data-id="266">266: Lord Darquarius</span><br>
        <span class="npc-name" data-name="Seth" data-id="267">267: Seth</span><br>
        <span class="npc-name" data-name="Banker" data-id="268">268: Banker</span><br>
        <span class="npc-name" data-name="Helemos" data-id="269">269: Helemos</span><br>
        <span class="npc-name" data-name="Chaos Druid" data-id="270">270: Chaos Druid</span><br>
        <span class="npc-name" data-name="Poison Scorpion" data-id="271">271: Poison Scorpion</span><br>
        <span class="npc-name" data-name="Velrak the explorer" data-id="272">272: Velrak the explorer</span><br>
        <span class="npc-name" data-name="Sir Lancelot" data-id="273">273: Sir Lancelot</span><br>
        <span class="npc-name" data-name="Sir Gawain" data-id="274">274: Sir Gawain</span><br>
        <span class="npc-name" data-name="King Arthur" data-id="275">275: King Arthur</span><br>
        <span class="npc-name" data-name="Sir Mordred" data-id="276">276: Sir Mordred</span><br>
        <span class="npc-name" data-name="Renegade knight" data-id="277">277: Renegade knight</span><br>
        <span class="npc-name" data-name="Davon" data-id="278">278: Davon</span><br>
        <span class="npc-name" data-name="Bartender" data-id="279">279: Bartender</span><br>
        <span class="npc-name" data-name="Arhein" data-id="280">280: Arhein</span><br>
        <span class="npc-name" data-name="Morgan le faye" data-id="281">281: Morgan le faye</span><br>
        <span class="npc-name" data-name="Candlemaker" data-id="282">282: Candlemaker</span><br>
        <span class="npc-name" data-name="lady" data-id="283">283: lady</span><br>
        <span class="npc-name" data-name="lady" data-id="284">284: lady</span><br>
        <span class="npc-name" data-name="lady" data-id="285">285: lady</span><br>
        <span class="npc-name" data-name="Beggar" data-id="286">286: Beggar</span><br>
        <span class="npc-name" data-name="Merlin" data-id="287">287: Merlin</span><br>
        <span class="npc-name" data-name="Thrantax" data-id="288">288: Thrantax</span><br>
        <span class="npc-name" data-name="Hickton" data-id="289">289: Hickton</span><br>
        <span class="npc-name" data-name="Black Demon" data-id="290">290: Black Demon</span><br>
        <span class="npc-name" data-name="Black Dragon" data-id="291">291: Black Dragon</span><br>
        <span class="npc-name" data-name="Poison Spider" data-id="292">292: Poison Spider</span><br>
        <span class="npc-name" data-name="Monk of Zamorak" data-id="293">293: Monk of Zamorak</span><br>
        <span class="npc-name" data-name="Hellhound" data-id="294">294: Hellhound</span><br>
        <span class="npc-name" data-name="Animated axe" data-id="295">295: Animated axe</span><br>
        <span class="npc-name" data-name="Black Unicorn" data-id="296">296: Black Unicorn</span><br>
        <span class="npc-name" data-name="Frincos" data-id="297">297: Frincos</span><br>
        <span class="npc-name" data-name="Otherworldly being" data-id="298">298: Otherworldly being</span><br>
        <span class="npc-name" data-name="Owen" data-id="299">299: Owen</span><br>
        <span class="npc-name" data-name="Thormac the sorceror" data-id="300">300: Thormac the sorceror</span><br>
        <span class="npc-name" data-name="Seer" data-id="301">301: Seer</span><br>
        <span class="npc-name" data-name="Kharid Scorpion" data-id="302">302: Kharid Scorpion</span><br>
        <span class="npc-name" data-name="Kharid Scorpion" data-id="303">303: Kharid Scorpion</span><br>
        <span class="npc-name" data-name="Kharid Scorpion" data-id="304">304: Kharid Scorpion</span><br>
        <span class="npc-name" data-name="Barbarian guard" data-id="305">305: Barbarian guard</span><br>
        <span class="npc-name" data-name="Bartender" data-id="306">306: Bartender</span><br>
        <span class="npc-name" data-name="man" data-id="307">307: man</span><br>
        <span class="npc-name" data-name="gem trader" data-id="308">308: gem trader</span><br>
        <span class="npc-name" data-name="Dimintheis" data-id="309">309: Dimintheis</span><br>
        <span class="npc-name" data-name="chef" data-id="310">310: chef</span><br>
        <span class="npc-name" data-name="Hobgoblin" data-id="311">311: Hobgoblin</span><br>
        <span class="npc-name" data-name="Ogre" data-id="312">312: Ogre</span><br>
        <span class="npc-name" data-name="Boot the Dwarf" data-id="313">313: Boot the Dwarf</span><br>
        <span class="npc-name" data-name="Wizard" data-id="314">314: Wizard</span><br>
        <span class="npc-name" data-name="Chronozon" data-id="315">315: Chronozon</span><br>
        <span class="npc-name" data-name="Captain Barnaby" data-id="316">316: Captain Barnaby</span><br>
        <span class="npc-name" data-name="Customs Official" data-id="317">317: Customs Official</span><br>
        <span class="npc-name" data-name="Man" data-id="318">318: Man</span><br>
        <span class="npc-name" data-name="farmer" data-id="319">319: farmer</span><br>
        <span class="npc-name" data-name="Warrior" data-id="320">320: Warrior</span><br>
        <span class="npc-name" data-name="Guard" data-id="321">321: Guard</span><br>
        <span class="npc-name" data-name="Knight" data-id="322">322: Knight</span><br>
        <span class="npc-name" data-name="Paladin" data-id="323">323: Paladin</span><br>
        <span class="npc-name" data-name="Hero" data-id="324">324: Hero</span><br>
        <span class="npc-name" data-name="Baker" data-id="325">325: Baker</span><br>
        <span class="npc-name" data-name="silk merchant" data-id="326">326: silk merchant</span><br>
        <span class="npc-name" data-name="Fur trader" data-id="327">327: Fur trader</span><br>
        <span class="npc-name" data-name="silver merchant" data-id="328">328: silver merchant</span><br>
        <span class="npc-name" data-name="spice merchant" data-id="329">329: spice merchant</span><br>
        <span class="npc-name" data-name="gem merchant" data-id="330">330: gem merchant</span><br>
        <span class="npc-name" data-name="Zenesha" data-id="331">331: Zenesha</span><br>
        <span class="npc-name" data-name="Kangai Mau" data-id="332">332: Kangai Mau</span><br>
        <span class="npc-name" data-name="Wizard Cromperty" data-id="333">333: Wizard Cromperty</span><br>
        <span class="npc-name" data-name="RPDT employee" data-id="334">334: RPDT employee</span><br>
        <span class="npc-name" data-name="Horacio" data-id="335">335: Horacio</span><br>
        <span class="npc-name" data-name="Aemad" data-id="336">336: Aemad</span><br>
        <span class="npc-name" data-name="Kortan" data-id="337">337: Kortan</span><br>
        <span class="npc-name" data-name="zoo keeper" data-id="338">338: zoo keeper</span><br>
        <span class="npc-name" data-name="Make over mage" data-id="339">339: Make over mage</span><br>
        <span class="npc-name" data-name="Bartender" data-id="340">340: Bartender</span><br>
        <span class="npc-name" data-name="chuck" data-id="341">341: chuck</span><br>
        <span class="npc-name" data-name="Rogue" data-id="342">342: Rogue</span><br>
        <span class="npc-name" data-name="Shadow spider" data-id="343">343: Shadow spider</span><br>
        <span class="npc-name" data-name="Fire Giant" data-id="344">344: Fire Giant</span><br>
        <span class="npc-name" data-name="Grandpa Jack" data-id="345">345: Grandpa Jack</span><br>
        <span class="npc-name" data-name="Sinister stranger" data-id="346">346: Sinister stranger</span><br>
        <span class="npc-name" data-name="Bonzo" data-id="347">347: Bonzo</span><br>
        <span class="npc-name" data-name="Forester" data-id="348">348: Forester</span><br>
        <span class="npc-name" data-name="Morris" data-id="349">349: Morris</span><br>
        <span class="npc-name" data-name="Brother Omad" data-id="350">350: Brother Omad</span><br>
        <span class="npc-name" data-name="Thief" data-id="351">351: Thief</span><br>
        <span class="npc-name" data-name="Head Thief" data-id="352">352: Head Thief</span><br>
        <span class="npc-name" data-name="Big Dave" data-id="353">353: Big Dave</span><br>
        <span class="npc-name" data-name="Joshua" data-id="354">354: Joshua</span><br>
        <span class="npc-name" data-name="Mountain Dwarf" data-id="355">355: Mountain Dwarf</span><br>
        <span class="npc-name" data-name="Mountain Dwarf" data-id="356">356: Mountain Dwarf</span><br>
        <span class="npc-name" data-name="Brother Cedric" data-id="357">357: Brother Cedric</span><br>
        <span class="npc-name" data-name="Necromancer" data-id="358">358: Necromancer</span><br>
        <span class="npc-name" data-name="zombie" data-id="359">359: zombie</span><br>
        <span class="npc-name" data-name="Lucien" data-id="360">360: Lucien</span><br>
        <span class="npc-name" data-name="The Fire warrior of lesarkus" data-id="361">361: The Fire warrior of lesarkus</span><br>
        <span class="npc-name" data-name="guardian of Armadyl" data-id="362">362: guardian of Armadyl</span><br>
        <span class="npc-name" data-name="guardian of Armadyl" data-id="363">363: guardian of Armadyl</span><br>
        <span class="npc-name" data-name="Lucien" data-id="364">364: Lucien</span><br>
        <span class="npc-name" data-name="winelda" data-id="365">365: winelda</span><br>
        <span class="npc-name" data-name="Brother Kojo" data-id="366">366: Brother Kojo</span><br>
        <span class="npc-name" data-name="Dungeon Rat" data-id="367">367: Dungeon Rat</span><br>
        <span class="npc-name" data-name="Master fisher" data-id="368">368: Master fisher</span><br>
        <span class="npc-name" data-name="Orven" data-id="369">369: Orven</span><br>
        <span class="npc-name" data-name="Padik" data-id="370">370: Padik</span><br>
        <span class="npc-name" data-name="Shopkeeper" data-id="371">371: Shopkeeper</span><br>
        <span class="npc-name" data-name="Lady servil" data-id="372">372: Lady servil</span><br>
        <span class="npc-name" data-name="Guard" data-id="373">373: Guard</span><br>
        <span class="npc-name" data-name="Guard" data-id="374">374: Guard</span><br>
        <span class="npc-name" data-name="Guard" data-id="375">375: Guard</span><br>
        <span class="npc-name" data-name="Guard" data-id="376">376: Guard</span><br>
        <span class="npc-name" data-name="Jeremy Servil" data-id="377">377: Jeremy Servil</span><br>
        <span class="npc-name" data-name="Justin Servil" data-id="378">378: Justin Servil</span><br>
        <span class="npc-name" data-name="fightslave joe" data-id="379">379: fightslave joe</span><br>
        <span class="npc-name" data-name="fightslave kelvin" data-id="380">380: fightslave kelvin</span><br>
        <span class="npc-name" data-name="local" data-id="381">381: local</span><br>
        <span class="npc-name" data-name="Khazard Bartender" data-id="382">382: Khazard Bartender</span><br>
        <span class="npc-name" data-name="General Khazard" data-id="383">383: General Khazard</span><br>
        <span class="npc-name" data-name="Khazard Ogre" data-id="384">384: Khazard Ogre</span><br>
        <span class="npc-name" data-name="Guard" data-id="385">385: Guard</span><br>
        <span class="npc-name" data-name="Khazard Scorpion" data-id="386">386: Khazard Scorpion</span><br>
        <span class="npc-name" data-name="hengrad" data-id="387">387: hengrad</span><br>
        <span class="npc-name" data-name="Bouncer" data-id="388">388: Bouncer</span><br>
        <span class="npc-name" data-name="Stankers" data-id="389">389: Stankers</span><br>
        <span class="npc-name" data-name="Docky" data-id="390">390: Docky</span><br>
        <span class="npc-name" data-name="Shopkeeper" data-id="391">391: Shopkeeper</span><br>
        <span class="npc-name" data-name="Fairy queen" data-id="392">392: Fairy queen</span><br>
        <span class="npc-name" data-name="Merlin" data-id="393">393: Merlin</span><br>
        <span class="npc-name" data-name="Crone" data-id="394">394: Crone</span><br>
        <span class="npc-name" data-name="High priest of entrana" data-id="395">395: High priest of entrana</span><br>
        <span class="npc-name" data-name="elkoy" data-id="396">396: elkoy</span><br>
        <span class="npc-name" data-name="remsai" data-id="397">397: remsai</span><br>
        <span class="npc-name" data-name="bolkoy" data-id="398">398: bolkoy</span><br>
        <span class="npc-name" data-name="local gnome" data-id="399">399: local gnome</span><br>
        <span class="npc-name" data-name="bolren" data-id="400">400: bolren</span><br>
        <span class="npc-name" data-name="Black Knight titan" data-id="401">401: Black Knight titan</span><br>
        <span class="npc-name" data-name="kalron" data-id="402">402: kalron</span><br>
        <span class="npc-name" data-name="brother Galahad" data-id="403">403: brother Galahad</span><br>
        <span class="npc-name" data-name="tracker 1" data-id="404">404: tracker 1</span><br>
        <span class="npc-name" data-name="tracker 2" data-id="405">405: tracker 2</span><br>
        <span class="npc-name" data-name="tracker 3" data-id="406">406: tracker 3</span><br>
        <span class="npc-name" data-name="Khazard troop" data-id="407">407: Khazard troop</span><br>
        <span class="npc-name" data-name="commander montai" data-id="408">408: commander montai</span><br>
        <span class="npc-name" data-name="gnome troop" data-id="409">409: gnome troop</span><br>
        <span class="npc-name" data-name="khazard warlord" data-id="410">410: khazard warlord</span><br>
        <span class="npc-name" data-name="Sir Percival" data-id="411">411: Sir Percival</span><br>
        <span class="npc-name" data-name="Fisher king" data-id="412">412: Fisher king</span><br>
        <span class="npc-name" data-name="maiden" data-id="413">413: maiden</span><br>
        <span class="npc-name" data-name="Fisherman" data-id="414">414: Fisherman</span><br>
        <span class="npc-name" data-name="King Percival" data-id="415">415: King Percival</span><br>
        <span class="npc-name" data-name="unhappy peasant" data-id="416">416: unhappy peasant</span><br>
        <span class="npc-name" data-name="happy peasant" data-id="417">417: happy peasant</span><br>
        <span class="npc-name" data-name="ceril" data-id="418">418: ceril</span><br>
        <span class="npc-name" data-name="butler" data-id="419">419: butler</span><br>
        <span class="npc-name" data-name="carnillean guard" data-id="420">420: carnillean guard</span><br>
        <span class="npc-name" data-name="Tribesman" data-id="421">421: Tribesman</span><br>
        <span class="npc-name" data-name="henryeta" data-id="422">422: henryeta</span><br>
        <span class="npc-name" data-name="philipe" data-id="423">423: philipe</span><br>
        <span class="npc-name" data-name="clivet" data-id="424">424: clivet</span><br>
        <span class="npc-name" data-name="cult member" data-id="425">425: cult member</span><br>
        <span class="npc-name" data-name="Lord hazeel" data-id="426">426: Lord hazeel</span><br>
        <span class="npc-name" data-name="alomone" data-id="427">427: alomone</span><br>
        <span class="npc-name" data-name="Khazard commander" data-id="428">428: Khazard commander</span><br>
        <span class="npc-name" data-name="claus" data-id="429">429: claus</span><br>
        <span class="npc-name" data-name="1st plague sheep" data-id="430">430: 1st plague sheep</span><br>
        <span class="npc-name" data-name="2nd plague sheep" data-id="431">431: 2nd plague sheep</span><br>
        <span class="npc-name" data-name="3rd plague sheep" data-id="432">432: 3rd plague sheep</span><br>
        <span class="npc-name" data-name="4th plague sheep" data-id="433">433: 4th plague sheep</span><br>
        <span class="npc-name" data-name="Farmer brumty" data-id="434">434: Farmer brumty</span><br>
        <span class="npc-name" data-name="Doctor orbon" data-id="435">435: Doctor orbon</span><br>
        <span class="npc-name" data-name="Councillor Halgrive" data-id="436">436: Councillor Halgrive</span><br>
        <span class="npc-name" data-name="Edmond" data-id="437">437: Edmond</span><br>
        <span class="npc-name" data-name="Citizen" data-id="438">438: Citizen</span><br>
        <span class="npc-name" data-name="Citizen" data-id="439">439: Citizen</span><br>
        <span class="npc-name" data-name="Citizen" data-id="440">440: Citizen</span><br>
        <span class="npc-name" data-name="Citizen" data-id="441">441: Citizen</span><br>
        <span class="npc-name" data-name="Citizen" data-id="442">442: Citizen</span><br>
        <span class="npc-name" data-name="Jethick" data-id="443">443: Jethick</span><br>
        <span class="npc-name" data-name="Mourner" data-id="444">444: Mourner</span><br>
        <span class="npc-name" data-name="Mourner" data-id="445">445: Mourner</span><br>
        <span class="npc-name" data-name="Ted Rehnison" data-id="446">446: Ted Rehnison</span><br>
        <span class="npc-name" data-name="Martha Rehnison" data-id="447">447: Martha Rehnison</span><br>
        <span class="npc-name" data-name="Billy Rehnison" data-id="448">448: Billy Rehnison</span><br>
        <span class="npc-name" data-name="Milli Rehnison" data-id="449">449: Milli Rehnison</span><br>
        <span class="npc-name" data-name="Alrena" data-id="450">450: Alrena</span><br>
        <span class="npc-name" data-name="Mourner" data-id="451">451: Mourner</span><br>
        <span class="npc-name" data-name="Clerk" data-id="452">452: Clerk</span><br>
        <span class="npc-name" data-name="Carla" data-id="453">453: Carla</span><br>
        <span class="npc-name" data-name="Bravek" data-id="454">454: Bravek</span><br>
        <span class="npc-name" data-name="Caroline" data-id="455">455: Caroline</span><br>
        <span class="npc-name" data-name="Holgart" data-id="456">456: Holgart</span><br>
        <span class="npc-name" data-name="Holgart" data-id="457">457: Holgart</span><br>
        <span class="npc-name" data-name="Holgart" data-id="458">458: Holgart</span><br>
        <span class="npc-name" data-name="kent" data-id="459">459: kent</span><br>
        <span class="npc-name" data-name="bailey" data-id="460">460: bailey</span><br>
        <span class="npc-name" data-name="kennith" data-id="461">461: kennith</span><br>
        <span class="npc-name" data-name="Platform Fisherman" data-id="462">462: Platform Fisherman</span><br>
        <span class="npc-name" data-name="Platform Fisherman" data-id="463">463: Platform Fisherman</span><br>
        <span class="npc-name" data-name="Platform Fisherman" data-id="464">464: Platform Fisherman</span><br>
        <span class="npc-name" data-name="Elena" data-id="465">465: Elena</span><br>
        <span class="npc-name" data-name="jinno" data-id="466">466: jinno</span><br>
        <span class="npc-name" data-name="Watto" data-id="467">467: Watto</span><br>
        <span class="npc-name" data-name="Recruiter" data-id="468">468: Recruiter</span><br>
        <span class="npc-name" data-name="Head mourner" data-id="469">469: Head mourner</span><br>
        <span class="npc-name" data-name="Almera" data-id="470">470: Almera</span><br>
        <span class="npc-name" data-name="hudon" data-id="471">471: hudon</span><br>
        <span class="npc-name" data-name="hadley" data-id="472">472: hadley</span><br>
        <span class="npc-name" data-name="Rat" data-id="473">473: Rat</span><br>
        <span class="npc-name" data-name="Combat instructor" data-id="474">474: Combat instructor</span><br>
        <span class="npc-name" data-name="golrie" data-id="475">475: golrie</span><br>
        <span class="npc-name" data-name="Guide" data-id="476">476: Guide</span><br>
        <span class="npc-name" data-name="King Black Dragon" data-id="477">477: King Black Dragon</span><br>
        <span class="npc-name" data-name="cooking instructor" data-id="478">478: cooking instructor</span><br>
        <span class="npc-name" data-name="fishing instructor" data-id="479">479: fishing instructor</span><br>
        <span class="npc-name" data-name="financial advisor" data-id="480">480: financial advisor</span><br>
        <span class="npc-name" data-name="gerald" data-id="481">481: gerald</span><br>
        <span class="npc-name" data-name="mining instructor" data-id="482">482: mining instructor</span><br>
        <span class="npc-name" data-name="Elena" data-id="483">483: Elena</span><br>
        <span class="npc-name" data-name="Omart" data-id="484">484: Omart</span><br>
        <span class="npc-name" data-name="Bank assistant" data-id="485">485: Bank assistant</span><br>
        <span class="npc-name" data-name="Jerico" data-id="486">486: Jerico</span><br>
        <span class="npc-name" data-name="Kilron" data-id="487">487: Kilron</span><br>
        <span class="npc-name" data-name="Guidor's wife" data-id="488">488: Guidor's wife</span><br>
        <span class="npc-name" data-name="Quest advisor" data-id="489">489: Quest advisor</span><br>
        <span class="npc-name" data-name="chemist" data-id="490">490: chemist</span><br>
        <span class="npc-name" data-name="Mourner" data-id="491">491: Mourner</span><br>
        <span class="npc-name" data-name="Mourner" data-id="492">492: Mourner</span><br>
        <span class="npc-name" data-name="Wilderness guide" data-id="493">493: Wilderness guide</span><br>
        <span class="npc-name" data-name="Magic Instructor" data-id="494">494: Magic Instructor</span><br>
        <span class="npc-name" data-name="Mourner" data-id="495">495: Mourner</span><br>
        <span class="npc-name" data-name="Community instructor" data-id="496">496: Community instructor</span><br>
        <span class="npc-name" data-name="boatman" data-id="497">497: boatman</span><br>
        <span class="npc-name" data-name="skeleton mage" data-id="498">498: skeleton mage</span><br>
        <span class="npc-name" data-name="controls guide" data-id="499">499: controls guide</span><br>
        <span class="npc-name" data-name="nurse sarah" data-id="500">500: nurse sarah</span><br>
        <span class="npc-name" data-name="Tailor" data-id="501">501: Tailor</span><br>
        <span class="npc-name" data-name="Mourner" data-id="502">502: Mourner</span><br>
        <span class="npc-name" data-name="Guard" data-id="503">503: Guard</span><br>
        <span class="npc-name" data-name="Chemist" data-id="504">504: Chemist</span><br>
        <span class="npc-name" data-name="Chancy" data-id="505">505: Chancy</span><br>
        <span class="npc-name" data-name="Hops" data-id="506">506: Hops</span><br>
        <span class="npc-name" data-name="DeVinci" data-id="507">507: DeVinci</span><br>
        <span class="npc-name" data-name="Guidor" data-id="508">508: Guidor</span><br>
        <span class="npc-name" data-name="Chancy" data-id="509">509: Chancy</span><br>
        <span class="npc-name" data-name="Hops" data-id="510">510: Hops</span><br>
        <span class="npc-name" data-name="DeVinci" data-id="511">511: DeVinci</span><br>
        <span class="npc-name" data-name="king Lathas" data-id="512">512: king Lathas</span><br>
        <span class="npc-name" data-name="Head wizard" data-id="513">513: Head wizard</span><br>
        <span class="npc-name" data-name="Magic store owner" data-id="514">514: Magic store owner</span><br>
        <span class="npc-name" data-name="Wizard Frumscone" data-id="515">515: Wizard Frumscone</span><br>
        <span class="npc-name" data-name="target practice zombie" data-id="516">516: target practice zombie</span><br>
        <span class="npc-name" data-name="Trufitus" data-id="517">517: Trufitus</span><br>
        <span class="npc-name" data-name="Colonel Radick" data-id="518">518: Colonel Radick</span><br>
        <span class="npc-name" data-name="Soldier" data-id="519">519: Soldier</span><br>
        <span class="npc-name" data-name="Bartender" data-id="520">520: Bartender</span><br>
        <span class="npc-name" data-name="Jungle Spider" data-id="521">521: Jungle Spider</span><br>
        <span class="npc-name" data-name="Jiminua" data-id="522">522: Jiminua</span><br>
        <span class="npc-name" data-name="Jogre" data-id="523">523: Jogre</span><br>
        <span class="npc-name" data-name="Guard" data-id="524">524: Guard</span><br>
        <span class="npc-name" data-name="Ogre" data-id="525">525: Ogre</span><br>
        <span class="npc-name" data-name="Guard" data-id="526">526: Guard</span><br>
        <span class="npc-name" data-name="Guard" data-id="527">527: Guard</span><br>
        <span class="npc-name" data-name="shop keeper" data-id="528">528: shop keeper</span><br>
        <span class="npc-name" data-name="Bartender" data-id="529">529: Bartender</span><br>
        <span class="npc-name" data-name="Frenita" data-id="530">530: Frenita</span><br>
        <span class="npc-name" data-name="Ogre chieftan" data-id="531">531: Ogre chieftan</span><br>
        <span class="npc-name" data-name="rometti" data-id="532">532: rometti</span><br>
        <span class="npc-name" data-name="Rashiliyia" data-id="533">533: Rashiliyia</span><br>
        <span class="npc-name" data-name="Blurberry" data-id="534">534: Blurberry</span><br>
        <span class="npc-name" data-name="Heckel funch" data-id="535">535: Heckel funch</span><br>
        <span class="npc-name" data-name="Aluft Gianne" data-id="536">536: Aluft Gianne</span><br>
        <span class="npc-name" data-name="Hudo glenfad" data-id="537">537: Hudo glenfad</span><br>
        <span class="npc-name" data-name="Irena" data-id="538">538: Irena</span><br>
        <span class="npc-name" data-name="Mosol" data-id="539">539: Mosol</span><br>
        <span class="npc-name" data-name="Gnome banker" data-id="540">540: Gnome banker</span><br>
        <span class="npc-name" data-name="King Narnode Shareen" data-id="541">541: King Narnode Shareen</span><br>
        <span class="npc-name" data-name="UndeadOne" data-id="542">542: UndeadOne</span><br>
        <span class="npc-name" data-name="Drucas" data-id="543">543: Drucas</span><br>
        <span class="npc-name" data-name="tourist" data-id="544">544: tourist</span><br>
        <span class="npc-name" data-name="King Narnode Shareen" data-id="545">545: King Narnode Shareen</span><br>
        <span class="npc-name" data-name="Hazelmere" data-id="546">546: Hazelmere</span><br>
        <span class="npc-name" data-name="Glough" data-id="547">547: Glough</span><br>
        <span class="npc-name" data-name="Shar" data-id="548">548: Shar</span><br>
        <span class="npc-name" data-name="Shantay" data-id="549">549: Shantay</span><br>
        <span class="npc-name" data-name="charlie" data-id="550">550: charlie</span><br>
        <span class="npc-name" data-name="Gnome guard" data-id="551">551: Gnome guard</span><br>
        <span class="npc-name" data-name="Gnome pilot" data-id="552">552: Gnome pilot</span><br>
        <span class="npc-name" data-name="Mehman" data-id="553">553: Mehman</span><br>
        <span class="npc-name" data-name="Ana" data-id="554">554: Ana</span><br>
        <span class="npc-name" data-name="Chaos Druid warrior" data-id="555">555: Chaos Druid warrior</span><br>
        <span class="npc-name" data-name="Gnome pilot" data-id="556">556: Gnome pilot</span><br>
        <span class="npc-name" data-name="Shipyard worker" data-id="557">557: Shipyard worker</span><br>
        <span class="npc-name" data-name="Shipyard worker" data-id="558">558: Shipyard worker</span><br>
        <span class="npc-name" data-name="Shipyard worker" data-id="559">559: Shipyard worker</span><br>
        <span class="npc-name" data-name="Shipyard foreman" data-id="560">560: Shipyard foreman</span><br>
        <span class="npc-name" data-name="Shipyard foreman" data-id="561">561: Shipyard foreman</span><br>
        <span class="npc-name" data-name="Gnome guard" data-id="562">562: Gnome guard</span><br>
        <span class="npc-name" data-name="Femi" data-id="563">563: Femi</span><br>
        <span class="npc-name" data-name="Femi" data-id="564">564: Femi</span><br>
        <span class="npc-name" data-name="Anita" data-id="565">565: Anita</span><br>
        <span class="npc-name" data-name="Glough" data-id="566">566: Glough</span><br>
        <span class="npc-name" data-name="Salarin the twisted" data-id="567">567: Salarin the twisted</span><br>
        <span class="npc-name" data-name="Black Demon" data-id="568">568: Black Demon</span><br>
        <span class="npc-name" data-name="Gnome pilot" data-id="569">569: Gnome pilot</span><br>
        <span class="npc-name" data-name="Gnome pilot" data-id="570">570: Gnome pilot</span><br>
        <span class="npc-name" data-name="Gnome pilot" data-id="571">571: Gnome pilot</span><br>
        <span class="npc-name" data-name="Gnome pilot" data-id="572">572: Gnome pilot</span><br>
        <span class="npc-name" data-name="Sigbert the Adventurer" data-id="573">573: Sigbert the Adventurer</span><br>
        <span class="npc-name" data-name="Yanille Watchman" data-id="574">574: Yanille Watchman</span><br>
        <span class="npc-name" data-name="Tower guard" data-id="575">575: Tower guard</span><br>
        <span class="npc-name" data-name="Gnome Trainer" data-id="576">576: Gnome Trainer</span><br>
        <span class="npc-name" data-name="Gnome Trainer" data-id="577">577: Gnome Trainer</span><br>
        <span class="npc-name" data-name="Gnome Trainer" data-id="578">578: Gnome Trainer</span><br>
        <span class="npc-name" data-name="Gnome Trainer" data-id="579">579: Gnome Trainer</span><br>
        <span class="npc-name" data-name="Blurberry barman" data-id="580">580: Blurberry barman</span><br>
        <span class="npc-name" data-name="Gnome waiter" data-id="581">581: Gnome waiter</span><br>
        <span class="npc-name" data-name="Gnome guard" data-id="582">582: Gnome guard</span><br>
        <span class="npc-name" data-name="Gnome child" data-id="583">583: Gnome child</span><br>
        <span class="npc-name" data-name="Earth warrior" data-id="584">584: Earth warrior</span><br>
        <span class="npc-name" data-name="Gnome child" data-id="585">585: Gnome child</span><br>
        <span class="npc-name" data-name="Gnome child" data-id="586">586: Gnome child</span><br>
        <span class="npc-name" data-name="Gulluck" data-id="587">587: Gulluck</span><br>
        <span class="npc-name" data-name="Gunnjorn" data-id="588">588: Gunnjorn</span><br>
        <span class="npc-name" data-name="Zadimus" data-id="589">589: Zadimus</span><br>
        <span class="npc-name" data-name="Brimstail" data-id="590">590: Brimstail</span><br>
        <span class="npc-name" data-name="Gnome child" data-id="591">591: Gnome child</span><br>
        <span class="npc-name" data-name="Gnome local" data-id="592">592: Gnome local</span><br>
        <span class="npc-name" data-name="Gnome local" data-id="593">593: Gnome local</span><br>
        <span class="npc-name" data-name="Moss Giant" data-id="594">594: Moss Giant</span><br>
        <span class="npc-name" data-name="Gnome Baller" data-id="595">595: Gnome Baller</span><br>
        <span class="npc-name" data-name="Goalie" data-id="596">596: Goalie</span><br>
        <span class="npc-name" data-name="Gnome Baller" data-id="597">597: Gnome Baller</span><br>
        <span class="npc-name" data-name="Gnome Baller" data-id="598">598: Gnome Baller</span><br>
        <span class="npc-name" data-name="Gnome Baller" data-id="599">599: Gnome Baller</span><br>
        <span class="npc-name" data-name="Gnome Baller" data-id="600">600: Gnome Baller</span><br>
        <span class="npc-name" data-name="Referee" data-id="601">601: Referee</span><br>
        <span class="npc-name" data-name="Gnome Baller" data-id="602">602: Gnome Baller</span><br>
        <span class="npc-name" data-name="Gnome Baller" data-id="603">603: Gnome Baller</span><br>
        <span class="npc-name" data-name="Gnome Baller" data-id="604">604: Gnome Baller</span><br>
        <span class="npc-name" data-name="Gnome Baller" data-id="605">605: Gnome Baller</span><br>
        <span class="npc-name" data-name="Gnome Baller" data-id="606">606: Gnome Baller</span><br>
        <span class="npc-name" data-name="Gnome Baller" data-id="607">607: Gnome Baller</span><br>
        <span class="npc-name" data-name="Gnome Baller" data-id="608">608: Gnome Baller</span><br>
        <span class="npc-name" data-name="Gnome Baller" data-id="609">609: Gnome Baller</span><br>
        <span class="npc-name" data-name="Gnome Baller" data-id="610">610: Gnome Baller</span><br>
        <span class="npc-name" data-name="Cheerleader" data-id="611">611: Cheerleader</span><br>
        <span class="npc-name" data-name="Cheerleader" data-id="612">612: Cheerleader</span><br>
        <span class="npc-name" data-name="Nazastarool Zombie" data-id="613">613: Nazastarool Zombie</span><br>
        <span class="npc-name" data-name="Nazastarool Skeleton" data-id="614">614: Nazastarool Skeleton</span><br>
        <span class="npc-name" data-name="Nazastarool Ghost" data-id="615">615: Nazastarool Ghost</span><br>
        <span class="npc-name" data-name="Fernahei" data-id="616">616: Fernahei</span><br>
        <span class="npc-name" data-name="Jungle Banker" data-id="617">617: Jungle Banker</span><br>
        <span class="npc-name" data-name="Cart Driver" data-id="618">618: Cart Driver</span><br>
        <span class="npc-name" data-name="Cart Driver" data-id="619">619: Cart Driver</span><br>
        <span class="npc-name" data-name="Obli" data-id="620">620: Obli</span><br>
        <span class="npc-name" data-name="Kaleb" data-id="621">621: Kaleb</span><br>
        <span class="npc-name" data-name="Yohnus" data-id="622">622: Yohnus</span><br>
        <span class="npc-name" data-name="Serevel" data-id="623">623: Serevel</span><br>
        <span class="npc-name" data-name="Yanni" data-id="624">624: Yanni</span><br>
        <span class="npc-name" data-name="Official" data-id="625">625: Official</span><br>
        <span class="npc-name" data-name="Koftik" data-id="626">626: Koftik</span><br>
        <span class="npc-name" data-name="Koftik" data-id="627">627: Koftik</span><br>
        <span class="npc-name" data-name="Koftik" data-id="628">628: Koftik</span><br>
        <span class="npc-name" data-name="Koftik" data-id="629">629: Koftik</span><br>
        <span class="npc-name" data-name="Blessed Vermen" data-id="630">630: Blessed Vermen</span><br>
        <span class="npc-name" data-name="Blessed Spider" data-id="631">631: Blessed Spider</span><br>
        <span class="npc-name" data-name="Paladin" data-id="632">632: Paladin</span><br>
        <span class="npc-name" data-name="Paladin" data-id="633">633: Paladin</span><br>
        <span class="npc-name" data-name="slave" data-id="634">634: slave</span><br>
        <span class="npc-name" data-name="slave" data-id="635">635: slave</span><br>
        <span class="npc-name" data-name="slave" data-id="636">636: slave</span><br>
        <span class="npc-name" data-name="slave" data-id="637">637: slave</span><br>
        <span class="npc-name" data-name="slave" data-id="638">638: slave</span><br>
        <span class="npc-name" data-name="slave" data-id="639">639: slave</span><br>
        <span class="npc-name" data-name="slave" data-id="640">640: slave</span><br>
        <span class="npc-name" data-name="Kalrag" data-id="641">641: Kalrag</span><br>
        <span class="npc-name" data-name="Niloof" data-id="642">642: Niloof</span><br>
        <span class="npc-name" data-name="Kardia the Witch" data-id="643">643: Kardia the Witch</span><br>
        <span class="npc-name" data-name="Souless" data-id="644">644: Souless</span><br>
        <span class="npc-name" data-name="Othainian" data-id="645">645: Othainian</span><br>
        <span class="npc-name" data-name="Doomion" data-id="646">646: Doomion</span><br>
        <span class="npc-name" data-name="Holthion" data-id="647">647: Holthion</span><br>
        <span class="npc-name" data-name="Klank" data-id="648">648: Klank</span><br>
        <span class="npc-name" data-name="Iban" data-id="649">649: Iban</span><br>
        <span class="npc-name" data-name="Koftik" data-id="650">650: Koftik</span><br>
        <span class="npc-name" data-name="Goblin guard" data-id="651">651: Goblin guard</span><br>
        <span class="npc-name" data-name="Observatory Professor" data-id="652">652: Observatory Professor</span><br>
        <span class="npc-name" data-name="Ugthanki" data-id="653">653: Ugthanki</span><br>
        <span class="npc-name" data-name="Observatory assistant" data-id="654">654: Observatory assistant</span><br>
        <span class="npc-name" data-name="Souless" data-id="655">655: Souless</span><br>
        <span class="npc-name" data-name="Dungeon spider" data-id="656">656: Dungeon spider</span><br>
        <span class="npc-name" data-name="Kamen" data-id="657">657: Kamen</span><br>
        <span class="npc-name" data-name="Iban disciple" data-id="658">658: Iban disciple</span><br>
        <span class="npc-name" data-name="Koftik" data-id="659">659: Koftik</span><br>
        <span class="npc-name" data-name="Goblin" data-id="660">660: Goblin</span><br>
        <span class="npc-name" data-name="Chadwell" data-id="661">661: Chadwell</span><br>
        <span class="npc-name" data-name="Professor" data-id="662">662: Professor</span><br>
        <span class="npc-name" data-name="San Tojalon" data-id="663">663: San Tojalon</span><br>
        <span class="npc-name" data-name="Ghost" data-id="664">664: Ghost</span><br>
        <span class="npc-name" data-name="Spirit of Scorpius" data-id="665">665: Spirit of Scorpius</span><br>
        <span class="npc-name" data-name="Scorpion" data-id="666">666: Scorpion</span><br>
        <span class="npc-name" data-name="Dark Mage" data-id="667">667: Dark Mage</span><br>
        <span class="npc-name" data-name="Mercenary" data-id="668">668: Mercenary</span><br>
        <span class="npc-name" data-name="Mercenary Captain" data-id="669">669: Mercenary Captain</span><br>
        <span class="npc-name" data-name="Mercenary" data-id="670">670: Mercenary</span><br>
        <span class="npc-name" data-name="Mining Slave" data-id="671">671: Mining Slave</span><br>
        <span class="npc-name" data-name="Watchtower wizard" data-id="672">672: Watchtower wizard</span><br>
        <span class="npc-name" data-name="Ogre Shaman" data-id="673">673: Ogre Shaman</span><br>
        <span class="npc-name" data-name="Skavid" data-id="674">674: Skavid</span><br>
        <span class="npc-name" data-name="Ogre guard" data-id="675">675: Ogre guard</span><br>
        <span class="npc-name" data-name="Ogre guard" data-id="676">676: Ogre guard</span><br>
        <span class="npc-name" data-name="Ogre guard" data-id="677">677: Ogre guard</span><br>
        <span class="npc-name" data-name="Skavid" data-id="678">678: Skavid</span><br>
        <span class="npc-name" data-name="Skavid" data-id="679">679: Skavid</span><br>
        <span class="npc-name" data-name="Og" data-id="680">680: Og</span><br>
        <span class="npc-name" data-name="Grew" data-id="681">681: Grew</span><br>
        <span class="npc-name" data-name="Toban" data-id="682">682: Toban</span><br>
        <span class="npc-name" data-name="Gorad" data-id="683">683: Gorad</span><br>
        <span class="npc-name" data-name="Ogre guard" data-id="684">684: Ogre guard</span><br>
        <span class="npc-name" data-name="Yanille Watchman" data-id="685">685: Yanille Watchman</span><br>
        <span class="npc-name" data-name="Ogre merchant" data-id="686">686: Ogre merchant</span><br>
        <span class="npc-name" data-name="Ogre trader" data-id="687">687: Ogre trader</span><br>
        <span class="npc-name" data-name="Ogre trader" data-id="688">688: Ogre trader</span><br>
        <span class="npc-name" data-name="Ogre trader" data-id="689">689: Ogre trader</span><br>
        <span class="npc-name" data-name="Mercenary" data-id="690">690: Mercenary</span><br>
        <span class="npc-name" data-name="City Guard" data-id="691">691: City Guard</span><br>
        <span class="npc-name" data-name="Mercenary" data-id="692">692: Mercenary</span><br>
        <span class="npc-name" data-name="Lawgof" data-id="693">693: Lawgof</span><br>
        <span class="npc-name" data-name="Dwarf" data-id="694">694: Dwarf</span><br>
        <span class="npc-name" data-name="lollk" data-id="695">695: lollk</span><br>
        <span class="npc-name" data-name="Skavid" data-id="696">696: Skavid</span><br>
        <span class="npc-name" data-name="Ogre guard" data-id="697">697: Ogre guard</span><br>
        <span class="npc-name" data-name="Nulodion" data-id="698">698: Nulodion</span><br>
        <span class="npc-name" data-name="Dwarf" data-id="699">699: Dwarf</span><br>
        <span class="npc-name" data-name="Al Shabim" data-id="700">700: Al Shabim</span><br>
        <span class="npc-name" data-name="Bedabin Nomad" data-id="701">701: Bedabin Nomad</span><br>
        <span class="npc-name" data-name="Captain Siad" data-id="702">702: Captain Siad</span><br>
        <span class="npc-name" data-name="Bedabin Nomad Guard" data-id="703">703: Bedabin Nomad Guard</span><br>
        <span class="npc-name" data-name="Ogre citizen" data-id="704">704: Ogre citizen</span><br>
        <span class="npc-name" data-name="Rock of ages" data-id="705">705: Rock of ages</span><br>
        <span class="npc-name" data-name="Ogre" data-id="706">706: Ogre</span><br>
        <span class="npc-name" data-name="Skavid" data-id="707">707: Skavid</span><br>
        <span class="npc-name" data-name="Skavid" data-id="708">708: Skavid</span><br>
        <span class="npc-name" data-name="Skavid" data-id="709">709: Skavid</span><br>
        <span class="npc-name" data-name="Draft Mercenary Guard" data-id="710">710: Draft Mercenary Guard</span><br>
        <span class="npc-name" data-name="Mining Cart Driver" data-id="711">711: Mining Cart Driver</span><br>
        <span class="npc-name" data-name="kolodion" data-id="712">712: kolodion</span><br>
        <span class="npc-name" data-name="kolodion" data-id="713">713: kolodion</span><br>
        <span class="npc-name" data-name="Gertrude" data-id="714">714: Gertrude</span><br>
        <span class="npc-name" data-name="Shilop" data-id="715">715: Shilop</span><br>
        <span class="npc-name" data-name="Rowdy Guard" data-id="716">716: Rowdy Guard</span><br>
        <span class="npc-name" data-name="Shantay Pass Guard" data-id="717">717: Shantay Pass Guard</span><br>
        <span class="npc-name" data-name="Rowdy Slave" data-id="718">718: Rowdy Slave</span><br>
        <span class="npc-name" data-name="Shantay Pass Guard" data-id="719">719: Shantay Pass Guard</span><br>
        <span class="npc-name" data-name="Assistant" data-id="720">720: Assistant</span><br>
        <span class="npc-name" data-name="Desert Wolf" data-id="721">721: Desert Wolf</span><br>
        <span class="npc-name" data-name="Workman" data-id="722">722: Workman</span><br>
        <span class="npc-name" data-name="Examiner" data-id="723">723: Examiner</span><br>
        <span class="npc-name" data-name="Student" data-id="724">724: Student</span><br>
        <span class="npc-name" data-name="Student" data-id="725">725: Student</span><br>
        <span class="npc-name" data-name="Guide" data-id="726">726: Guide</span><br>
        <span class="npc-name" data-name="Student" data-id="727">727: Student</span><br>
        <span class="npc-name" data-name="Archaeological expert" data-id="728">728: Archaeological expert</span><br>
        <span class="npc-name" data-name="civillian" data-id="729">729: civillian</span><br>
        <span class="npc-name" data-name="civillian" data-id="730">730: civillian</span><br>
        <span class="npc-name" data-name="civillian" data-id="731">731: civillian</span><br>
        <span class="npc-name" data-name="civillian" data-id="732">732: civillian</span><br>
        <span class="npc-name" data-name="Murphy" data-id="733">733: Murphy</span><br>
        <span class="npc-name" data-name="Murphy" data-id="734">734: Murphy</span><br>
        <span class="npc-name" data-name="Sir Radimus Erkle" data-id="735">735: Sir Radimus Erkle</span><br>
        <span class="npc-name" data-name="Legends Guild Guard" data-id="736">736: Legends Guild Guard</span><br>
        <span class="npc-name" data-name="Escaping Mining Slave" data-id="737">737: Escaping Mining Slave</span><br>
        <span class="npc-name" data-name="Workman" data-id="738">738: Workman</span><br>
        <span class="npc-name" data-name="Murphy" data-id="739">739: Murphy</span><br>
        <span class="npc-name" data-name="Echned Zekin" data-id="740">740: Echned Zekin</span><br>
        <span class="npc-name" data-name="Donovan the Handyman" data-id="741">741: Donovan the Handyman</span><br>
        <span class="npc-name" data-name="Pierre the Dog Handler" data-id="742">742: Pierre the Dog Handler</span><br>
        <span class="npc-name" data-name="Hobbes the Butler" data-id="743">743: Hobbes the Butler</span><br>
        <span class="npc-name" data-name="Louisa The Cook" data-id="744">744: Louisa The Cook</span><br>
        <span class="npc-name" data-name="Mary The Maid" data-id="745">745: Mary The Maid</span><br>
        <span class="npc-name" data-name="Stanford The Gardener" data-id="746">746: Stanford The Gardener</span><br>
        <span class="npc-name" data-name="Guard" data-id="747">747: Guard</span><br>
        <span class="npc-name" data-name="Guard Dog" data-id="748">748: Guard Dog</span><br>
        <span class="npc-name" data-name="Guard" data-id="749">749: Guard</span><br>
        <span class="npc-name" data-name="Man" data-id="750">750: Man</span><br>
        <span class="npc-name" data-name="Anna Sinclair" data-id="751">751: Anna Sinclair</span><br>
        <span class="npc-name" data-name="Bob Sinclair" data-id="752">752: Bob Sinclair</span><br>
        <span class="npc-name" data-name="Carol Sinclair" data-id="753">753: Carol Sinclair</span><br>
        <span class="npc-name" data-name="David Sinclair" data-id="754">754: David Sinclair</span><br>
        <span class="npc-name" data-name="Elizabeth Sinclair" data-id="755">755: Elizabeth Sinclair</span><br>
        <span class="npc-name" data-name="Frank Sinclair" data-id="756">756: Frank Sinclair</span><br>
        <span class="npc-name" data-name="kolodion" data-id="757">757: kolodion</span><br>
        <span class="npc-name" data-name="kolodion" data-id="758">758: kolodion</span><br>
        <span class="npc-name" data-name="kolodion" data-id="759">759: kolodion</span><br>
        <span class="npc-name" data-name="kolodion" data-id="760">760: kolodion</span><br>
        <span class="npc-name" data-name="Irvig Senay" data-id="761">761: Irvig Senay</span><br>
        <span class="npc-name" data-name="Ranalph Devere" data-id="762">762: Ranalph Devere</span><br>
        <span class="npc-name" data-name="Poison Salesman" data-id="763">763: Poison Salesman</span><br>
        <span class="npc-name" data-name="Gujuo" data-id="764">764: Gujuo</span><br>
        <span class="npc-name" data-name="Jungle Forester" data-id="765">765: Jungle Forester</span><br>
        <span class="npc-name" data-name="Ungadulu" data-id="766">766: Ungadulu</span><br>
        <span class="npc-name" data-name="Ungadulu" data-id="767">767: Ungadulu</span><br>
        <span class="npc-name" data-name="Death Wing" data-id="768">768: Death Wing</span><br>
        <span class="npc-name" data-name="Nezikchened" data-id="769">769: Nezikchened</span><br>
        <span class="npc-name" data-name="Dwarf Cannon engineer" data-id="770">770: Dwarf Cannon engineer</span><br>
        <span class="npc-name" data-name="Dwarf commander" data-id="771">771: Dwarf commander</span><br>
        <span class="npc-name" data-name="Viyeldi" data-id="772">772: Viyeldi</span><br>
        <span class="npc-name" data-name="Nurmof" data-id="773">773: Nurmof</span><br>
        <span class="npc-name" data-name="Fatigue expert" data-id="774">774: Fatigue expert</span><br>
        <span class="npc-name" data-name="Karamja Wolf" data-id="775">775: Karamja Wolf</span><br>
        <span class="npc-name" data-name="Jungle Savage" data-id="776">776: Jungle Savage</span><br>
        <span class="npc-name" data-name="Oomlie Bird" data-id="777">777: Oomlie Bird</span><br>
        <span class="npc-name" data-name="Sidney Smith" data-id="778">778: Sidney Smith</span><br>
        <span class="npc-name" data-name="Siegfried Erkle" data-id="779">779: Siegfried Erkle</span><br>
        <span class="npc-name" data-name="Tea seller" data-id="780">780: Tea seller</span><br>
        <span class="npc-name" data-name="Wilough" data-id="781">781: Wilough</span><br>
        <span class="npc-name" data-name="Philop" data-id="782">782: Philop</span><br>
        <span class="npc-name" data-name="Kanel" data-id="783">783: Kanel</span><br>
        <span class="npc-name" data-name="chamber guardian" data-id="784">784: chamber guardian</span><br>
        <span class="npc-name" data-name="Sir Radimus Erkle" data-id="785">785: Sir Radimus Erkle</span><br>
        <span class="npc-name" data-name="Pit Scorpion" data-id="786">786: Pit Scorpion</span><br>
        <span class="npc-name" data-name="Shadow Warrior" data-id="787">787: Shadow Warrior</span><br>
        <span class="npc-name" data-name="Fionella" data-id="788">788: Fionella</span><br>
        <span class="npc-name" data-name="Battle mage" data-id="789">789: Battle mage</span><br>
        <span class="npc-name" data-name="Battle mage" data-id="790">790: Battle mage</span><br>
        <span class="npc-name" data-name="Battle mage" data-id="791">791: Battle mage</span><br>
        <span class="npc-name" data-name="Gundai" data-id="792">792: Gundai</span><br>
        <span class="npc-name" data-name="Lundail" data-id="793">793: Lundail</span><br>

    </div>
</div>
<style>
  .responsive-input {
    width: 500px;
  }

  @media (max-width: 768px) {
    .responsive-input {
      width: 100%;
    }
  }
</style>
