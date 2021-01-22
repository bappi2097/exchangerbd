@extends('layouts.index')

@push('link-css')
<link rel="stylesheet" href="{{asset('css/faq.css')}}" />
@endpush

@section('body')
<div>
    <br /><br />
    <strong class="faq-head"> FAQ (Frequently Ask Questions) </strong><br /><br /><br />
</div>

<div class="faq">
    <button class="question">
        <strong>
            <div>1. How many we take to complete your exchange?<br /><br /></div>
        </strong>
    </button>
    <div class="answer">
        Answer: Not more than 20 minutes. We promise you that.<br /><br />
    </div>
    <button class="question">
        <strong>
            <div>2. How can you trust our website?<br /><br /></div>
        </strong>
    </button>
    <div class="answer">
        Answer: You can go for the feedback option of our website. There you can
        find many customers feedback. It can make you realize about the quality
        of our website.<br /><br />
    </div>

    <button class="question">
        <strong>
            <div>3. Did the rate of your dollar is fixed? <br /><br /></div>
        </strong>
    </button>
    <div class="answer">
        Answer: Actually it depends on the demand of customer. We have already
        told that we work as a medium and this is the reason the rate is not
        fixed. Based on customer need it can rise and down.<br /><br />
    </div>

    <button class="question">
        <strong>
            <div>
                4. Did your website is working as any gambling agent? <br /><br />
            </div>
        </strong>
    </button>
    <div class="answer">
        Answer: Surely not. We just responsible for the buy and sell. We are the
        medium of it. After that complete transection we are not responsible for
        any kind of illegal use of that money. As we don’t know about those
        customer personally and we don’t have any rights to interferes on
        anyone’s personal use of money. So again we would like to say we are not
        responsible for any kind of miss use of that exchanged money from our
        website.<br /><br />
    </div>
</div>
@endsection

@push('js')
<script>
    var acc = document.getElementsByClassName("question");
      var i;

      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
          this.classList.toggle("active");
          var panel = this.nextElementSibling;
          if (panel.style.display === "block") {
            panel.style.display = "none";
          } else {
            panel.style.display = "block";
          }
        });
      }
</script>
@endpush