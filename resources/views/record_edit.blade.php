@extends('layout')

@section('content')
    <div class="container mt-5 mb-5 d-flex flex-column align-items-stretch">
        <h2 class="text-white">Редактирование пластинки</h2>
        <form method="post" action="{{ url('record/update', $record->id) }}" class="needs-validation" novalidate>
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="name" class="text-white">Название:</label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                       name="name" value="{{ old('name') ? old('name') : $record->name }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="genre_id" class="text-white">Жанр:</label>
                <select class="form-control {{ $errors->has('genre_id') ? 'is-invalid' : '' }}" id="genre_id"
                        name="genre_id">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}"
                            {{ (old('genre_id') ? old('genre_id') : $record->genre_id) == $genre->id ? 'selected' : '' }}>
                            {{ $genre->genre }}
                        </option>
                    @endforeach
                </select>
                @error('genre_id')
                <div class="invalid-feedback text-white">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>
@endsection
