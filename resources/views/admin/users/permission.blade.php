@extends('layouts.vertical', ['page_title' => 'Requested User'])

@section('css')
@endsection

@section('content')
    <div class="container-fluid">
        @if(\Session::has('error'))
        <div class="alert alert-danger alert-dismissible text-bg-danger border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            <i class="ri-close-circle-line me-1 align-middle fs-16"></i> {{\Session::get('error')}}
        </div>
        @endif
        @if(\Session::has('success'))
        <div class="alert alert-success alert-dismissible text-bg-success border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            <i class="ri-check-line me-1 align-middle fs-16"></i> {{\Session::get('success')}}
        </div>
        @endif
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Requested User</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('requested.user.update',['id'=>$user->id])}}" method="post">
                            @csrf
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>User Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" id="document_name" placeholder="Enter document name" value="{{$user->first_name}} {{$user->last_name}}" disabled>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter document name.
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter document name" value="{{$user->email}}" disabled>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter description.
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter document name" value="{{$user->username}}" disabled>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter description.
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-9">
                                    <select id="filterRole" name="status" class="form-select">
                                        <option value="">Filter By Role</option>
                                        @foreach($status as $role)
                                            <option value="{{$role}}" @if($role === $user->status) selected @endif>{{$role}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="pt-2">
                                <a href="{{route('requested.user')}}" class="btn btn-soft-dark rounded-pill">Back</a>
                                <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection