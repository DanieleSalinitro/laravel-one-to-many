@extends('layouts.admin')
@section('title', 'Create Project')

@section('content')
<section>
    <h1>Crea nuovo progetto</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                   value="{{ old('title') }}" minlength="3" maxlength="200" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div id="titleHelp" class="form-text text-white">Inserire un minimo di 3 caratteri e un massimo di 200</div>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" required>{{ old('content') }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Project Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Tipologia</label>
            <select class="form-control @error('type_id') is-invalid @enderror" id="type_id" name="type_id">
                <option value="">Seleziona Tipologia</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-danger">Crea</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</section>
@endsection