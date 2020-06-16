@extends('layouts.master')
@section('title')
    All posts
@endsection
@section('content')
    @foreach ($posts as $post)
        <div>
            <h2>{{$post->body}}</h2>
            <p>{{ $post->user->name }}</p>
            @if (Auth::user() == $post->user)
                <a href="{{route('delete', ['post_id'=>$post->id])}}" class="btn btn-danger">delete</a>
                <a href="#" class="btn btn-primary" id="edit" class="edit">Edit</a>
            @endif
        </div>

    @endforeach
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection