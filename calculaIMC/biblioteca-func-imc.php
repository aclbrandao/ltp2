<?php

include "tratamento-registro-q12.php";


class biblioteca_func_imc {

              private $pdo;
              private $imc;
              private $nome;
              private $id;
              

              public function __construct($dsn, $usuario,$senha){
                            try 
                            {
                                          $this->pdo= new PDO ("mysql:dbname=".$dsn, $usuario, $senha);
                            }

                            catch (PDOException $pdoException)
                            {
                                          echo "Erro com o banco de dados: ".$pdoException->getMessage();
                                          exit();
                            }

                            catch (Exception $errosGenericos) {
                                          echo "Erro com o banco de dados: ".$errosGenericos->getMessage();
                                          exit();
                            }
              }

              public function CalculaIMC($nome){
              
              
                            if (isset($_POST['botao'])) 
                            {

                                          $peso = (float) str_replace(',', '.', $_POST['peso']);
                                          $altura = (float) str_replace(',', '.', $_POST['altura']);

                                          $calculoImc = $peso / ($altura * $altura);
                                          $this->imc = $calculoImc;

                                          $this->nome= $nome;

                                          echo "$nome, seu IMC é $this->imc e a sua situação é ";
                            }
              }
 
              function situacaoIMC() {

                            $resultadoIMC = $this->imc;
                            
                            if ($resultadoIMC < 17) {
                                          $id = 1;
                            } 

                            elseif ($resultadoIMC <= 18.49) 
                            {
                                          $id = 2;
                            } 
                            
                            elseif ($resultadoIMC <= 24.99) 
                            {
                                          $id = 3;
                            } 
                            
                            elseif ($resultadoIMC <= 29.99) 
                            {
                                          $id = 4;
                            } 
                            
                            elseif ($resultadoIMC <= 34.99) 
                            {
                                          $id = 5;
                            } 
                            
                            elseif ($resultadoIMC <= 39.99) 
                            {
                                          $id = 6;
                            } 
                            
                            else 
                            {
                                          $id = 7;
                            }
                            
                            
                            $resposta = array();
                            $cmd = $this->pdo->prepare("SELECT Ds_Situacao FROM tb_faixas_imc WHERE Id_faixa_IMC = :id;");
                            $cmd->bindValue(":id", $id);
                            $cmd->execute();
                            $resposta = $cmd->fetch(PDO::FETCH_ASSOC);
                            
                            //array resposta onde há o id correspondente:
                            foreach ($resposta as $k){
                                          echo $k."<br><br>";
                            }

                            $tr1 = new tratamento_registro_q12('mysql:host=localhost;dbname=imc', 'root', 'senha aqui');
                            $nomeRecebido = $this->nome;
                            $tr1->gravaDados($id, $resultadoIMC, $nomeRecebido, $resposta);
                            
              }


}

