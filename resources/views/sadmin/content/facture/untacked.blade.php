@extends('sadmin.master')

@section("content")
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
@endsection

