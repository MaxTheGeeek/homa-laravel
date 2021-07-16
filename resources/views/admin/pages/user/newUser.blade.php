@extends('admin.index')

@section('content')
    <h1 class="col-md-8 mt-4 mx-auto text-center text-info">Add new user</h1>
    <div class="col-8 mx-auto mt-5 border rounded text-center" id="main">
        <div class="col-8 my-5 mx-auto">
            @include('message.error')
            <form action="{{ route('admin.user.store') }}" method="post">
                @csrf

                <div class="row py-3">
                    <input type="text" class="form-control " name="name" placeholder="Name" id="name"
                           autocomplete="off">
                </div>

                <div class="row py-3">
                    <input type="text" class="form-control " name="email" placeholder="Email" id="email"
                           autocomplete="off">
                </div>

                <div class="row py-3">
                    <input type="text" class="form-control " name="password" placeholder="Password" id="password"
                           autocomplete="off">
                </div>

                <div class="row py-3">
                    <select class="form-control" name="manager" id="manager">
                        <option placeholder="Manager" default="Manager">Choose Manager
                        @foreach($managers as $manager)
                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                            @endforeach
                            </option>
                    </select>
                </div>
                <input type="submit" value="Submit" class="btn btn-success my-5">

            </form>
        </div>
    </div>
@endsection
