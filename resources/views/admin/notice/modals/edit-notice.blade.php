<div class="modal" id="editnotice">
    <div class="modal-content modal-wallet">
        <div class="modal-header">
            <span class="modal-header-title">Edit notice</span>
            <i class="fa fa-times close" id="editnotice-close"></i>
        </div>
        <div class="modal-body">
            <form method="post" id="edit-form">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" id="edit-id">
                <div class="form-input">
                    <label for="notice-name">title</label><br />
                    <input type="text" class="notice-input" name="title" id="edit-title" />
                </div>
                <div class="form-input">
                    <label for="buy-rate">Content</label><br />
                    <textarea name="content" id="edit-content" cols="20" rows="5"></textarea>
                </div>
                <div class="form-input">
                    <input type="checkbox" name="is_active" id="edit-is_active" data-onstyle="success"
                        data-offstyle="danger" data-toggle="toggle" data-on="Enable" data-off="Disable"
                        data-width="100">
                </div>
                <div class="save-notice">
                    <input type="submit" value="Save" />
                </div>
            </form>
        </div>
    </div>
</div>
