<script>
$(document).ready(function(){
    $(".delete_link").on('click', function(){
        var id = $(this).attr("rel");
        var delete_url = "posts.php?delete="+ id +" ";
        $(".modal_delete_link").attr("href", delete_url);
        $("#myModal").modal('show');
    });
});
</script>