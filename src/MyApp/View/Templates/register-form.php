<div id="wrapper">
    <div class="container" style="padding-left: 0px; margin-left: unset">
        <div class="content">
            <h1>Register</h1>

            <form action="/registerPost" method="post" enctype="multipart/form-data">
                <label for="name">Name</label><br />
                <input id="name" type="text" value="Car cu boi" name="name" / required>

                <br />
                <label for="password">Password</label><br />
                <input id="password" type="password" value="parola" name="password" required>

                <br />
                <label for="email">Email</label><br />
                <input id="email" type="email" value="nicugrigo@yahoo.com" name="email" required>

                <br />
                <input type="submit" value="Register" name="submit"/>
            </form>
        </div>
    </div>
</div>
