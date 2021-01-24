@extends('template')
@section('content')
    <div class="pt-1"></div>
    <table width=500 bgcolor=black cellpadding=4 border=0>
        <tr>
            <td class=e>
                <div class="pt-2"></div>
                <div class="">
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
                </div>
                <span class="d-block pt-2 pb-2">
                    Creating an account for Open RuneScape Classic is a simple process.
                </span>
                <span class="d-block pt-2 pb-2">
                    To begin you must first select a username. Once you have found a username that
                    you like and is not already taken, you will be asked to choose a password.
                </span>
                <span class="d-block pt-2 pb-2">
                    When you have done that, you are ready to play!
                </span>
                <span class="d-block pt-2 pb-2">
                    Remember creating an account is totally free, you can keep playing on our free
                    worlds for as you like with no obligation to buy anything.
                </span>
                <span class="d-block pt-2 pb-2">
                    Usernames can be a maximum of 12 characters long and may contain letters, numbers
                    and underscores. When playing RuneScape, underscores in usernames are translated
                    into spaces and first letters are capitalised. For example the username
                    red_rooster would appear as Red Rooster.
                </span>
                <center>
                    <table>
                        <tr>
                            <td>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>
                                            Desired Username:
                                        </td>
                                        <td>
                                            <label>
                                                <input type="text" name="name" class="form-control input-sm"
                                                       id="username" maxlength="16">
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <form method="post" action="{{ route('Choose_a_username') }}">
                                                @csrf
                                                <input style="color: black;" type=submit value="Check Availability">
                                            </form>
                                        </td>
                                    </TR>
                                    </tbody>
                                </table>


                            </td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
    </table>


    <form method="post" action="{{ route('Choose_a_username') }}">
        @csrf
        <div class="form-group row">
            <label for="username" class="col-sm-4 col-form-label">Desired Username:</label>
            <div class="col-sm-8">
                <input type="text" name="name" class="form-control" id="username"
                       placeholder="Username" size="20" maxlength="16">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-4 col-form-label">Desired Password:</label>
            <div class="col-sm-8">
                <input type="password" name="password" class="form-control" id="password"
                       placeholder="Password" size="20" maxlength="16">
            </div>
        </div>
        <div class="form-group row">
            <label for="password_confirmation" class="col-sm-4 col-form-label">Confirm
                Password:</label>
            <div class="col-sm-8">
                <input type="password" name="password_confirmation" class="form-control"
                       id="password_confirmation" placeholder="Password" size="20" maxlength="16">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Email:</label>
            <div class="col-sm-8">
                <input type="text" name="email" class="form-control" id="email" placeholder="Email"
                       size="20">
            </div>
        </div>
        <br/>
        <div class="text-center container">
            <button type="submit" class="btn btn-jag-grey">Create Account</button>
        </div>
        <br/>
    </form>

@endsection