<?php

namespace App\Http\Controllers;

use App\Repository\Eloquent\OrderRateRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;

class OrderRateController extends BaseController
{
    /**
     * @var OrderRateRepositoryInterface
     */
    private $orderRateRepository;

    public function __construct(OrderRateRepositoryInterface $orderRateRepository) {
        $this->orderRateRepository = $orderRateRepository;
    }

    /**
     * Сохранить рейтинг заказа
     *
     * @param $id
     * @param $rate
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveRate($id, $rate) {
        if($this->orderRateRepository->setRate($id, $rate)) {
            return response()->json($this->orderRateRepository->find($id));
        } else {
            abort(500);
        }
    }

    /**
     * Получить рейтинг заказа
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRate($id) {
        $obj = $this->orderRateRepository->find($id);
        if(!$obj) abort(404);
        return response()->json($obj);
    }

    /**
     * Сохранить комментарий к заказу
     *
     * @param Request $request
     * @param $id
     */
    public function saveComment(Request $request, $id) {
        $message = $request->input('message');
        error_log('message/'.$id.'/'.$message);
    }

    /**
     * Получить комментарий к заказу
     */
    public function getComment($id) {
        error_log('message/'.$id);
    }

    /**
     * Админка - сообщение пользователю с просьбой проставить оценку
     *
     * @param Request $request
     */
    public function saveSendMessage(Request $request) {
        Storage::put('orders_rate_config.txt', (string)$request->input('message'), 'private');
    }
    public function getSendMessage() {
        try {
            return Storage::get('orders_rate_config.txt');
        } catch (\Exception $e) {
            abort(500);
        }
    }
}
