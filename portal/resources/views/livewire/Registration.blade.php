<table style="width: 500px; background-color: black; padding: 4px;">
    <form>
        @csrf
        <tr>
            <td class=e>
                <div class="pl-1 pr-1">
                    <span class="d-block pt-2 pb-2">
                        Creating an account for Open RuneScape Classic is a simple process.
                    </span>
                    <span class="d-block pt-2 pb-2">
                        To begin you must first select a username. Once you have found a username that
                        you like and is not already taken, you will be asked to choose a password.
                    </span>
                    <span class="d-block pt-2 pb-2">
                        Usernames must be between 2 and 12 characters long and may contain letters, numbers, and spaces.
                        When playing Open RuneScape Classic, underscores in usernames are translated
                        into spaces. Capitalization is maintained from account creation now. For example, the
                        username Red_Rooster would appear as Red Rooster.
                    </span>
                    <span class="d-block pt-2 pb-2">
                        Passwords must be between 4 and 20 characters long. We recommend you use a mixture of numbers and
                        letters in your password to make it hard for someone to guess. We also suggest to avoid reusing passwords from other games here.
                    </span>
                    <div class="pt-2"></div>
                    <center>
                        <table>
                            <tr>
                                <td>
                                    <table>
                                        <tbody>
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
                                                    <select wire:model="game" class="text-dark" name="game">
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
                                                Desired Username:
                                            </td>
                                            <td>
                                                <label class="pl-1">
                                                    <input wire:model="username" aria-label="Username"
                                                           type="text" required class="text-dark">
                                                    @error('username')
                                                    <p class="text-sm text-red-500 text-center">{{$message}}</p>
                                                    @enderror
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                Desired Password:
                                            </td>
                                            <td>
                                                <label class="pl-1">
                                                    <input wire:model.defer="password" aria-label="Password"
                                                           type="password" required class="text-dark">
                                                    @error('password')
                                                    <p class="text-sm text-red-500 text-center">{{$message}}</p>
                                                    @enderror
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                Confirm Password:
                                            </td>
                                            <td>
                                                <label class="pl-1">
                                                    <input wire:model.defer="passwordConfirmation" aria-label="Password"
                                                           type="password" required class="text-dark">
                                                    @error('password')
                                                    <p class="text-sm text-red-500 text-center">{{$message}}</p>
                                                    @enderror
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                Email Address:
                                            </td>
                                            <td>
                                                <label class="pl-1">
                                                    <input wire:model.defer="email" aria-label="Email" name="email"
                                                           type="email" required class="text-dark">
                                                    @error('email')
                                                    <p class="text-sm text-red-500 text-center">{{$message}}</p>
                                                    @enderror
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">
                                                I agree with the <a target="_blank"
                                                                    href="{{ route('Terms_and_Conditions') }}">terms+conditions</a>:
                                            </td>
                                            <td>
                                                <label class="pl-1">
                                                    <input wire:model.defer="terms" type="checkbox" value="yes"
                                                           name="terms" id="terms">
                                                    @error('terms')
                                                    <p class="text-sm text-red-500 text-center">{{$message}}</p>
                                                    @enderror
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <x-honey recaptcha="registration"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <label class="pl-1">
                                                    <input style="color: black; width: 110px;" type=submit
                                                           value="Create Account"
                                                           wire:click.prevent="registerStore">
                                                </label>
                                                <div class="pt-2"></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </center>
                </div>
            </td>
        </tr>
    </form>
</table>