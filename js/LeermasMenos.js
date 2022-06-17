
function ocultarDatos(numero){
    for (let i = 1; i <= numero; i++) { 
        document.getElementById("mastexto"+i).style.display ='none';
    }
    var doble=numero*2;
    for (let y = 1; y <= doble; y++) {
        if(y%2==0){
            document.getElementById(y).style.display ='none';
        }
    }
}



function leerMas(contador){
    //var numeros = Array.from(String(cadena), Number);
    var micheck1=(contador*2)-1;
    var micheck2=(contador*2);
    if (document.getElementById("mastexto"+contador).style.display=='none'){
        document.getElementById("mastexto"+contador).style.display ='block';
        document.getElementById(micheck2).style.display ='block';
        document.getElementById(micheck1).style.display ='none';
    }else{
        document.getElementById("mastexto"+contador).style.display ='none';
        document.getElementById(micheck2).style.display ='none';
        document.getElementById(micheck1).style.display ='block';
    }
}

