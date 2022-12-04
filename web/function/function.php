<?php

   $db = mysqli_connect("localhost","root","","shop");
   function getRealIpUser(){
       switch(true){
           case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
           case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
           case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
           default : return $_SERVER['REMOTE_ADDR'];
       }
   }

   function add_cart($id_product){
            global $db;
           $ip_add = getRealIpUser();
           $p_id = $id_product;
           $product_qty = $_POST['product_qty'];
           $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
           $run_check = mysqli_query($db,$check_product);
           if(mysqli_num_rows($run_check)>0){
               
               echo "<script>
                    alert('Sản phẩm đã có trong giỏ hàng của bạn');
                   window.open('cart.php','_self');
               </script>";
           }
           else{
           
               $query = "insert into cart (p_id,ma_khach_hang,ip_add,qty) 
                        values ('$p_id','".$_SESSION['ma']."','$ip_add','$product_qty')";
               mysqli_query($db,$query);
               
               echo "<script>window.open('cart.php','_self');</script>";
           }
       
   }

   function getProNew(){
       global $db;
       $get_products = "select * from products order by 1 DESC LIMIT 0,8";
       $run_products = mysqli_query($db,$get_products);
       while($row_products=mysqli_fetch_array($run_products)){
           $pro_id = $row_products['product_id'];
           $pro_title = $row_products['product_title'];
           $pro_price = $row_products['product_price'];
           $pro_img1 = $row_products['product_img1'];
           $pro_stt = $row_products['product_stt'];
           if($pro_stt=="new"){
            $pro_stt="
                    <a href='single.php?pro_id=$pro_id' class='stt $pro_stt'>
                        <div class='theStt'> $pro_stt </div>
                        <div class='sttBackground'></div>
                    </a>
                    ";
            }
            echo "
            <div class='col-md-3 new-grid simpleCart_shelfItem wow flipInY animated' data-wow-delay='.5s' style='margin: 0 18px 20px 0;'>
                 <div class='new-top'>
                     <a href='single.php?pro_id=$pro_id'>
                         <img src='admin/$pro_img1' class='img-responsive' alt='' />
                      </a>
                  </div>   
                  <div class='new-bottom'>
                      <h5><a class='name' href='single.php?pro_title=$pro_title'>$pro_title </a></h5>                     
                      <div class='ofr'>
                          <p><span class='item_price'>$pro_price</span><sup>đ</sup></p>
                      </div>
                  </div>
                  $pro_stt
            </div>           
         ";
        }
   }

   function getPro(){
    global $db;
    $get_products = "select * from products order by product_id limit 0,12";
    $run_products = mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_price_sale = $row_products['product_price_sale'];
        $pro_img1 = $row_products['product_img1'];
        $pro_stt = $row_products['product_stt'];
        if($pro_stt == "sale"){
            $product_price = "<del> $pro_price<sup>đ</sup> </del>";
            $product_price_sale = " $pro_price_sale";
        }
        else{
            $product_price = "$pro_price";
            $product_price_sale = "";
        }
        if($pro_stt == ""){

        }else{
            $pro_stt="
               <a href='single.php?pro_id=$pro_id' class='stt $pro_stt'>
                  <div class='theStt'> $pro_stt </div>
                  <div class='sttBackground'></div>
                </a>
            ";
        }
        echo"
            <div class='col-md-3 gallery-grid wow flipInY animated ' data-wow-delay='.5s ' style='margin-right: 18px;'>
               <a href='single.php?pro_id=$pro_id'>
                <img src='admin/$pro_img1' class='img-responsive' alt='' />
                </a>
                <div class='gallery-text simpleCart_shelfItem'>
                <h5><a class='name' href='single.php?pro_title=$pro_title'>$pro_title </a></h5>
                <p><span class='item_price'>$product_price$product_price_sale</span><sup>đ</sup></p>
                
               </div>
               $pro_stt
            </div>
        ";
    }
   }

   function getPCat(){
    global $db;
    $get_p_cat = "select * from categories";
    $run_p_cat = mysqli_query($db,$get_p_cat);
    while($row_p_cat=mysqli_fetch_array($run_p_cat)){
        $p_cat_id = $row_p_cat['p_cat_id'];
        $p_cat_title = $row_p_cat['p_cat_title'];
        echo"
            <li>
               <a href='products.php?p_cat=$p_cat_id'> $p_cat_title </a>
            </li>
         ";
        }
   }

   function getpcatpro(){
       global $db;
       if(isset($_GET['p_cat'])){
           $p_cat_id = $_GET['p_cat'];
           $get_p_cat = "select * from categories where p_cat_id='$p_cat_id'";
           $run_p_cat = mysqli_query($db,$get_p_cat);
           $row_p_cat = mysqli_fetch_array($run_p_cat);
           $p_cat_title = $row_p_cat['p_cat_title'];
           $p_cat_desc = $row_p_cat['p_cat_desc'];
           $get_products = "select * from products where p_cat_id='$p_cat_id'";
           $run_products = mysqli_query($db,$get_products);
           $count = mysqli_num_rows($run_products);
           if($count==0){
               echo "
                   <div class='box'>
                       <h1> Không tìm thấy sản phẩm trong danh mục!</h1>
                   </div>
               ";
           }else{
               echo"
                  <div class='box'>
                     <h1>$p_cat_title</h1>
                     <p>$p_cat_desc</p>
                  </div>
               ";
           }
           while($row_products=mysqli_fetch_array($run_products)){
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_price_sale = $row_products['product_price_sale'];
            $pro_img1 = $row_products['product_img1'];
            $pro_stt = $row_products['product_stt'];
            if($pro_stt == "sale"){
                $product_price = "<del> $pro_price<sup>đ</sup> </del>";
                $product_price_sale = " $pro_price_sale";
            }
            else{
                $product_price = "$pro_price";
                $product_price_sale = "";
            }
            if($pro_stt == ""){

            }else{
            $pro_stt="
                <a href='single.php?pro_id=$pro_id' class='stt $pro_stt'>
                <div class='theStt'> $pro_stt </div>
                <div class='sttBackground'></div>
                </a>
            ";
            }
            echo"
                    <div class='product-grids simpleCart_shelfItem wow fadeInUp animated ' data-wow-delay='.5s ' style='margin-right: 18px;'>
                    <div class='new-top'>
                    <a href='single.php?pro_id=$pro_id'>
                        <img src='admin/$pro_img1' class='img-responsive' alt='' />
                    </a>
                    </div>   
                    <div class='new-bottom'>
                    <h5><a class='name' href='single.php?pro_title=$pro_title'>$pro_title </a></h5>
                    <div class='ofr'>
                    <p><span class='item_price'>$product_price$product_price_sale</span><sup>đ</sup></p>
                    </div>
                    </div>
                    $pro_stt
                    </div>
                ";
           }

       }
   }

   function items(){
       global $db;
       $ip_add = getRealIpUser();
       $get_items = "select * from cart where ip_add = '$ip_add'";
       $run_items = mysqli_query($db,$get_items);
       $count_items = mysqli_num_rows($run_items);
       echo $count_items;
   }
// em có sửa chi ko-- nãy em sữa phân trang mà bên css thôi -- em bật vô phần đó anh coi vs. phân trang à u
// em chịu đó ko ko cái bị
// hay là do lag hè thử tắt xong mở lên lại đi-- rứa chừ em tắt luôn mai mở đi ngủ bù hôm qua đã :)) ^^ oki ngủ ngon hý, anh cũng nn bye


   function total_price(){
       global $db;
       $ip_add = getRealIpUser();
       $total = 0;
       $select_cart = "select * from cart where ip_add='$ip_add'";
       $run_cart = mysqli_query($db,$select_cart);
       while($record=mysqli_fetch_array($run_cart)){
           $pro_id = $record['p_id'];
           $pro_qty = $record['qty'];
           $get_price = "select * from products where product_id='$pro_id'";
           $run_price = mysqli_query($db,$get_price);
           while($row_price=mysqli_fetch_array($run_price)){
               $sub_total = $row_price['product_price']*$pro_qty;
               $total += $sub_total;
           }
       }
       echo $total ;
   }

?>


