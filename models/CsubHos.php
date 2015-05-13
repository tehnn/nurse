<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "csub_hos".
 *
 * @property string $hospcode
 * @property string $hospname
 * @property string $province
 */
class CsubHos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csub_hos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospcode'], 'required'],
            [['hospcode', 'hospname','tambon','amphur', 'province'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hospcode' => 'Hospcode',
            'hospname' => 'Hospname',
            'tambon'=>'Tambon',
            'amphur'=>'Amphur',
            'province' => 'Province',
        ];
    }
}
