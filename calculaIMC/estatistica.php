<?php
//que consultará a tabela acima e mostrará o total de pessoas por faixa de IMC. Esse programa será chamado a partir de um link no programa que mostrou a situação para a pessoa que calculou o IMC.

class estatistica {
              private $pdo;
              private $resposta;

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

              public function consultaRegistros() {
                            $resposta = array ();
                            $cmd = $this->pdo->query("SELECT * FROM tb_registro_imc ORDER BY Id_pessoa;");
                            $resposta = $cmd->fetchAll(PDO :: FETCH_ASSOC);
                            $this->resposta= $resposta;
                            return $resposta;
              }

              public function tabelaPessoas(){
                            $titulos = ["Número", "Nome", "Resultado IMC", "Situação"];
                            
                            $valores = $this->resposta;
                            

                            echo "<table border='1'>";
                            foreach ($titulos as $k){
                                          echo "<th>".$k."</th>";
                            }
                            
                            foreach ($valores as $k){
                                          echo "<tr>";
                                          foreach($k as $v) {
                                                        echo "<td>";
                                                        echo $v;
                                                        echo "</td>";
                                          }
                                          echo "</tr>";
                            }

                            echo "</table>";


              }
              

}


?>