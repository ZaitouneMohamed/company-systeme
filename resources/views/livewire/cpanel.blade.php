<div class="container" x-data="{open : false}">
    @include("sadmin.content.includes.buttons")
    <div x-show="open" x-transition>
        <h1 class="text-center">Cpanel List</h1>
        <form wire:submit.prevent="add_new_one">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">email :</label>
                <input type="text" class="form-control" wire:model="email">
                {{-- @error('email') <span class="test text-danger">{{ $message }}</span> @enderror --}}
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">mot de passe :</label>
                <input type="text" class="form-control" wire:model="pass_email">
                {{-- @error('password') <span class="test text-danger">{{ $message }}</span> @enderror --}}
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">password :</label>
                <input type="text" class="form-control" wire:model="password">
                {{-- @error('password') <span class="test text-danger">{{ $message }}</span> @enderror --}}
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">cpanel lien :</label>
                <input type="text" class="form-control" wire:model="link">
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
                    <th scope="col">email mots de passe</th>
                    <th scope="col">mot de passe</th>
                    <th scope="col">User name</th>
                    <th scope="col">Cpanel link</th>
                    <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($panel_list as $panel)
                    <tr>
                        <td scope="row">{{$panel->email}}</td>
                        <td>{{$panel->mot_passe_email}}</td>
                        <td>{{$panel->mot_de_passe}}</td>
                        <td>{{$panel->user->name}}</td>
                        <td>{{$panel->cpanel_link}}</td>
                        <td>
                            <button wire:click="get_one({{$panel->id}})" class="btn btn-warning">Update</button>
                            <button wire:click="delete({{$panel->id}})" class="btn btn-danger">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>
