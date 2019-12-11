<?php

    if(isset($_POST["urlcompleta"])){
    
        $urlcompleta=$_POST["urlcompleta"];
        $urlarquivo=$_POST["preferencia"];
        
        if(strpos($urlcompleta, chr(39)) !==false || strpos($urlcompleta, chr(34)) !==false ){
            header('Location: https://om.blog.br');
        } else {
        
            if (strpos($urlcompleta, 'http') ===false)
                $urlcompleta = "http://" . $urlcompleta;
            
            if(file_exists($urlarquivo . ".php") || file_exists($urlarquivo . ".html") || strpos($urlarquivo, ".") !==false || strpos($urlarquivo, "/") !==false){
                do {
                    $urlarquivo = chr(rand(97,122)) . chr(rand(97,122)) . chr(rand(97,122)) . chr(rand(97,122));
                } while(file_exists($urlarquivo . ".php"));
            }
            $urlarquivo = strtolower($urlarquivo);
            $myfile = fopen($urlarquivo . ".php", "w");
        	$txt = "<?php header('Location: $urlcompleta'); ?>";
        	fwrite($myfile, $txt);
        	fclose($myfile);
        	
        }
	
    } else header('Location: https://om.blog.br');
    
?>

<html>
    <head>
        <?php include "partes/imports.html"; ?>
        <style>
            #result{
			    margin: 15px;
			    display:flex;
			    flex-flow:column;
			    align-items:center;
			    justify-content:center;
			    width: 500px;
			    box-shadow:0px 0px 5px grey;
			    border-radius:10px;
			}
			
			#result-container{
			    display:flex;
			    justify-content:center;
			    margin-top:50px;
			}
			
			#campos{
			    display:flex;
			    box-shadow:0px 0px 5px grey;
			    margin:30px;
			}
			
			input, button{
			    padding:10px;
			}
        </style>
        
    </head>
    <body>
        <?php include "partes/header.html"; ?>
        
        <div id="result-container">
            <div id="result">
                <h3>Encurtado com sucesso!</h3>
                <div id="campos">
                    <?php 
                        echo "<input id='texto-link' value='om.blog.br/$urlarquivo'>
                        <button onclick='copiar()'>Copiar</button>
                        <button onclick='ir()'>Ir</button>"; 
                    ?>
                </div>
                <a href="/encurtador" style="color:black;font-size:14;margin-bottom:10px">Encurtar outro link</a>
                <?php 
                    echo "<span style='font-size:12'>Redireciona para: $urlcompleta</span>";
                ?>
            </div>
        </div>
        
        <script>
            function copiar() {
                var texto = document.getElementById("texto-link");
                texto.select();
                texto.setSelectionRange(0, 99999); /*For mobile devices*/
                document.execCommand("copy");
            }
            
            function ir(){
                window.open(<?php echo "'https://om.blog.br/$urlarquivo'"; ?>, "_blank");
            }
        </script>
        
    </body>
    
    
</html>

