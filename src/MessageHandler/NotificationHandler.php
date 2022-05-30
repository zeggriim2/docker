<?php


namespace App\MessageHandler;


use App\Message\NotificationMessage;
use App\Services\NotifierService;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class NotificationHandler implements MessageHandlerInterface
{

    /**
     * @var NotifierService
     */
    private $notifierService;

    public function __construct(
        NotifierService $notifierService
    )
    {
        $this->notifierService = $notifierService;
    }

    public function __invoke(
        NotificationMessage $message
    )
    {
        $this->notifierService->notify();
    }
}