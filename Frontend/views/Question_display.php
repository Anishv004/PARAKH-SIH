<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Display</title>
</head>

<body>
    <div>
        <form action="router.php" method="post">
            <p><?php echo $question; ?></p>
            <?php
            foreach ($options as $option) {
                echo '<label>';
                echo '<input type="radio" name="answer" value="' . $option . '"> ' . $option;
                echo '</label><br>';
            }
            ?>
            <input type="hidden" name="qn_num" value="<?php echo $qn_num; ?>">
            <input type="hidden" name="qn_id" value="<?php echo $qn_id; ?>">
            <button type="submit">Next Question</button>
        </form>
    </div>
</body>

</html>