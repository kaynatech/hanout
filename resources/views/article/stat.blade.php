@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $article->designiation  }}</h1>
        <div class="row ">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="exampleInputEmail1">Date Debut</label>
                    <input type="date" class="form-control" id="debut">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="exampleInputEmail1">Date Fin</label>
                    <input type="date" class="form-control" id="fin">
                </div>
            </div>
            <div class="col-md-2 d-flex">
                <button class="btn btn-success" onclick="fetchVentes()">go</button>
            </div>
        </div>
        <div class="row" style="width : 100%">
            <div class="" id="table" style="width : 100%"></div>
        </div>
    </div>
    <script>
        const fetchVentes = async () => {
            const {data} = await window.axios.get('{!! route('article_statFetch' , ["id" => $article->id ]) !!}' , {
                params : {
                    start : $("#debut").val(),
                    end : $("#fin").val()
                }
            }) 
            $("#table").html(data);
        }
        setTimeout(() => {
            fetchVentes()
        }, 200);
        
    </script>
@endsection

