@extends('layouts.vertical', ['page_title' => 'Proof of Delivery'])

@section('css')
@endsection

@section('content')
    <div class="container-fluid">

         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Create Proof of Delivery</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('delivery.update',['id'=>$data->id])}}" method="post">
                            @csrf
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>Branch</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="form-select" name="branch_name" id="example-select" required>
                                        <option selected disabled value="">-- Select Branch --</option>
                                        @if(count($branches) > 0)
                                        @foreach($branches as $branch)
                                            <option value="{{$branch}}" @if($data->branch_name == $branch) selected @endif>{{$branch}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <!-- <input type="text" class="form-control" name="branch_name" id="branch_name" placeholder="Enter branch name" required value="{{$data->branch_name}}"> -->
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>Invoice Number</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="invoice_no" id="invoice_no" placeholder="Enter invoice number" required value="{{$data->invoice_no}}">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>Customer Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Enter customer name" required value="{{$data->customer_name}}">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label >Invoice Amount</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="invoice_amount" id="invoice_amount" class="form-control" placeholder="Enter invoice amount" fdprocessedid="w85w1m" required value="{{$data->invoice_amount}}">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label >quantity</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Enter quantity" fdprocessedid="w85w1m" value="{{$data->quantity}}">
                                </div>
                            </div>
                            
                            <div class="pt-2">
                                <a href="#" class="btn btn-soft-dark rounded-pill">Back</a>
                                <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection