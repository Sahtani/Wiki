 <?php require_once 'includes/sidenavbar.php' ?>
 <?php
    $cats = $this->view_data['category'];

    ?>
 <div class="p-4 sm:ml-64 bg-white">

     <div class="p-4 rounded-lg mt-14">
         <div class="grid md:grid-cols-2 grid-cols-1  gap-4 mb-4">
             <div class="w-full">
                 <div class='max-w-md ml-6 shadow-xl w-full'>
                     <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">



                         <button data-modal-target="crud" onclick="clickBuyBtn(event)" data-modal-toggle="crud" class="font-semibold bg-mrbg text-gray-100 w-full py-4 rounded-lg hover:bg-moinmaron transition-all duration-300 ease-in-out flex items-center justify-center  focus:outline-none">
                             <svg xmlns=" http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                                 <path fill="#ffffff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                             </svg>
                             <span class="ml-2 text-xl">Add new category</span>
                         </button>
                     </div>
                 </div>
             </div>
         </div>
         <div class="grid grid-cols-1 md:grid-cols-3 md:grid-rows-2 gap-4 px-4 pb-8 items-start  "> <?php
                                                                                                    if ($cats > 0) {
                                                                                                        foreach ($cats as $cat) {


                                                                                                    ?>

                     <div class="  rounded bg-grey-light  flex-no-shrink w-70 p-2 mr-3">
                         <div class="relative flex flex-col items-start p-4 mt-3 bg-white rounded-lg cursor-pointer bg-opacity-90 group hover:bg-opacity-100 shadow-xl hover:shadow-2xl" draggable="true">
                             <button class="absolute top-0 right-0 flex items-center justify-center hidden w-5 h-5 mt-3 mr-2 text-gray-500 rounded hover:bg-gray-200 hover:text-gray-700 group-hover:flex">
                                 <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                     <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                 </svg>
                             </button>
                             <h4 class="mt-3 text-sm font-medium"><?= $cat["name"]
                                                                    ?></h4>
                             <div class="flex items-center w-full justify-between mt-3 text-xs font-medium text-gray-400">
                                 <div class="flex items-center">
                                     <svg class="w-4 h-4 text-gray-300 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                         <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                     </svg>
                                     <span class="ml-1 leading-none"><?= date('d M', strtotime($cat["dateCreation"])) ?></span>
                                 </div>
                                 <div class="flex items-center justify-end ">
                                     <a href="<?= BASE_URL ?>/categorie/delete_category/<?= $cat['id'] ?>" title="Delete">
                                         <div class="relative flex items-center ml-4">
                                             <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                                 <path fill="#FF4F4D" d="M576 128c0-35.3-28.7-64-64-64H205.3c-17 0-33.3 6.7-45.3 18.7L9.4 233.4c-6 6-9.4 14.1-9.4 22.6s3.4 16.6 9.4 22.6L160 429.3c12 12 28.3 18.7 45.3 18.7H512c35.3 0 64-28.7 64-64V128zM271 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                                             </svg>

                                         </div>
                                     </a>
                                     <a title="Edit" class="editCategorieButton" data-modal-target="crud-modal" onclick="clickBuyBtn(event)" data-modal-toggle="crud-modal" data-categorie-id="<?= $cat["id"] ?>" data-categorie-name="<?= $cat["name"] ?>" data-categorie-date="<?= $cat["dateCreation"] ?>">


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
                     Add New Category
                 </h3>
                 <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>
             <!-- Modal body -->
             <form class="p-4 md:p-5" action="<?= BASE_URL ?>/categorie/add_category" method="post">
                 <div class="grid gap-4 mb-4 grid-cols-2">
                     <div class="col-span-2">
                         <input type="hidden" name="id" id="editCategorieId">
                         <label for="editName" class="block mb-2 text-sm font-medium text-gray-800">Name</label>
                         <input type="text" name="name" id="editName" class="bg-white border focus:outline-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-white dark:border-gray-500 dark:placeholder-gray-400" placeholder="Category name" required="">
                     </div>
                     <div class="col-span-2">
                         <label for="date" class="block mb-2 text-sm font-medium text-gray-800">Creation date</label>
                         <input type="date" name="date" id="date" class="bg-white border focus:outline-none border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400" required="">
                     </div>
                 </div>
                 <div class="flex items-center justify-center">
                     <button name="submit-add" type="submit" class="text-white inline-flex items-center bg-mrbg focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:hover:bg-moinmaron">
                         Add
                     </button>
                     <p class="text-red-500 text-center mb-2 mt-1">
                         <?= $this->view_data["error"]; ?>
                     </p>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!-- Main modal -->
 <!-- update -->
 <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
     <div class="relative p-4 w-full max-w-md max-h-full">
         <!-- Modal content -->
         <div class="relative bg-white rounded-lg shadow">
             <!-- Modal header -->
             <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-white">
                 <h3 class="text-lg font-semibold text-gray-900">
                     Update Category
                 </h3>
                 <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                     </svg>
                     <span class="sr-only">Close modal</span>
                 </button>
             </div>
             <!-- Modal body -->
             <form class="p-4 md:p-5" action="<?= BASE_URL ?>/categorie
             /update_category" method="post">
                 <div class="grid gap-4 mb-4 grid-cols-2">
                     <div class="col-span-2">
                         <input type="hidden" name="id" id="editCategorieId">
                         <label for="editName" class="block mb-2 text-sm font-medium text-gray-800">Name</label>
                         <input type="text" name="name" id="editName" class="bg-white border focus:outline-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-white dark:border-gray-500 dark:placeholder-gray-400" placeholder="Category name" required="">
                     </div>
                     <div class="col-span-2">
                         <label for="date" class="block mb-2 text-sm font-medium text-gray-800">Creation date</label>
                         <input type="date" name="date" id="date" class="bg-white border focus:outline-none border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2.5 dark:border-gray-500 dark:placeholder-gray-400" required="">
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
             editCategorieForm.querySelector('#date').value = button.dataset.categorieDate || '';
         }
     }
 </script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
 </body>