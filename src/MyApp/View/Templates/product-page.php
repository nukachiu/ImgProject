<?php

var_dump($product);
?>

<div id="wrapper">
    <div class="container" style="padding-left: 0px; margin-left: unset">
        <div class="content">
            <h1>Produs</h1>
                <div style="border-style: groove">
                    <h2><?=$product->getTitle()?></h2>
                    <h4><?=$product->getDescription()?></h4>
                    <img src=
                         '/<?php echo $product->getThumbnailPath().'/'.$product->getTitle()?>'>
                    <br/>

                    <input type="button" value="Cumpara produs">
                </div>
        </div>
    </div>
</div>
<?php echo $product->getThumbnailPath().'/'.$product->getTitle().'<br/>'?>
<?=$product->getId()?>
