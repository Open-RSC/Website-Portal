@extends('template')
@section('content')

    <div class="text-gray-300 pr-5 pl-5 pt-3 pb-3 bg-black">
        <span class="rscfont text-danger font-weight-bold d-block">What is Open RuneScape Classic?</span>
        The project was officially begun in June 2018, though has roots spanning as far back as 2009 with
        "Open RSCD v25." The Open RuneScape Classic project has been a non-profit, community driven, open source
        initiative
        to build as close of a replica RSC game experience as possible, to allow custom features to be
        enabled with simple configuration file edits, and to keep the memory alive of what is now considered
        to be an abandon-ware game, RuneScape Classic (2001-2018). For over a decade, many private servers
        have come and gone and nearly all have had profit from donations, subscriptions, micro-transactions,
        and bribery as their sole interest. Education, open source, and information sharing were spurned in
        the interest of "leech proofing" code, money grabs, toxic individuals, DDoS attacks, and deception.
        The Open RuneScape Classic core team consists of real life professional developers, security
        consultants, dev ops
        managers, and more. You can find the source code for our game servers <a href="https://gitlab.com/open-runescape-classic/core" target="_blank">right here</a> and the source code for our website <a href="https://gitlab.com/open-runescape-classic/Website-Portal" target="_blank">right here</a>.

        <span class="mt-4 rscfont text-danger font-weight-bold d-block">How do I play?</span>
        Great question! We have many different public worlds, and many different ways to play.
        To get started, you will want to register an account, which can be done through
        <a href="/register" target="_blank">the registration page found here</a> or through one of our desktop clients. After that, you can visit <a href="/playnow" target="_blank">the play now page found here</a>, and then log in either by clicking on "Web Client"
        for the Preservation, 2001scape, and Uranium worlds, or by clicking on "Android Client"
        or "Desktop Client" depending on if you are on an Android device or on a computer. If you are on Android then you can install the apk like any other apk on Android and then launch it and select the world you want to play. If you are on a computer, then you can launch the launcher you downloaded (OpenRSC.jar) and then simply click on the logo or text of the world you want to play. Please note that you will need Java installed to run our desktop clients (and desktop launcher), we recommend <a href="https://builds.openlogic.com/downloadJDK/openlogic-openjdk/8u382-b05/openlogic-openjdk-8u382-b05-windows-x64.msi" target="_blank">Java 8 which you can find here if you are on Windows</a> for the best compatibility with our project. If you are having any problems figuring out how to play, you can visit <a href="/discord" target="_blank">our Discord found here</a> to ask for help or by posting a thread on <a href="/board" target="_blank">our technical support section in our forum found here</a>.


        <span class="rscfont text-danger font-weight-bold d-block pt-4">What are the differences between the public worlds?</span>
        <div class="pl-1 d-block"><span class="rscfont text-primary d-block">RSC Preservation (Formerly OpenRSC)</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> 1x XP rate</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> ~98% authentic replica of RSC based on RSC+ replay data</span>
            <span class="d-block"><i
                        class="fas fa-angle-right"></i> Actively being improved for gameplay accuracy</span>
            <span class="d-block"><i
                        class="fas fa-angle-right"></i> Staff moderated world with no botting allowed</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Operated using the Open RuneScape Classic framework</span>
        </div>
        <div class="pl-1 d-block pt-2"><span class="rscfont text-primary d-block">RSC Cabbage</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> 1x or 5x XP rate</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> 30% faster in-game speed</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Auction House</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Clans and parties</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Custom items, skills, monsters, and quests</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Batched skilling activities</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Regular Ironman, Hardcore Ironman, and Ultimate Ironman modes available</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Fatigue disabled (optional to turn off XP gain using sleep)</span>
            <span class="d-block"><i
                        class="fas fa-angle-right"></i> Staff moderated world with no botting allowed</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Operated using the Open RuneScape Classic framework</span>
        </div>
        <div class="pl-1 d-block pt-2"><span class="rscfont text-primary d-block">2001Scape</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> 1x XP rate</span>
            <span class="d-block"><i
                        class="fas fa-angle-right"></i> Recreated version of RuneScape Classic from May 8 2001</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Version with retro features (pray evil, good magic, POH) as they were experienced</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> ~95% authentic replica of retro RSC based on old cache data, fansites & newsposts</span>
            <span class="d-block"><i
                        class="fas fa-angle-right"></i> Actively being improved for gameplay accuracy</span>
            <span class="d-block"><i
                        class="fas fa-angle-right"></i> Staff moderated world with no botting allowed</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Operated using the Open RuneScape Classic framework</span>
        </div>
        <div class="pl-1 d-block pt-2"><span class="rscfont text-primary d-block">RSC Uranium</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Botting allowed</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> 1x XP rate</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Operated using the Open RuneScape Classic framework</span>
        </div>
        <div class="pl-1 d-block pt-2"><span class="rscfont text-primary d-block">RSC Coleslaw</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Botting allowed</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> 2x XP rate</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> 30% faster in-game speed</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Auction House</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Clans and parties</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Custom items, skills, monsters, and quests</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Batched skilling activities</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Regular Ironman, Hardcore Ironman, and Ultimate Ironman modes available</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Fatigue disabled (optional to turn off XP gain using sleep)</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Operated using the Open RuneScape Classic framework</span>
        </div>
        <div class="pl-1 d-block pt-2"><span class="rscfont text-primary d-block">Open PK (Under development)</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Stork-style point system and dedicated to F2P player killing</span>
            <span class="d-block"><i
                        class="fas fa-angle-right"></i> Staff moderated world with no botting allowed</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Operated using the Open RuneScape Classic framework</span>
        </div>
        <div class="pl-1 d-block pt-2"><span class="rscfont text-primary d-block">RSC Kale (Under development)</span>
            <span class="d-block"><i
                        class="fas fa-angle-right"></i> Expansion of RuneScape Classic post May 8 2001 (wilderness, dueling, teleport spells)</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Implementation of retro features (hiding, pray evil, tailoring, herblaw, etc)</span>
            <span class="d-block"><i
                        class="fas fa-angle-right"></i> Staff moderated world with no botting allowed</span>
            <span class="d-block"><i class="fas fa-angle-right"></i> Operated using the Open RuneScape Classic framework</span>
        </div>

        <span class="rscfont text-danger font-weight-bold d-block pt-4">May I donate or subscribe for perks?</span>
        No donations nor subscriptions are accepted. We don't want any money. We also don't believe that
        dumping player money into ads will make any difference for long term player growth and retention.
        The best way to help the team is to help with submitting bug reports, submitting GitLab merge requests,
        and spreading the
        word about us to your friends so they will want to be a part of this too!

        <span
                class="rscfont text-danger font-weight-bold d-block pt-4">How often is Open RuneScape Classic updated?</span>
        The development team is constantly working on updates. Code releases generally occur weekly on Sundays
        and the public worlds are restarted with updates shortly after the posting of patch notes.

        <span class="rscfont text-danger font-weight-bold d-block pt-4">Is a single player edition available?</span>
        Yes! Download a copy of the <a class="link-success underline" target="_blank"
                                       href="https://gitlab.com/open-runescape-classic/core">GitLab
            "core" project repository</a> and start
        playing. A "Start-Windows.cmd" script is included to launch a portable version that does not require any
        additional installation nor configuration.

        <span
                class="rscfont text-danger font-weight-bold d-block pt-4">Where may I learn how to run my own Open RuneScape Classic server?</span>
        <span class="d-block"><i class="fas fa-angle-right"></i> <a class="link-success underline"
                                                                    target="_blank"
                                                                    href="https://gitlab.com/open-runescape-classic/core/-/blob/develop/Windows%20Getting%20Started%20Guide.md">Windows getting started guide</a></span>
        <span class="d-block"><i class="fas fa-angle-right"></i> <a class="link-success underline"
                                                                    target="_blank"
                                                                    href="https://gitlab.com/open-runescape-classic/core/-/blob/develop/Linux%20Getting%20Started%20Guide.md">Linux getting started guide</a></span>
        <span class="d-block"><i class="fas fa-angle-right"></i> <a class="link-success underline"
                                                                    target="_blank"
                                                                    href="https://rsc.vet/wiki/index.php?title=Running_your_own_server">Running your own production server</a></span>

        <span class="rscfont text-danger font-weight-bold d-block pt-4">Who are the Open RuneScape Classic project admins?</span>
        <a class="link-success underline" target="_blank" href="/player/cabbage/Aurora">Aurora</a>, <a
    class="link-success underline" target="_blank" href="https://gitlab.com/ipkpjersi">Ken</a>, <a
    class="link-success underline" target="_blank" href="https://github.com/hubcapp">Logg</a>, <a
    class="link-success underline" target="_blank" href="https://gitlab.com/devrscer">Luis</a>, and <a
    class="link-success underline" target="_blank" href="https://gitlab.com/Rrrrry123">Ryan</a>



        <span class="rscfont text-danger font-weight-bold d-block pt-4">What is Open RuneScape Classic's stance on botting?</span>
        We have a zero tolerance policy on our publicly hosted servers except for RSC Uranium and RSC Coleslaw,
        which are botting allowed worlds.
    </div>
@endsection
