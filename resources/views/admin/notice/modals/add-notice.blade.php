<div class="modal" id="addnotice">
    <div class="modal-content modal-wallet">
        <div class="modal-header">
            <span class="modal-header-title">Add notice</span>
            <i class="fa fa-times close" id="addnotice-close"></i>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.notice.store')}}" method="post">
                @csrf
                <div class="form-input">
                    <label for="notice-name">title</label><br />
                    <input type="text" class="notice-input" name="title" id="title" />
                </div>
                <div class="form-input">
                    <label for="buy-rate">Content</label><br />
                    <textarea name="content" id="" cols="20" rows="5"></textarea>
                </div>
                <div class="form-input">
                    <input type="checkbox" name="is_active" id="is_active" data-onstyle="success" data-offstyle="danger"
                        data-toggle="toggle" data-on="Enable" data-off="Disable" data-width="100">
                </div>
                <div class="save-notice">
                    <input type="submit" value="Save" />
                </div>
            </form>
        </div>
    </div>
</div>
