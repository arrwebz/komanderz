<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>

        <style type="text/css">
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table{
                font-size: x-small;
            }
            tfoot tr td{
                font-weight: bold;
                font-size: x-small;
            }

            .gray {
                background-color: lightgray
            }
        </style>
    </head>
    <body>
        <table border="1" width="100%" style="border-collapse: collapse;">
            <tr>
                <td rowspan="5" style="text-align: center">
                    <img src="public/assets/dist/img/logo-komet.png" width="90px"/>
                </td>
                <td colspan="4" style="background-color: #C00000; color: #ffffff; padding: 10px 0; text-align: center">
                    <strong>MINUTES OF MEETING</strong>
                </td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center">
                    <strong><?php echo $mtitle ?></strong>
                </td>
            </tr>
            <tr>
                <td>DATE</td>
                <td><?php echo $mdate ?></td>
                <td>TIME</td>
                <td><?php echo $mtime ?></td>
            </tr>
            <tr>
                <td>Location</td>
                <td colspan="3"><?php echo $location ?></td>
            </tr>
            <tr>
                <td>Customer</td>
                <td colspan="3"><?php echo $customer ?></td>
            </tr>
        </table>

        <table border="1" width="100%" style="border-collapse: collapse; margin-top:20px;">
            <tr>
                <td style="width:210px;">Meeting Called by</td>
                <td><?php echo $inst ?></td>
            </tr>
            <tr>
                <td>Meeting</td>
                <td><?php echo $tom ?></td>
            </tr>
            <tr>
                <td>Facilitator</td>
                <td><?php echo $faci ?></td>
            </tr>
            <tr>
                <td  style="height:100px; vertical-align: text-top">Attendees</td>
                <td style="height:100px; vertical-align: text-top"><?php echo $attd ?></td>
            </tr>
        </table>

        <table border="1" width="100%" style="border-collapse: collapse; margin-top:20px;">
            <tr>
                <td style="background-color: #C00000; color: #ffffff; text-align: center; padding: 10px 0;">
                    <strong>AGENDA</strong>
                </td>
            </tr>
            <tr>
                <td style="height: 200px; vertical-align: text-top;"><?php echo $agenda;?></td>
            </tr>
            <tr>
                <td style="background-color: #C00000; color: #ffffff; text-align: center; padding: 10px 0;">
                    <strong>DISCUSSION & AGREEMENT RESULT</strong>
                </td>
            </tr>
            <tr>
                <td style="height: 200px; vertical-align: text-top;"><?php echo $daresult;?></td>
            </tr>
        </table>
    </body>
</html>