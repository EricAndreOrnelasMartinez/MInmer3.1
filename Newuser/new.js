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
form.addEventListener('submit',e=>{
    e.preventDefault();
    let dataF = new FormData(form);
    if(dataF.get('mail') === '' || dataF.get('name') === '' || dataF.get('last') === '' || dataF.get('pass1') === '' || dataF.get('pass2') === '' || dataF.get('nivel') === ''){
        h3.innerHTML = 'Llenar todos los campos'
        h3.className = 'bad'
    }else{
        if(dataF.get('pass1') !== dataF.get('pass2')){
            h3.innerHTML = 'Contraseñas no son iguales'
            h3.className = 'bad'
        }else{
            fetch('../PHP/newuser.php',{
                method: 'POST',
                body: dataF
            })
            .then(res => res.json())
            .then(data =>{
                if(data === '0'){
                    h3.innerHTML = 'Usuario existente'
                    h3.className = 'bad'
                }else{
                    h3.innerHTML = 'Registrado!!'
                    h3.className = 'ok'
                }
            }).catch(err =>{
                h3.innerHTML = 'Usuario existente'
                h3.className = 'bad'
            })
        }
    }
})

function reload(){
    window.location.reload();
}