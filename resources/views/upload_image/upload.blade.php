<!DOCTYPE html>
<!-- saved from url=(0024)http://dropit.thal.tech/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


   <title>DropIt - Upload files, for free, and share them...</title>

   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <meta name="application-name" content=" ">
   <meta name="msapplication-TileColor" content="#FFFFFF">
   <link rel="canonical" href="http://dropit.thal.tech/index.html">
   <link rel="stylesheet" href="{{ asset('public/assets/dropit/bootstrap.min5c33.css')}}">
   <link href="{{ asset('public/assets/dropit/css')}}" rel="stylesheet" type="text/css')}}">
   <link rel="stylesheet" href="{{ asset('public/assets/dropit/font-awesome.min.css')}}">
   <link rel="stylesheet" href="{{ asset('public/assets/dropit/animate.min.css')}}">
   <link rel="stylesheet" href="{{ asset('public/assets/dropit/styles.css')}}">
   <link rel="stylesheet" href="{{ asset('public/assets/dropit/dropzone5c33.css')}}">
   <link rel="stylesheet" href="{{ asset('public/assets/dropit/tooltips.css')}}">
   <link rel="stylesheet" href="{{ asset('public/assets/dropit/purple.css')}}">
   <link rel="stylesheet" href="{{ asset('public/assets/dropit/responsive.css')}}">
   <link href="{{ asset('public/assets/dropit/jquery.growl.css')}}" rel="stylesheet" type="text/css')}}">
   <script src="{{ asset('public/assets/dropit/jquery.min5c33.js.download')}}"></script>
   <script src="{{ asset('public/assets/dropit/clipboard.min5c33.js.download')}}"></script>
   <script src="{{ asset('public/assets/dropit/tooltips5c33.js.download')}}"></script>
   <script src="{{ asset('public/assets/dropit/jquery.growl5c33.js.download')}}"></script>
   <script src="{{ asset('public/assets/dropit/dropzone5c33.js.download')}}"></script>
   <script>Dropzone.autoDiscover = false;</script>
   <script src="{{ asset('public/assets/dropit/bootstrap.min5c33.js.download')}}"></script>
   <script src="{{ asset('public/assets/dropit/main.js.download')}}"></script>
   <script src="{{ asset('public/assets/dropit/jquery.gradientify5c33.js.download')}}"></script>
</head>
<body class="home" cz-shortcut-listen="true">
   <a href="https://github.com/ThalKod/DropIt" class="github-corner" aria-label="View source on Github"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#64CEAA; color:#fff; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>
   <div class=" wrapper header solid-color">
      <div class="color-overlay">
         <div class="container">
            <div class="only-logo">
               <div class="">
                  <div class="navbar-header">
                     <a title="Upload files for free" href="http://dropit.thal.tech/">
                     <img src="{{ asset('public/assets/dropit/logo.png')}}" alt="Upload Files" width="125">
                     </a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="intro-section" style="padding: 0px;">
                     <h1 id="main-title" class="intro" style="opacity: 0; height: 0px; margin: 0px;">Just Drop It !</h1>
                     <h5 id="second-title" class="intro" style="opacity: 0; height: 0px; margin: 0px;">Secure, free. Simply Drop your files to share it...</h5>
                     <div id="uf-uploader" style="display: none;">
                        <form class="ufzone needsclick dz-clickable dz-started dz-max-files-reached" id="upload-window">
                           <div class="dz-message needsclick">
                              Drop file here or click to upload. (20MB max)<br>
                           </div>
                        <div class="dz-preview dz-file-preview dz-processing dz-success dz-complete">
  <div class="dz-image"><img data-dz-thumbnail=""></div>
  <div class="dz-details">
   <div class="dz-encrypting dz-status"><i class="fa fa-spin fa-circle-o-notch" aria-hidden="true"></i> Storing...</div> <div class="dz-done dz-status" style="display: block;"><i class="fa fa-spin fa-circle-o-notch" aria-hidden="true"></i> Storing file...</div> <div class="dz-size" style="display: none;"><span id="data-dz-done">1.13KB</span> / <span data-dz-size=""><strong>282</strong> b</span>
 </div>    <div class="dz-filename"><span data-dz-name="">desktop.ini</span></div>
  </div>
  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress="" style="width: 401.773%;"></span></div>
    <div class="dz-success-mark">
    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
      <title>Check</title>
      <defs></defs>
      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
      </g>
    </svg>
  </div>
  <div class="dz-error-mark">
    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
      <title>Error</title>
      <defs></defs>
      <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
        <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
          <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
        </g>
      </g>
    </svg>
  </div>
</div></form>
                     </div>
                     <p class="promo">As keep in mind your files will not be hosted forever </p>
                     <div id="edit" style="display: block;">
                        <h3>Done! Your file is available at:</h3>
                        <div class="upload-link-container">
                           <input onclick="copyTextToClipboard()" id="copylink" class="upload-link" type="text" value="{{route("/")}}/{{$filePath}}">
                        </div>
                        <div id="share-file" data-url="w8v2hu0cjjg">
                           <h3>Share this file directly</h3>
                           <a title="Copy URL" class="standard-button" style="cursor:pointer"  onclick="copyTextToClipboard()">
                            Copy File URL
                           </a>
                        </div>
                        <a class="btn btn-default btn-lg standard-button upload-button" href="{{route('/')}}">
                        Upload another file
                        </a>
                     </div>
                     <div class="recent-uploads"></div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <footer>
      <div class="container">
         <div class="contact-box wow animated" data-wow-offset="10" data-wow-duration="1.5s">
            <div class="btn contact-button expand-form expanded">
               <a href="{{route('/')}}"><img width="50" src="{{ asset('public/assets/dropit/logo.png')}}" alt="Drop logo" class="responsive-img"></a>
            </div>
         </div>
         <p class="copyright">
            ©2018 DropIt, All Rights Reserved.
         </p>
      </div>
   </footer>

<script>
    @if(isset($filePath))
    function fallbackCopyTextToClipboard(text) {
      var textArea = document.createElement("textarea");
      textArea.value = text;

      // Avoid scrolling to bottom
      textArea.style.top = "0";
      textArea.style.left = "0";
      textArea.style.position = "fixed";

      document.body.appendChild(textArea);
      textArea.focus();
      textArea.select();

      try {
        var successful = document.execCommand('copy');
        var msg = successful ? 'successful' : 'unsuccessful';
        console.log('Fallback: Copying text command was ' + msg);
      } catch (err) {
        console.error('Fallback: Oops, unable to copy', err);
      }

      document.body.removeChild(textArea);
    }

    function copyTextToClipboard() {
      var text = " {{route("/")}}/{{$filePath}}";
      if (!navigator.clipboard) {
        fallbackCopyTextToClipboard(text);
        return;
      }

      navigator.clipboard.writeText(text).then(function() {
        console.log('Async: Copying to clipboard was successful!');
      }, function(err) {
        console.error('Async: Could not copy text: ', err);
      });
    }
    @endif
</script>
<style>.tb_button {padding:1px;cursor:pointer;border-right: 1px solid #8b8b8b;border-left: 1px solid #FFF;border-bottom: 1px solid #fff;}.tb_button.hover {borer:2px outset #def; background-color: #f8f8f8 !important;}.ws_toolbar {z-index:100000} .ws_toolbar .ws_tb_btn {cursor:pointer;border:1px solid #555;padding:3px}   .tb_highlight{background-color:yellow} .tb_hide {visibility:hidden} .ws_toolbar img {padding:2px;margin:0px}</style><input type="file" class="dz-hidden-input" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
</body>
</html>