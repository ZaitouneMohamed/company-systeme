<div class="container" x-data="{open : false}">
    @include("sadmin.content.includes.buttons")
    <div x-show="open" x-transition>
        <h1 class="text-center">Email Pro List</h1>
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
    </div>
    <div x-show="!open" x-transition>
        <table class="table">
            <thead>
              <tr>
                    <th scope="col">Email</th>
                    <th scope="col">User name</th>
                    <th scope="col">Lien</th>
                    <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($emails_list as $email)
                    <tr>
                        <td scope="row">{{$email->email}}</td>
                        <td>{{$email->user->name}}</td>
                        <td>{{$email->lien}}</td>
                        <td>{{$email->mot_de_passe}}</td>
                        <td>
                            <button wire:click="get_one({{$email->id}})" class="btn btn-warning">Update</button>
                            <button wire:click="delete({{$email->id}})" class="btn btn-danger">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
