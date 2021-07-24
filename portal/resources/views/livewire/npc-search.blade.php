<div class="col">
    <div class="d-flex justify-content-left pb-1">
        <input class="e pl-1 text-white click" onfocus="this.value=''" wire:model="searchTerm" type="text"
               style="width:150px; background:black;">
    </div>

    <div class="e bg-black p-2" style="outline:black; width:500px;">
        <div class="d-flex">
            <div class="text-center" style="width:80px;"><b>Image</b></div>
            <div class="text-left" style="padding-left:10px; width:130px;"><b>Name</b></div>
            <div class="text-left" style="width:40px;"><b>Level</b></div>
            <div class="text-left" style="padding-left:10px; width:230px;"><b>Description</b></div>
        </div>
        @foreach($npcResults as $key=>$npcdef)
            <div class="d-flex pt-3">
                <!--Image-->
                <div class="img-fluid pt-1 pb-1 mx-auto" style="max-width:80px;">
                    <img src="{{ asset('img/npc') }}/{{ $npcdef->id }}.png" alt="{{ $npcdef->name }}"
                         style="max-height: 62px; max-width: 75px;"/>
                </div>
                <!--Name-->
                <div class="text-left pt-1 pb-1" style="padding-left:10px; width:130px;">
                    <a class="c" href="/npcdef/{{ $npcdef->id }}">{{ ucfirst($npcdef->name) }}</a>
                </div>
                <!--Level-->
                <div class="text-left pt-1 pb-1" style="width:40px;">
                    {{ number_format($npcdef->combatlvl) }}
                </div>
                <!--Description-->
                <div class="text-left pt-1  pb-1 text-gray-400" style="padding-left:10px; width:230px;">
                    {{ ucfirst($npcdef->description) }}
                </div>
            </div>
            @if ($key % 6 == 5)
            @endif
        @endforeach
        {{ $npcResults->onEachSide(1)->links('livewire::tailwind') }}
    </div>
</div>
