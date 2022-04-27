<?php

class EpisodeModel extends BaseModel {

    const TABLE_NAME = 'film_episode';

    public function getEpisodeById($id, $start = '', $limit = '') {
        $query = "SELECT * FROM " . self::TABLE_NAME . "
        INNER JOIN films ON film_episode.id_film = films.id
        WHERE film_episode.id_film = ${id}
        ORDER BY tap DESC";

        if ($limit) {
            $query .= " LIMIT ${start}, ${limit}";
        }

        return $this->query($query);
    }

    public function findFilmById($id, $idEpisode) {
        $query = "SELECT * FROM " . self::TABLE_NAME . " WHERE id_film = ${id} AND id = ${idEpisode}";
        return $this->query_one($query);
    }

    public function getNameFilmById($id) {
        $query = "SELECT name FROM films WHERE id = ${id}";
        return $this->query_one($query);
    }

    public function getEpisodeLatest($id) {
        $query = "SELECT MAX(tap) AS filmLatest FROM " . self::TABLE_NAME . " WHERE id_film = ${id}";
        return $this->query_one($query);
    }

    public function checkEpisodeExists($film_id, $tap) {
        $query = "SELECT * FROM " . self::TABLE_NAME . " WHERE id_film = ${film_id} AND tap = ${tap}";
        return $this->getNumRows($query);
    }

    public function cloneHydrax($slug) {
        $url = "https://api.hydrax.net/c4ca5c138e888fc7867bc9a88603559e/copy/" . $slug;
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function addEpisode($episode, $linkPlayer, $id) {
        $query = "INSERT INTO " . self::TABLE_NAME . "(link_player, tap, id_film) VALUES('${linkPlayer}', ${episode}, ${id})";
        return $this->execute($query);
    }

    public function getSummary($id) {
        $query = "SELECT * FROM " . self::TABLE_NAME . " WHERE id_film = ${id}";
        return $this->getNumRows($query);
    }

    public function update($tap, $link_player, $idEpisode) {
        $query = "UPDATE " . self::TABLE_NAME . " SET tap = ${tap}, link_player = '${link_player}' WHERE id = ${idEpisode}";
        return $this->execute($query);
    }

    public function delete($id_episode) {
        $query = "DELETE FROM " . self::TABLE_NAME . " WHERE id = ${id_episode}";
        return $this->execute($query);
    }
}

?>