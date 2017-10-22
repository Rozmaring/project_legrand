<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    	<link type="text/css" rel="stylesheet" href="css/style.css">
        <title>Imprimer vos codes barres</title>
    </head>
    <body>
        <div id="lienAppliCodeBarre" class="hidden">
            <a href="index.php">Retourner à l'application</a><br>
            <button type="button" onclick="print()">Imprimer</button>
        </div>
        <div class="left">
            <input id="codeText1" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('1')},1)"><br>
            <img id="codeBarre1" src=""><br>
            <input id="codeText2" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('2')},1)"><br>
            <img id="codeBarre2" src=""><br>
            <input id="codeText3" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('3')},1)"><br>
            <img id="codeBarre3" src=""><br>
            <input id="codeText4" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('4')},1)"><br>
            <img id="codeBarre4" src=""><br>
            <input id="codeText5" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('5')},1)"><br>
            <img id="codeBarre5" src=""><br>
            <input id="codeText6" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('6')},1)"><br>
            <img id="codeBarre6" src=""><br>
            <input id="codeText7" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('7')},1)"><br>
            <img id="codeBarre7" src=""><br>
            <input id="codeText8" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('8')},1)"><br>
            <img id="codeBarre8" src=""><br>
            <input id="codeText9" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('9')},1)"><br>
            <img id="codeBarre9" src=""><br>
            <input id="codeText10" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('10')},1)"><br>
            <img id="codeBarre10" src=""><br>
        </div>
        <div class="right">
            <input id="codeText11" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('11')},1)"><br>
            <img id="codeBarre11" src=""><br>
            <input id="codeText12" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('12')},1)"><br>
            <img id="codeBarre12" src=""><br>
            <input id="codeText13" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('13')},1)"><br>
            <img id="codeBarre13" src=""><br>
            <input id="codeText14" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('14')},1)"><br>
            <img id="codeBarre14" src=""><br>
            <input id="codeText15" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('15')},1)"><br>
            <img id="codeBarre15" src=""><br>
            <input id="codeText16" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('16')},1)"><br>
            <img id="codeBarre16" src=""><br>
            <input id="codeText17" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('17')},1)"><br>
            <img id="codeBarre17" src=""><br>
            <input id="codeText18" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('18')},1)"><br>
            <img id="codeBarre18" src=""><br>
            <input id="codeText19" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('19')},1)"><br>
            <img id="codeBarre19" src=""><br>
            <input id="codeText20" class="hidden" type="text" placeholder="code Barres" onkeypress="setTimeout(function(){genereCodeBarre('20')},1)"><br>
            <img id="codeBarre20" src=""><br>
        </div>
    </body>
</html>
<?php if(isset($_GET['scrollY'])){echo "<script>var scrollY = ".$_GET['scrollY']."</script>";} ?>
<script>
    function genereCodeBarre(elem)
    {
        var codeBarre = document.getElementById('codeText'+elem).value;
        document.getElementById('codeBarre'+elem).setAttribute("src","pi_barcode.php?type=C128&text=AUTO&code="+codeBarre);
    }
</script>
