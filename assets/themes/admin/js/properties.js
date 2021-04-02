$(function(){
    CKEDITOR.replace('description');
    CKEDITOR.replace('usp');
});
$(".gallery").dropzone({
        url: "upload_files",
        maxFilesize: 1000,
        acceptedFiles: 'image/*',
        init: function () {
            var submit2 = document.getElementById('submit2');
            if (this.getUploadingFiles().length != 0 && this.getQueuedFiles().length != 0) {
                submit2.disabled = true;
            }
            this.on("complete", function (file) {
                if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    submit2.disabled = false;
                }
            });
            this.on('success', function (file, resp) {
            });
        },
        success: function (result, xhr) {
            var obj = jQuery.parseJSON(xhr);
            result.customid = obj.path;
            if (obj.type == 0) {
                $("#hiddenimages").append('<input type="hidden" name="images[]" value="' + obj.path + '">');
            } else {
                $("#hiddenimages").append('<input type="hidden" name="images[]" value="' + obj.path + '">');
            }
        },
        addRemoveLinks: true,
        removedfile: function (file) {
            var path = file.customid;
            var res = path.replace(base_url, '');
            $.ajax({
                type: 'POST',
                url: "delete_files",
                data: {path: res},
                success: function (data) {
                    $("#hiddenimages input[value='" + path + "']").remove();
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        sending: function () {
            var submit2 = document.getElementById('submit2');
            submit2.disabled = true;
        }
    });
$(".floor").dropzone({
    url: "upload_files/floor_plans",
    maxFilesize: 1000,
    acceptedFiles: 'image/*',
    init: function () {
        var submit2 = document.getElementById('submit2');
        if (this.getUploadingFiles().length != 0 && this.getQueuedFiles().length != 0) {
            submit2.disabled = true;
        }
        this.on("complete", function (file) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                submit2.disabled = false;
            }
        });
        this.on('success', function (file, resp) {
        });
    },
    success: function (result, xhr) {
        var obj = jQuery.parseJSON(xhr);
        result.customid = obj.path;
        if (obj.type == 0) {
            $("#hiddenimages").append('<input type="hidden" name="floorimages[]" value="' + obj.path + '">');
        } else {
            $("#hiddenimages").append('<input type="hidden" name="floorimages[]" value="' + obj.path + '">');
        }
    },
    addRemoveLinks: true,
    removedfile: function (file) {
        var path = file.customid;
        var res = path.replace(base_url, '');
        $.ajax({
            type: 'POST',
            url: "delete_files/property_floor_plans",
            data: {path: res},
            success: function (data) {
                $("#hiddenfloorimages input[value='" + path + "']").remove();
            }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    },
    sending: function () {
        var submit2 = document.getElementById('submit2');
        submit2.disabled = true;
    }
});
$(".master").dropzone({
    url: "upload_files/master_plans",
    maxFilesize: 1000,
    acceptedFiles: 'image/*',
    init: function () {
        var submit2 = document.getElementById('submit2');
        if (this.getUploadingFiles().length != 0 && this.getQueuedFiles().length != 0) {
            submit2.disabled = true;
        }
        this.on("complete", function (file) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                submit2.disabled = false;
            }
        });
        this.on('success', function (file, resp) {
        });
    },
    success: function (result, xhr) {
        var obj = jQuery.parseJSON(xhr);
        result.customid = obj.path;
        if (obj.type == 0) {
            $("#hiddenimages").append('<input type="hidden" name="masterimages[]" value="' + obj.path + '">');
        } else {
            $("#hiddenimages").append('<input type="hidden" name="masterimages[]" value="' + obj.path + '">');
        }
    },
    addRemoveLinks: true,
    removedfile: function (file) {
        var path = file.customid;
        var res = path.replace(base_url, '');
        $.ajax({
            type: 'POST',
            url: "delete_files/property_master_plans",
            data: {path: res},
            success: function (data) {
                $("#hiddenmasterimages input[value='" + path + "']").remove();
            }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    },
    sending: function () {
        var submit2 = document.getElementById('submit2');
        submit2.disabled = true;
    }
});
$(".construction").dropzone({
    url: "upload_files/construction",
    maxFilesize: 1000,
    acceptedFiles: 'image/*',
    init: function () {
        var submit2 = document.getElementById('submit2');
        if (this.getUploadingFiles().length != 0 && this.getQueuedFiles().length != 0) {
            submit2.disabled = true;
        }
        this.on("complete", function (file) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                submit2.disabled = false;
            }
        });
        this.on('success', function (file, resp) {
        });
    },
    success: function (result, xhr) {
        var obj = jQuery.parseJSON(xhr);
        result.customid = obj.path;
        if (obj.type == 0) {
            $("#hiddenimages").append('<input type="hidden" name="constructionimages[]" value="' + obj.path + '">');
        } else {
            $("#hiddenimages").append('<input type="hidden" name="constructionimages[]" value="' + obj.path + '">');
        }
    },
    addRemoveLinks: true,
    removedfile: function (file) {
        var path = file.customid;
        var res = path.replace(base_url, '');
        $.ajax({
            type: 'POST',
            url: "delete_files/property_construction_updates",
            data: {path: res},
            success: function (data) {
                $("#hiddenconstructionimages input[value='" + path + "']").remove();
            }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    },
    sending: function () {
        var submit2 = document.getElementById('submit2');
        submit2.disabled = true;
    }
});
$(".walkthrough").dropzone({
    url: "upload_files/walkthrough",
    maxFilesize: 1000,
    acceptedFiles: 'image/*',
    init: function () {
        var submit2 = document.getElementById('submit2');
        if (this.getUploadingFiles().length != 0 && this.getQueuedFiles().length != 0) {
            submit2.disabled = true;
        }
        this.on("complete", function (file) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                submit2.disabled = false;
            }
        });
        this.on('success', function (file, resp) {
        });
    },
    success: function (result, xhr) {
        var obj = jQuery.parseJSON(xhr);
        result.customid = obj.path;
        if (obj.type == 0) {
            $("#hiddenimages").append('<input type="hidden" name="walkthroughimages[]" value="' + obj.path + '">');
        } else {
            $("#hiddenimages").append('<input type="hidden" name="walkthroughimages[]" value="' + obj.path + '">');
        }
    },
    addRemoveLinks: true,
    removedfile: function (file) {
        var path = file.customid;
        var res = path.replace(base_url, '');
        $.ajax({
            type: 'POST',
            url: "delete_files/property_project_walkthrough",
            data: {path: res},
            success: function (data) {
                $("#hiddenwalkthroughimages input[value='" + path + "']").remove();
            }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    },
    sending: function () {
        var submit2 = document.getElementById('submit2');
        submit2.disabled = true;
    }
});
$(".elevations").dropzone({
    url: "upload_files/elevations",
    maxFilesize: 1000,
    acceptedFiles: 'image/*',
    init: function () {
        var submit2 = document.getElementById('submit2');
        if (this.getUploadingFiles().length != 0 && this.getQueuedFiles().length != 0) {
            submit2.disabled = true;
        }
        this.on("complete", function (file) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                submit2.disabled = false;
            }
        });
        this.on('success', function (file, resp) {
        });
    },
    success: function (result, xhr) {
        var obj = jQuery.parseJSON(xhr);
        result.customid = obj.path;
        if (obj.type == 0) {
            $("#hiddenimages").append('<input type="hidden" name="elevationsimages[]" value="' + obj.path + '">');
        } else {
            $("#hiddenimages").append('<input type="hidden" name="elevationsimages[]" value="' + obj.path + '">');
        }
    },
    addRemoveLinks: true,
    removedfile: function (file) {
        var path = file.customid;
        var res = path.replace(base_url, '');
        $.ajax({
            type: 'POST',
            url: "delete_files/property_elevations",
            data: {path: res},
            success: function (data) {
                $("#hiddenelevationsimages input[value='" + path + "']").remove();
            }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    },
    sending: function () {
        var submit2 = document.getElementById('submit2');
        submit2.disabled = true;
    }
});

$(document).ready(function(){
    $("#add_city").trigger("change");
    $("#possession_date").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    })
});

$("#add_city").change(function(){

    var id = $(this).val();
    $('#locations').empty();

    $.ajax({
        type: 'POST',
        url: "get_locations",
        data: {id: id},
        success: function (data) {
            var data = JSON.parse(data);
            console.log(data);
            $.each(data, function (i, item) {
                $('#locations').append($('<option>', { 
                    value: item.id,
                    text : item.name 
                }));
            });
        }
    });
});

$(".highlight").change(function(){
    var id = $(this).val();
    if (this.checked) {
        var val = 1;
    }else{
        var val = 0;
    }
    $.ajax({
        type: 'POST',
        url: "properties/manage_highlight",
        data: {id: id, val:val},
        success: function (data) {
        }
    });
})


$(".banner").dropzone({
        url: "upload_files",
        maxFilesize: 1000,
        acceptedFiles: 'image/*',
        init: function () {
            var submit2 = document.getElementById('submit2');
            if (this.getUploadingFiles().length != 0 && this.getQueuedFiles().length != 0) {
                submit2.disabled = true;
            }
            this.on("complete", function (file) {
                if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    submit2.disabled = false;
                }
            });
            this.on('success', function (file, resp) {
            });
        },
        success: function (result, xhr) {
            var obj = jQuery.parseJSON(xhr);
            result.customid = obj.path;
            if (obj.type == 0) {
                $("#hiddenimages").append('<input type="hidden" name="banners[]" value="' + obj.path + '">');
            } else {
                $("#hiddenimages").append('<input type="hidden" name="banners[]" value="' + obj.path + '">');
            }
        },
        addRemoveLinks: true,
        removedfile: function (file) {
            var path = file.customid;
            var res = path.replace(base_url, '');
            $.ajax({
                type: 'POST',
                url: "delete_files",
                data: {path: res},
                success: function (data) {
                    $("#hiddenimages input[value='" + path + "']").remove();
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        sending: function () {
            var submit2 = document.getElementById('submit2');
            submit2.disabled = true;
        }
    });

$(".mobilebanner").dropzone({
        url: "upload_files",
        maxFilesize: 1000,
        acceptedFiles: 'image/*',
        init: function () {
            var submit2 = document.getElementById('submit2');
            if (this.getUploadingFiles().length != 0 && this.getQueuedFiles().length != 0) {
                submit2.disabled = true;
            }
            this.on("complete", function (file) {
                if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    submit2.disabled = false;
                }
            });
            this.on('success', function (file, resp) {
            });
        },
        success: function (result, xhr) {
            var obj = jQuery.parseJSON(xhr);
            result.customid = obj.path;
            if (obj.type == 0) {
                $("#hiddenimages").append('<input type="hidden" name="mobilebanners[]" value="' + obj.path + '">');
            } else {
                $("#hiddenimages").append('<input type="hidden" name="mobilebanners[]" value="' + obj.path + '">');
            }
        },
        addRemoveLinks: true,
        removedfile: function (file) {
            var path = file.customid;
            var res = path.replace(base_url, '');
            $.ajax({
                type: 'POST',
                url: "delete_files",
                data: {path: res},
                success: function (data) {
                    $("#hiddenimages input[value='" + path + "']").remove();
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        sending: function () {
            var submit2 = document.getElementById('submit2');
            submit2.disabled = true;
        }
    });