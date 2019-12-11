

$(document).ready( function(){
	
	//checar se o navegador é antigo
	if(document.createElement("p").style.flexWrap!==''){ 
		$("body")[0].innerHTML="<br><br><center><h2>Navegador antigo e não suportado.</h2><br>"+
			"<a href='https://www.google.com.br/chrome/'>Baixe o Google Chrome</a><br>"+
			"<a href='https://www.mozilla.org/pt-br/firefox/new/'>Baixe o Mozilla Firefox</a></center>";	
	}
	
	//animacao de zoom nos projetos no celular quando estao visiveis
	setInterval(function(){
		if($(window).width()<1000){
			var projetos=document.getElementsByClassName("projeto");
			var descricoes=document.getElementsByClassName("fundo-descricao");
			var i=0;
			
			for(i; i<projetos.length; i++){
				var topPos = projetos[i].getBoundingClientRect().top;
					
				if( topPos < (window.innerHeight-300) && topPos>0 ){
					projetos[i].style.transform="scale(1)";
					descricoes[i].style.opacity="1";
				} else {
					projetos[i].style.transform="scale(0.9)";
					descricoes[i].style.opacity="0";
				}
			}
		}
	}, 200);
	
	
	
	//efeito do zoom quando o site é carregado
	$("#site-container").css("transform", "scale(1)");
	
	//efeito dos projetos quando o site é carregado
	$(".projeto").css("transform", "scale(0.9)");
	
	//abrir e fechar menu do header
	$("#botao-menu").click( function() { 
		$("#menu-header").slideToggle(500);
	});

	//corrigir o menu após mudar o tamanho da janela
	$(window).resize( function() { 
		if( ($("#menu-header").css("display")=="block" || $("#menu-header").css("display")=="none") 
				&& $(window).width()>1000 )
			$("#menu-header").css("display", "flex");
			
		$(".projeto").css("transform", "scale(0.9)");
		$(".fundo-descricao").css("opacity", "0");
	});
	
});


