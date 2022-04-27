<?php

class CountryModel extends BaseModel {

    const TABLE_NAME = 'national';

    public function getTotalCountry() {
        $query = "SELECT * FROM " . self::TABLE_NAME;
        return $this->getNumRows($query);
    }

    public function getCountryList($start, $limit) {
        $query = "SELECT * FROM " . self::TABLE_NAME . " ORDER BY id DESC LIMIT ${start}, ${limit}";
        return $this->query($query);
    }

    public function findCountryById($id) {
        $query = "SELECT * FROM " . self::TABLE_NAME . " WHERE id = ${id}";
        return $this->query_one($query);
    }

    public function update($countryName, $slug, $id) {
        $query = "UPDATE " . self::TABLE_NAME . " SET nation_name = '${countryName}', slug = '${slug}' WHERE id = ${id}";
        return $this->execute($query);
    }

    public function addCountry($countryName, $slug) {
        $query = "INSERT INTO " . self::TABLE_NAME . "(nation_name, slug) VALUES('${countryName}', '${slug}')";
        return $this->execute($query);
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

    public function checkExist($column, $value) {
        $query = "SELECT * FROM " . self::TABLE_NAME . " WHERE ${column} = '${value}'";
        return $this->getNumRows($query);
    }

    public function deleteCountry($id) {
        $query = "DELETE FROM " . self::TABLE_NAME . " WHERE id = ${id}";
        return $this->execute($query);
    }

    public function findCountryBySlug($slug) {
        $query = "SELECT * FROM " . self::TABLE_NAME . " WHERE slug = '${slug}'";
        return $this->query_one($query);
    }

    public function getCountryBetween($country) {
        $query = "SELECT * FROM national WHERE id IN (${country})";
        return $this->query($query);
    }
}

?>