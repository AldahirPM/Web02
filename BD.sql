create database basico
create table producto
(
id int primary key auto_increment,
nombre  varchar(50) not null,
precio float ,
id_cat int ,
id_usu int ,
foreign key (id_cat) references categoria(id_categoria),
foreign key (id_usu) references usuario(id_u)
)
 create table categoria
(
id_categoria int primary key auto_increment,
nomcat varchar(50) not null
)

create table usuario
(
 id_u int primary key auto_increment,
 dni int,
 nom varchar(20),
 telefono int,
 fecha date
)
select * from producto  
delete  * from producto
insert into usuario values(null,71768862,'Pedro Aldahir Gayoso Machaca',5320609, CURDATE() )
insert into usuario values(null,71768861,'Saldaña Collantes',5320609, CURDATE() )
insert into usuario values(null,71768863,'Flores Valencia',5320609, NOW() )

insert into categoria values(null, 'Aseo Personal')
insert into categoria values(null, 'Viveres')
insert into categoria values(null, 'Limpieza hogar')
select * from categoria
insert into producto values(null, 'Jabon Protex', 3.50 , 1 , null)
insert into producto values(null, 'Atun Incamar', 6.00,2)
insert into producto values(null, 'Aceite Primor', 4.00 ,2)
insert into producto values(null, 'Cera', 3.50 ,3)

ALTER TABLE usuario  modify column nom varchar(40)


select * from producto
select  p.id , p.nombre , p.precio , c.nomcat ,  u.nom from producto p  
inner join  categoria c  on c.id_categoria =  p.id_cat
inner join usuario u on u.id_u = p.id_usu