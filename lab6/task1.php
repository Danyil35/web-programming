<!DOCTYPE html>
<html lang="uk" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Завдання 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Лабораторна робота №6</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/lab6/task1.php">Завдання 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/lab6/task2.php">Завдання 2</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row bg-body-tertiary rounded border p-2">
            <div class="col-6">
                <h3>Текст для обробки</h3>
                <form class="mt-3" method="POST">
                    <div class="mb-3">
                        <textarea class="form-control" name="text" rows=5 class="w-100"></textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Обробити">
                </form>
            </div>
            <div class="col-6">
                <h3>Результат</h3>
                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $text = $_POST['text'];

                        $processedText = reverseWords($text);
                        $processedText = htmlspecialchars($processedText);
                        echo <<<HTML
                        <div class="mb-3">
                            <textarea class="form-control" name="text" rows=5 class="w-100" readonly>$processedText</textarea>
                        </div>
                        HTML;
                        exit;
                    }

                    function reverseWords($text) {
                        $lines = explode("\n", $text);
                        $result = '';
                    
                        foreach ($lines as $line) {
                            $words = preg_split('/\s+/', $line);
                            $reversedWords = [];
                        
                            foreach ($words as $word) {
                                $reversedWord = strrev($word);
                                $reversedWords[] = $reversedWord;
                            }
                        
                            $result .= implode(' ', $reversedWords) . "\n";
                        }
                    
                        return $result;
                    }
                ?>
            </div>
        </div>
        

        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
