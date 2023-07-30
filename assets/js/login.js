let password = document.getElementById("password");
let confirmPassword = document.getElementById("confirm_password");
let message = document.getElementById("message")
let allowSignIn = 0

function keepChecking(){  
    if(password.value==""||confirmPassword.value==""){
        message.textContent = ""
        allowSignIn = 0
    }
    else if(password.value===confirmPassword.value){
        message.textContent = "Password Matched!"
        message.style.color = "lightgreen"
        message.style.fontSize = "bolder"
        message.style.paddingLeft = "10px" 
        allowSignIn = 1
    }
    else{
        message.textContent = "Oops Password did'nt Match!"
        message.style.color = "pink"
        message.style.fontSize = "bolder"
        message.style.paddingLeft = "10px" 
        allowSignIn = 0
    }

}
setInterval(keepChecking,100)
