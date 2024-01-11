 <?php require_once 'includes/head.php' ?>


 <body class="min-h-screen bg-verblanc text-gray-900 flex justify-center">
     <div class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1">
         <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-8">
             <a href="<?= BASE_URL ?>/wiki" title="Back to home page">
                 <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                     <path fill="#2d2522" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                 </svg>
             </a>
             <div class="mt-4 flex flex-row gap-1 items-center justify-center ml-2 ">


                 <h1 class="font-extrabold font-serif text-3xl text-mr text-shadow">Wiki&trade;</h1>

             </div>
             <div class="mt-10 flex flex-col items-center">

                 <div class=" w-full flex-1 ">


                     <div class="my-5 border-b text-center">
                         <a href="<?= BASE_URL ?>/user/" class="border-b  leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                             Don't have an account
                         </a>
                     </div>
                     <form class="mt-10  " action="<?= BASE_URL ?>/user/Userlogin" method="post">
                         <div class="mx-auto max-w-xs">
                             <input class="w-full px-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" name="email" type="email" placeholder="Email" />
                             <input class="w-full px-4 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5" name="password" type="password" placeholder="Password" />
                             <button class="mt-5 tracking-wide font-semibold bg-mrbg text-gray-100 w-full py-4 rounded-lg hover:bg-moinmaron transition-all duration-300 ease-in-out flex items-center justify-center  focus:outline-none" name="submit" type="submit">
                                 <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                     <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                     <circle cx="8.5" cy="7" r="4" />
                                     <path d="M20 8v6M23 11h-6" />
                                 </svg>
                                 <span class="ml-3">
                                     Log In
                                 </span>
                             </button>
                             <p class="text-red-500 text-center mb-2 mt-3">
                                 <?= $this->view_data["error"]; ?>
                             </p>

                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <div class="flex-1 bg-verblanc text-center hidden lg:flex">
             <div class="m-8 xl:m-16 w-full   bg-no-repeat" style="background-image: url('<?= BASE_URL_ASSETS ?>img/undraw_Team_spirit_re_yl1v-removebg-preview.png');">
             </div>
         </div>
     </div>

 </body>

 </html>