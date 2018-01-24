//Frequency
/*This is to calculate the cost*/
/*Author: Sagwadi Maluleke
 * Inndependent
 */

//Associate Item with avalue
var frequency_array = new Array();
frequency_array["OnceOff"] = 1;
frequency_array["Daily"] = 2;
frequency_array["Weekly"] = 3;
frequency_array["Bi-Weekly"] = 4;
frequency_array["Monthly"] = 5;

var room_number = new Array();
room_number["0"] = 0;
room_number["1"] = 1;
room_number["2"] = 2;
room_number["3"] = 3;
room_number["4"] = 4;
room_number["5"] = 5;

var bathrooms_prices = new Array();
bathrooms_prices["0"] = 0;
bathrooms_prices["1"] = 1;
bathrooms_prices["2"] = 2;
bathrooms_prices["3"] = 3;
bathrooms_prices["4"] = 4;
bathrooms_prices["5"] = 5;

var veranda_prices = new Array();
veranda_prices["0"] = 0;
veranda_prices["1"] = 1;
veranda_prices["2"] = 2;
veranda_prices["3"] = 3;
veranda_prices["4"] = 4;
veranda_prices["5"] = 5;

var newindow_prices = new Array();
newindow_prices["0"] = 0;
newindow_prices["1"] = 1;
newindow_prices["2"] = 2;
newindow_prices["3"] = 3;
newindow_prices["4"] = 4;
newindow_prices["5"] = 5;
newindow_prices["6"] = 6;
newindow_prices["7"] = 7;
newindow_prices["8"] = 8;
newindow_prices["9"] = 9;
newindow_prices["10"] = 10;



function getFrequencyPrice() {
    var frequencyPrice = 1;
    var theForm = document.forms["msform"];
    var selectedFrequency = theForm.elements["selectedfrequency"];
    frequencyPrice = frequency_array[selectedFrequency.value];
    return frequencyPrice;

    var divobja = document.getElementById('frePri');
    divobja.style.display = 'block';
    divobja.innerHTML = "Requency" + frequencyPrice;
}

function getNumberOfRooms() {
    var roomNumberPrice = 0;
    var theForm = document.forms["msform"];
    var selectedRooms = theForm.elements["selectedrooms"];
    roomNumberPrice = room_number[selectedRooms.value];
    frequency = getFrequencyPrice();

    //START FOR ONE ROOM
    //One room Once-off
    if (roomNumberPrice == 1 && frequency == 1) {
        return 171;
    } else if (roomNumberPrice == 1 && frequency == 3) {
        //One room weekly
        return 123.5;
    } else if (roomNumberPrice == 1 && frequency == 4) {
        //One room bi-weekly
        return 128.25;
    } else if (roomNumberPrice == 1 && frequency == 5) {
        //One room monthly
        return 142.5;
    }

    //START FOR ONE-BEDROOM APPARTMENT
    else if (roomNumberPrice == 2 && frequency == 1) {
        //Two room Once-off
        return 225;
    } else if (roomNumberPrice == 2 && frequency == 3) {
        //Two room weekly
        return 162.5;
    } else if (roomNumberPrice == 2 && frequency == 4) {
        //Two room bi-weekly
        return 175;
    } else if (roomNumberPrice == 2 && frequency == 5) {
        //Two room monthly
        return 187.5;
    }


    //START FOR TWO-BED-ROOM APPARTMENT
    else if (roomNumberPrice == 3 && frequency == 1) {
        //Three room Once-off
        return 306;
    } else if (roomNumberPrice == 3 && frequency == 3) {
        //Three room weekly
        return 183.95;
    } else if (roomNumberPrice == 3 && frequency == 4) {
        //Three room bi-weekly
        return 198.1;
    } else if (roomNumberPrice == 3 && frequency == 5) {
        //Three room monthly
        return 234.75;
    }


    //START FOR THREE-BED-ROOM APPARTMENT
    else if (roomNumberPrice == 4 && frequency == 1) {
        //Three room Once-off
        return 333;
    } else if (roomNumberPrice == 4 && frequency == 3) {
        //Three room weekly
        return 224.9;
    } else if (roomNumberPrice == 4 && frequency == 4) {
        //Three room bi-weekly
        return 242.2;
    } else if (roomNumberPrice == 4 && frequency == 5) {
        //Three room monthly
        return 259.5;
    }

    //START FOR FOUR ROOM
    else if (roomNumberPrice == 5 && frequency == 1) {
        //Four room Once-off
        return 414;
    } else if (roomNumberPrice == 5 && frequency == 3) {
        //Four room weekly
        return 265.85;
    } else if (roomNumberPrice == 5 && frequency == 4) {
        //Four room bi-weekly
        return 286.3;
    } else if (roomNumberPrice == 5 && frequency == 5) {
        //Four room monthly
        return 306.75;
    } else {
        return 0;
    }


    var divobjb = document.getElementById('romPri');
    divobjb.style.display = 'block';
    divobjb.style.width = '100px';
    divobjb.innerHTML = "Rooms" + roomNumberPrice;
}

function getBathroomsPrice() {
    var bathroomPrice = 0;
    //Get a reference to the form id="msform"
    var theForm = document.forms["msform"];
    //Get a reference to the select id="filling"
    var selectedBathrooms = theForm.elements["bathrooms"];
    //set cakeFilling Price equal to value user chose
    //For example bathrooms_prices["Lemon".value] would be equal to 5
    bathroomPrice = bathrooms_prices[selectedBathrooms.value];
    //finally we return bathroomPrice

    frequency = getFrequencyPrice();
    basebath = 30;

    return bathroomPrice * basebath;
}

function getVerandaPrice() {
    var verandaPrice = 0;
    //Get a reference to the form id="msform"
    var theForm = document.forms["msform"];
    //Get a reference to the select id="filling"
    var selectedVeranda = theForm.elements["veranda"];
    //set cakeFilling Price equal to value user chose
    //For example bathrooms_prices["Lemon".value] would be equal to 5
    verandaPrice = veranda_prices[selectedVeranda.value];
    //finally we return bathroomPrice

    frequency = getFrequencyPrice();
    basebath = 20;

    return verandaPrice * basebath;
}

function windowsPrice() {

    var windowsprice = 0;

    var theForm = document.forms["msform"];

    var selectedWindow = theForm.elements["newwindow"];

    windowsprice= newindow_prices[selectedWindow.value];

//    if (includeInscription.checked == true) {
//        windowsprice = 20;
//    }

    return windowsprice*20;
}

//materialPrice() finds the candles price based on a check box selection
//function materialPrice() {
//    var materialprice = 0;
//    //Get a reference to the form id="msform"
//    var theForm = document.forms["msform"];
//    //Get a reference to the checkbox id="includeMaterials"
//    var includeMaterials = theForm.elements["cleaningmaterials"];
//    //If they checked the box set materialprice to 5
//    if (includeMaterials.checked == true) {
//        materialprice = 40;
//    }
//    //finally we return the materialprice
//    return materialprice;
//}






//function windowsPrice() {
//    //This local variable will be used to decide whether or not to charge for the inscription
//    //If the user checked the box this value will be 20
//    //otherwise it will remain at 0
//    var windowsprice = 0;
//    //Get a refernce to the form id="msform"
//    var theForm = document.forms["msform"];
//    //Get a reference to the checkbox id="includeinscription"
//    var includeInscription = theForm.elements["includewindows"];
//    //If they checked the box set windowsprice to 20
//    if (includeInscription.checked == true) {
//        windowsprice = 20;
//    }
//    //finally we return the windowsprice
//    return windowsprice;
//}

function calculateTotal() {
    //Here we get the total price by calling our function var divobj = document.getElementById('totalPrice');
    //Each function returns a number so by calling them we add the values they return together

   var originalcleaningPrice = getNumberOfRooms() + getBathroomsPrice() + getVerandaPrice() + windowsPrice();

    //display the result
    var divobj = document.getElementById('totalPrice');
    divobj.style.display = 'block';
    divobj.innerHTML = "";
    if (getNumberOfRooms() > 0) {
        divobj.innerHTML += "Rooms: R" + getNumberOfRooms() + "<br>";
    }
    if (getBathroomsPrice() > 0) {
        divobj.innerHTML += "Bathrooms: R" + getBathroomsPrice() + "<br>";
    }
    if (getVerandaPrice() > 0) {
        divobj.innerHTML += "Veranda/Balcony: R" + getVerandaPrice() + "<br>";
    }
//    if (materialPrice() > 0) {
//        divobj.innerHTML += "Cleaning Materials: " + materialPrice() + "<br>";
//    }
    if (windowsPrice() > 0) {
        divobj.innerHTML += "Windows: R" + windowsPrice() + "<br>";
    }


    finalcleaningPrice = originalcleaningPrice;
    divobj.innerHTML += "<br><b class=''>Total: R  " + finalcleaningPrice.toFixed(2) +"</b><br><hr>";



    if (readCookie('vouchvalue') == null || readCookie('vouchvalue') == 'null' || readCookie('vouchvalue') == '') {
        cleaningPrice = originalcleaningPrice;
        // divobj.innerHTML += "<br><span class='discount-text'>Discount: R ( " + 0 + " )</span><br>";
        // window.location = "login.aspx";
    }else{

           if( readCookie('vouchtype') == "percent"){

               var discountnow = originalcleaningPrice * (readCookie('vouchvalue')/100);
               divobj.innerHTML += "<span class='discount-text'>Discount: R ( " + discountnow.toFixed(2) + " )</span><br>";
               cleaningPrice = originalcleaningPrice - discountnow.toFixed(2);

           }else{
               divobj.innerHTML += "<span class='discount-text'>Discount: R ( " + readCookie('vouchvalue') + " )</span><br>";
               cleaningPrice = originalcleaningPrice - readCookie('vouchvalue');


           }



    }


    if(cleaningPrice<0){
        finalcleaningPrice = 0;
        divobj.innerHTML += "<br><b class='order-total'>DUE: R  " + finalcleaningPrice.toFixed(2) + "</b> <br><b>(per clean)<b>";
    }else{
        finalcleaningPrice = cleaningPrice;
        divobj.innerHTML += "<br><b class='order-total'>DUE: R  " + finalcleaningPrice.toFixed(2) +"</b> <br><b>(per clean)<b>";
    }


// PRINT OUT Monthly TOT
if(frequency>1){

    if(frequency == 3){
        var monthlytotal = finalcleaningPrice.toFixed(2) * 4;
    }

    if(frequency == 4){
        var monthlytotal = finalcleaningPrice.toFixed(2) * 2;
    }

    if(frequency == 5){
        var monthlytotal = finalcleaningPrice.toFixed(2) * 1;
    }

    if(finalcleaningPrice.toFixed(2) > 0){
        var theduetot = "The Monthly cost: R" + monthlytotal;
    }


    $('#monthlydue').text(theduetot);
}else{
    $('#monthlydue').text(" ");
}

// #############################

    document.cookie = 'finalPri=' + finalcleaningPrice;

    document.cookie = 'TotPri=' + originalcleaningPrice;
    // createCookie('TotPri', originalcleaningPrice, 7);
    var cookiePrice = readCookie('TotPri');
    var divobj2 = document.getElementById('class2');
    divobj2.style.display = 'block';
    //used the hide class to hide these results

// alert(cookiePrice);

    divobj2.innerHTML = "<div class='prizo hide'><p>Current cookie  <span style='color:red;'>R" + cookiePrice + "</span></p></div>";



}






function hideTotal() {
    var divobj = document.getElementsByClassName('totalPrice class2 ');
    divobj.style.display = 'none';
    var useless = calculateTotal();
}
//Setting Cookies
function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}
//This is for the required field
document.addEventListener("DOMContentLoaded", function () {
    var elements = document.getElementsByTagName("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function (e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("This field cannot be left blank");
            }
        };
        elements[i].oninput = function (e) {
            e.target.setCustomValidity("");
        };
    }
})






function changeclasspets() {

        var NAME = document.getElementById("gost1");

        NAME.className = "mynewclass";

    }

    function changeclasspetsNO() {

        var NAME = document.getElementById("gost1");

        NAME.className = "hide";

    }

    function changeclasskids() {

        var NAME = document.getElementById("gost2");

        NAME.className = "mynewclass";

    }

    function changeclasskidsNO() {

        var NAME = document.getElementById("gost2");

        NAME.className = "hide";

    }
