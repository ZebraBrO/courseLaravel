@extends('layout')

@section('content')
    <div class="container mt-5 w-100 d-flex flex-column align-items-center">
        <h2 class="text-white" >{{$genre ? "Список пластинок жанра ".$genre->genre : "Неверный Id жанра"}}</h2>
        @if($genre)
            <table class="table-dark w-100 text-center">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Автор</th>
                </tr>
                </thead>
                <tbody>
                @foreach($genre->records as $record)
                    <tr>
                        <td class="text-center">{{$record->id}}</td>
                        <td class="text-center">{{$record->name}}</td>
                        <td class="text-center">{{$record->author->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
