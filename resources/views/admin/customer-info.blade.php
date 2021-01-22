@extends('admin.layout.index')

@push('link-css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush

@push('link-js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush

@section('main')
<table id="order-tbl" class="table table-striped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Mobile No</th>
            <th>Ban</th>
            {{-- <th>Action</th> --}}
        </tr>
    </thead>
    <tbody>
        @if (!$users->isEmpty())
        @foreach ($users as $user)
        <tr>
            <td>{{$user->firstname}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>
                <input type="checkbox" name="is_active" id="is_active" data-onstyle="success" data-offstyle="danger"
                    data-toggle="toggle" data-on="Active" data-off="Ban" @if ($user->is_active) checked @endif
                onchange="document.getElementById('user-ban{{$user->id}}').submit();">
                <form id="user-ban{{$user->id}}" action="{{route('admin.customer-info.ban',["id" => $user->id])}}"
                    method="POST" style="display: none;">
                    @method('PUT')
                    @csrf
                </form>
            </td>
            {{-- <td>
                <div>
                    <a href="#" class="details">
                        <span>Details</span>
                        <i class="fa fa-info-circle"></i>
                    </a>
                </div>
            </td> --}}
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection
@push('js')
<script>
    $(document).ready(function () {
        $("#order-tbl").DataTable();
    });
</script>
<script>
    $(function() {
        $('##is_active').bootstrapToggle();
    });
</script>
<script>
    $(document).ready(function () {
        $("#order-tbl").DataTable();
    });
</script>
@endpush
