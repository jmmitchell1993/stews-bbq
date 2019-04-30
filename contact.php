<?php
    //Self Post Email to Stew

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $optional = ["PHONE", "EMAIL"];
        $errors = array();
        $data = $_POST;

        foreach($data as $key => $val) {
            if(!in_array(strtoupper($key), $optional) and empty($val)) {
                $errors[$key] = $key;
            }
        }

        if(count($errors) === 0 and empty($errors)) {
            //mail here
            //replace test@gmail.com with stews email
            $to = "test@gmail.com";
            $subject = $data['subject'];
            $from = (isset($data['email']) ? $data['email'] : 'test@gmail.com');

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$from."\r\n" .
                'X-Mailer: PHP/' . phpversion();
            
            $message = '<html><body>';
            $message .= '<h1>Hello Stew</h1>';
            $message .= '<h3>This message is from: '.$data['name'].' contact you at http://www.stews-smokeshack.com/</h3>';
            $message .= '<p>'.$data['message'].'</p>';
            $message .= '<strong>Get back to me here:</strong';
            $message .= (isset($data['phone']) ? '<li>'.$data['phone'].'</li>' : '');
            $message .= (isset($data['email']) ? '<li>'.$data['email'].'</li>' : '');
            $message .= '</body></html>';

            if(mail($to, $subject, $message, $headers)){
                //clear array and set success to true for message
                $name = $data['name'];

                $data = array();
                $success = true;
            } else{
                echo 'Unable to send email. Please try again.';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us - Stews Smoke Shack Des Moines, IA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/stews.css">
	<link href="css/contact.css" rel="stylesheet"/>
</head>
<body>
        <?php require 'base/public/navigation.php'; ?>
        <div class="wrap">
            <div class="row">
                <div class="col_6_12 d-center">
                    <form id="contact__form" method="POST">
                        <h1>Contact us!</h1>
                        2511 Cottage Grove Des Moines, Iowa 50311<br/>
                        (515) 277-0005<br/>
                        Monday - Saturday (11:00 AM - 8:00 PM)<br/>
                        <br/>
                        
                        <?php if(isset($errors) and count($errors) > 0) { ?>
                            <div class="errors">
                                <span style="color:red;">Please fill out the following fields: </span>
                            </div>
                         <?php } ?>
                        <label for="name"><span class="required">&#42;</span> Name: </label>
                            <input type="text" class="name <?php echo (isset($errors['name']) ? 'error' : ''); ?>" id="name" name="name" value="<?php echo (isset($data['name']) ? $data['name'] : ''); ?>"/>
                        <label for="subject"><span class="required">&#42;</span> Subject: </label>
                            <input type="text" class="subject <?php echo (isset($errors['subject']) ? 'error' : ''); ?>" id="subject" name="subject" value="<?php echo (isset($data['subject']) ? $data['subject'] : ''); ?>"/>
                        <label for="phone">Phone: </label>
                            <input type="phone" placeholder="(xxx) xxx-xxxx" class="phone <?php echo (isset($errors['phone']) ? 'error' : ''); ?>" id="phone" name="phone" optional value="<?php echo (isset($data['phone']) ? $data['phone'] : ''); ?>"/>
                        <label for="email">Email Address: </label>
                            <input type="email" class="email <?php echo (isset($errors['email']) ? 'error' : ''); ?>" id="email" name="email" optional value="<?php echo (isset($data['email']) ? $data['email'] : ''); ?>"/>
                        <label for="message"><span class="required">&#42;</span> Message: </label>
                            <textarea class="<?php echo (isset($errors['message']) ? 'error' : ''); ?>" rows="10" name="message"><?php echo (isset($data['message']) ? $data['message'] : ''); ?></textarea>
                        <div class="submit">
                            <input class="btn" type="submit" value="Send Message"/>
                        </div>
                        <?php 
                            if(isset($success) and $success) {
                        ?>
                        <div class="success">
                            <span style="color: green; padding-top: 0.5em;">&nbsp;Thank you, <?=$name?>. We usually respond within 24 hours.</span>
                        </div>
                        <?php } ?>
                    </form>
                </div>
                <div class="col_6_12 d-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2983.6951278541446!2d-93.65364098456766!3d41.59747777924539!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87ee993a1048ea7f%3A0xee7716f3b838e52a!2s2511+Cottage+Grove+Ave%2C+Des+Moines%2C+IA+50311!5e0!3m2!1sen!2sus!4v1556595905087!5m2!1sen!2sus" width="75%" height="75%" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <?php require 'base/public/footer.php'; ?>

    <script type="text/javascript">

    //autofocus errors
    var input_error = document.querySelector("input.error");
    
    if(input_error != null) {
        input_error.focus();
    } else {
        var textarea_error = document.querySelector("textarea.error");

        if(textarea_error != null) {
            textarea_error.focus();
        } else {
            var input_name = document.querySelector("input.name");

            input_name.focus();
        }
    }

    //make textareas submit on enter
        var eles = document.getElementsByTagName("textarea");
        for(let ele of eles) {
            ele.onkeypress = function(e) {
                if(e.keyCode == 13) {
                    document.getElementById("contact__form").submit();
                }
            }
        }
    
    //make window submit on enter
        window.onkeypress = function(e) {
            if(e.keyCode == 13) {
                document.getElementById("contact__form").submit();
            }
        }
    </script>
    </body>
</html>