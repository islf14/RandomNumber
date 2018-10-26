<?php
    $D = 4;
    if(isset($_POST['enviar'])){
        $x0 = $_POST['x0'];
        $x1 = $_POST['x1'];
        $f = $_POST['f'];
        $D = $_POST['D'];
        $xi = $x0;
        $xii = $x1;
        $long_x0 = strlen($x0);
        $long_x1 = strlen($x1);
        $i = 0;
        $xi_2 = 0;
        $r = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Algoritmo de productos medios</title>
    <link rel="stylesheet" href="estilo.css" >
</head>
<body>
    <main>
        <div class="contenedor-form">
            <form class="formulario" action="productos_medios.php" method="post">
                <h3>Algoritmo de productos medios</h3>
                <h4></h4>
                <label for="xi">X0: </label>
                <input class="input" type="number" name="x0" value = "<?php if(isset($_POST['enviar'])){echo $x0;}?>">
                <label for="xi">X1: </label>
                <input class="input" type="number" name="x1" value = "<?php if(isset($_POST['enviar'])){echo $x1;}?>"><br>
                <label for="D">D: </label>
                <input class="input" type="number" name="D" value = "<?php echo $D;?>"><br>
                <label for="#">Ingrese filas a generar</label>
                <input class="input" type="number" name="f" value = "<?php if(isset($_POST['enviar'])){echo $f;}?>"><br>
                <button class="boton btn-primary" name="enviar">calcular</button>
            </form>
            <div class="resultado">
                <h3>Calculados:</h3>
                <label>X0: <?php if(isset($_POST['enviar'])){ echo $x0;}?></label><br>
                <label>X1: <?php if(isset($_POST['enviar'])){ echo $x1;}?></label>
                <p>Filas: <?php if(isset($_POST['enviar'])){ echo $f;}?></p>
                <label>Longitud X0: <?php if(isset($_POST['enviar'])){ echo $long_x0;}?></label><br>
                <label>Longitud X1: <?php if(isset($_POST['enviar'])){ echo $long_x1;}?></label>
            </div>
        </div>
        <table class="tabla">
            <tr class="titulo_tabla">
                <th class = "width_10">i</th>
                <th class = "width_10">Xi</th>
                <th class = "width_10">Xi+1</th>
                <th class = "width_20">(Xi)*(Xi+1)</th>
                <th class = "width_10">Long</th>
                <th class = "width_10">Medios</th>
                <th>ri</th>
            </tr>
            <?php
                if(isset($_POST['enviar'])){
                    for($i=0;$i<$f;$i++){
                        $xi_2 = $xi*$xii;//multiplicacion
                        $l_xi_2 = strlen($xi_2);//su longitud
                        $array_xi_2 = str_split($xi_2);
                        $resta = $l_xi_2 - $D;/// 9 - 5 = 4
                        $newString = "";
                        $var1 = 0;
                        if($resta >= 0){
                            switch ($resta){
                                case 0:case 1:
                                    $var1 = 0;break;
                                case 2:case 3:
                                    $var1 = 1;break;
                                case 4:case 5:
                                    $var1 = 2;break;
                                case 6:case 7:
                                    $var1 = 3;break;
                                case 8:case 9:
                                    $var1 = 4;break;
                                case 10:case 11:
                                    $var1 = 5;break;
                                case 12:case 13:
                                    $var1 = 6;break;
                            }
                            for($j=0;$j<$D;$j++){
                                $newarray[$j] = $array_xi_2[$j+$var1];//345684889586
                                $newString = implode("",$newarray);
                            }
                        }else if($resta<0){//D es menor al resultado cuadrado
                            $newString = $xi_2;
                        }
                        $r = '0.'.$newString;
                        echo "<tr class='fila_tabla'>
                                <td>".$i."</td>
                                <td>".$xi."</td>
                                <td>".$xii."</td>
                                <td>".$xi_2."</td>
                                <td>".$l_xi_2."</td>
                                <td>".$newString."</td>
                                <td>".$r."</td>
                            </tr>";
                        $xi=$xii;
                        $xii = $newString;
                    }
                }
            ?>
        </table>
        <a class="btn btn-success boton" href="index.html">Regresar</a>
    </main>  
</body>
</html>