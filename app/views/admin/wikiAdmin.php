<?php require_once 'includes/sidenavbar.php';
$wikis = $this->view_data['Awikis'];
?>

<div class="grid grid-cols-1 md:grid-cols-4 ml-10 mt-10 gap-6  ">

    <?php
    if ($wikis > 0) {


        foreach ($wikis as $wiki) {
            $wikitags = $wiki["wikitags"];

    ?>
            <div class=" w-80 px-8 lg:mt-16 max-w-sm ">

                <div class=" bg-baigebeige shadow-2xl ">
                    <div class=" flex items-center ">
                        <h2 class="font-mono pl-4 text-gray-800 text-sm p-2 mt-4 underline">Categorie:</h2>

                        <h3 class="pl-4 font-mono text-gray-800 text-xl font-bold pt-4"><?= $wiki['name'] ?></h3>


                    </div>
                    <div class="w-5/6 m-auto">
                    </div>
                    <div class="bg-baigebeige  ">
                        <div class="flex items-center ">
                            <h2 class=" pl-4 text-mr font-mono text-xs underline p-2 mt-4">title:</h2>
                            <h2 class="pl-4 font-mono text-mr text-1xl font-bold pt-4"><?= $wiki['title'] ?></h2>
                        </div>
                        <div class="w-5/6 m-auto">
                        </div>


                        <p class=" break-normal font-mono text-gray-800 pl-2 pt-6"><?= $wiki['content'] ?></p>
                        <div class="flex items-center mt-4">
                            <svg class="w-4 h-4 text-mr ml-2  fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-1 leading-none"><?= date('d M', strtotime($wiki['dateCreation'])) ?></span>
                        </div>
                        <div class="flex items-center justify-center mt-6">
                            <div>
                                <?php
                                foreach ($wiki['wikitags'] as $tag) :
                                ?>


                                    <div class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-blue-200 text-blue-700 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell-off mr-2">
                                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                            <path d="M18.63 13A17.89 17.89 0 0 1 18 8"></path>
                                            <path d="M6.26 6.26A5.86 5.86 0 0 0 6 8c0 7-3 9-3 9h14"></path>
                                            <path d="M18 8a6 6 0 0 0-9.33-5"></path>
                                            <line x1="1" y1="1" x2="23" y2="23"></line>
                                        </svg>
                                        <p><?= $tag["name"]; ?></p>

                                    </div>
                                <?php endforeach; ?>




                            </div>
                        </div>
                        <div class=" mt-4 flex items-center justify-end gap-4 border border-t bg-verblanc ">

                            <a href="<?= BASE_URL ?>/wiki/archive_wiki/<?= $wiki['idwiki'] ?>" title="Delete" class="   mt-4    mb-6  text-white ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                                    <path fill="#e66565" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                </svg>
                            </a>
                            <a href="<?= BASE_URL ?>/wiki/signlepage/<?= $wiki['idwiki'] ?>" class="  mr-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="40" width="30" viewBox="0 0 576 512">
                                    <path fill="#fcbc73" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    <?php }
    } else echo "hhh" ?>
</div>
