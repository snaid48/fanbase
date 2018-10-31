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
                        <h4 class="title">Add Event</h4>
                    </div>
                    <div class="content">
                        <form role="form" action="/event/store" method="POST" enctype="multipart/form-data">
                            
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" name="posting" value="{{ Auth::user()->id }}">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Event Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="event_name" class="form-control" id="inputEmail3" placeholder="Event Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" name="description" class="form-control" placeholder="Description" value=""></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">
                                            <select id="inputState" class="form-control" name="category">
                                        <option selected>Choose...</option>
                                        <option>Live Match</option>
                                        <option>Social</option>
                                      </select></div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Event Date</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="event_date" class="form-control" id="inputEmail3" placeholder="Event Name">
                                        </div>
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
                                            <a href="{{ url('admin/event')}}" class="btn btn-danger">Back</a>
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