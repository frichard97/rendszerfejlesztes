@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/products_view.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
@endpush
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-box no-header clearfix">
                    <div class="main-box-body clearfix">
                        <div class="table-responsive">
                            <table class="table user-list">
                                <thead>
                                <tr>
                                    <th><span>Termék</span></th>
                                    <th><span>Kategóriák</span></th>
                                    <th><span>Várt Ár</span></th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{url('/images/'.$product->image)}}" alt="Image"/>
                                            <a>{{$product->name}}</a>
                                        </td>
                                        <td>@if(count($product->categories) != 0) @foreach($product->categories as $category){{$category->name}}, @endforeach @else <strong>-</strong> @endif</td>
                                        <td>
                                            <span>{{$product->price}}</span>
                                        </td>
                                        <td style="width: 20%;">
                               
                                            <a href="#">
                                                <span class="fa fa-search-plus fa-3x"></span>
                                            </a>
                                            <a href="#">
                                                <span class="fa fa-pencil fa-3x"></span>
                                            </a>
                                            <a href="#" class="table-link danger">
                                                <span class="fa fa-trash-o fa-3x"></span>
                                            </a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-primary" href="{{ url('/make_product') }}">
            Termék hozzáadása
        </a>
    </div>

@endsection
