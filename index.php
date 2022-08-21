<!DOCTYPE HTML>
<html lang="pt-br">
  <head>
      <meta charset="utf-8">
      <title>Listar  com JS </title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>         
      <link rel="stylesheet" href="_css/grafico_linha.css"/> 
      <script src="_js/linha_dados.js"></script>
  </head>
  <body>
    <div>  
      <?php include('listar.php'); ?> 
      
      <div id="Corrente_graf">

        <?php $json = cons_padrao('corrente') ?>
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          dados_linha("Corrente", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
        </script>

      </div>

      <div id="Tensao_graf">

        <?php $json = cons_padrao('tensao') ?>

        <script>         
          var json = JSON.parse('<?=$json?>')
          dados_linha("Tensão", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
        </script>

      </div>

      <div id="Fp_graf">

        <?php $json = cons_padrao('fp') ?>
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          dados_linha("Fp", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
        </script>

      </div>

      <div id="Ativa_graf">

        <?php $json = cons_padrao('ativa') ?>
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          dados_linha("Ativa", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
        </script>

      </div>

      <div id="Reativa_graf">

        <?php $json = cons_padrao('reativa') ?>
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          dados_linha("Reativa", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
        </script>

      </div>

      <div id="Aparente_graf">

        <?php $json = cons_padrao('aparente') ?>
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          dados_linha("Aparente", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
        </script>

      </div>
    </div>
  </body>
</html>
