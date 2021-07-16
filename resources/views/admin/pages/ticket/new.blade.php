@extends('admin.index')

@section('content')
    <h1 class="col-md-8 mt-4 mx-auto text-center text-info">OPEN NEW TICKET</h1>
    <div class="col-8 mx-auto mt-5 border rounded text-center" id="main">
        <div class="col-8 my-5 mx-auto">
            @include('message.error')
            <form action="{{ route('admin.ticket.store') }}" method="post" >
                @csrf
                <div class="row py-3">
                    <input type="text" class="form-control " name="title" placeholder="title" id="title" autocomplete="off">
                </div>

                <div class="row py-3">
                    <select class="form-control" name="priority" id="priority">
                        <option placeholder="Priority" default="Priority"> Priority
                        <option value="low">low</option>
                        <option value="middle">middle</option>
                        <option value="high">high</option>
                        </option>
                    </select>
                </div>

                @if ( auth()->user()->role === 'manager')
                    <div class="row py-3">
                        <select class="form-control" name="user" id="user">
                            <option >
                                    Choose User
                                         @foreach($users as $user)
                                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                                          @endforeach
                             </option>

                        </select>
                    </div>
                @endif

                <div class="row py-3">
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Text ..."></textarea>
                </div>
{{--                    <button type="submit" class="btn btn-success mt-2" name="send">Send Ticket</button>--}}
                    <input type="submit" class="btn btn-outline-success btn-md " name="submit"
                           value="Send Ticket" id="btn">

            </form>
        </div>
    </div>
@endsection
