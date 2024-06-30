<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Generate Users</title>
</head>
<body>
    <form action="download.php" method="post">
        <label for="count">Number of users</label>
        <input type='number' id='count' name='count' min='1' max='100' value='10'>
        <label for='format'>Download format</label>
        <select id=;format' name='format'>
            <option value='html'>HTML</option>
            <option value='markdown'>Markdown</option>
            <option value='txt'>Text</option>
            <option value='json'>JSON</option>
        </select>
        <button type='submit'>Generate</button>
    </form>
</body>
</html>