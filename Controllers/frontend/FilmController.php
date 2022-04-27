<?php

class FilmController extends BaseController {
    private $filmModel;
    private $countryModel;

    private $longFilmSidebar;
    private $shortFilmSidebar;
    private $cartoonFilmSidebar;

    private $countryBetween;
    private $listCategory;
    private $listCountry;

    public function __construct() {
        parent::checkClose();
        $this->loadModel('FilmModel');
        $this->loadModel('CountryModel');
        $this->filmModel = new FilmModel();
        $this->countryModel = new CountryModel();

        $this->longFilmSidebar = $this->filmModel->getAllDataFilm(10, '', 2, 'view');
        $this->shortFilmSidebar = $this->filmModel->getAllDataFilm('', '', 1, 'view');
        $this->cartoonFilmSidebar = $this->filmModel->getAllDataFilm('', '', 2, 'view', 17);

        $this->countryBetween = $this->countryModel->getCountryBetween('1, 2, 3, 4');
        $this->listCategory = $this->filmModel->getAllByOption('*', 'categories');
        $this->listCountry = $this->filmModel->getAllByOption('*', 'national');
        
        $url = $_GET['url'];
        $sessionKey = 'film_' . $url;

        if(!isset($_SESSION[$sessionKey])){
            $_SESSION[$sessionKey] = 1;
            $this->filmModel->updateView($url);
        }
    }

    public function index() {
        $url = $_GET['url'];

        $filmData = $this->filmModel->getFilmBySlug($url);
        $filmRelation = $this->filmModel->getFilmRelation($url, $filmData['cate_id'], $filmData['type_id'], $filmData['nation_id'], 4);

        $this->loadView('partitions.frontend.header', [
            'filmData' => $filmData,
            'listCategory' => $this->listCategory,
            'listCountry' => $this->listCountry,
            'countryBetween' => $this->countryBetween
        ]);
        $this->loadView('frontend.film.index', [
            'filmData' => $filmData,
            'filmRelation' => $filmRelation
        ]);
        $this->loadView('partitions.frontend.sidebar', [
            'longFilmSidebar' => $this->longFilmSidebar,
            'shortFilmSidebar' => $this->shortFilmSidebar,
            'cartoonFilmSidebar' => $this->cartoonFilmSidebar
        ]);
        $this->loadView('partitions.frontend.footer');
    }

    public function player() {
        $url = $_GET['url'];
        $tap = $_GET['episode'];

        $totalEpisodeCurrent = $this->filmModel->getToTalEpisodesCurrent($url);
        $filmData = $this->filmModel->getFilmBySlug($url, $tap);
        $filmRelation = $this->filmModel->getFilmRelation($url, $filmData['cate_id'], $filmData['type_id'], $filmData['nation_id'], 4);

        $this->loadView('partitions.frontend.header', [
            'filmData' => $filmData,
            'tap' => $tap,
            'listCategory' => $this->listCategory,
            'listCountry' => $this->listCountry,
            'countryBetween' => $this->countryBetween
        ]);
        $this->loadView('frontend.film.player', [
            'filmData' => $filmData,
            'totalEpisodeCurrent' => $totalEpisodeCurrent,
            'filmRelation' => $filmRelation
        ]);
        $this->loadView('partitions.frontend.sidebar', [
            'longFilmSidebar' => $this->longFilmSidebar,
            'shortFilmSidebar' => $this->shortFilmSidebar,
            'cartoonFilmSidebar' => $this->cartoonFilmSidebar
        ]);
        $this->loadView('partitions.frontend.footer');
        
    }

}

?>