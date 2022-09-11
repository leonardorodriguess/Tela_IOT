<?php
function consulta($coluna, $periodo_ini = "", $periodo_fim = ""){
    //Gera o código de consulta no banco para retornar os dados desejados

    if($coluna == "ativa" || $coluna == "reativa" || $coluna == "aparente")
    {
        $select = "SELECT " . $coluna . ", ";
    }
    else
    {
        $select = "SELECT "
        . $coluna ."1, "
        . $coluna ."2, "
        . $coluna ."3, ";
    }

    return (
        $select
        . "data_hora "
        ."FROM tbmedidor "
        ."where " .format_periodo($periodo_ini, $periodo_fim)
        . "Order by data_hora "
    );
}

function cons_padrao($coluna = "", $periodo_ini = "", $periodo_fim = ""){
    //função quer une aconsulta com o json criado
    return Array_consulta(consulta($coluna, $periodo_ini, $periodo_fim), $coluna);
}


function Array_consulta($consulta, $coluna = ""){
    //Função que pega o resultado da consulta e cria o arquivo Json para comunicar com o JavaScript
    
    include "conexao.php";
    $resultado = $PDO->query($consulta);
    $linhas = $resultado->fetchAll(PDO::FETCH_ASSOC);
    

    if($resultado){

        $coluna1 = $coluna2 = $coluna3 = $tempo = Array();

        if($coluna == "ativa" || $coluna == "reativa" || $coluna == "aparente"){
            foreach ($linhas as $linha) {
                array_push($coluna1, $linha[$coluna]);
                array_push($tempo, $linha['data_hora']);
            }
        }else{
            foreach ($linhas as $linha) {
                array_push($coluna1, $linha[$coluna.'1']);
                array_push($coluna2, $linha[$coluna.'2']);
                array_push($coluna3, $linha[$coluna.'3']);
                array_push($tempo, $linha['data_hora']);
            }
        }
        $arr = Array (
            'coluna1' => $coluna1,
            'coluna2' => $coluna2,
            'coluna3' => $coluna3,
            'tempo' => $tempo,
        );
        
        return $json = json_encode($arr);

    }else{
        echo "Nenhum usuário encontrado";
        return;
    }
}

function periodo($periodo){
    //função que faz a conversão da data para o formato do banco
    if($periodo != 'CURRENT_DATE' || $periodo != 'now()'){
        return "DATE_FORMAT(STR_TO_DATE('".$periodo."', '%d/%m/%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s')  ";
    }
    return $periodo;
}

function format_periodo($periodo_ini, $periodo_fim){
    //Função que escreve o código de consulta do filtro de data
    if($periodo_fim == "" && $periodo_ini == ""){
        $periodo_ini = 'CURRENT_DATE ';
        $periodo_fim = 'now() ';
    }
    else{
        $periodo_fim = $periodo_fim . " 23:59:59 ";
    }
    return " data_hora BETWEEN "
            .periodo($periodo_ini)
            ."AND " 
		    .periodo($periodo_fim);
}

?>
