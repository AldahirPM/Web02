


CREATE TABLE [dbo].[LogData](
    [id] [int] IDENTITY(1,1) NOT NULL,
    [fechahora] [text] NULL,
    [descripcion] [text] NULL,
    [servidor] [text] NULL,
    [horaCaptura] [time](7) NULL,
    [fechaCaptura] [date] NULL
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]



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

drop trigger insertarproductos
create trigger insertarproductos 
after insert  on producto 
for each row  
insert into  insert_producto(nombre , precio ,id_cat , id_usu ,cant_pro , fecha_pro)
values (new.nombre, new.precio,new.id_cat,new.id_usu,new.cant_pro,now())


select* from insert_producto 
select * from producto
insert into producto values(null, 'sublime', 7 , 1 ,2, 1 , now())
)insertarproductos
SET GLOBAL event_scheduler = ON;

CREATE EVENT eliminar
ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 5 second
DO truncate  table insert_producto  