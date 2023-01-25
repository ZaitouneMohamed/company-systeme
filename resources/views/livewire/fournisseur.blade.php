<div class="container">
    <form wire:submit.prevent="add">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prix HT :</label>
            <input type="number" class="form-control" wire:model="prix_HT">
            {{-- @error('prix_HT') <span class="test text-danger">{{ $message }}</span> @enderror --}}
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prix TTC :</label>
            <input type="number" class="form-control" wire:model="prix_TTC">
            {{-- @error('prix_TTC') <span class="test text-danger">{{ $message }}</span> @enderror --}}
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">mode de payement :</label>
            <input type="text" class="form-control" wire:model="m_p">
            {{-- @error('m_p') <span class="test text-danger">{{ $message }}</span> @enderror --}}
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">nom :</label>
            <input type="text" class="form-control" wire:model="nom">
            {{-- @error('password') <span class="test text-danger">{{ $message }}</span> @enderror --}}
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">deja versé :</label>
            <input type="text" class="form-control" wire:model="d_v">
            {{-- @error('lien') <span class="test text-danger">{{ $message }}</span> @enderror --}}
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">livraison :</label>
            <input type="text" class="form-control" wire:model="livraison">
            {{-- @error('lien') <span class="test text-danger">{{ $message }}</span> @enderror --}}
        </div>
        @if ($editing)
            <a type="button" wire:click="update()" class="btn btn-warning">update</a>
            <a class="btn btn-danger" type="button" wire:click="cancel()">cancel</a>
        @else
            <button type="submit" class="btn btn-primary">submit</button>
        @endif
    </form>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">name</th>
            <th scope="col">prix HT</th>
            <th scope="col">prix TTC</th>
            <th scope="col">mode peyement</th>
            <th scope="col">livraison</th>
            <th scope="col">déja vérse</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->nom}}</td>
                    <td>{{$item->prix_HT}}</td>
                    <td>{{$item->prix_TTC}}</th>
                    <td>{{$item->mode_payement}}</th>
                    <td>{{$item->livraison}}</td>
                    <td>{{$item->déja_versé}}</th>
                    <td>
                        <button wire:click="get_one({{$item->id}})" class="btn btn-warning">Update</button>
                        <button wire:click="delete({{$item->id}})" class="btn btn-danger">delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
