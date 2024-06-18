@props(['titre', 'css'])
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
 <link href="{{ asset('css/style1.css') }}" rel="stylesheet">
 <link href="{{ $css }}" rel="stylesheet">
<title>{{$titre}}</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap library -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<style>
    input[type="time"]::-webkit-calendar-picker-indicator {
      display: none;
    }
    input[type="time"]::-moz-calendar-picker-indicator {
      display: none;
    }
    input[type="time"]::-ms-clear {
      display: none;
    }
    .owl-carousel,.owl-carousel .owl-item{-webkit-tap-highlight-color:transparent;position:relative}.owl-carousel{display:none;width:100%;z-index:1}.owl-carousel .owl-stage{position:relative;-ms-touch-action:pan-Y;touch-action:manipulation;-moz-backface-visibility:hidden}.owl-carousel .owl-stage:after{content:".";display:block;clear:both;visibility:hidden;line-height:0;height:0}.owl-carousel .owl-stage-outer{position:relative;overflow:hidden;-webkit-transform:translate3d(0,0,0)}.owl-carousel .owl-item,.owl-carousel .owl-wrapper{-webkit-backface-visibility:hidden;-moz-backface-visibility:hidden;-ms-backface-visibility:hidden;-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);-ms-transform:translate3d(0,0,0)}.owl-carousel .owl-item{min-height:1px;float:left;-webkit-backface-visibility:hidden;-webkit-touch-callout:none}.owl-carousel .owl-item img{display:block;width:100%}.owl-carousel .owl-dots.disabled,.owl-carousel .owl-nav.disabled{display:none}.no-js .owl-carousel,.owl-carousel.owl-loaded{display:block}.owl-carousel .owl-dot,.owl-carousel .owl-nav .owl-next,.owl-carousel .owl-nav .owl-prev{cursor:pointer;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.owl-carousel .owl-nav button.owl-next,.owl-carousel .owl-nav button.owl-prev,.owl-carousel button.owl-dot{background:0 0;color:inherit;border:none;padding:0!important;font:inherit}.owl-carousel.owl-loading{opacity:0;display:block}.owl-carousel.owl-hidden{opacity:0}.owl-carousel.owl-refresh .owl-item{visibility:hidden}.owl-carousel.owl-drag .owl-item{-ms-touch-action:pan-y;touch-action:pan-y;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.owl-carousel.owl-grab{cursor:move;cursor:grab}.owl-carousel.owl-rtl{direction:rtl}.owl-carousel.owl-rtl .owl-item{float:right}.owl-carousel .animated{animation-duration:1s;animation-fill-mode:both}.owl-carousel .owl-animated-in{z-index:0}.owl-carousel .owl-animated-out{z-index:1}.owl-carousel .fadeOut{animation-name:fadeOut}@keyframes fadeOut{0%{opacity:1}100%{opacity:0}}.owl-height{transition:height .5s ease-in-out}.owl-carousel .owl-item .owl-lazy{opacity:0;transition:opacity .4s ease}.owl-carousel .owl-item .owl-lazy:not([src]),.owl-carousel .owl-item .owl-lazy[src^=""]{max-height:0}.owl-carousel .owl-item img.owl-lazy{transform-style:preserve-3d}.owl-carousel .owl-video-wrapper{position:relative;height:100%;background:#000}.owl-carousel .owl-video-play-icon{position:absolute;height:80px;width:80px;left:50%;top:50%;margin-left:-40px;margin-top:-40px;background:url(owl.video.play.png) no-repeat;cursor:pointer;z-index:1;-webkit-backface-visibility:hidden;transition:transform .1s ease}.owl-carousel .owl-video-play-icon:hover{-ms-transform:scale(1.3,1.3);transform:scale(1.3,1.3)}.owl-carousel .owl-video-playing .owl-video-play-icon,.owl-carousel .owl-video-playing .owl-video-tn{display:none}.owl-carousel .owl-video-tn{opacity:0;height:100%;background-position:center center;background-repeat:no-repeat;background-size:contain;transition:opacity .4s ease}.owl-carousel .owl-video-frame{position:relative;z-index:1;height:100%;width:100%}
    </style>

</head>
  <body>
<section class="sidebar">
      <div class="nav-header">
        <p class="logo">PFE</p>
        <i class="bx bx-menu btn-menu"></i>
      </div>
      <ul class="nav-links pl-0">
        <li>
          <a href="{{route('Accueil')}}">
            <i class="bx bx-home-alt-2"></i>
            <span class="title">Accueil</span>
          </a>
          <span class="tooltip">Accueil</span>
        </li>
        <li>
          <a href="{{route("SectionA")}}">
            <i class="bx bx-folder"></i>
            <span class="title">Projets</span>
          </a>
          <span class="tooltip">Projets</span>
        </li>
        <li>
            <li>
                <a href="{{route("SectionB")}}">
                  <i class="bx bx-task"></i>
                  <span class="title">Taches</span>
                </a>
                <span class="tooltip">Taches</span>
              </li>
              <li>
          <a href="{{route("Profile")}}">
            <i class="bx bx-cog"></i>
            <span class="title">Profil</span>
          </a>
          <span class="tooltip">Profil</span>
        </li>
        <li style="bottom: 59px; display: flex; position: fixed; left: 8px;">
            <a href="{{route('Logout')}}">
              <i class="bx bx-log-out"></i>
              <span class="title" style="width: 180px;">Se déconnecter</span>
            </a>
            <span class="tooltip">Se déconnecter</span>
          </li>
      </ul>

      <div class="theme-wrapper">
        <i class="bx bxs-moon theme-icon"></i>
        <p>Thème sombre</p>
        <div class="theme-btn">
          <span class="theme-ball"></span>
        </div>
      </div>
    </section>
    <section class="home">
       {{$slot}}
    </section>
    <script src="{{ asset('js/sidebar.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
