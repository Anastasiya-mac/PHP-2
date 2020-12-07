<h3>Товары в корзине:</h3>
<?php if(empty($cart)):?>
    <div>Корзина пуста!</div>
<?php else:?>
    <?php foreach ($cart as $item):?>
        <div><?=$item['product']['name']?> : <?=$item['qty']?>
        </div>
    <?php endforeach;?>
<?php endif;?>

<?php
