<?php

use Illuminate\Support\Facades\Storage;

  if(!function_exists('fileUpload')){
      function fileUpload($file,$folder){
          $path=$file->store('/'.config('samk.uploadsFolder').'/'.$folder,'public');
          return $path;
        }
  }
  if(!function_exists('unlinkFile')){
      function unlinkFile($path){
           Storage::delete($path);
      }
  }
  if(!function_exists('unlinkAndUpload')){
      function unlinkAndUpload($file,$folder){
          $path="/storage"."/".config('samk.uploadsFolder')."/".$folder;
          if(file_exists($path))
             unlink($path);
          return fileUpload($file,$folder);
      }
  }