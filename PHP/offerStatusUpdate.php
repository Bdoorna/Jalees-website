<?php
   

    $select = "SELECT * FROM jobRequests WHERE createdAt < (NOW() - INTERVAL 1 HOUR) AND babysitterID IS NULL";
    $q = mysqli_query($connection, $select);
    if(mysqli_num_rows($q) > 0){
        while($req = mysqli_fetch_array($q)){
            $offer = "UPDATE Offers SET offerStatus='Expired' WHERE requestID = ".$req['ID']."";
            mysqli_query($connection, $offer);
        }
    }

    $query = "UPDATE jobRequests SET reqStatus =  'Expired' WHERE createdAt < (NOW() - INTERVAL 1 HOUR) AND babysitterID IS NULL";
    $result = mysqli_query($connection, $query);
?>