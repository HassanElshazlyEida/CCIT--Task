function check_all(){
    $('input[class="item_checkbox"]').each(function(){
        if($('input[class="check_all"]:checked').length==0){
            $(this).prop('checked',false)
        }else {
            $(this).prop('checked',true)
        }
    });
}
function delete_all(){

    $(document).on('click','.del_all',function(){
        $('#form_data').submit();
    });
    $(document).on('click','.delBtn',function(){
        var item_checked= $('input[class="item_checkbox"]:checked').length;
        if(item_checked>0){
            $('.record_count').text(item_checked);
            $(".empty_record").addClass('d-none');
            $(".not_empty_record").removeClass('d-none');
        }else {
            $(".empty_record").removeClass('d-none');
            $(".not_empty_record").addClass('d-none');
        }
      $("#multipleDelete").modal("show");
    });
}

