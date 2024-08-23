<form action="" id="FRegProducto">
    <div class="modal-header">
        <h4 class="modal-title">Registro Nuevo Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

    <div class="form-group">
        <label for="exampleInputBorder">Código</label>
        <input type="text" class="form-control" placeholder="codp" name="" id="codp">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Código SIN</label>
        <input type="text" class="form-control" placeholder="" name="codps" id="codps">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Nombre</label>
        <input type="text" class="form-control" placeholder="" name="nombre" id="nombre">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Precio</label>
        <input type="text" class="form-control" placeholder="" name="precio" id="precio">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Unidad Medida</label>
        <input type="text" class="form-control" placeholder="" name="unidadm" id="unidadm">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Unidad Medida SIN</label>
        <input type="text" class="form-control" placeholder="" name="unidadms" id="unidadms">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Imagen</label>
        <input type="text" class="form-control" placeholder="" name="imagen" id="imagen">
    </div>
    <div class="form-group">
        <label for="exampleInputBorder">Disponible</label>
        <input type="text" class="form-control" placeholder="" name="disponible" id="disponible">
    </div>

    </div>
    <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      regProducto()
    }
  });
  $('#FRegProducto').validate({
    rules: {
      razon: {
        required: true,
        minlength: 3,
      },
      nit: {
        required: true,
        minlength: 3,
      },
      direccion: {
        required: true,
        minlength: 3,
      },
      nombre: {
        required: true,
        minlength: 3,
      },
      telefono: {
        required: true,
        minlength: 3,
      },
      email: {
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