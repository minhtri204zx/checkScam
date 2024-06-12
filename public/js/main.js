const pre = document.getElementById('prev');
const next = document.getElementById('next');
const main = document.getElementById('main');
const arrMain = document.getElementsByClassName('main');
const home = document.getElementById('home')
length = arrMain.length
let click = 0;
let ao = 4;



home.style.marginLeft='15px'

home.addEventListener('click', () => {
    window.location.href = '/';
})

function fetcgSuggest(value) {
    let html = ''
    $.ajax({
        url: '/search',
        method: 'GET',
        data: {
            search: value
        },
        success: function (data) {
            if (data.length < 1) {
                html += `
                <div id="param0">not found</div>
                `
                document.getElementById('search2').innerHTML = html;
                localStorage.setItem('hints', JSON.stringify(data));
            } else {

                $.each(data, function (index, hint) {
                    html += `
                <div id="param${index}" onclick="clicked('${hint.fullname}')">${hint.fullname}</div>
                `;
                })
                document.getElementById('search2').innerHTML = html;
                localStorage.setItem('hints', JSON.stringify(data));
            }
        }

    });
}
let a = -1;
function aoMa(e, value) {
    if (e.keyCode == 13 || e.keyCode == 38 || e.keyCode == 40) {

        return
    }
    a = -1
    let search = document.getElementById('search')
    let list = document.getElementById('search2')
    if (search.value != '') {
        list.style.display = 'block';
    } else {
        list.style.display = 'none';
    }
    fetcgSuggest(value);
}

document.getElementById('search').addEventListener('keydown', (e) => {
    let arrHint = JSON.parse(localStorage.getItem('hints'));
    if (e.keyCode == 40) {
        b = arrHint.length - 1
        document.getElementById('param' + b).style.background = ""
        a++;
        if (a == arrHint.length) {
            a = 0;
        }
        document.getElementById('search').value = document.getElementById('param' + a).innerText
        document.getElementById('param' + a).style.background = "rgba(255, 255, 255, 0.12)"
        if (a >= 1) {
            document.getElementById('param' + (a - 1)).style.background = ""
        }

    } else if (e.keyCode == 38) {
        a--;
        if (a == -2) {
            a = b;
            document.getElementById('param' + b).style.background = "rgba(255, 255, 255, 0.12)"
        }
        if (a == -1) {
            a = b;
            document.getElementById('param' + 0).style.background = ""
        }
        document.getElementById('param' + a).style.background = "rgba(255, 255, 255, 0.12)"
        document.getElementById('search').value = document.getElementById('param' + a).innerText
        if (a < b) {
            document.getElementById('param' + (a + 1)).style.background = ""
        }

    } else if (e.keyCode == 13) {
        a = -1;
        fetcgSuggest();
        let list = document.getElementById('search2')
        list.style.display = 'none';
        search.focus();

    }
})

function clicked(value) {
    let search = document.getElementById('search')
    let list = document.getElementById('search2')
    list.style.display = 'none';
    search.value = value;
    search.focus();
}

pre.addEventListener('click', () => {
    if (window.innerWidth < 1111) {
        let css = window.getComputedStyle(main);
        transformValue = css.getPropertyValue('transform')
        const matrix = transformValue.match(/matrix.*\((.+)\)/)[1].split(', ');
        const translateX = parseFloat(matrix[4]);
    }
    let translate = 0
    if (ao == 1) {
        click -= 212 * (length - 1);
        if (window.innerWidth < 1111) {
            translate = click - 380
        } else {
            translate = click
        }
        main.style.transform = 'translateX(' + translate + 'px)'
        ao = ao - 1 + length;
        active(ao, 1);
    } else {
        click += 212;
        if (window.innerWidth <= 1111) {
            translate = click - 380
        } else {
            translate = click
        }
        main.style.transform = 'translateX(' + translate + 'px)';
        ao = ao - 1;
        active(ao, ao + 1);
    }

})
active();

next.addEventListener('click', () => {
    let translate = 0
    if (ao == length) {
        click += 212 * (length - 1);
        if (window.innerWidth <= 1111) {
            translate = click - 380
        } else {
            translate = click
        }
        main.style.transform = 'translateX(' + translate + 'px)'
        ao = 1;
        active(ao, length);
    } else {
        click -= 212;
        if (window.innerWidth <= 1111) {
            translate = click - 380
        } else {
            translate = click
        }
        main.style.transform = 'translateX(' + translate + 'px)'
        ao = ao + 1;
        active(ao, ao - 1);
    }

})
function active(ao = 4, reset = null) {
    const overText = document.getElementsByClassName("text");
    const overlay2 = document.getElementById('overlay2_' + ao);
    const overlay1 = document.getElementById('overlay1_' + ao);
    overText[ao-1].style.color= '#fff'

    overlay2.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="164" height="164" viewBox="0 0 164 164" fill="none">
                <path d="M0.5 0.501733L143.14 0.500003L163.5 33.2858V163.5L18.8828 163.501L0.5 128.734V0.501733Z" stroke="url(#paint0_linear_623_550)"/>
                <defs>
                <linearGradient id="paint0_linear_623_550" x1="82" y1="0" x2="82" y2="164.001" gradientUnits="userSpaceOnUse">
                <stop stop-color="#00F9BD"/>
                <stop offset="0.330452" stop-color="#00F9BD" stop-opacity="0"/>
                <stop offset="0.637217" stop-color="#00F9BD" stop-opacity="0"/>
                <stop offset="1" stop-color="#00F9BD"/>
                </linearGradient>
                </defs>
                </svg>`;

    overlay1.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="180" height="180" viewBox="0 0 180 180" fill="none">
    <path d="M0 0H160.165L180 35V180H19.8347L0 146.142L0 0Z" fill="url(#paint0_linear_623_548)"/>
    <defs>
    <linearGradient id="paint0_linear_623_548" x1="139.835" y1="0" x2="139.835" y2="180" gradientUnits="userSpaceOnUse">
    <stop stop-opacity="0"/>
    <stop offset="1" stop-opacity="0.8"/>
    </linearGradient>
    </defs>
    </svg>`
    if (reset != null) {
        overText[reset-1].style.color= 'var(--Light-White, #B5AB9A)'
        const overlay2 = document.getElementById('overlay2_' + reset);
        const overlay1 = document.getElementById('overlay1_' + reset);
        overlay2.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="164" height="164" viewBox="0 0 164 164"
        fill="none">
        <path
            d="M0.5 0.501733L143.14 0.500003L163.5 33.2858V163.5L18.8828 163.501L0.5 128.734V0.501733Z"
            stroke="url(#paint0_linear_623_546)" />
        <defs>
            <linearGradient id="paint0_linear_623_546" x1="82" y1="0"
                x2="82" y2="164.001" gradientUnits="userSpaceOnUse">
                <stop stop-color="#6A6967" stop-opacity="0.6" />
                <stop offset="0.330452" stop-color="#B5AB9A" stop-opacity="0" />
                <stop offset="0.637217" stop-color="#B5AB9A" stop-opacity="0" />
                <stop offset="1" stop-color="#5A5A58" stop-opacity="0.6" />
            </linearGradient>
        </defs>
    </svg>`;

        overlay1.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" width="180" height="180" viewBox="0 0 180 180"
        fill="none">
        <path d="M0 0H160.165L180 35V180H19.8347L0 146.142L0 0Z" fill="black"
            fill-opacity="0.8" />
    </svg>`
    }
}




