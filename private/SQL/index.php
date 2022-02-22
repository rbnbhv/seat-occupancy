<?php
include 'private/dbconnection.inc.php';
?>
<!doctype html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>Reserviere deinen Tennisplatz!</title>
    <link href='styles.css' rel='stylesheet' type='text/css'>
<script>
window.onload=init;

function init(e) {
  getTable(e);
  initCells(); 
  document.getElementById('theform_name').onsubmit=bookIt;
}

function initCells(){
  var i, j;
  var x = document.getElementById('tabelle').getElementsByTagName('tr');
  for (i = 0; i < x.length; ++i) {
    var y = document.getElementById('tabelle').getElementsByTagName('tr')[i].getElementsByTagName('td');
    for (j = 1; j < y.length; ++j) {
      y[j].onclick = changeBackground;
      if (y[j].innerText == 'belegt') {
        y[j].style.background = 'red';
      }
    }
  }
}

function getTable(e){
  e.preventDefault();
  let req = new XMLHttpRequest();
  req.onreadystatechange=function(){
    if(req.readyState == 4 && req.status == 200){
      document.getElementById('tabelle').innerHTML=req.responseText;
      initCells();
    }
  }
  req.open('GET','backend.php?command=refresh');
  req.send();
}

function changeBackground(e){
  e.preventDefault();
  if (this.style.background != 'red') {
    console.log(this.parentNode.rowIndex ,this.cellIndex);
    this.style.background = this.style.background == 'darkgreen' ? '#aaf257' : 'darkgreen';
  }
}

let newZeilenArray=[];
let newSpaltenArray=[];

function bookIt(e){
  e.preventDefault();
  var txt;
  var person = prompt('Please enter your name:', '');
  if (person == null || person == '') {
    txt = 'Buchung abgebrochen.';
  } else {
    txt = 'Ihre Buchung wurde bestätigt, ' + person +'!';
    booking(e);
  }
  document.getElementById('infoText').innerHTML=txt;  
}

function booking(e){
  e.preventDefault();
  var i,j;
  var x = document.getElementById('tabelle').getElementsByTagName('tr');
  for (i = 0; i < x.length; ++i) {
    var y = document.getElementById('tabelle').getElementsByTagName('tr')[i].getElementsByTagName('td'); 
    for (j = 1; j < y.length; ++j) {
      if(y[j].style.background=='darkgreen'){
        ++newZeilenArray.length;
        ++newSpaltenArray.length;
        newZeilenArray[newZeilenArray.length-1] = y[j].parentNode.rowIndex;
        newSpaltenArray[newSpaltenArray.length-1] = y[j].cellIndex;
      }
      if (y[j].innerText == 'belegt') {
        y[j].style.background = 'red';
      }
    }
  }
  var o;
  for (o = 0; o < newZeilenArray.length; ++o) {  
    console.log(newZeilenArray.length-1);
    let req = new XMLHttpRequest();
    req.onreadystatechange=function(){
      if(req.readyState == 4 && req.status == 200){
        console.log('Moin '+o);
        if(o == newZeilenArray.length){
          console.log('und jetzt getTable, weil o='+o)
            getTable(e);
        }
      }
    }
    req.open('GET','backend.php?command=newentry&platz='+newSpaltenArray[o]+'&zeit='+newZeilenArray[o]);
    req.send();
  }
}

</script>
  </head>
  <body>
    <div id='navigation'>
      <div id='banner'>
        <h1>Platzreservierung</h1>
      </div>
      <p id='menu'>
      <a href='#'>Home</a>
      <a href='#' id='buchen'>Platz buchen!</a>
      <a href='#' id='123'>Register</a>
      </p>
    </div>
    <div id='book'> 
      <form id='theform_name'>
        <input id='test' value='Markierungen buchen' type='submit'>
      </form><br> 
      <p id='infoText'><p>
    </div>
    <div id='tabelle'>
</div>
  </body>
  </html>