<!DOCTYPE html>
<html>
<head>
    <title>File Uploader</title>
</head>
<body>
    <h1>File Uploader</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>
