// Data untuk gambar
let gmb = [
    {
        no: 1,
        text: "Koala",
    },
    {
        no: 2,
        text: "Pinggir Pantai",
    },
    {
        no: 3,
        text: "Pinguin",
    },
    {
        no: 4,
        text: "Bunga Kuning",
    },
    {
        no: 5,
        text: " Gunung Gurun",
    },
    {
        no: 6,
        text: "Bunga Oranye",
    },
    {
        no: 7,
        text: "Bunga Putih",
    },
    {
        no: 8,
        text: "Ubur-Ubur",
    },
];

// Hapus tulisan summernote
function removeSummernote() {
    if (document.querySelector('a[href="http://summernote.org/"]')) {
        document.querySelector(
            'a[href="http://summernote.org/"]'
        ).parentElement.parentElement.style.display = "none";
    }
}

// Waktu dan Tgl
function showTime() {
    // Waktu
    let date = new Date();
    let h = date.getHours();
    let m = date.getMinutes();
    let s = date.getSeconds();

    h = h ? h : 24;
    m = m < 10 ? "0" + m : m;
    s = s < 10 ? "0" + s : s;

    document.querySelector(".info-jam").innerHTML = `${h}:${m}:${s}`;

    // Tgl
    let getHr = date.getDay();
    let getTgl = date.getDate();
    let getBln = date.getMonth();
    let getThn = date.getFullYear();

    let setBln = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember",
    ];
    getBln = setBln[getBln];

    let setHr = [
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jum'at",
        "Sabtu",
        "Minggu",
    ];
    getHr = setHr[getHr];

    document.querySelector(
        ".info .tgl"
    ).innerHTML = `${getHr}, ${getTgl} ${getBln} ${getThn}`;
    setTimeout(showTime, 1000);
}
