<html lang="pt-br">
	<head>
	    <?php
	        include "partes/imports.html";
	    ?>
		<title>OM.</title>
	</head>


	<body>
    
        <?php 
		    include "partes/header.html";
		?>
		
		<div id="site-container">
		
		    <?php
		        include "partes/redes.html";
		    ?>
		
			
			<div id="conteudo-container">
			
				<span id="titulo-conteudo">Projetos</span>
				
				<?php 
				    foreach (glob("partes/projetos/*.html") as $filename) {
				        include $filename;
                    }
				?>
				
			</div>
			
			<div id="sidemenu-container">Sobre<br>
				<img  width="200" height="200" style="margin-top:50px;border-radius:10px;">
			</div>
			
		</div>
		
	</body>
	
</html>