<?php

namespace LSR\Api;

use DateInterval;
use DatePeriod;
use DateTime;
use DateTimeImmutable;
use DateTimeZone;

class CalenderImport
{

    private string $url;

    private array $eventNumbers;
    private array $days = [
        "MO" => "Montag",
        "TU" => "Dienstag",
        "WE" => "Mittwoch",
        "TH" => "Donnerstag",
        "FR" => "Freitag",
    ];

    private array $frequency = [
      "WEEKLY" => 7
    ];

    public function __construct($eventNumbers = [])
    {
        $this->eventNumbers = $eventNumbers;
        $this->url = "https://lsf.htw-berlin.de/qisserver/rds?state=verpublish&status=transform&vmfile=no&termine=". implode(',', $this->eventNumbers) ."&moduleCall=iCalendarPlan&publishConfFile=reports&publishSubDir=veranstaltung";
    }

    public function import(): array
    {
        $event = [];
        $events = [];
        $timezone = new DateTimeZone("Europe/Berlin");
        $now = new DateTime("now", $timezone);
        $currentDate = new DateTime("+ 1 days", $timezone);
        $tomorrow = new DateTime("+ 2 days", $timezone);
        $startDate = null;
        $endDate = null;
        $frequency = null;

        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        );

        $content = file_get_contents($this->url, false, stream_context_create($arrContextOptions));

        if(!$content){
            echo "Da stimmt was nicht!";
            exit();
        }

        $result = [];
        preg_match_all('/(BEGIN:VEVENT.*?END:VEVENT)/si', $content, $result, PREG_PATTERN_ORDER);

        for ($i = 0; $i < count($result[0]); $i++) {

            if (preg_match('/DTSTART;TZID=(.*)DTEND;/si', $result[0][$i], $regs)) {
                $startDate = DateTimeImmutable::createFromFormat("Ymd" ,substr(str_replace("  ", " ", str_replace("\r\n", "", $regs[1])),-16,8));
                $event['ab'] = $startDate->format("d.m.Y");
                $event['beginn'] = gmdate("H:i", strtotime(substr(str_replace("  ", " ", str_replace("\r\n", "", $regs[1])),-7)));
            }
            if (preg_match('/DTEND;TZID=(.*)RRULE:/si', $result[0][$i], $regs)) {
                $event['ende'] = gmdate("H:i", strtotime(substr(str_replace("  ", " ", str_replace("\r\n", "", $regs[1])),-7)));
            }
            if (preg_match('/FREQ=(.*);UNTIL/si', $result[0][$i], $regs)) {
                $event['Frequenz'] = str_replace("  ", " ", str_replace("\r\n", "", $regs[1]));
                $frequency = $this->frequency[$event['Frequenz']];
            }
            if (preg_match('/UNTIL=(.*);INTERVAL/si', $result[0][$i], $regs)) {
                $endDate = DateTimeImmutable::createFromFormat("Ymd", substr(str_replace("  ", " ", str_replace("\r\n", "", $regs[1])),0,8));
                $event['bis'] = $endDate->format("d.m.Y");
            }
            if (preg_match('/INTERVAL=(.*);BYDAY/si', $result[0][$i], $regs)) {
                $frequency *= $event['Interval'] = str_replace("  ", " ", str_replace("\r\n", "", $regs[1]));
            }
            if (preg_match('/BYDAY=(.*)EXDATE;/si', $result[0][$i], $regs)) {
                $event['tag'] = $this->days[substr(str_replace("\r\n", "", $regs[1]), 0,2)];
            }
            if (preg_match('/LOCATION:(.*)DTSTAMP:/si', $result[0][$i], $regs)) {
                $location = explode("-", str_replace("  ", " ", str_replace("\r\n", "", $regs[1])));
                $event['ort'] = array_pop($location);
            }
            if (preg_match('/SUMMARY:(.*)CATEGORIES/si', $result[0][$i], $regs)) {
                $event['veranstaltung'] = str_replace("  ", " ", str_replace("\r\n", "", $regs[1]));
            }
            if (preg_match('/CATEGORIES:(.*)END:VEVENT/si', $result[0][$i], $regs)) {
                $event['typ'] = str_replace("  ", " ", str_replace("\r\n", "", $regs[1]));
            }
            if($currentDate > $endDate){

                $event = [];
            } else {
                $dateRange = new DatePeriod($startDate, new DateInterval("P{$frequency}D"), $tomorrow);

                foreach($dateRange as $date){
                    if($date->format("d.m.Y") == $now->format("d.m.Y")){
                        $events["Heute"][] = $event;
                        break;
                    }
                    if($date->format("d.m.Y") == $currentDate->format("d.m.Y")){
                        $events["Morgen"][] = $event;
                        break;
                    }
                }
            }

        }
        return $events;
    }


}