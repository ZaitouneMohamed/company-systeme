@extends('user.master')

@section('content')
<div x-data="{ open: false }">
    <center>
        <button class="btn btn-primary" @click="open = true">Factures</button>
        <button class="btn btn-primary" @click="open = false">Bons</button>
    </center>
    <div class="text-center" x-show="open" x-transition>
        <h1>My Factures <span>{{$factures->count() }}</span></h1>
        <div class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3">
            @foreach ($factures as $item)
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h5 class="card-title">montant : {{$item->montant}}</h5>
                        <p class="card-text">Reste : {{$item->Reste}}</p>
                        <p class="card-text">Fornisseur : {{$item->fournisseur->nom}}</p>
                        <p class="card-text">Avance :{{$item->avance}}</p>
                        <p class="card-text">mode : {{$item->mode}}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="text-center" x-show="!open" x-transition>
        <h1>My Bons <span>{{$bons->count() }}</span></h1>
        <div class="row row-cols-1 row-cols-lg-3 g-2 g-lg-3">
            @foreach ($bons as $item)
                <div class="col">
                    <div class="p-3 border bg-light">
                        <h5 class="card-title">montant : {{$item->montant}}</h5>
                        <p class="card-text">Reste : {{$item->Reste}}</p>
                        <p class="card-text">Fornisseur : {{$item->fournisseur->nom}}</p>
                        <p class="card-text">Avance :{{$item->avance}}</p>
                        <p class="card-text">mode : {{$item->mode}}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
 @endsection
