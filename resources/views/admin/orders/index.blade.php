@extends('layouts.app')

@section('content')
    <h1>Porudžbine</h1>

    <table id="ordersTable" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Korisnik</th>
                <th>Magazin</th>
                <th>Količina</th>
                <th>Cena</th>
                <th>Status</th>
                <th>Datum</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'N/A' }}</td>
                    <td>{{ $order->magazine->title ?? 'N/A' }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->total_price }} RSD</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Obrisati?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#ordersTable').DataTable({
            responsive: true
        });
    });
</script>
@endsection
