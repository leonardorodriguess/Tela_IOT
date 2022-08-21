<?php
	include('conexao.php');
	$corrente1 = $_GET['corrente1'];
	$corrente2 = $_GET['corrente2'];
	$corrente3 = $_GET['corrente3'];
	$tensao1 = $_GET['tensao1'];
	$tensao2 = $_GET['tensao2'];
	$tensao3 = $_GET['tensao3'];
	$fp1 = $_GET['fp1'];
	$fp2 = $_GET['fp2'];
	$fp3 = $_GET['fp3'];
	$ativa1 = $_GET['ativa1'];
	$ativa2 = $_GET['ativa2'];
	$ativa3 = $_GET['ativa3'];
	$reativa1 = $_GET['reativa1'];
	$reativa2 = $_GET['reativa2'];
	$reativa3 = $_GET['reativa3'];
	$aparente1 = $_GET['aparente1'];
	$aparente2 = $_GET['aparente2'];
	$aparente3 = $_GET['aparente3'];
	$sql = "INSERT INTO tbmedidor1 (corrente1, corrente2, corrente3, tensao1, tensao2, tensao3, fp1, fp2, fp3, ativa1, ativa2, ativa3, reativa1, reativa2, reativa3, aparente1, aparente2, aparente3 ) VALUES (:corrente1, :corrente2, :corrente3, :tensao1, :tensao2, :tensao3, :fp1, :fp2, :fp3, :ativa1, :ativa2, :ativa3, :reativa1, :reativa2, :reativa3, :aparente1, :aparente2, :aparente3)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':corrente1', $corrente1);
	$stmt->bindParam(':corrente2', $corrente2);
	$stmt->bindParam(':corrente3', $corrente3);
	$stmt->bindParam(':tensao1', $tensao1);
	$stmt->bindParam(':tensao2', $tensao2);
	$stmt->bindParam(':tensao3', $tensao3);
	$stmt->bindParam(':fp1', $fp1);
	$stmt->bindParam(':fp2', $fp2);
	$stmt->bindParam(':fp3', $fp3);
	$stmt->bindParam(':ativa1', $ativa1);
	$stmt->bindParam(':ativa2', $ativa2);
	$stmt->bindParam(':ativa3', $ativa3);
	$stmt->bindParam(':reativa1', $reativa1);
	$stmt->bindParam(':reativa2', $reativa2);
	$stmt->bindParam(':reativa3', $reativa3);
	$stmt->bindParam(':aparente1', $aparente1);
	$stmt->bindParam(':aparente2', $aparente2);
	$stmt->bindParam(':aparente3', $aparente3);
	if($stmt->execute()){
		echo "salvo com sucesso";
	}else{ 
		echo "erro ao salvar";
	}
	/* usar a seguinte linha na url do navegador para testar: 
	localhost/esp32/salvar.php?corrente1=1&corrente2=2&corrente3=3&tensao1=1&tensao2=2&tensao3=3&fp1=1&fp2=2&fp3=3&ativa1=1&ativa2=2&ativa3=3&reativa1=1&reativa2=2&reativa3=3&aparente1=1&aparente2=2&aparente3=3&*/
?>
