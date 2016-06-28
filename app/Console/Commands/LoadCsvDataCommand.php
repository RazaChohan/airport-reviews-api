<?php namespace App\Console\Commands;

use Illuminate\Console\Command;

use Maatwebsite\Excel\Facades\Excel;

use Symfony\Component\Console\Input\InputOption;

use App\ExcelToDB as ExcelToDB;

class LoadCsvDataCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'load:csv';
    /**
     * The console command name.
     *
     * @var string
     */
    public $count = -1000;
    /**
     * The console command name.
     *
     * @var string
     */
    public $totRecords;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads Data from csv into the database';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        // Get the name arguments and the age option from the input instance.
        $filename = $this->option('filename');
        $exists = $this->checkIfFileExists($filename);
        if (!$exists) {
            $this->error('Given file does not exists!');
            return;
        }
        $extensionIsCorrect = $this->checkFileExtension('csv', $filename);
        if (!$extensionIsCorrect) {
            $this->error('Wrong format of file. File should be in csv format');
            return;
        }
        $this->info('Loading File Please Wait....');
        $this->totRecords = $this->countTotalRecordsInFile($filename);
        $this->info('Total Records: ' . $this->totRecords);
        $this->info('Inserting Data in DB , This will take about an hour...');
        Excel::filter('chunk')->selectSheetsByIndex(0)->load($filename)->chunk(1000, function ($results){
            foreach ($results as $row) {
                $excelToDB = new ExcelToDB($row->toArray());
                $excelToDB->insertDataInDb();
            }
        });
        $this->info('Loading Completed.');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array('filename', null, InputOption::VALUE_OPTIONAL, 'Name of csv file that needs to be loaded in database', 'airport.csv')
        );
    }

    /**
     * Check if file exists
     *
     * @param string $path
     * @return bool
     */
    protected function checkIfFileExists($path)
    {
        $exists = true;
        if (!file_exists($path)) {
            $exists = false;
        }
        return $exists;
    }

    /**
     * Check if file exists
     *
     * @param string $expectedExtension
     * @param string $path
     * @return bool
     */
    protected function checkFileExtension($expectedExtension, $path)
    {
        $fileParts = pathinfo($path);
        $isExtensionCorrect = false;
        if (strcasecmp($fileParts['extension'], $expectedExtension) == 0) {
            $isExtensionCorrect = true;
        }
        return $isExtensionCorrect;
    }

    /**
     * get the the total count of records in file
     *
     * @param string $path
     * @return int
     */
    protected function countTotalRecordsInFile($path)
    {
        $excelFile = Excel::load($path, function ($reader) {
        })->get();
        $rowCount = $excelFile->count();
        return $rowCount;
    }

    /**
     * Print the passed string
     *
     */
    public function printLn()
    {
        $this->count = $this->count + 1000;
        if ($this->count > 0) {
            $this->info($this->calculatePercentage($this->count) . '% records are loaded , Please wait...');
        }
    }

    /**
     * Calculates the percentage of data loaded in database
     *
     * @param string $path
     * @return double
     */
    public function calculatePercentage($recordLoaded)
    {
        return ($recordLoaded / $this->totRecords) * 100;
    }

}