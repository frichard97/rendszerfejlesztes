@extends('layouts.app')
@push('styles')
    <link href="{{ asset('css/offers_view.css') }}" rel="stylesheet">
@endpush
@section('content')

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            @foreach($offers as $o)
                @if($o->end_date > Carbon::now())
                    <a href="{{route('product_view',[$o->product_id])}}">
                        <div class="col-md-3">
                            <div class="ibox">
                                <div class="ibox-content product-box">
                                    <div class="product-imitation">
                                        <img class="col-md-12" src="{{url('/images/'.$o->product->image)}}"
                                             alt="Image"/>
                                    </div>
                                    <div class="product-desc">
                    <span class="product-price">
                        {{$o->currentprice}} Ft
                    </span>
                                        <small
                                            class="text-muted">@foreach($o->product->categories as $c) {{$c->name}}@endforeach</small>
                                        <a href="#" class="product-name"> {{$o->product->name}}</a>

                                        <div class="small m-t-xs">
                                            {{$o->product->description}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach

        </div>
    </div>
@endsection
