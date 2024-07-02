@extends('mainLayout')

@section('title', 'Edit User Role')

@section('page-content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-info text-white text-center">
                    <h4 class="mb-0" style="font-family: 'Century Gothic', sans-serif;">Edit User Role</h4>
                </div>
                <div class="card-body d-flex justify-content-center"> 
                    <div style="max-width: 400px; width: 100%;"> 
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="userName" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="userName" value="{{ $user->name }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="userEmail" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="userEmail" value="{{ $user->email }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="userFullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="userFullName" value="{{ $user->userInfo->user_firstname . ' ' . $user->userInfo->user_lastname }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="userRole" class="form-label">Role</label>
                                <select class="form-select" id="userRole" name="role_id">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user->roles->pluck('id')->contains($role->id) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center"> 
                                <a href="{{ route('usertool') }}" class="btn btn-danger me-2">Cancel</a>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border: none;
    }
    
    .card-header {
        background-color: #17a2b8;
        border-bottom: none;
    }
    
    .form-label {
        font-weight: bold;
    }
    
    .btn-danger {
        background-color: #dc3545; 
        border-color: #dc3545;
    }
    
    .btn-danger:hover {
        background-color: #c82333; 
        border-color: #bd2130; 
    }
    
    .btn-success {
        background-color: #28a745; 
        border-color: #28a745; 
    }
    
    .btn-success:hover {
        background-color: #218838; 
        border-color: #1e7e34; 
    }
    
    body {
        font-family: 'Century Gothic', sans-serif; 
    }
</style>
@endpush
