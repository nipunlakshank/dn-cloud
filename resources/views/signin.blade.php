<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="css/login.css" rel="stylesheet" />
    </head>

    <body class="container-fluid main" onload="checkTheme();" id="main">
        <div class="offset-1 col-10">
            <div class="row login-div-main d-flex justify-content-center">
                <form action="/login" method="post" class="col-12">
                    @csrf
                    <div class="row d-flex justify-content-center align-items-start text-center">
                        <img src="img/logo.png" style="width: 230px;height: 200px;" />
                    </div>
                    <div class="row d-flex justify-content-end align-items-center mt-4 text-center">
                        <span class="fw-bold fs-color h4">Login to X</span>
                    </div>
                    <div class="row d-flex justify-content-end align-items-center mt-2 text-center">
                        <span class="fs-color lable-fs">Welcome</span><span class="fs-color lable-fs">to the
                            application</span>
                    </div>
                    <div class="row d-flex justify-content-center mb-3 mt-4" id="email-comp">
                        <div class="col-8 col-lg-4"><label class="fs-color input-text text-center">Your Email</label>
                            <input class="form-control border-3 input-login fs-color bg-transparent" type="text"
                                id="email" />
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center mb-4" id="password-comp">
                        <div class="col-8 col-lg-4"><label class="fs-color input-text text-center">Your Password</label>
                            <input class="form-control border-3 input-login fs-color bg-transparent" type="password"
                                id="password" />
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center mb-4 mt-2">
                        <div class="col-8 col-lg-4">
                            <!-- <a href="/login" class="btn btn-main w-100" id="login">Log in</a> -->
                            <x-primary-button>Log in</x-primary-button>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end align-items-center d-none mt-2 text-center"
                        id="otp-text">
                        <span class="fs-color lable-fs">We sent an email to you!</span>
                    </div>
                    <div class="row d-flex justify-content-center d-none mb-4" id="otp-comp">
                        <div class="col-8 col-lg-4"><label class="fs-color input-text text-center">Your OTP</label>
                            <input class="form-control border-3 input-login fs-color bg-transparent" id="otp"
                                onkeypress="check();" />
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center d-none mb-4 mt-2" id="confirm-comp">
                        <div class="col-8 col-lg-4"><button class="btn btn-main w-100"
                                onclick="check();">Confirm</button></div>
                    </div>
                    <div class="row d-flex justify-content-end align-items-center mt-5 text-center">
                        <span class="fs-color fs-small">Need help? <a class="lable-fs">X FAQ</a></span>
                    </div>
                </form>
            </div>
        </div>

        <script src="js/functions.js"></script>
        <script src="js/script.js"></script>
    </body>

</html>
