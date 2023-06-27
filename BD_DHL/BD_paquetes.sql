create database paquetes;
use paquetes;

//////////create table status 
(id_status int primary key,
status varchar(50));

////////////create table cod_postal
(id_cod_postal int primary key,
cod_postal int);

///create table colonia 
(id_colonia int primary key,
colonia varchar(50));

/////////create table estado
(id_estado int primary key,
estado varchar(50));

///////create table municipio
(id_municipio int primary key,
municipio varchar(50));

///////create table transporte
(id_trans int primary key,
transporte varchar(50));

// create table tamaños
(id_tam_paquete int primary key,
tamaño varchar(50));

///create table costos
(id_costo int primary key,
id_paquete2 int,
foreign key (id_paquete2) references paquetes (id_paquete),
precio varchar(50));

////////create table ruta
(id_ruta int primary key,
id_cod_postal2 int,
foreign key (id_cod_postal2) references cod_postal (id_cod_postal),
zona varchar(50));


////create table direccion 
(id_direccion int primary key,
calle varchar(50),
lote int,
manzana int,
id_municipio1 int, 
foreign key (id_municipio1) references municipio (id_municipio),
id_cod_postal1 int,
foreign key (id_cod_postal1) references cod_postal (id_cod_postal),
id_estado1 int,
foreign key (id_estado1) references estado  (id_estado),
id_colonia1 int,
foreign key (id_colonia1) references colonia (id_colonia));


//////////////create table clientes 
(id_cliente int primary key, 
nom_cliente varchar(50),
a_paterno varchar(50),
a_materno varchar(50),
id_direccion1 int,
foreign key (id_direccion1) references direccion (id_direccion),
telef_cel int,
correo_elec varchar(50));

///////create table paquetes
(id_paquete int primary key,
id_tam_paquete1 int,
foreign key (id_tam_paquete1) references tamaños (id_tam_paquete),
pes_paquete varchar(50),
id_cliente1 int,
foreign key (id_cliente1) references clientes (id_cliente), 
id_status1 int,
foreign key (id_status1) references status (id_status));

create table envios 
(id_envio int primary key,
id_paquete1 int,
foreign key (id_paquete1) references paquetes (id_paquete),
id_ruta1 int,
foreign key (id_ruta1) references ruta (id_ruta),
id_costo1 int,
foreign key (id_costo1) references costos (id_costo),
id_trans1 int,
foreign key (id_trans1) references transporte (id_trans));