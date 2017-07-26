create database imobiliaria_db;

use imobiliaria_db;

create table usuario(

id int not null primary key auto_increment,
nome varchar(50) not null,
email varchar(100) not null,
senha varchar(32) not null,
categoria varchar(32) not null
/* status int not null /*0 ou 1 */
);

create table proprietario(
id_proprietario int not null primary key auto_increment,

#Testando
id_imobiliaria_cadastrou int not null,
##

nome varchar(50) not null,
sobrenome varchar(50) not null,
cpf varchar(11) not null,
rua	 varchar(50) not null, 
cep varchar(8)not null,
bairro varchar(25) not null,
cidade varchar(25) not null,
estado varchar(25) not null,
complemento varchar(25)not null,


id_usuario int , 
CONSTRAINT fk_UserProp FOREIGN KEY (id_usuario) REFERENCES usuario(id)

);

create table inquilino(
id_inquilino int not null primary key auto_increment,
nome varchar(50) not null,
sobrenome varchar(50) not null,
cpf varchar(11) not null,

id_usuario int,
CONSTRAINT fk_UserInqui FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);

create table imovel (

id_imovel int not null primary key auto_increment,
rua	 varchar(50) not null, 
cep varchar(8)not null,
bairro varchar(25) not null,
cidade varchar(25) not null,
estado varchar(25) not null,
complemento varchar(25)not null,
preco varchar(25) not null, 
id_proprietario int,
status_alugado varchar(3) not null

);

create table imobiliaria (
id_imobiliaria int not null primary key auto_increment,
nome varchar(50) not null,
cnpj varchar(50) not null

/*
Falta ver quais imoveis fazem parte dessa imobiliaria e etc
fk id imovel.
*/

);

create table contrato(
id_contrato int not null primary key auto_increment,
id_proprietario int,
id_inquilino int,
id_imovel int,
id_imobiliaria int,

CONSTRAINT id_proprietario FOREIGN KEY (id_proprietario) REFERENCES proprietario(id_proprietario),
CONSTRAINT id_inquilino FOREIGN KEY (id_inquilino) REFERENCES inquilino (id_inquilino),
CONSTRAINT id_imovel FOREIGN KEY (id_imovel) REFERENCES imovel (id_imovel),
CONSTRAINT id_imobiliaria FOREIGN KEY (id_imobiliaria) REFERENCES imobiliaria (id_imobiliaria)
);


create table pedido_manutencao(
id_pedido int not null primary key auto_increment,
id_imovel int,
id_inquilino int not null,
tipo_manutencao varchar(25) not null,
CONSTRAINT fk_PedidoImov FOREIGN KEY (id_imovel) REFERENCES imovel(id_imovel)
#CONSTRAINT fk_PedidoInqu FOREIGN KEY (id_inquilino) REFERENCES inquilino(id_inquilino)

);

create table reclamacoes(
id_reclama int not null primary key auto_increment,
texto_reclamacao varchar(100) not null,
id_inquilino int not null 
#esse id_inquilino = id_usuario na tabela usuário.

#Tive que tirar o FK para conseguir guardar em uma variavel de sessao
#CONSTRAINT fk_UserReclama FOREIGN KEY (id_inquilino) REFERENCES inquilino(id_inquilino)

);

