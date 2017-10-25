var codeBarres = "";
var onFocusCodeBarre = false;
document.onkeypress = recupererCodeBarres;

function recupererCodeBarres(event)
{
        if(event.keyCode == 13 || event.keyCode == "13")
        {
            submitControl(true);
        }

        codeBarres = codeBarres + event.key;
        var count = codeBarres.length;
        setTimeout(function(){ delai(count); },10);
        if(event.keyCode == 32)
        {
            if(onFocusCodeBarre == false)
            {
                event.preventDefault();
            }
        }
}

function delai(count)
{
    if(count == codeBarres.length)
    {
        document.getElementById('derniereSaisie').innerHTML = codeBarres.replace(RegExp(" ","g"),"&nbsp;");

        valideCodeBarres(codeBarres);
        codeBarres = "";
    }
}
/*$('body').keypress(function (e) {
console.log(String.fromCharCode(touche.which));
});*/

function testInputName3(elem)
{
    if((/^[0-9]{1,2}[.][0-9]{1,3}$/).test(elem.nextSibling.value))
    {
        valideCodeBarres("3-   "+elem.nextSibling.value);
    }
    else
    {
        document.getElementById("messageErreur").innerHTML = "Vous devez entré un code barres valide ex<span style='color: red;'>(99.999 || 0.0)</span>"
    }
}

function renitMessageErreur()
{
    document.getElementById("messageErreur").innerHTML = "Veuillez scanner les <span style='color: red;'>trois codes barres</span>.";
}

function checkErreurMessage()
{
    var code1 = document.getElementById('InputName1').value;
    var code2 = document.getElementById('InputName2').value;
    var code3 = document.getElementById('InputName3').value;

    if((/^[1][-][ ]+/).test(code1) && (/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code2) && ((/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code3)) == false)
    {
        document.getElementById("messageErreur").innerHTML = "Veuillez scanner <span style='color: red;'>tare caissette</span>.";
    }
    else if((/^[1][-][ ]+/).test(code1) && (/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code3) && ((/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code2)) == false)
    {
        document.getElementById("messageErreur").innerHTML = "Veuillez scanner <span style='color: red;'>poids brut rebut</span>.";
    }
    else if((/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code2) && (/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code3) && ((/^[1][-][ ]+/).test(code1)) == false)
    {
        document.getElementById("messageErreur").innerHTML = "Veuillez scanner <span style='color: red;'>identification rebut</span>.";
    }
    else if((/^[1][-][ ]+/).test(code1) && (/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code2) == false && (/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code3) == false)
    {
        document.getElementById("messageErreur").innerHTML = "Veuillez scanner <span style='color: red;'>poids brut rebut</span> et <span style='color: red;'>tare caissette</span>.";
    }
    else if((/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code2) && (/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code3) == false && (/^[1][-][ ]+/).test(code1) == false)
    {
        document.getElementById("messageErreur").innerHTML = "Veuillez scanner <span style='color: red;'>identification rebut</span> et <span style='color: red;'>tare caissette</span>.";
    }
    else if((/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code3) && (/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code2) == false && (/^[1][-][ ]+/).test(code1) == false)
    {
        document.getElementById("messageErreur").innerHTML = "Veuillez scanner <span style='color: red;'>identification rebut</span> et <span style='color: red;'>poids brut rebut</span>.";
    }
    else if(((/^[1][-][ ]+/).test(code1)) == false && ((/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code2)) == false && ((/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code3)) == false)
    {
        document.getElementById("messageErreur").innerHTML = "Veuillez scanner les <span style='color: red;'>trois codes barres</span>.";
    }
    else
    {
        document.getElementById("messageErreur").innerHTML = "Appuyez sur <span style='color: green;'>Valider saisie</span>";
    }
}

function submitControl(enter)
{
    var code1 = document.getElementById('InputName1').value;
    var code2 = document.getElementById('InputName2').value;
    var code3 = document.getElementById('InputName3').value;

    if((/^[1][-][ ]+/).test(code1)
    && (/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code2)
    && (/^[2-3][-][ ]+[0-9]+[.][0-9]+$/).test(code3))
    {
        for(var i = 1; i <= 3; i++)
        {
            document.getElementById("InputName"+i).removeAttribute("disabled")
        }
        if(enter)
        {
            document.getElementById('formPeser').submit();
        }
        return true;
    }
    else
    {
        checkErreurMessage();
    }
    return false;
}


function valideCodeBarres(code)
{
    if(code == "1-   test")
    {
        code = code + (parseInt(nombreProd)+1);
    }
    if(code.match(/^[2-3][-][ ]+[0-9]+[.][0-9]+$/))
    {
        switch (code[0]) {
            case "3":
                document.getElementById('InputName3').value = code;
                checkErreurMessage();
                break;
            case "2":
                document.getElementById('InputName2').value = code;
                checkErreurMessage();
                break;
            default:
                console.log("!!! Code barre INCONNU !!!");
        }
    }
    else if(code.match(/^[1][-][ ]+/))
    {
            document.getElementById('InputName1').value = code;
            checkErreurMessage();
    }
    else
    {
        return false;
    }
}








/*
switch (code[0]) {
    case "3":
        document.getElementById('InputName3').value = code;
        var peser = document.getElementById('InputName2').value;
        if(peser.match(/^[1-3][-][ ]+[0-9]+[.][0-9]+$/))
        {
            for(var i = (peser.length)-1; i >= 0; i--)
            {
                if(peser[i].match(/^[^0-9\.]/))
                {
                    for(var j = (code.length)-1; j >= 0; j--)
                    {
                        if(code[j].match(/^[^0-9\.]/))
                        {
                            document.getElementById('InputName4').value = peser.substr(i+1);
                            document.getElementById('InputName5').value = code.substr(j+1);
                            return (peser.substr(i+1) - code.substr(j+1)).toFixed(3);
                        }
                    }
                }
            }
        }
        else
        {
            return false;
        }
        break;
    case "2":
        document.getElementById('InputName2').value = code;
        var peser = document.getElementById('InputName3').value;
        if(peser.match(/^[1-3][-][ ]+[0-9]+[.][0-9]+$/))
        {
            for(var i = (peser.length)-1; i >= 0; i--)
            {
                if(peser[i].match(/^[^0-9\.]/))
                {
                    for(var j = (code.length)-1; j >= 0; j--)
                    {
                        if(code[j].match(/^[^0-9\.]/))
                        {
                            document.getElementById('InputName5').value = peser.substr(i+1);
                            document.getElementById('InputName4').value = code.substr(j+1);
                            return (code.substr(j+1) - peser.substr(i+1)).toFixed(3);
                        }
                    }
                }
            }
        }
        else
        {
            return false;
        }
        break;
    default:
        console.log("!!! Code barre INCONNU !!!");
}
}
else if(code.match(/^[1][-][ ]+/))
{
    document.getElementById('InputName1').value = code;
}
else
{
return false;
}
*/
