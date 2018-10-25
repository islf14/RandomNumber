<?php
    if(isset($_POST['enviar'])){
        $x0 = $_POST['x0'];
        $k = $_POST['k'];
        $g = $_POST['g'];
        $f = $_POST['f'];
        $xi = $x0;
        $xii = $xi;
        $a = 5+8*$k;
        $m = pow(2,$g);
        $i = 0;
        $t = 0;
        $tt = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Algoritmo congruencial multiplicativo</title>
    <link rel="stylesheet" href="estilo.css" >
</head>
<body>
    <main>
        <div class="contenedor-form">
            <form class="formulario" action="cong-mult.php" method="post">
                <h3>Algoritmo congruencial multiplicativo</h3>
                <label for="#">Ingrese X0</label>
                <input type="number" name="x0"><br>
                <label for="#">Ingrese k</label>
                <input type="number" name="k"><br>
                <label for="#">Ingrese g</label>
                <input type="number" name="g"><br>
                <label for="#">Ingrese filas a generar</label>
                <input type="number" name="f"><br>
                <button class="boton btn-primary" name="enviar">calcular</button>
            </form>
            <div class="resultado">
                <h3>Calculados:</h3>
                <p>a: <?php if(isset($_POST['enviar'])){ echo $a;}?></p>
                <p>m: <?php if(isset($_POST['enviar'])){ echo $m;}?></p>
            </div>
        </div>
        <table class="tabla">
            <tr class="titulo_tabla">
                <th class = "width_20">i</th>
                <th class = "width_20">xi</th>
                <th class = "width_20">xii</th>
                <th>ri+1</th>
            </tr>
            <?php
                if(isset($_POST['enviar'])){
                    for($i=0;$i<=$f;$i++){
                        $xi = $xii;
                        $t = $a*$xi;
                        $xii = $t%$m;
                        $tt = $m-1;
                        $num = $xii/$tt;
                        echo "<tr class='fila_tabla'>
                                <td>".$i."</td>
                                <td>".$xi."</td>
                                <td>".$xii."</td>
                                <td>".$num."</td>
                            </tr>";
                    }
                }
            ?>
        </table>
        <a class="btn btn-success boton" href="index.html">Regresar</a>
    </main>  
</body>
</html>