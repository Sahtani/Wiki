<?php require_once 'includes/sidenavbar.php';
$wikis = $this->view_data['Awikis'];
?>
<div class="p-4 sm:ml-64">
    <div class="p-4 rounded-lg mt-14">
        <div class="grid  grid-cols-1  gap-4 mb-4">
            <div class="flex items-center justify-center w-full">
                <form method=post action="<?= BASE_URL ?>/task/search" class="w-full">
                    <div class='max-w-md ml-6 shadow-xl w-full'>
                        <div class="relative flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">


                            <input class=" p-2 border border-0 border-white focus:outline-none focus:ring focus:ring-white h-full w-full outline-none text-sm text-gray-700 pr-2" name="task_search" type="text" id="search" placeholder="Search task.." />
                            <button id="button" type="submit" name="search_submit" class="grid place-items-center h-full w-12 text-gray-300 border border-0 border-white focus:outline-none focus:ring focus:ring-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:col-span-2 m-10">
            <?php
            if ($wikis > 0) {
                foreach ($wikis as $wiki) {
                    $wikitags = $wiki["wikitags"];
            ?>
                    <div class="cursor-pointer border border-beige p-4 rounded-lg overflow-hidden group shadow">
                        <h1 class="text-mr text-xl font-bold font-serif pb-2"><?= $wiki['title'] ?></h1>
                        <p class="truncate"><?= substr($wiki['content'], 0, 200); ?></p>

                        <div class="py-6">
                            <span class="text-sm block text-gray-400 mb-2"><?= date('j M Y', strtotime($wiki["dateCreation"])) ?></span>
                            <h3 class="text-xl font-bold text-[#333] group-hover:text-moinbeige transition-all"><?= $wiki['name'] ?></h3>
                        </div>
                        <div class="flex items-center  mt-6">
                            <div>
                                <?php
                                foreach ($wiki['wikitags'] as $tag) :
                                ?>
                                    <div class="text-xs inline-flex items-center   font-bold leading-sm uppercase px-3 py-1 bg-beige text-mr rounded-full">
                                        <span>#</span>
                                        <p><?= $tag["name"]; ?></p>

                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class=" mt-4 flex items-center justify-end gap-4 border-t bg-white w-full">

                            <a href="<?= BASE_URL ?>/wiki/archive_wiki/<?= $wiki['idwiki'] ?>" title="Delete" class="mt-4 text-white ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26" width="30" viewBox="0 0 512 512">
                                    <path fill="#e66565" d="M32 32H480c17.7 0 32 14.3 32 32V96c0 17.7-14.3 32-32 32H32C14.3 128 0 113.7 0 96V64C0 46.3 14.3 32 32 32zm0 128H480V416c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V160zm128 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z" />
                                </svg>
                            </a>
                            <a href="<?= BASE_URL ?>/wiki/signlepage/<?= $wiki['idwiki'] ?>" class="  mr-2 mt-4 ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="40" width="30" viewBox="0 0 576 512">
                                    <path fill="#fcbc73" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                </svg>
                            </a>
                        </div>
                    </div>

            <?php }
            } else echo "hhh" ?>
        </div>
    </div>
</div>
</div>
</div>
</body>
<?php require_once 'includes/footer.php' ?>

</html>