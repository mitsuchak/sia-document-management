@extends('layouts.vertical', ['page_title' => 'Users', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite([
        'node_modules/datatables.net-bs5/css/dataTables.bootstrap5.min.css',
        'node_modules/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css',
        'node_modules/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css',
        'node_modules/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css',
        'node_modules/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css',
        'node_modules/datatables.net-select-bs5/css/select.bootstrap5.min.css',
    ])
@endsection

@section('content')
    <div class="container-fluid">
        <div class="pt-2">
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
        </div>
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <!-- <a href="{{route('users.create')}}" class="btn btn-soft-dark rounded-pill">Add Users</a> -->
                    </div>
                    <h4 class="page-title">Users</h4>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="basic-datatable" class="table table-striped w-100 nowrap table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>First name</th>
                                    <th>Last name</th>
                                    <th>Email</th>
                                    <th>Company Name</th>
                                    <th>Designation</th>
                                    <th style="width:15%">
                                        <form action="{{route('users.index')}}" method="get" id="search_form">
                                            <select id="filterRole" name="filter_role" class="form-select" onchange="document.getElementById('search_form').submit()" style="width: 150px;">
                                                <option value="">Filter By Role</option>
                                                @foreach($roles as $role)
                                                     <?php $selected = ($search_role == $role->id ? "Selected='selected'" : ''); ?>
                                                    <option value="{{$role->id}}" {{$selected}}>{{$role->role_name}}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </th>
                                    <th style="width:15%">Action</th>
                                    </tr>
                            </thead>
                            <tbody>
                                @if(count($users) > 0)
                                @foreach($users as $key=>$user)
                                <tr>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{!is_null($user->company_name) ? $user->company_name : 'NA'}}</td>
                                    <td>{{!is_null($user->designation) ? $user->designation : 'NA'}}</td>
                                    <td>{{$user->roles->role_name}}</td>
                                    <td>
                                        <a href="{{route('users.edit',['id'=>$user->id])}}" class="btn btn-warning rounded-pill">Edit</a>
                                        <a href="{{route('users.delete',['id'=>$user->id])}}" class="btn btn-danger rounded-pill">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->

    </div>
@endsection

@section('script')
    @vite(['resources/js/pages/demo.datatable-init.js'])
@endsection