

<body class="d-flex flex-column h-100" onload="loadNews(); loadEvents()">
  <main role="main" class="mx-auto flex-shrink-0" style="max-width: 1200px; width: 100%; background-color: white;">
    <!--IMAGE HOT NEWS SLIDER-->
    <div class="container mx-auto mt-4 p-0" style="max-width: 1200px;">
    <div id="newsCarousel" class="carousel slide" data-ride="carousel" style="width: 100%;">
      <ul class="carousel-indicators">
        <li data-target="#newsCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#newsCarousel" data-slide-to="1"></li>
        <li data-target="#newsCarousel" data-slide-to="2"></li>
      </ul>
    
      <div class="carousel-inner">
        <div class="carousel-item active carousel-images">
          <img class="carousel-images" src="img/background.jpg" style="filter: brightness(50%);">
          <div class="carousel-caption">
            <h1>Welcome to Universiti Malaysia Sabah</h1>
            <p>Faculty of Computing and Informatics</p>
          </div>
        </div>
        <div class="carousel-item carousel-images">
          <img class="carousel-images" src="img/background2.jpeg" style="filter: brightness(50%);">
          <div class="carousel-caption">
            <h1>Majlis Serah Tugas & Penghargaan Sempena Perpindahan Kakitangan FKI</h1>
            <p>Pihak Fakulti ingin merakamkan ucapan setinggi-tinggi penghargaan dan  terima kasih kepada En. Azman Ismail dan Pn Ida Haslinda Muljana diatas jasa khidmat bakti sebagai kakitangan FKI.</p>
          </div>
        </div>
        <div class="carousel-item carousel-images">
          <img class="carousel-images" src="img/background3.jpeg" style="filter: brightness(50%);">
          <div class="carousel-caption">
            <h1>Congratulation FKI-UMS!</h1>
            <p>Awarded 1st Runner Up and Special Honors Outstanding Achievement of Huawei ICT Academy in Huawei ICT Competition Malaysia Final 2019-2020.</p>
          </div>
        </div>
      </div>
    
      <a class="carousel-control-prev" href="#newsCarousel" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#newsCarousel" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
    <hr class="my-4">
    </div>
  <!--NEWS & EVENTS ROW-->
  <div class="row mx-auto justify-content-between" style="max-width: 1200px;">
      <!--NEWS-->
        <div id="sectionBox" class="w-100">
          <div style="background-color: #163269;">
            <h3 class="p-3 text-white"><a href="#" class="text-white">NEWS & UPDATES</a></h3>
          </div>
          <div>
            <ul class="news-list m-3" id="newsContent"></ul>
            <script>
            function loadNews(){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()   {
                    if(this.readyState == 4 && this.status == 200) {
                        var myObj = JSON.parse(this.responseText);
                        var list = "";
                        var max = 4;
                        var min = 0;
                        for (i in myObj.NEWS){
                          var d = new Date(myObj.NEWS[i].timestamp).toDateString();
                            list += "<li><h6 class=\"text-justify\"><a class=\"text-body\" href=" + myObj.NEWS[i].link + ">" + myObj.NEWS[i].title + "</a><p class=\"text-right font-weight-normal\">—" + d + "<p></h6><br></li>";
                            min++
                            if(min == max){ break;}
                        }
                        document.getElementById("newsContent").innerHTML = list;
                    }
                };
                xhttp.open("GET", "data/news.json", true);
                xhttp.send();
            }
          </script>
        </div>
      </div>  
      <!--EVENTS-->
      <div id="sectionBox" class="w-100">
        <div style="background-color: #163269;">
          <h3 class="p-3 text-white" ><a href="#" class="text-white">UPCOMING EVENTS</a></h3>
        </div>
        <div>
          <ul class="news-list m-3" id="eventsContent"></ul>
          <script>
            function loadEvents(){
                var months = [ "January", "February", "March", "April", "May", "June", 
               "July", "August", "September", "October", "November", "December" ];
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()   {
                    if(this.readyState == 4 && this.status == 200) {
                        var myObj = JSON.parse(this.responseText);
                        var list = "";
                        var max = 4;
                        var min = 0;
                        for (i in myObj.EVENTS){
                          var d = new Date(myObj.EVENTS[i].timestamp)
                            list += "<li class=\"row m-3\">\
                            <div class=\"event-date\"><a href=" + myObj.EVENTS[i].link + " class=\"event-date-style\"><span class=\"day\">" + d.getDay() + "</span><span class=\"month\">" + months[d.getMonth()].substr(0,3) + "</span><\a></div>\
                            <div><h6 class=\"event-list-items text-justify\"><a class=\"text-body\" href=" + myObj.EVENTS[i].link + ">" + myObj.EVENTS[i].title + "</a></h6><br></div>\
                            </li>";
                            if(min == max){ break;}
                        }
                        document.getElementById("eventsContent").innerHTML = list;
                    }
                };
                xhttp.open("GET", "data/events.json", true);
                xhttp.send();
            }
          </script>
        </div>
      </div>  
  </div>
    <!--PROGRAMS, RESEARCH, ADMISSION, ALUMNI ROW-->
    <div class="container-fluid" style="max-width: 1200px;">
      <hr class="my-4">
      <div class="row text-center">
        <div class="p-0 m-0 col-xs-12 col-sm-6 col-md-3" style="position: relative; overflow: hidden;">
          <a href="http://fki.ums.edu.my/fki/programmes-list/">
          <img id="imageBox" src="img/programmes.jpg"></img>
          <h3 style="pointer-events: none;"class="centered text-white">PROGRAMMES</h3>
          </a>
        </div>
        <div class="p-0 m-0 col-xs-12 col-sm-6 col-md-3" style="position: relative; overflow: hidden;">
          <a href="http://fki.ums.edu.my/fki/admission/">
          <img id="imageBox" src="img/admission.jpg"></img>
          <h3 style="pointer-events: none;"class="centered text-white">ADMISSION</h3>
          </a>
        </div>
        <div class="p-0 m-0 col-xs-12 col-sm-6 col-md-3" style="position: relative; overflow: hidden;">
          <a href="http://fki.ums.edu.my/fki/research-unit">
          <img id="imageBox" src="img/research.jpg"></img>
          <h3 style="pointer-events: none;"class="centered text-white">RESEARCH</h3>
          </a>
        </div>
        <div class="p-0 m-0 col-xs-12 col-sm-6 col-md-3" style="position: relative; overflow: hidden;">
          <a href="http://fki.ums.edu.my/fki/alumni/">
          <img id="imageBox" src="img/alumni.png"></img>
          <h3 style="pointer-events: none;"class="centered text-white">ALUMNI</h3>
          </a>
        </div>
      </div>
      <hr class="my-4">
    </div>
    <!--MEDIA-->
    <div class="container mx-auto" style="max-width: 1200px;">
      <video class="video-js video vjs-big-play-centered" controls preload="auto" data-setup="{}">
          <source src="videos/videoplayback.mp4" type="video/mp4"/>
            <p class="vjs-no-js">
               To view this video please enable JavaScript, and consider upgrading to a
               web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
      </video>
      <hr class="my-4">
    </div>
  </main>
</body>