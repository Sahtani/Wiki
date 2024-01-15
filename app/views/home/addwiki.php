<?php require_once 'includes/headfrom.php' ?>
<?php
$tags = $this->view_data['tag'];
$cats = $this->view_data['cat'];

?>
<div class="min-h-screen bg-gray-100 p-0 sm:p-12 md:w-1/2 w-full mx-10 mt-14 
">
  <div class="mx-auto mY-4 max-w-md px-6  p-10 md:py-12 bg-white border-0 shadow-lg rounded-3xl sm:rounded-3xl">
    <h1 class="text-2xl font-serif font-bold  text-mr flex flex-col items-center">Add Wiki </h1>
    <form action="<?= BASE_URL ?>/wiki/add_wiki" class=space-y-6" method="post">

      <div>
        <label for="task-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wiki Title</label>
        <input type="text" name="title" id="title" class="bg-gray-50 border shadow border-beige text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-white  dark:placeholder-gray-400" placeholder="Wiki Title" required>
      </div>
      <div>
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wiki Content</label>
        <textarea name="content" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-beige  dark:bg-white   shadow dark:placeholder-gray-400" placeholder="Write your  content  here..."></textarea>
      </div>
      <div>
        <label for="lists" class="block mb-2 text-sm font-medium text-gray-300 dark:text-white">Select an option</label>
        <select name="cat" id="lists" class="border border-beige text-gray-900 text-sm rounded-lg block w-full p-2.5  shadow dark:placeholder-gray-400 ">
          <option class="mx-10" value="" selected disabled>Select Categorie</option>
          <?php foreach ($cats as $cat) : ?>
            <option value="<?= $cat['id']; ?>"><?= $cat['name']; ?> </option>
          <?php endforeach; ?>

        </select>
      </div>
      <div class="w-full">
        <label for="lists" class="block mb-2 text-sm font-medium text-gray-300 dark:text-white">Select an option</label>
        <select id="tags" name="listbox[]" class="form-control" multiple class="border border-beige text-gray-900 text-sm rounded-lg block w-full p-2.5  shadow dark:placeholder-gray-400 ">
          <option class="mx-10 w-full" value="" selected disabled>Select Tag</option>
          <?php foreach ($tags as $tag) : ?>
            <option class=" w-full" value='<?= $tag['idtag']; ?>'><?= $tag['name']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class=" flex justify-between gap-4 mt-6">
        <button name="submitwiki" type="submit" class="w-full text-white bg-mrbg hover:bg-mr font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add wiki</button>
        <a href="<?= BASE_URL ?>/wiki/mywikis" class="w-full text-mr bg-verblanc  font-medium rounded-lg text-sm md:px-5 px-2 md:py-2.5  p-1 text-center">Cancel</a>
      </div>
    </form>
  </div>
</div>
<?php require_once 'includes/footer.php' ?>
</body>

</html>