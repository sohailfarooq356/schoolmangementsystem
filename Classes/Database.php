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

    /**
     * Description of insertData
     *  This function is used to insert data into database.
     * @param string $table Table name to get values from table.
     * @param array[] $condition_arr Values and fields where you want to insert.
     * @author SohailFarooq
     */
    public static function insert($table, array $condition_arr)
    {
        try {
            if ($condition_arr != '') {
                foreach ($condition_arr as $key => $val) {
                    $fieldArr[] = $key;
                    $valueArr[] = $val;
                }
                $field = implode(",", $fieldArr);
                $value = implode("','", $valueArr);
                $value = "'" . $value . "'";
                $sql = "insert into $table($field) values($value) ";
                $query = self::connect()->prepare($sql);
                $query->execute();
                return true;
            }
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }
}