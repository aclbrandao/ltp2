
<?php

/*Código desenvoldido por: 
Ana Clara Lopes Brandão - ADS MAT3 SENAC DF*/



require('fpdf185/fpdf.php');

class PDF extends FPDF{

    //carregando os dados:
    function carregaAlunos($arquivo){
        $linhas = file($arquivo);
        $dados = array();
        foreach ($linhas as $linha){
            $dados[]= explode(';', trim($linha));
        } return $dados;
    }

    //resolvendo ç e ã:
    public function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link=''){
        $txt = utf8_decode($txt);
        parent::Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);
}

    //criando a tabela:
    function criaTabela($cabecalho, $dados){
        //definindo largura de cada coluna:
        $l= array (42,22,128,22);
        
        //configurando o cabeçalho:
        for ($v=0;$v<count($cabecalho); $v++){
            $this->Cell($l[$v],9, $cabecalho[$v],1,0,'C');
        } $this->Ln();

        //plotando os dados:
        foreach($dados as $tupla){
            $this->Cell($l[0],10,$tupla[0],'LR');
            $this->Cell($l[1],10,$tupla[1],'LR');$this->Cell($l[2],10,$tupla[2],'LR');
            //PESQUISAR FLOAT AQUI:
            $this->Cell($l[3],10,number_format($tupla[3],1, '.', ''),'LR',0,'R');
            $this->Ln();
        }

        // fechando a linha:
        $this->Cell(array_sum($l),0,'','T');

    }



}

//estanciar a classe:
$pdf = new PDF ("L");

//coluna cabeçalho:
$cabecalho = array('Nome','Curso','Disciplina', 'Média');

$dados = $pdf->carregaAlunos('alunos.CSV');
$pdf->SetFont('Times','',22);
$pdf->AddPage();
$pdf->criaTabela($cabecalho, $dados);
$pdf->Output();
?>
