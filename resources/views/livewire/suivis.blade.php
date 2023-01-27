<div class="container" x-data="{open : false}">
    @include("sadmin.content.includes.buttons")
    <div x-show="open" x-transition>
        <h1 class="text text-center">Add New Suivis </h1>
        <form wire:submit.prevent="add" >
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Service :</label>
                <input type="text" wire:model="service" class="form-control" id="recipient-name">
                {{-- @error('prix_HT') <span class="test text-danger">{{ $message }}</span> @enderror --}}
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">activite :</label>
                <input type="text" wire:model="activite" class="form-control" id="recipient-name">
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">nom societe:</label>
                <input type="text" wire:model="nom_societe" class="form-control" id="recipient-name">
                {{-- @error('m_p') <span class="test text-danger">{{ $message }}</span> @enderror --}}
            </div>
            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">secteur:</label>
                <input type="text" wire:model="secteur" class="form-control" id="recipient-name">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">categorie:</label>
                <input type="text" wire:model="categorie" class="form-control" id="recipient-name">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">besoin:</label>
                <input type="text" wire:model="besoin" class="form-control" id="recipient-name">
              </div>
                @if ($editing)
                    <a type="button" wire:click="update()" class="btn btn-warning">update</a>
                    <a class="btn btn-danger" type="button" wire:click="cancel()">cancel</a>
                @else
                    <button type="submit" class="btn btn-primary">submit</button>
                @endif
        </form>
    </div>
    <div class="table-responsive">
        <div x-show="!open" x-transition>
            <h1 class="text text-center">Suivis List</h1>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>service</th>
                        <th>activite</th>
                        <th>nom societe</th>
                        <th>secteur</th>
                        <th>categiorrie</th>
                        <th>besoin</th>
                        <th>calcul</th>
                        <th>bons count</th>
                        <th>facture count</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$item->service}}</td>
                            <td>{{$item->activite}}</td>
                            <td>{{$item->nom_societe}}</td>
                            <td>{{$item->Secteur}}</td>
                            <td>{{$item->categorie}}</td>
                            <td>{{$item->besoin}}</td>
                            <td>
                                @if ($item->facture->count())
                                    {{ $item->facture->sum('montant') - $item->facture->sum('Reste') }}
                                @else
                                    <a href="{{route('sadmin.untacked_factures',$item->id)}}" class="btn btn-success">add facture</a>
                                @endif
                                {{-- {{ $item->facture->count() ? $item->facture->sum('montant') - $item->facture->sum('Reste') : null }} --}}
                            </td>
                            <td> {{$item->bon->count()}} </td>
                            <td>{{$item->facture->count()}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      Dropdown
                                    </button>
                                    <ul class="dropdown-menu">
                                        {{-- @if ($item->bon_id)
                                            <li><button wire:click="delete_bon({{$item->id}})" class="dropdown-item" type="button">delete bon</button></li>
                                        @endif --}}
                                        <li><button class="dropdown-item" wire:click="get_one({{$item->id}})" type="button">update</button></li>
                                        <li><a href="{{route('sadmin.untacked_factures',$item->id)}}" class="dropdown-item" type="button">Factures</a></li>
                                        <li><a href="{{route('sadmin.untacked_bons',$item->id)}}" class="dropdown-item" type="button">bons</a></li>
                                        {{-- @if ($item->facture_id)
                                            <li><button class="dropdown-item" type="button" wire:click="delete_facture({{$item->id}})">delete facture</button></li> --}}
                                            <li><a href="{{route('sadmin.suivi.pdf',$item->id)}}" class="dropdown-item" type="button"><i class="bi bi-file-pdf"></i> PDF</a></li>
                                        {{-- @endif --}}
                                        <li><button class="dropdown-item" wire:click="delete({{$item->id}})" type="button">Delete</button></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

