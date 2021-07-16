<div style="background:#0C2E8A;" id="sidebar-wrapper">
    <div class="sidebar-heading " style="background:#0C2E8A;">
        <a class="navbar-brand text-info pl-5 fw-bold" href="{{ url('/') }}">
            {{ config('app.name', '') }}
        </a>
    </div>
    <div class="list-group list-group-flush">
            <a class="list-group-item text-white pl-5 py-3 " style="background:#0C2E8A;" href="{{ url('admin/dashboard')}}">Dashboard</a>

            <a class="list-group-item list-group-item-action text-white pl-5 py-3" style="background:#0C2E8A;"
               href="{{ route('admin.pdf.board') }}">e-Board</a>

            {{--        <a class="list-group-item list-group-item-action text-white bg-dark pl-5 py-3" href="{{ route('admin.ticket.create') }}">--}}
            {{--            Message  </a>--}}
            <div class="nav-item dropdown list-group-item text-white align-center pl-5" style="background:#0C2E8A;">
                <a class="nav-link dropdown-toggle text-white pl-0" id="navbarDropdown" href="#"
                   role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">Message </a>
                <div class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-warning" href="{{ route('admin.ticket.create') }}">New Ticket</a>
                    {{--                    <a class="dropdown-item text-white" href="{{ route('admin.ticket.list') }}">Tickets list</a>--}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-warning" href="{{ route('admin.ticket.list') }}">Show Tickets</a>
                </div>
            </div>

            @if ( in_array(auth()->user()->role,['manager','admin']))

                <a class="list-group-item list-group-item-action text-white pl-5 py-3" style="background:#0C2E8A;"
                   href="{{ route('admin.pdf.create')}}">Upload PDF</a>

                <div class="nav-item dropdown list-group-item text-white align-center pl-5" style="background:#0C2E8A;">
                    <a class="nav-link dropdown-toggle text-white pl-0" id="navbarDropdown" href="#"
                       role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">Users </a>
                    <div class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-warning" href="{{ route('admin.user.list')}}">Users List</a>
                        @if (auth()->user()->role === 'manager')
                            <a class="dropdown-item text-warning" href="{{ route('admin.user.newUser') }}">Add User</a>
                        @endif
                    </div>
                </div>
             @endif

            <div class="dropdown-divider"></div>



            @if ( in_array(auth()->user()->role,['admin']))
                 <a class="list-group-item list-group-item-action text-white pl-5 " style="background:#0C2E8A;" href="#">Setting</a>
            @endif

     </div>

</div>
