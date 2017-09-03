<?php

namespace App\Billing\Quickpay;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Fluent;

class Request implements Jsonable, Arrayable
{
	/**
	 * @var string
	 */
	protected $method;

	/**
	 * @var string
	 */
	protected $uri;

	/**
	 * @var Resource
	 */
	protected $resource;

	/**
	 * @var array
	 */
	protected $parameters = [];

	/**
	 * Method aliases.
	 *
	 * @var array
	 */
	protected $aliases = [
		'create' => 'post',
		'destroy' => 'delete',
		'update' => 'patch'
	];

	/**
	 * Request constructor.
	 *
	 * @param string $uri
	 * @param Resource $resource
	 */
	public function __construct($uri, $resource)
	{
		$this->uri = $uri;
		$this->resource = $resource;
	}

	/**
	 * Call an alias or nested resource...
	 *
	 * @param $abstract
	 * @param $parameters
	 * @return Fluent | Request
	 */
	public function __call($abstract, $parameters)
	{
		if ($this->isAlias($abstract)) {
			return $this->callAliased($abstract, ...$parameters);
		}

		return $this->nest($abstract)->dynamic(...$parameters);
	}

	public function isAlias($method)
	{
		return array_key_exists($method, $this->aliases);
	}

	public function callAliased($method, $parameters = [])
	{
		$method = $this->aliases[$method];

		return $this->$method(array_wrap($parameters));
	}

	/**
	 * Create a dynamically self-fulfilling request.
	 *
	 * @param dynamic
	 * @return $this|\Illuminate\Support\Fluent
	 */
	public function dynamic()
	{
		list($method, $parameters) = array_pad(func_get_args(), 2, null);

		if (is_string($method)) {
			if (is_null($parameters)) {
				return $this->nest($method);
			} else {
				return $this->$method($parameters);
			}
		}

		return $this;
	}

	/**
	 * Call a nested resource uri by appending given uri.
	 *
	 * @param string $uri
	 * @return $this
	 */
	public function nest($uri)
	{
		$this->uri = "{$this->uri}/{$uri}";

		return $this;
	}

	/**
	 * Allows for accessing protected properties as read-only.
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function __get($key)
	{
		if (property_exists($this, $key)) {
			return $this->$key;
		}

		return null;
	}

	/**
	 * Get a specific resource entity.
	 *
	 * @param string|integer $id
	 * @return \Illuminate\Support\Fluent
	 */
	public function get($id = null)
	{
		$this->method = 'GET';
		$this->uri = "{$this->uri}/{$id}";

		return $this->fulfill();
	}

	/**
	 * Fulfill this request.
	 *
	 * @return \Illuminate\Support\Fluent
	 */
	protected function fulfill()
	{
		return $this->resource->fulfill($this);
	}

	/**
	 * Destroy an entity on the remote resource.
	 *
	 * @param string|integer $id
	 * @return \Illuminate\Support\Fluent
	 */
	public function delete($id = null)
	{
		$this->method = 'DELETE';
		$this->uri = "{$this->uri}/{$id}";

		return $this->fulfill();
	}

	/**
	 * Create a new entity on the remote resource.
	 *
	 * @param mixed $parameters
	 * @return \Illuminate\Support\Fluent
	 */
	public function post($parameters)
	{
		$this->method = 'POST';
		$this->parameters($parameters);

		return $this->fulfill();
	}

	/**
	 * Set the parameters.
	 *
	 * @param mixed $parameters
	 * @return void
	 */
	protected function parameters($parameters)
	{
		$this->parameters = ['form_params' => array_wrap($parameters)];
	}

	/**
	 * Push some parameters onto an existing entity.
	 *
	 * @param $parameters
	 * @return \Illuminate\Support\Fluent
	 */
	public function put($parameters)
	{
		$this->method = 'PUT';
		$this->parameters($parameters);

		return $this->fulfill();
	}

	/**
	 * Update some parameters on a existing entity.
	 *
	 * @param mixed $parameters
	 * @return \Illuminate\Support\Fluent
	 */
	public function patch($parameters)
	{
		$this->method = 'PATCH';
		$this->parameters($parameters);

		return $this->fulfill();
	}

	/**
	 * Fulfill the request and cast it to a json string.
	 *
	 * @return string
	 */
	public function __toString()
	{
		return $this->toJson();
	}

	/**
	 * @inheritDoc
	 */
	public function toJson($options = 0)
	{
		return $this->fulfill()->toJson($options);
	}

	/**
	 * @inheritDoc
	 */
	public function toArray()
	{
		return $this->fulfill()->toArray();
	}


}