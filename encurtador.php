<html>
    <head>
        <title>OM. Encurtador de Links</title>
		<?php
		    include "partes/imports.html";
		?>
		
		<style>
		    
		    #om{
		        font-size:25px;
		        color:black;
		        position:absolute;
		        top:10;
		        left:20;
		    }
		
		   #conteudo{
		       display:flex;
		       justify-content:center;
		       align-items:center;
		   }
			
			#formEnc{
			    margin:0 15px;
			    display:flex;
			    flex-flow:column;
			    align-items:center;
			    flex-wrap:wrap;
			    width: 500px;
			    box-shadow:0px 0px 5px grey;
			    border-radius:10px;
			}
			
			input{
			    width:200;
			    padding:10;
			}
			
			button{
			    color:white;
			    padding:10;
			    background-color:black;
			    border:1px solid white;
			}
			
			button:hover{
			    background-color:white;
			    color:black;
			    
			}
			
			#campos{
			    display:flex;
			    box-shadow:0px 0px 5px grey; 
			    margin-top:20px;
			    margin-bottom:40px;
			    flex-wrap:wrap;
			    justify-content:center;
			}
			
			#redes-container{
			    margin-left:0;
			    width:100%;
			}
			
			h3{
			    margin-top:50px;
			}
			
			#preferencia{
			    margin-bottom:50px;
			}
			
			@media screen and (max-width:1000px) {
			    
			    #formEnc{
			         
			         width: calc(100% - 30px);
			    }       
			       
			
			}
			
		</style>
		
    </head>
    
    <body>
       
       <?php
            include "partes/header.html";
            include "partes/redes.html";
       ?>
       <div id="conteudo">
            <form id="formEnc" action="encurtador-resultado" method="POST">
                <h3>Encurtar Links</h3>
                <div id="campos">
                    <input type="text" name="urlcompleta" placeholder="Cole o link aqui">
                    <button type="submit">Encurtar</button>
                </div>
                <span style="font-size:12">Nome preferencial:</span>
                <input type="text" id="preferencia" name="preferencia" placeholder="(Gerar automaticamente)" style="height:20px;width:200px;text-align:center;">
            </form>
        </div>
    </body>
</html>