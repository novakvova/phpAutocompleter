window.addEventListener('load',init);
var activeLI=0;
function init() {


    var inputSearch = document.getElementById("userInput");
    inputSearch.onkeyup = function(e) {
        //console.log(this.value);
        var text=this.value;
        if(text.length>1)
        {
            $.ajax({
                type: 'GET',
                url: '/ajax_autocompleter.php',
                data: {'q': text},
                success: function(resp) {
                    loadDataAutocompleter(resp);

                    //console.log(resp);
                    //alert(msg);
                }
            });
        }
    }
    function loadDataAutocompleter(list) {
        if(list.length>0) {
            var ulElem = document.createElement("ul");
            for (var i = 0; i < list.length; i++) {
                var liElem = document.createElement("li");
                var cHtml =
                    `<img src="images/Сало.jpg" class="img-circle"/>
                    <a href="#">${list[i].name}</a>`;
                liElem.innerHTML = cHtml;
                ulElem.appendChild(liElem);
            }
            var parent = document.getElementById("droplistContent");
            parent.innerHTML = ulElem.innerHTML;

            // if (!parent.classList.contains("showElement")) {
            //     parent.classList.add("showElement");
            // }
        }
        else
        {
            parent.innerHTML = "";
            // if (parent.classList.contains("showElement")) {
            //     parent.classList.remove("showElement");
            // }
        }

    }

    // var str= "Сало, Сало, Цибуля, Хліб, Горілка, Оселедець, Огірок, Подружка(Останя допомога)";
    // var list=str.split(", ");
    // var inputSearch = document.getElementById("userInput");
    // var ulElem = document.createElement("ul");
    // for(var i=0;i<list.length;i++) {
    //     var liElem= document.createElement("li");
    //     var cHtml=
    //         `<img src="images/${list[i]}.jpg" class="img-circle"/>
    //         <a href="#">${list[i]}</a>`;
    //     liElem.innerHTML=cHtml;
    //     ulElem.appendChild(liElem);
    //
    //     liElem.onclick=clickLiElement;
    // }
    // var parent = document.getElementById("droplistContent");
    // parent.appendChild(ulElem);
    // // inputSearch.onclick=function() {
    // //     parent.classList.toggle("showElement");
    // // }
    // inputSearch.onkeyup = function(e) {
    //     var tagsLI = parent.getElementsByTagName("li");
    //     var dropdown = document.getElementById("droplistContent");
    //     if(this.value.length>1) {
    //
    //
    //         if (!dropdown.classList.contains("showElement")) {
    //             dropdown.classList.add("showElement");
    //         }
    //         var filter = this.value.toUpperCase();
    //         for (var i = 0; i < tagsLI.length; i++) {
    //             //console.log(tagsLI[i].children);
    //             if (tagsLI[i].children[1].text.toUpperCase().indexOf(filter) > -1) {
    //                 tagsLI[i].style.display = "";
    //             }
    //             else {
    //                 tagsLI[i].style.display = "none";
    //             }
    //         }
    //     }
    //     else {
    //         if (dropdown.classList.contains("showElement")) {
    //             dropdown.classList.remove("showElement");
    //         }
    //     }
    //     //console.log("----keyCode----",e.keyCode);
    //     if(e.keyCode==40 && tagsLI.length>activeLI)
    //     {
    //         if(activeLI>=1)
    //             tagsLI[activeLI-1].classList.remove("li-hover");
    //
    //         tagsLI[activeLI].classList.add("li-hover");
    //         if((activeLI+1)==tagsLI.length)
    //             return;
    //
    //         //tagsLI[activeLI].classList.
    //         //var tagsLI[activeLI];
    //         activeLI++;
    //     }
    // }

}
function clickLiElement() {
    var inputSearch = document.getElementById("userInput");
    //console.log("----li----", this);
    var childs=this.children;
    for(var j=0;j<childs.length; j++)
    {
        if(childs[j].nodeName=='A') {
            inputSearch.value=childs[j].text;
            break;
        }
    }
}
window.onclick = function (e) {
    //console.log(e.target);
    if (!e.target.matches("#userInput")) {
        var dropdown = document.getElementById("droplistContent");
        if (dropdown.classList.contains("showElement")) {
            dropdown.classList.remove("showElement");
        }
    }
}
