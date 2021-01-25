<?php
session_start();
require_once __DIR__.'/../db/connect.php';
require_once __DIR__.'/../site/session_ease.php';

// profile page is not accessible from a get go
$userProfileData = [
    "firstName" => "",
    "lastName" => "",
    "email" => "",
    "status" => "Не ввійшов в систему",
    "statusColor" => "red-text text-darken-1",
];

if($s->loggedIn())
{
    $userProfileData["firstName"] = $s->name();
    $userProfileData["lastName"] = $s->surname();
    $userProfileData["email"] = $s->email();
    $userProfileData["status"] = ($s->valid()) ? "Активований" : "Особовий рахунок не активний ще!";
    $userProfileData["statusColor"] = ($s->valid()) ? "green-text text-darken-1" : "lime-text text-darken-1";
}
else
{
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<?php require_once __DIR__.'/../site/head.php'; ?>
<body class="grey lighten-4">
<?php require_once __DIR__.'/../site/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col s8 offset-s2">
            <h4 class="center-align">Вітаю, <?=$userProfileData['firstName']?>!</h4>
            <ul class="collection with-header">
                <li class="collection-header"><h4>Профіль користувача</h4></li>
                <li class="collection-item">
                    <strong>Імя:</strong> <?=$userProfileData['firstName']?>
                </li>
                <li class="collection-item">
                    <strong>Прізвище:</strong> <?=$userProfileData['lastName']?>
                </li>
                <li class="collection-item">
                    <strong>E-mail:</strong> <?=$userProfileData['email']?>
                </li>
                <li class="collection-item">
                    <strong>Стан особового рахунку:</strong> <span class="<?=$userProfileData['statusColor']?>"><?=$userProfileData['status']?></span>
                </li>

            </ul>
        </div>
    </div>
</div>

<?php require_once __DIR__.'/../site/footer.php'; ?>
</body>
</html>