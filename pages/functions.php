<?php
$users = 'pages/users.txt';// вытаскиваем и формы имена пароля и имени через глобальный массив $_POST

function register($name, $pass1, $pass2, $email) {

    //блок проверки данных
$name=trim(htmlspecialchars($name));                    //trim — Удаляет пробелы (или другие символы) из начала и конца строки
$pass=trim(htmlspecialchars($pass1));                    //htmlspecialchars — Преобразует специальные символы в HTML-сущности
$pass2=trim(htmlspecialchars($pass2));
$email=trim(htmlspecialchars($email));

if(strlen($name) < 3 || strlen($name) > 30 || strlen($pass1) < 3 || strlen($pass1) > 30) {
    echo "<h3><span style='color:red;'>Длина значений должна быть между 3 и 30!</span></h3>";
    return false;
}
if($pass!==$pass2) {
    echo "<h3><span style='color:red;'>Пароли не совпадают</span></h3>";
    return false;
}
    //блок проверки уникальности логина
global $users;      //область видимости
$file=fopen($users,'a+');           //fopen — Открывает файл или URL
while($line=fgets($file, 128)) {        //fgets — Читает строку из файла
    $readname=substr($line,0,strpos($line,':'));        //mb_substr — Возвращает часть строки, strpos — Находит позицию первого вхождения подстроки в строку
    if($readname == $name) {
        echo "<h3><span style='color:red;'> Такое имя для входа уже используется!</span></h3>";
        return false;
    }
}

    //блок добавления нового пользователя
$line=$name.':'.md5($pass1).':'.$email."\r\n";   //md5 — Возвращает MD5-хеш строки(Внимание Не рекомендуется использовать эту функцию для обеспечения безопасности
// хранения паролей ввиду высокой скорости работы данного алгоритма. Более подробно читайте в разделе Ответы на часто задаваемые вопросы по хешированию паролей.)
fputs($file,$line);     //fputs — Псевдоним fwrite() — Бинарно-безопасная запись в файл
fclose($file);          //fclose — Закрывает открытый дескриптор файла
return true;

}

function login($login, $logPass) {
    $login=trim(htmlspecialchars($login));                      //trim — Удаляет пробелы (или другие символы) из начала и конца строки
    $logPass=trim(htmlspecialchars($logPass));                  //htmlspecialchars — Преобразует специальные символы в HTML-сущности

        //блок проверки уникальности логина
    global $users;                                              //область видимости
    $file=fopen($users,'a+');                                   //fopen — Открывает файл или URL
    while($line=fgets($file, 128)) {                             //fgets — Читает строку из файла
        $readLogin=substr($line,0,strpos($line,':'));           //mb_substr — Возвращает часть строки, strpos — Находит позицию первого вхождения подстроки в строку
        
        $newLine = str_replace($readLogin. ':', '', $line);     //убираем имя пользователя из строки
        $readPass=trim(substr($newLine,0,strpos($newLine,':')));//читаем пароль

        if($readLogin == $login && $readPass == md5($logPass))  //сравниваем пароль и логин с данными в файле users.txt
        {
            return true;
        } 
        return false;
    }
    return false;
}

?>



