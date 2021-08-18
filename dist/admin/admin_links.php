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
              <li class="breadcrumb-item active">Enlaces Importantes</li>
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
          <h3 class="card-title">Enlaces Importantes</h3>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 10%">
                      #
                      </th>
                      <th style="width: 40%">
                          Título del enlace
                      </th>
                      <th style="width: 25%">
                          Enlance
                      </th>
                      <th style="width: 25%">
                          Borrar
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  //Query Entries
                  $sql = "SELECT * FROM links";
                  $result = $db->query($sql);
                  while ($row = $result->fetch_assoc()):
                 ?>
                  <tr>
                      <td>
                         <?php echo $row['id_link']; ?>
                      </td>
                      <td>
                        <?php echo $row['title_link']; ?>
                      </td>
                      <td>
                        <?php echo $row['url_link']; ?>
                      </td>
                      <td class="project-actions text-right">
                        <form action="php/links.php" method="post">
                          <button name="delete" type="submit" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash">
                              </i>
                              Borrar
                          </button>
                          <input type="hidden" name="id_link" value="<?php echo $row['id_link']; ?>">
                          </form>
                      </td>
                  </tr>
                <?php endwhile; ?>
                <tr>
                  <form action="php/links.php" method="post">
                      <td></td>
                      <td>
                        <div class="form-group">
                          <input type="text" class="form-control" name="title_link" maxlength="80" placeholder="Título del enlace">
                        </div>
                       </td>
                        <td>

                          <div class="form-group">
                          <input type="text" class="form-control"  name="url_link" placeholder="URL">
                          </div>
                         </td>
                      <td class="project-actions text-right">
                          <button name="save" type="submit" class="btn btn-success btn-sm">
                              <i class="fas fa-save">
                              </i>
                              Guardar
                          </button>
                      </td>
                  </form>
                </tr>
              </tbody>
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

  <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

    });
  </script>

<?php include 'includes/footer.php'; ?>
