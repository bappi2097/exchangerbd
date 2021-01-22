<nav>
    <div class="admin-header-row">
        <div class="admin-header-6">
            <div class="logo">Exchanger BD</div>
        </div>
        <div class="admin-header-7">
            <div class="admin-header-user">
                <div>
                    <img src="../logo/admin-1.jpg" alt="" />
                </div>
                <div class="admin-header-name">
                    <span>{{auth()->user()->name}}</span>
                </div>
            </div>
            <div class="admin-header-logout">
                <a href="{{ route('admin.logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>