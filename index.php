<?php 

# PHP Pagination Class 

# Guia rápido 

require "pagination.class.php";
header("content-type:Text/html;charset=utf8");
$array = array("your","array","to","paginate","hello","world","PHP","bealtful");

$limit = 2; # Limite de ítens na paginação - Items limit number to pagination

$return_type = 'array'; # Tipo de retorn, array ou objetos ( array|object )

$instance = new pagination( $array, $limit, $return_type ); 

$page = isset( $_GET["page"] ) ? $_GET["page"] : 1; # Página em questão

$pagination = $instance->page( $page ); // $pagination é o array paginado. damos um foreach a partir dele 

if( ! $pagination ) die("Página " . $page . " não existe"); // verifica se a página em questão existe

foreach( $pagination as $key=>$value ) { // foreach de array paginado
	var_dump($value); 
}

echo "<p> Mostrando resultados de " . $instance->start . " a " . $instance->end; // ::start retorna o item inicial e ::end retorna o ítem final

echo "<p>";
if( $instance->prev() ) { // se houver a página anterior - retorna o número da pagina
	echo "<a href='?page=" . $instance->prev() ."'> Página anterior <<< </a>"; // link pra mesma página com número da página anterior
}
echo " Página " . $instance->page." "; // página em questão 
if( $instance->next() ) { // se houver a próxima página - retorna o número da pagina
	echo "<a href='?page=" .$instance->next() ."'> >>> Próxima página </a>"; // link pra mesma página com número da página seguinte
}


################################### ÍNDICE DE FUNÇÕES ##########################################
#
# $instance->new pagination( array $array,  int limite, string retorno ); 
#			limite: limite de itens a ser mostrado
#			retorn: tipo de retorno do array, pode ser 'array' ou 'object'
#
# $instance->page( numero da pagina ) 
#			Pega os ítens da página em questão. Retorna um array com os dados paginados e
#			false se a página passada não existir.
# 
# $instance->page 
#			retorna a página atual
#
# $instance->start
#			retorna o número do ítem inicial do array paginado
#
# $instance->end
#			retorna o número do último ítem do array paginado
#
#			# Exemplo: "Mostrando do ítem ".$instance->start." ao ".$instance->end;
#
# $instance->prev()
#			retorna o número da página anterior ou false se a página anterior não existir
#
# $instance->next()
#			retorna o número da próxima página ou false se a próxima página não existir
#
##################################################################################################