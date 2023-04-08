let gmb = 1;
setInterval(() => {
    document.querySelector(".gambar img").src = `asset/img/img${gmb}.jpg`;
    gmb++;
    if (gmb == 9) gmb = 1;
}, 1000);

setTimeout(() => {
    if (document.querySelector('a[href="http://summernote.org/"]')) {
        document.querySelector(
            'a[href="http://summernote.org/"]'
        ).parentElement.parentElement.style.display = "none";
    }
}, 100);
