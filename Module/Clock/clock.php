<?php
$clock='<script language="javascript">

            var h = 0;
            var m = '.$min.'; // Phút
            var s = 0;
            
            var timeout = null; // Timeout
            
            
            
            function stop(){
                clearTimeout(timeout);
            }
          function start()
{

 

    if (s === -1){
        m -= 1;
        s = 59;
    }
 
    
    if (m === -1){
        h -= 1;
        m = 59;
    }
 
    
    if (h == -1){
        submit();
    }
 
  
    document.getElementById("h").innerText = h.toString();
    document.getElementById("h").innerText = m.toString();
    document.getElementById("s").innerText = s.toString();
 
  
    timeout = setTimeout(function(){
        s--;
        start();
    }, 1000);
}
        </script>
    </head>
    <body>
        
           
    
 
        
        <div>
            <span id="h"></span>
            <span id="m"></span>:
            <span id="s"></span>
        </div>';

?>