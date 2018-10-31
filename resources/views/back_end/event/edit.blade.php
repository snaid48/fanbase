@extends('back_end.layouts.master') 
@section('title')
<title>Admin | Event</title>
@endsection
 
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Event</h4>
                    </div>
                    <div class="content">
                        <form role="form" action="/event/update" method="POST" enctype="multipart/form-data">
                             <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input type="hidden" class="form-control" name="id" value="{{ $event->id}}" />
                                <input type="hidden" name="posting" value="{{ Auth::user()->id }}"/>
                                <input type="hidden" name="_method" value="PUT" />
                              </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">event Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="event_name" value="{{$event->event_name}} " class="form-control" id="inputEmail3" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea rows="5" name="description"  class="form-control" >{{$event->description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Event Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="event_date" value="{{$event->event_date}} " class="form-control" >
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