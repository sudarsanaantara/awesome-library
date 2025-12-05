document.getElementById('loginForm').addEventListener('submit', function(event) {
    const username = document.getElementById('username').value.trim();
    const password = document.getElementById('password').value.trim();

    if(username === '' || password === '') {
        alert('Username dan password harus diisi!');
        event.preventDefault(); 
    }
});


document.addEventListener("submit", function(event) {
    const form = event.target;

    if (form.id === "registerForm") {
        const password = document.getElementById("password").value;
        const confirm  = document.getElementById("confirmPassword").value;

        if (password !== confirm) {
            alert("Password dan Konfirmasi Password tidak sama!");
            event.preventDefault();
        }
    }
});

function showSection(sectionName){
    document.querySelectorAll(".section").forEach(sec => sec.classList.add("hidden"));
    document.getElementById(sectionName).classList.remove("hidden");

    document.querySelectorAll(".sidebar li").forEach(li => li.classList.remove("active"));
    event.target.classList.add("active");
}

function performSearch() {
    const query = document.getElementById('searchInput').value;
    
    if (query.trim() === "") {
        alert("Mohon masukkan kata kunci pencarian.");
        return;
    }

    console.log("Mencari buku dengan query:", query);
    alert(`Mencari: "${query}". (Hasil akan ditampilkan di sini pada implementasi backend nyata)`);
}


function validateBookForm() {
    const judul = document.getElementById('judul').value.trim();
    const penulis = document.getElementById('penulis').value.trim();
    const kategori = document.getElementById('kategori').value.trim();

    if (judul === "" || penulis === "" || kategori === "") {
        alert("Semua kolom Judul, Penulis, dan Kategori harus diisi!");
        return false;
    }
    return true;
}

function validateUserForm() {
    const username = document.getElementById('username').value.trim();
    const email = document.getElementById('email').value.trim();
    
    if (username === "" || email === "") {
        alert("Username dan Email harus diisi!");
        return false;
    }
    return true;
}

function validateAdminForm() {
    const username = document.getElementById('username_admin').value.trim();
    const email = document.getElementById('email_admin').value.trim();

    if (username === "" || email === "") {
        alert("Username dan Email harus diisi!");
        return false;
    }
    return true;
}

function validateProfileForm() {
    const username = document.getElementById('username').value.trim();
    const email = document.getElementById('email').value.trim();
    const alamat = document.getElementById('alamat').value.trim();

    if (username === "" || email === "" || alamat === "") {
        alert("Username, Email, dan Alamat harus diisi!");
        return false;
    }
    return true;
}
function performSearch() {
    const query = document.getElementById('searchInput').value;
}