@extends('layouts.layout-bootstrap')

@section('corpo-centrale')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $album->title }}" readonly>
    </div>

    <div class="form-group">
        <label for="album">Lista canzoni</label>
        <ul>
            @foreach ($album->songs as $song)
                <li>{{ $song->title }} - {{ $song->length }}</li>
            @endforeach
        </ul>
    </div>

@endsection
