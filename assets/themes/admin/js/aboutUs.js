    $(function(){
        if(typeof  terms != 'undefined'){
            CKEDITOR.replace('aboutUsContent');
        }else{
            CKEDITOR.replace('first_content');
            CKEDITOR.replace('second_content');
            CKEDITOR.replace('third_content');             
            CKEDITOR.replace('vision_content');
            CKEDITOR.replace('mision_content');
            CKEDITOR.replace('core_content');
            CKEDITOR.replace('client_content');
            CKEDITOR.replace('client_content_2');
            CKEDITOR.replace('client_content_3');
        }

    })

    $(".first_image").dropzone({
        url: "aboutUs/upload_files",
        maxFilesize: 1000,
        acceptedFiles: 'image/*',
        init: function () {
            var submit2 = document.getElementById('submit1');
            if (this.getUploadingFiles().length != 0 && this.getQueuedFiles().length != 0) {
                submit2.disabled = true;
            }
            this.on("complete", function (file) {
                if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    submit2.disabled = false;
                }
            });
            var thisDropzone = this;
            var path = "aboutUs/get_images?type=first_images";
            $.getJSON(path, function (data) { // get the json response
                $.each(data, function (key, value) { //loop through it                    
                    var mockFile = {name: value.name, size: value.size, customid: value.path, image_id: value.image_id};
                    thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                    if (value.attachment_type == 1) {

                    } else {
                        thisDropzone.options.thumbnail.call(thisDropzone, mockFile, value.path);//uploadsfolder is the folder where you have all those uploaded files
                    }
                    thisDropzone.emit("complete", mockFile);
                    thisDropzone.files.push(mockFile);
                });

            });
            this.on('success', function (file, resp) {
            });
        },
        success: function (result, xhr) {
            var obj = jQuery.parseJSON(xhr);
            result.customid = obj.path;
            if (obj.type == 0) {
                $("#hiddenfirstimages").append('<input type="hidden" name="first_images[]" value="' + obj.path + '">');
            } else {
                $("#hiddenfirstimages").append('<input type="hidden" name="first_images[]" value="' + obj.path + '">');
            }
        },
        addRemoveLinks: true,
        removedfile: function (file) {
            var path = file.customid;
            var res = path.replace(base_url, '');
            $.ajax({
                type: 'POST',
                url: "aboutUs/delete_files",
                data: {path: res},
                success: function (data) {
                    $("#hiddenfirstimages input[value='" + path + "']").remove();
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        sending: function (file, xhr, formData) {
            formData.append('type', 'first_image');
            var submit2 = document.getElementById('submit1');
            submit2.disabled = true;
        }
    });
    $(".second_image").dropzone({
        url: "aboutUs/upload_files",
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
            var thisDropzone = this;
            var path = "aboutUs/get_images?type=second_images";
            $.getJSON(path, function (data) { // get the json response
                $.each(data, function (key, value) { //loop through it
                    var mockFile = {name: value.name, size: value.size, customid: value.path, image_id: value.image_id};
                    thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                    if (value.attachment_type == 1) {

                    } else {
                        thisDropzone.options.thumbnail.call(thisDropzone, mockFile, value.path);//uploadsfolder is the folder where you have all those uploaded files
                    }
                    thisDropzone.emit("complete", mockFile);
                    thisDropzone.files.push(mockFile);
                });

            });
            this.on('success', function (file, resp) {
            });
        },
        success: function (result, xhr) {
            var obj = jQuery.parseJSON(xhr);
            result.customid = obj.path;
            if (obj.type == 0) {
                $("#hiddensecondimages").append('<input type="hidden" name="second_images[]" value="' + obj.path + '">');
            } else {
                $("#hiddensecondimages").append('<input type="hidden" name="second_images[]" value="' + obj.path + '">');
            }
        },
        addRemoveLinks: true,
        removedfile: function (file) {
            var path = file.customid;
            var res = path.replace(base_url, '');
            $.ajax({
                type: 'POST',
                url: "aboutUs/delete_files",
                data: {path: res},
                success: function (data) {
                    $("#hiddensecondimages input[value='" + path + "']").remove();
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        sending: function (file, xhr, formData) {
            formData.append('type', 'second_image');
            var submit2 = document.getElementById('submit2');
            submit2.disabled = true;
        }
    });
    $(".third_image").dropzone({
        url: "aboutUs/upload_files",
        maxFilesize: 1000,
        acceptedFiles: 'image/*',
        init: function () {
            var submit3 = document.getElementById('submit3');
            if (this.getUploadingFiles().length != 0 && this.getQueuedFiles().length != 0) {
                submit3.disabled = true;
            }
            this.on("complete", function (file) {
                if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    submit3.disabled = false;
                }
            });
            var thisDropzone = this;
            var path = "aboutUs/get_images?type=third_images";
            $.getJSON(path, function (data) { // get the json response
                $.each(data, function (key, value) { //loop through it
                    var mockFile = {name: value.name, size: value.size, customid: value.path, image_id: value.image_id};
                    thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                    if (value.attachment_type == 1) {

                    } else {
                        thisDropzone.options.thumbnail.call(thisDropzone, mockFile, value.path);//uploadsfolder is the folder where you have all those uploaded files
                    }
                    thisDropzone.emit("complete", mockFile);
                    thisDropzone.files.push(mockFile);
                });

            });
            this.on('success', function (file, resp) {
            });
        },
        success: function (result, xhr) {
            var obj = jQuery.parseJSON(xhr);
            result.customid = obj.path;
            if (obj.type == 0) {
                $("#hiddenthirdimages").append('<input type="hidden" name="third_images[]" value="' + obj.path + '">');
            } else {
                $("#hiddenthirdimages").append('<input type="hidden" name="third_images[]" value="' + obj.path + '">');
            }
        },
        addRemoveLinks: true,
        removedfile: function (file) {
            var path = file.customid;
            var res = path.replace(base_url, '');
            $.ajax({
                type: 'POST',
                url: "aboutUs/delete_files",
                data: {path: res},
                success: function (data) {
                    $("#hiddenthirdimages input[value='" + path + "']").remove();
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        sending: function (file, xhr, formData) {
            formData.append('type', 'third_image');
            var submit3 = document.getElementById('submit3');
            submit3.disabled = true;
        }
    });
    $(".client_image").dropzone({
        url: "aboutUs/upload_files",
        maxFilesize: 1000,
        acceptedFiles: 'image/*',
        init: function () {
            var submit2 = document.getElementById('submit3');
            if (this.getUploadingFiles().length != 0 && this.getQueuedFiles().length != 0) {
                submit2.disabled = true;
            }
            this.on("complete", function (file) {
                if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    submit2.disabled = false;
                }
            });
            var thisDropzone = this;
            var path = "aboutUs/get_images?type=client_images";
            $.getJSON(path, function (data) { // get the json response
                $.each(data, function (key, value) { //loop through it
                    var mockFile = {name: value.name, size: value.size, customid: value.path, image_id: value.image_id};
                    thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                    if (value.attachment_type == 1) {

                    } else {
                        thisDropzone.options.thumbnail.call(thisDropzone, mockFile, value.path);//uploadsfolder is the folder where you have all those uploaded files
                    }
                    thisDropzone.emit("complete", mockFile);
                    thisDropzone.files.push(mockFile);
                });

            });
            this.on('success', function (file, resp) {
            });
        },
        success: function (result, xhr) {
            var obj = jQuery.parseJSON(xhr);
            result.customid = obj.path;
            if (obj.type == 0) {
                $("#hiddenclientimages").append('<input type="hidden" name="client_images[]" value="' + obj.path + '">');
            } else {
                $("#hiddenclientimages").append('<input type="hidden" name="client_images[]" value="' + obj.path + '">');
            }
        },
        addRemoveLinks: true,
        removedfile: function (file) {
            var path = file.customid;
            var res = path.replace(base_url, '');
            $.ajax({
                type: 'POST',
                url: "aboutUs/delete_files",
                data: {path: res},
                success: function (data) {
                    $("#hiddenclientimages input[value='" + path + "']").remove();
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        sending: function (file, xhr, formData) {
            formData.append('type', 'client_image');
            var submit2 = document.getElementById('submit3');
            submit2.disabled = true;
        }
    });
    $(".closer_look_image").dropzone({
        url: "aboutUs/upload_files",
        maxFilesize: 1000,
        acceptedFiles: 'image/*',
        init: function () {
            var submit2 = document.getElementById('submit4');
            if (this.getUploadingFiles().length != 0 && this.getQueuedFiles().length != 0) {
                submit2.disabled = true;
            }
            this.on("complete", function (file) {
                if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    submit2.disabled = false;
                }
            });
            var thisDropzone = this;
            var path = "aboutUs/get_images?type=closer_look_images";
            $.getJSON(path, function (data) { // get the json response
                $.each(data, function (key, value) { //loop through it
                    var mockFile = {name: value.name, size: value.size, customid: value.path, image_id: value.image_id};
                    thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                    if (value.attachment_type == 1) {

                    } else {
                        thisDropzone.options.thumbnail.call(thisDropzone, mockFile, value.path);//uploadsfolder is the folder where you have all those uploaded files
                    }
                    thisDropzone.emit("complete", mockFile);
                    thisDropzone.files.push(mockFile);
                });

            });
            this.on('success', function (file, resp) {
            });
        },
        success: function (result, xhr) {
            var obj = jQuery.parseJSON(xhr);
            result.customid = obj.path;
            if (obj.type == 0) {
                $("#hiddencloserlookimages").append('<input type="hidden" name="closer_look_images[]" value="' + obj.path + '">');
            } else {
                $("#hiddencloserlookimages").append('<input type="hidden" name="closer_look_images[]" value="' + obj.path + '">');
            }
        },
        addRemoveLinks: true,
        removedfile: function (file) {
            var path = file.customid;
            var res = path.replace(base_url, '');
            $.ajax({
                type: 'POST',
                url: "aboutUs/delete_files",
                data: {path: res},
                success: function (data) {
                    $("#hiddencloserlookimages input[value='" + path + "']").remove();
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        sending: function (file, xhr, formData) {
            formData.append('type', 'closer_look_image');
            var submit2 = document.getElementById('submit4');
            submit2.disabled = true;
        }
    });
     $(".core_image").dropzone({
        url: "aboutUs/upload_files",
        maxFilesize: 1000,
        acceptedFiles: 'image/*',
        init: function () {
            var submit4 = document.getElementById('submit4');
            if (this.getUploadingFiles().length != 0 && this.getQueuedFiles().length != 0) {
                submit4.disabled = true;
            }
            this.on("complete", function (file) {
                if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                    submit4.disabled = false;
                }
            });
            var thisDropzone = this;
            var path = "aboutUs/get_images?type=core_images";
            $.getJSON(path, function (data) { // get the json response
                $.each(data, function (key, value) { //loop through it
                    var mockFile = {name: value.name, size: value.size, customid: value.path, image_id: value.image_id};
                    thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                    if (value.attachment_type == 1) {

                    } else {
                        thisDropzone.options.thumbnail.call(thisDropzone, mockFile, value.path);//uploadsfolder is the folder where you have all those uploaded files
                    }
                    thisDropzone.emit("complete", mockFile);
                    thisDropzone.files.push(mockFile);
                });

            });
            this.on('success', function (file, resp) {
            });
        },
        success: function (result, xhr) {
            var obj = jQuery.parseJSON(xhr);
            result.customid = obj.path;
            if (obj.type == 0) {
                $("#hiddencoreimages").append('<input type="hidden" name="core_images[]" value="' + obj.path + '">');
            } else {
                $("#hiddencoreimages").append('<input type="hidden" name="core_images[]" value="' + obj.path + '">');
            }
        },
        addRemoveLinks: true,
        removedfile: function (file) {
            var path = file.customid;
            var res = path.replace(base_url, '');
            $.ajax({
                type: 'POST',
                url: "aboutUs/delete_files",
                data: {path: res},
                success: function (data) {
                    $("#hiddencoreimages input[value='" + path + "']").remove();
                }
            });
            var _ref;
            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
        },
        sending: function (file, xhr, formData) {
            formData.append('type', 'core_image');
            var submit4 = document.getElementById('submit4');
            submit4.disabled = true;
        }
    }); 
