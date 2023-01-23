<div class="container">
    <h1 class="text-center">Nom Domaines List</h1>
    <form wire:submit.prevent="add">
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
        @if ($editing)
            <a type="button" wire:click="clear()" class="btn btn-danger">cancel</a>
            <button type="button" wire:click="update()" class="btn btn-warning">update</button>
        @else
            <button type="submit" class="btn btn-primary">submit</button>
        @endif
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">prix/GB</th>
                <th scope="col">lieu</th>
                <th scope="col">nom</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nom_domaines_list as $data)
                <tr>
                    <td scope="row">{{ $data->user->name }}</td>
                    <td>{{ $data->prix }}</td>
                    <td>{{ $data->lieu }}</td>
                    <td>{{ $data->nom }}</td>
                    <td>
                        <button wire:click="get_one({{$data->id}})" class="btn btn-warning">Update</button>
                        <button wire:click="delete({{$data->id}})" class="btn btn-danger">delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
