<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_pcu".
 *
 * @property string $hospcode
 * @property string $prov
 * @property string $amp
 * @property string $kpi
 * @property string $rep
 * @property double $m01
 * @property double $m02
 * @property double $m03
 * @property double $m04
 * @property double $m05
 * @property double $m06
 * @property double $m07
 * @property double $m08
 * @property double $m09
 * @property double $m10
 * @property double $m11
 * @property double $m12
 * @property double $total
 */
class DataPcu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_pcu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospcode', 'prov', 'amp', 'kpi', 'rep'], 'required'],
            [['kpi', 'm01', 'm02', 'm03', 'm04', 'm05', 'm06', 'm07', 'm08', 'm09', 'm10', 'm11', 'm12', 'total'], 'number'],
            [['hospcode'], 'string', 'max' => 5],
            [['prov', 'amp'], 'string', 'max' => 255],
            [['rep'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hospcode' => 'Hospcode',
            'prov' => 'Prov',
            'amp' => 'Amp',
            'kpi' => 'ตัวชี้วัด',
            'rep' => 'ปีงบ',
            'm01' => 'ตค',
            'm02' => 'พย',
            'm03' => 'ธค',
            'm04' => 'มค',
            'm05' => 'กพ',
            'm06' => 'มีค',
            'm07' => 'เมย',
            'm08' => 'พค',
            'm09' => 'มิย',
            'm10' => 'กค',
            'm11' => 'สค',
            'm12' => 'กย',
            'total' => 'Total',
        ];
    }
}
