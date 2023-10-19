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
    </script>

    <footer>
        <div class="footer">
            Dinda Ayu Aprilia (2209106095)
        </div>
    </footer>
</body>
</html>