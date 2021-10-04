@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Distribution tottal</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="" id="chart"></div>
                            </div>
                            <div class="col-md-8">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Tottal Article</th>
                                            <th scope="col">Caise</th>
                                            <th scope="col">total</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($caisses as $key => $caisse)
                                            <tr>
                                                <th scope="row">{{ $key }}</th>
                                                <td>{{ $caisse['user'] }}</td>
                                                <td>{{ $caisse['tottal_article'] }}</td>
                                                <td>{{ $caisse['caisse']->valeur }}</td>
                                                <td>{{ $caisse['caisse']->valeur + $caisse['tottal_article'] }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th scope="row">total</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $tottal }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($caisses as $caisse)

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $caisse['user'] }}</h5>

                            <div class="row">
                                <div class="col-md-4">
                                    <div id="chart{{ $caisse['id'] }}"></div>
                                </div>
                                <div class="col-md-8">
                                    <button type="button" class="btn btn-primary" onclick="caisse_modal({{ $caisse['id'] }})" >Changer La caise</button>
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">\type</th>
                                                <th scope="col">Changement</th>
                                                <th scope="col">Valeur avant changement</th>
                                                <th scope="col">Valeur apres changement</th>
                                                <th scope="col">changer par</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($caisse['historique']->take(5) as $key => $element)
                                                <tr>
                                                    <th scope="row">{{ $element->type }}</th>
                                                    <td>{{ $element->changement }}</td>
                                                    <td>{{ $element->valeur -  $element->changement }}</td>
                                                    <td>{{ $element->valeur }}</td>
                                                    <td>{{ $element->changeur->name }}</td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

        <div id="declaration_modal">
            <div class="modal fade" id="modal_achat" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" id="modal1_title"></h4>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group">

                                Type de Changement:
                                <li class="list-group-item">
                                    <select class="custom-select" name="type" id="type">
                                        <option >Ajouter</option>
                                        <option >Enlever</option>
                                    </select>
                                </li>
                                Somme  de changement:
                                <li class="list-group-item"><input id="changement" type="number" value="1"
                                        class="form-control"></li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button onclick="changer_caise()" type="button" class="btn btn-default" style="float:left;">Changer
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const caisses = {!! json_encode($caisses, JSON_HEX_TAG) !!};

        const series = caisses.map(({
            tottal_article,
            caisse
        }) => tottal_article + caisse.valeur)
        const labels = caisses.map(({
            user
        }) => user)




        var option = {
            series,
            chart: {
                width: 380,
                type: 'pie',
            },
            labels,
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        setTimeout(() => {
            var chart = new ApexCharts(document.querySelector("#chart"), option);
            chart.render();
            const options = caisses.map((caise) => ({
                id: caise.id,
                option: {
                    series: [caise.tottal_article, caise.caisse.valeur],
                    chart: {
                        width: 380,
                        type: 'pie',
                    },
                    labels: ["article en stock", "caisse"],
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                }
            }))
            const charts = options.forEach((option) => {
                console.log(option)
                const chart = new ApexCharts(document.querySelector(`#chart${option.id}`), option.option);
                chart.render()
            })
        }, 400);


        let selected_caisse 
        const caisse_modal = (id) => {
            const caises = caisses.find((item) => item.id == id)
            selected_caisse = id
            $('#modal1_title').html(caises.user)
            $('#modal_achat').modal()
        }

        const changer_caise = async () => {
            const type = $("#type").val()
            const val = $('#changement').val()
            
            const changement = type ==  'Enlever' ? - val : + val
            const { data } = await axios.post('/caise' , {
            user_id : selected_caisse ,
            type : 'changement',
            changement,
            })
            $('#modal_achat').modal('hide')
            location.reload()
        }
    </script>

@endsection
