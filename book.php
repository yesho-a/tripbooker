
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<script>


$(function() {              
           // Bootstrap DateTimePicker v4
           //$('#datepicker1').empty();
          //$('#datepicker2').empty();
           $('#datepicker1').datetimepicker({
                 format: 'DD/MM/YYYY',
                 showTodayButton: true,
                 showClear: true,
        showClose: true,
        //autoclose: true,
        minDate: new Date(),
        toolbarPlacement:'bottom'


             
           });
        }); 

        $(function() {              
           // Bootstrap DateTimePicker v4
           $('#datepicker2').datetimepicker({
                 format: 'DD/MM/YYYY',
                 showTodayButton: true,
                 showClear: true,
        showClose: true,
        //autoclose: true,
        minDate: new Date(),
        toolbarPlacement:'bottom'


           });
        }); 

        $(function () {
        $('#datepicker2').datetimepicker();
        $('#datetimepicker1').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datepicker2").on("dp.change", function (e) {
            $('#datepicker1').data("DateTimePicker").minDate(e.date);
        });
        $("#datepicker2").on("dp.change", function (e) {
            $('#datepicker1').data("DateTimePicker").minDate(e.date);
        });
       
    });


     
</script>
    <style>
            .error{
                    color:red;
            }

            table {
border-collapse: collapse;
}

table, th, td {
border: 1px solid red;
padding:10px;
}

#thanks{
  color:yellow;
}



</style>
</head>
<body>


<?php
      if(isset($_POST['submit'])){
        $name = htmlspecialchars(stripslashes(trim($_POST['name'])));
        $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
        $nationality = htmlspecialchars(stripslashes(trim($_POST['nationality'])));
        $number = htmlspecialchars(stripslashes(trim($_POST['number'])));
        $days = htmlspecialchars(stripslashes(trim($_POST['days'])));
        $comment = htmlspecialchars(stripslashes(trim($_POST['comment'])));
        //Arrival Date//
        $adate = $_POST['adate'];
        //Departure Date//
        $number =$_POST['number'];
       

              if(isset($_POST['accomodation']))
              {
                     $state = $_POST['accomodation'];
                   }
     
                   else {
                     $state_error= "Enter valid accomodation";
                   }

                   if(isset($_POST['radio']))
                   {
                  $radio=$_POST['radio'];  //  Displaying Selected Value
                   };

        
           
 
        if(!preg_match("/^[A-Za-z .'-]+$/", $name)){
          $name_error = 'Invalid name';
        }
       
        if (empty($_POST['color']))
        {
                $color_error = "Please select a color";
        }
       
        if(!preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/", $email)){
          $email_error = 'Invalid email';
        }
        if(!preg_match("/^[A-Za-z .'-]+$/", $nationality)){
                $nationality_error = 'Please Enter Correct country';
              }
        if (!preg_match('/^[0-9]*$/', $number)) {
                $number_error = 'Please Enter Correct Number';
            }
           
        if(strlen($comment) === 0){
          $comment_error = 'Your message should not be empty';
        }
      }

     
    ?>



<div class="container">
  <div class="row">
    <div class="col-md-7" >

<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" style="margin-right:1rem;text-align:center;border:1px solid black;padding:2rem;background-color:rgb(40,167,69)">
<fieldset ><legend><span style="font-size: 30px;">&nbsp;Reservation Form&nbsp;</span>
<h4 id="h4"style="font-family: 'Lucida Console', Courier, monospace;
"><?php

if(isset($_GET['content_id'])){

$content=$_GET['content_id'];
if($content=='simon'){
    echo "3-Days Sipi Falls";
}
elseif($content=='simon2'){
    echo "4-Days Primates Trekking";

}

else{
    echo "6-Days QENP";

}}
?> </h5></legend>

    <div class="form-row" style="text-align:center">
        <div class="form-group col-md-6">
      
         <label> Name</label>
           <input type="text" name="name" value="<?php echo isset($_POST["name"])?$_POST["name"]:""; ?>"
         class="form-control" placeholder="Name" >
            <p class="error"><?php if(isset($name_error)) echo $name_error; ?></p>
        </div>

        <div class="form-group col-md-6">
         <label> Email </label>
          <input type="email" name="email" value="<?php echo isset($_POST["email"])?$_POST["email"]:""; ?>"
          class="form-control" id="inputEmail4" placeholder="Email">
          <p class="error"><?php if(isset($email_error)) echo $email_error; ?></p>

        </div>
    </div>
     
     <div class="form-row" style="text-align:center;margin-bottom:2rem;">
     <div class="form-group col-md-6">
      <label for="inputState">Country of Origin</label>
      <input type="text" name="nationality" value="<?php echo isset($_POST["nationality"])?$_POST["nationality"]:""; ?>" class="form-control" placeholder="Country of Origin">
    </div>

    <div class="form-group col-md-6"> 
                  <label for="inputState">Number Of People</label>
                   <input class="form-control" name="number" type="number" value="<?php echo isset($_POST["number"])?$_POST["number"]:""; ?>" min="1" id="example-number-input" placeholder="number of people">
                   <p class="error"><?php if(isset($number_error )) echo $number_error ; ?></p>

                </div>
                
            </div>

            <div class="form-row" style="text-align:center">

            <div class="form-group col-md-6" >
          <label>Arrival Date</label>
        <div class='input-group date' id='datepicker2'>
          <input type='text' class="form-control"  name="adate" value="<?php echo isset($_POST["adate"])?$_POST["adate"]:""; ?>"
placeholder='Select Date'/>
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
        </div>   
        </div>
        
        <div class="form-group col-md-6">
          <label>Departure Date</label>
        <div class='input-group date' id='datepicker1'>
          <input type='text' class="form-control" name="days" value="<?php echo isset($_POST["days"])?$_POST["days"]:""; ?>" placeholder='Select Date' />
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
          </span>
        </div>
    </div>
      
            
            <div class="form-row" style="text-align:center;margin-top:5rem;">
                <div class="form-group col-md-6" style="text-align:center;margin-top:1rem;" >
               <label> Accomodation Class</label><br>
                <input type="radio" name="radio" value="luxury" <?php if (isset($radio) && $radio=="luxury") echo "checked";?>>Luxury
                 <input type="radio" name="radio" value="Mid-range" <?php if (isset($radio) && $radio=="Mid-range") echo "checked";?>>Mid-range
                 <input type="radio" name="radio" value="budget" <?php if (isset($radio) && $radio=="budget") echo "checked";?>>Budget<br>

                </div>
    </div>
   
    

                <div class="form-group">
                     <textarea type="textarea" class="form-control"  name="comment" rows="5"  placeholder="Comment/special requests/activities..."><?php echo isset($_POST["comment"])? $_POST["comment"]:"";?></textarea>

                     <p class="error"><?php if(isset($comment_error )) echo $comment_error ; ?></p>

                    </div><br>
                      <button type="submit" name="submit"  class="btn btn-danger" style="width:20%;">Submit</button>
                      <br>
                      <?php    if(isset($_POST['submit']) && !isset($name_error) && !isset($email_error)  && !isset($message_error)){

echo "<p id='thanks'>Thank you for sending us a booking inquiry. We shall contact you shortly</p>";
                      }


?>
  </fieldset>       
 </form>

    </div>
 <div>
 <?php
  
   if(isset($_POST['submit']) && !isset($name_error) && !isset($email_error)  && !isset($comment_error)){
           echo "<h3>Summary of Booking Details<br>";
           echo "<table border='0'>";
           echo "<tr>";
           echo "<td>Name</td>";
           echo "<td>$name</td>";
           echo "</tr>";
           echo "<tr>";
           echo "<td>Email</td>";
           echo "<td>$email</td>";
           echo "<tr>";
           echo "<tr>";
           echo "<td>Country of Origin</td>";
           echo "<td>$nationality</td>";
           echo "<tr>";
           echo "<tr>";
           echo "<td>Arrival date</td>";
           echo "<td>$adate</td>";
           echo "<tr>";
           echo "<tr>";
           echo "<td>Departure Date</td>";
           echo "<td>$days</td>";
           echo "<tr>";
           echo "<tr>";
           echo "<td>Number of Guests</td>";
           echo "<td>$number</td>";
           echo "<tr>";
           echo "<tr>";
           echo "<td>Accomodation Class</td>";
           echo "<td>$radio</td>";
           echo "<tr>";
           echo "<tr>";
           echo "<td>comment</td>";
           echo "<td>$comment</td>";
           echo "<tr>";
           echo "<tr>";
      
           echo "<table>";

       }

       ?>


   
  
   

    </div>
      </div>
      </div>
             