var getUrl=window.location;

var baseUrlSet=getUrl.protocol+"//"+getUrl.host+"/"+getUrl.pathname.split("/")[1]+"/";

var baseUrlSet=getUrl.protocol+"//"+getUrl.host+"/";


$(function(){$(".crr_form").on("submit",function(a){
        
        a.preventDefault();$.ajax({url:baseUrlSet+"career/careerSubmit",
            type:"post",dataType:"json",
            data:new FormData(this),
            processData:false,
            contentType:false,
            success:function(b){if(b.pn==1){
                    
                    $(".career_cont").html(b.msg)
                
                }else{
                    
                    $(".error_name").html(b.name);
                    $(".error_email").html(b.email);
                    $(".error_mobile").html(b.mobile);
                    $(".error_comment").html(b.comment);
                    $(".error_document").html(b.files)}}})});
    
    $("#submit_bottom").click(function(a){a.preventDefault();
        var j=$("input#b_name").val();
        var f=$("input#b_email").val();
        var d=$("input#b_mobile").val();
        var e=$("textarea#b_comment").val();
        var g=$("input#b_agree").val();
        var c=$("input#b_city").val();
        var b=$("input#b_href_url").val();
        var h=$("input#b_referer_url").val();
        $("#validation-error-bottom").html('<div style="padding:0 10px 10px 10px;"><img src="360assets/images/loading.gif" style="margin: 10px 0 0; vertical-align: middle;" /> <span style="font-size:14px; padding: 10px 0 0 10px; vertical-align: middle;">Please Wait..</span></div>');jQuery.ajax({type:"POST",url:"validateCommonBottomForm",dataType:"json",data:{name:j,email:f,mobile:d,comment:e,agree:g,city:c,href_url:b,referer_url:h},success:function(k){if(k){if(k.st==0){jQuery("div#validation-error-bottom").html(k.msg)}if(k.st==1){jQuery("div#validation-error-bottom").html(k.msg);document.getElementById("b_name").value="";document.getElementById("b_email").value="";document.getElementById("b_mobile").value=""}}}})})});
$(function(){$("#submit_bottom_small_mobile").click(function(a){
        a.preventDefault();var j=$("input#b_name").val();
        var f=$("input#b_email").val();
        var d=$("input#b_mobile").val();
        var e=$("textarea#b_comment").val();
        var g=$("input#b_agree").val();
        var c=$("input#b_city").val();
        var b=$("input#b_href_url").val();
        var h=$("input#b_referer_url").val();
        $("#validation-error-bottom").html('<div style="padding:0 10px 10px 10px;"><img src="360assets/images/loading.gif" style="margin: 10px 0 0; vertical-align: middle;" /> <span style="font-size:14px; padding: 10px 0 0 10px; vertical-align: middle;">Please Wait..</span></div>');jQuery.ajax({type:"POST",url:"validateCommonBottomForm",dataType:"json",data:{name:j,email:f,mobile:d,comment:e,agree:g,city:c,href_url:b,referer_url:h},success:function(k){if(k){if(k.st==0){jQuery("div#validation-error-bottom").html(k.msg)}if(k.st==1){jQuery("div#validation-error-bottom").html(k.msg);
                        document.getElementById("b_name").value="";
                        document.getElementById("b_email").value="";
                        document.getElementById("b_mobile").value=""}}}})})});

$(function(){$("#submit_right").click(function(a){
        a.preventDefault();
        document.getElementById("validation-error-right").style.display="block";
        var j=$("input#r_name").val();
        var f=$("input#r_email").val();
        var d=$("input#r_mobile").val();
        var e=$("textarea#r_comment").val();
        var g=$("input#r_agree").val();
        var c=$("input#r_city").val();
        var b=$("input#b_href_url").val();
        var h=$("input#b_referer_url").val();
        $("#validation-error-right").html('<div style="padding:0 10px 10px 10px;"><img src="360assets/images/loading.gif" style="margin: 10px 0 0; vertical-align: middle;" /> <span style="font-size:14px; padding: 10px 0 0 10px; vertical-align: middle;">Please Wait..</span></div>');jQuery.ajax({type:"POST",url:"validateCommonBottomForm",dataType:"json",data:{name:j,email:f,mobile:d,comment:e,agree:g,city:c,href_url:b,referer_url:h},success:function(k){if(k){if(k.st==0){jQuery("#validation-error-right").html(k.msg)}if(k.st==1){jQuery("#validation-error-right").html(k.msg);document.getElementById("r_name").value="";document.getElementById("r_email").value="";document.getElementById("r_mobile").value=""}}}})})});function st(){var c=$("input#p_name").val();var g=$("input#p_email").val();var d=$("input#p_mobile").val();var h=$("textarea#p_comment").val();var a=$("input#p_agree").val();var f=$("input#p_city").val();
    var b=$("input#b_href_url").val();
    var e=$("input#b_referer_url").val();
    $("#validation-error-popup").html('<div style="padding:0 10px 10px 10px;"><img src="360assets/images/loading.gif" style="margin: 10px 0 0; vertical-align: middle;" /> <span style="font-size:14px; padding: 10px 0 0 10px; vertical-align: middle;">Please Wait..</span></div>');
    jQuery.ajax({type:"POST",url:"validateCommonBottomForm",
        dataType:"json",data:{name:c,email:g,mobile:d,comment:h,agree:a,city:f,href_url:b,referer_url:e},
        success:function(j){
            if(j){if(j.st==0){
                    jQuery("#validation-error-popup").html(j.msg)}if(j.st==1){
                    jQuery("#validation-error-popup").html(j.msg);
                    document.getElementById("p_name").value="";
                    document.getElementById("p_email").value="";
                    document.getElementById("p_mobile").value=""
                }
            }
        }
    })}

function siteVisit(){
    document.getElementById("validation-error-sv").style.display="block";
    var c=$("input#sv_name").val();
    var g=$("input#sv_email").val();
    var d=$("input#sv_mobile").val();
    var h=$("textarea#sv_comment").val();
    var a=$("input#sv_agree").val();
    var f=$("input#sv_city").val();
    var b=$("input#b_href_url").val();
    var e=$("input#b_referer_url").val();
    $("#validation-error-sv").html('<div style="padding:0 10px 10px 10px;"><img src="360assets/images/loading.gif" style="margin: 10px 0 0; vertical-align: middle;" /> <span style="font-size:14px; padding: 10px 0 0 10px; vertical-align: middle;">Please Wait..</span></div>');jQuery.ajax({type:"POST",url:"validateCommonBottomForm",dataType:"json",data:{name:c,email:g,mobile:d,comment:h,agree:a,city:f,href_url:b,referer_url:e},success:function(j){if(j){if(j.st==0){
                    jQuery("#validation-error-sv").html(j.msg)}if(j.st==1){
                    jQuery("#validation-error-sv").html(j.msg);
                    document.getElementById("sv_name").value="";
                    document.getElementById("sv_email").value="";
                    document.getElementById("sv_mobile").value=""}}}})}

function enquireNow(){
    document.getElementById("validation-error-en").style.display="block";
    var c=$("input#en_name").val();
    var g=$("input#en_email").val();
    var d=$("input#en_mobile").val();
    var h=$("textarea#en_comment").val();
    var a=$("input#en_agree").val();
    var f=$("input#en_city").val();
    var b=$("input#b_href_url").val();
    var e=$("input#b_referer_url").val();
    $("#validation-error-en").html('<div style="padding:0 10px 10px 10px;"><img src="360assets/images/loading.gif" style="margin: 10px 0 0; vertical-align: middle;" /> <span style="font-size:14px; padding: 10px 0 0 10px; vertical-align: middle;">Please Wait..</span></div>');jQuery.ajax({type:"POST",url:"validateCommonBottomForm",dataType:"json",data:{name:c,email:g,mobile:d,comment:h,agree:a,city:f,href_url:b,referer_url:e},success:function(j){if(j){if(j.st==0){jQuery("#validation-error-en").html(j.msg)}if(j.st==1){
                    jQuery("#validation-error-en").html(j.msg);
                    document.getElementById("en_name").value="";
                    document.getElementById("en_email").value="";
                    document.getElementById("en_mobile").value=""}}}})}
function contactUsSelectChange(a){$("#selectValueForValidation").val(a)}
$(function(){$("#submit_bottom_contc").click(function(d){d.preventDefault();
        $("#con_contat_type_error").html("");
        var m=$("input#con_name").val();
        var j=$("input#con_email").val();
        var g=$("input#con_mobile").val();
        var h=$("select#con_contat_type").val()+" - "+$("textarea#con_comment").val();
        var k=$("input#con_agree").val();
        var f=$("input#con_city").val();
        var a=$("input#con_src").val();
        var c=$("input#b_href_url").val();
        var l=$("input#b_referer_url").val();
        var e=$("#selectValueForValidation").val();
        var b=$("#base_url_contact").val();
        $("#outerDiv").css("display","block");
        $("#outerDiv").html('<div class="contact-form-page-button_wait floatR CheckIcon"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</div>');$("#innerDiv").css("display","none");jQuery.ajax({type:"POST",url:b+"common_controller/submitContactUsForm",dataType:"json",data:{name:m,email:j,mobile:g,comment:h,source_block:a,agree:k,city:f,href_url:c,referer_url:l,selectOption:e},success:function(n){if(n){if(n.st==0){jQuery("#fname-error1").html(n.fname);jQuery("#email-error1").html(n.email);jQuery("#mobile-error1").html(n.mobile);jQuery("#selectOption-error1").html(n.selectOption);jQuery("#validation-error-bottom-cont").html("");$("#outerDiv").css("display","none");$("#innerDiv").css("display","block")}if(n.st==1){jQuery("#fname-error1").html("");jQuery("#email-error1").html("");jQuery("#mobile-error1").html("");document.getElementById("con_email").value="";document.getElementById("con_name").value="";
                        document.getElementById("con_mobile").value="";
                        document.getElementById("con_comment").value="";
                        jQuery("#validation-error-bottom-cont").html(n.msg);
                        $("#lowerDiv1").css("display","none");
                        $("#upperDiv1").css("display","block")
                    }
                }}
        })})});
;$(function() {
    $(".menu5").hover(function() {
        $(".sub5").slideToggle(400)
    }, function() {
        $(".sub5").hide()
    });
    665
});
$(function() {
    $(".menu6").hover(function() {
        $(".sub6").slideToggle(400)
    }, function() {
        $(".sub6").hide()
    })
});

function newsletter(c) {
    var a = $("#newsletter_email").val();
    var d = $("#b_referer_url").val();
    var b = $("#b_href_url").val();
    if (a == "" || a == "Your E-mail Address") {
        $("#newsletter_email").css("border", "solid 1px #ff0000");
        $("#newsletter_email").css("height", "38px");
        $("#newsletter_email").css("width", "181px");
        return false
    } else {
        jQuery.ajax({
            type: "POST",
            url: baseUrlSet + "common_controller/newsletter",
            dataType: "json",
            data: {
                email: a,
                referer_url: d,
                href_url: b
            },
            success: function(e) {
                if (e) {
                    if (e.st == 0) {
                        jQuery("#subscribe_email_msg").html(e.email)
                    }
                    if (e.st == 1) {
                        jQuery("#subscribe_email_msg").html(e.msg)
                    }
                }
            }
        })
    }
}

function enquireNowNRIBrochureDownload() {
    document.getElementById("validation-error-en-nri").style.display = "block";
    var l = $("input#en_name_nri").val();
    var g = $("input#en_email_nri").val();
    var e = $("input#en_mobile_nri").val();
    var f = $("input#en_comment_nri").val();
    var j = $("input#en_agree_nri").val();
    var c = $("input#en_city_nri").val();
    var b = $("input#en_city_nri_source").val();
    var a = $("input#b_href_url_nri").val();
    var k = $("input#b_referer_url_nri").val();
    var d = $("#selectCountryValue").val();
    var h = $("#prop_property_name").val();
    $("#upperDiv1").css("display", "block");
    $("#upperDiv1").html('<div class="new-pop-up-form-wait CheckIcon"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</div>');
    $("#lowerDiv1").css("display", "none");
    jQuery.ajax({
        type: "POST",
        url: baseUrlSet + "common_controller/nri_enquiry",
        dataType: "json",
        data: {
            name: l,
            email: g,
            mobile: e,
            source_block: b,
            comment: f,
            agree: j,
            city: c,
            href_url: a,
            referer_url: k,
            propertyName: h,
            countryCode: d
        },
        success: function(m) {
            if (m) {
                if (m.st == 0) {
                    jQuery("#fname-error11").html(m.fname);
                    jQuery("#email-error11").html(m.email);
                    jQuery("#mobile-error11").html(m.mobile);
                    $("#upperDiv1").css("display", "none");
                    $("#lowerDiv1").css("display", "block");
                    jQuery("#validation-error-en-nri").html("")
                }
                if (m.st == 1) {
                    jQuery("#fname-error11").html("");
                    jQuery("#email-error11").html("");
                    jQuery("#mobile-error11").html("");
                    document.getElementById("en_name_nri").value = "";
                    document.getElementById("en_email_nri").value = "";
                    document.getElementById("en_mobile_nri").value = "";
                    jQuery("#validation-error-en-nri").html(m.msg);
                    $("#lowerDiv1").css("display", "none");
                    $("#upperDiv1").css("display", "block")
                }
            }
        }
    })
}

function enquireNowNRIPersonilizedServices() {
    document.getElementById("validation-error-en-nri-ps").style.display = "block";
    var j = $("input#en_name_nri_ps").val();
    var f = $("input#en_email_nri_ps").val();
    var d = $("input#en_mobile_nri_ps").val();
    var e = $("textarea#en_comment_nri_ps").val();
    var g = $("input#en_agree_nri_ps").val();
    var c = $("input#en_city_nri_ps").val();
    var b = $("input#sourceblockps").val();
    var a = $("input#b_href_url_nri_ps").val();
    var h = $("input#b_referer_url_nri_ps").val();
    $("#validation-error-en-nri-ps").html('<div style="padding:0 10px 10px 10px;"><img src="360assets/images/loading.gif" style="margin: 10px 0 0; vertical-align: middle;" /> <span style="font-size:14px; padding: 10px 0 0 10px; vertical-align: middle;">Please Wait..</span></div>');
    jQuery.ajax({
        type: "POST",
        url: baseUrlSet + "common_controller/commonEnquiry",
        dataType: "json",
        data: {
            name: j,
            email: f,
            mobile: d,
            comment: e,
            agree: g,
            city: c,
            href_url: a,
            referer_url: h,
            source_block: b
        },
        success: function(k) {
            if (k) {
                if (k.st == 0) {
                    jQuery("#fname-error-pservices").html(k.fname);
                    jQuery("#email-error-pservices").html(k.email);
                    jQuery("#mobile-error-pservices").html(k.mobile);
                    jQuery("#validation-error-en-nri-ps").html("")
                }
                if (k.st == 1) {
                    jQuery("#fname-error-pservices").html("");
                    jQuery("#email-error-pservices").html("");
                    jQuery("#mobile-error-pservices").html("");
                    document.getElementById("en_email_nri_ps").value = "";
                    document.getElementById("en_name_nri_ps").value = "";
                    document.getElementById("en_mobile_nri_ps").value = "";
                    document.getElementById("en_city_nri_ps").value = "";
                    jQuery("#validation-error-en-nri-ps").html(k.msg)
                }
            }
        }
    })
}

function enquireNowNRIExpertAdvice() {
    document.getElementById("validation-error-en-nri-ea").style.display = "block";
    var j = $("input#en_name_nri_ea").val();
    var f = $("input#en_email_nri_ea").val();
    var d = $("input#en_mobile_nri_ea").val();
    var e = $("textarea#en_comment_nri_ea").val();
    var g = $("input#en_agree_nri_ea").val();
    var c = $("input#en_city_nri_ea").val();
    var b = $("input#sourceblockexpertadvice").val();
    var a = $("input#b_href_url_nri_ea").val();
    var h = $("input#b_referer_url_nri_ea").val();
    $("#validation-error-en-nri-ea").html('<div style="padding:0 10px 10px 10px;"><img src="360assets/images/loading.gif" style="margin: 10px 0 0; vertical-align: middle;" /> <span style="font-size:14px; padding: 10px 0 0 10px; vertical-align: middle;">Please Wait..</span></div>');
    jQuery.ajax({
        type: "POST",
        url: baseUrlSet + "common_controller/commonEnquiry",
        dataType: "json",
        data: {
            name: j,
            email: f,
            mobile: d,
            comment: e,
            agree: g,
            city: c,
            href_url: a,
            referer_url: h,
            source_block: b
        },
        success: function(k) {
            if (k) {
                if (k.st == 0) {
                    jQuery("#fname-error-eadvice").html(k.fname);
                    jQuery("#email-error-eadvice").html(k.email);
                    jQuery("#mobile-error-eadvice").html(k.mobile);
                    jQuery("#validation-error-en-nri-ea").html("")
                }
                if (k.st == 1) {
                    jQuery("#fname-error-eadvice").html("");
                    jQuery("#email-error-eadvice").html("");
                    jQuery("#mobile-error-eadvice").html("");
                    document.getElementById("en_email_nri_ea").value = "";
                    document.getElementById("en_name_nri_ea").value = "";
                    document.getElementById("en_mobile_nri_ea").value = "";
                    document.getElementById("en_city_nri_ea").value = "";
                    jQuery("#validation-error-en-nri-ea").html(k.msg)
                }
            }
        }
    })
}

function enquireNowNRIHomeLoan(k) {
    document.getElementById("validation-error-en-nri-hl").style.display = "block";
    var n = $("input#en_name_nri_hl").val();
    var h = $("input#en_email_nri_hl").val();
    var f = $("input#en_mobile_nri_hl").val();
    var g = $("input#en_comment_nri_hl").val();
    var l = $("input#en_agree_nri_hl").val();
    var d = $("input#en_city_nri_hl").val();
    var c = $("input#sourceblockhl").val();
    var b = $("input#b_href_url_nri_hl").val();
    var m = $("input#b_referer_url_nri_hl").val();
    var e = $("#selectCountryValue_" + k).val();
    var a = $("#timepicker-actions-exmpl").val();
    var j = $("#prop_property_name1").val();
    $("#upperDiv").css("display", "block");
    $("#upperDiv").html('<div class="new-pop-up-form-wait CheckIcon"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</div>');
    $("#lowerDiv").css("display", "none");
    jQuery.ajax({
        type: "POST",
        url: baseUrlSet + "common_controller/commonMarketingEnquiry",
        dataType: "json",
        data: {
            name: n,
            email: h,
            mobile: f,
            comment: g,
            agree: l,
            city: d,
            href_url: b,
            referer_url: m,
            source_block: c,
            propertyName: j,
            countryCode: e,
            timePicker: a
        },
        success: function(o) {
            if (o) {
                if (o.st == 0) {
                    jQuery("#fname-error-hll").html(o.fname);
                    jQuery("#email-error-hll").html(o.email);
                    jQuery("#mobile-error-hll").html(o.mobile);
                    jQuery("#validation-error-en-nri-hl").html("");
                    $("#upperDiv").css("display", "none");
                    $("#lowerDiv").css("display", "block")
                }
                if (o.st == 1) {
                    jQuery("#fname-error-hll").html("");
                    jQuery("#email-error-hll").html("");
                    jQuery("#mobile-error-hll").html("");
                    document.getElementById("en_email_nri_hl").value = "";
                    document.getElementById("en_name_nri_hl").value = "";
                    document.getElementById("en_mobile_nri_hl").value = "";
                    jQuery("#validation-error-en-nri-hl").html(o.msg);
                    $("#lowerDiv").css("display", "none");
                    $("#upperDiv").css("display", "block")
                }
            }
        }
    })
}
$(function() {
    $("#blogdetail_form").click(function(b) {
        b.preventDefault();
        document.getElementById("validation-error-blog").style.display = "block";
        var k = $("input#r_name").val();
        var f = $("input#r_email").val();
        var d = $("input#r_mobile").val();
        var e = $("textarea#r_comment").val();
        var h = $("input#r_agree").val();
        var c = $("input#r_city").val();
        var g = $("input#source_block").val();
        var a = $("input#b_href_url").val();
        var j = $("input#b_referer_url").val();
        $("#validation-error-blog").html('<div style="padding:0 10px 10px 10px; text-align:center;"><img src="/360assets/images/loading.gif" style="margin: 10px 0 0; vertical-align: middle;" /> <span style="font-size:14px; padding: 10px 0 0 10px; vertical-align: middle;">Please Wait..</span></div>');
        jQuery.ajax({
            type: "POST",
            url: "validateCommonBottomForm",
            dataType: "json",
            data: {
                name: k,
                email: f,
                source_block: g,
                mobile: d,
                comment: e,
                agree: h,
                city: c,
                href_url: a,
                referer_url: j
            },
            success: function(l) {
                if (l) {
                    if (l.st == 0) {
                        jQuery("#validation-error-blog").html(l.msg)
                    }
                    if (l.st == 1) {
                        jQuery("#validation-error-blog").html(l.msg);
                        document.getElementById("r_name").value = "";
                        document.getElementById("r_email").value = "";
                        document.getElementById("r_mobile").value = "";
                        document.getElementById("r_comment").value = ""
                    }
                }
            }
        })
    })
});

function enquireNowSpecialForm() {
    document.getElementById("validation-error-en-spl").style.display = "block";
    var m = $("input#en_name_spl").val();
    var f = $("input#en_email_spl").val();
    var e = $("input#en_mobile_spl").val();
    var c = $("input#b_href_url_spl").val();
    var l = $("input#b_referer_url_spl").val();
    var j = $("input#spl_src").val();
    var k = $("#prop_city_name").val();
    var h = $("#prop_property_name").val();
    var d = $("#selectCountryValue").val();
    var b = $("#timepicker-actions-exmpl").val();
    var g = $("#prop_city_Id").val();
    var a = " ";
    $("#upperDiv").css("display", "block");
    $("#upperDiv").html('<div class="inpuFld_wait CheckIcon"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</div>');
    $("#lowerDiv").css("display", "none");
    jQuery.ajax({
        type: "POST",
        url: baseUrlSet + "common_controller/commonEnquiry",
        dataType: "json",
        data: {
            name: m,
            pid: a,
            email: f,
            mobile: e,
            href_url: c,
            city: g,
            source_block: j,
            referer_url: l,
            comment: h,
            cityName: k,
            propertyName: h,
            countryCode: d,
            timePicker: b
        },
        success: function(n) {
            if (n) {
                if (n.st == 0) {
                    jQuery("#fname-error").html(n.fname);
                    jQuery("#email-error").html(n.email);
                    jQuery("#mobile-error").html(n.mobile);
                    $("#upperDiv").css("display", "none");
                    $("#lowerDiv").css("display", "block");
                    jQuery("#validation-error-en-spl").html("")
                }
                if (n.st == 1) {
                    jQuery("#validation-error-en-spl").html(n.msg);
                    jQuery("#fname-error").html("");
                    jQuery("#email-error").html("");
                    jQuery("#mobile-error").html("");
                    $("#lowerDiv").css("display", "none");
                    $("#upperDiv").css("display", "block");
                    document.getElementById("en_email_spl").value = "";
                    document.getElementById("en_name_spl").value = "";
                    document.getElementById("en_mobile_spl").value = ""
                }
            }
        }
    })
}

function enquireNowSpecialFormBottom() {
    document.getElementById("validation-error-en-spl1").style.display = "block";
    var m = $("input#en_name_spl1").val();
    var f = $("input#en_email_spl1").val();
    var e = $("input#en_mobile_spl1").val();
    var c = $("input#b_href_url_spl1").val();
    var j = $("input#spl_src").val();
    var l = $("input#b_referer_url_spl1").val();
    var k = $("#prop_city_name").val();
    var h = $("#prop_property_name").val();
    var g = $("#prop_city_Id").val();
    var d = $("#selectCountryValue").val();
    var b = $("#timepicker-actions-exmpl-1").val();
    var a = " ";
    $("#upperDiv1").css("display", "block");
    $("#upperDiv1").html('<div class="inpuFld_wait CheckIcon"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</div>');
    $("#lowerDiv1").css("display", "none");
    jQuery.ajax({
        type: "POST",
        url: baseUrlSet + "common_controller/commonEnquiry",
        dataType: "json",
        data: {
            name: m,
            email: f,
            pid: a,
            mobile: e,
            href_url: c,
            comment: h,
            city: g,
            source_block: j,
            referer_url: l,
            cityName: k,
            propertyName: h,
            countryCode: d,
            timePicker: b
        },
        success: function(n) {
            if (n) {
                if (n.st == 0) {
                    jQuery("#fname-error1").html(n.fname);
                    jQuery("#email-error1").html(n.email);
                    jQuery("#mobile-error1").html(n.mobile);
                    $("#upperDiv1").css("display", "none");
                    $("#lowerDiv1").css("display", "block");
                    jQuery("#validation-error-en-spl1").html("")
                }
                if (n.st == 1) {
                    jQuery("#fname-error1").html("");
                    jQuery("#email-error1").html("");
                    jQuery("#mobile-error1").html("");
                    document.getElementById("en_email_spl1").value = "";
                    document.getElementById("en_name_spl1").value = "";
                    document.getElementById("en_mobile_spl1").value = "";
                    $("#lowerDiv1").css("display", "none");
                    $("#upperDiv1").css("display", "block");
                    jQuery("#validation-error-en-spl1").html(n.msg)
                }
            }
        }
    })
}
$(function() {
    $("#nri_right_side_contact_submit").click(function(f) {
        f.preventDefault();
        document.getElementById("validate-error-right-side-contact-form").style.display = "block";
        var c = $("input#nri_right_side_contact_username").val();
        var g = $("input#nri_right_side_contact_email").val();
        var d = $("input#nri_right_side_contact_mobile").val();
        var h = $("textarea#nri_right_side_contact_comment").val();
        var a = $("input#nri_right_side_source").val();
        var b = $("input#nri_right_side_contact_href").val();
        var e = $("input#nri_right_side_contact_referer").val();
        $("#validate-error-right-side-contact-form").html('<div style="padding:0 10px 10px 10px; text-align:center;"><img src="/360assets/images/loading.gif" style="margin: 10px 0 0; vertical-align: middle;" /> <span style="font-size:14px; padding: 10px 0 0 10px; vertical-align: middle;">Please Wait..</span></div>');
        jQuery.ajax({
            type: "POST",
            url: baseUrlSet + "common_controller/commonEnquiry",
            dataType: "json",
            data: {
                name: c,
                email: g,
                source_block: a,
                mobile: d,
                comment: h,
                href_url: b,
                referer_url: e
            },
            success: function(j) {
                if (j) {
                    if (j.st == 0) {
                        jQuery("#fname-error-right").html(j.fname);
                        jQuery("#email-error-right").html(j.email);
                        jQuery("#mobile-error-right").html(j.mobile);
                        jQuery("#validate-error-right-side-contact-form").html("")
                    }
                    if (j.st == 1) {
                        jQuery("#validate-error-right-side-contact-form").html(j.msg);
                        document.getElementById("nri_right_side_contact_username").value = "";
                        document.getElementById("nri_right_side_contact_email").value = "";
                        document.getElementById("nri_right_side_contact_mobile").value = "";
                        document.getElementById("nri_right_side_contact_comment").value = "";
                        jQuery("#fname-error-right").html("");
                        jQuery("#email-error-right").html("");
                        jQuery("#mobile-error-right").html("")
                    }
                }
            }
        })
    })
});
$(function() {
    $("#compare_submit").click(function(a) {
        a.preventDefault();
        document.getElementById("validate-error-compare-projects").style.display = "block";
        var j = $("input#compare_username").val();
        var f = $("input#compare_email").val();
        var d = $("input#compare_mobile").val();
        var e = $("textarea#compare_textarea").val();
        var g = $("input#compare-source-block").val();
        var c = $("input#compare_city").val();
        var b = $("input#nri_right_side_contact_href").val();
        var h = $("input#compare_referer").val();
        $("#validate-error-compare-projects").html('<div style="padding:0 10px 10px 10px; text-align:center;"><img src="/360assets/images/loading.gif" style="margin: 10px 0 0; vertical-align: middle;" /> <span style="font-size:14px; padding: 10px 0 0 10px; vertical-align: middle;">Please Wait..</span></div>');
        jQuery.ajax({
            type: "POST",
            url: baseUrlSet + "common_controller/enquiryForm",
            dataType: "json",
            data: {
                name: j,
                email: f,
                source_block: g,
                mobile: d,
                city: c,
                comment: e,
                href_url: b,
                referer_url: h
            },
            success: function(k) {
                if (k) {
                    if (k.st == 0) {
                        jQuery("#fname-error-compare").html(k.fname);
                        jQuery("#email-error-compare").html(k.email);
                        jQuery("#mobile-error-compare").html(k.mobile);
                        jQuery("#validate-error-compare-projects").html("")
                    }
                    if (k.st == 1) {
                        jQuery("#validate-error-compare-projects").html(k.msg);
                        document.getElementById("compare_username").value = "";
                        document.getElementById("compare_email").value = "";
                        document.getElementById("compare_mobile").value = "";
                        document.getElementById("compare_city").value = "";
                        document.getElementById("compare_comment").value = "";
                        jQuery("#fname-error-right").html("");
                        jQuery("#email-error-right").html("");
                        jQuery("#mobile-error-right").html("")
                    }
                }
            }
        })
    })
});

function downloadBrochurePopUp(d) {
    var o = $("input#enquire_now_username_" + d).val();
    var j = $("input#enquire_now_email_" + d).val();
    var g = $("input#enquire_now_phone_" + d).val();
    var h = $("input#broc_commment_" + d).val();
    var l = $("input#enquire_now_src").val();
    var e = $("input#enquire_now_cityId_" + d).val();
    var c = $("input#rS_current_url").val();
    var n = $("input#rS_referer_url").val();
    var m = $("#prop_city_name").val();
    var k = $("#prop_property_name").val();
    var f = $("#selectCountryValue_" + d).val();
    var b = $("#timepicker-actions-exmpl-" + d).val();
    var a = $("#prop_propertyId").val();
     var Rcity = 0;
    if ($("#selectCityValue_"+d).length > 0){
    var Rcity = $("#selectCityValue_"+d).val();
    }
    jQuery("#downloadBrochurePopUp_wait_Upper_" + d).html('<div class="new-pop-up-form_wait CheckIcon"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</div>');
    jQuery("#downloadBrochurePopUp_wait_Upper_" + d).css("display", "block");
    jQuery("#downloadBrochurePopUp_wait_" + d).css("display", "none");
    jQuery.ajax({
        type: "POST",
        url: baseUrlSet + "common_controller/commonEnquiry",
        dataType: "json",
        data: {
            propId: a,
            name: o,
            email: j,
            source_block: l,
            mobile: g,
            city: e,
            comment: h,
            href_url: c,
            referer_url: n,
            cityName: m,
            propertyName: k,
            countryCode: f,
            timePicker: b,
            resCity:Rcity
        },
        success: function(p) {
            if (p) {
                if (p.st == 0) {
                    jQuery("#fname-error-city-" + d).html(p.fname);
                    jQuery("#email-error-city-" + d).html(p.email);
                    jQuery("#mobile-error-city-" + d).html(p.mobile);
                    jQuery("#validate-error-enquire-now-" + d).html("");
                    jQuery("#downloadBrochurePopUp_wait_Upper_" + d).css("display", "none");
                    jQuery("#downloadBrochurePopUp_wait_" + d).css("display", "block")
                }
                if (p.st == 1) {
                    document.getElementById("enquire_now_username_" + d).value = "";
                    document.getElementById("enquire_now_email_" + d).value = "";
                    document.getElementById("enquire_now_phone_" + d).value = "";
                    jQuery("#fname-error-city-" + d).html("");
                    jQuery("#email-error-city-" + d).html("");
                    jQuery("#mobile-error-city-" + d).html("");
                    jQuery("#validate-error-enquire-now-" + d).html(p.msg);
                    jQuery("#downloadBrochurePopUp_wait_Upper_" + d).css("display", "block");
                    jQuery("#downloadBrochurePopUp_wait_" + d).css("display", "none")
                }
            }
        }
    })
}

function commonJqueryFormSubmit(k, A, o, e, r, b, s, p, v, y, t, u, m) {
    document.getElementById(k).style.display = "block";
    document.getElementById(v).style.display = "block";
    document.getElementById(y).style.display = "block";
    document.getElementById(t).style.display = "block";
    var f = $("input#" + A).val();
    var a = $("input#" + o).val();
    var n = $("input#" + e).val();
    var j = $("input#" + b).val();
    var d = $("#selectCountryValue").val();
     if (!d) {
        d = $("#selectCountryValue123").val()
    };
    var q = $("#timepicker-actions-exmpl").val();
    var g = $("#prop_city_name").val();
    var l = $("#prop_property_name").val();
    if (r == "") {
        var w = ""
    } else {
        var w = $("input#" + r).val()
    }
    var z = $("input#" + p).val();
    var x = $("input#rS_popUp_current_url").val();
    var c = $("input#" + s).val();
    var h = $("input#" + u).val();
    var rCity = 0;
    if ($("#Rcity").length > 0){
    var rCity = $("#Rcity").val();
    }
    $("#upperDiv").css("display", "block");
    $("#upperDiv").html('<div class="contactformLeft_wait btn-dg CheckIcon"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</div>');
    $("#lowerDiv").css("display", "none");
    jQuery.ajax({
        type: "POST",
        url: baseUrlSet + "common_controller/commonEnquiry",
        dataType: "json",
        data: {
            name: f,
            email: a,
            source_block: z,
            mobile: n,
            city: h,
            comment: j,
            href_url: x,
            referer_url: c,
            cityId: h,
            cityName: g,
            propertyName: l,
            countryCode: d,
            timePicker: q,
            propId: m,
            resCity:rCity,
        },
        success: function(B) {
            if (B) {
                if (B.st == 0) {
                    jQuery("#" + v).html(B.fname);
                    jQuery("#" + y).html(B.email);
                    jQuery("#" + t).html(B.mobile);
                    $("#upperDiv").css("display", "none");
                    $("#lowerDiv").css("display", "block");
                    jQuery("#" + k).html("")
                }
                if (B.st == 1) {
                    document.getElementById(A).value = "";
                    document.getElementById(o).value = "";
                    document.getElementById(e).value = "";
                    document.getElementById(r).value = "";
                    document.getElementById(b).value = "";
                    jQuery("#" + v).html("");
                    jQuery("#" + y).html("");
                    jQuery("#" + t).html("");
                    jQuery("#" + k).html(B.msg);
                    $("#lowerDiv").css("display", "none");
                    $("#upperDiv").css("display", "block")
                }
            }
        }
    })
}

function carrerResumeForm(b) {
    var a = $("#career-file-upload");
    alert(a);
    return false;
    if (validateFileExtension(file, "valid_msg", "pdf/office/image files are only allowed!", new Array("jpg", "pdf", "jpeg", "gif", "png", "doc", "docx", "xls", "xlsx", "ppt", "txt")) == false) {
        return false
    }
    if (validateFileSize(file, 1048576, "valid_msg", "Document size should be less than 1MB !") == false) {
        return false
    }
}
var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];

function ValidateFr(h) {
    var d = h.getElementsByTagName("input");
    return false;
    for (var c = 0; c < d.length; c++) {
        var g = d[c];
        if (g.type == "file") {
            var f = g.value;
            if (f.length > 0) {
                var e = false;
                for (var b = 0; b < _validFileExtensions.length; b++) {
                    var a = _validFileExtensions[b];
                    if (f.substr(f.length - a.length, a.length).toLowerCase() == a.toLowerCase()) {
                        e = true;
                        break
                    }
                }
                if (!e) {
                    alert("Sorry, " + f + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                    return false
                }
            }
        }
    }
}

function validateFileExtension(component, msg_id, msg, extns) {
    var flag = 0;
    with(component) {
        var ext = value.substring(value.lastIndexOf(".") + 1);
        for (i = 0; i < extns.length; i++) {
            if (ext == extns[i]) {
                flag = 0;
                break
            } else {
                flag = 1
            }
        }
        if (flag != 0) {
            document.getElementById(msg_id).innerHTML = msg;
            component.value = "";
            component.style.backgroundColor = "#eab1b1";
            component.style.border = "thin solid #000000";
            component.focus();
            return false
        } else {
            return true
        }
    }
}

function validateFileSize(b, h, a, g) {
    if (navigator.appName == "Microsoft Internet Explorer") {
        if (b.value) {
            var f = new ActiveXObject("Scripting.FileSystemObject");
            var d = f.getFile(b.value);
            var c = d.size
        }
    } else {
        if (b.files[0] != undefined) {
            c = b.files[0].size
        }
    }
    if (c != undefined && c > h) {
        document.getElementById(a).innerHTML = g;
        b.value = "";
        b.style.backgroundColor = "#eab1b1";
        b.style.border = "thin solid #000000";
        b.focus();
        return false
    } else {
        return true
    }
}
var getUrl = window.location;
var baseUrlSet = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split("/")[1] + "/";
var baseUrlSet = getUrl.protocol + "//" + getUrl.host + "/";

function submitCommentCheck(b) {
    var a = $("textarea#comment_user").val();
    if (a == "") {
        alert("Please write Your Comment.")
    } else {
        if (a.length <= 5) {
            alert("Please write comment atleast 50 Charactor.")
        } else {
            if (b != "") {
                var f = $("#comment_user").val();
                var e = $("#title_name").val();
                var d = $("#title_id").val();
                var c = $("#cat_id_user").val();
                jQuery.ajax({
                    type: "POST",
                    url: baseUrlSet + "comment/commentsSubmitAfterLogin",
                    data: {
                        comment: f,
                        titlename: e,
                        titleid: d,
                        catId: c,
                        uid: b
                    },
                    success: function(h) {
                        var g = "<div class='alert alert-success'>Thanks, Your comment has been queued for review by site administrators and will be published after approval.</div>";
                        $("#comment_user").val("");
                        $("#validation-error-rev").html(g)
                    }
                })
            } else {
                $("#myModal-1").modal();
                $("#frm_action").val("comment");
                f = $("#comment_user").val();
                $("#frm_action_val").val(f);
                requested_url = $("#requested_url").val();
                $("#frm_action_url").val(requested_url);
                e = $("#title_name").val();
                $("#frm_title_name").val(e);
                d = $("#title_id").val();
                $("#frm_title_id").val(d);
                c = $("#cat_id_user").val();
                $("#frm_cat_id").val(c)
            }
        }
    }
}

function submitReviewItem() {
    var c = $("textarea#comment").val();
    var d = $("input#user_name").val();
    var b = $("input#email_id").val();
    var g = $("select#place").val();
    var f = $("input#title_id").val();
    var a = $("input#title_name").val();
    var e = $("input#cat_id").val();
    $("#validation-error-rev").html('<div style="padding:0 10px 10px 10px;"><img src="http://www.360realtors.co.in/360assets/images/loading.gif" style="margin: 10px 0 0; vertical-align: middle;" /> <span style="font-size:14px; padding: 10px 0 0 10px; vertical-align: middle;">Please Wait..</span></div>');
    jQuery.ajax({
        type: "POST",
        url: baseUrlSet + "validateCommonCommentForm",
        dataType: "json",
        data: {
            description: c,
            itemId: f,
            itemName: a,
            userName: d,
            emailId: b,
            place: g,
            catId: e
        },
        success: function(h) {
            if (h) {
                if (h.st == 0) {
                    jQuery("#validation-error-rev").html(h.msg)
                }
                if (h.st == 1) {
                    jQuery("#validation-error-rev").html(h.msg)
                }
            }
        }
    })
}

function enRevReply(g, h, f, a, c, k, b) {
    var e = true;
    var j = this;
    var d = "";
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest()
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById(g).innerHTML = xmlhttp.responseText;
            document.getElementById(g).style.display = "block"
        } else {
            document.getElementById(g).innerHTML = "<img src='http://www.360realtors.co.in/360assets/images/loading.gif'>";
            document.getElementById(g).style.display = "block"
        }
    };
    xmlhttp.open("POST", baseUrlSet + "comment/commentCheck?pid=" + f + "&xxprid=" + a + "&xxprname=" + c + "&xxctcatid=" + k + "&url=" + b, true);
    xmlhttp.send()
}

function enRevReplyClose(a) {
    document.getElementById(a).style.display = "none"
}

function submitReviewItemNested() {
    var d = $("#xxuid").val();
    var c = $("textarea#comment_1").val();
    if (c == "") {
        alert("Please write Your Comment.")
    } else {
        if (c.length <= 5) {
            alert("Please write comment atleast 50 Charactor.")
        } else {
            if (d != "") {
                var f = $("input#xxprid").val();
                var b = $("input#xxprname").val();
                var e = $("input#xxctcatid").val();
                var a = $("input#xxpid").val();
                var g = $("#comment_1").val();
                jQuery.ajax({
                    type: "POST",
                    url: baseUrlSet + "comment/commentsSubmitAfterLogin",
                    data: {
                        comment: g,
                        titlename: b,
                        titleid: f,
                        catId: e,
                        uid: d,
                        uPid: a
                    },
                    success: function(j) {
                        var h = "<div class='alert alert-success'>Thanks, Your comment has been queued for review by site administrators and will be published after approval.</div>";
                        $("#responseDivReview_" + a).html(h);
                        $("#comment_1").val("")
                    }
                })
            } else {
                $("#myModal-1").modal();
                $("#frm_action").val("comment");
                g = $("#comment_1").val();
                $("#frm_action_val").val(g);
                requested_url = $("#requested_url").val();
                $("#frm_action_url").val(requested_url);
                titlename = $("#xxprname").val();
                $("#frm_title_name").val(titlename);
                titleid = $("#xxprid").val();
                $("#frm_title_id").val(titleid);
                catId = $("#xxctcatid").val();
                $("#frm_cat_id").val(catId);
                pid = $("#xxpid").val();
                $("#frm_p_id").val(pid)
            }
        }
    }
}

function enquireNowForStaticForms() {
    document.getElementById("validation-error-static-form").style.display = "block";
    var l = $("input#common_static_name").val();
    var h = $("input#common_static_email").val();
    var f = $("input#common_static_mobile").val();
    var g = $("input#common_static_comment").val();
    var d = $("input#common_static_city").val();
    var c = $("input#common_static_source").val();
    var b = $("input#common_static_current").val();
    var k = $("input#common_static_refer").val();
    var e = $("#selectCountryValue").val();
    var a = $("#timepicker-actions-static").val();
    var j = $("#prop_property_name1").val();
    
    var rCityVal = 0;
     
   if ($("#Rcity1").length > 0){
   
     rCityVal = $("#Rcity1").val();
     
     }
    $("#enquireNowForStaticForms_wait_upper").html('<div class="contactformLeft_wait btn-dg CheckIcon"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</div>');
    $("#enquireNowForStaticForms_wait_upper").css("display", "block");
    $("#enquireNowForStaticForms_wait").css("display", "none");
    jQuery.ajax({
        type: "POST",
        url: baseUrlSet + "common_controller/commonMarketingEnquiry",
        dataType: "json",
        data: {
            name: l,
            email: h,
            mobile: f,
            comment: g,
            city: d,
            href_url: b,
            referer_url: k,
            source_block: c,
            propertyName: j,
            countryCode: e,
            timePicker: a,
            Rcity:rCityVal
        },
        success: function(m) {
            if (m) {
                if (m.st == 0) {
                    jQuery("#static-name-error").html(m.fname);
                    jQuery("#static-email-error").html(m.email);
                    jQuery("#static-mobile-error").html(m.mobile);
                    jQuery("#validation-error-static-form").html("");
                    $("#enquireNowForStaticForms_wait_upper").css("display", "none");
                    $("#enquireNowForStaticForms_wait").css("display", "block")
                }
                if (m.st == 1) {
                    jQuery("#static-name-error").html("");
                    jQuery("#static-email-error").html("");
                    jQuery("#static-mobile-error").html("");
                    document.getElementById("common_static_name").value = "";
                    document.getElementById("common_static_email").value = "";
                    document.getElementById("common_static_mobile").value = "";
                    jQuery("#validation-error-static-form").html(m.msg);
                    $("#enquireNowForStaticForms_wait_upper").css("display", "block");
                    $("#enquireNowForStaticForms_wait").css("display", "none")
                }
            }
        }
    })
}

function commonJqueryFormSubmit1(k, A, o, e, r, b, s, p, v, y, t, u, m) {
    

    document.getElementById(k).style.display = "block";
    document.getElementById(v).style.display = "block";
    document.getElementById(y).style.display = "block";
    document.getElementById(t).style.display = "block";
    var f = $("input#" + A).val();
    var a = $("input#" + o).val();
    var n = $("input#" + e).val();
    var j = $("input#" + b).val();
    var d = $("#selectCountryValue_002").val();
     if (!d) {
        d = $("#selectCountryValue1234").val()
    };
    
    var q = $("#timepicker-actions-exmpl").val();
    var g = $("#prop_city_name1").val();
    var l = $("#prop_property_name1").val();
    if (r == "") {
        var w = ""
    } else {
        var w = $("input#" + r).val()
    }
    var z = $("input#" + p).val();
    var x = $("input#rS_popUp_current_url1").val();
    var c = $("input#" + s).val();
    var h = $("input#" + u).val();
    var rCity = 0;
    if ($("#Rcity1").length > 0){
    var rCity = $("#Rcity1").val();
    }
    $("#upperDiv1").css("display", "block");
    $("#upperDiv1").html('<div class="contactformLeft_wait btn-dg CheckIcon"><i class="fa fa-spinner fa-pulse"></i>Please Wait...</div>');
    $("#lowerDiv1").css("display", "none");
    jQuery.ajax({
                type: "POST",
                url: baseUrlSet + "common_controller/commonEnquiry",
                dataType: "json",
                data: {
                    name: f,
                    email: a,
                    source_block: z,
                    mobile: n,
                    city: h,
                    comment: j,
                    href_url: x,
                    referer_url: c,
                    cityId: h,
                    cityName: g,
                    propertyName: l,
                    countryCode: d,
                    timePicker: q,
                    propId: m,
                    resCity:rCity,
                },
                success: function(B) {
                    
                   
                        if (B) {
                            if (B.st == 0) {
                                jQuery("#" + v).html(B.fname);
                                jQuery("#" + y).html(B.email);
                                jQuery("#" + t).html(B.mobile);
                                $("#upperDiv1").css("display", "none");
                                $("#lowerDiv1").css("display", "block");
                                jQuery("#" + k).html("")
                            }
                            if (B.st == 1) {
                                document.getElementById(A).value = "";
                                document.getElementById(o).value = "";
                                document.getElementById(e).value = "";
                                document.getElementById(r).value = "";
                                document.getElementById(b).value = "";
                                jQuery("#" + v).html("");
                                jQuery("#" + y).html("");
                                jQuery("#" + t).html("");
                                jQuery("#" + k).html(B.msg);
                                $("#lowerDiv1").css("display", "none");
                                $("#upperDiv1").css("display", "block")
                }
            }
        }
        
        
    })
};