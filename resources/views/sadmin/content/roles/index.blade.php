@extends("sadmin.master")

@section("content")
    <form method="POST" action="{{route('sadmin.roles.store')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">role name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Add Role</button>
    </form>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td class="d-flex">
                            <a href="{{route('sadmin.roles.edit',$role->id)}}" class="btn btn-success">edit & view</a>
                            <form action="{{route('sadmin.roles.destroy',$role->id)}}" method="POST">
                                @method("delete")
                                @csrf
                                <input type="submit" value="delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
