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
  if(!function_exists('formatMyDate')){
      function formatMyDate($date){
          return date_format(date_create($date),'d/m/Y');
      }
  }
  if(!function_exists('getEventStatus')){
      function getEventStatus($dateEvent){
        $dateNow=date('d/m/Y');
        if($dateEvent<$dateNow)
            return config('samk.status.passed');
        elseif($dateEvent==dateNow)
            return config('samk.status.today');
        else
            return config('samk.status.upcoming');;
      }
  }
  if(!function_exists('getStatusClass')){
    function getStatusClass($status){
      if($status==config('samk.status.passed'))
          return 'danger';
      elseif($status==config('samk.status.today'))
          return "success";
      else
          return "info";
    }
}