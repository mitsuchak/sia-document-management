@extends('layouts.vertical', ['page_title' => 'Requested Users'])

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
                    <h4 class="page-title">Requested Users</h4>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="scroll-horizontal-datatable" class="table table-striped w-100 nowrap table-responsive-sm">
                            <thead>
                                <tr>
                                    <th style="width: 20%;">User Name</th>
                                    <th style="width: 20%;">Full name</th>
                                    <th style="width: 20%;">Email</th>
                                    <th style="width: 20%;">Status</th>
                                    <th style="width: 20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($users) > 0)
                                    @foreach($users as $key=>$user)
                                    <tr>
                                        <td>{{$user->username}}</td>

                                        <td>{{$user->first_name}} {{$user->last_name}}</td>

                                        <td>{{$user->email}}</td>

                                        <td>{{$user->status}}</td>

                                        <td>
                                            <a href="{{ route('requested.user.edit', ['id' => $user->id]) }}" class="btn btn-warning rounded-pill">Update</a>
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
<script>
    $(user).ready(function() {
        $('[data-fancybox="gallery"]').fancybox();
    });
</script>
    @vite(['resources/js/pages/demo.datatable-init.js'])
@endsection