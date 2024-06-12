
@extends('layouts.admin')
@section('content')
<section>
    <h1>Crea Nuova Tipologia</h1>

    <form action="{{ route('admin.types.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Crea</button>
    </form>
</section>
@endsection