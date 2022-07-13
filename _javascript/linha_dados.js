function dados_linha (linha, coluna1, coluna2 ){
  var ctx = document.getElementById("myChart").getContext("2d");
  var myChart = new Chart(ctx, {
    type: "line",
    data: {
      labels: linha,
      datasets: [
        {
          label: "01",
          data: coluna1,
          backgroundColor: "rgba(153,205,1,0.6)",
        },
        {
          label: "02",
          data: coluna2,
          backgroundColor: "rgba(155,153,10,0.6)",
        },
        {
          label: "03",
          data: coluna3,
          backgroundColor: "rgba(155,103,10,0.6)",
        },
      ],
    },
  });
}

  var linha =  [ "Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sabado"]
  var coluna1 = [2, 9, 3, 17, 6, 3, 0]
  var coluna2 = [2, 100, 5, 5, 2, 1, 10]
  var coluna3 = [1, 50, 50, 50, 20, 10, 5]
  
  dados_linha(linha, coluna1, coluna2, coluna3)

