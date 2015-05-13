<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cmonth".
 *
 * @property string $selmonth
 * @property string $month_th
 */
class Cmonth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cmonth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['selmonth'], 'required'],
            [['selmonth'], 'string', 'max' => 2],
            [['month_th'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'selmonth' => 'Selmonth',
            'month_th' => 'Month Th',
        ];
    }
}
