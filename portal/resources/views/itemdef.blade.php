@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center pt-5 pb-3 text-capitalize display-3">
            <a href="{{ route('Items') }}">{{ $itemdef->name }}</a>
        </h2>

        <div class="row align-items-center">
            <div class="col-md d-inline-block text-center">
                <img class="display-glow pb-2" style="transform: scale(1.3);"
                     src="{{ asset('img/items') }}/{{ $itemdef->id }}.png" alt="{{ $itemdef->name }}"/>
                <span class="col d-inline-block">{{ $itemdef->description }}</span>
            </div>

            <div class="col-md d-inline-block text-center">
                @if ($itemdef->requiredLevel > 0)
                    Required Level:
                    @if($itemdef->requiredSkillID == 0)
                        <img class="mb-1" src="{{ asset('img/skill_icons/attack.svg') }}" alt="attack" height="16px"
                             width="16px"/>
                    @elseif($itemdef->requiredSkillID == 1)
                        <img class="mb-1" src="{{ asset('img/skill_icons/defense.svg') }}" alt="defense"
                             height="16px" width="16px"/>
                    @elseif($itemdef->requiredSkillID == 2)
                        <img class="mb-1" src="{{ asset('img/skill_icons/strength.svg') }}" alt="strength"
                             height="16px" width="16px"/>
                    @elseif($itemdef->requiredSkillID == 3)
                        <img class="mb-1" src="{{ asset('img/skill_icons/hits.svg') }}" alt="hits" height="16px"
                             width="16px"/>
                    @elseif($itemdef->requiredSkillID == 4)
                        <img class="mb-1" src="{{ asset('img/skill_icons/ranged.svg') }}" alt="ranged" height="16px"
                             width="16px"/>
                    @elseif($itemdef->requiredSkillID == 5)
                        <img class="mb-1" src="{{ asset('img/skill_icons/prayer.svg') }}" alt="prayer" height="16px"
                             width="16px"/>
                    @elseif($itemdef->requiredSkillID == 6)
                        <img class="mb-1" src="{{ asset('img/skill_icons/magic.svg') }}" alt="magic" height="16px"
                             width="16px"/>
                    @elseif($itemdef->requiredSkillID == 7)
                        <img class="mb-1" src="{{ asset('img/skill_icons/cooking.svg') }}" alt="cooking"
                             height="16px" width="16px"/>
                    @elseif($itemdef->requiredSkillID == 8)
                        <img class="mb-1" src="{{ asset('img/skill_icons/woodcut.svg') }}" alt="woodcut"
                             height="16px" width="16px"/>
                    @elseif($itemdef->requiredSkillID == 9)
                        <img class="mb-1" src="{{ asset('img/skill_icons/fletching.svg') }}" alt="fletching"
                             height="16px" width="16px"/>
                    @elseif($itemdef->requiredSkillID == 10)
                        <img class="mb-1" src="{{ asset('img/skill_icons/fishing.svg') }}" alt="fishing"
                             height="16px" width="16px"/>
                    @elseif($itemdef->requiredSkillID == 11)
                        <img class="mb-1" src="{{ asset('img/skill_icons/firemaking.svg') }}" alt="firemaking"
                             height="16px" width="16px"/>
                    @elseif($itemdef->requiredSkillID == 12)
                        <img class="mb-1" src="{{ asset('img/skill_icons/crafting.svg') }}" alt="crafting"
                             height="16px" width="16px"/>
                    @elseif($itemdef->requiredSkillID == 13)
                        <img class="mb-1" src="{{ asset('img/skill_icons/smithing.svg') }}" alt="smithing"
                             height="16px" width="16px"/>
                    @elseif($itemdef->requiredSkillID == 14)
                        <img class="mb-1" src="{{ asset('img/skill_icons/mining.svg') }}" alt="mining" height="16px"
                             width="16px"/>
                    @elseif($itemdef->requiredSkillID == 15)
                        <img class="mb-1" src="{{ asset('img/skill_icons/herblaw.svg') }}" alt="herblaw"
                             height="16px" width="16px"/>
                    @elseif($itemdef->requiredSkillID == 16)
                        <img class="mb-1" src="{{ asset('img/skill_icons/agility.svg') }}" alt="agility"
                             height="16px" width="16px"/>
                    @elseif($itemdef->requiredSkillID == 17)
                        <img class="mb-1" src="{{ asset('img/skill_icons/thieving.svg') }}" alt="thieving"
                             height="16px" width="16px"/>
                    @endif
                    {{ number_format($itemdef->requiredLevel) }}
                @endif
                @if ($itemdef->armourBonus > 0)
                    <div class="d-block">
                        <span class="">Armour Bonus:</span>
                        <span class=" text-primary">{{ $itemdef->armourBonus }}</span>
                    </div>
                @endif
                @if ($itemdef->magicBonus > 0)
                    <div class="d-block">
                        <span class="">Magic Bonus:</span>
                        <span class=" text-primary">{{ $itemdef->magicBonus }}</span>
                    </div>
                @endif
                @if ($itemdef->prayerBonus > 0)
                    <div class="d-block">
                        <span class="">Prayer Bonus:</span>
                        <span class=" text-primary">{{ $itemdef->prayerBonus }}</span>
                    </div>
                @endif
                @if ($itemdef->weaponAimBonus > 0)
                    <div class="d-block">
                        <span class="">Weapon Aim Bonus:</span>
                        <span class=" text-primary">{{ $itemdef->weaponAimBonus }}</span>
                    </div>
                @endif
                @if ($itemdef->weaponPowerBonus > 0)
                    <div class="d-block">
                        <span class="">Weapon Power Bonus:</span>
                        <span class=" text-primary">{{ $itemdef->weaponPowerBonus }}</span>
                    </div>
                @endif
            </div>

            <div class="col-md d-inline-block text-center">
                <div class="d-block">
                    <span class="">Tradable: </span>
                    <span class=" text-primary">
						@if ($itemdef->isUntradable) No
                        @else Yes
                        @endif
						</span>
                </div>
                <div class="d-block">
                    <span class="">Shop Price: </span>
                    <span class=" text-primary">{{ number_format($itemdef->basePrice) }}gp</span>
                </div>
                <div class="d-block">
                    <span class="">Low Alch Price: </span>
                    <span class=" text-primary">{{ number_format($itemdef->basePrice * 0.4) }}gp</span>
                </div>
                <div class="d-block">
                    <span class="">High Alch Price: </span>
                    <span class=" text-primary">{{ number_format($itemdef->basePrice * 0.6) }}gp</span>
                </div>
            </div>
        </div>

        <div class="d-block text-center pt-4">
            <label for="inputBox"></label>
            <input type="text" class="pl-2 pt-1 mb-3 w-25 text-center" id="inputBox" onkeyup="search()"
                   placeholder="Search this page"/>
        </div>

        {{ $item_drops->links('pagination::tailwind') }}
        <table class="container table-striped table-hover text-primary table-transparent" id="List">
            <thead class="border-bottom border-info">
            <tr class="text-info">
                <th class="pl-3 float-left pl-1">Name (ID)</th>
                <th class="text-center">Picture</th>
                <th class="pr-3 float-right pl-5">Quantity</th>
            </tr>
            </thead>
            <tbody>
            @foreach($item_drops as $item_drop)
                <tr class="clickable-row" data-href="/npcdef/{{ $item_drop->npcID }}">
                    <td>
							<span class="pl-3 float-left text-capitalize">
								{{ $item_drop->npcName }} ({{ $item_drop->npcID }})
							</span>
                    </td>
                    <td class="text-center pt-1 pb-1">
                        <div>
                            <img src="{{ asset('img/npc') }}/{{ $item_drop->npcID }}.png"
                                 alt="{{ $item_drop->npcName }}"/>
                        </div>
                    </td>
                    <td>
                        <div class="pr-3 float-right pl-5 pt-1">
                            {{ $item_drop->dropAmount }}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $item_drops->links('pagination::tailwind') }}
    </div>
@endsection
