<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>  
    <a id="https://track.clickbooth.com/c/aff?lid=606415&&subid1=xxagentidxx&subid2=jjhitjj" class="btn btn-primary btn-lg">click me to change parameters</a>  
   <!--  ...............     BUTTON'S URL PARAMETERS VALUE CHANGE USING JQUERY            .................. -->  

    <!-- Optional JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(){
        $('.btn-lg').on('click',function(){
            var url = $(this).attr('id');
            alert(url);return false;
            function randomString(length) {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for (var i = 0; i < length; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

            return text;
        }
            function getRandom(length) {

            return Math.floor(Math.pow(10, length-1) + Math.random()  9  Math.pow(10, length-1));

}
            if (history.pushState) {
	        var randomNumber = getRandom(6);
	        var randomString = randomString(32);
            var newurl = window.location.protocol + "//" + window.location.host + '/test.php?abc='+randomNumber+'&xyz=' + randomString;
            alert(newurl);
            url = newurl;
            window.location.replace(url);
            //window.history.pushState({path:url},'',url);
        }
    });
});
  
  </script>
  </body>
</html>