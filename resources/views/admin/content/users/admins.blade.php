@extends('admin.master')


@section('content')

    @can('add accounts')
        <livewire:admins />
    @else
        <h1>sorry you don't have access</h1>
        <script>window.location = "/admin";</script>
    @endcan
@endsection
