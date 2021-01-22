<div class="modal" id="addwallet">
    <div class="modal-content modal-wallet">
        <div class="modal-header">
            <span class="modal-header-title">Add Wallet</span>
            <i class="fa fa-times close" id="addwallet-close"></i>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.wallet.store')}}" method="post">
                @csrf
                <div class="form-input">
                    <label for="wallet-name">Wallet Name</label><br />
                    <input type="text" class="wallet-input" name="name" id="name" />
                </div>
                <div class="form-input">
                    <label for="buy-rate">Buy Rate</label><br />
                    <input type="text" class="wallet-input" name="buy" id="buy" />
                </div>
                {{-- <div class="form-input">
                    <label for="wallet-name">Wallet Name</label><br />
                    <input type="file" class="wallet-file" name="wallet_img" id="wallet-img" />
                </div> --}}
                <div class="form-input">
                    <label for="sell-rate">Sell Rate</label><br />
                    <input type="text" class="wallet-input" name="sell" id="sell" />
                </div>
                <div class="form-input">
                    <label for="add-reserve">Add Reserve</label><br />
                    <input type="text" class="wallet-input" name="reserve" id="reserve" />
                </div>
                <div class="form-input">
                    <label for="minimum">Minimum</label><br />
                    <input type="text" class="wallet-input" name="minimum" id="minimum" />
                </div>
                <div class="form-input">
                    <label for="cost">Cost</label><br />
                    <input type="text" class="wallet-input" name="cost" id="cost" />
                </div>
                <div class="form-input">
                    <label for="original_reserve">Original Reserve</label><br />
                    <input type="text" class="wallet-input" name="original_reserve" id="original_reserve" />
                </div>
                <div class="form-input">
                    <label for="original_cost">Original Cost</label><br />
                    <input type="text" class="wallet-input" name="original_cost" id="original_cost" />
                </div>
                <div class="form-input">
                    <input type="checkbox" name="is_bd" id="currency" data-onstyle="success" data-offstyle="danger"
                        data-toggle="toggle" data-on="Taka" data-off="USD">
                </div>
                <div class="save-wallet">
                    <input type="submit" value="Save" />
                </div>
            </form>
        </div>
    </div>
</div>
