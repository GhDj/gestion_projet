function changeBottom() {
    $("#container").css( "bottom", "150%" )
}
$(document).on("click", ".front .submit", function() {
    $(".inputbox").css( "-webkit-transform", "rotateX(-90deg)" );
    $(".inputbox").css( "animation-name", "wiggle1" );
    $(".inputbox").css( "animation-duration", "1s" );
    $(".inputbox").css( "animation-delay", ".22s" );
});
$(document).on("click", ".top .submit", function() {
    $(".inputbox").css( "-webkit-transform", "rotateX(-180deg)" );
    $(".inputbox").css( "animation-name", "wiggle2" );
    $(".inputbox").css( "animation-duration", "1s" );
    $(".inputbox").css( "animation-delay", ".22s" );
});
$(document).on("click", ".back .submit", function() {
    $(".inputbox").css( "-webkit-transform", "rotateX(-270deg)" );
    $(".inputbox").css( "animation-name", "wiggle3" );
    $(".inputbox").css( "animation-duration", "1s" );
    $(".inputbox").css( "animation-delay", ".22s" );
    $("#container").css( "animation-name", "slideout" );
    $("#container").css( "animation-speed", "0.7s" );
    $("#container").css( "animation-delay", "1.5s" );
    setTimeout(changeBottom, 2000);
});