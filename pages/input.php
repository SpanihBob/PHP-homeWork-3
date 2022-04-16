<body class="text-center">
    <h3>input</h3>
    <?php
        if(!isset($_POST['inputbtn'])) {    //isset — Определяет, была ли установлена переменная значением, отличным от null(была ли нажата кнопка???), 
                                            //если нет, то выводим форму входа 
    ?>
    <main class="form-signin">
        <form action="index.php?page=5" method="post" style="width: 400px; margin: auto;">
            <div class="form-group">
                <label for="inputLogin">Login:</label>
                <input type="text" class="form-control" name="inputLogin" required>
            </div>
            <div class="form-group">
                <label for="inputPass">Password:</label>
                <input type="password" class="form-control" name="inputPass" required>
            </div>
            <div class="form-group">
                <button type="submit" style="margin-top: 20px" class="w-100 btn btn-lg btn-primary" name="inputbtn">Input</button>
            </div>
        </form>
    </main>
    <?php
        } else if(login($_POST['inputLogin'], $_POST['inputPass'])) {           //если функция выдает true
            echo "<h3/><span style='color:green;'>ты в списке</span><h3/>";     //открываем сессию
            $_SESSION["name"] = $_POST['inputLogin'];
            $_SESSION["pass"] = $_POST['inputPass'];
            echo ' <script>window.location = "index.php?page=1";</script>';     //переходим на домашнюю страницу "index.php?page=1"
        }
        else {
            echo ' <script>window.location = "index.php?page=4";</script>';     //иначе переходим на страницу регистрации "index.php?page=4"
        }
    ?>
</body>




