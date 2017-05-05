function validaTipo(radios){
    for (i = 0; i < radios.length; ++ i)
    {
        if (radios [i].checked) return true;
    }
    return false;
}

function validateForm() {
    var x = document.forms["meuform"]["codMercadoria"].value;
    if (x == null || x == "") {
        alert("O código deve ser informado!");
        return false;
    }
    var y = document.forms["meuform"]["tipoMercadoria"].value;
    if (y == null || y == "") {
        alert("O tipo deve ser informado!");
        return false;
    }
    var z = document.forms["meuform"]["nomeMercadoria"].value;
    if (z == null || z == "") {
        alert("O nome deve ser informado!");
        return false;
    }  
    var a = document.forms["meuform"]["Quantidade"].value;
    if (a == null || a == "") {
        alert("A quantidade deve ser informada!");
        return false;
    }
    var b = document.forms["meuform"]["Preco"].value;
    if (b == null || b == "") {
        alert("O preço deve ser informado!");
        return false;
    }
	
    if(validaTipo (document.forms["meuform"]["tipoNegocio"])){
        return true;
    }
    else
    {
        alert('O tipo do negócio deve ser informado!');
        return false;
    }
}

