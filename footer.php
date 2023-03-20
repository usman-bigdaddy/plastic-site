 <footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
     <div class="t-center p-l-15 p-r-15">
         <a href="#">
             <img class="h-size2" src="images/icons/paypal.png" alt="IMG-PAYPAL" />
         </a>
         <a href="#">
             <img class="h-size2" src="images/icons/visa.png" alt="IMG-VISA" />
         </a>
         <a href="#">
             <img class="h-size2" src="images/icons/mastercard.png" alt="IMG-MASTERCARD" />
         </a>
         <a href="#">
             <img class="h-size2" src="images/icons/express.png" alt="IMG-EXPRESS" />
         </a>
         <a href="#">
             <img class="h-size2" src="images/icons/discover.png" alt="IMG-DISCOVER" />
         </a>
         <div class="t-center s-text8 p-t-20">
             Copyright © 2023 Aisha Umar Faruq. All rights reserved.
         </div>
     </div>
 </footer>

 <div class="btn-back-to-top bg0-hov" id="myBtn">
     <span class="symbol-btn-back-to-top">
         <i class="fa fa-angle-double-up" aria-hidden="true"></i>
     </span>
     <p id="user_email_p"><?php echo $_SESSION['user_email'] ?></p>
 </div>

 <div id="dropDownSelect1"></div>

 <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
 <script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>

 <script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>

 <script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
 <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
 <script>
     $.post("Service/get_cart_count.php", {
             user_email: $("#user_email_p").text()
         },
         function(data, status) {
             if (data != "") {
                 $("#cartCount").html(data.trim());
                 //$("#cartCountFooter").text(data.trim());
             }
         }, 'text');
 </script>
 <script type="text/javascript" src="vendor/select2/select2.min.js"></script>
 <script type="text/javascript">
     $(".selection-1").select2({
         minimumResultsForSearch: 20,
         dropdownParent: $("#dropDownSelect1"),
     });
 </script>

 <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
 <script type="text/javascript" src="js/slick-custom.js"></script>

 <script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>

 <script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>

 <script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
 <script type="text/javascript">
     $(".block2-btn-addcart").each(function() {
         var nameProduct = $(this)
             .parent()
             .parent()
             .parent()
             .find(".block2-name")
             .html();
         $(this).on("click", function() {
             swal(nameProduct, "is added to cart !", "success");
         });
     });

     $(".block2-btn-addwishlist").each(function() {
         var nameProduct = $(this)
             .parent()
             .parent()
             .parent()
             .find(".block2-name")
             .html();
         $(this).on("click", function() {
             swal(nameProduct, "is added to wishlist !", "success");
         });
     });
 </script>

 <script src="js/main.js"></script>
 <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"7a9ca487be733f1a","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2023.2.0","si":100}' crossorigin="anonymous"></script>

 </body>


 </html>