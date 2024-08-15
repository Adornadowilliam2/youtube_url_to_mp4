<?php
// Check if the form has been submitted
if (isset($_POST['run_python'])) {
    // Command to be executed
    $command = 'python -c "from moviepy.editor import VideoFileClip; video = VideoFileClip(\'shiko.mp4\'); video.audio.write_audiofile(\'output_audio.mp3\')"';
    
    // Execute the command
    exec($command, $output, $return_var);
    
    // Check the result
    if ($return_var === 0) {
        $message = "Python script executed successfully.";
    } else {
        $message = "Error executing Python script.";
    }
} else {
    $message = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Run Python Script</title>
</head>
<body>
    <form action="" method="post">
        <button type="submit" name="run_python">Run Python Script</button>
    </form>
    
    <?php if ($message): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
</body>
</html>
