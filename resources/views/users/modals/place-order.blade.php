@push('link-css')
<style>
    #wallet_account_id {
        font-size: 14px;
        border: none;
        width: 80%;
        height: 25px;
        border-bottom: 2px solid white;
        border-radius: 4px;
    }
</style>
@endpush
@auth
@push('link-css')
<link rel="stylesheet" href="{{asset('css/modal-place-order.min.css')}}">
@endpush
@endauth


<div class="modal" id="ordermodal">
    <div class="modal-content modal-content-reg">
        <div class="modal-header">
            <span class="modal-header-title">Place Order</span>
            <i class="fa fa-times close" id="orderclose"></i>
        </div>
        <div class="modal-body">
            <form class="form-reg" action="{{route('user.place-order')}}" method="post" autocomplete="off">
                <p style="font-size:13px; color:red; padding:0 10%; text-align: center;">If you are buying less then 30
                    USD please add an amount of extra 80 TK !</p>
                @csrf
                <div class="seperate-div">
                    <div class="input-form">
                        <label for="">Send Us Wallet</label>
                        <br>
                        <input type="text" id="send_wallet_name" disabled>
                        <input type="hidden" name="send_wallet_name" id="send_wallet_name_1" required>
                    </div>
                    <div class="input-form">
                        <label for="">Our Number/Email</label>
                        <br>
                        <select name="wallet_account_id" id="wallet_account_id">
                            <option selected>Choose</option>
                        </select>
                    </div>
                    <div class="input-form">
                        <label for="">Send Amount</label>
                        <br>
                        <input type="text" id="send_amount" disabled>
                        <input type="hidden" name="send_amount" id="send_amount_1" required>
                    </div>
                    <div class="input-form">
                        <label for="">Your Sending Number/Email</label>
                        <br>
                        <input type="text" name="sending_contact" id="sending_contact" required>
                    </div>
                </div>
                <div class="seperate-div">
                    <div class="input-form">
                        <label for="receive_wallet_name">You will Receive</label>
                        <br>
                        <input type="text" id="receive_wallet_name" disabled>
                        <input type="hidden" name="receive_wallet_name" id="receive_wallet_name_1" required>
                    </div>
                    <div class="input-form">
                        <label for="receiving_contact">Your Receving Email/Number</label>
                        <br>
                        <input type="text" name="receiving_contact" id="receiving_contact" required>
                    </div>
                    <div class="input-form">
                        <label for="receive_amount">Receive Amount</label>
                        <br>
                        <input type="text" id="receive_amount" disabled>
                        <input type="hidden" name="receive_amount" id="receive_amount_1" required>
                    </div>
                    <div class="input-form">
                        <label for="tnxid">TNXID</label>
                        <br>
                        <input type="text" name="tnxid" id="tnxid" required>
                    </div>
                </div>
                <div class="reg-btn">
                    <input type="submit" value="Place Order" id="order-submit" />
                </div>
            </form>
        </div>
    </div>
</div>

@auth
@push('js')
<script src="{{asset('js/modal-place-order.js')}}"></script>
@endpush
@endauth