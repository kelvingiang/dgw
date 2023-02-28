<?php

class Model_Vote_Shareholder_Function
{

    private $table;

    public function __construct()
    {
        global $wpdb;
        $this->table = $wpdb->prefix . 'shareholder';
    }

    public function getShareholderVoteValue($vote_id)
    {
        global $wpdb;
        $vote_table = $wpdb->prefix . 'vote_detail';
        $sql = "SELECT *
        FROM $this->table LEFT JOIN $vote_table
        ON $this->table.ID = $vote_table.person_id
        AND $vote_table.vote_id = $vote_id
        WHERE $this->table.trash = 0
        ORDER BY $this->table.ID";
        $row = $wpdb->get_results($sql, ARRAY_A);
        return $row;

        // SELECT Khachhang.Hoten, Donhang.DonhangID
        // FROM Khachhang LEFT JOIN Donhang ON Khachhang.KhachhangID = Donhang.KhachhangID
        // ORDER BY Khachhang.Hoten
    }

    public function getVoteTotal($vote_id)
    {
        global $wpdb;
        $vote_table = $wpdb->prefix . 'vote_detail';
        $sql = "SELECT SUM($this->table.count) AS total
        FROM $this->table LEFT JOIN $vote_table
        ON $this->table.ID = $vote_table.person_id
        AND $vote_table.vote_id = $vote_id
        WHERE $this->table.trash = 0 AND ($vote_table.val = 1 OR $vote_table.val = 0)";
        // ORDER BY $this->table.ID";
        // echo $sql;
        $row = $wpdb->get_results($sql, ARRAY_A);
        return $row;

    }

    public function getAll($status = '')
    {
        global $wpdb;
        if (empty($status)) {
            $sql = "SELECT * FROM $this->table WHERE trash = $status";
        } else {
            $sql = "SELECT * FROM $this->table";
        }

        $row = $wpdb->get_results($sql, ARRAY_A);
        return $row;
    }

    public function login($email, $password)
    {

        global $wpdb;
        $sql = "SELECT * FROM $this->table WHERE `email` = '$email' AND `pass` = '$password'";
        echo $sql;
        $row = $wpdb->get_row($sql, ARRAY_A);
        return $row;
    }

    public function getItem($id)
    {
        global $wpdb;
        $sql = "SELECT * FROM $this->table WHERE ID = $id";
        $row = $wpdb->get_row($sql, ARRAY_A);
        return $row;
    }

    public function Save($arrData, $option)
    {
        $pass = $arrData['hid-pass'] === $arrData['txt_pass'] ? $arrData['hid-pass'] : md5($arrData['txt_pass']);

        // print_r($arrData);
        // die();

        $data = array(
            'serial' => $arrData['txt_serial'],
            'staff_code' => $arrData['txt_staff_code'],
            'name_en' => $arrData['txt_name_en'],
            'name_cn' => $arrData['txt_name_cn'],
            'gender' => $arrData['rdo_gender'],
            'count' => str_replace(',', '', $arrData['txt_count']),
            'price' => str_replace(',', '', $arrData['txt_price']),
            'total' => str_replace(',', '', $arrData['txt_total']),
            'rate' => $arrData['txt_rate'],
            'trash' => '0',
            'email' => $arrData['txt_email'],
            'pass' => $pass,
        );

        $add = array(
            'create_date' => date("d-m-Y"),
        );

        $update = array(
            'update_date' => date("d-m-Y"),
        );

        global $wpdb;
        if ($option == 'add') {

            $AddData = array_merge($data, $add);
            $wpdb->insert($this->table, $AddData);
            print_r($AddData);
        } elseif ($option == 'edit') {

            $UpdateData = array_merge($data, $update);
            $where = array('ID' => $arrData['hid-id']);
            $wpdb->update($this->table, $UpdateData, $where);
        }
    }

    // THAY DOI TRANG THAI 
    public function toTrash($arrData = array(), $options = array())
    {
        global $wpdb;
        $trash = ($options == 'trash') ? 1 : 0;

        // KIEM TRA PHAN UPFDATE CÓ PHAN DANG CHUOI HAY KHONG
        // print_r($arrData);

        if (!is_array($arrData['id'])) {
            $data = array('trash' => $trash);
            $where = array('ID' => absint($arrData['id']));
            $wpdb->update($this->table, $data, $where);
        } else {
            $arrData['id'] = array_map('absint', $arrData['id']);
            $ids = join(',', $arrData['id']);
            $sql = "UPDATE $this->table SET trash = $trash  WHERE id IN ($ids)";
            $wpdb->query($sql);
        }
    }

    public function toStatus($id)
    {
        global $wpdb;

        $sql = "UPDATE $this->table SET status = 0 WHERE 1 = 1";
        $wpdb->query($sql);

        $UpdateData =  array('status' => '1');
        $where = array('ID' => $id);
        $wpdb->update($this->table, $UpdateData, $where);
    }

    // XOA DATA
    public function toDelete($arrData = array(), $options = array())
    {
        global $wpdb;
        // KIEM TRA PHAN DELETE CÓ PHAN DANG CHUOI HAY KHONG

        if (!is_array($arrData['id'])) {
            $where = array('ID' => absint($arrData['id']));
            $wpdb->delete($this->table, $where);
        } else {
            $arrData['id'] = array_map('absint', $arrData['id']);
            $ids = join(',', $arrData['id']);
            echo '<br>' . $ids;
            $sql = "DELETE FROM $this->table WHERE ID IN ($ids)";
            $wpdb->query($sql);
        }
    }


    public function getCount()
    {
        global $wpdb;
        $sql = "SELECT * FROM $this->table WHERE trash = 0";
        $row = $wpdb->query($sql);
        return $row;
    }
}
