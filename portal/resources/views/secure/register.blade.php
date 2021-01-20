@extends('template')
@section('content')
    <div class="w-50 mx-auto">
        <table id="List" class="container bg-black">
            <tr>
                <td><img height="6" src="{{ asset('img/home/fm_topleft.gif') }}" width="6"></td>
                <td style="background-image:url('/img/home/fm_top2.gif');"><img height="6" src="{{ asset('img/home/blank.gif') }}" width="1"></td>
                <td><img height="6" src="{{ asset('img/home/fm_topright.gif') }}" width="6"></td>
            </tr>
            <tr>
                <td style="background-image:url('/img/home/fm_left.gif'); width: 6px;"><img height="1" src="{{ asset('img/home/blank.gif') }}" width="6"></td>
                <td>
                    <br/>
                    <div class="text-center container">
                        <span class="h5 text-white text-center">Create an account</span>
                    </div>
                    <br/>
                    <div>
                        <ul>
                            <li>
                                NEVER give anyone your password, not even to our staff!
                            </li>
                            <li>
                                Our staff will never ask you for your password.
                            </li>
                            <li>
                                Passwords most be between 5 and 20 characters long. We recommend you use a mixture of numbers and letters in your password to make it hard for someone to guess.
                            </li>
                        </ul>
                    </div>
                    <div>
                        <form method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="username" class="col-sm-4 col-form-label">Desired Username:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" id="username" placeholder="Username" size="20" maxlength="16">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">Desired Password:</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" size="20" maxlength="16">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-4 col-form-label">Confirm Password:</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password" size="20" maxlength="16">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Email:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Email" size="20">
                                </div>
                            </div>
                            <br/>
                            <div class="text-center container">
                                <button type="submit" class="btn btn-jag-grey">Create Account</button>
                            </div>
                            <br/>
                        </form>
                    </div>
                </td>
                <td style="background-image:url('/img/home/fm_right.gif'); width: 6px;"><img height="1" src="{{ asset('img/home/blank.gif') }}" width="6"></td>
            </tr>
            <tr>
                <td><img height="6" src="{{ asset('img/home/fm_bottomleft.gif') }}" width="6"></td>
                <td style="background-image:url('/img/home/fm_bottom2.gif');"><img height="6" src="{{ asset('img/home/blank.gif') }}" width="1"></td>
                <td><img height="6" src="{{ asset('img/home/fm_bottomright.gif') }}" width="6"></td>
            </tr>
        </table>
    </div>
@endsection