<?php include 'includes/header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Principal</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Principal</a></li>
              <li class="breadcrumb-item active">Entradas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
               <!-- Default box -->
               <div class="card">
              <div class="card-header">
                <h3 class="card-title">Mensajes Recibidos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha</th>
                    <th>Mensaje</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
             			$sql = "SELECT * FROM cont";
                   $result = $db->query($sql);
                   while ($row = $result->fetch_assoc()): 
                    ?>
                    <tr>
                        <td><?php echo $row['id_cont']; ?></td>
                        <td><?php echo $row['name_cont']; ?></td>
                        <td><?php echo $row['email_cont']; ?></td>
                        <td><?php echo $row['date_cont']; ?></td>
                        <td><?php echo $row['desc_cont']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha</th>
                    <th>Mensaje</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<?php include 'includes/footer.php'; ?>
