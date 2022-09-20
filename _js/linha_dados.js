//Exibição do grafico
//import 'chartjs-adapter-date-fns';

function dados_linha (titulo, linha, coluna1 = [], coluna2 = [], coluna3 = [], type = "line", total)
{
  titulo, element =  (carceter_especial(titulo));
  pad_exib_graf(titulo, total);
  let cor = [];
  if(type == "line"){
    cor[0] = "rgba(153,205,1,0.0)";
    cor[1] = "rgba(155,153,10,0.0)";
    cor[2] = "rgba(155,103,10,0.0)";
    hidden = false;
  }
  if(type == "bar"){
    cor[0] = "rgba(153,205,1,1.0)";
    cor[1] = "rgba(155,153,10,1.0)";
    cor[2] = "rgba(155,103,10,1.0)";
    hidden = true;
  }

  var ctx = document.getElementById(element);

  const myChart = new Chart(ctx, {
    type,
    data: {
      labels: linha,
      datasets: [
        {
          label: titulo + " 01",
          data: coluna1,
          backgroundColor: cor[0],
          borderColor: "rgba(153,205,1,0.6)",
        },
        {
          label: titulo + " 02",
          data: coluna2,
          backgroundColor: cor[1],
          borderColor: "rgba(155,153,10,0.6)",
          hidden
        },
        {
          label: titulo + " 03",
          data: coluna3,
          backgroundColor: cor[2],
          borderColor: "rgba(155,103,10,0.6)",
          hidden
        }
      ],
    },
    /*options: {
      scales: {
          y: {
              min: 0,
          }
      }
    }*/
    /*options: {
      scales: {
        y: {

          min: 0,
          type: 'linear',
          grace: '5%'
          /*ticks: {
            stepSize: 5
          }
        }

          
      }

      },
      plugins: {
        legend: true
    }*/
    options: {
      scales: {
        y: {
          min: 0,
          type: 'linear',
          grace: '5%'
        },
        x:{
          parsing: false,
          type: 'time',
            time: {
                unit: periodo_linha(linha),
            },
                
          ticks: {
            source: 'data',
            //aling: 'center',
            //crossAlign:'far',
            //z: 100,
            //labelOffset: 10,
            //padding: 0,
            //crossAlign: 'center',
            //padding: 200,
            //maxTicksLimit: 10,
            autoSkipPadding: 40,
            maxRotation: 0,
          }
        }
      },
      plugins:{
        datalabels:{
          anchor: 'end',
          align: 'top',
        }
      }
    },
    plugins: type == "bar" ? [ChartDataLabels] : ""
  });
}

function pad_exib_graf(titulo, total = "")
{
  if(titulo == "Ativa" || titulo == "Reativa" || titulo == "Aparente")
    total = '<p class="total_graf">'+ total +'</p> '
  else
    total = ''

  //Gera parte do html para criação do gráfico de modo genérico
  titulo , element = carceter_especial(titulo)
  document.querySelector('#'+element + '_graf')
    .innerHTML = '<div class="container">' +
                  total +
                 '<div>'+ 
                 '<canvas id="'+ element +'"></canvas>' +
                 ' </div>' +
                 '</div>';
}

function carceter_especial(titulo){
  //separa trata caso rebeba o valor com caractere especial
  element = titulo;
  if (element == 'Tensão')
    element = 'Tensao'
  return titulo, element;
}

function periodo_linha (linha){
  let temp = Math.abs(temp_dia(linha[0])  - temp_dia(linha[linha.length - 1]))

  if(temp < 1)
    return 'hour'
  else if(temp <= 7)
    return 'day'
  else if(temp <= 31)
    return 'week'
  else if (temp <= 366)
    return 'month'
  else
    return 'year'
}

function temp_dia(tempo){
  return new Date(tempo)/(3600*24)/1000
}