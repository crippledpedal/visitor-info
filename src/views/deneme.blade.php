<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DebugHost Laravel Client</title>
</head>
<body>
<h1 class="text-center">Post an error to DebugHost API</h1>
<form action="javascript:void(0)" method="post">
    @csrf
    <p>Api Key (*) <input type="text" name="api-key" style="width: 200px"></p>
    <p>Api Secret (*) <input type="text" name="api-secret" style="width: 200px"></p>
    <h3>Error Information</h3>
    <p>Message (*) <textarea name="message" cols="48" rows="5"></textarea></p>
    <p>Detail <textarea name="detail" cols="50" rows="5"></textarea></p>
    <p>From <textarea name="from" cols="50" rows="5"></textarea></p>
    <p>Class <textarea name="class" cols="50" rows="5"></textarea></p>
    <p>Status Code (*) <input type="number" name="status-code"></p>
    <input type="submit" value="Submit">
</form>
</body>
</html>
