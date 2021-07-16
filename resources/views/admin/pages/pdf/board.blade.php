@extends('admin.index')

@section('content')
    <h1 class="col-md-8 mt-4 mx-auto text-center text-info">PDFs LIST</h1>
        <div class="col-md-8 mx-auto p-3 my-5 border rounded text-center" id="main">
            <table class="table table-bordered table-hover my-5">
                <tr class="bg-warning">
                    <th>row</th>
                    <th>title</th>
                    <th>show</th>
                </tr>
                @foreach($pdfs as $row => $pdf)
                    <tr>
                        <td>{{ ++$row }}</td>
                        <td>{{ $pdf->title }}</td>
                        <td>
                            <a href="{{ url($pdf->url) }}" class="btn btn-info btn-sm rounded" target="_blank">Show</a>

                            @if ( auth()->user()->role == 'manager')
                                <a href="{{ url($pdf->url) }}" class="btn btn-danger btn-sm rounded">Delete</a>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
@endsection
