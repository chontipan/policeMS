<html>
<head>
    <style>
        body {
            font-size: 16pt;
        }

        h5 {
            font-family: garuda;
        }


    </style>
</head>
<body>

<table align="center" border="0" width="100%">
    <ol>
        <tr>
            <td colspan="4" align="center"><h3>แบบประวัติบุคคลที่เกี่ยวข้องกับอาชญากรรม</h3></td>

        </tr>

        <tr>
            @if($dataperson->typepeople)
                <td colspan="4">ประเภทบุคคล : <label><?php echo $dataperson->typepeople ?> </label></td>
            @else
                <td colspan="4">ประเภทบุคคล : <label> - </label></td>
            @endif


            <td rowspan="5" align="center" style="font-family : sans-serif, Arial;">
                <?php if($dataperson->photo != null) :  ?>
                <img src="<?php echo $dataperson->photo;?>" width="128" height="128">
                <?php else : ?>
                <img src="/img/square-image.png" width="128" height="128">
                <?php endif ?>

            </td>

        </tr>
        <tr>
            @if($dataperson->name)
                <td colspan="4">
                    <li>ชื่อ-ชื่อสกุล :
                        <label> <?php echo $dataperson->nametitle ?> <?php echo $dataperson->name ?> <?php echo $dataperson->surname ?></label>
                </td>
            @else
                <td colspan="4">
                    <li>ชื่อ-ชื่อสกุล : <label> - </label>
                </td>
            @endif
        </tr>
        <tr>
            @if($dataperson->alias)
                <td colspan="4">
                    <li>อายุ : <label><?php echo $dataperson->age ?></label> ปี
                </td>
            @else
                <td colspan="4">
                    <li>อายุ : <label> - </label>  ปี
                </td>
            @endif


        </tr>
        <tr>
            @if($dataperson->alias)
                <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;นามเเฝง : <label><?php echo $dataperson->alias ?></label></td>
            @else
                <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;นามเเฝง : <label> - </label></td>
            @endif

        </tr>


        @if($dataperson->typeidcard == 0)
            <tr>
                @if($dataperson->idcard)
                    <td colspan="4">หมายเลขบัตรประชาชน :
                        <label><?php echo $dataperson->idcard ?> </label></td>
                @else
                    <td colspan="4">หมายเลขบัตรประชาชน : <label> - </label></td>
                @endif

            </tr>
        @elseif($dataperson->typeidcard == 1)
            <tr>
                @if($dataperson->idcard)
                    <td colspan="4">หมายเลขหนังสือเดินทาง :
                        <label><?php echo $dataperson->idcard ?> </label></td>
                @else
                    <td colspan="4">หมายเลขหนังสือเดินทาง : <label> - </label></td>
                @endif

            </tr>
        @else
            <tr>
                @if($dataperson->idcard)
                    <td colspan="4">ไม่ระบุประเภทบัตร :
                        <label><?php echo $dataperson->idcard ?> </label></td>
                @else
                    <td colspan="4">ไม่ระบุประเภทบัตร : <label> - </label></td>
                @endif

            </tr>
        @endif

        <tr>
            @if($dataperson->addresspresent->present_address)
                <td colspan="4">
                    <li>ที่อยู่ปัจจุบัน : <label><?php echo $dataperson->addresspresent->present_address ?></label>
                </td>
            @else
                <td colspan="4">
                    <li>ที่อยู่ปัจจุบัน : <label> - </label>
                </td>
            @endif
            @if($dataperson->addresspresent->present_tel)
                <td colspan="1">โทร : <label><?php echo $dataperson->addresspresent->present_tel ?></label></td>
            @else
                <td colspan="1">โทร : <label> - </label></td>
            @endif

        </tr>

        <tr>
            @if($dataperson->addressoriginal->original_address)
                <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;ภูมิลำเนาเดิม :
                    <label><?php echo $dataperson->addressoriginal->original_address ?></label></td>
            @else
                <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;ภูมิลำเนาเดิม : <label> - </label></td>
            @endif
            @if($dataperson->addressoriginal->original_tel)
                <td colspan="1">โทร : <label><?php echo $dataperson->addressoriginal->original_tel ?></label></td>
            @else
                <td colspan="1">โทร : <label> - </label></td>
            @endif

        </tr>

        <tr>
            @if($dataperson->career)
                <td colspan="4">
                    <li>อาชีพ : <label><?php echo $dataperson->career ?></label>
                </td>
            @else
                <td colspan="4">
                    <li>อาชีพ : <label> - </label>
                </td>
            @endif
        </tr>
        <ol>
            <?php foreach($dataperson->addressoffice as $addressoffice) : ?>
            <tr>
                @if($addressoffice->office)
                    <td colspan="4">
                        <li>สถานที่ทำงาน : <label><?php echo $addressoffice->office ?></label>
                    </td>
                @else
                    <td colspan="4">
                        <li>สถานที่ทำงาน : <label> - </label>
                    </td>
                @endif
            </tr>
            <tr>
                @if($addressoffice->office_address)
                    <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตั้งอยู่ที่ :
                        <label><?php echo $addressoffice->office_address ?> </label></td>
                @else
                    <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตั้งอยู่ที่ : <label> - </label>
                    </td>
                @endif
                @if($addressoffice->office_tel)
                    <td colspan="1">โทร : <label><?php echo $addressoffice->office_tel ?></label></td>
                @else
                    <td colspan="1">โทร : <label> - </label></td>
                @endif

            </tr>

            <?php endforeach; ?>
        </ol>
        <tr>
            @if($dataperson->education)
                <td colspan="4">
                    <li>การศึกษา : <label><?php echo $dataperson->education ?></label>
                </td>
            @else
                <td colspan="4">
                    <li>การศึกษา : <label> - </label>
                </td>
            @endif

        </tr>
        <tr>
            @if($dataperson->datafather)
                <td colspan="4">
                    <li>ชื่อบิดา :
                        <label><?php echo $dataperson->datafather->father_name ?> <?php echo $dataperson->datafather->father_surname?></label>
                </td>
            @else
                <td colspan="4">
                    <li>ชื่อบิดา : <label> - </label>
                </td>
            @endif
            </tr>
        <tr>
            @if($dataperson->father_age)
                <td colspan="1">อายุ : <label><?php echo $dataperson->datafather->father_age ?></label> ปี</td>
            @else
                <td colspan="1">อายุ : <label> - </label> ปี</td>
            @endif

            @if($dataperson->father_live_died)
                <td colspan="1">
                    <label><?php echo $dataperson->datafather->father_live_died ?></label></td>
            @else
                <td colspan="1"><label>  </label></td>
            @endif
        </tr>
        <tr>
            @if($dataperson->datafather->father_address)
                <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;ที่อยู่ :
                    <label><?php echo $dataperson->datafather->father_address ?></label></td>
            @else
                <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;ที่อยู่ : <label> - </label></td>
            @endif
            @if($dataperson->datafather->father_tel)
                <td colspan="1">โทร : <label><?php echo $dataperson->datafather->father_tel ?></label></td>
            @else
                <td colspan="1">โทร : <label> - </label></td>
            @endif
        </tr>

        <tr>
            @if($dataperson->datafather->father_career)
                <td colspan="1">&nbsp;&nbsp;&nbsp;&nbsp;อาชีพ :
                    <label><?php echo $dataperson->datafather->father_career ?></label></td>
            @else
                <td colspan="1">&nbsp;&nbsp;&nbsp;&nbsp;อาชีพ : <label> - </label></td>
            @endif
            @if($dataperson->datafather->father_nameoffice)
                <td colspan="2">ที่ทำงาน : <label><?php echo $dataperson->datafather->father_nameoffice ?></label></td>
            @else
                <td colspan="2">ที่ทำงาน : <label> - </label></td>
            @endif
            @if($dataperson->datafather->father_nameoffice_tel)
                <td colspan="1">โทร : <label><?php echo $dataperson->datafather->father_nameoffice_tel ?></label></td>
            @else
                <td colspan="1">โทร : <label> - </label></td>
            @endif

        </tr>

        <tr>
            @if($dataperson->datamother->mother_name)
                <td colspan="4">
                    <li>ชื่อมารดา :
                        <label><?php echo $dataperson->datamother->mother_name ?> <?php echo $dataperson->datamother->mother_surname?></label>
                </td>
            @else
                <td colspan="4">
                    <li>ชื่อมารดา : <label> - </label>
                </td>
            @endif
            </tr>
        <tr>
            @if($dataperson->datamother->mother_age)
                <td colspan="1">อายุ : <label><?php echo $dataperson->datamother->mother_age ?></label> ปี</td>
            @else
                <td colspan="1">อายุ : <label> - </label> ปี</td>
            @endif
            @if($dataperson->datamother->mother_live_died)
                <td colspan="1">
                    <label><?php echo $dataperson->datamother->mother_live_died ?></label></td>
            @else
                <td colspan="1"><label>  </label></td>
            @endif


        </tr>
        <tr>
            @if($dataperson->datamother->mother_address)
                <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;ที่อยู่ :
                    <label><?php echo $dataperson->datamother->mother_address ?></label></td>
            @else
                <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;ที่อยู่ : <label> - </label></td>
            @endif
            @if($dataperson->datamother->mother_tel)
                <td colspan="1">โทร : <label><?php echo $dataperson->datamother->mother_tel ?></label></td>
            @else
                <td colspan="1">โทร : <label> - </label></td>
            @endif
        </tr>
        <tr>
            @if($dataperson->datamother->mother_career)
                <td colspan="1">&nbsp;&nbsp;&nbsp;&nbsp;อาชีพ :
                    <label><?php echo $dataperson->datamother->mother_career ?></label></td>
            @else
                <td colspan="1">&nbsp;&nbsp;&nbsp;&nbsp;อาชีพ : <label> - </label></td>
            @endif
            @if($dataperson->datamother->mother_nameoffice)
                <td colspan="2">ทำงาน : <label><?php echo $dataperson->datamother->mother_nameoffice ?></label></td>
            @else
                <td colspan="2">ทำงาน : <label> - </label></td>
            @endif
            @if($dataperson->datamother->mother_nameoffice_tel)
                <td colspan="1">โทร : <label><?php echo $dataperson->datamother->mother_nameoffice_tel ?></label></td>
            @else
                <td colspan="1">โทร : <label> - </label></td>
            @endif

        </tr>

        <tr>
            @if($dataperson->datamother->nametitle->name_title)
                <td colspan="4">
                    <li>ชื่อสามี/ภรรยา :
                        <label><?php echo $dataperson->nametitle->name_title ?> <?php echo $dataperson->dataspouse->spouse_name ?> <?php echo $dataperson->dataspouse->spouse_surname ?></label>
                </td>
            @else
                <td colspan="4">
                    <li>ชื่อสามี/ภรรยา : <label> - </label>
                </td>
            @endif
            </tr>
        <tr>
            @if($dataperson->dataspouse->spouse_age)
                <td colspan="1">อายุ : <label><?php echo $dataperson->dataspouse->spouse_age ?></label></td>
            @else
                <td colspan="1">อายุ : <label> - </label></td>
            @endif
            @if($dataperson->dataspouse->spouse_live_died)
                <td colspan="1">
                    <label><?php echo $dataperson->dataspouse->spouse_live_died ?></label></td>
            @else
                <td colspan="1"> <label> - </label></td>
            @endif


        </tr>
        <tr>
            @if($dataperson->dataspouse->spouse_address)
                <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;ที่อยู่ :
                    <label><?php echo $dataperson->dataspouse->spouse_address ?></label></td>
            @else
                <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;ที่อยู่ : <label> - </label></td>
            @endif
            @if($dataperson->dataspouse->spouse_tel)
                <td colspan="1">โทร : <label><?php echo $dataperson->dataspouse->spouse_tel ?></label></td>
            @else
                <td colspan="1">โทร : <label> - </label></td>
            @endif

        </tr>
        <tr>
            @if($dataperson->dataspouse->spouse_career)
                <td colspan="1">&nbsp;&nbsp;&nbsp;&nbsp;อาชีพ :
                    <label><?php echo $dataperson->dataspouse->spouse_career ?></label></td>
            @else
                <td colspan="1">&nbsp;&nbsp;&nbsp;&nbsp;อาชีพ : <label> - </label></td>
            @endif
            @if($dataperson->dataspouse->spouse_nameoffice)
                <td colspan="2">ที่ทำงาน : <label><?php echo $dataperson->dataspouse->spouse_nameoffice ?></label></td>
            @else
                <td colspan="2">ที่ทำงาน : <label> - </label></td>
            @endif
            @if($dataperson->dataspouse->spouse_nameoffice_tel)
                <td colspan="1">โทร : <label><?php echo $dataperson->dataspouse->spouse_nameoffice_tel ?></label></td>
            @else
                <td colspan="1">โทร : <label> - </label></td>
            @endif

        </tr>

        <tr>

            <td colspan="4">
                <li>บุตร
            </td>


        </tr>
        <ol>
            <?php foreach($dataperson->datachild as $datachild) : ?>
            <tr>
                @if($datachild->child_name)
                    <td colspan="4">
                        <li>ชื่อ-ชื่อสกุล :
                            <label><?php echo $datachild->nametitle ?> <?php echo $datachild->child_name ?> <?php echo $datachild->child_surname ?></label>
                    </td>
                @else
                    <td colspan="4">
                        <li>ชื่อ-ชื่อสกุล : <label> - </label>
                    </td>
                @endif
                </tr>
                <tr>
                @if($datachild->child_age)
                    <td colspan="1">อายุ : <label><?php echo $datachild->child_age ?></label> ปี</td>
                @else
                    <td colspan="1">อายุ : <label> - </label></td>
                @endif
                @if($datachild->child_live_died)
                    <td colspan="1"> <label><?php echo $datachild->child_live_died ?></label></td>
                @else
                    <td colspan="1"><label>  </label></td>
                @endif

            </tr>

            <tr>
                @if($datachild->child_address)
                    <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ที่อยู่ :
                        <label><?php echo $datachild->child_address ?></label></td>
                @else
                    <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ที่อยู่: <label> - </label></td>
                @endif
                @if($datachild->child_tel)
                    <td colspan="1">โทร : <label><?php echo $datachild->child_tel ?></label></td>
                @else
                    <td colspan="1">โทร: <label> - </label></td>
                @endif
            </tr>
            <tr>
                <td colspan="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อาชีพ :
                    <label><?php echo $datachild->child_career ?></label></td>
                <td colspan="2">สถานที่ทำงาน : <label><?php echo $datachild->child_nameoffice ?></label></td>
                <td colspan="1">โทร : <label><?php echo $datachild->child_nameoffice_tel ?></label></td>

            </tr>
            <?php endforeach; ?>
        </ol>


        <tr>
            <td colspan="2">
                <li>ตำหนิรูปพรรณ
            </td>
            <td colspan="2">- ส่วนสูงประมาณ : <label><?php echo $dataperson->height ?></label> ซม.</td>

        </tr>
        <tr>

            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;- น้ำหนักประมาณ : <label><?php echo $dataperson->weight ?></label> กก.</td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;- รูปร่าง : <label><?php echo $dataperson->shape ?></label></td>



        </tr>
        <tr>

            <td colspan="2">- ฟัน : <label><?php echo $dataperson->teeth ?></label></td>
            <td colspan="2">- ผิว : <label><?php echo $dataperson->skin ?></label></td>

        </tr>

        <tr>

            <td colspan="2">- ทรงผม : <label><?php echo $dataperson->hairstyles ?></label></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;- ศีรษะ : <label><?php echo $dataperson->head ?></label></td>

        </tr>
        <tr>

            <td colspan="2">- ใบหน้า : <label><?php echo $dataperson->face ?></label></td>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;- คิ้ว : <label><?php echo $dataperson->eyebrow ?></label></td>

        </tr>
        <tr>
            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;- ตา : <label><?php echo $dataperson->eye ?></label></td>
            <td colspan="2">- หู : <label><?php echo $dataperson->ear ?></label></td>
        </tr>
        <tr>

            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;- จมูก : <label><?php echo $dataperson->nose ?></label></td>
            <td colspan="2">- ปาก : <label><?php echo $dataperson->mouth ?></label></td>
        </tr>
        <tr>

            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;- คาง : <label><?php echo $dataperson->chin ?></label></td>
            <td colspan="2">- หนวด-เครา : <label><?php echo $dataperson->mirror ?></label></td>
        </tr>
        <tr>

            <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;- แผลเป็นหรือตำหนิพิการที่ติดตัวมาแต่กำเนิด :
                <label><?php echo $dataperson->scar ?></label></td>
            <td colspan="2">- สำเนียง : <label><?php echo $dataperson->accent ?></label></td>
        </tr>
        <tr>

            <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;- ลักษณะเด่นที่สังเกตเห็นได้ง่าย :
                <label><?php echo $dataperson->nature ?></label></td>

        </tr>
        <tr>
            <td colspan="4">
                <li>อุปนิสัย : <label><?php echo $dataperson->personality ?></label>
            </td>

        </tr>
        <tr>
            <td colspan="4">
                <li>สถานที่ชอบไปเที่ยวเตร่ : <label><?php echo $dataperson->location_gallivent ?></label>
            </td>

        </tr>


        <tr>

            <td colspan="4">
                <li>ประวัติการกระทำความผิด
            </td>


        </tr>
        <ol>
            <?php foreach($dataperson->datacase as $person_datacase) : ?>

            <tr>
                @if($person_datacase->name_case)
                    <td colspan="4">
                        <li>ชื่อคดี :<label><?php echo $person_datacase->name_case ?></label>
                    </td>
                @else
                    <td colspan="4">
                        ชื่อคดี :<label> - </label>
                    </td>
                @endif

            </tr>
            <tr>

                @if($person_datacase->number_case || $person_datacase->year_number_case || $person_datacase->station_number_case)

                    <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เลขคดี : <label> <?php echo $person_datacase->number_case ?>
                            <?php echo $person_datacase->year_number_case ?>
                            <?php echo $person_datacase->station_number_case ?>
                        </label></td>
                @else
                    <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เลขคดี : <label> -
                        </label></td>

                @endif
            </tr>
            <tr>
                @if($person_datacase->circumstances_case)

                    <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;พฤติการณ์คดี :
                        <label><?php echo $person_datacase->circumstances_case ?></label>
                    </td>
                @else
                    <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;พฤติการณ์คดี : <label> -
                        </label></td>

                @endif
            </tr>
            <ol>
                @foreach($person_datacase->vehicle as $vehicle)
                    <tr>
                        <td colspan="4">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;พาหนะที่ใช้ก่อเหตุ : <label>


                                    @if($vehicle)

                                        <label>
                                            @if($vehicle->vehicle_brand)
                                                ยี่ห้อ : <?php echo $vehicle->vehicle_brand ?>
                                            @endif
                                            @if($vehicle->vehicle_generation)
                                                รุ่น : <?php echo $vehicle->vehicle_generation ?>
                                            @endif
                                            @if($vehicle->vehicl_color)
                                                สี : <?php echo $vehicle->vehicl_color ?>
                                            @endif
                                            @if($vehicle->vehicle_number || $vehicle->vehicle_group || $vehicle->vehicle_province)
                                                เลขทะเบียน
                                                : <?php echo $vehicle->vehicle_number ?> <?php echo $vehicle->vehicle_group ?> <?php echo $vehicle->vehicle_province ?>
                                            @endif

                                        </label>

                                    @endif


                                </label>
                        </td>

                    </tr>
                @endforeach
            </ol>
            <ol>
                @foreach($person_datacase->weapon as $weapon)
                    <tr>
                        <td colspan="4">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;อาวุธที่ใช้ก่อเหตุ : <label>


                                    @if($vehicle)

                                        <label>
                                            @if($vehicle->vehicle_brand)
                                                <?php echo $weapon->name_weapon ?>
                                            @endif


                                        </label>

                                    @endif


                                </label>
                        </td>

                    </tr>
                @endforeach
            </ol>
            <tr>
                @if($person_datacase->date_case)

                    <td colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;วันที่เกิดเหตุ :
                        <label><?php echo $person_datacase->date_case ?></label>
                    </td>


                @endif
            </tr>



            <?php endforeach; ?>
        </ol>


        <tr>
            @if($dataperson->other)
                <td colspan="4">
                    <li>พฤติการณ์อื่นๆที่น่าสนใจ : <label>

                            <?php echo $dataperson->other ?>
                        </label>
                </td>
            @endif
        </tr>


        <tr>
            <td colspan="4">
                <li>ผู้ร่วมกระทำความผิด : <label>
                        <?php foreach($datacase->criminalhistory as $criminalhistory) : ?>
                        <?php if($criminalhistory->id != $dataperson->id){ ?>

                        - <?php echo $criminalhistory->nametitle; echo $criminalhistory->name ?> <?php echo $criminalhistory->surname ?>

                        <?php } ?>
                        <?php endforeach; ?>
                    </label>

            </td>
        </tr>


        <tr>
            <td colspan="2"></td>

        </tr>
        <tr>
            <td colspan="2"></td>

        </tr>
        <tr>
            <td colspan="2"></td>

        </tr>
        <tr>
            <td colspan="2"></td>

        </tr>
        <tr>
            <td colspan="2"></td>

        </tr>
        <tr>
            <td colspan="2"></td>

        </tr>
        <tr>
            <td colspan="2"></td>

        </tr>
        <tr>
            <td colspan="2"></td>

        </tr>
        <tr>
            <td colspan="2"></td>

        </tr>
        <tr>
            <td colspan="2"></td>

        </tr>
        <tr>
            <td colspan="2"></td>

        </tr>
        <tr>
            <td colspan="2"></td>

        </tr>
        <?php
        $user = Auth::user();
        $rank = $user->rank->rank;
        ?>
        <tr>
            <td colspan="2">ผู้จัดทำ:<?php echo "$rank $user->name_police $user->surname_police";?></td>
            <td colspan="2">วัน/เดือน/ปีที่จัดทำ:</td>

        </tr>
        <tr>
            <td colspan="4">ตำแหน่ง</td>


        </tr>


    </ol>
</table>


</body>

</html>








