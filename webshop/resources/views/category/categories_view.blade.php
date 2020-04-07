@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/category_view.css') }}" rel="stylesheet">
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
                                    <th><span>Kategória név</span></th>
                                    <th><span>Termékek száma</span></th>
                                    <th><span>Létrehozva</span></th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>
                                            Kategória név
                                        </td>
                                        <td>10</td>
                                        <td>
                                            <span>{{$product->price}}</span>
                                        </td>
                                        <td style="width: 20%;">
                                            <a href="#" class="table-link">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                            </span>
                                            </a>
                                            <a href="#" class="table-link">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                            </span>
                                            </a>
                                            <a href="#" class="table-link danger">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                            </span>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-primary">
            Termék hozzáadása
        </a>
    </div>

@endsection
