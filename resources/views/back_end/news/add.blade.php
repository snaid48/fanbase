@extends('back_end.layouts.master') 
@section('title')
<title>Admin | News</title>
@endsection
 
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add News</h4>
                    </div>
                    <div class="content">
                        <form role="form" action="/news/store" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                              <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" name="author" value="{{ Auth::user()->id }}"
                              </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">News Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="news_title" class="form-control" id="inputEmail3" placeholder="News Title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">News Field</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" name="news_field" class="form-control" placeholder="News Field" value=""></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select id="inputState" name="category" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>kategori 1</option>
                                        <option>kategori 2</option>
                                        <option>kategori 3</option>
                                      </select></div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input" id="customFile">
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