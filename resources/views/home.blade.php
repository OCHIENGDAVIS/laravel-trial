@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                   
                    @if (session()->has('message'))
                    
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>  
                    @endif
                    <form action="/upload" method="POST" enctype="multipart/form-data"> @csrf
                        <input type="file" name="image" id="image">
                        <input type="submit" value="Upload">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @if (Session::has('message'))
                <div class="row">
                    <div class="alert  alert-success">{{Session::get('message')}}</div>
                </div>
            @endif
            <h4>Your Posts</h4>
          
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
