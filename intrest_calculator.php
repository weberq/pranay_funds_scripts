<?php

$loan_amount = '8000';

$one_month= $loan_amount * 0.01;
$one_emi = $one_month+ ($loan_amount/1);
// limit to 2 decimal places
$one_emi = number_format($one_emi, 2, '.', '');
$two_months= $loan_amount * 0.02;
$two_emi = $two_months+ ($loan_amount/2);
// limit to 2 decimal places
$two_emi = number_format($two_emi, 2, '.', '');
$three_months= $loan_amount * 0.03;
$three_emi = $three_months+ ($loan_amount/3);
// limit to 2 decimal places
$three_emi = number_format($three_emi, 2, '.', '');
$four_months= $loan_amount * 0.04;
$four_emi= $four_months+ ($loan_amount/4);
// limit to 2 decimal places
$four_emi = number_format($four_emi, 2, '.', '');
$five_months= $loan_amount * 0.05;
$five_emi= $five_months+ ($loan_amount/5);
// limit to 2 decimal places
$five_emi = number_format($five_emi, 2, '.', '');
$six_months= $loan_amount * 0.06;
$six_emi= $six_months+ ($loan_amount/6);
// limit to 2 decimal places
$six_emi = number_format($six_emi, 2, '.', '');
$seven_months= $loan_amount * 0.07;
$seven_emi= $seven_months+ ($loan_amount/7);
// limit to 2 decimal places
$seven_emi = number_format($seven_emi, 2, '.', '');
$eight_months= $loan_amount * 0.08;
$eight_emi= $eight_months+ ($loan_amount/8);
// limit to 2 decimal places
$eight_emi = number_format($eight_emi, 2, '.', '');
$nine_months= $loan_amount * 0.09;
$nine_emi= $nine_months+ ($loan_amount/9);
// limit to 2 decimal places
$nine_emi = number_format($nine_emi, 2, '.', '');
$ten_months= $loan_amount * 0.10;
$ten_emi= $ten_months+ ($loan_amount/10);
// limit to 2 decimal places
$ten_emi = number_format($ten_emi, 2, '.', '');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pranay Funds</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex,nofollow" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0;" />
    <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

    body {
        margin: 0;
        padding: 0;
        background: #e1e1e1;
    }

    div,
    p,
    a,
    li,
    td {
        -webkit-text-size-adjust: none;
    }

    .ReadMsgBody {
        width: 100%;
        background-color: #ffffff;
    }

    .ExternalClass {
        width: 100%;
        background-color: #ffffff;
    }

    body {
        width: 100%;
        height: 100%;
        background-color: #e1e1e1;
        margin: 0;
        padding: 0;
        -webkit-font-smoothing: antialiased;
    }

    html {
        width: 100%;
    }

    p {
        padding: 0 !important;
        margin-top: 0 !important;
        margin-right: 0 !important;
        margin-bottom: 0 !important;
        margin-left: 0 !important;
    }

    .visibleMobile {
        display: none;
    }

    .hiddenMobile {
        display: block;
    }

    @media only screen and (max-width: 600px) {
        body {
            width: auto !important;
        }

        table[class=fullTable] {
            width: 96% !important;
            clear: both;
        }

        table[class=fullPadding] {
            width: 85% !important;
            clear: both;
        }

        table[class=col] {
            width: 45% !important;
        }

        .erase {
            display: none;
        }
    }

    @media only screen and (max-width: 420px) {
        table[class=fullTable] {
            width: 100% !important;
            clear: both;
        }

        table[class=fullPadding] {
            width: 85% !important;
            clear: both;
        }

        table[class=col] {
            width: 100% !important;
            clear: both;
        }

        table[class=col] td {
            text-align: left !important;
        }

        .erase {
            display: none;
            font-size: 0;
            max-height: 0;
            line-height: 0;
            padding: 0;
        }

        .visibleMobile {
            display: block !important;
        }

        .hiddenMobile {
            display: none !important;
        }
    }
    </style>
</head>

<body>


    <!-- Header -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
        <tr>
            <td height="20"></td>
        </tr>
        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                    bgcolor="#ffffff" style="border-radius: 10px 10px 0 0;">
                    <tr class="hiddenMobile">
                        <td height="40"></td>
                    </tr>
                    <tr class="visibleMobile">
                        <td height="30"></td>
                    </tr>

                    <tr>
                        <td>
                            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center"
                                class="fullPadding">
                                <tbody>
                                    <tr>
                                        <td>
                                            <table width="220" border="0" cellpadding="0" cellspacing="0" align="left"
                                                class="col">
                                                <tbody>
                                                    <tr>
                                                        <td align="left"> <img src="logo.png" width="28" alt="logo"
                                                                border="0" /><b style="font-size: 1.3em;
    font-family: 'Open Sans';"> Pranay Funds</b></td>
                                                    </tr>
                                                    <tr class="hiddenMobile">
                                                        <td height="40"></td>
                                                    </tr>
                                                    <tr class="visibleMobile">
                                                        <td height="20"></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                                            Hello, Boomer.
                                                            <br> Thank you, for choosing Pranay Funds.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <table width="220" border="0" cellpadding="0" cellspacing="0" align="right"
                                                class="col">
                                                <tbody>
                                                    <tr class="visibleMobile">
                                                        <td height="20"></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="font-size: 21px; color: #efc729; letter-spacing: -1px; font-family: 'Open Sans', sans-serif; line-height: 1; vertical-align: top; text-align: right;">
                                                            Alpha
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    <tr class="hiddenMobile">
                                                        <td height="50"></td>
                                                    </tr>
                                                    <tr class="visibleMobile">
                                                        <td height="20"></td>
                                                    </tr>
                                                    <tr>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- /Header -->
    <!-- Order Details -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
        <tbody>
            <tr>
                <td>
                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                        bgcolor="#ffffff">
                        <tbody>
                            <tr>
                            <tr class="hiddenMobile">
                                <td height="60"></td>
                            </tr>
                            <tr class="visibleMobile">
                                <td height="40"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="480" border="0" cellpadding="0" cellspacing="0" align="center"
                                        class="fullPadding">
                                        <tbody>
                                            <tr>
                                                <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;"
                                                    width="52%" align="left">
                                                    Tenure
                                                </th>
                                                <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;"
                                                    align="left">
                                                    Intrest
                                                </th>
                                                <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;"
                                                    align="center">
                                                    EMI
                                                </th>
                                                <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;"
                                                    align="right">
                                                    Overall Repayment
                                                </th>
                                            </tr>
                                            <tr>
                                                <td height="1" style="background: #bebebe;" colspan="4"></td>
                                            </tr>
                                            <tr>
                                                <td height="10" colspan="4"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #efc729;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    class="article">
                                                    1 Month
                                                </td>
                                                <td
                                                    style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
                                                    1%
                                                </td>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="center">Rs.<?php echo $one_emi; ?>/month</td>

                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="right">Rs.<?php echo $total = $one_emi*1; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #efc729;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    class="article">
                                                    2 Months
                                                </td>
                                                <td
                                                    style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
                                                    2%
                                                </td>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="center">Rs.<?php echo $two_emi; ?>/month</td>

                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="right">Rs.<?php echo $two_emi*2; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                            </tr>
                                            <!-- 3 months  -->
                                            <tr>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #efc729;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    class="article">
                                                    3 Months
                                                </td>
                                                <td
                                                    style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
                                                    3%
                                                </td>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="center">Rs.<?php echo $three_emi; ?>/month</td>

                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="right">Rs.<?php echo $three_emi*3; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                            </tr>
                                            <!-- 4 months  -->
                                            <tr>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #efc729;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    class="article">
                                                    4 Months
                                                </td>
                                                <td
                                                    style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
                                                    4%
                                                </td>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="center">Rs.<?php echo $four_emi; ?>/month</td>

                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="right">Rs.<?php echo $four_emi*4; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                            </tr>
                                            <!-- 5 months  -->
                                            <tr>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #efc729;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    class="article">
                                                    5 Months
                                                </td>
                                                <td
                                                    style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
                                                    5%
                                                </td>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="center">Rs.<?php echo $five_emi; ?>/month</td>

                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="right">Rs.<?php echo $five_emi*5; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                            </tr>
                                            <!-- 6 months  -->
                                            <tr>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #efc729;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    class="article">
                                                    6 Months
                                                </td>
                                                <td
                                                    style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
                                                    6%
                                                </td>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="center">Rs.<?php echo $six_emi; ?>/month</td>

                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="right">Rs.<?php echo $six_emi*6; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                            </tr>
                                            <!-- 7 months  -->
                                            <tr>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #efc729;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    class="article">
                                                    7 Months
                                                </td>
                                                <td
                                                    style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
                                                    7%
                                                </td>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="center">Rs.<?php echo $seven_emi; ?>/month</td>

                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="right">Rs.<?php echo $seven_emi*7; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                            </tr>
                                            <!-- 8 months  -->
                                            <tr>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #efc729;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    class="article">
                                                    8 Months
                                                </td>
                                                <td
                                                    style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
                                                    8%
                                                </td>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="center">Rs.<?php echo $eight_emi; ?>/month</td>

                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="right">Rs.<?php echo $eight_emi*8; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                            </tr>
                                            <!-- 9 months  -->
                                            <tr>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #efc729;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    class="article">
                                                    9 Months
                                                </td>
                                                <td
                                                    style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
                                                    9%
                                                </td>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="center">Rs.<?php echo $nine_emi; ?>/month</td>

                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="right">Rs.<?php echo $nine_emi*9; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                            </tr>
                                            <!-- 10 months  -->
                                            <tr>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #efc729;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    class="article">
                                                    10 Months
                                                </td>
                                                <td
                                                    style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;">
                                                    10%
                                                </td>
                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #646a6e;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="center">Rs.<?php echo $ten_emi; ?>/month</td>

                                                <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33;  line-height: 18px;  vertical-align: top; padding:10px 0;"
                                                    align="right">Rs.<?php echo $ten_emi*10; ?>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="20"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- /Order Details -->

    <!-- Information -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
        <tbody>
            <tr>
                <td>
                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                        bgcolor="#ffffff">
                        <tbody>
                            <tr>
                            <tr class="hiddenMobile">
                                <td height="60"></td>
                            </tr>
                            <tr class="visibleMobile">
                                <td height="40"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="480" border="0" cellpadding="0" cellspacing="0" align="center"
                                        class="fullPadding">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table width="220" border="0" cellpadding="0" cellspacing="0"
                                                        align="left" class="col">

                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                                                    <strong>ACCOUNT INFORMATION</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100%" height="10"></td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                                                    <?php echo $account_number; ?> <br>
                                                                    <?php echo $customer_name; ?> <br>
                                                                    <?php echo $customer_email; ?> <br>
                                                                    <?php echo $customer_address; ?> <br>
                                                                    <?php echo $customer_contact; ?>

                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>


                                                    <table width="220" border="0" cellpadding="0" cellspacing="0"
                                                        align="right" class="col">
                                                        <tbody>
                                                            <tr class="visibleMobile">
                                                                <td height="20"></td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                                                    <strong>LOAN ACCOUNT</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="100%" height="10"></td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                                                    Nill<br> <br><a href="#" </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="480" border="0" cellpadding="0" cellspacing="0" align="center"
                                        class="fullPadding">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <table width="220" border="0" cellpadding="0" cellspacing="0"
                                                        align="left" class="col">
                                                        <tbody>
                                                            <tr class="hiddenMobile">
                                                                <td height="35"></td>
                                                            </tr>
                                                            <tr class="visibleMobile">
                                                                <td height="20"></td>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <table width="220" border="0" cellpadding="0" cellspacing="0" align="right"
                                        class="col">
                                        <tbody>
                                            <tr class="hiddenMobile">
                                                <td height="35"></td>
                                            </tr>
                                            <tr class="visibleMobile">
                                                <td height="20"></td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                                    <strong></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="100%" height="10"></td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr class="hiddenMobile">
                <td height="60"></td>
            </tr>
            <tr class="visibleMobile">
                <td height="30"></td>
            </tr>
        </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
    <!-- /Information -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">

        <tr>
            <td>
                <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable"
                    bgcolor="#ffffff" style="border-radius: 0 0 10px 10px;">
                    <tr>
                        <td>
                            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center"
                                class="fullPadding">
                                <tbody>
                                    <tr>
                                        <td
                                            style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                                            Have a nice day.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr class="spacer">
                        <td height="50"></td>
                    </tr>

                </table>
            </td>
        </tr>
        <tr>
            <td height="20"></td>
        </tr>
    </table>
</body>

</html>