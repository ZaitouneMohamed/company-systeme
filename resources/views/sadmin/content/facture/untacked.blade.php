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
                    <td>{{$item->fournisseur->name}}</td>
                    <td>{{$item->benefice}}</td>
                    <td>{{$item->avance}}</td>
                    <td>{{$item->mode}}</td>
                    <td>
                        <button class="btn btn-success">update</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

