<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "polyline".
 *
 * @property int|null $id_polyline
 * @property string|null $name
 * @property string|null $display_name
 * @property string|null $color
 * @property string|null $draw_style
 * @property string|null $created_ts
 * @property string|null $modified_ts
 * @property string|null $deleted_ts
 */
class Polyline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'polyline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_ts', 'modified_ts', 'deleted_ts'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['display_name', 'color', 'draw_style'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_polyline' => 'Id Polyline',
            'name' => 'Name',
            'display_name' => 'Display Name',
            'color' => 'Color',
            'draw_style' => 'Draw Style',
            'created_ts' => 'Created Ts',
            'modified_ts' => 'Modified Ts',
            'deleted_ts' => 'Deleted Ts',
        ];
    }
}
