function createFilm(name, real_name, poster, link, status) {
    let filmObject = {};

    filmObject.name = name;
    filmObject.real_name = real_name;
    filmObject.poster = poster;
    filmObject.link = link;
    filmObject.status = status;

    return filmObject;
}

let iconHeart = document.querySelector('.content__main-film-view-icon');
let labelHeartElementTablet = document.querySelector('.header__menu-tablet-mobile-label');
let labelHeartElementPc = document.querySelector('.header__top-btn-heart');

iconHeart.onclick = function () {
    let name = document.querySelector('.content__main-film-info-name').innerText;
    let real_name = document.querySelector('.content__main-film-info-real-name').innerText;
    let poster = document.querySelector('.content__main-film-thumbnail').style.backgroundImage.slice(5, -2);
    let status = document.querySelector('.content__main-film-detail-stt').innerText;

    if (status.indexOf('VIETSUB') != -1) status = status.slice(0, status.lastIndexOf(' '));
    let link = window.location.href;
    let filmData = createFilm(name, real_name, poster, link, status);

    let filmArray = JSON.parse(localStorage.getItem('save-film'));
    let isExistFilm = filmArray.some((film) => {
        return film.name === name;
    })

    if (!isExistFilm) {
        filmArray.push(filmData);
        localStorage.setItem('save-film', JSON.stringify(filmArray));
        labelHeartElementTablet.innerText = filmArray.length;
        labelHeartElementPc.innerText = filmArray.length;
        iconHeart.classList.add('active');
        showToast({
            title: 'Thêm phim vào danh sách Yêu Thích',
            delay: 3000
        })
    } else {
        filmArray.forEach((film, index) => {
            if (film.name === name) {
                filmArray.splice(index, 1);
                localStorage.setItem('save-film', JSON.stringify(filmArray));
            }
        });
        labelHeartElementTablet.innerText = filmArray.length;
        labelHeartElementPc.innerText = filmArray.length;
        iconHeart.classList.remove('active');
        showToast({
            title: 'Xoá phim khỏi danh sách Yêu Thích',
            delay: 3000
        })
    }

}
let nameFilm = document.querySelector('.content__main-film-info-name').innerText;
let filmArray = JSON.parse(localStorage.getItem('save-film'));
let isExistFilm = filmArray.some((film) => {
    return film.name === nameFilm;
})

if (isExistFilm) {
    iconHeart.classList.add('active');
}