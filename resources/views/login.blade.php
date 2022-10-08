@extends('layouts.app')

@section('title')
Admin Login
@endsection

@section('header')

<link href="{{url('assets/css/pages/login/classic/login-1.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
<!-- <div class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
						<span class="font-weight-bold text-dark-50">Dont have an account yet?</span>
						<a href="javascript:;" class="font-weight-bold ml-2" id="kt_login_signup">Sign Up!</a>
					</div> -->
<div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
    <div class="login-form login-signin">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1"> Sign In</h3>
            <p class="text-muted font-weight-bold">Enter your Credentials</p>
        </div>

        <form class="form" novalidate="novalidate" id="kt_login_signin_form">
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Phone or Email" name="login" id="Login" autocomplete="off" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password" name="password" id="Password" autocomplete="off" />
            </div>
            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                <a href="javascript:;" class="text-dark-50 text-hover-primary my-3 mr-2" id="kt_login_forgot">Forgot Password ?</a>
                <button type="button" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Sign In</button>
            </div>
        </form>
    </div>

    <!-- <div class="login-form login-signup">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">Sign Up</h3>
            <p class="text-muted font-weight-bold">Enter your details to create your account</p>
        </div>
        
        <form class="form"  novalidate="novalidate" id="kt_login_signup_form">
            @csrf
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Fullname" name="fullname" autocomplete="off" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Email" name="email" autocomplete="off" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Password" name="password" autocomplete="off" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Confirm password" name="cpassword" autocomplete="off" />
            </div>
            <div class="form-group">
                <label class="checkbox mb-0">
                    <input type="checkbox" name="agree" />
                    <span></span>I Agree the
                    <a href="#">terms and conditions</a></label>
            </div>
            <div class="form-group d-flex flex-wrap flex-center">
                <button type="button" id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Submit</button>
                <button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Cancel</button>
            </div>
        </form>
       
    </div> -->

    <div class="login-form login-forgot">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">Forgotten Password ?</h3>
            <p class="text-muted font-weight-bold">Enter your registered phone number to reset your password</p>
        </div>
        <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
            <div class="form-group mb-3 text-right" style="display: none;" id="div">
                <label>OTP: </label> <input name="otp" id="otp" style="max-width: 40px;" disabled></input>
            </div>

            <div class="form-group mb-3" id="div1">
                <label id="phonetitle">Phone Number</label>
                <input type="text" maxlength="10" class="form-control" autocomplete="false" name="phone" id="phone" placeholder="Enter Registered Phone Number">
            </div>

            <div class="form-group mb-3" id="div2" style="display: none;">
                <label>Enter Otp</label>
                <input type="text" maxlength="10" class="form-control" name="entotp" id="entotp">
            </div>
            <div class="form-group mb-3" id="div3" style="display: none;">
                <label>Enter Your New Password</label>
                <input type="password" class="form-control" name="pass" id="pass">
                <label>Confirm Your New Password</label>
                <input type="password" class="form-control" name="pass" id="cpass">
            </div>

            <button type="button" class="btn btn-primary btn-block mb-4 getotp" id="getotpbtn">Get Otp</button>
            <div id="div4" style="display: none;">
                <div class="row">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-primary  mb-4 resendotpbtn">Resend Otp</button>

                    </div>
                    <div class="col-sm-6 text-right">
                        <button type="button" class="btn btn-primary  mb-4 checkotpbtn">Validate Otp</button>

                    </div>

                </div>
            </div>

            <button type="button" class="btn btn-primary btn-block mb-4 changepass" id="changepass" style="display: none; ">Change Password</button>

            <a href="javascript:;" class="text-dark-50 text-hover-primary my-3 mr-2" id="kt_loginn">Back to login ?</a>

        </form>
    </div>


</div>
@endsection

@section('scripts')

<script src="{{url('assets/js/pages/custom/login/login-general.js')}}"></script>

<script>
    $('.getotp').on('click', function() {
        var phone = document.getElementById('phone').value;
        var otp = document.getElementById('otp');

        if (phone == "") {
            alert('Phone Number Cannot be Empty')
        } else {
            $.ajax({
                type: "POST",
                url: "/forgetPassword",

                data: {
                    "_token": "{{ csrf_token() }}",
                    'phone': phone,
                },
                dataType: "json",
                success: function(data) {

                    if (data.status == 201) {
                        alert(data.message);
                    } else {

                        var val = Math.floor(1000 + Math.random() * 9000);
                        var divotp = document.getElementById('div2');
                        console.log(val);

                        otp.value = val;
                        div.style.display = 'block';
                        divotp.style.display = "block";

                        var getotpbtn = document.getElementById('getotpbtn');
                        getotpbtn.style.display = "none";

                        var div4 = document.getElementById('div4');
                        div4.style.display = "block";
                    }
                }
            });
        }

    });

    $(".resendotpbtn").click(function() {

        var val = Math.floor(1000 + Math.random() * 9000);
        console.log(val);
        otp.value = val;
    });

    $('.checkotpbtn').click(function() {

        var div = document.getElementById('div');
        var div1 = document.getElementById('div1');
        var div2 = document.getElementById('div2');
        var div3 = document.getElementById('div3');
        var div4 = document.getElementById('div4');

        var checkotpbtn = document.getElementById('checkotpbtn');
        var changepass = document.getElementById('changepass');

        if (otp.value == entotp.value) {
            div.style.display = "none";
            div1.style.display = "none";
            div2.style.display = "none";
            div3.style.display = "block";

            div4.style.display = "none";
            changepass.style.display = "block";

            console.log("otp matched");

        } else {
            alert("otp incorrect")
            console.log("otp incorrect");
        }

    });

    $(".changepass").click(function() {

        var phone = document.getElementById('phone').value;
        var pass = document.getElementById('pass').value;
        var cpass = document.getElementById('cpass').value;

        if (pass == cpass) {
            $.ajax({
                type: "POST",
                url: "/changePassword",

                data: {
                    "_token": "{{ csrf_token() }}",
                    'phone': phone,
                    'pass': pass,
                },
                dataType: "json",
                success: function(data) {
                    console.log('password changed successfully');
                    window.location.href = "/login";
                }
            });
        } else {
            alert('password does not match');
        }


    });
</script>



@endsection