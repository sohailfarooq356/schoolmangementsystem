<?php


/**
 * Class Database
 * To connect to database to execute queries
 */
class Database
{
    private static $host = 'localhost';
    private static $user = 'root';
    private static $dbname = 'lms';
    private static $pass = '';

    /**
     * Description of $conn
     *  Connection variable for database.
     * @author SohailFarooq
     */

    private static function connect()
    {
        try {
            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: Error on Line " . $e->getLine() . ' in Filename ' . $e->getFile() . $e->getMessage();
            die();
        }
    }

    /**
     * Function get()
     * Function to get values from database
     * @param $table = name of table to get values from.
     * @param string $field field name to get from table Default = *
     * @param array|null $condition_arr where condition
     * @return array|bool
     */
    public static function get($table, $field = '*', array $condition_arr = null)
    {
        try {
            $sql = "select $field from $table ";
            if ($condition_arr != '') {
                $sql .= ' where ';
                $count = count($condition_arr);
                $countindex = 1;
                foreach ($condition_arr as $key => $val) {
                    if ($countindex == $count) {
                        $sql .= "$key='$val'";
                    } else {
                        $sql .= "$key='$val' and ";
                    }
                    $countindex++;
                }
            }
            $query = self::connect()->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            $count = count($result);
            if ($count > 0) {
                $arr = array();
                foreach ($result as $row) {
                    $arr[] = $row;
                }
                return $arr;
            } else {
                return false;
            }
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }
}