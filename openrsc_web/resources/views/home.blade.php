@extends('template')

@section('content')
    <div class="table text-center">
        <div class="tr">
            <div class="td">
                <div class="pt-4">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid" style="height: 200px;" alt="Open RSC">
                </div>
                <div class="pb-3">
                    <div class="text-white-50">
                        <ul>
                            <li>- 1x XP rate</li>
                            <li>- Right click "bank" on bankers</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="td">
                <div class="pt-4">
                    <img src="{{ asset('img/cabbage_logo.png') }}" class="img-fluid" style="height: 200px;"
                         alt="RSC Cabbage">
                </div>
                <div class="pb-3">
                    <div class="text-white-50">
                        <ul>
                            <li>- 5x XP rate</li>
                            <li>- All QoL features</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
