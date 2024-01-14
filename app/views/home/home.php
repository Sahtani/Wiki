<?php require_once 'includes/header.php';
$wikis = $this->view_data['Awikis'];
$latestWikis = $this->view_data["lastWiki"];
$role = $this->view_data["role"];

?>

<div id="search-wikis" class="grid grid-cols-1 lg:grid-cols-3 lg:gap-8 gap-12 items-center md:max-w-7xl max-w-lg mx-auto p-6 mt-10"></div>
<div id="main-page">
    <div id="wikis" class="bg-gray-50 font-[sans-serif] p-6 mt-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-8 gap-12 items-center md:max-w-7xl max-w-lg mx-auto">
            <div>
                <h2 class="text-4xl font-bold text-beige uppercase mb-6">Wikis</h2>
                <h2 class="text-3xl text-mr font-extrabold text-[#333] uppercase leading-10">Discover Our Latest Wikis Posts</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:col-span-2">
                <?php
                if ($latestWikis > 0) {


                    foreach ($latestWikis as $w) {
                        $latestWikis = $w['wikitagsLast'];

                ?>
                        <div class="cursor-pointer border border-beige p-4 rounded-lg overflow-hidden group shadow">
                            <h1 class="text-mr text-xl font-bold font-serif pb-2"><?= $w['title'] ?></h1>
                            <p><?= substr($w['content'], 0, 100) . '...'; ?></p>

                            <div class="py-4">
                                <span class="text-sm block text-gray-400 mb-2"><?= date('j M Y', strtotime($w["dateCreation"])) ?>| BY <?= $w['lastname'] . ' ' . $w['firstname'] ?></span>
                                <h3 class="text-xl font-bold text-[#333] group-hover:text-moinbeige transition-all"><?= $w['name'] ?></h3>
                            </div>
                            <div class="flex items-center  mt-2">
                                <div>
                                    <?php
                                    foreach ($w['wikitagsLast'] as $tag) :
                                    ?>
                                        <div class="text-xs inline-flex items-center   font-bold leading-sm uppercase px-3 py-1 bg-beige text-mr rounded-full">
                                            <span>#</span>
                                            <p><?= $tag["name"]; ?></p>

                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class=" mt-2 flex items-center justify-end gap-4 border-t  w-full ">

                                <?php if ($role === "admin") {
                                    echo '
                           <a href=" ' . BASE_URL . '/wiki/signlepage/' . $w['idwiki'] . ' " class="  mr-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="36" width="30" viewBox="0 0 576 512">
                                    <path fill="#fcbc73" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                </svg>
                            </a>
                             <a href=" ' . BASE_URL . '/wiki/signlepage/' . $w['idwiki'] . ' " class="  mr-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#511f1f" d="M32 32H480c17.7 0 32 14.3 32 32V96c0 17.7-14.3 32-32 32H32C14.3 128 0 113.7 0 96V64C0 46.3 14.3 32 32 32zm0 128H480V416c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V160zm128 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/></svg>
                            </a>';
                                } elseif ($role === "author") {

                                    echo
                                    ' <a href=" ' . BASE_URL . '/wiki/delete_wiki/' . $w['idwiki'] . '" title="Delete" class="mt-2 text-white ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26" width="30" viewBox="0 0 448 512">
                                    <path fill="#e66565" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                </svg>
                            </a>
                            <a href=" ' . BASE_URL . '/wiki/formwikiUpdate/' . $w['idwiki'] . ' " class="mx-2 mt-2 " title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26" width="30" viewBox="0 0 512 512">
                                    <path fill="#74e665" d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                </svg>
                            </a>
                             
                            <a href=" ' . BASE_URL . '/wiki/signlepage/' . $w['idwiki'] . ' " class=" mt-1 mr-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="40" width="30" viewBox="0 0 576 512">
                                    <path fill="#fcbc73" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                </svg>
                            </a>';
                                } else {

                                    echo ' 
                            <a href=" ' . BASE_URL . '/wiki/signlepage/' . $w['idwiki'] . ' " class="  mr-2 mt-2 ">
                            <div class="flex">
                                <p class="text-moinbeige underline">Read more</p>
                                </div>
                            </a>';
                                } ?>
                            </div>
                        </div>
                <?php }
                } else echo "hhh" ?>

            </div>

        </div>
    </div>
    <div class="text-center mt-6">
        <!-- <h2 class="text-4xl font-bold text-gray-300 uppercase mb-6">Blogs</h2> -->
        <h2 class="text-3xl font-extrabold text-[#333] uppercase leading-10">Discover Our Wikis</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:col-span-2 m-10">
        <?php
        if ($wikis > 0) {


            foreach ($wikis as $wiki) {
                $wikitags = $wiki["wikitags"];
        ?>
                <div class=" cursor-pointer border border-beige p-4 rounded-lg overflow-hidden group shadow-xl">
                    <h1 class="text-mr text-xl font-bold font-serif pb-2"><?= $wiki['title'] ?></h1>
                    <p><?= substr($wiki['content'], 0, 100) . '...'; ?></p>

                    <div class="py-2">
                        <span class="text-sm block text-gray-400 mb-2"><?= date('j M Y', strtotime($wiki["dateCreation"])) ?>| BY <?= $w['lastname'] . ' ' . $w['firstname'] ?></span>
                        <h3 class="text-xl font-bold text-[#333] group-hover:text-moinbeige transition-all"><?= $w['name'] ?></h3>
                    </div>
                    <div class="flex items-center  mt-2">
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


                    <div class=" mt-2 flex items-center justify-end gap-4 border-t  w-full ">

                        <?php if ($role === "admin") {
                            echo '
                           <a href=" ' . BASE_URL . '/wiki/signlepage/' . $wiki['idwiki'] . ' " class="  mr-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="36" width="30" viewBox="0 0 576 512">
                                    <path fill="#fcbc73" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                </svg>
                            </a>
                             <a href=" ' . BASE_URL . '/wiki/archive_wiki/' . $wiki['idwiki'] . ' " class="  mr-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#511f1f" d="M32 32H480c17.7 0 32 14.3 32 32V96c0 17.7-14.3 32-32 32H32C14.3 128 0 113.7 0 96V64C0 46.3 14.3 32 32 32zm0 128H480V416c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V160zm128 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/></svg>
                            </a>';
                        } elseif ($role === "author") {

                            echo
                            ' <a href=" ' . BASE_URL . '/wiki/delete_wiki/' . $wiki['idwiki'] . '" title="Delete" class="mt-2 text-white ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26" width="30" viewBox="0 0 448 512">
                                    <path fill="#e66565" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                </svg>
                            </a>
                            <a href=" ' . BASE_URL . '/wiki/formwikiUpdate/' . $wiki['idwiki'] . ' " class="mx-2 mt-2 " title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26" width="30" viewBox="0 0 512 512">
                                    <path fill="#74e665" d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                </svg>
                            </a>
                             
                            <a href=" ' . BASE_URL . '/wiki/signlepage/' . $wiki['idwiki'] . ' " class=" mt-1 mr-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="40" width="30" viewBox="0 0 576 512">
                                    <path fill="#fcbc73" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                </svg>
                            </a>';
                        } else {

                            echo ' 
                            <a href=" ' . BASE_URL . '/wiki/signlepage/' . $wiki['idwiki'] . ' " class="  mr-2 ">
                            <div class="flex">
                                <p class="text-moinbeige underline">Read more</p>
                                </div>
                            </a>';
                        } ?>
                    </div>

                </div> <?php }
                } else echo "<p class='text-xl text-mr'>NO WIKIS HERE</p> " ?>

    </div>

    <div class="bg-gray-200 font-[sans-serif] p-4">
        <div class="max-w-6xl max-md:max-w-lg mx-auto">
            <div id="search_result" class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:col-span-2 m-10">
                <?php
                if ($wikisSearch > 0) {


                    foreach ($wikisSearch as $wiki) {
                        $wikitags = $wiki["wikitags"];
                ?>
                        <div class=" cursor-pointer border border-beige p-4 rounded-lg overflow-hidden group shadow-xl">
                            <h1 class="text-mr text-xl font-bold font-serif pb-2"><?= $wiki['title'] ?></h1>
                            <p><?= substr($wiki['content'], 0, 100) . '...'; ?></p>

                            <div class="py-2">
                                <span class="text-sm block text-gray-400 mb-2"><?= date('j M Y', strtotime($wiki["dateCreation"])) ?>| BY <?= $w['lastname'] . ' ' . $w['firstname'] ?></span>
                                <h3 class="text-xl font-bold text-[#333] group-hover:text-moinbeige transition-all"><?= $w['name'] ?></h3>
                            </div>
                            <div class="flex items-center  mt-2">
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


                            <div class=" mt-2 flex items-center justify-end gap-4 border-t  w-full ">

                                <?php if ($role === "admin") {
                                    echo '
                           <a href=" ' . BASE_URL . '/wiki/signlepage/' . $wiki['idwiki'] . ' " class="  mr-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="36" width="30" viewBox="0 0 576 512">
                                    <path fill="#fcbc73" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                </svg>
                            </a>
                             <a href=" ' . BASE_URL . '/wiki/archive_wiki/' . $wiki['idwiki'] . ' " class="  mr-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#511f1f" d="M32 32H480c17.7 0 32 14.3 32 32V96c0 17.7-14.3 32-32 32H32C14.3 128 0 113.7 0 96V64C0 46.3 14.3 32 32 32zm0 128H480V416c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V160zm128 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z"/></svg>
                            </a>';
                                } elseif ($role === "author") {

                                    echo
                                    ' <a href=" ' . BASE_URL . '/wiki/delete_wiki/' . $wiki['idwiki'] . '" title="Delete" class="mt-2 text-white ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26" width="30" viewBox="0 0 448 512">
                                    <path fill="#e66565" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                </svg>
                            </a>
                            <a href=" ' . BASE_URL . '/wiki/formwikiUpdate/' . $wiki['idwiki'] . ' " class="mx-2 mt-2 " title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" height="26" width="30" viewBox="0 0 512 512">
                                    <path fill="#74e665" d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                                </svg>
                            </a>
                             
                            <a href=" ' . BASE_URL . '/wiki/signlepage/' . $wiki['idwiki'] . ' " class=" mt-1 mr-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" height="40" width="30" viewBox="0 0 576 512">
                                    <path fill="#fcbc73" d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                </svg>
                            </a>';
                                } else {

                                    echo ' 
                            <a href=" ' . BASE_URL . '/wiki/signlepage/' . $wiki['idwiki'] . ' " class="  mr-2 ">
                            <div class="flex">
                                <p class="text-moinbeige underline">Read more</p>
                                </div>
                            </a>';
                                } ?>
                            </div>

                        </div>
                <?php }
                } ?>
            </div>

        </div>

    </div>
</div>


<?php require_once 'includes/footer.php' ?>