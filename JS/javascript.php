
<!-- JavaScript Start -->

<script>
    $(".count").counterUp({
      delay: 10,
      time: 5000,
    });


    mybutton = document.getElementById("mybtn");
    window.onscroll = function(){scrollFunction()};

    function scrollfunction(){
      if(document.body.scrollTop>20 || document.documentElement.scrollTop > 20){
        mybutton.style.display = "block";
      }
      else{
        mybutton.style.display = "none";
      }
    }

    function topfunction(){
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
  </script>

<!-- JavaScript End -->