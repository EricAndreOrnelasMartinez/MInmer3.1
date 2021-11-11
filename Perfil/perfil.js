const form = document.getElementById('main')
const pasF = document.getElementById('pass')
const p1 = document.getElementById('p')
const p2 = document.getElementById('p2')
fetch('../PHP/getprofile.php')
.then(res => res.json())
.then(dataF =>{
    for(i in dataF){
        let output = `
        Email <input type="text" value="${dataF[i].Mail}" name="mail"/>
        Nombre <input type="text" value="${dataF[i].Nombre}" name="nombre"/>
        Apellido <input type="text" value="${dataF[i].Apellido}" name="apellido"/>
        Mes <input type="text" value="${dataF[i].Moth}" name="Moth"/>
        Año <input type="number" value="${dataF[i].MothT}" name="MothT"/>
        <input type="submit" value="Actualizar"/>
        <a href="../tables/?city=CDMX"><button type="button">Volver</button></a>
        <h2 id="res"></h2>
        `
        form.innerHTML = output
    }
})
form.addEventListener('submit', e =>{
    e.preventDefault()
    const h2 = document.getElementById('res')
    let data = new FormData(form)
    fetch('../PHP/updateprofile.php', {
        method: 'POST',
        body: data
    })
    .then(res => res.json())
    .then(dataF =>{
        if(dataF === '1'){
            h2.innerHTML = 'Actualizado!'
            h2.className = 'ok'
        }else{
            h2.innerHTML = 'Error 500'
            h2.className = 'bad'
        }
    })
})

pasF.addEventListener('submit', e =>{
    e.preventDefault()
    let data = new FormData(pasF)
    if(p1.value === p2.value){
        console.log('bien')
        fetch('../PHP/updatepass.php', {
            method: 'POST',
            body: data
        })
        .then(res => res.json())
        .then(dataF =>{
            if(dataF === '1'){
                alert('Contraseña actualizada')
                pasF.reset()
            } else if (dataF === '2'){
                alert('La contraseña es incorrecta')
                pasF.reset()
            }else{
                alert('Error 500')
            }
        })
    }else{
        alert('Las contrseñas no son iguales')
    }
})