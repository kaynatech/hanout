@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>
                    Ajouter Categorie
                </h1>
                <form role="form" method="post">
                    {{ csrf_field() }}

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Categorie</label>
                        <input type="text" class="form-control" name="nom" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Nom">
                        <small id="emailHelp" class="form-text text-muted">Nom Du categorie</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Niveau</label>
                        <select class="custom-select" id="select" name="level" onchange="reset_categorie()">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1"> Parent </label>
                        <select class="custom-select" id="parent" name="categorie_id">
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="avatar" />
                        <p class="help-block">{{ $errors->first('avatar') }}</p>
                    </div>


                    <button class="btn btn-success" type="submit"> Ajouter </button>

                </form>
            </div>
            <div class="col-md-4">
                <ul class="listree">
                    {{-- for each l1 --}}
                    @foreach ($level_one_categorie as $l1)
                        @if (sizeof($l1->children) > 0)
                            <li>
                                <div class="listree-submenu-heading">{{ $l1->nom }}</div>
                                <ul class="listree-submenu-items">
                                    {{-- for each l2 --}}
                                    @foreach ($l1->children as $l2)
                                        @if (sizeof($l2->children) > 0)
                                            <li>
                                                <div class="listree-submenu-heading">{{ $l2->nom }}</div>
                                                <ul class="listree-submenu-items">
                                                    {{-- for each l3 --}}
                                                    @foreach ($l2->children as $l3)
                                                        @if (sizeof($l3->children) > 0)
                                                            <li>
                                                                <div class="listree-submenu-heading">{{ $l3->nom }}
                                                                </div>
                                                                <ul class="listree-submenu-items">
                                                                    {{-- for each l4 --}}
                                                                    @foreach ($l3->children as $l4)
                                                                        @if (sizeof($l4->children) > 0)
                                                                            <li>
                                                                                <div class="listree-submenu-heading">
                                                                                    {{ $l4->nom }}
                                                                                </div>
                                                                                <ul class="listree-submenu-items">
                                                                                    {{-- for each l5 --}}
                                                                                    @foreach ($l4->children as $l5)

                                                                                        <li>
                                                                                            <span>{{ $l5->nom }}</span>
                                                                                        </li>

                                                                                    @endforeach
                                                                                    {{-- for each l4 --}}
                                                                                </ul>
                                                                            </li>
                                                                        @else
                                                                            <li>
                                                                                <span>{{ $l4->nom }}</span>
                                                                            </li>
                                                                        @endif
                                                                    @endforeach
                                                                    {{-- for each l4 --}}
                                                                </ul>
                                                            </li>
                                                        @else
                                                            <li>
                                                                <span>{{ $l3->nom }}</span>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                    {{-- for each l3 --}}
                                                </ul>
                                            </li>
                                        @else
                                            <li>
                                                <span>{{ $l2->nom }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                    {{-- for each l2 --}}

                                </ul>
                            </li>
                        @else
                            <li>
                                <span>{{ $l1->nom }}</span>
                            </li>
                        @endif
                    @endforeach
                    {{-- for each l1 --}}


                </ul>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

    <script>
        const categories = {!! json_encode($categories, JSON_HEX_TAG) !!};
        const reset_categorie = () => {
            const selected_cat = $("#select").val();
            console.log(selected_cat)
            if (selected_cat > 0) {
                $("#parent").html('');
                const parents = categories.filter((c) => c.level == selected_cat - 1)
                $.each(parents, function(index, cat) {
                    $("#parent").append($("<option></option>").attr("value", cat.id).text(cat.nom));
                });
            }
        }

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
    <script src="https://unpkg.com/listree/dist/listree.umd.min.js"></script>
    <script>
        listree();
    </script>

@endsection
