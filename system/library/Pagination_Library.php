<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 01/08/2016
 * Time: 10:23 CH
 */
class Pagination_Library
{

    private $conn;
    private $query;
    private $limit;
    private $page;
    private $total;


    public function load($conn, $query)
    {
        $this->conn = $conn;
        $this->query = $query;
        $stmt = $this->conn->prepare($this->query);
        $stmt->execute();
        $this->total = $stmt->rowCount();
    }

    public function getData($limit = 12, $page = 1)
    {
        $this->limit = $limit;
        $this->page = $page;
        if ($this->limit == "all") {
            $query = $this->query;
        } else {
//            $query = $this->query . " LIMIT " . (($this->page - 1) * $this->limit) . ",$this->limit";
            $query = $this->query . " LIMIT " . (($this->page - 1) * $this->limit) . ", $this->limit";
        }
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = new stdClass();
        $result->page = $this->page;
        $result->limit = $this->limit;
        $result->total = $this->total;
        $result->data = $row;
        return $result;
    }

    public function createLinks($link, $list_class)
    {
        if ($this->limit == 'all') {
            return "";
        }
        $last = ceil($this->total / $this->limit);

        $start = ($this->page - $link > 0) ? $this->page - $link : 1;
        $end = (($this->page + $link) > $last) ? $this->page + $link : $last;

        $html = "<ul class ='pagination " . $list_class . "'>";
        $class = ($this->page == 1) ? "disabled" : "";

        $html .= '<li><a href="?limit=' . $this->limit . '&page=' . ($this->page - 1) . '">&laquo;</a> </li>';

        if ($start > 1) {
            $html .= "<li><a href='?limit='" . $this->limit . "&page=1>1</a> </li>";
            $html .= "<li class='disabled'>...</li>";
        }
        for ($i = $start; $i <= $end; $i++) {
            $class = ($this->page == $i) ? "active" : "";
            $html .= '<li class="' . $class . '"><a href="?limit=' . $this->limit . '&page=' . $i . '">' . $i . '</a></li>';
        }

        if ($end < $last) {
            $html .= '<li class="disabled"><span>...</span></li>';
            $html .= '<li><a href="?limit=' . $this->limit . '&page=' . $last . '">' . $last . '</a></li>';
        }

        $class = ($this->page == $last) ? "disabled" : "";
        $html .= '<li class="' . $class . '"><a href="?limit=' . $this->limit . '&page=' . ($this->page + 1) . '">&raquo;</a></li>';

        $html .= '</ul>';
        return $html;

    }
}