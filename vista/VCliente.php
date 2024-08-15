
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
          
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de clientes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Razon Social</th>
                    <th>NIT</th>
                    <th>Direccion</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <td>
                    <button class="btn btn-primary" onclick="MNuevoCliente()">Nuevo</button>
                    </td>
                  </tr>
                  </thead>

               <tbody>
               <?php
                    $cliente=ControladorCliente::ctrInfoClientes();
foreach($cliente as $value){
  ?>

  <tr>
    <td> <?php echo $value["id_cliente"]; ?> </td>
    <td> <?php echo $value["login_cliente"]; ?> </td>
    <td> <?php echo $value["perfil"]; ?> </td>
    <td> <?php 
    if ($value["estado"]==1){
      ?>
  <span class="badge badge-success">Activo</span>
      <?php
    }else{
      ?>
<span class="badge badge-danger">Inactivo</span>
      <?php
    } ?> </td>
    <td> <?php echo $value["ultimo_login"]; ?> </td>
    <td> <?php echo $value["fecha_registro"]; ?> </td>
    <td>
      <div class="btn-group">
        <button class="btn-secondary" onclick="MEditCliente(<?php echo $value["id_cliente"];?>)">
          <i class="fas fa-edit"></i>
        </button>
        <button class="btn-danger" onclick="MEliCliente(<?php echo $value["id_cliente"];?>)">
          <i class="fas fa-trash"></i>
        </button>

      </div>
    </td>
  </tr>

  <?php
}
               ?>
               </tbody>
                   
                </table>
              </div>
              <!-- /.card-body -->
       
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->