
function dados_linha (element = "myChart", type = "line", linha, coluna1 = [], coluna2 = [], coluna3 = [])
{
  var ctx = document.getElementById(element).getContext("2d");
  var myChart = new Chart(ctx, {
    type,
    data: {
      labels: linha,
      datasets: [
        {
          label: element + " 01",
          data: coluna1,
          backgroundColor: "rgba(153,205,1,0.0)",
          borderColor: "rgba(153,205,1,0.6)",
        },
        {
          label: element + " 02",
          data: coluna2,
          backgroundColor: "rgba(155,153,10,0.0)",
          borderColor: "rgba(155,153,10,0.6)",
          //hidden: true
        },
        {
          label: element + " 03",
          data: coluna3,
          backgroundColor: "rgba(155,103,10,0.0)",
          borderColor: "rgba(155,103,10,0.6)",
          //hidden: true
        }
      ],
    },
  });
}

function graf_corrente(type = undefined)
{
  var linha =  [ "Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sabado"]
  var coluna1 = [2, 9, 3, 17, 6, 3, 0]
  var coluna2 = [2, 100, 5, 5, 2, 1, 10]
  var coluna3 = [1, 50, 50, 50, 20, 10, 5]
  
  return dados_linha("Corrente", type, linha, coluna1, coluna2, coluna3 )
}

function graf_param(type = undefined)
{
  var linha =  [ "Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sabado"]
  var coluna1 = [1, 2, 3, 4, 5, 6, 7]
  var coluna2 = [10, 9, 8, 7, 6, 5, 4]
  var coluna3 = [10, 5, 8, 2, 6, 8, 7]
  return dados_linha("Tensao", type , linha, coluna1 , coluna2 ,coluna3 )
}

function graf_fp(type = undefined)
{
  var linha =  [ "Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sabado"]
  var coluna1 = [7, 2, 6, 4, 3, 6, 7]
  var coluna2 = [10, 9, 8, 7, 6, 5, 4]
  var coluna3 = [10, 5, 8, 2, 6, 8, 7]
  return dados_linha("Fp", type , linha, coluna1 , coluna2 ,coluna3 )
}

function graf_padrao()
{
  titulo = 'Fp'
  funcao = 'graf_fp()'
  str = '<div> <div class="container"> <h2>'+ titulo +'</h2> <div> <canvas id="'+ titulo +'"></canvas> </div> </div> <script>' + funcao + '</script> </div>'

  readText(str)
}

async function readText(str){
  text = await fetch('');
  text =  str
  var html = text.toString() ; $('#html_graf').html(html);
}