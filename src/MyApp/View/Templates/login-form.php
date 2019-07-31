<div id="wrapper">
    <div class="container" style="padding-left: 0px; margin-left: unset">
        <div class="content">
            <h1>Log In</h1>
            <?php if (isset($errors)) {?>
                <div style="color: red"><?php echo 'Nume sau parola gresita' ?></div>
            <?php } ?>

            <form action="/loginPost" method="post" enctype="multipart/form-data">
                <label for="email">Email</label><br />
                <input id="email" type="text" value="asdasda" name="email" / required>

                <br />
                <label for="password">Password</label><br />
                <input id="password" type="password" value="123" name="password" required>

                <br />
                <input type="submit" value="Log In" name="submit"/>
            </form>
        </div>
    </div>
</div>
