<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Sekolah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libertinus+Keyboard&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="icon/font/bootstrap-icons.css">
  </head>
  <style>
*,html{
    margin: 0;
    padding: 0;
}

body{
    display: flex;
    flex-direction: column; 
    justify-content: center;
    align-items: center;
    overflow-x: hidden;
    background-image: url(aset/pexels-jplenio-1103970.jpg);
    background-position: center;
    background-size: cover;
} 

body::-webkit-scrollbar{
  display: none;
}

nav{
    width: 100%;
    height: 15vh;
    padding: 20px 20px;
    display: flex;
    justify-content: space-between;
    background: white;
    color: white;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
}

nav span{
  font-style: oblique;
  font-size: 3.5em;
  margin-bottom: 20px;
  -webkit-text-fill-color: transparent;
  -webkit-text-stroke: 2px black;
  font-family: "Rubik Mono One", monospace;
  background: blueviolet;
  background-size: 200%;
  background: red;
  background-clip: text;
  animation: rpl 0.3s linear infinite;
}

@keyframes rpl{
  to{
    background-position: 200%;  
  }
}

.logo{
    cursor: pointer;
}



.nav-link{
    display: flex;
    gap: 50px;
    background: blueviolet;
    border-radius: 10px;
    width: 60%;
    display: flex;
    justify-content:center;
    align-items: center;
    font-weight: 900;
    font-size: 1.2em;
}

.nav-link a{
  background: blueviolet ;
  border-radius: 20px;
  padding: 10px 5px;
}

.nav-link a:hover{
    background-color: red;
    border-radius: 10px;
    background-position: center;
    background-size: cover;
    padding: 5px;
    border: none;
}

.menu-click{
    display: none;
    flex-direction: column;
    cursor: pointer;
}

.menu-click div{
    width: 36px;
    height: 4px;
    background-color: black;
    margin: 3px 0;
    display: none;
}

@media (max-width:900px){
   .nav-link{
       display: none;
       position: absolute;
       width: 100%;
       height: auto;
       left: 0;
       top: 90px;
       flex-direction: column;
       transition: all 0.5s ease-in-out;
   }
   .menu-click div{
    display: block;
   }
   .nav-link.show{
       display: flex;
   }

   .nav-link a:hover{
    border-bottom:1px solid white;
    background-color: transparent;
    border-radius: 0px;
   }

   .home .button{
    display: flex;
    flex-direction: column;
   }

   #modal{
    position: fixed;
    left: 20px;
    background: #020202;
   }

   .creadit{
    display: none;
   }

}


    .logo{
      display: flex;
      justify-content: center;
      align-items: center;
    }


    .nav-link.show{
        display: flex;
    }

    .menu-click{
        display: flex;
    }


.home{
    margin-top: 6%;
    display: flex;
    align-items: center;
    width: 100%;
    padding: 5rem 5%;
    min-height: 90vh;
    position: relative;
    background-image: url(aset/rumah.jpg);
    background-position: center;
    background-size: cover;
    justify-content: center;
    clip-path: polygon( 0 0, 100% 0, 100% 70%, 50% 100%, 0 70%);
    animation: home both;
    animation-timeline: view();
}

.home .creadit{
  font-family: "Libertinus Keyboard", system-ui;
  position: absolute;
  top: 2em;
  right: 2em;
  font-size: 2rem;
  color: white;
  text-transform: lowercase;
  background: linear-gradient(to right,rgb(8, 189, 235), #8f68ff,rgb(133, 223, 235));
  border-radius: 10px;
  cursor: pointer;
}

dialog{
  position: absolute;
  text-align: center;
  overflow: hidden;
  top: 30%;
  left: 50%;
  width: 400px;
  height: 400px;
  border-radius: 20px;
  font-weight: 400;
  font-style: normal;
  color:rgb(255, 255, 255);
  background: transparent;
}

dialog form{
  width: 100%;
  height: 100px;
  display: flex;
  justify-content: center;
  align-items:center ;
}

.marquee{
  height: 400px;
  overflow: hidden;
  position: relative;
}

h3{
  font-weight: bold;
}


.marquee-content{
  position: absolute;
  left: 2%;
  top: 100%;
  animation: credit 30s linear infinite;
}

@keyframes credit{
  0%{
    top: 100%;
  }
  100%{
    top: -100%;
  }
}

.home h2{
  font-size: 2rem;
  text-transform: uppercase;
  background: linear-gradient(to right, #fc72ff, #8f68ff, #f7f7f7,
rgb(104, 237, 255),rgb(12, 50, 218));
  background-size: 200%;
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: text-gradasi 4.5s linear infinite;
}

@keyframes text-gradasi{
  to{
    background-position: 200%;
  }
}

.container{
  gap: 2em;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.text{
  width: 100%;
  text-align: center;
}

.smk{
  width: 100%;
  height: 80vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background:linear-gradient(#120030, #122212);
  animation: smk both;
  animation-timeline: view();
}

@keyframes smk{
  0%{
    opacity: 0;
  }

  50%{
    opacity: 1;
  
  }
}

.text-jurusan{
  -webkit-text-fill-color: transparent;
  -webkit-text-stroke: 1px white;
  font-size: 3em;
  animation: text-jurusan 30s linear infinite;
}

@keyframes text-jurusan{
  0%{
    opacity: 1;
    box-shadow: 0 0 10px indigo;
  }

  20%{
    opacity: 1;
  }

  40%{
    opacity: 0;
    box-shadow: 0 0 10px indigo;
  }

  60%{
    opacity: 0;
    box-shadow: 0 0 10px indigo;
  }

  80%{
    opacity: 1;
  }

  100%{
    opacity: 0;
    box-shadow: 0 0 10px indigo;
  }
}


.slider{
      padding: 10px;
      position: relative;
      width: 150px;
      height: 150px;
      transform-style: preserve-3d;
      animation: rotate 30s linear infinite;
    }

@keyframes rotate{
    0%{
        transform: perspective(1000px) rotateY(0deg);
    }

    100%{
        transform: perspective(1000px) rotateY(360deg);
    }
}

.slider span{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    transform-origin: center;
    transform-style: preserve-3d;
    transform: rotateY(calc(var(--i)*80deg)) translateZ(350px);
}

.slider span img{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10%;
    transition: 2s;
    box-shadow: 2px 2px 1px black;
}

.slider span:hover img{
    cursor: pointer;
    transform: translateY(-50px) scale(1.2);
}

.kegiatan{
  background-image: url(aset/rumah2.jpg);
  background-position: center;
  background-size: cover;
  background-color: transparent;
  position: relative;
  width: 100%;
  height: 100vh;
  overflow: hidden;
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  justify-content: center;
  align-items: center;
  translate: -100%;
  opacity: 0;
}

#kegiatan{
  translate: 0;
  opacity: 1;
}


.kegiatan h1{
  margin-bottom: 20px;
  font-size: 2.5em;
  font-weight:bolder;
  background-size: cover;
  background-position: center;
  width: 100%;
  border-radius: 20px;
  text-shadow: 2px 2px 2px indigo;
  text-align: center;
  font-family: "Libertinus Keyboard", system-ui;
}

.list-kegiatan{
  width: 100%;
  height: 70vh;
  box-sizing: border-box;
  display: flex;
  justify-content: space-evenly;
  animation: kegiatan 20s linear infinite;
}

@keyframes kegiatan{
  0%{
    transform: translateX(100%);
  }
  100%{
    transform: translateX(-100%)
  }
}

.img1{
  width: 300px;
  height: 300px;
  border: none;
  box-shadow: 0 0 20px indigo;
  border-radius: 10px;
  font-family: "Libertinus Keyboard", system-ui;
  color: white;
  text-align: center;
  font-size: 2em;
}
.img1 img{
  width: 100%;
  height: 200px;
   border-radius: 10px;
   cursor: pointer;
}
.img1 img:hover{
  transition: 0.2s;
  transform: translateX(50px);
}
.img2{
  width: 300px;
  height: 300px;
  border: none;
  box-shadow: 0 0 20px indigo;
  border-radius: 10px;
  font-family: "Libertinus Keyboard", system-ui;
  color: white;
  text-align: center;
  font-size: 2em;
}
.img2 img{
  width: 100%;
  height: 200px;
   border-radius: 10px;
  cursor: pointer;
}
.img2 img:hover{
  transition: 0.2s;
  transform: translateX(50px);
}
.img3{
  width: 300px;
  height: 300px;
  border: none;
  box-shadow: 0 0 20px indigo;
  border-radius: 10px;
  font-family: "Libertinus Keyboard", system-ui;
  color: white;
  text-align: center;
  font-size: 2em;
}
.img3 img{
  width: 100%;
  height: 200px;
   border-radius: 10px;
  cursor: pointer;
}
.img3 img:hover{
  transition: 0.2s;
  transform: translateX(50px);
}
.img4{
  width: 300px;
  height: 300px;
  border: none;
  box-shadow: 0 0 20px indigo;
  border-radius: 10px;
  font-family: "Libertinus Keyboard", system-ui;
  color: white;
  text-align: center;
  font-size: 2em;
}
.img4 img{
  width: 100%;
  height: 200px;
   border-radius: 10px;
   cursor: pointer;
}
.img4 img:hover{
  transition: 0.2s;
  transform: translateX(50px);
}
.img5{
  width: 300px;
  height: 300px;
  border: none;
  box-shadow: 0 0 20px indigo;
  border-radius: 10px;
  font-family: "Libertinus Keyboard", system-ui;
  color: white;
  text-align: center;
  font-size: 2em;
}
.img5 img{
  width: 100%;
  height: 200px;
   border-radius: 10px;
  cursor: pointer;
}
.img5 img:hover{
  transition: 0.2s;
  transform: translateX(50px);
}
.img6{
  width: 300px;
  height: 300px;
  border: none;
  box-shadow: 0 0 20px indigo;
  border-radius: 10px;
  font-family: "Libertinus Keyboard", system-ui;
  color: white;
  text-align: center;
  font-size: 2em;
}
.img6 img{
  width: 100%;
  height: 200px;
   border-radius: 10px;
  cursor: pointer;
}
.img6 img:hover{
  transition: 0.2s;
  transform: translateX(50px);
}

footer{
  width: 100%;
  height: 85vh;
  display: flex;
  padding: 3rem 10%;
  justify-content: center;
  animation: footer both;
  animation-timeline: view();
}

@keyframes footer{
  0%{
    opacity: 0;
   transform: scale(2);
  }
  50%{
    opacity: 1;
     transform: scale(1);
  }
}

footer .footer1{
  display: flex;
  flex-direction: column;
  gap: 2em;
}

footer .footer2{
  display: flex;
  flex-direction: column;
  gap: 1em;
}

footer .footer3{
  display: flex;
  flex-direction: column;
  gap: 4em;
}

 </style>

  <body class="bg-gray-900">
    <nav class="top-0 left-0" id="navbar">
        <div class="menu-click" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="nav-link font-mono p-4" id="navLink">
            <a href="#home"><i class="bi bi-house-add-fill p-2"></i>Home</a>
            <a href="#smk"><i class="bi bi-code-square"></i>Jurusan</a>
            <a href="#kegiatan"><i class="bi bi-square-half p-2"></i>Kegiatan</a>
            <a href="#"><i class="bi bi-play-btn me-2"></i>Tutorial</a>
            <a href="#footer"><i class="bi bi-copy"></i>Footer</a>
            <div class="logo w-10 h-10">
              <img src="aset/smk.png" alt="#" class=" rounded-2xl">
            </div>
        </div>

        <span>RPL</span>
    </nav>
    
    <div class="home w-screen flex h-auto" id="home">
      <button class="creadit" id="opneModal">Credit</button>
      <dialog id="modal">

      <div class="marquee">
        <div class="marquee-content">
          <b>Daftar nama  yang terlibat dalam pengembangan aplikasi</b>
          <br>
          <h3>Nama Pengembang Aplikasi</h3>
          <span>Indra Ramadani</span>
          <br>
          <h3>Guru pembimbing</h3>
          <span>Mursidil Hakiki, S.kom</span>
          <br>
          <h3>Guru penasehat</h3>
          <span>Lalu Qudus Qurniawan, S.kom</span>
          <br>
          <h3>Guru Pengawas</h3>
          <span>A.Habib Averusyd</span>
          <br>
          <span>Kahib, S.pd</span>
          <br>
          <span>Febti Yudia Sanfani, S.kom</span>
          <br>
          <span>Sri Rohmi Yuniati, S.kom</span>
          <br>
          <span>Annur Fitri, S.kom</span>
          <br>
          <h3>Rekan Pendukung</h3>
          <span>Lalu Ogi</span>
          <br>
          <span>Yazid</span>
          <br>
          <span>Sila</span>
          <br>
          <span>Novizza</span>
          <br>
          <span>Reni</span>
          <br>
          <b>-- TERIMAKASIH :) --</b>
        </div>
      </div>

      <form><button id="closeModal" class="text-2xl mt-5 w-70 bg-indigo-700 text-white cursor-pointer rounded-2xl">Tutup</button></form>
      </dialog>
      <div class="container">
      <div class="text w-100">
          <h2 class="font-mono text-white text-2xl mb-10">
              Welcome to Apps SMKN 1 PRINGGABAYA!!
            </h2>
            <p class="text-white">
              Selamat datang di aplikasi SMKN 1 PRINGGABAYA.
            </p>
            <p class="text-white">
              Aplikasi ini akan membantu mempermudah segala bentuk jenis request seperti:
              -barang,makana, dll.
            </p>
            <p class="text-white">
                upload file seperti document seperti:
              - ujian,foto,dan video, dll.
            </p>
          </div>
          <div class="button flex mb-20 gap-5 p-5 text-center">
            <a href="register.php" class="w-50 h-8 bg-sky-700 text-white text-center rounded-2xl text-xl font-mono
            hover:bg-sky-500">Get Start</a>
            <div class="button flex mb-20 gap-5 p-5 text-center ">
              <a href="./siswa/loginSiswa.php" class="w-50 h-8 bg-sky-700 text-white text-center rounded-2xl text-xl font-mono
              hover:bg-sky-500">Khusus siswa</a>
            </div>
        </div>
        </div>

          </div>
        
        <div class="smk" id="smk">
          <h1 class="text-jurusan">
            JURUSAN
          </h1>
          <div class="slider">
          <span style="--i:1;"><img src="jurusan/rplLogo.jpg" alt="#"></span>
          <span style="--i:2;"><img src="jurusan/tkj.png" alt="#"></span>
          <span style="--i:3;"><img src="jurusan/tesha.jpeg" alt="#"></span>
          <span style="--i:4;"><img src="jurusan/dpib.jpeg" alt="#"></span>
          <span style="--i:5;"><img src="jurusan/telin.jpeg" alt="#"></span>
          <span style="--i:6;"><img src="jurusan/titl.jpeg" alt="#"></span>
          <span style="--i:7;"><img src="jurusan/tpm.jpeg" alt="#"></span>
          <span style="--i:8;"><img src="jurusan/TKR.jpeg" alt="#"></span>
          <span style="--i:9;"><img src="jurusan/tpl.jpeg" alt="#"></span>
          </div>
        </div>

          <div class="kegiatan" id="kegiatan">
            <h1 class="text-center text-white">
              Kegiatan
            </h1>
              <div class="list-kegiatan" id="list-kegiatan">
                  <div class="img1">
                      <img src="kegiatan/download.jpeg" alt="#">
                      <p>SMK</p>
                  </div>
                  <div class="img2">
                      <img src="kegiatan/download (1).jpeg" alt="#">
                      <p>BISA</p>
                  </div>
                  <div class="img3">
                      <img src="kegiatan/images (1).jpeg" alt="#">
                      <p>HEBAT</p>
                  </div>
                   <div class="img4">
                      <img src="kegiatan/download.jpeg" alt="#">
                      <p>SMK</p>
                  </div>
                  <div class="img5">
                      <img src="kegiatan/download (1).jpeg" alt="#">
                      <p>BISA</p>
                  </div>
                  <div class="img6">
                      <img src="kegiatan/images (1).jpeg" alt="#">
                      <p>HEBAT</p>
                  </div>
              </div>
          </div>

  <footer class="bg-indigo-800 flex flex-col md:flex-row relative top-10 p-15 mt-0   gap-20" id="footer">
            <div class="footer1 text-white p-5">
            <ul class="flex flex-col gap-5">
              <li class="font-bold text-2xl">
                Deskripsi:
              </li>
              <li>Aplikasi sekolah</li>
              <li>Nama sekolah: SMKN 1 peringgabaya</li>
              <li>
                <img src="aset/smk.png" alt="#" style="width:150px; height:auto; border-radius:20px;">
              </li>
            </ul>
            <p class="text-center text-xl font-bold aplikasi mt-3">
              Web SMKN 1 PERINGGABAYA
            </p>
            <a href="https://smkn1pringgabaya.sch.id/" class="text-indigo-100">
              https://smkn1pringgabaya.sch.id/
            </a>
          </div>
          <div class="footer2 text-white">
            <ul class="flex flex-col gap-10">
              <li class="font-bold  text-2xl">
                Alamat:
              </li>
              <li>Jalan Sanubaya KM 3, Desa Peringgabaya Utara</li>
              <li>Kecamatan Peringgabaya, Kabupaten Lombok Timur</li>
              <li>Nusa Tenggara Barat.</li>
              <li>
                <img src="aset/OIP.jpg" alt="#" style="width:300px; height:auto; border-radius:10px;" >
              </li>
            </ul>
            <p class="text-center text-sm font-bold aplikasi mt-3">
              Sosmed SMK
            </p>
            <div class="sosmed p-5 nt-2 flex gap-5 justify-center">
              <a href="https://www.facebook.com/share/16z29F9Rzi/">
                <img src="aset/facebook.png" alt="#" style="width:40px; height:auto;">
              </a>
              <a href="https://www.instagram.com/smkn1prbaya_official?igsh=N2w0dGU5dmI4ZjE0">
                <img src="aset/instagram.png" alt="#" style="width:40px; height:auto;">
              </a>
              <a href="https://youtube.com/@smkn1pringgabaya?si=Z1nu5PdxPr_iRG-z ">
                <img src="aset/youtube.png" alt="#" style="width:45px; height:auto;">
              </a>
            </div>
          </div>
          <div class="footer3 text-white flex flex-col gap-3">
            <p class="font-bold  text-2xl">Lokasi:<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
          </svg></p>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.6551370168213!2d116.63291277406267!3d-8.532821686459688!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdb48920606097%3A0x1da58c9f718d4634!2sSMK%20Negeri%201%20Pringgabaya!5e0!3m2!1sen!2sid!4v1752971923600!5m2!1sen!2sid"
            width="250" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <h1 class="mt-20">                                                                                     
              &copy; Hak Akses SMKN 1 PERINGGBAYA
            </h1>
          </div>
    </footer>
      </body>
      <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
      <script>
function toggleMenu() {
    const navLink = document.getElementById('navLink');
    navLink.classList.toggle('show');
}


    document.querySelectorAll('#navbar a').forEach(scrol => {
    scrol.addEventListener('click', function(e) {
        e.preventDefault();

        const id = this.getAttribute('href');
        const element = document.querySelector(id);

        element.scrollIntoView({behavior:'smooth'});
    })
})

  const opneModal = document.getElementById('opneModal');
    const dialog = document.getElementById('modal');
    const closeModal = document.getElementById('closeModal');
    
    opneModal.addEventListener('click', () => {
        dialog.showModal();
    })

    closeModal.addEventListener('click', () => {
        dialog.closest();
    });

    const section = document.querySelectorAll("#kegiatan");
    const observer = new IntersectionObserver((entries) =>{
      if(entries[0].isIntersecting){
        entries[0].target.classList.add("show");
      }else{
        entries[0].target.classList.remove("show");
      }
    }, {})

    observer.observe(section);

</script>
<script src="main.js"></script>
</html>