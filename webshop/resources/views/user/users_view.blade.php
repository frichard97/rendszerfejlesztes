@extends('layouts.app')
@push('styles')
<link href="{{ asset('css/users_view.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
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
                                    <th><span>Email</span></th>
                                    <th><span>Jogosultság</span></th>
                                    <th><span>Létrehozva</span></th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>{{$user->role->name}}</td>
                                    <td>
                                        <span>{{$user->created_at}}</span>
                                    </td>
                                    <td style="width: 20%;">
                                        <a href="{{route('user_view',$user->id)}}">
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
    @endsection
