@extends('admin.layout.index')
@section('main')
<table id="order-tbl" class="table table-striped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>Username</th>
            <th>Sent Wallet</th>
            {{-- <th>Send Contact</th> --}}
            <th>Send Amount</th>
            <th>Our Contact</th>
            <th>Receive Wallet</th>
            {{-- <th>Receive Contact</th> --}}
            <th>Receive Amount</th>
            <th>TNXID</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if (!$orders->isEmpty())
        @foreach ($orders as $order)
        <tr>
            <td>{{$order->user->username}}</td>
            <td style="text-align: center;">
                {{-- <img src="../logo/neteller.svg" alt="Neteller" /> --}}
                <span>{{$order->send_wallet_name}}</span>
                {{$order->sending_contact}}
            </td>
            <td>{{$order->send_amount}}</td>
            <td>{{$order->walletAccount->contact}}</td>
            <td style="text-align: center;">
                {{-- <img src="../logo/bkash-icon-logo.svg" alt="Bkash" /> --}}
                <span>{{$order->receive_wallet_name}}</span>
                {{$order->receiving_contact}}
            </td>
            <td>{{$order->receive_amount}}</td>
            <td>{{$order->tnxid}}</td>
            <td>
                <div class="action">
                    <a href="#" class="done"
                        onclick="event.preventDefault(); document.getElementById('complete-order{{$order->id}}').submit();">
                        <i class="fa fa-check"></i>
                    </a>
                    <form id="complete-order{{$order->id}}"
                        action="{{route('admin.new-order.update',["id" => $order->id])}}" method="POST"
                        style="display: none;">
                        @method('PUT')
                        @csrf
                    </form>
                    <a href="#" class="cancel"
                        onclick="event.preventDefault(); document.getElementById('reject-order{{$order->id}}').submit();">
                        <i class="fa fa-trash"></i>
                    </a>
                    <form id="reject-order{{$order->id}}"
                        action="{{route('admin.new-order.reject',["id" => $order->id])}}" method="POST"
                        style="display: none;">
                        @method('PUT')
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
@push('js')
<script>
    $(document).ready(function () {
        $("#order-tbl").DataTable({
            "aaSorting": [],
        });
    });
</script>
@endpush
