@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="width : 100%">
            <div class="col-2">
                <input id="a5" class="form-control" type="text" value="{{ $verification->a5}}">
                <img src="{{ asset('img/5.jpg')}}" style="width: 60%" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <input id="a10" class="form-control" type="text" value="{{ $verification->a10}}">
                <img src="{{ asset('img/10.jpg')}}" style="width: 60%" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <input id="a20" class="form-control" type="text" value="{{ $verification->a20}}">
                <img src="{{ asset('img/20.jpg')}}" style="width: 60%" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <input id="a50" class="form-control" type="text" value="{{ $verification->a50}}">
                <img src="{{ asset('img/50.jpg')}}" style="width: 60%" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <input id="a100" class="form-control" type="text" value="{{ $verification->a100}}">
                <img src="{{ asset('img/100.jpg')}}" style="width: 60%" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <input id="a200" class="form-control" type="text" value="{{ $verification->a200}}">
                <img src="{{ asset('img/200.png')}}" style="width: 60%" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <input id="a500" class="form-control" type="text" value="{{ $verification->a500}}">
                <img src="{{ asset('img/500.jpg')}}" style="width: 100%" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <input id="a1000" class="form-control" type="text" value="{{ $verification->a1000}}">
                <img src="{{ asset('img/1000.jpg')}}" style="width: 100%" class="img-fluid" alt="">
            </div>
            <div class="col-2" value="{{ $verification->a2000}}">
                <input id="a2000" class="form-control" type="text">
                <img src="{{ asset('img/2000.jpg')}}" style="width: 100%" class="img-fluid" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4>
                    Caise 
                </h4>
            </div>
            <div class="col-md-8">
                <h3 id="caisse">
                    {{ $verification->total}}
                </h3>
            </div>
            <div class="col-md-4">
                <h4 >
                    caisse reele 
                </h4>
            </div>
            <div class="col-md-8">
                <h3 id="caisse_reel">
                    {{ $verification->owner->caisse->valeur}}
                </h3>
            </div>
            <div class="col-md-4">
                <h4>
                    Decalage 
                </h4>
            </div>
            <div class="col-md-8">
                <h3 id="diff">
                    00
                </h3>
            </div>
            <div class="col-md-4">
                <h4>
                    derniere verification
                </h4>
            </div>
            <div class="col-md-8">
                <h3>
                    {{ $verification->created_at}}

                </h3>
            </div>
        </div>
    </div>
    <script>


    </script>
@endsection
