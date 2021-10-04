@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <h1>
                Liste des {{$type}} en attente de validation 
            </h1>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Cle Article</th>
                        <th scope="col">Nouveaux Cle</th>
                        <th scope="col">Designiation</th>
                        <th scope="col">Declarer par</th>
                        <th scope="col">quantite declarer</th>
                        <th scope="col">qunatiter aprer declaration</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($declarations as $declaration)
                        <tr>
                            <th scope="row">{{ $declaration->article->id }}</th>
                            <td>
                                {{ $declaration->article->custom_id }}
                            </td>
                            <td>{{ $declaration->article->designiation }}</td>
                            <td>{{ $declaration->user->name }}</td>
                            <td>{{ $declaration->quantite }}</td>
                            <td>{{ $declaration->article->quantite -  $declaration->quantite }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-info"
                                        onclick="valider({{$declaration->id}})"
                                            >
                                            Valider
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-danger" >Suprimer</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const type = {!! json_encode($type, JSON_HEX_TAG) !!};

        const valider = async (id) => {
            const {data} = await axios.post(`/declaration/${type}/${id}`)
            location.reload()
        }
    </script>



@endsection
