<?php
/**
 * summary
 */
class DBCSV 
{
    private $fileName;
    protected $records =  array();
    protected $headersFields = array();


    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function getFileName(){
    	return this->fileName;
    }
    public function getHeader(){
    	return $this->headerFields;
    }
    public function getRecords(){
    	return $this->records;
    }

    public function addHeader($fields){
    	if (!is_array($fields)) {
    		echo "[ERROR] Invalid fields information";
    		return;
    	}
    	if ($this->checkFieldCound($fields)) {
    		echo "[ERROR] Unable to add header - column mismatch!!";
    	}else{
    		$this->headerFields[] = $fields;
    	}
    }

    public function loadsRecords(){
    	$row = 0;
    	if (file_exists($this->fileName)) {
    		$handle = fopen($this->fileName, "r");
    		while (($data = fgetcsv($handle)) !== false) {
    		    $num = count($data);
    		    if ($row == 0) {
    		    	$header_field_count = $num;
    		    	$this->addHeader($data);
    		    }else{
    		    	if ($num != $header_field_count) {
    		    		echo "The Nubmer of columns in row {$row} does not match the fields in header row!!";
    		    		fclose($handle);
    		    		return false;
    		    	}
    		    }
    		}
    	}
    }

    public function addRecord($record){
    	if (!is_array($record)) {
    		echo "[ERROR] Sorry, can't add record - type mismatch!";
    		return;
    	}
    	if ($this->checkFieldCound($record)) {
    		echo "[ERROR] Sorry, can't add record - header mismatch";
    		return;
    	}else{
    		$this->records[] = $record;
    	}
    }

    public function editRecord($employee_id, $data){
    	if (!is_array($data)) {
    		echo "[ERROR] Wrong data format!";
    		return;
    	}
    	if (count($this->searchRecord($employee_id)) == 0) {
    		echo "[ERROR] Record not found to edit!!";
    		return;
    	}
    	$key = $this->findKey($employee_id);
    	foreach ($this->records[$key] as $i => $r) {
    		$this->records[$key][$i] = $data[$i];
    	}
    	return $this->records[$key];
    }

    public function deleteRecord($employee_id){
    	if (count($this->searchRecord($employee_id)) == 0) {
    		echo "[ERROR] Record not forund to delete!!";
    		return;
    	}
    	$key = findKey($employee_id);
    	unset($this->records[$key]);
    	echo "[SUCCESS] Delete successfully!!";
    }

    public function getRecord($index){
    	if ($index < count($this->records)) {
    		return $this->records[$index];
    	}else{
    		echo "[ERROR] Invalid record index!!";
    	}
    }
    public function searchRecord($value){
    	foreach ($this->records as $key=> $data) {
    		if (in_array($value, $data)) {
    			return $this->records[$key];
    		}
    	}
    }

    public function findKey($value){
    	foreach ($this->records as $key=> $data) {
    		if (in_array($value, $data)) {
    			return $key;
    		}
    	}
    }

    public function recordCount()
    {
    	return count($this->records);
    }
    public function headerFieldCount(){
    	return count($this->headerFields, COUNT_RECURSIVE) -1;
    }

    private function checkFieldCound($record){
    	if ($this->headersFields) {
    		if (count($this->headerFields, COUNT_RECURSIVE) == count($record, COUNT_RECURSIVE)) {
    			return true;
    		}

    	}
    	return false;
    }

    function saveRecords()
    {
    	$file = fopen($this->fileName, "w");
    	fputcsv($file, $this->headerFields[0]);
    	foreach ($this->records as $record) {
    		fputcsv($file, $record);
    	}
    	fflush($file);
    	fclose($file);
    }


}