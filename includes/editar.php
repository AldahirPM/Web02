<?php require_once 'includes/header.php'  ?>
<?php require_once 'includes/conexion.php'  ?>
<?php require_once 'includes/funciones.php'?>

<div class="modal fade" id="exampleModal"  data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <form action="guardar-productos.php">
                <div class="modal-header">
                    <h2>Edita tu producto</h2>
                </div>    
                <div class="modal-body">
                    <label for="">Nombre Producto:</label>
                    <input type="text" class="form-control" value="">
                    <br>
                    <label for="">Categoria:</label>
                    <input type="text" class="form-control">
                    <br>
                    <label for="">Precio:</label>
                    <input type="text" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light " data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

