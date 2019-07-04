$(function () {
//init tinymce
    tinymce.init({
        selector: 'textarea:not(.no-tinymce)',
        // theme: 'modern',
        // skin: 'lightgray-gradient',
        // resize: false,
        // plugins: [
        //     'advlist autolink autoresize lists link image charmap print preview hr anchor pagebreak',
        //     'searchreplace wordcount visualblocks visualchars code fullscreen',
        //     'insertdatetime media nonbreaking save table contextmenu directionality',
        //     'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
        // ],
        // toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        // toolbar2: 'print preview media | forecolor backcolor emoticons | codesample fontsizeselect',
        // fontsize_formats: '8px 10px 12px 14px 16px 18px 24px 27px 36px',
        // image_advtab: true,
        // convert_urls: false,
        // allow_script_urls: true,
        // cleanup: false,
        // verify_html: false,
    });
    $('body').on('change', '.change_news_status', function () {
        let status = $(this).data('status');
        let id_news = $(this).data('id_news');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'news/change-valid-status',
            data: {status: status, id_news: id_news},
            success: function (data) {
                if (data.status)
                    showAlert(data.content);
                else
                    showAlert(data.content, 'error');
            }
        });
    });
});