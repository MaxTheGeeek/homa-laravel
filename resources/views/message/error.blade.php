@if($errors->any())
    <div class="alert alert-danger">
        <ul class="text-right font-size-12 font-weight-bold">
            @foreach($errors->all() as $error)
                <li class="my-2">
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success font-size-14 font-weight-bold text-right alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="shadow-none out-line-none close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('warning'))

    <div class="alert alert-danger font-size-14 font-weight-bold text-right alert-dismissible fade show" role="alert">

        <button type="button" class="shadow-none out-line-none close"  data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        {{session('warning')}}
    </div>
@endif
