async function readText(str){
    text = await fetch('');
    text =  str
    var html = text.toString() ; $('#html_graf').html(html);
}
str = '<div> <div class="container"> <h2>Algo</h2> <div> <canvas id="Tensao"></canvas> </div> </div> <script>graf_tensao("bar") </script> </div>'
//loadText('parte1.txt')
readText(str)