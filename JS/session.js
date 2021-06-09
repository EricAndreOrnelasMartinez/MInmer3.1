fetch('../PHP/sessioncheck.php')
.then(res => res.json())
.then(ans =>{
    let aux = ans
    if(aux === '1'){
    }else{
        window.location.assign('../')
    }
})