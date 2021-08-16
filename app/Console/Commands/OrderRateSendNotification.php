<?php

namespace App\Console\Commands;

use App\Repository\OrderRateSendMsgInterface;
use Illuminate\Console\Command;

class OrderRateSendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order_rate:notify {--orderId : ID заказа}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Отправить уведомление владельцу заказа с просьбой оценить заказ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param OrderRateSendMsgInterface $orderRateMsg
     * @param $orderId
     * @return int
     */
    public function handle(OrderRateSendMsgInterface $orderRateMsg, $orderId)
    {
        // Дёрнуть пуш-сервис с текстом
        error_log("Отправляю сообщение заказу {$orderId}");
        $orderRateMsg->getMessage();

        return 0;
    }
}
