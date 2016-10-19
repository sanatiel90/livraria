<form action="<?php echo base_url(); ?>/controller/update_user.php" method="POST">

<?php

	$us = $data_user[0];
	
		echo '<label>Tipo de Conta: </label>';
		echo '<select class="form-control" name="profile" required>';
			echo '<option value="',$us['id_profile'],'" selected>',$us['profile_name'],'</option>';
				foreach ($profiles as $k => $v) {
					echo '<option value="',$v['id_profile'],'">';
						echo $v['profile_name'];
					echo '</option>';	
				}
		echo '</select><br>';		
	

?>

	<label>Nome: </label>
	<input type="text" value="<?php echo $us['user_name']; ?>" name="name" placeholder="Digite seu nome" class="form-control" required>
	<br>

	<label>Email: </label>
	<input type="email" value="<?php echo $us['user_email'] ?>" name="email" placeholder="Digite seu email" class="form-control" required>
	<br>

	<label>Senha: </label>
	<input type="password" name="password" placeholder="Digite sua senha" class="form-control" >
	<br>

	<input type="hidden" name="filter" value="<?php echo $us['id_user']; ?> " >

	<button class="btn btn-primary btn-lg btn-block">
		<span class="glyphicon glyphicon-ok-sign">
		</span>
		Enviar Dados
	</button>
</form>