select  * from insert_producto
select  * from   producto

create trigger insertarproductos 
after insert  on producto 
for each row  
insert into  insert_producto(id,nombre , precio ,id_cat , id_usu ,cant_pro , fecha_pro)
values (new.id,new.nombre, new.precio,new.id_cat,new.id_usu,new.cant_pro,now())

insert into producto values(null,'sublime', 7 , 1 ,2, 1 )
drop trigger

create TRIGGER   editarproductos 
AFTER UPDATE ON producto 
FOR EACH  ROW 
INSERT INTO   insert_producto(id,nombre,nombre_viejo,precio,precio_viejo,id_cat,id_cat_viejo,id_usu,id_usu_v,cant_pro,cant_pro_viejo,fecha_pro)
VALUES(old.id,NEW.nombre,old.nombre,NEW.precio,old.precio,new.id_cat,old.id_cat,new.id_usu,old.id_usu,new.cant_pro,old.cant_pro,now());

create  TRIGGER editarproductoss
AFTER update  ON producto 
FOR EACH  ROW
update insert_producto 
set nombre= new.nombre, nombre_viejo=old.nombre, precio = new.precio,precio_viejo = old.precio  , id_cat = new.id_cat, id_cat_viejo = old.id_cat, cant_pro= new.cant_pro,cant_pro_viejo = old.cant_pro
where id = new.id

SET SQL_SAFE_UPDATES = 0;

esto es para poder activar  los trigers de actulizar
SELECT * from insert_producto;

update producto set nombre ='prueba 03', precio = 50, id_cat =null, id_usu = 2, cant_pro = 4   where  id = 1

CREATE TRIGGER nuevasventas AFTER INSERT ON ventas
    FOR EACH ROW
    UPDATE cliente SET id_ultimo_pedido = NEW.id WHERE id = NEW.id_cliente
;


CREATE TABLE cliente( id SERIAL, nombre VARCHAR(255), id_ultimo_pedido BIGINT );
CREATE TABLE ventas ( id SERIAL, id_articulo BIGINT, id_cliente BIGINT, cantidad INT, precio DECIMAL(9,2) );


select *  from  insert_producto where id_usu  = 1


select *  from  insert_producto
