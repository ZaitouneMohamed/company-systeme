@extends("sadmin.master")

@section("content")
    <form method="POST" action="{{route('sadmin.permissions.store')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">permission name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Add Permission</button>
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
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td class="d-flex">
                            <a href="" class="btn btn-success">edit & view</a>
                            <form action=" method="POST">
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
