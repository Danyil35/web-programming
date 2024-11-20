<!DOCTYPE html>
<html lang="uk" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Шифр Цезаря</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3 d-flex justify-content-between align-items-center">
        <h1>Шифр Цезаря</h1>
        <a href="/lab6/task2.php" class="btn btn-secondary">Назад</a>
    </div>
    <div class="container mt-3">
        <div class="row bg-body-tertiary rounded border p-2">
            <div class="col-6">
                <h3>Текст для обробки</h3>
                <form class="mt-3" method="POST">
                    <div class="mb-3">
                        <textarea class="form-control" name="text" rows=5 class="w-100"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Число зсуву</label>
                        <input type="number" class="form-control" name="key" class="w-100">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Обробити">
                </form>
            </div>
            <div class="col-6">
                <h3>Результат</h3>
                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $text = $_POST['text'];
                        $key = $_POST['key'];

                        $encText = caesarCipher($text, $key);
                        $decText = caesarCipher($encText, -$key);
                        echo <<<HTML
                        <div class="my-3">
                            <label>Зашифрований текст</label>
                            <textarea class="form-control" name="text" rows=5 class="w-100" readonly>$encText</textarea>
                        </div>
                        <div class="my-3">
                            <label>Розшифрований текст</label>
                            <textarea class="form-control" name="text" rows=5 class="w-100" readonly>$decText</textarea>
                        </div>
                        HTML;
                        exit;
                    }

                    function caesarCipher($text, $key) {
                        $result = '';
                        $key = $key % 33;
                        foreach (mb_str_split($text) as $char) {
                            $code = mb_ord($char, 'UTF-8');

                            if ($code >= 1040 && $code <= 1071) {
                                $newCode = ($code - 1040 + $key) % 33 + 1040;
                                $result .= mb_chr($newCode, 'UTF-8');
                            }
                            elseif ($code >= 1072 && $code <= 1103) {
                                $newCode = ($code - 1072 + $key) % 33 + 1072;
                                $result .= mb_chr($newCode, 'UTF-8');
                            } 
                            else {
                                $result .= $char;
                            }
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
