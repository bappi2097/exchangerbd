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
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @if (!$orders->isEmpty())
        @foreach ($orders as $order)
        @if ($order->status!=0)
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
            <td>{{$order->created_at}}</td>
            @if ($order->status==1)
            <td style="color:green; font-weight: bold;">Complete</td>
            @else
            <td style="color:red; font-weight: bold;">Rejected</td>
            @endif
        </tr>
        @endif
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