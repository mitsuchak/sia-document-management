@extends('layouts.vertical', ['page_title' => 'Users'])

@section('css')
@endsection

@section('content')
    <div class="container-fluid">

         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Users</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('users.update',['id'=>$user->id])}}" method="post">
                            @csrf
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>First Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" required value="{{$user->first_name}}">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>Last Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" required value="{{$user->last_name}}">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required value="{{$user->email}}" disabled>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label >Username</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" fdprocessedid="w85w1m" value="{{$user->username}}">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label >Role</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-select" name="role_id" id="example-select" required>
                                        <option>-- Select Role --</option>
                                        @if(count($roles) > 0)
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" @if($user->role_id == $role->id) selected @endif>{{$role->role_name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-9">
                                    <select id="example-select" name="status" class="form-select">
                                        <option value="">Filter By Role</option>
                                        @foreach($status as $role)
                                            <option value="{{$role}}" @if($role === $user->status) selected @endif>{{$role}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="pt-2">
                                <a href="{{route('users.index')}}" class="btn btn-soft-dark rounded-pill">Back</a>
                                <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection