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
                        <h4 class="title">Team Table</h4>
                        <p class="category">Here is a subtitle for this table
                            <a class="btn btn-primary" href="{{ url('admin/team/add')}}" role="button">Add</a>
                        </p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Player Name</th>
                                <th>Position</th>
                                <th>Province</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                                @foreach($team as $row)
                                <tr class="item{{$row->id}}">
                                    <td>#</td>
                                    <td>{{ $row->player_name}}</td>
                                    <td>{{ $row->position}}</td>
                                    <td>{{ $row->province->province}}</td>
                                    <td>
                                        <form action="/team/{{ $row->id }}" method="post">
                                            <a href="/team/edit/{{ $row->id }}" class="btn btn-warning btn-fill pull-center">
                                            Edit
                                    </a>

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <button type="submit" class="btn btn-danger btn-fill pull-center">Delete</button>
                                        </form>
                                    </td>


                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>





        </div>
    </div>
</div>
@endsection