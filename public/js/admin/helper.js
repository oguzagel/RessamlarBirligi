//*********************standalone lfm button **********************/
(function( $ ){

    $.fn.filemanager = function(type, options) {
      type = type || 'file';
    
      this.on('click', function(e) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
        var target_input = $('#' + $(this).data('input'));
        var target_preview = $('#' + $(this).data('preview'));
        window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
        window.SetUrl = function (items) {
          var file_path = items.map(function (item) {
            return item.url;
          }).join(',');
    
          // set the value of the desired input to image url
          target_input.val('').val(file_path).trigger('change');
    
          // clear previous preview
          target_preview.html('');
    
          // set or change the preview image src
          items.forEach(function (item) {
            target_preview.append(
              $('<img>').css('height', '5rem').attr('src', item.thumb_url)
            );
          });
    
          // trigger change event
          target_preview.trigger('change');
        };
        return false;
      });
    }
    
    })(jQuery);
 
//*********************standalone lfm button end **********************/




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
        toastr.warning( message, "Uyar??", {
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
    
    $("#workform").ajaxForm({
        beforeSubmit: function(){
             if($('input[name=resim]')[0].files.length==0){
                showNotification( "warning", 'Resim Eklyein.')
                return false ;
            }
            
             
        },
        uploadProgress : function(event, position, total, percentComplete){
           $('#pbar .progress-bar').text( '%'+ percentComplete);
           $('#pbar .progress-bar').css('width', percentComplete+'%');
        },
        success : function(data){
            console.log(data);
            if(data.error == false){
                var text = `
                <tr>
                    <td>${data.data.id}</td>
                    <td>${data.data.name_az}</td>
                    <td>${data.data.name_en}</td>
                    <td class="lightgallery">
                        <a href="/storage/${data.data.path}" data-exthumbimage="/storage/${data.data.path}" data-src="/storage/${data.data.path}">
                            <i class="fa fa-image"></i>
                        </a>
                    </td>
                    <td>
                        ${ data.data.status==true ? '<span class="badge light badge-success ">Aktif</span>' : '<span class="badge light badge-danger ">Pasif</span>'}    
                        
                        
                    </td>
                    <td> <a href="{{ route('admin.works.edit',['work'=>$work->id]) }}" class="btn btn-sm btn-success">Edit</a> </td>
                </tr>
                `;
                
                $('.workstable tbody').append(text);
            
                
            }
            //$("#workform").append(data);
        }
    });
    
    
    $('.deletework').click(function(){
        var btn = $(this);
        var wid = $(this).attr('wid');
        console.log(wid);

        $.ajax({
            type :  'DELETE',
            url : '/admin/works/'+wid,
            success : function(response){
                console.log(response);
                if(response.error == false){
                    btn.parent().parent().remove();
                }
            }
        });

    });


    $('.deleteworkbtn').click(function(){
        var aid = $(this).attr('aid');
        $('#basicModal .modal-title').text('Silme Onay??');
        $('#basicModal .modal-body').text('Bu sanat????y?? silmek istedi??inizden emin misiniz?');
        $('#basicModal .btn-danger').text('Hay??r');
        $('#basicModal .btn-primary').text('Sil');
        $('#basicModal .btn-primary').attr('aid',aid); 
        $('#basicModal').modal('show');
    });

    $(document).on('click','.confirmbtn',function(){
        var aid = $(this).attr('aid');
        console.log('on event ile ??a????r??ld??');
        $.ajax({
            type : 'DELETE',
            url : '/admin/ressamlar/'+aid,
            success : function(response){
                console.log(response);
                if(response.error == true) {
                    showNotification('warning',response.message);
                    return false;
                }else{
                    //window.location.assign('/admin/ressamlar');
                    $('.art_'+aid).remove();
                    $('#basicModal').modal('hide');
                }
                
                

            },

        });
    });



   
   
    /*  $("#workform").submit(function(event){
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
    }); */


});
