<table>
    <tbody>
        <tr>
            <td>
                <table class="homepage-content">
                    <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('img/fm_top.gif') }}" alt="">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table background="{{ asset('img/fm_middle.gif') }}" class="homepage-section-content">
                    <tbody>
                        <tr>
                            <td style="width: 7px;" background="{{ asset('img/fm_middle.gif') }}"></td>
                            <td>
                                <div class="pt-3"></div>

                                <span class="d-block text-center">
                                    <b>Anyone may play on the worlds below</b>
                                </span>

                                <p class="homepage-world-differences">
                                    Check <a href="/faq" class="homepage-world-differences-link">here</a> 
                                    for world differences
                                </p>

                                <!-- World online counts -->
                                <div class="homepage-online-worlds-flex-container">
                                    <!-- Regular worlds -->
                                    @include('partials.homepage-regular-worlds-list')
                                    <!-- Botting worlds -->
                                    @include('partials.homepage-botting-worlds-list')
                                </div>
                            </td>
                            <td style="width: 7px;" background="{{ asset('img/fm_middle.gif') }}"></td>
                        </tr>
                    </tbody>
                </table>
                <table style="padding: 0;">
                    <tbody>
                    <tr>
                        <td colspan="3">
                            <img src="{{ asset('img/fm_bottom.gif') }}" alt="">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>