<?php
    $Z = 1.96;
    $f = 0;
    $media = 1;
    if(isset($_POST['enviar'])){
        $x0 = $_POST['x0'];
        $k = $_POST['k'];
        $g = $_POST['g'];
        $f = $_POST['f'];
        $Z = $_POST['Z'];
        $xi = $x0;
        $xii = $xi;
        $a = 5+8*$k;
        $m = pow(2,$g);
        $i = 0;
        $t = 0;
        $tt = 0;
        $total = 0;
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
            <form class="formulario" action="congruencial_multiplicativo.php" method="post">
                <h3>Algoritmo congruencial multiplicativo</h3>
                <label for="#">Ingrese X0</label>
                <input class="input" type="number" name="x0" value = "<?php if(isset($_POST['enviar'])){echo $x0;}?>"><br>
                <label for="#">Ingrese k</label>
                <input class="input" type="number" name="k" value = "<?php if(isset($_POST['enviar'])){echo $k;}?>"><br>
                <label for="#">Ingrese g</label>
                <input class="input" type="number" name="g" value = "<?php if(isset($_POST['enviar'])){echo $g;}?>"><br>
                <label for="#">Ingrese filas a generar</label>
                <input class="input" type="number" name="f" value = "<?php if(isset($_POST['enviar'])){echo $f;}?>"><br>
                <label for="Z">Z_[alfa/2]: </label>
                <input class="input" type="number" name="Z" value = "<?php echo $Z;?>"><br>
                <button class="boton btn-primary" name="enviar">calcular</button><br><br>
                <a class="btn btn-success boton" href="index.html">Regresar</a>
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
                        $r = $xii/$tt;
                        $total = $total + $r;
                        echo "<tr class='fila_tabla'>
                                <td>".$i."</td>
                                <td>".$xi."</td>
                                <td>".$xii."</td>
                                <td>".$r."</td>
                            </tr>";
                    }
                    $media = $total/$f;
                }
            ?>
        </table>
        <div>
            <h3>Prueba de medias</h3>
            <p>Media: <?php if(isset($_POST['enviar'])){ echo $media;}?></p>
            <?php
                if(isset($_POST['enviar'])){
                    $n = $f;
                    $med = 0.5;
                    $frac = 1/(sqrt(12*$n));
                    $valmin = $med - $Z*$frac;
                    $valmax = $med + $Z*$frac;
                }
            ?>
            <p>Límite de aceptación Inferior: <?php if(isset($_POST['enviar'])){ echo $valmin;}?></p>
            <p>Límite de aceptación Superior: <?php if(isset($_POST['enviar'])){ echo $valmax;}?></p>
        </div>
        <a class="btn btn-success boton" href="index.html">Regresar</a>
    </main>  
</body>
</html>