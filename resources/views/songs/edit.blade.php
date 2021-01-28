@extends('layouts.layout-bootstrap')

@section('corpo-centrale')

<form method="POST" action="{{route('songs.update', ['song' => $song->id])}}">

  @csrf
  @method('PUT')

  @include('partials.validation-errors')

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $song->title }}">
  </div>

  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" name="description" placeholder="Description" value="{{ $song->description }}">
  </div>

  <div class="form-group">
    <label for="length">Length</label>
    <input type="text" class="form-control" name="length" placeholder="Length"  value="{{ $song->length }}">
  </div>

  <div class="form-group">
    <label for="album">Album</label>
    <select id="album" class="form-control" name="album_id">
        <option value="">Seleziona album</option>
        @foreach ($albums as $album)
            <option {{ $song->album_id == $album->id ? 'selected' : '' }}
                value="{{ $album->id }}">
                {{ $album->title }}
            </option>
        @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-default">Submit</button>

</form>
@endsection
