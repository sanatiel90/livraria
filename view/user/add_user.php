<form action="<?php echo base_url(); ?>/controller/insert_user.php" method="POST">

<?php

	if(isset($profiles)){
		echo '<label>Tipo de Conta: </label>';
		echo '<select class="form-control" name="profile" required>';
			echo '<option value="" selected> -- Selecione --</option>';
				foreach ($profiles as $k => $v) {
					echo '<option value="',$v['id_profile'],'">';
						echo $v['profile_name'];
					echo '</option>';	
				}
		echo '</select><br>';		
	}

?>

	<label>Nome: </label>
	<input type="text" name="name" placeholder="Digite seu nome" class="form-control" required>
	<br>

	<label>Email: </label>
	<input type="email" name="email" placeholder="Digite seu email" class="form-control" required>
	<br>

	<label>Senha: </label>
	<input type="password" name="password" placeholder="Digite sua senha" class="form-control" required>
	<br>

	<button class="btn btn-primary btn-lg btn-block">
		<span class="glyphicon glyphicon-ok-sign">
		</span>
		Enviar Dados
	</button>
</form>