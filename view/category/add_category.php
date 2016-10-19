<form action="controller/insert_category.php" method="POST">
	<legend>Nova Categoria</legend>
	<label>Nome</label>
	<input type="text" name="name" placeholder="Nome da Categoria" required class="form-control">
	<br>

	<label>Descrição</label>
	<textarea name="desc" placeholder="Nome da Categoria" required class="form-control"></textarea>
	<br>

	<button class="btn btn-primary btn-lg btn-block">
		<span class="glyphicon glyphicon-ok-sign"></span>
		 Enviar Dados
	</button>

</form>