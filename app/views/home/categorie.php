<?php require_once 'includes/header.php';
$cats = $this->view_data['categorie'];
?>
<div class=" sm:px-6 px-4 py-10 font-[sans-serif]">
    <div class="max-w-7xl mx-auto">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-mr inline-block">LATEST CATEGORIES</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-16 max-md:max-w-lg mx-auto">
            <?php
            if ($cats > 0) {
                foreach ($cats as $cat) {


            ?>
                    <div class="cursor-pointer rounded overflow-hidden group">
                        <div>
                            <span class="text-sm block text-gray-400 mb-2"><?= date('j M Y', strtotime($cat["dateCreation"])) ?></span>
                            <h3 class="text-xl font-bold text-[#333] group-hover:text-moinbeige transition-all"><?=$cat["name"]?></h3>
                        </div>
                        <hr class="my-6" />
                    </div>
            <?php }
            } ?>
        </div>
    </div>
</div>





































<?php require_once 'includes/footer.php' ?>