@extends('layouts.admin')
@section('content')
<section>
    <h1>Dettagli Tipologia</h1>
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <p class="form-control">{{ $type->name }}</p>
    </div>
    <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">Torna alla lista</a>
    <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning">Modifica</a>
    <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Elimina</button>
    </form>
</section>
@endsection