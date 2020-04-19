@extends('layouts.app')
@push('styles')
<link href="{{ asset('css/categories_view.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<script src="{{asset('js/categories_view.js')}} " defer></script>
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
                                @foreach($categories as $category)
                                <tr>
                                    <td>
                                        {{$category->name}}
                                    </td>
                                    <td>{{count($category->products)}}</td>
                                    <td>
                                        <span>{{$category->created_at}}</span>
                                    </td>
                                    <td style="width: 20%;">
                                    <a href="#">
                                                <span class="fa fa-search-plus fa-3x"></span>
                                            </a>
                                            <a href="#">
                                                <span class="fa fa-pencil fa-3x"></span>
                                            </a>
                                            <a href="javascript:delete_category({{$category->id}})" class="table-link danger">
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
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Kategória hozzáadása</button>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kategória hozzáadás</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('create_category')}}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-4 col-form-label">Név</label>
                            <div class="col-8">
                                <input id="name" name="name" placeholder="Név" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" autofocus>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Létrehozás</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Vissza</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
<form id="deleteform" method="POST" action="{{route('delete_category')}}" style="display: none">
        @csrf
        <input id="id" name="id"/>
    </form>
@endsection