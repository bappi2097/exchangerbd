<div class="complete-order">
    <h2>Complete Orders</h2>
    @php
    $order_complete = $orders->where('status', '!=', 0);
    @endphp
    <div class="complete-tbl-box">
        <table id="complete-tbl" class="table table-striped table-bordered" style="width: 100%;">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Send</th>
                    <th>Receive</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if (!$order_complete->isEmpty())
                @foreach ($order_complete as $order)
                <tr>
                    <td>{{$order->user->username}}</td>
                    <td>{{$order->send_wallet_name}}</td>
                    <td>{{$order->receive_wallet_name}}</td>
                    <td>{{$order->receive_amount}}</td>
                    <td>{{date("jS F h:i A" ,strtotime($order->updated_at))}}</td>
                    @if ($order->status==1)
                    <td style="color: rgb(10, 221, 10); font-weight:bold;">Complete</td>
                    @elseif($order->status==2)
                    <td style="color: red; font-weight:bold;">Rejected</td>
                    @endif
                </tr>
                @endforeach
                @else
                <td colspan="6" class="dataTables_empty" valign="top">No Complete Orders</td>
                @endif
            </tbody>
        </table>
    </div>
</div>
@push('js')
<script>
    $(document).ready(function () {
        $("#complete-tbl").DataTable();
    });
</script>
@endpush
