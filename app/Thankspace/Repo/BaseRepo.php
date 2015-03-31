<?php namespace Thankspace\Repo;

class BaseRepo
{

	/**
	 * Instance of eloquent model
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	protected $model;


	protected $errors = array();

	
	public function __construct($model)
	{
		$this->model = $model;
	}

	
	public function getErrors()
	{
		return $this->errors;
	}

	
	public function setErrors($errors)
	{
		$this->errors = $errors;
	}
	
}