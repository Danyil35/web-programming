<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $question = trim($_POST['question']);
    $type = isset($_POST['type']) ? $_POST['type'] : null;
    $role = isset($_POST['role']) ? $_POST['role'] : null;
    $copy = isset($_POST['copy']) ? $_POST['copy'] : null;

    if (empty($name) || !preg_match('/^[a-zA-Zа-яА-ЯёЁіІїЇєЄ\s]+$/u', $name)) {
        $errors[] = "Ім'я може містити тільки букви.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/@(gmail\.com|hotmail\.com|yahoo\.com)$/', $email)) {
        $errors[] = "Невірний формат email. Використовуйте пошту з доменів gmail.com, hotmail.com або yahoo.com.";
    }

    if (empty($question) || strlen($question) < 50) {
        $errors[] = "Питання повинно містити не менше 50 символів.";
    }

    if (empty($type)) {
        $errors[] = "Будь ласка, виберіть тип запитання.";
    }

    if (empty($role)) {
        $errors[] = "Будь ласка, виберіть вашу роль.";
    }

    if (empty($errors)) {
        echo <<<HTML
        <!DOCTYPE html>
        <html lang="uk" data-bs-theme="dark">
        <head>
            <meta charset="UTF-8">
            <title>Результат</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>
        <body>
            <div class="container mt-5">
                <h2 class="mb-4">Дякуємо за заповнення анкети!</h2>
                <h3>Ваші дані:</h3>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Ім'я:</strong> $name</li>
                    <li class="list-group-item"><strong>Пошта:</strong> $email</li>
                    <li class="list-group-item"><strong>Питання:</strong> $question</li>
                    <li class="list-group-item"><strong>Тип запитання:</strong> $type</li>
                    <li class="list-group-item"><strong>Ваша роль:</strong> $role</li>
                </ul>
                <a href="index.html" class="btn btn-primary mt-3">Повернутися до форми</a>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
        </html>
        HTML;
        exit;
    } else {
        $errorList = "<ul class='list-group'>";
        foreach ($errors as $error) {
            $errorList .= "<li class='list-group-item'>" . htmlspecialchars($error) . "</li>";
        }
        $errorList .= "</ul>";

        echo <<<HTML
        <!DOCTYPE html>
        <html lang="uk" data-bs-theme="dark">
        <head>
            <meta charset="UTF-8">
            <title>Помилки</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        </head>
        <body>
            <div class="container mt-5">
                <h2 class="mb-4">Виникли помилки:</h2>
                $errorList
                <a href="index.html" class="btn btn-primary mt-3">Повернутися до форми</a>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
        </html>
        HTML;
        exit;
    }
}

header("Location: index.html");
exit;
?>
