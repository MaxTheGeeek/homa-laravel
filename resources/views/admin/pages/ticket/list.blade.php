@extends('admin.index')


@section('content')

    @include('message.error')
    <div class="container">
        <div class="row">
          <div class="col-md-3 mt-5">
              <a href="{{route('admin.ticket.create')}}" class="btn btn-success btn-sm rounded">
                  Add Ticket
              </a>
          </div>
            <div class="col-12 p-5 mx-5 my-3 border rounded mx-auto text-center">

                <table class="table table-bordered table-hover">
                    <tr>
                        <th>row</th>
                        <th>title</th>
                        <th>priority</th>
                        <th>status</th>
                        <th>show</th>
                    </tr>
                    @foreach($tickets as $row => $ticket)
                        <tr>
                            <td>{{++$row}}</td>
                            <td>{{$ticket->title}}</td>
                            <td>{{$ticket->priority}}</td>
                            <td class="text-danger">
                                @if($ticket->status === 'user_answer')
                                    User must be answer
                                @else
                                    Manager must be answer
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.ticket.show',$ticket->id)}}" class="btn btn-info btn-sm rounded">show</a>
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
@endsection
