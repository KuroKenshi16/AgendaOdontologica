$(document).ready(function() {
    $(window).scroll(function() {
        if (this.scrollY > 20) {
            $('.navbar').addClass("sticky");
        } else {
            $('.navbar').removeClass("sticky");
        }
        if (this.scrollY > 500) {
            $('.scroll-up-btn').addClass("show");
        } else {
            $('.scroll-up-btn').removeClass("show");
        }
    });
    $('.scroll-up-btn').click(function() {
        $('html').animate({ scrollTop: 0 });
    });

    var typed = new Typed(".typing", {
        strings: ["Agendamento", "Cadastro"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });
    var typed = new Typed(".typing-2", {
        strings: ["Kakazu","&","Gondo"],
        typeSpeed: 250,
        backSpeed: 200,
        loop: true
    });

    $('.menu-btn').click(function() {
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });
    $('.carousel').owlCarousel({
        margin: 20,
        loop: true,
        autoplayTimeOut: 2000,
        autoplayHoverPauser: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: false
            }
        }
    });
});

function iniciaModal(modalID) {
    const modal = document.getElementById(modalID);
    modal.classList.add('mostrar');
    modal.addEventListener('click', (e) => {
        if(e.target.id == modalID || e.target.className == 'fechar') {
            modal.classList.remove('mostrar');
            e.preventDefault();
        }
    })
}

    const select = document.querySelector('.card-doutor')
    select.addEventListener('click', function() {
        iniciaModal('modal-info');
    });
