<?php

declare(strict_types=1);

require_once 'functions.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions table</title>
</head>

<body>
    <table border='1'>
        <thead>
            <tr>
                <?php foreach ($transactions[0] as $key => $value) : ?>
                    <th><?php echo $key; ?></th>
                <?php endforeach; ?>
                <th>Days after transaction</th>
            </tr>
        </thead>

        <?php foreach ($transactions as $transaction) : ?>
            <tr>
                <?php foreach ($transaction as $value) : ?>
                    <td><?php echo $value; ?></td>
                <?php endforeach; ?>
                <td>
                    <?php echo daysSinceTransaction(new DateTime($transaction['date'])) ?>
                </td>
            </tr>
        <?php endforeach; ?>
            
        <tr>
            <td colspan="6">
                Total Amount: <?php echo calculateTotalAmount($transactions); ?>
            </td>
        </tr>
        <tbody>
        </tbody>
    </table>
</body>

</html>

<?php
