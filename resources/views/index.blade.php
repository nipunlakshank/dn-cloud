<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dn Clouds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="container-fluid main" theme="light" id="main">
    <div class="offset-1 col-10">
        <nav class="navbar navbar-expand-lg py-4">
            <div class="container-fluid">
                <div><img src="img/logo.png" style="width: 55px;height: 55px;"/><a class="navbar-brand ms-3 fw-bolder fs-color" href="#">X</a></div>
                <button class="btn d-md-none" type="button" data-bs-toggle="collapse" id="offcanvas-1"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown me-md-2" id="dd-1">
                            <a class="nav-link dropdown-toggle fs-color" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                FAQ
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item fs-color" href="#">Action</a></li>
                                <li><a class="dropdown-item fs-color" href="#">Another action</a></li>
                                <li><a class="dropdown-item fs-color" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-md-4" id="dd-2">
                            <a class="nav-link dropdown-toggle fs-color" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                EN
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item fs-color" href="#">Action</a></li>
                                <li><a class="dropdown-item fs-color" href="#">Another action</a></li>
                                <li><a class="dropdown-item fs-color" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <div class="mt-2 me-3" onclick="change();"><img src="img/white.png" id="toggle-img"
                                    style="width: 20px; height: 20px;" /></div>
                        </li>
                        <li class="nav-item dropdown me-md-4 d-md-none d-block" id="dd-3">
                            <a class="nav-link dropdown-toggle fs-color" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Download
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="ms-3"><img class="me-3" src="windows.png" id="windows-canvas"
                                            style="width: 20px; height: 20px;" /><span class="fw-bold fs-color">X for
                                            Windows</span></div>
                                </li>
                                <li>
                                    <div class="ms-3"><img class="me-3" src="mac.png" id="mac-canvas"
                                            style="width: 20px; height: 20px;" /><span class="fw-bold fs-color">X for
                                            MacOS</span></div>
                                </li>
                                <li>
                                    <div class="ms-3"><img class="me-3" src="android.png" id="android-canvas"
                                            style="width: 20px; height: 20px;" /><span class="fw-bold fs-color">X for
                                            Android</span></div>
                                </li>
                                <li>
                                    <div class="ms-3"><img class="me-3" src="ios.png" id="ios-canvas"
                                            style="width: 20px; height: 20px;" /><span class="fw-bold fs-color">X for
                                            IOS</span></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="me-5">
                        <button class="btn btn-main "><a class="text-decoration-none" href="/signin">Open in Browser</a></button>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row div-row-1 pt-4 mt-4">
            <div class="offset-2 col-8 d-flex justify-content-center align-items-center">
                <span class="fw-bold fs-color">X is space for Teamwork</span>
            </div>
            <div class="offset-2 col-8 mt-2 d-flex justify-content-center align-items-center text-center text-md-start">
                <span class="fs-color">Secure communication and file sharing within the company</span>
            </div>
        </div>
        <div class="row div-row-2 pt-4 d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-7">
                <img class="img-main w-100 h-100" src="img/background.png" />
            </div>
            <div class="col-md-4 d-none d-md-flex h-100 d-flex align-items-center">
                <div class="row"><span class="h4 fw-bold fs-color">Select a device to Download</span>
                    <div class="mt-4"><img class="me-3" src="img/windows.png" style="width: 20px; height: 20px;" id="windows"/><span
                            class="fw-bold fs-color">X for Windows</span></div>
                    <label class="lable-fs">Available for Windows 7+</label>
                    <div class="mt-2"><img class="me-3" src="img/mac.png" style="width: 20px; height: 20px;" id="mac"/><span
                            class="fw-bold fs-color">X for MacOS</span></div>
                    <label class="lable-fs">Available for MacOS 10.11+</label>
                    <div class="mt-2"><img class="me-3" src="img/android.png" style="width: 20px; height: 20px;" id="android"/><span
                            class="fw-bold fs-color">X for Android</span></div>
                    <label class="lable-fs">Available for Android 10+</label>
                    <div class="mt-2"><img class="me-3" src="img/ios.png" style="width: 20px; height: 20px;" id="ios" /><span
                            class="fw-bold fs-color">X for IOS</span></div>
                    <label class="lable-fs">Available for IOS 10+</label>
                </div>


            </div>
        </div>
        <div>
            <hr class="fs-color">
        </div>
        <div class="row mb-5">
            <span class="col-12 col-md-9 lable-fs text-center text-md-start">&copy; Copyright X 2024</span><span
                class="col-12 col-md-2 lable-fs text-center text-md-end">Support@x.com</span>
        </div>
    </div>

    
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <script src="js/script.js"></script>
</body>
</html>