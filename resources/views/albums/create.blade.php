@extends('layouts.layout-bootstrap')

@section('corpo-centrale')
<form method="POST" action="{{route('albums.store')}}">

    @csrf
    @method('POST')

    @include('partials.validation-errors')

    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" name="title" placeholder="Title" value="">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>

  </form>
@endsection
