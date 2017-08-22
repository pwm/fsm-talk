<?php
declare(strict_types=1);

require_once __DIR__.'/vendor/autoload.php';

$person = new Person();

$events = [
    PersonEvent::ALARM,
    PersonEvent::DRESS,
    PersonEvent::EAT,
    PersonEvent::GO_TO_WORK,
    PersonEvent::THINK,
    PersonEvent::THINK,
    PersonEvent::YAWN,
    PersonEvent::COFFEE,
    PersonEvent::THINK,
    PersonEvent::GO_HOME,
    PersonEvent::WATCH_TV,
];

$states = array_reduce($events, function ($states, $event) use ($person) {
    $person->setState(
        new PersonState($states[count($states) - 1]),
        new PersonEvent($event)
    );
    $states[] = $person->getState()->getName();
    return $states;
}, [PersonState::ASLEEP]);

var_dump($states);
