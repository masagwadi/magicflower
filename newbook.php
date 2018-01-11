<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {


    $('#datepicker').datepicker({
    dateFormat: 'dd-mm-yy',
    numberOfMonths: 2,
    onSelect: function(selected,evnt) {
         updateAb(selected);
    }
});

function updateAb(value){
    $('#yourInputID').text(value);

    var formURL = "checkdate.php";

    $.ajax({
        url: formURL,
        type: "GET",
        data: {date: value},
        success: function(resp, textStatus, jqXHR){

        // var results = $($.parseHTML(resp)).filter(".results").text();
        var results = $($.parseHTML(resp));

        $("#yourInputID").html(results);

        },
        error: function(jqXHR, textStatus, errorThrown){
            $("#yourInputID").html('<pre class="warning"><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
        }

    });



}



  } );
  </script>
</head>
<body>

<p>Date: <input type="text" id="datepicker"></p>

<p id="yourInputID">The answer</p>


</body>


</html>
