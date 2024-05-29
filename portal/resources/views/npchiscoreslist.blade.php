@extends('template')

@section('content')
<div class="col container">
    <h2 class="h2 text-center text-gray-400 pt-5 pb-4 text-capitalize display-3">
        NPC Hiscores Search Results
    </h2>
    <div class="row justify-content-center">
        @if(url()->previous() != url()->current())
            <a href="{{ url()->previous() }}">Go back</a>
        @endif
        <div class="col-lg-12 text-gray-400 pr-5 pl-5 pt-3 pb-3 bg-black">
            <div>
                <h4>NPC Hiscores search results for "{{ $searchName }}":</h4>
                <ul class="list-unstyled">
                    @foreach ($npcs as $npc)
                        <li class="npc-list-item">
                            <img src="/img/npc/{{ $npc->id }}.png" alt="{{ $npc->name }}">
                            <a href="/npchiscores/{{ $db }}/{{ $npc->id }}" class="text-white npc-link">
                                {{ $npc->name }} (ID: {{ $npc->id }}, Combat: {{ $npc->combatlvl }})
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<style>
    .npc-link::after, .npc-link:hover::after {
        content: unset !important;
    }

    .npc-list-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .npc-list-item img {
        max-height: 80px;
        max-width: 30px;
        object-fit: contain;
        margin-right: 10px;
    }

    .npc-list-item a {
        flex-grow: 1;
        text-align: left;
        vertical-align: middle;
        line-height: 50px;
    }
</style>
@endsection
