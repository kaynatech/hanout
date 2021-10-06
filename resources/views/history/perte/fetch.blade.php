<table class="table" style="width : 100%">
    <thead>
        <tr>
            <th scope="col">Cle</th>
            <th scope="col">Designiation</th>
            <th scope="col">Quantite</th>
            <th scope="col">User</th>
            <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pertes as $perte)
            <tr>
                <th scope="row">{{ $perte->article->id }}</th>
                <td>{{ $perte->article->designiation }}</td>
                <td>{{ $perte->quantite }}</td>
                <td>{{ $perte->user->name }}</td>
                <td>{{ $perte->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
