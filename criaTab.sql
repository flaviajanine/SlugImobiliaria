create database Loja;
use Loja;
create table CompraVenda(
		id_Negocio int primary key,
        cod_Mercadoria int,
        tipo_Mercadoria varchar(50),
        Nome varchar(100),
        Quantidade int,
        Preco double,
        tipo_Negocio varchar(10));
