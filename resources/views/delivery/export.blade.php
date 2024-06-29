@extends('layouts.vertical', ['page_title' => 'Proof of Delivery'])

@section('css')
@endsection

@section('content')
    <div class="container-fluid">

         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Export Proof of Delivery</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('delivery.export.store')}}" method="post" enctype="multipart/form-data" class="file-validaion" novalidate>
                            @csrf
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>Export File</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="file" id="import_file" placeholder="Select File" required>
                                    <div class="invalid-feedback">
                                        Please select a valid file with extensions: .csv
                                    </div>
                                </div>
                            </div>
                            
                            <div class="pt-2">
                                <a href="" class="btn btn-soft-dark rounded-pill">Back</a>
                                <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection