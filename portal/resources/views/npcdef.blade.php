@extends('template')

@section('content')
    <div class="e bg-black p-2" style="outline: black; width: 100%;">
        <a class="c" href="/npcs">
            Back to NPCs
        </a>
        <h2 class="h2 text-center pt-5 pb-3 text-capitalize display-3">
            <a href="{{ route('Monster Database') }}">{{ $npcdef->name }}</a>
        </h2>
        <div class="row align-items-center pb-3">
            <div class="col d-inline-block text-center" style="width:150px; padding-left:30px;">
                <img class="display-glow pb-3 align-self-center" src="{{ asset('img/npc') }}/{{ $npcdef->id }}.png"
                     alt="{{ $npcdef->name }}"/>
                <span class="col d-inline-block">{{ ucfirst($npcdef->description) }}</span>
                <span class="col d-inline-block">Combat Level: {{ $npcdef->combatlvl ?? "N/A" }}</span>
            </div>

            <div class="col-md d-flex text-center justify-content-around">
                @if ($npcdef->attack > 0)
                    <div class="d-block">
                        <img class="mb-1" src="{{ asset('img/skill_icons/attack.svg') }}" alt="attack" height="16px"
                             width="16px"/>
                        <span class=" text-primary">{{ $npcdef->attack }}</span>
                    </div>
                @endif
                @if ($npcdef->defense > 0)
                    <div class="d-block">
                        <img class="mb-1" src="{{ asset('img/skill_icons/defense.svg') }}" alt="defense"
                             height="16px" width="16px"/>
                        <span class=" text-primary">{{ $npcdef->defense }}</span>
                    </div>
                @endif
                @if ($npcdef->strength > 0)
                    <div class="d-block">
                        <img class="mb-1" src="{{ asset('img/skill_icons/strength.svg') }}" alt="strength"
                             height="16px" width="16px"/>
                        <span class=" text-primary">{{ $npcdef->strength }}</span>
                    </div>
                @endif
                @if ($npcdef->hits > 0)
                    <div class="d-block">
                        <img class="mb-1" src="{{ asset('img/skill_icons/hits.svg') }}" alt="hits" height="16px"
                             width="16px"/>
                        <span class=" text-primary">{{ $npcdef->hits }}</span>
                    </div>
                @endif
                @if ($npcdef->ranged > 0)
                    <div class="d-block">
                        <img class="mb-1" src="{{ asset('img/skill_icons/ranged.svg') }}" alt="ranged" height="16px"
                             width="16px"/>
                        <span class=" text-primary">{{ $npcdef->ranged }}</span>
                    </div>
                @endif
            </div>

            <div class="col-md d-inline-block text-center">
                @if ($npcdef->attackable == 1)
                    <div class="d-block">
                        <span class="">Attackable</span>
                    </div>
                @endif
                @if ($npcdef->attackable == 0)
                    <div class="d-block">
                        <span class="">Not Attackable</span>
                    </div>
                @endif
                @if ($npcdef->aggressive == 1)
                    <div class="d-block">
                        <span class="">Aggressive</span>
                    </div>
                @endif
                @if ($npcdef->aggressive == 0)
                    <div class="d-block">
                        <span class="">Passive</span>
                    </div>
                @endif
                @if ($npcdef->respawnTime > 0)
                    <div class="d-block">
                        <span class="">Respawn Time:</span>
                        <span class=" text-primary">{{ $npcdef->respawnTime }} sec</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Extra large version -->
        <div class="row align-items-center d-none d-xl-block">
            <div class="col">
                <table>
                    @if ($npc_drops->count() > 0)
                        <tr>
                            @foreach ($npc_drops as $key=>$npc_drop)
                                <td class="pl-1 pr-1 clickable-row"
                                    data-href="{{ route('Items', $npc_drop->itemID) }}"
                                    style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                    <div
                                            style="margin-top: 0; position: relative; color: limegreen; font-size: 13px;">
                                        {{ $npc_drop->dropAmount }}
                                    </div>
                                    <img class="mt-n2 pb-1" src="{{ asset('img/items').'/'.$npc_drop->itemID }}.png"
                                         alt="{{ $npc_drop->itemID }}"/>
                                    <span class="text-capitalize d-block">
                                        {{ $npc_drop->itemName }}
                                </span>
                                </td>
                                @if ($key % 6 == 5)
                        </tr>
                    @endif
                    @endforeach
                    @else
                        No items found.
                    @endif
                </table>
            </div>
        </div>

        <!-- Mobile view version -->
        <div class="row align-items-center pl-4 pr-4 d-sm d-md-none d-lg-none">
            <div class="col">
                <table>
                    @if ($npc_drops->count() > 0)
                        <tr>
                            @foreach ($npc_drops as $key=>$npc_drop)
                                <td class="pl-1 pr-1 clickable-row"
                                    data-href="{{ route('Item Information', $npc_drop->itemID) }}"
                                    style="border: 1px solid black; background: rgba(255,255,255,0.2);">
                                    <div
                                            style="margin-top: 0; position: relative; color: limegreen; font-size: 13px;">
                                        {{ $npc_drop->dropAmount }}
                                    </div>
                                    <img class="mt-n2" src="{{ asset('img/items').'/'.$npc_drop->itemID }}.png"
                                         alt="{{ $npc_drop->itemID }}"/>
                                    <!--<span class="text-capitalize d-block">
                                    { $npc_drop->itemName }} ({ $npc_drop->itemID }})
                                </span>-->
                                </td>
                                @if ($key % 6 == 5)
                        </tr>
                    @endif
                    @endforeach
                    @else
                        No items found.
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
