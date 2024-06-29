@extends('layouts.vertical', ['page_title' => 'Documents'])

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
                        @if(auth()->user()->role_id == 1)
                        <a href="{{route('document.create')}}" class="btn btn-soft-dark rounded-pill">Add New Documents</a>
                        @endif
                    </div>
                    <h4 class="page-title">Documents</h4>
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
                                    <th style="width: 20%;">Documnt Name</th>
                                    <th style="width: 20%;">Description</th>
                                    <th style="width: 20%;">Extension</th>
                                    <th style="width: 20%;">Upload Date</th>
                                    <th style="width: 20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($documents) > 0)
                                @foreach($documents as $key=>$document)
                                <tr>
                                    <td>{{$document->document_name}}</td>

                                    <td>{{$document->description}}</td>

                                    <td>{{$document->extension}}</td>

                                    <td>{{$document->created_at}}</td>

                                    @if(auth()->user()->role_id == 1)
                                    <td>
                                        <a href="{{route('document.edit',['id'=>$document->id])}}" class="btn btn-warning rounded-pill">Edit</a>
                                        <a href="{{route('document.delete',['id'=>$document->id])}}" class="btn btn-danger rounded-pill">Delete</a>
                                        <a href="{{ route('documents.download', ['id' => $document->id]) }}" class="btn btn-warning rounded-pill">Download</a>
                                    </td>
                                    @else
                                    <td>
                                        <a href="{{ route('documents.download', ['id' => $document->id]) }}" class="btn btn-warning rounded-pill">Download</a>
                                    </td>
                                    @endif
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
    $(document).ready(function() {
        $('[data-fancybox="gallery"]').fancybox();
    });
</script>
    @vite(['resources/js/pages/demo.datatable-init.js'])
@endsection