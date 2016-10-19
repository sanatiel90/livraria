<a href="?option=<?php echo $add; ?>" class="btn btn-default">
	<span class="glyphicon glyphicon-plus-sign"></span>
	 Adicionar Novo
</a>
<br><br>

<script>

function erase(filter){
	//jquery para selecionar o elemento com id filter(que éo input type hidden la do form da div modal)
	//e adicionar ao VALUE dele o conteudo da variavel q foi passada como argumento(tbm de nome filter)
	//essa variavel filter estara com o id do registro que sera excluido
	$('#filter').val(filter);
}

</script>

<?php
ini_set('display_errors',1);

if($results == false){
	echo '<div class="alert alert-warning">';
		echo '<strong>Não Existem Resultados!</strong>';
	echo '</div>';
}else{
	echo '<h4>',count($results),"<strong> $text </strong>", 'encontrados(as)!</h4>';

	//DIV PARA DEIXAR A TABLE RESPONSIVA
	echo '<div class="table-responsive">';

	echo '<table class="table table-hover">';
		echo '<thead>';
			echo '<tr>';
			foreach($titles as $value){
				echo '<th>',$value,'</th>';
			}

			//testar se existe actions(excluir/atualizar)
			if(isset($actions)){
				echo '<th>Ações</th>';
			}

			echo '</tr>';
		echo '</thead>';

		echo '<tbody>';
		foreach($results as $k=>$v){
			echo '<tr>';
			foreach($titles as $key=>$value){
				echo '<td>',$v[$key],'</td>';
			}

			echo '<td>';

			//testar se existe actions(excluir/atualizar)
			if(isset($actions['delete'])){
				
					

					// link para modal, no href fica o id da div do modal, precisa tbm do atributo data-toggle="modal" 
					//tbm eh adicionado um evento onclick para chamar uma funcao erase que tem como argumento o id
					//do registro q tasendo excluido
					$ac = $actions['delete'];	
					echo '<a onclick="erase(',$v[$ac['filter']],')" href="#delete" data-toggle="modal" class="btn btn-xs btn-',$ac['class'],'">';
					echo '<span class="glyphicon glyphicon-',$ac['icon'],'"></span>';
					echo '</a>';
					
				
			}

			if(isset($actions['update'])){
					$ac = $actions['update'];
					
					echo ' <a href="',$ac['href'],'&filter=',$v[$ac['filter']],'" class="btn btn-xs btn-',$ac['class'],'">';
					echo '<span class="glyphicon glyphicon-',$ac['icon'],'"></span>';
					echo '</a>';

			}

			echo '<td>';
			echo '</tr>';
		}


		echo '</tbody>';
	echo '</table>';

	echo '</div>';
}

////////////////////////////////
/////////////////////TESTE
//a var $tt contem o resultado(em forma de array) da consulta simples, com 1 linha, para passar essa var
//para JSON cria outra var e usa a funcao json_encode
/*
echo '<table>';
	echo '<tr>';
		
			$jj = json_encode($tt);

			echo $jj;
		
			foreach($tt as $kk){
				echo '<td>',$kk['user_name'],'</td>';
			}
		
	echo '</tr>';

echo '</table>';
*/
//pronto, a var $jj ja esta com os dados do usuario em formato json
///////////////////////////
/////////////////TESTE


?>






<!-- -->



<!-- DIV PARA MODAL -->
<div class="modal fade text-center" id="delete">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" > Confirma a exclusão? </h4>
			</div>	

			<div class="modal-body text-center">
				<form action="<?php echo base_url()."/controller/".$actions['delete']['href']; ?>" method="POST">

					<!-- nesse input ficara o id do registro q sera excluido, esta hidden pra nao mostrar no modal -->
					<input type="hidden" name="filter" id="filter">

					<!-- type button para opcao de cancelar para nao submitar, data-dismiss para sair do modal ao clicar -->
					<button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar </button>

					<button class="btn btn-primary"> Confirmar</button>

				</form>
			</div>

		
		</div> <!-- content -->
	</div> <!-- dialog -->
</div> <!-- modal fade-->