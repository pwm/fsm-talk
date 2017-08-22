<?php
declare(strict_types=1);

class PersonState implements State
{
    const ASLEEP  = 'Asleep';
    const AWAKE   = 'Awake';
    const DRESSED = 'Dressed';
    const FED     = 'Fed';
    const READY   = 'Ready';
    const WORK    = 'Work';
    const CAFE    = 'Cafe';
    const HOME    = 'Home';

    private const STATES = [
        self::ASLEEP,
        self::AWAKE,
        self::DRESSED,
        self::FED,
        self::READY,
        self::WORK,
        self::CAFE,
        self::HOME,
    ];

    private $name;

    public function __construct(string $name)
    {
        if (! in_array($name, self::STATES, true)) {
            throw new RuntimeException(sprintf('State %s is not valid.', $name));
        }
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
