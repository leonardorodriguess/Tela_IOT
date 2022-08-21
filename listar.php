<?php

function consulta($coluna, $periodo){
    return 
    "SELECT "
    . $coluna ."1, "
    . $coluna ."2, "
    . $coluna ."3, "
    . "data_hora "
    //. "TIME(data_hora) as data_hora "
    ."FROM tbmedidor1 "
    . $periodo
    . "Order by data_hora ";
}

function cons_padrao($coluna = "", $periodo = "")
{
    return Array_consulta(consulta($coluna,$periodo), $coluna);
}


function Array_consulta($consulta, $coluna = ""){
    
    include "conexao.php";
    $resultado = $PDO->query($consulta);
    $linhas = $resultado->fetchAll(PDO::FETCH_ASSOC);
    

    if($resultado){
        $coluna1 = $coluna2 = $coluna3 = $tempo = Array();

        foreach ($linhas as $linha) {
            array_push($coluna1, $linha[$coluna.'1']);
            array_push($coluna2, $linha[$coluna.'2']);
            array_push($coluna3, $linha[$coluna.'3']);
            array_push($tempo, $linha['data_hora']);
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

?>
