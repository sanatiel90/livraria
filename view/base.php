	<!DOCTYPE html>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Biblioteca Virtual - <?php echo $page_title; ?></title>

		<!-- CSS do bootstrap -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.css">
	</head>

	<body>
		<div class="container">
			<!-- Topo -->
			<header class="row navbar navbar-inverse">
				<div class="col-lg-4">
					<a href="<?php echo base_url(); ?>" class="navbar-brand">
						<span class="glyphicon glyphicon-home">
						</span>
						Biblioteca Virtual
					</a>
				</div>
				<div class="col-lg-4"></div>
				<div class="col-lg-4 text-right">
					<?php include_once base_server().'/view/nav_profile.php'; ?>
				</div>
			</header>
			<br>

			<!-- Conteúdo -->
			<section class="row">
				<!-- Login/Menu -->
				<div class="col-lg-3">
					<?php
						page_sidebar(); 
					?>
				</div>

				<!-- Painel de controle --> 
				<div class="col-lg-9">
					<div class="panel panel-primary">

						<div class="panel-heading">
							<div class="panel-title">
								<span class="glyphicon glyphicon-th">
								</span>
								<strong>Painel de Controle</strong>
							</div>
						</div><!-- heading -->

						<div class="panel-body">
							<?php page_content(); ?>
						</div><!-- body !-->

					</div>
				</div>
			</section>
			<br>

			<!-- Rodapé -->
			<footer class="row">
				<hr>

				<div class="col-lg-8">
					<a href="#">
						Termos de Uso
					</a> |

					<a href="#">
						Sob Licença GPLv3
					</a>
				</div>

				<div class="col-lg-4">
					<div class="text-right">
						Biblioteca Virtual - <?php echo date('Y'); ?>
					</div>
				</div>



			</footer>
		</div>	

		<script src="<?php echo base_url();?>/assets/bootstrap/js/jquery.js"></script>

		<script src="<?php echo base_url();?>/assets/bootstrap/js/bootstrap.js"></script>
	</body>
</html>