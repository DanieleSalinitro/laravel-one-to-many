@extends('layouts.admin')
@section('content')
<section>
    <h1>Tipologie</h1>
    <a href="{{ route('admin.types.create') }}" class="btn btn-primary">Crea Nuova Tipologia</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>
                        <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning">Modifica</a>
                        <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection