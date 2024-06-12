
@extends('layouts.admin')
@section('content')
<section>
    <h1>Modifica Tipologia</h1>

    <form action="{{ route('admin.types.update', $type->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $type->name }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</section>
@endsection