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
        <form method="POST" action="{{route('create_product')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label class="col-4 col-form-label">Termék neve*</label>
                <div class="col-4">
                    <input name="name" placeholder="" class="form-control here " required="required" type="text">

                </div>
            </div>
            <div class="form-group row">
                <label class="col-4 col-form-label">Termék Leírás*</label>
                <div class="col-4">
                    <textarea name="description" placeholder="" class="form-control here" required="required" type="text"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4 col-form-label">Termék ára*</label>
                <div class="col-4">
                    <input name="price" placeholder="" class="form-control here " required="required" type="text">

                </div>
            </div>
            <div class="form-group row">
                <label class="col-4 col-form-label">Termék Mennyisége*</label>
                <div class="col-4">
                    <input name="quantity" placeholder="" class="form-control here" quantity type="text">
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-4 col-form-label">Termék kategória</label>
                <div class="col-4">
                    <select id="categories" class="form-control js-states js-example-basic-multiple" name="categories[]" multiple="multiple">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-4 col-form-label">Fénykép feltöltése</label>
                <div class="col-md-4">
                    <input type="file" name="image" class="form-control">
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