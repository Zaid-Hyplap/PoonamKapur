@extends('layouts.app')
@section('title')
Reset Password
@endsection

@section('header')

<link href="{{url('assets/css/pages/login/classic/login-1.css')}}" rel="stylesheet" type="text/css" />

<style>
    .Control-label--showPassword {
        width: 32px;
        position: relative;
        left: 100%;
        text-align: right;
        margin-left: -36px;
        cursor: pointer;
    }



    .Button-spinner {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -13px;
        margin-top: -13px;
        opacity: 0;
    }

    .show-password {
        display: none;
    }

    .show-password:checked~.ControlInput--password {
        text-security: disc;
        -webkit-text-security: disc;
        -moz-text-security: disc;
    }

    .show-password:checked~.Control-label--showPassword .svg-toggle-password .closed-eye {
        opacity: 1;
        transition: opacity 300ms ease, height 400ms ease;
        width: 4px;
    }

    .svg-toggle-password {
        fill: rgba(0, 142, 214, 0.5);
    }

    .svg-toggle-password .closed-eye {
        opacity: 0;
        height: 0;
    }

    .Button {
        padding: 10px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .spinner {
        -webkit-animation: dash 2s linear infinite;
        animation: dash 2s linear infinite;
        -webkit-animation-direction: normal;
        animation-direction: normal;
    }

    @-webkit-keyframes dash {
        0% {
            stroke-dashoffset: 0;
            stroke-dasharray: 150.6 100.4;
        }

        50% {
            stroke-dasharray: 1 250;
        }

        100% {
            stroke-dashoffset: 502;
            stroke-dasharray: 150.6 100.4;
        }
    }

    @keyframes dash {
        0% {
            stroke-dashoffset: 0;
            stroke-dasharray: 150.6 100.4;
        }

        50% {
            stroke-dasharray: 1 250;
        }

        100% {
            stroke-dashoffset: 502;
            stroke-dasharray: 150.6 100.4;
        }
    }

    @-webkit-keyframes spinner-in {
        0% {
            opacity: 0;
        }

        20%,
        80% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    @keyframes spinner-in {
        0% {
            opacity: 0;
        }

        20%,
        80% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }
</style>

@endsection
@section('content')
<div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
    <div class="login-form login-signin">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">Reset Password</h3>
            <p class="text-muted font-weight-bold">Verify your old credentials</p>
        </div>
        <form action="resetPass" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label>Registered Phone Number</label>
                        <input type="text" class="form-control" onkeyup="checkPhone()" id="phone" name="phone" required>
                    </div>
                    <label id="label2" style=" visibility: hidden;"></label>
                </div>
                <div class="col-md-6" id="op">
                    <label>Old Password</label>
                    <div class="form-group mb-4">

                        <input type="password" class="form-control" onkeyup="checkPass()" id="oldpass" name="pass" required>

                        <!-- <input type="checkbox" id="show-password" class="show-password" checked /> -->
                        <!-- <span  class="svg-icon  errspan svg-icon-3x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="30" height="30" />
                                    <path d="M3,12 C3,12 5.45454545,6 12,6 C16.9090909,6 21,12 21,12 C21,12 16.9090909,18 12,18 C5.45454545,18 3,12 3,12 Z" fill="#00FF00" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M12,15 C10.3431458,15 9,13.6568542 9,12 C9,10.3431458 10.3431458,9 12,9 C13.6568542,9 15,10.3431458 15,12 C15,13.6568542 13.6568542,15 12,15 Z" fill="#00FF00" opacity="0.3" />
                                </g>
                            </svg></span> -->

                        <!-- <input type="text" onkeyup="checkPass()" id="oldpass" required class="form-control ControlInput--password"><label for="show-password" class=" Control-label--showPassword">
                            <svg style="margin-top: -60px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32" class="svg-toggle-password" title="Toggle Password Security">
                                <path d="M24,9A23.654,23.654,0,0,0,2,24a23.633,23.633,0,0,0,44,0A23.643,23.643,0,0,0,24,9Zm0,25A10,10,0,1,1,34,24,10,10,0,0,1,24,34Zm0-16a6,6,0,1,0,6,6A6,6,0,0,0,24,18Z" />
                                <rect x="20.133" y="2.117" height="44" transform="translate(23.536 -8.587) rotate(45)" class="closed-eye" />
                                <rect x="22" y="3.984" width="4" height="44" transform="translate(25.403 -9.36) rotate(45)" style="fill: #fff" class="closed-eye" />
                            </svg>
                        </label></input> -->
                    </div>

                    <!-- <style type="text/css">
                        .errspan {
                            float: right;
                            margin-top: -40px;
                            position: relative;
                            z-index: 2;
                            color: red;
                        }
                    </style> -->
                    <label id="label3" style=" visibility: hidden;"></label>
                </div>

            </div>


            <div class="form-group mb-4" id="np" style="display: none;">
                <label>Enter New Password</label>
                <input type="password" class="form-control" id="newpass" name="newpass">
            </div>
            <div class="form-group mb-4" id="cp" style="display: none;">
                <label>Confirm New Password</label>
                <input type="password" onkeyup="checkPass()" class="form-control" id="confirmpass" name="confirmpass">
                <label id="labelll" style=" display: none;">Password does not match</label>
            </div>

            <button type="submit" style="display: none;" disabled id="resetbtn" class="btn btn-block btn-primary mb-4">Reset password</button>
            <!-- <p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.html" class="f-w-400">Signup</a></p> -->
        </form>
    </div>
</div>
@endsection

@section('scripts')

<script>
    function checkPass() {
        var pass = document.getElementById('newpass').value;
        var cpass = document.getElementById('confirmpass').value;
        var labelll = document.getElementById('labelll');
        var resetbtn = document.getElementById('resetbtn');

        if (pass != cpass) {
            labelll.style.display = 'block';
            labelll.style.color = 'red';
        } else if (pass == cpass) {
            labelll.innerHTML = 'Passwords Matches'
            labelll.style.display = 'block';
            labelll.style.color = 'green';
            resetbtn.disabled = false;
        }
    };

    function checkPhone() {
        var phone = document.getElementById('phone').value;
        var label2 = document.getElementById('label2');

        $.ajax({
            type: "POST",
            url: "/checkPhone",
            data: {
                "_token": "{{ csrf_token() }}",
                'phone': phone,
            },
            dataType: "json",
            success: function(response) {
                label2.innerHTML = "User exists";
                label2.style.visibility = 'visible';
                label2.style.color = 'green';
            },
            error: function(response) {
                label2.innerHTML = "User does not exists";
                label2.style.visibility = 'visible';
                label2.style.color = 'red';
            }
        });
    }

    function checkPass() {
        var phone = document.getElementById('phone').value;
        var oldpass = document.getElementById('oldpass').value;
        var label3 = document.getElementById('label3');

        $.ajax({
            type: "POST",
            url: "/checkPass",
            data: {
                "_token": "{{ csrf_token() }}",
                'phone': phone,
                'oldpass': oldpass,
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                if (response.status == 201) {
                    label3.innerHTML = "Password Correct";
                    label3.style.visibility = 'visible';
                    label3.style.color = 'green';

                    document.getElementById('np').style.display = "block";
                    document.getElementById('cp').style.display = "block";
                    document.getElementById('resetbtn').style.display = "block";

                } else {
                    label3.innerHTML = "Password Incorrect";
                    label3.style.visibility = 'visible';
                    label3.style.color = 'red';
                }
            },
            error: function(response) {
                label3.innerHTML = "Enter phone number first";
                label3.style.visibility = 'visible';
                label3.style.color = 'red';
            }
        });



    }
</script>

@endsection