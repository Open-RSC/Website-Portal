<form>
    @csrf
    <table class="" style="width: 500px; height: 300px; background-color: black; padding: 4px;">
        <tr>
            <td class=e>
                    <span class="d-block text-center" style="color: #ffbb22;">
                        <b>You need to login to access this feature</b>
                    </span>
                <span class="d-block text-center">
                        Never enter your password anywhere except <b>RSC.vet</b>
                    </span>
                <div class="pt-3"></div>
                <center>
                    <table>
                        <tr>
                            <td></td>
                            <td>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">
                                Select Game:
                            </td>
                            <td>
                                <label class="pl-1">
                                    <select wire:model.defer="game" class="text-dark" name="game">
                                        <option selected hidden></option>
                                        <option value="preservation">RSC Preservation</option>
                                        <option value="cabbage">RSC Cabbage</option>
                                    </select>
                                    @error('game')
                                    <p class="text-sm text-red-500 text-center">{{$message}}</p>
                                    @enderror
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">
                                Username:
                            </td>
                            <td>
                                <label class="pl-1">
                                    <input wire:model.defer="username" aria-label="Username"
                                           type="text" required class="text-dark">
                                    @error('username')
                                    <p class="text-sm text-red-500 text-center">{{$message}}</p>
                                    @enderror
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">
                                Password:
                            </td>
                            <td>
                                <label class="pl-1">
                                    <input wire:model.defer="pass" aria-label="Password"
                                           type="password" required class="text-dark">
                                    @error('pass')
                                    <p class="text-sm text-red-500 text-center">{{$message}}</p>
                                    @enderror
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" name="remember" value="true">
                                <!--<x-honey recaptcha="login"/>-->
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <label class="pl-1">
                                    <input style="color: black; width: 110px;" type=submit
                                           value="Secure Login" wire:click.prevent="login">
                                </label>
                                <div class="pt-3"></div>
                            </td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td class="align-content-center">
                                <table style="background-color: black; width: 200px; padding: 4px;">
                                    <tr>
                                        <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                            style="background-color: #474747">
                                            <div class="text-center">
                                                <a href="#" class=c>
                                                    <b>Lost password?</b></a>
                                                <span class="d-block">
                                                    If you have lost/forgotten your password or need to recover your account.
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            <td>
                            <td style="width: 20px;"></td>
                            <td class="align-content-center">
                                <table style="background-color: black; width: 200px; padding: 4px;">
                                    <tr>
                                        <td class="b" background="{{ asset('img/stoneback.gif') }}"
                                            style="background-color: #474747">
                                            <div class="text-center">
                                                <a href="{{ route('Player_Registration') }}" class=c>
                                                    <b>Need an account?</b>
                                                </a>
                                                <span class="d-block">
                                                    Create an Open RuneScape Classic account to access our games and secure services.
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
    </table>
</form>