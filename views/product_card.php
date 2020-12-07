<h1><?=$model['name']?></h1>
<h1><?=$model['description']?></h1>
<div>
    <form action="?cart/add&id=<?=$model['id']?>" method="post">
        <input type="hidden" name="product_id" value="<?=$model['id']?>">
        <input type="text" name="qty">
        <input type="submit" value="Добавить">
    </form>
</div>