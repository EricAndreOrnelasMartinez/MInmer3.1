const form = document.getElementById('log')
const h3 = document.getElementById('res')

form.addEventListener('submit',e =>{
    e.preventDefault();
    let data = new FormData(form)
    fetch('./PHP/initsession.php',{
        method: 'POST',
        body: data
    })
    .then(res => res.json())
    .then(back =>{
        let aux = back;
        if(aux === '1'){
            window.location.assign('./tables/?city=CDMX');
        }else if(aux === '2'){
            h3.innerHTML = "Llenar campos"
            h3.className = "bad";
        }else if(aux === '0'){
            h3.innerHTML = "Mail o contraseña incorrectos";
            h3.className = "bad";
        }
    }).catch(err =>{
        h3.innerHTML = 'Mail o contraseña incorrectos'
        h3.className = 'bad'
    })
})