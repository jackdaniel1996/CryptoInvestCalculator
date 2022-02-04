$(document).ready(function(){
    var darkmode = localStorage.getItem('darkmode');
    if(darkmode == 1){
        $('body').addClass('darkmode');
    }else{
        $('body').removeClass('darkmode');
    }

    $('#darkmodeBtn').click(function(){
        $('body').addClass('darkmode');
        localStorage.setItem('darkmode', 1);
    });

    $('#lightmodeBtn').click(function(){
        $('body').removeClass('darkmode');
        localStorage.setItem('darkmode', 0);
    });
});

