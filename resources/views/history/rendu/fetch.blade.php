<table class="table" style="width : 100%">
    <thead>
        <tr>
            <th scope="col">Cle</th>
            <th scope="col">Designiation</th>
            <th scope="col">Quantite</th>
            <th scope="col">Prix achat</th>
            <th scope="col">Gaint</th>
            <th scope="col">Prix rendu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rendus as $rendu)
            <tr>
                <th scope="row">{{ $rendu->id }}</th>
                <td>{{ $rendu->article->designiation }}</td>
                <td>{{ $rendu->quantite }}</td>
                <td>{{ $rendu->article->prix }}</td>
                <td>{{ $rendu->gain }}</td>
                <td>{{ $rendu->total }}</td>
            </tr>
        @endforeach
        <tr>
            <th scope="row"></th>
            <td>
                <h1>
                    Tottal
                </h1>
            </td>
            <td>{{ $rendus->sum('quantite') }}</td>
            <td></td>
            <td>{{ $rendus->sum('gain') }}</td>
            <td>
                <h2>
                    {{ $rendus->sum('total') }}
                </h2>
            </td>
        </tr>
    </tbody>
</table>
