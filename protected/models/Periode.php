<?php

/**
 * This is the model class for table "periode".
 *
 * The followings are the available columns in table 'periode':
 * @property integer $id_periode
 * @property string $nama_periode
 * @property string $tahun
 * @property string $tanggal_buka
 * @property string $tanggal_tutup
 * @property integer $status_aktivasi
 */
class Periode extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'periode';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_periode, tahun, tanggal_buka, tanggal_tutup', 'required'),
			
			array('nama_periode', 'length', 'max'=>255),
			array('tahun', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_periode, nama_periode, tahun, tanggal_buka, tanggal_tutup, status_aktivasi', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_periode' => 'Id Periode',
			'nama_periode' => 'Nama Periode',
			'tahun' => 'Tahun',
			'tanggal_buka' => 'Tanggal Buka',
			'tanggal_tutup' => 'Tanggal Tutup',
			'status_aktivasi' => 'Status Aktivasi',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_periode',$this->id_periode);
		$criteria->compare('nama_periode',$this->nama_periode,true);
		$criteria->compare('tahun',$this->tahun,true);
		$criteria->compare('tanggal_buka',$this->tanggal_buka,true);
		$criteria->compare('tanggal_tutup',$this->tanggal_tutup,true);
		$criteria->compare('status_aktivasi',$this->status_aktivasi);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Periode the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
