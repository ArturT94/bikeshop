<?php if(!empty($_SESSION['cart.product'])):?>
<table>
        <thead>
        <tr>
            <th>Товар</th>
            <th>Наименование</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
        </tr>
        </thead>
        <?php foreach($_SESSION['cart.product'] as $prodOrder): ?>
            <tbody>
            <tr>
                <td><a href="product/<?= $prodOrder['alias'] ?>"><img src="images/<?= $prodOrder['img'] ?>" alt=""></a></td>
                <td><a href="product/<?= $prodOrder['alias'] ?>"><?=$prodOrder['title']?></a></td>
                <td><?=$prodOrder['qty']?></td>
                <td><?=$_SESSION['cart.currency']['simbol_left']?><?=$prodOrder['price']?><?=$_SESSION['cart.currency']['simbol_right']?></td>
                <td><span class="glyphicon glyphicon-remove text-danger del-item"></span></td>
            </tr>
            </tbody>
        <?php endforeach; ?>
        <tfoot>
        <tr class="result_order">
            <th colspan="2">Итого:</th>
            <td><?=$_SESSION['cart.qty']?></td>
            <td><?=$_SESSION['cart.currency']['simbol_left']?><?=$_SESSION['cart.sum']?><?=$_SESSION['cart.currency']['simbol_right']?></td>
        </tr>
        </tfoot>
    </table>
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif;?>