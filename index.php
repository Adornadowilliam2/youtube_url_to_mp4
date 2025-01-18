<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Converter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>YouTube to MP4 Converter</h1>
        <form action="index.php" method="post">
            <label for="url">YouTube URL:</label>
            <input
                type="text"
                name="url"
                id="url"
                placeholder="Enter YouTube URL here"
                required
            />
            <button type="submit">Convert</button>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize URL input
        $url = filter_var($_POST['url'], FILTER_SANITIZE_URL);
        
        // Validate URL format
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            echo "<p style='color: red;'>Invalid URL. Please enter a valid YouTube URL.</p>";
        } else {
            // Define the path to the yt-dlp executable
            $ytDlpPath = 'C:\\Users\\Adornado\\AppData\\Local\\Programs\\Python\\Python312\\Scripts\\yt-dlp.exe';

            // Build the command string
            $command = "\"$ytDlpPath\" -f mp4 $url";

            // Execute the command and capture the output
            $output = shell_exec($command);

            // Check if output contains an indication of success
            if ($output) {
                echo "<p style='color: green; background-color: yellow;'>Success! The video is being downloaded.</p>";
                echo "<pre>$output</pre>";
            } else {
                echo "<p style='color: red;'>There was an error executing the command. Please check the URL or try again later.</p>";
            }
        }
    }
    ?>
</body>
</html>
