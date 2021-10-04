@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <input id="search" type="text" class="form-control" placeholder="Search1" aria-label="Username"
                        aria-describedby="basic-addon1" onblur="search();">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <input id="search2" type="text" class="form-control" placeholder="Search2" aria-label="Username"
                        aria-describedby="basic-addon1" onblur="search();">
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group mb-3">
                    <select class="custom-select" id="select">
                        <option selected value="0">All</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                    </select>
                </div>
            </div>
        </div>
        <div class="row ">
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th scope="col">Cle</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Niveau</th>
                        <th scope="col">Numero des article</th>
                        <th scope="col">Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $categorie)
                        <tr>
                            <th scope="row">{{ $categorie->custom_id }}</th>
                            <td>{{ $categorie->nom }}</td>
                            <td>{{ $categorie->level }}</td>
                            <td>{{ $categorie->articles_count }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-info"
                                            href="{{ route('edit_categorie', ['id' => $categorie->id]) }}">Modifier</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-danger" onclick="del({{ $categorie->id }})">Delete</a>
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
        const search = async () => {
            const nom = $("#search").val();
            const level = $("#select").val();
            const {
                data
            } = await axios.get("/categorie/fetch", {
                params: {
                    nom,
                    level,
                },
            });
            $("#table").html("");
            $("#table").html(data);
        };

        const del = async (id) => {
            try {
                if(confirm("Voulez vous vraiment suprimer ?")){
                    const {data} = await  axios.delete(`/categorie/delete/${id}`);
                }
                location.reload();
            } catch (error) {
                console.log({error})
            }
        };
    </script>
@endsection
