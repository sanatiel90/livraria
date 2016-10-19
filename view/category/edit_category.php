<form action="<?php echo base_url(); ?>/controller/update_category.php" method="POST">

<?php

	$cat = $data_cat[0];
	
			

?>

	<label>Nome </label>
	<input type="text" value="<?php echo $cat['category_name']; ?>" name="name" class="form-control" required>
	<br>

	<label>Descrição </label>
	<br>
	<textarea name="desc" required class="form-control"> <?php  echo $cat['category_desc'];?></textarea>

	<br>
	<br>

	<input type="hidden" name="filter" value="<?php echo $cat['id_category']; ?> " >

	<button class="btn btn-primary btn-lg btn-block">
		<span class="glyphicon glyphicon-ok-sign">
		</span>
		Enviar Dados
	</button>
</form>