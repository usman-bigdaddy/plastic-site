 <footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
     <div class="flex-w p-b-90">
         <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
             <h4 class="s-text12 p-b-30">GET IN TOUCH</h4>
             <div>
                 <p class="s-text7 w-size27">
                     Any questions? Let us know in store at 8th floor, 379 Hudson St,
                     New York, NY 10018 or call us on (+1) 96 716 6879
                 </p>
                 <div class="flex-m p-t-30">
                     <a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
                     <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
                     <a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
                     <a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
                     <a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
                 </div>
             </div>
         </div>
         <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
             <h4 class="s-text12 p-b-30">Categories</h4>
             <ul>
                 <li class="p-b-9">
                     <a href="#" class="s-text7"> Men </a>
                 </li>
                 <li class="p-b-9">
                     <a href="#" class="s-text7"> Women </a>
                 </li>
                 <li class="p-b-9">
                     <a href="#" class="s-text7"> Dresses </a>
                 </li>
                 <li class="p-b-9">
                     <a href="#" class="s-text7"> Sunglasses </a>
                 </li>
             </ul>
         </div>
         <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
             <h4 class="s-text12 p-b-30">Links</h4>
             <ul>
                 <li class="p-b-9">
                     <a href="#" class="s-text7"> Search </a>
                 </li>
                 <li class="p-b-9">
                     <a href="#" class="s-text7"> About Us </a>
                 </li>
                 <li class="p-b-9">
                     <a href="#" class="s-text7"> Contact Us </a>
                 </li>
                 <li class="p-b-9">
                     <a href="#" class="s-text7"> Returns </a>
                 </li>
             </ul>
         </div>
         <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
             <h4 class="s-text12 p-b-30">Help</h4>
             <ul>
                 <li class="p-b-9">
                     <a href="#" class="s-text7"> Track Order </a>
                 </li>
                 <li class="p-b-9">
                     <a href="#" class="s-text7"> Returns </a>
                 </li>
                 <li class="p-b-9">
                     <a href="#" class="s-text7"> Shipping </a>
                 </li>
                 <li class="p-b-9">
                     <a href="#" class="s-text7"> FAQs </a>
                 </li>
             </ul>
         </div>
         <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
             <h4 class="s-text12 p-b-30">Newsletter</h4>
             <form>
                 <div class="effect1 w-size9">
                     <input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com" />
                     <span class="effect1-line"></span>
                 </div>
                 <div class="w-size2 p-t-20">
                     <button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                         Subscribe
                     </button>
                 </div>
             </form>
         </div>
     </div>
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
             Copyright © 2017 Colorlib. All rights reserved.
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