@extends('layouts.app')

@section('content')
    <h1>Nova kategorija</h1>

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Naziv kategorije</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-success">Sačuvaj</button>
    </form>
@endsection
