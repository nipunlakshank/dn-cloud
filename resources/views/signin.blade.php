<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/login.css" rel="stylesheet" />
</head>
<body class="container-fluid main" onload="checkTheme();" id="main" >
<div class="bg-wrapper">
    <div class="offset-1 col-10">
        <div class="row login-div-main d-flex justify-content-center">
            <div class="col-12">
                <div class="row d-flex justify-content-center align-items-start text-center">
                    <img src="img/logo.png" style="width: 230px;height: 200px;"/>
                </div>
                <div class="row d-flex justify-content-end align-items-center text-center mt-4">
                    <span class="fw-bold fs-color h4">Login to X</span>
                </div>
                <div class="row d-flex justify-content-end align-items-center text-center mt-2">
                    <span class="fs-color lable-fs">Welcome</span><span class="fs-color lable-fs">to the application</span>
                </div>
                <div class="row d-flex justify-content-center mt-4 mb-3" id="email-comp">
                    <div class="col-8 col-lg-4"><label class="text-center fs-color input-text">Your Email</label>
                        <input class="form-control border-3 input-login bg-transparent fs-color" type="text" id="email"/></div>
                </div>
                <div class="row d-flex justify-content-center mb-4" id="password-comp">
                    <div class="col-8 col-lg-4"><label class="text-center fs-color input-text">Your Password</label>
                        <input class="form-control border-3 input-login bg-transparent fs-color" type="password" id="password"/></div>
                </div>
                <div class="row d-flex justify-content-center mt-2 mb-4" >
                    <div class="col-8 col-lg-4"><button class="btn btn-main w-100" id="signin" onclick="check();">Sign In</button></div>
                </div>
                <div class="row d-flex justify-content-end align-items-center text-center mt-2 d-none" id="otp-text">
                    <span class="fs-color lable-fs">We sent an email to you!</span>
                </div>
                <div class="row d-flex justify-content-center mb-4 d-none" id="otp-comp">
                    <div class="col-8 col-lg-4"><label class="text-center fs-color input-text">Your OTP</label>
                        <input class="form-control border-3 input-login bg-transparent fs-color" id="otp" onkeypress="check();"/></div>
                </div>
                <div class="row d-flex justify-content-center mt-2 mb-4 d-none" id="confirm-comp" >
                    <div class="col-8 col-lg-4"><button class="btn btn-main w-100" onclick="check();">Confirm</button></div>
                </div>
                <div class="row d-flex justify-content-end align-items-center text-center mt-5">
                    <span class="fs-color fs-small">Need help? <a class="lable-fs">X FAQ</a></span>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <script src="js/script.js"></script>
</body>
</html>
