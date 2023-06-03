const inside = document.getElementById('kalendarz');
const data1 = document.getElementById('data');

var tydzien = 1;
var i = 1;
var liczba =1;

var date = new Date();
var firstDay = new Date(date.getFullYear(),date.getMonth(), 1).getDay();
var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDay();
var month = date.getMonth();
var rok = date.getFullYear();
var liczba_dni = daysInMonth(month,rok)+ firstDay;
var tytul = ["Styczeń","Luteń","Marzeń","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Pazdziernik","Listopad","Grudzien"];
var tyd = ["Mon","Tue","Wed","Thu","Fri","Sut","Sun"];


kalendarze(liczba_dni,month);
function kalendarze(liczba_dni){
    data1.innerHTML = tytul[month];
    liczba = 1;
    var nowa = "";
    nowa += "<table>"
    nowa += '<tr>';
    for(var h=0;h<=6;h++){
        nowa += '<th class="week">' + tyd[h] + '</th>';
    }
    nowa += '</tr>';
    nowa += "<tr>"
    for(var i=1;i<liczba_dni;i++){

        if(i>=firstDay ){
            nowa += '<th href="#form" class="nowa2">' + liczba + '</th>';
            liczba++;
        }
        else {
            nowa += '<th>' + '</th>';
        }
        if(i%7==0){
            nowa += '<tr></tr>';
        }

    }
    nowa += "</tr>"
    nowa += "</table>"

    inside.innerHTML = nowa;

    const tha = document.querySelectorAll("th");

    for(let j=0;j < tha.length;j++){
        tha[j].addEventListener("click",prawie);
    }
}

function prawie(){
    let div = document.createElement("div");
    document.querySelector("#kalendarz1").after(div);
    div.style.boxShadow = "40px 40px 40px";
    div.style.backgroundColor = "white";
    div.style.padding = "20px";
    div.style.position = "relative";
    div.style.marginTop = "-480px";
    div.style.width = "500px";
    div.style.height = "500px";
    div.style.marginLeft = "auto";
    div.style.marginRight = "auto";
    div.innerHTML = '<form method="POST" action="check.php"> Imie: <input type="text" name="imie"> <br>  Nazwisko <input type="text"  name="nazwisko"> <br> Termin <input type="date" name="termin"> <br> <input type="submit" value="Rezerwacja"></form>';
    var btn = document.createElement("BUTTON");
    btn.textContent = 'Anuluj';
    div.appendChild(btn);
    btn.addEventListener('click',() => {
       div.remove();  
    });
}


function daysInMonth (month, year) {
    return new Date(year, month, 0).getDate();
}

function siemka(){
    month--;
    var cos= daysInMonth(month,rok)+ firstDay;
    kalendarze(cos,month);
}

function siemka2(){
    month++;
    var cos= daysInMonth(month,rok)+ firstDay;
    kalendarze(cos,month);
}


/*
function obrazek(){
    var obraz = document.querySelector("#namiot");
    obraz.innerHTML = 'fdsfasfsa';
    obraz.style.color = 'white';
    obraz.style.opacity = 0.5;
}

function obrazek2(){
    var obraz = document.querySelector("#namiot");
    obraz.innerHTML = "";
    obraz.style.opacity = 1;
}
*/



