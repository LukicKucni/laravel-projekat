@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Magazini</h1>

    <a href="{{ route('admin.magazines.create') }}" class="btn btn-primary mb-3">+ Novi magazin</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Naslov</th>
                <th>Kategorija</th>
                <th>Cena</th>
                <th>Istaknuto</th>
                <th>Slika</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($magazines as $magazine)
                <tr>
                    <td>{{ $magazine->title }}</td>
                    <td>{{ $magazine->category->name ?? 'nema'}}</td>
                    <td>{{ $magazine->price }} RSD</td>
                    <td>{{ $magazine->featured ? 'Da' : 'Ne' }}</td>
                    <td><img src="{{ asset('storage/' . $magazine->cover) }}" width="50"></td>
                    <td>
                        <a href="{{ route('admin.magazines.edit', $magazine->id) }}" class="btn btn-sm btn-warning">Izmeni</a>
                        <form action="{{ route('admin.magazines.destroy', $magazine->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Obrisati?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
