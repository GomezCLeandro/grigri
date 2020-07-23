create table Persona (
	id_persona int(11) auto_increment,
	nombre varchar(30),
	apellido varchar (30),
	numero_documento varchar(30),
    sexo char(1),
    fecha_nacimiento date,
    id_tipo_documento int(11),
    estado varchar(10),
	primary key (id_persona)
);

create table Usuario (
	id_usuario int(11) auto_increment,
    username varchar(20),
	password varchar(16),
    id_perfil int(11),
    id_persona int(11),
    primary key(id_usuario)
);

create table TipoContacto (
	id_tipo_contacto int(11) auto_increment,
	descripcion varchar(30),
	primary key(id_tipo_contacto)
);

create table Persona_Contacto (
	id_persona_contacto int(11) auto_increment,
	id_peronsa int(11),
	id_contacto int(11),
    valor varchar(30),
	primary key(id_persona_contacto)
);

create table Domicilio (
	id_domicilio int(11) auto_increment,
	id_barrio int(11),
    id_persona int(11),
    casa int(15),
    manzana int(15),
    calle varchar(50),
    altura int(15),
    descripcion varchar(100),
	primary key(id_domicilio)
);

create table Barrio (
	id_barrio int(11) auto_increment,
    id_localidad int(11),
	nombre varchar(30) not null,
	primary key(id_barrio)
);

create table Localidad (
	id_localidad int(11)auto_increment,
    nombre varchar (30),
    primary key (id_localidad)
);

create table Perfil (
	id_perfil int(11) auto_increment,
	nombre varchar(20),
	primary key(id_perfil)
);

create table Perfil_Modulo (
	id_perfil_modulo int(11) auto_increment,
	id_perfil int(11),
    id_modulo int(11),
	primary key(id_perfil_modulo)
);

create table Modulo (
	id_modulo int(11) auto_increment,
	nombre varchar(20),
    directorio varchar(20),
	primary key(id_modulo)
);

create table TipoDocumento (
	id_tipo_documento int(11) auto_increment,
	nombre varchar(20),
	primary key(id_tipo_documento)
);

create table EstadoReserva (
	id_estado_reserva int(11) auto_increment,
	descripcion varchar(20),
	primary key(id_estado_reserva)
);

create table Reserva (
	id_reserva int(11) auto_increment,
    id_usuario int(11),
    id_servicio int(11),
    id_estado_reserva int(11),
    fecha_reserva date,
    lugar_reserva varchar(50),
	descripcion varchar(20),
	primary key(id_reserva)
);

create table disenio (
	id_disenio int(11) auto_increment,
    id_subCategoria int,
    id_item int,
    primary key(id_disenio)
);

create table Servicio (
	id_servicio int(11) auto_increment,
    id_item int(11),
    descripcion varchar(20),
    primary key(id_servicio)
);

create table Item (
	id_item int(11) auto_increment,
	precio int,
    descripcion varchar(30),
	primary key(id_item)
);

create table DetallePedido (
	id_detalle_pedido int(11) auto_increment,
	id_pedido int(11),
    id_item int(11),
    cantidad int(20),
	primary key(id_detalle_pedido)
);

create table Pedido (
	id_pedido int(11) auto_increment,
    id_usuario int(11),
    id_envio int(11),
    id_estado_pedido int(11),
    fecha_entraga date,
    lugar_entrega varchar(40),
    primary key(id_pedido)
);

create table TipoEnvio (
	id_envio int(11) auto_increment,
    descripcion int(11),
    primary key(id_envio)
);

create table EstadoPedido (
	id_estado_pedido int(11) auto_increment,
	descripcion varchar(20),
	primary key(id_estado_pedido)
);

create table Imagen (
	id_imagen int(11) auto_increment,
    id_item int(11),
    imagen varchar(50),
    primary key(id_imagen)
);

create table Disenio_Recurso (
	id_disenio_recurso int(11) auto_increment,
    nombre_tematica varchar(30),
    primary key(id_disenio_recurso)
);

create table Recurso (
	id_recurso int(11) auto_increment,
    descripcion varchar(20),
    primary key(id_recurso)
);

create table SubCategoria (
	id_subCategoria int(11) auto_increment,
	id_categoria int(11),
    subCategoria varchar(30),
	primary key(id_subCategoria)
);

create table Categoria (
	id_categoria int(11) auto_increment,
	categoria varchar(20),
	primary key(id_categoria)
);

#Insert en persona

insert into persona (nombre,apellido,numero_documento,sexo,fecha_nacimiento,id_tipo_documento,estado) values ('Leandro','Gomez','41.416.291','M','1999-03-02',2,1);
insert into persona (nombre,apellido,numero_documento,sexo,fecha_nacimiento,id_tipo_documento,estado) values ('Carlos','Acosta','40.165.791','M','1999-07-06',2,1);
insert into persona (nombre,apellido,numero_documento,sexo,fecha_nacimiento,id_tipo_documento,estado) values ('Narciso','Ruiz','42.516.651','M','1999-05-03',2,1);

#Insert en usuario

insert into usuario (username,password,id_perfil,id_persona) values ('LeanG',1234,2,1);
insert into usuario (username,password,id_perfil,id_persona) values ('CarlosAcosta',1234,2,2);
insert into usuario (username,password,id_perfil,id_persona) values ('NarcisoR',1234,2,3);

#insert en domicilio

insert into domicilio (id_persona,id_barrio,casa,manzana,calle,altura,descripcion) values (1,1,30,307,'Av Italia',1999,'frente a un supermercado apa');
insert into domicilio (id_persona,id_barrio,casa,manzana,calle,altura,descripcion) values (2,3,40,7,'Av Cabral',506,'');
insert into domicilio (id_persona,id_barrio,casa,manzana,calle,altura,descripcion) values (3,2,50,30,'Parkinson',1999,'');

#insert en barrio

insert into barrio (id_localidad,nombre) values (1,'2 de abril');
insert into barrio (id_localidad,nombre) values (1,'La Paz');
insert into barrio (id_localidad,nombre) values (1,'El timbo 2');

#insert en localidad

insert into localidad (nombre) values ('Formosa');
insert into localidad (nombre) values ('Pirane');

#insert en pefil

insert into perfil (nombre) values ('administrador');
insert into perfil (nombre) values ('cliente');

#insert en modulo

insert into modulo (nombre,directorio) values ('Ventas','ventas');
insert into modulo (nombre,directorio) values ('Pedidos','pedidos');
insert into modulo (nombre,directorio) values ('Reservas','reservas');
insert into modulo (nombre,directorio) values ('Usuarios','usuarios');
insert into modulo (nombre,directorio) values ('Catalogo','catalogo');
insert into modulo (nombre,directorio) values ('Categoria','categoria');
insert into modulo (nombre,directorio) values ('SubCategoria','subcategoria');
insert into modulo (nombre,directorio) values ('Diseño','disenio');
insert into modulo (nombre,directorio) values ('Recurso','recurso');
insert into modulo (nombre,directorio) values ('Servicio','servicio');

#insert perfil_modulo

insert into perfil_modulo (id_perfil,id_modulo) values (1,1);
insert into perfil_modulo (id_perfil,id_modulo) values (1,2);
insert into perfil_modulo (id_perfil,id_modulo) values (1,3);
insert into perfil_modulo (id_perfil,id_modulo) values (1,4);
insert into perfil_modulo (id_perfil,id_modulo) values (1,5);
insert into perfil_modulo (id_perfil,id_modulo) values (1,6);
insert into perfil_modulo (id_perfil,id_modulo) values (1,7);
insert into perfil_modulo (id_perfil,id_modulo) values (1,8);
insert into perfil_modulo (id_perfil,id_modulo) values (1,9);
insert into perfil_modulo (id_perfil,id_modulo) values (1,10);
insert into perfil_modulo (id_perfil,id_modulo) values (2,2);
insert into perfil_modulo (id_perfil,id_modulo) values (2,3);
insert into perfil_modulo (id_perfil,id_modulo) values (2,5);
insert into perfil_modulo (id_perfil,id_modulo) values (2,8);
insert into perfil_modulo (id_perfil,id_modulo) values (2,10);

#insert tipo documento

insert into tipodocumento (nombre) values ('Cedula');
insert into tipodocumento (nombre) values ('D.N.I');
insert into tipodocumento (nombre) values ('Pasaporte');

#insert diseño

insert into disenio (id_item) values (1);
insert into disenio (id_item) values (2);

#insert servicio

insert into servicio (id_item, descripcion) values (3, 'fondo de torta');
insert into servicio (id_item, descripcion) values (4, 'souvenir');

#insert item

insert into item (precio, descripcion) values (200,'pepapig');
insert into item (precio, descripcion) values (150,'la granja');
insert into item (precio, descripcion) values (900,'decoracion de fondo de torta');
insert into item (precio, descripcion) values (650,'souvenir');

#insert de recurso

insert into recurso (descripcion) values ('frascos de vidrio');
insert into recurso (descripcion) values ('vinilo adhesivo');
insert into recurso (descripcion) values ('Taza');
insert into recurso (descripcion) values ('Telas');

#insert de categoria

insert into categoria (categoria) values ('Decoracion con Telas');
insert into categoria (categoria) values ('Souvenir');
insert into categoria (categoria) values ('Combos');
insert into categoria (categoria) values ('Tarjeteria');

#insert de subcategoria

insert into subcategoria (id_categoria, subcategoria) values (1,'Fondo de tortas');
insert into subcategoria (id_categoria, subcategoria) values (3,'Party Box');
insert into subcategoria (id_categoria, subcategoria) values (2,'Rosarios para comunion');
insert into subcategoria (id_categoria, subcategoria) values (4,'Tarjetas de invitacion');
insert into subcategoria (id_categoria, subcategoria) values (4,'Tarjetas personales');