<?php

declare(strict_types=1);

namespace Playground\Views;

use PDO;
use PDOException;

class Home
{
    public function index(): string
    {
        // echo '<pre>';
        // debug_zval_dump($_GET);
        //
        // echo PHP_EOL;
        //
        // debug_zval_dump($_POST);
        //
        // echo PHP_EOL;
        //
        // debug_zval_dump($_REQUEST);
        try {
            $db = new PDO(dsn: "pgsql:host=pgsql;port=5432;dbname=default-db", username: "postgres", password:"postgress_password", options:[
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
            $db->setAttribute(attribute:PDO::ATTR_ERRMODE, value:PDO::ERRMODE_EXCEPTION);

            $brand = $_GET["brand"];
            $query = 'SELECT * FROM cars WHERE brand = ?';

            // $statment = $db->query($query);
            $statment = $db->prepare($query);
            $statment->execute([$brand]);

            // foreach ($db->query($query, PDO::FETCH_OBJ) as $user) {
            //     echo "<pre>";
            //     debug_zval_dump($user);
            // }

            foreach ($statment->fetchAll() as $user) {
                echo "<pre>";
                debug_zval_dump($user);
            }

            // debug_zval_dump($statment->fetchAll(PDO::FETCH_NUM));
            $brand = "Hondai";
            $model = "G15";
            $year = "2018";
            //place holder names for query parameter
            //since there are no unique columns
            $insert_query = 'INSERT INTO cars (brand, model, year) VALUES(:brand, :model, :year) ON CONFLICT DO NOTHING';
            $insert_stmt = $db->prepare($insert_query);
            $insert_stmt->execute(['brand' => $brand,'model' => $model,'year' => $year]);


            $select_stmt = $db->prepare("SELECT * FROM cars WHERE brand = ?");
            //select_stmt->bindValue(':brand',$brand) can be used to set values for the prepared statement or bindParam is you want to
            //bind by reference
            $select_stmt->execute([$brand]);

            {   echo '<pre>';
                $user = $select_stmt->fetch();
                debug_zval_dump($user);
            }

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
        $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;
        echo "Home Page";
        return <<<FORM
            <form action="/upload" method="post" enctype="multipart/form-data">
                <input type="file" name="receipt[]"/>
                <input type="file" name="receipt[]"/>
                <button type="submit"> Submit file </button>
            </form>
        FORM;
    }

    public function upload(): void
    {
        echo "<pre>";
        debug_zval_dump($_FILES);
        echo "</pre>";

        $file_path = $_FILES['receipt']['name'];
        $files = $_FILES['receipt']['tmp_name'];

        /** @var array<string> $files */
        foreach ($files as $file_index => $file) {
            $path = STORAGE_PATH . '/' . $file_path[(int)$file_index];
            move_uploaded_file((string)$file, $path);

            echo "<pre>";
            // debug_zval_dump(pathinfo($path));
            header("Location: /");
        }

    }
}
