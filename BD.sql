create database crud,
create table producto
(
id int primary key auto_increment,
nombre  varchar(50) not null,
precio float ,
id_cat int ,
foreign key (id_cat) references categoria(id_categoria)
)
 create table categoria
(
id_categoria int primary key auto_increment,
nomcat varchar(50) not null
)

insert into categoria values(null, 'Aseo Personal')
insert into categoria values(null, 'Viveres'),
insert into categoria values(null, 'Limpieza hogar')
select * from categoria
insert into producto values(null, 'Jabon Protex', 3.50 ,1)
insert into producto values(null, 'Atun Incamar', 6.00,2)
insert into producto values(null, 'Aceite Primor', 4.00 ,2)
insert into producto values(null, 'Cera', 3.50 ,3)

select * from producto
select  p.id , p.nombre , p.precio , c.nomcat from producto p  inner join  categoria c  on c.id_categoria =  p.id_cat
