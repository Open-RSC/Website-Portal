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

                                <p class="d-block text-center">
                                    Check <a href="/faq">here</a>
                                    for world differences and other frequently asked questions
                                </p>

                                <span class="d-block text-center mb-2">
                                    <b>Click <a href="/register">here</a> to register an account</b>
                                </span>

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
