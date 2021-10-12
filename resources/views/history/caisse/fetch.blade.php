<table class="table" style="width : 100%">
    <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Caisse</th>
            <th scope="col">Stock</th>
            <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($caisses as $caisse)
            <tr>
                <th scope="row">{{ $caisse->created_at }}</th>
                <td>{{ $caisse->valeur }}</td>
                <td>{{ $caisse->valeur_articles }}</td>
                <td>{{ $caisse->valeur_articles + $caisse->valeur  }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
