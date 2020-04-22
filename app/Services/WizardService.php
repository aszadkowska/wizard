<?php


namespace App\Services;

use App\Model\UUID\Keys;
use App\Model\UUID\KeyFactory;
use DateInterval;
use DatePeriod;
use DateTime;

class WizardService
{
    /** @var Keys */
    protected $keys;

    /** @var KeyFactory */
    protected $factory;

    public function __construct(Keys $keys, KeyFactory $uuidFactory)
    {
        $this->keys = $keys;
        $this->factory = $uuidFactory;
    }

    public function shuffleLetters($province, $email): array
    {
        $emailName = substr($email, 0, strpos($email, "@"));
        $letters = preg_replace('/[^a-zA-Z]/', '', $emailName);
        $shuffle = $this->provinceWithoutSpecialCharacters($province) . $letters;

        return str_split(str_shuffle(strtoupper(($shuffle))));
    }

    public function provinceWithoutSpecialCharacters($province): string
    {
        return preg_replace("/[^a-zA-Z]/", "", iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $province));
    }

    public function dates($from, $to): DatePeriod
    {
        return new DatePeriod(new DateTime($from), new DateInterval('P1D'), new DateTime($to . '+1 DAY'));
    }

    public function setUUIDForEveryDate($from, $to, $letters): array
    {
        $uuid = env('USER_UUID');

        foreach ($this->dates($from, $to) as $date) {
            $date = $date->format("Y-m-d");
            $day = date("d",strtotime($date));
            $month = date("m",strtotime($date));
            $yeara = date("Y",strtotime($date));
            $year = str_split($yeara, 2);

            $begin = $month . $year[0];
            $end = $day . $year[1];

            $uuidArray = str_split($uuid);
            $result = $this->shuffleArrays($uuidArray, $letters);

            array_unshift($result, $begin);
            array_push($result, $end);

            $arraysForAllDates[] = [$date, implode('', $result), $letters];
        }

        return $arraysForAllDates;
    }

    public function shuffleArrays($uuidArray, $lettersArray): array
    {
        $i = 0;
        $j = 0;
        $k = 0;
        $result = [];

        while ($i < count($uuidArray))
        {
            $result[$k++] = $uuidArray[$i++];
            $result[$k++] = $lettersArray[$j++];
            if ($j >= count($lettersArray)) {
                $j = 0;
            }
        }

        return $result;
    }

    public function insert($uuid)
    {
        foreach ($uuid as $id) {
            $this->keys->insert($this->factory->create($id));
        }
    }
}
