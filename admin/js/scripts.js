$(document).ready(function() {
    $('#summernote').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                  // set focus to editable area after initializing summernote
      });
      $('#selectAllBoxes').click(function(event){
        if(this.checked)
        {
            $('.checkBoxes').each(function()
            {
                this.checked = true;
            });
        }
        else
        {
            $('.checkBoxes').each(function()
            {
                this.checked = false;
            });
        }
    });
//     var div_box ="<div id='load-screen><div id='loading'></div></div>";
//     $("body").prepend(div_box);
//     $('#load-screen').delay(700).fadeOut(600, function(){
//     $(this).remove();
//     })
//   });


var div_box = "<div id='load-screen'><div id='loading'></div></div>";

$("body").prepend(div_box);

$('#load-screen').delay(700).fadeOut(600, function(){
   $(this).remove();
});


//   $(document).ready(function() { to check if jquery there

//     alert("hello");
//   });
// $(document).ready(function() {

    function loadUsersOnline() {


        $.get("functions.php?onlineusers=result", function(data){

            $(".usersonline").text(data);
  

        });

    }


    setInterval(function(){

        loadUsersOnline();


    },500);  

});

