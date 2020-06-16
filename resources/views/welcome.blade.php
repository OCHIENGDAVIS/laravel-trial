@extends('layouts.master')
@section('title')
Welcome
@endsection

@section('content')
<div class="row">
    @if (count($errors) > 0 )
    <div class="col-md-4 col-offset-4">
        <ul>
            @foreach ($errors->all()  as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>  
    @endif
</div>
<div class="row">
    <div class="col-6">
    <h3>Sign Up</h3>
        <form  action="{{ route('signup') }}" method="POST">
            <div class="form-group {{ $errors->has('email') ? 'has_error' : '' }}">
                <label for="email">Your Email</label>
                <input type="text" name="email" id="email" class="form-control"  value="{{Request::old('email')}}" />
            </div>
            <div class="form-group">
                <label for="firstname">Your First Name</label>
                <input type="text" name="name" id="fname" class="form-control" value="{{Request::old('name')}}" />
            </div>
            <div class="form-group">
                <label for="password">Your Password</label>
                <input type="text" name="password" id="password" class="form-control" value="{{Request::old('password')}}" />
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="submit" value="Sign up" class="btn btn-primary"  />
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
        </form>
    </div>
    <div class="col-6">
    <h3>Sign In</h3>
        <form action="{{route('signin')}}" method="POST">
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="text" name="email" id="email" class="form-control" value="{{Request::old('email')}}" />
            </div>
            <div class="form-group">
                <label for="password">Your Password</label>
                <input type="text" name="password" id="password" class="form-control" value="{{Request::old('password')}}" />
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="submit" value="Sign up" class="btn btn-primary" />
            </div>
            <input type="hidden" value="{{Session::token()}}" name="_token" />
        </form>
    </div>

</div>
<hr />
<div class="row">
    <div class="col-md-6 col-offset-3">
        <H3>Create a new Post</H3>
        <form action="{{route('create-post')}}" method="POST"> @csrf
            <div class="form-group">
                <label for="body">Content</label>
                <textarea name="body" id="" cols="30" rows="10" class="form-control" ></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Create Post" />
            </div>
        </form>
    </div>
</div>
@endsection