@extends('template')
@section('content')
    <form class="pb-3" wire:submit.prevent="submit" method="post" action="{{ route('Choose_a_username') }}>
    @csrf
    <table style="width: 500px; background-color: black; padding: 4px;">
        <tr>
            <td class=e>
                <div class="pt-3"></div>
                <center>
                    <table style="padding: 2px; border-spacing: 1px; border: 0;">
                        <tr>
                            <td style="background-color: #35210F; height: 26px; color: #ffbb22">
                                Choose A Username
                            </td>
                            <td> ></td>
                            <td style="background-color: #35210F;">
                                Terms And Conditions
                            </td>
                            <td> ></td>
                            <td style="background-color: #35210F;">
                                Choose A Password
                            </td>
                            <td> ></td>
                            <td style="background-color: #35210F;">
                                Finish
                            </td>
                        </tr>
                    </table>
                </center>
                <div class="pl-1 pr-1">
                    <span class="d-block pt-2 pb-2">
                        Creating an account for Open RuneScape Classic is a simple process.
                    </span>
                    <span class="d-block pt-2 pb-2">
                        To begin you must first select a username. Once you have found a username that
                        you like and is not already taken, you will be asked to choose a password.
                    </span>
                    <span class="d-block pt-2 pb-2">
                        Usernames can be a maximum of 12 characters long and may contain letters, numbers
                        and underscores. When playing Open RuneScape Classic, underscores in usernames are translated
                        into spaces and first letters are capitalised. For example the username
                        red_rooster would appear as Red Rooster.
                    </span>
                    <span class="d-block pt-2 pb-2">
                        Passwords most be between 5 and 20 characters long. We recommend you use a mixture of numbers and
                        letters in your password to make it hard for someone to guess. We also suggest to avoid reusing passwords from other games here.
                    </span>
                            <center>
                                <table>
                                    <tr>
                                        <td>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Your Email Address:
                                                        </td>
                                                        <td>
                                                            <label>
                                                                @livewire('check-email')
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Desired Username:
                                                        </td>
                                                        <td>
                                                            <label>
                                                                @livewire('check-username')
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Desired Password:
                                                        </td>
                                                        <td>
                                                            <label>
                                                                @livewire('check-password')
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <input style="color: black;" type=submit value="Register Player">
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
            </table>
    </form>
@endsection