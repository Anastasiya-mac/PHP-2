<h3>Товары в корзине:</h3>
<?php if(empty($model)):?>
    <div>Корзина пуста!</div>
<?php else:?>
    <?php foreach ($model as $key => $value):?>
        <div><?=$value->name?>:
            <?=$item['quantity']?>
            <!--a href="/remove_from_cart?id=<?//=$item['product']['id']?>">Удалить</a-->
        </div>
    <?php endforeach;?>
<?php endif;?>