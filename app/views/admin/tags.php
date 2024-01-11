 <?php require_once 'includes/sidenavbar.php' ?>
 <?php
    $tags = $this->view_data['tags'];

    ?>
 <div class="p-4 sm:ml-64 bg-white">

     <div class="p-4 rounded-lg mt-14">
         <div class="grid md:grid-cols-2 grid-cols-1  gap-4 mb-4">
             <div class="w-full">

                 <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
                     <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                         <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                     </svg>
                     <span class="sr-only">Info</span>
                     <div>
                         <span class="font-medium"><?= $this->view_data["error"]; ?></span>
                     </div>
                 </div>

                 <div class='max-w-md ml-6  w-full'>
                     <div class="relative flex items-center w-1/2 h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">



                         <button data-modal-target="crud" onclick="clickBuyBtn(event)" data-modal-toggle="crud" class="font-semibold bg-mrbg text-gray-100 w-full py-4 rounded-lg hover:bg-moinmaron transition-all duration-300 ease-in-out flex items-center justify-center  focus:outline-none">
                             <svg xmlns=" http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                                 <path fill="#ffffff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                             </svg>
                             <span class="ml-2 text-xl">Add new tag</span>
                         </button>
                     </div>
                 </div>
             </div>
         </div>
         <div class="grid grid-cols-1 md:grid-cols-4 md:grid-rows-2 gap-4 px-4 pb-8 items-start  ">
             <?php
                if ($tags > 0) {
                    foreach ($tags as $tag) {


                ?>

                     <div class="  rounded bg-grey-light  flex-no-shrink w-60 p-2 mr-3">
                         <div class="relative flex flex-col items-start p-4 mt-3 bg-white rounded-lg cursor-pointer bg-opacity-90 group hover:bg-opacity-100 shadow-xl hover:shadow-2xl" draggable="true">
                             <button class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                                 <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                     <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                 </svg>
                             </button>
                             <h4 class="mt-3 text-sm font-medium">#<?= $tag["name"]
                                                                    ?></h4>
                             <div class="flex items-center w-full justify-between mt-3 text-xs font-medium text-gray-400">
                                 <div class="flex items-center justify-end ">
                                     <a title="Delete" href="<?= BASE_URL ?>/tag/delete_tag/<?= $tag['idtag'] ?>">
                                         <div class="relative flex items-center ml-4">
                                             <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                                 <path fill="#FF4F4D" d="M576 128c0-35.3-28.7-64-64-64H205.3c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128zM271 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                             </svg>

                                         </div>
                                     </a>
                                     <a title="Edit" class="editCategorieButton" data-modal-target="crud-modal" onclick="clickBuyBtn(event)" data-modal-toggle="crud-modal" data-categorie-id="<?= $tag["idtag"] ?>" data-categorie-name="<?= $tag["name"] ?>" ?>


                                         <div class=" flex items-center ml-4">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="#16a34a" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                 <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                             </svg>
                                         </div>
                                     </a>
                                 </div>
                             </div>
                         </div>

                     </div> <?php }
                    } ?>
         </div>





     </div>
 </div>
 <!-- add -->
 <div id="crud" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative p-4 w-full max-w-md max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow">
             <!-- Modal header -->
             <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-white">
                 <h3 class="text-lg font-semibold text-gray-900">
                     Add New tag
                 </h3>
                 <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>
             <!-- Modal body -->
             <form class="p-4 md:p-5" action="<?= BASE_URL ?>/tag/add_tag" method="post">
                 <div class="grid gap-4 mb-4 grid-cols-2">
                     <div class="col-span-2">
                         <input type="hidden" name="id" id="editCategorieId">
                         <label for="editName" class="block mb-2 text-sm font-medium text-gray-800">Name</label>
                         <input type="text" name="name" id="editName" class="bg-white border focus:outline-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-white dark:border-gray-500 dark:placeholder-gray-400" placeholder="Tag name" required="">
                     </div>
                 </div>
                 <div class="flex items-center justify-center">
                     <button name="submit-add" type="submit" class="text-white inline-flex items-center bg-mrbg focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:hover:bg-moinmaron">
                         Add
                     </button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- pop up delete -->

<!-- 
 <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative p-4 w-full max-w-md max-h-full">
         <div class="relative bg-verblanc rounded-lg shadow  ">
             <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                 <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                 </svg>
                 <span class="sr-only">Close modal</span>
             </button>
             <div class="p-4 md:p-5 text-center">
                 <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                 </svg>
                 <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this tag?</h3>
                 <a  data-modal-hide="popup-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                     Yes, I'm sure
                 </a>
                 <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
             </div>
         </div>
     </div>
 </div> -->

 <!-- Main modal -->
 <!-- update -->
 <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative p-4 w-full max-w-md max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow">
             <!-- Modal header -->
             <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-white">
                 <h3 class="text-lg font-semibold text-gray-900">
                     Update tag
                 </h3>
                 <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>
             <!-- Modal body -->
             <form class="p-4 md:p-5" action="<?= BASE_URL ?>/tag/update_tag" method="post">
                 <div class="grid gap-4 mb-4 grid-cols-2">
                     <div class="col-span-2">
                         <input type="hidden" name="id" id="editCategorieId">
                         <label for="editName" class="block mb-2 text-sm font-medium text-gray-800">Name</label>
                         <input type="text" name="name" id="editName" class="bg-white border focus:outline-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-white dark:border-gray-500 dark:placeholder-gray-400" placeholder="Category name" required="">
                     </div>
                 </div>
                 <div class="flex items-center justify-center">
                     <button name="submit-edite" type="submit" class="text-white inline-flex items-center bg-mrbg focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:hover:bg-moinmaron">
                         Update
                     </button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <script>
     document.querySelectorAll('.editCategorieButton').forEach(button => {
         button.addEventListener('click', function() {
             showEditCategorieForm(button);
         });
     });

     function showEditCategorieForm(button) {
         var editCategorieForm = document.getElementById('crud-modal');
         if (editCategorieForm) {
             console.log(editCategorieForm.querySelector('#editCategorieId'));
             editCategorieForm.querySelector('#editCategorieId').value = button.dataset.categorieId || '';
             editCategorieForm.querySelector('#editName').value = button.dataset.categorieName || '';
         }
     }
 </script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
 </body>