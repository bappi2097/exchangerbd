@extends('layouts.index')
@section('body')
<div class="complete-order">
    <h2>Complete Orders</h2>
    <div class="complete-tbl-box">
        <table id="complete-tbl" class="table table-striped table-bordered" style="width: 100%;">
            <thead>
                <tr>
                    {{-- <th>Username</th> --}}
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
                    {{-- <th>Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @if (!$user->orders->isEmpty())
                @foreach ($user->orders as $order)
                <tr>
                    {{-- <td>{{$order->user->username}}</td> --}}
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
                    @if ($order->status == 0)
                    <td style="color: rgb(160, 160, 160); font-weight:bold;">Processing</td>
                    @elseif ($order->status == 1)
                    <td style="color: rgb(12, 236, 12); font-weight:bold;">Complete</td>
                    @elseif ($order->status ==2)
                    <td style="color: red; font-weight:bold;">Rejected</td>
                    @endif
                    {{-- <td>
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
                    <a href="#" class="cancel">
                        <i class="fa fa-trash"></i>
                    </a>
                    <form id="complete-order{{$order->id}}"
                        action="{{route('admin.new-order.reject',["id" => $order->id])}}" method="POST"
                        style="display: none;">
                        @method('PUT')
                        @csrf
                    </form>
    </div>
    </td> --}}
    </tr>
    @endforeach
    @endif
    </tbody>
    </table>
</div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function () {
        $("#complete-tbl").DataTable();
    });
</script>
@endpush