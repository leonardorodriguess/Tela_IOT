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
      <div> 
        <h3 id="periodo">Período</h3>
        <div id="form_periodo">
            <form method="POST" action=#>
              Data início: <input type="text" id="calendario_ini" name="ini" class="calendario" required="true" value= "<?= (isset($_POST["ini"]) ? $_POST["ini"] : date('d/m/Y')); ?>"  />
              Data fim: <input type="text" id="calendario_fim" name="fim" class="calendario" required="true" value= "<?=(isset($_POST["fim"]) ? $_POST["fim"] : date('d/m/Y'));?>"/>
              <button type="submit">Enviar</button>
            </form> 
        </div>
      </div>
      
      <div id="Corrente_graf" class="corrente box">
        
        <?php $json = cons_padrao('corrente', isset($_POST["ini"]) ? $_POST["ini"] : date('d/m/Y'), isset($_POST["fim"]) ? $_POST["fim"] : date('d/m/Y')) ?>
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          dados_linha("Corrente", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
          </script>

      </div>



      <div id="Tensao_graf" class="tensao box">

        <?php $json = cons_padrao('tensao', isset($_POST["ini"]) ? $_POST["ini"] : date('d/m/Y'), isset($_POST["fim"]) ? $_POST["fim"] : date('d/m/Y')) ?>

        <script>         
          var json = JSON.parse('<?=$json?>')
          dados_linha("Tensão", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
        </script>

      </div>

      <div id="Fp_graf" class="fp box">
        
        <?php $json = cons_padrao('fp', isset($_POST["ini"]) ? $_POST["ini"] : date('d/m/Y'), isset($_POST["fim"]) ? $_POST["fim"] : date('d/m/Y')) ?>
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          dados_linha("Fp", json['tempo'], json['coluna1'], json['coluna2'], json['coluna3'])
        </script>

      </div>

      <div id="Ativa_graf" class="ativa box">

        <?php $json = cons_padrao('ativa', isset($_POST["ini"]) ? $_POST["ini"] : date('d/m/Y'), isset($_POST["fim"]) ? $_POST["fim"] : date('d/m/Y')) ?>
        
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          //total = "Total: " + integral( json.coluna1, json.tempo).toFixed(2) + " UND"
          graf = periodo(json)
          console.log(graf)
          total = "Total: " + integral(json.coluna1, json.tempo).toFixed(2) + " kW/h";
          dados_linha("Ativa", graf[1], graf[0], json['coluna2'], json['coluna3'], graf[2], total)
          </script>

      </div>

      <div id="Reativa_graf" class="reativa box">

        <?php $json = cons_padrao('reativa', isset($_POST["ini"]) ? $_POST["ini"] : date('d/m/Y'), isset($_POST["fim"]) ? $_POST["fim"] : date('d/m/Y')) ?>
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          graf = periodo(json)
          console.log(graf)
          total = "Total: " + integral(json.coluna1, json.tempo).toFixed(2) + " kW/h";
          dados_linha("Reativa", graf[1], graf[0], json['coluna2'], json['coluna3'], graf[2], total)
        </script>

      </div>

      <div id="Aparente_graf" class="aparente box">

        <?php $json = cons_padrao('aparente', isset($_POST["ini"]) ? $_POST["ini"] : date('d/m/Y'), isset($_POST["fim"]) ? $_POST["fim"] : date('d/m/Y')) ?>
        
        <script>       
          var json = JSON.parse('<?=$json?>')
          graf = periodo(json)
          console.log(graf)
          total = "Total: " + integral(json.coluna1, json.tempo).toFixed(2) + " kW/h";
          dados_linha("Aparente", graf[1], graf[0], json['coluna2'], json['coluna3'], graf[2], total)
        </script>

      </div>
    </div>
  </body>
</html>
