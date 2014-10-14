
var url_page = 'http://'+location.hostname+'/frontend_dev.php';    

function loading_show(){
    $('#loading').html("<img src='/images/preloader.gif'/>").fadeIn('fast');
}
function loading_hide(){
    $('#loading').fadeOut('fast');
}  

function loadData(page){
    loading_show();       
    $.ajax
    ({
        type: "POST",
        url:  url_page + "/ajax/news",
        data: "page=" + page,
        success: function(msg)
        {
            loading_hide();
            $("#paginador").html(msg);
        }
    });
}

function loadDataEventos(page,subseccion){
    loading_show();       
    $.ajax
    ({
        type: "POST",
        url:  url_page + "/ajax/eventos",
        data: "page=" + page + "&subseccion=" + subseccion,
        success: function(msg)
        {
            loading_hide();
            $("#paginador").html(msg);
        }
    });
}