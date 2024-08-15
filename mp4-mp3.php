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
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        form {
            text-align: center;
        }
        button {
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
        .success {
            color: #28a745;
        }
        .error {
            color: #dc3545;
        }
    </style>
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
