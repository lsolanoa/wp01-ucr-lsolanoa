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
              <li class="breadcrumb-item active">TimeLine</li>
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
          <h3 class="card-title">TimeLine</h3>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 10%">
                          #
                      </th>
                      <th style="width: 40%">
                          Página
                      </th>
                      <th style="width: 25%">
                          Fecha Asignada
                      </th>
                      <th style="width: 25%">
                          Borrar
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  //Query Entries
                  $sql = "SELECT * FROM timeline JOIN pages ON timeline.id_page=pages.id_page ORDER BY pages.id_page";
                  $result = $db->query($sql);
                  if($result == FALSE):
                    else:
                  while ($row = $result->fetch_assoc()):
                 ?>
                  <tr>
                      <td>
                         <?php echo $row['id_page']; ?>
                      </td>
                      <td>
                          <a>
                              <?php echo $row['title_page']; ?>
                          </a>
                          <br/>
                          <small>
                              Creado <?php echo $row['date_page']; ?>
                          </small>
                      </td>
                      <td>
                      <?php echo $row['date_timeline']; ?>
                      </td>
                      <td class="project-actions text-right">
                        <form action="php/slideshow.php" method="post" >
                          <button name="delete" type="submit" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash">
                              </i>
                              Borrar
                          </button>
                          <input type="hidden" name="id_page" value="<?php echo $row['id_page']; ?>">
                          </form>
                      </td>
                  </tr>
                <?php endwhile; ?>
                <?php endif; ?>
                <tr>
                  <form action="php/timeline.php" method="post">
                      <td></td>
                      <td>
                        <div class="form-group">
                          <select class="form-control select2bs4" style="width: 100%;" name="id_page" required>
                            <option value="" selected disabled>-- Seleccione una entrada --</option>
                            <?php
                              //Query Entries
                              $sql = "SELECT id_page, title_page FROM pages";
                              $result = $db->query($sql);
                              while ($row = $result->fetch_assoc()):
                             ?>
                             <option value="<?php echo $row['id_page']; ?>"><?php echo $row['title_page']; ?></option>
                           <?php endwhile; ?>
                          </select>
                        </div>
                       </td>
                        <td><input type="date" name="date_timeline" class="form-control"></td>
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
