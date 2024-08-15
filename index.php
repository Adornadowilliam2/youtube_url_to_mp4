<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube converter</title>
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
    /**
     * install yt-dlp
     * https://github.com/yt-dlp/yt-dlp
     * https://github.com/yt-dlp/yt-dlp/releases
     * https://github.com/yt-dlp/yt-dlp/releases/latest
     * https://github.com/yt-dlp/yt-dlp/releases/latest/download/yt-dlp
     * pip install yt-dlp
     * how to install python
     * https://www.python.org/downloads
     * https://www.python.org/downloads/release/python-310/
     * 
     * 
     * how you can upgrade your py --version into python--version
     * go to your command prompt
     * cd C:\Users\Fe Adornado\AppData\Local\Programs\Python\Python310
     * add that to your path
     * also add that to your path
     * the path is C:\Users\Fe Adornado\AppData\Local\Programs\Python\Python310/Scripts
     * then click ok to save
     */

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate and sanitize URL input
        $url = escapeshellarg($_POST['url']);

        // Define the path to the yt-dlp executable
        //path from my laptop
        // C:\\Users\\Fe Adornado\\AppData\\Local\\Programs\\Python\\Python312\\Scripts\\yt-dlp.exe
        $ytDlpPath = 'C:\\Users\\Adornado\\AppData\\Local\\Programs\\Python\\Python311\\Scripts\\yt-dlp.exe';

        // Build the command string
        $command = "\"$ytDlpPath\" -f mp4 $url";

        // Execute the command
        $output = shell_exec($command);

        // Check if output contains an indication of success
        if ($output) {
            echo "<p style='color: green; background-color: yellow;'>Success! The command executed successfully.</p>";
            echo "<pre>$output</pre>";
        } else {
            echo "<p>There was an error executing the command.</p>";
        }
    }
    ?>
</body>
</html>
