@extends('sadmin.master')

@section("content")

@if ($data->count() == 0)
    No bon here <a href="" class="btn btn-primary">Click Bon Add Bon Here</a>
@else
    <div class="table-responsive" x-data="{open : false}">
        <center>
            <button class="btn btn-primary" @click="open = !open">click me</button>
        </center>
        <table class="table table-bordered" id="dataTable" x-show="open" x-transition width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>montaneet</th>
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
                            <form action="{{route('sadmin.add_bon_to_suivi',$item->id)}}" method="POST">
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
@endif
<div class="text-center">
    <h1>Bon List</h1>
    <div class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3">
        @foreach ($my_data as $item)
            <div class="col">
                <div class="p-3 border bg-light">
                    <h5 class="card-title">montant : {{$item->montant}}</h5>
                    <p class="card-text">Reste : {{$item->Reste}}</p>
                    <p class="card-text">Fornisseur : {{$item->fournisseur->nom}}</p>
                    <p class="card-text">Avance :{{$item->avance}}</p>
                    <p class="card-text">Avance :{{$item->benefice}}</p>
                    <p class="card-text">mode : {{$item->mode}}</p>
                    <form action="{{route('sadmin.remove.bon')}}" method="POST">
                        @method("delete")
                        @csrf
                        <input type="hidden" name="b_id" value="{{$item->id}}">
                        <input class="btn btn-danger" type="submit" value="Delete">
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

