<form action="#" method="post">
    <div class="box">
        <div class="order-box">
            <div class="order-sub-box">
                <label for="bd-wallet">Send Us</label>
                <select class="custom-select is-primary selectc" id="send-us">
                    <option selected>Choose</option>
                </select>
            </div>
            <div class="order-sub-box">
                <label for="bd-wallet">Amount</label>
                <input type="text" name="bd_amount" id="send-amount" class="bd-amount" placeholder="&#2547;" />
            </div>
            <div class="order-sub-box">
                <!-- <img src="logo/equal.png" alt="==" /> -->
                <i class="fa fa-exchange img" aria-hidden="true"></i>
            </div>
            <div class="order-sub-box">
                <label for="bd-wallet">Receive In</label>
                <select class="custom-select is-primary selectc" id="receive-in">
                    <option selected>Choose</option>
                </select>
            </div>
            <div class="order-sub-box">
                <label for="bd-wallet">Amount</label>
                <input type="text" name="bd_amount" id="receive-amount" class="bd-amount" placeholder="&#36;" />
            </div>
        </div>
    </div>
    @auth
    <div class="btnc">
        <input type="button" value="PLACE ORDER" class="btn btn-cust" id="orderbtn" />
    </div>
    @else
    <div class="btnc">
        <input type="button" value="PLACE ORDER" class="btn btn-cust" onclick="toastr.error('Please Login First');" />
    </div>
    @endauth
</form>
