$(document).ready(function(){
    $('#name').on('keyup',function () {
        var query = $(this).val();
        $.ajax({
            url:'{{ route("search") }}',
            type:'GET',
            data:{'name':query},
            success:function (data) {
                $('#product_list').html(data);
            }
        })
    });
    $(document).on('click', 'li', function(){
        var value = $(this).text();
        $('#name').val(value);
        $('#product_list').html("");
    });
});