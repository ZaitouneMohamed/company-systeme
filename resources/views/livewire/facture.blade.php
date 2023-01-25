<div class="container" x-data="{open : false}">
    @include("sadmin.content.includes.buttons")
    <br>
    <div x-show="open" x-transition>
        <h1 class="text text-center">Add Facture</h1>
        <form wire:submit.prevent="add">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">montant :</label>
                <input type="number" class="form-control" wire:model="montant">
                {{-- @error('prix_HT') <span class="test text-danger">{{ $message }}</span> @enderror --}}
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">reste :</label>
                <input type="number" class="form-control" wire:model="reste">
                {{-- @error('prix_TTC') <span class="test text-danger">{{ $message }}</span> @enderror --}}
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fournisseurs :</label>
                <select class="form-control" wire:model="fournisseur">
                    <option value=""></option>
                    @foreach ($fournisseurs as $item)
                        <option value="{{$item->id}}">{{$item->nom}}</option>
                    @endforeach
                </select>
                {{-- @error('user') <span class="test text-danger">{{ $message }}</span> @enderror --}}
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">benefice :</label>
                <input type="text" class="form-control" wire:model="benefice">
                {{-- @error('password') <span class="test text-danger">{{ $message }}</span> @enderror --}}
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">avance :</label>
                <input type="number" class="form-control" wire:model="avance">
                {{-- @error('lien') <span class="test text-danger">{{ $message }}</span> @enderror --}}
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">mode :</label>
                <input type="text" class="form-control" wire:model="mode">
                {{-- @error('lien') <span class="test text-danger">{{ $message }}</span> @enderror --}}
            </div>
            @if ($editing)
                <a type="button" wire:click="update()" class="btn btn-warning">update</a>
                <a class="btn btn-danger" type="button" wire:click="cancel()">cancel</a>
            @else
                <button type="submit" class="btn btn-primary">submit</button>
            @endif
        </form>
    </div>
    <div x-show="!open" x-transition>
        <h1 class="text text-center">Factures list</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">montant</th>
                <th scope="col">Reste</th>
                <th scope="col">Fournisseur</th>
                <th scope="col">activite suivi</th>
                <th scope="col">benefice</th>
                <th scope="col">avance</th>
                <th scope="col">mode</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{$item->montant}}</td>
                        <td>{{$item->Reste}}</td>
                        <td>{{$item->fournisseur->nom}}</th>
                        <td>
                            @if ($item->suivi_id)
                                {{$item->suivi->activite}}
                            @else
                                no suivi here
                            @endif
                        </th>
                        <td>{{$item->benefice}}</td>
                        <td>{{$item->avance}}</th>
                        <td>{{$item->mode}}</th>
                        <td>
                            <button wire:click="get_one({{$item->id}})" class="btn btn-warning">Update</button>
                            <button wire:click="delete({{$item->id}})" class="btn btn-danger">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
