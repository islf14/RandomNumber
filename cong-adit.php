<?php
    if(isset($_POST['enviar'])){
        $xi = $_POST['xi'];
        $m = $_POST['m'];
        $f = $_POST['f'];
        $xi_array = explode(";",$xi);//xi
        $arraysize=sizeof($xi_array);//n
        $i = 0;
        $cont1 = 0;
        $cont2 = $arraysize-1;
        $r = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Algoritmo congruencial Aditivo</title>
    <link rel="stylesheet" href="estilo.css" >
</head>
<body>
    <main>
        <div class="contenedor-form">
            <form class="formulario" action="cong-adit.php" method="post">
                <h3>Algoritmo congruencial aditivo</h3>
                <h4></h4>
                <label for="#">Xi separados por ";" ejm: 4;3;54.. :</label>
                <input style="width:200px;" type="text" name="xi" value = "<?php if(isset($_POST['enviar'])){echo $xi;}?>"><br>

                <label for="#">Ingrese m</label>
                <input  class="input" type="number" name="m" value = "<?php if(isset($_POST['enviar'])){echo $xm;}?>"><br>

                <label for="#">Ingrese filas a generar</label>
                <input class="input" type="number" name="f" value = "<?php if(isset($_POST['enviar'])){echo $xf;}?>"><br>
                <button class="boton btn-primary" name="enviar">calcular</button>
            </form>
            <div class="resultado">
                <h3>Calculados:</h3>
                <p>xi = (xi-1 + xi-n)mod(m)</p>
                <p>m: <?php if(isset($_POST['enviar'])){ echo $m;}?></p>
                <p>filas: <?php if(isset($_POST['enviar'])){ echo $f;}?></p>
                <p>n : <?php if(isset($_POST['enviar'])){ echo $arraysize;}?></p>
            </div>
        </div>
        <table class="tabla">
            <tr class="titulo_tabla">
                <th class = "width_10">a</th>
                <th class = "width_10">i=n+a</th>
                <th class = "width_10">xi-1</th>
                <th class = "width_10">xi-n</th>
                <th class = "width_10">xi</th>
                <th>ri</th>
            </tr>
            <?php
                if(isset($_POST['enviar'])){
                    for($i=0;$i<$f;$i++){
                        $xinew = ($xi_array[$cont1]+$xi_array[$cont2])%$m;
                        $xi_array[$cont2+1] = $xinew;
                        $r = $xinew/($m-1);
                        $a= $i+1;
                        $newi = $a+$arraysize;
                        echo "<tr class='fila_tabla'>
                                <td>".$a."</td>
                                <td>".$newi."</td>
                                <td>".$xi_array[$cont2]."</td>
                                <td>".$xi_array[$cont1]."</td>
                                <td>".$xi_array[$cont2+1]."</td>
                                <td>".$r."</td>
                            </tr>";
                        $cont1++;$cont2++;
                    }
                }
            ?>
        </table>
        <a class="btn btn-success boton" href="index.html">Regresar</a>
    </main>  
</body>
</html>