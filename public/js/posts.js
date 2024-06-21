let menu = document.getElementById('menuMobile');
const body = document.querySelector('#body')
const posts = document.getElementsByClassName('none')

if (document.getElementById('body')) {
    body.style.height='auto'
}
let above1975 = screen.width>=1975
let above1518 = screen.width>1518&&screen.width<1975
let above1112= screen.width>=1112&&screen.width<=1518
let below1112 = screen.width<=1111

document.getElementById('outMenu').addEventListener('click', () => {
    menu.style.transform = 'translateY(-100%)'
    menu.style.display = 'none'
})

document.getElementById('showmenu').addEventListener('click', () => {
    menu.style.display = 'block'
    menu.style.transform = 'translateX(-100%)'
})

if (screen.width <= 1111 || window.innerWidth<=1111) {
    for (let index = 0; index < posts.length; index++) {
        if ((index >= 6 && index < 12) || (index > 17 && index < 25)) {
            posts[index].style.display = 'none';
        }
    }
} else {
    menu.style.display = 'none'
}

let isAbove1111 = screen.width > 1111;
let isBelow1111 = screen.width <= 1111;


window.addEventListener('resize', () => {
    let windowWidth = screen.width
    if (windowWidth <= 1111 && !isBelow1111) {
        isAbove1111 = false
        isBelow1111 = true
    } else if (windowWidth > 1111 && !isAbove1111) {
        isAbove1111 = true
        isBelow1111 = false
    }
    if (window.location.href == 'http://localhost:8000/') {
        if (screen.width <= 1111 || window.innerWidth <= 1111) {

            for (let index = 0; index < posts.length; index++) {
                if ((index >= 6 && index < 12) || (index > 17 && index < 25)) {
                    posts[index].style.display = 'none';
                }
            }
        } else {
            for (let index = 0; index < posts.length; index++) {
                posts[index].style.display = 'block';
            }
        }
    }

})

