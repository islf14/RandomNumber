<?php
    if(isset($_POST['enviar'])){
        $x0 = $_POST['xi'];
        $f = $_POST['f'];
        $D = 4;
        $xi = $x0;
        $long = strlen($x0);
        $xiarray = str_split($x0);

        $i = 0;
        $xi_2 = 0;
        $r = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Algoritmo de cuadrados medios</title>
    <link rel="stylesheet" href="estilo.css" >
</head>
<body>
    <main>
        <div class="contenedor-form">
            <form class="formulario" action="cuadrados_medios.php" method="post">
                <h3>Algoritmo de cuadrados medios</h3>
                <h4></h4>
                <label for="xi">X0 semilla: </label>
                <input class="input" type="number" name="xi" value = "<?php if(isset($_POST['enviar'])){echo $x0;}?>"><br>
                <label for="#">Ingrese filas a generar</label>
                <input class="input" type="number" name="f" value = "<?php if(isset($_POST['enviar'])){echo $f;}?>"><br>
                <button class="boton btn-primary" name="enviar">calcular</button>
            </form>
            <div class="resultado">
                <h3>Calculados:</h3>
                <p>X0: <?php if(isset($_POST['enviar'])){ echo $x0;}?></p>
                <p>filas: <?php if(isset($_POST['enviar'])){ echo $f;}?></p>
                <p>longitud X0: <?php if(isset($_POST['enviar'])){ echo $long;}?></p>
                <p>X0[2]: <?php if(isset($_POST['enviar'])){ echo $xiarray[2];}?></p>
            </div>
        </div>
        <table class="tabla">
            <tr class="titulo_tabla">
                <th class = "width_10">i</th>
                <th class = "width_10">Xi</th>
                <th class = "width_10">Xi^2</th>
                <th class = "width_10">long. par</th>
                <th class = "width_10">medios</th>
                <th>ri</th>
            </tr>
            <?php
                if(isset($_POST['enviar'])){
                    for($i=0;$i<$f;$i++){

                        $xi_2 = pow($xi,2);
                        $xii = $xi+2;
                        $l_xii = strlen($xii);



                        $r = $xii/10000;
                        echo "<tr class='fila_tabla'>
                                <td>".$i."</td>
                                <td>".$xi."</td>
                                <td>".$xi_2."</td>
                                <td>".$l_xii."</td>
                                <td>".$xii."</td>
                                <td>".$r."</td>
                            </tr>";
                    }
                }
            ?>
        </table>
        <a class="btn btn-success boton" href="index.html">Regresar</a>
    </main>  
</body>
</html>