<table class="table">


	<tr>
		<th>Tipo de Conta</th>
		<td><?php echo $user->profile_name; ?></td>

		<th>Criado em</th>
		<td><?php echo $user->user_created_in; ?></td>

		<th>Último acesso</th>
		<td><?php echo date("d/m/Y H:i:s", $user->user_last_access); ?></td>


	</tr>


		<tr>
			<form action="controller/update_user.php" method="POST">
				<td colspan="3">
				<label>Seu nome</label>
				<input class="form-control" required name="name" value="<?php echo $user->user_name; ?>">
				

				
				<label>Seu email</label>
				<input class="form-control" required type="email" name="email" value="<?php echo $user->user_email; ?>">
			

			
				<label>Sua Senha</label>
				<input class="form-control" required type="password" name="password" value="">
			

				<br>
				<button class="btn tbn-primary btn-lg btn-block">Atualizar Dados</button>
			</td>
			</form>
		</tr>


</table>