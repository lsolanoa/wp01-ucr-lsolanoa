<!-- Footer -->
  <div id="footer">
    <div class="container">
      <div class="row">
        <section class="col-3 col-6-narrower col-12-mobilep">
          <h3>Mapa de la página web</h3>
          <ul class="links">
            <?php 
             			$sql = "SELECT pages.id_page, title_page FROM nav JOIN pages ON nav.id_page=pages.id_page ORDER BY pos_nav ASC";
                   $result = $db->query($sql);
                   if($result == FALSE):
                   else:
                   while ($row = $result->fetch_assoc()): 
            ?>
            <li><a href="pages.php?id=<?php echo $row['id_page']; ?>"><?php echo $row['title_page']; ?></a></li>
            <?php endwhile; ?>
            <?php endif; ?>
          </ul>
        </section>
        <section class="col-3 col-6-narrower col-12-mobilep">
          <h3>Enlances importantes</h3>
          <ul class="links">
          <?php 
             			$sql = "SELECT * FROM links";
                   $result = $db->query($sql);
                   while ($row = $result->fetch_assoc()): 
            ?>
            <li><a href="<?php echo $row['url_link']; ?>"><?php echo $row['title_link']; ?></a></li>
            <?php endwhile; ?>
          </ul>
        </section>
        <section class="col-6 col-12-narrower" id="cont_section">
          <h3>Contactanos:</h3>
          <form action="php/cont.php" method="post" id="cont_form">
            <div class="row gtr-50">
              <div class="col-6 col-12-mobilep">
                <input style="color:black;" type="text" name="name_cont" id="name_cont" placeholder="Nombre" require/>
              </div>
              <div class="col-6 col-12-mobilep">
                <input style="color:black;" type="email" name="email_cont" id="email" placeholder="Email" require/>
              </div>
              <div class="col-12">
                <textarea style="color:black;" name="desc_cont" id="desc_cont" placeholder="Mensaje" rows="5" maxlength="250" require></textarea>
              </div>
              <div class="col-12">
                <ul class="actions">
                  <li><input type="submit" class="button alt" value="Contactar Administrador" /></li>
                </ul>
              </div>
            </div>
          </form>
        </section>
        <script>
        $(document).ready(function(){
            $("#cont_form").submit(function(e){
                e.preventDefault(); //Prevent form form submmiting
                name_cont = $("#name_cont").val();
                email_cont = $("#email").val();
                desc_cont = $("#desc_cont").val();
                $.post("php/cont.php",//URL 
                {
                name_cont: name_cont,
                email_cont: email_cont,
                desc_cont: desc_cont
                },//post
                function(data,status){//Callback status
                $("#cont_section").html(data);
                });
             });
        });
    </script>
      </div>
    </div>

    <!-- Copyright -->
      <div class="copyright">
        <ul class="menu">
          <li>&copy; Proyecto UCREA. 2020-2021 Derechos reservados</li><li><a href="admin\index.php">ACCEDER META</a></li>

        </ul>
      </div>

  </div>
</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
