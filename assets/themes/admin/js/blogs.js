    $(function(){
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('admin-blog-title');
        $("#date").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        })
    })
    $(document).on("keypress", ".bootstrap-tagsinput input", function(e) {
        return 13 == e.which ? e.preventDefault() : ""
    })