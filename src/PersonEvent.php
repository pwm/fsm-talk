<?php
declare(strict_types=1);

class PersonEvent implements Event
{
    const ALARM      = 'Alarm';
    const DRESS      = 'Dress';
    const EAT        = 'Eat';
    const GO_TO_WORK = 'GoToWork';
    const THINK      = 'Think';
    const YAWN       = 'Yawn';
    const COFFEE     = 'Coffee';
    const GO_HOME    = 'GoHome';
    const READ       = 'Read';
    const WATCH_TV   = 'WatchTV';

    private const EVENTS = [
        self::ALARM,
        self::DRESS,
        self::EAT,
        self::GO_TO_WORK,
        self::THINK,
        self::YAWN,
        self::COFFEE,
        self::GO_HOME,
        self::READ,
        self::WATCH_TV,
    ];

    private $name;

    public function __construct(string $name)
    {
        if (! in_array($name, self::EVENTS, true)) {
            throw new RuntimeException(sprintf('Event %s is not valid.', $name));
        }
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
