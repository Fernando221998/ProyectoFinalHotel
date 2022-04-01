
document.getElementById("mastexto1").style.display ='none';
document.getElementById("micheck2").style.display ='none';

var ocultar = false;

function leerMas1(){
    if (!ocultar){
        document.getElementById("mastexto1").style.display ='block';
        document.getElementById("micheck2").style.display ='block';
        document.getElementById("micheck1").style.display ='none';
        ocultar = true;
    }else{
        document.getElementById("mastexto1").style.display ='none';
        document.getElementById("micheck2").style.display ='none';
        document.getElementById("micheck1").style.display ='block';
        ocultar = false;
    }
}

document.getElementById("mastexto2").style.display ='none';
document.getElementById("micheck4").style.display ='none';

var ocultar2 = false;

function leerMas2(){
    if (!ocultar2){
        document.getElementById("mastexto2").style.display ='block';
        document.getElementById("micheck4").style.display ='block';
        document.getElementById("micheck3").style.display ='none';
        ocultar2 = true;
    }else{
        document.getElementById("mastexto2").style.display ='none';
        document.getElementById("micheck3").style.display ='none';
        document.getElementById("micheck4").style.display ='block';
        ocultar2 = false;
    }
}
