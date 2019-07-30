<div id="wrapper">
    <div class="container" style="padding-left: 0px; margin-left: unset">
        <div class="content">
            <h1>Homepage</h1>

            <a href = "/login">Log In</a>
            <br />
            <a href = "/register">Register</a>
            <br />
            <?php
            foreach($products as $item){
                ?>
                <h2><?=$item->getTitle()?></h2>
                <h4><?=$item->getDescription()?></h4>
                <br/>
                <?php
            }
            ?>

        </div>
    </div>
</div>

