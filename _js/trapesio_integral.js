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
  


function periodo(obj){
    //separa no periodo por dias os gráficos quando for maior de um dia, pegando as posições dos dias no vetor

    let temp = Math.abs(temp_dia(obj.tempo[0])  - temp_dia(obj.tempo[obj.tempo.length - 1]))

    let k = 0;
    let dia = []
    let coluna = [];
    let tempo = [];
    let area = [];
    let t = [];

    coluna[k] = [];
    tempo[k] = [];
    
    dia[0] = 0;

    if(temp > 1){
        for(let i = 0; i < obj.tempo.length; i++){

            ini = new Date(obj.tempo[dia[k]])
            fim = new Date(obj.tempo[i])
            
            //filtrar de acordo com o perído de tempo
            if(temp <= 31){
                ini = ini.getDate()
                fim = fim.getDate()
            }else if (temp <= 366){
                ini = ini.getMonth();
                fim = fim.getMonth();
            }else{
                ini = ini.getFullYear();
                fim = fim.getFullYear();
            }

            //agrupar de acordo com o periodo
            if(Math.abs(ini - fim) != 0){
                area[k] = integral(coluna[k], tempo[k]).toFixed(2)
                t[k] = tempo[k][0];

                k +=1;
                dia[k] = i;
                
                coluna[k] = []
                tempo[k] = []
            }
            coluna[k][i - dia[k]] = obj.coluna1[i];
            tempo[k][i - dia[k]] = obj.tempo[i];
            
        }
        t[k] = tempo[k][dia[0]];
        area[k] = integral(coluna[k], tempo[k]).toFixed(2)
        

        return [area, t, 'bar'];
    }
    return [obj.coluna1, obj.tempo, 'line']
}


function temp_dia(tempo){
    return new Date(tempo)/(3600*24)/1000
}
