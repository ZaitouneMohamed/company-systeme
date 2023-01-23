<div class="container">
    <h1 class="text-center">Hebergement List</h1>
    <form wire:submit.prevent="add_new_one">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prix GB :</label>
            <input type="text" class="form-control" wire:model="prix">
            @error('prix') <span class="test text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">lien :</label>
            <input type="text" class="form-control" wire:model="lieu">
            @error('lieu') <span class="test text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User :</label>
            <select class="form-control" wire:model="user">
                <option value=""></option>
                @foreach ($users_list as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            @error('user') <span class="test text-danger">{{ $message }}</span> @enderror
        </div>
        @if ($editing)
            <button type="button" wire:click="clears()" class="btn btn-danger">cancel</button>
            <button type="button" wire:click="update()" class="btn btn-warning">update</button>
        @else
            <button type="submit" class="btn btn-primary">submit</button>
        @endif
    </form>

    <table class="table" id="myTable">
        <thead>
          <tr>
            <th scope="col">name</th>
            <th scope="col">prix/GB</th>
            <th scope="col">lien</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($hebergement_list as $hebergement)
                <tr>
                <td scope="row">{{$hebergement->user->name}}</td>
                <th>{{$hebergement->prix_GB}}</th>
                <td>{{$hebergement->lieu}}</td>
                <td>
                    <button wire:click="get_one({{$hebergement->id}})" class="btn btn-warning">Update</button>
                    <button wire:click="delete({{$hebergement->id}})" class="btn btn-danger">delete</button>
                </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
