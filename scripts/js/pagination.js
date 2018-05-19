function pagination(id){
    var type = id.substr(0,1);
    var val = id.substr(1);
    var str = id;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("pagination_content").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET", "modules/pagination/pagenationLoad.php?pg=" + str, true);
    xmlhttp.send();
}
