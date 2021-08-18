<?php include "includes/header.php"; ?>
<?php

if (isset($_GET['id'])) {
	//Query page data
	$id_page = $_GET['id'];
	include_once 'php/conn.php';
	$sql = "SELECT * FROM pages LEFT JOIN files ON pages.id_page=files.id_page WHERE pages.id_page = '$id_page'";
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
} else {
	header('HTTP/1.1 404 Not Found', true, 404);
	exit();
}
 ?>
			<!-- Main -->
				<section class="wrapper style1">
					<div class="container">
						<div class="row gtr-200">
							<div class="col-8 col-12-narrower">
								<div id="content">

									<!-- Content -->

										<article>
											<header>
												<h2><?php echo $row['title_page']; ?></h2>
												<p><?php echo $row['desc_page']; ?></p>
											</header>
											<?php if ($row['img_page']==='NULL'): //Nothing?>
												<?php else: ?>
												<span class="image featured"><img src="images/<?php echo $row['img_page']; ?>" alt="Banner" /></span>
											<?php endif; ?>
											<?php echo html_entity_decode($row['cont_page']); ?>
										</article>

								</div>
							</div>
							<div class="col-4 col-12-narrower">
								<?php
								$sql = "SELECT title_page, desc_page, id_page FROM pages ORDER BY RAND() LIMIT 6;";
								if ($db->query($sql)):
								$result = $db->query($sql);
								$row = $result->fetch_assoc();
								 ?>
								<div id="sidebar">
									<!-- Sidebar -->

										<section>
											<h2><?php echo $row['title_page']; ?></h2>
											<p><?php echo $row['desc_page']; ?></p>
											<footer>
												<a href="posts.php?id=<?php echo $row['id_page']; ?>" class="button">Leer Más</a>
											</footer>
										</section>

										<section>
											<h3>Más información</h3>
											<ul class="links">
												<?php while ($row = $result->fetch_assoc()): ?>
												<li><a href="posts.php?id=<?php echo $row['id_page']; ?>"><?php echo $row['title_page']; ?></a></li>
											<?php endwhile; ?>
											</ul>
										</section>

								</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</section>

<?php include "includes/footer.php";
//Close the connection
$db->close();
?>
