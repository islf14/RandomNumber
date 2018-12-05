<?php
    $D = 4;
    $Z = 1.96;
    $f = 0;
    $media = 1;
    if(isset($_POST['enviar'])){
        $x0 = $_POST['x0'];
        $a = $_POST['a'];
        $f = $_POST['f'];
        $D = $_POST['D'];
        $Z = $_POST['Z'];
        $xi = $x0;
        $long_x0 = strlen($x0);
        $long_a = strlen($a);
        $i = 0;
        $xi_2 = 0;
        $r = 0;
        $total = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Algoritmo de multiplicador constante</title>
    <link rel="stylesheet" href="estilo.css" >
</head>
<body>
    <main>
        <div class="contenedor-form">
            <form class="formulario" action="multiplicador_constante.php" method="post">
                <h3>Algoritmo de multiplicador constante</h3>
                <h4></h4>
                <label for="x0">X0: </label>
                <input class="input" type="number" name="x0" value = "<?php if(isset($_POST['enviar'])){echo $x0;}?>">
                <label for="a">Constante a: </label>
                <input class="input" type="number" name="a" value = "<?php if(isset($_POST['enviar'])){echo $a;}?>"><br>
                <label for="D">D: </label>
                <input class="input" type="number" name="D" value = "<?php echo $D;?>"><br>
                <label for="#">Ingrese filas a generar</label>
                <input class="input" type="number" name="f" value = "<?php if(isset($_POST['enviar'])){echo $f;}?>"><br>
                <label for="Z">Z_[alfa/2]: </label>
                <input class="input" type="number" name="Z" value = "<?php echo $Z;?>"><br>
                <button class="boton btn-primary" name="enviar">calcular</button><br><br>
                <a class="btn btn-success boton" href="index.html">Regresar</a>
            </form>
            <div class="resultado">
                <h3>Calculados:</h3>
                <label>X0: <?php if(isset($_POST['enviar'])){ echo $x0;}?></label><br>
                <label>a: <?php if(isset($_POST['enviar'])){ echo $a;}?></label>
                <p>Filas: <?php if(isset($_POST['enviar'])){ echo $f;}?></p>
                <label>Longitud X0: <?php if(isset($_POST['enviar'])){ echo $long_x0;}?></label><br>
                <label>Longitud a: <?php if(isset($_POST['enviar'])){ echo $long_a;}?></label>
            </div>
        </div>
        <table class="tabla">
            <tr class="titulo_tabla">
                <th class = "width_10">i</th>
                <th class = "width_10">a</th>
                <th class = "width_10">Xi</th>
                <th class = "width_20">(a)*(Xi)</th>
                <th class = "width_10">Long</th>
                <th class = "width_10">Medios</th>
                <th>ri</th>
            </tr>
            <?php
                if(isset($_POST['enviar'])){
                    for($i=0;$i<$f;$i++){
                        $xi_2 = $xi*$a;//multiplicacion
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
                        $total = $total + $r;
                        echo "<tr class='fila_tabla'>
                                <td>".$i."</td>
                                <td>".$a."</td>
                                <td>".$xi."</td>
                                <td>".$xi_2."</td>
                                <td>".$l_xi_2."</td>
                                <td>".$newString."</td>
                                <td>".$r."</td>
                            </tr>";
                        $xi = $newString;
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