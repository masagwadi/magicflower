$(document).ready(function(){

    $('body').on('click','.yes-delete',function(){



        var clickedone = $(this);
        var postData = $(this).data("orderdelete");
        var formURL = "deleteorder.php";


        $.ajax({
            url: formURL,
            type: "GET",
            data: {oid: postData},
            success: function(resp, textStatus, jqXHR){

                $(".vcode-err").html('<pre class="warning">Order Deleted</pre>');



            },
            error: function(jqXHR, textStatus, errorThrown){
                $(".vcode-err").html('<pre class="warning"><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
            }

        });







        $('.deleteme').hide(400);
        $('.order-body').hide(400);


    });

    $('body').on('click','.yes-close',function(){

        $('.deleteme').hide(400);

    });


    $('body').on('click','.delete-order-prompt',function(){

        $('.deleteme').show(400);

    });



$('form').on('click','#applyvcode',function(){

          var postData = $('#voucher-code').val();
          var formURL = "checkvoucher.php";

          $.ajax({
              url: formURL,
              type: "GET",
              data: {vcode: postData},
              success: function(resp, textStatus, jqXHR){
                  var erroback = $($.parseHTML(resp)).filter(".maerror");
                  var results = $($.parseHTML(resp)).filter(".results").text();


                  var vvalue = $($.parseHTML(resp)).filter(".vvalue").text();
                  var vtype = $($.parseHTML(resp)).filter(".vtype").text();
                  var vid = $($.parseHTML(resp)).filter(".vid").text();


                  var cur = erroback.text();
          //         $('.vcode-err').html(resp).prepend(cur).addClass('success');

                    if(results == 5000){
                              // $('#voucher-block').hide(800);


                              var vvalue = parseInt(vvalue);
                              var vid = parseInt(vid);


                              // createCookie('vouchvalue', 300 , 7);
                              // eraseCookie('vouchvalue');
                              // createCookie('vouchvalue', 600, 1);


                              document.cookie = "vouchvalue="+ vvalue;
                              document.cookie = "vouchtype= "+ vtype.replace(/ /g,'') +' ';
                              document.cookie = "vouchid="+ vid;


                              // alert(vvalue+' thi55 is it = '+readCookie('vouchvalue'))
                              calculateTotal();

                    }else{
                              createCookie('vouchvalue', 'NOT!! 500' , 7);
                    }



                    function createCookie(name, value, days) {
                        if (days) {
                            var date = new Date();
                            date.setTime(date.getTime() + (days * 1 * 60 * 60 * 1000));
                            var expires = "; expires=" + date.toGMTString();
                        } else var expires = "";
                        document.cookie = name + "=" + value + expires + "; path=/";
                    //     alert("Fokofo ="+readCookie('vouchvalue')+"  From " + value);
                    }

                    function eraseCookie(name) {
                        createCookie(name,"",-1);
                    }



              $('.vcode-err').html(erroback).addClass('success');
              },
              error: function(jqXHR, textStatus, errorThrown){
                  $(".vcode-err").html('<pre class="warning"><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');

              }
          });


});

// #####################################################




$('.voucher-list').on('click','li .vstop',function(){

   var clickedone = $(this);
   var postData = $(this).data("vid");
   var formURL = "deactvoucher.php";


   $.ajax({
       url: formURL,
       type: "GET",
       data: {vcode: postData},
       success: function(resp, textStatus, jqXHR){

         clickedone.addClass('vstart');
         clickedone.removeClass('vstop');
         clickedone.text('Activate');

         $('[data-vidstatus="'+postData+'"]').addClass('vinactive ');
         $('[data-vidstatus="'+postData+'"]').removeClass('vactive ');



       },
       error: function(jqXHR, textStatus, errorThrown){
           $(".vcode-err").html('<pre class="warning"><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
       }

   });

});

// ###################################################################
// #####################################################




$('form').on('click','#genrandom',function(){

   var clickedone = $(this);
   var formURL = "genaraterandom.php";
   var postData = "";


   $.ajax({
       url: formURL,
       type: "GET",
       data: {vcode: postData},
       success: function(resp, textStatus, jqXHR){


          var results = $($.parseHTML(resp)).filter(".results").text();
         $('#vouchervalue').val(results);
         // $('#vouchervalue').hide(500);

       },
       error: function(jqXHR, textStatus, errorThrown){
           $(".vcode-err").html('<pre class="warning"><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
       }

   });

});

// ###################################################################


$('.voucher-list').on('click','li .vstart',function(){

   var clickedone = $(this);
   var postData = $(this).data('vid');
   var formURL = "actvoucher.php";


   $.ajax({
       url: formURL,
       type: "GET",
       data: {vcode: postData},
       success: function(resp, textStatus, jqXHR){

         clickedone.addClass('vstop');
         clickedone.removeClass('vstart');
         clickedone.text('Deactivate');

         $('[data-vidstatus="'+postData+'"]').removeClass('vinactive ');
         $('[data-vidstatus="'+postData+'"]').addClass('vactive ');



       },
       error: function(jqXHR, textStatus, errorThrown){
           $(".vcode-err").html('<pre class="warning"><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
       }

   });

});

// ###################################################################


$('.cleanerinfo').on('click','.status-btn',function(){

   var clickedone = $(this);
   var postData = $(this).data('orderidclick');
   var formURL = "updateorder.php";
   var clicktext = $(this).text();


   $.ajax({
       url: formURL,
       type: "GET",
       data: {orderid: postData, statv: clicktext},
       success: function(resp, textStatus, jqXHR){

         $('.status-btn').removeClass('status-btn-active');
         clickedone.addClass('status-btn-active');



       },
       error: function(jqXHR, textStatus, errorThrown){
           $(".vcode-err").html('<pre class="warning"><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
       }

   });




});
















});
