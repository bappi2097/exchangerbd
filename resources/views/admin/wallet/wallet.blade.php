@extends('admin.layout.index')

@push('link-css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/modal.min.css')}}">
@endpush

@push('link-js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush

@section('main')
<a href="#" class="add-wallet" id="addwalletbtn">Add Wallet</a>
<table id="order-tbl" class="table table-striped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>Wallet Name</th>
            <th>Reserve</th>
            <th>Buy</th>
            <th>Sell</th>
            <th>Minimum</th>
            <th>Cost</th>
            <th>Original Reserve</th>
            <th>Original Cost</th>
            <th>Currency</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if (!$wallets->isEmpty())
        @foreach ($wallets as $wallet)
        <tr>
            <td>
                {{-- <img src="../logo/neteller.svg" alt="Neteller" /> --}}
                <span>{{$wallet->name}}</span>
            </td>
            <td>{{$wallet->reserve}}</td>
            <td>{{$wallet->buy}}</td>
            <td>{{$wallet->sell}}</td>
            <td>{{$wallet->minimum}}</td>
            <td>{{$wallet->cost}}</td>
            <td>{{$wallet->original_reserve}}</td>
            <td>{{$wallet->original_cost}}</td>
            <td>@if ($wallet->is_bd) Taka @else USD @endif</td>
            <td>
                <div class="action">
                    <a href="#" class="edit" id="editwalletbtn" onclick="editwallet({{$wallet}})">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="cancel"
                        onclick="event.preventDefault(); document.getElementById('destroy-wallet{{$wallet->id}}').submit();">
                        <i class="fa fa-trash"></i>
                    </a>
                    <form id="destroy-wallet{{$wallet->id}}"
                        action="{{route('admin.wallet.destroy',["id"=>$wallet->id])}}" method="POST"
                        style="display: none;">
                        @method('DELETE')
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

@push('modals')
@include('admin.wallet.modals.add-wallet')
@include('admin.wallet.modals.edit-wallet')
@endpush
@push('js')
<script>
    $(function() {
        $('#currency').bootstrapToggle();
        $('#edit-currency').bootstrapToggle();
  });
</script>
<script>
    $(document).ready(function () {
        $("#order-tbl").DataTable();
    });
</script>
<script>
    var addwalletmodal = document.getElementById("addwallet");
    var addwalletbtn = document.getElementById("addwalletbtn");
    var addwallet_closebtn = document.getElementById("addwallet-close");
    if (addwalletbtn != null) {
        addwalletbtn.onclick = function() {
           addwalletmodal.style.display = "block";
        };
        addwallet_closebtn.onclick = function() {
            addwalletmodal.style.display = "none";
        };
        window.onclick = function(event) {
            if (event.target == addwalletmodal) {
                addwalletmodal.style.display = "none";
            }
        };
    }
</script>
<script>
    var editwalletmodal = document.getElementById("editwallet");
    var editwallet_closebtn = document.getElementById("editwallet-close");
    function editwallet(data) {
        editwalletmodal.style.display = "block";
        $('#edit-id').val(data.id);
        $('#edit-name').val(data.name);
        $('#edit-buy').val(data.buy);
        $('#edit-sell').val(data.sell);
        $('#edit-reserve').val(0);
        $('#edit-cost').val(data.cost);
        $('#edit-minimum').val(data.minimum);
        $('#edit_original_cost').val(data.original_cost);
        if(data.is_bd==true){
            $('#edit-currency').prop('checked', true).change();
        }
        $('#edit-form').attr('action', "{{route('admin.wallet.update')}}");
    };
    editwallet_closebtn.onclick = function() {
        editwalletmodal.style.display = "none";
    };
    window.onclick = function(event) {
        if (event.target == editwalletmodal) {
            editwalletmodal.style.display = "none";
        }
    };
</script>
@endpush
