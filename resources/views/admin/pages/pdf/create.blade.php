@extends('admin.index')

@section('content')
    <h1 class="col-md-8 mt-5 mx-auto text-center text-info">ADD NEW PDF</h1>
    <div class="col-md-6 mt-5 mx-auto border rounded">
        @include('message.error')
        <div class="col-10 mx-auto p-3 text-center" id="main">
            <form action="{{ route('admin.pdf.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" placeholder="title" name="title" id="title" class="form-control my-5">
                <input type="file" placeholder="file" name="file" id="customFile" class="form-control">
                <input type="submit" value="Upload" class="btn btn-success my-5">
            </form>
        </div>
    </div>
@endsection
