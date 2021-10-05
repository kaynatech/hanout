@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="width : 100%">
            <div class="col-2">
                <input id="a5" class="form-control" type="text" value="{{ $verification->a5}}" onchange="calculate()">
                <img src="{{ asset('img/5.jpg')}}" style="width: 60%" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <input id="a10" class="form-control" type="text" value="{{ $verification->a10}}" onchange="calculate()"  >
                <img src="{{ asset('img/10.jpg')}}" style="width: 60%" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <input id="a20" class="form-control" type="text" value="{{ $verification->a20}}" onchange="calculate()"  >
                <img src="{{ asset('img/20.jpg')}}" style="width: 60%" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <input id="a50" class="form-control" type="text" value="{{ $verification->a50}}" onchange="calculate()"  >
                <img src="{{ asset('img/50.jpg')}}" style="width: 60%" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <input id="a100" class="form-control" type="text" value="{{ $verification->a100}}" onchange="calculate()"  >
                <img src="{{ asset('img/100.jpg')}}" style="width: 60%" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <input id="a200" class="form-control" type="text" value="{{ $verification->a200}}" onchange="calculate()"  >
                <img src="{{ asset('img/200.png')}}" style="width: 60%" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <input id="a500" class="form-control" type="text" value="{{ $verification->a500}}" onchange="calculate()"  >
                <img src="{{ asset('img/500.jpg')}}" style="width: 100%" class="img-fluid" alt="">
            </div>
            <div class="col-2">
                <input id="a1000" class="form-control" type="text" value="{{ $verification->a1000}}" onchange="calculate()"  >
                <img src="{{ asset('img/1000.jpg')}}" style="width: 100%" class="img-fluid" alt="">
            </div>
            <div class="col-2" value="{{ $verification->a2000}}" onchange="calculate()"  >
                <input id="a2000" class="form-control" type="text">
                <img src="{{ asset('img/2000.jpg')}}" style="width: 100%" class="img-fluid" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4>
                    Vente aujourduit 
                </h4>
            </div>
            <div class="col-md-8">
                <input id="ventes" class="form-control" type="text">

            </div>
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
                    {{ $verification->decalage}} 
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
        const calculate = () => {
            const a5 = $('#a5').val()
            const a10 = $('#a10').val()
            const a20 = $('#a20').val()
            const a50 = $('#a50').val()
            const a100 = $('#a100').val()
            const a200 = $('#a200').val()
            const a500 = $('#a500').val()
            const a1000 = $('#a1000').val()
            const a2000 = $('#a2000').val()
            const ventes = $('#ventes').val()
            const caisse_reel = $('#caisse_reel').val()
            const total = 
                a5 * 5 + 
                a10 * 10 +
                a20 * 200 + 
                a50 * 50 + 
                a100 * 100 + 
                a200 * 200 +
                a1000 * 1000 + 
                a2000 * 2000 + 
                ventes ;
            $('#diff') .html(`${caisse_reel - total }`)
        }
        calculate()
    </script>
@endsection
