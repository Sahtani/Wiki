 <?php require_once 'includes/sidenavbar.php' ?>
 <?php
     $cats = $this->view_data['category'];

    ?>
 <div class="p-4 sm:ml-64 bg-white">
     <div class="p-4 rounded-lg mt-14">
         <div class="grid md:grid-cols-2 grid-cols-1  gap-4 mb-4">
             <!-- <form method=post action="<?= BASE_URL ?>/task/search" class="w-full">
                    <div class='max-w-md ml-6 shadow-xl w-full'>
                        <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">


                            <input class="border border-0 border-white focus:outline-none focus:ring focus:ring-white h-full w-full outline-none text-sm text-gray-700 pr-2" name="task_search" type="text" id="search" placeholder="Search task.." />
                            <button id="button" type="submit" name="search_submit" class="grid place-items-center h-full w-12 text-gray-300 border border-0 border-white focus:outline-none focus:ring focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form> -->
         </div>
         <div class="grid grid-cols-1 md:grid-cols-3 md:grid-rows-2 gap-4 px-4 pb-8 items-start  ">
             <div class="  rounded bg-grey-light  flex-no-shrink w-70 p-2 mr-3">

                 <div class="todo">
                     <?php
                        // if ($tasks > 0) {
                            foreach ($cats as $cat) {
                        //         if ($task['status'] === "to do") {


                        ?>
                     <div class="relative flex flex-col items-start p-4 mt-3 bg-white rounded-lg cursor-pointer bg-opacity-90 group hover:bg-opacity-100 shadow-xl hover:shadow-2xl" draggable="true">
                         <button class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                             <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                 <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                             </svg>
                         </button>
                         <span class="flex items-center h-6 px-3 text-xs font-semibold text-pink-500 bg-pink-100 rounded-full"><?=$cat["name"]?></span>
                         <h4 class="mt-3 text-sm font-medium">dsfqqd</h4>
                         <div class="flex items-center w-full justify-between mt-3 text-xs font-medium text-gray-400">
                             <div class="flex items-center">
                                 <svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                     <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                 </svg>
                                 <span class="ml-1 leading-none">dfdf</span>
                             </div>
                             <div class="flex items-center justify-end ">
                                 <a href="<?= BASE_URL ?>/task/delete_task/" title="Archive">
                                     <div class="relative flex items-center ml-4">
                                         <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                             <path fill="#FF4F4D" d="M576 128c0-35.3-28.7-64-64-64H205.3c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128zM271 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                         </svg>

                                     </div>
                                 </a>
                                 <a href="<?= BASE_URL ?>/task/updateTask/" title="Update task">
                                     <div class="flex items-center ml-4">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="#16a34a" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                             <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                         </svg>
                                     </div>
                                 </a>
                             </div>
                         </div>
                     </div>
<?php }?>
                 </div>
             </div>
             <div class="rounded bg-grey-light flex-no-shrink w-70 p-2 mr-3">

                 <div class="inprogress">
                     <?php
                        //  if ($tasks > 0) {
                        //     foreach ($tasks as $task) {
                        //         if ($task['status'] === "in progress") {



                        ?>
                     <div class=" relative flex flex-col items-start p-4 mt-3 bg-white rounded-lg cursor-pointer bg-opacity-90 group hover:bg-opacity-100 shadow-xl hover:shadow-2xl" draggable="true">
                         <button class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                             <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                 <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                             </svg>
                         </button>
                         <span class="flex items-center h-6 px-3 text-xs font-semibold text-sky-500 bg-sky-100 rounded-full">hhhhh</span>
                         <h4 class="mt-3 text-sm font-medium">jjjjjjjjjj</h4>
                         <div class="flex items-center justify-between w-full mt-3 text-xs font-medium text-gray-400">

                             <div class="flex items-center">
                                 <svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                     <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                 </svg>
                                 <span class="ml-1 leading-none">uuuuuuuuu</span>
                             </div>
                             <div class="flex items-center justify-end ">
                                 <a href="<?= BASE_URL ?>/task/delete_task/kkkkkkk" title="Archive">
                                     <div class="relative flex items-center ml-4">
                                         <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                             <path fill="#FF4F4D" d="M576 128c0-35.3-28.7-64-64-64H205.3c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128zM271 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                         </svg>
                                     </div>
                                 </a>
                                 <a href="<?= BASE_URL ?>/task/updateTask/" title="Update task">
                                     <div class="flex items-center ml-4">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="#16a34a" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                             <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                         </svg>
                                     </div>
                                 </a>
                             </div>

                         </div>
                     </div>

                 </div>
             </div>
             <div class="rounded bg-grey-light flex-no-shrink w-70 p-2 ">

                 <div class="done">
                     <?php
                        // if ($tasks > 0) {
                        //     foreach ($tasks as $task) {
                        //         if ($task['status'] === "done") {
                        ?>
                     <div class="relative flex flex-col items-start p-4 mt-3 bg-white rounded-lg cursor-pointer bg-opacity-90 group hover:bg-opacity-100 shadow-xl hover:shadow-2xl" draggable="true">
                         <button class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                             <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                 <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                             </svg>
                         </button>
                         <span class="flex items-center h-6 px-3 text-xs font-semibold text-green-500 bg-green-100 rounded-full">jjjjjjjj</span>
                         <h4 class="mt-3 text-sm font-medium">llllllll</h4>
                         <div class="flex items-center justify-between  w-full mt-3 text-xs font-medium text-gray-400">

                             <div class="flex items-center">
                                 <svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                     <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                 </svg>
                                 <span class="ml-1 leading-none">jjjjj</span>
                             </div>
                             <div class="flex items-center justify-end ">
                                 <a href="<?= BASE_URL ?>/task/delete_task/" title="Archive">
                                     <div class="relative flex items-center ml-4">
                                         <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                             <path fill="#FF4F4D" d="M576 128c0-35.3-28.7-64-64-64H205.3c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128zM271 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                         </svg>
                                     </div>
                                 </a>
                                 <a href="<?= BASE_URL ?>/task/updateTask/" title="Update task">
                                     <div class="flex items-center ml-4">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="#16a34a" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                             <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                         </svg>
                                     </div>
                                 </a>
                             </div>

                         </div>
                     </div>

                 </div>
             </div>
         </div>

     </div>
 </div>
 <script>
     const todoCount = document.querySelector(".todo").childElementCount;
     const inprogressCount = document.querySelector(".inprogress").childElementCount;
     const doneCount = document.querySelector(".done").childElementCount;
     document.querySelector(".doneStatistic").innerText = doneCount;
     document.querySelector(".inprogressStatistic").innerText = inprogressCount;
     document.querySelector(".todoStatistic").innerText = todoCount;
 </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
 </body>