{{-- @if (!$feedbacks->isEmpty())
    <div class="review">
        <div class="rowr">
            <h2>Feedback</h2>
        </div>
        <div class="rowr horizontal-scroll" id="feedback">
            @foreach ($feedbacks as $feedback)
                <div class="review-box">
                    <div class="review-head">
                        <div class="user-img left">
                        <img src="logo/admin-1.jpg" alt="User Name" />
                        </div>
                        <div class="user-name left">
                        <span>{{$feedback->user->firstname.' '.$feedback->user->lastname}}</span>
</div>
</div>
<div class="review-star">
    <i class="fa fa-star @if ($feedback->rating>0) glow @endif"></i>
    <i class="fa fa-star @if ($feedback->rating>1) glow @endif"></i>
    <i class="fa fa-star @if ($feedback->rating>2) glow @endif"></i>
    <i class="fa fa-star @if ($feedback->rating>3) glow @endif"></i>
    <i class="fa fa-star @if ($feedback->rating>4) glow @endif"></i>
</div>
<div class="review-body">
    {{$feedback->comment}}
</div>
</div>
@endforeach
</div>
</div>
@endif --}}
