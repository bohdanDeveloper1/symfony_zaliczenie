<?php

namespace App\Service;

class IssuesManager
{
    public const STATUS_NEW = 1;
    public const STATUS_IN_PROGRESS = 2;
    public const STATUS_ACCEPTED = 3;
    public const STATUS_DECLINED = 4;
    public const STATUS_CLOSED = 5;
    public const ISSUE_STATUS_LABELS = [
        self::STATUS_NEW => 'Awaiting admission',
        self::STATUS_IN_PROGRESS => 'Considered',
        self::STATUS_ACCEPTED => 'Accepted',
        self::STATUS_DECLINED => 'Rejected',
        self::STATUS_CLOSED => 'Closed',
    ];

    private $statuses;

    public function __construct()
    {
        $this->statuses = self::ISSUE_STATUS_LABELS;
    }

    public function getStatuses(): array
    {
        return $this->statuses;
    }
}