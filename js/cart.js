
$(document).on("click", function (e) {
    if (!$(e.target).closest("#cartCheck").length) {
      $("#cartCheck").removeClass("open");
    }
  });
  
  $("#cartCheck").click(function (e) {
    $(this).addClass("open");
    e.stopPropagation();
  });
  
  $(".cancel").click(function (e) {
    $("#cartCheck").removeClass("open");
    e.stopPropagation();
  });
  