<div class="panel panel-primary">

	<div class="panel-heading">
		<div class="panel-title">
			<span class="glyphicon glyphicon-lock">
			</span>
			<strong>Área de Login</strong>
		</div>
	</div><!-- heading -->

	<div class="panel-body">
		<form action="<?php echo base_url(); ?>/controller/login.php" method="POST">

			<input type="email"  placeholder="Email" class="form-control input-lg" name="email" required><br>
			
			<input type="password"  placeholder="Senha" class="form-control input-lg" name="password" required><br>

			<button class="btn btn-lg btn-block btn-primary">
				<span class="glyphicon glyphicon-ok-sign"></span>
				Entrar
			</button>

		</form><br>
		<div class="text-center">
		Ainda não tem conta? <br><a href="?option=add_user">Clique Aqui</a>
		</div>

	</div><!-- body !-->

</div>