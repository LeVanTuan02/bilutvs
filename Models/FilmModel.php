<?php

class FilmModel extends BaseModel {
    const TABLE_NAME = 'films';

    public function getDate() {
        return date('Y-m-d H:i:s');
    }

    public function getAllFilm($type = '', $country = '', $cate = '') {
        $query = "SELECT films.name, films.poster, films.slug,
        status.status_name, films.real_name, max(film_episode.tap) AS total,
        films.total_episode
        FROM
        ((films LEFT JOIN film_episode ON films.id = film_episode.id_film)
        LEFT JOIN status ON films.status = status.id)
        WHERE NOT status = 0";

        if ($type) {
            $query .= " AND films.type_id = ${type}";
        }

        if ($country) {
            $query .= " AND films.nation_id = ${country}";
        }

        if ($cate) {
            $query .= " AND films.cate_id = ${cate}";
        }

        $query .= " GROUP BY films.id
        ORDER BY films.id DESC
        LIMIT 12";
        return $this->query($query);
    }

    public function getFilmById($id) {
        $query = "SELECT * FROM films WHERE id = $id";
        return $this->query_one($query);
    }

    public function getFilmBySlug($slug, $tap = '') {
        $query = "SELECT films.`name`, films.real_name, films.poster, films.thumbnail, films.cate_id,
        films.total_episode, films.description, films.`year`, national.nation_name, films.nation_id,
        MAX(film_episode.tap) AS episodeCurrent, films.view, films.slug, categories.cate_name,
        film_episode.link_player, film_episode.tap, national.slug AS nation_slug, films.type_id, status.status_name
        FROM
        ((((films LEFT JOIN film_episode ON films.id = film_episode.id_film)
        LEFT JOIN national ON films.nation_id = national.id)
        LEFT JOIN categories ON categories.id = films.cate_id)
        LEFT JOIN status ON films.status = status.id)
        WHERE films.slug = '${slug}'";

        if ($tap) {
            $query .= " AND film_episode.tap = ${tap}";
        }

        $query .= " GROUP BY films.id";

        return $this->query_one($query);
    }

    // public function getNameFilmBySlug($slug) {
    //     $query = "SELECT name FROM films WHERE slug = '${slug}'";
    //     return $this->query_one($query)['name'];
    // }

    public function getEpisodesBySlug($slug, $tap) {
        $query = "SELECT * FROM films INNER JOIN film_episode ON films.id = film_episode.id_film WHERE films.slug = '${slug}' AND film_episode.tap = ${tap}";
        return $this->query_one($query);
    }

    public function getToTalEpisodesCurrent($slug) {
        $query = "SELECT * FROM films INNER JOIN film_episode ON films.id = film_episode.id_film WHERE films.slug = '${slug}'";
        return $this->getNumRows($query);
    }

    public function getFilm($select = '*'){
        $query = "SELECT ${select} FROM " . self::TABLE_NAME;
        return $this->query_one($query);
    }

    public function getTotalEpisodes($slug) {
        $query = "SELECT total_episode FROM " . self::TABLE_NAME . " WHERE slug = '${slug}'";
        return $this->query_one($query);
    }

    public function getFilmByOption($select, $column, $value) {
        $query = "SELECT ${select} FROM " . self::TABLE_NAME . " WHERE ${column} = '${value}'";
        return $this->query_one($query);
    }

    public function getAllByOption($select, $table, $column = 1, $value = 1) {
        $query = "SELECT ${select} FROM ${table} WHERE ${column} = '${value}'";
        return $this->query($query);
    }

    public function updateView($slug) {
        $query = "UPDATE " . self::TABLE_NAME . " SET view = view + 1 WHERE slug = '${slug}'";
        return $this->execute($query);
    }

    // public function getNational($slug) {
    //     $query = "SELECT nation_name FROM films INNER JOIN national ON films.nation_id = national.id WHERE films.slug = '${slug}'";
    //     return $this->query_one($query);
    // }

    // public function getCategory($slug) {
    //     $query = "SELECT cate_name FROM films INNER JOIN categories ON films.cate_id = categories.id WHERE films.slug = '${slug}'";
    //     return $this->query_one($query);
    // }

    public function getAllDataFilm($start = '', $limit = '', $type = '', $order = '', $cate = '') {
        $query = "SELECT films.id, films.slug, films.`name`, films.real_name, films.`view`, films.total_episode,
        films.`year`, films.`status`, COUNT(film_episode.tap) AS totalEpisodeCurrent, films.poster
        FROM
        ((((films LEFT JOIN categories ON films.cate_id = categories.id)
        LEFT JOIN national ON films.nation_id = national.id)
        LEFT JOIN type ON films.type_id = type.id)
        LEFT JOIN film_episode ON film_episode.id_film = films.id)
        WHERE 1";
        
        if ($type) {
            $query .= " AND films.type_id = ${type}";
        }

        if ($cate) {
            $query .= " AND films.cate_id = ${cate}";
        }

        if ($order) {
            $query .= " GROUP BY films.id ORDER BY ${order} DESC";    
        } else {
            $query .= " GROUP BY films.id ORDER BY films.id DESC";
        }

        if ($limit) {
            $query .= " LIMIT ${start}, ${limit}";
        } else if ($start) {
            $query .= " LIMIT ${start}";
        }

        
        return $this->query($query);
    }

    public function getDataFilmById($id) {
        $query = "SELECT films.id, films.`name`, films.real_name, films.`view`, films.total_episode,
        films.`year`, films.`status`, COUNT(film_episode.tap) AS totalEpisodeCurrent, films.poster,
        films.slug, films.thumbnail, national.nation_name, categories.cate_name, type.type_name, films.description, films.status
        FROM
        ((((films LEFT JOIN categories ON films.cate_id = categories.id)
        LEFT JOIN national ON films.nation_id = national.id)
        LEFT JOIN type ON films.type_id = type.id)
        LEFT JOIN film_episode ON film_episode.id_film = films.id)
        WHERE films.id = ${id}
        GROUP BY films.id";
        return $this->query_one($query);
    }

    public function uppercaseFirstChar($str) {
        function mb_ucfirst($str) {
            $firstChar = mb_substr($str, 0, 1);
            $then = mb_substr($str, 1);
            return mb_strtoupper($firstChar).$then;
        }
        
        $exploreToArray = explode(' ', $str);
        $newArray = array();
        foreach ($exploreToArray as $str) {
            array_push($newArray, mb_ucfirst($str));
        }
        return implode(' ', $newArray);
    }

    public function checkExits($column, $value) {
        $query = "SELECT * FROM " . self::TABLE_NAME . " WHERE ${column} = '${value}'";
        return $this->getNumRows($query);
    }

    public function addFilm($column = [], $value = []) {
        $column = implode(', ', $column);
        $valueArray = array();
        foreach($value as $value) {
            array_push($valueArray, "'$value'");
        }
        $newValue = implode(', ', $valueArray);

        $query = "INSERT INTO " . self::TABLE_NAME ."(${column}) VALUES($newValue)";
        return $this->execute($query);
    }

    public function update($name, $realName, $slug, $poster, $thumbnail, $totalEpisode, $year, $nation, $cateId, $typeId, $status, $description, $id) {
        $realName = str_replace('\'', '\'\'', $realName);
        $query = "UPDATE " . self::TABLE_NAME . " SET
        name = '${name}',
        real_name = '${realName}',
        slug = '${slug}',
        poster = '${poster}',
        thumbnail = '${thumbnail}',
        total_episode = ${totalEpisode},
        year = ${year},
        nation_id = ${nation},
        cate_id = ${cateId},
        type_id = ${typeId},
        status = ${status},
        description = '${description}'
        WHERE id = ${id}
        ";
        return $this->execute($query);
    }

    public function getSummary() {
        $query = "SELECT * FROM " . self::TABLE_NAME;
        return $this->getNumRows($query);
    }

    public function deleteFilm($id) {
        $query = "DELETE FROM " . self::TABLE_NAME . " WHERE id = ${id}";
        return $this->execute($query);
    }

    public function getFilmByCate($slug) {
        $query = "SELECT films.`name`, films.poster, films.slug AS slug_film, films.real_name, MAX(film_episode.tap) AS episodeCurrent
        FROM ((films INNER JOIN categories ON films.cate_id = categories.id)
        INNER JOIN film_episode ON films.id = film_episode.id_film)
        WHERE categories.slug = '${slug}'
        GROUP BY films.id
        ORDER BY films.id DESC
        ";
        return $this->query($query);
    }

    public function getFilmByCountry($slug) {
        $query = "SELECT films.`name`, films.poster, films.slug AS slug_film, films.total_episode,
        films.real_name, MAX(film_episode.tap) AS episodeCurrent, status.status_name
        FROM (((films INNER JOIN national ON films.nation_id = national.id)
        INNER JOIN film_episode ON films.id = film_episode.id_film)
        LEFT JOIN status ON films.status = status.id)
        WHERE national.slug = '${slug}'
        GROUP BY films.id
        ORDER BY films.id DESC
        ";
        return $this->query($query);
    }

    public function getFilmByKey($key) {
        $query = "SELECT films.`name`, films.poster, films.slug AS slug_film, films.real_name, MAX(film_episode.tap) AS episodeCurrent
        FROM ((films INNER JOIN national ON films.nation_id = national.id)
        INNER JOIN film_episode ON films.id = film_episode.id_film)
        WHERE films.name LIKE '$key%' OR films.real_name LIKE '${key}%'
        GROUP BY films.id
        ORDER BY films.id DESC
        ";
        return $this->query($query);
    }

    public function getFilmByYear($year) {
        $query = "SELECT films.`name`, films.poster, films.slug AS slug_film, films.real_name, MAX(film_episode.tap) AS episodeCurrent
        FROM ((films INNER JOIN national ON films.nation_id = national.id)
        INNER JOIN film_episode ON films.id = film_episode.id_film)
        WHERE films.year = ${year}
        GROUP BY films.id
        ORDER BY films.id DESC
        ";
        return $this->query($query);
    }

    public function getFilmRelation($slug, $cate, $type, $nation, $limit = '') {
        $query = "SELECT films.`name`, films.poster, films.slug AS slug_film, films.real_name,
        MAX(film_episode.tap) AS episodeCurrent, films.type_id, films.total_episode, films.slug
        FROM ((films INNER JOIN national ON films.nation_id = national.id)
        INNER JOIN film_episode ON films.id = film_episode.id_film)
        WHERE NOT films.slug = '${slug}' AND films.cate_id = ${cate} AND films.type_id = ${type}
        AND films.nation_id = ${nation}
        GROUP BY films.id
        ORDER BY films.id DESC";

        if ($limit) {
            $query .= " LIMIT ${limit}";
        }

        return $this->query($query);
    }

    // public function getFilmByIdCountry($id) {
    //     $query = "SELECT films.`name`, films.poster, films.slug AS slug_film, films.real_name, MAX(film_episode.tap) AS episodeCurrent
    //     FROM ((films INNER JOIN national ON films.nation_id = national.id)
    //     INNER JOIN film_episode ON films.id = film_episode.id_film)
    //     WHERE national.id = $id
    //     GROUP BY films.id
    //     ORDER BY films.id DESC
    //     LIMIT 12
    //     ";
    //     return $this->query($query);
    // }

    public function getFilmByCountryAndType($slug = '', $typeId) {
        $query = "SELECT films.`name`, films.poster, films.slug AS slug_film,
        films.real_name, MAX(film_episode.tap) AS episodeCurrent, status.status_name
        FROM (((films INNER JOIN national ON films.nation_id = national.id)
        INNER JOIN film_episode ON films.id = film_episode.id_film)
        LEFT JOIN status ON films.status = status.id)
        WHERE 1";

        if ($slug) {
            $query .= " AND national.slug = '${slug}'";
        }

        $query .= " AND films.type_id = ${typeId}
        GROUP BY films.id
        ORDER BY films.id DESC";
        
        return $this->query($query);
    }

    public function filterFilm($order, $type, $cate, $country, $year) {
        $query = "SELECT films.`name`, films.poster, films.slug AS slug_film,
        films.real_name, MAX(film_episode.tap) AS episodeCurrent, status.status_name, films.total_episode
        FROM
        (((((films LEFT JOIN categories ON films.id = categories.id)
        LEFT JOIN film_episode ON films.id = film_episode.id_film)
        LEFT JOIN national ON films.nation_id = national.id)
        LEFT JOIN type ON films.type_id = type.id)
        LEFT JOIN status ON films.status = status.id)
        WHERE 1";

        if ($type) {
            $query .= " AND type.id = ${type}";
        } else {
            $query .= " AND type.id = 2";
        }

        if ($cate) {
            $query .= " AND categories.id = ${cate}";
        }

        if ($country) {
            $query .= " AND national.id = ${country}";
        }

        if ($year) {
            $query .= " AND films.year = ${year}";
        }

        $query .= " GROUP BY films.id";

        if ($order && $order === 'name') {
            $query .= " ORDER BY ${order} ASC";
        } else if ($order) {
            $query .= " ORDER BY ${order} DESC";
        }

        return $this->query($query);
    }
}

?>