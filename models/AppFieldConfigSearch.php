<?php

namespace backend\models;

use common\helpers\TypeFieldEnum;
use common\labeling\CommonActionLabelEnum;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use dosamigos\datepicker\DatePicker;
/**
 * AppFieldConfigSearch represents the model behind the search form of `backend\models\AppFieldConfig`.
 */
class AppFieldConfigSearch extends AppFieldConfig
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_app_field_config', 'no_order', 'is_visible', 'is_required', 'is_unique', 'is_safe', 'type_field', 'max_field', 'hide_in_grid'], 'integer'],
            [['classname', 'varian_group', 'fieldname', 'label', 'default_value', 'pattern', 'image_extensions', 'image_max_size'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AppFieldConfig::find()->orderBy('no_order ASC');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_app_field_config' => $this->id_app_field_config,
            'no_order' => $this->no_order,
            'is_visible' => $this->is_visible,
            'is_required' => $this->is_required,
            'is_unique' => $this->is_unique,
            'is_safe' => $this->is_safe,
            'type_field' => $this->type_field,
            'max_field' => $this->max_field,
            'hide_in_grid' => $this->hide_in_grid,
			//'varian_group' => $this->varian_group,
        ]);

        $query->andFilterWhere(['=', 'classname', $this->classname])
			->andFilterWhere(['=', 'varian_group', $this->varian_group])
            ->andFilterWhere(['like', 'fieldname', $this->fieldname])
            ->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'default_value', $this->default_value])
            ->andFilterWhere(['like', 'pattern', $this->pattern])
            ->andFilterWhere(['like', 'image_extensions', $this->image_extensions])
            ->andFilterWhere(['like', 'image_max_size', $this->image_max_size]);

        return $dataProvider;
    }
	
	/*
	public static function getRules($tableNames){
		$res = array();
		
		//A. Required
		$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'is_required'=>1])
				->all();
		$fieldRequired = array();
		foreach($datas as $data){
			//echo $data->fieldname."<br>";
			$fieldRequired[] = $data->fieldname;
		}
		$rulesrequired = [$fieldRequired, 'required'];
		$res[] = $rulesrequired;
		
		//B. Integer
		$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'type_field'=>TypeFieldEnum::TYPE_INTEGER])
				->all();
		$fieldInteger = array();
		foreach($datas as $data){
			//echo $data->fieldname."<br>";
			$fieldInteger[] = $data->fieldname;
		}
		$rulesinteger = [$fieldInteger, 'integer'];
		$res[] = $rulesinteger;
		
		//C. String with Max
		$datas= AppFieldConfig::find()
                ->where([
					'classname' => $tableNames, 
					//'type_field'=>TypeFieldEnum::TYPE_STRING
				])
				->all();
		$fieldInteger = array();
		foreach($datas as $data){
			if($data->max_field > 0){
				$max = $data->max_field;
			}else{
				$max = 250; //Default
			}
			
			if($data->type_field == TypeFieldEnum::TYPE_STRING){
				$rulestring = [[$data->fieldname], 'string', 'max'=>$max];
				$res[] = $rulestring;
			}

		}
		
		
		return $res;
	}
	*/
	
	public static function getRules($tableNames, $varian_group=""){
		/*
        return [
            [['asset_name', 'asset_code'], 'required'],
            [['id_asset_code', 'id_type_asset1', 'id_type_asset2', 'id_type_asset3', 'id_type_asset4', 'id_type_asset5'], 'integer'],
            [['asset_name', 'attribute1', 'attribute2', 'attribute3', 'attribute4', 'attribute5'], 'string', 'max' => 250],
            [['asset_code'], 'string', 'max' => 150],
        ];
		*/
		$res = array();
		
		//A. Required
		if($varian_group == ""){
			$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'is_required'=>1, 'varian_group'=>''])
				->all();
		}else{
			$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'is_required'=>1, 'varian_group'=>$varian_group])
				->all();
		}
		$fieldRequired = array();
		foreach($datas as $data){
			//echo $data->fieldname."<br>";
			$fieldRequired[] = $data->fieldname;
		}
		$rulesrequired = [$fieldRequired, 'required'];
		$res[] = $rulesrequired;
		
		//B. Integer
		if($varian_group == ""){
			$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'type_field'=>TypeFieldEnum::TYPE_INTEGER, 'varian_group'=>''])
				->all();
		}else{	
			$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'type_field'=>TypeFieldEnum::TYPE_INTEGER, 'varian_group'=>$varian_group])
				->all();
		}
		$fieldInteger = array();
		foreach($datas as $data){
			//echo $data->fieldname."<br>";
			$fieldInteger[] = $data->fieldname;
		}
		$rulesinteger = [$fieldInteger, 'integer'];
		$res[] = $rulesinteger;
		
		//C. String with Max
		if($varian_group == ""){
			$datas= AppFieldConfig::find()
                ->where([
					'classname' => $tableNames, 
					'varian_group'=>''
					//'type_field'=>TypeFieldEnum::TYPE_STRING
				])
				->all();
		}else{
			$datas= AppFieldConfig::find()
                ->where([
					'classname' => $tableNames, 
					'varian_group'=>$varian_group
					//'type_field'=>TypeFieldEnum::TYPE_STRING
				])
				->all();
		}
		$fieldInteger = array();
		foreach($datas as $data){
			if($data->max_field > 0){
				$max = $data->max_field;
			}else{
				$max = 250; //Default
			}
			
			if($data->type_field == TypeFieldEnum::TYPE_STRING){
				$rulestring = [[$data->fieldname], 'string', 'min'=>0, 'max'=>$max];
				$res[] = $rulestring;
			}
			
			/*
			if($data->type_field == TypeFieldEnum::TYPE_INTEGER){
				if($data->max_field > 0){
					$max = $data->max_field;
				}else{
					$max = 12; //Default
				}			
	
				$rulestring = [[$data->fieldname], 'string', 'min'=>0, 'max'=>$max];
				$res[] = $rulestring;
			}
			*/
		}
		
		
		return $res;
	}
	
	public static function getLabels($tableNames, $varian_group=""){
		/*
		return [
            'id_asset_master' => 'Id Asset Master',
            'asset_name' => 'Nama Barang',
            'id_asset_code' => 'Id Asset Code',
            'asset_code' => 'Kode Barang',
            'id_type_asset1' => 'Jenis Aset',
        ];
		*/
		$label = array();
		
		//Label
		/*
		$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames])
				->all();
		*/
		if($varian_group == ""){
			$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames,  'varian_group'=>""])
				->orderBy(['no_order'=>SORT_ASC])
				->all();
		}else{
			$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'varian_group'=>$varian_group])
				->orderBy(['no_order'=>SORT_ASC])
				->all();
		}
		foreach($datas as $data){
			//echo $data->fieldname."<br>";
			if($data->label != ""){
				$label[$data->fieldname] = $data->label;
			}else{
				$label[$data->fieldname] = $data->fieldname;
			}
		}
		//var_dump($label);

		return $label;
	}
	
	public static function getListGridView($tableNames, $varian_group="",$withDefaultAction=true){
		$list = array();
		$list[] = ['class' => 'yii\grid\SerialColumn'];
		if($varian_group == ""){
			$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'hide_in_grid'=>0, 'varian_group'=>""])
				->orderBy(['no_order'=>SORT_ASC])
				->all();
		}else{
			$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'varian_group'=>$varian_group, 'hide_in_grid'=>0])
				->orderBy(['no_order'=>SORT_ASC])
				->all();
		}
		foreach($datas as $data){
			if($data->hide_in_grid == 0) {

				switch($data->type_field){
					case TypeFieldEnum::TYPE_YESNO :
						$list[] = [
							'label' => $data->label,
							'attribute' => $data->fieldname,
							'format' => 'raw',
		                    'value' => function ($data) {
		                        return $data->getStatusAktif();
		                    }
						  ];

						break;

					default:
						$list[] = [
							'label' => $data->label,
							'attribute' => $data->fieldname,
						  ];
						break;
				}
			}
		}
		if($withDefaultAction){
			$list[] = [
				'class' => 'yii\grid\ActionColumn',
                /*
				'template'=>'{view} {update} {delete}',
                'buttons'=>[
					'update' => function ($url, $model) {
						return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
							'title' => Yii::t('app', 'update'),
						]);
					},
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'view'),
                        ]);
                    },
				], 
				'header' => CommonActionLabelEnum::ACTION,
				*/
				];
		}

		return $list;
	}
	
	public static function getListGridViewWithHeader($tableNames, $varian_group="", $withDefaultAction=true){
		$list = array();
		$list[] = ['class' => 'yii\grid\SerialColumn'];
		if($varian_group == ""){
			$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'is_visible'=>1, 'varian_group'=>""])
				->orderBy(['no_order'=>SORT_ASC])
				->all();
		}else{
			$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'varian_group'=>$varian_group, 'is_visible'=>1])
				->orderBy(['no_order'=>SORT_ASC])
				->all();
		}
		foreach($datas as $data){
			$list[] = [
						'header' => $data->label,
						'attribute' => $data->fieldname,
					  ];
		}
		if($withDefaultAction){
			$list[] = ['class' => 'yii\grid\ActionColumn', 'header' => CommonActionLabelEnum::ACTION,];
		}

		return $list;
	}
	
	public static function replaceListGridViewItem($listGridView, $fieldnameReplace, $columnReplaced){
		foreach($listGridView as $key=>$val){
			//echo $key."=>"."<br>";
			foreach($val as $key2=>$val2){
				//echo $key2."=>".$val2."<br>";
				if($val2 == $fieldnameReplace){
					$listGridView[$key] = $columnReplaced;
					break;
				}
			}
		}
		
		return $listGridView;
	}
	
	public static function getListFormElement($tableNames, $form, $model, $varian_group=""){
		$res = array();
		if($varian_group == ""){
			$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'is_visible'=>1, 'varian_group'=>""])
				->orderBy(['no_order'=>SORT_ASC])
				->all();
		}else{
			$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'varian_group'=>$varian_group, 'is_visible'=>1])
				->orderBy(['no_order'=>SORT_ASC])
				->all();
		}
		foreach($datas as $data){
			$fieldname = $data->fieldname;
			
			$readonlystatus = false;
			if($data->is_readonly ==1){ $readonlystatus= 'readonly';}
			
			//Jika datanya angka dan new record maka dikasih default 0;
			if ($model->isNewRecord) {
				if($data->type_field == TypeFieldEnum::TYPE_INTEGER){
					$model->$fieldname = 0;
				}
			}
			
			switch($data->type_field){
				case TypeFieldEnum::TYPE_STRING :
					$res[$fieldname] = $form->field($model, $fieldname)->textInput([
						'maxlength' => true, 
						'readonly'=> $readonlystatus])
						->label($data->label);
					break;

				case TypeFieldEnum::TYPE_DATE:
					$res[$fieldname] =	$form->field($model, $fieldname)->widget(datepicker::className(),[
		       				'model' => $model,
		        			'attribute' => 'date',
		        			'template' => '{addon}{input}',
		        			'clientOptions' => [
		            			'autoclose' => true,
		            			'format' => 'yyyy-mm-dd'
		        			]
	    				])->label($data->label);
					break;

				case TypeFieldEnum::TYPE_FILE:
					$res[$fieldname] = $form->field($model, $fieldname)->fileInput()
							->label($data->label);
					break;

				case TypeFieldEnum::TYPE_YESNO :
					$res[$fieldname] = $form->field($model, $fieldname)->dropDownList(
                		[   'empty' => '-- Pilih --',
                    		1 => 'YA', '0' => 'TIDAK']
            			)
						->label($data->label);

					break;

				case TypeFieldEnum::TYPE_TEXT :
					$res[$fieldname] = $form->field($model, $fieldname)->textarea(['rows' => 3])
						->label($data->label);

					break;

				default:
					$res[$fieldname] = $form->field($model, $fieldname)->textInput([
						'maxlength' => true, 
						'readonly'=> $readonlystatus])
						->label($data->label);
					break;
			}
		}
		
		return $res;
	}
	
	public static function replaceFormElement($listElements, $fieldnameReplace, $elementReplace){
		foreach($listElements as $key=>$val){
			if($key == $fieldnameReplace){
				$listElements[$key] = $elementReplace;
				break;
			}
		}
		
		return $listElements;
	}
	
	public static function getLabelName($tableName, $fieldname, $varian_group=""){
		$list = array();

		if($varian_group != ""){
			$data= AppFieldConfig::find()
                ->where(['classname' => $tableName, 'fieldname'=>$fieldname, 'varian_group'=>$varian_group])
				->one();
			if($data != null){
				return $data->label;
			}
		}else{
			$data= AppFieldConfig::find()
                ->where(['classname' => $tableName, 'fieldname'=>$fieldname])
				->one();
			if($data != null){
				return $data->label;
			}
		}
		
		return $fieldname;
	}

	public static function removeField($listElements, $fiedlname){
		unset($listElements[$fiedlname]);
		return $listElements;
	}
	
	public static function getFieldByLabel($tableName, $label, $varian_group=""){
		$list = array();
		$fieldname = "";

		if($varian_group != ""){
			$data= AppFieldConfig::find()
                ->where(['classname' => $tableName, 'varian_group'=>$varian_group])
				->andWhere(['like', 'label', $label, false])
				->one();

			if($data != null){
				return $data->fieldname;
			}
		}else{
			$data= AppFieldConfig::find()
                ->where(['classname' => $tableName])
				->andWhere(['like', 'label', $label, false])
				->one();
			if($data != null){
				return $data->fieldname;
			}
		}
		
		return $fieldname;
	}
	
	public static function getVisibleLabelName($tableName, $fieldname, $varian_group=""){
		$list = array();

		if($varian_group != ""){
			$data= AppFieldConfig::find()
                ->where(['classname' => $tableName, 'fieldname'=>$fieldname, 'varian_group'=>$varian_group])
				->one();
			if($data != null){
				if($data->is_visible == 1) {return true;}
			}
		}else{
			$data= AppFieldConfig::find()
                ->where(['classname' => $tableName, 'fieldname'=>$fieldname])
				->one();
			if($data != null){
				if($data->is_visible == 1) {return true;}
			}
		}
		
		return false;
	}

	public static function getListDetailView($tableNames, $varian_group=""){
		$list = array();

		if($varian_group == ""){
			$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'is_visible'=>1, 'varian_group'=>""])
				->orderBy(['no_order'=>SORT_ASC])
				->all();
		}else{
			$datas= AppFieldConfig::find()
                ->where(['classname' => $tableNames, 'varian_group'=>$varian_group, 'is_visible'=>1])
				->orderBy(['no_order'=>SORT_ASC])
				->all();
		}
		foreach($datas as $data){
			switch($data->type_field){
				case TypeFieldEnum::TYPE_YESNO :
					$list[$data->fieldname] = [
						'attribute' => $data->fieldname,
						'label' => $data->label,
						'value' => function ($data) {
	                        return $data->getStatusAktif();
	                    }
					];

					break;

				default:
					$list[$data->fieldname] = [
						'attribute' => $data->fieldname,
						'label' => $data->label,
					];
					break;
			}
		}

		return $list;
	}
	
	public static function replaceViewElement($listElements, $fieldnameReplace, $elementReplace){
		foreach($listElements as $key=>$val){
			if($key == $fieldnameReplace){
				$listElements[$key] = $elementReplace;
				break;
			}
		}
		
		return $listElements;
	}
}
