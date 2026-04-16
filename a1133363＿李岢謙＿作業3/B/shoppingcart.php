<?php
echo '<meta charset="utf-8">';
echo '<title>shoppingcart.php</title>';
echo '<table border="1" cellpadding="5" cellspacing="0">';
echo '<tr>';
echo '<td>功能</td>';
echo '<td>編號</td>';
echo '<td>名稱</td>';
echo '<td>價格</td>';
echo '<td>數量</td>';
echo '</tr>';

$total = 0;

foreach ($_COOKIE as $id => $item) {
    if (is_array($item)) {
        echo '<tr>';
        echo '<td><a href="delete.php?Id=' . $id . '">刪除</a></td>';

        $price = 0;
        $quantity = 0;

        $order = array("ID", "Name", "Price", "Quantity");
        foreach ($order as $key) {
            $value = isset($item[$key]) ? $item[$key] : "";
            echo '<td>' . $value . '</td>';
            if ($key == "Price") {
                $price = $value;
            }
            if ($key == "Quantity") {
                $quantity = $value;
            }
        }

        $total += $price * $quantity;
        echo '</tr>';
    }
}

echo '<tr>';
echo '<td colspan="5" align="center">總金額 = NT$' . $total . '元</td>';
echo '</tr>';
echo '</table>';
echo '<hr>';
echo '<a href="catalog.php">商品目錄</a> | <a href="shoppingcart.php">檢視購物車</a>';
?>