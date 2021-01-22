<div class="modal" id="feedbackmodal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="modal-header-title">Feedback</span>
          <i class="fa fa-times close" id="feedback-close"></i>
        </div>
        <div class="modal-body">
          <form action="{{route('user.feedback')}}" method="post">
            @csrf
            <div class="form-input">
              <label for="feedback-input">Feedback</label><br />
              <fieldset class="rating">
                <input type="radio" id="star5" name="rating" value="5" @if ($user->feedback->rating==5) checked @endif /><label
                  for="star5"
                  title="Rocks!"
                  >5 stars</label
                >
                <input type="radio" id="star4" name="rating" value="4" @if ($user->feedback->rating==4) checked @endif/><label
                  for="star4"
                  title="Pretty good"
                  >4 stars</label
                >
                <input type="radio" id="star3" name="rating" value="3" @if ($user->feedback->rating==3) checked @endif /><label
                  for="star3"
                  title="Meh"
                  >3 stars</label
                >
                <input type="radio" id="star2" name="rating" value="2" @if ($user->feedback->rating==2) checked @endif /><label
                  for="star2"
                  title="Kinda bad"
                  >2 stars</label
                >
                <input type="radio" id="star1" name="rating" value="1" @if ($user->feedback->rating==1) checked @endif /><label
                  for="star1"
                  title="Bad"
                  >1 star</label
                >
              </fieldset>
              <textarea
                name="comment"
                id="feedback-input"
                cols="30"
                rows="7"
              >{{$user->feedback->comment}}</textarea>
            </div>
            <div class="feedback-btn">
              <input type="submit" value="Submit Feedback" />
            </div>
          </form>
        </div>
      </div>
    </div>
