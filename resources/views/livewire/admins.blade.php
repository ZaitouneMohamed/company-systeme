<div class="container">
    <h1 class="text-center">Admins List</h1>
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
                        @if (auth()->user()->id != $user->id)
                            <button wire:click="get_user({{ $user->id }})" class="btn btn-warning">Update</button>
                            <button wire:click="delete({{ $user->id }})" class="btn btn-danger">delete</button>
                        @endif
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
