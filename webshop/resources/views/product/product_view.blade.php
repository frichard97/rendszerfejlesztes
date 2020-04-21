@extends('layouts.app')
@push('styles')
<link href="{{ asset('css/product_view.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
@endpush
@push('scripts')
@if($product->offer)
    <script src="{{ asset('js/licit.js') }}" defer></script>
    <script src="{{ asset('js/product_view.js') }}" defer></script>
     @endif
    <script>
        let id = {{$product->id}};
        @if($product->offer)let comment_number = {{count($product->offer->comments)}}; @endif
            @if($product->offer)let licit_number = {{count($product->offer->licits)}}; @endif

    </script>
@endpush
@section('content')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">

        <h1>{{session('success')}}</h1>
    </div>
    @endif
    @if(session('failed'))
    <div class="alert alert-danger">

        <h1>{{session('failed')}}</h1>
    </div>
    @endif
    @if(session('info'))
    <div class="alert alert-info">
        <h1>{{session('info')}}</h1>
    </div>
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2 style="text-align: center">Termék Adatai</h2>
                    <hr>
                </div>

                <div class="row ">
                    <div class="col-md-4">
                        <img src="{{url('/images/'.$product->image)}}" alt="Image" class="col-md-12" />
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <td>
                                    <h3>Termék név:</h3>
                                </td>
                                <td>
                                    <h3>{{$product->name}}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3>Leírás:</h3>
                                </td>
                                <td style="word-wrap: break-word;min-width: 160px;max-width: 160px;">
                                    <h5>{{$product->description}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3>Mennyiség:</h3>
                                </td>
                                <td>
                                    <h4><strong>{{$product->quantity}}</strong></h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h3>Létrehozva:</h3>
                                </td>
                                <td>
                                    <h3>{{$product->created_at}}</h3>
                                </td>
                            </tr>
                            <tr>

                            </tr>
                        </table>
                    </div>
                </div>
                <hr>
                @if(!$product->offer)
                <div class="row" style="float:right; padding-right:2%">
                    @if(Auth::check())
                    @if(Auth::user()->id == $product->user_id)
                    <a href="{{route('make_offer_view',$product->id)}}" class="btn btn-primary btn-lg">
                        Meghírdetés
                    </a>
                    @endif
                    @endif
                </div>
                @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="border: none">
                            <div class="card-body ">
                                <div class="card-title" style="text-align: center">
                                    <h2 class="card-title">
                                        Licit</h2>
                                </div>

                                <div class="row">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <h3>Státusz:</h3>
                                            </td>
                                            <td>
                                                @if($product->offer->end_date > Carbon::now())
                                                <h3 style="color: green"><strong>Aktív</strong></h3>
                                                @else
                                                <h3 style="color: grey"><strong>Inaktív</strong></h3>
                                                @endif
                                            </td>
                                        </tr>
                                        @if(!$product->offer->end_date < Carbon::now())
                                        <tr>
                                            <td><h3>Nyertes:</h3></td>
                                            <td><h3>@if(count($product->offer->licits) != 0){{$product->offer->licits()->get()->sortByDesc('price')->first()->user->profile->getFullName()}}@else Nem érkezett licit @endif </h3></td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td>
                                                <h3>Lejárati dátum:</h3>
                                            </td>
                                            <td>
                                                <h3> {{$product->offer->end_date}}</h3>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default widget">
                            <div class="panel-heading">
                                <span class="fa fa-dollar fa-2x" style="color:green;"></span>
                                <h3 class="panel-title">
                                    Licitek</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group" id="add_licit">
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($product->offer->licits()->get()->sortByDesc('created_at')->take(10) as $licit)
                                    <li class="list-group-item" id="licit{{$i++}}">
                                        <div class="row">
                                            <div class="col-xs-10 col-md-11">
                                                <div>
                                                    <div class="mic-info">
                                                        By: <a href="#">{{$licit->user->profile->getFullName()}}</a> <span style="color: green; padding-left: 3%">{{$licit->price}} Ft</span> <span style="float: right">{{$licit->created_at}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                        @endforeach
                                </ul>
                            </div>
                            @if($product->offer->end_date > Carbon::now())
                            <div class="licit-section">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input id="licit_price" type="text" class="form-control" />
                                        </div>
                                        <div class="col-md-4">
                                            <button class=" btn btn-success btn-lg" onclick="new_licit({{$product->id}})">Licit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endif
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default widget">
                            <div class="panel-heading" data-toggle="collapse" data-target="#demo">
                                <span class="fa fa-comment fa-2x" style="color:lightskyblue;"></span>
                                <h3 class="panel-title">
                                    Kommentek</h3>
                                <span class="badge badge-primary" id="comment_count">{{count($product->offer->comments)}}</span>
                                <span class="fa fa-chevron-right downbutton"></span>
                            </div>
                            <div class="panel-body collapse" id="demo">
                                <div class="comment-section">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <textarea id="comment-message" class="comment-sendtext col-md-9" placeholder="Írj egy kommentet!" cols="30" rows="5"></textarea>
                                            <div class="col-md-1"></div>
                                            <button class="btn btn-primary btn-lg col-md-2" style="float: right" onclick="new_comment({{$product->id}})">
                                                Küldés
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-group" id="addcomment">
                                    @foreach($product->offer->comments()->get()->sortByDesc('created_at') as $comments)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-xs-10 col-md-11">
                                                <div>
                                                    <div class="mic-info">
                                                        By: <a href="#">{{$comments->user->profile->getFullName()}}</a> <span style="float: right"> {{$comments->created_at}}</span>
                                                    </div>
                                                </div>
                                                <div class="comment-text">
                                                    {{$comments->message}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                        @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
