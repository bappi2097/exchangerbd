<div class="modal" id="editwallet">
    <div class="modal-content modal-wallet">
        <div class="modal-header">
            <span class="modal-header-title">Edit Wallet</span>
            <i class="fa fa-times close" id="editwallet-close"></i>
        </div>
        <div class="modal-body">
            <form method="post" id="edit-form">
                @method('PUT')
                @csrf
                <input type="hidden" id="edit-id" name="id">
                <div class="form-input">
                    <label for="edit-name">Wallet Name</label><br />
                    <input type="text" class="wallet-input" name="name" id="edit-name" />
                </div>
                <div class="form-input">
                    <label for="edit-buy">Buy Rate</label><br />
                    <input type="text" class="wallet-input" name="buy" id="edit-buy" />
                </div>
                {{-- <div class="form-input">
                    <label for="wallet-name">Wallet Name</label><br />
                    <input type="file" class="wallet-file" name="wallet_file" id="wallet-file" />
                </div> --}}
                <div class="form-input">
                    <label for="edit-sell">Sell Rate</label><br />
                    <input type="text" class="wallet-input" name="sell" id="edit-sell" />
                </div>
                <div class="form-input">
                    <label for="add-reserve">Add Reserve</label><br />
                    <input type="text" class="wallet-input" name="reserve" id="edit-reserve" />
                </div>
                <div class="form-input">
                    <label for="edit-minimum">Minimum </label><br />
                    <input type="text" class="wallet-input" name="minimum" id="edit-minimum" />
                </div>
                <div class="form-input">
                    <label for="edit-cost">Cost</label><br />
                    <input type="text" class="wallet-input" name="cost" id="edit-cost" />
                </div>
                <div class="form-input">
                    <label for="edit_original_reserve">Original Reserve</label><br />
                    <input type="text" class="wallet-input" name="original_reserve" value="0" />
                </div>
                <div class="form-input">
                    <label for="edit_original_cost">Original Cost</label><br />
                    <input type="text" class="wallet-input" name="original_cost" id="edit_original_cost" />
                </div>
                <div class="form-input">
                    <input type="checkbox" name="is_bd" id="edit-currency" data-onstyle="success" data-offstyle="danger"
                        data-toggle="toggle" data-on="Taka" data-off="USD">
                </div>
                <div class="save-wallet">
                    <input type="submit" value="Update" />
                </div>
            </form>
        </div>
    </div>
</div>
