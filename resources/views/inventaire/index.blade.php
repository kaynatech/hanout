@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" style="width : 100%">
            <div class="" id=" table" style="width : 100%">
                <table class="table" style="width : 100%">
                    <thead>
                        <tr>
                            <th scope="col">Cle</th>
                            <th scope="col">nouveau cle</th>
                            <th scope="col">designiation</th>
                            <th scope="col">categorie</th>
                            <th scope="col">quantite</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventaires as $inventaire)
                            <tr>
                                <th scope="row">{{ $inventaire->article->id }}</th>
                                <td>{{ $inventaire->article->custom_id }}</td>
                                <td>{{ $inventaire->article->designiation }}</td>
                                <td>{{ $inventaire->article->categorie->nom ?? '' }}</td>
                                <td>{{ $inventaire->article->quantite }}</td>
                                <td> <a href="{{ route('delete_inventaire' , ['id' => $inventaire->id ])}}" class="btn btn-success">Verifier</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script>


    </script>
@endsection
