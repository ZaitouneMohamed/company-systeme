<div class="container">
    <form wire:submit.prevent="add_new_one">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">email :</label>
            <input type="text" class="form-control" wire:model="email">
            @error('email') <span class="test text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">password :</label>
            <input type="text" class="form-control" wire:model="password">
            @error('password') <span class="test text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">lien :</label>
            <input type="text" class="form-control" wire:model="lien">
            @error('lien') <span class="test text-danger">{{ $message }}</span> @enderror
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
            <th scope="col">prix ht</th>
            <th scope="col">prix ttc</th>
            <th scope="col">mode peyement</th>
            <th scope="col">livreison</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                <td scope="row">{{$data->prix_HT}}</td>
                <td>{{$data->prix_TTC}}</th>
                <td>{{$data->mode_payement}}</th>
                <td>{{$data->nom}}</td>
                <td>{{$data->livraison}}</td>
                <td>
                    <button wire:click="get_one({{$data->id}})" class="btn btn-warning">Update</button>
                    <button wire:click="delete({{$data->id}})" class="btn btn-danger">delete</button>
                </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
