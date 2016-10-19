<div class="panel panel-primary">

	<div class="panel-heading">
		<div class="panel-title">
			<span class="glyphicon glyphicon-lock">
			</span>
			<strong>Menu</strong>
		</div>
	</div><!-- heading -->

	<div class="panel-body">

		<div class="sidebar">
			<ul class="nav nav-pills nav-stacked">
				<li class="active">
					<a href="#"> <span class="glyphicon glyphicon-home"></span>	 Home	</a>
				</li>	

				<?php
					foreach($m as $op){
						echo '<li>';
							echo '<a href="?option=',$op['href'],'">';
							echo '<span class="glyphicon glyphicon-',$op['icon'],'"></span>';
							echo $op['text'];
							echo '</a>';
						echo '</li>';	

					}


				?>



			</ul>
		</div>	
	</div><!-- body !-->

</div>