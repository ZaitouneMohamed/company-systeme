@extends('sadmin.master')

@section('content')
    <livewire:email-pro />
    <script>
        setInterval(function() {
            console.log('hhh')
        }, 1000);
    </script>
@endsection
