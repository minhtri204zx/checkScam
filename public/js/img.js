const img = document.getElementById('img');
const mar = document.getElementById('mar');
const fileInput = document.getElementById('file');
let menu = document.getElementById('menuMobile');


document.getElementById('outMenu').addEventListener('click', () => {
    menu.style.transform = 'translateY(-100%)'
    menu.style.display = 'none'
})

document.getElementById('showmenu').addEventListener('click', () => {
    menu.style.display = 'block'
    menu.style.transform = 'translateX(-100%)'
})

if (document.getElementById('home')) {
    let home = document.getElementById('home')
    home.addEventListener('click', () => {
        window.location.href = '/';
    })
}

fileInput.addEventListener('change', (event) => {
    const images = [...event.target.files]
    if (images) {
        const reader = new FileReader();
        reader.onload = function (e) {
            img.innerHTML = `
                <div class="image-container">
                    <img src="your-image.jpg" id="imageDisplay" alt="Image" class="image">
                </div>
                `
            const imageDisplay = document.getElementById('imageDisplay');
            imageDisplay.src = e.target.result;
            console.log(e);
            mar.style.marginLeft = '20px';
            imageDisplay.style.display = 'block'

        }
        reader.readAsDataURL(images[0]);
    }
});

