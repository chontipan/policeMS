<html>
<head>
<style>
    body {
        font-size: 21pt;
    }
    h5{
        font-family: garuda;
    }


</style>
</head>
<body>

<table align="center" border="0" width="100%">

    <tr>
        <td colspan="4" align="center"><h3>บุคคลที่เกี่ยวข้องกับอาชญากรรม</h3></td>

    </tr>

    <tr>
        <td colspan="4" align="center" style="font-family : sans-serif, Arial;">

            <?php if($criminalhistory->photo != null) :  ?>
                <img src="<?php echo $criminalhistory->photo;?>" width="514" height="514">
            <?php else : ?>
                <img src="/img/square-image.png" width="514" height="514">
            <?php endif ?>

            </td>

    </tr>
    @if($criminalhistory->typeidcard == 0)
        <tr>
            @if($criminalhistory->idcard)
                <td colspan="4">หมายเลขบัตรประชาชน :<span><?php echo $criminalhistory->idcard ?> </span></td>
            @else
                <td colspan="4">หมายเลขบัตรประชาชน : <label> - </label></td>
            @endif

        </tr>
    @elseif($criminalhistory->typeidcard == 1)
        <tr>
            @if($criminalhistory->idcard)
                <td colspan="4">หมายเลขหนังสือเดินทาง :
                    <label><?php echo $criminalhistory->idcard ?> </label></td>
            @else
                <td colspan="4">หมายเลขหนังสือเดินทาง : <label> - </label></td>
            @endif

        </tr>
    @else
        <tr>
            @if($criminalhistory->idcard)
                <td colspan="4">ไม่ระบุประเภทบัตร :
                    <label><?php echo $criminalhistory->idcard ?> </label></td>
            @else
                <td colspan="4">ไม่ระบุประเภทบัตร : <label> - </label></td>
            @endif

        </tr>
    @endif
    <tr>
        <td colspan="4"> <label>ชื่อ-ชื่อสกุล : <?php echo $criminalhistory->nametitle->name_title ?> <?php echo $criminalhistory->name ?> <?php echo $criminalhistory->surname ?></label></td>

    </tr>
    <tr>
        <td colspan="4"> <label>อายุ : <?php echo $criminalhistory->age ?> </label> ปี</td>

    </tr>
    <tr>
        <td colspan="4"> <label>ที่อยู่ : <?php echo $criminalhistory->addresspresent->present_address ?> </label></td>

    </tr>
    <tr>

        <?php foreach($criminalhistory->datacase as $datacase) : ?>

            <td colspan="4"> <label>คดี/ข้อหา : <?php echo $datacase->name_case ?> </label></td>


        <?php endforeach; ?>

    </tr>
    <tr>

        <?php foreach($criminalhistory->datacase as $datacase) : ?>



        @if($datacase->data_case)
            <td colspan="4"> <label>วันที่เกิดเหตุ : <?php echo $datacase->data_case ?> </label></td>
        @else
            <td colspan="4"> <label>วันที่เกิดเหตุ : - </label></td>
        @endif
        <?php endforeach; ?>

    </tr>


</table>


</body>

</html>



