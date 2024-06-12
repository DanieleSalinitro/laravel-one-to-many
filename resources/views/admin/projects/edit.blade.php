@extends('layouts.admin')

@section('content')
<section>
    <h1>Modifica progetto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $project->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea name="content" id="content" class="form-control" required>{{ $project->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="image" class="form-label">Project Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="type_id" class="form-label">Tipologia</label>
            <select class="form-control @error('type_id') is-invalid @enderror" id="type_id" name="type_id">
                <option value="">Seleziona Tipologia</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</section>
@endsection