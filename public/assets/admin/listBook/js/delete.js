$(document).ready(function() {
    $("#maintable").on("click",".delete-btn",function(event){
        if(!confirm('Data will not be recoverable, continue?')){
            return;
        }
        window.location.href = $(this).data('url');
    });
});

