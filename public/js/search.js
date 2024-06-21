const formSearch = document.getElementById('iconSearch');
const iconSearch = document.querySelector('.icon');
const btnReport = document.querySelector('#btnReport');
const hintSearch = document.querySelector('#search2')

document.addEventListener('click', (e)=>{
    var input = formSearch.contains(e.target)
    var icon = btnReport.contains(e.target)

    if (input || icon) {
    formSearch.style.display= 'block'
    btnReport.classList.add('show-input-search')
    hintSearch.classList.add('search3')
    }else{
    formSearch.style.display= 'none'
    btnReport.classList.remove('show-input-search')
    hintSearch.classList.remove('search3')
    }

})
