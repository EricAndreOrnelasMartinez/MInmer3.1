const form = document.getElementById('main');
const table = document.getElementById('table')
const h2 = document.getElementById('res')
const select = document.getElementById('atribute')
const query = document.getElementById('query')
const query2 = document.getElementById('query2')
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
    <td>Evidencia</td>
    <td>Progreso</td>               
    <td>ID SQL</td>
    <td>Fecha de carga</td>
    <td>Fecha de entrega</td>
    <td>Operador</td>
    <td>Placas</td>
    <td>ID</td>
    <td>SO</td>
    <td>Factura</td>
    <td>Cliente</td>
    <td>PZS</td>
    <td>Cajas</td>
    <td>Subtotal</td>
    <td>Horario</td>
    <td>Dirección</td>
    <td>Destino</td>
    <td>Concepto</td>
    <td>Capacidad</td>
    <td>Observaciones</td>
    <td>OE</td>
    <td>Custodia</td>
    <td>Terminado</td>
    </tr>`;
    for(i in data){
        let total = 0;
        let color = '';
        if(isNotEmpty(data[i].ID_SQL)){
            total += 5
        }
        if(isNotEmpty(data[i].FechaC)){
            total += 5
        }
        if(isNotEmpty(data[i].FechaE)){
            total += 5
        }
        if(isNotEmpty(data[i].Operador)){
            total += 5
        }
        if(isNotEmpty(data[i].Placas)){
            total += 5
        }
        if(isNotEmpty(data[i].ID)){
            total += 5
        }
        if(isNotEmpty(data[i].SO)){
            total += 5
        }
        if(isNotEmpty(data[i].Factura)){
            total += 5
        }
        if(isNotEmpty(data[i].Cliente)){
            total += 5
        }
        if(isNotEmpty(data[i].PZS)){
            total += 5
        }
        if(isNotEmpty(data[i].Caja)){
            total += 5
        }
        if(isNotEmpty(data[i].Subtotal)){
            total += 5
        }
        if(isNotEmpty(data[i].Horario)){
            total += 5
        }
        if(isNotEmpty(data[i].Direccion)){
            total += 5
        }
        if(isNotEmpty(data[i].Destino)){
            total += 5
        }
        if(isNotEmpty(data[i].Concepto)){
            total += 5
        }
        if(isNotEmpty(data[i].Capacidad)){
            total += 5
        }
        if(isNotEmpty(data[i].Observaciones)){
            total += 5
        }
        if(isNotEmpty(data[i].OE)){
            total += 5
        }
        if(isNotEmpty(data[i].Custodia)){
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
        <td><a href="../uploadE/uploads/${data[i].Factura}.pdf">Ir</a></td>
        <td>${total}%</td>
        <td>${data[i].ID_SQL}</td>
        <td>${data[i].FechaC}</td>
        <td>${data[i].FechaE}</td>
        <td>${data[i].Operador}</td>
        <td>${data[i].Placas}</td>
        <td>${data[i].ID}</td>
        <td>${data[i].SO}</td>
        <td>${data[i].Factura}</td>
        <td>${data[i].Cliente}</td>
        <td>${data[i].PZS}</td>
        <td>${data[i].Caja}</td>
        <td>${data[i].Subtotal}</td>
        <td>${data[i].Horario}</td>
        <td>${data[i].Direccion}</td>
        <td>${data[i].Destino}</td>
        <td>${data[i].Concepto}</td>
        <td>${data[i].Capacidad}</td>
        <td>${data[i].Observaciones}</td>
        <td>${data[i].OE}</td>
        <td>${data[i].Custodia}</td>
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
