var btnsRevelaSenha = document.getElementsByClassName("btn-revelaSenha");
var inputsSenha = document.getElementsByClassName("inputSenha");
var iconsOlho = document.getElementsByClassName("iconOlho");
btnsRevelaSenha = Array.from(btnsRevelaSenha);
inputsSenha = Array.from(inputsSenha);
console.log(inputsSenha);
iconsOlho = Array.from(iconsOlho);
btnsRevelaSenha.forEach(btn => {
    btn.addEventListener("click", () =>{
        let pos = btnsRevelaSenha.indexOf(btn);
        if(iconsOlho[pos].classList.contains("fa-eye")){
            iconsOlho[pos].classList.toggle("fa-eye"); 
            iconsOlho[pos].classList.toggle("fa-eye-slash");        
            inputsSenha[pos].type = "text";
        } else{
            iconsOlho[pos].classList.toggle("fa-eye-slash");
            iconsOlho[pos].classList.toggle("fa-eye");
            inputsSenha[pos].type = "password";
        }
    })
});