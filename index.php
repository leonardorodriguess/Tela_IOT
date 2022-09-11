<!DOCTYPE HTML>
<html lang="pt-br">
  <head>
      <meta charset="utf-8">
      <title>Listar  com JS </title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>         
      <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
      <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
      <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
      <script src="./_js/calendario.js"></script>
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
      <link rel="stylesheet" href="_css/grafico_linha.css"/> 
      <link rel="stylesheet" href="_css/index.css"/> 
      <script src="_js/linha_dados.js"></script>
      <script src="_js/seleciona_lista.js"></script>
      <script src="_js/trapesio_integral.js"></script>
      
  </head>
  <body>
    <div> 
      <h3>Período<h3>
      <div>
          <form method="post" action = #>
            Data início <input type="text" id="calendario_ini" name=ini class="calendario" value= "<?=$_POST["ini"]?>"/>
            Data fim <input type="text" id="calendario_fim" name=fim class="calendario" value= "<?=$_POST["fim"]?>"/>
            <button type="submit">Enviar</button>
          </form> 
      </div>
    </div>
    <div>  
      <?php include('listar.php'); ?> 
      
      <div id="List">
        <select>
          <option value="corrente"> Corrente </option>
          <option value="tensao"> Tensão </option>
          <option value="fp"> Fp </option>
          <option value="ativa"> Potência Ativa </option>
          <option value="reativa"> Potêcia Reativa </option>
          <option value="aparente"> Potência Aparente </option>
        </select>
        
      </div>
      
      <div id="Corrente_graf" class="corrente box">
        
        <?php $json = cons_padrao('corrente', $_POST["ini"], $_POST["fim"]) ?>
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          dados_linha("Corrente", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
          </script>

      </div>



      <div id="Tensao_graf" class="tensao box">

        <?php $json = cons_padrao('tensao', $_POST["ini"], $_POST["fim"]) ?>

        <script>         
          var json = JSON.parse('<?=$json?>')
          dados_linha("Tensão", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
        </script>

      </div>

      <div id="Fp_graf" class="fp box">
        
        <?php $json = cons_padrao('fp', $_POST["ini"], $_POST["fim"]) ?>
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          dados_linha("Fp", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
        </script>

      </div>

      <div id="Ativa_graf" class="ativa box">

        <?php $json = cons_padrao('ativa', $_POST["ini"], $_POST["fim"]) ?>
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          dados_linha("Ativa", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
          console.log(integral(json.coluna1, json.tempo))
        </script>

      </div>

      <div id="Reativa_graf" class="reativa box">

        <?php $json = cons_padrao('reativa', $_POST["ini"], $_POST["fim"]) ?>
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          dados_linha("Reativa", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
          console.log(integral(json.coluna1, json.tempo))
        </script>

      </div>

      <div id="Aparente_graf" class="aparente box">

        <?php $json = cons_padrao('aparente', $_POST["ini"], $_POST["fim"]) ?>
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          dados_linha("Aparente", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
          console.log(integral(json.coluna1, json.tempo))
        </script>

      </div>
      <form action="potencia.php" class="botao">
          <button type="submit">Potência</button>
      </form>
    </div>
  </body>
</html>
