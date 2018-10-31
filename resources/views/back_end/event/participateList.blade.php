@extends('back_end.layouts.master') 
@section('title')
<title>Admin | News</title>
@endsection
 
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-4">
                <div id="pie" style="position: absolute;
                top: -81px;
                right: 0;"></div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Event Participate Check</h4>
                    </div>
                    <div class="content">
                        <form role="form" action="/eventParticipate/check" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Barcode</label>
                                <div class="col-sm-10">
                                    <input type="text" name="code" class="form-control" id="inputEmail3" placeholder="Code">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Check in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                    @if (session('status'))
                    <script>
                            window.onload = function () {
                            // swal("Access is Accepted!", "Terima Kasih Telah Hadir!", "success");
                            swal({
                                title: "Access is Accepted!",
                                text: "Terima Kasih Telah Hadir!",
                                icon: "success",
                                buttons: false,
                                timer: 1750,
                              });
                            }
                          </script>
          
                    @endif
                <div class="card">
                    <div class="header">
                        <h4 class="title">Event Name : {{$event->event_name}}</h4>
                        <p class="category">Participate

                        </p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Code</th>
                                <th>Barcode</th>
                                <th>Attendance Status</th>
                            </thead>
                            <tbody>

                                @foreach($event->participate as $row)
                                <tr class="item{{$row->id}}">
                                    <td>#</td>
                                    <td>{{ $row->name}}</td>
                                    <td>{{ $row->email}}</td>
                                    <td>{{ $row->phone}}</td>
                                    <td>{{ $row->address}}</td>
                                    <td>{{ $row->code}}</td>
                                    <td><img src="data:image/png;base64,{{DNS1D::getBarcodePNG($row->code, 'C128')}}" height="60" width="180"></td>
                                    
                                    <td>{{ $row->attendance_status}}</td>
                                    <td><a href="/printTicket/{{ $row->id }}"> <button class="btn btn-info btn-fill pull-center">Send Email</button> </a></td>



                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>


                </div>
                <a href="{{ url('/admin/event')}}" style="padding-left: 20px; padding-bottom: 20px;"> <button class="btn btn-default btn-fill pull-center">Back</button> </a>
            </div>

        </div>
    </div>
</div>

<script src="{{asset('back_end/chart_library/d3.min.js')}} "></script>
<script src="{{asset('back_end/chart_library/d3pie.js')}}"></script>

<script>
    var pie = new d3pie("pie", {
              data: {
                content: [
                  { label: "Present", value: {{ $event->participate->where("attendance_status", "Present")->count() }} },
                  { label: "Not Yet Present", value: {{ $event->participate->where("attendance_status", "Not Yet Present")->count() }}, color: "rgb(29, 204, 136)" }
                ]
              },
              tooltips: {
                enabled: true,
                type: "placeholder",
                string: "{label}: {percentage}%",
                styles: {
                  fadeInSpeed: 500,
                  backgroundColor: "#00cc99",
                  backgroundOpacity: 0.8,
                  color: "#ffffcc",
                  borderRadius: 4,
                  font: "verdana",
                  fontSize: 20,
                  padding: 20
                }
              }
            });

</script>
@endsection