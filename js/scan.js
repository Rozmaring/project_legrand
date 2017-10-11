var codeBarre = "";
document.onkeypress = recupererCodeBarre;

function recupererCodeBarre(event)
{
    if(event.keyCode == 13 || event.keyCode == "13")
    {
        submitControl(true);
    }
    codeBarre = codeBarre + event.key;
    var count = codeBarre.length;
    setTimeout(function(){ delai(count); }, 100);
    if(event.keyCode == 32)
    {
        event.preventDefault();
    }
}

function submitControl(enter)
{
    var code1 = document.getElementById('InputName1').value;
    var code2 = document.getElementById('InputName2').value;
    var code3 = document.getElementById('InputName3').value;
    var code4 = document.getElementById('InputName4').value;
    if(code1.match(/^[1][-][ ]+/)
        && code2.match(/^[2-3][-][ ]+[0-9]+[.][0-9]+$/)
        && code3.match(/^[2-3][-][ ]+[0-9]+[.][0-9]+$/)
        && code4.match(/^[0-9]+[.][0-9]+$/))
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
        return false;
    }
}

function delai(count)
{
    if(count == codeBarre.length)
    {
        valideCodeBarre(codeBarre);
        codeBarre = "";
    }
}
/*$('body').keypress(function (e) {
    console.log(String.fromCharCode(touche.which));
});*/


function valideCodeBarre(code)
{
    if(code.match(/^[2-3][-][ ]+[0-9]+[.][0-9]+$/))
    {
        switch (code[0]) {
            case "3":
                document.getElementById('InputName3').value = code;
                break;
            case "2":
                document.getElementById('InputName2').value = code;
                for(var i = (code.length)-1; i >= 0; i--)
                {
                    if(code[i].match(/^[^0-9\.]/))
                    {
                        document.getElementById('InputName4').value = code.substr(i+1);
                        console.log(code.substr(i+1));
                        i = false;
                    }
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