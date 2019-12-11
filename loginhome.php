<?php

try{
   session_start();
    
    function mostrarHome(){
        echo "
	    <html>
	        <head>
	            <title>OM Admin</title>
	            <meta http-equiv='Content-Type' content='text/html; charset=utf-8'> 
	            <link href='https://fonts.googleapis.com/css?family=Michroma' rel='stylesheet'>
	            <style>
	                body{
	                    margin:0;
	                    background-color: #2a292b;
	                    font-family: Michroma;
	                }
	                
	                #opcoes{
	                    margin-top:100;
	                    display:flex;
	                    flex-flow:column;
	                    align-items:center;
	                }
	                
	                .item{
	                    text-decoration:none;
	                    color:white;
	                    margin-bottom:20;
	                    padding:20;
	                }
	                
	                .item:hover{
	                    background-color:white;
	                    color:black;
	                }
	            </style>
	        </head>
	        <body>
	            <div id='opcoes'>
	                <a class='item' href='phps/criarprojeto'>ADICIONAR NOVO PROJETO</a>
	            </div>
	        </body>
	    </html>";
	    
    }
    
    if( isset($_SESSION['user']) ){
        mostrarHome();
        
    } else {

        $login = $_POST["login"];
        
    	$myfile = fopen("logins.txt", "a");
    	date_default_timezone_set('America/Sao_Paulo');
    	$txt = $_SERVER['REMOTE_ADDR'] . " " . date('d/m/Y H:i:s', time()) . " " . $login . "\n";
    	fwrite($myfile, $txt);
    	fclose($myfile);
    
        include "phps/omdb.php";
    
        $conStr = "mysql:host=" . $host. ";dbname=" . $db;
        $conexao = new PDO($conStr, $dbuser, $dbpass);
    	
    	$qr= "SELECT * FROM OM_user WHERE USUARIO = '$login' AND SENHA = '" . hash('sha256',$_POST["senha"]) . "'";
    	$resp=$conexao->query($qr);
    
    	if($resp->rowCount()>0){
    	    session_start();
    	    $_SESSION['user']=$login;
    	    mostrarHome();
    	    
    	} else {
    	    echo "
    	    <html>
    	        <body style='margin:0;background-color:#2a292b'>
    	            <center><br><br>
    	                <h1 style='color:white'>Credenciais incorretas.</h1><br>
    	                <a style='color:white' href='javascript:history.go(-1)'>voltar</a>
    	            </center>
    	        </body>
    	    </html>";
    	}

    }
}catch(Exception $e){
echo $e;
}

?>