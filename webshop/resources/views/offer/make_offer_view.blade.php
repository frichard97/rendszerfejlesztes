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
                <div id="proba" class="form-group row">
                    <div id="whitelist" class="header">
                        <h3 style="margin:5px">Meghivottak</h3>
                        <input type="text" id="Input" placeholder="email">
                        <span id="add" class="btn btn-primary">Add</span>
                    </div>
                    <div class="col-md-6">
                        <ul id="whitelist" class="list-group" >

                        </ul>
                    </div>

                    <script>
                        // Create a "close" button and append it to each list item
                        var myNodelist = document.getElementsByTagName("LI");
                        var i;
                        for (i = 0; i < myNodelist.length; i++) {
                            var span = document.createElement("SPAN");
                            var txt = document.createTextNode("\u00D7");
                            span.className = "close";
                            span.appendChild(txt);
                            myNodelist[i].appendChild(span);
                        }

                        // Click on a close button to hide the current list item
                        var close = document.getElementsByClassName("close");
                        var i;
                        for (i = 0; i < close.length; i++) {
                            close[i].onclick = function() {
                                var li = document.createElement("li");
                                li.remove(i)
                            }
                        }

                        // Create a new list item when clicking on the "Add" button
                        function newElement() {
                            var li = document.createElement("li");
                            var inputValue = document.getElementById("Input").value;
                            var t = document.createTextNode(inputValue);
                            li.appendChild(t);
                            if (inputValue === '') {
                                alert("Nem lehet üres!");
                            } else {
                                document.getElementById("whitelist").appendChild(li);
                            }
                            document.getElementById("Input").value = "";

                            var span = document.createElement("SPAN");
                            var txt = document.createTextNode("\u00D7");
                            span.className = "close";
                            span.appendChild(txt);
                            li.appendChild(span);

                            for (i = 0; i < close.length; i++) {
                                close[i].onclick = function() {
                                    var div = this.parentElement;
                                    div.style.display = "none";
                                }
                            }
                        }
                    </script>

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