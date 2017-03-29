
<html>
<head>

    <style>
        body {
            font-size: 16pt;
        }
        h1 {
            font-size: 5pt;
        }

    </style>


</head>
<body>

<table align="center" border="0" width="100%">

    <tr>
        <td style="width: 60%"></td>

        <td rowspan="2" align="center">บัญชีบุคคล</td>
        <td><input type="radio" name="normal_radio" value=1> ทั่วไป</td>
    </tr>
    <tr>
        <td></td>

        <td > <input type="radio" name="normal_radio" value=2> เกี่ยวข้องกับอาชญากรรม</td>
    </tr>
    <tr>
        <td>ประเภท : <label><?php echo $datacase->name_case ?> </label></td>
        <td colspan="2">สถานีตำรวจ : <?php echo $datacase->station_number_case ?></td>

    </tr>



</table>
<br>

<table align="center" border="1" width="100%">

        <thead>
        <tr>


            <th style="width: 5%">ลำดับ</th>
            <th style="width: 20%">ชื่อ-สกุล</th>
            <th style="width: 5%">อายุ</th>
            <th style="width: 20%">ที่อยู่ปัจจุบัน</th>
            <th style="width: 12%">อาชีพ</th>
            <th style="width: 13%">สถานที่ทำงาน</th>
            <th style="width: 25%">พฤติการณ์อื่นๆ</th>




        </tr>

        </thead>

        <tbody style="">
        <ol>
            <?php foreach($datacase->criminalhistory as $person) : ?>
            <tr>

                <td><li></li></td>
                <td><?php echo $person->nametitle ?><?php echo $person->name ?> <?php echo $person->surname ?></td>
                <td><?php echo $person->age ?></td>
                <td><?php echo $person->addresspresent->present_address ?></td>
                <td><?php echo $person->career ?></td>

                <td>
                    <ol>
                    <?php foreach($person->addressoffice as $addressoffice) : ?>
                         <li><?php echo $addressoffice->office ?></li>
                    <?php endforeach; ?>
                    </ol>
                </td>



                <td><?php echo $person->other ?></td>

            </tr>
            <?php endforeach; ?>
        </ol>
        </tbody>


</table>

</body>

</html>



