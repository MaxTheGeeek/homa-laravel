<div class="col-12 d-none border-end bg-dark mb-2" id="sticky-sidebar" style="max-width:200px; min-height: 89vh;">
    <div class="list-group list-group-flush bg-dark pl-2" style="max-width: 200px;">
        <a class="bg-dark text-white list-group-item list-group-item-action list-group-item-light p-3"
           href="{{ url('admin/dashboard') }}">Dashboard</a>
        <a class="bg-dark text-white list-group-item list-group-item-action list-group-item-light p-3"
           href="{{ route('admin.pdf.board') }}">e-Board</a>
        <a class="bg-dark text-white list-group-item list-group-item-action list-group-item-light p-3" href="#">
            Ticket
        </a>
        @if ( in_array(auth()->user()->role,['manager','admin']))
            <a class="bg-dark text-white list-group-item list-group-item-action list-group-item-light p-3"
               href="{{ route('admin.pdf.create')}}">Upload PDF</a>
            <a class="bg-dark text-white list-group-item list-group-item-action list-group-item-light p-3"
               href="{{route('admin.user.list')}}">Users
                List</a>
        @endif

        <a class="bg-dark text-warning font-weight-bold list-group-item list-group-item-action list-group-item-light p-3"
           href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
    </div>

</div>
