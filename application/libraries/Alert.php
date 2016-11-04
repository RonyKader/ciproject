<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alert 
{
    public function success($message){
        return '<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Well done!</strong> '.$message.'</div>';
    }

    public function info($message){
        return '<div class="alert alert-info" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Heads up! </strong> '.$message.'</div>';
    }

    public function warning($message){
        return '<div class="alert alert-warning" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Warning!</strong> '.$message.'</div>';
    }

    public function danger($message){
        return '<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Oh snap!</strong> '.$message.'</div>';
    }

    public function dmStart(){
        return '<div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>';
    }

    public function dmEnd(){
        return '</div>';
    }
} 