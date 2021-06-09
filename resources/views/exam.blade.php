<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css"/>
</head>
<body>
    <div id="app">
        <spiral> </spiral>
    </div>
</body>
<script>
document.addEventListener('DOMContentLoaded',function(event){
  window.onload = function() { 
    
// array with text to type

  //text input caret
  var caret = "\u258B";
  
  // type a text
  // keep calling itself until the text is finished
  function type(text, i, fnCallback) {
    // chekc if text isn't finished yet
    if (i < (text.length)) {
      // add next character to text + caret

      // delay and call this function again for next character
      setTimeout(function() {
        type(text, i + 1, fnCallback)
      }, 70);
    }
    // text finished, call callback if there is a callback function
    else if (typeof fnCallback == 'function') {
      // call callback after timeout
      setTimeout(fnCallback, 1500);
    }
  }
  // start animation for a text in the dataText array
   function StartAnimation(i) {
     if (typeof dataText[i] == 'undefined'){
        setTimeout(function() {
          StartAnimation(0);
        }, 1000);
     }
     // check if dataText[i] exists
    if (i < dataText[i].length) {
      // text exists! start typewriter animation
      type(dataText[i], 0, function(){
      // after callback (and whole text has been animated), start next text
      StartAnimation(i + 1);
     });
    }
  }
  // start the text animation
  StartAnimation(0);
  }
});

</script>
</html>
