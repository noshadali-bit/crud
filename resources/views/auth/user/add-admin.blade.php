@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if(isset($message))
                    @dd($message)
                        @foreach ($message as $item)
                            <span class="text-danger">{{ $item }}</span>
                        @endforeach
                    @endif

                    <form action="{{ route('create-admin') }}" method="post">
                        @csrf
                        <label>Name</label>
                        <input class="form-control" type="text" name="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label>Email</label>
                        <input class="form-control" type="email" name="email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <label>Password</label>
                        <input class="form-control" type="password" name="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <button class="btn btn primary" type="submit">Create</button>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
