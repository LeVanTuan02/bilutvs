<?php

class HomeController extends BaseController {
    private $filmModel;
    private $countryModel;

    public function __construct() {
        parent::checkClose();
        $this->loadModel('FilmModel');
        $this->loadModel('CountryModel');
        $this->filmModel = new FilmModel();
        $this->countryModel = new CountryModel();
    }


    public function index() {
        $list_film = $this->filmModel->getAllFilm(2);
        $listShortFilm = $this->filmModel->getAllFilm(1);
        $listCategory = $this->filmModel->getAllByOption('*', 'categories');
        $listCountry = $this->filmModel->getAllByOption('*', 'national');
        $filmChina = $this->filmModel->getAllFilm(2, 2);
        $filmKorean = $this->filmModel->getAllFilm(2, 3);
        $filmThailand = $this->filmModel->getAllFilm(2, 5);
        
        $filmTheater = $this->filmModel->getAllFilm(3);
        $filmAction = $this->filmModel->getAllFilm(1, '', 7);
        $filmChineseDramas = $this->filmModel->getAllFilm(1, '', 1);
        $countryBetween = $this->countryModel->getCountryBetween('1, 2, 3, 4');

        $longFilmSidebar = $this->filmModel->getAllDataFilm(10, '', 2, 'view');
        $shortFilmSidebar = $this->filmModel->getAllDataFilm('', '', 1, 'view');
        $cartoonFilmSidebar = $this->filmModel->getAllDataFilm('', '', 2, 'view', 17);

        $this->loadView('partitions.frontend.header', [
            'listCategory' => $listCategory,
            'listCountry' => $listCountry,
            'countryBetween' => $countryBetween
        ]);
        $this->loadView('frontend.home.index', [
            'list_film' => $list_film,
            'filmChina' => $filmChina,
            'filmKorean' => $filmKorean,
            'filmThailand' => $filmThailand,
            'listShortFilm' => $listShortFilm,
            'filmTheater' => $filmTheater,
            'filmAction' => $filmAction,
            'filmChineseDramas' => $filmChineseDramas
        ]);
        $this->loadView('partitions.frontend.sidebar', [
            'longFilmSidebar' => $longFilmSidebar,
            'shortFilmSidebar' => $shortFilmSidebar,
            'cartoonFilmSidebar' => $cartoonFilmSidebar
        ]);
        $this->loadView('partitions.frontend.aside');
        $this->loadView('partitions.frontend.footer');
    }

    public function tu_phim() {
        $listCategory = $this->filmModel->getAllByOption('*', 'categories');
        $listCountry = $this->filmModel->getAllByOption('*', 'national');
        $countryBetween = $this->countryModel->getCountryBetween('1, 2, 3, 4');

        $this->loadView('partitions.frontend.header', [
            'listCategory' => $listCategory,
            'listCountry' => $listCountry,
            'countryBetween' => $countryBetween
        ]);
        $this->loadView('frontend.film.tuphim');
        $this->loadView('partitions.frontend.footer');
    }
}

?>