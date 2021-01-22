<div class="notice-box">
    @foreach ($notices as $notice)
    <p class="notice">
        {{$notice->content}}
    </p>
    @endforeach
</div>
