<?php
$loan_amount = 219996;
$monthly_emi = 18333;
$paid_amount = 50000;
$num_of_emis = ceil($loan_amount / $monthly_emi);
$pending_emis = [];
$extra_payment = 0;

for ($i = 0; $i < $num_of_emis; $i++) {
    $pending_emi = $monthly_emi;
    if ($i === 0) {
        $pending_emi -= $paid_amount;
        if ($pending_emi < 0) {
            $extra_payment = abs($pending_emi);
            $pending_emi = 0;
        }
    } else if ($extra_payment > 0) {
        $pending_emi -= $extra_payment;
        if ($pending_emi < 0) {
            $extra_payment = abs($pending_emi);
            $pending_emi = 0;
        } else {
            $extra_payment = 0;
        }
    }
    $pending_emis[] = $pending_emi;
}

?>

<table>
    <thead>
        <tr>
            <th>EMI No.</th>
            <th>EMI Amount</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pending_emis as $i => $emi): ?>
        <tr>
            <td><?php echo $i + 1; ?></td>
            <td><?php echo number_format($emi, 2); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>