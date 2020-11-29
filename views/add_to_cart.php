<h3>Товары в корзине:</h3>
<?php if(empty($model)):?>
    <div>Корзина пуста!</div>
<?php else:?>
    <?php foreach ($model as $item):?>
        <div><?=$item['product']['name']?> :
            <?=$item['quantity']?>
            <!--a href="/remove_from_cart?id=<?=$item['product']['id']?>">Удалить</a-->
        </div>
    <?php endforeach;?>
<?php endif;?>

<?php
