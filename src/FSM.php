<?php
declare(strict_types=1);

class FSM
{
    public static function transition(array $transitions, State $state, Event $event): string
    {
        $newState = $transitions[$state->getName()][$event->getName()] ?? null;
        if ($newState === null) {
            throw new RuntimeException(
                sprintf(
                    'Invalid state transition from state %s via event %s',
                    $state->getName(),
                    $event->getName()
                )
            );
        }
        /** @var string $newState */
        return $newState;
    }
}
