@extends('layouts.app')

@section('content')
    <h1>Novi magazin</h1>

    <form method="POST" action="{{ route('admin.magazines.store') }}" enctype="multipart/form-data">
        @csrf
        @include('admin.magazines.form')
    </form>
@endsection
