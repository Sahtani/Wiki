<?php require_once 'includes/headfrom.php' ?>
<div class="min-h-screen bg-gray-100 p-0 sm:p-12 md:w-1/2 w-full mx-10 mt-5
">
  <div class="mx-auto max-w-md px-6  p-10 md:py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
    <h1 class="text-2xl font-bold md:mb-8 flex flex-col items-center">Add Task </h1>
    <form action="<?= BASE_URL ?>/task/add_Task" class=space-y-6" method="post">

      <div>
        <label for="task-title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Title</label>
        <input type="text" name="task-title" id="task-title" class="bg-gray-50 border shadow border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white  dark:placeholder-gray-400" placeholder="Task Title" required>
      </div>
      <div>
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Task Description</label>
        <textarea name="task-description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300  dark:bg-white   shadow dark:placeholder-gray-400" placeholder="Write your task description here..."></textarea>
      </div>
      <div>
        <label for="lists" class="block mb-2 text-sm font-medium text-gray-300 dark:text-white">Select an option</label>
        <select name="status" id="lists" class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5  shadow dark:placeholder-gray-400 ">
          <option value="to do">To Do</option>
          <option value="in progress">In Progress</option>
          <option value="done">Done</option>
        </select>
      </div>
      <div>
        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
        <div class="relative">

          <input name="date" type="date" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full pl-10 py-2.5 px-1  dark:bg-white shadow dark:placeholder-gray-400  " placeholder="Select date">
        </div>
      </div>
      <div class="flex justify-between gap-4 mt-6">
        <button name="submit" type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Task</button>
        <a href="<?= BASE_URL ?>/task/task/" class="w-full text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm md:px-5 px-2 md:py-2.5  p-1 text-center">Cancel</a>
      </div>
    </form>
  </div>
</div>
</body>

</html>