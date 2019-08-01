<?php
$title = explode('.',$product->getTitle())[0];
?>

<div id="wrapper">
    <div class="container" style="padding-left: 0px; margin-left: unset">
        <div class="content">
            <h1>Produs</h1>
                <div style="border-style: groove">
                    <h2><?=$title?></h2>
                    <h4><?=$product->getDescription()?></h4>
                    <h4>Pret <?=$tier->getPrice()?> EURO</h4>
                    <img src=
                         '/<?php echo $tier->getPathWithWatermark()?>'>
                    <br/>

                    <a href="../buyProduct/<?=$tier->getId()?>"><input type="button" value="Cumparare produs"></a>
                </div>
        </div>
    </div>
</div>