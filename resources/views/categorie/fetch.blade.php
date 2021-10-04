<table class="table">
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
              <td>{{ $categorie->articles_count}}</td>
              <td>
                  <a class="btn btn-info" href="{{route("edit_categorie", ['id' => $categorie->id ])}}">Modifier</a>
              </td>

          </tr>
      @endforeach
  </tbody>
</table>