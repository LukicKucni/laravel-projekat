@extends('layouts.app')

@section('content')
    <h1>Kategorije</h1>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">+ Nova kategorija</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Naziv</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td>{{ $cat->name }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">Izmeni</a>
                        <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Obrisati?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
