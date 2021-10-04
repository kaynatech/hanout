@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="row">
           <div class="col-md-6">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select id="select" class="form-control" id="exampleFormControlSelect1">
                  @foreach ($fournisseurs as $f )
                      <option value="{{ $f->id}}">{{ $f->nom }}</option>
                  @endforeach
                </select>
              </div>
           </div>
           <div class="col-md-6">
               <div class="button btn btn-success" onclick="create()">
                   create
               </div>
           </div>
       </div>
    </div>
    <script>
        const route = '{!! route('edit_facture_achat' , ['id' => 1]) !!}'; 

        const create = async () => {
            const { data } = await axios.post('' , {
                fournisseur_id : $('#select').val()
            })
            const newRoute = route.replace('1' , data)
            location.href = newRoute ;
            
        }
    </script>

@endsection
