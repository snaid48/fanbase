@extends('back_end.layouts.master') 
@section('title')
<title>Admin | Team</title>
@endsection
 
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add Province</h4>
                    </div>
                    <div class="content">
                        <form role="form" action="/province/store" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="author" value="{{ Auth::user()->id }}" />

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Province</label>
                                <div class="col-sm-10">
                                    <input type="text" name="province" class="form-control" placeholder="Province Name">
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" name="flag" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>




                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <a href="{{ url('admin/news')}}" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>





        </div>
    </div>
</div>
@endsection