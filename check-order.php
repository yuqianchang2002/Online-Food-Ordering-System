<?php include('partials-front/header.php'); ?>
<html>
<head>
    <link href="css/style.css" rel="stylesheet" /><!--Link to style.css file to use the design-->
</head>

<body>
    <div class="wrapper">
        <h1>Manage Food Order</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th width="5%">#</th>
                        <th width="10%">Order Date</th>
                        <th width="10%">Food</th>
                        <th width="5%">Price</th>
                        <th width="5%">Qty</th>
                        <th width="6%">Total</th>
                        <th width="8%">Status</th>
                        <th width="10%">Customer</th>
                    </tr>

                    <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC"; // Display the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?> </td>
                                        <td><?php echo $order_date; ?></td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo 'RM '.$price; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo 'RM '.$total; ?></td>
                                        

                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                                if($status=="Ordered")
                                                {
                                                    echo "<label style='color: blue;'>$status</label>";
                                                }
                                                elseif($status=="On Delivery")
                                                {
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }
                                                elseif($status=="Delivered")
                                                {
                                                    echo "<label style='color: green;'><b>$status</b></label>";
                                                }
                                                elseif($status=="Cancelled")
                                                {
                                                    echo "<label style='color: red;'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                        <td><?php echo $customer_name; ?></td>
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>
                </table>
    </div>
</body>
</html>
<?php include('partials-front/footer.php'); ?>
<!--code end-->
