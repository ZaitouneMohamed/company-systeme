<div class="container">
    <h1 class="text-center">wordpress List</h1>
    <form wire:submit.prevent="add">
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
        @if ($editing)
            <a type="button" wire:click="update()" class="btn btn-warning">update</a>
            <a class="btn btn-danger" type="button" wire:click="clear()">cancel</a>
        @else
            <button type="submit" class="btn btn-primary">submit</button>
        @endif
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">email</th>
                <th scope="col">password</th>
                <th scope="col">lien</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wordpress_list as $data)
                <tr>
                    <td scope="row">{{ $data->email }}</td>
                    <td>{{ $data->password }}</td>
                    <td>{{ $data->lien }}</td>
                    <td>
                        <button wire:click="get_one({{$data->id}})" class="btn btn-warning">Update</button>
                        <button wire:click="delete({{$data->id}})" class="btn btn-danger">delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
