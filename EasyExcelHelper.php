<?php

/**
 * Import Excel files easy with EasyExcel Helper
 *
 *
 * PHP 5
 *
 * Copyright 2014, Andrew Esteves
 *
 *
 * @copyright     Copyright 2014 Andrew Esteves (http://andrewesteves.com.br)
 * @link          https://github.com/andrewesteves/EasyExcelHelper
 * @author        Andrew Esteves
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'view');

class EasyExcelHelper extends AppHelper{

	public $helpers = array('Html');

	public function generateExcel($model, $columns, $rows, $rows_title, $file_name = "easyexcel", $title = "EasyExcelHelper"){

		header ("Expires: Mon, 11 Nov 2005 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/vnd.ms-excel");
		header ("Content-Disposition: attachment; filename=\"".$file_name.".xls" );
		header ("Content-Description: CakePHP Generated Data" );

		echo "<style type='text/css'>";
		echo ".easy_excel_column{ border-width: 0.5pt; border: solid; }";
		echo ".easy_excel_rows{ border-width: 0.5pt; border: solid; }";
		echo "#easy_excel_title{ font-weight: bolder; }";
		echo "</style>";

		echo "<table>";
			echo "<tr>";
				echo "<th><b>" . $title . "</b></th>";
			echo "</tr>";
			echo "<tr><td></td></tr>";
			
			echo "<tr id='#easy_excel_title'>";
				foreach($columns as $column):
					echo "<td class='easy_excel_column'>" . $column . "</td>";
				endforeach;
			echo "</tr>";
		
			$generateTd = sizeof($rows_title);

			foreach($rows as $row):
				echo "<tr>";
					for($i = 0; $i < $generateTd; $i++):
						echo "<td class='easy_excel_rows'>" . $row[$model][$rows_title[$i]] . "&nbsp;</td>";
					endfor;
				echo "</tr>";
			endforeach;
		echo "</table>";
			
	}

}