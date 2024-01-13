
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
