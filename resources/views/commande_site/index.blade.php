@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Cle</th>
                        <th scope="col">Client</th>
                        <th scope="col">total</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $commande)
                        <tr>
                            <th scope="row">{{ $commande->id }}</th>
                            <td>
                                @if($commande->client)
                                {{ $commande->client->name }}
                                @endif
                            </td>
                            <td>{{ $commande->total }}</td>
                            <td>{{ $commande->created_at }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-info"
                                            >
                                            Modifier
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-danger" >Delete</a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection
