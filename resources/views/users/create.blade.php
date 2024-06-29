@extends('layouts.vertical', ['page_title' => 'Users'])

@section('css')
@endsection

@section('content')
    <div class="container-fluid">

         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Create Users</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('users.store')}}" method="post" class="need-validation" novalidate>
                            @csrf
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>First Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter first name.
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>Last Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter last name.
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address with the @slgroup.in domain.
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label >Password</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" fdprocessedid="w85w1m" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter pasword.
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label >Mobile No</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Enter mobile number" fdprocessedid="w85w1m" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter mobile.
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label >Role</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-select" name="role_id" id="example-select" required>
                                        <option selected disabled value="">-- Select Role --</option>
                                        @if(count($roles) > 0)
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->role_name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please select role.
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>Branch</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-select" name="branch_name" id="example-select" required>
                                        <option selected disabled value="">-- Select Branch --</option>
                                        @if(count($branches) > 0)
                                            @foreach($branches as $branch)
                                            <option value="{{$branch}}">{{$branch}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please enter branch name.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="pt-2">
                                <a href="{{route('users.index')}}" class="btn btn-soft-dark rounded-pill">Back</a>
                                <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection