const trader = document.querySelectorAll('.trader')

if (screen.width<=1974) {
    for (let index = 14; index <= 17; index++) {
        trader[index].style.display= 'none'
    }
}
if (screen.width<=1518) {
    for (let index = 12; index <= 13; index++) {
        trader[index].style.display= 'none'
    }
}

if (screen.width<=1244) {
    for (let index = 10; index <= 11; index++) {
        trader[index].style.display= 'none'
    }
}

if (screen.width<=1111) {
    for (let index = 8; index <= 9; index++) {
        trader[index].style.display= 'none'
    }
}

if (screen.width<=775) {
    for (let index = 6; index <= 7; index++) {
        trader[index].style.display= 'none'
    }
}

window.addEventListener('resize', ()=>{

    if (screen.width<=1974) {
        for (let index = 14; index <= 17; index++) {
            trader[index].style.display= 'none'
        }
    }else{
        for (let index = 14; index <= 17; index++) {
            trader[index].style.display= 'block'
        }
    }

    if (screen.width<=1518) {
        for (let index = 12; index <= 13; index++) {
            trader[index].style.display= 'none'
        }
    }else{
        for (let index = 12; index <= 13; index++) {
            trader[index].style.display= 'block'
        }
    }

    if (screen.width<=1244) {
        for (let index = 10; index <= 11; index++) {
            trader[index].style.display= 'none'
        }
    }else{
        for (let index = 10; index <= 11; index++) {
            trader[index].style.display= 'block'
        }
    }

    if (screen.width<=1111) {
        for (let index = 8; index <= 9; index++) {
            trader[index].style.display= 'none'
        }
    }else{
        for (let index = 8; index <= 9; index++) {
            trader[index].style.display= 'block'
        }
    }

    if (screen.width<=775) {
        for (let index = 6; index <= 7; index++) {
            trader[index].style.display= 'none'
        }
    }else{
        for (let index = 6; index <= 7; index++) {
            trader[index].style.display= 'block'
        }
    }

})


document.getElementById('loadMore').addEventListener('click', ()=>{
    
})

