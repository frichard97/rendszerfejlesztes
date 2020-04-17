@extends('layouts.app')
@push('styles')
<link href="{{ asset('css/offer_view.css') }}" rel="stylesheet">
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
                                    <th><span>Lejárat</span></th>
                                    <th class="text-center"><span>Állapot</span></th>
                                    <th><span>Aktuális ár</span></th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($offers as $offer)
                                <tr>
                                    <td>

                                        <a>{{$offer->product->name}}</a>
                                    </td>
                                    <td>{{$offer->end_date}}</td>
                                    <td class="text-center">
                                        <span class="label label-default">{{$offer->status}}</span>
                                    </td>
                                    <td>
                                        <a href="#">{{$offer->currentprice}}</a>
                                    </td>
                                    <td style="width: 20%;">
                                        <a href="{{route('product_view',$offer->product_id)}}">
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
</div>
@endsection
