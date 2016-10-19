<?php 
	//se existir usuario logado
	if(isset($user)){
		echo '<h4 style="color:white; padding:10px;">';
			echo $user->user_name;
			echo '<br>';
			echo '<a href="?option=profile" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-cog">Perfil</span></a>
			<a href="controller/logout.php" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-off">Sair</span></a>';
		echo '</h4>';


	} else{
		//quando estiver deslogado
		echo '<legend style="color: white; padding: 10px;">';
		echo 'Identifique-se';
		echo '</legend>';
	}

?>


	
