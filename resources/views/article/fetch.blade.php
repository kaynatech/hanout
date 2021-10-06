@foreach ($articles as $article)
    <tr>
        <th scope="row">{{ $article->id }}</th>
        <th scope="row">{{ $article->custom_id }}</th>
        <th scope="row">{{ $article->proprietaire->name }}</th>


        <td>{{ $article->designiation }}</td>
        <td>
            @if ($article->categorie)
                {{ $article->categorie->nom }}
            @endif
        </td>
        <td>{{ $article->quantite }}</td>
        <td>{{ $article->prix }}</td>
        <td>
            <div class="row">
                <div class="col-md-3">
                    <button type="button" onclick="open_model({{ $article->id }})" class="btn btn-secondary">
                        <i class="bi bi-basket"></i>
                    </button>
                </div>
                <div class="col-md-3">
                    <a type="button" href="{{ route('edit_article', ['id' => $article->id]) }}"
                        class="btn btn-secondary">
                        <i class="bi bi-pencil"></i>
                        </i>
                    </a>
                </div>
                <div class="col-md-3">
                    <div class="dropdown">
                        
                        <button class="btn btn-secondary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" onclick="achat_modal({{ $article->id }})" href="#">Nouveux Achat</a>
                          <a class="dropdown-item" onclick="declaration_modal({{ $article->id }})" href="#">Declaration</a>
                          <a class="dropdown-item" onclick="rendu_modal({{ $article->id }})" href="#">Rendu</a>
                          <a class="dropdown-item" href="{{ route('article_stat' , ['id' => $article->id])}}">stat</a>
                        </div>
                      </div>
                </div>
            </div>
        </td>
    </tr>
@endforeach




<script>
    articles = {!! json_encode($articles, JSON_HEX_TAG) !!};
</script>
