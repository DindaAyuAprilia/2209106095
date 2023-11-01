<footer>
    <div class="footer">
        Dinda Ayu Aprilia (2209106095)
        <div id="date-time"></div>
    </div>
</footer>
<script>
    function toggleMode() {
        const body = document.body;
        const popup = document.getElementById("popup");

        // Toggle mode
        body.classList.toggle("dark-mode");
        body.classList.toggle("light-mode");

        // Tampilkan popup
        popup.style.display = "block";

        // Sembunyikan popup setelah 2 detik
        setTimeout(function() {
            popup.style.display = "none";
        }, 5000);
    }

    function displayDateTime() {
        const dateTimeElement = document.getElementById("date-time");
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', timeZoneName: 'short' };
        const formattedDateTime = now.toLocaleString(undefined, options);
        dateTimeElement.textContent = formattedDateTime;
    }

    // Panggil fungsi untuk menampilkan tanggal dan waktu saat halaman dimuat
    displayDateTime();
</script>
</body>
</html>
