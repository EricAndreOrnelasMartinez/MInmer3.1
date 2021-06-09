fetch('../PHP/getpower.php')
.then(res => res.json())
.then(data =>{
    if(data < 5){
        document.write(`<h3>No tienes acceso</h3>`);
    }
})