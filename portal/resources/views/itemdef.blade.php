@extends('template')

@section('content')
    <div class="col container">
        <h2 class="h2 text-center pt-5 pb-3 text-capitalize display-3">
            <a href="{{ route('Items') }}">{{ $itemdef->name }}</a>
        </h2>

        <div class="row align-items-center">
            <div class="col-md d-inline-block text-center">
                <span class="col d-inline-block">{{ $itemdef->description }}</span>
            </div>

            <div class="col-md d-inline-block text-center">
                @if ($itemdef->requiredLevel > 0)
                    Required Level:
                    {{ number_format($itemdef->requiredLevel) }}
                    @if($itemdef->requiredSkillID == 0)
                        attack
                    @elseif($itemdef->requiredSkillID == 1)
                        defense
                    @elseif($itemdef->requiredSkillID == 2)
                        strength
                    @elseif($itemdef->requiredSkillID == 3)
                        hits
                    @elseif($itemdef->requiredSkillID == 4)
                        ranged
                    @elseif($itemdef->requiredSkillID == 5)
                        prayer
                    @elseif($itemdef->requiredSkillID == 6)
                        magic
                    @elseif($itemdef->requiredSkillID == 7)
                        cooking
                    @elseif($itemdef->requiredSkillID == 8)
                        woodcutting
                    @elseif($itemdef->requiredSkillID == 9)
                        fletching
                    @elseif($itemdef->requiredSkillID == 10)
                        fishing
                    @elseif($itemdef->requiredSkillID == 11)
                        firemaking
                    @elseif($itemdef->requiredSkillID == 12)
                        crafting
                    @elseif($itemdef->requiredSkillID == 13)
                        smithing
                    @elseif($itemdef->requiredSkillID == 14)
                        mining
                    @elseif($itemdef->requiredSkillID == 15)
                        herblaw
                    @elseif($itemdef->requiredSkillID == 16)
                        agility
                    @elseif($itemdef->requiredSkillID == 17)
                        thieving
                    @endif
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
                <th class="text-center">Stats</th>
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
                        @php
                            $npcStats = [];
                            if ($item_drop->npcAttack > 0) $npcStats[] = 'atk ' . $item_drop->npcAttack;
                            if ($item_drop->npcDefense > 0) $npcStats[] = 'def ' . $item_drop->npcDefense;
                            if ($item_drop->npcStrength > 0) $npcStats[] = 'str ' . $item_drop->npcStrength;
                            if ($item_drop->npcHits > 0) $npcStats[] = 'hp ' . $item_drop->npcHits;
                            if ($item_drop->npcRanged > 0) $npcStats[] = 'ranged ' . $item_drop->npcRanged;
                        @endphp
                        <div>Combat Level: {{ $item_drop->npcCombatlvl ?? 'N/A' }}</div>
                        <div>{{ implode(', ', $npcStats) }}</div>
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
