const form = document.getElementById('data')
const h3 = document.getElementById('res')
fetch('../PHP/sessioncheck.php')
.then(res => res.json())
.then(ans =>{
    let aux = ans
    if(aux === '1'){
    }else{
        window.location.assign('../')
    }
})

form.addEventListener('submit', e =>{
    e.preventDefault()
    let dataF = new FormData(form)
    fetch('../PHP/editar.php',{
        method: 'POST',
        body: dataF
    })
    .then(res => res.json())
    .then(data =>{
        let aux = data;
        console.log(data);
        if(aux === '1'){
            h3.innerHTML = 'Operación completada con éxito'
            h3.className = 'ok'
        }else if(aux === '0'){
            h3.innerHTML = 'Error al capturar los datos'
            h3.className = 'bad'
        }
    }).catch(err =>{
        h3.innerHTML = 'Error 500'
        h3.className = 'bad'
    })
})