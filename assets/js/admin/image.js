var csrf_hash = $('#csrf').val();
$('.btn-edit-ok').click(function () {
    $(this).hide();
    id = $(this).data('id');
    $('.btn-success-' + id).show();
    $('.row_' + id + ' input').prop('disabled', false);
});

$('.btn-success-ok').click(function () {
    var url = HOSTNAME + 'admin/library/update';
    id = $(this).data('id');
    var title_vi = $(".row_" + id + " input[name='title-vi']").val();
    var title_en = $(".row_" + id + " input[name='title-en']").val();
    var title_cn = $(".row_" + id + " input[name='title-cn']").val();
    $.ajax({
        method: "post",
        url: url,
        data: {
            csrf_seafood_token : csrf_hash, title_vi : title_vi, title_en : title_en, title_cn : title_cn, id : id
        },
        success: function(response){
            if(response.status == 200){
                csrf_hash = response.reponse.csrf_hash;
                alert('Cập nhật thành công');
                $('.row_' + id + ' input').prop('disabled', true);
                $('.btn-edit-' + id).show();
                $('.btn-success-' + id).hide();
            }
        },
        error: function(jqXHR, exception){
            console.log(errorHandle(jqXHR, exception));
        }
    });
});
$('.btn-remove').click(function () {
    var url = HOSTNAME + 'admin/library/delete';
    id = $(this).data('id');
    if(confirm('Chắc chăn xóa ảnh này')){
        $.ajax({
            method: "post",
            url: url,
            data: {
                csrf_seafood_token : csrf_hash, id : id
            },
            success: function(response){
                if(response.status == 200){
                    csrf_hash = response.reponse.csrf_hash;
                    $('.remove_' + id).fadeOut();
                }
            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
            }
        });
    }
});