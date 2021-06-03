const form = document.getElementById('data')
const h3 = document.getElementById('res')
const files = document.getElementById('file')
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
        }
    }).catch(err =>{
        console.log(err);
    })
})
// files.addEventListener('submit', e =>{
//     e.preventDefault()
//     data = new FormData(files)
//     fetch('localhost:5000/files',{
//         method: 'POST',
//         body: data
//     })
//     .then(res => res.json())
//     .then(data =>{
//         console.log(data)
//     })
// })