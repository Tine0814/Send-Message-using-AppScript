<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send To Gmail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid d-flex justify-content-center ">
        <form action="index.php" method="POST" class="form-control mt-5">
            <!-- Name input -->
            <div class="form-outline mb-4 mt-5">
                <input type="text" id="form4Example1" class="form-control" name="subject" />
                <label class="form-label" for="form4Example1">Name</label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="form4Example2" class="form-control" name="email" />
                <label class="form-label" for="form4Example2">Email address</label>
            </div>

            <!-- Message input -->
            <div class="form-outline mb-4">
                <textarea class="form-control" id="form4Example3" rows="4" name="body"></textarea>
                <label class="form-label" for="form4Example3">Message</label>
            </div>


            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" name="send">Send</button>
        </form>














        <?php
        
        if(isset($_POST['send'])){
    
            $url = "https://script.google.com/macros/s/AKfycbycGHL1YKrz8O5h2MuwRlkb3MYrjndCivYbhFm0sNUuX0xBghbqRZhFJMMcnyqkCn2u/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $_POST['email'],
                  "subject"   => $_POST['subject'],
                  "body"      => $_POST['body']
               ])
            ]);
            $result = curl_exec($ch);
            // echo $result;
    
    
         }
        
        ?>
    </div>
</body>

</html>