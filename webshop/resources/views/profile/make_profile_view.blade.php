<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Új Profil létrehozás</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{route('create_profile')}}">
                            @csrf

                            <div class="form-group row">
                                <label  class="col-4 col-form-label">Vezeték Név*</label>
                                <div class="col-8">
                                    <input id="lastname" name="lastname" placeholder="Vezeték Név" class="form-control here " type="text">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-4 col-form-label">Kereszt Név*</label>
                                <div class="col-8">
                                    <input id="firstname" name="firstname" placeholder="Kereszt Név" class="form-control here" required="required" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-4 col-form-label">Irányító szám*</label>
                                <div class="col-8">
                                    <input id="postcode" name="postcode" placeholder="Irányító szám" class="form-control here " type="text">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-4 col-form-label">Helység Név*</label>
                                <div class="col-8">
                                    <input id="place" name="place" placeholder="Helység Név" class="form-control here" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-4 col-form-label">Utca*</label>
                                <div class="col-8">
                                    <input id="street" name="street" placeholder="Utca" class="form-control here" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-4 col-form-label">Ház szám*</label>
                                <div class="col-8">
                                    <input id="number" name="number" placeholder="Ház szám" class="form-control here" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Profil létrehozása</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


</div>
</body>
</html>
