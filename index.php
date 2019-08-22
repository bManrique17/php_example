
<html lang="en">
	<head>
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

		<title>Sudoku!</title>
	</head>
	<body bgcolor="#212F3D">
	<nav style = "color: #1ABC9C;">
		<div class="container">
			<div class="nav-wrapper">
				<a href="#" class="brand-logo">NicPosts</a>				
			</div>
		</div>
	</nav>	
	<?php	
		if(isset($_POST["eliminar"])){
			apcu_clear_cache();
		}
		$index = apcu_fetch('cont');		
		if($index == ""){
			apcu_clear_cache();
			apcu_store('cont',0);
			$index = 0;					
		}else{
			$index = (int)apcu_fetch('cont');				
			echo "aqui: ".$index;
		}
			
		if(isset($_POST["action"])){
			if($_POST["1"] != ""){
				$var = (string)($index);
				apcu_store($var.'_1',$_POST["1"]);
				apcu_store($var.'_2',$_POST["2"]);
				apcu_store($var.'_3',$_POST["3"]);
				apcu_store($var.'_4',$_POST["4"]);
				apcu_store($var.'_5',$_POST["5"]);
				$var = (string)($index+1);				
				apcu_store('cont',$var);			
				$a = (int)apcu_fetch('cont');								
			}
		}			
	?>
	<div class="container">	                    
		<div class="row justify-content-md-center">
			<div class="row">
				<div class="col s5">
					<span style = "color: #1ABC9C;" class="flow-text">Agregar post</span>
					<div class="row">
						<form class="col s12" method="post">
						  <div class="row">
							<div class="input-field col s6">
							  <input style = "color: #ECF0F1;" name="1" id="1" type="text" class="validate">
							  <label for="first_name">First Name</label>
							</div>
							<div class="input-field col s6">
							  <input style = "color: #ECF0F1;" name="2" id="2" type="text" class="validate">
							  <label for="last_name">Last Name</label>
							</div>
						  </div>						  	
						  <div class="row">
							<div class="input-field col s12">
							  <input style = "color: #ECF0F1;" name="3" id="3" type="text" class="validate">
							  <label for="email">Email</label>
							</div>
						  </div>
						  <div class="row">
							<div class="input-field col s12">
								<label>Titulo</label>
							  <input style = "color: #ECF0F1;" name="4" id="4" type="text" class="validate">							  
							</div>
						  </div>
						  <div>							
							  <textarea style = "color: #ECF0F1;" name="5" id="5" class="materialize-textarea"></textarea>
							  <label>Ingrese su contenido</label>
						  </div>
						  <br>
						  <button class="btn waves-effect waves-light" type="submit" name="action">Agregar</button>
						  <button class="btn waves-effect waves-light" type="submit" name="eliminar">Eliminar todos</button>
						</form>
					  </div>
				</div>
				<div class="col s7">
					<span style = "color: #1ABC9C;" class="flow-text">Post publicados</span>
					<div class="card horizontal">					  
					  <div class="card-stacked">
						<div class="card-content">
							 <span class="card-title">Bienvenidos</span>
						  <p>En esta pagina podras publicar informacion relevante para la comunidad web en general.</p>
						</div>
						<div class="card-action">
						  <label>Autor:</label>
						  <label name="first">Admin</label>
						  <label name="last">1</label>
						</div>
					  </div>
					</div>
					
					<?php
						$cont = 0;						
						$var1 = apcu_fetch(((string)$cont).'_1');
						while($var1 != ""){															
							$var2 = apcu_fetch(((string)$cont).'_2');
							$var3 = apcu_fetch(((string)$cont).'_4');
							$var4 = apcu_fetch(((string)$cont).'_5');
							echo"							
							<div class=\"card horizontal\">					  
							  <div class=\"card-stacked\">
								<div class=\"card-content\">
									 <span class=\"card-title\">".$var1."</span>
								  <p>".$var2."</p>
								</div>
								<div class=\"card-action\">
								  <label>Autor:</label>
								  <label name=\"first\">".$var3."</label>
								  <label name=\"last\">".$var4."</label>
								</div>
							  </div>
							</div>";
							$cont=$cont+1;
							$var1 = apcu_fetch(((string)$cont).'_1');
						}

					?>
					
				</div>
			</div>
		</div>
	</div>
    
	</body>
</html>
  