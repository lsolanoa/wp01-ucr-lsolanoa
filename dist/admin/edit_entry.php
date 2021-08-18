<?php include 'includes/header.php'; ?>
<?php
$id_page = $_GET['id'];
include_once 'php/conn.php';
$sql = "SELECT * FROM pages WHERE id_page = '$id_page'";
$result = $db->query($sql);
$row = $result->fetch_assoc();
 ?>
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
              <li class="breadcrumb-item active">Editar Entrada</li>
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
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Editar Entrada #<?php echo $row['id_page']; ?></h3>
        </div>
        <div class="card-body">
          <!--Form New Entry-->
          <form action="php/entry.php" method="post" enctype="multipart/form-data">
            <!--Page Title-->
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="title_page">Título de la Entrada</label>
                  <input value="<?php echo $row['title_page']; ?>" id="title_page" class="form-control form-control-lg" type="text" name="title_page" maxlength="80" placeholder="Max. 80 caracteres">
                </div>
              </div>
            </div>
            <!--Page Description-->
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="desc_page">Descripción</label>
                  <input value="<?php echo $row['desc_page']; ?>" id="desc_page" class="form-control form-control-lg" type="text" name="desc_page" maxlength="120" placeholder="Max. 120 caracteres">
                </div>
              </div>
            </div>
            <!--Page Content - Summernote-->
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="cont_page">Cuerpo</label>
                  <textarea id="cont_page" name="cont_page">
                    <?php echo $row['cont_page']; ?>
                  </textarea>
                  <script>
                    $(function () {
                      // Summernote
                      $('#cont_page').summernote()
                    })
                  </script>
                </div>
              </div>
            </div>
            <!--Page Banner-->
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="img_page">Banner</label>
                  <div class="input-group">
                      <div class="custom-file">
                        <input type="hidden" class="custom-file-input" value="<?php echo $row['img_page']; ?>" name="org_img_page" id="img_page">
                        <input type="file" class="custom-file-input" name="img_page" id="img_page">
                        <label class="custom-file-label" for="img_page">Subir Imagen 1600x484 pixels</label>
                      </div>
                    </div>
                </div>
              </div>
            </div>
              <script>
              $(function () {
                bsCustomFileInput.init();
              });
              </script>
            <!--Page Labels-->
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="labels_page">Etiquetas</label>
                  <input value="<?php echo $row['labels_page']; ?>" id="labels_page" class="form-control form-control-lg" type="text" name="labels_page" maxlength="120" placeholder="Separar etiquetas con ;">
                </div>
              </div>
            </div>
            <!-- Submit -->
            <div class="row">
              <div class="col-sm-4">
                <button class="btn btn-lg btn-outline-primary" type="submit" name="edit"><i class="fas fa-pencil-alt"></i> Editar Entrada</button>
                <input type="hidden" name="id_page" value="<?php echo $row['id_page']; ?>">
              </div>
            </div>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'includes/footer.php'; ?>
