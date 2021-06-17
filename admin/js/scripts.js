$(document).ready(function() {
    $('#summernote').summernote({
        height: 300,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false                  // set focus to editable area after initializing summernote
      });
  });


//   $(document).ready(function() { to check if jquery there

//     alert("hello");
//   });
$(document).ready(function() {
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
});