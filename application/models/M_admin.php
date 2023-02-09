<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }


    // Fungsi untuk insert data ke database
    function insertData($table,$data) {
		return $this->db->insert($table,$data);
	}

    // Fungsi untuk ambil data dari database
    function getAll($table){
        return $this->db->get($table);
    }

    // fungsi untuk hapus data 
    function delete($table,$where){
        $this->db->where($where);
        return $this->db->delete($table);
    }
    
    // fungsi untuk update data ke tabel
    function updateData($table,$data,$where){
        $this->db->where($where);
		return $this->db->update($table,$data);
    }

    // Fungsi untuk ambil data berdasarkan ketentuan tertentu dari database
    function getWhere($table,$where){
        return $this->db->get_where($table, $where);
    }

    // fungsi untuk ambil data kartu meter pelanggan per cust_id dan periode
    function getKartuMeterPelanggan($table,$table2,$table3,$where) {
        $this->db->select("
            $table.bulan,
            $table.periode,
            $table.aka_lalu,
            $table.aka_akhir,
            $table.jlh_pakai,
            $table.jlh_biaya,
            $table.id,
            $table2.nama as nama_cust,
            $table3.nama as nama_griya
        ");
		$this->db->from($table);
		$this->db->join($table2, $table.'.cid='.$table2.'.cid');
		$this->db->join($table3, $table2.'.griya_id='.$table3.'.id');
        $this->db->where($where);
		$this->db->order_by("$table.bulan", 'ASC');
        return $this->db->get();
    }

    // fungsi untuk ambil data AKA pelanggan per periode
    function getAKACustToday($table,$table2,$table3,$periode) {
        $sql = "SELECT res.* 
                FROM
                    (SELECT m.*, ROW_NUMBER() OVER (PARTITION BY m.cid ORDER BY m.periode DESC, m.bulan DESC) AS rn
                    FROM (SELECT 
                        a.bulan, 
                        a.periode, a.aka_lalu, a.aka_akhir, a.jlh_pakai, a.jlh_biaya,
                        a.id AS id_aka,
                        b.golongan, b.cid, b.nama AS nama_cust, b.status,
                        c.nama AS nama_griya, c.id AS id_griya,
                        b.alamat AS alamat_cust, c.alamat AS alamat_griya
                        FROM `kartu_meter` AS a JOIN `customer` AS b
                        ON a.cid=b.cid
                        JOIN `griya` AS c ON b.griya_id=c.id
                        WHERE b.status='1'
                        ORDER BY periode DESC, bulan DESC) AS m) AS res
                WHERE res.rn=1";
        return $this->db->query($sql);
    }

    // ambil data pelanggan yang belum ada transaski
    function getCustNew($table,$table2){
        $sql = "SELECT * FROM $table WHERE $table.`status`='1' AND cid NOT IN (SELECT distinct(cid) FROM $table2)";
        return $this->db->query($sql);
    }

    // fungsi untuk ambil data kartu meter pelanggan per periode by id
    function getTagihanPeriodeById($table,$table2,$table3,$where) {
        $this->db->select("
            $table2.nama as nama_cust,
            $table3.biaya_mtc,
            $table2.alamat as alamat_cust,
            $table3.alamat as alamat_griya,
            $table.bulan,
            $table.periode,
            $table2.nomor_meter,
            $table.jlh_pakai,
            $table.jlh_biaya,
            $table.aka_lalu,
            $table.aka_akhir,
        ");
		$this->db->from($table);
		$this->db->join($table2, $table.'.cid='.$table2.'.cid');
		$this->db->join($table3, $table2.'.griya_id='.$table3.'.id');
        $this->db->where($where);
        return $this->db->get();
    }
    
    // fungsi untuk ambil data customer join griya
    function getAllCustomer($table,$table2) {
        $this->db->select("
            $table.cid,
            $table.nama,
            $table.alamat,
            $table.golongan,
            $table.nomor_meter,
            $table.status,
            $table.inserted_at,
            $table2.id,
            $table2.nama as nama_griya
        ");
		$this->db->from($table);
		$this->db->join($table2, $table.'.griya_id='.$table2.'.id');
		$this->db->order_by("$table.nama", 'ASC');
        return $this->db->get();
    }

    // ambil data customer by id join griya
    function getGriyaByCID($table,$table2,$where_cid){
        $this->db->select("
            $table.cid,
            $table.nama,
            $table.alamat,
            $table.golongan,
            $table.nomor_meter,
            $table.inserted_at,
            $table2.id,
            $table2.nama as nama_griya,
            $table2.biaya_mtc
        ");
		$this->db->from($table);
		$this->db->join($table2, $table.'.griya_id='.$table2.'.id');
		$this->db->order_by("$table.nama", 'ASC');
        $this->db->where($where_cid);
        return $this->db->get();
    }

    // fungsi untuk ambil data kartu meter pelanggan by periode
    function getBulanKMP($table,$where) {
        $this->db->select("bulan");
		$this->db->from($table);
		$this->db->order_by("$table.bulan", 'ASC');
        $this->db->where($where);
        return $this->db->get();
    }
    
    // fungsi untuk ambil data bulan terakhir kartu meter pelanggan by periode dan customer
    function getLastMonthAKA($table,$where) {
        $this->db->select("*");
		$this->db->from($table);
		$this->db->order_by("$table.bulan", 'DESC');
        $this->db->where($where);
        return $this->db->get();
    }

    // fungsi untuk mengambil jumlah kartu yg belum di cetak
    function getKartuTotal($table,$table2,$bulan,$tahun) {
        $sql = "SELECT DISTINCT($table.cid) FROM $table RIGHT JOIN $table2 ON $table.cid=$table2.cid";
        return $this->db->query($sql);
    }
    
    // fungsi untuk mengambil jumlah kartu yg belum di cetak
    function getKartuSudahCetak($table,$table2,$bulan,$tahun) {
        $sql = "SELECT DISTINCT($table.cid) FROM $table RIGHT JOIN $table2 ON $table.cid=$table2.cid WHERE $table.bulan='$bulan' AND $table.periode='$tahun'";
        return $this->db->query($sql);
    }
    
    // fungsi untuk mengambil data laporan pelanggan per periode
    function getTransaksiPelanggan($table,$table2,$table3,$start_month,$end_month) {
        // $sql = "SELECT res.cid, res.pelanggan, res.griya, res.jlh_pakai, res.jlh_biaya, res.periode FROM (
        //             SELECT a.cid, b.nama AS pelanggan, c.nama AS griya, a.jlh_pakai, a.jlh_biaya, CONCAT(a.bulan, a.periode) as prd 
        //             FROM $table AS a 
        //             LEFT JOIN $table2 b ON a.cid=b.cid
        //             LEFT JOIN $table3 c ON b.griya_id=c.id
        //             WHERE prd BETWEEN $start_month AND $end_month) AS res 
        //         GROUP BY (res.cid)
        //         ";

        $sql = "SELECT res.* FROM (SELECT a.cid, b.nama AS pelanggan, b.alamat, b.status, c.nama AS griya, a.aka_lalu, a.aka_akhir, a.jlh_pakai, a.jlh_biaya, CONCAT(a.periode, '-', a.bulan) as prd FROM $table AS a LEFT JOIN $table2 b ON a.cid=b.cid LEFT JOIN $table3 c ON b.griya_id=c.id) AS res WHERE res.prd BETWEEN '$start_month' AND '$end_month';";

        return $this->db->query($sql);
    }

}
