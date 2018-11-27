
function addonglet(){
    var ul = document.getElementById("tabs");
    var li = document.createElement("li");
    var children = ul.children.length 
    li.setAttribute("id", "tab"+children)
    li.appendChild(document.createTextNode("Pièce "+children));
    ul.appendChild(li)
}