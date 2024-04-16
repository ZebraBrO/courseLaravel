@extends('layout')

@section('content')
    <div class="container mt-5 w-100 d-flex flex-column align-items-center">
        <h2 class="text-white">Список Пластинок</h2>
        <table class="table-dark w-100 text-center">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Исполнитель</th>
                <th scope="col">Название</th>
                <th scope="col">Жанр</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($records as $record)
                <tr>
                    <th scope="row">{{ $record->id }}</th>
                    <td class="text-center">{{ $record->author->name }}</td>
                    <td class="text-center">{{ $record->name }}</td>
                    <td class="text-center">{{ $record->genre->genre}}</td>
                    <td class="text-center">
                        <a href="{{ url('record/'.$record->id) }}" class="btn btn-info btn-sm">Подробнее</a>
                        <a href="{{ url('record/edit/'.$record->id) }}" class="btn btn-primary btn-sm">Редактировать</a>
                        <a href="{{ url('record/destroy/'.$record->id) }}" class="btn btn-danger btn-sm">Удалить</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$records->links()}}
    </div>
@endsection
