<?php
$server="localhost";
$user  ="root";
$senha ="";
$db    ="empresa";

if($conn=mysqli_connect($server, $user, $senha, $db) ){
 //echo "Conectado com sucesso";
} else
echo "erro";

function mensagem($texto,$tipo){
   echo "<div class='alert alert-$tipo' role='alert'>
           $texto
         </div>";
}

function mostra_data($data){
$d=explode('-',$data);
$escrever=$d[2]."/".$d[1]."/".$d[0];
return $escrever;

}

?>