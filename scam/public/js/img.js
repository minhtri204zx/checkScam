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

function showImages(event) {
    let seriImages = 0;

    return (event) => {
        const images = [...event.target.files]
        const img = document.getElementById('img');
        img.style.display = 'flex'
        for (let i = 0; i < images.length; i++) {
            const reader = new FileReader();
            reader.onload = function (e) {

                let html = `
                <div class="image-container">
                    <img src="your-image.jpg" id="imageDisplay${seriImages}" alt="Image" class="image">
                    <div class="overlayImages"></div>
                    <div class="option">
                    <img src="http://localhost:8000/images/Eye.svg" onclick="largeImg

                    (${seriImages})" id="viewImage" alt="Image">
                    <img src="http://localhost:8000/images/DeleteOutlined.svg" id="delImage" onclick="deleteImage(${seriImages})" alt="Image">
                    </div>
                </div>
                       `
                $(img).prepend(html)
                const imageDisplay = document.getElementById('imageDisplay' + seriImages++);
                imageDisplay.src = e.target.result;
                imageDisplay.style.display = 'block'
            }
            reader.readAsDataURL(images[i]);
        }
    }
}

const debounceImages = showImages()

const largeImg = (id) => {
    let img = document.getElementById('imageDisplay' + id)
    let overlay = document.getElementById('over')
    overlay.style.display = 'block'
    img.style.zIndex = '100'
    img.style.width = '500px'
    img.style.height = '500px'
    img.style.position = 'fixed'
    img.style.top = '50%'
    img.style.left = '50%'
    img.style.transform = 'translate(-50%, -50%)'


    document.getElementById('over').addEventListener('click', () => {
        document.getElementById('over').style.display = 'none'
        img.style.zIndex = 'unset'
        img.style.width = '100px'
        img.style.height = '100px'
        img.style.position = 'unset'
        img.style.transform = 'translate(0)'


    })
}



const deleteImage = (id) => {
    let img = document.getElementById('imageDisplay' + id)
    img.parentElement.style.display = 'none'
    mar.style.display = 'block'

}
// khai báo ra 1 cái biến đại diện cho imagesDisplay (1,2,3,4,5)

// để hàm có thể hưởng được biến đó (closure)
