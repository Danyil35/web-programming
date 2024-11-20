<!DOCTYPE html>
<html lang="uk" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заміна смайликів (ASCII to IMG)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3 d-flex justify-content-between align-items-center">
        <h1>Заміна смайликів (ASCII to IMG)</h1>
        <a href="/lab6/task2.php" class="btn btn-secondary">Назад</a>
    </div>
    <div class="container mt-3">
        <div class="row bg-body-tertiary rounded border p-2">
            <div class="col-6">
                <h3>Введіть текст</h3>
                <form class="mt-3" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="text" class="w-100">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Обробити">
                </form>
            </div>
            <div class="col-6">
                <h3>Результат</h3>
                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $text = $_POST['text'];

                        $editedText = smileAscii2Img($text);
                        echo <<<HTML
                        <div class="mb-3">
                            $editedText
                        </div>
                        HTML;
                        exit;
                    }

                    function smileAscii2Img($text) {
                        $smileys = [
                            ':)' => '<img src="/lab6/task2/assets/images/smile.svg" width=50px>',
                            ':(' => '<img src="/lab6/task2/assets/images/sad.svg" width=50px>',
                            ':D' => '<img src="/lab6/task2/assets/images/laugh.svg" width=50px>',
                            ':|' => '<img src="/lab6/task2/assets/images/neutral.svg" width=50px>',
                            ':P' => '<img src="/lab6/task2/assets/images/tongue.svg" width=50px>'
                        ];
                        foreach ($smileys as $smiley => $image) {
                            $text = str_replace($smiley, $image, $text);
                        }
                        
                        return $text;
                    }
                ?>
            </div>
        </div>
        

        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
