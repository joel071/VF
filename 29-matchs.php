<?php
session_start();
    require_once "database.php";
    $today = date("d");
    $user=$_SESSION["iduser"];
    $sql = "SELECT * FROM matches WHERE iduser = '$user' and idMatch in (21,22, 23,24) ";
    $result = mysqli_query($conn, $sql);
$first_match_equipe1='';
$first_match_equipe2='';
$second_match_equipe1='';
$second_match_equipe2='';
$third_match_equipe1='';
$third_match_equipe2='';
$fourth_match_equipe1='';
$fourth_match_equipe2='';
    while($matchs = $result->fetch_array(MYSQLI_ASSOC))
    {
    if ($matchs["idMatch"]==21) {
        $first_match_equipe1=$matchs["equipe1"];
        $first_match_equipe2=$matchs["equipe2"];}
    if($matchs["idMatch"]==22){
      $second_match_equipe1=$matchs["equipe1"];
      $second_match_equipe2=$matchs["equipe2"];    }
    if($matchs["idMatch"]==23){
        $third_match_equipe1=$matchs["equipe1"];
        $third_match_equipe2=$matchs["equipe2"];    }
    if($matchs["idMatch"]==24){
      $fourth_match_equipe1=$matchs["equipe1"];
      $fourth_match_equipe2=$matchs["equipe2"]; 
}}?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Material Admin by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap");

*,
*:after,
*:before {
  box-sizing: border-box;
}

:root {
  --color-text-primary: #1c2a38;
  --color-text-secondary: #8A8F98;
  --color-text-alert: #d72641;
  --color-text-icon: #dbdade;
  --color-bg-primary: #fff;
  --color-bg-secondary: #f3f5f9;
  --color-bg-alert: #fdeaec;
  --color-theme-primary: #623ce6;
}

button,
input,
select,
textarea {
  font: inherit;
  
}

img {
  display: block;
  height: 80px;
  width: 80px;
}

strong {
  font-weight: 600;
}

body {
  font-family: "Inter", sans-serif;
  line-height: 1.5;
  color: var(--color-text-primary);
  background-color: var(--color-bg-secondary);
}

.match {
  background-color: var(--color-bg-primary);
  display: flex;
  flex-direction: column;
  min-width: 600px;
  border-radius: 10px;
  box-shadow: 0 0 2px 0 rgba(#303030, 0.1), 0 4px 4px 0 rgba(#303030, 0.1);
}

.match-header {
  display: flex;
  border-bottom: 2px solid rgba(#303030, 0.1);
  padding: 16px;
}

.match-status {
  background-color: var(--color-bg-alert);
  color: var(--color-text-alert);
  padding: 8px 12px;
  border-radius: 6px;
  font-weight: 600;
  font-size: 14px;
  display: flex;
  align-items: center;
  line-height: 1;
  margin-right: auto;}
  .match-status:before {
    content: "";
    display: block;
    width: 6px;
    height: 6px;
    background-color: currentColor;
    border-radius: 50%;
    margin-right: 8px;
  }

.match-tournament {
  display: flex;
  align-items: center;
  font-weight: 600;}
.match-tournament.img {
    width: 20px;
    margin-right: 12px;
  }


.match-actions {
  display: flex;
  margin-left: auto;
}

.btn-icon {
  border: 0;
  background-color: transparent;
  color: var(--color-text-icon);
  display: flex;
  align-items: center;
  justify-content: center;
}

.match-content {
  display: flex;
  position: relative;
}

.column {
  padding: 32px;
  display: flex;
  justify-content: center;
  align-items: center;
  width: calc(100% / 3);
}
#myBtn {

display: none; /* Hidden by default */

position: fixed; /* Fixed/sticky position */

bottom: 20px; /* Place the button at the bottom of the page */

right: 30px; /* Place the button 30px from the right */

z-index: 99; /* Make sure it does not overlap */

border: none; /* Remove borders */

outline: none; /* Remove outline */

background-color: #4ea8e3; /* Set a background color */

color: white; /* Text color */

cursor: pointer; /* Add a mouse pointer on hover */

padding: 15px; /* Some padding */

border-radius: 10px; /* Rounded corners */

font-size: 18px; /* Increase font size */

}



#myBtn:hover {

background-color: #555; /* Add a dark-grey background on hover */

}

.team {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.team-logo {
  width: 100px;
  height: 100px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background-color: var(--color-bg-primary);
  box-shadow: 0 4px 4px 0 rgba(#303030, 0.15),
    0 0 0 15px var(--color-bg-secondary);}
.team-logo.img {
    width: 50px;
  }


.team-name {
  text-align: center;
  margin-top: 24px;
  font-size: 20px;
  font-weight: 600;
}

.match-details {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.match-date, .match-referee {
  font-size: 14px;
  color: var(--color-text-secondary);}
.match-date.strong {
    color: var(--color-text-primary);
  }
.match-referee.strong {
    color: var(--color-text-primary);
  }


.match-score {
  margin-top: 12px;
  display: flex;
  align-items: center;
}

.match-score-number {
  font-size: 48px;
  font-weight: 600;
  line-height: 1;}
.match-score-number--leading {
    color: var(--color-theme-primary);
  }


.match-score-divider {
  font-size: 28px;
  font-weight: 700;
  line-height: 1;
  color: var(--color-text-icon);
  margin-left: 10px;
  margin-right: 10px;
}

.match-time-lapsed {
  color: #DF9443;
  font-size: 14px;
  font-weight: 600;
  margin-top: 8px;
}

.match-referee {
  margin-top: 12px;
}

.match-bet-options {
  display: flex;
  margin-top: 8px;
  padding-bottom: 12px;
}


.match-bet-option {
  margin-left: 4px;
  margin-right: 4px;
  border: 1px solid var(--color-text-icon);
  background-color: #F9f9f9;
  border-radius: 2px;
  color: var(--color-text-secondary);
  font-size: 14px;
  font-weight: 600;
  padding: 4px 8px;
}

.Select {
  margin-left: 4px;
  margin-right: 4px;
  border: 1px solid var(--color-text-icon);
  background-color: #F9f9f9;
  border-radius: 2px;
  color: var(--color-text-secondary);
  font-size: 14px;
  font-weight: 600;
  padding: 4px 8px;
  border-color:#303030;
  border-width: 1.5px;
}
.match-bet-place {
  position: relative;
  justify-content: center;
  bottom: -16px;
  left: 50%;
  transform: translateX(-50%);
  border: 0;
  background-color: #2874b2;
  border-radius: 6px;
  padding: 10px 70px;
  color: rgba(rgb(255, 255, 255), 0.9);
  font-size: 14px;
  font-weight: 600;
 
}

.main-container{
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  padding-bottom: 110px;
}
.match-bet-option:hover {
  background-color:	#a0cdeb;
}
.match-bet-place:hover {
  background-color:	#a0cdeb;
}

* {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
  }
  
  body {
    font-family: "Josefin Sans", sans-serif;
  }
  
  .navbar {
    font-size: 18px;
    background-image:  linear-gradient(to right, #550336, #a32a7f);;
    border: 1px solid rgba(0, 0, 0, 0.2);
    padding-bottom: 10px;
  }
  
  .main-nav {
    list-style-type: none;
    display: none;
  }
  
  .nav-links,
  .logo {
    text-decoration: none;
    color: rgba(255, 255, 255, 0.7);
  }
  
  .main-nav li {
    text-align: center;
    margin: 15px auto;
  }
  
  .logo {
    display: inline-block;
    font-size: 22px;
    margin-top: 10px;
    margin-left: 20px;
  }
  
  .navbar-toggle {
    position: absolute;
    top: 10px;
    right: 20px;
    cursor: pointer;
    color: rgba(255, 255, 255, 0.8);
    font-size: 24px;
  }
  
  .active {
    display: block;
  }
  
  @media screen and (min-width: 768px) {
    .navbar {
      display: flex;
      justify-content: space-between;
      padding-bottom: 0;
      height: 70px;
      align-items: center;
    }
  
    .main-nav {
      display: flex;
      margin-right: 30px;
      flex-direction: row;
      justify-content: flex-end;
    }
  
    .main-nav li {
      margin: 0;
    }
  
    .nav-links {
      margin-left: 40px;
    }
  
    .logo {
      margin-top: 0;
    }
  
    .navbar-toggle {
      display: none;
    }
  
    .logo:hover,
    .nav-links:hover {
      color: rgba(255, 255, 255, 1);
    }
  }
  </style>
  <body onload="myFunction()">
    <nav class="navbar">
      <span class="navbar-toggle" id="js-navbar-toggle">
              <i class="fas fa-bars"></i>
          </span>
      <a href="#" class="logo">Pronostics</a>
      <ul class="main-nav" id="js-menu">
   
      
        <li>
          <a href="logout.php" class="nav-links">Log Out</a>
        </li>
       
      </ul>
    </nav>

    <div class="main-container" style="margin-top: 620px;">
      <div class="container">
        <!-- code here -->
        <div class="match" >
          <div class="match-header"style=" justify-content: center;
          ">
<div class="swiper-prev-button">
  <a href="28-matchs.php">
  <em class="material-icons" style="margin-top: 30px;">chevron_left</em>
</a>
</div>
  <div class="match-tournament" ><img src="images/CupMondial.png" />World Cup Qatar 2022</div>
  <div class="swiper-next-button"><a href="30-matchs.php">

    <em class="material-icons" style="margin-top: 30px;margin-left: 30px;">chevron_right</em></a>

 </div>            
          </div> 
             <div> <hr  style="height: 15px;border: 0;box-shadow: inset 0 12px 12px -12px rgba(9, 84, 132);"/>
           </div>
 
<!--1111111111111111111111111111111111111111111111111111111111111-->
      <div class="container">
           
          <div class="match-content">
            <div class="column">
              <div class="team team--home">
                <div class="team-logo">
                  <img src="images/equateur.png" />
                </div>
                <h2 class="team-name">Equateur</h2>
              </div>
            </div>
            <div class="column">
              <div class="match-details">
                <div class="match-date">
                  29 Nov at <strong>11:00</strong>
                </div>
                
                <div class="match-time-lapsed">
                </div>
                <div class="match-referee">
                  
                </div> 
                <form action="insert.php" method="post" >
                  <input type="hidden" name="id" value="21">
                  <input type="hidden" name="NBpage" value="29">
                  <input type="hidden" name="date" value="11">


                  
                                  <select class ="Select" id="selectBar" name="selectBar" style="width: 75px;">
                                    <option value="default"></option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>


                                </select>
                                <button class="match-bet-option" type="button" disabled>VS</button>

                                <select class ="Select" id="selectBar1" name="selectBar1" style="width: 75px;">
                                  <option value="default"></option>
                                  <option value="0">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                              </select>
                              <button name="btn" onclick="isEmpty()"  class="match-bet-place" type="submit">save pronostics</button>
                             
                  
                                  </form>
              </div>
            </div>
            <div class="column">
              <div class="team team--away">
                <div class="team-logo">
                  <img src="images/senegal.png" />
                </div>
                <h2 class="team-name">Sénegal</h2>
              </div>
            </div>
          </div>
        </div>             <div> <hr  style="height: 15px;border: 0;box-shadow: inset 0 12px 12px -12px rgba(9, 84, 132);"/>

      </div>


<!--22222222222222222222222222222222222222222222222222222222222-->
 
<div class="container">
  <!-- code here -->
  <div class="match" >
      
    <div class="match-content">
      <div class="column">
        <div class="team team--home">
          <div class="team-logo">
            <img src="images/pays bas.png" />
          </div>
          <h2 class="team-name">Pays bas</h2>
        </div>
      </div>
      <div class="column">
        <div class="match-details">
          <div class="match-date">
            29 Nov at <strong>14:00</strong>
          </div>
          
          <div class="match-time-lapsed">
          </div>
          <div class="match-referee">
            
          </div> 
          <form action="insert.php" method="post" >
            <input type="hidden" name="id" value="22">
            <input type="hidden" name="NBpage" value="29">
            <input type="hidden" name="date" value="14">


            
                            <select class ="Select" id="selectBar" name="selectBar" style="width: 75px;">
                              <option value="default"></option>
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                          </select>
                          <button class="match-bet-option" type="button" disabled>VS</button>
            
                          <select class ="Select" id="selectBar1" name="selectBar1" style="width: 75px;">
                            <option value="default"></option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                        <button name="btn"   class="match-bet-place" type="submit">save pronostics</button>
            
                            </form>
        </div>
      </div>
      <div class="column">
        <div class="team team--away">
          <div class="team-logo">
            <img src="images/qatar.png" />
          </div>
          <h2 class="team-name">Qatar</h2>
        </div>
      </div>
    </div>
  </div><div> <hr  style="height: 15px;border: 0;box-shadow: inset 0 12px 12px -12px rgba(9, 84, 132);"/>

</div>


<!--3333333333333333333333333333333333333333333333333333333333333-->
<div class="container">
  <!-- code here -->
  <div class="match" >
      
    <div class="match-content">
      <div class="column">
        <div class="team team--home">
          <div class="team-logo">
            <img src="images/iran.png" />
          </div>
          <h2 class="team-name">Iran</h2>
        </div>
      </div>
      <div class="column">
        <div class="match-details">
          <div class="match-date">
            29 Nov at <strong>17:00</strong>
          </div>
          
          <div class="match-time-lapsed">
          </div>
          <div class="match-referee">
            
          </div> 
          <form action="insert.php" method="post" >
            <input type="hidden" name="id" value="23">
            <input type="hidden" name="NBpage" value="29">
            <input type="hidden" name="date" value="17">

            
                            <select class ="Select" id="selectBar"name="selectBar" style="width: 75px;">
                              <option value="default"></option>
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                          </select>
                          <button class="match-bet-option" type="button" disabled>VS</button>
            
                          <select class ="Select" id="selectBar1" name="selectBar1" style="width: 75px;">
                            <option value="default"></option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                        <button name="btn"  class="match-bet-place" type="submit">save pronostics</button>
            
                            </form>
        </div>
      </div>
      <div class="column">
        <div class="team team--away">
          <div class="team-logo">
            <img src="images/etas unis.jpg" />
          </div>
          <h2 class="team-name">Etas Unis</h2>
        </div>
      </div>
    </div>
  </div>
</div><div></div><hr  style="height: 15px;border: 0;box-shadow: inset 0 12px 12px -12px rgba(9, 84, 132);"/>
</div>




<!--444444444444444444444444444444444444444444444444444444444444444-->

<div class="container" style="margin-bottom: 20px;">
  <!-- code here -->
  <div class="match" >
      
    <div class="match-content">
      <div class="column">
        <div class="team team--home">
          <div class="team-logo">
            <img src="images/pays de galles.png" />
          </div>
          <h2 class="team-name">Pays de galles</h2>
        </div>
      </div>
      <div class="column">
        <div class="match-details">
          <div class="match-date">
            29 Nov at <strong>20:00</strong>
          </div>
          
          <div class="match-time-lapsed">
          </div>
          <div class="match-referee">
            
          </div> 
          <form action="insert.php" method="post" >
            <input type="hidden" name="id" value="24">
            <input type="hidden" name="NBpage" value="29">
            <input type="hidden" name="date" value="20">


            
                            <select class ="Select" id="selectBar" name="selectBar" style="width: 75px;">
                              <option value="default"></option>
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                          </select>
                          <button class="match-bet-option" type="button" disabled>VS</button>
            
                          <select class ="Select" id="selectBar1" name="selectBar1" style="width: 75px;">
                            <option value="default"></option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                        <button name="btn"   class="match-bet-place" type="submit">save pronostics</button>
            
                            </form>
        </div>
      </div>
      <div class="column">
        <div class="team team--away">
          <div class="team-logo">
            <img src="images/anglettere.png" />
          </div>
          <h2 class="team-name">Anglettere</h2>
        </div>
      </div>
    </div>
  </div>
</div>
</div>






<div></div>




</div>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>




      <script>let mainNav = document.getElementById("js-menu");
        let navBarToggle = document.getElementById("js-navbar-toggle");
        
        navBarToggle.addEventListener("click", function() {
          mainNav.classList.toggle("active");
        });
        
        const buttons = document.getElementsByName("btn");

var dates=document.getElementsByName('date');

var currenttdate = new Date();



function myFunction() {

  for(let i=0;i<buttons.length;i++){

    if(currenttdate.getDate()<29||(currenttdate.getDate()==29&&dates[i].value==currenttdate.getHours())){


    buttons[i].disabled=true;



  };

};}

let mybutton = document.getElementById("myBtn");



// When the user scrolls down 20px from the top of the document, show the button

window.onscroll = function() {scrollFunction()};



function scrollFunction() {

  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {

    mybutton.style.display = "block";

  } else {

    mybutton.style.display = "none";

  }

}



// When the user clicks on the button, scroll to the top of the document

function topFunction() {

  document.body.scrollTop = 0; // For Safari

  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

}



var select = document.getElementById("selectBar1");
var select1=document.getElementById("selectBar");
var selectedValue = select.options[select.selectedIndex].value;
var selectedValue = select1.options[select1.selectedIndex].value;

function isEmpty(){
  if(selectedValue=="default"||selectedValue=="default"){
    alert("Please complete all fields !");
  };
} 
        </script>

      
      </body>