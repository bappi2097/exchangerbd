<div class="modal" id="editwallet-accounts">
    <div class="modal-content modal-wallet">
        <div class="modal-header">
            <span class="modal-header-title">Edit Wallet</span>
            <i class="fa fa-times close" id="editwallet-accounts-close"></i>
        </div>
        <div class="modal-body">
            <form method="post" id="edit-form">
                @method('PUT')
                @csrf
                <input type="hidden" id="edit-id" name="id">
                <div class="form-input">
                    <label for="edit-account-name">Wallet Name</label><br />
                    <input type="text" class="wallet-input" id="edit-account-name" disabled />
                </div>
                <div class="form-input">
                    <label for="edit-contact">Contact</label><br />
                    <input type="text" class="wallet-input" name="contact" id="edit-contact" />
                </div>
                <div class="form-input">
                    <input type="checkbox" name="status" id="edit-status" data-onstyle="success" data-offstyle="danger"
                        data-toggle="toggle" data-on="Enable" data-off="Disable" data-width="100">
                </div>
                <div class="save-wallet">
                    <input type="submit" value="Update" />
                </div>
            </form>
        </div>
    </div>
</div>
