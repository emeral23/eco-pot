document.addEventListener("DOMContentLoaded", function() {
    // Fungsi animasi angka naik
    function animateCounter(id, target) {
        const el = document.getElementById(id);
        if(!el) return;
        
        let count = 0;
        const speed = target / 50; 
        
        const updateCount = () => {
            count += speed;
            if(count < target) {
                el.innerText = Math.floor(count);
                setTimeout(updateCount, 20);
            } else {
                el.innerText = target;
            }
        };
        updateCount();
    }

    // Jalankan animasi untuk stats
    animateCounter("val-produk", 124);
    animateCounter("val-user", 45);
    animateCounter("val-order", 12);
});