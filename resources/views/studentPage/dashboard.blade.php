
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="apple-touch-icon" type="image/png" href="https://static.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
<meta name="apple-mobile-web-app-title" content="CodePen">
<link rel="shortcut icon" type="image/x-icon" href="" />
<link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
<title>NEU</title>
<meta name="designer" content="Alberto Hartzet">
<meta name="programer" content="Alberto Hartzet">
<meta name="author" content="Alberto Hartzet">
<meta name="description" content="One page navigation with pure CSS">
<meta property="og:url" content="https://codepen.io/hrtzt/details/NPZKRN">
<meta property="og:image" content="https://pbs.twimg.com/media/CCNJN_XUMAAJSzU.jpg:large">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css'>
<style>
html, body, .page {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
  transition: all .6s cubic-bezier(.5, .2, .2, 1.1);
  -webkit-transition: all .6s cubic-bezier(.5, .2, .2, 1.1);
  -moz-transition: all .6s cubic-bezier(.5, .2, .2, 1.1);
  -o-transition: all .6s cubic-bezier(.5, .2, .2, 1.1);  
  color: #fff;
  overflow: hidden; 
}

* {
  font-family: 'open sans', 'lato', 'helvetica', sans-serif;
}

.page {
  position: absolute;
}

#p1 {
  left: 0;
}

#p2, #p3, #p4, #p5 {
  left: 200%;
}

#p1 { background: darkslateblue; }
#p2 { background: tomato; }
#p3 { background: gold; }
#p4 { background: deeppink; }
#p5 { background: rebeccapurple; }

#t2:target #p2,
#t3:target #p3,
#t4:target #p4,
#t5:target #p5 {
  transform: translateX(-190%);
  -webkit-transform: translateX(-190%);
  -moz-transform: translateX(-190%);
  -o-transform: translateX(-190%);
  transition-delay: .4s !important;
}

#t2:target #p1, 
#t3:target #p1,
#t4:target #p1,
#t5:target #p1{
  background: black;
}

#t2:target #p1 .icon, 
#t3:target #p1 .icon,
#t4:target #p1 .icon,
#t5:target #p1 .icon {
  -webkit-filter: blur(3px);
}

.icon {
  color: #fff;
  font-size: 32px;
  display: block;
}

ul .icon:hover {
  opacity: 0.5;
}

.page .icon .title {
  line-height: 2;
}

#t2:target ul .icon,
#t3:target ul .icon,
#t4:target ul .icon,
#t5:target ul .icon{
  transform: scale(.6);
  -webkit-transform: scale(.6);
  -moz-transform: scale(.6);
  -o-transform: scale(.6);
  transition-delay: .25s;
}

#t2:target #dos,
#t3:target #tres,
#t4:target #cuatro,
#t4:target #cinco {
  transform: scale(1.2) !important;
  -webkit-transform: scale(1.2) !important;
  -moz-transform: scale(1.2) !important;
  -o-transform: scale(1.2) !important;
}

ul {
  position: fixed;
  z-index: 1;
  top: 0;
  bottom: 0;
  left: 0;
  margin: auto;
  height: 280px;
  width: 10%;
  padding: 0;
  text-align: center;
 }

#menu .icon {
  margin: 30px 0;
  transition: all .5s ease-out !important;
  -webkit-transition: all .5s ease-out;
  -moz-transition: all .5s ease-out;
  -o-transition: all .5s ease-out;
}

a {
  text-decoration: none;
}

.title, .hint {
  display: block;
}

.title {
  font-size: 38px;
}

.hint {
  font-size: 13px;
}

#p4 .hint {
  display: inherit !important;
}

.hint a {
  color: yellow;
  transition: all 250ms ease-out;
  -webkit-transition: all 250ms ease-out;
  -moz-transition: all 250ms ease-out;
  -o-transition: all 250ms ease-out;
}

.hint a:hover {
  color: #FFF;
}

.line-trough {
  text-decoration: line-through;
}

.page .icon {
  position: absolute;
  top: 0;
  bottom: 0;
  right: 10%;
  left: 0;
  width: 270px;
  height: 170px;
  margin: auto;
  text-align: center;
  font-size: 80px;
  line-height: 1.3;
  transform: translateX(360%);
  -webkit-transform: translateX(360%);
  -moz-transform: translateX(360%);
  -o-transform: translateX(360%);
  transition: all .5s cubic-bezier(.25, 1, .5, 1.25);
  -webkit-transition: all .5s cubic-bezier(.25, 1, .5, 1.25);
  -moz-transition: all .5s cubic-bezier(.25, 1, .5, 1.25);
  -o-transition: all .5s cubic-bezier(.25, 1, .5, 1.25);
}

.page#p1 .icon {
  height: 220px;
}

.page#p1 .icon {
  transform: translateX(10%) !important;
}

#t2:target .page#p2 .icon,
#t3:target .page#p3 .icon,
#t4:target .page#p4 .icon,
#t5:target .page#p5 .icon {
  transform: translateX(0) !important;
  -webkit-transform: translateX(0) !important;
  -moz-transform: translateX(0) !important;
  -o-transform: translateX(0) !important;
  transition-delay: 1s;
}
</style>
<script>
  window.console = window.console || function(t) {};
</script>
<script src="{{asset('assets/js/codepen2.js')}}"></script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<body translate="no">
<div class="ct" id="t1">
<div class="ct" id="t2">
<div class="ct" id="t3">
<div class="ct" id="t4">
<div class="ct" id="t5">
<ul id="menu">
@foreach($checker as $chck)
  @if(Auth::user()->register['Created_by'] == ''  )
  <a  href="{{url('/student_register')}}"><li class="icon fa fa-bolt" id="uno"></li></a>
  <span><small>Pre-register</small></span>
    
    @else 
    <a target="_blank" href="{{url('/student_register/'.Auth::user()->id)}}"><li class="icon fa fa-keyboard-o" id="dos"></li></a>
    <span><small>Print Registration Form</small></span>
  @endif
@endforeach
<a href="{{url('/student_register')}}"></a>
<a href="{{url('/schedule_exam')}}"><li class="icon fa fa-rocket" id="tres"></li></a>
<span><small>Schedule Exam</small></span>
<a href="#t4"><li class="icon fa fa-dribbble" id="cuatro"></li></a>
<a href="#t5"><li class="icon fa fa-plus-circle" id="cinco"></li></a>
</ul>
<div class="page" id="p1">

 

<section class="icon fa fa-bolt"><span class="title">{{Auth::user()->name}}</span><span class="hint">
  @if($errors->any())
  <h2 >{{$errors->first()}}</h2>
  @endif
@if(Auth::user()->user_level==2)
  Student
@else 
  Admin
@endif 
</span></section>
</div>
<div class="page" id="p2">
<section class="icon fa fa-keyboard-o"><span class="title">Type</span></section>
</div>
<div class="page" id="p3">
<section class="icon fa fa-rocket"><span class="title">Rocket</span>
</section>
</div>
<div class="page" id="p4">
<section class="icon fa fa-dribbble">
<span class="title">Dribbble</span>
<p class="hint">
<a href="https://dribbble.com/albertohartzet" target="_blank">Im ready to play, <span class="hint line-trough">invite me </span> find me</a>
</p>
<p class="hint">Already invited by <a href="https://www.dribbble.com/mrpeters" target="_blank">Stan Peters</a></p>
</section>
</div>
<div class="page" id="p5">
<section class="icon fa fa-plus-circle">
<span class="title">More</span>
<p class="hint">
<span>You love one page & CSS only stuff? </span><br />
<a href="https://codepen.io/hrtzt/details/pgXMYb/" target="_blank">check this pen "Pure CSS One page vertical navigation"</a>
</p>
</section>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="{{asset('assets/js/codepen.js')}}"></script>
<script id="rendered-js">
/*
@author Alberto Hartzet 
*
*I wouldn't mind if you use this piece of code in your project as long 
as you give credit with a link to my site. www.albertohartzet.com
*
Licence (CC BY-NC-SA 4.0) http://creativecommons.org/licenses/by-nc-sa/4.0/
*/
//# sourceURL=pen.js
    </script>
</body>
</html>
