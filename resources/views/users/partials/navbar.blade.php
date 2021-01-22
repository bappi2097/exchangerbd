<div class="navc">
    <div class="navc-header">
        <div class="navc-title">
            <a href="/">EXCHANGER BD</a>
        </div>
    </div>
    <div class="navc-btn" onclick="togglenav()">
        <label for="navc-check">
            <span></span>
            <span></span>
            <span></span>
        </label>
    </div>

    <div class="navc-links" id="nav">
        <a href=" @auth {{route('home')}} @else {{route('guest')}} @endauth"
            class="@if(url()->current()==route('guest') || url()->current()==route('home')) is-active @endif">Home</a>
        <a href="{{route('how-to-exchange')}}" class="@if(url()->current()==route('how-to-exchange')) is-active @endif">
            How to EXCHANGE </a>
        <a href="{{route('faq')}}" class="@if(url()->current()==route('faq')) is-active @endif"> FAQ </a>
        @auth
        <a href="#" id="feedbackbtn"> Feedback </a>
        <a class="hidden" href="{{route('user.edit')}}">Profile</a>
        <a class="hidden" href="{{route('password.request')}}">Change Password</a>
        <a class="hidden" href="{{route('user.history')}}">History</a>
        <a class="hidden" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <div class="user-div">
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="img-div">
                        <img src="{{asset('logo/admin-1.jpg')}}" alt="user" />
                    </div>
                    <div class="username-div">{{$user->username}}</div>
                </a>
                <div class="dropdown-menu custom" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('user.edit')}}">Profile</a>
                    <a class="dropdown-item" href="{{route('password.request')}}">Change Password</a>
                    <a class="dropdown-item" href="{{route('user.history')}}">History</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        @else
        <a class="login" style="cursor: pointer;" id="loginbtn"> Login </a>
        <a class="reg" style="cursor: pointer;" id="regbtn"> Registration </a>
        @endauth
    </div>
</div>
