<table class="table" style="width : 100%">
    <thead>
        <tr>
            <th scope="col">Cle</th>
            <th scope="col">User</th>
            <th scope="col">Quantite</th>
            <th scope="col">Action</th>
            <th scope="col">Date</th>
            <th > Verifier le</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($inventaires as $inventaire)
            <tr>
                <th scope="row">{{ $inventaire->id }}</th>
                <td>{{ $inventaire->user->name }}</td>
                <td>{{ $inventaire->quantite }}</td>
                <td>{{ $inventaire->type }}</td>
                <td>{{ $inventaire->created_at }}</td>
                <td>{{ $inventaire->valide ?  $inventaire->updated_at : 'non valide' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
