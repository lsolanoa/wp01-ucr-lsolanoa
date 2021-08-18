<?php include "includes/header.php"; ?>
			<!-- Banner -->
			<?php
			include_once 'php/conn.php';
			$sql = "SELECT title_page, pages.id_page, desc_page, img_page FROM slideshow LEFT JOIN pages ON slideshow.id_page=pages.id_page ORDER BY id_slide DESC LIMIT 3";
			$result = $db->query($sql);
			$x = 1;
			while ($row = $result->fetch_assoc()):
				$img = $row['img_page'];
			 ?>
				<section id="banner" class="ban-<?php echo $x;?>" style="background-image: url('images/<?php echo $img; ?>'); <?php if($x!=1){echo'display:none';} ?>">
					<header>
						<h2><?php echo $row['title_page']; ?></h2>
						<a href="posts.php?id=<?php echo $row['id_page']; ?>" class="button">Leer Más</a>
					</header>
						<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
						<a class="next" onclick="plusSlides(1)">&#10095;</a>
				</section>
			<?php  $x++;endwhile; ?>

			<?php if ($x >= 4): ?>
				<script type="text/javascript">
				// Change the banner every 5 seconds
				$(document).ready(function() {
				//Simple loop
					setInterval(function(){
						if($(".ban-1").is(":visible")){
							$(".ban-1").hide();$(".ban-2").show();
						} else if ($(".ban-2").is(":visible")) {
							$(".ban-2").hide();$(".ban-3").show();
						} else if ($(".ban-3").is(":visible")) {
							$(".ban-3").hide();$(".ban-1").show();
						}
					//this code runs every 10 seconds
				}, 10000);

				//Code Buttons
				//Next
				$(".next").click(function(){
					if($(".ban-1").is(":visible")){
						$(".ban-1").hide();$(".ban-2").show();
					} else if ($(".ban-2").is(":visible")) {
						$(".ban-2").hide();$(".ban-3").show();
					} else if ($(".ban-3").is(":visible")) {
						$(".ban-3").hide();$(".ban-1").show();
					}
				});
				//Prev
				$(".prev").click(function(){
					if($(".ban-1").is(":visible")){
						$(".ban-1").hide();$(".ban-3").show();
					} else if ($(".ban-2").is(":visible")) {
						$(".ban-2").hide();$(".ban-1").show();
					} else if ($(".ban-3").is(":visible")) {
						$(".ban-3").hide();$(".ban-2").show();
					}
				});

				});
				</script>
			<?php endif; ?>

			<!-- Highlights -->
				<section class="wrapper style1">
					<div class="container">
						<div class="row gtr-200">
							<?php
							$sql = "SELECT * FROM imp JOIN pages ON imp.id_page=pages.id_page ORDER BY id_imp DESC LIMIT 3";
							$result = $db->query($sql);
							while ($row = $result->fetch_assoc()):
							 ?>
							<section class="col-4 col-12-narrower">
								<div class="box highlight">
									<a href="pages.php?id=<?php echo $row['id_page']; ?>"><i style="background-color:<?php echo $row['color_imp']; ?>;cursor:pointer;" class="icon solid major <?php echo $row['icon_imp']; ?>"></i></a>
									<a href="pages.php?id=<?php echo $row['id_page']; ?>"><h3><?php echo $row['title_page']; ?></h3></a>
									<p><?php echo $row['desc_page']; ?></p>
								</div>
							</section>
						<?php endwhile; ?>
						</div>
					</div>
				</section>

			<!-- Gigantic Heading -->
						<iframe scrolling="no" src="ajax\horizontal_time_line.php" width="100%" height="600px;"></iframe>
			<!-- Posts -->
				<section class="wrapper style1">
					<div class="container">
						<div class="row">
							<?php
							$sql = "SELECT * FROM pages WHERE type_page = 1 ORDER BY id_page DESC LIMIT 6";
							$result = $db->query($sql);
							while ($row = $result->fetch_assoc()):
							 ?>
							<section class="col-6 col-12-narrower">
								<div class="box post">
									<a href="posts.php?id=<?php echo $row['id_page']; ?>"><img class="image left" src="images/<?php echo $row['img_page']; ?>" alt="" />
									<div class="inner">
										<h3><?php echo $row['title_page']; ?></h3>
										<p><?php echo $row['desc_page']; ?></p>
									</div>
									</a>
								</div>
							</section>
						<?php endwhile; ?>
						</div>
					</div>
				</section>

			<!-- CTA -->
			<section id="cta" class="wrapper style2">
				<div class="container">
					<header>
					 <img class="logo_footer" src="images/logo_footer_color.png" alt="UCR Logo"></img>
					</header>
				</div>
			</section>

<?php include "includes/footer.php"; ?>
