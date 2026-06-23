{{-- Reusable centered homepage promo tile. Expects: $url, $title, $desc. Optional: $external (bool). --}}
@php
    $isExternal = $external ?? false;
@endphp
<div class="homepage-promo-tile">
    {{-- The whole stone box is the clickable image - the background only covers the title --}}
    <a href="{{ $url }}" class="c homepage-promo-tile-title-box" @if($isExternal) target="_blank" @endif>
        <span class="homepage-promo-tile-title-inner b" style="background-color: #474747;"
              background="{{ asset('img/stoneback.gif') }}">
            <b class="homepage-promo-tile-title">{{ $title }}</b>
        </span>
    </a>
    <span class="d-block homepage-promo-tile-desc">{{ $desc }}</span>
    <a href="{{ $url }}" class="c homepage-promo-tile-link" @if($isExternal) target="_blank" @endif>
        Click Here
    </a>
</div>
