
function addonglet() {
    var li = document.createElement("li");
    var btn = document.createElement("button");
    var text = document.createTextNode("piece");
    btn.appendChild(text);
    li.appendChild(btn);
  
    var ul = document.getElementById("tabs");
    ul.insertBefore(li, ul.childNodes[2]);

    var script = document.createElement('script');
    script.src = 'https://code.jquery.com/jquery-3.3.1.min.js';
    script.type = 'text/javascript';
    document.getElementsByTagName('head')[0].appendChild(script);
}