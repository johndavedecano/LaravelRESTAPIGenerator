<?php namespace Jdecano\Api;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class ApiMakeCmd extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'api:make';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate Restful API for a Model.';

    /**
     * @var string
     */
    private $version = '1.0';
    /**
     * @var null
     */
    private $model = null;

    /**
     * @var
     */
    private $processor;

    /**
     * @param ApiProcessor $processor
     */
    public function __construct(ApiProcessor $processor)
	{
		parent::__construct();

        $this->processor = $processor;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{


    	$handler = fopen ("php://stdin","r");

    	echo "Eloquent Model e.g User:";

    	$this->model = trim(fgets($handler));

    	echo "Api Version e.g 1.0:";

    	$this->version = trim(fgets($handler));

        $this->processor->run($this->model, $this->version);
	}

}
