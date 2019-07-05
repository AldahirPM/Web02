/*---- Base de datos --- */
create database sysbasic;
/*---- Tablas --- */

create table producto
(
id int not null auto_increment,
nombre  varchar(50),
precio float,
id_cat int ,
id_usu int ,
cant_pro int ,
primary key(id),
foreign key (id_cat) references categoria(id_categoria),
foreign key (id_usu) references usuario(id_u)
);
select * from producto
insert into producto values(null, 'pedro', 1 ,1, null , 12 )
select * from insert_producto
 create table categoria
(
id_categoria int primary key auto_increment,
nomcat varchar(50) not null
);
create table usuario
(
 id_u int primary key auto_increment,
 dni int,
 nom varchar(50),
 telefono int,
 fecha date
);
create table insert_producto
(
id_i int,
id int ,
nombre  varchar(50) not null,
nombre_viejo varchar(50) not null,
precio float ,
precio_viejo float ,
id_cat int ,
id_cat_viejo int ,
id_usu int ,
id_usu_v int,
cant_pro int,
cant_pro_viejo int,
fecha_pro TIMESTAMP
);

/*---- Evento para eliminar cada cierto tiempo  --- */
SET GLOBAL event_scheduler = ON;/*habilitar eventos */
create event  eliminar
on schedule at current_timestamp() + interval 1 second
do truncate  table insert_producto  ;

/*---- Trigger para Insertar  --- */
create   trigger insertarproductos 
after insert  on producto 
for each row  
insert into  insert_producto(id,nombre , precio ,id_cat , id_usu ,cant_pro , fecha_pro)
values (new.id,new.nombre, new.precio,new.id_cat,new.id_usu,new.cant_pro,now());

/*---- Trigger para Actulizar --- */

SET SQL_SAFE_UPDATES = 0;/* Habilitar trigger actulizar*/
create  trigger  editarproductoss
AFTER update  ON producto 
FOR EACH  ROW
update insert_producto 
set nombre= new.nombre, nombre_viejo=old.nombre, precio = new.precio,precio_viejo = old.precio  , id_cat = new.id_cat, id_cat_viejo = old.id_cat, cant_pro= new.cant_pro,cant_pro_viejo = old.cant_pro
where id = new.id
/* ---   insert  para  categoria -- */ 
insert into categoria values(null, 'Golosinas')
insert into categoria values(null, 'Viveres')
insert into categoria values(null, 'Ropa')

insert into producto values(null, 'pedro', 1 ,   1,null, 12 )