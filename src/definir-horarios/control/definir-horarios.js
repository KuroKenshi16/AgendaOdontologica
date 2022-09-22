$(document).ready(function() {
    $(window).scroll(function() {
        if (this.scrollY > 1) {
            $('.salvar').addClass("show");
        } else {
            $('.salvar').removeClass("show");
        }
    });
    $('.salvar').click(function() {
    });
});