@extends('layouts.app')

<script src="{{ asset('js/html2pdf.min.js')}}"></script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">cle</th>
                    <th scope="col">Designiation</th>
                    <th scope="col">Quanite</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventes_temp as $key => $vente)
                <tr>
                    <th scope="row">{{  $key + 1 }}</th>
                    <td>{{ $vente->article->designiation }}</td>
                    <td>{{ $vente->quantite }}</td>
                    <td>{{$vente->prix}}</td>
                    <td>{{$vente->total }}</td>

                    <td>
                        <button type="button" class="btn btn-danger">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> 
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-2">
            <h1> Tottal : </h1>
        </div>
        <div class="col-md-4">
            <h1>
                {{ $sum }} DA
            </h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <button onclick="validate()" style="width: 100%" type="button" class="btn btn-success">
                Valider
            </button>
        </div>
    </div>
</div>
@endsection

<script>
const validate = async () => {
    const { data } = await axios.post('/vent');
    


    const pdfObj = await html2pdf().from(data).toPdf().get('pdf');


    pdfObj.autoPrint();
    window.open(pdfObj.output('bloburl'), '_blank');

}
</script>
