<?php

class CategoryModel extends BaseModel {

    const TABLE_NAME = 'categories';

    public function getTotalCate() {
        $query = "SELECT * FROM " . self::TABLE_NAME;
        return $this->getNumRows($query);
    }

    public function getCateList($start, $limit) {
        $query = "SELECT * FROM " . self::TABLE_NAME . " ORDER BY id DESC LIMIT ${start}, ${limit}";
        return $this->query($query);
    }

    public function findCateById($id) {
        $query = "SELECT * FROM " . self::TABLE_NAME . " WHERE id = ${id}";
        return $this->query_one($query);
    }

    public function update($cateName, $slug, $id) {
        $query = "UPDATE " . self::TABLE_NAME . " SET cate_name = '${cateName}', slug = '${slug}' WHERE id = ${id}";
        return $this->execute($query);
    }

    public function addCate($cateName, $slug) {
        $query = "INSERT INTO " . self::TABLE_NAME . "(cate_name, slug) VALUES('${cateName}', '${slug}')";
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

    public function deleteCate($id) {
        $query = "DELETE FROM " . self::TABLE_NAME . " WHERE id = ${id}";
        return $this->execute($query);
    }

    public function findCateBySlug($slug) {
        $query = "SELECT * FROM " . self::TABLE_NAME . " WHERE slug = '${slug}'";
        return $this->query_one($query);
    }

    public function getAllByOption($select, $table, $column = 1, $value = 1) {
        $query = "SELECT ${select} FROM ${table} WHERE ${column} = '${value}'";
        return $this->query($query);
    }
}

?>