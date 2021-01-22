<aside class="sidebar">
    <div class="admin-sidebar-bar">
        <i class="fa fa-bars" id="side-bar"></i>
    </div>
    <div class="menu">
        <ul class="menu-list">
            <li class="menu-list-li">
                <a class="@if(url()->current()==route('admin.dashboard')) active disabled @endif"
                    href="{{route('admin.dashboard')}}">Dashboard</a>
            </li>
            <li class="menu-list-li">
                <a class="@if(url()->current()==route('admin.new-order.index')) active disabled @endif"
                    href="{{route('admin.new-order.index')}}">New Orders</a>
            </li>
            <li class="menu-list-li">
                <a class="@if(url()->current()==route('admin.complete-order.index')) active disabled @endif"
                    href="{{route('admin.complete-order.index')}}">Complete Orders</a>
            </li>
            <li class="menu-list-li">
                <a class="@if(url()->current()==route('admin.wallet.index')) active disabled @endif"
                    href="{{route('admin.wallet.index')}}">Wallet</a>
            </li>
            <li class="menu-list-li">
                <a class="@if(url()->current()==route('admin.wallet-accounts.index')) active disabled @endif"
                    href="{{route('admin.wallet-accounts.index')}}">Wallet Accounts</a>
            </li>
            <li class="menu-list-li">
                <a class="@if(url()->current()==route('admin.password-reset.index')) active disabled @endif"
                    href="{{route('admin.password-reset.index')}}">Password Request</a>
            </li>
            <li class="menu-list-li">
                <a class="@if(url()->current()==route('admin.customer-info.index')) active disabled @endif"
                    href="{{route('admin.customer-info.index')}}">Customer Info</a>
            </li>
            <li class="menu-list-li">
                <a class="@if(url()->current()==route('admin.feedback.index')) active disabled @endif"
                    href="{{route('admin.feedback.index')}}">Feedback</a>
            </li>
            <li class="menu-list-li">
                <a class="@if(url()->current()==route('admin.notice.index')) active disabled @endif"
                    href="{{route('admin.notice.index')}}">Notice</a>
            </li>
        </ul>
    </div>
</aside>
