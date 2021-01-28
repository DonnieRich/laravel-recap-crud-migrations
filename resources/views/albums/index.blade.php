@extends('layouts.layout-bootstrap')

@section('corpo-centrale')

    @include('partials.success-error-messages')

    @if(count($albums) == 0)

        <h1 class="text-center">Non hai ancora album nel database</h1>

    @else

        <table class="table table-striped">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>*</th>
                    <th>*</th>
                    <th>*</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($albums as $album)

                    <tr>
                        <td>{{$album->id}}</td>
                        <td>{{$album->title}}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('albums.show', $album->id) }}">Dettagli</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('albums.edit', $album->id) }}">Modifica</a>
                        </td>
                        <td>
                            <form method='POST' action="{{ route('albums.destroy', $album->id) }}">
                                @csrf
                                @method('DELETE')

                                <input class="btn btn-danger" type="submit" value="Cancella">
                            </form>
                        </td>
                    </tr>

                @endforeach

            </tbody>

        </table>

    @endif

@endsection
