<?php 
    include '../functions/functions.php'
?>

<?=template_header()?>

<link href="../style/about.css" rel="stylesheet" type="text/css">



<script>
window.addEventListener('scroll', function() {
  let header = document.querySelector('header');
  let windowPosition = window.scrollY > 0;
  header.classList.toggle('scrolling-active', windowPosition);
})
</script>

<body>
  <div class="about-page">
    <div class="initial-screen">
      <img src="../assets/images/about-image.jpeg" alt="" id="initial-screen-bg" />
      <h2>Levar tecnologia <br>
        a agricultura é o <br>
        que nos move</h2>
    </div>

    <div class="team-page">
      <br><br><br><br><br><br><br><br><br><br><br><br><br>
      <h1>Conheça um pouco sobre o nosso time</h1>
      <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
        laborum." <br><br>

        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
        laborum." <br><br>

        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
        laborum."
      </p>
    </div>

    <div class="values-page">
      <div class="values-card">
        <h1>Missão</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde itaque, sequi velit perspiciatis amet nemo est
          neque ab esse quibusdam eligendi non natus corporis possimus enim impedit obcaecati! Reiciendis, voluptas.</p>
      </div>
      <div class="values-card">
        <h1>Valores</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde itaque, sequi velit perspiciatis amet nemo est
          neque ab esse quibusdam eligendi non natus corporis possimus enim impedit obcaecati! Reiciendis, voluptas.</p>
      </div>
      <div class="values-card">
        <h1>Visão</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde itaque, sequi velit perspiciatis amet nemo est
          neque ab esse quibusdam eligendi non natus corporis possimus enim impedit obcaecati! Reiciendis, voluptas.</p>
      </div>
    </div>

    <div class="our-team">
      <br><br>
      <h1>Nosso time</h1>
      <div class="team-pics">
        <img src="../assets/images/default-profile-image.png" alt="">

        <img src="../assets/images/default-profile-image.png" alt="">

        <img src="../assets/images/default-profile-image.png" alt="">

        <img src="../assets/images/default-profile-image.png" alt="">

        <img src="../assets/images/default-profile-image.png" alt="">
      </div>
    </div>
  </div>
</body>