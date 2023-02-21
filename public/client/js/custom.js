
    $(document).ready(function () {
        var id_product = $('.comment_product_id').val();
        alert(id_product);
      load_comment();
       function load_comment(){
        
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"url('/load-comment')",
            method:"POST",
            data:{id_product:id_product,_token:_token},
            success:function(data){
                $('#comment_show').html(data);
            }
        })
       }
        // 

    });


    //update cart
    