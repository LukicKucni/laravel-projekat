@extends('layouts.app')

@section('content')
    <h1>Izmeni kategoriju</h1>

    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Naziv kategorije</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button class="btn btn-success">Sačuvaj izmene</button>
    </form>
@endsection
