const form = document.getElementById('main');
const table = document.getElementById('table')
const h2 = document.getElementById('res')
const select = document.getElementById('atribute')
const zone = document.getElementById('zone')
const query = document.getElementById('query')
const query2 = document.getElementById('query2')
const excel = document.getElementById('excel')
const backbtn = document.getElementById('volver')
fetch('../PHP/sessioncheck.php')
.then(res => res.json())
.then(ans =>{
    let aux = ans
    if(aux === '1'){
    }else{
        window.location.assign('../')
    }
})
form.addEventListener('submit', e  =>{
    e.preventDefault();
    let dataf = new FormData(form);
    fetch('../PHP/buscar.php',{
        method: 'POST',
        body: dataf
    })
    .then(res => res.json())
    .then(data =>{
    if((data.length > 0)){
    let output = `
    <tr>
    <td>Progreso</td>
    <td>Zona</td>
    <td>Fecha de carga</td>
    <td>Hora de carga</td>
    <td>Fecha de entrega</td>
    <td>Hora de entrega</td>
    <td>Dirección de entrega</td>
    <td>Razón Social</td>
    <td>Datos de contacto</td>
    <td>SO</td>
    <td>Factura</td>
    <td>Número de piezas</td>
    <td>Número de cajas</td>
    <td>Número de tarimas</td>
    <td>Tipo de trasporte</td>
    <td>Placas</td>
    <td>Operador</td>
    <td>Maniobrista</td>
    <td>Custodia</td>
    <td>Pension</td>
    <td>Hora salida con Custodia</td>
    <td>Observaciones</td>
    <td>Evidencia</td>
    <td>Terminado</td>
    </tr>`;
    for(i in data){
        let total = 0;
        let color = '';
        if(isNotEmpty(data[i].Zona)){
            total += 5
        }
        if(isNotEmpty(data[i].FechaC)){
            total += 5
        }
        if(isNotEmpty(data[i].HoraC)){
            total += 5
        }
        if(isNotEmpty(data[i].FechaE)){
            total += 5
        }
        if(isNotEmpty(data[i].HoraE)){
            total += 5
        }
        if(isNotEmpty(data[i].DireccionE)){
            total += 5
        }
        if(isNotEmpty(data[i].RazonS)){
            total += 5
        }
        if(isNotEmpty(data[i].DatosC)){
            total += 5
        }
        if(isNotEmpty(data[i].SO)){
            total += 5
        }
        if(isNotEmpty(data[i].Factura)){
            total += 5
        }
        if(isNotEmpty(data[i].NumeroP)){
            total += 5
        }
        if(isNotEmpty(data[i].NumeroC)){
            total += 5
        }
        if(isNotEmpty(data[i].NumeroT)){
            total += 5
        }
        if(isNotEmpty(data[i].TipoT)){
            total += 5
        }
        if(isNotEmpty(data[i].Placas)){
            total += 5
        }
        if(isNotEmpty(data[i].Operador)){
            total += 5
        }
        if(isNotEmpty(data[i].Maniobrista)){
            total += 5
        }
        if(isNotEmpty(data[i].Custodia)){
            total += 5
        }
        if(isNotEmpty(data[i].HoraSCC)){
            total += 5
        }
        if(isNotEmpty(data[i].Observaciones)){
            total += 5
        }
        if(data[i].Terminado === 1){
            total += 5
        }
        if(total < 80){
            color = 'red'
        }else if(total < 99){
            color = 'yellow'
        }else if(total === 100){
            color = 'green'
        }
        output += `<tr class="${color}">
        <td>${total}%</td>
        <td>${data[i].Zona}</td>
        <td>${data[i].FechaC}</td>
        <td>${data[i].HoraC}</td>
        <td>${data[i].FechaE}</td>
        <td>${data[i].HoraE}</td>
        <td>${data[i].DireccionE}</td>
        <td>${data[i].RazonS}</td>
        <td>${data[i].DatosC}</td>
        <td>${data[i].SO}</td>
        <td>${data[i].Factura}</td>
        <td>${data[i].NumeroP}</td>
        <td>${data[i].NumeroC}</td>
        <td>${data[i].NumeroT}</td>
        <td>${data[i].TipoT}</td>
        <td>${data[i].Placas}</td>
        <td>${data[i].Operador}</td>
        <td>${data[i].Maniobrista}</td>
        <td>${data[i].Custodia}</td>
        <td>${data[i].HoraSCC}</td>
        <td>${data[i].Observaciones}</td>
        <td><a href="../tables/Evidencias/${zone.value}/${data[i].Factura}.pdf">Ir</a></td>
        <td>${data[i].Terminado}</td>
        </tr>`
        table.innerHTML = output;
        h2.innerHTML = ''
    }
}else{
    table.innerHTML = ''
    h2.innerHTML = 'No encontrado'
}
})
})

function querySelection(){
    let aux1 = select.value
    if(aux1 === 'FechaC' || aux1 === 'FechaE'){
        query.type = 'date'
        query2.type = 'date'
    }else{
        query.type = 'text' 
        query2.type = 'hidden'
    }
}

function isNotEmpty(aux){
    let forReturn
    if(aux){
        forReturn = true
    }else{
        forReturn = false
    }
    return forReturn
}
backbtn.addEventListener('click', e=>{
    window.history.back()
})

excel.addEventListener('click', e =>{
    e.preventDefault();
    let dataU = new FormData(form);
    fetch('./geturl.php', {
        method: 'POST',
        body: dataU
    })
    .then(res => res.json())
    .then(gottenurl => {
        window.location.assign(gottenurl)
    })

})
