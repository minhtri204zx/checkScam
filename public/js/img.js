document.addEventListener('DOMContentLoaded', (event) => {
    const img = document.getElementById('img');
    const mar = document.getElementById('mar');
    const fileInput = document.getElementById('file');

    function viewImage() {
        alert("View image functionality");
    }
    
    function deleteImage() {
        const imageContainer = document.querySelector('.image-container');
        imageContainer.style.display = 'none';
    }

    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // imageDisplay.src = e.target.result;
                img.innerHTML = `
                <div class="image-container">
        <img src="your-image.jpg" id="imageDisplay" alt="Image" class="image">
       
    </div>
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
