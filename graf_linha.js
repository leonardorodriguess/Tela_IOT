async function loadText(url) {
    text = await fetch(url);
    //awaits for text.text() prop 
    //and then sends it to readText()
    readText(await text.text());
}
function readText(text){
    //here you can continue with your JS normal logic
    console.log(text);
    //text.toString().innerHTML
    //element.innerHTML  = text.toString()
    var html = text.toString() ; $('#html_graf').html(html);
}

loadText('parte1.txt')