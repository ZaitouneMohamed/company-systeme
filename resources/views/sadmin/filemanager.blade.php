@extends('sadmin.master')

@section('links')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="{{ asset('vendor/file-manager/css/file-manager.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="container">
        <div id="fm" style="height: 600px;"></div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');
            fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
                window.opener.fmSetLink(fileUrl);
                window.close();
            });
        });
    </script>
@endsection
