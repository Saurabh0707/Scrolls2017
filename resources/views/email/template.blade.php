<!DOCTYPE html>
<html>
  <head>
  
    <title>Email</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
      
      <style>
      
      
      @media (max-width:1000px) and (min-width: 800px) {
        .top-part
      {
        padding: 18% 32%;
      }
    
    }
     @media (max-width:800px) and (min-width: 400px) {
        .top-part
      {
        padding: 18% 22%;
      }
    
    }
      @media screen and (min-width: 1000px) {
        .top-part
      {
        padding: 6% 37% 2% 37%;
      }
    
    }  
     
    @media (min-width:0px) and (max-width: 400px) {
        .top-part {
    
    padding: 18% 14%;
}
.thanking {
    
    margin: 5% auto;
    
}

.footer {
    
    margin: 5% 14%;
   
}





      }
    </style>
  </head>
  <body>
    
          <div class="email">
              <div class="top-part" style=" height: 81px; margin:auto; padding: 1% 1%;">
                <div class="inner_top_part" style="width:50%;">
                 <div class="background_yellow" style=" position:absolute; width:16em; background-color: #FED766; height:5em; margin-left:1.5em;"></div>
                 <div class="word_s" style="position:absolute; font-size: 7em; font-family: 'Josefin Sans', sans-serif; margin-top: -3.35%;  margin-left:-0.5%; color: #009Fb7">S</div>
                  <div class="word_scrolls" style=" position: absolute; margin-left: 2%; margin-top: -1.2%; font-family: 'Josefin Sans', sans-serif;  font-size: 3.25em; font-weight: 700;">SCROLLS</div>
                   <div class="year" style="font-size: 2.5em; position: absolute; font-family: 'Josefin Sans', sans-serif; margin-top: 2.5%; margin-left: 4%; font-weight: 100;">2017</div>
                </div>
              </div> 
           
          
         
                <div class="content" style="margin:auto; font-family: 'Josefin Sans', sans-serif;">
                  <div class="name" style="margin: 2% auto 0% auto; font-size: 1.25em; text-align: center;">Hello {{ $name }} </div>
                  <div class="thanking" style="font-size:1.5em; color: #FED766; margin: 2% auto; text-align: center;">Thank you for Registration</div>
                  <div class="text" style="font-size:1em; text-align: center; line-height: 1.25em; padding:0 4%;">your team id is {{$team_id}}is successfully registered for scrolls 2017  Your team id is ABS. Soon you will be able to login with id 666666666 and password.</div> 
                  <div class="website_link" style="font-size:.8em; text-align: center;margin-top: 1vh;">stay tune with us <a style="color:#FED766;">akgec</a></div> 
                  <div class="footer" style="font-size: 1em; margin: 3% 25%; background-color: #FED766; text-align: center;padding: 1.5%;">Powered by Software Incubator</div>
              </div>
          </div>
       

  </body>
  </html>