@extends('admin.index')

@section('content')

    <div class="row my-5">
        <div class="col-12 mx-auto">
            @include('message.error')
        </div>

        @foreach($conversations as $conversation)
            <div class="col-10 mx-auto border rounded p-3 mb-3
                {{$conversation->writer !== auth()->user()->id ? 'direction-rtl' : ''}}">
                <h6 class="text-danger">
                    {{$conversation->Writer->name}}
                </h6>
                <p>{{$conversation->description}}</p>
                <span style="font-size: 11px" class="text-secondary">{{$conversation->created_at}}</span>
            </div>
        @endforeach

    </div>

    <div class="row">
        <div class="col-md-10  mx-auto">
            @include('message.error')
            <form action="{{route('admin.conversation.store')}}" method="post" class="border rounded p-5">
                @csrf

                <input type="hidden" value="{{$ticket->id}}" name="ticket" id="ticket">

                <div class="row mb-3">
                    <label class="form-label" for="description">Description</label>
                    <textarea name="description" id="description" placeholder="description" class="form-control"></textarea>
                </div>

                <div class="row">
                    <input type="submit" value="Reply" class="btn btn-success btn-sm rounded form-control">
                </div>
            </form>
        </div>
    </div>
@endsection
