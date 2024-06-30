<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Generate restaurant-chain</title>
</head>
<body>
    <form action="download.php" method="post">
        <!--
        <label for="count">Number of users</label>
        <input type='number' id='count' name='count' min='1' max='100' value='10'>
        <label for='format'>Download format</label>
        -->
        <label for="employeeCount">従業員数:</label>
        <input type='number' id='employeeCount' name='employeeCount' min='1' max='1000' value='100'>
        <br>
        <label for="minSalary">最低給与:</label>
        <input type='number' id='minSalary' name='minSalary' min='0' max='1000000' value='20000'>
        <br>
        <label for="maxSalary">最高給与:</label>
        <input type='number' id='maxSalary' name='maxSalary' min='0' max='1000000' value='100000'>
        <br>
        <label for="locationCount">場所の数:</label>
        <input type='number' id='locationCount' name='locationCount' min='1' max='100' value='10'>
        <br>
        <label for="minZipCode">最小郵便番号:</label>
        <input type='number' id='minZipCode' name='minZipCode' min='0' max='999999' value='0'>
        <br>
        <label for="maxZipCode">最大郵便番号:</label>
        <input type='number' id='maxZipCode' name='maxZipCode' min='0' max='999999' value='999999'>
        <br>
        <br>
        <select id='format' name='format'>
            <option value='html'>HTML</option>
            <option value='markdown'>Markdown</option>
            <option value='txt'>Text</option>
            <option value='json'>JSON</option>
        </select>
        <button type='submit'>Generate</button>
    </form>
</body>
</html>