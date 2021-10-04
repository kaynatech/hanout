@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <h1>
                Liste des facture achat non valide
            </h1>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Cle achat</th>
                        <th scope="col">Fournisseur</th>
                        <th scope="col">Date</th>
                        <th scope="col">somme</th>
                        <th scope="col">action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($factures as $facture)
                        <tr>
                            <th scope="row">{{ $facture->id }}</th>
                            <td>
                                {{ $facture->fournisseur->nom }}
                            </td>
                            <td>{{ $facture->created_at }}</td>
                            <td>{{ $facture->achats->sum('total') }} da</td>
                          <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-info"
                                        href="{{  route('edit_facture_achat' , ['id' => $facture->id ])}}"
                                            >
                                            Modifier
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-danger" href="{{ route('delete_facture_achat' , ['id' => $facture->id ] )}}">Suprimer</a>
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

        const valider = async (id) => {
            const {data} = await axios.post(`/declaration/${type}/${id}`)
            location.reload()
        }
    </script>



@endsection
