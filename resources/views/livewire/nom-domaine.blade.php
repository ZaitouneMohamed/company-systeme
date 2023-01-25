<div class="container" x-data="{open : false}">
    @include("sadmin.content.includes.buttons")
    <div x-show="open" x-transition>
        <h1 class="text-center">nom domains List</h1>
        <form wire:submit.prevent="add_new_one">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prix :</label>
                <input type="text" class="form-control" wire:model="prix">
                @error('prix') <span class="test text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">lieu :</label>
                <input type="text" class="form-control" wire:model="lieu">
                @error('lieu') <span class="test text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">nom :</label>
                <input type="text" class="form-control" wire:model="nom">
                @error('nom') <span class="test text-danger">{{ $message }}</span> @enderror
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
    <h1 class="text-center">Add Nom Domaine</h1>
        <table class="table">
            <thead>
            <tr>
                    <th scope="col">prix</th>
                    <th scope="col">user name</th>
                    <th scope="col">lieu</th>
                    <th scope="col">nom</th>
                    <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($nom_domains_list as $domain)
                    <tr>
                        <td scope="row">{{$domain->user->name}}</td>
                        <td>{{$domain->prix}}</td>
                        <td>{{$domain->lieu}}</td>
                        <td>{{$domain->nom}}</td>
                        <td>
                            <button wire:click="get_one({{$domain->id}})" class="btn btn-warning">Update</button>
                            <button wire:click="delete({{$domain->id}})" class="btn btn-danger">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$nom_domains_list->links() }}
    </div>
    </div>
