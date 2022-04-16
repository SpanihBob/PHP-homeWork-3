<h3>gallery</h3>
<form action='index.php?page=3' method='post'>
<p>Select graphics extension to display:</p>
<select name='ext'>   <!-- создаем форму с выпадающим списком -->
<?php

// Мы предполагаем, что в папке images находятся только графические файлы, поскольку при выборе файлов для upload мы 
// использовали атрибут accept, позволяющий выбирать только графические файлы. Поэтому дополнительную фильтрацию сейчас выполнять не будем.
    $path = 'images/';
    if($dir = opendir($path))                       //функция пытается найти требуемую папку и возвращает указатель на нее
    {
        $ar = array();                              //создаем пустой массив
        while (($file = readdir($dir)) !== false)   //функция возвращает информацию о файлах, расположенных в заданной папке.
                                                    //Эта функция вызывается в цикле и прекращает работу, когда вернет значение ===false.
                                                    //Это признак того, что все файлы в папке уже прочитаны.
        {
            $fullname = $path . $file;              
            //Для каждого прочитанного в папке файла мы в цикле достаем его расширение с помощью функций substr() и strrpos().
            $pos = strrpos($fullname, '.');         //поиск позиции первого вхождения подстроки в строке
            $ext = substr($fullname, $pos+1);       //Возвращает подстроку строки $fullname, начинающейся с $pos+1

            //Чтобы исключить недоразумения с jpg и JPG, мы с помощью функции strtolower() переводим расширения в нижний регистр.
            $ext= strtolower($ext);     
            if( !in_array($ext, $ar) )              //Проверяет, присутствует ли в массиве значение
            {
                $ar[] = $ext;
                echo "<option>" . $ext . "</option>";
            }
        }
            //После обработки всей папки вызываем функцию closedir(), чтобы освободить занятые ресурсы.
        closedir($dir);                             //Закрывает дескриптор каталога
    }
?>
</select>
<input type="submit" name="submit" value="ShowPictures" class="btn btn-primary"/>
</form>
<br/>
<?php
    //В обработчике получаем из формы значение, выбранное в select, и строим шаблон вида "images/*.EXT", где EXT – выбранное расширение.
    if(isset($_POST['submit']))                 //Определяет, была ли установлена переменная значением, отличным от null
    {
        $ext = $_POST['ext'];
         
    //Передаем этот шаблон функции glob и получаем в ответ массив, каждый элемент которого – это один из файлов с выбранным расширением по указанному пути
        $ar = glob($path . "*." . $ext);        //поиск путей, соответствующих шаблону
        echo "<div class='panel panelprimary'>";
        echo '<div class="panel-heading">';
        echo '<h3 class="panel-title">Gallery content</h3></div>';
        foreach ($ar as $a)
    {
        echo "<a href='" . $a . "'target='_blank'><img src='" . $a . "'height='100px' border='0' alt='picture' class='img-polaroid'/></a>";
    }
    echo "</div>";
    }
?>