@extends('sadmin.master')

@section("content")
<div class="table-responsive" x-data="{open : false}">
    <center>
        <button class="btn btn-primary" @click="open = true">show</button>
        <button class="btn btn-primary" @click="open = false">hide</button>
    </center>
    <table class="table table-bordered" x-show="open" id="dataTable" width="100%" cellspacing="0" x-transition>
        <thead>
            <tr>
                <th>montant</th>
                <th>Reste</th>
                <th>fournisseur</th>
                <th>benefice</th>
                <th>avance</th>
                <th>mode</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->montant}}</td>
                    <td>{{$item->Reste}}</td>
                    <td>{{$item->fournisseur->nom}}</td>
                    <td>{{$item->benefice}}</td>
                    <td>{{$item->avance}}</td>
                    <td>{{$item->mode}}</td>
                    <td>
                        <form action="{{route('sadmin.add_facture_to_suivi',$item->id)}}" method="POST">
                            @method("POST")
                            @csrf
                            <input type="hidden" name="suivi_id" value="{{$suivi->id}}">
                            <input class="btn btn-primary" type="submit" value="Take It">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

  <div class="text-center">
            <h1>Facture List <span>{{$my_data->count() ? $my_data->sum('montant') - $my_data->sum('Reste') : null}}</span></h1>
            <div class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3">
                @foreach ($my_data as $item)
                    <div class="col">
                        <div class="p-3 border bg-light">
                            <h5 class="card-title">montant : {{$item->montant}}</h5>
                            <p class="card-text">Reste : {{$item->Reste}}</p>
                            <p class="card-text">Fornisseur : {{$item->fournisseur->nom}}</p>
                            <p class="card-text">Avance :{{$item->avance}}</p>
                            <p class="card-text">mode : {{$item->mode}}</p>
                            <form action="{{route('sadmin.remove.facture')}}" method="POST">
                                @method("delete")
                                @csrf
                                <input type="hidden" name="f_id" value="{{$item->id}}">
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
@endsection

