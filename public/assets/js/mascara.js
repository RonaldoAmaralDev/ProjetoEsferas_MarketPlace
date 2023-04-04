function mascara(o,f){
    v_obj = o
    v_fun = f
    setTimeout("execmascara()",1)
}
function execmascara() {
    var valor_alterado = v_fun(v_obj.value);
    if (valor_alterado !== v_obj.value) {
        v_obj.value = v_fun(v_obj.value)
    }
}
function mtel(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");
    return v;
}
function mtelsemddd(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");
    return v;
}
function mcnpj(v){
    v=v.replace(/\D/g,"")
    v=v.replace(/^(\d{2})(\d)/,"$1.$2")
    v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
    v=v.replace(/\.(\d{3})(\d)/,".$1/$2")
    v=v.replace(/(\d{4})(\d)/,"$1-$2")
    return v
}
function mcpf(v){
    v=v.replace(/\D/g,"")
    v=v.replace(/(\d{3})(\d)/,"$1.$2")
    v=v.replace(/(\d{3})(\d)/,"$1.$2")
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
    return v
}
function mrg(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/(\d{2})(\d{3})(\d{3})(\d{1})$/,"$1.$2.$3-$4");
    return v;
}
function mcep(v){
    v=v.replace(/\D/g,"")
    v=v.replace(/^(\d{2})(\d{3})(\d)/,"$1.$2-$3")
    return v
}
function mnbm(v){
    v=v.replace(/\D/g,"")
    v=v.replace(/(\d{4})(\d)/,"$1.$2");
    v=v.replace(/(\d{2})(\d{1,2})$/,"$1.$2");
    return v
}
function msite(v){
    v=v.replace(/^http:\/\/?/,"")
    dominio=v
    caminho=""
    if(v.indexOf("/")>-1)
        dominio=v.split("/")[0]
        caminho=v.replace(/[^\/]*/,"")
    dominio=dominio.replace(/[^\w\.\+-:@]/g,"")
    caminho=caminho.replace(/[^\w\d\+-@:\?&=%\(\)\.]/g,"")
    caminho=caminho.replace(/([\?&])=/,"$1")
    if(caminho!="")dominio=dominio.replace(/\.+$/,"")
    v="http://"+dominio+caminho
    return v
}
function mdinheiro(v) {
	v=v.replace(/\D/g,"")
	v=v.replace(/(\d{1})(\d{14})$/,"$1.$2")
	v=v.replace(/(\d{1})(\d{11})$/,"$1.$2")
	v=v.replace(/(\d{1})(\d{8})$/,"$1.$2")
	v=v.replace(/(\d{1})(\d{5})$/,"$1.$2")
	v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2")
	return v;
}

function mQuantidadeBalanca(v) {
	v=v.replace(/\D/g,"")
	v=v.replace(/(\d{1})(\d{15})$/,"$1.$2")
	v=v.replace(/(\d{1})(\d{12})$/,"$1.$2")
	v=v.replace(/(\d{1})(\d{9})$/,"$1.$2")
	v=v.replace(/(\d{1})(\d{6})$/,"$1.$2")
	v=v.replace(/(\d{1})(\d{1,3})$/,"$1,$2")
	return v;
}

function mdinheiros(v) {
	v=v.replace(/\D/g,"")
	v=v.replace(/(\d{1})(\d)/,"$1,$2");
	return v;
}

function mdata(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/(\d{2})(\d)/,"$1/$2");
    v=v.replace(/(\d{2})(\d)/,"$1/$2");
    v=v.replace(/(\d{4})(\d)/,"$1/$2");
    return v;
}
function mcvv(v){
    v=v.replace(/\D/g,"");    
    v=v.replace(/(\d{2})(\d)/,"$1/$2");
    v=v.replace(/(\d{4})(\d)/,"$1/$2");
    return v;
}

function mdata_hora(v) {
    v=v.replace(/\D/g, "");
    v=v.replace(/(\d{2})(\d)/, "$1/$2");
    v=v.replace(/(\d{2})(\d)/, "$1/$2");
    v=v.replace(/(\d{2})(\d{2})/, "$1$2");
    v=v.replace(/(\d{4})(\d)/, "$1 $2");
    v=v.replace(/\s(\d{2})(\d)/, " $1:$2");
    return v;
}

function mhora(v) {
    v=v.replace(/\D/g, "");
    v=v.replace(/(\d{2})(\d)/, "$1:$2");
    return v;
}

function soLetras(v){
    return v.replace(/\d/g,"")
}

function soLetrasMA(v){
    v = v.toUpperCase();
    return v.replace(/\d/g,"");
}

function letrasMA(v){
    v = v.toUpperCase();
    return v;
}
function letrasMI(v){
    v = v.toLowerCase();
    return v;
}

function soLetrasMI(v){
    v=v.toLowerCase()
    return v.replace(/\d/g,"")
}

function soNumeros(v){
    return v.replace(/\D/g,"")
}

function soNumerosPositivos(v){
    if(!isNaN(v)) {
        if(Number(v) < 1) {
            return v.replace(/[0]/g,"")
        }
    }
    return v.replace(/\D/g,"")
}

function soNumerosVirgulas(v){
    return v.replace(/^[0-9.,]+$/,"")
}



function validaCPF(cpf){    
	if (typeof cpf !== "string") return false
    cpf = cpf.replace(/[\s.-]*/igm, '')
    if (
        !cpf ||
        cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999" 
    ) {
        return false
    }
    var soma = 0
    var resto
    for (var i = 1; i <= 9; i++) 
        soma = soma + parseInt(cpf.substring(i-1, i)) * (11 - i)
    resto = (soma * 10) % 11
    if ((resto == 10) || (resto == 11))  resto = 0
    if (resto != parseInt(cpf.substring(9, 10)) ) return false
    soma = 0
    for (var i = 1; i <= 10; i++) 
        soma = soma + parseInt(cpf.substring(i-1, i)) * (12 - i)
    resto = (soma * 10) % 11
    if ((resto == 10) || (resto == 11))  resto = 0
    if (resto != parseInt(cpf.substring(10, 11) ) ) return false
    return true
}

function validaEmail(email){
    if (!(/^\w+([\.-_]?\w+)*@\w+([\.-_]?\w+)*(\.\w{2,4})+$/.test(email))){
        return false
    }else{
	    return true;
	}
}



function validaRG(numero) {
    var numero = numero.split("");
    tamanho = numero.length;
    vetor = new Array(tamanho);

    if (tamanho >= 1) {
        vetor[0] = parseInt(numero[0]) * 2;
    }
    if (tamanho >= 2) {
        vetor[1] = parseInt(numero[1]) * 3;
    }
    if (tamanho >= 3) {
        vetor[2] = parseInt(numero[2]) * 4;
    }
    if (tamanho >= 4) {
        vetor[3] = parseInt(numero[3]) * 5;
    }
    if (tamanho >= 5) {
        vetor[4] = parseInt(numero[4]) * 6;
    }
    if (tamanho >= 6) {
        vetor[5] = parseInt(numero[5]) * 7;
    }
    if (tamanho >= 7) {
        vetor[6] = parseInt(numero[6]) * 8;
    }
    if (tamanho >= 8) {
        vetor[7] = parseInt(numero[7]) * 9;
    }
    if (tamanho >= 9) {
        vetor[8] = parseInt(numero[8]) * 100;
    }

    total = 0;

    if (tamanho >= 1) {
        total += vetor[0];
    }
    if (tamanho >= 2) {
        total += vetor[1];
    }
    if (tamanho >= 3) {
        total += vetor[2];
    }
    if (tamanho >= 4) {
        total += vetor[3];
    }
    if (tamanho >= 5) {
        total += vetor[4];
    }
    if (tamanho >= 6) {
        total += vetor[5];
    }
    if (tamanho >= 7) {
        total += vetor[6];
    }
    if (tamanho >= 8) {
        total += vetor[7];
    }
    if (tamanho >= 9) {
        total += vetor[8];
    }


    resto = total % 11;
    if (resto != 0) {
        return false;
    } else {
        return true;
    }
}