@extends('layouts.vertical', ['page_title' => 'Documents'])

@section('css')
@endsection

@section('content')
    <div class="container-fluid">

         <!-- start page title -->
         <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit document</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('document.update',['id'=>$document->id])}}" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="row py-2">
                                <div class="col-md-2">
                                    <label>Document Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="document_name" id="document_name" placeholder="Enter document name" value="{{$document->document_name}}" required>
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
                                    <label>Description</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea type="text" class="form-control" name="description" id="description" placeholder="Enter description" rows="4" required>{{$document->description}}</textarea>
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
                                    <label >File</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" name="document" id="document" class="form-control" placeholder="Select Document" fdprocessedid="w85w1m">
                                    <div class="mt-2">
                                        <a href="{{ route('documents.download', ['id' => $document->id]) }}">{{$document->document_name}}</a>
                                    </div>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Please select document.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="pt-2">
                                <a href="{{route('document.index')}}" class="btn btn-soft-dark rounded-pill">Back</a>
                                <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection