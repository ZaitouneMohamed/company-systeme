<div class="container">
    @if ($roles)
        <center>
            @if ($user->roles)
                <h1>Roles List</h1>
                <div class="d-flex justify-content-center">
                    @foreach ($user->roles as $role)
                        <form method="post" action="{{ route('remove_role.from.user', $user->id) }}">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="role_name" value="{{ $role->name }}">
                            <button type="submit" class="btn btn-danger">{{ $role->name }}</button>
                        </form>
                    @endforeach
                </div>
            @endif
            <form wire:submit.prevent="assign_role">
                @csrf
                <label for="" class="for-controle">Add Role To {{ $user->name }}</label>
                <select class="form-select" wire:model="role_name" aria-label="Default select example" name="role_name">
                    <option selected>Open this select menu</option>
                    @foreach ($roles_list as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                    <input type="submit" value="assign" class="btn btn-primary">
                </select>
            </form>
        </center>
    @else
        <h1 class="text-center">Users Liist</h1>
        <form wire:submit.prevent="adduser">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">full name :</label>
                <input type="text" class="form-control" wire:model="name">
                @error('name')
                    <span class="test text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">email :</label>
                <input type="text" class="form-control" wire:model="email">
                @error('email')
                    <span class="test text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">password :</label>
                <input type="text" class="form-control" wire:model="password">
                @error('password')
                    <span class="test text-danger">{{ $message }}</span>
                @enderror
            </div>
            @if ($editing)
                <button type="button" wire:click="update_user()" class="btn btn-warning">Update</button>
                <button type="button" wire:click="cancel()" class="btn btn-danger">cancel</button>
            @else
                <button type="submit" wire:click="adduser()" class="btn btn-primary">submit</button>
            @endif
        </form>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">action</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button class="btn btn-success"
                            wire:click="get_roles_and_permissions({{ $user->id }})">roles & pemirrions</button>
                        <button wire:click="get_user({{ $user->id }})" class="btn btn-warning">Update</button>
                        <button wire:click="delete({{ $user->id }})" class="btn btn-danger">delete</button>
                    </td>
                    <td>
                        @if ($user->active == 0)
                            <button class="btn btn-success" wire:click="accepte({{ $user->id }})">active</button>
                        @else
                            <button class="btn btn-danger" wire:click="disable({{ $user->id }})">desactive</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
