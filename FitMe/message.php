<?php
$conn = mysqli_connect("localhost", "root", "", "chatbot") or die("Database Error");

$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

if($getMesg == ""){
    echo "Please complete the word";
}
else{
    $check_data = "SELECT answer FROM chats WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

if(mysqli_num_rows($run_query) > 0){
    $fetch_data = mysqli_fetch_assoc($run_query);
    $replay = $fetch_data['answer'];
    echo $replay;
}else{
    echo "Sorry can't be able to understand you!";
}

}


?>