@extends('admin.layout.index')
@section('main')
<table id="feedback-tbl" class="table table-striped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>Username</th>
            <th>Comment</th>
            <th>Star</th>
            <th>Index</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    @if (!empty($feedbacks))
    <tbody>
        @foreach ($feedbacks as $feedback)
        <tr>
            <form id="update-feedback{{$feedback->id}}"
                action="{{route("admin.feedback.update",['feedback' => $feedback->id])}}" method="post">
                @method("PUT")
                @csrf
                <td>{{$feedback->user->username}}</td>
                <td id="admin-feedback-show">
                    <div>
                        {{$feedback->comment}}
                    </div>
                </td>
                <td>
                    <div class="review-star">
                        <i class="fa fa-star @if ($feedback->rating>0) glow @endif"></i>
                        <i class="fa fa-star @if ($feedback->rating>1) glow @endif"></i>
                        <i class="fa fa-star @if ($feedback->rating>2) glow @endif"></i>
                        <i class="fa fa-star @if ($feedback->rating>3) glow @endif"></i>
                        <i class="fa fa-star @if ($feedback->rating>4) glow @endif"></i>
                    </div>
                </td>
                <td class="index-td">
                    <input type="button" value="&plus;"
                        onclick="this.nextElementSibling.value=Number(this.nextElementSibling.value) +1" />
                    <input type="number" name="index" class="index" value="{{$feedback->index}}" />
                    <input type="button" value="&minus;"
                        onclick="this.previousElementSibling.value=this.previousElementSibling.value - 1" />
                </td>
                <td>
                    @if ($feedback->status==2)
                    <span style="color: green;">Approved</span>
                    @elseif($feedback->status==3)
                    <span style="color: red;">Rejected</span>
                    @endif
                </td>
                <td>
                    <div class="action">
                        @if ($feedback->status!=2)
                        <a href="{{route('admin.feedback.update',["feedback"=>$feedback->id])}}" class="done"
                            onclick="event.preventDefault(); document.getElementById('update-feedback{{$feedback->id}}').submit();">
                            <i class="fa fa-check"></i>
                        </a>
                        @endif
                        @if ($feedback->status!=3)
                        <a href="{{route('admin.feedback.destroy',["feedback"=>$feedback->id])}}" class="cancel"
                            onclick="event.preventDefault(); document.getElementById('destroy-feedback{{$feedback->id}}').submit();">
                            <i class="fa fa-times-circle"></i>
                        </a>
                        @endif
                    </div>
                </td>
            </form>
            @if ($feedback->status!=3)
            <form id="destroy-feedback{{$feedback->id}}"
                action="{{route('admin.feedback.destroy',["feedback"=>$feedback->id])}}" method="POST"
                style="display: none;">
                @method('DELETE')
                @csrf
            </form>
            @endif
        </tr>
        @endforeach
    </tbody>
    @endif
</table>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        $("#feedback-tbl").DataTable({
            "aaSorting": [],
        });
      });
</script>
@endpush
