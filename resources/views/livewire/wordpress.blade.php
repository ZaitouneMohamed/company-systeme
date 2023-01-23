<div class="container">
    <h1 class="text-center">wordpress List</h1>
    <form wire:submit.prevent="add_new_one">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">email :</label>
            <input type="text" class="form-control" wire:model="email">
            {{-- @error('email') <span class="test text-danger">{{ $message }}</span> @enderror --}}
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">password :</label>
            <input type="text" class="form-control" wire:model="password">
            {{-- @error('password') <span class="test text-danger">{{ $message }}</span> @enderror --}}
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">lien :</label>
            <input type="text" class="form-control" wire:model="lien">
            {{-- @error('lien') <span class="test text-danger">{{ $message }}</span> @enderror --}}
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User :</label>
            <select class="form-control" wire:model="user">
                <option value=""></option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            {{-- @error('user') <span class="test text-danger">{{ $message }}</span> @enderror --}}
        </div>
        @if ($editing)
            <a type="button" wire:click="update()" class="btn btn-warning">update</a>
            <a class="btn btn-danger" type="button" wire:click="clears()">cancel</a>
        @else
            <button type="submit" class="btn btn-primary">submit</button>
        @endif
    </form>
    <table class="table">
        <thead>
          <tr>
                <th scope="col">Email</th>
                <th scope="col">password</th>
                <th scope="col">link</th>
                <th scope="col">user name</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($wordpress_list as $list)
                <tr>
                    <td scope="row">{{$list->email}}</td>
                    <td>{{$list->password}}</td>
                    <td>{{$list->lien}}</td>
                    <td>{{$list->user->name}}</td>
                    <td>
                        <button wire:click="get_one({{$list->id}})" class="btn btn-warning">Update</button>
                        <button wire:click="delete({{$list->id}})" class="btn btn-danger">delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
