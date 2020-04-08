@extends('layouts.app')
@push('styles')
<link href="{{ asset('css/product_view.css') }}" rel="stylesheet">
@endpush
@section('content')
<div class="container">

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Termék Adatai</h2>
                <div class="row ">
                    <img src="{{url('/images/'.$product->image)}}" alt="Image" class="col-md-4" />


                    <div class="col-md-7 table">
                        <div class="row">
                            <div class="col-md-4 border-bottom border-top">
                                <h3>Termék név</h3>
                            </div>
                            <div class="col-md-4 border-bottom border-top">
                                {{$product->name}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 border-bottom ">
                                <h3>Leírás</h3>
                            </div>
                            <div class="col-md-4 border-bottom">
                                {{$product->description}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 border-bottom">
                                <h3>Mennyiség</h3>
                            </div>
                            <div class="col-md-4 border-bottom">
                                {{$product->quantity}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 border-bottom">
                                <h3>Ár</h3>
                            </div>
                            <div class="col-md-4 border-bottom">
                                {{$product->price}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 border-bottom">
                                <h3>Létrehozva</h3>
                            </div>
                            <div class="col-md-4 border-bottom">
                                {{$product->created_at}}
                            </div>
                        </div>
                    </div>
                </div>
                @if(!$product->offer)
                <div class="row" style="float:right; padding-right:2%">
                    @if(Auth::check())
                    @if(Auth::user()->id == $product->user_id)
                    <button class="btn btn-primary btn-lg">
                        Meghírdetés
                    </button>
                    @endif
                    @endif
                </div>
                @else
                <div class="row " style=" padding-left:2%">
                    <div class="col-md-12">
                        <div class="card" style="border:none">
                            <div class="card-body ">
                                <h2 class="card-title">Ajánlat Adatai</h2>
                                <div class="row">
                                    <div class="col-md-4 border-bottom border-top">
                                        <h3>Jelenlegi ár</h3>
                                    </div>
                                    <div class="col-md-4 border-bottom border-top">
                                        {{$product->offer->currentprice}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 border-bottom border-top">
                                        <h3>Státusz</h3>
                                    </div>
                                    <div class="col-md-4 border-bottom border-top">
                                        {{$product->offer->status}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 border-bottom border-top">
                                        <h3>Lejárati dárum</h3>
                                    </div>
                                    <div class="col-md-4 border-bottom border-top">
                                        {{$product->offer->end_date}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="row">
        <div class="panel panel-default widget">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span>
                <h3 class="panel-title">
                    Recent Comments</h3>
                <span class="label label-info">
                    78</span>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="http://www.jquery2dotnet.com/2013/10/google-style-login-page-desing-usign.html">
                                        Google Style Login Page Design Using Bootstrap</a>
                                    <div class="mic-info">
                                        By: <a href="#">Bhaumik Patel</a> on 2 Aug 2013
                                    </div>
                                </div>
                                <div class="comment-text">
                                    Awesome design
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="http://bootsnipp.com/BhaumikPatel/snippets/Obgj">Admin Panel Quick Shortcuts</a>
                                    <div class="mic-info">
                                        By: <a href="#">Bhaumik Patel</a> on 11 Nov 2013
                                    </div>
                                </div>
                                <div class="comment-text">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="http://bootsnipp.com/BhaumikPatel/snippets/4ldn">Cool Sign Up</a>
                                    <div class="mic-info">
                                        By: <a href="#">Bhaumik Patel</a> on 11 Nov 2013
                                    </div>
                                </div>
                                <div class="comment-text">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <button type="button" class="btn btn-success btn-xs" title="Approved">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary btn-sm btn-block" role="button"><span class="glyphicon glyphicon-refresh"></span> More</a>
            </div>
        </div>
    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection