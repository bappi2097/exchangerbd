<div class="pending-order">
    <h2>Pending Orders</h2>
    @php
    $order_pending = $orders->where('status', 0);
    @endphp
    <div class="pending-tbl-box">
        <table id="pending-tbl" class="table table-striped table-bordered" style="width: 100%;">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Send</th>
                    <th>Receive</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @if (!$order_pending->isEmpty())
                @foreach ($order_pending as $order)
                <tr>
                    <td>{{$order->user->username}}</td>
                    <td>{{$order->send_wallet_name}}</td>
                    <td>{{$order->receive_wallet_name}}</td>
                    <td>{{$order->receive_amount}}</td>
                    <td>{{date("jS F h:i A" ,strtotime($order->created_at))}}</td>
                </tr>
                @endforeach
                @else
                <td colspan="5" class="dataTables_empty" valign="top">No Pending Orders</td>
                @endif
            </tbody>
        </table>
    </div>
</div>

@push('js')
<script>
    $(document).ready(function () {
        $("#pending-tbl").DataTable({
            "order": [[ 4, "asc" ]]
        });
    });
</script>
@endpush
