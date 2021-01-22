@extends('admin.layout.index')

@push('link-css')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/modal.min.css')}}">
@endpush

@push('link-js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endpush

@section('main')
<a href="#" class="add-wallet" id="addwalletaccountbtn">Add Wallet</a>
<table id="order-tbl" class="table table-striped table-bordered" style="width: 100%;">
    <thead>
        <tr>
            <th>Wallet Name</th>
            <th>Contact</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if (!$wallet_accounts->isEmpty())
        @foreach ($wallet_accounts as $wallet_account)
        <tr>
            <td>
                {{-- <img src="../logo/neteller.svg" alt="Neteller" /> --}}
                <span>{{$wallet_account->wallet->name}}</span>
            </td>
            <td>{{$wallet_account->contact}}</td>
            <td>@if ($wallet_account->status) Enable @else Disable @endif</td>
            <td>
                <div class="action">
                    <a href="#" class="edit" id="editwalletaccountbtn" onclick="editwalletaccount({{$wallet_account}})">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="cancel"
                        onclick="event.preventDefault(); document.getElementById('destroy-wallet-account{{$wallet_account->id}}').submit();">
                        <i class="fa fa-trash"></i>
                    </a>
                    <form id="destroy-wallet-account{{$wallet_account->id}}"
                        action="{{route('admin.wallet-accounts.destroy',["id"=>$wallet_account->id])}}" method="POST"
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
@include('admin.wallet-accounts.modals.add-wallet-accounts')
@include('admin.wallet-accounts.modals.edit-wallet-accounts')
@endpush
@push('js')
<script>
    $(document).ready(function () {
        $("#order-tbl").DataTable();
    });
</script>
<script>
    var addwalletaccountsmodal = document.getElementById("addwallet-accounts");
    var addwalletaccountsbtn = document.getElementById("addwalletaccountbtn");
    var addwalletaccounts_closebtn = document.getElementById("addwallet-accounts-close");
    if (addwalletaccountsbtn != null) {
        addwalletaccountsbtn.onclick = function() {
           addwalletaccountsmodal.style.display = "block";
        };
        addwalletaccounts_closebtn.onclick = function() {
            addwalletaccountsmodal.style.display = "none";
        };
        window.onclick = function(event) {
            if (event.target == addwalletaccountsmodal) {
                addwalletaccountsmodal.style.display = "none";
            }
        };
    }
</script>
<script>
    var editwalletmodal = document.getElementById("editwallet-accounts");
    var editwallet_closebtn = document.getElementById("editwallet-accounts-close");
    function editwalletaccount(data) {
        $('#edit-id').val(data.id);
        $('#edit-account-name').val(data.wallet.name);
        $('#edit-contact').val(data.contact);
        if(data.status==true){
            $('#edit-status').prop('checked', true).change();
        }
        $('#edit-form').attr('action', "{{route('admin.wallet-accounts.update')}}");
        editwalletmodal.style.display = "block";
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
