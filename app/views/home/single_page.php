<?php require_once 'includes/header.php';
$wiki = $this->view_data['wiki'];

$wikitags = $wiki["wikitags"];

?>
</div>
<div class="bg-gray-100 px-10 py-12 font-[sans-serif]">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
        <a href="<?= BASE_URL ?>/wiki/Mywikis" title="Back to home page">
            <svg xmlns="http://www.w3.org/2000/svg" height="30" width="30" viewBox="0 0 448 512">
                <path fill="#2d2522" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
            </svg>
        </a>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div>
                <img src="<?= BASE_URL_ASSETS ?>img/undraw_Publish_post_re_wmql.svg" alt="Image" class="rounded-md object-cover w-full h-full" />
            </div>
            <div>
                <h2 class="text-3xl font-extrabold text-mr mb-4"><?= $wiki['title'] ?></h2>
                <p class="text-gray-700 text-sm leading-6">
                    <?= $wiki['content'] ?>
                </p>
                <ul class="list-disc text-sm text-gray-700 space-y-2 pl-4 mt-6">
                    <li>Discover innovative ideas.</li>
                    <li>Create unique projects.</li>
                    <li>Collaborate with like-minded individuals.</li>
                    <li>Transform your visions into reality.</li>
                </ul>
                <div class="flex items-center justify-between">
                    <div class="mt-6 flex  items-end justify-end ">
                        <div class="text-moinmaron text-sm  underline">Categorie:</div>
                        <p class="ml-2"><?= $wiki['name'] ?></p>
                    </div>

                    <div class="mt-6 flex   items-end justify-end ">
                        <div class="text-moinmaron text-sm  underline">Created by:</div>
                        <p class="ml-2"><?= $wiki['lastname'] ?></p>
                    </div>
                </div>
                <div class="mt-4">
                    <?php
                    foreach ($wiki['wikitags'] as $tag) :
                    ?>
                        <div class="text-xs inline-flex items-center font-bold leading-sm px-3 py-1 bg-beige text-mr px-4 py-1  rounded-full gap-1">
                            <span>#</span>
                            <p><?= $tag["name"]; ?></p>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>