<div class="modal" id="addwallet-accounts">
    <div class="modal-content modal-wallet">
        <div class="modal-header">
            <span class="modal-header-title">Add Wallet</span>
            <i class="fa fa-times close" id="addwallet-accounts-close"></i>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.wallet-accounts.store')}}" method="post">
                @csrf
                <div class="form-input">
                    <label for="wallet-name">Wallet Name</label><br />
                    <select name="wallet_id" id="wallet_id">
                        <option value="choose">Choose</option>
                        @if (!$wallets->isEmpty())
                        @foreach ($wallets as $wallet)
                        <option value="{{$wallet->id}}">{{$wallet->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-input">
                    <label for="contact">Contact</label><br />
                    <input type="text" class="wallet-input" name="contact" id="contact" />
                </div>
                <div class="form-input">
                    <input type="checkbox" name="status" id="currency" data-onstyle="success" data-offstyle="danger"
                        data-toggle="toggle" data-on="Enable" data-off="Disable" data-width="100">
                </div>
                <div class="save-wallet">
                    <input type="submit" value="Save" />
                </div>
            </form>
        </div>
    </div>
</div>
