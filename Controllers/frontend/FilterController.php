<?php

class FilterController extends BaseController {
    private $slug;
    private $filmModel;
    private $countryModel;
    private $categoryModel;
    private $orderList;

    private $longFilmSidebar;
    private $shortFilmSidebar;
    private $cartoonFilmSidebar;

    private $countryBetween;
    private $listCategory;
    private $listCountry;
    private $listType;

    public function __construct() {
        parent::checkClose();
        $this->slug = $_GET['slug'] ?? '';
        $this->loadModel('FilmModel');
        $this->loadModel('CategoryModel');
        $this->loadModel('CountryModel');
        $this->filmModel = new FilmModel();
        $this->categoryModel = new CategoryModel();
        $this->countryModel = new CountryModel();
        $this->orderList = array(
            'year' => 'Năm xuất bản',
            'name' => 'Tên phim',
            'view' => 'Lượt xem'
        );

        $this->longFilmSidebar = $this->filmModel->getAllDataFilm(10, '', 2, 'view');
        $this->shortFilmSidebar = $this->filmModel->getAllDataFilm('', '', 1, 'view');
        $this->cartoonFilmSidebar = $this->filmModel->getAllDataFilm('', '', 2, 'view', 17);

        $this->countryBetween = $this->countryModel->getCountryBetween('1, 2, 3, 4');

        $this->listCategory = $this->categoryModel->getAllByOption('*', 'categories');
        $this->listCountry = $this->filmModel->getAllByOption('*', 'national');
        $this->listType = $this->categoryModel->getAllByOption('*', 'type');
    }

    public function index() {
        $order = $_GET['order'] ?? '';
        $type = $_GET['type'] ?? '';
        $cate = $_GET['cate'] ?? '';
        $country = $_GET['country'] ?? '';
        $year = $_GET['year'] ?? '';

        
        
        $filmData = $this->filmModel->filterFilm($order, $type, $cate, $country, $year);

        $this->loadView('partitions.frontend.header', [
            'listCategory' => $this->listCategory,
            'listCountry' => $this->listCountry,
            'countryBetween' => $this->countryBetween
        ]);
        $this->loadView('frontend.filter.index', [
            'filmData' => $filmData,
            'listCountry' => $this->listCountry,
            'listCategory' => $this->listCategory,
            'listType' => $this->listType,
            'orderList' => $this->orderList,
            'type' => $type,
            'cate' => $cate,
            'country' => $country,
            'year' => $year,
            'order' => $order
        ]);
        $this->loadView('partitions.frontend.sidebar', [
            'longFilmSidebar' => $this->longFilmSidebar,
            'shortFilmSidebar' => $this->shortFilmSidebar,
            'cartoonFilmSidebar' => $this->cartoonFilmSidebar
        ]);
        $this->loadView('partitions.frontend.footer');
    }

    public function search() {
        $key = $_GET['q'] ?? '';

        $filmData = $this->filmModel->getFilmByKey($key);

        $this->loadView('partitions.frontend.header', [
            'listCategory' => $this->listCategory,
            'listCountry' => $this->listCountry,
            'countryBetween' => $this->countryBetween
        ]);
        $this->loadView('frontend.filter.search', [
            'filmData' => $filmData,
            'listCountry' => $this->listCountry,
            'listCategory' => $this->listCategory,
            'listType' => $this->listType,
            'orderList' => $this->orderList
        ]);
        $this->loadView('partitions.frontend.sidebar', [
            'longFilmSidebar' => $this->longFilmSidebar,
            'shortFilmSidebar' => $this->shortFilmSidebar,
            'cartoonFilmSidebar' => $this->cartoonFilmSidebar
        ]);
        $this->loadView('partitions.frontend.footer');
    }

    public function long_film() {

        if (!$this->slug) {
            $countryName = '';
            $filmData = $this->filmModel->getFilmByCountryAndType('', 2);
        } else {
            $countryName = $this->countryModel->findCountryBySlug($this->slug)['nation_name'];
            $filmData = $this->filmModel->getFilmByCountryAndType($this->slug, 2);
        }

        $this->loadView('partitions.frontend.header', [
            'listCategory' => $this->listCategory,
            'listCountry' => $this->listCountry,
            'countryBetween' => $this->countryBetween
        ]);
        $this->loadView('frontend.filter.longfilm', [
            'countryName' => $countryName,
            'filmData' => $filmData,
            'listCountry' => $this->listCountry,
            'listCategory' => $this->listCategory,
            'listType' => $this->listType,
            'orderList' => $this->orderList
        ]);
        $this->loadView('partitions.frontend.sidebar', [
            'longFilmSidebar' => $this->longFilmSidebar,
            'shortFilmSidebar' => $this->shortFilmSidebar,
            'cartoonFilmSidebar' => $this->cartoonFilmSidebar
        ]);
        $this->loadView('partitions.frontend.footer');
    }

    public function short_film() {

        if (!$this->slug) {
            $countryName = '';
            $filmData = $this->filmModel->getFilmByCountryAndType('', 1);
        } else {
            $countryName = $this->countryModel->findCountryBySlug($this->slug)['nation_name'];
            $filmData = $this->filmModel->getFilmByCountryAndType($this->slug, 1);
        }

        $this->loadView('partitions.frontend.header', [
            'listCategory' => $this->listCategory,
            'listCountry' => $this->listCountry,
            'countryBetween' => $this->countryBetween
        ]);
        $this->loadView('frontend.filter.shortfilm', [
            'countryName' => $countryName,
            'filmData' => $filmData,
            'listCountry' => $this->listCountry,
            'listCategory' => $this->listCategory,
            'listType' => $this->listType,
            'orderList' => $this->orderList
        ]);
        $this->loadView('partitions.frontend.sidebar', [
            'longFilmSidebar' => $this->longFilmSidebar,
            'shortFilmSidebar' => $this->shortFilmSidebar,
            'cartoonFilmSidebar' => $this->cartoonFilmSidebar
        ]);
        $this->loadView('partitions.frontend.footer');
    }

    public function country() {
        $countryName = $this->countryModel->findCountryBySlug($this->slug);
        $filmData = $this->filmModel->getFilmByCountry($this->slug);

        $this->loadView('partitions.frontend.header', [
            'listCategory' => $this->listCategory,
            'listCountry' => $this->listCountry,
            'countryBetween' => $this->countryBetween
        ]);
        $this->loadView('frontend.filter.country', [
            'countryName' => $countryName,
            'filmData' => $filmData,
            'listCountry' => $this->listCountry,
            'listCategory' => $this->listCategory,
            'listType' => $this->listType,
            'orderList' => $this->orderList
        ]);
        $this->loadView('partitions.frontend.sidebar', [
            'longFilmSidebar' => $this->longFilmSidebar,
            'shortFilmSidebar' => $this->shortFilmSidebar,
            'cartoonFilmSidebar' => $this->cartoonFilmSidebar
        ]);
        $this->loadView('partitions.frontend.footer');
    }

    public function category() {
        $cateName = $this->categoryModel->findCateBySlug($this->slug);
        $filmData = $this->filmModel->getFilmByCate($this->slug);

        $this->loadView('partitions.frontend.header', [
            'listCategory' => $this->listCategory,
            'listCountry' => $this->listCountry,
            'countryBetween' => $this->countryBetween
        ]);
        $this->loadView('frontend.filter.category', [
            'cateName' => $cateName,
            'filmData' => $filmData,
            'listCountry' => $this->listCountry,
            'listCategory' => $this->listCategory,
            'listType' => $this->listType,
            'orderList' => $this->orderList
        ]);
        $this->loadView('partitions.frontend.sidebar', [
            'longFilmSidebar' => $this->longFilmSidebar,
            'shortFilmSidebar' => $this->shortFilmSidebar,
            'cartoonFilmSidebar' => $this->cartoonFilmSidebar
        ]);
        $this->loadView('partitions.frontend.footer');
    }

    public function year() {
        $filmData = $this->filmModel->getFilmByYear($this->slug);

        $this->loadView('partitions.frontend.header', [
            'listCategory' => $this->listCategory,
            'listCountry' => $this->listCountry,
            'countryBetween' => $this->countryBetween
        ]);
        $this->loadView('frontend.filter.year', [
            'filmData' => $filmData,
            'listCountry' => $this->listCountry,
            'listCategory' => $this->listCategory,
            'listType' => $this->listType,
            'year' => $this->slug,
            'orderList' => $this->orderList
        ]);
        $this->loadView('partitions.frontend.sidebar', [
            'longFilmSidebar' => $this->longFilmSidebar,
            'shortFilmSidebar' => $this->shortFilmSidebar,
            'cartoonFilmSidebar' => $this->cartoonFilmSidebar
        ]);
        $this->loadView('partitions.frontend.footer');
    }

    public function new_film() {
        $filmData = $this->filmModel->getAllDataFilm('', '', 2);

        $this->loadView('partitions.frontend.header', [
            'listCategory' => $this->listCategory,
            'listCountry' => $this->listCountry,
            'countryBetween' => $this->countryBetween
        ]);
        $this->loadView('frontend.filter.newfilm', [
            'filmData' => $filmData,
            'listCountry' => $this->listCountry,
            'listCategory' => $this->listCategory,
            'listType' => $this->listType,
            'orderList' => $this->orderList
        ]);
        $this->loadView('partitions.frontend.sidebar', [
            'longFilmSidebar' => $this->longFilmSidebar,
            'shortFilmSidebar' => $this->shortFilmSidebar,
            'cartoonFilmSidebar' => $this->cartoonFilmSidebar
        ]);
        $this->loadView('partitions.frontend.footer');
    }

    public function chieu_rap() {
        $filmData = $this->filmModel->getAllDataFilm('', '', 3);

        $this->loadView('partitions.frontend.header', [
            'listCategory' => $this->listCategory,
            'listCountry' => $this->listCountry,
            'countryBetween' => $this->countryBetween
        ]);
        $this->loadView('frontend.filter.chieurap', [
            'filmData' => $filmData,
            'listCountry' => $this->listCountry,
            'listCategory' => $this->listCategory,
            'listType' => $this->listType,
            'orderList' => $this->orderList
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