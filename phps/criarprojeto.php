<?php
    session_start();
    
    function mostrarPagina(){
        
        echo "
        <html>
            <head>
                <a href='http://om.blog.br/loginhome'> home </a>
                <style>
                    #nome-projeto{
                        
                        
                    }
                </style>
            </head>
            <body>
                <div>
                    <input id='nome-projeto' type='text'>
                </div>
            </body>
        </html>
        ";
        
    }

    if(!isset($_SESSION['user'])) {
         header('Location: https://om.blog.br');
    } else {
        
        mostrarPagina();
    }
?>

