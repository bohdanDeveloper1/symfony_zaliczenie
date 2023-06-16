
// Приклад коду для файлу form.js
document.addEventListener('DOMContentLoaded', function() {
    const saveButton = document.querySelector('button[name="form[save]"]');

    if(saveButton){
        saveButton.addEventListener('click', () => {
        alert('Your massage was sent')
        });
    }else {
        console.log('not found save element')
    }
});

