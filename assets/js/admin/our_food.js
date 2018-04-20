window.onload = function(){
    /**
     * Disable / Hide some elements when page loaded
     */
    $('#image').prop('disabled', true);
    $('.btn-submit').hide();
    setTimeout(function(){
        $('.mce-top-part').hide();
        tinyMCE.get('content_vi').getBody().setAttribute('contenteditable', false);
        tinyMCE.get('content_en').getBody().setAttribute('contenteditable', false);
        tinyMCE.get('content_cn').getBody().setAttribute('contenteditable', false);
    }, 200);

};

/**
 * Enable / Show by admin
 */
function enableEdit(){
    $('#image').prop('disabled', false);
    tinyMCE.get('content_vi').getBody().setAttribute('contenteditable', true);
    tinyMCE.get('content_en').getBody().setAttribute('contenteditable', true);
    tinyMCE.get('content_cn').getBody().setAttribute('contenteditable', true);
    $('.mce-top-part').show();
    $('.btn-submit').show();
    $('.enable-edit').hide();
    $('#title_vi').prop('disabled', false);
    $('#title_en').prop('disabled', false);
    $('#title_cn').prop('disabled', false);
}