        <span id="alert"></span>
            <script>
                 setInterval(() => {

                fetch('ajax/nearing_check_out.php')
                .then(response => response.text())
                .then(res => {
                    document.querySelector('#alert').innerHTML=res;
                })


                }, 1000);
            </script>