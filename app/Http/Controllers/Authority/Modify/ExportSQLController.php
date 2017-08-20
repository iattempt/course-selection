<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Auth;

class ExportSQLController extends Controller
{
    private $temporary_file_path;
    private $zip_file_path;
    private $sql_file_path;

    public function index()
    {
        $this->temporary_file_path = 'temporary/';
        $this->dumpFile();
        $this->zipFileToZIP();

        //if (!$process->isSuccessful()) {
        //    throw new ProcessFailedException($process);
        //}
        
        return response()->download($this->sql_file_path);
    }

    public function dumpFile()
    {
        $this->sql_file_path = $this->temporary_file_path.'user_id:'.Auth::user()->id.'_'.date('M-j_G:i:s').'.sql';
        $process = new Process('mysqldump -uhomestead -p'.env('DB_PASSWORD').' homestead > '.$this->sql_file_path);
        $process->run();
    }

    public function zipFileToZIP()
    {
        $this->zip_file_path = 'customBackup/backup_sql.zip';
        $password = env('DB_DUMP_PASSWORD');
        $process = new Process("zip -ruP $password $this->zip_file_path $this->sql_file_path");
        $process->run();
    }
}
