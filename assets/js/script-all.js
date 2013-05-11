$(function(){
	$(".count-down").kkcountdown({
    	dayText		: ' ',
    	daysText 	: ' ',
        hoursText	: ' ',
        minutesText	: ' ',
        secondsText	: ' ',
        displayZeroDays : false,
        callback	: function() {
        	$(".user, .countdown").fadeOut();
		},
        oneDayClass	: 'one-day'
    });

    $(".ac-container label").toggle(function(){
        var _this = $(this);
        _this.siblings("article").slideDown(500);
        form_validation(".validate-qoute");
        form_validation(".validate-photo");
        form_validation(".validate-url");
    }, function(){
        var _this = $(this);
        _this.siblings("article").slideUp(500);
    });

    var form_validation = function(param){
        $(param).validate({
            rules: {
                qoute : {
                    required: true,
                    maxlength: 160
                },
                category: {
                    required : true
                },
                file_upload : {
                    required: true,
                    accept: "image/*",
                    extension: "png|jpg|jpeg|gif"
                },
                caption: {
                    required: true
                },
                url: {
                    required: true,
                    url: true
                }
            },
            messages: {
                qoute : {
                    required: "Please submit your Qoute",
                    maxlength: "Maximum 160 character"
                },
                category : {
                    required : "Please choose category"
                },
                file_upload : {
                    required: "Please choose your image",
                    accept: "Please submit valid Image",
                    extension: "Please submit valid extension such .png, .jpg, .jpeg, .gif"
                },
                caption : {
                    required: "Please submit your caption"
                },
                url: {
                    required: "Please submit your video url",
                     url: "Please submit valid url"
                }
            }
        });
    };

    // $('#submit-quote').ajaxForm(function() { 
        
    // }); 
    

});