@extends('layout')

@section('content')
    <div class="container mt-5 w-100 d-flex flex-column align-items-center">
        <h2 class="text-white">Список Жанров</h2>
        <table class="table-dark w-100">
            <thead class="thead-dark text-center">
            <tr>
                <th scope="col" >ID</th>
                <th scope="col">Жанр</th>
                <th scope="col">Дествие</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($genres as $genre)
                <tr>
                    <td class="text-center">{{$genre->id}}</td>
                    <td class="text-center">{{$genre->genre}}</td>
                    <td class="text-center">
                        <a href="{{ url('genre/'.$genre->id) }}" class="btn btn-info btn-sm text-white">К пластинкам</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
