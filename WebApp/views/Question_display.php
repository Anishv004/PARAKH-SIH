<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Display</title>
</head>

<body>
    <div>
        <?php if(isset($userData) && !empty($userData)){
            print_r($userData);
            }else{
                echo '';
            } ?>
        <form action="router.php" method="post">
            <p><?php echo $question; ?></p>
            <?php
            $cnt=1;

            foreach ($options as $option) {

                echo '<label>';
                echo '<input type="radio" name="answer" value="' . $cnt . '"> ' . $option;
                echo '</label><br>';
                $cnt++;
            }
            ?>
            <input type="hidden" name="qn_num" value="<?php echo $qn_num; ?>">
            <input type="hidden" name="qn_id" value="<?php echo $qn_id; ?>">

            <!-- Add a hidden input field to capture the time when the page is loaded -->
            <input type="hidden" id="page_load_time" name="page_load_time" value="<?php echo time(); ?>">

            <button type="submit">Next Question</button>
        </form>
    </div>

    <script>
        document.getElementById("page_load_time").value = Math.floor((new Date()).getTime() / 1000);
    </script>
</body>

</html>