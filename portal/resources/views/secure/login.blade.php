@extends('template')
@section('content')
    <div class="w-50 mx-auto">
        <table id="List" class="container bg-black">
            <tr>
                <td><img height="6" src="{{ asset('img/home/fm_topleft.gif') }}" width="6" alt=""></td>
                <td style="background-image:url('{{ asset('img/home/fm_top2.gif') }}');"><img height="6" src="{{ asset('img/home/blank.gif') }}" width="1" alt=""></td>
                <td><img height="6" src="{{ asset('img/home/fm_topright.gif') }}" width="6" alt=""></td>
            </tr>
            <tr>
                <td style="background-image:url('{{ asset('img/home/fm_left.gif') }}'); width: 6px;"><img height="1" src="{{ asset('img/home/blank.gif') }}" width="6" alt=""></td>
                <td>
                    <br/>
                    <div class="text-center container">
                        <span class="h5 text-white text-center">You need to login to access this feature</span>
                    </div>
                    <br/>
                    <div>
                        <form method="POST" action="{{ route('Secure_Login') }}">
                            @csrf
                            <label class="pl-1">
                                <select class="text-dark" name="game">
                                    <option selected hidden></option>
                                    <option value="preservation">RSC Preservation</option>
                                    <option value="cabbage">RSC Cabbage</option>
                                </select>
                            </label>
                            <div class="form-group row">
                                <label for="username" class="col-sm-4 col-form-label">RS username:</label>
                                <div class="col-sm-8">
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" size="20" maxlength="16">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">RS password:</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" size="20" maxlength="16">
                                </div>
                            </div>
                            <br/>
                            <div class="text-center container">
                                <button type="submit" class="btn btn-jag-grey">Secure Login</button>
                            </div>
                            <br/>
                            <div class="form-group row text-center">
                                <div class="col-sm-6">
                                    <a class="btn btn-jag-grey" href="#" role="button">Lost password?<br>If you have lost/forgotten your password or need to recover your account.</a>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-jag-grey" href="{{ asset('Player_Registration') }}" role="button">Need an account?<br>Create an OpenRSC account to access our game and secure services.</a>
                                </div>
                            </div>
                            <br/>
                        </form>
                    </div>
                </td>
                <td style="background-image:url('{{ asset('img/home/fm_right.gif') }}'); width: 6px;"><img height="1" src="{{ asset('img/home/blank.gif') }}" width="6" alt=""></td>
            </tr>
            <tr>
                <td><img height="6" src="{{ asset('img/home/fm_bottomleft.gif') }}" width="6" alt=""></td>
                <td style="background-image:url('{{ asset('img/home/fm_bottom2.gif') }}');"><img height="6" src="{{ asset('img/home/blank.gif') }}" width="1" alt=""></td>
                <td><img height="6" src="{{ asset('img/home/fm_bottomright.gif') }}" width="6" alt=""></td>
            </tr>
        </table>
    </div>
@endsection
