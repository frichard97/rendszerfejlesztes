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
                                <td>Név:</td>
                                <td>asd</td>
                            </tr>                          
                            <tr>
                                <td>Irányító szám:</td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td>Helység név:</td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td>Utca:</td>
                                <td>asd</td>
                            </tr>
                            <tr>
                                <td>Ház szám:</td>
                                <td>asd</td>
                            </tr>                           
                            </tbody>
                        </table>
                        
                    </div>
                    
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Adat modosítás</h2>
                        <table class="table table-user-information ">
                            <tbody>
                            <tr>
                                <td>Név:</td>
                                <td><input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="nev"></td>
                            </tr>                          
                            <tr>
                                <td>Irányító szám:</td>
                                <td><input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="iranyito_szam"></td>
                            </tr>
                            <tr>
                                <td>Helység név:</td>
                                <td><input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="helyseg_nev"></td>
                            </tr>
                            <tr>
                                <td>Utca:</td>
                                <td><input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="utca"></td>
                            </tr>
                            <tr>
                                <td>Ház szám:</td>
                                <td><input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="haz_szam"></td>
                            </tr>                           

                            </tbody>
                        </table>
                        <div class="container">
                        <a class="btn btn-primary" href="">
                            Adat modosítás
                        </a>                      
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
            <div class="card">
                    <div class="card-body">
                    <h2 class="card-title">Jelszó Változtatás</h2>
            <div class="form-group row">
                            <label for="aktualis jelszo" class="col-md-6 col-form-label text-md-right">{{ __('Aktuális jelszó') }}</label>

                            <div class="col-md-4">
                                <input id="aktualis jelszo" type="aktualis jelszo" class="form-control{{ $errors->has('aktualis jelszo') ? ' is-invalid' : '' }}" name="aktualis jelszo"  required>

                            </div>
                        </div>
            <div class="form-group row">
                            <label for="uj_jelszo" class="col-md-6 col-form-label text-md-right">{{ __('Új jelszó') }}</label>

                            <div class="col-md-4">
                                <input id="uj_jelszo" type="uj_jelszo" class="form-control{{ $errors->has('uj_jelszo') ? ' is-invalid' : '' }}" name="uj_jelszo"  required>

                            </div>
                        </div>
            <div class="form-group row">
                            <label for="uj_jelszo_megegyszer" class="col-md-6 col-form-label text-md-right">{{ __('Új jelszó mégegyszer') }}</label>

                            <div class="col-md-4">
                                <input id="uj_jelszo_megegyszer" type="uj_jelszo_megegyszer" class="form-control{{ $errors->has('uj_jelszo_megegyszer') ? ' is-invalid' : '' }}" name="uj_jelszo_megegyszer"  required>

                            </div>
                            <div class="container">
                        <a class="btn btn-primary" href="">
                            Jelszó modosítás
                        </a>                      
                        </div>                     
                        </div>
                        </div>
                        
            
 </div>
  </div>
  </div>

            
            
            
            @endsection