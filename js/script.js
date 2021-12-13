const btnCadastro = document.getElementById("btn-cadastro");
var modal = document.getElementById("form-modal");
var boxModal = document.getElementById("box-modal");
const btnFechar = document.getElementById("btn-fechar");
var backOverlay = document.getElementById("back-overlay");
var modals = document.getElementsByClassName('modal-tarefa');
var btns = document.getElementsByClassName('btn-abrirM');
var btnsFechar = document.getElementsByClassName("btnFechar");
var btnsExcluir = document.getElementsByClassName("btn-excluir");
var caixasConfirmacao = document.getElementsByClassName("caixa-confirmacao");


btnCadastro.addEventListener("click", function () {
    modal.classList.remove("invisible");
    boxModal.classList.remove("invisible");
});

btnFechar.addEventListener("click", function () {
    modal.classList.add("invisible");
    boxModal.classList.add("invisible");
});

modals = Array.from(modals);
btns = Array.from(btns);
btnsFechar = Array.from(btnsFechar);
btnsExcluir = Array.from(btnsExcluir);
caixasConfirmacao = Array.from(caixasConfirmacao);

btns.forEach(btn => {
    btn.addEventListener('click', () => {
        const modalRem = modals[btns.indexOf(btn)]
        modalRem.classList.remove('invisible')
        backOverlay.classList.remove('invisible')
        for (modal of modals) {
            if (modal != modalRem) modal.classList.add('invisible')
        }      
    })
});

btnsFechar.forEach(btn => {
    btn.addEventListener('click', () => {
        for (modal of modals) {
            if (!(modal.classList.contains('invisible'))) {
                modal.classList.add('invisible')
                backOverlay.classList.add('invisible')
            }
        }
    })
});

btnsExcluir.forEach(btn => {
    btn.addEventListener('click', () => {
        const caixaCRem = caixasConfirmacao[btnsExcluir.indexOf(btn)]
        caixaCRem.classList.remove("invisible");
    })
});

var btnsBlock = document.getElementsByClassName("btn-block");
var inputs = document.getElementsByClassName("input");
var icons = document.getElementsByClassName("icon");
btnsBlock = Array.from(btnsBlock);
console.log(btnsBlock);
inputs = Array.from(inputs);
console.log(inputs);
icons = Array.from(icons);
btnsBlock.forEach(btn => {
    btn.addEventListener('click', () => {
        let pos = btnsBlock.indexOf(btn);
        if (icons[pos].classList.contains("fa-lock") && inputs[pos].readOnly == true) {
            inputs[pos].readOnly = false;
            icons[pos].classList.remove("fa-lock");
            icons[pos].classList.add("fa-unlock");            
        } else {
            inputs[pos].readOnly = true;
            icons[pos].classList.remove("fa-unlock");
            icons[pos].classList.add("fa-lock");
        }                          
    })
});