@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($users as $user)
        <div class="col-md-8">
            <div class="card">
                <h1>{{ $user->name }}</h1>
                <h3>{{ $user->email }}</h3>
                <p>{{ $user->role->role }}</p>
                <a href="{{ route('edit-user', $user->id) }}">Edit</a>
                <a href="{{ route('delete-user', $user->id) }}">Delete</a>
            </div>
        </div>          
        @endforeach
    </div>
</div>
@endsection
