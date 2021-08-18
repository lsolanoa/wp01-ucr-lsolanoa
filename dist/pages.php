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
				</section>

<?php include "includes/footer.php"; ?>
