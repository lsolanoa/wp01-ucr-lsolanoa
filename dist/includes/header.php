<!DOCTYPE HTML>
<!--
#Project Web Main
#Creators
	Luis Fernando Solano Aguilar [luis.solano.aguilar@gmailcom] @lsolanoa
	Adrián Vergara Heidke [adrianvergaraheidke@ucr.ac.cr]
#HTML Template
	Arcana by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$lastKey = key(array_slice($components, -1, 1, true));
$url = $components[$lastKey];
date_default_timezone_set('America/Costa_Rica');
 ?>
<html>
	<head>
		<!-- Meta -->
		<title>Desarrollo de la compresión lectora</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="author" content="Luis Fernando Solano Aguilar, Adrián Vergara Heidke">
		<meta name="keywords" content="mulimodality, academic research, linguistics, ucr, university of costa rica">
		<!-- Styles -->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
	</head>
	<body class="is-preload">
		
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header">

					<!-- Logo -->
						<h1><a href="index.php" id="logo"> <img class="logo_main left" src="images/logo_main.png" alt="Logo Page Main"></a></h1>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li <?php if ($url==="index.php") {echo "class='current'";} ?>><a href="index.php">Principal</a></li>
								<?php
								//Connect to the Data Base
								include 'php/conn.php';
									//Query Entries
									$sql = "SELECT pages.id_page, title_page, struc_nav FROM nav JOIN pages ON nav.id_page=pages.id_page WHERE struc_nav='NULL';";
									$result = $db->query($sql);
									if($result == FALSE):
										else :

									while ($row = $result->fetch_assoc()):
								 ?>
								 <li <?php if ($url==="pages.php") {echo "class='current'";} ?> ><a href="pages.php?id=<?php echo $row['id_page']; ?>"><?php echo $row['title_page']; ?></a>
										 <?php
										 $id_page_sub = $row['id_page'];
										 $sql_sub = "SELECT pages.id_page, title_page AS 'subpage' FROM nav JOIN pages ON nav.id_page=pages.id_page WHERE struc_nav='$id_page_sub';";
										 $result_sub = $db->query($sql_sub);
										 $row_cnt = $result_sub->num_rows;
										 if ($row_cnt  > 0):
											?>
											<ul>
											<?php
											while ($row_sub = $result_sub->fetch_assoc()):
											?>
											<li <?php if ($url==="pages.php") {echo "class='current'";} ?> ><a href="pages.php?id=<?php echo $row_sub['id_page']; ?>"><?php echo $row_sub['subpage']; ?></a>
										<?php endwhile; ?>
									 </ul>
									<?php endif; ?>
								 </li>
							 <?php endwhile;?>
							 <?php endif; ?>
							</ul>
						</nav>

				</div>
