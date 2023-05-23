<?php
// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
  if (!empty($_GET['save'])) {
    // Если есть параметр save, то выводим сообщение пользователю.
    print('Спасибо, результаты сохранены.');
  }
  include('index.php');
  exit();
}




$errors = FALSE;
if (empty($_POST['name'])) {
  print('Заполните имя.<br/>');
  $errors = TRUE;
}

if (empty($_POST['email']) or !(strpos($_POST['email'], '@'))) {
  print('Введите e-mail.<br/>');
  $errors = TRUE;
}


if (empty($_POST['year'])) {
  print('Выберите год рождения.<br/>');
  $errors = TRUE;
}

if (empty($_POST['gender'])) {
  print('Укажите ваш пол.<br/>');
  $errors = TRUE;
}


if (empty($_POST['kon'])) {
  print('Выберите количество конечностей.<br>');
  $errors = true;

}

if (empty($_POST['super'])) {
  print('Выберите одну или несколько сверхспособностей.<br>');
  $errors = true;

} else {
  $super = serialize($_POST['super']);
}

if (empty($_POST['bio'])) {
  print('Расскажите о себе.<br>');
  $errors = true;
}

if (empty($_POST['contr_check'])) {
  print('Вы не можете отправить форму, не ознакомившись с контрактом.<br>');
  $errors = true;
}

if ($errors) {
  exit();
}


$user = 'u53312'; 
$pass = '7812270';
$db = new PDO(
  'mysql:host=localhost;dbname=u53312',
  $user,
  $pass,
  array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
);


try {
  $stmt = $db->prepare("INSERT INTO application SET name = ?, email = ?, year = ?, gender = ?, kon = ?, bio = ?");
  $stmt->execute(
    array(
      $_POST['name'],
      $_POST['email'],
      $_POST['year'],
      $_POST['gender'],
      $_POST['kon'],
      $_POST['bio']
    )
  );
  $id_app = $db->lastInsertId();
  foreach ($_POST['super'] as $power) {
    $stmt = $db->prepare("INSERT INTO superApp SET id_app = ?, super = ?");
    $stmt->execute(array($id_app, $power));
  }
} catch (PDOException $e) {
  print('Error: ' . $e->getMessage());
  exit();
}

header('Location: ?save=1');