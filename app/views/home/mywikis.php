<?php require_once 'includes/header.php';
$wikis = $this->view_data['wikis'];



?>

<div class="  flex flex-col flex-end">
    <a href="<?= BASE_URL ?>/wiki/formwiki" class=" bg-mrbg hover:bg-moinmaron mt-10 ml-20 w-40 text-white font-semibold font-serif py-2 px-4 rounded">
        Add New Wiki
    </a>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 ml-10 mt-10 md:gap-6">

    <?php
    if ($wikis > 0) {


        foreach ($wikis as $wiki) {
            $wikitags = $wiki["wikitags"];


    ?>
            <div class="cursor-pointer border border-beige p-4 rounded-lg overflow-hidden group shadow">
                <a a href="<?= BASE_URL ?>/wiki/signlepage/<?= $wiki['idwiki'] ?>" title="View more">
                    <h1 class="text-mr text-xl font-bold font-serif pb-2"><?= $wiki['title'] ?></h1>
                </a>
                <p><?= substr($wiki['content'], 0, 100) . '...'; ?></p>

                <div class="py-2">

                    <h3 class="text-xl font-bold text-[#333] group-hover:text-moinbeige transition-all"><?= $wiki['name'] ?></h3>
                    <span class="text-sm block text-gray-600 my-2"><?= date('j M Y', strtotime($wiki["dateCreation"])) ?></span>
                </div>
                <div class="flex items-center  mt-4">
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
                <div class=" mt-4 flex items-center justify-end gap-4 border-t w-full">
                    <a href="<?= BASE_URL ?>/wiki/delete_wiki/<?= $wiki['idwiki'] ?>" title="Delete" class="   mt-2      text-white ">
                        <svg xmlns="http://www.w3.org/2000/svg" height="26" width="30" viewBox="0 0 448 512">
                            <path fill="#e66565" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                        </svg>
                    </a>
                    <a href="<?= BASE_URL ?>/wiki/formwikiUpdate/<?= $wiki['idwiki'] ?>" class="  mx-2 mt-2" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" height="26" width="30" viewBox="0 0 512 512">
                            <path fill="#74e665" d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z" />
                        </svg>
                    </a>

                </div>

            </div>

    <?php }
    } else echo '<p class="text-moinbeige text-xl">Read more</p>' ?>
</div>