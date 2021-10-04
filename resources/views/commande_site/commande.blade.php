@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">article_id</th>
                        <th scope="col">article nouveau cle</th>
                        <th scope="col">Designiation</th>
                        <th scope="col">quantite</th>
                        <th scope="col">Prix unite</th>
                        <th scope="col">total</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($commande->items as $item)
                        <tr>
                            <td>{{ $item->article->id }}</td>
                            <td>{{ $item->article->custom_id }}</td>
                            <td>{{ $item->article->designiation }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->prix }}</td>
                            <td>{{ $item->total }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-info" onclick="open_model({{ $item->id }})">

                                            Modifier
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-danger" onclick="delet({{ $item->id }})">Delete</a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h1>
                    Total : {{ $commande->items->sum('total') }}
            </div>
            </h1>
            <div class="col-md-4">
                <h2>

                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                @if($commande->etat == 0 )
                <button class="btn btn-success" style="width: 100%" onclick="validate({{$commande->id}})">Valider Commande</button>
                @else
                <button class="btn btn-success" style="width: 100%" disabled>Deja valide</button>
                @endif

            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <div id="article_modal">
        <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="modal_title"></h4>
                    </div>
                    <div class="modal-body">
                        <ul class="list-group">
                            <li class="list-group-item">Clé <span class="badge" id="modal_cle"> 11</span>
                            </li>
                            <li class="list-group-item">Quantité Restante : <span id="modal_quantite">12</span>
                            </li>
                            <li class="list-group-item">Prix Achat : <span id="modal_prix"> 10 </span> </li>
                            <li class="list-group-item">Prix Vente : <span id="modal_pv1"> 10 </span> </li>
                            <li class="list-group-item">Prix Vente 2 : <span id="modal_pv2"> 10 </span></li>
                            <li class="list-group-item">Prix Vente 3 : <span id="modal_pv3"> 10 </span> </li>
                            <li class="list-group-item">Date d `Achat <span class="badge"
                                    id="modal_date">100</span></li>
                            Quantité A vendre:
                            <li class="list-group-item"><input id="quantite_input" type="number" value="1"
                                    class="form-control"></li>
                            Prix Vente:
                            <li class="list-group-item"><input id="prix_input" type="number" class="form-control">
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button onclick="update()" type="button" class="btn btn-default" style="float:left;">Ajouter
                            au Panier
                        </button>
                        <button type="button" class="btn btn-default" style="float:left;">Imprimer
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const articles = {!! json_encode($articles, JSON_HEX_TAG) !!};
        const commandes = {!! json_encode($commande->items, JSON_HEX_TAG) !!};

        const open_model = (id) => {

            const commande = commandes.find((item) => item.id == id)
            const article = articles.find((item) => item.id == commande.article_id)
            console.log(commande.quantity)
            selected_article = id
            $("#modal_cle").html(commande.id)
            $("#modal_prix").html(article.prix)
            $("#modal_pv1").html(article.prix + article.prix_vente1)
            $("#modal_pv2").html(article.prix + article.prix_vente2)
            $("#modal_pv3").html(article.prix + article.prix_vente3)
            $("#modal_date").html(new Date(article.date_achat))
            $("#prix_input").val(commande.prix)
            $("#quantite_input").val(commande.quantity)

            $('#modal').modal()
        }

        const update = async () => {
            const id = $("#modal_cle").html()
            const prix = $("#prix_input").val()
            const quantity = $("#quantite_input").val()
            await axios.post(`commande-item/${id}`, {
                prix,
                quantity,
            });
            location.reload()

        }

        const delet = async (id) => {
            const prix = $("#prix_input").val()
            const quantity = $("#quantite_input").val()
            await axios.delete(`commande-item/${id}`);
            location.reload()
        }
        const validate = async (id) => {
            await  axios.post(`${id}/validate`)
            // location.reload()

        }
    </script>

@endsection
