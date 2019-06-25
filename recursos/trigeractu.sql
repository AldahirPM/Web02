
create table producto
(
id int not null auto_increment,
nombre  varchar(50) not null,
precio float,
id_cat int ,
id_usu int ,
cant_pro int ,
primary key(id),
foreign key (id_cat) references categoria(id_categoria),
foreign key (id_usu) references usuario(id_u)
)

CREATE TABLE [dbo].[LogData](
    [id] [int] IDENTITY(1,1) NOT NULL,
    [fechahora] [text] NULL,
    [descripcion] [text] NULL,
    [servidor] [text] NULL,
    [horaCaptura] [time](7) NULL,
    [fechaCaptura] [date] NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]


insert into producto values(null, 'sublime', 7 , 1 ,2, 1 )

CREATE PROCEDURE dbo.Sp_ProcesoDiario
AS
BEGIN
  DECLARE @tiempo date = DATEADD(day,90,fechaHora)
--DELETE FROM LogData WHERE fechaCaptura <= GETDATE();
  DELETE FROM LogData WHERE @tiempo >= GETDATE();

END



DECLARE @Now    DATETIME

SELECT  @Now    = CONVERT(DATETIME, CONVERT(VARCHAR, GETDATE(), 112))
select * from  insert_producto
DELETE FROM insert_producto WHERE fechaCaptura < DATEADD(DAY, -90, @Now)
hour 
DELETE FROM insert_producto WHERE (UNIX_TIMESTAMP() - fecha_pro) > 6000


select* from insert_producto 
select * from producto
)insertarproductos
SET GLOBAL event_scheduler = ON;

create event  eliminar
on schedule at current_timestamp() + interval 1 second
do truncate  table insert_producto  

 


select *  from producto
insert into producto values(null, 'ultiam', 7 , 1 ,2, 1 , now())
update producto set nombre ='actuprueba', precio = 50 , id_cat =1 ,cant_pro = 4, id_usu= 2  where  id=  180

create trigger  editarproductos 
after update on producto 
for each row 
insert into  insert_producto(nombre , precio ,id_cat , id_usu ,cant_pro , fecha_pro)
values (old.nombre,old.precio,old.id_cat,old.id_usu,old.cant_pro,now())


update 

create table insert_producto
(
id_i int primary key auto_increment,
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
)

create trigger insertarproductos 
after insert  on producto 
for each row  
insert into  insert_producto(id,nombre , precio ,id_cat , id_usu ,cant_pro , fecha_pro)
values (new.id,new.nombre, new.precio,new.id_cat,new.id_usu,new.cant_pro,now())



create trigger actu_a  
after insert on  producto
alter table usuario
modify fecha TIMESTAMP

insert into usuario values(null,747854, 'la vaca lola :v' , 96974856 ,now())
create TRIGGER   editarproductos 
AFTER UPDATE ON producto 
FOR EACH  ROW 
INSERT INTO   insert_producto(id,nombre,nombre_viejo,precio,precio_viejo,id_cat,id_cat_viejo,id_usu,id_usu_v,cant_pro,cant_pro_viejo,fecha_pro)
VALUES(old.id,NEW.nombre,old.nombre,NEW.precio,old.precio,new.id_cat,old.id_cat,new.id_usu,old.id_usu,new.cant_pro,old.cant_pro,now());

update insert_producto set nombre ='hola aldahir estoy vivo 2', precio = 50, id_cat =1, id_usu = 2, cant_pro = 4   where  id = 1

select  * from insert_producto

select  * from  usuario
select 
select  * from   producto

insert_productoinsert into producto values(null, 'ultiam', 7 , 1 ,2, 1 , now())

asdasd

drop trigger insertarproductos
