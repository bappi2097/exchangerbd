@extends('admin.layout.index')
@section('main')
<table id="order-tbl" class="table table-striped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>SL</th>
            <th>User</th>
            <th>Requested Password'sEmail</th>
            <th>Request Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if (!$password_resets->isEmpty())
        @foreach ($password_resets as $index => $password_reset)
        <tr>
            <td>{{$index+1}}</td>
            <td onclick="copyToClipboard('{{$password_reset->username}}')">{{$password_reset->username}}
            </td>
            <td onclick="copyToClipboard('{{$password_reset->email}}')">{{$password_reset->email}}</td>
            <td>{{$password_reset->created_at}}</td>
            <td>
                <div class="action">
                    <a href="#" class="edit bg-dark" onclick="sendmail('{{$password_reset->email}}')">
                        <i class="fa fa-envelope"></i>
                    </a>
                </div>
            </td>
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
    $(document).ready(function(){
        // alert('hello');
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    function sendmail(mailAddress){
        var html=null;
        $.ajax({
            url: "{{route('admin.mail.send-mail')}}",
            type: 'POST',
            data:{
                email : mailAddress,
            },
            success: function( data ){
                window.open('mailto:'+mailAddress+'?subject='+data.subject+'&body='+data.body);
                location.reload();
            }
        });
    }
</script>
@endpush
