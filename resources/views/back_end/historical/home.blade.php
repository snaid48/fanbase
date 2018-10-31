@extends('back_end.layouts.master') 
@section('title')
<title>Admin | Historical</title>
@endsection
 
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Historical Table</h4>
                        <p class="category">Here is a subtitle for this table
                            <a class="btn btn-primary" href="{{ url('admin/historical/add')}}" role="button">Add</a>
                        </p>

                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Historical Title</th>
                                <th>Historical Field</th>
                                <th>Photo</th>
                                <th>Author</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                                @foreach($historical as $row)
                                <tr class="item{{$row->id}}">
                                    <td>#</td>
                                    <td>{{ $row->historical_title}}</td>
                                    <td>{{strip_tags(substr(($row->historical_field),0,20))}}...</td>
                                    <td>{{ $row->photo}}</td>
                                    <td>{{ $row->user->name}}</td>
                                    <td>
                                        <form action="/historical/{{ $row->id }}" method="post">
                                            <a href="/historical/edit/{{ $row->id }}" class="btn btn-warning btn-fill pull-center">
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