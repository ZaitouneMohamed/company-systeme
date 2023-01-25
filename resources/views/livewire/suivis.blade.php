<div class="container">

    <button></button>

    <h1 class="text text-center">Suivis List</h1>
    <form wire:submit.prevent="add">
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
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>service</th>
                    <th>activite</th>
                    <th>facture</th>
                    <th>nom_societe</th>
                    <th>secteur</th>
                    <th>categiorrie</th>
                    <th>besoin</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{$item->service}}</td>
                        <td>{{$item->activite}}</td>
                        <td>
                            @if ($item->facture_id)
                                {{$item->facture_id}}
                            @else
                                <a href="" class="btn btn-warning">add facture</a>
                            @endif
                        </td>
                        <td>{{$item->nom_societe}}</td>
                        <td>{{$item->Secteur}}</td>
                        <td>{{$item->categorie}}</td>
                        <td>{{$item->besoin}}</td>
                        <td>
                            <button class="btn btn-warning">update</button>
                            <button class="btn btn-danger">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div x-data="{ open: false }">
        <button @click="open = true">Expand</button>

        <span x-show="open">
          Content...
        </span>
    </div>

</div>

