$(document).ready(function() {
    //screen one worker
    $("body").on('click', '#signupBtnFirst', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        let _token = $("input[name='_token']").val();
        let email = $("#email").val();
        let password = $("#password").val();
   
        $.ajax({
            url: "/register/worker-first",
            type:'POST',
            data: {_token:_token, email:email, password:password},
            error: function(error){
                $("#quickSignup .signup-wrap .print-error-msg").find("ul").html('<li>Error while saving data, try again later.</li>');
                $('#quickSignup .signup-wrap .print-error-msg').show();
                prop.html("Next");
                prop.attr("disabled", false);
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $('#quickSignup .signup-two').show();
                    $('#quickSignup .signup-one').hide();
                }else{
                    printErrorMsg(data.error);
                    prop.html("Next");
                    prop.attr("disabled", false);
                }
            }
        });
    }); 
   
    function printErrorMsg (msg) {
        $("#quickSignup .signup-wrap .print-error-msg").find("ul").html('');
        $("#quickSignup .signup-wrap .print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $("#quickSignup .signup-wrap .print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }

    // screen two worker
    $("body").on('click', '#signupBtnWSecond', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        let _token = $("input[name='_token']").val();
        let firstName = $("#first_name_w").val();
        let lastName = $("#last_name_w").val();
        let countryName = $("#country_w").val();
        let cityName = $("#city_w").val();
        let city = $("#quickSignup .workerCityId").val();
        let email = $("#email").val();
   
        $.ajax({
            url: "/register/worker-second",
            type:'POST',
            data: {_token:_token, first_name:firstName, last_name:lastName, countryName:countryName, city:city, email:email, cityName:cityName},
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $('#quickSignup .signup-two').hide();
                    $('#quickSignup .signup-three').show();
                }else{
                    printErrorMsgTwo(data.error);
                    prop.html("Submit");
                    prop.attr("disabled", false);
                }
            }
        });
    }); 
   
    function printErrorMsgTwo (msg) {
        $("#quickSignup .signup-wrap .print-error-msg-two").find("ul").html('');
        $("#quickSignup .signup-wrap .print-error-msg-two").css('display','block');
        $.each( msg, function( key, value ) {
            $("#quickSignup .signup-wrap .print-error-msg-two").find("ul").append('<li>'+value+'</li>');
        });
    }

    // screen three worker
    $("body").on('click', '#signupBtnWThird', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        let _token = $("input[name='_token']").val();
        let code = $("#code_w").val();
        let email = $("#email").val();
   
        $.ajax({
            url: "/register/worker-third",
            type:'POST',
            data: {_token:_token, code:code, email:email},
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $('#quickSignup .print-error-msg-three').hide();
                    $("#quickSignup .print-success-msg-three").find("ul").html('<li>'+data.success+'</li>');
                    $('#quickSignup .print-success-msg-three').show();
                    prop.html("Submit");
                    location.reload();
                    // prop.attr("disabled", false);
                }else{
                    $('#quickSignup .print-success-msg-three').hide();
                    printErrorMsgThree(data.error);
                    prop.html("Submit");
                    prop.attr("disabled", false);
                }
            }
        });
    }); 
   
    function printErrorMsgThree(msg) {
        $("#quickSignup .print-error-msg-three").find("ul").html('');
        $("#quickSignup .print-error-msg-three").css('display','block');
        $.each( msg, function( key, value ) {
            $("#quickSignup .print-error-msg-three").find("ul").append('<li>'+value+'</li>');
        });
    }


    // header menu register button code
    $('body').on('click', '.userTypeBtn', function(){
        $('.userTypeBtn').removeClass('btn-selcted');
        $(this).addClass('btn-selcted');
        $('#userType').val($(this).attr('rel'));
    });
    // screen 1
    $("body").on('click', '#signupBtnAllFirst', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        let _token = $("input[name='_token']").val();
        let email = $("#emailAll").val();
        let password = $("#passwordAll").val();
        let userType = $("#userType").val();
  
        $.ajax({
            url: "/register/first",
            type:'POST',
            data: {_token:_token, email:email, password:password, user_type:userType},
            error: function(error){
                $(".signup-wrap .print-error-msg-all").find("ul").html('<li>Error while saving data, try again later.</li>');
                $('.signup-wrap .print-error-msg-all').show();
                prop.html("Next");
                prop.attr("disabled", false);
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $('#quickSignupAll .signup-one').hide();
                    $('#quickSignupAll .signup-two').show();
                    if(userType == 1){
                        $('.employer-area').css('display', 'unset');
                        $('.worker-area').css('display', 'none');
                    }else{
                        $('.worker-area').css('display', 'unset');
                    }
                }else{
                    printErrorMsgAll(data.error);
                    prop.html("Next");
                    prop.attr("disabled", false);
                }
            }
        });
    }); 


    // #handling quick employer singup from 
    $("body").on('click', '#quickEmployerSignupBtn', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        let _token = $("input[name='_token']").val();
        let email = $("#empQuickSingupEmail").val();
        let password = $("#empQuickSingupPassword").val();
        let userType = 1;
  
        $.ajax({
            url: "/register/first",
            type:'POST',
            data: {_token:_token, email:email, password:password, user_type:userType},
            error: function(error){
                $("#quickEmployerSignup .print-error-msg").find("ul").html('<li>Error while saving data, try again later.</li>');
                $('#quickEmployerSignup .print-error-msg').show();
                prop.html("Next");
                prop.attr("disabled", false);
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $('#quickEmployerSignup .signup-one').hide();
                    $('#quickEmployerSignup .signup-three').show();
                }else{
                    $.each( data.error, function( key, value ) {
                        $("#quickEmployerSignup .print-error-msg").find("ul").append('<li>'+value+'</li>');
                    });
                    $("#quickEmployerSignup .print-error-msg").css('display','block');
                    // printErrorMsgAll(data.error);
                    prop.html("Next");
                    prop.attr("disabled", false);
                }
            }
        });
    });

    // Quick employer signup setp two screen
    /*
       // screen two worker
       $("body").on('click', '#quickEmployersignupBtnWSecond', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        let _token = $("input[name='_token']").val();
      
        let country = $("#emp_country_w").val();
        let city = $("#emp_city_w").val();
        let email = $("#empQuickSingupEmail").val();
   
        $.ajax({
            url: "/register/worker-second",
            type:'POST',
            data: {_token:_token, first_name:firstName, last_name:lastName, country:country, city:city, email:email},
            success: function(data) {
                if($.isEmptyObject(data.error)){
                   
                    $('#quickEmployerSignup .signup-two').hide();
                    $('#quickEmployerSignup .signup-three').show();
                }else{
                    $.each( data.error, function( key, value ) {
                        $("#quickEmployerSignup .print-error-msg-two").find("ul").append('<li>'+value+'</li>');
                    });
                    $('#quickEmployerSignup . print-error-msg-two').show();
                    prop.html("Submit");
                    prop.attr("disabled", false);
                }
            }
        });
    }); 
    */
    // screen three worker
    $("body").on('click', '#quickEmployersignupBtnWThird', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        let _token = $("input[name='_token']").val();
        let code = $("#quickemployer_code_w").val();
        let email = $("#empQuickSingupEmail").val();
        let firstName = $("#emp_first_name_w").val();
        let lastName = $("#emp_last_name_w").val();
        $.ajax({
            url: "/register/worker-third",
            type:'POST',
            data: {_token:_token, code:code, email:email, firstName, lastName},
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    console.log('data',data)
                    $("#user_id").val(data.user_id);
                    $('#quickEmployerSignup .print-error-msg-three').hide();
                    $("#quickEmployerSignup .print-success-msg-three").find("ul").html('<li>'+data.success+'</li>');
                    $('#quickEmployerSignup .print-success-msg-three').show();
                    setTimeout(()=>  $("#freePostsubmit").click() ,1000);
                    prop.html("Submit");
                    // prop.attr("disabled", false);
                }else{
                    $('#quickEmployerSignup .print-success-msg-three').hide();
                    $("#quickEmployerSignup .print-error-msg-three").find("ul").html('');
                    $("#quickEmployerSignup .print-error-msg-three").css('display','block');
                    $.each( msg, function( key, value ) {
                        $("#quickEmployerSignup .print-error-msg-three").find("ul").append('<li>'+value+'</li>');
                    });
                    prop.html("Submit");
                    prop.attr("disabled", false);
                }
            }
        });
    });
    /** Quick signup section end */

    function printErrorMsgAll (msg) {
        $(".signup-wrap .print-error-msg-all").find("ul").html('');
        $(".signup-wrap .print-error-msg-all").css('display','block');
        $.each( msg, function( key, value ) {
            $(".signup-wrap .print-error-msg-all").find("ul").append('<li>'+value+'</li>');
        });
    }

    // screen two worker
    $("body").on('click', '#signupBtnAllSecond', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        let _token = $("input[name='_token']").val();
        let firstName = $("#first_name_a").val();
        let lastName = $("#last_name_a").val();
        let countryName;
        let country;
        let city = 0;
        let cityName;

        if($("#userType").val() == 1){
            countryName = $("#emp_country_a").val();
            country = $("#quickEmployerHomeSignup .employerCountryId").val();
        }else{
            countryName = $("#country_a").val();
            cityName = $("#city_a").val();
            city = $("#quickSignupAll .workerCityId").val();
        }

        let email = $("#emailAll").val();
   
        $.ajax({
            url: "/register/worker-second",
            type:'POST',
            data: {_token:_token, first_name:firstName, last_name:lastName, country:country, city:city, email:email, countryName: countryName, cityName:cityName},
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $('#quickSignupAll .signup-two').hide();
                    $('#quickSignupAll .signup-three').show();
                }else{
                    printErrorMsgTwoAll(data.error);
                    prop.html("Submit");
                    prop.attr("disabled", false);
                }
            }
        });
    }); 
   
    function printErrorMsgTwoAll (msg) {
        $(".signup-wrap .print-error-msg-all-two").find("ul").html('');
        $(".signup-wrap .print-error-msg-all-two").css('display','block');
        $.each( msg, function( key, value ) {
            $(".signup-wrap .print-error-msg-all-two").find("ul").append('<li>'+value+'</li>');
        });
    }

    // screen three worker
    $("body").on('click', '#signupBtnAllThird', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        let _token = $("input[name='_token']").val();
        let code = $("#code_a").val();
        let email = $("#emailAll").val();
   
        $.ajax({
            url: "/register/worker-third",
            type:'POST',
            data: {_token:_token, code:code, email:email},
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $('#quickSignupAll .print-success-error-all-three').hide();
                    $("#quickSignupAll .print-success-msg-all-three").find("ul").html('<li>'+data.success+'</li>');
                    $('#quickSignupAll .print-success-msg-all-three').show();
                    prop.html("Submit");
                    location.reload();
                    // prop.attr("disabled", false);
                }else{
                    $('#quickSignupAll .print-success-msg-all-three').hide();
                    printErrorMsgThreeAll(data.error);
                    prop.html("Submit");
                    prop.attr("disabled", false);
                }
            }
        });
    }); 
   
    function printErrorMsgThreeAll(msg) {
        $("#quickSignupAll .print-error-msg-all-three").find("ul").html('');
        $("#quickSignupAll .print-error-msg-all-three").css('display','block');
        $.each( msg, function( key, value ) {
            $("#quickSignupAll .print-error-msg-all-three").find("ul").append('<li>'+value+'</li>');
        });
    }

    $('body').on('click', '.sendMailWorker', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.attr("disabled", true);

        let _token = $("input[name='_token']").val();
        let email = $("#email").val();
        $.ajax({
            url: "/register/resend/verification/code",
            type:'POST',
            data: {_token:_token, email:email},
            error: function(error){
                $('#quickSignup .print-success-msg-three').hide();
                $("#quickSignup .print-error-msg-three").find("ul").html('<li>Error while sending mail, try again later.</li>');
                $('#quickSignup .print-error-msg-three').show();
                prop.attr("disabled", false);
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $('#quickSignup .print-error-msg-three').hide();
                    $("#quickSignup .print-success-msg-three").find("ul").html('<li>'+data.success+'</li>');
                    $('#quickSignup .print-success-msg-three').show();
                    prop.attr("disabled", false);
                    // prop.attr("disabled", false);
                }else{
                    $('#quickSignup .print-success-msg-three').hide();
                    printErrorMsgThree(data.error);
                    prop.attr("disabled", false);
                }
            }
        });
    });

    $('body').on('click', '.sendMailAll', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.attr("disabled", true);

        let _token = $("input[name='_token']").val();
        let email = $("#emailAll").val();
        $.ajax({
            url: "/register/resend/verification/code",
            type:'POST',
            data: {_token:_token, email:email},
            error: function(error){
                $('#quickSignupAll .print-success-msg-all-three').hide();
                $("#quickSignupAll .print-error-msg-all-three").find("ul").html('<li>Error while sending mail, try again later.</li>');
                $('#quickSignupAll .print-error-msg-all-three').show();
                prop.attr("disabled", false);
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $('#quickSignupAll .print-error-msg-all-three').hide();
                    $("#quickSignupAll .print-success-msg-all-three").find("ul").html('<li>'+data.success+'</li>');
                    $('#quickSignupAll .print-success-msg-all-three').show();
                    prop.attr("disabled", false);
                    // prop.attr("disabled", false);
                }else{
                    $('#quickSignupAll .print-success-msg-three').hide();
                    printErrorMsgThreeAll(data.error);
                    prop.attr("disabled", false);
                }
            }
        });
    });

    $('body').on('click', '.openSignup', function(){
        $('#fPassword').modal('hide');
        $('#quickLogin').modal('hide');
        $('#quickSignup').modal('hide');
        $('.modal-backdrop').hide();
        $('#quickSignupAll').modal('show').fadeIn("slow");
    });

    $('body').on('click', '.openLogin', function(){
        $('#fPassword').modal('hide');
        $('#quickSignupAll').modal('hide');
        $('#quickSignup').modal('hide');
        $('.modal-backdrop').hide();
        $('#quickLogin').modal('show').fadeIn("slow");
    });

    $('body').on('click', '.fpasswordModal', function(){
        $('#quickSignupAll').modal('hide');
        $('#quickSignup').modal('hide');
        $('#quickLogin').modal('hide');
        $('.modal-backdrop').hide();
        $('#fPassword').modal('show').fadeIn("slow");
    });

    $('body').on('click', '.btnclass', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        $('.formClass').submit();
    });

    $('body').on('click', '.syncSelectOpt ul li', function(){
        $('.syncSelectOpt ul li').each(function(){
            $(this).removeClass('syn-option');
        });
        $(this).addClass('syn-option');
        let selectType = $(this).attr('rel');
        if(selectType == 'email'){
            $('.csvUploadFnd').hide();
            $('#addr').show();
        }else if(selectType == 'csv'){
            $('#csvUploadEmails').trigger('click');
            $('#addr').hide();
            $('.csvUploadFnd').show();
        }else{
            $('.csvUploadFnd').hide();
            $('#addr').hide();
        }
        $('#syncType').val(selectType);
        $('#syncRedirect').val($(this).attr('rel1'));
        $('.emailErrorMsg').hide();
    });

    $('body').on('click', '.syncBtn', function(e){
        e.preventDefault();
        let typeSlt = $('#syncType').val();
        if(typeSlt == 'email'){
            let txtAreaVal = $('#addr').val();
            if(txtAreaVal == ''){
                $('.emailErrorMsg ul li').text('Please enter email!');
                $('.emailErrorMsg').show();
                return false;
            }else{
                $('.emailErrorMsg').hide();
                let emails = txtAreaVal.replace(/\s/g,'').split(",");
                let valid = true;
                let regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                for (let i = 0; i < emails.length; i++) {
                    if( emails[i] == "" || ! regex.test(emails[i])){
                        valid = false;
                    }
                }
                if(!valid){
                    $('.emailErrorMsg ul li').text('Please enter valid email!');
                    $('.emailErrorMsg').show();
                    return false;
                }
            }
        }

        // if(typeSlt == 'csv'){
        //     if( document.getElementById("csvUploadEmails").files.length == 0 ){
        //         $('.emailErrorMsg ul li').text('Please enter valid emails and should be comma separated!');
        //         $('.emailErrorMsg').show();
        //     }
        // }

        $('.emailErrorMsg').hide();

        if(typeSlt == 'google'){
        //     window.location.href = $('#syncRedirect').val();
            return false;
        }

        if(typeSlt == 'outlook'){
            // window.location.href = $('#syncRedirect').val();
            return false;
        }
        
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);

        $('.formSubmit').submit();
    });


    $('body').on('click', '#selectAll', function(){
        if($(this).prop("checked")){
            $('.usr-card').each(function(){
                $(this).find('.checkUser').prop('checked', true);
            });
        }else{
            $('.usr-card').each(function(){
                $(this).find('.checkUser').prop('checked', false);
            });
        }
    });

    $('body').on('click', '.btnSubmitUsrSlt', function(){
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        $('.formClass').submit();
    });

    $('body').on('click', '#sendMailsInvties', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        let href = $(this).attr("rel");
        prop.css({
            'pointer-events': 'none'
        });
        window.location = href;
    });

    $('body').on('click', '#freeResumePop', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.attr("disabled", true);
        let href = $(this).attr("rel");
        window.location = href;
    });

    $('body').on('change', '#csvUploadEmails', function(){
        let fileName = document.getElementById('csvUploadEmails').files[0].name;
        $('.csvUploadFnd span').html(fileName);
    });

    //screen one employer
    $("body").on('click', '#employerSignupBtn', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        let _token = $("input[name='_token']").val();
        let email = $("#empSingupEmail").val();
        let password = $("#empSingupPassword").val();
    
        $.ajax({
            url: "/register/employer-first",
            type:'POST',
            data: {_token:_token, email:email, password:password},
            error: function(error){
                $("#quickEmployerHomeSignup .signup-wrap .print-error-msg").find("ul").html('<li>Error while saving data, try again later.</li>');
                $('#quickEmployerHomeSignup .signup-wrap .print-error-msg').show();
                prop.html("Next");
                prop.attr("disabled", false);
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $('#quickEmployerHomeSignup .signup-two').show();
                    $('#quickEmployerHomeSignup .signup-one').hide();
                }else{
                    printEmployerErrorMsg(data.error);
                    prop.html("Next");
                    prop.attr("disabled", false);
                }
            }
        });
    }); 
    
    function printEmployerErrorMsg (msg) {
        $("#quickEmployerHomeSignup .signup-wrap .print-error-msg").find("ul").html('');
        $("#quickEmployerHomeSignup .signup-wrap .print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $("#quickEmployerHomeSignup .signup-wrap .print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }

    // country search
    var ajaxReq = null;
    $('body').on('keyup', '.countrySearch', function(e){
        let _token = $("input[name='_token']").val();
        let countryName = $(this).val();
        if (ajaxReq != null) ajaxReq.abort();
        
        if(countryName.length >=3){
            ajaxReq = $.ajax({
                url: "/register/get-countries",
                type:'POST',
                data: {_token:_token, countryName:countryName},
                error: function(error){
                    let htmlAppend = "<li>Error while fetching</li>";
                    $('.country-list-data').html(htmlAppend);
                },
                success: function(data) {
                    // console.log(data);
                    $('.country-list-data').html('');
                    if(data.success.length >= 1){
                        data.success.forEach(itm => {
                            if (itm.name) {
                                let countryNameJson = JSON.parse(itm.name);
                                let htmlAppend = "<li class='sltContry' rel='"+itm.id+"'>"+countryNameJson.en+"</li>"
                                $('.country-list-data').append(htmlAppend);
                            }
                        });
                    }else{
                        let htmlAppend = "<li>No Data Found</li>";
                        $('.country-list-data').html(htmlAppend);
                    }
                    $('.country-wrap').show();
                }
            });
        }else{
            $('.country-wrap').hide();
        }
    });

    $('body').on('click', '.sltContry', function(e){
        e.preventDefault();
        let countryId = $(this).attr('rel');
        let countryName = $(this).text();
        $('.employerCountryId').val(countryId);
        $('.countrySearch').val(countryName);
        $('.country-wrap').hide();
        
    });

    // screen two employer
    $("body").on('click', '#employersignupBtnWSecond', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        let _token = $("input[name='_token']").val();
        let firstName = $("#emp_first_name").val();
        let lastName = $("#emp_last_name").val();
        let countryName = $("#emp_country").val();
        let country = $("#quickEmployerHomeSignup .employerCountryId").val();
        let email = $("#empSingupEmail").val();
   
        $.ajax({
            url: "/register/employer-second",
            type:'POST',
            data: {_token:_token, first_name:firstName, last_name:lastName, country:country, email:email, countryName:countryName},
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $('#quickEmployerHomeSignup .signup-two').hide();
                    $('#quickEmployerHomeSignup .signup-three').show();
                }else{
                    printEmployerErrorMsgTwo(data.error);
                    prop.html("Submit");
                    prop.attr("disabled", false);
                }
            }
        });
    }); 
   
    function printEmployerErrorMsgTwo (msg) {
        $("#quickEmployerHomeSignup .signup-wrap .print-error-msg-two").find("ul").html('');
        $("#quickEmployerHomeSignup .signup-wrap .print-error-msg-two").css('display','block');
        $.each( msg, function( key, value ) {
            $("#quickEmployerHomeSignup .signup-wrap .print-error-msg-two").find("ul").append('<li>'+value+'</li>');
        });
    }

    // screen three worker
    $("body").on('click', '#employersignupBtnWThird', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        let _token = $("input[name='_token']").val();
        let code = $("#quickemployer_code").val();
        let email = $("#empSingupEmail").val();
    
        $.ajax({
            url: "/register/worker-third",
            type:'POST',
            data: {_token:_token, code:code, email:email},
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $('#quickEmployerHomeSignup .print-error-msg-three').hide();
                    $("#quickEmployerHomeSignup .print-success-msg-three").find("ul").html('<li>'+data.success+'</li>');
                    $('#quickEmployerHomeSignup .print-success-msg-three').show();
                    prop.html("Submit");
                    location.reload();
                    // prop.attr("disabled", false);
                }else{
                    $('#quickEmployerHomeSignup .print-success-msg-three').hide();
                    printErrorEmpMsgThree(data.error);
                    prop.html("Submit");
                    prop.attr("disabled", false);
                }
            }
        });
    }); 
    
    function printErrorEmpMsgThree(msg) {
        $("#quickEmployerHomeSignup .print-error-msg-three").find("ul").html('');
        $("#quickEmployerHomeSignup .print-error-msg-three").css('display','block');
        $.each( msg, function( key, value ) {
            $("#quickEmployerHomeSignup .print-error-msg-three").find("ul").append('<li>'+value+'</li>');
        });
    }

    $('body').on('click', '.sendMailEmployer', function(e){
        e.preventDefault();
        let prop = $(this);
        prop.attr("disabled", true);

        let _token = $("input[name='_token']").val();
        let email = $("#empSingupEmail").val();
        $.ajax({
            url: "/register/resend/verification/code",
            type:'POST',
            data: {_token:_token, email:email},
            error: function(error){
                $('#quickEmployerHomeSignup .print-success-msg-three').hide();
                $("#quickEmployerHomeSignup .print-error-msg-three").find("ul").html('<li>Error while sending mail, try again later.</li>');
                $('#quickEmployerHomeSignup .print-error-msg-three').show();
                prop.attr("disabled", false);
            },
            success: function(data) {
                if($.isEmptyObject(data.error)){
                    $('#quickEmployerHomeSignup .print-error-msg-three').hide();
                    $("#quickEmployerHomeSignup .print-success-msg-three").find("ul").html('<li>'+data.success+'</li>');
                    $('#quickEmployerHomeSignup .print-success-msg-three').show();
                    prop.attr("disabled", false);
                    // prop.attr("disabled", false);
                }else{
                    $('#quickEmployerHomeSignup .print-success-msg-three').hide();
                    printErrorEmpMsgThree(data.error);
                    prop.attr("disabled", false);
                }
            }
        });
    });

    $('body').on('click', '#signupBtnWSecondSocial', function(e){
        e.preventDefault();
        let prop = $(this);
        let countryName = $('#socialCountryName').val();
        let cityId = $('#socialFillSignup .workerCityId').val();
        if(countryName == ''){
            $("#socialFillSignup .soical-error-msgs").find("ul").html('<li>Country field cannot be blank!</li>');
            $('#socialFillSignup .soical-error-msgs').show();
            return false;
        }
        if(cityId == ''){
            $("#socialFillSignup .soical-error-msgs").find("ul").html('<li>City field cannot be blank!</li>');
            $('#socialFillSignup .soical-error-msgs').show();
            return false;
        }
        prop.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
        prop.attr("disabled", true);
        $('#socialFillSignup .soical-error-msgs').hide();
        $('.formSubmit').submit();
    });

    // city search
    var ajaxReqCity = null;
    $('body').on('keyup', '.citySearch', function(e){
        let _token = $("input[name='_token']").val();
        let cityName = $(this).val();
        if (ajaxReqCity != null) ajaxReqCity.abort();
        
        if(cityName.length >=3){
            ajaxReqCity = $.ajax({
                url: "/register/get-cities",
                type:'POST',
                data: {_token:_token, cityName:cityName},
                error: function(error){
                    let htmlAppend = "<li>Error while fetching</li>";
                    $('.city-list-data').html(htmlAppend);
                },
                success: function(data) {
                    // console.log(data);
                    $('.city-list-data').html('');
                    if(data.success.length >= 1){
                        data.success.forEach(itm => {
                            if (itm.city) {
                                let cityNameJson = itm.city;
                                let htmlAppend = "<li class='sltCity' rel='"+itm.id+"'>"+cityNameJson+"</li>"
                                $('.city-list-data').append(htmlAppend);
                            }
                        });
                    }else{
                        let htmlAppend = "<li>No Data Found</li>";
                        $('.city-list-data').html(htmlAppend);
                    }
                    $('.city-wrap').show();
                }
            });
        }else{
            $('.city-wrap').hide();
        }
    });

    $('body').on('click', '.sltCity', function(e){
        e.preventDefault();
        let cityId = $(this).attr('rel');
        let cityName = $(this).text();
        $('.workerCityId').val(cityId);
        $('.citySearch').val(cityName);
        $('.city-wrap').hide();
        
    });
    
});

function checkUserSelectedOnSignup(prop){
    let userType = $('#userType').val();
    if(userType ==''){
        $('#quickSignupAll .help-user-error').show();
        return false;
    }
    // let hrefVal = $('#quickSignupAll .userCheckType').attr('href');
    let hrefVal = $(prop).attr('href');

    window.location.href = hrefVal+'&user_type='+userType;
    return false;
}

function workerSignup(prop){
    let hrefVal = $(prop).attr('href');

    window.location.href = hrefVal+'&user_type=2';
    return false;
}
function employerSignup(prop){
    let hrefVal = $(prop).attr('href');

    window.location.href = hrefVal+'&user_type=1';
    return false;
}
