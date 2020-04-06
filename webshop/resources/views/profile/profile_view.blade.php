@extends('layouts.app')
@section('content')

<div class="container">
    <div class="col-md12">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Alap adatok</h2>
                        <table class="table table-user-information ">
                            <tbody>
                                <tr>
                                    <td>Vezetéknév:</td>
                                    <td>{{$profile->lastname}}</td>
                                </tr>
                                <tr>
                                    <td>Keresztnév:</td>
                                    <td>{{$profile->firstname}}</td>
                                </tr>
                                <tr>
                                    <td>Irányító szám:</td>
                                    <td>{{$profile->postcode}}</td>
                                </tr>
                                <tr>
                                    <td>Helység név:</td>
                                    <td>{{$profile->place}}</td>
                                </tr>
                                <tr>
                                    <td>Utca:</td>
                                    <td>{{$profile->street}}</td>
                                </tr>
                                <tr>
                                    <td>Ház szám:</td>
                                    <td>{{$profile->number}}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <form method="POST" action="{{ route('new_address') }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Adat modosítás</h2>
                            <table class="table table-user-information ">
                                <tbody>
                                    <tr>
                                        <td>Kereszt Név:</td>
                                        <td><input class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname"></td>
                                    </tr>
                                    <tr>
                                        <td>Vezeték Név:</td>
                                        <td><input class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname"></td>
                                    </tr>
                                    <tr>
                                        <td>Irányító szám:</td>
                                        <td><input class="form-control{{ $errors->has('postalcode') ? ' is-invalid' : '' }}" name="postalcode"></td>
                                    </tr>
                                    <tr>
                                        <td>Helység név:</td>
                                        <td><input class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city"></td>
                                    </tr>
                                    <tr>
                                        <td>Utca:</td>
                                        <td><input class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street"></td>
                                    </tr>
                                    <tr>
                                        <td>Ház szám:</td>
                                        <td><input class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number"></td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="container">
                                <button type="submit" class="btn btn-primary">
                                    Adat módosítás
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <form method="POST" action="{{ route('new_password') }}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Jelszó Változtatás</h2>
                        <div class="form-group row">
                            <label for="current_password" class="col-md-6 col-form-label text-md-right">{{ __('Aktuális jelszó') }}</label>

                            <div class="col-md-4">
                                <input id="current_password" type="current_password" class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}" name="current_password" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_password" class="col-md-6 col-form-label text-md-right">{{ __('Új jelszó') }}</label>

                            <div class="col-md-4">
                                <input id="new_password" type="new_password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_password_again" class="col-md-6 col-form-label text-md-right">{{ __('Új jelszó mégegyszer') }}</label>

                            <div class="col-md-4">
                                <input id="new_password_again" type="new_password_again" class="form-control{{ $errors->has('new_password_again') ? ' is-invalid' : '' }}" name="new_password_again" required>

                            </div>
                            <div class="container">
                                <button type="submit" class="btn btn-primary">
                                    Jelszó módosítás
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection