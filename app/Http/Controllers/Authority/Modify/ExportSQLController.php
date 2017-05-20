<?php

namespace App\Http\Controllers\Authority\Modify;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Auth;

class ExportSQLController extends Controller
{
    //
    private $temporary_file_path;
    private $zip_file_path;
    private $sql_file_path;
    function index()
    {
        $this->temporary_file_path = 'temporary/';
        $this->rebuildTemporaryDirection();
        $this->dumpFile();
        $this->zipFileToZIP();

        //if (!$process->isSuccessful()) {
        //    throw new ProcessFailedException($process);
        //}
        
        return response()->download($this->sql_file_path);
    }
    function dumpFile()
    {
        $this->sql_file_path = $this->temporary_file_path.'user_id:'.Auth::user()->id.'_'.date('M-j_G:i:s').'.sql';
        $process = new Process('mysqldump -uhomestead -p'.env('DB_PASSWORD').' homestead > '.$this->sql_file_path);
        $process->run();
    }
    function zipFileToZIP()
    {
        $this->zip_file_path = 'customBackup/backup.zip';
        $process = new Process('zip -u '.$this->zip_file_path.' '.$this->sql_file_path);
        $process->run();
    }
    function rebuildTemporaryDirection()
    {
        $process = new Process('rm -r '.$this->temporary_file_path);
        $process->run();

        $process = new Process('mkdir '.$this->temporary_file_path);
        $process->run();
    }
}
