@extends('layouts.app')
@push('scripts')

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" defer></script>
<script src="{{asset('js/toggle_action_form.js')}} "></script>
<script src="{{asset('js/whitelist.js')}} "></script>
@endpush
@push('styles')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endpush
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Ajánlat</h2>
            <form method="POST" action="{{route('create_offer',$product_id)}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label class="col-4 col-form-label">Lejárati dátum</label>
                    <div class="col-4">

                        <input name="end_date" placeholder="" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" required="required" type="datetime-local">
                        @if ($errors->has('end_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('end_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-4 col-form-label">Láthatóság</label>
                    <div class="col-4">
                        <input name="visibility" type="checkbox" data-toggle="toggle" data-on="Privát" data-off="Publikus" id="toggle" data-onstyle="danger" data-offstyle="info" data-width="100">
                        <script>
                            $(function() {
                                $('#toggle').bootstrapToggle({
                                    on: 'Privát',
                                    off: 'Publikus'
                                });
                            })
                        </script>
                    </div>
                </div>
                <div id="proba" class="form-group row" style="display: none">
                    <div id="whitelist" class="header">
                        <h3 style="margin:5px">Meghivottak</h3>
                        <input type="text" id="Input" placeholder="email">
                        <span id="add" class="btn btn-primary">Add</span>
                    </div>
                    <div class="col-md-6">
                        <ul id="whitelist" class="list-group" >

                        </ul>
                    </div>



                </div>

                <div class="form-group row">
                    <div class="offset-0 col-8">
                        <button type="submit" class="btn btn-primary">Hírdetés kiküldése</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
