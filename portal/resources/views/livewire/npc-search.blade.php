<div class="col">
    <input class="text-black-50 click" onfocus="this.value=''" wire:model="searchTerm" type="text">

    <!-- Large view version -->
    <div class="e bg-black p-2" style="outline: black; width: 400px;">
        <div class="d-flex">
            <div class="text-left" style="width:60px;"><b>Image</b></div>
            <div class="text-left" style="padding-left:10px; width:130px;"><b>Name</b></div>
            <div class="text-right" style="width:30px;"><b>Level</b></div>
            <div class="text-right" style="width:100px;"><b>Description</b></div>
        </div>
        @foreach($npcResults as $key=>$npcdef)
            <div class="d-flex clickable-row" data-href="/npcdef/{{ $npcdef->id }}">
                <!--Image-->
                <div class="text-left" style="width:60px;">
                    <img src="{{ asset('img/npc') }}/{{ $npcdef->id }}.png" alt="{{ $npcdef->name }}"
                         style="max-height: 52px; max-width: 65px;"/>
                </div>
                <!--Name-->
                <div class="text-left" style="padding-left:10px; width:130px;">
                    <a class="c" href="/npcdef/{{ $npcdef->id }}">{{ ucfirst($npcdef->name) }} ({{ $npcdef->id }})</a>
                </div>
                <!--Level-->
                <div class="text-right" style="padding-right:15px; width:30px;">
                    {{ number_format($npcdef->combatlvl) }}
                </div>
                <!--Description-->
                <div class="text-left text-gray-400" style="padding-left:10px; width:100px;">
                    {{ $npcdef->description }}
                </div>
            </div>
            @if ($key % 6 == 5)
    </div>
    @endif
    @endforeach
    {{ $npcResults->links('pagination::simple-tailwind') }}
</div>