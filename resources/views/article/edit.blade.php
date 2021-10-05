@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1>
                Modifier Article
            </h1>
            <form role="form" method="post" >
                {{ csrf_field() }}
                @method('put')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Designiation</label>
                        <input type="text" class="form-control" name="nom" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="Nom" value="{{ $article->designiation }}">
                        <small id="emailHelp" class="form-text text-muted">Nom Du Produit</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">ID</label>
                        <input type="text" class="form-control" name="id" 
                               aria-describedby="emailHelp" placeholder="Cle" value="{{ $article->id }}">
                        <small id="emailHelp" class="form-text text-muted">Cle du produit (optionel)</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">proprietaire</label>
                        <select class="form-select form-control" id="select" name="user_id">
                            <option value="{{ $article->proprietaire->id }}">{{ $article->proprietaire->name }}</option>
                            @foreach ($users as  $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <small id="emailHelp" class="form-text text-muted">Cle du produit (optionel)</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Quantite</label>
                        <input type="text" class="form-control" name="quantite" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="quantite" value="{{ $article->quantite }}">
                        <small id="emailHelp" class="form-text text-muted">Quantite </small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Code Bar</label>
                        <input type="text" class="form-control" name="codebar" id="exampleInputEmail1"
                               aria-describedby="emailHelp"  value="{{ $article->codebar }}">
                        <small id="emailHelp" class="form-text text-muted">Code Bar (optionel)</small>
                    </div>
                    <div class="form-group col-md-6"></div>


                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Marge 1</label>
                        <input type="text" class="form-control" name="marge1" id="exampleInputEmail1"
                               aria-describedby="emailHelp" value="{{ $article->prix_vente1 }}">
                        <small id="emailHelp" class="form-text text-muted">Marge de gain 1</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Marge 2</label>
                        <input type="text" class="form-control" name="marge2" id="exampleInputEmail1"
                               aria-describedby="emailHelp" value="{{ $article->prix_vente2 }}">
                        <small id="emailHelp" class="form-text text-muted">Marge de gain 2</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Marge 3</label>
                        <input type="text" class="form-control" name="marge3" id="exampleInputEmail1"
                               aria-describedby="emailHelp" value="{{ $article->prix_vente3 }}">
                        <small id="emailHelp" class="form-text text-muted">Marge de gain 3</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Seuil 1</label>
                        <input type="text" class="form-control" name="seuil1" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="" value="{{ $article->seuil1 }}">
                        <small id="emailHelp" class="form-text text-muted">seuil 1</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Seuil 2</label>
                        <input type="text" class="form-control" name="seuil2" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="" value="{{ $article->seuil2 }}">
                        <small id="emailHelp" class="form-text text-muted">seuil 2</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Seuil 3</label>
                        <input type="text" class="form-control" name="seuil3" id="exampleInputEmail1"
                               aria-describedby="emailHelp" value="{{ $article->seuil3 }}">
                        <small id="emailHelp" class="form-text text-muted">seuil 3</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Niveau</label>
                        <select class="custom-select" id="selectNiveau" name="level" onchange="reset_categorie()"  >
                        @if($article->categorie)
                            <option value="{{ $article->categorie->level }}" >{{ $article->categorie->level }}</option>
                        @endif
                            <option value="1" >1</option>
                            <option value="2" >2</option>
                            <option value="3" >3</option>
                            <option value="4" >4</option>
                            <option value="5" >5</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> Categorie </label>
                        <select class="custom-select" id="parent" name="categorie_id">
                        @if($article->categorie)
                            <option value="{{ $article->categorie->id }}">{{ $article->categorie->nom }}</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-md-6 media" >
                        <img src="{{ $imageUrl }}" class="mr-3" alt="image" style="width: 100%" />
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="avatar"/>
                        <p class="help-block">{{ $errors->first('avatar') }}</p>
                    </div>


                    <button style="width : 100%" class="btn btn-success" type="submit"> Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

<script>
    const categories = {!! json_encode($categories, JSON_HEX_TAG) !!};
    const reset_categorie = () => {
        const selected_cat = $("#selectNiveau").val();
        console.log(selected_cat)
        if (selected_cat > 0) {
            $("#parent").html('');
            const parents = categories.filter((c) => c.level == selected_cat )
            $.each(parents, function(index, cat) {
                $("#parent").append($("<option></option>").attr("value", cat.id).text(`${cat.custom_id} ${cat.nom}`));
            });
        }
    }
    reset_categorie()

    FilePond.setOptions({
        server: {
            process: "{{ config('filepond.server.process') }}",
            revert: "{{ config('filepond.server.revert') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ @csrf_token() }}",
            }
        }
    });

    // Create the FilePond instance
    FilePond.create(document.querySelector('input[name="avatar"]'));
</script>
<script>
    listree();
</script>

@endsection
