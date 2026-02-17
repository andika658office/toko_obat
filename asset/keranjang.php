<!-- Overlay -->
<div id="cart-overlay"
     style="position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); z-index: 2000; display: none;">
</div>

<!-- Drawer Keranjang -->
<div id="cart-drawer"
     style="position: fixed; top: 0; right: -400px; width: 380px; height: 100%;
            background: white; z-index: 2001; transition: 0.4s;
            box-shadow: -5px 0 15px rgba(0,0,0,0.1); display: flex; flex-direction: column;">

    <!-- Header -->
    <div class="header-cart"
         style="padding: 20px; border-bottom: 1px solid #eee;
                display: flex; justify-content: space-between; align-items: center;">
        <h3 style="margin: 0;"><i class="fas fa-shopping-cart"></i> Keranjang</h3>
        <span id="close-cart"
              style="font-size: 30px; cursor: pointer; color: #999;">&times;</span>
    </div>

    <!-- Content -->
    <div class="cart-content"
         style="flex: 1; display: flex; flex-direction: column;
                align-items: stretch; justify-content: flex-start;
                color: #333; overflow-y: auto; padding: 10px;">
        <div style="text-align: center; color: #9ca3af; margin-top: 50px;">
            <img src="https://cdn-icons-png.flaticon.com/512/11329/11329961.png"
                 width="100" style="opacity: 0.5; margin-bottom: 15px;">
            <p>Keranjang masih kosong</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer-cart"
         style="padding: 20px; border-top: 1px solid #eee;">
        <button id="btn-checkout"
                style="width: 100%; padding: 15px; background: #10b981;
                       color: white; border: none; border-radius: 10px;
                       font-weight: bold; cursor: pointer;">
            Checkout Sekarang
        </button>
    </div>
</div>

<script>
// --- VARIABEL ---
const btnBuka   = document.getElementById('btn-buka-keranjang');
const drawer    = document.getElementById('cart-drawer');
const overlay   = document.getElementById('cart-overlay');
const btnTutup  = document.getElementById('close-cart');
const btnCheckout = document.getElementById('btn-checkout');

let cartItems = [];

// --- FUNGSI BUKA/TUTUP ---
function bukaKeranjang() {
    drawer.style.right = '0';
    overlay.style.display = 'block';
}
function tutupKeranjang() {
    drawer.style.right = '-400px';
    overlay.style.display = 'none';
}

btnBuka.addEventListener('click', bukaKeranjang);
btnTutup.addEventListener('click', tutupKeranjang);
overlay.addEventListener('click', tutupKeranjang);

// --- RENDER KERANJANG ---
function renderCart() {
    const cartContent = drawer.querySelector('.cart-content');
    cartContent.innerHTML = "";

    if (cartItems.length === 0) {
        cartContent.innerHTML = `
            <div style="text-align:center;color:#9ca3af;margin-top:50px;">
                <img src="https://cdn-icons-png.flaticon.com/512/11329/11329961.png" width="100" style="opacity:0.5;margin-bottom:15px;">
                <p>Keranjang masih kosong</p>
            </div>
        `;
    } else {
        const list = document.createElement("ul");
        list.style.listStyle = "none";
        list.style.padding = "0";
        list.style.width = "100%";

        cartItems.forEach((item, index) => {
            const li = document.createElement("li");
            li.style.display = "flex";
            li.style.justifyContent = "space-between";
            li.style.padding = "10px";
            li.style.borderBottom = "1px solid #eee";
            li.innerHTML = `
                <span>${item.nama} (x${item.jumlah})</span>
                <span>Rp ${(item.harga * item.jumlah).toLocaleString()}</span>
                <button onclick="hapusItem(${index})" style="background:red;color:white;border:none;border-radius:5px;padding:3px 8px;cursor:pointer;">x</button>
            `;
            list.appendChild(li);
        });

        cartContent.appendChild(list);
    }
}

function hapusItem(index) {
    cartItems.splice(index, 1);
    renderCart();
}

// --- EVENT LISTENER TAMBAH PRODUK ---
document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('btn-tambah')) {
        const productCard = e.target.closest('.product');
        const id = productCard.getAttribute('data-id');
        const nama = productCard.querySelector('h4').innerText;
        const hargaText = productCard.querySelector('.price').innerText.replace("Rp", "").replace(/\./g, "").trim();
        const harga = parseInt(hargaText);

        let existing = cartItems.find(item => item.id == id);
        if (existing) {
            existing.jumlah += 1;
        } else {
            cartItems.push({ id: id, nama: nama, harga: harga, jumlah: 1 });
        }

        renderCart();
        bukaKeranjang();
    }
});

// --- CHECKOUT ---
btnCheckout.addEventListener('click', function() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "checkout.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            if (xhr.responseText === "success") {
                alert("Transaksi berhasil disimpan!");
                cartItems = [];
                renderCart();
                tutupKeranjang();
            } else {
                alert("Terjadi kesalahan: " + xhr.responseText);
            }
        }
    };

    xhr.send("cart=" + encodeURIComponent(JSON.stringify(cartItems)));
});
</script>