@extends('admin.index')

@section('content')
    <h1 class="col-md-8 my-4 mx-auto text-center text-info">Users list</h1>
    <div class="col-9 mx-auto mb-5 border rounded text-center" id="main">
        <div class="table-responsive-md m-1 p-5">
            @if (auth()->user()->role === 'manager')
                <a href="{{ route('admin.user.newUser') }}" class="btn btn-primary rounded float-sm-right mb-2">Add
                    user</a>
            @endif

            <table class="table table-bordered table-hover p-5 my-5">
                <thead>
                <tr class="bg-warning">
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">role</th>
                    <th scope="col">Manager</th>
                    <th scope="col">Set role</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $row => $user)
                    <tr>
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="{{ ($user->role === 'user')? 'text-dark':'text-success'}}">{{ $user->role }}</td>
                        <td class="text-primary">{{ optional($user->Manager)->name }}</td>
                        <td>
                            <form action="{{ route('admin.user.setrole') }}" class="d-inline-block" method="post">
                                @csrf
                                <input type="hidden" value="manager" name="role">
                                <input type="hidden" value="{{ $user->id }}" name="user">
                                <button type="submit"
                                        class="btn {{ $user->role === 'manager'? 'btn-danger' : 'btn-outline-dark' }} btn-sm rounded">
                                    Manager
                                </button>
                            </form>
                            <form action="{{ route('admin.user.setrole') }}" class="d-inline-block" method="post">
                                @csrf
                                <input type="hidden" value="admin" name="role">
                                <input type="hidden" value="{{ $user->id }}" name="user">
                                <button type="submit"
                                        class="btn {{ $user->role === 'admin'? 'btn-danger' : 'btn-outline-dark' }} btn-sm rounded">
                                    Admin
                                </button>
                            </form>
                            <form action="{{ route('admin.user.setrole') }}" class="d-inline-block" method="post">
                                @csrf
                                <input type="hidden" value="user" name="role">
                                <input type="hidden" value="{{ $user->id }}" name="user">
                                <button type="submit"
                                        class="btn {{ $user->role === 'user'? 'btn-danger' : 'btn-outline-dark' }} btn-sm rounded">
                                    User
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.user.setStatus') }}" class="d-inline-block" method="post">
                                @csrf
                                <input type="hidden" value="{{ $user->id }}" name="user">
                                <button type="submit"
                                        class="btn {{ $user->status === 'activated'? 'btn-success' : 'btn-danger' }} btn-sm rounded">
                                    {{ $user->status === 'activated'? 'Active' : 'Deactivated' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
