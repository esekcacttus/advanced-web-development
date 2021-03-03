<html>
    <head>
        <title>Studenti View</title>

    </head>
    <body>
        <table>
            <tr>
                <th>ID:</th>
                <td>{{$studenti->getId()}}</td>
            </tr>
            <tr>
                <th>Full Name:</th>
                <td>{{$studenti->getFullName()}}</td>
            </tr>
            <tr>
                <th>Birthdate:</th>
                <td>{{$studenti->getBirthdate()}}</td>
            </tr>
            <tr>
                <th>Gender:</th>
                <td>{{$studenti->getGender()}}</td>
            </tr>
        </table>
    </body>
</html>
