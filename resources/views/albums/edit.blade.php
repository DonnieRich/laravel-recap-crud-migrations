@extends('layouts.layout-bootstrap')

@section('corpo-centrale')

<form method="POST" action="{{route('albums.update', ['album' => $album->id])}}">

  @csrf
  @method('PUT')

  @include('partials.validation-errors')

  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Title" value="{{ old('title', $album->title) }}">
  </div>

  <button type="submit" class="btn btn-default">Submit</button>

</form>
@endsection
