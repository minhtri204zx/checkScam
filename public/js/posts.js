const posts = document.querySelectorAll('.none');
let menu = document.getElementById('menuMobile');

if (document.getElementById('home')) {
let home = document.getElementById('home')
home.addEventListener('click', () => {
    window.location.href = '/';
})
}

document.getElementById('outMenu').addEventListener('click', () => {
    menu.style.transform = 'translateY(-100%)'
    menu.style.display = 'none'
})

document.getElementById('showmenu').addEventListener('click', () => {
    menu.style.display = 'block'
    menu.style.transform = 'translateX(-100%)'
})

if (screen.width <= 1111) {
    for (let index = 0; index < posts.length; index++) {
        if ((index >= 6 && index < 12) || (index > 17 && index < 25)) {
            posts[index].style.display = 'none';
        }
    }
    if (window.location.href == 'http://localhost:8000/') {
        document.getElementById('footer').style.marginTop = '470px'
    }
}else{
    menu.style.display= 'none'
}

let isAbove1111 = screen.width > 1111;
let isBelow1111 = screen.width <= 1111;


window.addEventListener('resize', () => {
    if (windowWidth < 1111 && !isBelow1111) {
        menu.style.display='block'
        isAbove1111 = false
        isBelow1111 = true
    } else if (windowWidth > 1111 && !isAbove1111) {
        menu.style.display='none'
        isAbove1111 = true
        isBelow1111 = false
    
        
    }
    if (window.location.href == 'http://localhost:8000/') {
        if (screen.width <= 1111) {
        
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

