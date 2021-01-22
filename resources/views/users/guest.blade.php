@extends('layouts.index')

@section('body')

<div class="mainc">
  {{-- Notice --}}
  @if (!empty($notices))
  @include('users.partials.notice')
  @endif
  @include('users.partials.place-order')
  {{-- place order --}}
  {{-- reserve --}}
  <div class="rates-div" id="autoscroll">
  </div>
  {{-- @include('users.partials.reserve') --}}
  {{-- pending order --}}
  @include('users.partials.pending-order')
  {{-- complete order --}}
  @include('users.partials.complete-order')
  <div class="review" id="review"></div>
</div>
@endsection

@include('users.modals.place-order')

@push('js')
<script src="{{asset('js/ajax.js')}}"></script>
<script src="{{asset('js/autodivscroll.js')}}"></script>
<script type="text/javascript">
  var windowWidth = $(window).width();
      if (windowWidth >= 1024) {
        new AutoDivScroll("autoscroll", 40);
      }
</script>
<script type="text/javascript">
  var windowWidth = $(window).width();
      if (windowWidth >= 1024) {
        new AutoDivScroll("feedback", 30);
      }
</script>
@endpush