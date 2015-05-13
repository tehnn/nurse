<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kpi_sub_hos".
 *
 * @property string $year
 * @property string $month
 * @property string $hospcode
 * @property string $provcode
 * @property string $ampcode
 * @property double $q1
 * @property double $q2
 * @property double $q3
 * @property double $q4
 * @property double $q5
 * @property double $q6
 * @property double $q7
 * @property double $q8
 * @property double $q9
 * @property double $q10
 */
class KpiSubHos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kpi_sub_hos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year', 'month', 'hospcode'], 'required'],
            [['q1', 'q2', 'q3', 'q4', 'q5', 'q6', 'q7', 'q8', 'q9', 'q10'], 'number'],
            [['year'], 'string', 'max' => 4],
            [['month'], 'string', 'max' => 2],
            [['hospcode','hospname', 'provcode', 'ampcode'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'year' => 'ปี พ.ศ.',
            'month' => 'เดือน',
            'hospcode' => 'รหัส',
            'hospname' => 'หน่วยงาน',
            'provcode' => 'จังหวัด',
            'ampcode' => 'อำเภอ',
            'q1' => '1.จำนวนครั้งการพลัดตกหกล้ม/ตกเตียงของผู้ป่วยStrokeที่บ้าน',
            'q2' => '2.จำนวนครั้งของการเกิดแผลกดทับในผู้ป่วยติดเตียงที่บ้าน',
            'q3' => '3.จำนวนชั่วโมงการเยี่ยมบ้านของ  RN  ทั้งหมดที่ปฏิบัติการพยาบาลในชุมชนใน 1 เดือน',
            'q4' => '4.จำนวนผู้ป่วยติดเตียงที่บ้านในพื้นที่รับผิดชอบทั้งหมด',
            'q5' => '5.จำนวนผู้ป่วย Stroke  ที่บ้านทั้งหมด',
            'q6' => '6.ร้อยละความพึงพอใจในงานฯของบุคลากรพยาบาล',
            'q7' => '7.ร้อยละของความพึงพอใจของประชาชน/ผู้ใช้บริการในชุมชน',
            'q8' => '8.ร้อยละของประชาชนที่มีคุณภาพชีวิตอยู่ในระดับดี',
            'q9' => '9.ร้อยละของแผนงาน/โครงการที่ชุมชน องค์กรส่วนท้องถิ่นและภาคประชาชนมีส่วนร่วมในกิจกรรมด้านสุขภาพ',
            'q10' => '10.จำนวนความสำเร็จของ รพ.ที่มีการดำเนินงานผ่านเกณฑ์คุณภาพต้นแบบงานเยี่ยมบ้านระดับ 3  (จังหวัดละ 1 แห่ง)',
        ];
    }
}
