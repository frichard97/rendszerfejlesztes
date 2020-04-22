@extends('layouts.app')
@push('styles')
<link href="{{ asset('css/user_view.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
                <div class="card-title">
                    <h1>{{$user->profile->getFullName()}}</h1>
                </div>
            <div class="row">
                <div class="col-sm-3">
                    <!--left col-->

                    <ul class="list-group">
                        <li class="list-group-item text-muted">Profil</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Csatlakozott</strong></span>{{$user->profile->created_at}}</li>

                    </ul>

                    <ul class="list-group">
                        <li class="list-group-item text-muted">Aktivitás <i class="fa fa-dashboard fa-1x"></i></li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Termékek</strong></span>{{count($user->products)}}</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong>Licitek</strong></span>{{count($user->offers)}}</li>
                    </ul>



                </div>
                <!--/col-3-->
                <div class="col-sm-9">

                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#adatlap" data-toggle="tab">Adatlap</a></li>
                        <li><a href="#termekek" data-toggle="tab">Termékek</a></li>
                        <li><a href="#licitek" data-toggle="tab">Licitek</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="adatlap">
                            <div class="table-responsive">
                                <table class="table table-user-information ">
                                    <tbody>
                                        <tr>
                                            <td>Vezetéknév:</td>
                                            <td>{{$user->profile->lastname}}</td>
                                        </tr>
                                        <tr>
                                            <td>Keresztnév:</td>
                                            <td>{{$user->profile->firstname}}</td>
                                        </tr>
                                        <tr>
                                            <td>Irányító szám:</td>
                                            <td>{{$user->profile->postcode}}</td>
                                        </tr>
                                        <tr>
                                            <td>Helység név:</td>
                                            <td>{{$user->profile->place}}</td>
                                        </tr>
                                        <tr>
                                            <td>Utca:</td>
                                            <td>{{$user->profile->street}}</td>
                                        </tr>
                                        <tr>
                                            <td>Ház szám:</td>
                                            <td>{{$user->profile->number}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/table-resp-->

                            <hr>

                        </div>
                        <!--/tab-pane-->
                        <div class="tab-pane" id="termekek">

                            <h2></h2>

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
                                    @foreach($user->products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{url('/images/'.$product->image)}}" alt="Image" style="width:50px;height:50px;" />
                                            <a>{{$product->name}}</a>
                                        </td>
                                        <td>@if(count($product->categories) != 0) @foreach($product->categories as $category){{$category->name}}, @endforeach @else <strong>-</strong> @endif</td>
                                        <td>
                                            <span>{{$product->price}}</span>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!--/tab-pane-->
                        <div class="tab-pane" id="licitek">
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
                                        @foreach($user->offers as $offer)
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
                                <hr>

                            </div>

                        </div>
                        <!--/tab-pane-->
                    </div>
                    <!--/tab-content-->

                </div>

            </div>
            <!--/col-9-->
        </div>

    </div>
    <!--/row-->
    @endsection