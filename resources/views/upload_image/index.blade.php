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
                  <div class="intro-section">
                     <h1 id="main-title" class="intro">Just Drop It !</h1>
                     <h5 id="second-title" class="intro">Secure, free. Simply Drop your files to share it...</h5>
                     <div id="uf-uploader">
                        <form class="ufzone needsclick dz-clickable" id="upload_area">
                           <div class="dz-message needsclick">
                              Drop file here or click to upload. (20MB max)<br>
                           </div>
                        </form>
                     </div>
                     <p class="promo">As keep in mind your files will not be hosted forever </p>
                     <div id="edit">
                        <h3>Done! Your file is available at:</h3>
                        <div class="upload-link-container">
                           <input onclick="this.select();" id="copylink" class="upload-link" type="text" value="">
                           <div class="copy" id="copybutton" title="Copy URL" data-clipboard-target="#copylink">
                              <i class="fa fa-clipboard" aria-hidden="true"></i>
                           </div>
                        </div>
                        <div id="share-file">
                           <h3>Share this file directly</h3>
                           <a href="javascript:void(0);" title="Copy URL" class="standard-button copybutton copy" data-clipboard-target="#copylink">
                           <i class="fa fa-clipboard"></i> Copy File URL
                           </a>
                        </div>
                        <a class="btn btn-default btn-lg standard-button upload-button" href="http://dropit.thal.tech/">
                        <i class="fa fa-cloud-upload"></i>Upload another file
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
               <a href=""><img width="50" src="{{ asset('public/assets/dropit/logo.png')}}" alt="Drop logo" class="responsive-img"></a>
            </div>
         </div>
         <p class="copyright">
            ©2018 DropIt, All Rights Reserved.
         </p>
      </div>
   </footer>


<input type="file" class="dz-hidden-input" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
<style>
.tb_button {padding:1px;cursor:pointer;border-right: 1px solid #8b8b8b;border-left: 1px solid #FFF;border-bottom: 1px solid #fff;}.tb_button.hover {borer:2px outset #def; background-color: #f8f8f8 !important;}.ws_toolbar {z-index:100000} .ws_toolbar .ws_tb_btn {cursor:pointer;border:1px solid #555;padding:3px}   .tb_highlight{background-color:yellow} .tb_hide {visibility:hidden} .ws_toolbar img {padding:2px;margin:0px}
</style>
<center style="display:none">
    <div id="mybutton">
      <form method="post" id="form" action="{{ route('upload-image/upload') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" id="myfile" name="fileUpload" />
      </form>
      <div style="margin-top: 75px">
        Click here to upload Image
      </div>
    </div>
    @if(isset($filePath))
    <div style="margin-top:20px">
         <div>
            your link
        </div>

        <div>
            <a href="{{route("/")}}/{{$filePath}}">
                {{route("/")}}/{{$filePath}}
            </a>
            <br>
            <a onclick="copyTextToClipboard()" style="cursor : pointer ">
                copy to clipboard
            </a>
            <br>
            <div id="textCopy"></div>
        </div>
    </div>
    @endif
</center>


<script>
$(document).ready(function() {
    $('#upload_area').click(function(){
        $("#myfile").click();
    });
    $('#myfile').change(function(evt) {
        $("#form").submit();
    });
});
@if(isset($filePath))
function copyTextToClipboard() {
  var text = " {{route("/")}}/{{$filePath}}";
  if (!navigator.clipboard) {
    fallbackCopyTextToClipboard(text);
    return;
  }

  navigator.clipboard.writeText(text).then(function() {
    console.log('Async: Copying to clipboard was successful!');
    $("#textCopy").html("copied to clipboard");
  }, function(err) {
    console.error('Async: Could not copy text: ', err);
  });
}
@endif
</script>
<style>
div#mybutton {

  /* IMPORTANT STUFF */
  overflow: hidden;
  position: relative;
  cursor:   pointer;

  /* SOME CUSTOM STYLING */
  width:  300px;
  height:  200px;
  padding: 10px;
  text-align: center;
  border: 1px solid green;
  font-weight: bold
  background: red;
  background-color:rgb(255,255,255,0.5);
}

div#mybutton:hover {
  background: green;
}


input#myfile {
  height: 200px;
  cursor: pointer;
  position: absolute;
  top: 0px;
  right: 0px;
  font-size: 100px;
  z-index: 2;

  opacity: 0.0; /* Standard: FF gt 1.5, Opera, Safari */
  filter: alpha(opacity=0); /* IE lt 8 */
  -ms-filter: "alpha(opacity=0)"; /* IE 8 */
  -khtml-opacity: 0.0; /* Safari 1.x */
  -moz-opacity: 0.0; /* FF lt 1.5, Netscape */
}
</style>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>