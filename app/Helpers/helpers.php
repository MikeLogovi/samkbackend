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
      function unlinkAndUpload($file,$path,$folder){
          Storage::disk('public')->delete($path);
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
        $dateEvent=new Datetime($dateEvent);
        $dateNow=new Datetime(date('d/m/Y'));
        if($dateEvent<$dateNow)
            return config('samk.status.passed');
        elseif($dateEvent==$dateNow)
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