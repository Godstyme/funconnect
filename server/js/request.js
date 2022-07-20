$(document).ready(function($) {
   function registerUser(requestPath) {
      $("#userRegistration").submit(function(evt) {
         evt.preventDefault();
            $.ajax({
            url: requestPath,
            method : "post",
            dataType:'json',
            data:$(this).serialize(),
            success: function (response) {
               // console.log(response.message)
               if(response.status === 0){
                  $("#errorMsg").addClass('alert alert-danger');
                  $("#errorMsg").html(response.message);
               } else if (response.status === 1) {
                  $("#errorMsg").removeClass('alert alert-danger');
                  $("#errorMsg").addClass('alert alert-success');
                  $("#errorMsg").html(response.message);
                  setTimeout(function() {
                         window.location="login";
                  }, 3000)
               } else{
                  $("#errorMsg").html("please check what you are doing");                   
               }
            },
            error: function (response) {
               // let msg = JSON.parse(response);
               console.log(response)
            }
         })
      })
   }
   registerUser('server/classes/controller.php?_mode=userRegistration');

   $("#login").submit(function(evt) {
      evt.preventDefault();
      $.ajax({
         url: 'server/classes/controller.php?_mode=login',
         type: 'POST',
         dataType: 'json',
         data: $(this).serialize(),
         success:  (response) => {
            if(response.status === 0){
               $("#loginErorMsg").addClass('alert alert-danger');
               $("#loginErorMsg").html(response.message);
            } else if (response.status === 1) {
               $("#loginErorMsg").removeClass('alert alert-danger');
               $("#loginErorMsg").addClass('alert alert-success');
               $("#loginErorMsg").html(response.message);
               setTimeout(function() {
                  window.location="home";
               }, 3000)
            } else{
               $("#loginErorMsg").html("please check what you are doing");                   
            }
         },
         error: function(response){
            console.log(response);
         }
     })
   })

   function enablePostButton(sndBtn,textArea){
      $(sndBtn).attr('disabled',true);
      $(sndBtn).addClass('btn text-light');
      $(textArea).keyup(function(){
         if($(this).val().length !=0){
            $(sndBtn).attr('disabled', false);
         } else
            $(sndBtn).attr('disabled',true);
            $(sndBtn).addClass('btn text-light');
      })
   }
   enablePostButton('.sendButton','#text');

   $("#makeapost").submit(function(evt) {
      evt.preventDefault();
         $.ajax({
         url: 'server/classes/controller.php?_mode=makeapost',
         method : "post",
         dataType:'json',
         data:$(this).serialize(),
         success: function (response) {
            // console.log(response.message)
            if(response.status === 0){
               $("#errorMSG").addClass('alert alert-danger');
               $("#errorMSG").html(response.message);
               // console.log(response.message)
            } else if (response.status === 1) {
               $("#errorMSG").removeClass('alert alert-danger');
               $("#errorMSG").addClass('alert alert-success');
               $("#errorMSG").html(response.message);
               console.log(response.message)
               setTimeout(function() {
                  location.reload();
               }, 2000)
            } else{
               $("#errorMSG").html("please check what you are doing");      
               console.log(response.message)             
            }
         },
         error: function (response) {
            // let msg = JSON.stringify(response);
            console.log(response)
         }
      })
   })

})