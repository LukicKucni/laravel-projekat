@extends('layouts.app')

@section('content')
    <h1>Izmeni magazin</h1>

    <form method="POST" action="{{ route('admin.magazines.update', $magazine->id) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('admin.magazines.form')
    </form>
@endsection
