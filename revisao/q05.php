<?php

$alunos = [array("nome"=>"Pedro","media"=>"5","sexo"=>"M"),
 array("nome"=>"Jadir","media"=>"7","sexo"=>"ND"),
 array("nome"=>"Maria","media"=>"8","sexo"=>"F")];


$titulos = ["Nome", "Média", "Sexo", "Situação"];

echo "<table border='1'>";

echo "<tr>";
foreach ($titulos as $k){
              echo "<th>".$k."</th>";
} 
echo "</tr>";

foreach ($alunos as $posicoes) {
              echo "<tr>";
              foreach ($posicoes as $valores){
                            echo "<td>".$valores."</td>";           
              } 

              if ($posicoes["media"] >= 6) {
                            echo "<td><font color='green'> Aprovado</font></td>";
              } else {
                            echo "<td><font color='red'> Reprovado</td>";
              }

              echo "</tr>";
}


echo "</table>";

?>
