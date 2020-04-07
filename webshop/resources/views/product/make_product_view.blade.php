@extends('layouts.app')
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" defer></script>
<script src="{{asset('js/ddm.js')}} " defer></script>

@endpush
@push('styles')

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')

<div class="card">
    <div class="card-body">
        <h2 class="card-title">Termék Hozzáadása</h2>
        <form method="POST" action="{{route('create_product')}}">
            @csrf

            <div class="form-group row">
                <label class="col-4 col-form-label">Termék neve*</label>
                <div class="col-4">
                    <input id="product_name" name="prudict_name" placeholder="" class="form-control here " required="required" type="text">

                </div>
            </div>
            <div class="form-group row">
                <label class="col-4 col-form-label">Termék Leírás*</label>
                <div class="col-4">
                    <textarea id="product_desc" name="product_desc" placeholder="" class="form-control here" required="required" type="text"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4 col-form-label">Termék ára*</label>
                <div class="col-4">
                    <input id="product_price" name="product_price" placeholder="" class="form-control here " required="required" type="text">

                </div>
            </div>
            <div class="form-group row">
                <label class="col-4 col-form-label">Termék Mennyisége*</label>
                <div class="col-4">
                    <input id="product_quantity" name="product_quantity" placeholder="" class="form-control here" product_quantity type="text">
                </div>
            </div>
            <div class="form-group row">
                <label for="product_category" class="col-4 col-form-label">Termék kategória</label>
                <div class="col-4">
                        <select id="categories" class="form-control js-states js-example-basic-multiple" name="categories[]" multiple="multiple">
                            <option value="1">Kategoria1</option>
                            <option value="2">Kategoria2</option>
                            <option value="3">Kategoria3</option>
                            <option value="4">Kategoria4</option>
                            <option value="5">Kategoria5</option>
                            <option value="6">Kategoria6</option>
                            <option value="7">Kategoria7</option>
                            <option value="8">Kategoria8</option>
                            <option value="9">Kategoria9</option>
                        </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="product_pic" class="col-4 col-form-label">Fénykép feltöltése</label>
                <div class="col-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="product_pic">Feltöltés</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="product_pic" aria-describedby="product_pic">
                            <label class="custom-file-label" for="product_pic">Fájl kiválasztása</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-0 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Termék Hozzáadása</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection