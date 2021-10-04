<table class="table" style="width : 100%">
    <thead>
        <tr>
            <th scope="col">Cle</th>
            <th scope="col">Designiation</th>
            <th scope="col">Quantite</th>
            <th scope="col">Prix achat</th>
            <th scope="col">total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($achats as $achat)
            <tr>
                <th scope="row">{{ $achat->article->id }}</th>
                <td>{{ $achat->article->designiation }}</td>
                <td>{{ $achat->quantite }}</td>
                <td>{{ $achat->prix_achat }}</td>
                <td>{{ $achat->total }}</td>
            </tr>
        @endforeach
        <tr>
            <th scope="row"></th>
            <td>
                <h1>
                    Tottal
                </h1>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <h2>
                    {{ $achats->sum('total') }}
                </h2>
            </td>
        </tr>
    </tbody>
</table>
