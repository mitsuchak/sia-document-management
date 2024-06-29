@extends('layouts.vertical', ['page_title' => 'Proof of Delivery'])

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
                        <a href="{{route('delivery.export')}}" class="btn btn-soft-dark rounded-pill">Import Data</a>
                        <a href="{{route('delivery.create')}}" class="btn btn-soft-dark rounded-pill">Add New Data</a>
                        @endif
                    </div>
                    <h4 class="page-title">Proof Of Delivery</h4>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="scroll-horizontal-datatable" class="table table-striped nowrap table-responsive-sm">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">Branch</th>
                                    <th style="width: 150px;">Invoice No</th>
                                    <th style="width: 150px;">Customer Name</th>
                                    <th style="width: 150px;">Invoice Amount</th>
                                    <th style="width: 100px;">Quantity</th>
                                    <th style="width: 200px;">Proof of Delivery Upload</th>
                                    <th style="width: 150px;">Upload Date</th>
                                    @if(auth()->user()->role_id == 1)
                                    <th style="width: 100px;">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($deliveries) > 0)
                                @foreach($deliveries as $key=>$delivery)
                                <tr>
                                    <td>{{$delivery->branch_name}}</td>

                                    <td>{{$delivery->invoice_no}}</td>

                                    <td>{{$delivery->customer_name}}</td>

                                    <td>{{$delivery->invoice_amount}}</td>

                                    <td>{{$delivery->quantity}}</td>

                                    @if(auth()->user()->role_id == 2 && $delivery->deliveryData->review_status != 'Approved')
                                    <td>
                                        <form action="{{route('delivery.delivery.change', ['id'=> $delivery->id])}}" method="post" id="delivery_change" >
                                            @csrf
                                            <select id="deliveryRole" name="delivery_status" class="form-select" onchange="document.getElementById('delivery_change').submit()" style="width: 150px;">
                                                <option value="">Delivery Status</option>
                                                @foreach($delivery_status_array as $review)
                                                     <?php $selected = ($delivery->deliveryData->delivery_status == $review ? "Selected='selected'" : ''); ?>
                                                    <option value="{{$review}}" {{$selected}}>{{$review}}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </td>
                                    @else
                                    <td>
                                        {{!is_null($delivery->deliveryData->delivery_status) ? $delivery->deliveryData->delivery_status : "N/A"}}
                                    </td>
                                    @endif
                                    
                                    @if(auth()->user()->role_id == 2 && $delivery->deliveryData->review_status != 'Approved')
                                    <td>
                                        @if(!is_null($delivery->deliveryData->file_name))
                                        <?php 
                                            $extension = explode('.',$delivery->deliveryData->file_name);
                                        ?>
                                        @if(count($extension) > 1 && in_array($extension[1], ['jpg','jpeg','png']))
                                            <a data-fancybox="{{'gallery'.$key}}" href="{{asset('storage/files/' . $delivery->deliveryData->file_name)}}">{{str_replace('_',' ',$delivery->deliveryData->file_name)}}</a>
                                        @else
                                            {{$delivery->deliveryData->file_name}}
                                        @endif
                                        @else
                                        <form action="{{route('delivery.file.upload', ['id'=> $delivery->id])}}" method="post" id="fileUpload" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="file_upload" id="file_upload" class="form-control" onchange="document.getElementById('fileUpload').submit()">
                                            
                                        </form>
                                        @endif
                                    </td>
                                    @else
                                        <?php 
                                            $extension = explode('.',$delivery->deliveryData->file_name);
                                        ?>
                                        @if(count($extension) > 1 && in_array($extension[1], ['jpg','jpeg','png']))
                                            <td><a data-fancybox="{{'gallery'.$key}}" href="{{asset('storage/files/' . $delivery->deliveryData->file_name)}}">{{str_replace('_',' ',$delivery->deliveryData->file_name)}}</a></td>
                                        @else
                                            <td>{{!is_null($delivery->deliveryData->file_name) ? str_replace('_',' ',$delivery->deliveryData->file_name) : "N/A"}}</td>
                                        @endif
                                    @endif
                                    
                                    <td>{{!is_null($delivery->deliveryData->upload_date) ? $delivery->deliveryData->upload_date : "N/A"}}</td>
                                    
                                    @if(auth()->user()->role_id == 3 && $delivery->deliveryData->review_status != 'Approved')
                                    <td>
                                        <form action="{{route('delivery.review.change', ['id'=> $delivery->id])}}" method="post" id="review_change">
                                            @csrf
                                            <select id="reviewRole" name="review_status" class="form-select" onchange="document.getElementById('review_change').submit()" style="width: 150px;">
                                                <option value="">Review Status</option>
                                                @foreach($review_status_array as $review)
                                                     <?php $selected = ($delivery->deliveryData->review_status == $review ? "Selected='selected'" : ''); ?>
                                                    <option value="{{$review}}" {{$selected}}>{{$review}}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </td>
                                    @else
                                    <td>{{!is_null($delivery->deliveryData) ? $delivery->deliveryData->review_status : ""}}</td>
                                    @endif

                                    @if(auth()->user()->role_id == 1)
                                    <td>
                                        @if(!is_null($delivery->deliveryData) && $delivery->deliveryData->review_status == 'Approved')
                                        
                                        @else
                                            <a href="{{route('delivery.edit',['id'=>$delivery->id])}}" class="btn btn-warning rounded-pill">Edit</a>
                                            <a href="{{route('delivery.delete',['id'=>$delivery->id])}}" class="btn btn-danger rounded-pill">Delete</a>
                                        @endif
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