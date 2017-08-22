<?php
declare(strict_types=1);

class Person
{
    const TRANSITIONS = [
        PersonState::ASLEEP  => [
            PersonEvent::ALARM => PersonState::AWAKE,
        ],
        PersonState::AWAKE   => [
            PersonEvent::DRESS => PersonState::DRESSED,
            PersonEvent::EAT   => PersonState::FED,
        ],
        PersonState::DRESSED => [
            PersonEvent::EAT => PersonState::READY,
        ],
        PersonState::FED     => [
            PersonEvent::DRESS => PersonState::READY,
        ],
        PersonState::READY   => [
            PersonEvent::GO_TO_WORK => PersonState::WORK,
        ],
        PersonState::WORK    => [
            PersonEvent::THINK   => PersonState::WORK,
            PersonEvent::YAWN    => PersonState::CAFE,
            PersonEvent::GO_HOME => PersonState::HOME,
        ],
        PersonState::CAFE    => [
            PersonEvent::COFFEE => PersonState::WORK,
        ],
        PersonState::HOME    => [
            PersonEvent::WATCH_TV => PersonState::ASLEEP,
            PersonEvent::READ     => PersonState::ASLEEP,
        ],
    ];

    private $state;

    public function __construct()
    {
        $this->state = new PersonState(PersonState::ASLEEP);
    }

    public function setState(PersonState $state, PersonEvent $event): void
    {
        $this->state = new PersonState(FSM::transition(self::TRANSITIONS, $state, $event));
    }

    public function getState(): PersonState
    {
        return $this->state;
    }
}
