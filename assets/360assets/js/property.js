var getUrl = window.location;

var baseUrlSet = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
var baseUrlSet = getUrl .protocol + "//" + getUrl.host + "/";

  // function city page image gallery
function photoGallery(recID, mediaUrl)
    {

         jQuery.ajax({
type: "POST",
url: baseUrlSet+"city/cityPageImagegallery",
ataType: 'json',
data: {propId:recID},
success: function(res) { 
  
if (res)
{
  
var imgArr=[];
var json = JSON.parse(res);
var propertyName="";
for(i=0;i<json.length;i++)
{
  var arr = new Object();

    


    //mediaUrl+"properties/photos/"+json[i].propty_id+"/floorplans/"+json[i].image

   if(json[i].img_type=="MINI_PROPERTY_IMAGE"  && json[i].image!="")   // && json[i].img_type!=undefined)
    {
      arr['src']=mediaUrl+"properties/photos/"+json[i].propty_id+"/mini/"+json[i].image;
      arr['thumb']=mediaUrl+"properties/photos/"+json[i].propty_id+"/mini/"+json[i].image;
      imgArr.push(arr);
    }
   else if(json[i].img_type=="SITEPLAN_IMAGE"  && json[i].image!="")
    {
        var propertyName=json[i].property_name;
        propertyName=propertyName.replace(/ /g,"_");
        propertyName=propertyName.toLowerCase();
        arr['src']=mediaUrl+"media/1100/350/"+propertyName+"_siteplan/step_"+json[i].propty_id+"/"+json[i].image;
        arr['thumb']=mediaUrl+"media/1100/350/"+propertyName+"_siteplan/step_"+json[i].propty_id+"/"+json[i].image;
        imgArr.push(arr);
    }
   else if(json[i].floor_plan!=undefined && json[i].floor_plan!="" )
    {
       var propertyName=json[i].property_name;
        propertyName=propertyName.replace(/ /g,"_");
        propertyName=propertyName.toLowerCase();
        
        arr['src']=mediaUrl+"properties/photos/"+json[i].propty_id+"/floorplans/"+json[i].floor_plan;
        arr['thumb']=mediaUrl+"properties/photos/"+json[i].propty_id+"/floorplans/"+json[i].floor_plan;
        imgArr.push(arr);
     }
     else if(json[i].img_type=="LOCATIONMAP_IMAGE"  && json[i].image!="")
     {
      arr['src']=mediaUrl+"properties/photos/"+json[i].propty_id+"/locationmap/"+json[i].image;
      arr['thumb']=mediaUrl+"properties/photos/"+json[i].propty_id+"/locationmap/"+json[i].image;
      imgArr.push(arr);
     }

  

}

  jQuery(this).lightGallery({
            dynamic: true,
            dynamicEl:imgArr,
            mode:'lg-slide-circular'
              });

    //console.log(res);
}
}
});
        
        
}


jQuery(function() {

jQuery(".scrollBtn").on("click", function( e ) {

e.preventDefault();

jQuery("body, html").animate({ 
scrollTop: jQuery( jQuery(this).attr('href') ).offset().top - 0 
}, 600);

});



/*************** for datepicker and select box ******/



// jQuery("select.custom_code").each(function() {          
//           var sb = new SelectBox({
//             selectbox: jQuery(this),
//             height: 150,
//             width: 85
//           });
//         });


 

});


 
      jQuery(window).scroll(function() {
    jQuery(".slideanim").each(function(){
      var pos = jQuery(this).offset().top;

      var winTop = jQuery(window).scrollTop();
        if (pos < winTop + 600) {
          jQuery(this).addClass("slide");
        }
    });
  });
//function getPropertyEnquireForm(id,ref,currentUrl,hrefUrl,cityId)
//{
//
//
//  var PropId=$(ref).attr('pid');
//  var Propname=$(ref).attr('pname');
//  var imgpath=$(ref).attr('imgpath');
//  var cityName=$(ref).attr('cityName');
//
//
// var imgReplaceDiv='<div id="detail_form_img" class="col-md-6 paddingLR0 clm-jo"><img src='+baseUrlSet+'360assets/images/im--1.jpg  height="444"  /><div class="proName--1">'+Propname+'</div></div>';
// var BrocComment='<textarea id="detail_enquire">Hello, I am interested in '+Propname+'. Please provide me the required details.</textarea>'  
// var countryDetails=$(ref).attr('countryDetails');
// var pid=$(ref).attr('pid');
// var commonForm='<div class="vertical-alignment-helper">  <div class="modal-dialog vertical-align-center">             <div class="modal-content" id="">      <div class="modal-header new-pop-header-bg">      <button type="button" class="close new-pop-close" data-dismiss="modal">&times;</button>      <h4 class="modal-title">Get in touch with <span><img src="http://www.360realtors.com/360assets/images/360-pop-logo.png"/></span></h4>        <p>Please fill in your details below and We will get in touch with you shortly</p>      </div>      <span id="validate-error-enquire-now-'+pid+'"></span>      <div class="modal-body">            <div class="new-pop-project-div">        <img width="128" height="80" src="'+imgpath+'" class="float_L" />        <h5>'+Propname+'</h5>                </div>        <form>                  <div class="row new-pop-up-form">                <input type="hidden" id="rS_enquire_now" name="rS_dwnEnquiry" value="'+ref+'">            <input type="hidden" id="enquire_now_src" name="sourceblock" value="ENQUIRE_NOW_HOME">             <input type="hidden" id="rS_current_url" name="rS_current_url" value="'+currentUrl+'">             <input type="hidden" id="rS_referer_url" name="rS_referer_url" value="'+hrefUrl+'">                     <div class="form-group col-sm-6">          <label class="control-label">Name</label>              <div class="inputGroupContainer">          <input name="Name"  placeholder="Enter Your Name" id="enquire_now_username_'+pid+'" class="effect-3"  type="text">          <span class="focus-border"></span>            </div>            <span id="fname-error-city-'+pid+'"></span>        </div>        <div class="form-group col-sm-6">          <label class="control-label">Email ID</label>              <div class="inputGroupContainer">          <input name="Email"  placeholder="Enter Your Email ID" id="enquire_now_email_'+pid+'" class="effect-3"  type="text">          <span class="focus-border"></span>          </div>          <span id="email-error-city-'+pid+'"></span>        </div><div class="col-md-12"><label class="control-label">Phone Number</label> <div class="row marginLR5"><div class="col-xs-5 paddingL5R0 chngeCuntry"><select id="selectCountryValue_'+pid+'" class="selectpicker" name="country1" onchange="setcountryCode(this);" data-live-search="true" style="display: none;" tabindex="-98"><option value="91" selected=""> (+91) India</option><option value="971"> (+971) Dubai</option><option value="1"> (+1) United States/Canada</option><option value="65"> (+65) Singapore</option><option value="966"> (+966) Saudi Arabia</option><option value="973"> (+973) Bahrain</option><option value="974"> (+974) Qatar</option><option value="44"> (+44) United Kingdom</option><option value="965"> (+965) Kuwait</option><option value="61"> (+61) Australia/Christmas Island</option><option value="968"> (+968) Oman</option><option value="962"> (+962) Jordan</option><option value="254"> (+254) Kenya</option><option value="27"> (+27) South Africa</option><option value="264"> (+264) Namibia</option><option value="258"> (+258) Mozambique</option><option value="95"> (+95) Myanmar</option><option value="599"> (+599) Netherlands Antilles</option><option value="31"> (+31) Netherlands</option><option value="977"> (+977) Nepal</option><option value="674"> (+674) Nauru</option><option value="64"> (+64) New Zealand</option><option value="505"> (+505) Nicaragua</option><option value="227"> (+227) Niger</option><option value="63"> (+63) Philippines</option><option value="51"> (+51) Peru</option><option value="595"> (+595) Paraguay</option><option value="675"> (+675) Papua New Guinea</option><option value="507"> (+507) Panama</option><option value="970"> (+970) Palestinian Territory, Occupied</option><option value="680"> (+680) Palau</option><option value="687"> (+687) New Caledonia</option><option value="47"> (+47) Norway/Svalbard And Jan Mayen</option><option value="1670"> (+1670) Northern Mariana Islands</option><option value="683"> (+683) Niue</option><option value="234"> (+234) Nigeria</option><option value="212"> (+212) Morocco/Western Sahara</option><option value="1664"> (+1664) Montserrat</option><option value="976"> (+976) Mongolia</option><option value="261"> (+261) Madagascar</option><option value="389"> (+389) Macedonia, The Former Yugoslav Republic </option><option value="853"> (+853) Macao</option><option value="352"> (+352) Luxembourg</option><option value="370"> (+370) Lithuania</option><option value="423"> (+423) Liechtenstein</option><option value="218"> (+218) Libyan Arab Jamahiriya</option><option value="231"> (+231) Liberia</option><option value="266"> (+266) Lesotho</option><option value="961"> (+961) Lebanon</option><option value="371"> (+371) Latvia</option><option value="265"> (+265) Malawi</option><option value="60"> (+60) Malaysia</option><option value="960"> (+960) Maldives</option><option value="377"> (+377) Monaco</option><option value="373"> (+373) Moldova, Republic Of</option><option value="691"> (+691) Micronesia, Federated States Of</option><option value="52"> (+52) Mexico</option><option value="262"> (+262) Mayotte/Reunion</option><option value="230"> (+230) Mauritius</option><option value="222"> (+222) Mauritania</option><option value="596"> (+596) Martinique</option><option value="692"> (+692) Marshall Islands</option><option value="356"> (+356) Malta</option><option value="223"> (+223) Mali</option><option value="856"> (+856) Lao Peoples Democratic Republic</option><option value="0"> (+0) Pitcairn</option><option value="263"> (+263) Zimbabwe</option><option value="7370"> (+7370) Turkmenistan</option><option value="90"> (+90) Turkey</option><option value="216"> (+216) Tunisia</option><option value="1868"> (+1868) Trinidad And Tobago</option><option value="676"> (+676) Tonga</option><option value="690"> (+690) Tokelau</option><option value="228"> (+228) Togo</option><option value="670"> (+670) Timor-leste</option><option value="255"> (+255) Tanzania, United Republic Of</option><option value="992"> (+992) Tajikistan</option><option value="886"> (+886) Taiwan, Province Of China</option><option value="1649"> (+1649) Turks And Caicos Islands</option><option value="688"> (+688) Tuvalu</option><option value="256"> (+256) Uganda</option><option value="260"> (+260) Zambia</option><option value="967"> (+967) Yemen</option><option value="681"> (+681) Wallis And Futuna</option><option value="1340"> (+1340) Virgin Islands, U.s.</option><option value="1284"> (+1284) Virgin Islands, British</option><option value="84"> (+84) Viet Nam</option><option value="58"> (+58) Venezuela</option><option value="678"> (+678) Vanuatu</option><option value="998"> (+998) Uzbekistan</option><option value="598"> (+598) Uruguay</option><option value="380"> (+380) Ukraine</option><option value="963"> (+963) Syrian Arab Republic</option><option value="46"> (+46) Sweden</option><option value="268"> (+268) Swaziland</option><option value="684"> (+684) Samoa</option><option value="1784"> (+1784) Saint Vincent And The Grenadines</option><option value="508"> (+508) Saint Pierre And Miquelon</option><option value="1758"> (+1758) Saint Lucia</option><option value="1869"> (+1869) Saint Kitts And Nevis</option><option value="290"> (+290) Saint Helena</option><option value="250"> (+250) Rwanda</option><option value="70"> (+70) Russian Federation</option><option value="40"> (+40) Romania</option><option value="1787"> (+1787) Puerto Rico</option><option value="351"> (+351) Portugal</option><option value="378"> (+378) San Marino</option><option value="239"> (+239) Sao Tome And Principe</option><option value="221"> (+221) Senegal</option><option value="597"> (+597) Suriname</option><option value="249"> (+249) Sudan</option><option value="34"> (+34) Spain</option><option value="0"> (+0) South Georgia And The South Sandwich Isl</option><option value="252"> (+252) Somalia</option><option value="677"> (+677) Solomon Islands</option><option value="386"> (+386) Slovenia</option><option value="421"> (+421) Slovakia</option><option value="232"> (+232) Sierra Leone</option><option value="248"> (+248) Seychelles</option><option value="381"> (+381) Serbia And Montenegro</option><option value="48"> (+48) Poland</option><option value="357"> (+357) Cyprus</option><option value="855"> (+855) Cambodia</option><option value="257"> (+257) Burundi</option><option value="226"> (+226) Burkina Faso</option><option value="359"> (+359) Bulgaria</option><option value="673"> (+673) Brunei Darussalam</option><option value="246"> (+246) British Indian Ocean Territory</option><option value="55"> (+55) Brazil</option><option value="0"> (+0) Bouvet Island</option><option value="267"> (+267) Botswana</option><option value="387"> (+387) Bosnia And Herzegovina</option><option value="591"> (+591) Bolivia</option><option value="237"> (+237) Cameroon</option><option value="238"> (+238) Cape Verde</option><option value="1345"> (+1345) Cayman Islands</option><option value="53"> (+53) Cuba</option><option value="385"> (+385) Croatia</option><option value="225"> (+225) Cote Divoire</option><option value="506"> (+506) Costa Rica</option><option value="682"> (+682) Cook Islands</option><option value="242"> (+242) Congo/Congo, The Democratic Republic Of </option><option value="269"> (+269) Comoros</option><option value="57"> (+57) Colombia</option><option value="56"> (+56) Chile</option><option value="235"> (+235) Chad</option><option value="236"> (+236) Central African Republic</option><option value="975"> (+975) Bhutan</option><option value="1441"> (+1441) Bermuda</option><option value="229"> (+229) Benin</option><option value="244"> (+244) Angola</option><option value="376"> (+376) Andorra</option><option value="1684"> (+1684) American Samoa</option><option value="213"> (+213) Algeria</option><option value="355"> (+355) Albania</option><option value="93"> (+93) Afghanistan</option><option value="971"> (+971) Uae</option><option value="92"> (+92) Pakistan</option><option value="94"> (+94) Sri Lanka</option><option value="41"> (+41) Switzerland</option><option value="66"> (+66) Thailand</option><option value="1264"> (+1264) Anguilla</option><option value="672"> (+672) Antarctica/Cocos (keeling) Islands/Norfo</option><option value="1268"> (+1268) Antigua And Barbuda</option><option value="501"> (+501) Belize</option><option value="32"> (+32) Belgium</option><option value="375"> (+375) Belarus</option><option value="1246"> (+1246) Barbados</option><option value="880"> (+880) Bangladesh</option><option value="1242"> (+1242) Bahamas</option><option value="994"> (+994) Azerbaijan</option><option value="43"> (+43) Austria</option><option value="297"> (+297) Aruba</option><option value="374"> (+374) Armenia</option><option value="54"> (+54) Argentina</option><option value="86"> (+86) China</option><option value="996"> (+996) Kyrgyzstan</option><option value="36"> (+36) Hungary</option><option value="852"> (+852) Hong Kong</option><option value="504"> (+504) Honduras</option><option value="39"> (+39) Holy See (vatican City State)</option><option value="0"> (+0) Heard Island And Mcdonald Islands</option><option value="509"> (+509) Haiti</option><option value="592"> (+592) Guyana</option><option value="245"> (+245) Guinea-bissau</option><option value="224"> (+224) Guinea</option><option value="502"> (+502) Guatemala</option><option value="1671"> (+1671) Guam</option><option value="354"> (+354) Iceland</option><option value="62"> (+62) Indonesia</option><option value="98"> (+98) Iran, Islamic Republic Of</option><option value="82"> (+82) Korea, Republic Of</option><option value="850"> (+850) Korea Democratic Peoples Republic Of</option><option value="686"> (+686) Kiribati</option><option value="233"> (+233) Ghana</option><option value="7"> (+7) Kazakhstan</option><option value="81"> (+81) Japan</option><option value="1876"> (+1876) Jamaica</option><option value="39"> (+39) Italy</option><option value="972"> (+972) Israel</option><option value="353"> (+353) Ireland</option><option value="964"> (+964) Iraq</option><option value="590"> (+590) Guadeloupe</option><option value="1473"> (+1473) Grenada</option><option value="299"> (+299) Greenland</option><option value="251"> (+251) Ethiopia</option><option value="372"> (+372) Estonia</option><option value="291"> (+291) Eritrea</option><option value="240"> (+240) Equatorial Guinea</option><option value="503"> (+503) El Salvador</option><option value="20"> (+20) Egypt</option><option value="593"> (+593) Ecuador</option><option value="1809"> (+1809) Dominican Republic</option><option value="1767"> (+1767) Dominica</option><option value="253"> (+253) Djibouti</option><option value="45"> (+45) Denmark</option><option value="500"> (+500) Falkland Islands (malvinas)</option><option value="298"> (+298) Faroe Islands</option><option value="679"> (+679) Fiji</option><option value="30"> (+30) Greece</option><option value="350"> (+350) Gibraltar</option><option value="49"> (+49) Germany</option><option value="995"> (+995) Georgia</option><option value="220"> (+220) Gambia</option><option value="241"> (+241) Gabon</option><option value="0"> (+0) French Southern Territories</option><option value="689"> (+689) French Polynesia</option><option value="594"> (+594) French Guiana</option><option value="33"> (+33) France</option><option value="358"> (+358) Finland</option><option value="420"> (+420) Czech Republic</option></select></div>        <div class="form-group col-xs-7 paddingL0R5">                       <div class="inputGroupContainer">          <input name="Phone Number"  placeholder="Enter Phone Number" id="enquire_now_phone_'+pid+'" class="effect-3"  type="text">          <span class="focus-border"></span>          </div>          <span id="mobile-error-city-'+pid+'"></span>        </div>        </div></div>             <input type="hidden" name="prop_city" id="prop_city_name" value="'+cityName+'">           <input type="hidden" name="cityId" id="enquire_now_cityId_1" value="'+cityId+'">          <input type="hidden" name="prop_propertyname" id="prop_property_name" value="'+Propname+'">           <input type="hidden" name="prop_propertyId" id="prop_propertyId" value="'+pid+'">             <input type="hidden" id="timepicker-actions-exmpl-'+pid+'" value="" >             <input type="hidden" id="broc_commment_'+pid+'" value="Hello, I am interested in '+Propname+'. Please provide me the required details.">    <div id="downloadBrochurePopUp_wait_Upper_'+pid+'" style="display:none;"></div><div id="downloadBrochurePopUp_wait_'+pid+'">        <input type="button" name="submit" value="submit" id="enquire_now_submit_'+pid+'" onclick="downloadBrochurePopUp('+pid+');"/></div>        </div>        </form> </div>      </div>    </div>  </div>';
//
//
//  $("#home_broc_1").html(commonForm);
//  $("#home_broc_1").modal("show");
// $('.selectpicker').selectpicker({size: 5,});
//$('.selectpicker').selectpicker('val', countryDetails);
//$('.dropdown-toggle').click(function(){$(this).parent('.bootstrap-select').addClass('open')})
//
//} 


function getPropertyEnquireForm(a, d, p, b, j)
{

 var f = $(d).attr("pid");
    var n = $(d).attr("pname");
    var g = $(d).attr("imgpath");
    var k = $(d).attr("cityName");
    var e = $(d).attr("countryDetails");
    var m = '<div id="broc_form_img" class="col-md-6 paddingLR0 clm-jo"><img src=' + baseUrlSet + '360assets/images/im--1.jpg  height="444"  /><div class="proName--1">' + n + "</div></div>";
    var o = '<textarea id="broc_commment">Hello, I am interested in ' + n + ". Please provide me the required details.</textarea>";
    var l = $("#brochureForm");
    var h = $(d).attr("pid");
    var c = '<div class="vertical-alignment-helper"> \n\
 <div class="modal-dialog vertical-align-center">      \n\
       <div class="modal-content" id="">    \n\
  <div class="modal-header new-pop-header-bg">    \n\
  <button type="button" class="close new-pop-close" data-dismiss="modal">&times;</button> \n\
     <h4 class="modal-title">Get in touch with <span>\n\
<img src="http://www.360realtors.com/360assets/images/360-pop-logo.png"/></span></h4>  \n\
      <p>Please fill in your details below and We will get in touch with you shortly</p> \n\
     </div>      <span id="validate-error-enquire-now-' + h + '"></span>   \n\
   <div class="modal-body">            <div class="new-pop-project-div">     \n\
   <img width="128" height="80" src="' + g + '" class="float_L" />    \n\
    <h5>' + n + '</h5>                </div>        <form>          \n\
        <div class="row new-pop-up-form">            \n\
    <input type="hidden" id="rS_enquire_now" name="rS_dwnEnquiry" value="' + d + '">  \n\
\n\
          <input type="hidden" id="enquire_now_src" name="sourceblock" value="REQUEST_A_CALLBACK">             <input type="hidden" id="rS_current_url" name="rS_current_url" value="' + p + '">             <input type="hidden" id="rS_referer_url" name="rS_referer_url" value="' + b + '">                     <div class="form-group col-sm-6">          <label class="control-label">Name</label>              <div class="inputGroupContainer">          <input name="Name"  placeholder="Enter Your Name" id="enquire_now_username_' + h + '" class="effect-3"  type="text">          <span class="focus-border"></span>            </div>            <span id="fname-error-city-' + h + '"></span>        </div>        <div class="form-group col-sm-6">          <label class="control-label">Email ID</label>              <div class="inputGroupContainer">        \n\
  <input name="Email"  placeholder="Enter Your Email ID" id="enquire_now_email_' + h + '" class="effect-3"  type="text">  \n\
        <span class="focus-border"></span>          </div>       \n\
   <span id="email-error-city-' + h + '"></span>     \n\
   </div><div class="col-md-12"><label class="control-label">\n\
Phone Number</label> <div class="row marginLR5">\n\
<div class="col-xs-5 paddingL5R0 chngeCuntry">\n\
<select id="selectCountryValue_' + h + '" \n\
class="selectpicker" name="country1" \n\
onchange="setcountryCode(this);" data-live-search="true" \n\
style="display: none;" tabindex="-98">';

var allcountry = JSON.parse($("#allCountryList").val());
var citylist = JSON.parse($("#allCityList").val());
var userCountry = $("#userCountryCode").val();
//var userCity = $("#userCity");

var rCity = $("#userCityId").val();

  
 


for (var i=0; i<allcountry.length; i++) {
    
    

c +=  '<option value="'+allcountry[i].country_code+'" ';

if (userCountry == allcountry[i].country_code){
    

c += 'selected';

        }

c += '>(+'+allcountry[i].country_code+') '+ allcountry[i].country+'</option>';

}
c += '</select></div>';


 c +=    '<div class="form-group col-xs-7 paddingL0R5">   \n\
                    <div class="inputGroupContainer">\n\
 <input name="Phone Number"  placeholder="Enter Phone Number" id="enquire_now_phone_' + h + '" class="effect-3"  type="text"> \n\
         <span class="focus-border"></span>          </div>  \n\
        <span id="mobile-error-city-' + h + '"></span>        \n\
</div>        </div></div>';
    
    
//   
//if (citylist.length != 0){
//    
//   c +=  ' <div class="col-md-12"';
//   
//   if (citylist.length == 1 || userCountry == 91){
//       
//      c += ' style="display:none;" '  
//   }
//
//c += '<label class="control-label">Residence City</label>\n\
//<div class="row  cntry-bbdr">\n\
//<div class="form-group col-xs-7 col-sm-12 cntry-code">\n\
//<select id="selectCityValue_' + h + '" \n\
//class="selectpicker ctyselect" name="country1" \n\
//onchange="setcountryCode(this);" data-live-search="true" \n\
//style="display: none;" tabindex="-98">';
//c +=  '<option value="0">Select City</option>';
//for (var i=0; i<citylist.length; i++) {
//    
//    
//
//c +=  '<option value="'+citylist[i].id+'" ';
//
//var exiscity = citylist[i].city;
//if (rCity == citylist[i].id){
//    
//
//c += 'selected';
//
//        }
//
//c += '> '+ citylist[i].city+'</option>';
//
//}
//c += '</select></div></div></div>'
//}
 
c += '<input type="hidden" name="prop_city" id="prop_city_name" value="' + k + '">     \n\
      <input type="hidden" name="cityId" id="enquire_now_cityId_1" value="' + j + '">  \n\
        <input type="hidden" name="prop_propertyname"\n\
 id="prop_property_name" value="' + n + '">       \n\
    <input type="hidden" name="prop_propertyId" id="prop_propertyId" value="' + h + '">   \n\
          <input type="hidden" id="timepicker-actions-exmpl-' + h + '" value="" > \n\
            <input type="hidden" id="broc_commment_' + h + '"\n\
 value="Hello, I am interested in ' + n + '. Please provide me the required details."> \n\
   <div id="downloadBrochurePopUp_wait_Upper_' + h + '" style="display:none;">\n\
</div><div id="downloadBrochurePopUp_wait_' + h + '">  \n\
     <input type="button" name="submit" value="submit" id="enquire_now_submit_' + h + '" onclick="downloadBrochurePopUp(' + h + ');"/>\n\
</div>        </div>        </form> </div>  \n\
    </div>    </div> \n\
 </div>';
    $("#home_broc_1").html(c);
    $("#home_broc_1").modal("show");
    $(".selectpicker").selectpicker({
        size: 5,
    });
   $('#selectCountryValue_' + h + ' .selectpicker').selectpicker("val", userCountry);
     var rCity = $("#userCityId").val();
     //$('#selectCityValue_'+ h + '  .selectpicker').selectpicker("val", rCity);
jQuery('.dropdown-toggle').click(function(){
   
   jQuery(this).parent('.bootstrap-select').addClass('open')
     //jquery(this).parent().attr('class').append('open');
})
    
} 




$(document).ready(function(){
$('.selectpicker').selectpicker(
{
size: 5,
});

     jQuery(".dropdown-toggle").dropdown();


          // for tabbing shortlist
          jQuery('.center').slick({
          slidesToShow: 4,
          arrows: true,
          variableWidth: true,

          responsive: [
          {
          breakpoint: 1024,
          settings: {
          arrows: false,
          slidesToShow: 2
          }},
          {
          breakpoint: 480,
          settings: {
          arrows: false,
          slidesToShow: 1
          }}]
          });




    
});





jQuery(document).ready(function(e) {


  jQuery(function() {
    jQuery('.simliarProp').slick({
slidesToShow:3,
arrows: true,

responsive: [
{
breakpoint:650,
settings: {

slidesToShow: 2
}},
{
breakpoint: 480,
settings: {
slidesToShow: 1
}}]
});

    jQuery('.simliarProp').show();
});

   
    

});



jQuery(document).ready(function(e) {


  jQuery(function() {
    jQuery('.floorPlanSlider').slick({
slidesToShow:4,
arrows: true,

responsive: [
{
breakpoint: 1024,
settings: {

slidesToShow: 3
}},
{
breakpoint: 768,
settings: {

slidesToShow: 2
}},
{
breakpoint: 480,
settings: {
slidesToShow: 1
}}]
});

    jQuery('.floorPlanSlider').show();
});

   
    

});




jQuery(document).ready(function(e) {
  jQuery(function() {
    jQuery('.detail_slide').slick({
  infinite: false,
  slidesToShow:1,
  slidesToScroll: 1,
  arrows:true,
  autoplay : true,
  dots : false,
  speed: 500,
  autoplaySpeed: 3000,
});
jQuery('.detail_slide').show();
});
});



jQuery(document).ready(function(e) {
jQuery('.demo-4').percentcircle({
animate : true,
diameter :200,
guage: 3,
coverBg: '#fff',
bgColor: '#efefef',
fillColor: '#fb8903',
percentSize: '15px',
percentWeight: 'normal'
});   

jQuery( '.swipebox' ).swipebox();

jQuery('[data-toggle="tooltip"]').tooltip();




// grab the initial top offset of the navigation
var sticky_navigation_offset_top = jQuery('#sticky_navigation').offset().top;
// our function that decides weather the navigation bar should have "fixed" css position or not.
var sticky_navigation = function(){
var scroll_top = jQuery(window).scrollTop(); // our current vertical position from the top

// if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
if (scroll_top > sticky_navigation_offset_top) {
jQuery('#sticky_navigation').css({ 'position': 'fixed', 'top':'0','background-color': '#fff','width': '100%','box-shadow':'0 0 5px rgba(0,0,0,0.15)', 'border-bottom':'2px solid #48254d'});
jQuery('#360Logo').css({ 'display': 'block'});
jQuery('.navBarsction').css({'transform':'translateX(140px)'});
//jQuery('.homeMenu ul').css({ 'margin': '10px 0 0 0'});
} else {
jQuery('#sticky_navigation').css({ 'position': 'relative','background-color': '', 'margin': '','box-shadow':'', 'border-bottom':'0'});
//jQuery('.homeMenu ul').css({ 'margin': '0'});
jQuery('#360Logo').css({ 'display': 'none'});
jQuery('.navBarsction').css({'transform':''});
}
};


// run our function on load
sticky_navigation();

// and run it again every time you scroll
jQuery(window).scroll(function() {
sticky_navigation();
});


    

      jQuery("#myModal-social_aaa").click(function(){
        jQuery("#myModal-social_aaa1").modal();
        

    });



 jQuery('.example-fontawesome').barrating({
  theme: 'fontawesome-stars',
  showSelectedRating: false,
 /* onSelect:function(value) 
 {
  lgn_redirection('product_rate','21_'+value,'http://www.360realtors.com/scented-reed-diffuser-gingerlily-pid-21');
    jQuery('.rate_dropdown').trigger('click');
  } */
}); 


}); 




 function toggleShareThisClass(ref)
{

  jQuery(ref).parent().toggleClass('current');
}



(function(jQuery){
  jQuery.fn.extend({     
      //pass the options variable to the function
    percentcircle: function(options) {
    //Set the default values, use comma to separate the settings, example:
      var defaults = {
              animate : true,
          diameter :120,
          guage: 6,
          coverBg: '#fff',
          bgColor: '#efefef',
          fillColor: '#ff8831',
          percentSize: '28px',
          percentWeight: '600'
        },
        styles = {
            cirContainer : {
              'width':defaults.diameter,
            'height':defaults.diameter
          },
          cir : {
              'position': 'relative',
              'text-align': 'center',
              'width': defaults.diameter,
              'height': defaults.diameter,
              'border-radius': '100%',
              'background-color': defaults.bgColor,
              'background-image' : 'linear-gradient(91deg, transparent 50%, '+defaults.bgColor+' 50%), linear-gradient(90deg, '+defaults.bgColor+' 50%, transparent 50%)'
          },
          cirCover: {
            'position': 'relative',
              'top': defaults.guage,
              'left': defaults.guage,
              'text-align': 'center',
              'width': defaults.diameter - (defaults.guage * 2),
              'height': defaults.diameter - (defaults.guage * 2),
              'border-radius': '100%',
              'background-color': defaults.coverBg
          },
          percent: {
            'display':'block',
            //'width': defaults.diameter,
            //  'height': defaults.diameter,
            //  'line-height': defaults.diameter + 'px',
              'vertical-align': 'middle',
              'font-size': defaults.percentSize,
              'font-weight': defaults.percentWeight,
              'color': defaults.fillColor
                    }
        };
      
      var that = this,
          template = '<div><div class="ab"><div class="cir"><span class="perc"><i class="fa fa-thumbs-up"></i>{{percentage}}<font>Recommended</font></span></div></div></div>',         
          options =  jQuery.extend(defaults, options)          

      function init(){
        that.each(function(){
          var jQuerythis = jQuery(this),
              //we need to check for a percent otherwise set to 0;
            perc = Math.round(jQuerythis.data('percent')), //get the percentage from the element
            deg = perc * 3.6,
            stop = options.animate ? 0 : deg,
            jQuerychart = jQuery(template.replace('{{percentage}}',perc+'%'));
            //set all of the css properties forthe chart
            jQuerychart.css(styles.cirContainer).find('.ab').css(styles.cir).find('.cir').css(styles.cirCover).find('.perc').css(styles.percent);
          
          jQuerythis.append(jQuerychart); //add the chart back to the target element
          setTimeout(function(){
            animateChart(deg,parseInt(stop),jQuerychart.find('.ab')); //both values set to the same value to keep the function from looping and animating  
          },250)
            });
      }

      var animateChart = function (stop,curr,jQueryelm){
        var deg = curr;
        if(curr <= stop){
          if (deg>=180){
            jQueryelm.css('background-image','linear-gradient(' + (90+deg) + 'deg, transparent 50%, '+options.fillColor+' 50%),linear-gradient(90deg, '+options.fillColor+' 50%, transparent 50%)');
              }else{
                jQueryelm.css('background-image','linear-gradient(' + (deg-90) + 'deg, transparent 50%, '+options.bgColor+' 50%),linear-gradient(90deg, '+options.fillColor+' 50%, transparent 50%)');
              }
          curr ++;
          setTimeout(function(){
            animateChart(stop,curr,jQueryelm);
          },1);
        }
      };      
      
      init(); //kick off the goodness
        }
  });
  
})(jQuery);


jQuery(document).ready(function(){
  // Add scrollspy to <body>
  jQuery('body').scrollspy({target: ".navbar", offset: 50});   

  // Add smooth scrolling on all links inside the navbar
  jQuery("#myNavbar a").on('click', function(event) {
      event.preventDefault();
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      jQuery('html, body').animate({
        scrollTop: jQuery(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        // window.location.hash = hash;
      });
    }  // End if
  });

  if (jQuery(window).width() <= 767) {
    jQuery('#myNavbar').children('ul').removeClass('navBarsction');
      jQuery('#myNavbar').children('ul').css({'transform':'translateX(0px)'});
}
else {
}

});

// jQuery(window).resize(function() {
// if (jQuery(window).width() <= 767) {
//   jQuery('#myNavbar').children('ul').removeClass('navBarsction');
// }
// else {
// }
// });


function myFunction(vl,projectName, location, city) 
{

    var map, places, iw;
    var markers = [];
    var searchTimeout;
    var centerMarker;
    var autocomplete;
    var hostnameRegexp = new RegExp('^http?://.+?/');
      function initialize(location) 
      {
        
          var address = location;
          var geocoder = new google.maps.Geocoder();
          var cityLatitude;
          geocoder.geocode( { "address": address }, function(results, status) { getLat(results[0].geometry.location); });
          function getLat(locationName)
          { 
              var loc= String(locationName);
              var lon=loc.replace(/[\(\)-]/g, "");
              var myLatlngSet;
              var myLangSet;
              var mySplitResult = lon.split(",");
              myLatlngSet = mySplitResult[0];
              myLangSet = mySplitResult[1];
              var myLatlng = new google.maps.LatLng(myLatlngSet,myLangSet);
              var myOptions = {zoom: 12,center: myLatlng,mapTypeId: google.maps.MapTypeId.ROADMAP}
              map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
              places = new google.maps.places.PlacesService(map);
              google.maps.event.addListener(map, 'tilesloaded', tilesLoaded);
              document.getElementById('keyword').onkeyup = function(e) 
              {
                    if (!e) var e = window.event;
                    if (e.keyCode != 13) return;
                    document.getElementById('keyword').blur();
                    search(document.getElementById('keyword').value);
              }
              var typeSelect = document.getElementById(vl);
              typeSelect.onchange = function() 
              {
                 search();
              };
              var rankBySelect = document.getElementById('rankBy');
              rankBySelect.onchange = function() {   search();  };
          }
      }
      function tilesLoaded() 
      {
        search();
        google.maps.event.clearListeners(map, 'tilesloaded');
        google.maps.event.addListener(map, 'zoom_changed', searchIfRankByProminence);
        google.maps.event.addListener(map, 'dragend', search);
      }
      function searchIfRankByProminence() 
      {
          if (document.getElementById('rankBy').value == 'prominence') { search(); }    
      }
      function search() 
      {
        clearResults();
        clearMarkers();
        if (searchTimeout) 
        {
            window.clearTimeout(searchTimeout);
        }
        searchTimeout = window.setTimeout(reallyDoSearch, 500);
      }
      function reallyDoSearch() 
      {      
        var type = document.getElementById(vl).value;
        var keyword = document.getElementById('keyword').value;
        var rankBy = document.getElementById('rankBy').value;
        var search = {};
        if (keyword) 
        {
           search.keyword = keyword;
        }
        if (type != 'establishment') 
        {
           search.types = [type];
        }
        if (rankBy == 'distance' && (search.types || search.keyword)) 
        {
            search.rankBy = google.maps.places.RankBy.DISTANCE;
            search.location = map.getCenter();
            centerMarker = new google.maps.Marker({
            position: search.location,
            animation: google.maps.Animation.DROP,
            map: map,
            icon: "../360assets/images/map_1.png" });
        } 
        else 
        {
            search.bounds = map.getBounds();
        }
        ProjectNameString='<div id="infobox">'+projectName+'</div>';
        var infowindow = new google.maps.InfoWindow({ content:  ProjectNameString, });
        infowindow.open(map, centerMarker);
        google.maps.event.addListener(centerMarker, 'click', function() { infowindow.open(map,centerMarker); });
        if(document.getElementById(vl).value=="restaurant")
           iconset="../360assets/images/restaurants_map.png";
        else if(document.getElementById(vl).value=="university")
          iconset="../360assets/images/university_map.png";
         else if(document.getElementById(vl).value=="school")
          iconset="../360assets/images/schools_map.png";
         else if(document.getElementById(vl).value=="hospital")
          iconset="../360assets/images/hospitals_map.png";
         else if(document.getElementById(vl).value=="bank")
          iconset="../360assets/images/banks_map.png";
         else if(document.getElementById(vl).value=="atm")
          iconset="../360assets/images/atm_map.png";
         else if(document.getElementById(vl).value=="bar")
          iconset="../360assets/images/bar_map.png";
         else if(document.getElementById(vl).value=="cafe")
          iconset="../360assets/images/cafe_map.png";
         else if(document.getElementById(vl).value=="clothing_store")
          iconset="../360assets/images/shopping_malls.png";
         else if(document.getElementById(vl).value=="museum")
            iconset="../360assets/images/museum_map.png";
        places.search(search, function(results, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) 
        {
            for (var i = 0; i < results.length; i++) 
            {
                markers.push(new google.maps.Marker({
                position: results[i].geometry.location,
                animation: google.maps.Animation.DROP,
                //icon: icon
                icon: iconset         }));
                google.maps.event.addListener(markers[i], 'click', getDetails(results[i], i));
                window.setTimeout(dropMarker(i), i * 100);
                addResult(results[i], i);
            }
        }  });
      }
      function clearMarkers() 
      {
        for (var i = 0; i < markers.length; i++) {     markers[i].setMap(null);      }
        markers = [];
        if (centerMarker) {  centerMarker.setMap(null); }
      }
      function dropMarker(i) 
      {
        return function() { if (markers[i]) { markers[i].setMap(map); }  }
      }
      function addResult(result, i) 
      {
          var results = document.getElementById('resultsMap');
          var tr = document.createElement('tr');
          //tr.style.backgroundColor = (i% 2 == 0 ? '#F0F0F0'  : '#FFFFFF');
          tr.onclick = function() {  google.maps.event.trigger(markers[i], 'click'); };
          var iconTd = document.createElement('td');
          var nameTd = document.createElement('td');
          var icon = document.createElement('img');
          iconTd.style.padding = (i% 2 == 0 ? '0'  : '0');
          nameTd.style.padding = (i% 2 == 0 ? '0'  : '0');
          nameTd.style.fontSize = ('14px');
          //var icon = document.createElement('b');
              if(document.getElementById(vl).value=="restaurant")
              {
                  icon.setAttribute('class', 'set--mapicon map-res-hvr');
                  icon.setAttribute('src','../360assets/images/trans_img.gif');
              }
              else if(document.getElementById(vl).value=="university")
              {
                  icon.setAttribute('class', 'set--mapicon map-uni-hvr');
                  icon.setAttribute('src','../360assets/images/trans_img.gif');
              }
              else if(document.getElementById(vl).value=="school")
              {
                  icon.setAttribute('class', 'set--mapicon map-sch-hvr');
                  icon.setAttribute('src','../360assets/images/trans_img.gif');
              }
              else if(document.getElementById(vl).value=="hospital")
              {
                  icon.setAttribute('class', 'set--mapicon map-hos-hvr');
                  icon.setAttribute('src','../360assets/images/trans_img.gif');
              }
              else if(document.getElementById(vl).value=="bank")
              {
                  icon.setAttribute('class', 'set--mapicon map-ban-hvr');
                  icon.setAttribute('src','../360assets/images/trans_img.gif');
              }
              else if(document.getElementById(vl).value=="atm")
              {
                  icon.setAttribute('class', 'set--mapicon map-atm-hvr');
                  icon.setAttribute('src','../360assets/images/trans_img.gif');
              }
              else if(document.getElementById(vl).value=="bar")
              {
                  icon.setAttribute('class', 'set--mapicon map-bar-hvr');
                  icon.setAttribute('src','../360assets/images/trans_img.gif');
              }
              else if(document.getElementById(vl).value=="cafe")
              {
                  icon.setAttribute('class', 'set--mapicon map-cafe-hvr');
                  icon.setAttribute('src','../360assets/images/trans_img.gif');
              }
              else if(document.getElementById(vl).value=="clothing_store")
              {
                  icon.setAttribute('class', 'set--mapicon map-sho-hvr');
                  icon.setAttribute('src','../360assets/images/trans_img.gif');
              }
              else if(document.getElementById(vl).value=="museum")
              {
                  icon.setAttribute('class', 'set--mapicon map-mus-hvr');
                  icon.setAttribute('src','../360assets/images/trans_img.gif');
              }
          //icon.src = setIm;
          //icon.setAttribute('class', 'placeIcon');
          icon.setAttribute('className', 'placeIcon');
          var name = document.createTextNode(result.name);
          iconTd.appendChild(icon);
          nameTd.appendChild(name);
          tr.appendChild(iconTd);
          tr.appendChild(nameTd);
          results.appendChild(tr);
          document.getElementById('mapLoading').style.display='none';
      }
      function clearResults() 
      {
          document.getElementById('mapLoading').style.display='block';
          var results = document.getElementById('resultsMap');
          while (results.childNodes[0]) { results.removeChild(results.childNodes[0]); }
      }
      function getDetails(result, i) 
      {
        return function()   { places.getDetails({  reference: result.reference   }, showInfoWindow(i));   }
      }
      function showInfoWindow(i) 
      {
        return function(place, status) 
        {
          if (iw) { iw.close(); iw = null;  }
          if (status == google.maps.places.PlacesServiceStatus.OK) { iw = new google.maps.InfoWindow({content: getIWContent(place)});
           iw.open(map, markers[i]);         }
        }
      }
      function getIWContent(place) 
      {
          var content = '';
          content += '<table>';
          content += '<tr class="iw_table_row">';
          content += '<td style="text-align: right"><img class="hotelIcon" src="' + place.icon + '" width="28" height="28"/></td>';
          content += '<td><b><a href="' + place.url + '">' + place.name + '</a></b></td></tr>';
          content += '<tr class="iw_table_row"><td class="iw_attribute_name"></td><td>' + place.vicinity + '</td></tr>';
          if (place.formatted_phone_number) { }
          if (place.rating) 
          {
              var ratingHtml = '';
              for (var i = 0; i < 5; i++) 
              {
                  if (place.rating < (i + 0.5)) 
                  {
                     ratingHtml += '&#10025;';
                  } else 
                  {
                     ratingHtml += '&#10029;';
                  }
              }
              content += '<tr class="iw_table_row"><td class="iw_attribute_name"></td><td><span id="rating">' + ratingHtml + '</span></td></tr>';
          }
        if (place.website) 
        {
          var fullUrl = place.website;
          var website = hostnameRegexp.exec(place.website);
          if (website == null) 
          { 
            website = 'http://' + place.website + '/';
            fullUrl = website;
          }
        }
        content += '</table>';
        return content;
      }
      google.maps.event.addDomListener(window, 'load', initialize(" "+location+"  "+city+" "));
}

$(function(){
   $(window).scroll(function(){
       if ($("#sticky_navigation").css('position') === 'fixed'){
           $(".stick_logo").show();
       }else{
           $(".stick_logo").hide();
       }
   })
});

/*jQuery(window).load(function(){
myFunction('r1');
});*/

