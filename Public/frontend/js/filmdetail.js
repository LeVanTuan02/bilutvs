// show list phim
var btnListPhim = document.querySelector('.content__main-film-tab-item-btn-listphim');
var listPhim = document.querySelector('.content__player-film-details.hidden');
if(listPhim){
    btnListPhim.onclick = (e) => {
        e.preventDefault();
        listPhim.classList.remove('hidden');
    }
}
// sort phim
var inputElementSort = document.querySelector('.content__player-film-search-input');
var episodeList = document.querySelectorAll('.content__player-film-episodes .content__player-film-episode-link');
var dataEpisode = Array.from(episodeList).reduce((result, episode) => {
    var episodeStr = episode.innerText;
    
    var dataEpisode = {
        episodeNumber: episodeStr,
        link: episode.href
    };
    result.push(dataEpisode);
    return result;
}, []);

var resultBlock = document.querySelector('.content__player-film-search-result');
inputElementSort.oninput = (e) => {
    var episode = dataEpisode.find((item) => {
        var numEpisode = item.episodeNumber.slice(item.episodeNumber.indexOf(' ') + 1);
        return e.target.value === numEpisode;
    });

    if(episode){
        resultBlock.innerHTML = `<a href="${episode.link}" class="content__player-film-episode-link">${episode.episodeNumber}</a>`;
    }else{
        resultBlock.innerHTML = '';
    }
}