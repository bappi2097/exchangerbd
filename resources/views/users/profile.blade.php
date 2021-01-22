@extends('layouts.index')

@section('body')
    <div class="profilec">
        <form action="{{route('user.update')}}" method="post">
            @method('PUT')
            @csrf
            <div class="profile">
                <div class="user-image-div">
                    {{-- <img id="user-image" src="{{asset('logo/bappi.jpg')}}" alt="your image" width="105" height="112" /><br>
                    <input type='file' name="image" id="user-image-btn" style="display: none;" onchange="readURL(this);" accept="image/*"/>
                    <input type="button" value="Update Image"
                        onclick="document.getElementById('user-image-btn').click();" /> --}}
                </div>
                <div class="info">
                    <div class="form-input">
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" id="firstname" value="{{$user->firstname}}" required>
                    </div>
                    <div class="form-input">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" id="lastname" value="{{$user->lastname}}" required>
                    </div>
                    <div class="form-input">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="{{$user->email}}" required>
                    </div>
                    <div class="form-input">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" value="{{$user->address}}" value="34/4, shyamoli, Dhaka" required
                        >
                    </div>
                    <div class="form-input">
                        <label for="phone">Mobile No</label>
                        <input type="tel" name="phone" id="phone" value="{{$user->phone}}" autocomplete="off"
                            pattern="(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$" required />
                    </div>
                </div>
                <div class="buttons">
                    {{-- <button type="button" id="edit-all">Edit All</button> --}}
                    <button type="submit" id="save">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    {{-- <script>
        window.onload = function () {
            $("input").attr('disabled', 'disabled');
            $("#password").removeAttr('disabled');
            $("#confirm-password").removeAttr('disabled');
            $("[name='_token']").removeAttr('disabled');
            $("[name='_method']").removeAttr('disabled');
            $('#edit-all').removeAttr("display");
        }
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#user-image')
                        .attr('src', e.target.result)
                        .width(105)
                        .height(112);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#edit-all").click(function () {
            $('#edit-all').css("display", "none");
            $("input").removeAttr('disabled');
            $("form input:eq(1)").focus();
        });
    </script> --}}
@endpush
