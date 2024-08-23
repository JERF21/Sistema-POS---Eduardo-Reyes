<?php
    require_once "../../controlador/productoControlador.php";

    require_once "../../modelo/productoModelo.php";

    $id=$_GET["id"];
    $producto=ControladorProducto::ctrInfoProducto($id);
    echo "<script>console.log('.$id.');</script>";
?>

<form action="" id="FEditProducto">
    <div class="modal-header">
        <h4 class="modal-title">Editar Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

    <div class="form-group">
        <label for="exampleInputBorder">Código</label>
        <input type="text" class="form-control " placeholder="" name="codp" id="codp" value="<?php echo $producto["cod_producto"]; ?>">
        <input type="hidden" name="idProducto" value="<?php echo $producto["id_producto"]; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Código SIN</label>
        <input type="text" class="form-control " placeholder="" name="codps" id="codps" value="<?php echo $producto["cod_producto_sin"]; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Nombre</label>
        <input type="text" class="form-control " placeholder="" name="nombre" id="nombre" value="<?php echo $producto["nombre_producto"]; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Precio</label>
        <input type="text" class="form-control " placeholder="" name="precio" id="precio" value="<?php echo $producto["precio_producto"]; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Unidad Medida</label>
        <input type="text" class="form-control " placeholder="" name="unidadm" id="unidadm" value="<?php echo $producto["unidad_medida"]; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Unidad Medida SIN</label>
        <input type="text" class="form-control " placeholder="" name="unidadms" id="unidadms" value="<?php echo $producto["unidad_medida_sin"]; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Imagen</label>
        <input type="text" class="form-control " placeholder="" name="imagen" id="imagen" value="<?php echo $producto["imagen_producto"]; ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Disponible</label>
        <input type="text" class="form-control " placeholder="" name="disponible" id="disponible" value="<?php echo $producto["disponible"]; ?>">
    </div>

    </div>
    <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
</form>

<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      editProducto()
    }
  });
  $('#FEditProducto').validate({
    rules: {
      password: {
        required: true,
        minlength: 3,
      },
      vrPassword: {
        required: true,
        minlength: 3,
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>