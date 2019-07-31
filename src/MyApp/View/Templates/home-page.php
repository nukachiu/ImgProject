<div id="wrapper">
    <div class="container" style="padding-left: 0px; margin-left: unset">
        <div class="content">
            <h1>Homepage</h1>
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

