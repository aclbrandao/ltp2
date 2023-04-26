<?php 

class tratamento_registro_q12{

              private $pdo;              

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


              public function gravaDados($id, $imc, $nome, $resposta){
                            
                            $cmd = $this->pdo->prepare("INSERT INTO tb_registro_imc (Ds_nome,
                            Nr_Vlr_IMC) VALUES (:n,:i)");
                            $cmd->bindValue(":n", $nome);
                            $cmd->bindValue(":i", $imc);
                            $cmd->execute();

                            foreach ($resposta as $k){
                                         
                                          if ($nome == $nome){
                                                         $cmd = $this->pdo->prepare("UPDATE tb_registro_imc SET Ds_Situacao = :s WHERE Ds_nome = :n");
                                                         $cmd->bindValue(":s", $k);
                                                         $cmd->bindValue(":n",$nome);
                                                         $cmd->execute();
                                          }
                            }

              }

}

?>