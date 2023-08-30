@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="{{ route('update-user') }}" method="post">
                        @csrf
                        <label>Name</label>
                        <input type="hidden" name="id" value="{{ $user['id'] }}">                        
                        <input class="form-control" type="text" name="name" value="{{ $user['name'] }}">                        
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" value="{{ $user['email'] }}">                        
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" >
                        <label>Role</label>
                        <select class="form-control" name="role_id">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id==$user->role_id?'selected':'' }}>{{ $role->role }}</option>
                            @endforeach
                        </select>
                        <button class="btn" type="submit">Create</button>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
