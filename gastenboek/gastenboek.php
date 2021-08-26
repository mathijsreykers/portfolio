<?php
include "isset.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
      body {
         margin: 0;
         display: flex;
         flex-direction: column;
         align-items: center;
         justify-content: center;

      }

      #postCon {
         display: flex;
         justify-content: center;
         align-items: center;
         flex-direction: column;
         gap: 15px;
         border: 1px solid black;
         background: rgb(134, 144, 145);
         padding: 15px;
         margin-bottom: 15px;

      }

      #comCon {
         background: chartreuse;
         width: 95vw;
         display: flex;
         justify-content: start;
         gap: 5px;
         padding: 10px;
         min-height: 500px;
         flex-direction: column;
         overflow: hidden;
         align-items: center;
         padding-top: 20px;


      }

      #comCon div div {
         min-height: 70px;
         position: relative;


      }

      p {
         align-self: flex-start;
         margin-left: 5px;
         max-width: 85%;
      }


      #comCon div {
         width: 100%;
         display: flex;
         flex-direction: column;
         justify-content: center;
         align-items: center;
         margin-top: 0px;
         overflow: hidden;
         gap: 5px;

      }

      #comCon div div p {
         font-size: 1.5rem;
      }

      .hallo {
         position: absolute;
         bottom: 5px;
         right: 5px;
      }

      button {
         border-radius: 5px;
         border: 1px solid black;
         background: rgb(209, 106, 192);
      }

      .indent0 {
         background-color: darkgreen;
         margin-top: 15px !important;
      }

      .indent1 {
         margin-left: 2%;
         width: 98% !important;
    background: chocolate;

      }

      .indent1 div:first-child {
         background: chocolate;
      }

      .indent2 {

         margin-left: 4%;
         width: 96% !important;
          background: cornflowerblue;
      }



      .indent3 {

         margin-left: 6%;
         width: 94% !important;background: rgb(189, 237, 100);
      }


      .indent4 {

         margin-left: 8%;
         width: 92% !important;
          background: rgb(100, 237, 111);
      }



      .indent5 {

         margin-left: 10%;
         width: 90% !important;
          background: white;
      }



      .indent6 {

         margin-left: 12%;
         width: 88% !important;
          background: purple;
      }


   </style>
</head>

<body>
   <h1>Guestbook</h1>
   <div id="postCon">
      <input type="text" size="85" id="inputveld">
      <button id="postButton">POST COMMENT</button>
   </div>
   <div id="comCon">
   </div>

   <script>
    loadDoc();
    var hier=0;
    var counterId = 0;
    var postButton = document.getElementById("postButton");
    var inputveld = document.getElementById("inputveld");
    var active = false;
    postButton.addEventListener('click', MaakComment);
    var classlist = ["indent0","indent1", "indent2", "indent3", "indent4", "indent5", "indent6"];

    function loadDoc() {
        var empty= document.getElementById("comCon");

        empty.innerHTML="";
        fetch("http://localhost/PhpCursus/dag16/gastenboek/api.php?_ijt=451ma8nnj2dik0irumuo5ncvq2").then(response => response.json())
            .then(
                data => {
                    for (x = 0; x < data.length; x++) {

                        var body = data[x]["body"];
                        var iden = data[x]["id"];
                        if (data[x]["id_parent"]== null){
                            leesCommentJson(body, iden,null);
                            var id = document.getElementById("com" + iden);
                            id.firstChild.firstChild.innerHTML = data[x]["body"];
                        }
                        else{
                            var idParent = "com" + data[x]["id_parent"];
                            leesCommentJson(body,iden,idParent);
                        }
                    }
                })
    }

    function leesCommentJson(comment,idComment,idParent) {
        if(idParent==null){
            var indent = 0;
            var container = document.getElementById("comCon");
        }else{
            var container = document.getElementById(idParent);
            var arrpos = classlist.indexOf(container.firstChild.classList.value)+1;
            var indent = arrpos;
        }
        var div1 = document.createElement("div");
        div1.setAttribute("id", `com${idComment}`);
        container.appendChild(div1);
        var div2 = document.createElement("div");
        div1.appendChild(div2);
        if(idParent==null){
            div2.classList.add("indent0");
        }else{
            div2.classList.add(classlist[indent]);
        }
        var p1 = document.createElement("p");
        var ptekst = document.createTextNode(comment);
        p1.appendChild(ptekst);
        div2.appendChild(p1);
        var but1 = document.createElement("button");
        but1.classList.add("hallo");
        var buttekst = document.createTextNode("antwoord");
        but1.appendChild(buttekst);
        but1.setAttribute("id", `but${idComment}`);
        div2.appendChild(but1);
        var buttontest = document.getElementById(`but${idComment}`);
        buttontest.addEventListener("click", function () {
            showReplyBox( container, indent, this.id,idComment);
        })
    }

    function putInDataBase(body,id_parent){
        var http= new XMLHttpRequest();
        http.onreadystatechange = function(){
            if(this.readyState== 4 && this.status == 200){

            }
        };
        http.open("POST","gastenboek.php",true);
        http.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

        var data = {
            "test":body,
            "id_parent":id_parent
        }
        http.send("mijndata=" + JSON.stringify(data));
    }


      function MaakComment() {

          counterId++;
          var indent = 0;
          var container = document.getElementById("comCon");
          var div1 = document.createElement("div");
          div1.setAttribute("id", `com${counterId}`);
          container.appendChild(div1);
          var div2 = document.createElement("div");
          div1.appendChild(div2);
          div2.classList.add("indent0");
          var p1 = document.createElement("p");
          var ptekst = document.createTextNode(inputveld.value);
          p1.appendChild(ptekst);
          div2.appendChild(p1);
          var but1 = document.createElement("button");
          but1.classList.add("hallo");
          var buttekst = document.createTextNode("antwoord");
          but1.appendChild(buttekst);
          but1.setAttribute("id", `temp${counterId}`);
          div2.appendChild(but1);

          var buttontest = document.getElementById(`temp${counterId}`);
          putInDataBase(inputveld.value,null);
          buttontest.addEventListener("click", function () {
             showReplyBox(container, indent, this.id,null);
          })
      }


      function showReplyBox( containerParent, indentParent, buttonId, parentId) {

            var inputId = "input" + counterId;
            var antwoordId = "antwoord" + counterId;
            var buttonElement = document.getElementById(buttonId);
            buttonElement = buttonElement.parentElement;
            buttonElement = buttonElement.parentElement;
            var nieuwVeld = document.createElement("input");
            nieuwVeld.setAttribute("id", inputId);
            nieuwVeld.setAttribute("size", "85");
            buttonElement.appendChild(nieuwVeld);
            var newButton = document.createElement("button");
            var tekst = document.createTextNode("antwoord");
            newButton.appendChild(tekst);
            newButton.setAttribute("id", antwoordId);
            buttonElement.appendChild(newButton);
            var button = document.getElementById(antwoordId);
            button.onclick = function () {
               buttonElement.lastChild.remove();
               buttonElement.lastChild.remove();
               maakReply(parent, nieuwVeld.value, buttonElement, indentParent,parentId);
                // loadDoc();

            }

      }



      function maakReply(parent, body, containerParent, indentP,parentId) {

         counterId++;
         var div1 = document.createElement("div");
         var indent = indentP + 1;
         div1.setAttribute("id", `com${counterId}`);
         containerParent.appendChild(div1);
         var div2 = document.createElement("div");
         div1.appendChild(div2);
         var p1 = document.createElement("p");
         var ptekst = document.createTextNode(body);
         p1.appendChild(ptekst);
         div2.appendChild(p1);
         var but1 = document.createElement("button");
         but1.classList.add("hallo");
         var buttekst = document.createTextNode("antwoord");
         but1.appendChild(buttekst);
         but1.setAttribute("id", `temp${counterId}`);
         div2.appendChild(but1);
         putInDataBase(body,parentId);

         but1.addEventListener("click", function () {
            showReplyBox( div1, indent, this.id,parentId);
         })

         for (var x = 0; x < classlist.length; x++) {
            if (x == indent) {
               div2.classList.add(classlist[x]);


            }
         }


      }
   </script>
</body>

</html>