@extends('layouts.app')
@push('scripts')

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" defer></script>


@endpush
@push('styles')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

@endpush
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Offer</h2>
            <form method="POST" action="{{route('create_offer',1)}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label class="col-4 col-form-label">Lejárati dátum</label>
                    <div class="col-4">

                        <input name="end_date" placeholder="" class="form-control{{ $errors->has('end_date') ? ' is-invalid' : '' }}" required="required" type="date">
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
                        <input type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" id="toggle" data-onstyle="info" data-offstyle="danger" data-width="100">
                        <script>
                            $(function() {
                                $('#toggle').bootstrapToggle({
                                    on: 'Publikus',
                                    off: 'Privát'
                                });
                            })
                        </script>
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