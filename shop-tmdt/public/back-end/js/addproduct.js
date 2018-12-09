$(function() {
    $data = $(".btn-chose");

    $data.on("click", function () {
        let display = $(".dropdown-list-pd").css("display");
        if(display == "none") {
            $(".dropdown-list-pd").css("display","block");
        }else {
            $(".dropdown-list-pd").css("display","none");
        }
    });
});