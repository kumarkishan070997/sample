<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImgUpload;
use ZipArchive;
use File;
class UserController extends Controller
{

/**
 * Function to get all images from DB
 */
public function downloadZip()
{
  $data = ImgUpload::all();
  foreach($data as $key => $value)
  {
    $imgarr[] = "storage/image". '/' . $value->image;
  }

  $ziplink = $this->converToZip($imgarr);
  return $ziplink;


}
/**
 * Function to covert all DB files to Zip
 */
public function converToZip($imgarr)
{
            $zip = new ZipArchive;
            $storage_path = 'storage/image';
            $timeName = time();
            $zipFileName = $storage_path . '/' . $timeName . '.zip';
            $zipPath = asset($zipFileName);
            if ($zip->open(($zipFileName), ZipArchive::CREATE) === true) {
                foreach ($imgarr as $relativName) {
                    $zip->addFile($relativName,"/".$timeName."/".basename($relativName));
                }
                

                if ($zip->open($zipFileName) === true) {
                      $zip->setEncryptionName(basename($zipFileName), ZipArchive::EM_AES_256, 'studywithkishan');
                          $zip->close();

                      return true;
                } 
                else {
                    return false;
                }
            }
}
public function getStatus()
{
  $data = config('constants.status');
  dd($data);
}

}