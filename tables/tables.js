const table = document.getElementById('main');
const button1 = document.getElementsByClassName('eliminar')
fetch('../PHP/sessioncheck.php')
.then(res => res.json())
.then(ans =>{
    let aux = ans
    if(aux === '1'){
    }else{
        window.location.assign('../')
    }
})

function deleteP(id){
    let form = document.getElementById(id)
    let data = new FormData(form)
    let aux = confirm('¿Desea eliminar el proceso?')
    if(aux){
        fetch('../PHP/delete.php', {
            method: 'POST',
            body: data
        })
        .then( res => res.json())
        .then(dataF =>{
            if(dataF === '1'){
                window.location.reload()
            }else{
                alert('Error 500')
            }
        })
    }
}

function finishP(id){
    let form = document.getElementById(id)
    let data = new FormData(form)
    aux = confirm('¿Desea terminar el proceso?')
    if(aux){
        fetch('../PHP/finish.php', {
            method: 'POST',
            body: data
        })
        .then(res => res.json())
        .then(dataF =>{
            if(dataF === '1'){
                window.location.reload()
            }else if(dataF === '2'){
                alert('El proceso no está completado, no se pude terminar')
            }else{
                alert('Error 500')
            }
        })
    }

}

function updateP(id){
    let info = document.getElementById(id)
    let data = new FormData(info)
    aux = confirm('¿Seguro que desea realizar estos cambios?')
    if(aux){
        fetch('../PHP/editar.php',{
            method: 'POST',
            body: data
        })
        .then(res => res.json())
        .then(dataF =>{
            if(dataF === '1'){
                alert('Completado!')
            }else{
                alert(dataF)
            }
        })
    }
}

function copytoclip(id){
    let text = document.getElementById(id)
    text.select();
    text.setSelectionRange(0, 99999)
    document.execCommand('copy')
    alert('copiado al portapapeles!!')
}
