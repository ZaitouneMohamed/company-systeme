<div class="container">
    <h1 class="text-center">Cpanel List</h1>
    <form wire:submit.prevent="add_new_one">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">email :</label>
            <input type="text" class="form-control" wire:model="email">
            @error('email') <span class="test text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">mot de passe :</label>
            <input type="text" class="form-control" wire:model="pass_email">
            @error('password') <span class="test text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">password :</label>
            <input type="text" class="form-control" wire:model="password">
            @error('password') <span class="test text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">cpanel lien :</label>
            <input type="text" class="form-control" wire:model="link">
            @error('lien') <span class="test text-danger">{{ $message }}</span> @enderror
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
                <th scope="col">email</th>
                <th scope="col">email password</th>
                <th scope="col">mot de passe</th>
                <th scope="col">link</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cpanel_list as $data)
                <tr>
                    <td scope="row">{{ $data->email }}</td>
                    <td>{{ $data->mot_passe_email }}</td>
                    <td>{{ $data->mot_de_passe }}</td>
                    <td>{{ $data->cpanel_link }}</td>
                    <td>
                        <button wire:click="get_one({{$data->id}})" class="btn btn-warning">Update</button>
                        <button wire:click="delete({{$data->id}})" class="btn btn-danger">delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
