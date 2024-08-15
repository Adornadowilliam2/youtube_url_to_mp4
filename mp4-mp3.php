<?php
// Initialize message variable
$message = "";
$message_class = "";

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['run_python'])) {
    // Define the command to be executed
    $command = 'python -c "from moviepy.editor import VideoFileClip; video = VideoFileClip(\'shiko.mp4\'); video.audio.write_audiofile(\'output_audio.mp3\')"';
    
    // Execute the command
    $output = [];
    $return_var = 0;
    exec($command, $output, $return_var);
    
    // Check the result and set the message accordingly
    if ($return_var === 0) {
        $message = "Python script executed successfully.";
        $message_class = "success";
    } else {
        $message = "Error executing Python script. Return code: $return_var";
        $message_class = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Run Python Script</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Run Python Script</h1>
        <form action="" method="post">
            <button type="submit" name="run_python">Run Python Script</button>
        </form>
        
        <?php if ($message): ?>
            <p class="message <?php echo htmlspecialchars($message_class); ?>">
                <?php echo htmlspecialchars($message); ?>
            </p>
        <?php endif; ?>
    </div>
</body>
</html>
