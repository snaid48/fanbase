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
                        <h4 class="title">Add Team</h4>
                    </div>
                    <div class="content">
                        <form role="form" action="/team/update" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" class="form-control" name="id" value="{{ $team->id}}" />
                            <input type="hidden" name="_method" value="PUT" />
                            <label for="inputEmail3">{{$team->player_name}}</label>
                            {{-- <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Player Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="player_name" value="{{$team->player_name}} " class="form-control" >
                                </div>
                            </div> --}}

                            {{-- <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Position</label>
                                <div class="col-sm-10">
                                        <select id="inputState" name="position" class="form-control" ">
                                                <option selected>Choose...</option>
                                                
                                                <option value="Goalkeeper">Goalkeeper</option>
                                                <option value="Defender">Defender</option>
                                                <option value="Midfielder">Midfielder</option>
                                                <option value="Forward">Forward</option>
                                                
                                              </select>
                                </div>
                            </div> --}}

                            {{-- <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Province</label>
                                <div class="col-sm-10">
                                    <select id="inputState" name="province_id" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach ($team->province as $row)
                                            <option value="{{ $row->id }}">{{$row->province }}</option>
                                        @endforeach
                                      </select></div>
                            </div> --}}

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
                                    <a href="{{ url('admin/team')}}" class="btn btn-danger">Back</a>
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