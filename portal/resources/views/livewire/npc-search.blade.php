<div class="col">
    <input wire:model="searchTerm" type="text">

    <!-- Large view version -->
    <div class="d-none d-md-block">
        {{ $npcResults->links('pagination::bootstrap-4') }}
        <table id="List" class="table table-striped table-both-hover text-primary table-transparent">
            <tr>
                @foreach($npcResults as $key=>$npcdef)
                    <td class="text-center clickable-row" data-href="npcdef/{{ $npcdef->id }}"
                        style="border: 1px solid #0F0F0F;">
                        <div class="display-glow pt-1">
                            <img src="{{ asset('img/npc') }}/{{ $npcdef->id }}.png" alt="{{ $npcdef->name }}"
                                 style="max-height: 52px; max-width: 65px;"/>
                        </div>
                        <span class="text-capitalize">
									{{ $npcdef->name }} ({{ $npcdef->id }})
								</span>
                        <span class="text-gray-400 d-block">
								{{ $npcdef->description }}
							</span>
                    </td>
                    @if ($key % 6 == 5)
            </tr>
            @endif
            @endforeach
        </table>
        {{ $npcResults->links('pagination::bootstrap-4') }}
    </div>

    <!-- Mobile view version -->
    <div class="d-md-none d-lg-none">
        {{ $npcResults->links('pagination::bootstrap-4') }}
        <table id="List" class="table table-striped table-both-hover text-primary table-transparent">
            <tr>
                @foreach($npcResults as $key=>$npcdef)
                    <td class="text-center clickable-row" data-href="npcdef/{{ $npcdef->id }}"
                        style="border: 1px solid #0F0F0F;">
                        <div class="display-glow pt-1">
                            <img src="{{ asset('img/npc') }}/{{ $npcdef->id }}.png" alt="{{ $npcdef->name }}"
                                 style="max-height: 52px; max-width: 65px;"/>
                        </div>
                        <span class="text-capitalize">
									{{ $npcdef->name }} ({{ $npcdef->id }})
								</span>
                        <span class="text-white-50 d-block">
								{{ $npcdef->description }}
							</span>
                    </td>
                    @if ($key % 4 == 3)
            </tr>
            @endif
            @endforeach
        </table>
        {{ $npcResults->links('pagination::bootstrap-4') }}
    </div>
</div>
