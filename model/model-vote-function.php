<?php

class Model_Vote_Function
{

    private $table;

    public function __construct()
    {
        global $wpdb;
        $this->table = $wpdb->prefix . 'vote';
    }

    public function getAll($status = '')
    {
        global $wpdb;
        if (empty($status)) {
            $sql = "SELECT * FROM $this->table WHERE status = $status";
        } else {
            $sql = "SELECT * FROM $this->table";
        }
        $row = $wpdb->get_results($sql, ARRAY_A);
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
        $data = array(
            'title' => $arrData['txt_title'],
            'status' => '0',
            'content' => $arrData['txt_content'],
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

    public function getVoteDetails($id)
    {

        global $wpdb;
        $detail_table = $wpdb->prefix . 'vote_detail';
        $sql = "SELECT * FROM $detail_table WHERE vote_id = $id";
        $row = $wpdb->get_results($sql, ARRAY_A);
        return $row;
    }

    public function exportVoteDetails($id)
    {

        $vote = $this->getItem($id);
        $voteContent = str_replace('<p>', '', $vote['content']);
        $voteContent = str_replace('</p>', '', $voteContent);

        require_once(DIR_MODEL . 'model-vote-shareholder.php');
        $shareholderModel = new Model_Vote_Shareholder_Function();
        $voteResult = $shareholderModel->getShareholderVoteValue($id);

        $voteTotalModel = $shareholderModel->getVoteTotal($id);
        $voteTotal = $voteTotalModel[0]['total'];

        require_once DIR_CLASS . 'PHPExcel.php';
        $exExport = new PHPExcel();
        $exExport->setActiveSheetIndex(0)->mergeCells('A1:G1');
        $exExport->getActiveSheet()
            ->getCell('A1')
            ->setValue($vote['title']);

        $exExport->setActiveSheetIndex(0)->mergeCells('A2:G2');
        $exExport->getActiveSheet()
            ->getCell('A2')
            ->setValue($voteContent);
        // TAO COT TITLE
        $exExport->setActiveSheetIndex(0);
        $sheet = $exExport->getActiveSheet()->setTitle("Vote");
        $sheet->setCellValue('A4', "工號 \n Mã NV");
        $sheet->setCellValue('B4', "股東代號 \n Mã Cổ Đông");
        $sheet->setCellValue('C4', "姓名 \n Họ & Tên");
        $sheet->setCellValue('D4', "性別 \n Giới Tính");
        $sheet->setCellValue('E4', "股數 \n Số Cổ Phiếu");
        $sheet->setCellValue('F4', "比率 \n Tỷ Lệ");
        $sheet->setCellValue('G4', "結果 \n kết Quả");

        $sheet->getColumnDimension('A')->setAutoSize(TRUE);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(40);
        $sheet->getColumnDimension('D')->setAutoSize(TRUE);
        $sheet->getColumnDimension('E')->setAutoSize(TRUE);
        $sheet->getColumnDimension('F')->setAutoSize(TRUE);
        $sheet->getColumnDimension('G')->setAutoSize(TRUE);

        // set nen backgroup cho dong
        $sheet->getStyle('A4:G4')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('00f4f4f4');
        // set noi dong xuong dong tai cell ta set "aaaaa \n bbbbb" phai dau nhay đoi moi xuong dong dc
        $sheet->getStyle('A4:G4')->getAlignment()->setWrapText(true);
        // set chieu cao cua dong
        $sheet->getRowDimension('4')->setRowHeight(35);
        // to dam chu
        $sheet->getStyle('A')->getFont()->setBold(TRUE);
        $sheet->getStyle('A1')->getFont()->setBold(TRUE);
        $sheet->getStyle('A4:G4')->getFont()->setBold(TRUE);

        // set canh giua dong
        $sheet->getStyle('A4:G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A4:G4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $sheet->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle('F')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // TAO NOI DUNG CHEN TU DONG 2
        $i = 5;
        $total_agree = 0;
        $total_disagree = 0;

        foreach ($voteResult as $row) {

            if ($row['val'] == '1') {
                $val = '讚成';
            } elseif ($row['val'] == '0') {
                $val = '不讚成';
            } else {
                $val = '';
            }

            if ($row['val'] == '0' || $row['val'] == '1') {
                $rate = number_format($row['count'] / $voteTotal * 100,2) . '%';
            } else {
                $rate = '';
            }

            if ($row['val'] != '') {
                $total += $row['count'];
                if ($row['val'] == '1') {
                    $total_agree += $row['count'];
                } elseif ($row['val'] == '0') {
                    $total_disagree += $row['count'];
                }
            }

            $exExport->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $row['staff_code'])
                ->setCellValue('B' . $i, $row['serial'])
                ->setCellValue('C' . $i, "$row[name_cn]\n$row[name_en]")
                ->setCellValue('D' . $i, $row['gender'] == '1' ? '男' : '女')
                ->setCellValueExplicit('E' . $i, number_format($row['count']), PHPExcel_Cell_DataType::TYPE_STRING)
                ->setCellValue('F' . $i, $rate)
                ->setCellValue('G' . $i, $val);

                $exExport->getActiveSheet()->getStyle('C' . $i)->getAlignment()->setWrapText(true);
            $i++;
        }
        $i += 1;
        $rate_agree = number_format($total_disagree / $voteTotal * 100,2) . '%';
        $exExport->setActiveSheetIndex(0)->mergeCells('C' . $i . ':' . 'D' . $i);
        $exExport->getActiveSheet()->getCell('C' . $i)->setValue('不讚成 - Không Đồng Ý');
        $exExport->getActiveSheet()->getStyle('C' . $i)->getFont()->setBold(TRUE);
        $exExport->getActiveSheet()->getCell('E' . $i)->setValue(number_format($total_disagree));
        $exExport->getActiveSheet()->getCell('F' . $i)->setValue($rate_agree);

        $j = $i + 1;
        $rate_disagree = number_format($total_agree / $voteTotal * 100,2) . '%';
        $exExport->setActiveSheetIndex(0)->mergeCells('C' . $j . ':' . 'D' . $j);
        $exExport->getActiveSheet()->getCell('C' . $j)->setValue('讚成 - Đồng Ý');
        $exExport->getActiveSheet()->getStyle('C' . $j)->getFont()->setBold(TRUE);
        $exExport->getActiveSheet()->getCell('E' . $j)->setValue(number_format($total_agree));
        $exExport->getActiveSheet()->getCell('F' . $j)->setValue($rate_disagree);

        $h = $j + 1;
        // $sheet->getStyle('A')->getFont()->setBold(TRUE);
        $exExport->setActiveSheetIndex(0)->mergeCells('C' . $h . ':' . 'D' . $h);
        $exExport->getActiveSheet()->getCell('C' . $h)->setValue('總數 - Tổng Số');
        $exExport->getActiveSheet()->getStyle('C' . $h)->getFont()->setBold(TRUE);
        $exExport->getActiveSheet()->getCell('E' . $h)->setValue(number_format($voteTotal));
        $exExport->getActiveSheet()->getCell('F' . $h)->setValue(number_format($rate_agree + $rate_disagree,2).'%');


        // TAO FILE EXCEL VA SAVE LAI THEO PATH
        //$objWriter = PHPExcel_IOFactory::createWriter($exExport, 'Excel2007');
        //$full_path = EXPORT_DIR . date("YmdHis") . '_report.xlsx'; //duong dan file
        //$objWriter->save($full_path);
        // TAO FILE EXCEL VA DOWN TRUC TIEP XUONG CLINET
        $filename = 'vote_' . date("ymdHis") . '.xlsx';
        $objWriter = PHPExcel_IOFactory::createWriter($exExport, 'Excel2007');
        header("Content-Disposition: attachment;filename=$filename");
        header('Cache-Control: max-age=0');
        ob_end_clean();
        //        ob_start();
        $objWriter->save('php://output');
    }
}
