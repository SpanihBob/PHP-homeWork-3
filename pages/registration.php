<body class="text-center">
    <h3>ragistration</h3>
    <?php
        if(!isset($_POST['regbtn'])) {                                   //isset — Определяет, была ли установлена переменная значением, отличным от null    
    ?>
    <main class="form-signin">
        <form action="index.php?page=4" method="post" style="width: 400px; margin: auto;">
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" class="form-control" name="login" required>
            </div>
            <div class="form-group">
                <label for="pass1">Password:</label>
                <input type="password" class="form-control" name="pass1" required>
            </div>
            <div class="form-group">
                <label for="pass2">Confirm Password:</label>
                <input type="password" class="form-control" name="pass2" required>
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
                <button type="submit" style="margin-top: 20px" class="w-100 btn btn-lg btn-primary" name="regbtn">Register</button>
        </form>
    </main>
    <?php
        } else if(register($_POST['login'], $_POST['pass1'], $_POST['pass2'], $_POST['email'])) {
            echo "<h3/><span style='color:green;'>Добавлено новый пользователь! Перейдите на страницу входа!</span><h3/>";
        }    
    ?>
</body>




