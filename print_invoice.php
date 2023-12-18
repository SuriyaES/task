<!---------- Printing Invoice File  ---------->
<?php
// Database connection hfile
include "db_connect.php";
?>
<?php
$invoice = $_GET['invoice'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    *,
    *::after,
    *::before {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    :root {
        --blue-color: #0c2f54;
        --dark-color: #535b61;
        --white-color: #fff;
    }

    ul {
        list-style-type: none;
    }

    ul li {
        margin: 2px 0;
    }

    /* text colors */
    .text-dark {
        color: var(--dark-color);
    }

    .text-blue {
        color: var(--blue-color);
    }

    .text-end {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .text-start {
        text-align: left;
    }

    .text-bold {
        font-weight: 700;
    }

    /* hr line */
    .hr {
        height: 1px;
        background-color: rgba(0, 0, 0, 0.1);
    }

    /* border-bottom */
    .border-bottom {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    body {
        font-family: "Poppins", sans-serif;
        color: var(--dark-color);
        font-size: 14px;
    }

    .invoice-wrapper {
        min-height: 100vh;
        /* background-color: rgba(0, 0, 0, 0.1); */
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .invoice {
        max-width: 850px;
        margin-right: auto;
        margin-left: auto;
        background-color: var(--white-color);
        padding: 70px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        min-height: 920px;
    }

    .invoice-head-top-left img {
        width: 130px;
    }

    .invoice-head-top-right h3 {
        font-weight: 500;
        font-size: 27px;
        color: var(--blue-color);
    }

    .invoice-head-middle,
    .invoice-head-bottom {
        padding: 16px 0;
    }

    .invoice-body {
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 4px;
        overflow: hidden;
    }

    .invoice-body table {
        border-collapse: collapse;
        border-radius: 4px;
        width: 100%;
    }

    .invoice-body table td,
    .invoice-body table th {
        padding: 12px;
    }

    .invoice-body table tr {
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .invoice-body table thead {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .invoice-body-info-item {
        display: grid;
        /* grid-template-columns: 80% 20%; */
    }

    .invoice-body-info-item .info-item-td {
        padding: 12px;
        background-color: rgba(0, 0, 0, 0.02);
    }

    .invoice-foot {
        padding: 30px 0;
    }

    .invoice-foot p {
        font-size: 12px;
    }

    .invoice-btns {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .invoice-btn {
        padding: 3px 9px;
        color: var(--dark-color);
        font-family: inherit;
        border: 1px solid rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }

    .invoice-head-top,
    .invoice-head-middle,
    .invoice-head-bottom {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        padding-bottom: 10px;
    }

    @media screen and (max-width: 992px) {
        .invoice {
            padding: 40px;
        }
    }

    @media screen and (max-width: 576px) {

        .invoice-head-top,
        .invoice-head-middle,
        .invoice-head-bottom {
            grid-template-columns: repeat(1, 1fr);
        }

        .invoice-head-bottom-right {
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .invoice * {
            text-align: left;
        }

        .invoice {
            padding: 28px;
        }
    }

    .overflow-view {
        overflow-x: scroll;
    }

    .invoice-body {
        min-width: 600px;
    }

    @media print {
        body {
            margin: 0;
            overflow-y: hidden;
        }

        .invoice-wrapper,
        .invoice {
            page-break-inside: avoid;
        }

        .invoice {
            padding: 20px;
        }

        .invoice-btns {
            display: none;
        }

        .overflow-view {
            overflow-x: hidden;
        }

        @page {
            size: auto;
            margin: 0mm;

            @top-center, @top-right, @top-left {
                content: "";
            }

            @bottom-center, @bottom-right, @bottom-left {
                content: "";
            }
        }
    }
</style>

<body onload="window.print()">

    <div class="invoice-wrapper" id="print-area">
        <div class="invoice">
            <div class="invoice-container">
                <div class="invoice-head">
                    <div class="invoice-head-top">
                        <div class="invoice-head-top-left text-start">
                            <h1>Invoice</h1>
                        </div>
                    </div>
                    <div class="hr"></div>
                    <div class="invoice-head-middle">
                        <div class="invoice-head-middle-left text-start">
                            <p><span class="text-bold">Date</span>: <?php echo date('d-m-y'); ?></p>
                        </div>
                        <div class="invoice-head-middle-right text-end">
                            <p><span class="text-bold">Invoice No:</span><?php echo $_GET['invoice']; ?></p>
                        </div>
                    </div>
                    <div class="hr"></div>
                    <div class="invoice-head-bottom">
                        <div class="invoice-head-bottom-left">
                            <ul>
                                <li class="text-bold">Invoiced To:</li>
                                <?php
                                $sql = "SELECT Distinct(name),address,phone FROM invoice WHERE invoice_no ='$invoice'";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($query)) {
                                    echo " <li>" . $row['name'] . "</li>";
                                    $address = $row['address'];
                                    $addressParts = explode(',', $address);
                                    echo "<li>";
                                    foreach ($addressParts as $part) {
                                        echo trim($part) . "<br>";
                                    }
                                    echo "</li>";
                                    echo "<li>Phone No :" . $row['phone'] . "</li>";
                                }
                                ?>

                            </ul>
                        </div>
                        <div class="invoice-head-bottom-right">
                            <ul class="text-end">
                                <li class="text-bold">ADDRESS:</li>
                                <?php
                                $sql = "SELECT Distinct(name),address,phone FROM invoice WHERE invoice_no ='$invoice'";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($query)) {

                                    $address = $row['address'];

                                    // Split the address using commas
                                    $addressParts = explode(',', $address);
                                    echo "<li>";
                                    // Display each part of the address
                                    foreach ($addressParts as $part) {
                                        echo trim($part) . "<br>";
                                    }
                                    echo "</li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="overflow-view">
                    <div class="invoice-body">
                        <table>
                            <thead>
                                <tr>
                                    <td class="text-bold">S.No</td>
                                    <td class="text-bold">Product/Service</td>
                                    <td class="text-bold">Total Price</td>
                                    <td class="text-bold">Due Amt</td>
                                    <td class="text-bold">Subtotal</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $total = 0;
                                $sql1 = "SELECT * FROM invoice WHERE invoice_no='$invoice'";
                                $query1 = mysqli_query($conn, $sql1);
                                while ($row = mysqli_fetch_assoc($query1)) {
                                    $total += $row['price'];
                                ?><tr>

                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row['product']; ?></td>
                                        <td><?php echo "Rs." . $row['price']; ?></td>
                                        <td><?php echo "Rs." . $row['price']; ?></td>
                                        <td class="text-end"><?php echo "Rs." . $row['price']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <div class="invoice-body-info-item border-bottom">
                            <div class="info-item-td text-end text-bold" style="/*margin-left: 72%;*/">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sub Total : <?php echo " Rs." . $total; ?></div>
                        </div>
                        <div class="invoice-body-info-item border-bottom">
                            <div class="info-item-td text-end text-bold" style="/*margin-left: 72%;*/">&nbsp;&nbsp;Tax : Rs.00</div>

                        </div>
                        <div class="invoice-body-info-item">
                            <div class="info-item-td text-end text-bold">&nbsp;&nbsp;Total : <?php echo "Rs." . $total; ?></div>
                        </div>

                    </div>
                </div>
                <br><br>
                <div class="text-start">
                    <h4>Payment Details :</h4>
                    <div>
                        <br>
                        <?php
                        $sql2 = "SELECT * FROM invoice WHERE invoice_no='$invoice' limit 1";
                        $query2 = mysqli_query($conn, $sql2);
                        while ($row = mysqli_fetch_assoc($query2)) {
                        ?>
                            <table>
                                <tr>
                                    <td>Bank Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>
                                    <td><?php echo $row['bank']; ?></td>
                                </tr>
                                <tr>
                                    <td>Account Holder &nbsp;&nbsp;: </td>
                                    <td><?php echo $row['account_holder']; ?></td>
                                </tr>
                                <tr>
                                    <td>Account No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>
                                    <td><?php echo $row['account_no']; ?></td>
                                </tr>
                                <tr>
                                    <td>Branch Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>
                                    <td><?php echo $row['branch_code']; ?></td>
                                </tr>
                                <tr>
                                    <td>IFSC Code&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>
                                    <td><?php echo $row['ifsc']; ?></td>
                                </tr>
                            </table>
                        <?php } ?>

                    </div>

                </div>
                <div class="invoice-foot text-center"><br>
                    <p><span class="text-bold text-center">NOTE:&nbsp;</span>This is computer generated receipt and does not require physical signature.</p>

                </div>
                <div class="invoice-btns text-center"><br>
                    <button style="background-color: green;padding: 12px;width: 100px;border-radius: 10px;">
                        <a class="btn btn-success" href="invoice_list.php" style="text-decoration: none;color: #fff;">Back</a>
                    </button>
                </div>

            </div>
        </div>
    </div>

</body>

</html>