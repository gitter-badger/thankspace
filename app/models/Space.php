<?php

class Space extends \Eloquent {
	protected $fillable = ['user_id', 'type', 'nominal', 'keterangan'];
	protected $table = 'space';
}
