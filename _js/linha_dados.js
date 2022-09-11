//Exibição do grafico

function dados_linha (titulo, linha, coluna1 = [], coluna2 = [], coluna3 = [], type = "line")
{
  titulo, element =  (carceter_especial(titulo));
  pad_exib_graf(titulo);

  var ctx = document.getElementById(element);

  const myChart = new Chart(ctx, {
    type,
    data: {
      labels: linha,
      datasets: [
        {
          label: titulo + " 01",
          data: coluna1,
          backgroundColor: "rgba(153,205,1,0.0)",
          borderColor: "rgba(153,205,1,0.6)",
        },
        {
          label: titulo + " 02",
          data: coluna2,
          backgroundColor: "rgba(155,153,10,0.0)",
          borderColor: "rgba(155,153,10,0.6)",
          //hidden: true
        },
        {
          label: titulo + " 03",
          data: coluna3,
          backgroundColor: "rgba(155,103,10,0.0)",
          borderColor: "rgba(155,103,10,0.6)",
          //hidden: true
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
          ticks: {
            //aling: 'center',
            //crossAlign:'far',
            //z: 100,
            //labelOffset: 100,
            //padding: 0,
            //crossAlign: 'center',
            //padding: 200,
            //maxTicksLimit: 10,
            autoSkipPadding: 40,
            maxRotation: 0,
          }
        }
      }
    }

  });
}

function pad_exib_graf(titulo)
{
  //Gera parte do html para criação do gráfico de modo genérico
  titulo , element = carceter_especial(titulo)
  document.querySelector('#'+element + '_graf')
    .innerHTML = '<div class="container">' +
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