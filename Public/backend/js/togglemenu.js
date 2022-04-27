var btn = document.querySelector('.aside__btn-toggle');


var aside = document.querySelector('.aside');
btn.onclick = () => {
    aside.classList.toggle('close');
    var list_menu_text = document.querySelectorAll('.aside__menu-text');
    var list_arrow_menu = document.querySelectorAll('.aside__menu-arrow');
    var session_menu_text = document.querySelectorAll('.aside__menu-session-text');
    var session_menu_icon = document.querySelectorAll('.aside_menu-session-icon');

    if(aside.classList.contains('close')){

        if(aside.classList.contains('active', 'close')){
            document.documentElement.style.setProperty('--width-aside', '0px');
        }
        document.documentElement.style.setProperty('--width-aside', '70px');
        document.querySelector('.aside__logo-link').style.display = 'none';
        document.querySelector('.aside__btn-toggle').style.transform = 'rotateY(180deg)';
        document.querySelector('.aside header').style.justifyContent = 'center';

        // ẩn chữ menu
        Array.from(list_menu_text).forEach((item) => {
            item.style.display = 'none';
        });

        Array.from(session_menu_text).forEach((item) => {
            item.classList.add('hide');
        });

        Array.from(session_menu_icon).forEach((item) => {
            item.classList.remove('hide');
        });

        // ẩn btn arrow
        // Array.from(list_arrow_menu).forEach((item) => {
        //     item.style.display = 'none';
        // });

    }else{
        document.querySelector('.aside__btn-toggle').style.transform = 'rotateY(0deg)';
        document.querySelector('.aside__logo-link').style.display = 'block';
        document.documentElement.style.setProperty('--width-aside', '265px');
        document.querySelector('.aside header').style.justifyContent = 'space-between';

        // hiện chữ menu
        Array.from(list_menu_text).forEach((item) => {
            item.style.display = 'block';
        });

        Array.from(session_menu_text).forEach((item) => {
            item.classList.remove('hide');
        });

        Array.from(session_menu_icon).forEach((item) => {
            item.classList.add('hide');
        });

        // ẩn btn arrow
        // Array.from(list_arrow_menu).forEach((item) => {
        //     item.style.display = 'block';
        // });
    }
}

// open close user cpanel
var user_btn = document.querySelector('.header__toolbar-item');
user_btn.onclick = () => {
    document.querySelector('.user__panel-content').style.transform = 'translateX(0)';
    document.querySelector('.user__panel-overlay').classList.remove('hide');
}

var btn_close = document.querySelector('.user__panel-heading-icon');
btn_close.onclick = () => {
    document.querySelector('.user__panel-content').style.transform = 'translateX(100%)';
    document.querySelector('.user__panel-overlay').classList.add('hide');
}

var overlay = document.querySelector('.user__panel-overlay');
overlay.onclick = () => {
    document.querySelector('.user__panel-content').style.transform = 'translateX(100%)';
    document.querySelector('.user__panel-overlay').classList.add('hide');
}

// ẩn sidebar
// window.onresize = (e) => {
//     var width = e.target.innerWidth;
//     if(width <= 1023){
//         document.documentElement.style.setProperty('--width-aside', '0px');
//     }else{
//         document.documentElement.style.setProperty('--width-aside', '265px');
//     }
// }

document.querySelector('.header__top-bar').onclick = () => {
    document.querySelector('.aside').classList.toggle('active');

    if(document.querySelector('.aside').classList.contains('active')){
        document.documentElement.style.setProperty('--width-aside', '260px');
    }else{
        document.documentElement.style.setProperty('--width-aside', '0px');
    }
}