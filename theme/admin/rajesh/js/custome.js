$(document).ready(function(){ 
    $('.selct2').select2(); 
    
    $(document).off('click','.clse').on('click','.clse',function(){
            // alert('here');
            $(this).parent().parent().parent().remove();
    });

    $('ol.sortable').nestedSortable({
        handle: 'div.menu-handle',
        helper: 'clone',
        items: 'li',
        opacity: .6,
        revert: 250,
        tabSize: 25,
        tolerance: 'pointer',
        toleranceElement: '> div',
        isTree: true,
        change: function() {
            $("#output").text("item relocated");
        }
    });

    $(document).off('click','#serialize_menu').on('click','#serialize_menu',function(e){
            e.preventDefault(); 

            var url = 'save_order';
            var sort = $('ol.sortable').nestedSortable('serialize');
            // alert(url);return false;
            $.ajax({
            
                url : url,
                type: "POST",
                // contentType: "application/json",  
                dataType: "json",
                data: {"sort":sort},
                success : function(resp) {   
                    // console.log(resp);return false;
                    if(resp.status == "success"){ 
                        alert(resp.status_message);
                    }else{ 
                        alert(resp.status_message); 
                    }
                     
                } 
            });
    });

    $(document).off('click','.del_menu').on('click','.del_menu',function(e){
        e.preventDefault(); 

        var url = 'change_show_on_menu_status'; 
        var id = $(this).attr('id');
        // alert(id);return false;
        $.ajax({
        
            url : url,
            type: "POST",
            // contentType: "application/json",  
            dataType: "json",
            data: {"id":id},
            success : function(resp) {   
                // console.log(resp);return false;
                if(resp.status == "success"){ 
                    alert(resp.status_message);
                    location.reload();
                }else{ 
                    alert(resp.status_message); 
                }
                 
            } 
        });
});
    

   
}); 
