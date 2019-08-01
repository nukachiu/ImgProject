
<div id="wrapper">
    <div class="container" style="padding-left: 0px; margin-left: unset">
        <div class="content">
            <h1>Homepage</h1>
            <?php
            foreach($products as $item){
                $title = explode('.',$item->getTitle())[0];
                    ?>
                    <div style="border-style: groove">
                        <h2><?= $title ?></h2>
                        <h4><?= $item->getDescription() ?></h4>
                        <img src=
                             '<?php echo $item->getThumbnailPath() . '/' . $item->getTitle() ?>'>
                        <br/>

                        <a href="product\<?= $item->getId() ?>"><input type="button" value="Vizualizeaza produs"></a>
                    </div>
                    <?php
            }
            ?>

        </div>
    </div>
</div>

