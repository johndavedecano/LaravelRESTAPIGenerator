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
     * @var bool
     */
    private $secured = false;

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
        $this->model = $this->option('api_m');

        $this->version = $this->option('api_v');

        $this->secured = (bool)$this->option('api_s');

        $this->processor->run($this->model, $this->version, $this->secured);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
            array('api_m', '--api_m', InputOption::VALUE_REQUIRED, 'Eloquent Model.', null),
			array('api_v', '--api_v', InputOption::VALUE_REQUIRED, 'API Version.', null),
            array('api_s', '--api_s', InputOption::VALUE_REQUIRED, 'Require API Key.', false),
		);
	}

}
