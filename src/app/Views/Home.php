<?php

declare(strict_types=1);

namespace Playground\Views;

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
