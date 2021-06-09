const form = document.getElementById('data')
const h3 = document.getElementById('res')
const con1 = document.getElementById('con1')
const con2 = document.getElementById('con2')
form.addEventListener('submit', e =>{
    e.preventDefault()
    let dataF = new FormData(form)
    fetch('../PHP/newuser.php', {
        method: 'POST',
        body: dataF
    })
    .then(res => res.json())
    .then(data =>{
        let aux = data
        if(con1.value === con2.value){
        if(aux === '1'){
            window.location.assign('../')
        }else if(aux === '2'){
            h3.innerHTML = 'Llenar campos'
            h3.className = 'bad'
        }else{
            h3.innerHTML = 'El correo ya existe'
        }
    }else{
        alert('Las contraseñas no son iguales') 
    }
    }).catch(err =>{
        h3.innerHTML = 'correo existente'
    })
})