<div class="content__home col l-12 m-12 c-12">
    <!-- content main -->
    <main class="content__main">
        <!-- heading -->
        <div class="content__main-heading-wrap">
            <h2 class="content__main-heading-title">PHIM YÊU THÍCH CỦA BẠN</h2>
        </div>
        <!-- end heading -->

        <div class="grid content__main-films">
            <div class="row">
                
            </div>
        </div>
    </main>
    <!-- end content main -->
</div>

<script>
    const getDataFilm = JSON.parse(localStorage.getItem('save-film'));
    
    var html = getDataFilm.map((film) => {
        return `
            <div class="col l-2 m-3 c-4">
                <div class="content__main-film">
                    <a href="${film.link}" title="${film.name}" class="content__main-film-link">
                        <div class="content__main-film-img-wrap">
                            <div class="content__main-film-img" style="background-image: url(${film.poster})"></div>
                            <label for="" class="content__main-film-status">${film.status}</label>
                            <!-- <label for="" class="content__main-film-quality">Tập 10 Thuyết Minh</label> -->
                            <label for="" class="content__main-film-btn">
                                <i class="fas fa-play"></i>
                            </label>
                        </div>

                        <div class="content__main-film-info">
                            <p class="content__main-film-name">${film.name}</p>
                            <p class="content__main-film-real-name">${film.real_name}</p>
                        </div>
                    </a>
                </div>
            </div>
        `;
    })

    document.querySelector('.content__main-films .row').innerHTML = html.reverse().join('');
</script>