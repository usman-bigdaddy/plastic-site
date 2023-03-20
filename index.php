 <?php include 'header.php' ?>

 <section class="slide1">
   <div class="wrap-slick1">
     <div class="slick1">
       <div class="item-slick1 item1-slick1" style="background-image: url(images/plastic-pic-home-page.jpg)">
         <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
           <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
             Women Collection 2018
           </span>
           <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
             New arrivals
           </h2>
           <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
             <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
               Shop Now
             </a>
           </div>
         </div>
       </div>
       <div class="item-slick1 item2-slick1" style="background-image: url(images/plastic-pic-home-page-2.jpg)">
         <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
           <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
             Women Collection 2018
           </span>
           <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
             New arrivals
           </h2>
           <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
             <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
               Shop Now
             </a>
           </div>
         </div>
       </div>
       <div class="item-slick1 item3-slick1" style="background-image: url(images/plastic-pic-home-page-3.jpg)">
         <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
           <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
             Women Collection 2018
           </span>
           <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
             New arrivals
           </h2>
           <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
             <a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
               Shop Now
             </a>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

 <!-- <section class="banner bgwhite p-t-40 p-b-40">
   <div class="container">
     <div class="row">
       <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
         <div class="block1 hov-img-zoom pos-relative m-b-30">
           <img src="images/banner-02.jpg" alt="IMG-BENNER" />
           <div class="block1-wrapbtn w-size2">
             <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
               Dresses
             </a>
           </div>
         </div>

         <div class="block1 hov-img-zoom pos-relative m-b-30">
           <img src="images/banner-05.jpg" alt="IMG-BENNER" />
           <div class="block1-wrapbtn w-size2">
             <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
               Sunglasses
             </a>
           </div>
         </div>
       </div>
       <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
         <div class="block1 hov-img-zoom pos-relative m-b-30">
           <img src="images/banner-03.jpg" alt="IMG-BENNER" />
           <div class="block1-wrapbtn w-size2">
             <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
               Watches
             </a>
           </div>
         </div>

         <div class="block1 hov-img-zoom pos-relative m-b-30">
           <img src="images/banner-07.jpg" alt="IMG-BENNER" />
           <div class="block1-wrapbtn w-size2">
             <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
               Footerwear
             </a>
           </div>
         </div>
       </div>
       <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
         <div class="block1 hov-img-zoom pos-relative m-b-30">
           <img src="images/banner-04.jpg" alt="IMG-BENNER" />
           <div class="block1-wrapbtn w-size2">
             <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
               Bags
             </a>
           </div>
         </div>

         <div class="block2 wrap-pic-w pos-relative m-b-30">
           <img src="images/icons/bg-01.jpg" alt="IMG" />
           <div class="block2-content sizefull ab-t-l flex-col-c-m">
             <h4 class="m-text4 t-center w-size3 p-b-8">
               Sign up & get 20% off
             </h4>
             <p class="t-center w-size4">
               Be the frist to know about the latest fashion news and get
               exclu-sive offers
             </p>
             <div class="w-size2 p-t-25">
               <a href="#" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                 Sign Up
               </a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section> -->

 <section class="newproduct bgwhite p-t-45 p-b-105">
   <div class="container">
     <div class="sec-title p-b-60">
       <h3 class="m-text5 t-center">Featured Products</h3>
     </div>



     <div class="container">
       <div class="row text-center text-lg-start">
         <?php
          include "connect.php";
          $stmt =  $conn->prepare("SELECT * FROM product LIMIT 8");
          $stmt->execute();
          $result = $stmt->get_result();
          $email = "";
          if (isset($_SESSION['user_email'])) {
            $email = $_SESSION['user_email'];
          }
          while ($row = $result->fetch_assoc()) {
            echo "<div class=col-lg-3 col-md-4 col-6>" .
              "<a href=# class=d-block mb-4 h-100>" .
              "<img style=width:120px;height:120px class=img-fluid img-thumbnail src=images/products/" . $row["product_image"] . ">" .
              "</a>" .
              "<p style=color:white>" . $row["product_id"] . "</p>" .
              "<p style=color:white>" . $email . "</p>" .
              "<p>" . $row["product_name"] . "<br/>N " . $row["price"] . "</p>" .
              "<button id=buy_this_item_button class='btn btn-primary'>Buy</button>" .
              "</div>";
          }
          $stmt->close();
          $conn->close();
          ?>

       </div>
     </div>


   </div>
 </section>



 <?php include 'footer.php' ?>
 <script>
   $(document).on("click", "#buy_this_item_button", function() {
     pid = $(this).closest("div").find("p:eq(0)").html();
     user_email = $(this).closest("div").find("p:eq(1)").html();
     if (user_email === "") {
       alert("please login");
       return;
     }
     $.post("Service/add_to_cart_process.php", {
         product_id: pid,
         user_email: user_email

       },
       function(data, status) {
         alert(data);
       }, 'text');
   });
 </script>