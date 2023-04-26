<?php 

include "biblioteca-func-imc.php";
include "estatistica.php";


$nome = $_POST["nome"];
$peso = $_POST["peso"];
$altura = $_POST['altura'];

$b = new biblioteca_func_imc ('mysql:host=localhost;dbname=imc', 'root', 'senha aqui');

function validaDados($nomeRecebido, $peso, $altura, $b){

              $erroDePreenchimento = "<h3>Erro no preencimento do formulário</h3>"; 
              $existeErro = 0;
              $botaoDeVoltar = "<a href = 'q12.html'><button>Voltar</button></a>";

              $padraoNome = "/^[a-z ]+$/i";
              $padraoPeso = "/^[0-9,.]{2,5}$/";
              $padraoAltura = "/^[0-9,.]{3,5}$/";
              
              if (!preg_match($padraoNome, $nomeRecebido))
              {
                            //IF DO ESPAÇO
                            $descricaoErro= "Nome inválido<br><br>";
                            $existeErro++;
              }
              
              if (!preg_match($padraoPeso, $peso))
              {
                            $descricaoErro="Peso inválido<br>";
                            $existeErro++;
              }

              if (!preg_match($padraoAltura, $altura))
              {
                            $descricaoErro="Altura inválida<br>";
                            $existeErro++;
              }

              if ($existeErro!=0)
              {

                            echo $erroDePreenchimento.$descricaoErro."<br>".$botaoDeVoltar;
                            
              } 

              else 
              {
                           $b->CalculaIMC($nomeRecebido);
                           $b->situacaoIMC();
              }

}

function estatistica (){
              echo "<a href='resultado-estatistica.php'>Tabela de registros</a>";
}


validaDados($nome, $peso, $altura, $b);

//colocar dentro do link:
estatistica();

echo "<p><a href='formIMC.html'>Novo cálculo</a></p>";
