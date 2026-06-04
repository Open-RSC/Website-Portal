@extends('template')
@section('content')
    <div class="col container">
        <h2 class="h2 text-center pt-5 pb-4 text-capitalize display-3 ">Item Database</h2>
        <div class="text-center" style="color:grey">
            <label for="inputBox"></label>
            <form method="GET" action="{{ route('Items') }}" id="searchForm">
                <input type="text" class="mb-3" name="search" value="{{ request('search') }}" placeholder="Search items..." onkeyup="debouncedSubmit()">
            </form>
        </div>

        {{ $items->links('pagination::tailwind') }}
        <table id="List" class="container table-striped table-hover text-primary table-transparent">
            <thead class="border-bottom border-info">
            <tr class="text-info">
                <th class="text-center p-2">Item Name</th>
                <th class="text-center p-2">Required Level</th>
                <th class="text-center p-2">Shop Value</th>
                <th class="text-center p-2 text-wrap-balance">Alch Value (Low/High)</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($items as $itemdef)
                <tr class="clickable-row cursor-pointer" data-href="itemdef/{{ $itemdef->id }}">
                    <td class="pl-3 w-25">
                        <span class="text-capitalize pl-1">{{ $itemdef->name }} ({{ $itemdef->id }})</span>
                        <span class="text-white-50 pl-1 d-block">{{ $itemdef->description }}</span>
                    </td>
                    @if ($itemdef->requiredLevel == 0)
                        <td>
                        </td>
                    @else
                        <td class="w-10 text-center pt-1 pb-1">
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
                        </td>
                    @endif
                    <td class="text-center pt-1">
                        {{number_format($itemdef->basePrice) }}
                    </td>
                    <td>
                        <div class="pr-3 float-right pt-1">
                            {{ number_format($itemdef->basePrice * 0.4) }}
                            <span class="text-secondary">/</span>
                            {{ number_format($itemdef->basePrice * 0.6) }}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $items->appends(['search' => request('search')])->links('pagination::tailwind') }}
    </div>
    <script>
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        };
        const debouncedSubmit = debounce(function() {
            document.getElementById('searchForm').submit();
        }, 500)
    </script>
@endsection
