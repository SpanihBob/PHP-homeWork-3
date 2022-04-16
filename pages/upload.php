<h3>upload</h3>                                                                             <!-- upload означает пересылку файла с клиентского компьютера на сервер -->
<?php
  if(!isset($_POST['uppbtn'])) {
?>
<form action="index.php?page=2" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="myfile">Выберите файл для загрузки:</label>
        
        <!-- input для контроля размера файла. Это можно делать еще до отправки, если добавить в форму, непосредственно перед input с type='file', 
        такой скрытый элемент: Обязательно с таким значением name. Значение value этого элемента указывает максимальный размер файла в байтах, который 
        примет эта форма. В примере – 3 МБ. -->
        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1024*1024*3" />                    контролируем размер файла. ЕСЛИ ЭТО НЕОБХОДИМО!!!! -->
        
        <!-- обязательные атрибуты для формы отправки файла (upload): 
            1) в такой форме должен быть элемент <input type='file' name='myfile'>.Этот элемент создает стандартное окно для выбора файла. 
            2) Должен быть указан атрибут: enctype='multipart/form-data'. Этот атрибут всегда указывается с таким значением при выполнении upload
            3) Мы будем складывать такие файлы в папку images нашего сайта
            форме выделены атрибут enctype и элемент input с type='file'. У этого элемента указан атрибут accept='image/*'. Этот атрибут позволит выбирать толь-
            ко графические файлы. -->
        <input type="file" class="form-control" id="input" name="myfile" onchange="see()" accept="image/*">
        <div id="img"></div>     
    </div>

    <!-- кнопка для отправки формы -->
    <button type="submit" class="btn btn-primary" name="uppbtn">Отправить файл</button>
</form>

<?php
    } else 
        {
        if(isset($_POST['uppbtn'])) {    
            if($_FILES['myfile']['error'] != 0) {                                                                 //вначале проверяем ошибки
                echo "<h3/><span style='color:red;'>Загрузить код ошибки: " . $_FILES['myfile']['error'] ."</span><h3/>";
        exit();
        }
    //файл существует на сервере во временной папке?
    if(is_uploaded_file($_FILES['myfile']['tmp_name']))                                             //функция определяет есть ли файл во временной папке
    {
    //удалить файл из временной папки в изображения
    //папка с исходным названием
    move_uploaded_file($_FILES['myfile']['tmp_name'],"./images/".$_FILES['myfile']['name']);        //если есть то переносим файл в папку "images"
    }
    echo "<h3/><span style='color:green;'>Файл успешно загружен!</span><h3/>";
    }
    }
?>
