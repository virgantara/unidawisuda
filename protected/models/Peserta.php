<?php

/**
 * This is the model class for table "peserta".
 *
 * The followings are the available columns in table 'peserta':
 * @property integer $id
 * @property string $nim
 * @property string $nama_lengkap
 * @property string $fakultas
 * @property string $prodi
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $status_warga
 * @property string $warga_negara
 * @property string $alamat
 * @property string $no_telp
 * @property string $nama_ayah
 * @property string $pekerjaan_ayah
 * @property string $nama_ibu
 * @property string $pekerjaan_ibu
 * @property string $pas_photo
 * @property string $ijazah
 * @property string $akta_kelahiran
 * @property string $kwitansi_jilid
 * @property string $surat_bebas_pinjaman
 * @property string $resume_skripsi
 * @property string $surat_bebas_tunggakan
 * @property string $transkrip
 * @property string $skl_tahfidz
 * @property string $kwitansi_wisuda
 * @property string $tanda_keluar_asrama
 * @property string $surat_jalan
 * @property string $skripsi
 * @property string $abstrak
 */
class Peserta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'peserta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nim, nama_lengkap, fakultas, prodi, tempat_lahir, tanggal_lahir, jenis_kelamin, status_warga, warga_negara, alamat, no_telp, nama_ayah, pekerjaan_ayah, nama_ibu, pekerjaan_ibu, pas_photo, ijazah, akta_kelahiran, kwitansi_jilid, surat_bebas_pinjaman, resume_skripsi, surat_bebas_tunggakan, transkrip, skl_tahfidz, kwitansi_wisuda, skripsi, abstrak,kampus,kmi', 'required'),
			array('nim', 'length', 'max'=>50),
			array('nim','unique'),
			array('nama_lengkap', 'length', 'max'=>255),
			array('tanda_keluar_asrama','cekKampus'),
			array('surat_jalan','cekKampus'),
			array('surat_bebas_tunggakan','cekKmi'),
			array('fakultas, prodi, tempat_lahir, tanggal_lahir, jenis_kelamin, status_warga, warga_negara, no_telp, nama_ayah, pekerjaan_ayah, nama_ibu, pekerjaan_ibu', 'length', 'max'=>100),
			// array('ijazah, akta_kelahiran, kwitansi_jilid, resume_skripsi, surat_bebas_tunggakan, transkrip, skl_tahfidz, kwitansi_wisuda, tanda_keluar_asrama, surat_jalan, skripsi, abstrak', 'file', 'types' => 'jpg, gif, png, pdf, doc, docx', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * 10, 'tooLarge' => 'The file was larger than 10MB. Please upload a smaller file.'),
			// array('pas_photo', 'file', 'types' => 'png, jpg', 'allowEmpty' => true, 'maxSize' => 1024 * 1024, 'tooLarge' => 'The file was larger than 1MB. Please upload a smaller file.'),
   //          array('resume_skripsi, abstrak', 'file', 'types' => 'doc', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * 5, 'tooLarge' => 'The file was larger than 5MB. Please upload a smaller file.'),
   //          array('skripsi,surat_bebas_pinjaman', 'file', 'types' => 'pdf', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * 5, 'tooLarge' => 'The file was larger than 5MB. Please upload a smaller file.'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nim, nama_lengkap, fakultas, prodi, tempat_lahir, tanggal_lahir, jenis_kelamin, status_warga, warga_negara, alamat, no_telp, nama_ayah, pekerjaan_ayah, nama_ibu, pekerjaan_ibu, pas_photo, ijazah, akta_kelahiran, kwitansi_jilid, surat_bebas_pinjaman, resume_skripsi, surat_bebas_tunggakan, transkrip, skl_tahfidz, kwitansi_wisuda, tanda_keluar_asrama, surat_jalan, skripsi, abstrak,status_validasi, kode_pendaftaran, kampus, kmi', 'safe', 'on'=>'search'),
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
			'kmi' => 'KMI',
			'id' => 'ID',
			'nim' => 'NIM',
			'nama_lengkap' => 'Nama Lengkap',
			'fakultas' => 'Fakultas',
			'prodi' => 'Prodi',
			'tempat_lahir' => 'Tempat Lahir',
			'tanggal_lahir' => 'Tanggal Lahir',
			'jenis_kelamin' => 'Jenis Kelamin',
			'status_warga' => 'Status Warga',
			'warga_negara' => 'Warga Negara',
			'alamat' => 'Alamat',
			'no_telp' => 'No Telp',
			'nama_ayah' => 'Nama Ayah',
			'pekerjaan_ayah' => 'Pekerjaan Ayah',
			'nama_ibu' => 'Nama Ibu',
			'pekerjaan_ibu' => 'Pekerjaan Ibu',
			'pas_photo' => 'Pas Foto 3x4',
			'ijazah' => 'Ijazah Terakhir',
			'akta_kelahiran' => 'Akta Kelahiran',
			'kwitansi_jilid' => 'Kwitansi Jilid',
			'surat_bebas_pinjaman' => 'Surat Bebas Pinjaman Buku Perpustakaan',
			'resume_skripsi' => 'Resume Skripsi',
			'surat_bebas_tunggakan' => 'Surat Bebas Tunggakan',
			'transkrip' => 'Transkrip',
			'skl_tahfidz' => 'Surat Keteranga Lulus Tahfidz',
			'kwitansi_wisuda' => 'Kwitansi Wisuda',
			'tanda_keluar_asrama' => 'Bukti Tanda Keluar Asrama',
			'surat_jalan' => 'Surat Jalan',
			'skripsi' => 'Skripsi',
			'abstrak' => 'Abstrak',
			'kampus' => 'Kampus',
		);
	}

	public function cekKampus($attribute, $params)
    {
    	// print_r($params);exit;
		$kampus = $this->kampus;
		if($kampus == 'Siman' && empty($params))
            $this->addError($attribute, $attribute.' cannot be blank.');
    }

    public function cekKmi($attribute, $params)
    {
    	// print_r($params);exit;
		$kampus = $this->kampus;
		$kmi = $this->kmi;
		if($kampus == 'Siman' && $kmi == 'Non-KMI')
            $this->addError($attribute, $attribute.' cannot be blank.');
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nim',$this->nim,true);
		$criteria->compare('nama_lengkap',$this->nama_lengkap,true);
		$criteria->compare('fakultas',$this->fakultas,true);
		$criteria->compare('prodi',$this->prodi,true);
		$criteria->compare('tempat_lahir',$this->tempat_lahir,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('status_warga',$this->status_warga,true);
		$criteria->compare('warga_negara',$this->warga_negara,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('nama_ayah',$this->nama_ayah,true);
		$criteria->compare('pekerjaan_ayah',$this->pekerjaan_ayah,true);
		$criteria->compare('nama_ibu',$this->nama_ibu,true);
		$criteria->compare('pekerjaan_ibu',$this->pekerjaan_ibu,true);
		$criteria->compare('pas_photo',$this->pas_photo,true);
		$criteria->compare('ijazah',$this->ijazah,true);
		$criteria->compare('akta_kelahiran',$this->akta_kelahiran,true);
		$criteria->compare('kwitansi_jilid',$this->kwitansi_jilid,true);
		$criteria->compare('surat_bebas_pinjaman',$this->surat_bebas_pinjaman,true);
		$criteria->compare('resume_skripsi',$this->resume_skripsi,true);
		$criteria->compare('surat_bebas_tunggakan',$this->surat_bebas_tunggakan,true);
		$criteria->compare('transkrip',$this->transkrip,true);
		$criteria->compare('skl_tahfidz',$this->skl_tahfidz,true);
		$criteria->compare('kwitansi_wisuda',$this->kwitansi_wisuda,true);
		$criteria->compare('tanda_keluar_asrama',$this->tanda_keluar_asrama,true);
		$criteria->compare('surat_jalan',$this->surat_jalan,true);
		$criteria->compare('skripsi',$this->skripsi,true);
		$criteria->compare('abstrak',$this->abstrak,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Peserta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
