document.addEventListener("DOMContentLoaded", function() {
    // Animasi angka sederhana
    const counters = [
        { id: "count-produk", target: 124 },
        { id: "count-user", target: 45 },
        { id: "count-order", target: 12 }
    ];

    counters.forEach(counter => {
        const el = document.getElementById(counter.id);
        if (el) {
            let start = 0;
            const duration = 1000; // 1 detik
            const stepTime = Math.abs(Math.floor(duration / counter.target));
            
            const timer = setInterval(() => {
                start++;
                el.innerText = start;
                if (start == counter.target) {
                    clearInterval(timer);
                }
            }, stepTime);
        }
    });
});