let left = 0;
let topPosition = 0;
let left_direction = true;
let top_direction = true;
let h_v = Math.random() *2;
let m_v = Math.random() *2;
let size = 0;

const animation = setInterval(() => {
    if (size > 100) {
        clearInterval(animation);
        window.location.href = './avis.php'; 
        return;  
    }

    if (left_direction) {
        left += h_v;
        if (left >= (100 - size)) {
            left_direction = false;
            const sond_mure = new Audio("./audio/mure.mp3");
            sond_mure.play();
        }
    } else {
        left -= h_v;
        if (left <= 0) {
            left_direction = true;
            const sond_mure = new Audio("./audio/mure.mp3");
            sond_mure.play();
        }
    } 

    if (top_direction) {
        topPosition += m_v;
        if (topPosition >= (100 - size)) {
            top_direction = false;
            const sond_mure = new Audio("./audio/mure.mp3");
            sond_mure.play();
        }
    } else {
        topPosition -= m_v;
        if (topPosition <= 0) {
            top_direction = true;
            const sond_mure = new Audio("./audio/mure.mp3");
            sond_mure.play();
        }
    }

    size = size + 0.2;
    const sond_moov = new Audio("./audio/moov.mp3");
    sond_moov.play();
    const div = document.createElement('div');
    div.style.width = size + "%";
    div.style.height = size + "%";
    div.style.backgroundColor = 'red';
    div.style.border = '5px solid black';
    div.style.position = 'absolute';
    div.style.left = left + '%';
    div.style.top = topPosition + '%';
    document.body.appendChild(div);
}, 100);
