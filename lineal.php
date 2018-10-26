<?php
    $D = 4;
    if(isset($_POST['enviar'])){
        $x0 = $_POST['x0'];
        $a = $_POST['a'];
        $c = $_POST['c'];
        $m = $_POST['m'];
        $f = $_POST['f'];
        $xi = $x0;
        $long_x0 = strlen($x0);
        
        $i = 0;
        $xi_2 = 0;
        $r = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Algoritmo lineal</title>
    <link rel="stylesheet" href="estilo.css" >
</head>
<body>
    <main>
        <div class="contenedor-form">
            <form class="formulario" action="lineal.php" method="post">
                <h3>Algoritmo lineal</h3>
                <h4></h4>
                <label for="x0">X0: </label>
                <input class="input" type="number" name="x0" value = "<?php if(isset($_POST['enviar'])){echo $x0;}?>"><br>
                <label for="a">Constante a: </label>
                <input class="input" type="number" name="a" value = "<?php if(isset($_POST['enviar'])){echo $a;}?>"><br>
                <label for="c">Constante c: </label>
                <input class="input" type="number" name="c" value = "<?php echo $c;?>"><br>
                <label for="m">Constante m: </label>
                <input class="input" type="number" name="m" value = "<?php echo $m;?>"><br>
                <label for="#">Ingrese filas a generar</label>
                <input class="input" type="number" name="f" value = "<?php if(isset($_POST['enviar'])){echo $f;}?>"><br>
                <button class="boton btn-primary" name="enviar">calcular</button>
            </form>
            <div class="resultado">
                <h3>Calculados:</h3>
                <label>X0: <?php if(isset($_POST['enviar'])){ echo $x0;}?></label><br><br>
                <label>a: <?php if(isset($_POST['enviar'])){ echo $a;}?></label><br>
                <label>c: <?php if(isset($_POST['enviar'])){ echo $c;}?></label><br>
                <label>m: <?php if(isset($_POST['enviar'])){ echo $m;}?></label>
                <p>Filas: <?php if(isset($_POST['enviar'])){ echo $f;}?></p>
                <label>Longitud X0: <?php if(isset($_POST['enviar'])){ echo $long_x0;}?></label>
            </div>
        </div>
        <table class="tabla">
            <tr class="titulo_tabla">
                <th class = "width_20">i</th>
                <th class = "width_20">Xi</th>
                <th class = "width_20">Xi+1</th>
                <th>ri</th>
            </tr>
            <?php
                if(isset($_POST['enviar'])){
                    for($i=0;$i<$f;$i++){
                        $xi_2 = ($xi*$a+$c)%$m;
                        $r = $xi_2/($m-1); 
                        echo "<tr class='fila_tabla'>
                                <td>".$i."</td>
                                <td>".$xi."</td>
                                <td>".$xi_2."</td>
                                <td>".$r."</td>
                            </tr>";
                        $xi = $xi_2;
                    }
                }
            ?>
        </table>
        <a class="btn btn-success boton" href="index.html">Regresar</a>
    </main>  
</body>
</html>