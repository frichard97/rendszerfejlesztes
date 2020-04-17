@extends('layouts.app')
@push('styles')
<link href="{{ asset('css/offers_view.css') }}" rel="stylesheet">
@endpush
@section('content')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="row">
@foreach($offers as $o)
    <div class="col-md-3">
        <div class="ibox">
            <div class="ibox-content product-box">
                <div class="product-imitation">
                <img src="{{url('/images/'.$o->product->image)}}" alt="Image" style="width:100px;height:100px;"/>
                </div>
                <div class="product-desc">
                    <span class="product-price">
                        {{$o->currentprice}}
                    </span>
                    <small class="text-muted">@foreach($o->product->categories as $c) {{$c->name}}@endforeach</small>
                    <a href="#" class="product-name"> {{$o->product->name}}</a>

                    <div class="small m-t-xs">
                    {{$o->product->description}}
                    </div>
                    <div class="m-t text-righ">

                        <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
</div>
</div>
@endsection