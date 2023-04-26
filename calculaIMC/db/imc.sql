//criando o db:
CREATE DATABASE imc;

//criando a tabela tb_faixas_imc:
USE imc;

CREATE TABLE tb_faixas_imc(
Id_faixa_IMC INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
 Nr_Vlr_Min DECIMAL(4,2) NOT NULL,
 Nr_Vlr_Max DECIMAL(4,2) NOT NULL,
 Ds_Situacao VARCHAR(60) 
);

INSERT INTO tb_faixas_imc (Nr_Vlr_Min, Nr_Vlr_Max) 
VALUES (0.00, 17.99);

update tb_faixas_imc set Nr_Vlr_Max=17 where Id_faixa_IMC= 1;

INSERT INTO tb_faixas_imc (Nr_Vlr_Min, Nr_Vlr_Max) 
VALUES (17.01, 18.49);

INSERT INTO tb_faixas_imc(Nr_Vlr_Min, Nr_Vlr_Max)
VALUES (18.50,24.99);

INSERT INTO tb_faixas_imc (Nr_Vlr_Min, Nr_Vlr_Max)
VALUES (25,29.99);

INSERT INTO tb_faixas_imc (Nr_Vlr_Min, Nr_Vlr_Max)
VALUES (30,34.99);

INSERT INTO tb_faixas_imc (Nr_Vlr_Min, Nr_Vlr_Max)
VALUES (35,39.99);

INSERT INTO tb_faixas_imc(Nr_Vlr_Min, Nr_Vlr_Max)
VALUES (40,99);

update tb_faixas_imc set Nr_Vlr_Max=99.99 where Id_faixa_IMC= 7;

update tb_faixas_imc set Ds_Situacao ="muito abaixo do peso" 
where Id_faixa_IMC= 1;

update tb_faixas_imc set Ds_Situacao ="abaixo do peso" 
where Id_faixa_IMC= 2;

update tb_faixas_imc set Ds_Situacao ="peso normal" 
where Id_faixa_IMC= 3;

update tb_faixas_imc set Ds_Situacao ="acima do peso" 
where Id_faixa_IMC= 4;

update tb_faixas_imc set Ds_Situacao ="obesidade I" 
where Id_faixa_IMC= 5;

update tb_faixas_imc set Ds_Situacao ="obesidade II (severa)" 
where Id_faixa_IMC= 6;

update tb_faixas_imc set Ds_Situacao ="obesidade III(mórbida)" 
where Id_faixa_IMC= 7;

select * from tb_faixas_imc;

//criando a tabela tb_registro_imc:

use imc;

CREATE TABLE tb_registro_imc(
Id_pessoa INT auto_increment PRIMARY KEY,
Ds_nome VARCHAR(60),
Nr_Vlr_IMC DECIMAL(4,2), 
Ds_Situacao VARCHAR(60)
); 

select * from tb_registro_imc;

DELETE FROM `imc`.`tb_registro_imc`
WHERE Id_pessoa = 4;

truncate `imc`.`tb_registro_imc`;
