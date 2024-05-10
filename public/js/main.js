const pre = document.getElementById('prev');
const next = document.getElementById('next');
const main = document.getElementById('main');
const arrMain = document.getElementsByClassName('main');
length= arrMain.length
let click = 0;
let ao = 4;

pre.addEventListener('click', () => {
    if (ao==1) {
        click -= 232*(length-1);
        main.style.transform = 'translateX(' + click + 'px)'
        ao=ao-1+length;
        active(ao,1);
    }else{
        click += 232;
        main.style.transform = 'translateX(' + click + 'px)';
        ao=ao-1;
        active(ao,ao+1);
    }
   
})
active();

next.addEventListener('click', () => {
    if (ao==length) {
        click += 232*(length-1);
        main.style.transform = 'translateX(' + click + 'px)'
        ao=1;
        active(ao,length);
    }else{
        click -= 232;
        main.style.transform = 'translateX(' + click + 'px)'
        ao=ao+1;
        active(ao,ao-1);
    }
 
})
function active(ao = 4, reset = null) {
    const overlay2 = document.getElementById('overlay2_' + ao);
    const overlay1 = document.getElementById('overlay1_' + ao);
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
        const overlay2 = document.getElementById('overlay2_' + reset);
        const overlay1 = document.getElementById('overlay1_' + reset);
        overlay2.innerHTML = ` <svg xmlns="http://www.w3.org/2000/svg" width="164" height="164" viewBox="0 0 164 164"
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



