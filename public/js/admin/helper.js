function showNotification(type="info", message = null){
    if(type == "info"){
        toastr.info( message, "Bildirim", {
            positionClass: "toast-top-center",
            timeOut: 5e3,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })
    }


    if(type == "warning"){
        toastr.warning( message, "Uyarı", {
            positionClass: "toast-top-center",
            timeOut: 5e3,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })
    }


    if(type == "error"){
        toastr.error( message, "Hata", {
            positionClass: "toast-top-center",
            timeOut: 5e3,
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            preventDuplicates: !0,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
            tapToDismiss: !1
        })
    }
    
}



$(document).ready(function(){
    
    $("#workform").submit(function(event){
        event.preventDefault();
        

        
        var url = $(this).attr('action');
        var data  =  new FormData($(this)[0]);
        
        data.append('files[]', $('input[name="resim"]')[0].files[0]);
        console.log(data);
        console.log(url);

         

        $.ajax({
            type : 'POST',
            url : url,
            data : data,
            cache : false,
            processData: false,
            contentType: false,
            success : function(data){
                console.log(data);
                if(data.error == false){
                    showNotification('info',data.message);
                }
                
                

            }
           
        });


        return false;
    });


});
