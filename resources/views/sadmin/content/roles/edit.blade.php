@extends('sadmin.master')

@section('content')
    <center>
    <div>
        <h1>role name</h1>
        <form action="{{ route('sadmin.roles.update', $id) }}" method="post">
            @csrf
            @method('put')
            <input type="text" name="name" class="form-controle" value="{{ $role->name }}" id="">
            <input type="submit" value="update" class="btn btn-primary">
        </form>
    </div>
    <br>
    <div>
        <h1>permissions de role : {{ $role->name }} </h1>
        @if ($role->permissions)
            permission list :
            <div class="d-flex justify-content-center">
                @foreach ($role->permissions as $permission)
                    <form action="{{ route('sadmin.remove.role') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="permission_name" value="{{ $permission->id }}">
                        <input type="hidden" name="role_name" value="{{ $role->name }}">
                        <button type="submit" class="btn btn-danger">{{ $permission->name }}</button>
                    </form>
                @endforeach
            </div>
        @endif
    </div><br>
    <div>
        <form action="{{ route('sadmin.assign.role', $role->id) }}" method="POST">
            @csrf
            @method('POST')
            <label for="" class="for-controle">Permissions</label>
            <select class="form-select" aria-label="Default select example" name="permission">
                <option selected>Open this select menu</option>
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                @endforeach
                <input type="submit" value="assign" class="btn btn-primary">
            </select>
        </form>
    </div>
</center>
@endsection
