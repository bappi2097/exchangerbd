@extends('admin.layout.index')
@push('link-css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/modal.min.css')}}">
@endpush

@push('link-js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush
@section('main')
<a href="#" class="add-wallet" id="addnoticebtn">Add notice</a>
<table id="notice-tbl" class="table table-striped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>SL</th>
            <th>Title</th>
            <th>Content</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if (!$notices->isEmpty())
        @foreach ($notices as $index => $notice)
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$notice->title}}</td>
            <td>{{$notice->content}}</td>
            @if ($notice->is_active)
            <td style="color: green;">Active</td>
            @else
            <td style="color: red;">De-active</td>
            @endif
            <td>
                <div class="action">
                    <a href="#" class="edit" id="editnoticeaccountbtn" onclick="editnoticeaccount({{$notice}})">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="cancel"
                        onclick="event.preventDefault(); document.getElementById('destroy-notice-account{{$notice->id}}').submit();">
                        <i class="fa fa-trash"></i>
                    </a>
                    <form id="destroy-notice-account{{$notice->id}}"
                        action="{{route('admin.notice.destroy',["id"=>$notice->id])}}" method="POST"
                        style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection

@push('modals')
@include('admin.notice.modals.add-notice')
@include('admin.notice.modals.edit-notice')
@endpush
@push('js')
<script>
    $(function() {
        $('#currency').bootstrapToggle();
        $('#edit-currency').bootstrapToggle();
  });
</script>
<script>
    $(document).ready(function () {
        $("#notice-tbl").DataTable({
            "aaSorting": [],
        });
    });
</script>
<script>
    var addnoticemodal = document.getElementById("addnotice");
    var addnoticebtn = document.getElementById("addnoticebtn");
    var addnotice_closebtn = document.getElementById("addnotice-close");
    if (addnoticebtn != null) {
        addnoticebtn.onclick = function() {
           addnoticemodal.style.display = "block";
        };
        addnotice_closebtn.onclick = function() {
            addnoticemodal.style.display = "none";
        };
        window.onclick = function(event) {
            if (event.target == addnoticemodal) {
                addnoticemodal.style.display = "none";
            }
        };
    }
</script>
<script>
    var editnoticemodal = document.getElementById("editnotice");
    var editnotice_closebtn = document.getElementById("editnotice-close");
    function editnoticeaccount(data) {
        $('#edit-id').val(data.id);
        $('#edit-title').val(data.title);
        $('#edit-content').val(data.content);
        if(data.is_active==true){
            $('#edit-is_active').prop('checked', true).change();
        }
        $('#edit-form').attr('action', "{{route('admin.notice.update')}}");
        editnoticemodal.style.display = "block";
    };
    editnotice_closebtn.onclick = function() {
        editnoticemodal.style.display = "none";
    };
    window.onclick = function(event) {
        if (event.target == editnoticemodal) {
            editnoticemodal.style.display = "none";
        }
    };
</script>
@endpush