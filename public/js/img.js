document.addEventListener('DOMContentLoaded', (event) => {
    const img = document.getElementById('img');
    const mar = document.getElementById('mar');
    const fileInput = document.getElementById('file');

    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // imageDisplay.src = e.target.result;
                img.innerHTML = `
                <label for="file" class="custom-file-uploaded">
                <img id="imageDisplay" src="" alt="Ảnh" style="display: none;">
                </label>
                `
    const imageDisplay = document.getElementById('imageDisplay');
                imageDisplay.src = e.target.result;
                mar.style.marginLeft = '20px';
                imageDisplay.style.display = 'block'

            }
            reader.readAsDataURL(file);
        }
    });
});
