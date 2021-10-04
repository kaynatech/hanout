@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                Article Id
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="ArticleId" onblur="fetchWithId()">
            </div>
            <div class="col-md-3">
                Fournisseu Article
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="FournisseuArticleId" onblur="fetchFournissseurWithId()">
            </div>
        </div>
        <div class="row" style="width : 100%">
            <div class="" id=" table" style="width : 100%">
                <table class="table" style="width : 100%">
                    <thead>
                        <tr>
                            <th scope="col">Cle</th>
                            <th scope="col">Cle fournisseur</th>
                            <th scope="col">Designiation</th>
                            <th scope="col">Quantite</th>
                            <th scope="col">Prix achat</th>
                            <th scope="col">Tottal</th>
                            <th scope="col"> action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($achats as $achat)
                            <tr>
                                <th scope="row">{{ $achat->article->id }}</th>
                                <td>{{ $achat->fournisseur_article_id }}</td>
                                <td>{{ $achat->article->designiation }}</td>
                                <td>{{ $achat->quantite }}</td>
                                <td>{{ $achat->prix_achat }}</td>
                                <td>{{ $achat->total }}</td>
                                <td><a class="btn btn-danger" href="{{ route('delete_achat' , ['id' => $achat->id ])}}"> Delete</a></td>
                            </tr>
                        @endforeach
                        <tr>
                            <th scope="row"></th>
                            <td>
                                <h1>
                                    Tottal
                                </h1>
                            </td>
                            <td></td>
                            <td>{{ $achats->sum('quantite') }}</td>
                            <td></td>
                            <td>
                                <h2>
                                    {{ $achats->sum('total') }}
                                </h2>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-3">
                @if ($facture->valide == 0)
                <button  class="btn btn-success" onclick="validate()">Valide</button>
                @else
                <button  class="btn btn-success" disabled >deja valide</button>
                @endif
            </div>
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
                            <li class="list-group-item">Date d `Achat <span class="badge"
                                    id="modal_date">100</span></li>
                            Fournisseur article id :
                            <li class="list-group-item"><input id="fournisseu_article_id_input" type="number" value="1"
                                    class="form-control"></li>
                            Quantité Achat:
                            <li class="list-group-item"><input id="quantite_input" type="number" value="1"
                                    class="form-control"></li>
                            Prix Achat:
                            <li class="list-group-item"><input id="prix_input" type="number" class="form-control">
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button onclick="Achat()" type="button" class="btn btn-default" style="float:left;">Achat
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const fetchWithId = async () => {
            console.log('ss')
            try {
                const id = $('#ArticleId').val()
                const {
                    data: article
                } = await axios.post('{!! route('fetch_with_id_article') !!}', {
                    id
                })
                selected_article = article.id
                $('#modal_title').html(article.designiation)
                $("#modal_cle").html(article.id)
                $("#modal_quantite").html(article.quantite)
                $("#modal_prix").html(article.prix)
                $("#modal_pv1").html(article.prix + article.prix_vente1)
                $("#modal_pv2").html(article.prix + article.prix_vente2)
                $("#modal_pv3").html(article.prix + article.prix_vente3)
                $("#modal_date").html(new Date(article.date_achat))
                const prix = $("#prix_input").val(article.prix + article.prix_vente1)

                $('#modal').modal()
            } catch (error) {

            }
        }

        const fetchFournissseurWithId = async () => {
            try {
                const id = $('#FournisseuArticleId').val();
                const fournisseurId = {{ $fournisseur_id }};
                const {
                    data: article
                } = await axios.post('{!! route('fetchArticleWithFournisseurId') !!}', {
                    id,
                    fournisseur_id : `${fournisseurId}`
                })
                selected_article = article.id
                $('#modal_title').html(article.designiation)
                $("#modal_cle").html(article.id)
                $("#modal_quantite").html(article.quantite)
                $("#modal_prix").html(article.prix)
                $("#modal_pv1").html(article.prix + article.prix_vente1)
                $("#modal_pv2").html(article.prix + article.prix_vente2)
                $("#modal_pv3").html(article.prix + article.prix_vente3)
                $("#modal_date").html(new Date(article.date_achat))
                const prix = $("#prix_input").val(article.prix + article.prix_vente1)

                $('#modal').modal()
            } catch (error) {

            }
        }

        const Achat = async () => {
            try {
                const { data } = await axios.post('{ route("add_achat")}' , {
                    article_id : $('#modal_cle').html() ,
                    quantite : $('#quantite_input').val() ,
                    fournisseur_id : {{ $fournisseur_id }} ,
                    facture_achat_id : {{ $id }},
                    prix_achat :  $('#prix_input').val()  ,
                })
                $('#modal').modal('hide')
                location.reload()
            } catch (error) {
                
            }
        }

        const validate = async () => {
            try {
                const { data } = await axios.post('{!! route("validate_facture_achat" , ["id" => $id ])  !!}')
            } catch (error) {
                
            }
        }
    </script>

@endsection
