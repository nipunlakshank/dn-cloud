function change() {
    let main = document.getElementById("main");
    let img = document.getElementById("toggle-img");
    let dd1 = document.getElementById("dd-1");
    let dd2 = document.getElementById("dd-2");
    let dd3 = document.getElementById("dd-3");
    let offcanvas1 = document.getElementById("offcanvas-1");
  
    if (main.getAttribute("theme") == "light") {
      sessionStorage.setItem("theme","dark");
      main.setAttribute("theme", "dark");
      img.setAttribute("src", "img/black.png");
      dd1.setAttribute("data-bs-theme","dark");
      dd2.setAttribute("data-bs-theme","dark");
      dd3.setAttribute("data-bs-theme","dark");
      offcanvas1.setAttribute("data-bs-theme","dark");
      changeImages(false);
    } else {
      sessionStorage.setItem("theme","light");
      main.setAttribute("theme", "light");
      img.setAttribute("src", "img/white.png");
      dd1.setAttribute("data-bs-theme","light");
      dd2.setAttribute("data-bs-theme","light");
      dd3.setAttribute("data-bs-theme","light");
      offcanvas1.setAttribute("data-bs-theme","light");
      changeImages(true);
    }
  }

  function changeImages(check){
    if(check){
    document.getElementById("windows").setAttribute("src", "img/windows.png");
    document.getElementById("mac").setAttribute("src", "img/mac.png");
    document.getElementById("android").setAttribute("src", "img/android.png");
    document.getElementById("ios").setAttribute("src", "img/ios.png");
    document.getElementById("windows-canvas").setAttribute("src", "img/windows.png");
    document.getElementById("mac-canvas").setAttribute("src", "img/mac.png");
    document.getElementById("android-canvas").setAttribute("src", "img/android.png");
    document.getElementById("ios-canvas").setAttribute("src", "img/ios.png");}else{
      document.getElementById("windows").setAttribute("src", "img/windows-white.png");
    document.getElementById("mac").setAttribute("src", "img/mac-white.png");
    document.getElementById("android").setAttribute("src", "img/android-white.png");
    document.getElementById("ios").setAttribute("src", "img/ios-white.png");
    document.getElementById("windows-canvas").setAttribute("src", "img/windows-white.png");
    document.getElementById("mac-canvas").setAttribute("src", "img/mac-white.png");
    document.getElementById("android-canvas").setAttribute("src", "img/android-white.png");
    document.getElementById("ios-canvas").setAttribute("src", "img/ios-white.png");
    }
  }
  
  function checkTheme(){
      document.getElementById("main").setAttribute("theme",sessionStorage.getItem("theme"));
  }
  
  //Verify to code
  function check(){
    let email = document.getElementById("email");
    let password = document.getElementById("password");let signin = document.getElementById("signin");let emailComp = document.getElementById("email-comp");let passwordComp = document.getElementById("password-comp");let otpText = document.getElementById("otp-text");let otpComp = document.getElementById("otp-comp");let confirmComp = document.getElementById("confirm-comp");

    email.classList.add("d-none");password.classList.add("d-none");signin.classList.add("d-none");emailComp.classList.add("d-none");passwordComp.classList.add("d-none");otpText.classList.remove("d-none");otpText.classList.add("d-block");otpComp.classList.remove("d-none");otpComp.classList.add("d-block");confirmComp.classList.remove("d-none");confirmComp.classList.add("d-block");
}
  
  