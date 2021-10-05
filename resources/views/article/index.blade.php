@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="input-group mb-3">
                    <input id="search1" type="text" class="form-control" placeholder="Search1" aria-label="Username"
                        aria-describedby="basic-addon1" onblur="search();">
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group mb-3">
                    <input id="search2" type="text" class="form-control" placeholder="Search2" aria-label="Username"
                        aria-describedby="basic-addon1" onblur="search();">
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group mb-3">
                    <input id="search3" type="text" class="form-control" placeholder="Search3" aria-label="Username"
                        aria-describedby="basic-addon1" onblur="search();">
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group mb-3">
                    <input id="code" type="text" class="form-control" placeholder="Code" aria-label="Username"
                        aria-describedby="basic-addon1" onblur="search();">
                </div>
            </div>
        </div>
        <div class="row ">
            <table class="table" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">cle</th>
                        <th scope="col">new cle</th>
                        <th scope="col">Proprietaire</th>
                        <th scope="col">Designiation</th>
                        <th scope="col">Category</th>
                        <th scope="col">Quanite</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody id="table">
                </tbody>
            </table>
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
                            <button onclick="add_vente_temp()" type="button" class="btn btn-default"
                                style="float:left;">Ajouter au Panier
                            </button>
                            <button type="button" class="btn btn-default" style="float:left;">Imprimer
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="declaration_modal">
            <div class="modal fade" id="modal_declaration" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" id="modal1_title"></h4>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Clé <span class="badge" id="modal1_cle"> 11</span>
                                </li>
                                <li class="list-group-item">
                                    Quantité Restante : <span id="modal1_quantite">12</span>
                                </li>
                                <li class="list-group-item">
                                    Prix Achat : <span id="modal1_prix"> 10 </span>
                                </li>
                                <li class="list-group-item">
                                    Date d `Achat <span class="badge" id="modal1_date">100</span>
                                </li>
                                Type de declaration:
                                <li class="list-group-item">
                                    <select class="custom-select" name="type_de_declaration" id="delaration_type">
                                        <option value="1">Perte</option>
                                        <option value="2">Trouver</option>
                                        <option value="3">Endomager</option>
                                    </select>
                                </li>
                                Quantité A Declarer:
                                <li class="list-group-item"><input id="declaration_quantity" type="number" value="1"
                                        class="form-control"></li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button onclick="declarer()" type="button" class="btn btn-default" style="float:left;">Declarer
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="achat_modal">
            <div class="modal fade" id="modal_achat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" id="modal1_title"></h4>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Clé <span class="badge" id="modal2_cle"> 11</span>
                                </li>
                                <li class="list-group-item">
                                    Quantité Restante : <span id="modal2_quantite">12</span>
                                </li>
                                <li class="list-group-item">
                                    Prix Achat : <span id="modal2_prix"> 10 </span>
                                </li>
                                <li class="list-group-item">
                                    Date d `Achat <span class="badge" id="modal1_date">100</span>
                                </li>
                                Fournisseaur
                                <li class="list-group-item">
                                    <select class="custom-select" name="fournisseur_id" id="fournisseur_id">
                                        @foreach ($fournisseurs as $fournisseur)
                                            <option value="{{ $fournisseur->id }}">
                                                {{ $fournisseur->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </li>
                                Prix Achat:
                                <li class="list-group-item"><input id="prix_achat" type="number" value="0"
                                        class="form-control"></li>
                                Quantite Achat:
                                <li class="list-group-item"><input id="quantite_achat" type="number" value="1"
                                        class="form-control"></li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button onclick="achat()" type="button" class="btn btn-default" style="float:left;">Declarer
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="rendu_modal">
            <div class="modal fade" id="modal_rendu" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" id="modal3_title"></h4>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    Clé <span class="badge" id="modal3_cle"> 11</span>
                                </li>
                                <li class="list-group-item">
                                    Quantité Restante : <span id="modal3_quantite">12</span>
                                </li>
                                <li class="list-group-item">
                                    Prix Achat : <span id="modal3_prix"> 10 </span>
                                </li>
                                <li class="list-group-item">
                                    Date d `Achat <span class="badge" id="modal1_date">100</span>
                                </li>
                                Prix:
                                <li class="list-group-item"><input id="rendu_prix" type="number" value="1"
                                        class="form-control"></li>
                                Quantité A rendu:
                                <li class="list-group-item"><input id="rendu_quantity" type="number" value="1"
                                        class="form-control"></li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button onclick="rendre()" type="button" class="btn btn-default" style="float:left;">rendre
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let articles
        let selected_article
        const search = async () => {
            $("#table").html(
                `
                    <div class="d-flex align-items-center">
                        <strong>Loading...</strong>
                        <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
                    </div>
                    `
            )
            const des1 = $('#search1').val()
            const des2 = $('#search2').val()
            const des3 = $('#search3').val()
            const code = $('#code').val()

            const {
                data
            } = await axios.get('/article/fetch', {
                params: {

                    designiation1: des1,
                    designiation2: des2,
                    designiation3: des3,
                    code,

                }
            })
            $("#table").html('')

            $("#table").html(data)

        }

        const open_model = (id) => {
            const article = articles.find((item) => item.id == id)
            selected_article = id
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
        }

        const declaration_modal = (id) => {
            const article = articles.find((item) => item.id == id)
            selected_article = id
            $('#modal1_title').html(article.designiation)
            $("#modal1_cle").html(article.id)
            $("#modal1_quantite").html(article.quantite)
            $("#modal1_prix").html(article.prix)
            $("#modal1_date").html(new Date(article.date_achat))

            $('#modal_declaration').modal()
        }

        const rendu_modal = (id) => {
            const article = articles.find((item) => item.id == id)
            selected_article = id
            $('#modal3_title').html(article.designiation)
            $("#modal3_cle").html(article.id)
            $("#modal3_quantite").html(article.quantite)
            $("#modal3_prix").html(article.prix)
            $("#modal3_date").html(new Date(article.date_achat))
            const prix = $("#rendu_prix").val(article.prix + article.prix_vente1)


            $('#modal_rendu').modal()
        }

        const achat_modal = (id) => {
            const article = articles.find((item) => item.id == id)
            selected_article = id
            $('#modal2_title').html(article.designiation)
            $("#modal2_cle").html(article.id)
            $("#modal2_quantite").html(article.quantite)
            $("#modal2_prix").html(article.prix)
            $("#modal2_date").html(new Date(article.date_achat))

            $('#modal_achat').modal()
        }

        const add_vente_temp = async () => {
            const prix = $("#prix_input").val()
            const quantite = $("#quantite_input").val()
            const { data } = await axios.post('vent-temp', {
                prix,
                quantite,
                total: prix * quantite,
                article_id: selected_article
            });
            $('#modal').modal('hide')
            await update_badge()
        }

        
        const rendre = async () => {
            const prix = $("#rendu_prix").val()
            const quantite = $("#rendu_quantity").val()
            const { data } = await axios.post('/declaration/rendu', {
                prix,
                quantite,
                total: prix * quantite,
                article_id: selected_article
            });
            $('#modal_rendu').modal('hide')
            await update_badge()
        }

        const declarer = async () => {
            const type = $("#delaration_type").val()
            const quantite = $('#declaration_quantity').val()
            let url

            if (type) {
                if (type == 1) {
                    url = '/declaration/perte'
                } else if (type == 2) {
                    url = '/declaration/trouver'

                } else if (type == 3) {
                    url = '/declaration/endomager'
                }
                const {
                    data
                } = axios.post(url, {
                    article_id: selected_article,
                    quantite,
                })

            }
        }

        const achat = async () => {
            const quantite = $('#quantite_achat').val()
            const prix_achat = $('#prix_achat').val()
            const fournisseur_id = $('#fournisseur_id').val()

            const { data } = await axios.post('/achat' , {
                quantite ,
                prix_achat ,
                fournisseur_id ,
                quantite,
                article_id :selected_article
            })
            $('#modal_achat').modal('hide')


        }
    </script>
@endsection
