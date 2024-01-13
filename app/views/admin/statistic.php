 <?php require_once 'includes/sidenavbar.php' ?>
 <?php
    $totalWiki = $this->view_data['totalWiki'];
    $user = $this->view_data['user'];
    $totalTag = $this->view_data['totalTag'];
    $author = $this->view_data['totalAuthor'];

    ?>
 <div class="p-4 sm:ml-64 bg-white">

     <div class="p-4 rounded-lg mt-14">
         <div class="bg-gray-50 px-4 py-10 font-[sans-serif] text-[#333]">
             <h2 class="text-3xl font-bold mb-14 text-center">All Statistics</h2>
             <div class="grid sm:grid-cols-2 gap-6 max-w-6xl mx-auto">
                 <div class="bg-white flex gap-6 max-lg:flex-col rounded-2xl md:p-8 p-6 shadow-[0_-4px_24px_-8px_rgba(0,0,0,0.2)]">
                     <h3 class="text-5xl text-mr font-extrabold"><?= $totalWiki['totalWikis'] ?><span class="text-beige">W</span></h3>
                     <div>
                         <p class="text-base font-bold text-maron">Total Wikis</p>
                         <p class="text-sm text-gray-500 mt-2">here is the total of wikis in your dashboard</p>
                     </div>
                 </div>
                 <div class="bg-white flex gap-6 max-lg:flex-col rounded-2xl md:p-8 p-6 shadow-[0_-4px_24px_-8px_rgba(0,0,0,0.2)]">
                     <h3 class="text-5xl text-mr font-extrabold">1<span class="text-blue-600"></span></h3>
                     <div>
                         <p class="text-base font-bold "><?= $user['lastname'] . ' ' . $user['firstname'] ?></p>
                         <p class="text-sm text-gray-500 mt-2">Author with the most wikis.</p>
                     </div>
                 </div>
                 <div class="bg-white flex gap-6 max-lg:flex-col rounded-2xl md:p-8 p-6 shadow-[0_-4px_24px_-8px_rgba(0,0,0,0.2)]">
                     <h3 class="text-5xl text-mr font-extrabold"><?= $totalTag["totalTags"] ?><span class="text-beige">T</span></h3>
                     <div>
                         <p class="text-base font-bold">All Tags</p>
                         <p class="text-sm text-gray-500 mt-2">here is the number of tags created by you.</p>
                     </div>
                 </div>
                 <div class="bg-white flex gap-6 max-lg:flex-col rounded-2xl md:p-8 p-6 shadow-[0_-4px_24px_-8px_rgba(0,0,0,0.2)]">
                     <h3 class="text-5xl text-mr font-extrabold"><?= $author["totalAuthors"] ?></h3>
                     <div>
                         <p class="text-base font-bold">All Authors</p>
                         <p class="text-sm text-gray-500 mt-2">here is the number of all authors.</p>
                     </div>
                 </div>
                 <div class="bg-white flex gap-6 max-lg:flex-col rounded-2xl md:p-8 p-6 shadow-[0_-4px_24px_-8px_rgba(0,0,0,0.2)]">
                     <h3 class="text-5xl text-mr font-extrabold"><?= $author["totalAuthors"] ?></h3>
                     <div>
                         <p class="text-base font-bold">All Authors</p>
                         <p class="text-sm text-gray-500 mt-2">here is the number of all authors.</p>
                     </div>
                 </div>
                 <div class="bg-white flex gap-6 max-lg:flex-col rounded-2xl md:p-8 p-6 shadow-[0_-4px_24px_-8px_rgba(0,0,0,0.2)]">
                     <h3 class="text-5xl text-mr font-extrabold"><?= $author["totalAuthors"] ?></h3>
                     <div>
                         <p class="text-base font-bold">All Authors</p>
                         <p class="text-sm text-gray-500 mt-2">here is the number of all authors.</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 </body>
 <?php require_once 'includes/footer.php' ?>

 </html>