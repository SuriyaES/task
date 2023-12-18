<!-------------- Invoice form ----------------------->
<?php
//Database Connection file
include "db_connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>Invoice</title>
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
   <link rel="stylesheet" href="./style.css">

</head>

<body>
   <!-- partial:index.partial.html -->
   <div class="container">
      <div class="text">
         Invoice Form
      </div>
      <!------------------------------ form ----------------------------->
      <form action="backend.php" method="post">
         <?php
         $invoice = '';
         //-----------------invoice query----------------------------------
         $sql = "SELECT * FROM invoice ORDER BY id DESC LIMIT 1";
         $query = mysqli_query($conn, $sql);
         
         if ($query && mysqli_num_rows($query) > 0) {

             $row = mysqli_fetch_assoc($query);
         
             if (!$row['invoice_no'] || $row['invoice_no']=='') {
                 $invoice = "INVO-" . date('dmy') . "-01";
             } else {
                 $invoice = $row['invoice_no'];
                 $parts = explode("-", $invoice);
                 $autoIncrement = intval($parts[2]);
                 $autoIncrement++;
                 $invoice = $parts[0] . '-' . $parts[1] . '-' . str_pad($autoIncrement, 2, '0', STR_PAD_LEFT);
             }
         } else {
             $invoice = "INVO-" . date('dmy') . "-01";
         }
         
         ?>
         <div class="form-row">
            &nbsp;&nbsp;&nbsp;&nbsp;<label for="">INVOICE:</label>
            &nbsp;&nbsp;<div class="input-data">
               <input type="text" value="<?php echo $invoice; ?>" name="invoice_no" readonly>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data">
               <input type="text" name="name" required>
               <div class="underline"></div>
               <label for="">Name</label>
            </div>
            <div class="input-data">
               <input type="text" name="phone" required>
               <div class="underline"></div>
               <label for="">Phone No</label>
            </div>
         </div>

         <div id="productPriceContainer">
            <div class="form-row product-price-row">
               <div class="input-data">
                  <input type="text" name="product[]" required>
                  <div class="underline"></div>
                  <label for="">Product</label>
               </div>
               <div class="input-data">
                  <input type="text" name="price[]" required>
                  <div class="underline"></div>
                  <label for="">Price</label>
               </div>
               <span class="remove-btn" onclick="removeProductPriceRow(this)"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-x-circle" viewBox="0 0 16 16">
                     <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                     <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                  </svg>
                  </svg></span>
            </div>
         </div>

         <div class="form-row">
            &nbsp;&nbsp;&nbsp;&nbsp;<button type="button" onclick="addProductPriceRow()" style="background-color: green;color:white;padding:5px;border-radius:5px;"> Add product</button>
         </div>
         <div class="form-row">
            <div class="input-data">
               <input type="text" name="bank" required>
               <div class="underline"></div>
               <label for="">Bank Name</label>
            </div>
            <div class="input-data">
               <input type="text" name="bank_address" required>
               <div class="underline"></div>
               <label for="">Bank Address</label>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data">
               <input type="text" name="account_holder" required>
               <div class="underline"></div>
               <label for="">Account Holder</label>
            </div>
            <div class="input-data">
               <input type="text" name="account_no" required>
               <div class="underline"></div>
               <label for="">Account No</label>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data">
               <input type="text" name="branch_code" required>
               <div class="underline"></div>
               <label for="">Branch Code</label>
            </div>
            <div class="input-data">
               <input type="text" name="ifsc" required>
               <div class="underline"></div>
               <label for="">IFSC Code</label>
            </div>
         </div>
         <div class="form-row">
            <div class="input-data textarea">
               <textarea rows="8" cols="80" name="address" required></textarea>
               <br />
               <div class="underline"></div>
               <label for="">Write your Address</label>
               <br />
               <div class="form-row submit-btn">
                  <div class="input-data">
                     <div class="inner"></div>
                     <input type="submit" name="submit" value="submit">
                  </div>
                  <div class="input-data">
                     <div class="inner1"></div>
                     <a href="invoice_list.php" style="color: white;text-decoration:none;">Invoice List</a>
                  </div>
               </div>
               <br>
      </form>
   </div>
   <!-- partial -->

</body>

</html>
<!------------------ Script for dynmaically adding products ------------->
<script>
   function addProductPriceRow() {
      var container = document.getElementById('productPriceContainer');
      var newRow = container.querySelector('.product-price-row').cloneNode(true);
      container.appendChild(newRow);
   }

   function removeProductPriceRow(element) {
      var container = document.getElementById('productPriceContainer');
      if (container.childElementCount > 1) {
         container.removeChild(element.parentNode);
      } else {
         alert("At least one product and price row is required.");
      }
   }
</script>