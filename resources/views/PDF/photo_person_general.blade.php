<html>
<head>
<style>
    body {
        font-size: 25pt;
    }
    h5{
        font-family: garuda;
    }


</style>
</head>
<body>

<table align="center" border="0" width="100%">

    <tr>
        <td colspan="4" align="center"><h3>บุคคลทั่วไป</h3></td>

    </tr>

    <tr>
        <td colspan="4" align="center" style="font-family : sans-serif, Arial;">

            <?php if($guesthistory->photo != null) :  ?>
                <img src="<?php echo $guesthistory->photo;?>" width="514" height="514">
            <?php else : ?>
                <img src="/img/square-image.png" width="514" height="514">
            <?php endif ?>

            </td>

    </tr>

    @if($guesthistory->typeidcard == 0)
        <tr>
            @if($guesthistory->idcard)
                <td colspan="4">หมายเลขบัตรประชาชน :
                    <?php echo $guesthistory->idcard ?> </td>
            @else
                <td colspan="4">หมายเลขบัตรประชาชน : <label> - </label></td>
            @endif

        </tr>
    @elseif($guesthistory->typeidcard == 1)
        <tr>
            @if($guesthistory->idcard)
                <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;หมายเลขหนังสือเดินทาง :
                    <label><?php echo $guesthistory->idcard ?> </label></td>
            @else
                <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;หมายเลขหนังสือเดินทาง : <label> - </label></td>
            @endif

        </tr>
    @else
        <tr>
            @if($guesthistory->idcard)
                <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;ไม่ระบุประเภทบัตร :
                    <label><?php echo $guesthistory->idcard ?> </label></td>
            @else
                <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;ไม่ระบุประเภทบัตร : <label> - </label></td>
            @endif

        </tr>
    @endif
    <tr>
        <td colspan="4"> <label>ชื่อ-ชื่อสกุล : <?php echo $guesthistory->nametitle;echo $guesthistory->name ?> <?php echo $guesthistory->surname ?></label></td>

    </tr>
    <tr>
        <td colspan="4"> <label>อายุ : <?php echo $guesthistory->age ?> </label> ปี</td>

    </tr>
    <tr>
        <td colspan="4"> <label>ที่อยู่ : <?php echo $guesthistory->addresspresent->present_address ?> </label></td>

    </tr>


</table>


</body>

</html>



