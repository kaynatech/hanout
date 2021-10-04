<table class="table" style="width : 100%">
    <thead>
        <tr>
            <th scope="col">Cle</th>
            <th scope="col">Designiation</th>
            <th scope="col">Quantite</th>
            <th scope="col">Prix achat</th>
            <th scope="col">Gaint</th>
            <th scope="col">Prix Vente</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ventes as $vente)
            <tr>
                <th scope="row">{{ $vente->id }}</th>
                <td>{{ $vente->article->designiation }}</td>
                <td>{{ $vente->quantite }}</td>
                <td>{{ $vente->article->prix }}</td>
                <td>{{ $vente->gain }}</td>
                <td>{{ $vente->total }}</td>
            </tr>
        @endforeach
        <tr>
            <th scope="row"></th>
            <td>
                <h1>
                    Tottal
                </h1>
            </td>
            <td>{{ $ventes->sum('quantite') }}</td>
            <td></td>
            <td>{{ $ventes->sum('gain') }}</td>
            <td>
                <h2>
                    {{ $ventes->sum('total') }}
                </h2>
            </td>
        </tr>
    </tbody>
</table>
