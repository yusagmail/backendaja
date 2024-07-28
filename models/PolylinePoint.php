<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "polyline_point".
 *
 * @property int|null $id_polyline_point
 * @property int|null $id_polyline
 * @property int|null $point_seq
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $created_ts
 * @property string|null $modified_ts
 * @property string|null $deleted_ts
 * @property int|null $id_reference_point
 */
class PolylinePoint extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'polyline_point';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_polyline', 'point_seq', 'id_reference_point'], 'integer'],
            [['created_ts', 'modified_ts', 'deleted_ts'], 'safe'],
            [['latitude', 'longitude'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_polyline_point' => 'Id Polyline Point',
            'id_polyline' => 'Id Polyline',
            'point_seq' => 'Point Seq',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'created_ts' => 'Created Ts',
            'modified_ts' => 'Modified Ts',
            'deleted_ts' => 'Deleted Ts',
            'id_reference_point' => 'Reference Point',
        ];
    }

    public function getReferencePoint()
    {
        return $this->hasOne(ReferencePoint::className(), ['id_reference_point' => 'id_reference_point']);
    }
}
