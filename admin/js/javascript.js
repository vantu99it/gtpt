$(document).ready(function(){
    $(".setting").click(function(){
        $(".form").hide();
        $(".form_detail").show();
    })
    $(".back_admin").click(function(){
        $(".form_detail").hide();
        $(".form").show();
    })
    $(".icon-logout").click(function(){
        $(".logout").slideToggle();

    })
    $(".btn-change").click(function(){
        $(".add-category").hide();
        $(".change-category").show();

    })
    $(".btn-change").click(function(){
        $(".change-user").show();
        $(".add-user").hide();
    })
    $(".btn-change").click(function(){
        $(".add-district").hide();
        $(".change-district").show();

    })
    $(".btn-change").click(function(){
        $(".add-post").hide();
        $(".change-post").show();

    })
})