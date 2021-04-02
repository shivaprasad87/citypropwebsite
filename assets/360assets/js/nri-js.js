


$(document).on("click", ".filterNriData", function () {

    var City = $(this).html();
    var cityId = $(this).attr("city-id");
    var keySearch = $("#keySearch").val();
    
  if ($(this).attr('searchType') != "text"){
    
    $("#filterCity").html(City);
    
  }
    
    
    if (cityId == 0 && keySearch == "") {

        $("#search-opetion").removeClass("slide-open");
        $("#search-opetion").addClass("slide-close");

    } else {

        $("#search-opetion").removeClass("slide-close");
        $("#search-opetion").addClass("slide-open");
     }
        if ($(this).parent().children(1).html() != "select City" && $(this).attr('searchType') != "text") {
            $(".cityList").prepend("<li class='filterNriData' city-id='0'>select City<li>");
        }
        
        $("#searchBtn").attr("city-id",cityId);
     
        
        var postUrl = controlerUrl+'/filterData';
        
        var pageId =0;
        
        if ($("#pageId").length > 0){
            
               var pageId = $("#pageId").val();
        }
       
       
        $.ajax({
            type: 'POST',
            url: postUrl,
            data: {
                action: 'fetchcityFIler',
                cityId: cityId,
                pageId: pageId,
                keysearch:keySearch

            },
            success: function (resultProp) {

                var response = JSON.parse(resultProp);
   
                if (response.SearchOpetionHtml != "") {

                var searchHtml = response.SearchOpetionHtml;
             
                 $("#search-opetion").html(searchHtml);
                 
                 var proHtml = response.propertyHtml
                   
                   $("#propertylist").html(proHtml);
                   
                   var pagenatationHTML = response.peginatationHtml
                   
                   $("#pagenatation").html(pagenatationHTML);
          
                    $("html,body").animate({scrollTop: 400}, 1000);
                }


            }

        });
    
})


$(document).on("click",".filterLink",function(){
    
    var url = $(this).attr("link");
    
    window.location.href = url;
    
});


$(document).on("click","#resetSearch",function(){
    
    var postUrl = currentUrl;
    
  
     window.location.href = postUrl;
    
});

$(document).on("keyup","#keySearch",function(e){
    
   var value =  $(this).val();
   
   console.log(e.keyCode);
   
   var keyCode = e.keyCode;
   
   if (keyCode == 40){
       //alert("fgkjfkgjldf");
       
       console.log($(".hintbox ul li")[0]);
       $(".hintbox ul li").attr("tabindex",1).focus();
   }
   
  // $(".hintbox").show();
    
    
})

$(document).on("click",".selectserch",function(){
    
   var value =  $(this).text();
   
   
   
   $("#keySearch").val(value);
   $(".hintbox").hide();
    
    
})