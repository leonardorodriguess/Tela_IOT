function integral(coluna, tempo){
    area = 0

    for(let i = 1; i < coluna.length; i++){
    //calculo para saber o valor de delta em minutos
        var periodo_ini = new Date(tempo[i - 1]);
        var periodo_fim = new Date(tempo[i]);

        var delta = Math.abs((periodo_ini - periodo_fim)/60/1000)
        //fórmula da integral
        coluna[i -1]= (parseFloat(coluna[i]) + parseFloat(coluna[i-1]))*(delta/60)/2

        area = coluna[i - 1] + area
    
    }
    return area/1000;
}
  

