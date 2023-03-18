 <?php include 'header.php' ?>

 <style>
     .card {

         width: 400px;
         border: none;

     }




     .btr {

         border-top-right-radius: 5px !important;
     }


     .btl {

         border-top-left-radius: 5px !important;
     }

     .btn-dark {
         color: #fff;
         background-color: #0d6efd;
         border-color: #0d6efd;
     }


     .btn-dark:hover {
         color: #fff;
         background-color: #0d6efd;
         border-color: #0d6efd;
     }


     .nav-pills {

         display: table !important;
         width: 100%;
     }

     .nav-pills .nav-link {
         border-radius: 0px;
         border-bottom: 1px solid #0d6efd40;

     }

     .nav-item {
         display: table-cell;
         background: #0d6efd2e;
     }


     .form {

         padding: 10px;
         height: 300px;
     }

     .form input {

         margin-bottom: 12px;
         border-radius: 3px;
     }


     .form input:focus {

         box-shadow: none;
     }


     .form button {

         margin-top: 20px;
     }
 </style>
 <div class="d-flex justify-content-center align-items-center mt-5">


     <div class="card">

         <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
             <li class="nav-item text-center">
                 <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
             </li>
             <li class="nav-item text-center">
                 <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Signup</a>
             </li>

         </ul>
         <div class="tab-content" id="pills-tabContent">
             <form class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                 <div class="form px-4 pt-5">

                     <input type="email" required name="email_login" class="form-control" placeholder="Email">

                     <input type="password" required name="password_login" class="form-control" placeholder="Password">
                     <button class="btn btn-dark btn-block">Login</button>

                 </div>



             </form>
             <form class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">


                 <div class="form px-4">

                     <input type="text" required name="name" class="form-control" placeholder="Name">

                     <input type="email" required name="email" class="form-control" placeholder="Email">

                     <input type="tel" required name="phone" class="form-control" placeholder="Phone">

                     <input type="password" required name="password" class="form-control" placeholder="Password">

                     <button class="btn btn-dark btn-block">Signup</button>


                 </div>



             </form>

         </div>




     </div>


 </div>

 <?php include 'footer.php' ?>