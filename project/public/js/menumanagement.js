function editMenu(menuId, menuName, menuDescription, menuPrice, menuCategory, menuImg) {
    const form = document.getElementById('menuEditForm');
    form.action = "/menumanagement/update/" + menuId;


    const uploadLabel = document.getElementById('upload-label');
    const imagePreview = document.getElementById('image-preview');
    const imagePreviewEdit = document.getElementById('image-preview-edit');
    const filenameLabel = document.getElementById('filename');

    document.getElementById('menuName').value = menuName;
    document.getElementById('menuDescription').value = menuDescription;
    document.getElementById('menuPrice').value = menuPrice;
    document.getElementById('menuCategories').value = menuCategory; 


    if (menuImg !== 'data:image/png;base64,') {
        uploadLabel.style.display = 'none';
        filenameLabel.textContent = '';
        imagePreviewEdit.style.display = 'flex';
        imagePreview.src = menuImg;
    } else {
        imagePreview.src = '';
        uploadLabel.style.display = 'block';
        imagePreviewEdit.style.display = 'none';
        filenameLabel.textContent = '';
    }
    document.getElementById('menuEditor').style.display = 'block';
}

function adderMenu() {
    document.getElementById('menuAdder').style.display = 'block';

    const adderPreview = document.getElementById('adderPreview');
    const adderUpload = document.getElementById('adderUpload');
    const adderPreviewEdit = document.getElementById('adderPreviewEdit');
    const adderFileName = document.getElementById('adderFileName');

    adderPreview.src = '';
    adderUpload.style.display = 'block';
    adderPreviewEdit.style.display = 'none';
    adderFileName.textContent = '';
}
function hideAdderMenu() {
    document.getElementById('menuAdder').style.display = 'none';
    const adderCategoriesSelect = document.getElementById('adderCategories');
    const newCategoryInput = document.getElementById('newCategory');
    adderCategoriesSelect.classList.remove('hidden');
    newCategoryInput.classList.add('hidden');
}


function hideMenuEditor() {
    document.getElementById('menuEditor').style.display = 'none';
}
