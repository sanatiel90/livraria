<form action="controller/insert_book.php" method="POST">
	<legend>Novo Livro</legend>
	<label>Categoria</label>
	<select class="form-control" name="category">
		<option value="" selected> -- Selecione -- </option>
		<?php 
			foreach($categories as $cat){
				echo '<option value="',$cat['id_category'],'">',$cat['category_name'],'</option>';
			}
		?>
	</select>

	<label>Titulo</label>
	<input type="text" name="title" placeholder="Titulo do Livro" required class="form-control">
	<br>

	<label>Autor</label>
	<input type="text" name="author" placeholder="Nome do Autor" required class="form-control">
	<br>

	<label>Ano</label>
	<input type="number" name="year" placeholder="Ano de Publicação" required class="form-control">
	<br>

	<label>Edição</label>
	<input type="number" name="edition" placeholder="Número da Edição" required class="form-control">
	<br>

	<label>Editora</label>
	<input type="text" name="publisher" placeholder="Nome da Editora" required class="form-control">
	<br>

	<label>Número de Páginas</label>
	<input type="pages" name="edition" placeholder="Número de Páginas" required class="form-control">
	<br>

	<label>País</label>
	<input type="pages" name="country" placeholder="País de Publicação" required class="form-control">
	<br>

	<button class="btn btn-primary btn-lg btn-block">
		<span class="glyphicon glyphicon-ok-sign"></span>
		 Enviar Dados
	</button>

</form>