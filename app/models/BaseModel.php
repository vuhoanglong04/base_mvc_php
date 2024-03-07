<?php

namespace App\Models;

use PDO;

class BaseModel
{
    public $sta;
    public $pdo;
    public $sql;
    public function __construct()
    {
        $this->pdo =  new PDO(
            "mysql:host=" . DBHOST
                . ";dbname=" . DBNAME
                . ";charset=" . DBCHARSET,
            DBUSER,
            DBPASS
        );
    }

    function setQuery($sql)
    {
        $this->sql = $sql;
    }
    //
    //    //Function execute the query
    //    // hàm này sẽ làm hàm chạy câu truy vấn
    function execute($options = array())
    {
        $this->sta =  $this->pdo->prepare($this->sql);
        if ($options) {  //If have $options then system will be tranmission parameters
            for ($i = 0; $i < count($options); $i++) {
                $this->sta->bindParam($i + 1, $options[$i]);
            }
        }
        $this->sta->execute();
        return  $this->sta;
    }
    //
    //    //Funtion load datas on table
    //    // lấy nhiều dữ liệu ở trong bảng
    function loadAllRows($options = array())
    {
        if (!$options) {
            if (!$result =  $this->execute($options))
                return false;
        } else {
            if (!$result =  $this->execute($options))
                return false;
        }
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    //
    //    //Funtion load 1 data on the table
    //    //lay 1 du lieu thoi
    function loadRow($option = array())
    {
        if (!$option) {
            if (!$result =  $this->execute($option))
                return false;
        } else {
            if (!$result =  $this->execute($option))
                return false;
        }
        return $result->fetch(PDO::FETCH_OBJ);
    }
}