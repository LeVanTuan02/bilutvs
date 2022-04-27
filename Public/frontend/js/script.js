window.onscroll = () => {
    var navElement = document.querySelector('.header__menu-wrap');
    var btnToTop = document.querySelector('.scroll-top-btn');
    var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;

    if(scrollTop > 60){
        btnToTop.classList.add('show');
        navElement.classList.add('fixed');
    }else{
        navElement.classList.remove('fixed');
        btnToTop.classList.remove('show');
    }

    btnToTop.onclick = () => {
        document.documentElement.scrollTop = 0;
        document.body.scrollTop = 0;
    }
}

var tabs = document.querySelectorAll('.sidebar__item-tab');
var contents = document.querySelectorAll('.sidebar__films-tab');

Array.from(tabs).forEach((tab, i) => {
    const content = contents[i];
    tab.onclick = function() {
        document.querySelector('.sidebar__item-tab.active').classList.remove('active');
        document.querySelector('.sidebar__films-tab.active').classList.remove('active');

        this.classList.add('active');
        content.classList.add('active');
    }
});

// change tab phim bộ
var tabsPhimBo = document.querySelectorAll('.content__main-heading-tab-phimbo');
var contentsPhimBo = document.querySelectorAll('.content__main-films-phimbo');

Array.from(tabsPhimBo).forEach((tab, i) => {
    const content = contentsPhimBo[i];
    tab.onclick = function() {
        document.querySelector('.content__main-heading-tab-phimbo.active').classList.remove('active');
        document.querySelector('.content__main-films-phimbo.active').classList.remove('active');

        this.classList.add('active');
        content.classList.add('active');
    }
});

// change tab phim lẻ
var tabsPhimBo = document.querySelectorAll('.content__main-heading-tab-phimle');
var contentsPhimBo = document.querySelectorAll('.content__main-films-phimle');

Array.from(tabsPhimBo).forEach((tab, i) => {
    const content = contentsPhimBo[i];
    tab.onclick = function() {
        document.querySelector('.content__main-heading-tab-phimle.active').classList.remove('active');
        document.querySelector('.content__main-films-phimle.active').classList.remove('active');

        this.classList.add('active');
        content.classList.add('active');
    }
});

var menuList = document.querySelectorAll('.header__menu-mobile-item');

Array.from(menuList).forEach((menuItem) => {
    
    menuItem.onclick = function() {
        var menuItemHeight = menuItem.parentElement.clientHeight;
        var isClosed = menuItemHeight === menuItem.clientHeight;
        if(isClosed) {
            this.parentElement.classList.add('active');
        }else {
            this.parentElement.classList.remove('active');
        }
    }
})

var menuBtn = document.querySelector('.header__menu-tablet-mobile-item-menu');
menuBtn.onclick = function(e) {
    e.preventDefault();
    document.querySelector('.header__menu-mobile').classList.add('active');
}

var overlay = document.querySelector('.header__menu-mobile-overlay');
overlay.onclick = function() {
    document.querySelector('.header__menu-mobile').classList.remove('active');
}

// alert error
var serverList = document.querySelectorAll('.content__main-film-server-item:not(.active)');
Array.from(serverList).forEach((server) => {
    server.onclick = function() {
        Swal.fire({
            icon: 'warning',
            title: 'Vui lòng quay lại sau...',
            text: 'Server đang trong quá trình thử nghiệm!',
        })
    }
});

// update total heart film
if (!localStorage.getItem('save-film')) localStorage.setItem('save-film', JSON.stringify([]));
var countFilmHeart = JSON.parse(localStorage.getItem('save-film')).length;
document.querySelector('.header__menu-tablet-mobile-label').innerText = countFilmHeart;
document.querySelector('.header__top-btn-heart').innerText = countFilmHeart;

// toast
function showToast({
    title,
    delay
}) {
    var main = document.querySelector('#toast');

    if (main) {
        var toast = document.createElement('div');

        setTimeout(function () {
            main.removeChild(toast);
        }, delay + 1000);

        toast.classList.add('toast');
        var delay = (delay/1000).toFixed();
        toast.style.animation = `fadeIn 0.7s linear, fadeOut 0.8s linear ${delay}s forwards`;
        toast.innerHTML = `
            <div class="toast__icon">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="toast__msg">${title}</div>
        `;
        main.appendChild(toast);
    }
}