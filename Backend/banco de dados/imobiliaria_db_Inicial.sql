create database imobiliaria_db;

use imobiliaria_db;

create table usuario(

id int not null primary key auto_increment,
nome varchar(50) not null,
email varchar(100) not null,
senha varchar(32) not null,
categoria int not null, /*0 , 1 ou 2 */
status int not null /*0 ou 1 */
);

create table proprietario(
id_proprietario int not null primary key auto_increment,
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

create table imovel(
id_imovel int not null primary key auto_increment,
id_proprietario int,

CONSTRAINT fk_PropImovel FOREIGN KEY (id_proprietario) REFERENCES proprietario(id_proprietario)



);

create table imobiliaria (
id_imobiliaria int not null primary key auto_increment,
nome varchar(50) not null

/*Falta ver quais imoveis fazem parte dessa imobiliaria e etc*/

);

create table pedido_manutencao(
id_pedido int not null primary key auto_increment,
id_imovel int,
id_inquilino int,
CONSTRAINT fk_PedidoImov FOREIGN KEY (id_imovel) REFERENCES imovel(id_imovel),
CONSTRAINT fk_PedidoInqu FOREIGN KEY (id_inquilino) REFERENCES inquilino(id_inquilino)

);

create table reclamacoes(
id_reclama int not null primary key auto_increment,
id_inquilino int,
CONSTRAINT fk_UserReclama FOREIGN KEY (id_inquilino) REFERENCES inquilino(id_inquilino)

);
















