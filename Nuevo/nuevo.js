const form = document.getElementById('data')
const h3 = document.getElementById('res')
const duplicate = document.getElementById('duplicate')
const section = document.getElementById('main')
const backbtn = document.getElementById('volver')
let times = 0;
const t1 = document.getElementsByName('')
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
    dataF = new FormData(form)
    fetch('../PHP/nuevo.php',{
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
            form.reset()
        }else if(aux === '0'){
            h3.innerHTML = 'Error al capturar los datos'
            h3.className = 'bad'
        }else{
            console.log(aux)
        }
    }).catch(err =>{
        console.log(err);
    })
})
duplicate.addEventListener('click', e => {
    formI = new FormData(form)
    times++
    section.innerHTML += `
    <form id="data${times}">
    Zona: <select class="option" name="Zona">
        <option value="CDMX">CDMX</option>
        <option value="GDL">GDL</option>
        <option value="MTY">MTY</option>
        <option value="CUN">CUN</option>
        <option value="SJD">SJD</option>
        <option value="QRO">QRO</option>
    </select><br>
    <label>Fecha de carga</label><input type="date" name="FechaC" value="${formI.get('FechaC')}">
    <label>Hora de carga</label><input type="text" name="HoraC" value="${formI.get('HoraC')}">
    <label>Fecha de entrega</label><input type="date" name="FechaE" value="${formI.get('FechaE')}">
    <label>Hora de entrega</label><input type="text" name="HoraE" value="${formI.get('HoraE')}">
    <label>Dirección de entrega</label><input type="text" name="DireccionE" value="${formI.get('DireccionE')}">
    <label>Razón social</label><input type="text" name="RazonS" value="${formI.get('RazonS')}">
    <label>Datos de contacto</label><input type="text" name="DatosC" value="${formI.get('DatosC')}">
    <label>SO</label><input type="text" name="SO" value="${formI.get('SO')}">
    <label>Factura</label><input type="text" name="Factura" value="${formI.get('Factura')}">
    <label>Numero de piezas</label><input type="text" name="NumeroP" value="${formI.get('NumeroP')}">
    <label>Numero de cajas</label><input type="text" name="NumeroC" value="${formI.get('NumeroC')}">
    <label>Numero de Tarimas</label><input type="text" name="NumeroT" value="${formI.get('NumeroT')}">
    <label>Tipo de transporte</label><input type="text" name="TipoT" value="${formI.get('TipoT')}">
    <label>Placas</label><input type="text" name="pla" value="${formI.get('pla')}">
    <label>Operador</label><input type="text" name="Operador" value="${formI.get('Operador')}">
    <label>Maniobrista</label><input type="text" name="Maniobrista" value="${formI.get('Maniobrista')}">
    <label>Custodia</label><input type="text" name="Custodia" value="${formI.get('Custodia')}">
    <label>Hora de salida con custodia</label><input type="text" name="HoraSCC" value="${formI.get('HoraSCC')}">
    <label>Observaciones</label><input type="text" name="Observaciones" value="${formI.get('Observaciones')}">
    <button type="button" onclick="saveduplicated('data${times}',${times})">Guardar</button>
    <button type="button" onclick="deleteform('data${times}')">Eliminar</button>
    <a href="../tables/?city=CDMX"><button type="button">Regresar</button></a>
    <h3 id="res${times}"></h3>
    </form>
    `
})
function saveduplicated(id, number){
    let formD = document.getElementById(id)
    let tmph3 = document.getElementById(`res${number}`)
    data = new FormData(formD)
    fetch('../PHP/nuevo.php',{
        method: 'POST',
        body: data
    })
    .then(res => res.json())
    .then(data =>{
        let aux = data;
        console.log(data);
        if(aux === '1'){
            tmph3.innerHTML = 'Operación completada con éxito'
            tmph3.className = 'ok'
            alert('Completado!')
            dad = formD.parentNode
            dad.removeChild(formD)
        }else if(aux === '0'){
            tmph3.innerHTML = 'Error al capturar los datos'
            tmph3.className = 'bad'
        }else{
            console.log(aux)
        }
    }).catch(err =>{
        console.log(err);
    })
}
function deleteform(id){
    let elementtodelete = document.getElementById(id)
    dad = elementtodelete.parentNode;
    dad.removeChild(elementtodelete)
    alert('Eliminado')
}

backbtn.addEventListener('click', e =>{
    window.history.back()
})