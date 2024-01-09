 <?php require_once 'includes/head.php' ?>

 <body class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
     <div class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1">
         <a href="" class="p-4 bg-verblanc">
             <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 448 512">
                 <path fill="#2d2522" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
             </svg>
         </a>
         <div class="flex-1 w-full bg-verblanc text-center hidden lg:flex">

             <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat" style="background-image: url('<?= BASE_URL_ASSETS ?>img/undraw_Access_account_re_8spm-removebg-preview.png');">
             </div>
         </div>
         <div class="lg:w-full xl:w-5/12 p-6 sm:p-12">

             <div class="flex flex-row gap-1 items-center justify-center ml-2 ">



                 <div class="mt-4 flex flex-row gap-1 items-center justify-center ml-2 ">


                     <h1 class="font-extrabold font-serif text-3xl text-mr text-shadow">Wiki&trade;</h1>

                 </div>
             </div>
             <div class=" flex flex-col items-center">

                 <div class=" w-full flex-1 ">


                     <div class="my-4 border-b text-center">
                         <p class="border-b  leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                             Alreadt Have an account? <a href="<?= BASE_URL ?>/user/log_in" class="text-dark font-bold">LogIn</a>
                         </p>
                     </div>
                     <form action="<?= BASE_URL ?>/user/Usersignup" method="post" onsubmit="return validateForm()">
                         <div class="mx-auto max-w-xs">
                             <input class="mt-2 mb-4 w-full px-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="text" id="firstname" name="firstname" required placeholder="First Name" />
                             <span id="firstnameError" class="error-message text-xs mt-0"></span>

                             <input class="mb-4 w-full px-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="text" id="lastname" name="lastname" required placeholder="Last Name" />
                             <span id="lastnameError" class="error-message text-xs"></span>

                             <input class="mb-4 w-full px-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="email" id="email" name="email" required placeholder="E-mail" />
                             <span id="emailError" class="error-message text-xs"></span>

                             <input class="w-full px-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="password" id="password" name="password" required placeholder="Password" />
                             <span id="passwordError" class="error-message text-xs"></span>

                             <button class="mt-8 tracking-wide font-semibold bg-mrbg text-gray-100 w-full py-4 rounded-lg hover:bg-moinmaron transition-all duration-300 ease-in-out flex items-center justify-center  focus:outline-none" name="submit" type="submit">
                                 <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                     <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                     <circle cx="8.5" cy="7" r="4" />
                                     <path d="M20 8v6M23 11h-6" />
                                 </svg>
                                 <span class="ml-3">
                                     Sign Up
                                 </span>
                             </button>
                         </div>
                     </form>



                 </div>
             </div>
         </div>

     </div>

 </body>

 <?php require_once 'includes/foot.php' ?>

 </html>