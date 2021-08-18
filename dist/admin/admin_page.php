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
          <h3 class="card-title">Entradas recientes</h3>
          <h3 class="float-sm-right">
            <form action="new_entry.php" method="post">
              <button class="btn btn-sm btn-outline-success" type=""><i class="fa fa-plus"></i> Nueva Entrada</button>
            </form>
          </h3>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 5%">
                          #
                      </th>
                      <th style="width: 25%">
                          Nombre de la entrada
                      </th>
                      <th style="width: 20%">
                          Etiquetas
                      </th>
                      <th style="width: 25%">
                          Tipo
                      </th>
                      <th style="width: 25%">
                          Edit
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  //Query Entries
                  include 'php/conn.php';
                  $sql = "SELECT * FROM pages ORDER BY id_page DESC LIMIT 10";
                  $result = $db->query($sql);
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
                        <?php
                        $labels = explode(';', $row['labels_page']);
                        foreach ($labels as $key => $labels_page) {
                          echo '<span class="badge bg-success" title="'. $labels_page .'">'. $labels_page .'</span> ';
                        }
                        ?>
                      </td>
                      <td>
                        <?php if ($row['type_page'] == 1){
                          echo '<span class="badge bg-warning" title="Entrada">Entrada</span> ';
                        } else {
                            echo '<span class="badge bg-info" title="Página">Página</span> ';
                        }
                        ?>
                      </td>
                      <td class="project-actions text-right">
                        <form action="php/entry.php" method="post">
                          <button name="view" type="submit" class="btn btn-primary btn-sm">
                              <i class="fas fa-folder">
                              </i>
                              Ver
                          </button>
                          <a class="btn btn-info btn-sm" href="edit_entry.php?id=<?php echo $row['id_page']; ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Editar
                          </a>
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

<?php include 'includes/footer.php'; ?>
